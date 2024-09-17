<?php session_start();

require_once '../../../config/connexion.php';

require '../composants/generer-password.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupérer les données du formulaire
    $username = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $role_id = $_POST['role_id'];
    $sendmail = isset($_POST['mail']);

    try {
        // Préparer l'insertion dans la base de données
        // Assurez-vous de sécuriser cette partie pour éviter les injections SQL
        $stmt = $pdo->prepare('INSERT INTO users (name, email, password, role_id) VALUES (:name, :email, :password, :role_id)');
        $stmt->execute([
            ':name' => $username,
            ':email' => $email,
            ':password' => $password,
            ':role_id' => $role_id
        ]);
        $_SESSION['success'] = "L'Utilisateur a été créé avec succès. Vous lui transmettrez ses identifiants de connexion.";
        if ($sendmail) {
            require 'sendmail.php';
            $_SESSION['success'] = "Utilisateur créé avec succès. Un email 📧 a été envoyé à $username avec les détails du compte.";
        }
    } catch (PDOException $e) {
        $_SESSION['error'] = 'Erreur : ' . $e->getMessage();
    }

    header("Location: /service-traiteur/public/admin/users");
    exit();
}
