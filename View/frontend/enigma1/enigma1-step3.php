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
        <h5 class="center">Vous vous retrouvez face aux Daltons, prêt à en découdre que faites-vous ?</h5>


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


        <!-- IMAGE-->
        <div class="col s12 m12 l10 center">
            <img src="Public/img/lucky_luke/LuckyDuel.jpg" alt="">
        </div>

        <p id="disscuss" style="display:none">Les daltons semble ouvert pour une disscussion, à vous de choisir le sujet de la conversation</p>
        <p id="capture" style="display:none">Plusieurs choix s'offre à vous pour tenter la capture des Daltons</p>
        <p id="Lelasso" style="display:none">Après 4 brillant tires, les Daltons sont désarmé</p>

        <!-- REPONSE-->
        <div class="col s12 m8 l4 offset-l4">

            <!-- BTN REPONSE -->
            <div class="col s12 m6 l12 center">
                <!-- <button type="submit" name="submit" class="btn waves-effect waves-light cyan darken-2">Tenter la discussion</button>-->
                <div class="row">

                    <button class="btn waves-effect waves-light cyan darken-2 col l2 offset-l4" id="discuter" onclick="showDiscuter()">Tenter la discussion</button>
                    <button class="btn waves-effect waves-light cyan darken-2 col l2" id="tirer" onclick="showTirer()">Tenter de les capturer</button>

                    <button class="btn waves-effect waves-light cyan darken-2 col l2 offset-l3" id="fuire" onclick="window.location.href='index.php?url=enigma1-done&id=1'" style="display:none">Les laisser s'enfuir</button>

                    <button class="btn waves-effect waves-light cyan darken-2 col l2" id="saloon" onclick="window.location.href='index.php?url=enigma1-done&id=2'" style="display:none">Emmener Joe au saloon</button>
                    <button class="btn waves-effect waves-light cyan darken-2 col l2" id="madalton" onclick="window.location.href='index.php?url=enigma1-done&id=3'" style="display:none">Parler de 'ma Dalton</button>


                    <button class="btn waves-effect waves-light cyan darken-2 col l2" id="désarmer" onclick="showDesarmer()" style="display:none">Tirer pour les désarmer</button>

                    <button class="btn waves-effect waves-light cyan darken-2 col l2" id="lasso1" onclick="window.location.href='index.php?url=enigma1-done&id=4'" style="display:none">Capturer au lasso</button>
                    <button class="btn waves-effect waves-light cyan darken-2 col l2" id="lasso2" onclick="window.location.href='index.php?url=enigma1-done&id=5'" style="display:none">Capturer au lasso</button>


                </div>
            </div>
        </div>


    </div>
</div>


<?php $content = ob_get_clean(); ?>


<?php require('View/template/template.php'); ?>