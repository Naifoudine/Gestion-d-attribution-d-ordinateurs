<?php
ini_set('display_errors', 'on');
@session_start();
require "config_centre_culturel.php";

$reqUser = $db->query("SELECT * FROM `Utilisateurs`");

?>


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
        <h1 class="display-4 d-inline-block">Utilisateurs</h1>
        <a href="addUser.php"><button class="btn d-inline-block btn-primary d ms-auto p-2 bd-highlight">Ajouter un nouvel utilisateur</button></a>
    </div>
    <table class=" table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nom d'utilisateur</th>
                <th scope="col">Adresse mail</th>
                <th scope="col">Telephone</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($donnees = $reqUser->fetch()) {
            ?>
                <tr>
                    <th scope="row"><?= $donnees['id_utilisateur']; ?></th>
                    <td><?= $donnees['nom_user']; ?></td>
                    <td><?= $donnees['mail_user']; ?></td>
                    <td><?= $donnees['tel_user']; ?></td>
                    <td>
                        <a class="btn btn-warning btn-block" href="editUser.php?id_utilisateur=<?= $donnees['id_utilisateur'] ?>"><i class="bi bi-pencil-square"> Modifier</i></a> <br>
                        <a class="btn btn-danger btn-block" onClick="javascript: return confirm('Voulez vous VRAIMENT supprimer cet utilisateur ?');" href="deleteUser.php?id_utilisateur=<?= $donnees['id_utilisateur'] ?>"><i class="bi bi-trash"> Supprimer</i></a>
                    </td>
                </tr>
            <?php
            }
            $reqUser->closeCursor(); ?>
        </tbody>
    </table>
</div>
<!-- Main Col END -->