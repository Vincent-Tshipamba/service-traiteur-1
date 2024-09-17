<?php

// Inclure les fichiers PHPMailer nécessaires
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../../config/PHPMailer/src/Exception.php';
require '../../../config/PHPMailer/src/PHPMailer.php';
require '../../../config/PHPMailer/src/SMTP.php';

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
    $mail->setFrom('tshipambalubobo80@gmail.com', 'Vincent Tshipamba');
    $mail->addAddress($email); // Adresse du destinataire
    // Contenu
    $mail->isHTML(true); // Format d'email HTML
    $mail->Subject = 'Bienvenue en tant qu\'administrateur sur le Rotana Dashboard !';
    $mail->Body = '
<section style="max-width: 32rem; padding: 2rem 1.5rem; margin: auto; background-color: #ffffff; color: #333;">
    <header>
        <a href="https://www.rotana.com/">
            <img src="https://hospitality-on.com/sites/default/files/styles/image738xosef_nowebp/public/2019-10/rotana.jpg?itok=pwNerQdh" alt="Kin Plaza Arjaan By Rotana" style="width: 50%; height: 100%; display: block; margin: 0 auto;">
        </a>
    </header>

    <main style="margin-top: 1rem;">
        <h2 style="margin-top: 1rem; color: #4a5568;">Bonjour ' . $username . '🤗</h2>

        <p style="margin-top: 0.5rem; text-align: justify; line-height: 1.75; color: #4a5568; ">
            Félicitations 🤩 ! Vous êtes maintenant un administrateur sur notre plateforme d\'administration du service traiteur de l\'hôtel Kin Plaza Arjaan By Rotana. Vous pouvez vous connecter à votre compte en utilisant les informations suivantes :
        </p>

        <p style="margin-top: 0.5rem; line-height: 1.75; color: #4a5568;">
            <span style="font-weight: 700;">Nom d\'utilisateur : </span> ' . $username . '<br>
            <span style="font-weight: 700;">Mot de passe : </span> ' . $_POST['password'] . '<br>
            <span style="font-weight: 700;">URL de connexion : </span> <a href="http://127.0.0.1/service-traiteur/public/admin/login.php" style="text-decoration: underline; color: #3182ce;">Se connecter</a>
        </p>

        <p style="margin-top: 0.5rem; text-align: justify; line-height: 1.75; color: #4a5568; ">
            Surtout, n\'hésitez pas à nous contacter en cas de difficultés de connexion 😊
        </p>

        <p style="margin-top: 1rem; color: #4a5568;">
            Merci, <br>
            L\'équipe Kin Plaza Arjaan By Rotana
        </p>
    </main>

    <footer style="margin-top: 2rem; text-align: center;">
        <p style="margin-top: 1.5rem; color: #6b7280">
            Ce courriel a été envoyé à <a href="#" class="text-blue-600 hover:underline dark:text-blue-400" target="_blank">' . $email . '</a>. 
            Si vous préférez ne pas recevoir ce type d\'e-mail, vous pouvez <a href="#" style="color: #1c64f2; ">gérer vos préférences en matière d\'e-mail.</a>.
        </p>
        <p style="margin-top: 0.75rem; color: #6b7280">© ' . date('Y') . ' Kin Plaza Arjaan By Rotana. Tous les droits sont réservés.</p>
    </footer>
</section>
';
    $mail->AltBody = 'Contenu texte alternatif pour les clients qui ne supportent pas HTML';

    // Envoyer l'email
    $mail->send();
    echo 'L\'email a été envoyé.';
} catch (Exception $e) {
    echo "L'email n'a pas pu être envoyé. Erreur : {$mail->ErrorInfo}";
}
