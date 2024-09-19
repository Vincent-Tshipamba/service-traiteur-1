<?php

if (!$auth->isAuthenticated()) {
    header('Location: /service-traiteur/public/admin/login.php');
    exit();
}

// Vérifier si l'utilisateur a le rôle 'admin'
$userId = $_SESSION['user_id'];
$query = "SELECT roles.name AS role, users.name FROM users JOIN roles ON roles.id=users.role_id WHERE users.id = :user_id";
$stmt = $pdo->prepare($query);
$stmt->bindParam(':user_id', $userId);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<div>
    <nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
        <div class="px-3 py-3 lg:px-5 lg:pl-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center justify-start rtl:justify-end">
                    <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar"
                        aria-controls="logo-sidebar" type="button"
                        class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                        <span class="sr-only"></span>
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                            </path>
                        </svg>
                    </button>
                    <a href="/service-traiteur/public/admin" class="flex ms-2 md:me-24">
                        <span
                            class="self-center font-semibold text-xl md:text-3xl whitespace-nowrap dark:text-white">
                            Tableau de bord
                        </span>
                    </a>
                </div>
                <div class="flex items-center">
                    <div class="flex items-center ms-3">
                        <div class="mx-2">
                            <p><?= ($user['name']) ?? ''; ?></p>
                        </div>
                        <div>
                            <button type="button"
                                class="flex text-sm bg-white rounded-full border border-solid border-black focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                                aria-expanded="false" data-dropdown-toggle="dropdown-user">
                                <span class="sr-only"></span>
                                <img class="w-8 h-8 rounded-full" src="/service-traiteur/public/img/profil.jpeg" alt="user photo">

                            </button>
                        </div>
                        <div class="">
                            <a href="/service-traiteur/public" class="text-yellow-500 space-x-2 font-bold">
                                <svg class="w-7 h-7 hover:text-gray-900 text-gray-700 dark:text-white ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M11.293 3.293a1 1 0 0 1 1.414 0l6 6 2 2a1 1 0 0 1-1.414 1.414L19 12.414V19a2 2 0 0 1-2 2h-3a1 1 0 0 1-1-1v-3h-2v3a1 1 0 0 1-1 1H7a2 2 0 0 1-2-2v-6.586l-.293.293a1 1 0 0 1-1.414-1.414l2-2 6-6Z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        </div>
                        <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600"
                            id="dropdown-user">
                            <ul class="py-1" role="none">
                                <span></span>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                        role="menuitem">Profil</a>
                                </li>
                                <li>
                                    <a href="#" data-modal-target="logout-modal" data-modal-toggle="logout-modal"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                        role="menuitem">Se deconnecter</a>
                                </li>


                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Modal à afficher si la personne veut se déconnecter -->
    <?php require_once 'composants/logout-modal.php'; ?>
    <aside id="logo-sidebar"
        class="fixed left-0 z-40 w-64 h-screen transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
        aria-label="Sidebar">
        <div style="padding-top: 85px;" class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
            <ul class="space-y-2 font-medium">
                <li>
                    <a href="/service-traiteur/public/admin"
                        class="flex items-center space-x-3 p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group ">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"

                                d="M17 9h2V7h-2zm1 14q-2.075 0-3.537-1.463T13 18t1.463-3.537T18 13t3.538 1.463T23 18t-1.463 3.538T18 23m-.5-2h1v-2.5H21v-1h-2.5V15h-1v2.5H15v1h2.5zm5.5-7.875q-.975-1.05-2.275-1.588T18 11q-.275 0-.513.013t-.487.062V10l-7-5.05V3h13zM1 21V11l7-5l7 5v.675q-1.8.85-2.9 2.588T11 18q0 .775.163 1.538T11.675 21H10v-6H6v6z" />
                        </svg>
                        <span class="ms-3">Tableau de bord</span>

                    </a>
                </li>

                <li>
                    <div id="accordion-flush" data-accordion="collapse"
                        data-active-classes="bg-white dark:bg-gray-900 text-white dark:text-white"
                        data-inactive-classes="text-white dark:text-white">
                        <h2 id="accordion-flush-heading-2">
                            <button type="button"
                                class="flex items-center w-full gap-3 p-2 font-medium hover:bg-gray-100 text-gray-800 rounded-lg dark:text-white dark:hover:bg-gray-700"
                                data-accordion-target="#accordion-flush-body-2" aria-expanded="false"
                                aria-controls="accordion-flush-body-2">
                                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="false"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                    viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M15 4h3a1 1 0 0 1 1 1v15a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h3m0 3h6m-3 5h3m-6 0h.01M12 16h3m-6 0h.01M10 3v4h4V3h-4Z" />
                                </svg>
                                <span class=" text-gray-900  dark:text-gray-200">
                                    Alimentation
                                </span>

                            </button>
                        </h2>
                        <div id="accordion-flush-body-2" class="hidden" aria-labelledby="accordion-flush-heading-2">
                            <div class="p-4 border-b border-gray-200 dark:border-gray-700">
                                <p
                                    class="mb-2 p-2 hover:bg-gray-100 rounded-lg text-gray-900 hover:text-gray dark:text-gray-400 ">
                                    <a href="/service-traiteur/public/admin/menus">Liste des menus</a>
                                </p>
                                <p
                                    class="mb-2 p-2 hover:bg-gray-100 rounded-lg text-gray-900 hover:text-gray dark:text-gray-400 ">
                                    <a href="/service-traiteur/public/admin/categories">Liste des catégories</a>
                                </p>
                                <p
                                    class="mb-2 p-2 hover:bg-gray-100 rounded-lg text-gray-900 hover:text-gray dark:text-gray-400">
                                    <a href="/service-traiteur/public/admin/plats">Liste des plats</a>
                                </p>

                            </div>
                        </div>
                    </div>
                </li>
                <?php if ($user['role'] == 'super-admin') { ?>
                    <li>
                        <a href="/service-traiteur/public/admin/users"
                            class="flex items-center space-x-3 p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group ">
                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M8 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4H6Zm7.25-2.095c.478-.86.75-1.85.75-2.905a5.973 5.973 0 0 0-.75-2.906 4 4 0 1 1 0 5.811ZM15.466 20c.34-.588.535-1.271.535-2v-1a5.978 5.978 0 0 0-1.528-4H18a4 4 0 0 1 4 4v1a2 2 0 0 1-2 2h-4.535Z" clip-rule="evenodd" />
                            </svg>
                            <span class="ms-3">Utilisateurs</span>
                        </a>
                    </li>
                <?php } ?>
                <li>
                    <a href="/service-traiteur/public/admin/commandes"
                        class="flex items-center space-x-3 p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group ">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M8 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4H6Zm7.25-2.095c.478-.86.75-1.85.75-2.905a5.973 5.973 0 0 0-.75-2.906 4 4 0 1 1 0 5.811ZM15.466 20c.34-.588.535-1.271.535-2v-1a5.978 5.978 0 0 0-1.528-4H18a4 4 0 0 1 4 4v1a2 2 0 0 1-2 2h-4.535Z" clip-rule="evenodd" />
                        </svg>
                        <span class="ms-3">Liste des commandes</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>
</div>