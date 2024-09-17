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
    <title>Rotana Hotel</title>
    <link href="/service-traiteur/public/css/output.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
</head>

<body>
    <?php include_once './parties/en-tete.php'; ?>

    <main class="">
        <?php include_once './parties/premiereSection.php'; ?>
        <?php include_once './parties/menusSection.php'; ?>
        <?php include_once './parties/services.php'; ?>
        <?php include_once './parties/contactForm.php'; ?>
        <?php include_once './parties/piedDePage.php'; ?>
    </main>
    <script src="/service-traiteur/node_modules/flowbite/dist/flowbite.min.js"></script>
</body>

</html>