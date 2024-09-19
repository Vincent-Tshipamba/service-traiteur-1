<?php
require_once '../../config/connexion.php';

require_once "Auth.php";

$auth = new Auth($pdo);

if (!$auth->isAuthenticated()) {
    header('Location: /service-traiteur/public/admin/login.php');
    exit();
}

// Vérifier si l'utilisateur a le rôle 'admin'
$userId = $_SESSION['user_id'];
$query = "SELECT roles.name FROM users JOIN roles ON roles.id=users.role_id WHERE users.id = :user_id";
$stmt = $pdo->prepare($query);
$stmt->bindParam(':user_id', $userId);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);
// die(print_r($user));
if ($user['name'] !== 'super-admin' && $user['name'] !== 'admin') {
    // Rediriger vers une page d'accès refusé ou autre si le rôle n'est pas 'admin'
    header('Location: /service-traiteur/public/admin/404.php');
    exit();
}

$querycommande = $pdo->query('SELECT COUNT(*) AS total FROM commandes');
$total_commandes = $querycommande->fetch(PDO::FETCH_ASSOC);

$queryusers = $pdo->query('SELECT COUNT(*) AS total FROM users');
$total_users = $queryusers->fetch(PDO::FETCH_ASSOC);

$querymenus = $pdo->query('SELECT COUNT(*) AS total FROM menus');
$total_menu = $querymenus->fetch(PDO::FETCH_ASSOC);

$querycategories = $pdo->query('SELECT COUNT(*) AS total FROM categories');
$total_categories = $querycategories->fetch(PDO::FETCH_ASSOC);

