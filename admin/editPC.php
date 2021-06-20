<?php
session_start();
ini_set('display_errors', 'on');

include_once "./includes/header.php";


require_once "config_centre_culturel.php";

if ($_POST) {
    if (
        isset($_POST['id_pc']) && !empty($_POST['id_pc'])
        && isset($_POST['nom_pc']) && !empty($_POST['nom_pc'])
        && isset($_POST['Adresse_ip']) && !empty($_POST['Adresse_ip'])
    ) {
        $id = strip_tags($_GET['id_pc']);
        $nom = strip_tags($_POST['nom_pc']);
        $mail = strip_tags($_POST['Adresse_ip']);

        $sql = "UPDATE `Ordinateurs` SET `nom_pc`=:nom_pc, `Adresse_ip`=:Adresse_ip WHERE `Ordinateurs`.`id_pc`=:id_pc";

        $query = $db->prepare($sql);

        $query->bindValue(':nom_pc', $nom, PDO::PARAM_STR);
        $query->bindValue(':Adresse_ip', $mail, PDO::PARAM_STR);
        $query->bindValue(':id_pc', $id, PDO::PARAM_INT);

        $query->execute();
        $_SESSION['message'] = "Poste modifié avec succès !";
        header('Location: ordinateurs.php');
    } else {
        $_SESSION['erreur'] = "Le formulaire est incomplet";
    }
}

if (isset($_GET['id_pc']) && !empty($_GET['id_pc'])) {
    $id = strip_tags($_GET['id_pc']);
    $sql = "SELECT * FROM `Ordinateurs` WHERE `id_pc` = :id_pc";

    $query = $db->prepare($sql);

    $query->bindValue(':id_pc', $id, PDO::PARAM_INT);
    $query->execute();

    $PC = $query->fetch();
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
            // var_dump($PC);
            ?>
            <h1>Edition d'un Poste <br>
            </h1>
            <form method="post">
                <div class="form-group">
                    <label for="nom_pc">Nom du PC : </label>
                    <input class="form-control" type="text" id="	nom_pc" name="nom_pc" value="<?= $PC['nom_pc']; ?>">
                </div>

                <div class="form-group">
                    <label for="Adresse_ip">Adresse IP :</label>
                    <input class="form-control" type="text" id="Adresse_ip" name="Adresse_ip" value="<?= $PC['Adresse_ip']; ?>">
                </div>

                <input type="hidden" id="id_pc" name="id_pc" value="<?= $PC['id_pc']; ?>">
                <button class="btn btn-primary">Modifier</button>

            </form>
        </section>
    </div>
</main>