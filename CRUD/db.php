<?php

$host = 'localhost';
$db = 'DB_NAME';
$user = 'USER';
$pass = 'PASSWORD';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db",$user,$pass);
} catch (PDOException $e) {
    echo    'ERROR CONNECT TO DB' . $e->getMessage();
}

