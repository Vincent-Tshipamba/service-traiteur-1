<?php session_start();

require_once '../../../config/connexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupérer les données du formulaire
    $nom = $_POST['nom'];
    $description = $_POST['description'];

    try {
        // Préparer l'insertion dans la base de données
        // Assurez-vous de sécuriser cette partie pour éviter les injections SQL
        $stmt = $pdo->prepare('INSERT INTO menus (nom, description) VALUES (:nom, :description)');
        $stmt->execute([
            ':nom' => $nom,
            ':description' => $description
        ]);
        $_SESSION['success'] = "Le menu $nom a été créé avec succès !";
    } catch (PDOException $e) {
        $_SESSION['error'] = 'Erreur : ' . $e->getMessage();
    }

    header("Location: /service-traiteur/public/admin/menus");
    exit();
}
