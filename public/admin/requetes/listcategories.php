<?php

require_once '../../../config/database.php';

$db = new Database();

$connexion = $db->getConnection();

$query = "SELECT id, nom, description, DATE_FORMAT(created_at, '%d-%m-%Y') AS created_at FROM categories ORDER BY id DESC";

$categories = $connexion->query($query)->fetchAll(PDO::FETCH_ASSOC);
