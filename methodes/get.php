<?php
require_once 'dbConnect.php';
$pdoManager = new DBManager('nwsnight');
$pdo = $pdoManager->getPDO();
try {

    // Requête SQL pour sélectionner toutes les colonnes de la table "inscrit"
    $sql = "SELECT * FROM registrationgasp";

    // Préparation de la requête SQL
    $stmt = $pdo->prepare($sql);

    // Exécution de la requête SQL pour sélectionner toutes les données dans la table "inscrit"
    $stmt->execute();

    // Vérifier s'il y a des résultats de la requête SQL
    if ($stmt->rowCount() > 0) {
        // Afficher les données de la base de données dans un tableau
        while ($row = $stmt->fetch()) {
            echo "<tr";
            echo ">";

            echo "<td>" . $row["firstname"] . "</td>";
            echo "<td>" . $row["lastname"] . "</td>";
            echo "<td>" . $row["tel"] . "</td>";
            echo "<td>" . $row["mail"] . "</td>";
            echo "<td>" . $row["company"] . "</td>";
            echo "<td>" . $row["job"] . "</td>";

            echo "</tr>";
        }
    } else {
        // Si aucune ligne n'est trouvée dans la table "inscrit", afficher un message d'erreur
        echo "Aucun résultat trouvé dans la table 'inscrit'.";
    }

    // Fermer la connexion à la base de données
    $pdo = null;
} catch (PDOException $e) {
    // En cas d'erreur de connexion, afficher l'erreur
    echo "Erreur de connexion à la base de données: " . $e->getMessage();
}




?>
