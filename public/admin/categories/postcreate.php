<?php session_start();

require_once '../../../config/connexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupérer les données du formulaire
    $nom = $_POST['nom'];
    $description = $_POST['description'];

    try {
        // Préparer l'insertion dans la base de données
        // Assurez-vous de sécuriser cette partie pour éviter les injections SQL
        $stmt = $pdo->prepare('INSERT INTO categories (nom, description) VALUES (:nom, :description)');
        $stmt->execute([
            ':nom' => $nom,
            ':description' => $description
        ]);
        $_SESSION['success'] = "La catégorie $nom a été créée avec succès !";
    } catch (PDOException $e) {
        $_SESSION['error'] = 'Erreur : ' . $e->getMessage();
    }

    header("Location: /service-traiteur/public/admin/categories");
    exit();
}
