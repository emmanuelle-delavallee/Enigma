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
        if (isset($_POST['submit22'])) {

            if (isset($_POST['answer22'])) {

                $answer22 = $_POST['answer22'];


                // Stocke les erreurs dans un tableau pour pouvoir les afficher
                $errors = [];

                // Vérifie que les champs ont bien été complétés
                if (empty($answer22)) {
                    $errors['empty'] = "Il faut indiquer une réponse !";
                } else {
                    if ($answer22 != "3") {
                        $errors['erreur'] = "Mauvaise réponse ! Réessayer ";
                    }
                }
            } else {
                $errors['empty'] = "Il faut indiquer une réponse !";
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


        <h5 class="enigmas-title center">Sur le chemin pour Petibonum, vous traversez la forêt des Carnutes</h5>
        <h6 class="enigmas-subtitle">Il semble qu'un villageois ait perdu quelque chose dans cette forêt</h6>

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
            <img src="Public/img/asterix/asterix-2-4.png" alt="">
        </div>

        <!-- REPONSE-->
        <div class="row">
            <div class="col s12 m8 l4 offset-l4">
                <form action="enigma-2-step-3" method="post">
                    <div class="input-field col s12">
                        <select name="answer22" id="answer22">
                            <option value="" disabled selected>Quel est l'objet perdu ?</option>
                            <option value="1">Un marteau de Cétautomatix</option>
                            <option value="2">La serpe d'or de Panoramix</option>
                            <option value="3">Un poisson d'Ordalfabétix</option>
                            <option value="4">La canne d'Agecanonix</option>
                            <option value="5">La lyre d'Assurancetourix</option>
                        </select>
                    </div>


                    <!-- BTN REPONSE -->
                    <div class="col s12 m6 l12 center">
                        <button type="submit" name="submit22" class="btn waves-effect waves-light teal">Poster ma réponse</button>
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>


<?php $content = ob_get_clean(); ?>


<?php require('View/template/template.php'); ?>