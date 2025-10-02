<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/../vendor/autoload.php';

header('Content-Type: text/plain');

$mail = new PHPMailer(true);

try {
    // Configuration SMTP
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'niassy.lamine10@gmail.com';         // Ton email Gmail
    $mail->Password = 'efhi acpc neyg pziv';                  // Mot de passe d'application
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Expéditeur et destinataire
    $mail->setFrom($_POST['email'], $_POST['name']);
    $mail->addAddress('niassy.lamine10@gmail.com'); // Ton email de réception

    // Contenu du mail
    $mail->isHTML(false);
    $mail->Subject = $_POST['subject'];
    $mail->Body    = "Nom: " . $_POST['name'] . "\n"
                   . "Email: " . $_POST['email'] . "\n\n"
                   . "Message:\n" . $_POST['message'];

    $mail->send();

    // Réponse attendue par le JS
    echo 'OK';
} catch (Exception $e) {
    http_response_code(500); // Important pour JS
    echo "Erreur : " . $mail->ErrorInfo;
}
?>
