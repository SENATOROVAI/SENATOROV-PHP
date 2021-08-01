<?php
$host = 'localhost';
$db = 'db';
$user = 'user';
$pass = 'pass';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db",$user,$pass);
} catch (PDOException $e) {
    echo    'ERROR CONNECT TO DB' . $e->getMessage();
}