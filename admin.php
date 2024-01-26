<?php
session_start();

// if (isset($_SESSION['username'])) {
    ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <link data-require="leaflet@0.7.3" data-semver="0.7.3" rel="stylesheet"
        href="//cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.3/leaflet.css" />
    <link rel="stylesheet" href="./css/global.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>
    <main>
    <div class="navbar">
        <a href="#">Inscriptions</a>
        <a href="kpi.php">KPI</a>
        <a href="content.php">Contenu</a>
        <a class="deco" href="methodes/adminUnAuth.php"><i class="fa-solid fa-right-to-bracket"style="color: #ffffff;"></i></a>
    </div>
        <h1>Administration</h1>
        <button type="button" class="btn btn-primary calibri text-white fw-bold" onclick="exportToExcel()">Télécharger
            le
            tableau Excel</button>

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
    </main>
</body>

</html>
<?php
    

// } else {
//     header("Location: connexion.php");
//     exit();
// }
?>