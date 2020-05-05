<?php
session_start();

use Enigma\Autoloader;

require 'Controller/Autoloader.php';
Autoloader::register();

require 'Controller/Router.php';
$router = new Enigma\Router();
$router->routerRequest();
