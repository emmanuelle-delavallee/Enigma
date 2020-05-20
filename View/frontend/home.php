<?php $this->title = "Enigma - Accueil"; ?>


</div>

<div class="common-background iris-background">
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

    <?php if (!empty($enigmes)) :
        foreach ($enigmes as $enigme) : ?>
            <div class="row">

                <div class="col col s12 m6 l4 offset-l2">
                    <div class="card">

                        <div class="card-image">
                            <img src="Public/img/<?= $enigme->image ?>" alt="enigma-image">
                        </div>

                        <div class="card-content">
                            <span class="card-title center"> <?= $enigme->name ?></span>
                            <p class="center"><?= $enigme->resume ?></p>

                            <div class="card-action enigma-submit-btn">
                                <a class="right waves-effect waves-light btn cyan darken-2" href="enigma-<?= $enigme->id ?>-start">Jouer <i class="material-icons right">play_arrow</i></a>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
    <?php endforeach;
    endif; ?>