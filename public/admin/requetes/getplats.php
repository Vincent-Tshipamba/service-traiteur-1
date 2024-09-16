<?php

require_once '../../../config/connexion.php';

$query = "SELECT id, nom, description, image, prix, disponibilité, DATE_FORMAT(created_at, '%d-%m-%Y') AS created_at FROM plats ORDER BY id DESC";

$plats = $pdo->query($query)->fetchAll(PDO::FETCH_ASSOC);
