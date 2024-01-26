<?php
// Définition de la classe DBManager
class DBManager {
    private $db_name;
    private $pdo;

    // Constructeur de la classe prenant le nom de la base de données en paramètre
    public function __construct(string $DBName) {
        $this->db_name = $DBName;
        // Chargement de la configuration et connexion à la base de données
        $dbConfig = $this->loadConfig();
        $this->connect($dbConfig);
    }

    // Méthode privée pour charger la configuration depuis un fichier JSON
    private function loadConfig() {
        $configFile = __DIR__ . '/../json/config.json';
        // Vérification de l'existence du fichier de configuration
        if (file_exists($configFile)) {
            // Chargement et décodage du fichier JSON
            $config = json_decode(file_get_contents($configFile), true);
            // Vérification de la validité du JSON
            if ($config) {
                return $config;
            }
        }

        // En cas d'erreur, affiche un message et arrête le script
        die("Erreur : Fichier de configuration de la base de données manquant ou incorrect.");
    }

    // Méthode privée pour établir la connexion à la base de données
    private function connect(array $config): void {
        try {
            // Création d'un objet PDO pour la connexion à la base de données
            $pdo = new PDO(
                "mysql:host={$config['host']};dbname={$this->db_name};port={$config['port']}",
                $config['username'],
                $config['password']
            );
            // Configuration des attributs de PDO pour afficher les erreurs
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // Stockage de l'objet PDO dans la propriété $pdo de la classe
            $this->pdo = $pdo;
            
        } catch (PDOException $e) {
            // En cas d'erreur, affiche un message d'erreur de connexion
            die("Erreur de connexion : " . $e->getMessage());
        }
    }

    // Méthode publique pour obtenir l'objet PDO
    public function getPDO() {
        return $this->pdo;
    }
}
?>