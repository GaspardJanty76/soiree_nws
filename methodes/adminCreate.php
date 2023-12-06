<?php
require_once 'dbConnect.php';

$pdoManager = new DBManager('nwsnight');
$pdo = $pdoManager->getPDO();

class UserManagement
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function addUserAsAdmin($login, $password)
    {
        $passwordHash = password_hash($password, PASSWORD_BCRYPT);

        $sql = "INSERT INTO oauth (auth, password) VALUES (?, ?)";
        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([$login, $passwordHash]);
    }
}

$userManager = new UserManagement($pdo);

$login = readline("Login de l'utilisateur : ");
$motDePasse = readline("Mot de passe : ");

if ($userManager->addUserAsAdmin($login, $motDePasse)) {
    echo "L'utilisateur a été ajouté en tant qu'administrateur avec succès.\n";
} else {
    echo "Une erreur s'est produite lors de l'ajout de l'utilisateur.\n";
}
?>
