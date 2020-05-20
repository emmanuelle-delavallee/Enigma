<?php $this->title = "Enigma - Espace personnel"; ?>

<div class="row">

    <?php if (isset($_FILES['image']['name'])) :

        // Vérifie si une image a été saisie, sinon ce sera l'image par défaut définie en BDD
        if (!empty($_FILES['image']['name'])) :
            $file = $_FILES['image']['name'];
            $extensions = ['.png', '.jpg', '.jpeg', '.gif', '.PNG', '.JPG', '.JPEG', '.GIF'];

            // Récupère l'extension du fichier
            $extension = strrchr($file, '.');

            // Vérifie si l'extension du fichier sélectionné est dans le tableau extensions
            if (!in_array($extension, $extensions)) :
                $errors['image'] = "Cette image n'est pas valide (formats acceptées : .png, .jpg, .jpeg, .gif, .png, .jpg, .jpeg, .gif)";
            endif;
        endif;

        // Affiche les erreurs s'il y en a, sinon upload et redirige vers l'article publié
        if (!empty($errors)) : ?>
            <div class="card red error-message">
                <div class="card-content white-text">
                    <?php foreach ($errors as $error) : ?>
                        <p><?= $error ?> </p><br />
                    <?php endforeach ?>
                </div>
            </div>
        <?php else : ?>
            <div class="card light-green lighten-2">
                <div class="card-content success-message">
                    <p class="center-align">Votre image a bien été ajoutée</p>
                </div>
            </div>
    <?php endif;
    endif; ?>

    <!-- OPTIONS UTILISATEUR -->
    <div class="col s12 m4 l4 right">
        <div class="card">
            <div class="card-content center">
                <?php if (!empty($users)) :
                    foreach ($users as $user) :  ?>
                        <img class="circle user_img" src="Public/img/users/<?= $user->image ?>" alt="user_img">
                        <h5>Bonjour <?= $user->pseudo ?></h5>
                        <a class="waves-effect waves-light btn cyan darken-2 modal-trigger" href="#userModal"><i class="material-icons left">settings</i>Options</a>

                <?php endforeach;
                endif; ?>
            </div>
        </div>
    </div>


    <!-- MODAL GESTION DE COMPTE -->
    <div id="userModal" class="modal">
        <div class="modal-content center">
            <h4 class="center">Gérer mon compte</h4>
            <div class="col s12">
                <form action="AddImage" method="post" enctype="multipart/form-data" class="col s12">
                    <h5>Modifier mon image personnelle</h5>
                    <div class="row">
                        <div class="file-field input-field col s8">
                            <div class="btn waves-effect waves-light">
                                <span>Sélectionner une image</span>
                                <input type="file" name="image">
                            </div>
                            <input type="text" class="file-path col s6" readonly />

                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="#!" class="modal-close btn waves-effect waves-light cyan darken-2">Annuler</a>
                        <button class="btn waves-effect waves-light cyan darken-2" type="submit" name="post">Appliquer</button>
                    </div>
            </div>
            </form>
        </div>
    </div>


    <!-- AFFICHAGE DES AVENTURES JOUEES / NON JOUEES -->
    <div class="row col s12 m8 l8">
        <div class="row">
            <h2 class="enigmas-title">Espace personnel</h2>
        </div>
    </div>

    <div class="col s12 m12 l12">
        <h4 class="enigmas-subtitle">Vos aventures</h4>
        <?php if ($responses != false) :
            foreach ($responses as $response) : ?>
                <div class="row">
                    <div class="col s12 m12 l4">
                        <img src="Public/img/<?= $response->image ?>" class="materialboxed responsive-img" alt="Image_personnelle">
                    </div>

                    <div class="col s12 m12 l8">
                        <h4 class="card-title"><?= $response->name ?></h4>
                        <p><?= $response->resume ?></p>
                        <?php if (!empty($response->id_user)) : ?>
                            <a class="right waves-effect waves-light btn cyan darken-2 btn-userdasboard-stories-img" href="enigma-<?= $response->id ?>-start">Rejouer <i class="material-icons right">play_arrow</i></a>
                        <?php else : ?>
                            <a class="right waves-effect waves-light btn cyan darken-2 btn-userdasboard-stories-img" href="enigma-<?= $response->id ?>-start">Jouer <i class="material-icons right">play_arrow</i></a>
                        <?php endif ?>
                    </div>
                </div>
        <?php endforeach;
        endif ?>
    </div>
</div>