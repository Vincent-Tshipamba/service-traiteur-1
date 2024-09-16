<?php

require_once '../../../config/connexion.php';

$query = "SELECT users.id, users.name, roles.name AS role FROM users JOIN roles ON users.role_id=roles.id ORDER BY id DESC";
$stmt = $pdo->prepare($query);
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
