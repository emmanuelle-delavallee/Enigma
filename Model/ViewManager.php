<?php

namespace Enigma;

use Exception;

require_once("Model/Manager.php");

class ViewManager extends Manager
{
    // Nom du fichier associé à la vue
    private $file;
    // Titre de la vue (défini dans le fichier vue)
    private $title;



    // Génère et affiche la vue
    public function render($action, $data)
    {
        // Détermination du nom du fichier vue à partir de l'action
        $this->file = "View/" . $action . ".php";

        // Génération de la partie spécifique de la vue
        $content = $this->renderFile($this->file, $data);

        // Génération du template commun utilisant la partie spécifique
        $view = $this->renderFile(
            'View/template/template.php',
            [
                'title' => $this->title,
                'content' => $content
            ]
        );

        // Renvoi de la vue au navigateur
        echo $view;
    }


    // Génère un fichier vue et renvoie le résultat produit
    private function renderFile($file, $data)
    {
        if (file_exists($file)) {
            // Rend les éléments du tableau $donnees accessibles dans la vue
            extract($data);
            // Démarrage de la temporisation de sortie
            ob_start();
            // Inclut le fichier vue
            // Son résultat est placé dans le tampon de sortie
            require $file;
            // Arrêt de la temporisation et renvoi du tampon de sortie
            return ob_get_clean();
        }
        throw new Exception("Fichier '$file' introuvable");
    }
}
