<?php ob_start(); ?>

<h2 class="center-align page-title">Mes aventures</h2>

<p>Bonjour <?= $_SESSION['username'] ?> !</p>

<div class="row">

    <div class="col s12 m12">

        <div class="row">
            <div class="col s12 m12 l4 ">
                <img src="Public/img/2.jpg" class="materialboxed responsive-img" alt="Titre de l'énigme">
            </div>

            <div class="col s12 m12 l8">
                <h4 class="enigma-subtitle">Titre de l'aventure</h4>
                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis</p>
                <a class="right waves-effect waves-light btn btn-large cyan darken-2">Jouer <i class="material-icons right">play_arrow</i></a>
            </div>
        </div>

        <div class="row">
            <div class="col s12 m12 l4 ">
                <img src="Public/img/2.jpg" class="materialboxed responsive-img" alt="Titre de l'énigme">
            </div>

            <div class="col s12 m12 l8">
                <h4 class="enigma-subtitle">Titre de l'aventure</h4>
                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis</p>
                <a class="right waves-effect waves-light btn btn-large cyan darken-2">Jouer <i class="material-icons right">play_arrow</i></a>
            </div>
        </div>

        <div class="row">
            <div class="col s12 m12 l4 ">
                <img src="Public/img/2.jpg" class="materialboxed responsive-img" alt="Titre de l'énigme">
            </div>

            <div class="col s12 m12 l8">
                <h4 class="enigma-subtitle">Titre de l'aventure</h4>
                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis</p>
                <a class="right waves-effect waves-light btn btn-large cyan darken-2">Jouer <i class="material-icons right">play_arrow</i></a>
            </div>
        </div>

    </div>
</div>


<?php $content = ob_get_clean(); ?>

<?php require('Public/template/template.php'); ?>