<?php
// Vérifiez si l'ID de l'utilisateur est reçu
if(isset($_POST['id'])) {
    require_once 'dbConnect.php'; // Incluez le fichier de connexion à la base de données
    $pdoManager = new DBManager('nwsnight');
// Récupérer l'objet PDO de la base de données
    $pdo = $pdoManager->getPDO();
    // Récupérez l'identifiant de l'utilisateur à supprimer
    $id = $_POST['id'];

    // Mettez à jour la valeur "suppr" dans la base de données pour cet utilisateur
    $query = "UPDATE registrationgasp SET suppr = 1 WHERE id = :id"; // Remplacez "votre_table" par le nom de votre table
    $statement = $pdo->prepare($query);
    $statement->execute(array(':id' => $id));

    // Redirigez l'utilisateur vers la page précédente
    header("Location: ../admin.php");
    exit();
} else {
    // Si l'ID n'est pas reçu, redirigez vers la page précédente avec un message d'erreur
    header("Location: {$_SERVER['HTTP_REFERER']}?error=1");
    exit();
}
?>