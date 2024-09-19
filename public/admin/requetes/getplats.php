<?php

require_once '../../../config/connexion.php';

$query = "SELECT menus.id as menu_id, menus.nom as menu, categories.id as categorie_id, categories.nom as categorie, plats.id, plats.nom, plats.description, plats.image, plats.prix, plats.disponibilite, DATE_FORMAT(plats.created_at, '%d-%m-%Y') AS created_at FROM plats JOIN categories ON categories.id = plats.categorie_id JOIN menus ON menus.id=plats.menu_id ORDER BY id DESC";

$plats = $pdo->query($query)->fetchAll(PDO::FETCH_ASSOC);
