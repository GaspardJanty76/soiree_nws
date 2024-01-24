<?php
session_start();

// if (isset($_SESSION['username'])) {
    ?>
        <link rel="stylesheet" href="css/admin.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
        <div class="navbar">
            <a href="#">Inscriptions</a> 
            <a href="kpi.php">KPI</a>
            <a href="content.php">Contenu</a>
            <a class="deco" href="methodes/adminUnAuth.php"><i class="fa-solid fa-right-to-bracket" style="color: #ffffff;"></i></a>
        </div>
        <h1>Administration</h1>
        <button type="button" class="btn btn-primary calibri text-white fw-bold" onclick="exportToExcel()">Télécharger le tableau Excel</button>
    
        <script>
        function exportToExcel() {
            // Redirigez l'utilisateur vers le script "export.php" lorsqu'il clique sur le bouton
            window.location.href = 'methodes/export.php';
        }
        </script>
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
    <?php
    

// } else {
//     header("Location: connexion.php");
//     exit();
// }
?>
