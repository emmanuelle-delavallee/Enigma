<?php

namespace Enigma;

require_once("Model/Manager.php");

class CommentsManager extends Manager
{

    /* Pour les commentaires : 
0 = En attente de validation mais visible sur le site
1 = Validé par un administrateur
2 = Signalé par un utilisateur
3 = Supprimé par un administrateur
*/

    //-------------------------------------------------------------//

    // REF // FRONT : Récupérer et afficher les commentaires avec pour valeur 0 ou 1
    public function getComments($page)
    {
        $com_min = ($page - 1) * 5 + 1;
        $com_max = $page * 5;

        $sql = "
        SELECT users_comments.id,
               users_comments.comment_title,
               users_comments.comment,
               users_comments.note,
               users_comments.date,
               users_comments.comment_status,
               users.pseudo,
               users.image,
               stories.name
        FROM users_comments  
        INNER JOIN users ON users.id = users_comments.id_user
        INNER JOIN stories ON stories.id = users_comments.id_story
        WHERE (comment_status = '0' or comment_status = '1')
        ORDER BY date DESC LIMIT " . $com_min . "," . $com_max . " 
        "; // Ne peut pas être transmis via ? et tableau car sinon les chiffres sont transmis en texte et ça ne marche pas 

        return $this->createQuery($sql);
    }

    // Connaitre le nombre de page necessaire pour afficher tout les commentaires 
    public function getPagesComments()
    {
        $sql = "
        SELECT count(users_comments.id) as nb_com
        FROM users_comments  
        WHERE (comment_status = '0' or comment_status = '1')
        ";

        $res_reqs = $this->createQuery($sql);
        $nb_commentaire = 0;
        foreach ($res_reqs  as   $res_req) {

            if ($res_req->nb_com > 0) {
                $nb_commentaire = ceil($res_req->nb_com / 5);
            }
        }

        return $nb_commentaire;
    }



    //-------------------------------------------------------------//
    // REF // FRONT : Envoyer un commentaire


    public function postComment($id_story, $pseudo, $comment_title, $comment, $note)
    {
        $sql = 'INSERT INTO users_comments(id_story, id_user, comment_title, comment, note, date)'
            . ' VALUES(?, 
            (select id from users where pseudo = ?),
            ?, 
            ?,
             ?, NOW())';

        $this->createQuery($sql, array($id_story, $pseudo, $comment_title, $comment, $note));
    }




    //-------------------------------------------------------------//

    // REF // FRONT : Signaler un commentaire 
    public function warnAComment($commentid)
    {

        $sql = "UPDATE users_comments SET comment_status='2'  WHERE id=" . $commentid;

        return $this->createQuery($sql);
    }



    //-------------------------------------------------------------//

    // REF // BACK : Récupère les commentaires non lus ou signalés de la base de données
    public function getUnreadComments()
    {
        $sql = "
        SELECT  users_comments.id,
                users_comments.comment_title,
                users_comments.comment,
                users_comments.date,
                users_comments.comment_status,
                users.pseudo,
                users.image,
                stories.name
        FROM users_comments
        INNER JOIN users ON users.id = users_comments.id_user
        INNER JOIN stories ON stories.id = users_comments.id_story
        WHERE users_comments.comment_status = '0' or users_comments.comment_status = '2'
        ORDER BY users_comments.date ASC
    ";

        return $this->createQuery($sql);
    }


    //-------------------------------------------------------------//

    // REF // BACK : Valider un commentaire
    public function validAComment($commentid)
    {
        $sql = "UPDATE users_comments SET comment_status='1'  WHERE id=" . $commentid;
        $this->createQuery($sql, [$commentid]);
    }


    //-------------------------------------------------------------//

    // REF // BACK : Supprimer un commentaire mais le conserver en base
    public function deleteAComment($commentid)
    {
        $sql = "UPDATE users_comments SET comment_status='3'  WHERE id=" . $commentid;

        $this->createQuery($sql, [$commentid]);
    }
}
