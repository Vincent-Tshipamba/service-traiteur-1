<?php session_start();

require '../config/connexion.php';

try {
    $platId = $_GET['platId'];
    $stmt = $pdo->prepare('SELECT * FROM plats WHERE id=:id');
    $stmt->execute([':id' => $platId]);
    $plat = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$plat) {
        header('Location: /service-traiteur/public/');
        exit();
    }
} catch (\Throwable $th) {
    $_SESSION['error'] = $th->getMessage();
    header('Location: /service-traiteur/public/');
    exit();
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Passer une comande pour <?= $plat['nom'] ?></title>
    <link href="css/output.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
</head>

<body>
    <?php include_once './parties/en-tete.php'; ?>

    <main class="">
        <?php if ($plat): ?>
            <section class="container py-24 mx-auto">
                <div class="flex-col md:flex-row justify-center flex gap-4 items-center mx-4 py-12">
                    <div class="flex w-full bg-white rounded-lg shadow dark:bg-gray-800 flex-col md:flex-row">
                        <div class="relative w-full flex justify-center items-center">
                            <img src="<?= $plat['image'] ?>" alt="shopping image"
                                class="object-cover w-full h-48 md:h-full rounded-t-lg md:rounded-l-lg md:rounded-t-none">
                        </div>
                        <form class="w-full flex-auto p-6" method="post" action="postcommand.php">
                            <div class="flex flex-wrap">
                                <h1 class="flex-auto text-xl font-semibold dark:text-gray-50"><?= $plat['nom'] ?></h1>
                                <div class="text-xl font-semibold text-gray-500 dark:text-gray-300">$<?= $plat['prix'] ?></div>
                                <div id="dispodiv" class="flex-none w-full mt-2 text-sm font-medium text-gray-500 dark:text-gray-300">
                                    <?= $plat['disponibilite'] ? "En stock ✅" : "Bientôt disponible" ?>
                                </div>
                            </div>
                            <div class="-mx-3 mt-6 flex flex-wrap">
                                <div class="w-full px-3 sm:w-1/2">
                                    <div class="mb-5">
                                        <label for="fName" class="mb-3 block text-base font-medium text-[#07074D]">
                                            Prénom
                                        </label>
                                        <input type="text" name="prenom_client" required id="fName" placeholder="Votre prénom"
                                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                    </div>
                                </div>
                                <div class="w-full px-3 sm:w-1/2">
                                    <div class="mb-5">
                                        <label for="fName" class="mb-3 block text-base font-medium text-[#07074D]">
                                            Nom
                                        </label>
                                        <input type="text" name="nom_client" required id="fName" placeholder="Votre nom"
                                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                    </div>
                                </div>
                                <div class="w-full px-3 sm:w-1/2">
                                    <div class="mb-5">
                                        <label for="email" class="mb-3 block text-base font-medium text-[#07074D]">
                                            Email
                                        </label>
                                        <input type="email" name="email_client" required id="email" placeholder="Votre adresse mail"
                                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                    </div>
                                </div>
                                <div class="w-full px-3 sm:w-1/2">
                                    <div class="mb-5">
                                        <label for="adresse" class="mb-3 block text-base font-medium text-[#07074D]">
                                            Lieu de livraison
                                        </label>
                                        <input type="text" name="adresse_client" required id="adresse" placeholder="Votre adresse"
                                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                    </div>
                                </div>

                                <div class="w-full px-3 sm:w-1/2">
                                    <div class="mb-5">
                                        <label for="date" class="mb-3 block text-base font-medium text-[#07074D]">
                                            Date
                                        </label>
                                        <input required type="date" name="date_livraison" id="date"
                                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                    </div>
                                </div>
                                <div class="w-full px-3 sm:w-1/2">
                                    <div class="mb-5">
                                        <label for="time" class="mb-3 block text-base font-medium text-[#07074D]">
                                            Heure souhaitée
                                        </label>
                                        <input type="time" name="heure_livraison" id="time"
                                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                    </div>
                                </div>
                                <div class="w-full px-3 sm:w-1/2">
                                    <div class="mb-5">
                                        <label for="quantite" class="mb-3 block text-base font-medium text-[#07074D]">
                                            Combien de plats ?
                                        </label>
                                        <input type="number" required name="quantite" id="quantite" placeholder="5" min="1" max="20"
                                            class="w-full appearance-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                    </div>
                                </div>
                                <div class="w-full px-3 sm:w-1/2">
                                    <div class="mb-5">
                                        <label for="prix_unitaire" class="mb-3 block text-base font-medium text-[#07074D]">
                                            Prix par plat
                                        </label>
                                        <input type="number" value="<?= $plat['prix'] ?>" name="prix_unitaire" readonly id="prix_unitaire"
                                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                    </div>
                                </div>
                                <div class="w-full px-3 sm:w-1/2">
                                    <div class="mb-5">
                                        <label for="prix_total" class="mb-3 block text-base font-medium text-[#07074D]">
                                            Prix total
                                        </label>
                                        <input type="number" readonly name="prix_total" id="prix_total"
                                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                    </div>
                                </div>
                                <div class="w-full px-3 sm:w-1/2">
                                    <div class="mb-5">
                                        <label class="mb-3 block text-base font-medium text-[#07074D]">
                                            Résidez-vous à Rotana?
                                        </label>
                                        <div class="flex items-center space-x-6">
                                            <div class="flex items-center">
                                                <input type="radio" name="is_host" id="radioButton1" class="h-5 w-5" />
                                                <label for="radioButton1" class="pl-3 text-base font-medium text-[#07074D]">
                                                    Oui
                                                </label>
                                            </div>
                                            <div class="flex items-center">
                                                <input type="radio" name="is_host" checked id="radioButton2" class="h-5 w-5" />
                                                <label for="radioButton2" class="pl-3 text-base font-medium text-[#07074D]">
                                                    Non
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full px-3">
                                    <div class="mb-5">
                                        <label class="mb-3 block text-base font-medium text-[#07074D]">
                                            Souhaitez-vous être notifié par mail de l'évolution de votre commmande?
                                        </label>
                                        <div class="flex items-center space-x-6">
                                            <div class="flex items-center">
                                                <input type="radio" checked name="notifier" id="notifier" class="h-5 w-5" />
                                                <label for="notifier" class="pl-3 text-base font-medium text-[#07074D]">
                                                    Oui
                                                </label>
                                            </div>
                                            <div class="flex items-center">
                                                <input type="radio" name="notifier" id="notifier2" class="h-5 w-5" />
                                                <label for="notifier2" class="pl-3 text-base font-medium text-[#07074D]">
                                                    Non
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="plat_id" value="<?= $plat['id'] ?>">
                            <div class="flex mb-4 text-sm font-medium">
                                <button type="submit" id="submit"
                                    class="py-2 px-4 bg-yellow-600 hover:bg-yellow-700 focus:ring-yellow-500 focus:ring-offset-indigo-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 rounded-lg ">
                                    Commander maintenant</button>
                            </div>
                            <p class="text-sm text-gray-500 dark:text-gray-300">Notez que le paiement se fait à la réception.</p>
                        </form>
                    </div>
                </div>
            </section>
        <?php endif; ?>
        <?php include_once './parties/piedDePage.php'; ?>
    </main>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>

    <script>
        var submit = document.querySelector('#submit');
        var dispo = document.getElementById('dispodiv');
        var prix_unitaire = $('#prix_unitaire').attr('value');
        var prix_total = document.getElementById('prix_total')

        $('#quantite').change(function(e) {
            e.preventDefault();
            var quantite = $('#quantite').val();
            var prixTT = prix_unitaire * quantite;
            console.log(prixTT);

            $('#prix_total').val(prixTT);
        });

        $(document).ready(function() {

            if (dispo.textContent.trim() === 'Bientôt disponible') {
                $(submit).text("Bientôt disponible");
                $(submit).prop('disabled', true);
                $(submit).addClass('hover:cursor-not-allowed');
            }
        });
    </script>

    <script src="/service-traiteur/node_modules/flowbite/dist/flowbite.min.js"></script>
</body>

</html>