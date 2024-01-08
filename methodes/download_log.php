<?php
$logFilePath = __DIR__ . '/scroll_log.txt';

// Vérifier si le fichier existe avant de le télécharger
if (file_exists($logFilePath)) {
    // Envoi des en-têtes pour le téléchargement
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename=' . basename($logFilePath));
    header('Content-Length: ' . filesize($logFilePath));
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Expires: 0');

    // Lire le contenu du fichier et l'envoyer au navigateur
    readfile($logFilePath);
    exit;
} else {
    // Redirection vers kpi.php si le fichier n'existe pas
    header('Location: kpi.php');
    exit;
}
?>