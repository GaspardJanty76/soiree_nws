<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'dbConnect.php';
require_once 'registration.php';

$pdoManager = new DBManager('nwsnight');
$pdo = $pdoManager->getPDO();

$userRegistration = new UserRegistration($pdo);

$unconfirmedUsersCount = $userRegistration->getUnconfirmedUsersCount();


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
        // Fonction pour générer une card KPI réutilisable
        function generateKPICard($title, $value)
        {
            echo '<div class="mb-6">';
            echo '<p class="text-lg">' . $title . ' : <span class="font-bold">' . $value . '</span></p>';
            echo '</div>';
        }

        // Utilisation de la fonction pour afficher le KPI
        generateKPICard("Nombre de personnes non confirmées", $unconfirmedUsersCount);

        // Ajoutez d'autres KPI ici en utilisant la fonction
        ?>
    </div>
</body>
</html>
