<?php 
session_start(); // Démarre la session

require_once 'methodes/dbConnect.php';
require_once 'methodes/visitorCounter.php';

$pdoManager = new DBManager('nwsnight');
$pdo = $pdoManager->getPDO();

// Appeler la fonction generateVisitorsCard pour mettre à jour le compteur de visiteurs
generateVisitorsCard($pdo);

// Enregistre le nombre de visiteurs dans une variable de session
$_SESSION['nombreVisiteursQuotidiens'] = getVisitorsCount($pdo); 
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="globals.css" />
    <link rel="stylesheet" href="css/styleguide.css" />
    <link rel="stylesheet" href="css/style.css" />
    
  </head>
  <body>
  <div class="div">
        <div class="overlap">
            <a href="#" class="text-nav-input">LNDA</a>
            <a href="#" class="text-nav-input">Informations</a>
            <a href="#" class="text-nav-input button">Inscription</a>
        </div>
        <div class="container">
            <div class="text-wrapper">La nuit des ambassadeurs</div>
            <p class="p">votre évènement commence dans :</p>

            <div class="overlap-group">
            <div class="rectangle"></div>
            <div class="overlap-group-wrapper">
                <div class="overlap-group-2">
                    <div class="text-wrapper-2" id="days">0</div>
                    <div class="text-wrapper-3">jours</div>
                </div>
            </div>
        </div>
        <!-- <div class="overlap-5">
            <div class="rectangle"></div>
            <div class="overlap-group-wrapper">
            <div class="overlap-group-2">
                <div class="text-wrapper-2" id="hours">0</div>
                <div class="text-wrapper-3">heures</div>
            </div>
            </div>
        </div>
        <div class="overlap-6">
            <div class="rectangle"></div>
            <div class="overlap-group-wrapper">
            <div class="overlap-group-2">
                <div class="text-wrapper-2" id="minutes">0</div>
                <div class="text-wrapper-3">minutes</div>
            </div>
            </div>
        </div> -->

            <!-- <div class="overlap-group">
                <div class="rectangle"></div>
                <div class="overlap-group-wrapper">
                <div class="overlap-group-2">
                    <div class="text-wrapper-2">16</div>
                    <div class="text-wrapper-3">jours</div>
                </div>
                </div>

                <div class="rectangle"></div>
                <div class="overlap-group-wrapper">
                <div class="overlap-group-2">
                    <div class="text-wrapper-2">10</div>
                    <div class="text-wrapper-3">heures</div>
                </div>
                </div> 
            </div>
        </div>
    </div> -->

    <div class="overlap-2">
        <div class="rectangle-2"></div>
        <div class="rectangle-3"></div>
        <div class="group">
        <p class="lorem-ipsum-dolor">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
            dolore magna aliqua. Interdum consectetur libero id faucibus nisl tincidunt eget nullam. Facilisi morbi
            tempus iaculis urna id volutpat. Eu lobortis elementum nibh tellus molestie. Amet porttitor eget dolor
            morbi non arcu risus quis. Convallis tellus id interdum velit laoreet id. <br /><br />Vel turpis nunc eget
            lorem dolor sed. A cras semper auctor neque vitae tempus quam pellentesque nec. Nisi vitae suscipit tellus
            mauris a diam maecenas sed enim. Adipiscing enim eu turpis egestas pretium aenean. At varius vel pharetra
            vel turpis nunc. Scelerisque mauris pellentesque pulvinar pellentesque habitant morbi tristique senectus
            et. Viverra maecenas accumsan lacus vel facilisis volutpat est. Morbi tristique senectus et netus et.
            Vestibulum sed arcu non odio.
        </p>
        <div class="text-wrapper-4">La nuit de l ambassadeur</div>
        <div class="div-wrapper">
            <div class="overlap-group-3"><div class="text-wrapper-5">Inscription</div></div>
        </div>
    </div>
    <div class="group-2">
        <div class="rectangle-4"></div>
            <div class="group-3">
            <p class="lorem-ipsum-dolor-2">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
            dolore magna aliqua. Magna ac placerat vestibulum lectus mauris ultrices eros in. Orci phasellus egestas
            tellus rutrum tellus pellentesque eu tincidunt. In hendrerit gravida rutrum quisque non tellus orci. Sit
            amet nisl purus in mollis nunc. Dictum varius duis at consectetur lorem donec massa. <br /><br />Justo
            nec ultrices dui sapien eget. Proin nibh nisl condimentum id venenatis a condimentum vitae sapien.
            Convallis posuere morbi leo urna molestie. Est sit amet facilisis magna etiam tempor orci. Viverra
            mauris in aliquam sem fringilla ut morbi. Molestie at elementum eu facilisis. Nulla facilisi cras
            fermentum odio eu feugiat pretium. Sed odio morbi quis commodo odio aenean sed adipiscing. Venenatis
            urna cursus eget nunc scelerisque viverra.
            </p>
            <div class="text-wrapper-6">Information</div>
        </div>
    </div>

    <!-- INSCRIPTION -->

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
        <div class="overlap-wrapper">
            <input class="overlap-group-3" type="submit" value="Valider l'inscription">
        </div>
    </form>

    <div class="overlap-4">
        <div class="rectangle-6"></div>
        <div class="group-11">
        <div class="text-wrapper-15">Contact</div>
        <div class="frame">
            <div class="frame-2">
            <img class="icon-alternate-phone" src="img/icon-alternate-phone.png" />
            <div class="text-wrapper-16">0606060606</div>
            </div>
            <div class="frame-3">
            <img class="icon-envelope" src="img/icon-envelope.png" />
            <div class="text-wrapper-17">ldna@gmail.com</div>
            </div>
            <div class="frame-4">
            <img class="icon-alternate-map" src="img/icon-alternate-map-marker.png" />
            <div class="text-wrapper-17">adresse</div>
            </div>
        </div>
        </div>
    </div>
    </div>
    <img class="bfet" src="img/b6fet-2.png" />
    </div>


    <script src="js/index.js"></script>
    <script>
        // Fonction pour envoyer la position de défilement à scroll_tracking.php
        function sendScrollPosition() {
            var scroll_position = $(document).scrollTop();

            $.ajax({
                type: "POST",
                url: "methodes/scroll_tracking.php", // Envoyer à scroll_tracking.php
                data: { scroll_position: scroll_position },
                success: function (response) {
                    // Traitement de la réponse si nécessaire
                }
            });
        }

        // Utilisation de setInterval pour envoyer périodiquement la position de défilement
        setInterval(sendScrollPosition, 1000); // Envoyer toutes les secondes (ajustez selon vos besoins)
    </script>
  </body>
</html>