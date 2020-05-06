<?php ob_start(); ?>

</div>
<div class="container">
    <div class="col s12">

        <?php if (!empty($endings)) {
            foreach ($endings as $ending) {
        ?>

                <h5 class="center"> <?= $ending->ending_title ?></h5>

                <!-- IMAGE-->
                <div class="col s12 m12 l10 center">
                    <img src="Public/img/<?= $ending->ending_image ?>" alt="">
                </div>

                <p> <?= nl2br($ending->ending_text) ?></p>

        <?php     }
        }
        ?>
        <button class=" btn waves-effect waves-teal btn-flat btn-choices" onclick="window.location.href='index.php?url=usersDashboard'">Terminer</button>


    </div>
</div>


<?php $content = ob_get_clean(); ?>


<?php require('View/template/template.php'); ?>