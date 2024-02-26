<?php
error_reporting(0);
ini_set('display_errors', 0);

// Démarrage de la session
session_start();

// Définition de la classe SessionManager
class SessionManager
{
    // Méthode statique pour détruire la session
    public static function destroySession()
    {
        // Suppression de toutes les données de la session
        $_SESSION = array();
        // Destruction de la session
        session_destroy();
        // Redirection vers la page de connexion
        self::redirect('/../GitHub/soiree_nws/connexion.php');
    }

    // Méthode privée statique pour effectuer une redirection
    private static function redirect($location)
    {
        // Envoi d'un en-tête de redirection
        header("Location: $location");
        // Arrêt de l'exécution du script
        exit();
    }
}

// Appel de la méthode statique destroySession de la classe SessionManager
SessionManager::destroySession();
?>
