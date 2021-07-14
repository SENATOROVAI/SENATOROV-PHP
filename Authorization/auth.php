<?php

require 'config/db.php';

$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
$password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);
$password =md5($password."wdadarwa1232");

$sql = $pdo->query("SELECT * FROM `users_reg` WHERE `login` = '$login' AND `password` = '$password'");
$user = $sql->fetch(PDO::FETCH_ASSOC);

if($user == false) {
    echo "No found user!";
    echo '<br>You want sign out? -><a href="/">click</a>';
    exit();
}

setcookie('user', $user['name'], time() + 3600, "/");

header('Location:/');