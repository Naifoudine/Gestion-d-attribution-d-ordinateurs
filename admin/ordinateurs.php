<?php
include "./includes/header_b.php";

include "./includes/nav_b.php";

include "./includes/ordinateurs/sidebar_b.php";
if (!isset($_SESSION['user'])) {
    header("Location: connexion.php");
    exit;
}

include_once "./includes/footer_b.php";
