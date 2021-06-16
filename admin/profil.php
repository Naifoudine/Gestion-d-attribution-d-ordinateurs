<?php

include "./includes/header_b.php"; ?>

<?php include "./includes/nav_b.php";
?>
<?php include "./includes/sidebar_b.php";
if (!isset($_SESSION['user'])) {
    header("Location: connexion.php");
    exit;
}
?>
<?php include_once "./includes/footer_b.php";


?>