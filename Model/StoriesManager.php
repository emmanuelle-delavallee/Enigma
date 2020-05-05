<?php

namespace Enigma;

require_once("Model/Manager.php");


class StoriesManager extends Manager
{

    // REF // FRONT/BACK : récupère les énigmes publiées de la BDD
    public function getEnigmas()
    {
        $sql = "
                SELECT stories.id, 
                       stories.name, 
                       stories.resume,
                       stories.image,
                       stories.steps,   
                       stories.published   
                FROM stories 
                WHERE published='1' 
            ";

        return $this->createQuery($sql);
    }


    //-------------------------------------------------------------//

    // REF // FRONT/BACK : récupère les énigmes publiées de la BDD
    public function getAllEnigmas()
    {
        $sql = "
                    SELECT stories.id, 
                           stories.name, 
                           stories.resume,
                           stories.image,
                           stories.steps,   
                           stories.published   
                    FROM stories 
                ";

        return $this->createQuery($sql);
    }



    //-------------------------------------------------------------//

    // REF // FRONT: récupère les images de la BDD
    public function getImgs()
    {
        $sql = "
                SELECT stories.image,
                       stories.published   
                FROM stories 
                WHERE published='1' 
            ";

        return $this->createQuery($sql);
    }


    //-------------------------------------------------------------//

    // REF // FRONT : récupère une énigme publiée de la BDD
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
               stories.steps,
               stories.published      
        FROM stories 
        WHERE id = ?
        AND published='1' 
    ";

        return $this->createQuery($sql, array($id));
    }
}
