<?php $this->title = "Enigma - Administration"; ?>

</div>

<div class="container common-background">
    <h2 class="center page-title">Enigmes publiées</h2>
    <div class="row">
        <div class="col s12 m12 l12">

            <?php if ($responses != false) :
                foreach ($responses as $response) : ?>
                    <div class="row">

                        <div class="col s12 m12 l6 ">
                            <img src="Public/img/<?= $response->image ?>" class="materialboxed responsive-img" alt="Titre de l'énigme">
                        </div>

                        <div class="col s12 m12 l6">
                            <h4 class="card-title"><?= $response->name ?></h4>
                            <p><?= $response->resume ?></p>
                            <a class="right waves-effect waves-light btn cyan darken-2" href="update-enigma-<?= $response->id ?>">Modifier</a>
                        </div>
                    </div>
            <?php
                endforeach;
            endif;
            ?>
        </div>
    </div>
</div>