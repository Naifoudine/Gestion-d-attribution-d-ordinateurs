<?php
session_start();
ini_set('display_errors', 'on');

include_once "./includes/header.php";

require_once "config_centre_culturel.php";

if (isset($_POST)) {
    if (
        isset($_POST['id_utilisateur']) && !empty($_POST['id_utilisateur'])
        && isset($_POST['nom_user']) && !empty($_POST['nom_user'])
        && isset($_POST['mail_user']) && !empty($_POST['mail_user'])
        && isset($_POST['tel_user']) && !empty($_POST['tel_user'])
    ) {
        $id = strip_tags($_GET['id_utilisateur']);
        $nom = strip_tags($_POST['nom_user']);
        $mail = strip_tags($_POST['mail_user']);
        $tel = strip_tags($_POST['tel_user']);

        $sql = "UPDATE `Utilisateurs` SET `nom_user`=:nom_user, `mail_user`=:mail_user, `tel_user`=:tel_user WHERE `Utilisateurs`.`id_utilisateur`=:id_utilisateur";

        $query = $db->prepare($sql);

        $query->bindValue(':nom_user', $nom, PDO::PARAM_STR);
        $query->bindValue(':mail_user', $mail, PDO::PARAM_STR);
        $query->bindValue(':tel_user', $tel, PDO::PARAM_INT);
        $query->bindValue(':id_utilisateur', $id, PDO::PARAM_INT);

        $query->execute();

        header('Location: utilisateurs.php');
    } else {
        $_SESSION['erreur'] = "Le formulaire est incomplet";
    }
}

if (isset($_GET['id_utilisateur']) && !empty($_GET['id_utilisateur'])) {
    $id = strip_tags($_GET['id_utilisateur']);
    $sql = "SELECT * FROM `Utilisateurs` WHERE `id_utilisateur` = :id_utilisateur";

    $query = $db->prepare($sql);

    $query->bindValue(':id_utilisateur', $id, PDO::PARAM_INT);
    $query->execute();

    $user = $query->fetch();
}

//require_once('close.php');


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
            }
            var_dump($user);
            ?>
            <h1>Edition d'un utilisateur <br>
            </h1>
            <form method="post">
                <div class="form-group">
                    <label for="nom_user">Nom d'utilisateur : </label>
                    <input class="form-control" type="text" id="	nom_user" name="nom_user" value="<?= $user['nom_user']; ?>">
                </div>

                <div class="form-group">
                    <label for="mail_user">Adresse mail :</label>
                    <input class="form-control" type="email" id="mail_user" name="mail_user" value="<?= $user['mail_user']; ?>">
                </div>

                <div class="form-group">
                    <label for="tel_user">Téléphone : </label>
                    <input class="form-tel_user" type="text" id="tel_user" name="tel_user" value="<?= $user['tel_user']; ?>">
                </div>
                <input type="hidden" id="id_utilisateur" name="id_utilisateur" value="<?= $user['id_utilisateur']; ?>">
                <button class="btn btn-primary">Modifier</button>

            </form>
        </section>
    </div>
</main>