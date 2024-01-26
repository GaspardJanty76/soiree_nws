
<?php
require 'dbConnect.php';
require '../vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$pdoManager = new DBManager('nwsnight');
$pdo = $pdoManager->getPDO();

// Créez une feuille de calcul
$spreadsheet = new Spreadsheet();

// Export des informations de la table registrationgasp
$stmt = $pdo->query("SELECT COUNT(*) as count FROM registrationgasp");
$result = $stmt->fetch(PDO::FETCH_ASSOC);
$registrationCount = $result['count'];

// Export des informations de la table page_visits
$stmt = $pdo->query("SELECT SUM(visitor_count) as totalVisits FROM page_visits");
$result = $stmt->fetch(PDO::FETCH_ASSOC);
$totalVisits = $result['totalVisits'];

// Calcul du pourcentage d'inscrits par rapport au total des visites
$registrationPercentage = ($totalVisits > 0) ? round(($registrationCount / $totalVisits) * 100) : 0;

// Ajoutez les informations à la feuille de calcul 'Inscriptions'
$sheetRegistrations = $spreadsheet->getActiveSheet();
$sheetRegistrations->setTitle('Inscriptions');
$sheetRegistrations->setCellValue('A1', 'Nombre d\'inscrits');
$sheetRegistrations->setCellValue('B1', 'Pourcentage d\'inscrits par rapport aux visites');
$sheetRegistrations->setCellValue('C1', 'Total de visites');

$sheetRegistrations->setCellValue('A2', $registrationCount);
$sheetRegistrations->setCellValue('B2', $registrationPercentage . '%');
$sheetRegistrations->setCellValue('C2', $totalVisits);

$sheetVisits = $spreadsheet->createSheet();
$sheetVisits->setTitle('Visites');
$sheetVisits->setCellValue('A1', 'Date de visite');
$sheetVisits->setCellValue('B1', 'Nombre de visiteurs');

// Requête SQL pour obtenir les données des visites
$sqlVisits = "SELECT * FROM page_visits";
$stmtVisits = $pdo->prepare($sqlVisits);
$stmtVisits->execute();
$resultVisits = $stmtVisits->fetchAll(PDO::FETCH_ASSOC);

$rowVisits = 2; // Commencez à la deuxième ligne du fichier Excel

foreach ($resultVisits as $dataVisits) {
    $sheetVisits->setCellValue('A' . $rowVisits, $dataVisits['visit_date']);
    $sheetVisits->setCellValue('B' . $rowVisits, $dataVisits['visitor_count']);
    $rowVisits++;
}

// Feuille "Localisation"
$sheetLocation = $spreadsheet->createSheet();
$sheetLocation->setTitle('Localisation');
$sheetLocation->setCellValue('A1', 'Adresse IP');
$sheetLocation->setCellValue('B1', 'Localisation');

// Requête SQL pour obtenir les données des localisations
$sqlLocation = "SELECT * FROM visitor_locations";
$stmtLocation = $pdo->prepare($sqlLocation);
$stmtLocation->execute();
$resultLocation = $stmtLocation->fetchAll(PDO::FETCH_ASSOC);

$rowLocation = 2; // Commencez à la deuxième ligne du fichier Excel

foreach ($resultLocation as $dataLocation) {
    $sheetLocation->setCellValue('A' . $rowLocation, $dataLocation['ip_address']);
    $sheetLocation->setCellValue('B' . $rowLocation, $dataLocation['location']);
    $rowLocation++;
}

// Nom du fichier Excel
$filename = 'export_data.xlsx';

// Créez l'objet Writer pour Excel
$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');

// Définissez le type de réponse pour le navigateur
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="' . $filename . '"');
header('Cache-Control: max-age=0');

$writer->save('php://output');
?>