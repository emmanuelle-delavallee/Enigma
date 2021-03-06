<?php $this->title = "Enigma - Connexion"; ?>

</div>

<div class="common-background background-login">


    <div class="container discover-container">
        <h5 class="page-subtitle center white-text">Merci de vous connecter ou de vous inscrire pour jouer</h5>

        <?php if (isset($_POST['submit1'])) :

            $errors = [];
            $errors['different_MDP'] = "Le mots de passe ou le pseudo n'est pas bon";


            // Affiche les erreurs s'il y en a
            if (!empty($errors)) : ?>

                <div class="card red error-message">
                    <div class="card-content white-text">
                        <?php foreach ($errors as $error) : ?>
                            <p><?= $error ?><br /></p>
                        <?php endforeach ?>
                    </div>
                </div>

            <?php
            endif;
        endif;

        if (isset($_POST['submit2'])) :

            $pseudo = htmlspecialchars(trim($_POST['pseudo']));
            $email = htmlspecialchars(trim($_POST['email']));
            $repeat_email = htmlspecialchars(trim($_POST['repeat_email']));
            $password = htmlspecialchars(trim($_POST['password']));
            $repeat_password = htmlspecialchars(trim($_POST['repeat_password']));

            $errors = [];


            // Vérifie que tous les champs ont été complétés
            if (empty($pseudo) || empty($email) || empty($repeat_email) || empty($password) || empty($repeat_password)) :
                $errors['empty'] = "Veuillez remplir tous les champs";
            endif;


            // Vérifie que les deux adresses email saisies soient identiques
            if ($email != $repeat_email) :
                $errors['different'] = "Les adresses email ne correspondent pas";
            endif;


            // Vérifie que les deux mots de passe saisis soient identiques
            if ($password != $repeat_password) :
                $errors['different_MDP'] = "Les mots de passe ne correspondent pas";
            endif;

            // Affiche les erreurs s'il y en a
            if (!empty($errors)) : ?>

                <div class="card red error-message">
                    <div class="card-content white-text">
                        <?php foreach ($errors as $error) : ?>
                            <p><?= $error ?><br /></p>
                        <?php endforeach ?>
                    </div>
                </div>

        <?php endif;
        endif; ?>
        <div class="col s12 l12">
            <div class="row">
                <div class="col s12 m8 l4 offset-m2 offset-l1">
                    <div class="card-panel white z-depth-5">
                        <div class="row">

                            <form action="checkLogin" method="post">
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
                                    <button type="submit" name="submit1" class="waves-effect waves-light btn cyan darken-2">Se connecter</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


                <div class="col s12 m8 l4 offset-m2 offset-l1">
                    <div class="card-panel white z-depth-5">
                        <div class="row">
                            <form action="newUser" method="post">
                                <div class="row">

                                    <h4 class="center-align">S'inscrire</h4>

                                    <div class="input-field col s12 m12 l12">
                                        <input type="text" name="newpseudo" id="newpseudo">
                                        <label for="newpseudo">Pseudo</label>
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
                                        <input type="password" name="newpassword" id="newpassword">
                                        <label for="newpassword">Mot de passe</label>
                                    </div>

                                    <div class="input-field col s12 l6">
                                        <input type="password" name="repeat_password" id="repeat_password">
                                        <label for="repeat_password">Répéter le mot de passe</label>
                                    </div>
                                </div>

                                <div class="center">
                                    <button type="submit" name="submit2" class="waves-effect waves-light btn cyan darken-2">S'inscrire</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>