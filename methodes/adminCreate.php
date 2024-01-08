<?php
// Inclusion du fichier de connexion à la base de données
require_once 'dbConnect.php';

// Création d'une instance de DBManager avec le nom de la base de données
$pdoManager = new DBManager('nwsnight');
// Récupération de l'objet PDO
$pdo = $pdoManager->getPDO();

// Définition de la classe UserManagement
class UserManagement
{
    private $pdo;

    // Constructeur de la classe prenant en paramètre un objet de type PDO
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    // Méthode pour ajouter un utilisateur en tant qu'administrateur
    public function addUserAsAdmin($login, $password)
    {
        // Hashage du mot de passe avec bcrypt
        $passwordHash = password_hash($password, PASSWORD_BCRYPT);

        // Requête SQL pour insérer un nouvel utilisateur dans la table 'oauth'
        $sql = "INSERT INTO auth (auth, password) VALUES (?, ?)";
        $stmt = $this->pdo->prepare($sql);

        // Exécution de la requête avec les valeurs fournies
        return $stmt->execute([$login, $passwordHash]);
    }
}

// Création d'une instance de la classe UserManagement en passant l'objet PDO en paramètre
$userManager = new UserManagement($pdo);

// Lecture du login et du mot de passe depuis la console
$login = readline("Login de l'utilisateur : ");
$motDePasse = readline("Mot de passe : ");

// Appel de la méthode addUserAsAdmin pour ajouter l'utilisateur
if ($userManager->addUserAsAdmin($login, $motDePasse)) {
    echo "L'utilisateur a été ajouté en tant qu'administrateur avec succès.\n";
} else {
    echo "Une erreur s'est produite lors de l'ajout de l'utilisateur.\n";
}
?>
