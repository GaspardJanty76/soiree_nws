<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'dbConnect.php';
require_once 'registration.php';
require_once 'visitorCounter.php';

$ipstackApiKey = '73ab2f3c4ed1b624935493a819b03d95';

$pdoManager = new DBManager('nwsnight');
$pdo = $pdoManager->getPDO();

$userRegistration = new UserRegistration($pdo);

$unconfirmedUsersCount = $userRegistration->getUnconfirmedUsersCount();

function getGeoLocation($ip, $apiKey)
{
    $url = "http://api.ipstack.com/$ip?access_key=$apiKey";
    $data = json_decode(file_get_contents($url), true);

    return $data;
}

$userIP = $_SERVER['REMOTE_ADDR'];

$geoLocation = getGeoLocation($userIP, $ipstackApiKey);


function generateKPICard($title, $value)
{            echo '<div class="mb-6">';
            echo '<p class="text-lg">' . $title . ' : <span class="font-bold">' . $value . '</span></p>';
            echo '</div>';
}

// Récupère le nombre de visiteurs quotidiens depuis la session
//$nombreVisiteursQuotidiens = isset($_SESSION['nombreVisiteursQuotidiens']) ? $_SESSION['nombreVisiteursQuotidiens'] : 0;
// Récupère le nombre de visiteurs depuis la base de données
$nombreVisiteursQuotidiens = getVisitorsCount($pdo);

$query = $pdo->query("SELECT user_ip, scroll_position, section_name FROM scroll_tracking");
$data = $query->fetchAll(PDO::FETCH_ASSOC);

// Ajoutez d'autres KPI ici

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Vos KPI</title>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <h1 class="text-2xl font-bold mb-4">Vos KPI</h1>

    <div class="bg-white p-8 rounded shadow-md max-w-md w-full">
        <?php
        // Utilisation de la fonction pour afficher le KPI
        generateKPICard("Nombre de personnes non confirmées", $unconfirmedUsersCount);


        // Ajoutez d'autres KPI ici en utilisant la fonction
        ?>
    </div>

    <div class="bg-white p-8 rounded shadow-md max-w-md w-full">
        <?php

        // Affichez les informations de localisation géographique
        generateKPICard("Pays", $geoLocation['country_name']);
        generateKPICard("Ville", $geoLocation['city']);
        generateKPICard("Région", $geoLocation['region_name']);
        generateKPICard("Code postal", $geoLocation['zip']);

        // Ajoutez d'autres KPI ici en utilisant la fonction
        ?>
    </div>

    <div class="bg-white p-8 rounded shadow-md max-w-md w-full">
        <?php 
        echo "Nombre de visiteurs quotidiens : $nombreVisiteursQuotidiens";
        ?>
    </div>

    <?php
    // Ajoutez un lien pour télécharger le fichier texte
    echo '<div class="bg-white p-8 rounded shadow-md max-w-md w-full">';
    echo '<h2 class="text-xl font-bold mb-4">Télécharger le fichier de journal de scroll</h2>';

    $logFilePath = __DIR__ . '/scroll_log.txt';

    // Vérifier si le fichier existe avant de créer le lien
    if (file_exists($logFilePath)) {
        echo '<p><a href="download_log.php" class="text-blue-500">Télécharger le fichier</a></p>';
    } else {
        echo '<p>Aucune donnée de scroll n\'a été enregistrée.</p>';
    }

    echo '</div>';
    ?>


</body>
</html>

