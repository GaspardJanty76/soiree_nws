<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="css/test.css"> -->
    <title>La Nuit Des Ambassadeurs</title>
</head>
<body>

<div class="text-wrapper-7">Inscription</div>
<form action="methodes/registration.php" method="post" enctype="multipart/form-data">
    <div class="group-4">
        <div class="text-wrapper-8">Nom</div>
        <input type="text" class="overlap-group-4" name="lastname" required>
    </div>
    <div class="group-5">
        <div class="text-wrapper-8">Téléphone</div>
        <input type="text" class="overlap-group-4" name="tel" required>
    </div>
    <div class="group-6">
        <div class="text-wrapper-8">Mail</div>
        <input type="text" class="overlap-group-4" name="mail" required>
    </div>
    <div class="group-7">
        <div class="text-wrapper-10">Prénom</div>
        <input type="text" class="overlap-group-4" name="firstname" required>
    </div>
    <div class="group-8">
        <div class="group-wrapper">
            <div class="group-9">
                <div class="text-wrapper-8">Entreprise</div>
                <input type="text" class="overlap-group-4" name="company" required>
            </div>
        </div>
        <div class="group-10">
            <div class="text-wrapper-10">Poste</div>
            <input type="text" class="overlap-group-4" name="job" required>
        </div>
    </div>
    <div class="text-wrapper-12">Informations personnelles</div>
    <div class="text-wrapper-13">Entreprise</div>
    <img class="icon-user" src="img/image.png" />
    <img class="img" src="img/icon-user.png" />
    <input type="checkbox" class="rectangle-5" required>
    <p class="text-wrapper-14">J'accepte la politique de confidentialité</p>
    <input type="submit" value="S'inscrire">
</form>

</body>
</html>
