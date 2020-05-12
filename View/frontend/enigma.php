<?php ob_start(); ?>

</div>


<?php
if (!empty($enigmes)) {
    foreach ($enigmes as $enigme) {

?>
        <div class="container">
            <div class="col s12 center-align">
                <div class="row">
                    <h2 class="enigmas-title"><?= $enigme->name ?></h2>

                    <h6 class="enigmas-subtitle"><?= $enigme->resume ?></h6>

                    <div class="col s12 m12 l12 center enigma-img">
                        <img src="Public/img/<?= $enigme->image ?>" alt="Titre">
                    </div>

                    <p class="enigmas-subtitle">A tout moment, vous pouvez cliquer sur l'icône "ampoule" située en bas à droite de votre écran si vous avez besoin d'un indice ou si vous souhaitez voir la solution de l'énigme</p>

                    <a class="right waves-effect waves-light btn btn-large cyan darken-2" href="index.php?url=enigma&id=<?= $enigme->id ?>&step=1">Jouer <i class="material-icons right">play_arrow</i></a>

                </div>
            </div>
        </div>
<?php
    }
} ?>

<?php $content = ob_get_clean(); ?>


<?php require('View/template/template.php'); ?>