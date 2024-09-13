<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?? 'Rotana Hotel'; ?></title>
    <link href="../css/output.css" rel="stylesheet">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
</head>

<body class="bg-[#eaeaebf3]">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        <?php include 'navigation.php'; ?>
        <div class="p-4 sm:ml-64 mt-10 bg-[#eaeaebf3] pt-20 px-2 md:px-5 pb-4 ml-12  backdrop-blur-2xl">
            <h1
                class="mb-4 mt-10 text-3xl font-extrabold leading-none tracking-tight text-gray-700 md:text-4xl lg:text-5xl dark:text-white">
                Tableau de Bord Administratif
            </h1>
            <p class="mb-6 text-lg font-normal text-gray-500 lg:text-xl  dark:text-gray-400">
                Supervision Complète : Activités, Apprenants, Employabilité et Présence</p>
        </div>
        <script src="/service-traiteur/node_modules/flowbite/dist/flowbite.min.js"></script>
    </div>
</body>

</html>