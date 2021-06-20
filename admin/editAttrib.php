<?php
session_start();
ini_set('display_errors', 'on');

include_once "./includes/header.php";

// //var_dump($_GET);

// if (isset($_GET['id_attribution']) && !empty($_GET['id_attribution'])) {

//     // On inclu la connection à la base

//     require_once "config_centre_culturel.php";
//     // On nettoie l'id envoyé
//     $id = strip_tags($_GET['id_attribution']);

//     $sql = 'SELECT * FROM `Ordinateurs` WHERE `id_attribution` = :id_attribution';

//     // On prepare la requête
//     $query = $db->prepare($sql);


//     $query->bindValue(':id_attribution', $id, PDO::PARAM_INT);

//     // On execute la requête
//     $query->execute();

//     // On recupre l'user
//     $attribution = $query->fetch();
//     //var_dump($attribution);
//     print_r($attribution);

//     if (!$attribution) {
//         $_SESSION['erreur'] = "Cet id n'existe pas";
//         // header('Location: profil.php');
//         // echo $idFormation;
//     }

//     //header("Location: ordinateurs.php");
// } else {
//     $_SESSION['erreur'] = "URL INVALIDE";
//     // header('Location: ordinateurs.php');
// }

// if ($_GET) {
//     if (
//         isset($_GET['id_utilisateur']) && !empty($_GET['id_utilisateur'])
//         && isset($_GET['id_pc']) && !empty($_GET['id_pc'])
//         
//     ) {

//         // On inclu la connection à la base
//         // require_once('connect.php');

//         //require_once "config_centre_culturel.php";
//         // On nettoie l'id envoyé
//         $id = strip_tags($_GET['id_attribution']);
//         $attribution = strip_tags($_GET['id_utilisateur']);
//         $pc = strip_tags($_GET['id_pc']);

//         $sql = 'UPDATE `Ordinateurs` SET `id_utilisateur`=:id_utilisateur, `id_pc`=:id_pc WHERE `Ordinateurs`.`id_attribution`=:id_attribution';

//         $query = $db->prepare($sql);
//         $query->bindValue(':id_attribution', $id, PDO::PARAM_INT);
//         $query->bindValue(':id_utilisateur', $attribution, PDO::PARAM_STR);
//         $query->bindValue(':id_pc', $pc, PDO::PARAM_STR);


//         $query->execute();

//         $_SESSION['message'] = "Utilisateur modifiée";

//         header("Location: ordinateurs.php");
//     } else {
//         $_SESSION['erreur'] = "Le formulaire est incomplet";
//     }
// }



require_once "config_centre_culturel.php";

if (isset($_POST)) {
    if (
        isset($_POST['id_attribution']) && !empty($_POST['id_attribution'])
        && isset($_POST['id_utilisateur']) && !empty($_POST['id_utilisateur'])
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

        $sql = "UPDATE `Attribution` SET `id_utilisateur`=:id_utilisateur, `id_pc`=:id_pc, `date`=:date, `heureDebut`=:heureDebut, `heureFin`=:heureFin  WHERE `Attribution`.`id_attribution`=:id_attribution";

        $query = $db->prepare($sql);

        $query->bindValue(':id_utilisateur', $user, PDO::PARAM_STR);
        $query->bindValue(':id_pc', $pc, PDO::PARAM_STR);
        $query->bindValue(':date', $date, PDO::PARAM_STR);
        $query->bindValue(':heureDebut', $heureDebut, PDO::PARAM_STR);
        $query->bindValue(':heureFin', $heureFin, PDO::PARAM_STR);
        $query->bindValue(':id_attribution', $id, PDO::PARAM_INT);

        $query->execute();
        $_SESSION['message'] = "Modification entregistrée avec succès !";
        header('Location: attributions.php');
    }
}

if (isset($_GET['id_attribution']) && !empty($_GET['id_attribution'])) {
    $id = strip_tags($_GET['id_attribution']);
    $sql = "SELECT * FROM `Attribution` INNER JOIN Utilisateurs U ON Attribution.id_utilisateur = U.id_utilisateur inner JOIN Ordinateurs O ON Attribution.id_pc = O.id_pc WHERE `id_attribution` = :id_attribution";

    $query = $db->prepare($sql);

    $query->bindValue(':id_attribution', $id, PDO::PARAM_INT);
    $query->execute();

    $attribution = $query->fetch();
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
            //var_dump($attribution);
            ?>
            <h1>Edition attribution <br>
            </h1>
            <form method="post">
                <div class="form-group">
                    <label for="id_utilisateur">Nom d'utilisateur : </label>

                    <select name="id_utilisateur" id="id_utilisateur">

                        <option value='<?= $attribution['id_utilisateur']; ?>' selected> <?= $attribution['nom_user']; ?> </option>

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

                <div class="form-group">
                    <label for="id_pc">Nom du poste : </label>
                    <!-- <input class="form-control" type="text" id="id_pc" name="id_pc" value="<? //= $attribution['id_pc']; 
                                                                                                ?>"> -->

                    <select name="id_pc" id="id_pc">

                        <option value='<?= $attribution['id_pc']; ?>' selected> <?= $attribution['nom_pc']; ?> </option>

                        <?php
                        require_once "config_centre_culturel.php";

                        $requete = 'SELECT * FROM `Ordinateurs`';
                        $infosOrganisme = $db->query($requete);

                        while ($donnee = $infosOrganisme->fetch()) {
                            $id_Usr = $donnee['id_pc'];
                            $nom_Usr = $donnee['nom_pc'];
                        ?>

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
                    <input class="form-control" type="date" id="date" name="date" value="<?= $attribution['date']; ?>">
                </div>

                <div class="form-group">
                    <label for="heureDebut">À partir de :</label>
                    <input class="form-control" type="time" id="heureDebut" name="heureDebut" value="<?= $attribution['heureDebut']; ?>">
                </div>

                <div class="form-group">
                    <label for="heureFin">Jusqu'à :</label>
                    <input class="form-control" type="time" id="heureFin" name="heureFin" value="<?= $attribution['heureFin']; ?>">
                </div>

                <input type="hidden" id="id_attribution" name="id_attribution" value="<?= $attribution['id_attribution']; ?>">
                <button class="btn btn-primary">Modifier</button>

            </form>
        </section>
    </div>
</main>