$queryplats = $pdo->query('SELECT COUNT(*) AS total FROM plats WHERE disponibilite=1');
$total_plats_dispo = $queryplats->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?? 'Rotana Hotel'; ?></title>
    <link href="../css/output.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#eaeaebf3]">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        <?php include 'navigation.php'; ?>
        <div class="p-4 sm:ml-64 mt-10 bg-[#eaeaebf3] pt-10 px-2 md:px-5 pb-4 ml-12  backdrop-blur-2xl">
            <h1
                class="mb-4 text-2xl font-extrabold leading-none tracking-tight text-gray-700 md:text-3xl lg:text-4xl dark:text-white">
                Tableau de Bord Administratif
            </h1>
            <p class="mb-6 text-lg font-normal text-gray-500 lg:text-xl  dark:text-gray-400">
                Supervision Complète : Menus, Categories, Commandes des repas et bien plus encore...</p>
            <div class="h-full min-h-screen w-full bg-gray-200 pt-12 p-2">
                <div class="grid gap-14 md:grid-cols-2 md:gap-5 lg:grid-cols-4">
                    <!-- Card for User Management -->
                    <div class="rounded-xl bg-white p-6 shadow-xl">
                        <div class="mx-auto flex h-16 w-16 -translate-y-12 transform items-center justify-center rounded-full bg-teal-400 shadow-lg shadow-teal-500/40">
                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M4.5 17H4a1 1 0 0 1-1-1 3 3 0 0 1 3-3h1m0-3.05A2.5 2.5 0 1 1 9 5.5M19.5 17h.5a1 1 0 0 0 1-1 3 3 0 0 0-3-3h-1m0-3.05a2.5 2.5 0 1 0-2-4.45m.5 13.5h-7a1 1 0 0 1-1-1 3 3 0 0 1 3-3h3a3 3 0 0 1 3 3 1 1 0 0 1-1 1Zm-1-9.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Z" />
                            </svg>

                        </div>
                        <h1 class="text-darken mb-3 text-xl font-medium text-center">Gestion des Utilisateurs</h1>
                        <p class="text-center text-gray-500">Gérez les utilisateurs de l'application. Ajoutez, modifiez ou supprimez des comptes utilisateurs.</p>
                    </div>

                    <!-- Card for Categories -->
                    <div class="rounded-xl bg-white p-6 text-center shadow-xl">
                        <div class="mx-auto flex h-16 w-16 -translate-y-12 transform items-center justify-center rounded-full shadow-lg bg-rose-500 shadow-rose-500/40">
                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M8 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1h2a2 2 0 0 1 2 2v15a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h2Zm6 1h-4v2H9a1 1 0 0 0 0 2h6a1 1 0 1 0 0-2h-1V4Zm-3 8a1 1 0 0 1 1-1h3a1 1 0 1 1 0 2h-3a1 1 0 0 1-1-1Zm-2-1a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2H9Zm2 5a1 1 0 0 1 1-1h3a1 1 0 1 1 0 2h-3a1 1 0 0 1-1-1Zm-2-1a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2H9Z" clip-rule="evenodd" />
                            </svg>

                        </div>
                        <h1 class="text-darken mb-3 text-xl font-medium">Gestion des catégories</h1>
                        <p class="text-gray-500">Créez et gérez les catégories pour vos repas, facilitant ainsi leur organisation et leur affichage.</p>
                    </div>

                    <!-- Card for Menus -->
                    <div class="rounded-xl bg-white p-6 text-center shadow-xl">
                        <div class="mx-auto flex h-16 w-16 -translate-y-12 transform items-center justify-center rounded-full shadow-lg bg-sky-500 shadow-sky-500/40">
                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M2 6a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6Zm4.996 2a1 1 0 0 0 0 2h.01a1 1 0 1 0 0-2h-.01ZM11 8a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2h-6Zm-4.004 3a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2h-.01ZM11 11a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2h-6Zm-4.004 3a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2h-.01ZM11 14a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2h-6Z" clip-rule="evenodd" />
                            </svg>

                        </div>
                        <h1 class="text-darken mb-3 text-xl font-medium">Gestion des menus</h1>
                        <p class="text-gray-500">Créez et personnalisez les menus en ajoutant des plats de différentes catégories.</p>
                    </div>

                    <!-- Card for Orders -->
                    <div class="rounded-xl bg-white p-6 text-center shadow-xl">
                        <div class="mx-auto flex h-16 w-16 -translate-y-12 transform items-center justify-center rounded-full shadow-lg bg-green-500 shadow-green-500/40">
                            <svg viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white">
                                <!-- Orders Icon SVG -->
                                <path d="M25 0C11.25 0 0 11.25 0 25C0 38.75 11.25 50 25 50C38.75 50 50 38.75 50 25C50 11.25 38.75 0 25 0ZM25 45C14.25 45 6 36.75 6 25C6 13.25 14.25 5 25 5C35.75 5 44 13.25 44 25C44 36.75 35.75 45 25 45ZM22.5 12.5H27.5C28.25 12.5 29 13.25 29 14V36C29 36.75 28.25 37.5 27.5 37.5H22.5C21.75 37.5 21 36.75 21 36V14C21 13.25 21.75 12.5 22.5 12.5Z" fill="white"></path>
                            </svg>
                        </div>
                        <h1 class="text-darken mb-3 text-xl font-medium">Gestion des commandes</h1>
                        <p class="text-gray-500">Suivez et gérez les commandes de repas des clients, y compris leur statut et les détails de livraison.</p>
                    </div>
                </div>

                <!-- Statistics Section -->
                <div class="mt-10 bg-white rounded-xl p-6 shadow-xl">
                    <h2 class="text-xl font-medium mb-4">Statistiques</h2>
                    <p class="text-gray-500">Affichez les statistiques clés ici, comme le nombre total de commandes, les utilisateurs actifs, et plus encore.</p>
                    <!-- Placeholder for statistics display -->
                    <div class="grid grid-cols-3 gap-4 mt-4">
                        <div class="bg-gray-100 p-4 rounded-lg shadow-md text-center hover:bg-yellow-100 hover:cursor-pointer">
                            <svg viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white">
                                <!-- Orders Icon SVG -->
                                <path d="M25 0C11.25 0 0 11.25 0 25C0 38.75 11.25 50 25 50C38.75 50 50 38.75 50 25C50 11.25 38.75 0 25 0ZM25 45C14.25 45 6 36.75 6 25C6 13.25 14.25 5 25 5C35.75 5 44 13.25 44 25C44 36.75 35.75 45 25 45ZM22.5 12.5H27.5C28.25 12.5 29 13.25 29 14V36C29 36.75 28.25 37.5 27.5 37.5H22.5C21.75 37.5 21 36.75 21 36V14C21 13.25 21.75 12.5 22.5 12.5Z" fill="white"></path>
                            </svg>
                            <h3 class="font-bold text-lg">Total Commandes</h3>
                            <p class="text-2xl"><?= $total_commandes['total'] ?></p>
                        </div>
                        <div class="bg-gray-100 p-4 rounded-lg shadow-md text-center hover:bg-yellow-100 hover:cursor-pointer">
                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M4.5 17H4a1 1 0 0 1-1-1 3 3 0 0 1 3-3h1m0-3.05A2.5 2.5 0 1 1 9 5.5M19.5 17h.5a1 1 0 0 0 1-1 3 3 0 0 0-3-3h-1m0-3.05a2.5 2.5 0 1 0-2-4.45m.5 13.5h-7a1 1 0 0 1-1-1 3 3 0 0 1 3-3h3a3 3 0 0 1 3 3 1 1 0 0 1-1 1Zm-1-9.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Z" />
                            </svg>
                            <h3 class="font-bold text-lg">Utilisateurs Actifs</h3>
                            <p class="text-2xl"><?= $total_users['total'] ?></p>
                        </div>
                        <div class="bg-gray-100 p-4 rounded-lg shadow-md text-center hover:bg-yellow-100 hover:cursor-pointer">
                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M8 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1h2a2 2 0 0 1 2 2v15a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h2Zm6 1h-4v2H9a1 1 0 0 0 0 2h6a1 1 0 1 0 0-2h-1V4Zm-3 8a1 1 0 0 1 1-1h3a1 1 0 1 1 0 2h-3a1 1 0 0 1-1-1Zm-2-1a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2H9Zm2 5a1 1 0 0 1 1-1h3a1 1 0 1 1 0 2h-3a1 1 0 0 1-1-1Zm-2-1a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2H9Z" clip-rule="evenodd" />
                            </svg>
                            <h3 class="font-bold text-lg">Plats Disponibles</h3>
                            <p class="text-2xl"><?= $total_plats_dispo['total'] ?></p>
                        </div>
                        <div class="bg-gray-100 p-4 rounded-lg shadow-md text-center hover:bg-yellow-100 hover:cursor-pointer">
                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M8 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1h2a2 2 0 0 1 2 2v15a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h2Zm6 1h-4v2H9a1 1 0 0 0 0 2h6a1 1 0 1 0 0-2h-1V4Zm-3 8a1 1 0 0 1 1-1h3a1 1 0 1 1 0 2h-3a1 1 0 0 1-1-1Zm-2-1a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2H9Zm2 5a1 1 0 0 1 1-1h3a1 1 0 1 1 0 2h-3a1 1 0 0 1-1-1Zm-2-1a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2H9Z" clip-rule="evenodd" />
                            </svg>

                            <h3 class="font-bold text-lg">Nombre des categories</h3>
                            <p class="text-2xl"><?= $total_categories['total'] ?></p>
                        </div>
                        <div class="bg-gray-100 p-4 rounded-lg shadow-md text-center hover:bg-yellow-100 hover:cursor-pointer">
                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M2 6a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6Zm4.996 2a1 1 0 0 0 0 2h.01a1 1 0 1 0 0-2h-.01ZM11 8a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2h-6Zm-4.004 3a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2h-.01ZM11 11a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2h-6Zm-4.004 3a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2h-.01ZM11 14a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2h-6Z" clip-rule="evenodd" />
                            </svg>
                            <h3 class="font-bold text-lg">Total des menus</h3>
                            <p class="text-2xl"><?= $total_menu['total'] ?></p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <script src="/service-traiteur/node_modules/flowbite/dist/flowbite.min.js"></script>
    </div>
</body>

</html>