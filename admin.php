<?php
require_once 'methodes/closingInfo.php';
session_start();

if (isset($_SESSION['username'])) {
    ?>
    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Administration</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/admin.css">
        <link rel="stylesheet" href="css/navbar.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
        <script src="js/envoidonnees.js" defer></script>
    </head>
    <body>
        <div class="navbar">
            <a href="#">Inscriptions</a> 
            <a href="kpi.php">KPI</a>
            <a href="content.php">Contenu</a>
            <a class="deco" href="methodes/adminUnAuth.php"><i class="fa-solid fa-right-to-bracket" style="color: #ffffff;"></i></a>
        </div>
        <h1>Administration</h1>
        <br>
        <br>
        <div class="button-div">
            <button type="button" class="btn btn-primary calibri text-white fw-bold" onclick="exportToExcel()">Télécharger le tableau Excel</button>

            <script>
                function exportToExcel() {
                    // Redirigez l'utilisateur vers le script "export.php" lorsqu'il clique sur le bouton
                    window.location.href = 'methodes/export.php';
                }
            </script>
            <strong><p>Statu des inscriptions :</p></strong>
            <?php
                if ($valeur_actuelle == 1) {
            ?>
            <p class="open">Inscriptions ouvertes</p>
            <?php
                }else{
            ?>
            <p class="closerc">Inscriptions fermés</p>
            <?php } 
            ?>

            <form action="methodes/closing.php" method="post">
                <?php
                    if ($valeur_actuelle == 1) {
                ?>
                    <input type="submit" value="Fermer les inscriptions" class="custom-button-close">
                <?php
                    }else{
                ?>
                <input type="submit" value="Ouvrir les inscriptions" class="custom-button-open">
                <?php } 
                ?>
                </form>
            <button id="bouton-envoi">Envoyer Données</button>
        </div>
            
        
        <div class="container tableau">
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Téléphone</th>
                            <th>Email</th>
                            <th>Entreprise</th>
                            <th>Poste</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php include ('methodes/get.php');?>
                    </tbody>
                </table>
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
