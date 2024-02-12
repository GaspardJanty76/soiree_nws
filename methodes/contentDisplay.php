<?php
// Inclure le fichier de connexion à la base de données
require_once 'dbConnect.php';

// Créer une instance de la classe DBManager avec le nom de la base de données
$pdoManager = new DBManager('nwsnight');

// Récupérer l'objet PDO de la base de données
$pdo = $pdoManager->getPDO();

// Écrire une requête SQL pour récupérer les données nécessaires
$sql = "SELECT title, text FROM content WHERE idcontent = 1"; // Utilisation de l'ID fixe (1)

// Exécuter la requête
$result = $pdo->query($sql);

// Récupérer la première ligne de résultat
$row = $result->fetch(PDO::FETCH_ASSOC);

// Vérifier si la requête a réussi
if ($row) {
    // Stocker les données dans des variables
    $title = $row['title'];
    $text = $row['text'];
} else {
    // Gérer le cas où la ligne n'est pas trouvée
    $title = "Titre non trouvé";
    $text = "Texte non trouvé";
}
?>