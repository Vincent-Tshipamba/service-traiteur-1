<?php

// Inclure les fichiers PHPMailer nécessaires
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../config/PHPMailer/src/Exception.php';
require '../config/PHPMailer/src/PHPMailer.php';
require '../config/PHPMailer/src/SMTP.php';

// Créer une instance de PHPMailer
$mail = new PHPMailer(true);

try {
    // Configurer le serveur SMTP
    $mail->isSMTP(); // Utiliser SMTP
    $mail->Host = 'smtp.gmail.com'; // Serveur SMTP de Gmail
    $mail->SMTPAuth = true; // Activer l'authentification SMTP
    $mail->Username = 'tshipambalubobo80@gmail.com'; // Votre adresse Gmail
    $mail->Password = "xtry kfmv wqyp wgwt"; // Mot de passe d'application
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Sécurisé par STARTTLS
    $mail->Port = 587; // Port TLS

    // Destinataires
    $mail->setFrom('tshipambalubobo80@gmail.com', 'KinPlaza Arjaan By Rotana');
    $mail->addAddress($email_client); // Adresse du destinataire
    // Contenu
    $mail->isHTML(true); // Format d'email HTML
    $mail->Subject = 'Confirmation de votre commande chez Rotana !';
    $mail->Body = '
<section style="max-width: 32rem; padding: 2rem 1.5rem; margin: auto; background-color: #ffffff; color: #333;">
    <header>
        <a href="https://www.rotana.com/">
            <img src="https://hospitality-on.com/sites/default/files/styles/image738xosef_nowebp/public/2019-10/rotana.jpg?itok=pwNerQdh" alt="Kin Plaza Arjaan By Rotana" style="width: 50%; height: 100%; display: block; margin: 0 auto;">
        </a>
    </header>

    <main style="margin-top: 1rem;">
        <h2 style="margin-top: 1rem; color: #4a5568;">Bonjour ' . $prenom_client . ' '. $nom_client . '🍽️</h2>

        <p style="margin-top: 0.5rem; text-align: justify; line-height: 1.75; color: #4a5568;">
            Merci d\'avoir passé une commande auprès de notre service traiteur ! Votre commande a été reçue avec succès, et nous sommes ravis de vous servir.
        </p>

        <p style="margin-top: 0.5rem; line-height: 1.75; color: #4a5568;">
            <span style="font-weight: 700;">Détails de la commande : </span><br>
            <span style="font-weight: 700;">Prénom : </span> ' . $prenom_client . '<br>
            <span style="font-weight: 700;">Nom : </span> ' . $nom_client . '<br>
            <span style="font-weight: 700;">Adresse de livraison : </span> ' . $adresse_client . '<br>
            <span style="font-weight: 700;">Total de la commande : </span> ' . $prix_total . '$<br>
        </p>

        <p style="margin-top: 0.5rem; text-align: justify; line-height: 1.75; color: #4a5568;">
            Nous vous informerons dès que votre commande sera en route.
        </p>

        <p style="margin-top: 1rem; color: #4a5568;">
            Si vous avez des questions ou des demandes spéciales, n\'hésitez pas à nous contacter 😊
        </p>

        <p style="margin-top: 1rem; color: #4a5568;">
            Merci pour votre commande, <br>
            L\'équipe Kin Plaza Arjaan By Rotana
        </p>
    </main>

    <footer style="margin-top: 2rem; text-align: center;">
        <p style="margin-top: 1.5rem; color: #6b7280">
            Ce courriel a été envoyé à <a href="#" class="text-blue-600 hover:underline dark:text-blue-400" target="_blank">' . $email_client . '</a>. 
            Si vous préférez ne pas recevoir ce type d\'e-mail, vous pouvez <a href="#" style="color: #1c64f2;">gérer vos préférences en matière d\'e-mail.</a>.
        </p>
        <p style="margin-top: 0.75rem; color: #6b7280">© ' . date('Y') . ' Kin Plaza Arjaan By Rotana. Tous les droits sont réservés.</p>
    </footer>
</section>';
    $mail->AltBody = 'Contenu texte alternatif pour les clients qui ne supportent pas HTML';

    // Envoyer l'email
    $mail->send();
    echo 'L\'email a été envoyé.';
} catch (Exception $e) {
    echo "L'email n'a pas pu être envoyé. Erreur : {$mail->ErrorInfo}";
}
