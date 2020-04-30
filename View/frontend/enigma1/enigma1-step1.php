<?php ob_start(); ?>

</div>
<div class="enigmas-background">

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

            <h2 class="center-align enigmas-title">Titre de l'énigme</h2>


            <!-- MODAL D'AIDE-->
            <div id="helpModal" class="modal">
                <div class="modal-content">
                    <h4 class="center">Indice</h4>
                    <p>Texte de l'indice</p>
                </div>
                <div class="modal-footer">
                    <a href="#!" class="modal-close waves-effect waves-light btn btn-small cyan">Retour au jeu <i class="material-icons right">play_arrow</i></a>
                </div>
            </div>


            <!-- MODAL DE SOLUTION-->
            <div id="answerModal" class="modal">
                <div class="modal-content">
                    <h4 class="center">Solution</h4>
                    <p>Texte de la solution</p>
                </div>
                <div class="modal-footer">
                    <a href="#!" class="modal-close waves-effect waves-light btn btn-small cyan">Retour au jeu <i class="material-icons right">play_arrow</i></a>
                </div>
            </div>


            <!-- IMAGE-->
            <div class="col s12 m12 l10 center">
                <img src="Public/img/dalton.jpg" alt="">
            </div>


            <!-- REPONSE-->
            <div class="row">
                <div class="col s12 m8 l4 offset-l4">
                    <form action="#" method="post">
                        <br>
                        <div class="input-field">
                            <input type="text" name="" id="">
                            <label for="comment_title">Réponse</label>
                        </div>
                    </form>
                </div>
            </div>


            <!-- BTN REPONSE -->
            <div class="col s12 m6 l12 center">
                <button type="submit" name="submit" class="btn waves-effect waves-light cyan darken-2">Poster ma réponse</button>
            </div>


        </div>
    </div>

</div>
<?php $content = ob_get_clean(); ?>


<?php require('Public/template/template.php'); ?>