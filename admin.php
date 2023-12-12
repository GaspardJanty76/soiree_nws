<?php
// Démarrage de la session
session_start();

// Vérification si une session 'username' est définie (si l'utilisateur est connecté)
if (isset($_SESSION['username'])) {
    // Affiche un message
    echo "ça fonctionne";
    
    // Affiche un lien pour se déconnecter et redirige vers le script de déconnexion
    echo '<a href="methodes/adminUnAuth.php">deconnexion</a>';
} else {
    // Si l'utilisateur n'est pas connecté, redirige vers la page de connexion
    header("Location: connexion.php");
    // Arrête l'exécution du script
    exit();
}
?>
