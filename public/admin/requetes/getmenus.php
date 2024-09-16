<?php

require_once '../../../config/connexion.php';

$query = "SELECT id, nom, description, DATE_FORMAT(created_at, '%d-%m-%Y') AS created_at FROM menus ORDER BY id DESC";

$menus = $pdo->query($query)->fetchAll(PDO::FETCH_ASSOC);
