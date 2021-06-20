<?php

ini_set('display_errors', 'on');
session_start();
include_once "./includes/header.php";

require_once "config_centre_culturel.php";

if ($_POST) {
    if (
        isset($_POST['id_utilisateur']) && !empty($_POST['id_utilisateur'])
        && isset($_POST['id_pc']) && !empty($_POST['id_pc'])
        && isset($_POST['date']) && !empty($_POST['date'])
        && isset($_POST['heureDebut']) && !empty($_POST['heureDebut'])
        && isset($_POST['heureFin']) && !empty($_POST['heureFin'])
    ) {
        $id = strip_tags($_GET['id_attribution']);
        $user = strip_tags($_POST['id_utilisateur']);
        $pc = strip_tags($_POST['id_pc']);
        $date = $_POST['date'];
        $heureDebut = strip_tags($_POST['heureDebut']);
        $heureFin = strip_tags($_POST['heureFin']);

        $sql = "INSERT INTO `Attribution` (`id_attribution`, `id_utilisateur`, `id_pc`, `date`, `heureDebut`, `heureFin`) VALUES (null, :id_utilisateur, :id_pc, :date, :heureDebut, :heureFin);";

        $query = $db->prepare($sql);

        $query->bindValue('id_utilisateur', $user, PDO::PARAM_STR);
        $query->bindValue(':id_pc', $pc, PDO::PARAM_STR);
        $query->bindValue(':date', $date, PDO::PARAM_STR);
        $query->bindValue(':heureDebut', $heureDebut, PDO::PARAM_STR);
        $query->bindValue(':heureFin', $heureFin, PDO::PARAM_STR);
        //$query->bindValue(':nombre', $nombre, PDO::PARAM_INT);




        $query->execute();
        $_SESSION['message'] = "Attribution ajoutée avec succès !";
        header('Location: attributions.php');
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
            <h1>Nouvelle attribution <br>
            </h1>
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
                        ?>

                        </h1>
                        <form method="post">
                            <div class="form-group">
                                <label for="id_utilisateur">Nom d'utilisateur : </label>

                                <select name="id_utilisateur" id="id_utilisateur">

                                    <option selected> <?= "Veullez choisir un utilisateur"; ?> </option>

                                    <?php
                                    require_once "config_centre_culturel.php";

                                    $requete = 'SELECT * FROM `Utilisateurs`';
                                    $infosOption = $db->query($requete);

                                    while ($donnee = $infosOption->fetch()) {
                                        $id_Usr = $donnee['id_utilisateur'];
                                        $nom_Usr = $donnee['nom_user'];
                                    ?>

                                        <option value='<?= $id_Usr;
                                                        ?>'> <?= $nom_Usr;
                                                                ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>

                            <!-- <div class="form-group">
                    <label for="id_pc">Nom du poste :</label>
                    <input class="form-control" type="text" id="id_pc" name="id_pc" value="<?= $attribution['id_pc']; ?>">
                </div> -->

                            <div class="form-group">
                                <label for="id_pc">Nom du poste : </label>
                                <!-- <input class="form-control" type="text" id="id_pc" name="id_pc" value="<? //= $attribution['id_pc']; 
                                                                                                            ?>"> -->

                                <select name="id_pc" id="id_pc">

                                    <option selected> <?= "Veullez choisir un poste";
                                                        ?> </option>

                                    <?php
                                    require_once "config_centre_culturel.php";

                                    $requete = 'SELECT * FROM `Ordinateurs`';
                                    $infosOrganisme = $db->query($requete);

                                    while ($donnee = $infosOrganisme->fetch()) {
                                        $id_Usr = $donnee['id_pc'];
                                        $nom_Usr = $donnee['nom_pc'];
                                    ?>

                                        <!-- //echo "<option value='$idDom'> $libDom </option>";   -->

                                        <option value='<?= $id_Usr;
                                                        ?>'> <?= $nom_Usr;
                                                                ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="date">Date :</label>
                                <input class="form-control" type="date" id="date" name="date">
                            </div>

                            <div class="form-group">
                                <label for="heureDebut">À partir de :</label>
                                <input class="form-control" type="time" id="heureDebut" name="heureDebut">
                            </div>

                            <div class="form-group">
                                <label for="heureFin">Jusqu'à :</label>
                                <input class="form-control" type="time" id="heureFin" name="heureFin">
                            </div>

                            <input type="hidden" id="id_attribution" name="id_attribution">
                            <button class="btn btn-primary">Valider</button>

                        </form>
                    </section>
                </div>
            </main>