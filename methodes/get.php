<?php
require_once 'dbConnect.php';
$pdoManager = new DBManager('nwsnight');
$pdo = $pdoManager->getPDO();
try {

    // Requête SQL pour sélectionner toutes les colonnes de la table "inscrit" sauf celles où suppr est égal à 1
    $sql = "SELECT * FROM registrationgasp WHERE suppr != 1 OR suppr IS NULL";

    // Préparation de la requête SQL
    $stmt = $pdo->prepare($sql);

    // Exécution de la requête SQL
    $stmt->execute();

    // Vérifier s'il y a des résultats de la requête SQL
    if ($stmt->rowCount() > 0) {
        // Afficher les données de la base de données dans un tableau
        while ($row = $stmt->fetch()) {
            echo "<tr data-id='" . $row["id"] . "'>"; // Ajoutez un attribut data-id pour stocker l'identifiant de l'utilisateur
            echo "<td>" . $row["firstname"] . "</td>";
            echo "<td>" . $row["lastname"] . "</td>";
            echo "<td>" . $row["tel"] . "</td>";
            echo "<td>" . $row["mail"] . "</td>";
            echo "<td>" . $row["company"] . "</td>";
            echo "<td>" . $row["job"] . "</td>";
            echo "<td>
                    <form action='methodes/usersDelete.php' method='post'>
                        <input type='hidden' name='id' value='" . $row["id"] . "'> 
                        <input type='submit' value='Supprimer' class='btn btn-danger'>
                    </form>
                  </td>";
            echo "</tr>";
        }
    } else {
        // Si aucune ligne n'est trouvée dans la table "inscrit" avec suppr différent de 1, afficher un message d'erreur
        echo "Aucun résultat trouvé dans la table 'inscrit'.";
    }

    // Fermer la connexion à la base de données
    $pdo = null;
} catch (PDOException $e) {
    // En cas d'erreur de connexion, afficher l'erreur
    echo "Erreur de connexion à la base de données: " . $e->getMessage();
}
?>
