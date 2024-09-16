<?php require '../requetes/getusers.php';

require '../requetes/getroles.php';

require '../composants/generer-password.php';

require_once "../Auth.php";

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

if ($user['name'] !== 'super-admin' && $user['name'] == 'admin') {
    // Rediriger vers une page d'accès refusé ou autre si le rôle n'est pas 'super admin'
    header(header: 'Location: /service-traiteur/public/admin/404.php');
    exit();
}

// Générer un mot de passe aléatoire de 8 caractères ou plus
$password = genererPassword(8);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?? 'Liste des utilisateurs'; ?></title>
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <link href="../../css/output.css" rel="stylesheet">
</head>

<body>
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        <?php include '../navigation.php'; ?>
        <div class="sm:ml-64 bg-[#eaeaebf3] pt-16 px-2 md:px-5 pb-4 ml-12 backdrop-blur-2xl">
            <div class=" w-full bg-[#fcdab40a] darj p-4 rounded-lg bg-opacity-5 relative">
                <!-- Header -->
                <div
                    class="py-2 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200 dark:border-neutral-700">
                    <div class="flex space-x-5 items-center">
                        <nav class="flex" aria-label="Breadcrumb">
                            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                                <li class="inline-flex items-center">
                                    <a href="/service-traiteur/public/admin" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                                        <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                                        </svg>
                                        Dashboard
                                    </a>
                                </li>
                                <li>
                                    <div class="flex items-center">
                                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                                        </svg>
                                        <a href="/service-traiteur/public/admin/users" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Utilisateurs</a>
                                    </div>
                                </li>
                            </ol>
                        </nav>
                    </div>


                    <div>
                        <div class="inline-flex gap-x-2">

                            <a href="#" data-modal-target="new-user-modal" data-modal-toggle="new-user-modal"
                                class="hover:bg-yellow-400 hover:text-white py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-yellow-300 text-black focus:outline-none disabled:opacity-50 disabled:pointer-events-none">
                                <svg class="w-6 h-6 text-gray-800 dark:text-white hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4.243a1 1 0 1 0-2 0V11H7.757a1 1 0 1 0 0 2H11v3.243a1 1 0 1 0 2 0V13h3.243a1 1 0 1 0 0-2H13V7.757Z" clip-rule="evenodd" />
                                </svg>
                                Créer un utilisateur
                            </a>
                        </div>
                    </div>
                </div>
                <div
                    class="grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200 dark:border-neutral-700">
                    <div>
                        <h2 class="text-xl font-semibold text-gray-800 dark:text-neutral-200">
                            Liste des utilisateurs
                        </h2>
                    </div>
                </div>
            </div>
            <?php include_once '../composants/listusers.php'; ?>
        </div>

    </div>
    <?php include_once '../composants/create-user.php'; ?>

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="/service-traiteur/node_modules/flowbite/dist/flowbite.min.js"></script>
</body>

</html>