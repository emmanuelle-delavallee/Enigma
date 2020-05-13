<?php

namespace Enigma;

use Enigma\CommentsManager;
use Enigma\StoriesManager;
use Enigma\UsersManager;
use Enigma\Enigma1Manager;
use Enigma\ViewManager;

class FrontendController
{
    private $CommentsManager;
    private $ViewManager;

    public function __construct()
    {
        $this->CommentsManager = new CommentsManager();
        $this->StoriesManager = new StoriesManager();
        $this->UsersManager = new UsersManager();
        $this->Enigma1Manager = new Enigma1Manager();
        $this->ViewManager = new ViewManager();
    }

    // Page d'accueil
    function home()
    {
        $enigmes = $this->StoriesManager->getEnigma();

        return $this->ViewManager->render("frontend/home", [
            'enigmes' => $enigmes
        ]);
    }

    // Page d'erreur
    function error()
    {
        return $this->ViewManager->render('template/error', ['']);
    }


    // Page jouer
    function startToPlay()
    {
        $imgs = $this->StoriesManager->getImgs();
        $responses = $this->StoriesManager->getEnigmas();

        return $this->ViewManager->render('frontend/play', [
            'imgs' => $imgs,
            'responses' => $responses
        ]);
    }


    // Page découvrir 
    function discover()
    {
        return $this->ViewManager->render('frontend/discover', ['']);
    }


    // Page commentaires, récupère les commentaires avec pour valeur 0 ou 1
    function comments($page)
    {
        $pagetotal = $this->CommentsManager->getPagesComments();
        $responses = $this->CommentsManager->getComments($page);
        $pageEncours = $page;
        $enigmes = $this->StoriesManager->getEnigmas();

        return $this->ViewManager->render('frontend/comments', [
            'pagetotal' => $pagetotal,
            'responses' => $responses,
            'pageEncours' => $pageEncours,
            'enigmes' => $enigmes
        ]);
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

        return $this->ViewManager->render('frontend/enigma', [
            'enigmes' => $enigmes
        ]);
    }


    // Pages énigme 1
    function enigmastep($id, $step)
    {
        $responses = $this->Enigma1Manager->Enigma1Answer($id, $step);
        $helps = $this->Enigma1Manager->Enigma1Help($id, $step);

        return $this->ViewManager->render('frontend/enigma' . $id . '/enigma' . $id . '-step' . $step, ['']);
    }


    // Page finale énigme
    function enigmadone($id_enigme, $id_ending, $id_user)
    {
        $endings = $this->Enigma1Manager->enigmaEnding($id_enigme, $id_ending);
        $postending = $this->Enigma1Manager->postEnding($id_enigme, $id_user, $id_ending);

        return $this->ViewManager->render('frontend/enigma-done', [
            'endings' => $endings,
            'postending' => $postending
        ]);
    }


    // Page login
    function login()
    {
        $checkIfAdmin = $this->UsersManager->checkIfAdmin();

        return $this->ViewManager->render('frontend/login', [
            'checkIfAdmin' => $checkIfAdmin
        ]);
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

        return $this->ViewManager->render('frontend/usersDashboard', [
            'responses' => $responses,
            'users' => $users,
        ]);
    }


    // Page des mentions légales
    function legal()
    {
        return $this->ViewManager->render('frontend/legal', ['']);
    }

    // User ajout image
    function editUser($pseudo, $imageTemp, $extension)
    {
        $responses = $this->UsersManager->postImg($pseudo, $imageTemp, $extension);
    }
}
