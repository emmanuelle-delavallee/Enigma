<?php

namespace Enigma;

require_once("Model/Manager.php");


class StoriesManager extends Manager
{

    // FRONT/BACK : récupère les énigmes
    public function getEnigmas()
    {
        $sql = "
                SELECT stories.id, 
                       stories.name, 
                       stories.resume,
                       stories.image,
                       stories.steps
                FROM stories 
            ";

        return $this->createQuery($sql);
    }

    //-------------------------------------------------------------//

    // FRONT/BACK : récupère la progression des utilisateurs 
    public function getEnigmasUser()
    {
        $sql = "
              SELECT  distinct stories.id, 
                     stories.name, 
                     stories.resume,
                     stories.image,
                     stories.steps,
                     progress.id_user
              FROM stories 
              left join progress on progress.id_story = stories.id and progress.id_user = ? 
               
          ";

        return $this->createQuery($sql, [$_SESSION['id_user']]);
    }

    //-------------------------------------------------------------//

    // FRONT/BACK : récupère les indices et solutions des énigmes 
    public function getIndices()
    {
        $sql = "
                  SELECT id_story, 
                         help, 
                         text,
                         id_step
                  FROM help 
              ";

        return $this->createQuery($sql);
    }

    //-------------------------------------------------------------//

    // FRONT/BACK : récupère les images de la BDD
    public function getImgs()
    {
        $sql = "
                SELECT stories.image 
                FROM stories 
                
            ";

        return $this->createQuery($sql);
    }


    //-------------------------------------------------------------//

    // FRONT : récupère une énigme 
    public function getEnigma()
    {

        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $id = $_GET['id'];
        } else {
            $id = 1;
        }

        $sql = "
        SELECT stories.id, 
               stories.name, 
               stories.resume,
               stories.image,
               stories.steps     
        FROM stories 
        WHERE id = ?
       
    ";

        return $this->createQuery($sql, array($id));
    }


    //-------------------------------------------------------------//

    // BACK : met à jour les indices et solutions dans la BDD
    public function updateStepEnig($id_story, $id_step, $help, $text)
    {
        $sql = "UPDATE help SET help.text=? WHERE help.id_story=? and help.id_step=? and help.help =?";

        $this->createQuery($sql, [$text, $id_story, $id_step, $help]);
    }
}
