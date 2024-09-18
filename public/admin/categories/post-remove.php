<?php session_start();

require_once '../../../config/connexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $categorieId = $_GET['id'];

    try {
        $query = "DELETE FROM categories WHERE id=:categorie_id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':categorie_id', $categorieId);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $_SESSION['success'] = 'Catégorie supprimée avec succès !';
        } else {
            $_SESSION['error'] = 'Aucune catégorie avec cet identifiant n\'a été trouvée.';
        }
    } catch (PDOException $e) {
        $_SESSION['error'] = 'Erreur : ' . $e->getMessage();
    }

    header('Location: index.php');
    exit();
} else {
    $_SESSION['error'] = 'Aucune catégorie avec cet identifiant n\'a été trouvée.';
    header('Location: index.php');
    exit();
}