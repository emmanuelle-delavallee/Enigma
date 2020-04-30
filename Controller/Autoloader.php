<?php

namespace Enigma;


class Autoloader
{


    //Enregistre l'autoloader
    static function register()
    {
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }


    //Inclut le fichier correspondant à la class
    static function autoload($class)
    {
        $class = str_replace('Enigma\\', '', $class);
        require 'Model/' . $class . '.php';
    }
}
