<?php
try {
  $db = new PDO('mysql:host=localhost;dbname=users;', 'root', 'root');
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
} catch (PDOException $e) {
  echo "Connection échouée : " . $e->getMessage();
}
