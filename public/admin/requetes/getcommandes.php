<?php

require_once '../../../config/connexion.php';

$query = "SELECT c.prenom_client, c.nom_client, c.email_client, c.statut, c.prix_total, c.date_livraison, c.heure_livraison, c.quantite, plats.nom, DATE_FORMAT(c.created_at, '%d-%m-%Y') AS created_at FROM commandes c JOIN plats ON plats.id = c.plat_id ORDER BY c.id DESC";

$commandes = $pdo->query($query)->fetchAll(PDO::FETCH_ASSOC);
