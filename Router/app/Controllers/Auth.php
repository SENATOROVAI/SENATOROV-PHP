<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 7/21/2021
 * Time: 10:34 PM
 */

namespace App\Controllers;


use App\Services\Router;

class Auth
{
    public function login($data)
    {
        $email = $data["email"];
        $password = $data["password"];

        $user = \R::findOne('users', 'email = ?', [$email]);

        if (!$user) {
            die('user no found');
        }

        if(password_verify($password, $user->password)){
            session_start();
            $_SESSION["user"] = [
                "id" => $user->id,
                "full_name" => $user->full_name,
                "username" => $user->username,
                "group" => $user->group,
                "email" => $user->email,
                "avatart" => $user->avatart,
            ];

            Router::redirect('/profile');
        } else {
            die('error login or password');
        }



    }

    public function register($data, $files)
    {
        $email = $data["email"];
        $username = $data["username"];
        $full_name = $data["full_name"];
        $password = $data["password"];
        $password_confirm = $data["password_confirm"];

        if($password !== $password_confirm){
            Router::error(500);
            die();
        }

        $avatar = $files["avatar"];
        $fileName = time(). '_' . $avatar["name"];

        $path = "uploads/avatars/" . $fileName;

        if(move_uploaded_file($avatar["tmp_nmae"], $path)) {
           $user =  \R::dispense('users');
           $user->email = $email;
           $user->username= $username;
           $user->full_name = $full_name;
           $user->group = 1;
           $user->avatar = "/" . $path;
           $user->password= password_hash($password, PASSWORD_DEFAULT);
           \R::store($user);
            Router::redirect('/login');
        } else {
            Router::error(500);
        }


    }

    public function logout()
    {
        unset($_SESSION["user"]);
        Router::redirect('login');
    }
}