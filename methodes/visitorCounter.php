<?php
session_start();
require_once 'dbConnect.php';

$pdoManager = new DBManager('nwsnight');
$pdo = $pdoManager->getPDO();

function mettreAJourCompteurQuotidien($pdo) {
    $aujourdHui = date('Y-m-d');

    if (!isset($_COOKIE['visited_today'])) {
        setcookie('visited_today', true, strtotime('tomorrow'));

        $stmt = $pdo->prepare("SELECT * FROM visitorcount WHERE date = :aujourdHui");
        $stmt->bindParam(':aujourdHui', $aujourdHui);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
        } else {
            $insertStmt = $pdo->prepare("INSERT INTO visitorcount (date, visitor_num) VALUES (:aujourdHui, 1)");
            $insertStmt->bindParam(':aujourdHui', $aujourdHui);
            $insertStmt->execute();
        }
    }
}

mettreAJourCompteurQuotidien($pdo);

$pdo = null;
?>
