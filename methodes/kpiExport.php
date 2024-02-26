<?php
error_reporting(0);
ini_set('display_errors', 0);

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

// Export des informations de la table page_visits
$stmt = $pdo->query("SELECT * FROM page_visits");
$pageVisitsData = $stmt->fetchAll(PDO::FETCH_ASSOC);

$sheetPageVisits = $spreadsheet->createSheet();
$sheetPageVisits->setTitle('Visites');
$sheetPageVisits->setCellValue('A1', 'ID');
$sheetPageVisits->setCellValue('B1', 'Date de visite');
$sheetPageVisits->setCellValue('C1', 'Nombre de visiteurs');

foreach ($pageVisitsData as $rowIndex => $row) {
    $sheetPageVisits->fromArray(array_values($row), 'A' . ($rowIndex + 2));
}

// Export des informations de la table visitor_locations
$stmt = $pdo->query("SELECT ip_address, location FROM visitor_locations");
$visitorLocationsData = $stmt->fetchAll(PDO::FETCH_ASSOC);

$sheetVisitorLocations = $spreadsheet->createSheet();
$sheetVisitorLocations->setTitle('Localisations');
$sheetVisitorLocations->setCellValue('A1', 'Adresse IP');
$sheetVisitorLocations->setCellValue('B1', 'Emplacement');

foreach ($visitorLocationsData as $rowIndex => $row) {
    $sheetVisitorLocations->fromArray(array_values($row), 'A' . ($rowIndex + 2));
}

// Nom du fichier Excel
$filename = 'export_kpi.xlsx';

// Créez l'objet Writer pour Excel
$writer = new Xlsx($spreadsheet);

// Définissez le type de réponse pour le navigateur
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="' . $filename . '"');
header('Cache-Control: max-age=0');

// Enregistrez le fichier Excel dans la sortie du script
$writer->save('php://output');
exit();
?>
