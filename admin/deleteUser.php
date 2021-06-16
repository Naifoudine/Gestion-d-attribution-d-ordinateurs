<?php

require "config_centre_culturel.php";

if (isset($_GET['id_utilisateur']) && !empty($_GET['id_utilisateur'])) {

    $sql = " DELETE FROM `Utilisateurs` WHERE `Utilisateurs`.`id_utilisateur` = :id_utilisateur;";

    $query = $db->prepare($sql);

    $query->bindValue(':id_utilisateur', $id, PDO::PARAM_INT);
    $query->execute();
    header('Location: utilisateurs.php');
}
