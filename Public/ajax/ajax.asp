<% dim fname,city fname=Request.Form("name") city=Request.Form("city")
Response.Write("Dear " & fname & ". ") Response.Write("Hope you live well in " &
city & ".") %>




<?php
if ($responses != false) {
    foreach ($responses as $response) {
?>

        <div class="card grey lighten-5 comm-card">
            <div class="row">
                <div class="col s12 m12 l10">
                    <span class="card-title"> <strong><?= $response->comment_title ?> - <?= $response->note ?>/5 </strong> </span>
                    <p class="grey-text text-darken-1">Publié le <?= date("d/m/Y", strtotime($response->date)) ?> au sujet de l'aventure <?= $response->name ?></p>
                    <p><?= nl2br($response->comment) ?></p>
                    <a href="warning-comment-<?= $response->id ?>" class="right cyan-text text-darken-2">Signaler ce commentaire</a>
                </div>

                <div class="col s12 m12 l2 center">
                    <img class="circle user_img" src="Public/img/users/<?= $response->image ?>" alt="user_img" id="user_img_comments">
                    <p><?= $response->pseudo ?></p>
                </div>
            </div>
        </div>

<?php
    }
}
?>
<ul class="pagination center">
    <li class="waves-effect"><a href="comments-<?= $pageEncours - 1 ?>"><i class="material-icons">chevron_left</i></a></li>

    <?php

    $i = 1;

    // Boucle pour afficher la liste des pages de commentaire 
    while ($i <= $pagetotal) :

        if ($i == $pageEncours) {
            echo '<li class="active cyan"><a href="#">' . $i . '</a></li>';
        } else {
            echo  '<li class="waves-effect"><a href="comments-' . $i . '">' . $i . '</a></li>';
        }

        $i++;

    endwhile;
    if ($pageEncours == $pagetotal) {
        $pageEncours--;
    }
    ?>
    <li class="waves-effect"><a href="comments-<?= $pageEncours + 1 ?>"><i class="material-icons">chevron_right</i></a></li>
</ul>
