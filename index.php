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
  </head>
  <body> 
  <div class="div" id="nav">
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

    <div class="block-1" id="LNDA">
        <div>
            <img src="img/antenna-ohNCIiKVT1g-unsplash.jpg" class="block-rectangle" alt="">
        </div>
        <div class="block-texte-titre">
            <div class="block-titre">La nuit de l ambassadeur</div>
            <p class="block-texte">
                <strong>La Nuit des Ambassadeurs c'est quoi ?</strong><br><br>
                La Nuit des Ambassadeurs est un événement où la Normandie Web School ouvre ses portes aux entreprises et aux professionnels, 
                offrant une opportunité unique de présenter notre école tout en encourageant les échanges entre les entreprises présentes. 
                Au-delà d'une simple soirée, c'est un catalyseur d'opportunités, favorisant la création de nouvelles connexions et le développement de partenariats.<br><br>
                C'est également l'occasion privilégiée pour exprimer notre gratitude envers nos partenaires pour les collaborations passées. La Nuit des Ambassadeurs 
                constitue un moment où nous pouvons sincèrement remercier ceux qui ont contribué à la réussite de la Normandie Web School
            </p>
            <div class="block-bouton">
                <a href="#Inscri" class="text-nav-input button">Inscription</a>
            </div>
        </div>
    </div>

    <div class="block-2" id="Info">
        <div>
            <img src="img/antenna-ZDN-G1xBWHY-unsplash.jpg" class ="block-rectangle-2" alt="">
        </div>
        <div class="block-texte-titre-2">
            <div class="block-titre-2">Informations</div>
            <p class="block-texte-2">
                <strong>Objectifs</strong><br><br>
                Au cœur de cette soirée, La Normandie Web School aspire à atteindre un objectif clair  : favoriser la création de liens significatifs 
                et le développement de collaborations innovantes entre les acteurs du monde académique et professionnel. Nous croyons en l'importance 
                de dépasser les frontières traditionnelles pour créer des opportunités concrètes.<br><br>
                Participez à cette soirée, où chaque interaction contribue à esquisser un futur riche en collaborations fructueuses. Soyez acteur de cette 
                expérience qui encourage la création de liens durables et le partage d'expertise. Rejoignez-nous dans cette aventure vers un futur collaboratif et innovant. 
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
            <div>
                <input type="checkbox" class="inscri-check" required>
                <p class="inscri-texte">J'accepte la politique de confidentialité</p>
            </div>


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
                                    <div class="text-wrapper-16">0606060606</div>
                                </div>
                                <div class="frame-3">
                                    <i class="orange-icone icon-envelope fa-solid fa-envelope"></i>
                                    <div class="text-wrapper-17">ldna@gmail.com</div>
                                </div>
                                <div class="frame-4">
                                    <i class="orange-icone icon-alternate-map fa-solid fa-location-dot"></i>
                                    <div class="text-wrapper-17">adresse</div>
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