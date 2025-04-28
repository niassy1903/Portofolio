<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Charger PHPMailer
require 'vendor/autoload.php'; // si tu as installé avec Composer

$mail = new PHPMailer(true);

try {
    // Serveur SMTP
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'niassy.lamine10@gmail.com';  // Ton adresse Gmail
    $mail->Password = 'ymgrbncasjhskxxr';            // Ton mot de passe d'application Gmail
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Utiliser TLS
    $mail->Port = 587;  // Port TLS : 587

    // Expéditeur et destinataire
    $mail->setFrom($_POST['email'], $_POST['name']); // expéditeur (adresse email de l'utilisateur)
    $mail->addAddress('niassylamine10@gmail.com');    // destinataire (ton adresse Gmail)

    // Contenu
    $mail->isHTML(false);  // Format de message en texte brut
    $mail->Subject = $_POST['subject'];  // Sujet du message
    $mail->Body    = "Nom: " . $_POST['name'] . "\n" .
                     "Email: " . $_POST['email'] . "\n\n" .
                     "Message:\n" . $_POST['message']; // Corps du message

    $mail->send();
    echo 'Le message a été envoyé avec succès!';
} catch (Exception $e) {
    echo "Erreur lors de l'envoi du message : {$mail->ErrorInfo}";
}
?>
