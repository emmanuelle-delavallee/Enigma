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
            if (isset($_GET['url'])) {

                // Selon l'URL
                switch ($_GET['url']) {

                    case 'AddImage':

                        $image =  isset($_FILES['image']['name']) ?  $_FILES['image']['name'] : '';

                        if (!empty($image)) {

                            $extensions = ['.png', '.jpg', '.jpeg', '.gif', '.PNG', '.JPG', '.JPEG', '.GIF'];


                            // Récupère l'extension du fichier
                            $extension = strrchr($image, '.');


                            // Vérifie si l'extension du fichier sélectionné est dans le tableau extensions
                            if (in_array($extension, $extensions)) {
                                $this->FrontendController->editUser($_SESSION['username'], $_FILES['image']['tmp_name'], $extension);
                            }
                        }
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
                        $this->FrontendController->comments();
                        break;


                        // Poste un nouveau commentaire
                    case 'addNewComment':
                        if (!empty($_POST['id_story']) && !empty($_SESSION['username']) && !empty($_POST['comment_title']) && !empty($_POST['comment']) && !empty($_POST['note'])) {
                            $this->FrontendController->addUserComment($_POST['id_story'], $_SESSION['username'], $_POST['comment_title'], $_POST['comment'], $_POST['note']);
                            $this->FrontendController->comments();
                        } else {
                            throw new Exception('Tous les champs ne sont pas remplis !');
                        }
                        break;


                        // Alerter un commentaire
                    case 'warning':
                        if (isset($_GET['id']) && $_GET['id'] > 0) {
                            $this->FrontendController->warningAComment($_GET['id']);
                            $this->FrontendController->comments();
                        } else {
                            throw new Exception('Aucun identifiant de billet envoyé');
                        }
                        break;


                        // Enigmes cas = id d'égnigme
                    case 'enigma':

                        if (isset($_SESSION['username']) && $_SESSION['username'] != "") {

                            switch ($_GET['id']) {

                                    // Enigme n°2
                                case '1':

                                    switch ($_GET['step']) {


                                            // Afficher la page d'intro de l'énigme 1
                                        case 'start':

                                            if (isset($_GET['id']) && $_GET['id'] > 0) {
                                                $this->FrontendController->enigma();
                                            } else {
                                                throw new Exception('Aucun identifiant d\'énigme envoyé');
                                            }
                                            break;



                                            // Afficher la page 1 de l'énigme 1
                                        case '1':
                                            $this->FrontendController->enigmastep('1', '1');
                                            break;



                                            // Afficher la page 2 de l'énigme 1
                                        case '2':
                                            $res = 1;
                                            if (isset($_POST['submit'])) {

                                                $reponse = htmlspecialchars(trim($_POST['reponse']));

                                                if (empty($reponse)) {
                                                    $res = 0;
                                                } else {
                                                    if ($reponse != "37") {
                                                        $res = 0;
                                                    }
                                                }
                                            } else {
                                                $res = 0;
                                            }

                                            if ($res == 0) {
                                                $this->FrontendController->enigmastep('1', '1');
                                            } else {

                                                $this->FrontendController->enigmastep('1', '2');
                                            }
                                            break;



                                            // Afficher la page 3 de l'énigme 1
                                        case '3':
                                            $res = 1;
                                            if (isset($_POST['submit2'])) {

                                                // Trim supprime l'espace avant le mot 
                                                $reponse = htmlspecialchars(trim($_POST['reponse']));

                                                // Vérifie que les champs ont bien été complétés
                                                if (empty($reponse)) {
                                                    $res = 0;
                                                } else {
                                                    if ($reponse != "2") {
                                                        $res = 0;
                                                    }
                                                }
                                            } else {
                                                $res = 0;
                                            }

                                            if ($res == 0) {
                                                $this->FrontendController->enigmastep('1', '2');
                                            } else {
                                                $this->FrontendController->enigmastep('1', '3');
                                            }

                                            break;


                                            // Afficher la page finale de l'énigme 1
                                        case 'done':

                                            if (isset($_GET['idending']) && $_GET['idending'] > 0) {
                                                $this->FrontendController->enigmadone($_GET['idending']);
                                            } else {
                                                $this->FrontendController->enigmastep('1', '3');
                                            }

                                            break;
                                    }
                                    break;


                                    // Enigme n°2
                                case '2':
                                    switch ($_GET['step']) {


                                            // Afficher la page d'intro de l'énigme 2
                                        case 'start':

                                            if (isset($_GET['id']) && $_GET['id'] > 0) {
                                                $this->FrontendController->enigma();
                                            } else {
                                                throw new Exception('Aucun identifiant d\'énigme envoyé');
                                            }
                                            break;


                                            // Afficher la page 1 de l'énigme 2
                                        case '1':
                                            $this->FrontendController->enigmastep('2', '1');
                                            break;


                                            // Afficher la page 2 de l'énigme 2
                                        case '2':

                                            if (isset($_POST['group1']) && isset($_POST['group2']) && isset($_POST['group3'])) {
                                                $answer1 = $_POST['group1'];
                                                $answer2 = $_POST['group2'];
                                                $answer3 = $_POST['group3'];

                                                if (($answer1 == '2') && ($answer2 == '4') && ($answer3 == '3')) {
                                                    $this->FrontendController->enigmastep('2', '2');
                                                } else {
                                                    $this->FrontendController->enigmastep('2', '1');
                                                }
                                            } else {
                                                $this->FrontendController->enigmastep('2', '1');
                                            }
                                            break;


                                            // Afficher la page 3 de l'énigme 2
                                        case '3':


                                            break;


                                            //

                                    }
                                    break;
                            }
                        } else {
                            $this->FrontendController->login();
                        }
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
                        if (isset($_GET['id']) && $_GET['id'] > 0) {
                            $this->BackendController->deleteAdmin($_GET['id']);
                            $this->BackendController->adminDashboard();
                        } else {
                            throw new Exception('Aucun identifiant de compte envoyé');
                        }
                        break;


                        // Ajouter les droits d'administration d'un utilisateur (admin)
                    case 'addAdmin':
                        if (isset($_POST['pseudo'])) {
                            $this->BackendController->addAdmin($_POST['pseudo']);
                            $this->BackendController->adminDashboard();
                        } else {
                            throw new Exception('Aucun pseudo envoyé');
                        }
                        break;



                        // Si URL = checklogin, vérifie que les champs ne soient pas vides, s'ils sont valides : dashboard, sinon page login
                    case 'checklogin':
                        if (!empty($_POST['pseudo']) && !empty($_POST['password'])) {
                            if ($this->FrontendController->checkLogin($_POST['pseudo'], $_POST['password']) == 1) {
                                $_SESSION['username'] = $_POST['pseudo'];


                                if ($this->FrontendController->checkAdmin() == 1) {
                                    $_SESSION['admin'] = 'VRAI';
                                    $this->BackendController->adminDashboard();
                                } else {
                                    $this->FrontendController->usersDashboard();
                                }
                            } else {
                                $this->FrontendController->login();
                            }
                        } else {
                            $this->FrontendController->login();
                        }
                        break;


                        // Ajouter un nouvel administrateur ou modérateur 
                    case 'newUser':
                        if (!empty($_POST['pseudo']) && !empty($_POST['email']) && !empty($_POST['repeat_email']) && !empty($_POST['password']) && !empty($_POST['repeat_password'])) {
                            if ($_POST['email'] == $_POST['repeat_email'] && $_POST['password'] == $_POST['repeat_password']) {

                                if ($this->FrontendController->checkUser($_POST['pseudo']) == 0) {

                                    $this->FrontendController->addUser($_POST['pseudo'], $_POST['email'], $_POST['password']);
                                    $_SESSION['username'] = $_POST['pseudo'];
                                    $this->FrontendController->usersDashboard();
                                } else {
                                    throw new Exception('Le pseudo existe déjà !');
                                }
                            } else {
                                $this->FrontendController->login();
                            }
                        } else {
                            $this->FrontendController->login();
                        }
                        break;



                        // Déconnecter la session en cours
                    case 'logout':
                        $_SESSION['username'] = "";
                        $_SESSION['admin'] = '';
                        $this->FrontendController->home();
                        break;



                        // Valider la publication d'un commentaire
                    case 'validComment':
                        if (isset($_GET['id']) && $_GET['id'] > 0) {
                            $this->BackendController->validComment($_GET['id']);
                            $this->BackendController->adminDashboard();
                        } else {
                            throw new Exception('Aucun identifiant de commentaire envoyé');
                        }
                        break;



                        // Supprimer un commentaire publié
                    case 'deleteComment':
                        if (isset($_GET['id']) && $_GET['id'] > 0) {
                            $this->BackendController->deleteComment($_GET['id']);
                            $this->BackendController->adminDashboard();
                        } else {
                            throw new Exception('Aucun identifiant de commentaire envoyé');
                        }
                        break;



                        // Afficher la page de gestion des énigmes publiées(admin)
                    case 'adminEnigmas':
                        $this->BackendController->adminEnigmas();
                        break;



                        // Afficher la page de gestion des énigmes publiées/non-publiées(admin)
                    case 'adminAllEnigmas':
                        $this->BackendController->adminAllEnigmas();
                        break;


                        // Si aucune page n'est définie dans URL ou que la page d'existe pas, renvoi vers la page d'erreur
                    default:
                        $this->FrontendController->error();
                }



                // Si URL n'est pas définie, renvoi vers la page d'accueil
            } else {
                $this->FrontendController->home();
            }
        } catch (Exception $e) {
            echo 'Erreur : ' . $e->getMessage();
        }
    }
}
