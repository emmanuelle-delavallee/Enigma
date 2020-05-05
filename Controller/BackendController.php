<?php

namespace Enigma;

use Enigma\CommentsManager;
use Enigma\StoriesManager;
use Enigma\UsersManager;


class BackendController
{

    private $AdminManager;
    private $CommentsManager;

    public function __construct()
    {
        $this->CommentsManager = new CommentsManager();
        $this->StoriesManager = new StoriesManager();
        $this->UsersManager = new UsersManager();
    }


    // Dashboard
    function adminDashboard()
    {
        $comments = $this->CommentsManager->getUnreadComments();
        $admins = $this->UsersManager->getAdmins();
        $checkIfAdmin = $this->UsersManager->checkIfAdmin();

        require('View/backend/adminDashboard.php');
    }


    // Supprime les droits d'administration d'un compte administrateur
    function deleteAdmin($id)
    {
        $deladmin = $this->UsersManager->delAdmin($id);
    }


    // Ajoute les droits d'administration à un compte utilisateur
    function addAdmin($pseudo)
    {
        $newAdmin = $this->UsersManager->newAdmin($pseudo);
    }


    // Valide un commentaire
    function validComment($id)
    {
        $delcomments = $this->CommentsManager->validAComment($id);
    }


    // Supprime un commentaire
    function deleteComment($id)
    {
        $delcomments = $this->CommentsManager->deleteAComment($id);
    }

    // Gestion des énigmes publiées
    function adminEnigmas()
    {
        $responses = $this->StoriesManager->getEnigmas();
        require('View/backend/adminEnigmas.php');
    }

    // Gestion de toutes les énigmes
    function adminAllEnigmas()
    {
        $responses = $this->StoriesManager->getAllEnigmas();
        require('View/backend/adminAllEnigmas.php');
    }
}
