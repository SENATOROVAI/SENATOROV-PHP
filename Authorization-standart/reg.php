<?php

require 'config/db.php';

const PATH = '/';

$login = filter_var(trim($_POST['login']),
    FILTER_SANITIZE_STRING);
$password = filter_var(trim($_POST['password']),
    FILTER_SANITIZE_STRING);
$name = filter_var(trim($_POST['name']),
    FILTER_SANITIZE_STRING);

if(mb_strlen($login) < 5 || mb_strlen($login) > 10) {
    echo "ERROR: MAX 5-10 letters";
    exit();
} else if (mb_strlen($name) < 5 || mb_strlen($login) > 10 ){
    echo "ERROR: MAX 5-10 letters";
    exit();
} else if (mb_strlen($password) < 5 || mb_strlen($login) > 10){
    echo "ERROR: MAX 5-10 letters";
    exit();
}

$password =md5($password."wdadarwa1232");

$sql = $pdo->query("INSERT INTO `users_reg` (`login`,`password`,`name`) VALUES('$login', '$password','$name')");

header('Location:' . PATH);

