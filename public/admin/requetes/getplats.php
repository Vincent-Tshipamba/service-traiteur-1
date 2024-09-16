<?php
session_start();

require_once '../../../config/database.php';

$db = new Database();

$connexion = $db->getConnection();

$query = "SELECT id, nom, description, image, prix, disponibilité, DATE_FORMAT(created_at, '%d-%m-%Y') AS created_at FROM plats ORDER BY id DESC";

$plats = $connexion->query($query)->fetchAll(PDO::FETCH_ASSOC);
