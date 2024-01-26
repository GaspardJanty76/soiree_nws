<?php 
// require_once 'methodes/dbConnect.php';
// require_once 'methodes/visitorCounter.php';
// require_once 'methodes/visitorLocation.php';
// require_once 'methodes/contentDisplay.php';
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="globals.css" />
    <link rel="stylesheet" href="css/styleguide.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/popup.css" />
    <link data-require="leaflet@0.7.3" data-semver="0.7.3" rel="stylesheet"
        href="//cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.3/leaflet.css" />
    <link rel="stylesheet" href="css/map.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fugaz+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Fugaz+One&display=swap" rel="stylesheet">
  </head>
  <body> 
    <div class="div" id="nav">
        <div class="container">
            <div class="text-wrapper">La nuit de la NWS</div>
            <p class="p">votre évènement commence dans :</p>

            <div class="flex-container">
                <div class="timer-block">
                    <div class="text-block-2" id="days">0</div>
                    <div class="text-block-3">jours</div>
                </div>

                <div class="timer-block">
                    <div class="text-block-2" id="hours">0</div>
                    <div class="text-block-3">heures</div>
                </div>

                <div class="timer-block">
                    <div class="text-block-2" id="minutes">0</div>
                    <div class="text-block-3">minutes</div>
                </div>
            </div>
        </div>
    </div>

    <div class="cloud">
        <div class="word">
        </div>
    </div>

    <script src="js/nuage.js"></script>

    <div class="block-2" id="Info">
        <div>
            <img src="img/antenna-ZDN-G1xBWHY-unsplash.jpg" class ="block-rectangle-2" alt="">
        </div>
        <div class="block-texte-titre-2">
            <div class="block-titre-2"><?php echo $title; ?></div>
            <p class="block-texte-2">
            <?php echo $text; ?> 
            </p>
        </div>
    </div>

    <!-- INSCRIPTION -->

    <p class="inscri-titre" id="Inscri">Inscription</p>

    <div class="inscri-rectangle">
        <form class="inscri-form" action="methodes/registration.php" method="post" enctype="multipart/form-data">
            <div class="inscri-info-perso">
                <i class="fa-solid fa-user"></i>
                Informations personnelles
            </div>

            <div class="inscri-1">
                <div class="inscri-texte">Nom</div>
                <input type="text" class="inscri-input" name="lastname" required>
            </div>
            <div class="inscri-2">
                <div class="inscri-texte">Prénom</div>
                <input type="text" class="inscri-input" name="firstname" required>
            </div>
            <div class="inscri-3">
                <div class="inscri-texte">Téléphone</div>
                <input type="text" class="inscri-input" name="tel" required>
            </div>
            <div class="inscri-4">
                <div class="inscri-texte">Mail</div>
                <input type="text" class="inscri-input" name="mail" required>
            </div>

            <div class="inscri-info-entreprise">
                <i class="fa-solid fa-user"></i>
                Entreprise
            </div>

            <div class="inscri-5">
                <div class="inscri-texte">Entreprise</div>
                <input type="text" class="inscri-input" name="company" required>
            </div>
            <div class="inscri-6">
                <div class="inscri-texte">Poste</div>
                <input type="text" class="inscri-input" name="job" required>
            </div>
            <input type="checkbox" class="inscri-check" required style="display: inline-block; margin-right: 10px;">
            <p class="inscri-texte-2" style="display: inline-block;">J'accepte la politique de confidentialité</p>

            <div>
                <input class="text-nav-input button" type="submit" value="Valider l'inscription">
            </div>
        </form>
        
    </div>

    <!-- CONTACT EN FOOTER -->

    <div id="block-map">
        <div id="infos-map">
            <div class="overlap-4">
                <div class="rectangle-6"></div>
                    <div class="group-11">
                        <div class="text-wrapper-15">Contact</div>
                            <div class="frame">
                                <div class="frame-2">
                                    <i class="orange-icone icon-alternate-phone fa-solid fa-phone"></i>
                                    <div class="text-wrapper-16">02 79 02 73 78</div>
                                </div>
                                <div class="frame-3">
                                    <i class="orange-icone icon-envelope fa-solid fa-envelope"></i>
                                    <div class="text-wrapper-17">contact@normandiewebschool.fr</div>
                                </div>
                                <div class="frame-4">
                                    <i class="orange-icone icon-alternate-map fa-solid fa-location-dot"></i>
                                    <div class="text-wrapper-17">72 rue de la République 76140 Le Petit-Quevilly</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="map"></div>
        </div>
    </div>

    <script src="js/index.js"></script>

    <script data-require="jquery@*" data-semver="2.1.1"
        src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script data-require="leaflet@0.7.3" data-semver="0.7.3"
        src="//cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.3/leaflet.js"></script>
    <script src="js/script.js"></script>
  </body>
</html>