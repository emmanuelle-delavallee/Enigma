<?php

namespace Enigma;

require_once("Model/Manager.php");


class Enigma1Manager extends Manager
{

    // REF // FRONT/BACK : récupère les énigmes publiées de la BDD
    public function Enigma1Answer($story, $step)
    {
        $sql = "
                SELECT text
                FROM help 
                WHERE help='0' 
                and id_story = ? 
                and id_step = ?
            ";

        return $this->createQuery($sql, array($story, $step));
    }

    // REF // FRONT/BACK : récupère les énigmes publiées de la BDD
    public function Enigma1Help($story, $step)
    {
        $sql = "
                  SELECT text
                  FROM help 
                  WHERE help='1' 
                  and id_story = ? 
                  and id_step = ?
              ";

        return $this->createQuery($sql, array($story, $step));
    }
}
