<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 7/19/2021
 * Time: 8:53 PM
 */

namespace App\Services;


class Page
{
    public static function part($part_name)
    {
        require_once "views/components/" . $part_name . ".php";
    }
}