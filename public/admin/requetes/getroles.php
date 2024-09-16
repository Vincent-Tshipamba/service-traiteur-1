<?php

require_once '../../../config/connexion.php';

$query = "SELECT id, name FROM roles ORDER BY id DESC";
$stmt = $pdo->prepare($query);
$stmt->execute();
$roles = $stmt->fetchAll(PDO::FETCH_ASSOC);
