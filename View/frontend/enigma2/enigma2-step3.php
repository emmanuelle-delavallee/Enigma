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
        if (isset($_POST['submit3'])) {

            // Trim supprime l'espace avant le mot 
            $reponse = htmlspecialchars(trim($_POST['reponse']));


            // Stocke les erreurs dans un tableau pour pouvoir les afficher
            $errors = [];

            // Vérifie que les champs ont bien été complétés
            if (empty($reponse)) {
                $errors['empty'] = "Il faut indiquer une réponse !";
            } else {
                if ($reponse != "37") {
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
        <h5 class="enigmas-title center">Vous êtes arrivés devant le camp romain de Petibonum</h5>


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
        <div class="col s12 m12 l12 center enigma-img">
            <img src="Public/img/asterix/camp-romain-asterix.png" alt="Camp_romain_de_Petibonum">
        </div>

        <!-- REPONSE-->
        <div class="container ">
            <div class="row">

                <h5 class="enigmas-subtitle" id="intro" style="display:block">Que faites-vous ?</h5>
                <h5 class="enigmas-subtitle" id="disscuss" style="display:none">Vous êtes devant le légionnaire de garde</h5>
                <h5 class="enigmas-subtitle" id="capture" style="display:none">Que faites vous pour attaquer le camp ?</h5>
                <h5 class="enigmas-subtitle" id="Lelasso" style="display:none">Vous etes maintenant super fort ! C'est parti</h5>

                <!-- BTN REPONSE -->

                <button class="btn waves-effect waves-teal btn-flat btn-choices " id="discuter" onclick="showDiscuter()" style="display:block"> <i class="large material-icons left">arrow_forward</i>Négocier avec le légionnaire de garde</button>
                <button class="btn waves-effect waves-teal btn-flat btn-choices " id="tirer" onclick="showTirer()" style="display:block"><i class="large material-icons left">arrow_forward</i>Attaquer le camp</button>

                <button class="btn waves-effect waves-teal btn-flat btn-choices" id="fuire" onclick="window.location.href='index.php?url=enigma&id=2&step=done&idending=1'" style="display:none"><i class="large material-icons left">arrow_forward</i>Changer d'avis et rentrer au village</button>
                <button class="btn waves-effect waves-teal btn-flat btn-choices" id="saloon" onclick="window.location.href='index.php?url=enigma&id=2&step=done&idending=2'" style="display:none"><i class="large material-icons left">arrow_forward</i>Lui offrir un sanglier</button>
                <button class="btn waves-effect waves-teal btn-flat btn-choices" id="madalton" onclick="window.location.href='index.php?url=enigma&id=2&step=done&idending=2'" style="display:none"><i class="large material-icons left">arrow_forward</i>Le menacer au nom de césar </button>

                <button class="btn waves-effect waves-teal btn-flat btn-choices" id="désarmer" onclick="showDesarmer()" style="display:none"><i class="large material-icons left">arrow_forward</i>Boire de la potion magique</button>
                <button class="btn waves-effect waves-teal btn-flat btn-choices" id="lasso1" onclick="window.location.href='index.php?url=enigma&id=2&step=done&idending=3'" style="display:none"><i class="large material-icons left">arrow_forward</i>Jeter un menhir sur la tente du général</button>
                <button class="btn waves-effect waves-teal btn-flat btn-choices" id="lasso2" onclick="window.location.href='index.php?url=enigma&id=2&step=done&idending=3'" style="display:none"><i class="large material-icons left">arrow_forward</i>A l'attaaaque !</button>
            </div>
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>


<?php require('View/template/template.php'); ?>