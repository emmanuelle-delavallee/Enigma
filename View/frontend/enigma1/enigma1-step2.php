<?php ob_start(); ?>

</div>
<div class="container">
    <div class="col s12">

        <div class="fixed-action-btn">
            <a class="btn-floating btn-large waves-effect waves-light cyan">
                <i class="large material-icons">lightbulb_outline</i>
            </a>
            <ul>
                <li><a class="btn-floating waves-effect waves-light orange modal-trigger" href="#answerModal"><i class="material-icons">priority_high</i></a></li>
                <li><a class="btn-floating waves-effect waves-light amber modal-trigger" href="#helpModal"><i class="material-icons">lightbulb_outline</i></a></li>
            </ul>
        </div>
        <?php
        if (isset($_POST['submit2'])) {

            // Trim supprime l'espace avant le mot 
            $reponse = $_POST['reponse'];



            // Stocke les erreurs dans un tableau pour pouvoir les afficher
            $errors = [];

            // Vérifie que les champs ont bien été complétés
            if (empty($reponse)) {
                $errors['empty'] = "Il faut indiquer une réponse !";
            } else {
                if ($reponse != "2") {
                    $errors['erreur'] = "Mauvaise réponse ! Réessayer ";
                }
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
        <h5 class="center">Retrouverez-vous les Daltons ?</h5>
        <p class="center">Cliquez sur l'image pour dessiner le chemin</p>



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
                <a href="#!" class="modal-close waves-effect waves-light btn btn-small cyan">Retour au jeu <i class="material-icons right">play_arrow</i></a>
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
                <a href="#!" class="modal-close waves-effect waves-light btn btn-small cyan">Retour au jeu <i class="material-icons right">play_arrow</i></a>
            </div>
        </div>


        <!-- IMAGE + CANVAS DE DESSIN-->
        <div id="signature_canvas" class="form-group">
            <canvas id="canvas"></canvas>
        </div>
        <button class="btn" id="removeSignatureBtn" type="reset">
            Effacer les traits
        </button>


        <!-- REPONSE-->
        <div class="row">
            <div class="col s12 m8 l4 offset-l4">
                <form action="index.php?url=enigma1-step3" method="post">
                    <div class="input-field col s12">
                        <select name="reponse" id="reponse">
                            <option value="" disabled selected>Quel chemin choisissez-vous ?</option>
                            <option value="1">Chemin n°1</option>
                            <option value="2">Chemin n°2</option>
                            <option value="3">Chemin n°3</option>
                        </select>
                    </div>


                    <!-- BTN REPONSE -->
                    <div class="col s12 m6 l12 center">
                        <button type="submit2" name="submit2" class="btn waves-effect waves-light cyan darken-2">Poster ma réponse</button>
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>


<?php $content = ob_get_clean(); ?>


<?php require('View/template/template.php'); ?>