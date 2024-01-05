<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="globals.css" />
    <link rel="stylesheet" href="css/styleguide.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/popup.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  </head>
  <body>
  <div class="div">
        <div class="overlap">
            <a href="#LNDA" class="text-nav-input">LNDA</a>
            <a href="#Info" class="text-nav-input">Informations</a>
            <a href="#Inscri" class="text-nav-input button">Inscription</a>
        </div>
        <div class="container">
            <div class="text-wrapper">La nuit des ambassadeurs</div>
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

    <div class="block-1">
        <div class="block-rectangle"></div>
        <div class="block-texte-titre">
            <div class="block-titre">La nuit de l ambassadeur</div>
            <p class="block-texte">
                <strong>La Nuit des Ambassadeurs c’est quoi ?</strong><br><br>
                La Nuit des Ambassadeurs est un événement où la Normandie Web School ouvre ses portes aux entreprises et aux professionnels, 
                offrant une opportunité unique de présenter notre école tout en encourageant les échanges entre les entreprises présentes. 
                Au-delà d'une simple soirée, c'est un catalyseur d'opportunités, favorisant la création de nouvelles connexions et le développement de partenariats.<br><br>
                <strong>Objectifs</strong><br><br>
                Au cœur de cette soirée, La Normandie Web School aspire à atteindre un objectif clair  : favoriser la création de liens significatifs 
                et le développement de collaborations innovantes entre les acteurs du monde académique et professionnel. Nous croyons en l'importance 
                de dépasser les frontières traditionnelles pour créer des opportunités concrètes.
            </p>
            <div class="block-bouton">
                <a href="#" class="text-nav-input button">Inscription</a>
            </div>
        </div>
    </div>

    <div class="block-2">
        <div class="block-rectangle-2"></div>
        <div class="block-texte-titre-2">
            <div class="block-titre-2">Informations</div>
            <p class="block-texte-2">
                <i>une véritable plateforme de découverte, de collaboration et de partage de connaissances.</i><br><br>
                Chaque participant, qu'il soit de la Normandie Web School ou d'une entreprise, devient un ambassadeur d'une vision commune pour un 
                futur où l'éducation et l'industrie du web convergent de manière harmonieuse.<br><br>
                Participez à cette soirée, où chaque interaction contribue à esquisser un futur riche en collaborations fructueuses. Soyez acteur de cette 
                expérience qui encourage la création de liens durables et le partage d'expertise. Rejoignez-nous dans cette aventure vers un futur collaboratif et innovant. <br><br>
            </p>
        </div>
    </div>

    <!-- INSCRIPTION -->

    <p class="inscri-titre">Inscription</p>

    <div class="inscri-rectangle">
        <form class="inscri-form" method="post" enctype="multipart/form-data" onsubmit="showPopup(); return false;">
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

            <!-- <div class="overlap-wrapper">
                <input class="overlap-group-3" type="submit" value="Validé l'inscription">
            </div> -->
        </form>
        <div class="overlay" id="overlay">
            <div class="popup">
                <span class="close-btn" onclick="closePopup()">&times;</span>
                <p>Confirmez votre participation à La Nuit des Ambassadeurs
                    en cliquant sur le lien de confirmation dans votre boîte mail.</p>
                <p>À bientôt !</p>
            </div>
        </div>
    </div>

    <!-- CONTACT EN FOOTER -->

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
  </body>
</html>
