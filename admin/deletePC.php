<?php

require "config_centre_culturel.php";

if (isset($_GET['id_pc']) && !empty($_GET['id_pc'])) {

    $sql = " DELETE FROM `Ordinateurs` WHERE `Ordinateurs`.`id_pc` = :id_pc;";

    $query = $db->prepare($sql);

    $query->bindValue(':id_pc', $id, PDO::PARAM_INT);
    $query->execute();
    header('Location: ordinateurs.php');
}
