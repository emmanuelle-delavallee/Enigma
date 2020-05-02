<!-- Vérification de session -->
<?php
if (!isset($_SESSION['admin'])) {
    $_SESSION['admin'] = '';
} ?>

<!-- MENU TOP GRANDES RESOLUTIONS -->
<div class="navbar-fixed">
    <nav class="grey darken-4">
        <div class="nav-wrapper">
            <div class="container">

                <!-- Modifie le titre de la topbar si admin connecté-->
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
                        <li><a class="waves-effect waves-light btn cyan darken-2" href="index.php?url=adminDashboard">Admin</a></li>
                    <?php
                    }
                    ?>

                    <!-- Si utilisateur connecté, affiche les boutons Mon espace personnel et Déconnexion, Si pas de session utilisateur en cours, affiche le bouton Connexion-->
                    <?php
                    if (isset($_SESSION['username']) && $_SESSION['username'] != "") {
                    ?>
                        <li><a class="waves-effect waves-light btn grey darken-3" href="index.php?url=usersDashboard">Mon espace</a></li>
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
            <div class="background">
                <img src="Public/img/home-img.jpg">
            </div>
            <a href="#user"><img class="circle" src="Public/img/2.jpg"></a>
            <a href="#name"><span class="white-text name">Bonjour<?= '' . $_SESSION['username'] ?>,</span></a>
            <p class="white-text">Prêt·e pour une nouvelle aventure ?</p>
        </div>
    </li>

    <!-- Si session admin en cours, affiche le bouton administration-->
    <?php
    if ($_SESSION['admin'] == "VRAI") {
    ?>
        <li><a class="waves-effect waves-light" href="index.php?url=adminDashboard">Administration</a></li>
        <li>
            <div class="divider"></div>
        </li>
    <?php
    }
    ?>


    <li><a href="index.php" class="waves-effect waves-light">Accueil</a></li>
    <li><a class="waves-effect waves-light" href="index.php?url=discover">Découvrir</a></li>
    <li><a class="waves-effect waves-light" href="index.php?url=play">Jouer</a></li>
    <li><a class="waves-effect waves-light" href="index.php?url=comments">Avis</a></li>
    <li>
        <div class="divider"></div>
    </li>



    <!-- Si utilisateur connecté, affiche les boutons Mon espace personnel et Déconnexion, Si pas de session utilisateur en cours, affiche le bouton Connexion-->
    <?php
    if (isset($_SESSION['username']) && $_SESSION['username'] != "") {
    ?>
        <li><a class="waves-effect waves-light" href="index.php?url=usersDashboard">Mon espace</a></li>
        <li><a class="waves-effect waves-light" href="index.php?url=logout">Déconnexion</a></li>
    <?php } else {
    ?>
        <li><a class="waves-effect waves-light" href="index.php?url=login">Connexion</a></li>
    <?php
    }
    ?>
</ul>