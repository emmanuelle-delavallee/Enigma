<?php ob_start(); ?>

</div>

<div class="iris">
    <div class="home-container">
        <div class="caption right-align white-text">
            <div class="col l12">
                <div class="col l6 offset-l6">
                    <h2 class="home-page-title">Enigma</h2>
                    <h3 class="page-subtitle left-align">Des énigmes en ligne</h3>
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
                    <!--<h4 class="header center">Nouvelle énigme</h4>-->
                    <div class="card small horizontal">
                        <div class="card-image">
                            <img src="Public/img/<?= $enigme->image ?>">
                        </div>
                        <div class="card-stacked">
                            <div class="card-content">
                                <h5 class="enigma-subtitle"><?= $enigme->name ?></h5>
                                <p><?= $enigme->resume ?></p>
                            </div>
                            <div class="card-action">
                                <a class="right waves-effect waves-light btn grey darken-3" href="index.php?url=enigma&id=<?= $enigme->id ?>&step=start">Jouer</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    <?php
        }
    } ?>

</div>

<?php $content = ob_get_clean(); ?>

<?php require('View/template/template.php'); ?>