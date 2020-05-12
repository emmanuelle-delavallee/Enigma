<?php ob_start(); ?>

</div>
<div class="container">
    <div class="col s12">

        <div class="fixed-action-btn">
            <a class="btn-floating btn-large waves-effect waves-light teal">
                <i class="large material-icons">lightbulb_outline</i>
            </a>
            <ul>
                <li><a class="btn-floating waves-effect waves-light orange modal-trigger" href="#answerModal"><i class="material-icons">priority_high</i></a></li>
                <li><a class="btn-floating waves-effect waves-light amber modal-trigger" href="#helpModal"><i class="material-icons">lightbulb_outline</i></a></li>
            </ul>
        </div>
        <?php
        if (isset($_POST['submit11'])) {

            // Trim supprime l'espace avant le mot 
            $answer11 = htmlspecialchars(trim($_POST['answer11']));


            // Stocke les erreurs dans un tableau pour pouvoir les afficher
            $errors = [];

            // Vérifie que les champs ont bien été complétés
            if (empty($answer11)) {
                $errors['empty'] = "Il faut indiquer une réponse !";
            } else {
                if ($answer11 != "37") {
                    $errors['erreur'] = "Mauvaise réponse ! Réessayer ";
                }
            }

            // Affiche les erreurs si existantes
            if (!empty($errors)) {
        ?>
                <div class="card red error-message">
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
        <h5 class="enigmas-title center">Vous jouez aux échecs avec Jolly Jumper</h5>
        <h6 class="enigmas-subtitle">Pendant la partie, vous remarquez qu'il vous tend une énigme, trouverez-vous la réponse ?</h6>



        <!-- MODAL D'AIDE-->
        <div id="helpModal" class="modal">
            <div class="modal-content">
                <h4 class="center">Indice</h4>
                <p>
                    <?php if (!empty($helps)) {
                        foreach ($helps as $help) {
                            echo $help->text;
                        }
                    }
                    ?>
                </p>
            </div>
            <div class="modal-footer">
                <a href="#!" class="modal-close waves-effect waves-light btn btn-small cyan darken-2">Retour au jeu <i class="material-icons right">play_arrow</i></a>
            </div>
        </div>


        <!-- MODAL DE SOLUTION-->
        <div id="answerModal" class="modal">
            <div class="modal-content">
                <h4 class="center">Solution</h4>
                <p>
                    <?php if (!empty($responses)) {
                        foreach ($responses as $response) {
                            echo $response->text;
                        }
                    }
                    ?>
                </p>
            </div>
            <div class="modal-footer">
                <a href="#!" class="modal-close waves-effect waves-light btn btn-small cyan darken-2">Retour au jeu <i class="material-icons right">play_arrow</i></a>
            </div>
        </div>


        <!-- IMAGE-->
        <div class="col s12 m12 l10 center enigma-img">
            <img src="Public/img/lucky_luke/echec.png" alt="Jeux_dechecs_Lucky_Luke">
        </div>


        <!-- REPONSE-->
        <div class="row">
            <div class="col s12 m8 l4 offset-l4">
                <form action="index.php?url=enigma&id=1&step=2" method="post">
                    <br>
                    <div class="input-field">
                        <input type="text" name="answer11" id="answer11">
                        <label for="comment_title">Quelle est votre réponse ?</label>
                    </div>
                    <!-- BTN REPONSE -->
                    <div class="col s12 m6 l12 center">
                        <button type="submit" name="submit11" class="btn waves-effect waves-light teal enigma-submit-btn">Poster ma réponse</button>
                    </div>
                </form>
            </div>
        </div>


    </div>
</div>


<?php $content = ob_get_clean(); ?>


<?php require('View/template/template.php'); ?>