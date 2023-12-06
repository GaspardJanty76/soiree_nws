<?php
session_start();
if (isset($_SESSION['username'])) {
    echo"ça fonctionne";
    echo'<a href="methodes/adminUnAuth.php">deconnexion</a>';


}
else{
    header("Location: connexion.php");
    exit();
}

?>