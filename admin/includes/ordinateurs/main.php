<?php
ini_set('display_errors', 'on');
@session_start();
require "config_centre_culturel.php";

$reqPC = $db->query("SELECT * FROM `Ordinateurs`");


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
        <h1 class="display-4 d-inline-block">Ordinateurs</h1>
        <a href="addPC.php"><button class="btn d-inline-block btn-primary d ms-auto p-2 bd-highlight">Ajouter un nouveau Poste</button></a>
    </div>
    <table class=" table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nom PC</th>
                <th scope="col">Adresse IP</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($donnees = $reqPC->fetch()) {
            ?>
                <tr>
                    <th scope="row"><?= $donnees['id_pc']; ?></th>
                    <td><?= $donnees['nom_pc']; ?></td>
                    <td><?= $donnees['Adresse_ip']; ?></td>
                    <td><a class="btn btn-warning btn-block" href="editPC.php?id_pc=<?= $donnees['id_pc'] ?>"><i class="bi bi-pencil-square"> Modifier</i></a> <br>
                        <a class="btn btn-danger btn-block" href="deletePC.php?id_pc=<?= $donnees['id_pc'] ?>"><i class="bi bi-trash"> Supprimer</i></a>
                    </td>
                </tr>
            <?php
            }
            $reqPC->closeCursor(); ?>
        </tbody>
    </table>
</div>
<!-- Main Col END -->