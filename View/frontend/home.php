<?php $this->title = "Enigma - Accueil"; ?>


</div>

<div class="iris">
    <div class="home-container">
        <div class="caption right-align white-text">
            <div class="col l12">
                <div class="col l6 offset-l6">
                    <h2 class="home-page-title tracking-in-expand-fwd">Enigma</h2>
                    <h3 class="page-subtitle left-align tracking-in-expand-fwd">Des énigmes en ligne</h3>
                </div>
            </div>
        </div>
    </div>

    <?php
    if (!empty($enigmes)) {
        foreach ($enigmes as $enigme) {

    ?>
            <div class="row home-cards grey-text text-darken-3">
                <div class="col s12 m7">
                    <div class="card small horizontal">
                        <div class="card-image">
                            <img src="Public/img/<?= $enigme->image ?>" alt="enigma-image">
                        </div>
                        <div class="card-stacked">
                            <div class="card-content">
                                <h5 class="enigma-subtitle"><?= $enigme->name ?></h5>
                                <p><?= $enigme->resume ?></p>
                            </div>
                            <div class="card-action play-btn">
                                <a class="right waves-effect waves-light btn cyan darken-2 " href="enigma-<?= $enigme->id ?>-start">Jouer <i class="material-icons right">play_arrow</i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    <?php
        }
    } ?>

</div>