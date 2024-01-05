<?php
function generateVisitorsCard($pdo)
{
    // Récupère la date actuelle
    $dateActuelle = date("Y-m-d");

    // Vérifie si une entrée pour la date actuelle existe déjà dans la base de données
    $stmt = $pdo->prepare("SELECT * FROM visitorcount WHERE date = :date");
    $stmt->bindParam(':date', $dateActuelle);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        // Met à jour le compteur s'il y a déjà une entrée pour la date actuelle
        $pdo->query("UPDATE visitorcount SET visitor_num = visitor_num + 1 WHERE date = '$dateActuelle'");
    } else {
        // Insère une nouvelle entrée pour la date actuelle si elle n'existe pas encore
        $stmt = $pdo->prepare("INSERT INTO visitorcount (date, visitor_num) VALUES (:date, 1)");
        $stmt->bindParam(':date', $dateActuelle);
        $stmt->execute();
    }

    // Récupère le nombre de visiteurs pour la date actuelle
    $result = $pdo->query("SELECT visitor_num FROM visitorcount WHERE date = '$dateActuelle'");
    $row = $result->fetch(PDO::FETCH_ASSOC);
    $nombreVisiteurs = $row['visitor_num'];

    // Met à jour la variable de session avec le nombre de visiteurs
    $_SESSION['nombreVisiteursQuotidiens'] = $nombreVisiteurs;

    // Affiche le nombre de visiteurs dans la card KPI (si nécessaire)
    echo '<div class="mb-6">';
    echo '<p class="text-lg">Nombre de visiteurs aujourd\'hui : <span class="font-bold">' . $nombreVisiteurs . '</span></p>';
    echo '</div>';
}

function getVisitorsCount($pdo)
{
    // Récupère le nombre de visiteurs pour la date actuelle
    $dateActuelle = date("Y-m-d");
    $result = $pdo->query("SELECT visitor_num FROM visitorcount WHERE date = '$dateActuelle'");
    $row = $result->fetch(PDO::FETCH_ASSOC);

    return $row['visitor_num'];
}