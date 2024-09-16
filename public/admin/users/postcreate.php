<?php

require_once '../../../config/connexion.php';

require '../composants/generer-password.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupérer les données du formulaire
    $username = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $role_id = $_POST['role_id'];   

    // Préparer l'insertion dans la base de données
    // Assurez-vous de sécuriser cette partie pour éviter les injections SQL
    $stmt = $pdo->prepare('INSERT INTO users (name, email, password, role_id) VALUES (:name, :email, :password, :role_id)');
    $stmt->execute([
        ':name' => $username,
        ':email' => $email,
        ':password' => $password,
        ':role_id' => $role_id
    ]);

    echo "Utilisateur créé avec succès. Un email a été envoyé avec les détails du compte.";
}

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
    $mail->isSMTP();                            // Utiliser SMTP
    $mail->Host = 'smtp.gmail.com';             // Serveur SMTP de Gmail
    $mail->SMTPAuth = true;                     // Activer l'authentification SMTP
    $mail->Username = 'tshipambalubobo80@gmail.com'; // Votre adresse Gmail
    $mail->Password = "xtry kfmv wqyp wgwt"; // Mot de passe d'application ou mot de passe Gmail
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Sécurisé par STARTTLS
    $mail->Port = 587;                          // Port TLS

    // Destinataires
    $mail->setFrom('tshipambalubobo80@gmail.com', 'Vincent Tshipamba');
    $mail->addAddress('tshipambavincent80@gmail.com'); // Adresse du destinataire

    // Contenu
    $mail->isHTML(true);                       // Format d'email HTML
    $mail->Subject = 'Objet de l\'email';
    $mail->Body    = 'Contenu HTML de l\'email';
    $mail->AltBody = 'Contenu texte alternatif pour les clients qui ne supportent pas HTML';

    // Envoyer l'email
    $mail->send();
    echo 'L\'email a été envoyé.';
} catch (Exception $e) {
    echo "L'email n'a pas pu être envoyé. Erreur : {$mail->ErrorInfo}";
}
?>

