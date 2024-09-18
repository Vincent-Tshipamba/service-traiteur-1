<?php session_start();

require_once '../../../config/connexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $menuId = $_GET['id'];

    try {
        $query = "DELETE FROM menus WHERE id=:menu_id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':menu_id', $menuId);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $_SESSION['success'] = 'Menu supprimé avec succès !';
        } else {
            $_SESSION['error'] = 'Aucun menu avec cet identifiant n\'a été trouvé.';
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