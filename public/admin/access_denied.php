<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?? 'Rotana Hotel'; ?></title>
    <link href="../css/output.css" rel="stylesheet">
</head>

<body class="bg-[#eaeaebf3]">

    <div
        class="flex bg-white dark:bg-gray-900 items-center justify-center px-6 py-16 text-sm border-t-2 rounded-b shadow-sm border-red-500">
        <div class="ml-3">
            <div class="flex font-bold text-3xl text-left text-black dark:text-gray-50">
                <svg viewBox="0 0 24 24" class="w-8 h-8 text-red-500 stroke-current" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M12 8V12V8ZM12 16H12.01H12ZM21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
                <span class="ms-3 mb-2">Access refusé</span>
            </div>
            <div class="w-full text-gray-900 dark:text-gray-300 text-xl my-3">Vous n'êtes pas autorisé à accéder à cette page.</div>
            <button  type="submit" class="text-white bg-yellow-600 hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                <a href="/service-traiteur/public">Retourner à la page d'accueil</a>
            </button>
        </div>
    </div>
    <script src="/service-traiteur/node_modules/flowbite/dist/flowbite.min.js"></script>
</body>

</html>