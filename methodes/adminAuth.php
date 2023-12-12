<?php
// Inclusion du fichier de connexion à la base de données
require_once 'dbConnect.php';

// Définition de la classe Authentification
class Authentification {
    private $pdo;

    // Constructeur de la classe prenant en paramètre un objet de type DBManager
    public function __construct(DBManager $pdoManager) {
        $this->pdo = $pdoManager->getPDO();
    }

    // Méthode pour vérifier l'authentification
    public function verifierAuthentification($pseudo, $mot_de_passe) {
        // Requête SQL pour récupérer un utilisateur en fonction du pseudo
        $sql = "SELECT * FROM oauth WHERE auth = :pseudo";
        $requete = $this->pdo->prepare($sql);
        $requete->bindParam(':pseudo', $pseudo);
        $requete->execute();
        // Récupération des données de l'utilisateur
        $utilisateur = $requete->fetch(PDO::FETCH_ASSOC);

        // Vérification du mot de passe avec la fonction password_verify
        if ($utilisateur && password_verify($mot_de_passe, $utilisateur['password'])) {
            // Démarrage de la session
            session_start();

            // Configuration de la durée de la session
            $session_duration = 60;
            session_set_cookie_params($session_duration);

            // Stockage des informations de l'utilisateur dans la session
            $_SESSION['user_id'] = $utilisateur['id'];
            $_SESSION['username'] = $utilisateur['auth'];

            // Authentification réussie, retourne true
            return true;
        }

        // Authentification échouée, retourne false
        return false;
    }
}

// Création d'une instance de DBManager avec le nom de la base de données
$pdoManager = new DBManager("nwsnight");

// Création d'une instance de la classe Authentification en passant le DBManager en paramètre
$auth = new Authentification($pdoManager);

// Vérification de la méthode HTTP (POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupération des données du formulaire
    $pseudo = $_POST['auth'];
    $mot_de_passe = $_POST['password'];

    // Appel de la méthode verifierAuthentification
    if ($auth->verifierAuthentification($pseudo, $mot_de_passe)) {
        // Redirection vers la page admin en cas de succès
        header("Location: ../admin.php");
        exit();
    } else {
        header("Location: ../connexion.php");
        echo "erreur lors de la connexion";
        exit();
    }
}
?>