<?php
// Inclure le fichier de connexion à la base de données
require 'dbConnect.php';

// Créer une instance de la classe DBManager avec le nom de la base de données
$pdoManager = new DBManager('nwsnight');

// Récupérer l'objet PDO de la base de données
$pdo = $pdoManager->getPDO();

// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les nouvelles valeurs du formulaire
    $newTitle = $_POST['newTitle'];
    $newText = $_POST['newText'];

    // Écrire la requête SQL UPDATE
    $sql = "UPDATE content SET title = :title, text = :text WHERE idcontent = 1";

    // Préparer la requête
    $stmt = $pdo->prepare($sql);

    // Exécuter la requête en remplaçant les paramètres par les nouvelles valeurs
    $stmt->execute(['title' => $newTitle, 'text' => $newText]);

    header('Location: ../index.php');
    exit();
}

$sqlSelect = "SELECT title, text FROM content WHERE idcontent = 1";
$result = $pdo->query($sqlSelect);
$row = $result->fetch(PDO::FETCH_ASSOC);

if ($row) {
    $currentTitle = $row['title'];
    $currentText = $row['text'];
} else {
    die("Ligne non trouvée dans la base de données.");
}
?>
