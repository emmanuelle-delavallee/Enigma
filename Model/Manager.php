<?php

namespace Enigma;

use PDO;
use Exception;

// Classe abstraite, pour qu'on ne puisse plus l'instancier
abstract class Manager
{
    // Constantes de connexion à la BDD
    const DB_HOST = 'mysql:host=localhost;dbname=enigma;charset=utf8';
    const DB_USER = 'root';
    const DB_PASS = '';


    // Stocke la connexion s'il y en a une
    private $dbconnect;



    // Vérifie si une connexion est présente ou non
    private function checkConnection()
    {
        //Vérifie si la connexion est nulle et fait appel à dbConnect()
        if ($this->dbconnect === null) {
            return $this->dbConnect();
        }
        //Si la connexion existe, elle est renvoyée, inutile de refaire une connexion
        return $this->dbconnect;
    }



    // Méthode de connexion à la BDD
    public function dbConnect()
    {
        //Tentative de connexion à la BDD
        try {
            $this->dbconnect = new \PDO(self::DB_HOST, self::DB_USER, self::DB_PASS);
            $this->dbconnect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return  $this->dbconnect;
        }
        // On lève une erreur si la connexion échoue
        catch (Exception $errorConnection) {
            die('Erreur de connection :' . $errorConnection->getMessage());
        }
    }


    // Gère les requêtes
    protected function createQuery($sql, $parameters = null)
    {
        if ($parameters) :
            $result = $this->checkConnection()->prepare($sql);
            $result->setFetchMode(PDO::FETCH_CLASS, static::class);
            $result->execute($parameters);
            return $result;
        endif;
        $result = $this->checkConnection()->query($sql);
        $result->setFetchMode(PDO::FETCH_CLASS, static::class);
        return $result;
    }
}
