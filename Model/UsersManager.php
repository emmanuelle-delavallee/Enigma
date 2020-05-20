<?php

namespace Enigma;

require_once("Model/Manager.php");

class UsersManager extends Manager
{


    // FRONT :  Vérification de login utilisateurs + administrateurs
    public function checkAtLogin($pseudo, $password)
    {
        $sql = "
           SELECT id
           FROM users 
           WHERE pseudo = ? 
           AND password = ?
           ";

        $res = 0;
        $users =  $this->createQuery($sql, array($pseudo, sha1($password)));
        foreach ($users as $user) :
            if ($user->id > 0) :
                $res = 1;
                $_SESSION['id_user'] = $user->id;
            endif;
        endforeach;
        return $res;
    }


    //-------------------------------------------------------------//

    // BACK :  Vérifie si administrateur pour afficher les contenus ou pas 
    function checkIfAdmin()
    {
        $exist = 0;
        if (isset($_SESSION['username'])) :
            $value = $_SESSION['username'];

            $sql = "
            SELECT id FROM users WHERE pseudo=? and admin= '1'
            ";

            $admins =  $this->createQuery($sql, array($value));

            foreach ($admins as $admin) :
                if ($admin->id > 0) :
                    $exist = 1;
                endif;
            endforeach;
        endif;
        // Si connecté en tant qu'admin, stocke la donnée en session
        if ($exist == 1) :
            $_SESSION['admin'] = 'VRAI';
        else :
            $_SESSION['admin'] = '';
        endif;
        return $exist;
    }


    //-------------------------------------------------------------//

    // BACK : Récupère les administrateurs de la BDD
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

    // BACK : Supprime les droits d'administrateur d'un compte admin
    public function delAdmin($adminId)
    {
        $sql = "UPDATE users SET users.admin = '0' WHERE id=" . $adminId;

        $this->createQuery($sql, [$adminId]);
    }


    //-------------------------------------------------------------//

    // BACK : Ajoute les droits d'administrateur d'un compte user
    public function newAdmin($pseudo)
    {
        $sql = "UPDATE users SET users.admin = '1' WHERE pseudo='" . $pseudo . "'";
        $this->createQuery($sql, [$pseudo]);
    }

    public function addNewUser($name, $email, $password)
    {
        $sql = 'INSERT INTO users(pseudo, email, password) VALUES(?, ?, ?)';

        $this->createQuery($sql, array($name, $email, sha1($password)));
    }



    //-------------------------------------------------------------//

    // FRONT : Vérification si le pseudo existe déjà
    public function checkIfUserexist($pseudo)
    {
        $sql = "
         SELECT id
         FROM users 
         WHERE pseudo = ? 
        
         ";

        $res = 0;
        $users =  $this->createQuery($sql, array($pseudo));
        foreach ($users as $user) :
            if ($user->id > 0) :
                $res = 1;
            endif;
        endforeach;
        return $res;
    }


    //-------------------------------------------------------------//

    // FRONT : choisir une image dans l'espace perso utilisateur

    public function postImg($pseudo, $tmp_name, $extension)
    {

        // Update de la BDD là où l'ID correspond à l'ID de l'article, insère l'image et change l'image par défaut
        $sql = "
         UPDATE users 
         SET image = ?
         WHERE pseudo = ?
         ";


        $this->createQuery($sql, [$pseudo . $extension, $pseudo]);

        // Classe le fichier sélectionné dans le dossier image
        move_uploaded_file($tmp_name, "Public/img/users/" . $pseudo . $extension);
    }


    //-------------------------------------------------------------//

    // FRONT/BACK : Récupère les utilisateurs

    public function getUser()
    {
        $sql = "
        SELECT id,
               pseudo,
               email,
               image
        FROM users
        where pseudo = ?
        ";

        return $this->createQuery($sql, [$_SESSION['username']]);
    }


    //-------------------------------------------------------------//

    // BACK : Récupère le nombre d'entrées d'une table
    public function inTable($table)
    {

        $db = $this->dbconnect();

        $query = $db->query("
            SELECT COUNT(id) as nb
            FROM $table
            ");
        $nombre = $query->fetch();

        return $nombre['nb'];
    }
}
