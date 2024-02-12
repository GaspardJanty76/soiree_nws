<?php
require_once 'methodes/contentModify.php';
session_start();

if (isset($_SESSION['username'])) {
    ?>
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/content.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
        <div class="navbar">
            <a href="admin.php">Inscriptions</a> 
            <a href="kpi.php">KPI</a>
            <a href="#">Contenu</a>
            <a class="deco" href="methodes/adminUnAuth.php"><i class="fa-solid fa-right-to-bracket" style="color: #ffffff;"></i></a>
        </div>
        <div class="container">
        <h1>Modifier le contenu de la page</h1>
        <form method="post" action="methodes/contentModify.php">
            <label for="newTitle">Nouveau titre :</label>
            <input type="text" id="newTitle" name="newTitle" value="<?php echo $currentTitle; ?>" required><br>

            <label for="newText">Nouveau texte :</label>
            <textarea id="newText" name="newText" required><?php echo $currentText; ?></textarea><br>

            <input type="submit" value="Modifier">
        </form>

        <div class="formatting-tips">
            <h2>Conseils de mise en forme du texte :</h2>
            <p>Pour passer à la ligne, ajoutez &lt;br&gt;; pour sauter une ligne, ajoutez deux &lt;br&gt;.</p>
            <p>Exemple : voici une première ligne &lt;br&gt;&lt;br&gt;</p>
            <p>voici une ligne avec un saut de ligne.</p>

            <p>Pour mettre en gras une partie du texte, entourez-la de &lt;strong&gt; &lt;/strong&gt;.</p>
            <p>Exemple : Voici une phrase avec &lt;strong&gt;<strong>ces mots en gras</strong>&lt;/strong&gt;.</p>
        </div>
    </div>

        </body>
        </html>

    <?php

    

} else {
    header("Location: connexion.php");
    exit();
}
?>