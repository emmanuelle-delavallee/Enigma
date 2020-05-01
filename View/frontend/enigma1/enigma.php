<?php ob_start(); ?>

</div>

<div class="container">
    <div class="col s12">
        <div class="row">
            <h2 class="center-align enigmas-title">Lucky Luke et la locomotive piégée</h2>

            <p class="enigmas-subtitle">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>


            <div class="row">
                <div class="card col l6 offset-l3">
                    <div class="card-image">
                        <img src="Public/img/lucky-luke-home.png" alt="Titre">
                    </div>
                </div>
            </div>
            <a class="right waves-effect waves-light btn btn-large cyan darken-2" href="index.php?url=enigma1-step1">Jouer <i class="material-icons right">play_arrow</i></a>

        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>


<?php require('View/template/template.php'); ?>