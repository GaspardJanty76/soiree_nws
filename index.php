<?php 
// error_reporting(0);
// ini_set('display_errors', 0);

require_once 'methodes/dbConnect.php';
require_once 'methodes/visitorCounter.php';
require_once 'methodes/visitorLocation.php';
require_once 'methodes/contentDisplay.php';
require_once 'methodes/closingInfo.php';
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <link data-require="leaflet@0.7.3" data-semver="0.7.3" rel="stylesheet"
        href="//cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.3/leaflet.css" />
    <link rel="stylesheet" href="./css/global.css"dgb:  />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fugaz+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Fugaz+One&display=swap" rel="stylesheet">

    <script src="js/index.js" defer></script>
    <script data-require="jquery@*" data-semver="2.1.1"
        src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js" defer></script>
    <script data-require="leaflet@0.7.3" data-semver="0.7.3"
        src="//cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.3/leaflet.js" defer></script>
    <script src="js/script.js" defer></script>

    <script src="http://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js" defer></script>
    <link rel="shortcut icon" href="img/logo_1.webp" type="image/x-icon">
    <title>La Nuit de la NWS - Inscription</title>
</head>

<body>
    <canvas id="starCanvas"></canvas>
    <script src="js/stars.js"></script>
    <main class="index">
        <section class="hero-section">
            <div class="hero-header underline-effect">
                <div class="header-content">
                    <img src="img/logo_1.webp" class="img-titre img-left" alt="">
                    <h1>La nuit de la NWS</h1>
                    <img src="img/logo_nws.png" class="img-titre img-right" alt="">
                </div>
                <p>
                    <a class="highlight" href="#Info"><span>Jeudi 18 AVRIL 2024 à partir 18h30</span></a>
                </p>
                <p>Votre évènement commence dans :</p>
            </div>
            <ul>
                <li>
                    <div id="days">0</div>
                    <div>jours</div>
                </li>

                <li>
                    <div id="hours">0</div>
                    <div>heures</div>
                </li>
                <li>
                    <div id="minutes">0</div>
                    <div>minutes</div>
                </li>

                <li>
                    <div id="seconds">0</div>
                    <div>secondes</div>
                </li>
            </ul>
            <a href="#Inscri">
                <button>
                    <strong>Je m'inscris</strong>
                </button>
            </a>
        </section>

        <!-- BLOCK INFORMATION -->
        <section class="information" id="Info">
            <!-- <div class="block-rectangle-2"> -->
                <img src="img/Ambiance.webp" class ="block-rectangle-2" alt="">
            <!-- </div> -->
            <div class="information-content">
                <h2><?php echo $title; ?></h2>
                <p><?php echo $text; ?></p>
            </div>
        </section>

        <!-- NUAGE DE MOTS -->
        <div class="cloud">
            <div class="word">
                <p></p>
                <p>Lots</p>
                <p>Ateliers</p>
                <p>Exposants</p>
                <p>Collaboration</p>
                <p>Entreprises</p>
                <p>Intervenants</p>
                <p></p>
                <p>Partenariats</p>
                <p>Stratégies</p>
                <p>Échanges</p>
                <p>Tendances</p>
                <p>Ambassadeurs</p>
            </div>
        </div>

        <!-- PARTENAIRES LISTES -->
            
        <div class="partenaires">
            <h2>Nos partenaires</h2>
            <div class="partenaires-logos">
                <a href="https://www.nwx.fr/" target="_blank">
                    <img src="img/logo_5.webp" class="partenaire-logo">
                </a>
                <a href="https://komeocreation.fr/" target="_blank">
                    <img src="img/logo_6.webp" class="partenaire-logo">
                </a>
                <a href="https://ocean-communication.com/" target="_blank">
                    <img src="img/logo_7.webp" class="partenaire-logo citizens">
                </a>
                <a href="https://www.devolis.com/" target="_blank">
                    <img src="img/logo_8.webp" class="partenaire-logo">
                </a>
                <a href="https://www.lemasonn.com/" target="_blank">
                    <img src="img/logo_9.webp" class="partenaire-logo">
                </a>
                <!-- <a href="https://www.metropole-rouen-normandie.fr/" target="_blank">
                    <img src="img/logo_15.png" class="partenaire-logo metropole">
                </a> -->
            </div>
            <div class="partenaires-logos">
                <a href="https://nachos.fr/" target="_blank">
                    <img src="img/logo_10.svg" class="partenaire-logo">
                </a>
                <a href="https://www.wearecitizens.fr/" target="_blank">
                    <img src="https://www.wearecitizens.fr/assets/64c26a3f45ca643867069901/2023/11/29/09/43/43/logo-blanc.min3.png" class="partenaire-logo citizens">
                </a>
                <a href="https://www.ftel.fr/" target="_blank">
                    <img src="img/logo_12.png" class="partenaire-logo">
                </a>
                <a href="https://numeric-emploi.org/" target="_blank">
                    <img src="img/logo_13.png" class="partenaire-logo">
                </a>
                <a href="https://www.groupedigit.com/" target="_blank">
                    <img src="img/logo_14.png" class="partenaire-logo">
                </a>
            </div>
        </div>

        <!-- INSCRIPTION -->
        <section class="registration-section">
            <h2 id="Inscri">Inscription</h2>
            <?php
            if ($valeur_actuelle == 1) {
            ?>
                <form method="post" action="methodes/registration.php" enctype="multipart/form-data">
                    <h3>
                        <i class="fa-solid fa-user"></i>
                        Informations personnelles
                    </h3>
                    <div class="registration-form-part">
                        <div class="registration-form-section">
                            <div>
                                <label for="lastname">Nom *</label>
                                <input type="text" name="lastname" required>
                            </div>
                            <div>
                                <label for="firstname">Prénom *</label>
                                <input type="text" name="firstname" required>
                            </div>
                        </div>
                        <div class="registration-form-section">
                            <div>
                                <label for="tel">Téléphone *</label>
                                <input type="text" name="tel" required>
                            </div>

                            <div>
                                <label for="mail">Mail *</label>
                                <input type="text" name="mail" required>
                            </div>
                        </div>
                    </div>
                    <h3>
                        <i class="fa-solid fa-briefcase" style="color: #fcb900;"></i>
                        Entreprise / Organisation
                    </h3>
                    <div class="registration-form-part">
                        <div>
                            <label class="inscri-texte">Entreprise / Organisation *
                            </label>
                            <input type="text" name="company" required>
                        </div>
                        <div>
                            <label for="job">Poste *
                            </label>
                            <input type="text" name="job" required>
                        </div>

                        <!-- NOUVEAU CHAMP LINKEDIN FACULTATIF -->
                        <div>
                            <label for="">Identifiant linkedin (optionnel) 
                            </label>
                            <input type="text" name="linkedin">
                        </div>
                    </div>

                    <label class="label-custom">
                        <input type="checkbox" name="photoConsent" checked>
                        <span class="checkmark"></span>
                        <p>Je consens à être pris en photo</p>
                    </label>

                    <div class="label-icone">
                        <span class="popover-trigger" tabindex="0">
                            <i class="fa-solid fa-circle-info"></i>
                        </span>

                        <div class="custom-popover">
                            L'article 226-1 du code pénal punit d'un an d'emprisonnement et 45 000 € d'amende le fait de porter atteinte à l'intimité de la vie privée d'autrui en fixant, enregistrant ou transmettant, sans le consentement de celle-ci, l'image d'une personne se trouvant dans un lieu privé.
                        </div>
                    </div>

                    <button type="submit" class="btn-inscription-2">
                        Valider l'inscription
                    </button>
                </form>
                <?php
        } else {
        ?>
                    <p class="inscription-ferme">
                        Les inscriptions sont désormais closes. <br>
                        Nous vous informons qu'aucune nouvelle inscription ne peut être acceptée, <br>
                        car toutes les places ont été attribuées.
                    </p>
        <?php
        }
        ?>
        </section>
        <!-- CONTACT -->

        <section class="contact-section">
            <div class="contact-content">
                <h2>Contact</h2>
                <ul>
                    <li>
                        <i class="fa-solid fa-phone"></i>
                        <a href="tel:0279027378">02 79 02 73 78</a>
                    </li>
                    <li class="frame-3">
                        <i class="fa-solid fa-envelope"></i>
                        <a href="mailto:contact@normandiewebschool.fr">
                            <p>contact@normandiewebschool.fr</p>
                        </a>
                    </li>
                    <li>
                        <i class="fa-brands fa-linkedin" style="color: #fcb900;"></i>
                        <a href="https://www.linkedin.com/in/bleuenn-garry/">Bleuenn Garry</a>
                    </li>
                </ul>
                <h2>Lieu de l'évènement</h2>
                <ul>
                    <li class="frame-4">
                        <i class="fa-solid fa-location-dot"></i>
                        <a href="https://www.google.com/maps/place/72+Rue+de+la+République,+76140+Le+Petit-Quevilly" target="_blank">
                            <p>Seine Innopolis - 72 Rue de la République, 76140 Le Petit-Quevilly</p>
                        </a>                    
                    </li>
                </ul>
            </div>
            <div id="map"></div>
        </section>

        <!-- FOOTER -->

        <section class="footer">
            <div class="footer-img">
                <div>
                    <p>Nos réseaux</p>
                    <a href="https://normandiewebschool.fr/" target="_blank">
                        <img src="img/logo_nws.png" class="footer-logo">
                    </a>
                    <a href="https://www.linkedin.com/school/normandiewebschool/" target="_blank">
                        <img src="img/logo_2.webp" class="footer-logo">
                    </a>
                    <a href="https://www.instagram.com/nws_rouen/" target="_blank">
                        <img src="img/logo_3.webp" class="footer-logo">
                    </a>
                    <a href="https://www.facebook.com/normandiewebschool/?locale=fr_FR" target="_blank">
                        <img src="img/logo_4.svg" class="footer-logo">
                    </a>
                </div>
            </div>
        </section>
        <div class="credits">
            <p>Site développé par les étudiants de la NWS</p>
        </div>
    </main>
</body>

</html>
