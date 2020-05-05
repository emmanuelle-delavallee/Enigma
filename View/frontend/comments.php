<?php ob_start(); ?>

</div>

<div class="comments-background">


    <div class="container discover-container">

        <h2 class="page-title center white-text">Vos commentaires</h2>


        <!-- BTN ECRIRE UN COMMENTAIRE -->
        <div class="fixed-action-btn">
            <a class="btn-floating modal-trigger btn-large white" href="#addAComment"><i class="large material-icons cyan-text text-darken-2">mode_edit</i></a>
        </div>


        <!-- COMMENTAIRES -->
        <div class="container">
            <div class="col s12 m12 l12">

                <?php
                if ($responses != false) {
                    foreach ($responses as $response) {
                ?>

                        <div class="card grey lighten-5 comm-card">
                            <div class="row">
                                <div class="col s12 m12 l10">
                                    <span class="card-title"> <strong> <?= $response->comment_title ?> - <?= $response->note ?>/5 </strong> </span>
                                    <p class="grey-text text-darken-1">Publié le <?= date("d/m/Y", strtotime($response->date)) ?> au sujet de l'aventure <?= $response->name ?></p>
                                    <p><?= nl2br($response->comment) ?></p>
                                    <a href="index.php?url=warning&id=<?= $response->id ?>" class="right cyan-text text-darken-2">Signaler ce commentaire</a>
                                </div>

                                <div class="col s12 m12 l2 center">
                                    <img class="circle user_img" src="Public/img/2.jpg" alt="user_img" id="user_img_comments">
                                    <p><?= $response->pseudo ?></p>
                                </div>
                            </div>
                        </div>

                <?php
                    }
                }
                ?>

            </div>
        </div>


        <!-- POSTER UN COMMENTAIRE -->
        <?php
        if (isset($_POST['submit'])) {

            // Trim supprime l'espace avant le mot 
            $id_story = htmlspecialchars(trim($_POST['id_story']));
            $pseudo = $_SESSION['username'];
            $comment_title = htmlspecialchars(trim($_POST['comment_title']));
            $comment = htmlspecialchars(trim($_POST['comment']));
            $note = $_POST['note'];


            // Stocke les erreurs dans un tableau pour pouvoir les afficher
            $errors = [];

            // Vérifie que les champs ont bien été complétés
            if (empty($id_story) || empty($comment_title) || empty($comment) || empty($note)) {
                $errors['empty'] = "Tous les champs n'ont pas été complétés";
            }

            // Vérifie qu'un utilisateur soit connecté
            if (empty($pseudo)) {
                $errors['name'] = "Vous devez être connecté pour poster un commentaire";
            }

            // Affiche les erreurs si existantes
            if (!empty($errors)) {
        ?>
                <div class="card red">
                    <div class="card-content white-text">
                        <?php
                        foreach ($errors as $error) {
                            echo $error . "<br/>";
                        }

                        ?>
                    </div>
                </div>
        <?php
            }
        }
        ?>


        <!-- MODAL AJOUTER UN COMMENTAIRE -->
        <div class="modal bottom-sheet" id="addAComment">
            <div class="modal-content">
                <div class="col s12 m12 l12">
                    <div class="row">
                        <h4 cLass="center">Ajouter un commentaire</h4>
                        <section class="col col s12 m4 l8 offset-l2">
                            <p class="center">
                                <?php
                                if (isset($_SESSION['username']) && $_SESSION['username'] != "") {
                                ?>
                                    Vous êtes connecté en tant que : <?= $_SESSION['username'] ?>
                                <?php } else {
                                ?>
                                    Vous devez être connecté pour poster un avis
                            </p>
                        <?php
                                }
                        ?>
                        <br>
                        <form action="index.php?url=addNewComment" method="post">
                            <!--INPUT NOTATION PAR ETOILES-->
                            <input type="hidden" id="idNote" name="note" value="" />

                            <div class="input-field col s12 m6 l3">
                                <select name="id_story" id="id_story">
                                    <option value="1">Lucky Luke et la locomotive piégée</option>
                                    <option value="2">Enigme 2</option>
                                    <option value="3">Enigme 3</option>
                                </select>
                                <label for="id_story">Sélectionner l'énigme</label>
                            </div>

                            <div class="input-field col s12 m6 l7">
                                <input type="text" name="comment_title" id="comment_title">
                                <label for="comment_title">Titre du commentaire</label>
                            </div>

                            <!--NOTATION PAR ETOILES-->
                            <div class='rating-widget col s12 m6 l2'>
                                <div class='rating-stars'>
                                    <label for="stars">Voter pour cette aventure</label>
                                    <ul id='stars'>
                                        <li class='star' title='Poor' data-value='1'>
                                            <i class='fa fa-star fa-fw'></i>
                                        </li>
                                        <li class='star' title='Fair' data-value='2'>
                                            <i class='fa fa-star fa-fw'></i>
                                        </li>
                                        <li class='star' title='Good' data-value='3'>
                                            <i class='fa fa-star fa-fw'></i>
                                        </li>
                                        <li class='star' title='Excellent' data-value='4'>
                                            <i class='fa fa-star fa-fw'></i>
                                        </li>
                                        <li class='star' title='WOW!!!' data-value='5'>
                                            <i class='fa fa-star fa-fw'></i>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="input-field col s12 m8 l12">
                                <textarea name="comment" id="comment" class="materialize-textarea"></textarea>
                                <label for="comment">Rédiger le commentaire</label>
                            </div>

                            <div class="col s12 m6 l12 center">
                                <button type="submit" name="submit" class="btn waves-effect waves-light cyan darken-2">Poster mon commentaire</button>
                            </div>
                        </form>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('View/template/template.php'); ?>