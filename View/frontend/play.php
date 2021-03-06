<?php $this->title = "Enigma - Les aventures"; ?>

<h2 class="center-align page-title">Les aventures</h2>

<!-- CAROUSEL DE PRESENTATION -->
<div class="col s12 m12 l12">
    <div class="carousel carousel-slider" id="play-carousel">
        <?php if ($imgs != false) :
            foreach ($imgs as $img) : ?>
                <a class="carousel-item" href="#one!"><img src="Public/img/<?= $img->image ?>" alt="carousel-image"></a>
        <?php endforeach;
        endif ?>
    </div>
</div>

<!-- CARTES DES ENIGMES -->
<div class="col s12 m12 l12">
    <div class="row">
        <?php if ($responses != false) :
            foreach ($responses as $response) : ?>
                <div class="col col s12 m6 l4">
                    <div class="card">

                        <div class="card-image">
                            <img src="Public/img/<?= $response->image ?>">
                            <a class="btn-floating halfway-fab waves-effect waves-light cyan darken-2" href="enigma-<?= $response->id ?>-start"><i class="material-icons">play_arrow</i></a>
                        </div>

                        <div class="card-content">
                            <span class="card-title center"> <?= $response->name ?></span>
                            <p class="center"><?= $response->resume ?></p>
                        </div>
                    </div>
                </div>
        <?php endforeach;
        endif ?>
    </div>
</div>