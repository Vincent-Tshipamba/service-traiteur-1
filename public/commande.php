<?php
require '../config/database.php';

$database = new Database;

$connexion = $database->getConnection();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Passer une comande</title>
    <link href="css/output.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
</head>

<body>
    <?php include_once './parties/en-tete.php'; ?>

    <main class="">
        
        <?php include_once './parties/piedDePage.php'; ?>
    </main>
    <script src="/service-traiteur/node_modules/flowbite/dist/flowbite.min.js"></script>
</body>

</html>