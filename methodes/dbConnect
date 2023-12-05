<?php
class DBManager {
    private $db_name;
    private $pdo;

    public function __construct(string $DBName) {
        $this->db_name = $DBName;
        $dbConfig = $this->loadConfig();
        $this->connect($dbConfig);
    }

    private function loadConfig() {
        $configFile = __DIR__ . '/../json/config.json';
        if (file_exists($configFile)) {
            $config = json_decode(file_get_contents($configFile), true);
            if ($config) {
                return $config;
            }
        }

        die("Erreur : Fichier de configuration de la base de données manquant ou incorrect.");
    }

    private function connect(array $config): void {
        try {
            $pdo = new PDO(
                "mysql:host={$config['host']};dbname={$this->db_name};port={$config['port']}",
                $config['username'],
                $config['password']
            );
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo = $pdo;
            
        } catch (PDOException $e) {
            die("Erreur de connexion : " . $e->getMessage());
        }
    }

    public function getPDO() {
        return $this->pdo;
        
    }
}
?>