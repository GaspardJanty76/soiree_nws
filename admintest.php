<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/admin.css" />
</head>
<body>
    <h1>Administration</h1>

    <!-- Tableau admin -->
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