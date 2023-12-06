<?php
session_start();

class SessionManager
{
    public static function destroySession()
    {
        $_SESSION = array();
        session_destroy();
        self::redirect('/../GitHub/soiree_nws/connexion.php');
    }

    private static function redirect($location)
    {
        header("Location: $location");
        exit();
    }
}

SessionManager::destroySession();
?>
