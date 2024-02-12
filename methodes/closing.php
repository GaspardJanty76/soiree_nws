<?php
// Inclusion du fichier de connexion à la base de données
require_once 'dbConnect.php';

try {
    // Création d'une instance de DBManager avec le nom de la base de données
    $pdoManager = new DBManager('nwsnight'); // Assurez-vous de remplacer 'votre_base_de_donnees' par le nom de votre base de données
    // Récupération de l'objet PDO
    $pdo = $pdoManager->getPDO();

    // Récupérer la valeur actuelle de 'fermeture' dans la base de données
    $stmt = $pdo->query("SELECT fermeture FROM fermeture WHERE idfermeture = 1"); // Modifier 'table_nom' et 'id' selon votre structure de base de données
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $fermeture = $row['fermeture'];

    // Vérifier si la checkbox doit être cochée par défaut
    $isChecked = ($fermeture == 0) ? 'checked' : '';

    // Mettre à jour la valeur dans la base de données
    if (isset($_POST['fermeture']) && $_POST['fermeture'] == '1') {
        $fermeture = 0; // Si cochée, définir la valeur à 0
    } else {
        $fermeture = 1; // Sinon, définir la valeur à 1
    }

    $stmt = $pdo->prepare("UPDATE fermeture SET fermeture = :fermeture WHERE idfermeture = 1"); // Modifier 'table_nom' et 'id' selon votre structure de base de données
    $stmt->bindParam(':fermeture', $fermeture);
    $stmt->execute();

    echo "Mise à jour réussie";
} catch (PDOException $e) {
    echo "Erreur lors de la mise à jour : " . $e->getMessage();
}
?>
