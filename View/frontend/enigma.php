<?php $this->title = "Enigma - Début d'aventure"; ?>

</div>

<div class="container">
    <div class="row">
        <div class="col s12 m12 l12 center-align">
            <?php if (!empty($enigmes)) :
                foreach ($enigmes as $enigme) : ?>
                    <div class="row">

                        <h2 class="enigmas-title"><?= $enigme->name ?></h2>

                        <h6 class="enigmas-subtitle"><?= $enigme->resume ?></h6>

                        <div class="col s12 m12 l12">
                            <img src="Public/img/<?= $enigme->image ?>" class="materialboxed responsive-img enigma-img" alt="Titre">
                        </div>

                        <p class="enigmas-subtitle">A tout moment, vous pouvez cliquer sur l'icône <i class="material-icons">lightbulb_outline</i> située en bas à droite de votre écran. Ensuite, cliquez sur <i class="material-icons">lightbulb_outline</i> si vous avez besoin d'un indice ou <i class="material-icons">priority_high</i> si vous souhaitez voir la solution de l'énigme</p>

                        <a class="right waves-effect waves-light btn btn-large cyan darken-2" href="enigma-<?= $enigme->id ?>-step1">Jouer <i class="material-icons right">play_arrow</i></a>
                    </div>
            <?php endforeach;
            endif ?>
        </div>
    </div>
</div>