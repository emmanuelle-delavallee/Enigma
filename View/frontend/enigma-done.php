<?php $this->title = "Enigma - Fin d'aventure"; ?>

</div>

<div class="container">
    <div class="col s12 m12 l12">
        <div class="row">
            <?php if (!empty($endings)) :
                foreach ($endings as $ending) : ?>
                    <!-- TITRE DE FIN-->
                    <h5 class="enigmas-title"> <?= $ending->ending_title ?></h5>

                    <!-- IMAGE-->
                    <div class="col s12 m12 l12">
                        <img src="Public/img/<?= $ending->ending_image ?>" class="materialboxed responsive-img enigma-img" alt="Image_de_fin">
                    </div>

                    <!-- TEXTE DE FIN-->
                    <h6 class="enigmas-subtitle"><?= nl2br($ending->ending_text) ?></h6>

            <?php endforeach;
            endif ?>

            <p class="center">- - -</p>

            <div class="col s12 m12 l6 offset-l3">

                <div class="card">
                    <div class="card-content">
                        <p class="center"> <strong>Vous avez terminé cette aventure</strong></p>
                        <p class="center">Vous pouvez en choisir une autre ou retenter votre chance afin de découvrir les autres fins possibles</p>
                    </div>
                    <a class="right waves-effect waves-light btn cyan darken-2 btn enigma-submit-btn" href="comments-1">Laisser un avis</a>
                </div>
            </div>
        </div>
    </div>
</div>