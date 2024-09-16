<?php
require 'Auth.php';
require '../../config/connexion.php'; // Votre connexion PDO

$auth = new Auth($pdo);
$auth->logout();

header('Location: login.php');
exit();
