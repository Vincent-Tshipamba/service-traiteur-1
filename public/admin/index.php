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
$query = "SELECT role FROM users WHERE id = :user_id";
$stmt = $pdo->prepare($query);
$stmt->bindParam(':user_id', $userId);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user['role'] !== 'admin') {
    // Rediriger vers une page d'accès refusé ou autre si le rôle n'est pas 'admin'
    header('Location: /service-traiteur/public/admin/access_denied.php');
    exit();
}


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
        <div class="p-4 sm:ml-64 mt-10 bg-[#eaeaebf3] pt-16 px-2 md:px-5 pb-4 ml-12  backdrop-blur-2xl">
            <h1
                class="mb-4 text-2xl font-extrabold leading-none tracking-tight text-gray-700 md:text-4xl lg:text-5xl dark:text-white">
                Tableau de Bord Administratif
            </h1>
            <p class="mb-6 text-lg font-normal text-gray-500 lg:text-xl  dark:text-gray-400">
                Supervision Complète : Menus, Categories, Commandes des repas et bien plus encore...</p>
        </div>
        <script src="/service-traiteur/node_modules/flowbite/dist/flowbite.min.js"></script>
    </div>
</body>

</html>