<?php
// Requête SQL pour sélectionner toutes les colonnes de la table "inscrit"
$sql1 = "SELECT * FROM inscrit ORDER BY nom ";


// Exécution de la requête SQL1 pour sélectionner toutes les données dans la table "inscrit"
$resultat1 = $connexion->query($sql1);


// Vérifier s'il y a des résultats de la requête SQL1
if ($resultat1->num_rows > 0) {
    // Afficher les données de la base de données dans un tableau
    while ($row = $resultat1->fetch_assoc()) {
        echo "<tr";
    
        echo ">";
    
        echo "<td>" . $row["nom"] . "</td>";
        echo "<td>" . $row["prenom"] . "</td>";
        echo "<td>" . $row["numero"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["entreprise"] . "</td>";
        echo "<td>" . $row["poste"] . "</td>";
    
        echo "</tr>";
    }
} else {
    // Si aucune ligne n'est trouvée dans la table "inscrit", afficher un message d'erreur
    echo "Aucun résultat trouvé dans la table 'inscrit'.";
}

// Fermer la connexion à la base de données
$connexion->close();
?>