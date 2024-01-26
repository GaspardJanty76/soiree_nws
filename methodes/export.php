<?php
require 'dbConnect.php';
require '../vendor/autoload.php';
$pdoManager = new DBManager('nwsnight');
$pdo = $pdoManager->getPDO();

// Créez un nouvel objet PhpSpreadsheet
$spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();

// Sélectionnez la feuille active
$sheet = $spreadsheet->getActiveSheet();

// En-têtes de colonne
$sheet->setCellValue('A1', 'Nom');
$sheet->setCellValue('B1', 'Prénom');
$sheet->setCellValue('C1', 'Email');
$sheet->setCellValue('D1', 'Numéro de SIRET');
$sheet->setCellValue('E1', 'Entreprise');
$sheet->setCellValue('F1', 'Poste');


// Requête SQL pour obtenir les données des inscriptions
$sql = "SELECT * FROM registrationgasp";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

$row = 2; // Commencez à la deuxième ligne du fichier Excel

if (count($result) > 0) {
    foreach ($result as $data) {
        $sheet->setCellValue('A' . $row, $data['firstname']);
        $sheet->setCellValue('B' . $row, $data['lastname']);
        $sheet->setCellValue('C' . $row, $data['tel']);
        $sheet->setCellValue('D' . $row, $data['mail']);
        $sheet->setCellValue('E' . $row, $data['company']);
        $sheet->setCellValue('F' . $row, $data['job']);

        $row++;
    }
}

// Nom du fichier Excel
$filename = 'tableau_excel.xlsx';

// Créez l'objet Writer pour Excel
$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');

// Définissez le type de réponse pour le navigateur
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="' . $filename . '"');
header('Cache-Control: max-age=0');

$writer->save('php://output');
?>
