<?php

namespace Enigma;

require_once("Model/Manager.php");

class UsersManager extends Manager
{

    //-------------------------------------------------------------//
    // Vérification de login utilisateurs + administrateurs
    public function checkAtLogin($pseudo, $password)
    {
        $sql = "
           SELECT id
           FROM users 
           WHERE pseudo = ? 
           AND password = ?
           ";

        $res = 0;
        $admins =  $this->createQuery($sql, array($pseudo, sha1($password)));
        foreach ($admins as $admin) {
            if ($admin->id > 0) {
                $res = 1;
            }
        }
        return $res;
    }



    //-------------------------------------------------------------//
    // REF // Vérifie si administrateur pour afficher les contenus ou pas 
    function checkIfAdmin()
    {
        $exist = 0;
        if (isset($_SESSION['username'])) {
            $value = $_SESSION['username'];

            $sql = "
            SELECT id FROM users WHERE pseudo=? and admin= '1'
            ";

            $admins =  $this->createQuery($sql, array($value));

            foreach ($admins as $admin) {
                if ($admin->id > 0) {
                    $exist = 1;
                }
            }
        }
        // Si connecté en tant qu'admin, stocke la donnée en session
        if ($exist == 1) {
            $_SESSION['admin'] = 'VRAI';
        } else {
            $_SESSION['admin'] = '';
        }
        return $exist;
    }




    //-------------------------------------------------------------//
    // REF // Récupère les administrateurs de la BDD
    public function getAdmins()
    {
        $sql = "
        SELECT id,
               pseudo,
               email
        FROM users
        WHERE admin = '1'
        ";

        return $this->createQuery($sql);
    }


    //-------------------------------------------------------------//
    // REF // Supprime les droits d'administrateur d'un compte admin
    public function delAdmin($adminId)
    {
        $sql = "UPDATE users SET users.admin = '0' WHERE id=" . $adminId;

        $this->createQuery($sql, [$adminId]);
    }


    //-------------------------------------------------------------//
    // REF // Ajoute les droits d'administrateur d'un compte user
    public function newAdmin($pseudo)
    {
        $sql = "UPDATE users SET users.admin = '1' WHERE pseudo='" . $pseudo . "'";
        $this->createQuery($sql, [$pseudo]);
    }
}
