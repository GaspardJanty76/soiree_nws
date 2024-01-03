<?php
error_log("IP: " . $userIP . ", Scroll Position: " . $scrollPosition);

// Assurez-vous d'inclure vos fichiers de connexion à la base de données ici
require_once 'dbConnect.php';

// Fonction pour insérer la position de défilement dans la base de données
function insertScrollPosition($ip, $position)
{
    $pdoManager = new DBManager('nwsnight');
    $pdo = $pdoManager->getPDO();

    // Utilisation de requêtes préparées pour éviter les injections SQL
    $stmt = $pdo->prepare("INSERT INTO scroll_tracking (user_ip, scroll_position) VALUES (:ip, :position)");
    $stmt->bindParam(':ip', $ip, PDO::PARAM_STR);
    $stmt->bindParam(':position', $position, PDO::PARAM_INT);

    try {
        $stmt->execute();
        echo json_encode(["success" => true]);
    } catch (PDOException $e) {
        echo json_encode(["success" => false, "error" => $e->getMessage()]);
    }
}

// Récupérez la position de défilement envoyée par le client
$data = json_decode(file_get_contents("php://input"), true);
$scrollPosition = isset($data['scrollPosition']) ? $data['scrollPosition'] : null;

// Vérifiez si scroll_position a une valeur valide
if ($scrollPosition !== null) {
    // Obtenez l'adresse IP de l'utilisateur
    $userIP = $_SERVER['REMOTE_ADDR'];

    // Insérez la position de défilement dans la base de données
    $inserted = insertScrollPosition($userIP, $scrollPosition);

    // Répondez au client en indiquant si l'insertion a réussi ou échoué
    if ($inserted) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false, "error" => "Erreur lors de l'insertion dans la base de données"]);
    }
} else {
    echo json_encode(["success" => false, "error" => "La position de défilement ne peut pas être nulle"]);
}

?>
