<?php ob_start(); ?>

<div class="row">


    <!-- OPTIONS UTILISATEUR -->
    <div class="col s12 m4 l4 right">
        <div class="card">
            <div class="card-content center">
                <img class="circle user_img" src="Public/img/2.jpg" alt="user_img">
                <h5>Bonjour <?= $_SESSION['username'] ?></h5>
                <a class="waves-effect waves-light btn cyan darken-2 modal-trigger" href="#userModal"><i class="material-icons left">settings</i>Options</a>
            </div>
        </div>
    </div>


    <!-- MODAL GESTION DE COMPTE -->
    <div id="userModal" class="modal">
        <div class="modal-content">
            <h4 class="center">Gérer mon compte</h4>
            <p>Bla</p>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-light btn cyan darken-2">Retour à l'espace personnel</a>
        </div>
    </div>


    <!-- AFFICHAGE DES AVENTURES JOUEES / NON JOUEES -->
    <div class="row col s12 m12 l8">
        <h2 class="page-title">Espace personnel</h2>
    </div>

    <div class="col s12 m12 l12">

        <?php
        if ($responses != false) {
            foreach ($responses as $response) {
        ?>

                <div class="card">

                    <div class="row">
                        <div class="col s12 m12 l4">
                            <img src="Public/img/<?= $response->image ?>" class="materialboxed responsive-img" alt="Image_personnelle">
                        </div>

                        <div class="col s12 m12 l8">
                            <h4 class="enigma-subtitle"><?= $response->name ?></h4>
                            <p><?= $response->resume ?></p>
                            <br>
                            <a class="right waves-effect waves-light btn cyan darken-2 btn-choices" href="index.php?url=enigma&id=<?= $response->id ?>&step=start">Jouer <i class="material-icons right">play_arrow</i></a>
                            <a class="right waves-effect waves-light btn cyan darken-2 btn-choices" href="index.php?url=enigma&id=<?= $response->id ?>&step=start">Rejouer <i class="material-icons right">play_arrow</i></a>

                        </div>
                    </div>
                </div>

        <?php
            }
        }
        ?>
    </div>
</div>


<?php $content = ob_get_clean(); ?>

<?php require('View/template/template.php'); ?>