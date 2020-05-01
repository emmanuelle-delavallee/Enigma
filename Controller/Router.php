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
                            $this->FrontendController->addUserComment($_POST['id_story'], $_SESSION['admin'], $_POST['comment_title'], $_POST['comment'], $_POST['note']);
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


                        // Afficher la page d'intro de l'énigme 1
                    case 'enigma':

                        if (isset($_GET['id']) && $_GET['id'] > 0) {
                            $this->FrontendController->enigma();
                        } else {
                            throw new Exception('Aucun identifiant d\'énigme envoyé');
                        }
                        break;



                        // Afficher la page d'intro de l'énigme 1
                    case 'enigma1-step1':
                        $this->FrontendController->enigma1step1();
                        break;

                        // Afficher la page d'intro de l'énigme 2
                    case 'enigma1-step2':
                        $res = 1;
                        if (isset($_POST['submit'])) {

                            // Trim supprime l'espace avant le mot 
                            $reponse = htmlspecialchars(trim($_POST['reponse']));

                            // Vérifie que les champs ont bien été complétés
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
                            $this->FrontendController->enigma1step1();
                        } else {
                            $this->FrontendController->enigma1step2();
                        }

                        break;

                        // Afficher la page d'intro de l'énigme 2
                    case 'enigma1-step3':
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
                            $this->FrontendController->enigma1step2();
                        } else {
                            $this->FrontendController->enigma1step3();
                        }

                        break;

                        // Afficher la page login (utilisateurs)
                    case 'enigma1-done':

                        if (isset($_GET['id']) && $_GET['id'] > 0) {
                            $this->FrontendController->enigma1done($_GET['id']);
                        } else {
                            $this->FrontendController->enigma1step3();
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
                                $this->BackendController->adminDashboard();
                            } else {
                                $this->FrontendController->usersDashboard();
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
