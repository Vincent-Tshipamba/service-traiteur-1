<?php session_start();

require_once '../../../config/connexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $platId = $_GET['id'];

    try {
        $query = "DELETE FROM plats WHERE id=:plat_id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':plat_id', $platId);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $_SESSION['success'] = 'Repas supprimé avec succès !';
        } else {
            $_SESSION['error'] = 'Aucun repas avec cet identifiant n\'a été trouvé.';
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