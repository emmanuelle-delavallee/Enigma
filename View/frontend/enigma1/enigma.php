<?php ob_start(); ?>

</div>


<?php
if (!empty($enigmes)) {
    foreach ($enigmes as $enigme) {

?>
        <div class="container">
            <div class="col s12">
                <div class="row">
                    <h2 class="center-align enigmas-title"><?= $enigme->name ?></h2>

                    <p class="enigmas-subtitle"><?= $enigme->resume ?></p>


                    <div class="row">
                        <div class="card col l6 offset-l3">
                            <div class="card-image">
                                <img src="Public/img/<?= $enigme->image ?>" alt="Titre">
                            </div>
                        </div>
                    </div>
                    <a class="right waves-effect waves-light btn btn-large cyan darken-2" href="index.php?url=enigma&id=<?= $enigme->id ?>&step=1">Jouer <i class="material-icons right">play_arrow</i></a>

                </div>
            </div>
        </div>
<?php
    }
} ?>

<?php $content = ob_get_clean(); ?>


<?php require('View/template/template.php'); ?>