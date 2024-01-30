<?php
require_once 'dbConnect.php';

// Fonction pour obtenir l'adresse IP de l'utilisateur
function getIPAddress() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        return $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        return $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        return $_SERVER['REMOTE_ADDR'];
    }
}

// Créez une instance de la classe DBManager pour obtenir la connexion PDO
$pdoManager = new DBManager('nwsnight');
$pdo = $pdoManager->getPDO();

// Obtenez l'adresse IP de l'utilisateur
$ipAddress = getIPAddress();

// Vérifiez si l'adresse IP a déjà été enregistrée
$stmt = $pdo->prepare("SELECT * FROM visitor_locations WHERE ip_address = :ip");
$stmt->bindParam(':ip', $ipAddress);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$row) {
    // Si l'adresse IP n'a pas été enregistrée, obtenez la localisation
    $apiUrl = "https://ipinfo.io/{$ipAddress}/json";
    $locationInfo = json_decode(file_get_contents($apiUrl));

    // Enregistrez la localisation dans la base de données
    $location = isset($locationInfo->city) ? $locationInfo->city : 'N/A';
    $stmt = $pdo->prepare("INSERT INTO visitor_locations (ip_address, location) VALUES (:ip, :location)");
    $stmt->bindParam(':ip', $ipAddress);
    $stmt->bindParam(':location', $location);
    $stmt->execute();
} else {
    // Si l'adresse IP existe déjà, vous pouvez mettre à jour la localisation ici si nécessaire
    $location = $row['location'];
}
?>
