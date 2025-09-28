<?php
// Configuration
require_once 'config.php';

// Vérification de la méthode POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../contact.html');
    exit();
}

// Récupération et validation des données
$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$subject = trim($_POST['subject'] ?? '');
$message = trim($_POST['message'] ?? '');

// Validation des champs
$errors = [];

if (empty($name)) {
    $errors[] = 'Name is required';
}

if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Valid email is required';
}

if (empty($subject)) {
    $errors[] = 'Subject is required';
}

if (empty($message)) {
    $errors[] = 'Message is required';
}

// Si des erreurs existent, rediriger vers le formulaire
if (!empty($errors)) {
    header('Location: ../contact.html?error=' . urlencode(implode(', ', $errors)));
    exit();
}

// Chargement de PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

try {
    // Configuration PHPMailer
    $mail = new PHPMailer(true);
    
    // Configuration SMTP
    $mail->isSMTP();
    $mail->Host = SMTP_HOST;
    $mail->SMTPAuth = true;
    $mail->Username = SMTP_USERNAME;
    $mail->Password = SMTP_PASSWORD;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = SMTP_PORT;
    
    // Expéditeur et destinataire
    $mail->setFrom($email, $name);
    $mail->addAddress('theo.baixeras@gmail.com', 'Théo Baixeras');
    
    // Contenu de l'email
    $mail->isHTML(true);
    $mail->Subject = 'Contact Form: ' . $subject;
    
    $mail->Body = "
    <h2>New Contact Form Message</h2>
    <p><strong>Name:</strong> " . htmlspecialchars($name) . "</p>
    <p><strong>Email:</strong> " . htmlspecialchars($email) . "</p>
    <p><strong>Subject:</strong> " . htmlspecialchars($subject) . "</p>
    <p><strong>Message:</strong></p>
    <p>" . nl2br(htmlspecialchars($message)) . "</p>
    ";
    
    $mail->AltBody = "
    New Contact Form Message
    
    Name: " . $name . "
    Email: " . $email . "
    Subject: " . $subject . "
    
    Message:
    " . $message;
    
    // Envoi de l'email
    $mail->send();
    
    // Redirection vers le formulaire avec message de succès
    header('Location: ../contact.html?success=1');
    exit();
    
} catch (Exception $e) {
    // En cas d'erreur, rediriger avec un message d'erreur
    error_log("PHPMailer Error: " . $mail->ErrorInfo);
    header('Location: ../contact.html?error=' . urlencode('Failed to send message. Please try again.'));
    exit();
}
?>
