<?php session_start();

require_once '../../../config/connexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userId = $_GET['id'];

    try {
        $query = "DELETE FROM users WHERE id=:user_id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':user_id', $userId);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $_SESSION['success'] = 'Utilisateur supprimé avec succès !';
        } else {
            $_SESSION['error'] = 'Aucun utilisateur avec cet identifiant n\'a été trouvé.';
        }
    } catch (PDOException $e) {
        $_SESSION['error'] = 'Erreur de serveur : ' . $e->getMessage();
    }


    header('Location: index.php');
    exit();
}