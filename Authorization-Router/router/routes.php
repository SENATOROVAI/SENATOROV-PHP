<?php
use App\Services\Router;


Router::page('/login', 'login');
Router::page('/register', 'register');
Router::page('/home', 'home');




Router::enable();