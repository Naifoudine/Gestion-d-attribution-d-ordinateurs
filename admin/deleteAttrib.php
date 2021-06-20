<?php

require "config_centre_culturel.php";

if (isset($_GET['id_attribution']) && !empty($_GET['id_attribution'])) {

    $sql = "DELETE FROM `Attribution` WHERE `Attribution`.`id_attribution` = :id_attribution;";

    $id = strip_tags($_GET['id_attribution']);
    $query = $db->prepare($sql);

    $query->bindValue(':id_attribution', $id, PDO::PARAM_INT);
    $query->execute();
    $_SESSION['message'] = "Attribution supprimée avec succès !";
    header('Location: attributions.php');
}
