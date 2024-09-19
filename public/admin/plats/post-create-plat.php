<?php session_start();

require_once "../../../config/connexion.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST)) {
    try {
        $name = $_POST['name'];
        $prix = $_POST['prix'];
        $description = $_POST['description'] ?? null;
        $imgpath = null;
        if (isset($_FILES) && count($_FILES) > 0) {
            $file = $_FILES['image'];
            if (isset($file) && $file['error'] == 0) {
                $fileInfo = pathinfo($file['name']);
                $extension = $fileInfo['extension'];

                $definitive_path = __DIR__ . '/uploads/'; // Navigate up three directories
                $imgpath = '/service-traiteur/public/admin/plats/uploads/' . basename($file['name']);
                $tmp_path = $file['tmp_name'];
                try {
                    if (!move_uploaded_file($tmp_path, $definitive_path . basename($file['name']))) {
                        if (!is_dir($definitive_path)) {
                            $_SESSION['error'] = "L'envoi n'a pas pu être effectué, le dossier uploads est manquant";
                            return;
                        }
                        $_SESSION['error'] = 'Une erreur s\'est produite lors de l\'envoi de l\'image.';
                    }
                } catch (\Throwable $th) {
                    $_SESSION['error'] = $th->getMessage();
                }
            }
        }
        $menu_id = $_POST['menu_id'];
        $categorie_id = $_POST['categorie_id'];
        $disponibilite = isset($_POST['disponibilite']);

        $query = "INSERT INTO plats (nom, description, image, prix, disponibilite, categorie_id, menu_id) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($query);
        $stmt->bindValue(1, $name);
        $stmt->bindValue(2, $description);
        $stmt->bindValue(3, $imgpath);
        $stmt->bindValue(4, $prix);
        $stmt->bindValue(5, $disponibilite);
        $stmt->bindValue(6, $categorie_id);
        $stmt->bindValue(7, $menu_id);

        $stmt->execute();
        $_SESSION['success'] = 'Repas ajouté avec succès !';
    } catch (\Throwable $th) {
        $_SESSION['error'] = $th->getMessage();
    }

    header('Location: /service-traiteur/public/admin/plats');
    exit();
}
