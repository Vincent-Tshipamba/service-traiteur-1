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

<body>


    <div class="mx-auto h-screen w-screen bg-gray-50 flex justify-center items-center">
        <div class="container flex flex-col md:flex-row items-center justify-between px-5 text-gray-700">
            <div class="w-full lg:w-1/2 mx-8">
                <div class="text-7xl text-yellow-500 font-dark font-extrabold mb-8"> 401</div>
                <p class="text-2xl md:text-2xl font-light leading-normal mb-8">
                    Désolé, vous n'avez pas les autorisations nécessaires pour voir cette page ! <br/>
                    Veuillez en référer à votre supérieur si ceci est une erreur !
                </p>


                <a href="/service-traiteur/public" class="px-5 inline py-3 text-sm font-medium leading-5 shadow-2xl text-white transition-all duration-400 border border-transparent rounded-lg focus:outline-none bg-yellow-600 active:bg-green-600 hover:bg-yellow-700">Retourner à la page d'accueil</a>
            </div>
            <div class="w-full lg:flex lg:justify-end lg:w-1/2 mx-5 my-12">
                <img src="https://user-images.githubusercontent.com/43953425/166269493-acd08ccb-4df3-4474-95c7-ad1034d3c070.svg" class="" alt="Page not found">
            </div>

        </div>
    </div>

    <script src="/service-traiteur/node_modules/flowbite/dist/flowbite.min.js"></script>

</body>

</html>