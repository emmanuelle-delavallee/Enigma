<?php ob_start(); ?>


<h2>Enigmes publiées</h2>

<div class="row">

    <div class="col s12 m12">

        <div class="col s12 m12 l12">
            <a class="btn waves-effect waves-light cyan darken-2 right" href="index.php?url=adminAllEnigmas">Afficher les énigmes non publiées</a>
        </div>

        <div class="row">
            <div class="col s12 m12 l4 ">
                <img src="Public/img/2.jpg" class="materialboxed responsive-img" alt="Titre de l'énigme">
            </div>

            <div class="col s12 m12 l8">
                <h4 class="enigma-subtitle">Titre de l'énigme</h4>
                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis</p>
                <a class="waves-effect waves-light btn cyan" href="#">Modifier</a>
            </div>
        </div>

        <div class="row">
            <div class="col s12 m12 l4 ">
                <img src="Public/img/2.jpg" class="materialboxed responsive-img" alt="Titre de l'énigme">
            </div>

            <div class="col s12 m12 l8">
                <h4 class="enigma-subtitle">Titre de l'énigme</h4>
                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis</p>
                <a class="waves-effect waves-light btn cyan" href="#">Modifier</a>
            </div>
        </div>

        <div class="row">
            <div class="col s12 m12 l4 ">
                <img src="Public/img/2.jpg" class="materialboxed responsive-img" alt="Titre de l'énigme">
            </div>

            <div class="col s12 m12 l8">
                <h4 class="enigma-subtitle">Titre de l'énigme</h4>
                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis</p>
                <a class="waves-effect waves-light btn cyan" href="#">Modifier</a>
            </div>
        </div>

    </div>
</div>




<?php $content = ob_get_clean(); ?>


<?php require('Public/template/template.php'); ?>