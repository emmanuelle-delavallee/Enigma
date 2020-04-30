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

    // REF // FRONT : récupère une énigme publiée de la BDD
    public function getEnigma()
    {

        $sql = "
        SELECT stories.id, 
               stories.name, 
               stories.resume,
               stories.image,
               stories.steps,
               stories.published      
        FROM stories 
        WHERE id = '{$_GET['id']}'
        AND published='1' 
    ";

        return $this->createQuery($sql);
    }
}
