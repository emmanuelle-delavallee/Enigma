<?php

namespace Enigma;

require_once("Model/Manager.php");


class Enigma1Manager extends Manager
{

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    // FRONT : récupère la réponse de l'énigme
    public function Enigma1Answer($story, $step)
    {
        $sql = "
                SELECT text
                from help 
                WHERE help='0'
                and id_story = ? 
                and id_step = ?
            ";

        return $this->createQuery($sql, array($story, $step));
    }


    //-------------------------------------------------------------//

    // FRONT : récupère l'indice de l'énigme
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

    //-------------------------------------------------------------//

    // FRONT : récupère la fin de l'énigme
    public function enigmaEnding($story, $id)
    {
        $sql = "
                    SELECT ending_title,
                    ending_image,
                    ending_text 
                    FROM ending 
                    WHERE id_story = ? 
                    and id_ending = ?
                ";

        return $this->createQuery($sql, array($story, $id));
    }


    //-------------------------------------------------------------//

    // FRONT/BACK : Insère en base la fin de l'énigme choisie

    public function postEnding($id_story, $user_name, $id_ending)
    {
        $sql = 'INSERT INTO progress(id_story, id_user, id_ending) VALUES(?, (select id from users where pseudo = ?), ?)';

        $this->createQuery($sql, array($id_story, $user_name, $id_ending));
    }
}
