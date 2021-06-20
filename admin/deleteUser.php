<?php

require_once "config_centre_culturel.php";

if (isset($_GET['id_utilisateur']) && !empty($_GET['id_utilisateur'])) {

    $id = strip_tags($_GET['id_utilisateur']);
    $sql = "DELETE FROM `Utilisateurs` WHERE `Utilisateurs`.`id_utilisateur` = :id_utilisateur;";

    $query = $db->prepare($sql);

    $query->bindValue(':id_utilisateur', $id, PDO::PARAM_INT);
    $query->execute();
    $_SESSION['message'] = "Utilisateur supprimé avec succès !";
    header('Location: utilisateurs.php');
}
