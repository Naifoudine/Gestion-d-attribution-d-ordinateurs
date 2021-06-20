<?php
ini_set('display_errors', 'on');
@session_start();
require "config_centre_culturel.php";

$reqAttrib = $db->query("SELECT * FROM `Attribution` INNER JOIN Utilisateurs U ON Attribution.id_utilisateur = U.id_utilisateur inner JOIN Ordinateurs O ON Attribution.id_pc = O.id_pc");


?>

<img src="../../config_centre_culturel.php" alt="">

<!-- MAIN -->
<div class="col p-4">
    <?php
    if (!empty($_SESSION['erreur'])) {
        echo '<div class="alert alert-danger" role="alert">
					' . $_SESSION['erreur'] . '
				  </div>';
        $_SESSION['erreur'] = "";
    } ?>

    <?php
    if (!empty($_SESSION['message'])) {
        echo '<div class="alert alert-success" role="alert">
					' . $_SESSION['message'] . '
				  </div>';
        $_SESSION['message'] = "";
    } ?>


    <div class="row d-inline-block w-100">
        <h1 class="display-4 d-inline-block">Attributions</h1>
        <a href="addAttrib.php"><button class="btn d-inline-block btn-primary d ms-auto p-2 bd-highlight">Ajouter une nouvelle attribution</button></a>
    </div>
    <table class=" table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nom d'utilisateur</th>
                <th scope="col">Nom PC</th>
                <th scope="col">Date</th>
                <th scope="col">À partir de</th>
                <th scope="col">Jusqu'à</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($donnees = $reqAttrib->fetch()) {
            ?>
                <tr>
                    <th scope="row"><?= $donnees['id_attribution']; ?></th>
                    <td><?= $donnees['nom_user']; ?></td>
                    <td><?= $donnees['nom_pc']; ?></td>
                    <td><?= $donnees['date']; ?></td>
                    <td><?= $donnees['heureDebut']; ?></td>
                    <td><?= $donnees['heureFin']; ?></td>
                    <td><a class="btn btn-warning btn-block" href="editAttrib.php?id_attribution=<?= $donnees['id_attribution'] ?>"><i class="bi bi-pencil-square"> Modifier</i></a> <br>
                        <a class="btn btn-danger btn-block" href="deleteAttrib.php?id_attribution=<?= $donnees['id_attribution'] ?>"><i class="bi bi-trash"> Supprimer</i></a>
                    </td>
                </tr>
            <?php
            }
            $reqAttrib->closeCursor(); ?>
        </tbody>
    </table>
</div>
<!-- Main Col END -->