<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: connexion.php");
    exit;
}

// supprime la variable $_SESSION["user"]
unset($_SESSION["user"]);
header("Location: connexion.php");
