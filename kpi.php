<?php
session_start();

if (isset($_SESSION['username'])) {
    ?>
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
        <div class="navbar">
            <a href="admin.php">Inscriptions</a> 
            <a href="#">KPI</a>
            <a class="deco" href="methodes/adminUnAuth.php"><i class="fa-solid fa-right-to-bracket" style="color: #ffffff;"></i></a>
        </div>
        <h1>KPI</h1>
        <!-- Inserer le code ici -->
    <?php
    

} else {
    header("Location: connexion.php");
    exit();
}
?>