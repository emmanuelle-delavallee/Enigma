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
        $responses = $this->StoriesManager->getEnigmas();

        require('View/frontend/play.php');
    }


    // Page commentaires, récupère les commentaires avec pour valeur 0 ou 1
    function comments()
    {
        $responses = $this->CommentsManager->getComments();

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
        $response = $this->StoriesManager->getEnigma();

        require('View/frontend/enigma1/enigma.php');
    }


    // Page énigme 1
    function enigma1step1()
    {
        $responses = $this->Enigma1Manager->Enigma1Answer('1', '1');
        $helps = $this->Enigma1Manager->Enigma1Help('1', '1');
        require('View/frontend/enigma1/enigma1-step1.php');
    }

    // Page énigme 2
    function enigma1step2()
    {
        $responses = $this->Enigma1Manager->Enigma1Answer('1', '2');
        $helps = $this->Enigma1Manager->Enigma1Help('1', '2');
        require('View/frontend/enigma1/enigma1-step2.php');
    }

    // Page énigme 3
    function enigma1step3()
    {
        $responses = $this->Enigma1Manager->Enigma1Answer('1', '3');
        $helps = $this->Enigma1Manager->Enigma1Help('1', '3');
        require('View/frontend/enigma1/enigma1-step3.php');
    }

    // Page énigme 3
    function enigma1done($id)
    {

        require('View/frontend/enigma1/enigma1done.php');
    }

    // Page login
    function login()
    {
        $checkIfAdmin = $this->UsersManager->checkIfAdmin();
        require('View/frontend/login.php');
    }


    // Vérifie la connexion d'un utilisateur ou administrateur
    function checkLogin($pseudo, $password)
    {
        $checkLogin = $this->UsersManager->checkAtLogin($pseudo, $password);

        return $checkLogin;
    }


    // Page dashboard des utilisateurs
    function usersDashboard()
    {
        require('View/frontend/usersDashboard.php');
    }

    // Page d'erreur
    function error()
    {
        require('View/template/error.php');
    }
}
