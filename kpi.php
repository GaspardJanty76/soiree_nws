<?php
session_start();

if (isset($_SESSION['username'])) {
    ?>
        <h1>Administration</h1>
        <a href="methodes/adminUnAuth.php">deconnexion</a>
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
    

} else {
    header("Location: connexion.php");
    exit();
}
?>