<?php

namespace Enigma;

use Enigma\CommentsManager;
use Enigma\StoriesManager;
use Enigma\UsersManager;
use Enigma\ViewManager;


class BackendController
{

    private $AdminManager;
    private $CommentsManager;
    private $ViewManager;


    public function __construct()
    {
        $this->CommentsManager = new CommentsManager();
        $this->StoriesManager = new StoriesManager();
        $this->UsersManager = new UsersManager();
        $this->ViewManager = new ViewManager();
    }


    // Dashboard
    function adminDashboard()
    {
        $comments = $this->CommentsManager->getUnreadComments();
        $admins = $this->UsersManager->getAdmins();
        $checkIfAdmin = $this->UsersManager->checkIfAdmin();
        $nb_coms = 0;
        $nb_user = 0;
        $nb_finish = 0;
        $tables = [
            "Utilisateurs"      =>  "users",
            "Commentaires"      =>  "users_comments",
            "Succès"   =>  "progress"
        ];

        $i = 0;

        foreach ($tables as $table_name => $table) {

            $nbrInTable[$i] = $this->UsersManager->inTable($table);

            $i = $i + 1;
        }

        return $this->ViewManager->render("backend/adminDashboard", [
            'comments' => $comments,
            'admins' => $admins,
            'checkIfAdmin' => $checkIfAdmin,
            'nb_coms' => $nb_coms,
            'nb_user' => $nb_user,
            'nb_finish' => $nb_finish,
            'tables' => $tables,
            'nbrInTable' => $nbrInTable

        ]);
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
        $checkIfAdmin = $this->UsersManager->checkIfAdmin();

        return $this->ViewManager->render("backend/adminEnigmas", [
            'responses' => $responses,
            'checkIfAdmin' => $checkIfAdmin
        ]);
    }

    // Affichage de la page de mise à jour des énigmes publiées
    function updateEnigma()
    {
        $enigmes = $this->StoriesManager->getEnigma();
        $checkIfAdmin = $this->UsersManager->checkIfAdmin();
        $indices = $this->StoriesManager->getIndices();

        return $this->ViewManager->render("backend/adminUpdateEnigma", [
            'enigmes' => $enigmes,
            'checkIfAdmin' => $checkIfAdmin,
            'indices' => $indices
        ]);
    }


    // Envoi en base des indices modifiés
    function updateStepEnigme($id_story, $id_step, $help, $text)
    {
        $enigmes = $this->StoriesManager->updateStepEnig($id_story, $id_step, $help, $text);
    }
}
