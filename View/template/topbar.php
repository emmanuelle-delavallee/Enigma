<!-- Vérification de session -->
<?php
if (!isset($_SESSION['admin'])) : $_SESSION['admin'] = '';
endif ?>

<!-- MENU TOP GRANDES RESOLUTIONS -->
<div class="navbar-fixed">
    <nav class="grey darken-4">
        <div class="nav-wrapper">
            <div class="container">

                <!-- Modifie le titre de la topbar si admin connecté-->
                <a href="home" class="brand-logo">Enigma</a>

                <a href="#" data-target="mobile-menu" class="sidenav-trigger"><i class="material-icons">menu</i></a>

                <ul class="right hide-on-med-and-down">
                    <li><a class="waves-effect waves-light" href="discover">Découvrir</a></li>
                    <li><a class="waves-effect waves-light" href="play">Jouer</a></li>
                    <li><a class="waves-effect waves-light" href="comments-1">Avis</a></li>

                    <!-- Si session admin en cours, affiche le bouton administration-->
                    <?php if ($_SESSION['admin'] == "VRAI") : ?>
                        <li><a class="waves-effect waves-light btn cyan darken-2" href="adminDashboard">Admin</a></li>
                    <?php endif ?>

                    <!-- Si utilisateur connecté, affiche les boutons Mon espace personnel et Déconnexion, Si pas de session utilisateur en cours, affiche le bouton Connexion-->
                    <?php if (isset($_SESSION['username']) && $_SESSION['username'] != "") : ?>
                        <li><a class="waves-effect waves-light btn grey darken-3" href="usersDashboard">Mon espace</a></li>
                        <li><a class="waves-effect waves-light btn grey darken-3" href="logout"><i class="material-icons">exit_to_app</i></a></li>
                    <?php else : ?>
                        <li><a class="waves-effect waves-light btn grey darken-3" href="login">Connexion</a></li>
                    <?php endif ?>
                </ul>
            </div>
        </div>
    </nav>
</div>


<!-- MENU LATERAL PETITES RESOLUTIONS -->

<ul class="sidenav" id="mobile-menu">

    <li>
        <div class="user-view center-align">
            <div class="background">
                <img src="Public/img/backgrounds/background.jpg" alt="background_image">
            </div>
            <?php if (isset($_SESSION['username']) && $_SESSION['username'] != "") : ?>
                <a href="#name"><span class="white-text name">Bonjour<?= '' . $_SESSION['username'] ?>,</span></a>
            <?php else : ?>
                <a href="#name"><span class="white-text name">Bonjour,</span></a>
            <?php endif ?>
            <p class="white-text">Prêt·e pour une nouvelle aventure ?</p>
        </div>
    </li>

    <!-- Si session admin en cours, affiche le bouton administration-->
    <?php if ($_SESSION['admin'] == "VRAI") : ?>
        <li><a class="waves-effect waves-light" href="adminDashboard">Administration</a></li>
        <li>
            <div class="divider"></div>
        </li>
    <?php endif ?>


    <li><a href="home" class="waves-effect waves-light">Accueil</a></li>
    <li><a class="waves-effect waves-light" href="discover">Découvrir</a></li>
    <li><a class="waves-effect waves-light" href="play">Jouer</a></li>
    <li><a class="waves-effect waves-light" href="comments-1">Avis</a></li>
    <li>
        <div class="divider"></div>
    </li>



    <!-- Si utilisateur connecté, affiche les boutons Mon espace personnel et Déconnexion, Si pas de session utilisateur en cours, affiche le bouton Connexion-->
    <?php if (isset($_SESSION['username']) && $_SESSION['username'] != "") :    ?>
        <li><a class="waves-effect waves-light" href="usersDashboard">Mon espace</a></li>
        <li><a class="waves-effect waves-light" href="logout">Déconnexion</a></li>
    <?php else : ?>
        <li><a class="waves-effect waves-light" href="login">Connexion</a></li>
    <?php endif ?>
</ul>