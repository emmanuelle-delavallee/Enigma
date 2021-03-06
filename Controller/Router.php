<?php

namespace Enigma;

require 'Controller/BackendController.php';
require 'Controller/FrontendController.php';

use Exception;

class Router
{

    private $BackendController;
    private $FrontendController;

    public function __construct()
    {
        $this->BackendController = new BackendController();
        $this->FrontendController = new FrontendController();
    }

    public function routerRequest()
    {

        try {
            // Si URL existe
            if (isset($_GET['url'])) :

                // Selon l'URL
                switch ($_GET['url']):

                    case 'AddImage':

                        $image =  isset($_FILES['image']['name']) ?  $_FILES['image']['name'] : '';

                        if (!empty($image)) :

                            $extensions = ['.png', '.jpg', '.jpeg', '.gif', '.PNG', '.JPG', '.JPEG', '.GIF'];


                            // Récupère l'extension du fichier
                            $extension = strrchr($image, '.');


                            // Vérifie si l'extension du fichier sélectionné est dans le tableau extensions
                            if (in_array($extension, $extensions)) :
                                $this->FrontendController->editUser($_SESSION['username'], $_FILES['image']['tmp_name'], $extension);
                            endif;
                        endif;
                        $this->FrontendController->usersDashboard();

                        break;


                        // Afficher la page découvrir
                    case 'discover':
                        $this->FrontendController->discover();
                        break;

                        // Afficher la page jouer
                    case 'play':
                        $this->FrontendController->startToPlay();
                        break;


                        // Afficher la page avis
                    case 'comments':
                        $page = 1;
                        if (isset($_GET['page']) && $_GET['page'] > 0) :
                            $page = $_GET['page'];
                        endif;
                        $this->FrontendController->comments($page);
                        break;


                        // Poste un nouveau commentaire
                    case 'addNewComment':
                        if (!empty($_POST['id_story']) && !empty($_SESSION['username']) && !empty($_POST['comment_title']) && !empty($_POST['comment']) && !empty($_POST['note'])) :
                            $this->FrontendController->addUserComment($_POST['id_story'], $_SESSION['username'], htmlspecialchars(trim($_POST['comment_title'])), htmlspecialchars(trim($_POST['comment'])), $_POST['note']);
                            $this->FrontendController->comments('1');
                        else :
                            throw new Exception('Tous les champs ne sont pas remplis !');
                        endif;
                        break;


                        // Alerter un commentaire
                    case 'warning':
                        if (isset($_GET['id']) && $_GET['id'] > 0) :
                            $this->FrontendController->warningAComment($_GET['id']);
                            $this->FrontendController->comments('1');
                        else :
                            throw new Exception('Aucun identifiant de billet envoyé');
                        endif;
                        break;


                        // Enigmes cas = id d'égnigme
                    case 'enigma':

                        if (isset($_SESSION['username']) && $_SESSION['username'] != "") :

                            switch ($_GET['id']):

                                    // Enigme n°2
                                case '1':

                                    switch ($_GET['step']):


                                            // Afficher la page d'intro de l'énigme 1
                                        case 'start':

                                            if (isset($_GET['id']) && $_GET['id'] > 0) :
                                                $this->FrontendController->enigma();
                                            else :
                                                throw new Exception('Aucun identifiant d\'énigme envoyé');
                                            endif;
                                            break;



                                            // Afficher la page 1 de l'énigme 1
                                        case '1':
                                            $this->FrontendController->enigmastep('1', '1');
                                            break;



                                            // Afficher la page 2 de l'énigme 1
                                        case '2':
                                            $res = 1;
                                            if (isset($_POST['submit11'])) :

                                                $answer11 = htmlspecialchars(trim($_POST['answer11']));

                                                if (empty($answer11)) :
                                                    $res = 0;
                                                else :
                                                    if ($answer11 != "37") :
                                                        $res = 0;
                                                    endif;
                                                endif;
                                            else :
                                                $res = 0;
                                            endif;

                                            if ($res == 0) :
                                                $this->FrontendController->enigmastep('1', '1');
                                            else :

                                                $this->FrontendController->enigmastep('1', '2');
                                            endif;
                                            break;



                                            // Afficher la page 3 de l'énigme 1
                                        case '3':
                                            $res = 1;
                                            if (isset($_POST['submit12']) && isset($_POST['answer12'])) :

                                                // Trim supprime l'espace avant le mot 
                                                $answer12 = htmlspecialchars(trim($_POST['answer12']));

                                                // Vérifie que les champs ont bien été complétés
                                                if (empty($answer12)) :
                                                    $res = 0;
                                                else :
                                                    if ($answer12 != "2") :
                                                        $res = 0;
                                                    endif;
                                                endif;
                                            else :
                                                $res = 0;
                                            endif;

                                            if ($res == 0) :
                                                $this->FrontendController->enigmastep('1', '2');
                                            else :
                                                $this->FrontendController->enigmastep('1', '3');
                                            endif;

                                            break;


                                            // Afficher la page finale de l'énigme 1
                                        case 'done':

                                            if (isset($_GET['idending']) && $_GET['idending'] > 0) :
                                                $this->FrontendController->enigmadone('1', $_GET['idending'], $_SESSION['username']);
                                            else :
                                                $this->FrontendController->enigmastep('1', '3');
                                            endif;

                                            break;
                                    endswitch;
                                    break;


                                    // Enigme n°2
                                case '2':
                                    switch ($_GET['step']):


                                            // Afficher la page d'intro de l'énigme 2
                                        case 'start':

                                            if (isset($_GET['id']) && $_GET['id'] > 0) :
                                                $this->FrontendController->enigma();
                                            else :
                                                throw new Exception('Aucun identifiant d\'énigme envoyé');
                                            endif;
                                            break;


                                            // Afficher la page 1 de l'énigme 2
                                        case '1':
                                            $this->FrontendController->enigmastep('2', '1');
                                            break;


                                            // Afficher la page 2 de l'énigme 2
                                        case '2':

                                            if (isset($_POST['group1']) && isset($_POST['group2']) && isset($_POST['group3'])) :
                                                $answer1 = $_POST['group1'];
                                                $answer2 = $_POST['group2'];
                                                $answer3 = $_POST['group3'];

                                                if (($answer1 == '2') && ($answer2 == '4') && ($answer3 == '3')) :
                                                    $this->FrontendController->enigmastep('2', '2');
                                                else :
                                                    $this->FrontendController->enigmastep('2', '1');
                                                endif;
                                            else :
                                                $this->FrontendController->enigmastep('2', '1');
                                            endif;
                                            break;


                                            // Afficher la page 3 de l'énigme 2
                                        case '3':
                                            $res = 1;
                                            if (isset($_POST['submit22']) && isset($_POST['answer22'])) :

                                                // Trim supprime l'espace avant le mot 
                                                $answer22 = htmlspecialchars(trim($_POST['answer22']));

                                                // Vérifie que les champs ont bien été complétés
                                                if (empty($answer22)) :
                                                    $res = 0;
                                                else :
                                                    if ($answer22 != "3") :
                                                        $res = 0;
                                                    endif;
                                                endif;
                                            else :
                                                $res = 0;
                                            endif;

                                            if ($res == 0) :
                                                $this->FrontendController->enigmastep('2', '2');
                                            else :
                                                $this->FrontendController->enigmastep('2', '3');
                                            endif;


                                            break;


                                            // Afficher la page finale de l'énigme 1
                                        case 'done':

                                            if (isset($_GET['idending']) && $_GET['idending'] > 0) :
                                                $this->FrontendController->enigmadone('2', $_GET['idending'], $_SESSION['username']);
                                            else :
                                                $this->FrontendController->enigmastep('2', '3');
                                            endif;

                                            break;
                                    endswitch;
                                    break;
                            endswitch;
                        else :
                            $this->FrontendController->login();
                        endif;
                        break;


                        // Afficher la page login (utilisateurs)
                    case 'login':
                        $this->FrontendController->login();
                        break;


                        // Afficher la page dashboard (utilisateurs)
                    case 'usersDashboard':
                        $this->FrontendController->usersDashboard();
                        break;


                        // Afficher la page de connexion (admin)
                    case 'adminDashboard':
                        $this->BackendController->adminDashboard();
                        break;


                        // Supprimer les droits d'administration d'un utilisateur (admin)
                    case 'deleteAdmin':
                        if (isset($_GET['id']) && $_GET['id'] > 0) :
                            $this->BackendController->deleteAdmin($_GET['id']);
                        else :
                            throw new Exception('Aucun identifiant de compte envoyé');
                        endif;
                        break;


                        // Ajouter les droits d'administration d'un utilisateur (admin)
                    case 'addAdmin':
                        if (isset($_POST['pseudo'])) :
                            $this->BackendController->addAdmin(htmlspecialchars(trim($_POST['pseudo'])));
                            $this->BackendController->adminDashboard();
                        else :
                            throw new Exception('Aucun pseudo envoyé');
                        endif;
                        break;


                        // Si URL = checklogin, vérifie que les champs ne soient pas vides, s'ils sont valides : dashboard, sinon page login
                    case 'checklogin':
                        if (!empty($_POST['pseudo']) && !empty($_POST['password'])) :
                            if ($this->FrontendController->checkLogin(htmlspecialchars(trim($_POST['pseudo'])), htmlspecialchars(trim($_POST['password']))) == 1) :
                                $_SESSION['username'] = htmlspecialchars(trim($_POST['pseudo']));


                                if ($this->FrontendController->checkAdmin() == 1) :
                                    $_SESSION['admin'] = 'VRAI';
                                    $this->BackendController->adminDashboard();
                                else :
                                    $this->FrontendController->usersDashboard();
                                endif;
                            else :
                                $this->FrontendController->login();
                            endif;
                        else :
                            $this->FrontendController->login();
                        endif;
                        break;


                        // Ajouter un nouvel administrateur ou modérateur 
                    case 'newUser':
                        if (!empty($_POST['newpseudo']) && !empty($_POST['email']) && !empty($_POST['repeat_email']) && !empty($_POST['newpassword']) && !empty($_POST['repeat_password'])) :
                            if ($_POST['email'] == $_POST['repeat_email'] && $_POST['newpassword'] == $_POST['repeat_password']) :

                                if ($this->FrontendController->checkUser(htmlspecialchars(trim($_POST['newpseudo']))) == 0) :

                                    $this->FrontendController->addUser(htmlspecialchars(trim($_POST['newpseudo'])), htmlspecialchars(trim($_POST['email'])), htmlspecialchars(trim($_POST['newpassword'])));
                                    $_SESSION['username'] = htmlspecialchars(trim($_POST['newpseudo']));
                                    $this->FrontendController->usersDashboard();
                                else :
                                    throw new Exception('Le pseudo existe déjà !');
                                endif;
                            else :
                                $this->FrontendController->login();
                            endif;
                        else :
                            $this->FrontendController->login();
                        endif;
                        break;


                        // Déconnecter la session en cours
                    case 'logout':
                        $_SESSION['username'] = "";
                        $_SESSION['admin'] = '';
                        $_SESSION['id_user'] = '';
                        $this->FrontendController->home();
                        break;


                        // Afficher la page de mentions légales
                    case 'legal':
                        $this->FrontendController->legal();
                        break;

                        // Valider la publication d'un commentaire
                    case 'validComment':
                        if (isset($_GET['id']) && $_GET['id'] > 0) :
                            $this->BackendController->validComment($_GET['id']);

                        else :
                            throw new Exception('Aucun identifiant de commentaire envoyé');
                        endif;
                        break;


                        // Supprimer un commentaire publié
                    case 'deleteComment':
                        if (isset($_GET['id']) && $_GET['id'] > 0) :
                            $this->BackendController->deleteComment($_GET['id']);

                        else :
                            throw new Exception('Aucun identifiant de commentaire envoyé');
                        endif;
                        break;


                        // Afficher la page de gestion des énigmes publiées(admin)
                    case 'adminEnigmas':
                        $this->BackendController->adminEnigmas();
                        break;


                        // Met à jour les énigmes 
                    case 'updateEnigma':
                        if (isset($_GET['id']) && $_GET['id'] > 0) :
                            $this->BackendController->updateEnigma($_GET['id']);
                        else :
                            $this->BackendController->adminDashboard();
                        endif;
                        break;


                        // Met à jour les énigmes 
                    case 'updateStepEnigme':
                        if (!empty($_POST['indice'])) :
                            $this->BackendController->updateStepEnigme($_GET['id_story'], $_GET['id_step'], $_GET['help'], $_POST['indice']);
                        endif;
                        $this->BackendController->updateEnigma($_GET['id_story']);
                        break;



                        // Page d'erreur
                    case 'error':
                        $this->FrontendController->error();
                        break;


                        // Si aucune page n'est définie dans URL ou que la page d'existe pas, renvoi vers la page d'erreur
                    default:
                        $this->FrontendController->error();
                endswitch;



            // Si URL n'est pas définie, renvoi vers la page d'accueil
            else :
                $this->FrontendController->home();
            endif;
        } catch (Exception $e) {
            echo 'Erreur : ' . $e->getMessage();
        }
    }
}
