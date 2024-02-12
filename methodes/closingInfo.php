<?php
require_once 'dbConnect.php';
$pdoManager = new DBManager('nwsnight');
$pdo = $pdoManager->getPDO();
$query_select = "SELECT fermeture FROM fermeture WHERE idfermeture = 1";
$resultat_select = $pdo->query($query_select);
$row = $resultat_select->fetch(PDO::FETCH_ASSOC);
$valeur_actuelle = $row['fermeture'];
