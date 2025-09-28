# Configuration du système d'email

## Installation

1. **Installer Composer** (si pas déjà installé)
   ```bash
   composer install
   ```

2. **Configuration Gmail**
   - Activez l'authentification à 2 facteurs sur votre compte Gmail
   - Générez un mot de passe d'application :
     - Allez dans Paramètres Google > Sécurité
     - Activez l'authentification à 2 facteurs
     - Générez un mot de passe d'application pour "Mail"
   - Remplacez `your_app_password_here` dans `config.php` par votre mot de passe d'application

3. **Configuration du serveur**
   - Assurez-vous que PHP est installé (version 7.4+)
   - Activez l'extension `openssl` pour le chiffrement TLS
   - Vérifiez que les fonctions `mail()` et `curl` sont disponibles

## Fichiers créés

- `contact.html` : Formulaire de contact (racine du projet)
- `send_email.php` : Script PHP pour traiter l'envoi
- `config.php` : Configuration SMTP
- `composer.json` : Dépendances PHP
- `vendor/` : Dossier des dépendances (créé par Composer)

## Utilisation

1. Le formulaire envoie les données à `PHPMail/send_email.php`
2. Le script valide les données et envoie l'email via PHPMailer
3. Redirection vers le formulaire avec message de succès/erreur

## Sécurité

- Validation des champs côté serveur
- Protection contre l'injection HTML
- Limitation de la longueur des messages
- Utilisation de mots de passe d'application Gmail

## Test

Pour tester le système :
1. Remplissez le formulaire de contact
2. Vérifiez que l'email arrive à `theo.baixeras@gmail.com`
3. Vérifiez les logs d'erreur si nécessaire

## Dépannage

- Vérifiez que le mot de passe d'application Gmail est correct
- Vérifiez que l'authentification à 2 facteurs est activée
- Vérifiez les logs d'erreur PHP
- Testez la connexion SMTP avec un client email
