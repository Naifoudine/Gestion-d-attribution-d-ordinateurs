<?php
try {
    $db = new PDO('mysql:host=34.134.10.54;dbname=centre_culturel;', 'root', 'root');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
} catch (PDOException $e) {
    echo "Connection échouée : " . $e->getMessage();
}
