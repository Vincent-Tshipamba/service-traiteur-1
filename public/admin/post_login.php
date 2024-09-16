<?php
require 'Auth.php';
require '../../config/connexion.php';

$auth = new Auth($pdo);

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';
$rememberMe = isset($_POST['remember-me']);

if ($auth->login($email, $password, $rememberMe)) {
    header('Location: index.php');
    exit();
} else {
    $_SESSION['error'] = 'Nom d\'utilisateur ou mot de passe incorrect';
    header('Location: login.php');
    exit();
}
