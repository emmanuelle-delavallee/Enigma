<?php ob_start();

/*// S'il y a une session active, redirige vers le tableau de bord
if ($checkIfAdmin == 1) {
    header("Location:index.php?url=adminDashboard");
}*/

?>


</div>

<div class="pages-background">


    <div class="container discover-container">
        <div class="col s12 l12">

            <div class="row">

                <div class="col l4 m6 s12 offset-l1">

                    <div class="card-panel white z-depth-5">
                        <div class="row">

                            <form action="index.php?url=checklogin" method="post">

                                <div class="row">

                                    <h4 class="center-align">Se connecter</h4>

                                    <div class="input-field col s12">
                                        <input type="text" id="pseudo" name="pseudo">
                                        <label for="pseudo">Pseudo</label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="input-field col s12">
                                        <input type="password" id="password" name="password">
                                        <label for="password">Mot de passe</label>
                                    </div>
                                </div>

                                <div class="center">
                                    <button type="submit" name="submit" class="waves-effect waves-light btn cyan darken-2">Se connecter</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>


                <div class="col l4 m6 s12 offset-l1">

                    <div class="card-panel white z-depth-5">
                        <div class="row">

                            <form action="#" method="post">

                                <div class="row">

                                    <h4 class="center-align">S'inscrire</h4>

                                    <div class="input-field col s12 m12 l12">
                                        <input type="text" name="name" id="name">
                                        <label for="name">Pseudo</label>
                                    </div>

                                    <div class="input-field col s12 m12 l12">
                                        <input type="email" name="email" id="email">
                                        <label for="email">Adresse email</label>
                                    </div>

                                    <div class="input-field col s12 m12 l12">
                                        <input type="email" name="repeat_email" id="repeat_email">
                                        <label for="repeat_email">Répéter l'adresse email</label>
                                    </div>

                                    <div class="input-field col s12 l6">
                                        <input type="password" name="password" id="password">
                                        <label for="password">Mot de passe</label>
                                    </div>

                                    <div class="input-field col s12 l6">
                                        <input type="password" name="repeat_password" id="repeat_password">
                                        <label for="repeat_password">Répéter le mot de passe</label>
                                    </div>
                                </div>

                                <div class="center">
                                    <button type="submit" name="submit" class="waves-effect waves-light btn cyan darken-2">S'inscrire</button>
                                </div>

                            </form>
                        </div>


                    </div>

                </div>
            </div>
        </div>

    </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('Public/template/template.php'); ?>