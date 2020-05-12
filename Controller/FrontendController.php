<?php

namespace Enigma;

use Enigma\CommentsManager;
use Enigma\StoriesManager;
use Enigma\UsersManager;
use Enigma\Enigma1Manager;

class FrontendController
{
    private $CommentsManager;

    public function __construct()
    {
        $this->CommentsManager = new CommentsManager();
        $this->StoriesManager = new StoriesManager();
        $this->UsersManager = new UsersManager();
        $this->Enigma1Manager = new Enigma1Manager();
    }

    // Page d'accueil
    function home()
    {
        $enigmes = $this->StoriesManager->getEnigma();
        require('View/frontend/home.php');
    }


    // Page découvrir 
    function discover()
    {
        require('View/frontend/discover.php');
    }


    // Page jouer
    function startToPlay()
    {
        $imgs = $this->StoriesManager->getImgs();
        $responses = $this->StoriesManager->getEnigmas();

        require('View/frontend/play.php');
    }


    // Page commentaires, récupère les commentaires avec pour valeur 0 ou 1
    function comments()
    {
        $responses = $this->CommentsManager->getComments();

        $enigmes = $this->StoriesManager->getEnigmas();

        require('View/frontend/comments.php');
    }


    // Ajouter un nouveau commentaire 
    function addUserComment($id_story, $pseudo, $comment_title, $comment, $note)
    {
        $newComment = $this->CommentsManager->postComment($id_story, $pseudo, $comment_title, $comment, $note);
    }


    // Supprime un commentaire
    function warningAComment($id)
    {
        $warningcomments = $this->CommentsManager->warnAComment($id);
    }


    // Page énigme
    function enigma()
    {
        $enigmes = $this->StoriesManager->getEnigma();

        require('View/frontend/enigma.php');
    }


    // Pages énigme 1
    function enigmastep($id, $step)
    {
        $responses = $this->Enigma1Manager->Enigma1Answer($id, $step);
        $helps = $this->Enigma1Manager->Enigma1Help($id, $step);
        require('View/frontend/enigma' . $id . '/enigma' . $id . '-step' . $step . '.php');
    }


    // Page finale énigme
    function enigmadone($id_enigme, $id_ending, $id_user)
    {
        $endings = $this->Enigma1Manager->enigmaEnding($id_enigme, $id_ending);
        $postending = $this->Enigma1Manager->postEnding($id_enigme, $id_user, $id_ending);
        require('View/frontend/enigma-done.php');
    }




    // Page login
    function login()
    {
        $checkIfAdmin = $this->UsersManager->checkIfAdmin();
        require('View/frontend/login.php');
    }

    // S'inscrire
    function addUser($name, $email, $password)
    {
        $user = $this->UsersManager->addNewUser($name, $email, $password);
    }

    // Vérifie la connexion d'un utilisateur ou administrateur
    function checkLogin($pseudo, $password)
    {
        $checkLogin = $this->UsersManager->checkAtLogin($pseudo, $password);

        return $checkLogin;
    }

    // Vérifie si l'utilisateur est admin
    function checkAdmin()
    {
        $checkAdmin = $this->UsersManager->checkIfAdmin();
        return $checkAdmin;
    }

    // Vérifie que l'utilisateur soit unique
    function checkUser($pseudo)
    {
        $checkuser = $this->UsersManager->checkIfUserexist($pseudo);
        return $checkuser;
    }

    // Page dashboard des utilisateurs
    function usersDashboard()
    {
        $responses = $this->StoriesManager->getEnigmasUser();
        $users = $this->UsersManager->getUser();

        require('View/frontend/usersDashboard.php');
    }

    // Page d'erreur
    function error()
    {
        require('View/template/error.php');
    }

    // User ajout image
    function editUser($pseudo, $imageTemp, $extension)
    {
        $responses = $this->UsersManager->postImg($pseudo, $imageTemp, $extension);
    }
}
