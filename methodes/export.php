<?php
require 'dbConnect.php';
require '../vendor/autoload.php';
$pdoManager = new DBManager('nwsnight');
$pdo = $pdoManager->getPDO();

$spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();

$sheet = $spreadsheet->getActiveSheet();

$sheet->setCellValue('A1', 'Prénom');
$sheet->setCellValue('B1', 'Nom');
$sheet->setCellValue('C1', 'Téléphone');
$sheet->setCellValue('D1', 'Email');
$sheet->setCellValue('E1', 'Entreprise');
$sheet->setCellValue('F1', 'Poste');
$sheet->setCellValue('G1', 'Date d\'inscription');
$sheet->setCellValue('H1', 'Photo');

$sql = "SELECT * FROM registrationgasp WHERE suppr != 1 OR suppr IS NULL";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

$row = 2;

if (count($result) > 0) {
    foreach ($result as $data) {
        $sheet->setCellValue('A' . $row, $data['firstname']);
        $sheet->setCellValue('B' . $row, $data['lastname']);
        $sheet->setCellValue('C' . $row, $data['tel']);
        $sheet->setCellValue('D' . $row, $data['mail']);
        $sheet->setCellValue('E' . $row, $data['company']);
        $sheet->setCellValue('F' . $row, $data['job']);
        $sheet->setCellValue('G' . $row, $data['registration_date']);

        if ($data['photo'] == 1) {
            $sheet->setCellValue('H' . $row, 'ne veut pas être pris en photo');
        } else {
            $sheet->setCellValue('H' . $row, '');
        }

        $row++;
    }
}

$filename = 'export_inscriptions.xlsx';

$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="' . $filename . '"');
header('Cache-Control: max-age=0');

$writer->save('php://output');
?>
