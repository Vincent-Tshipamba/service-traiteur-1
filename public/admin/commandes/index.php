<?php require '../requetes/getcommandes.php';

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

if ($user['name'] !== 'super-admin' && $user['name'] !== 'admin') {
    header(header: 'Location: /service-traiteur/public/admin/404.php');
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?? 'Rotana Hotel'; ?></title>
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
                                        <p class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Commandes</p>
                                    </div>
                                </li>
                            </ol>
                        </nav>
                    </div>


                </div>
                <div
                    class="grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200 dark:border-neutral-700">
                    <div>
                        <h2 class="text-xl font-semibold text-gray-800 dark:text-neutral-200">
                            Les commandes
                        </h2>
                        <p class="text-sm text-gray-600 dark:text-neutral-400">
                            Consultez toutes les commandes envoyées par vos clients.
                        </p>
                    </div>
                </div>
            </div>

            <?php if (isset($_SESSION['success'])): ?>
                <div id="alert-border-3" class="flex items-center p-4 mb-4 text-green-800 border-t-4 border-green-300 bg-green-50 dark:text-green-400 dark:bg-gray-800 dark:border-green-800" role="alert">
                    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <div class="ms-3 text-sm font-medium">
                        <?= $_SESSION['success'];
                        session_unset(); ?>
                    </div>
                    <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-border-3" aria-label="Close">
                        <span class="sr-only">Dismiss</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>
            <?php elseif (isset($_SESSION['error'])): ?>
                <div id="alert-border-2" class="flex items-center p-4 mb-4 text-red-800 border-t-4 border-red-300 bg-red-50 dark:text-red-400 dark:bg-gray-800 dark:border-red-800" role="alert">
                    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <div class="ms-3 text-sm font-medium">
                        <?= $_SESSION['error'];
                        session_unset(); ?>
                    </div>
                    <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-border-2" aria-label="Close">
                        <span class="sr-only">Dismiss</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>
            <?php endif; ?>

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table id="cmdTable" class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">#</th>
                            <th scope="col" class="px-6 py-3">Noms client</th>
                            <th scope="col" class="px-6 py-3">Repas</th>
                            <th scope="col" class="px-6 py-3">Date et heure livraison</th>
                            <th scope="col" class="px-6 py-3">Statut</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($commandes)) : ?>
                            <?php $key = 1;
                            foreach ($commandes as $commande) : ?>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td class="px-6 py-4"><?= $key++ ?></td>
                                    <td class="px-6 py-4"><?= $commande['prenom_client'] . ' ' . $commande['nom_client'] ?></td>
                                    <td class="px-6 py-4"><?= $commande['nom'] ?></td>
                                    <td class="px-6 py-4"><?= $commande['date_livraison'] . ' ' . $commande['heure_livraison'] ?></td>
                                    <td class="px-6 py-4">
                                        <?= $commande['statut'] ? 'livré' : 'Non livré' ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="/service-traiteur/node_modules/flowbite/dist/flowbite.min.js"></script>


    <script>
        function removecommande(event) {
            event.preventDefault()

            let link = event.target.closest('a').getAttribute("href");

            let form = document.getElementById('form-remove-commande');
            form.setAttribute('action', link);
        }
    </script>

</body>

</html>