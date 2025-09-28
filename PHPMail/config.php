<?php
// Configuration SMTP pour l'envoi d'emails
// Remplacez ces valeurs par vos paramètres SMTP

// Configuration Gmail (recommandé)
define('SMTP_HOST', 'smtp.gmail.com');
define('SMTP_PORT', 587);
define('SMTP_USERNAME', 'theo.baixeras@gmail.com'); // Votre adresse Gmail
define('SMTP_PASSWORD', 'your_app_password_here'); // Mot de passe d'application Gmail

// Alternative: Configuration pour d'autres fournisseurs
// Pour Outlook/Hotmail:
// define('SMTP_HOST', 'smtp-mail.outlook.com');
// define('SMTP_PORT', 587);

// Pour Yahoo:
// define('SMTP_HOST', 'smtp.mail.yahoo.com');
// define('SMTP_PORT', 587);

// Pour un serveur SMTP personnalisé:
// define('SMTP_HOST', 'your-smtp-server.com');
// define('SMTP_PORT', 587);
// define('SMTP_USERNAME', 'your-email@domain.com');
// define('SMTP_PASSWORD', 'your-password');

// Configuration de sécurité
define('MAX_MESSAGE_LENGTH', 5000);
define('MAX_NAME_LENGTH', 100);
define('MAX_SUBJECT_LENGTH', 200);

// Protection contre le spam
define('MIN_MESSAGE_LENGTH', 10);
?>
