<?php
session_start();
ini_set('display_errors', 'on');

include_once "./includes/header.php";

if ($_POST) {
    if (
        isset($_POST['nom_user']) && !empty($_POST['nom_user'])
        && isset($_POST['mail_user']) && !empty($_POST['mail_user'])
        && isset($_POST['tel_user']) && !empty($_POST['tel_user'])
    ) {

        // On inclu la connection à la base
        // require_once('connect.php');

        require_once "config_centre_culturel.php";
        // On nettoie l'id envoyé

        $nom = strip_tags($_POST['nom_user']);
        $mail = strip_tags($_POST['mail_user']);
        $tel = strip_tags($_POST['tel_user']);

        $sql = 'INSERT INTO `Utilisateurs` (`id_utilisateur`, `nom_user`, `mail_user`, `tel_user`) VALUES (NULL, :nom_user, :mail_user, :tel_user)';

        $query = $db->prepare($sql);

        $query->bindValue(':nom_user', $nom, PDO::PARAM_STR);
        $query->bindValue(':mail_user', $mail, PDO::PARAM_STR);
        $query->bindValue(':tel_user', $tel, PDO::PARAM_STR);


        $query->execute();
        header("Location: utilisateurs.php");
    } else {
        $_SESSION['erreur'] = "Le formulaire est incomplet";
    }
}
//}




?>
<main class="container">
    <div class="row">
        <section class="col-12">
            <?php

            if (!empty($_SESSION['erreur'])) {
                echo '<div class="alert alert-danger" role="alert">
					' . $_SESSION['erreur'] . '
				  </div>';
                $_SESSION['erreur'] = "";
            } ?>
            <h1>Ajout d'un nouvel utilisateur <br>
            </h1>
            <form method="post">
                <div class="form-group">
                    <label for="nom_user">Nom d'utilisateur : </label>
                    <input class="form-control" type="text" id="	nom_user" name="nom_user">
                </div>

                <div class="form-group">
                    <label for="mail_user">Adresse mail :</label>
                    <input class="form-control" type="email" id="mail_user" name="mail_user">
                </div>

                <div class="form-group">
                    <label for="tel_user">Téléphone : </label>
                    <input class="form-tel_user" type="text" id="tel_user" name="tel_user">
                </div>
                <button class="btn btn-primary">Ajouter</button>

            </form>
        </section>
    </div>
</main>