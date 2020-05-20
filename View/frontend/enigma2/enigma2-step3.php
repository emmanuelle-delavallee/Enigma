<?php $this->title = "Enigma - Aventure 2"; ?>

</div>
<div class="container common-background">
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

        <h5 class="enigmas-title center">Vous êtes arrivés devant le camp romain de Petibonum</h5>


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


        <!-- IMAGE-->
        <div class="col s12 m12 l12">
            <img src="Public/img/asterix/camp-romain-asterix.png" class="materialboxed responsive-img enigma-img" alt="Camp_romain_de_Petibonum">
        </div>

        <!-- REPONSE-->
        <div class="container ">
            <div class="row">

                <h5 class="enigmas-subtitle premier" id="intro" style="display:block">Que faites-vous ?</h5>
                <h5 class="enigmas-subtitle discuter" id="disscuss" style="display:none">Vous êtes devant le légionnaire de garde</h5>
                <h5 class="enigmas-subtitle tirer" id="capture" style="display:none">Que faites vous pour attaquer le camp ?</h5>
                <h5 class="enigmas-subtitle désarmer" id="Lelasso" style="display:none">Vous etes maintenant super fort ! C'est parti</h5>

                <!-- BTN REPONSE -->

                <button class="btn waves-effect waves-teal btn-flat btn-choices premier" id="discuter" onclick="showDiscuter()" style="display:block"> <i class="large material-icons left">arrow_forward</i>Négocier avec le légionnaire de garde</button>
                <button class="btn waves-effect waves-teal btn-flat btn-choices premier" id="tirer" onclick="showTirer()" style="display:block"><i class="large material-icons left">arrow_forward</i>Attaquer le camp</button>

                <button class="btn waves-effect waves-teal btn-flat btn-choices discuter tirer désarmer" id="fuire" onclick="window.location.href='enigma2-done-ending1'" style="display:none"><i class="large material-icons left">arrow_forward</i>Changer d'avis et rentrer au village</button>
                <button class="btn waves-effect waves-teal btn-flat btn-choices discuter" id="saloon" onclick="window.location.href='enigma2-done-ending2'" style="display:none"><i class="large material-icons left">arrow_forward</i>Lui offrir un sanglier</button>
                <button class="btn waves-effect waves-teal btn-flat btn-choices discuter" id="madalton" onclick="window.location.href='enigma2-done-ending2'" style="display:none"><i class="large material-icons left">arrow_forward</i>Le menacer au nom de césar </button>

                <button class="btn waves-effect waves-teal btn-flat btn-choices tirer" id="désarmer" onclick="showDesarmer()" style="display:none"><i class="large material-icons left">arrow_forward</i>Boire de la potion magique</button>
                <button class="btn waves-effect waves-teal btn-flat btn-choices tirer" id="lasso1" onclick="window.location.href='enigma2-done-ending3'" style="display:none"><i class="large material-icons left">arrow_forward</i>Jeter un menhir sur la tente du général</button>
                <button class="btn waves-effect waves-teal btn-flat btn-choices désarmer" id="lasso2" onclick="window.location.href='enigma2-done-ending3'" style="display:none"><i class="large material-icons left">arrow_forward</i>A l'attaaaque !</button>
            </div>
        </div>
    </div>
</div>