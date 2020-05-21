<?php
// Page accessible aux administrateurs qui ont une session active
if ($checkIfAdmin == 0) :
    header("Location:login");
endif ?>

<?php $this->title = "Enigma - Administration"; ?>

</div>

<div class="common-background blue-background">

    <?php if (isset($_POST['submit'])) :

        if (isset($_POST['indice'])) : ?>
            <div class="card light-green lighten-2">
                <div class="card-content success-message">
                    <p class="center-align">Votre modification a bien été effectuée</p>
                </div>
            </div>
    <?php
        endif;
    endif;
    ?>


    <?php if (!empty($enigmes)) :
        foreach ($enigmes as $enigme) : ?>
            <div class="container">
                <div class="col s12">
                    <div class="row">
                        <h2 class="center-align enigmas-title white-text"><?= $enigme->name ?></h2>


                        <div class="col s12 m12 l12">
                            <?php
                            if (!empty($indices)) :
                                foreach ($indices as $indice) :
                                    if ($indice->id_story == $enigme->id) :
                            ?>

                                        <div class="card grey lighten-5 comm-card">
                                            <div class="row">
                                                <div class="col s12 m12 l10 offset-l1">
                                                    <form action="update-enigme-<?= $enigme->id ?>-step-<?= $indice->id_step ?>-help-<?= $indice->help ?>" method="post">

                                                        <?php
                                                        if ($indice->help == "0") : ?>

                                                            <h5 class='center'>Etape <?= $indice->id_step ?> : modifier la solution</h5>
                                                        <?php else : ?>

                                                            <h5 class='center'>Etape <?= $indice->id_step ?> : modifier l'indice</h5>

                                                        <?php endif; ?>

                                                        <div class="input-field col s12">
                                                            <input value="<?= $indice->text ?>" id="indice" name='indice' type="text" class="validate">
                                                        </div>

                                                        <button type="submit" name="submit" class="btn waves-effect waves-light cyan darken-2 right">Valider</button>

                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                            <?php
                                    endif;
                                endforeach;
                            endif; ?>
                        </div>
                    </div>
                </div>
            </div>

    <?php
        endforeach;
    endif; ?>
</div>