<?php session_start();
require_once '../config/connexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST)) {
    $prenom_client = $_POST['prenom_client'];
    $nom_client = $_POST['nom_client'];
    $email_client = $_POST['email_client'];
    $adresse_client = $_POST['adresse_client'];
    $date_livraison = $_POST['date_livraison'];
    $heure_livraison = $_POST['heure_livraison'];
    $is_host = isset($_POST['is_host']);
    $prix_unitaire = $_POST['prix_unitaire'];
    $quantite = $_POST['quantite'];
    $prix_total = $_POST['prix_total'];
    $plat_id = $_POST['plat_id'];
    $notifier = isset($_POST['notifier']);
    $statut = 0;

    try {
        $sql = "INSERT INTO commandes(prenom_client, nom_client, email_client, adresse_client, statut, prix_unitaire, quantite, prix_total, plat_id, heure_livraison, date_livraison, is_host) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            $prenom_client,
            $nom_client,
            $email_client,
            $adresse_client,
            $statut,
            $prix_unitaire,
            $quantite,
            $prix_total,
            $plat_id,
            $heure_livraison,
            $date_livraison,
            $is_host
        ]);
        $_SESSION['success'] = "Merci beaucoup pour votre commande. Nous vous informerons dès que le repas sera fin prêt.";
        if ($notifier) {
            require 'sendmail.php';
            $_SESSION['success'] = "Merci beaucoup pour votre commande. Veuillez consulter vos mails pour savoir quand votre repas est fin prêt.";
        }
    } catch (\Throwable $th) {
        $_SESSION['error'] = $th->getMessage();
    }

    header('Location: /service-traiteur/public/');
    exit();
}
