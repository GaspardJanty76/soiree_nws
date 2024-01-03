<?php
session_start();
require_once 'dbConnect.php';


$pdoManager = new DBManager('nwsnight');

$pdo = $pdoManager->getPDO();



if (!isset($_SESSION['visited_today'])) {
    updateCounter($pdo);

    $_SESSION['visited_today'] = true;
}

function updateCounter($pdo) {
    $currentDate = date('Y-m-d');

    $query = "SELECT * FROM visitorcount WHERE date = :currentDate";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':currentDate', $currentDate);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (!empty($result)) {
        $pdo->exec("UPDATE visitorcount SET visitor_num = visitor_num + 1 WHERE date = '$currentDate'");
    } else {
        $stmt = $pdo->prepare("INSERT INTO visitorcount (date, visitor_num) VALUES (:currentDate, 1)");
        $stmt->bindParam(':currentDate', $currentDate);
        $stmt->execute();
    }
}

$query = "SELECT SUM(visitor_num) AS total_visiteurs FROM visitorcount";
$stmt = $pdo->prepare($query);
$stmt->execute();

$row = $stmt->fetch(PDO::FETCH_ASSOC);
$totalVisitors = $row['total_visiteurs'];
echo "Nombre total de visiteurs : $totalVisitors";

$pdo = null;
?>
