<?php $this->title = "Enigma - Aventure 2"; ?>

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
        if (isset($_POST['group1']) && isset($_POST['group2']) && isset($_POST['group3'])) :
            // Stocke les réponses dans des variables
            $answer1 = $_POST['group1'];
            $answer2 = $_POST['group2'];
            $answer3 = $_POST['group3'];

            // Stocke les erreurs dans un tableau pour pouvoir les afficher
            $errors = [];

            // Vérifie que les btn cochés soient les bons
            if (($answer1 == '2') && ($answer2 == '4') && ($answer3 == '3')) :
                $this->FrontendController->enigmastep('2', '2');
            else :
                $errors['erreur'] = "Mauvaise réponse ! Réessayez ";
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

        <h5 class="enigmas-title center">Vous préparez votre départ, quel équipement emportez-vous ?</h5>
        <h6 class="center">Vous devez choisir une arme, un repas et une boisson.</h6>
        <h6 class="center">Vous pouvez porter 4 kg. Pas moins, sinon vous serez mal équipé, et pas davantage sinon vous serez ralenti.</h6>

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
                <?php
                if (!empty($responses)) :
                    foreach ($responses as $response) : ?>
                        <p><?= $response->text ?></p>
                <?php endforeach;
                endif;
                ?>
            </div>
            <div class="modal-footer">
                <a href="#!" class="modal-close waves-effect waves-light btn btn-small cyan darken-2">Retour au jeu <i class="material-icons right">play_arrow</i></a>
            </div>
        </div>


        <!-- IMAGE-->
        <div class="col s12 m12 l10">
            <img src="Public/img/asterix/asterix-1.png" class="materialboxed responsive-img enigma-img" alt="asterix_ et_obelix">
        </div>

        <div class="row">
            <div class="col s12 m12 l8 offset-l2">

                <form action="enigma-2-step-2" method="post">

                    <table class="responsive-table">

                        <thead>
                            <tr>
                                <th class="asterix-table-title">Arme</th>
                                <th class="asterix-table-title">Repas</th>
                                <th class="asterix-table-title">Boisson</th>
                            </tr>
                        </thead>


                        <tbody>
                            <tr>
                                <td class="asterix-table">
                                    <label>
                                        <input name="group1" type="radio" value="1">
                                        <span class="black-text"><strong>Lance romaine : </strong>2,00 kg</span>
                                    </label>
                                </td>

                                <td class="asterix-table">
                                    <label>
                                        <input name="group2" type="radio" value="1">
                                        <span class="black-text"><strong>Pommes de terre : </strong>1,74 kg</span>
                                    </label>
                                </td>

                                <td class="asterix-table">
                                    <label>
                                        <input name="group3" type="radio" value="1">
                                        <span class="black-text"><strong>Lait de chèvre : </strong>0,74 kg</span>
                                    </label>
                                </td>
                            </tr>

                            <tr>
                                <td class="asterix-table">
                                    <label>
                                        <input name="group1" type="radio" value="2">
                                        <span class="black-text"><strong>Glaive : </strong>2,56 kg</span>
                                    </label>
                                </td>

                                <td class="asterix-table">
                                    <label>
                                        <input name="group2" type="radio" value="2">
                                        <span class="black-text"><strong>Sanglier : </strong>3,33 kg</span>
                                    </label>
                                </td>

                                <td class="asterix-table">
                                    <label>
                                        <input name="group3" type="radio" value="2">
                                        <span class="black-text"><strong>Cervoise : </strong>1,02 kg</span>
                                    </label>
                                </td>
                            </tr>

                            <tr>
                                <td class="asterix-table">
                                    <label>
                                        <input name="group1" type="radio" value="3">
                                        <span class="black-text"><strong>Marmite : </strong>1,28 kg</span>
                                    </label>
                                </td>

                                <td class="asterix-table">
                                    <label>
                                        <input name="group2" type="radio" value="3">
                                        <span class="black-text"><strong>Fromage : </strong>1,02 kg</span>
                                    </label>
                                </td>

                                <td class="asterix-table">
                                    <label>
                                        <input name="group3" type="radio" value="3">
                                        <span class="black-text"><strong>Potion magique : </strong>0,16 kg</span>
                                    </label>
                                </td>
                            </tr>

                            <tr>
                                <td class="asterix-table">
                                    <label>
                                        <input name="group1" type="radio" value="4">
                                        <span class="black-text"><strong>Menhir : </strong>2,96 kg</span>
                                    </label>
                                </td>

                                <td class="asterix-table">
                                    <label>
                                        <input name="group2" type="radio" value="4">
                                        <span class="black-text"><strong>Baies : </strong>1,28 kg</span>
                                    </label>
                                </td>

                                <td class="asterix-table">
                                    <label>
                                        <input name="group3" type="radio" value="4">
                                        <span class="black-text"><strong>Gourde d'eau : </strong>0,38 kg</span>
                                    </label>
                                </td>
                            </tr>
                            <br>
                        </tbody>
                    </table>

                    <!-- BTN REPONSE -->
                    <br> <br>
                    <button type="submit" name="submit21" class="btn waves-effect waves-light teal enigma-submit-btn">Poster ma réponse</button>
                </form>
            </div>
        </div>
    </div>
</div>