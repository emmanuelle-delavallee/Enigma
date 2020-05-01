<div class="navbar-fixed">
    <?php
    if (!isset($_SESSION['admin'])) {
        $_SESSION['admin'] = '';
    } ?>
    <!-- Change la couleur du menu de la topbar si session admin = cyan si session utlisateur = gris-->
    <nav class="<?php if ($_SESSION['admin'] == "VRAI") echo 'cyan darken-2'; ?><?php if ($_SESSION['admin'] == "") echo 'grey darken-4'; ?>">


        <div class="nav-wrapper">
            <div class="container">

                <!-- MENU TOP GRANDES RESOLUTIONS -->

                <a href="index.php" class="brand-logo">Enigma</a>
                <a href="#" data-target="mobile-menu" class="sidenav-trigger"><i class="material-icons">menu</i></a>

                <ul class="right hide-on-med-and-down">
                    <li><a class="waves-effect waves-light" href="index.php?url=discover">Découvrir</a></li>
                    <li><a class="waves-effect waves-light" href="index.php?url=play">Jouer</a></li>
                    <li><a class="waves-effect waves-light" href="index.php?url=comments">Avis</a></li>

                    <!-- Si session admin en cours, affiche le bouton administration-->
                    <?php
                    if ($_SESSION['admin'] == "VRAI") {
                    ?>
                        <li><a class="waves-effect waves-light btn grey darken-3" href="index.php?url=adminDashboard">Administration</a></li>
                    <?php
                    }
                    ?>

                    <!-- Si utilisateur connecté, affiche les boutons Mon espace personnel et Déconnexion, Si pas de session utilisateur en cours, affiche le bouton Connexion-->
                    <?php
                    if (isset($_SESSION['username']) && $_SESSION['username'] != "") {
                    ?>
                        <li><a class="waves-effect waves-light btn grey darken-3" href="index.php?url=usersDashboard">Mon espace personnel</a></li>
                        <li><a class="waves-effect waves-light btn grey darken-3" href="index.php?url=logout"><i class="material-icons">exit_to_app</i></a></li>
                    <?php } else {
                    ?>
                        <li><a class="waves-effect waves-light btn grey darken-3" href="index.php?url=login">Connexion</a></li>
                    <?php
                    }
                    ?>

                </ul>

            </div>
        </div>
    </nav>
</div>


<!-- MENU LATERAL PETITES RESOLUTIONS -->

<ul class="sidenav" id="mobile-menu">

    <li>
        <div class="user-view center-align">
            <div>
                <img src="Public/img/posts/post.jpg" class="sidenav-background" alt="background-img">
            </div>
        </div>
    </li>

    <li><a href="index.php" class="waves-effect waves-light">Accueil</a></li>
    <li><a class="waves-effect waves-light btn grey darken-3" href="index.php?url=login">Connexion</a></li>
    <li><a class="waves-effect waves-light btn grey darken-3" href="#"><i class="material-icons">exit_to_app</i></a></li>
    <li>
        <div class="divider"></div>
    </li>

    <li><a class="waves-effect waves-light" href="index.php?url=discover">Découvrir</a></li>
    <li><a class="waves-effect waves-light" href="index.php?url=play">Jouer</a></li>
    <li><a class="waves-effect waves-light" href="index.php?url=comments">Avis</a></li>

</ul>