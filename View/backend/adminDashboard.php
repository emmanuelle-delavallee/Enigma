<?php
// Page accessible aux administrateurs qui ont une session active
if ($checkIfAdmin == 0) :
    header("Location:login");
endif ?>

<?php $this->title = "Enigma - Administration"; ?>

<h2 class="page-title center">Tableau de bord</h2>
<a class="waves-effect waves-light btn cyan darken-2 right" href="adminEnigmas">Gestion des énigmes</a>
<br>

<!--STATISTIQUES-->
<section>
    <div class="col s12 valign-wrapper">
        <h4 class="right-align">Statistiques </h4>
        <button class="waves-effect btn-flat right-align" id="stats-up"><i class="material-icons" id="stats-up-icon">arrow_drop_up</i></button>
    </div>

    <div class="col s12 stats-slide-hide">

        <div class="row">

            <?php

            // Affiche le nom des tables et le nombre d'entrées de chacune des tables

            $i = 0;

            foreach ($tables as $table_name => $table) : ?>

                <div class="col l4 m4 s12">
                    <div class="card">
                        <div class="card-content cyan darken-2 white-text center">

                            <h6 class="card_title"><?= $table_name ?></h6>

                            <h5 id="dashboard-subtitle"><?= $nbrInTable[$i]; ?></h5>

                        </div>
                    </div>
                </div>

            <?php $i = $i + 1;
            endforeach; ?>

        </div>
    </div>
</section>
<br>

<!--COMMENTAIRES-->
<div id="reloadableContainerCom">
    <div id="reloadableContentCom">
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
                            <th> </th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php if (!empty($comments)) :
                            foreach ($comments as $comment) : ?>
                                <tr>

                                    <td><?= $comment->name ?></td>

                                    <td><?php if ($comment->comment_status == '2') : ?> <i class="material-icons red-text text-darken-1 left"> priority_high</i> <?php endif ?> <?= $comment->comment_title ?> </td>

                                    <td><?= $comment->pseudo ?></td>
                                    <td><button class="btn cyan darken-2" id="<?= $comment->id . "AddComm" ?>" onclick="ValidComEtRefresh(<?= $comment->id ?>)"><i class="material-icons">done</i></button>
                                        <button class="btn red" id="<?= $comment->id . "DelCom" ?>" onclick="SuppComEtRefresh(<?= $comment->id ?>)"><i class="material-icons">delete</i></button>
                                    </td>

                                </tr>

                            <?php endforeach;
                        else : ?>
                            <tr>
                                <td></td>
                                <td>Aucun commentaire à valider</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

        </section>
    </div>
</div>
<br>

<!--ADMINISTRATEURS-->


<section>

    <div id="reloadableContainer">
        <div id="reloadableContent">

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

                        <?php if (!empty($admins)) :
                            foreach ($admins as $admin) : ?>
                                <tr>

                                    <td><?= $admin->pseudo ?></td>
                                    <td><?= $admin->email ?></td>
                                    <td><button class="btn red" id="<?= $admin->id ?>" onclick="SuppEtRefresh(<?= $admin->id ?>)"><i class="material-icons">delete</i></button></td>

                                </tr>

                        <?php
                            endforeach;
                        endif;
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <div class="modal" id="adminCreate">
        <div class="modal-content">

            <h4 class="center">Ajouter un administrateur</h4>

            <p class="grey-text darken-2 center">Ce compte utilisateur sera défini comme administrateur</p>

            <!-- Formulaire d'inscription d'un nouvel admin -->
            <form action="addAdmin" method="post" id="adminForm">
                <div class="row">
                    <div class="input-field col s10 m8 l4 offset-l4">
                        <input type="text" name="pseudo" id="pseudo">
                        <label for="pseudo">Pseudo</label>
                    </div>

                    <div class="col s10 m8 l6 offset-l3 center-align">
                        <button type="submit" name="submit" class="modal-action modal-close btn-floating btn-small waves-effect waves-light cyan darken-2"><i class=" material-icons">done</i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>