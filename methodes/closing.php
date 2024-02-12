<?php
require_once 'dbConnect.php';

try {
    $pdoManager = new DBManager('nwsnight');
    $pdo = $pdoManager->getPDO();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $pdo->beginTransaction();

        try {
            $query_select = "SELECT fermeture FROM fermeture WHERE idfermeture = 1";
            $resultat_select = $pdo->query($query_select);
            $row = $resultat_select->fetch(PDO::FETCH_ASSOC);
            $valeur_actuelle = $row['fermeture'];

            $nouvelle_valeur = ($valeur_actuelle == 0) ? 1 : 0;

            $query_update = "UPDATE fermeture SET fermeture = :nouvelle_valeur WHERE idfermeture = 1";
            $stmt = $pdo->prepare($query_update);
            $stmt->bindParam(':nouvelle_valeur', $nouvelle_valeur);
            $stmt->execute();

            $pdo->commit();
            header('Location: ../admin.php');

        } catch (PDOException $e) {
            $pdo->rollBack();
            throw $e;
        }
    
    }
} catch(PDOException $e) {
    echo "Erreur de connexion à la base de données: " . $e->getMessage();
}

?>