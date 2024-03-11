<?php
// Connexion à la base de données MySQL
$servername = "51.178.29.201:3306";
$username = "westboy";
$password = "GefundensieDarf@99";
$dbname = "nwsnight";

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
  die("Connexion échouée : " . $conn->connect_error);
}

// Requête SQL pour récupérer les données
$sql = "SELECT lastname, firstname, mail, tel, company, job FROM registrationgasp WHERE idcontent = 1 ";
$result = $conn->query($sql);

// Stocker les résultats dans un tableau
$rows = array();
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $rows[] = $row;
  }
}

// Fermer la connexion à la base de données
$conn->close();

// Renvoyer les données au format JSON
echo json_encode($rows);
?>
