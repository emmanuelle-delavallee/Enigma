<?php ob_start(); ?>

<h2 class="center-align page-title">Les énigmes</h2>

<div class="carousel carousel-slider" id="play-carousel">
    <a class="carousel-item" href="#one!"><img src="Public/img/lucky-luke-home.png"></a>
    <a class="carousel-item" href="#two!"><img src="Public/img/2.jpg"></a>
    <a class="carousel-item" href="#three!"><img src="Public/img/2.jpg"></a>
    <a class="carousel-item" href="#four!"><img src="Public/img/2.jpg"></a>
</div>


<div class="col col s12 m12 l12">
    <div class="row">

        <?php
        if ($responses != false) {
            foreach ($responses as $response) {
        ?>

                <div class="col col s12 m6 l4">
                    <div class="card">

                        <div class="card-image">
                            <img src="Public/img/lucky-luke-home.png">
                            <a class="btn-floating halfway-fab waves-effect waves-light cyan" href="index.php?url=enigma&id=<?= $response->id ?>"><i class="material-icons">play_arrow</i></a>
                        </div>

                        <div class="card-content">
                            <span class="card-title center"> <?= $response->name ?></span>
                            <p class="center"><?= $response->resume ?></p>
                        </div>

                <?php
            }
        }
                ?>

                    </div>
                </div>

    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('Public/template/template.php'); ?>