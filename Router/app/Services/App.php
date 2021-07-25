<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 7/21/2021
 * Time: 9:51 PM
 */

namespace App\Services;


class App
{
    public static function start()
    {
        self::libs();
        self::db();
    }
    public  static function libs()
    {
        $config = require_once  "config/app.php";
        foreach ($config["libs"] as $lib) {
            require_once "libs/" . $lib . ".php";
        }
    }

    public static function db()
    {
        $config = require_once  "config/db.php";

        if($config["enable"]){
            \R::setup( 'mysql:host='.$config["host"].';dbname='.$config["db"].'',
                $config["username"], $config["password"] ); //for both mysql or mariaDB

            if(!\R::testConnection()){
                die('ERROR');
            }
        }
    }
}