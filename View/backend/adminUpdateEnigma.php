<?php ob_start(); ?>
</div>

<div class="pages-background">

    <?php
    if (isset($_POST['submit'])) {

        if (isset($_POST['indice'])) {

    ?>
            <div class="card light-green lighten-2">
                <div class="card-content success-message">
                    <p class="center-align">Votre modification a bien été effectuée</p>
                </div>
            </div>
    <?php
        }
    }
    ?>



    <?php
    if (!empty($enigmes)) {
        foreach ($enigmes as $enigme) {

    ?>
            <div class="container">
                <div class="col s12">
                    <div class="row">
                        <h2 class="center-align enigmas-title"><?= $enigme->name ?></h2>


                        <div class="col s12 m12 l12">
                            <?php
                            if (!empty($indices)) {
                                foreach ($indices as $indice) {
                                    if ($indice->id_story == $enigme->id) {
                            ?>



                                        <div class="card grey lighten-5 comm-card">
                                            <div class="row">
                                                <div class="col s12 m12 l10">
                                                    <form action="update-enigme-<?= $enigme->id ?>-step-<?= $indice->id_step ?>-help-<?= $indice->help ?>" method="post">

                                                        <?php
                                                        if ($indice->help == "0") {

                                                            echo "<h5> Réponse à l'étape " . $indice->id_step . "</h5>";
                                                        } else {

                                                            echo "<h5> Indice à l'étape " . $indice->id_step . "</h5>";
                                                        }
                                                        ?>

                                                        <div class="input-field col s12">
                                                            <input value="<?= $indice->text ?>" id="indice" name='indice' type="text" class="validate">
                                                        </div>

                                                        <button type="submit" name="submit" class="btn waves-effect waves-light cyan darken-2">Valider</button>


                                                    </form>

                                                </div>

                                            </div>

                                        </div>

                            <?php
                                    }
                                }
                            } ?>
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