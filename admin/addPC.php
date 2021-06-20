<?php

ini_set('display_errors', 'on');
session_start();
include_once "./includes/header.php";

require_once "config_centre_culturel.php";

if ($_POST) {
    if (
        isset($_POST['nom_pc']) && !empty($_POST['nom_pc'])
        && isset($_POST['Adresse_ip']) && !empty($_POST['Adresse_ip'])
    ) {

        $pc = strip_tags($_POST['nom_pc']);
        $adresseIP = $_POST['Adresse_ip'];


        $sql = "INSERT INTO `Ordinateurs` (`id_pc`, `nom_pc`, `Adresse_ip`) VALUES (NULL, :nom_pc, :Adresse_ip);";

        $query = $db->prepare($sql);

        $query->bindValue('nom_pc', $pc, PDO::PARAM_STR);
        $query->bindValue(':Adresse_ip', $adresseIP, PDO::PARAM_STR);

        $query->execute();
        $_SESSION['message'] = "Poste ajouté avec succès !";
        header('Location: ordinateurs.php');
    } else {
        $_SESSION['erreur'] = "Le formulaire est incomplet";
    }
}




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
            <h1>Ajout d'un nouvel ordinateur <br>
            </h1>
            <form method="post">
                <div class="form-group">
                    <label for="nom_pc">Nom du Poste : </label>
                    <input class="form-control" type="text" id="	nom_pc" name="nom_pc">
                </div>

                <div class="form-group">
                    <label for="Adresse_ip">Adresse IP :</label>
                    <input class="form-control" type="text" id="Adresse_ip" name="Adresse_ip">
                </div>
                <button class="btn btn-primary">Ajouter</button>

            </form>
        </section>
    </div>
</main>