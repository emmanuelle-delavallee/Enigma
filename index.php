<?php
session_start();

//123//

use Enigma\Autoloader;

require 'Controller/Autoloader.php';
Autoloader::register();

require 'Controller/Router.php';
$router = new Enigma\Router();
$router->routerRequest();
