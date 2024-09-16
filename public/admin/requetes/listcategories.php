<?php

require_once '../../../config/connexion.php';


$query = "SELECT id, nom, description, DATE_FORMAT(created_at, '%d-%m-%Y') AS created_at FROM categories ORDER BY id DESC";

$categories = $pdo->query($query)->fetchAll(PDO::FETCH_ASSOC);
$sqlprep = $pdo->prepare($query);
$sqlprep->execute();

$categories = $sqlprep->fetchAll(PDO::FETCH_ASSOC);
