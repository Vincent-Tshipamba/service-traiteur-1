<div class="text-center p-10" id="menus">
    <h1 class="font-bold text-4xl mb-4">Découvrez Nos Délicieux Menus</h1>
    <h2 class="text-2xl">Service Traiteur - Hôtel Rotana</h2>
</div>

<!-- ✅ Grid Section - Starts Here 👇 -->
<section
    class="container mx-auto grid grid-cols-1 lg:grid-cols-3 md:grid-cols-2 justify-items-center justify-center gap-y-20 gap-x-14 mt-10 mb-5">
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
    <!-- ✅ Carte du menu - Début -->
    <?php foreach ($plats as $key => $plat) { ?>
        <div class="w-full bg-white shadow-md rounded-xl duration-500 hover:scale-105 hover:shadow-xl">
            <!-- Lien cliquable vers les détails du menu -->
            <a href="/service-traiteur/public/commande.php?platId=<?= $plat['id'] ?>">
                <!-- Image du plat -->
                <img src="<?= htmlspecialchars($plat['image']) ?>"
                    alt="Buffet Mediteraneen" class="h-80 w-full object-cover rounded-t-xl" />
                <!-- Détails du plat : titre, type de cuisine, prix -->
                <div class="px-4 py-3 w-full">
                    <!-- Catégorie ou type de cuisine -->
                    <span class="text-gray-400 mr-3 uppercase text-xs"><?= $plat['categorie'] ?></span><br>
                    <span class="text-gray-400 mr-3 uppercase text-xs"><?= $plat['menu'] ?></span>
                    <!-- Nom du plat -->
                    <p class="text-lg font-bold text-black truncate block capitalize"><?= $plat['nom'] ?></p>
                    <p class="text-base font-thin text-black">
                        <?= $plat['disponibilite'] ? 'Disponible ✅' : '❌' ?>
                    </p>
                    <!-- Section prix avec possibilité d'afficher un prix réduit -->
                    <div class="flex items-center">
                        <p class="text-lg font-semibold text-black cursor-auto my-3"><?= $plat['prix'] . '$' ?></p>
                        <del>
                            <p class="text-sm text-gray-600 cursor-auto ml-2 hidden">$65</p>
                        </del>
                        <!-- Icône pour ajouter au panier -->
                        <div class="ml-auto">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                class="bi bi-bag-plus" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M8 7.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0v-1.5H6a.5.5 0 0 1 0-1h1.5V8a.5.5 0 0 1 .5-.5z" />
                                <path
                                    d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </a>
        </div>

    <?php }; ?>

</section>

<!-- ✅ Section des menus - Fin -->