<!DOCTYPE html>
<html lang="fr">

<head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Materialize-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!--CSS-->
    <link type="text/css" rel="stylesheet" href="Public/css/style.css" media="screen" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Enigma est un site d'énigmes en ligne, dans une ambiance d'aventure avec des personnages de bandes-dessinées" />
    <title><?= $title ?></title>
</head>


<!--M.AutoInit() : allows to initialize all of the Materialize Components with a single function call-->

<body onload="M.AutoInit()">


    <?php require('View/template/topbar.php'); ?>

    <!-- Container de la page, contrôle la largeur occupée-->
    <div class="container content">
        <?= $content ?>
    </div>

    <?php require('View/template/botbar.php'); ?>

    <!--JavaScript at end of body for optimized loading-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="Public/js/canvas.js"></script>
    <script src="Public/js/enigma.js"></script>
    <script src="Public/js/main.js"></script>

</body>

</html>