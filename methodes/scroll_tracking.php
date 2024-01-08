<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Inclusion du fichier de connexion à la base de données
include 'dbConnect.php';

/// Récupération de l'objet PDO à partir de l'instance de DBManager
$dbManager = new DBManager("nwsnight");
$pdo = $dbManager->getPDO();

// Récupération de la position de défilement
$scroll_position = isset($_POST['scroll_position']) ? intval($_POST['scroll_position']) : 0;

// Déterminez la section en fonction de la position de défilement
$section_name = determineSection($scroll_position);

// Récupération de l'adresse IP de l'utilisateur
$user_ip = $_SERVER['REMOTE_ADDR'];

// Récupération de l'identifiant de l'utilisateur (à ajuster selon votre logique d'authentification)
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0;

// Enregistrement des données dans la base de données
$query = $pdo->prepare("INSERT INTO scroll_tracking (user_id, user_ip, scroll_position, section_name) VALUES (?, ?, ?, ?)");
$query->execute([$user_id, $user_ip, $scroll_position, $section_name]);

// Enregistrement des données dans un fichier texte
$logFilePath = __DIR__ . '/scroll_log.txt';
$logContent = date('Y-m-d H:i:s') . " - IP: $user_ip, User ID: $user_id, Scroll Position: $scroll_position, Section: $section_name\n";

file_put_contents($logFilePath, $logContent, FILE_APPEND);

// Fonction pour déterminer la section en fonction de la position de défilement
function determineSection($scroll_position) {
    // Implémentez votre logique pour déterminer la section en fonction de la position de défilement
    // Par exemple, divisez la page en sections et définissez des seuils de position de défilement pour chaque section
    // Retournez le nom de la section appropriée
    if ($scroll_position < 500) {
        return "Nav + compteur";
    } elseif ($scroll_position < 1000) {
        return "Nuit des ambassadeurs";
    } elseif ($scroll_position < 1500) {
        return "Information";
    } elseif ($scroll_position < 2000) {
        return "Inscription";
    } elseif ($scroll_position < 2500) {
        return "Transition vers map";
    } elseif ($scroll_position < 3000) {
        return "Map";
    } elseif ($scroll_position < 3500) {
        return "Contact";
    } else {
        return "Section 8";
    };
}
?>