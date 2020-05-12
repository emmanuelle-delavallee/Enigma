<?php ob_start(); ?>


<h2>Enigmes publiées</h2>

<div class="row">

    <div class="col s12 m12">



        <?php
        if ($responses != false) {
            foreach ($responses as $response) {
        ?>
                <div class="row">

                    <div class="col s12 m12 l4 ">
                        <img src="Public/img/<?= $response->image ?>" class="materialboxed responsive-img" alt="Titre de l'énigme">
                    </div>

                    <div class="col s12 m12 l8">
                        <h4 class="enigma-subtitle"><?= $response->name ?></h4>
                        <p><?= $response->resume ?></p>
                        <a class="waves-effect waves-light btn cyan darken-2" href="index.php?url=updateEnigma&id=<?= $response->id ?>">Modifier</a>
                    </div>
                </div>
        <?php
            } //indices
        }
        ?>
    </div>
</div>




<?php $content = ob_get_clean(); ?>


<?php require('View/template/template.php'); ?>