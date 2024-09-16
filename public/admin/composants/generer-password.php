<?php

function genererPassword($length = 12)
{
    // Assurez-vous que la longueur minimale est respectée
    if ($length < 8) {
        $length = 8;
    }

    // Définir les ensembles de caractères
    $lowercaseChars = 'abcdefghijklmnopqrstuvwxyz';
    $uppercaseChars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $digitChars = '0123456789';
    $specialChars = '!@#$%^&*';

    // Assurer qu'on inclut au moins un caractère de chaque ensemble
    $password = [
        $lowercaseChars[random_int(0, strlen($lowercaseChars) - 1)],
        $uppercaseChars[random_int(0, strlen($uppercaseChars) - 1)],
        $digitChars[random_int(0, strlen($digitChars) - 1)],
        $specialChars[random_int(0, strlen($specialChars) - 1)],
    ];

    // Compléter le mot de passe avec des caractères aléatoires
    $allChars = $lowercaseChars . $uppercaseChars . $digitChars . $specialChars;
    for ($i = 4; $i < $length; $i++) {
        $password[] = $allChars[random_int(0, strlen($allChars) - 1)];
    }

    // Mélanger les caractères pour éviter un ordre prévisible
    shuffle($password);

    // Convertir le tableau en chaîne de caractères
    return implode('', $password);
}

