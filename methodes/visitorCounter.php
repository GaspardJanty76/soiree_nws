<?php
error_reporting(0);
ini_set('display_errors', 0);

session_start();

require_once 'dbConnect.php';

// Vérifier si l'utilisateur a déjà été compté pendant cette session
if (!isset($_SESSION['user_counted'])) {
    // Créez une instance de la classe DBManager pour obtenir la connexion PDO
    $pdoManager = new DBManager('nwsnight');
    $pdo = $pdoManager->getPDO();

    // Obtenez la date actuelle
    $today = date('Y-m-d');

    // Vérifiez si une entrée pour la date actuelle existe déjà dans la table
    $stmt = $pdo->prepare("SELECT * FROM page_visits WHERE visit_date = :today");
    $stmt->bindParam(':today', $today);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        // Si l'entrée existe, mettez à jour le compteur
        $visitorCount = $row['visitor_count'] + 1;
        $stmt = $pdo->prepare("UPDATE page_visits SET visitor_count = :count WHERE visit_date = :today");
        $stmt->bindParam(':count', $visitorCount);
        $stmt->bindParam(':today', $today);
        $stmt->execute();
    } else {
        // Sinon, insérez une nouvelle entrée pour la date actuelle
        $stmt = $pdo->prepare("INSERT INTO page_visits (visit_date, visitor_count) VALUES (:today, 1)");
        $stmt->bindParam(':today', $today);
        $stmt->execute();
    }

    // Marquer l'utilisateur comme ayant été compté pendant cette session
    $_SESSION['user_counted'] = true;
}

?>
