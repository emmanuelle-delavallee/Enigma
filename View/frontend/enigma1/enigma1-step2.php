<?php $this->title = "Enigma - Aventure 1"; ?>

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
        if (isset($_POST['submit12'])) :
            if (isset($_POST['answer12'])) :

                $answer12 = $_POST['answer12'];



                // Stocke les erreurs dans un tableau pour pouvoir les afficher
                $errors = [];

                // Vérifie que les champs ont bien été complétés
                if (empty($answer12)) :
                    $errors['empty'] = "Il faut indiquer une réponse !";
                else :
                    if ($answer12 != "2") :
                        $errors['erreur'] = "Mauvaise réponse ! Réessayer ";
                    endif;
                endif;
            else :
                $errors['empty'] = "Il faut indiquer une réponse !";
            endif;

            // Affiche les erreurs si existantes
            if (!empty($errors)) :
        ?>
                <div class="card red error-message">
                    <div class="card-content white-text">
                        <?php foreach ($errors as $error) : ?>
                            <p><?= $error ?><br /></p>
                        <?php endforeach ?>
                    </div>
                </div>
        <?php
            endif;
        endif;
        ?>
        <h5 class="enigmas-title center">Retrouverez-vous les Daltons ?</h5>
        <p class="center">Cliquez sur l'image pour dessiner le chemin</p>



        <!-- MODAL D'AIDE-->
        <div id="helpModal" class="modal">
            <div class="modal-content">
                <h4 class="center">Indice</h4>
                <p>
                    <?php if (!empty($helps)) :
                        foreach ($helps as $help) : ?>
                            <?= $help->text ?>
                    <?php endforeach;
                    endif;
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
                    <?php if (!empty($responses)) :
                        foreach ($responses as $response) : ?>
                            <?= $response->text ?>
                    <?php endforeach;
                    endif;
                    ?>
                </p>
            </div>
            <div class="modal-footer">
                <a href="#!" class="modal-close waves-effect waves-light btn btn-small cyan darken-2">Retour au jeu <i class="material-icons right">play_arrow</i></a>
            </div>
        </div>

        <!-- IMAGE + CANVAS DE DESSIN-->
        <div class="col s12 m12 l10">
            <div id="signature_canvas" class="form-group">
                <canvas id="canvas"></canvas>
            </div>

            <!--BTN EFFACER TRAITS DESSINES-->
            <button class="btn" id="removeDrawBtn" type="reset">
                Effacer les traits dessinés
            </button>
        </div>


        <!-- REPONSE-->
        <div class="row">
            <div class="col s12 m12 l4 offset-l4">
                <form action="enigma-1-step-3" method="post">
                    <div class="input-field col s12">
                        <select name="answer12" id="answer12">
                            <option value="0" disabled selected>Quel chemin choisissez-vous ?</option>
                            <option value="1">Chemin n°1</option>
                            <option value="2">Chemin n°2</option>
                            <option value="3">Chemin n°3</option>
                        </select>
                    </div>


                    <!-- BTN REPONSE -->
                    <div class="col s12 m6 l12 center">
                        <button type="submit" name="submit12" class="btn waves-effect waves-light teal enigma-submit-btn">Poster ma réponse</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>