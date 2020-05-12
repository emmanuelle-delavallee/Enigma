<?php ob_start();

// Page accessible aux administrateurs qui ont une session active
if ($checkIfAdmin == 0) {
    header("Location:login");
} ?>

<h2>Tableau de bord</h2>
<a class="waves-effect waves-light btn cyan darken-2 right" href="adminEnigmas">Gestion des énigmes</a>
<br>

<!--STATISTIQUES-->
<section>
    <div class="col s12 valign-wrapper">
        <h4 class="right-align">Statistiques </h4>
        <button class="waves-effect btn-flat right-align" id="stats-up"><i class="material-icons" id="stats-up-icon">arrow_drop_up</i></button>
    </div>

    <div class="col s12 stats-slide-hide">
        <p>Insérer ici des statistiques</p>
    </div>
</section>
<br>

<!--COMMENTAIRES-->
<section>
    <div class="col s12 valign-wrapper">
        <h4 class="right-align">Commentaires</h4>
        <button class="waves-effect btn-flat right-align" id="comments-up"><i class="material-icons" id="comments-up-icon">arrow_drop_up</i></button>
    </div>

    <div class="col s12 comments-slide-hide">

        <table class="responsive-table">
            <thead>
                <tr>
                    <th>Enigme</th>
                    <th>Titre du commentaire</th>
                    <th>Auteur</th>
                </tr>
            </thead>

            <tbody>

                <?php
                if (!empty($comments)) {
                    foreach ($comments as $comment) {

                ?>
                        <tr>

                            <td><?= $comment->name ?></td>

                            <td><?php if ($comment->comment_status == '2') { ?> <i class="material-icons red-text text-darken-1 left"> priority_high</i> <?php } ?> <?= $comment->comment_title ?> </td>

                            <td><?= $comment->pseudo ?></td>
                            <td><a href="#comment_<?= $comment->id ?>" class="btn-floating btn-small waves-effect waves-light cyan darken-2 modal-trigger" id="dashboard-btn"><i class="material-icons">add</i></a></td>

                            <!--Modal-->
                            <div class="modal" id="comment_<?= $comment->id ?>">
                                <div class="modal-content">
                                    <h4><?= $comment->comment_title ?></h4>
                                    <p>Commentaire posté par <?= "<strong>" . $comment->pseudo . "</strong> le " . date("d/m/Y", strtotime($comment->date)) ?>, à propos de l'aventure <?= $comment->name ?></p>
                                    <hr>
                                    <p> <?= nl2br($comment->comment) ?></p>
                                </div>

                                <div class="modal-footer">
                                    <a href="comment-<?= $comment->id ?>-validated" class="modal-action modal-close btn-floating btn-small waves-effect waves-light cyan darken-2"><i class="material-icons">done</i></a>
                                    <a href="comment-<?= $comment->id ?>-deleted" class="modal-action modal-close btn-floating btn-small waves-effect waves-light red darken-1"><i class="material-icons">delete</i></a>
                                </div>
                            </div>
                        </tr>

                    <?php
                    }
                } else {
                    ?>
                    <tr>
                        <td></td>
                        <td>Aucun commentaire à valider</td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</section>
<br>

<!--ADMINISTRATEURS-->
<section>
    <div class="col s12 valign-wrapper">
        <h4 class="right-align">Administrateurs </h4>
        <button class="waves-effect btn-flat right-align" id="admins-up"><i class="material-icons" id="admins-up-icon">arrow_drop_up</i></button>
    </div>

    <div class="col s12 admins-slide-hide">
        <table class="responsive-table">

            <thead>
                <tr>
                    <th>Pseudo</th>
                    <th>Email</th>
                    <th><a href="#adminCreate" class="btn-floating btn-small waves-effect waves-light cyan darken-2 modal-trigger" id="dashboard-btn"><i class="material-icons">add</i></a></th>
                </tr>
            </thead>

            <tbody>
                <?php
                if (!empty($admins)) {
                    foreach ($admins as $admin) {

                ?>
                        <tr>
                            <td><?= $admin->pseudo ?></td>
                            <td><?= $admin->email ?></td>
                            <td><a href="#adminDelete" class="btn-floating btn-small waves-effect waves-light red darken-1 modal-trigger" id="dashboard-btn"><i class="material-icons">delete</i></a></td>

                            <div class="modal" id="adminDelete">
                                <div class="modal-content">
                                    <h4>Droits d'administration du compte n°<?= $admin->id ?> ?</h4>
                                    <p class="grey-text darken-2">Ce compte sera défini comme utilisateur et n'aura plus accès à l'administration</p>
                                    <p>Pseudo : <?= $admin->pseudo ?></p>
                                    <p>Email : <?= $admin->email ?></p>
                                </div>
                                <div class="modal-footer">
                                    <a href="admin-<?= $admin->id ?>-deleted" class="modal-action modal-close btn-floating btn-small waves-effect waves-light red darken-1"><i class="material-icons">delete</i></a>
                                </div>
                            </div>
                    <?php
                    }
                }
                    ?>

                    <div class="modal" id="adminCreate">
                        <div class="modal-content">

                            <h4 class="center">Ajouter un administrateur</h4>

                            <p class="grey-text darken-2 center">Ce compte utilisateur sera défini comme administrateur</p>

                            <!-- Formulaire d'inscription d'un nouvel admin -->
                            <form action="addAdmin" method="post">
                                <div class="row">
                                    <div class="input-field col s10 m8 l4 offset-l4">
                                        <input type="text" name="pseudo" id="pseudo">
                                        <label for="pseudo">Pseudo</label>
                                    </div>

                                    <div class="col s10 m8 l6 offset-l3 center-align">
                                        <button type="submit" name="submit" class="modal-action modal-close btn-floating btn-small waves-effect waves-light cyan darken-2"><i class="material-icons">done</i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                        </tr>
            </tbody>
        </table>
    </div>

</section>

<?php $content = ob_get_clean(); ?>

<?php require('View/template/template.php'); ?>