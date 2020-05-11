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
        if (isset($_POST['group1']) && isset($_POST['group2']) && isset($_POST['group3'])) {
            // Stocke les réponses dans des variables
            $answer1 = $_POST['group1'];
            $answer2 = $_POST['group2'];
            $answer3 = $_POST['group3'];

            // Stocke les erreurs dans un tableau pour pouvoir les afficher
            $errors = [];

            // Vérifie que les btn cochés soient les bons
            if (($answer1 == '2') && ($answer2 == '4') && ($answer3 == '3')) {
                $this->FrontendController->enigmastep('2', '2');
            } else {
                $errors['erreur'] = "Mauvaise réponse ! Réessayez ";
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

        <h5 class="center">Vous préparez votre départ, quel équipement emportez vous ?</h5>
        <p class="center">Vous devez prendre une arme, un repas et une boisson.</p>
        <p class="center">Vous ne pouvez porter que 4 kg maximum sinon vous serez surchargés et ralentis.</p>

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
            <img src="Public/img/asterix/asterix-1.png" alt="">
        </div>

        <div class="row">
            <div class="col s12 m12 l8 offset-l2 center">

                <form action="index.php?url=enigma&id=2&step=2" method="post">

                    <table class="responsive-table">

                        <thead>
                            <tr>
                                <th class="asterix-table">Arme</th>
                                <th class="asterix-table">Repas</th>
                                <th class="asterix-table">Boisson</th>
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
                    <button type="submit" name="submit" class="btn waves-effect waves-light teal">Poster ma réponse</button>
                </form>

            </div>

        </div>
    </div>
</div>


<?php $content = ob_get_clean(); ?>


<?php require('View/template/template.php'); ?>