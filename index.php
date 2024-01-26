<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <link data-require="leaflet@0.7.3" data-semver="0.7.3" rel="stylesheet"
        href="//cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.3/leaflet.css" />
    <link rel="stylesheet" href="./css/global.css" />
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
    <script src="http://threejs.org/examples/js/libs/stats.min.js" defer></script>

</head>

<body>
    <canvas id="starCanvas"></canvas>
    <script src="js/stars.js"></script>
    <main class="index">
        <section class="hero-section">
            <div class="hero-header">
                <h1>"Logo" La nuit de la NWS</h1> 
                <p>18 AVRIL 2024<br>votre évènement commence dans :</p>
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
            </ul>
            <a href="#Inscri">
                <button>
                    Inscription
                </button>
            </a>
        </section>

        <!-- NUAGE DE MOTS -->
        <div class="cloud">
            <div class="word">
                <p>Conférences</p>
                <p>Lots</p>
                <p>Ateliers</p>
                <p>Exposants</p>
                <p>Icebreaker</p>
                <p>Entreprises</p>
                <p>Intervenants</p>
                <p>Collaboration</p>
                <p>Partenariats</p>
                <p>Stratégies</p>
                <p>Échanges</p>
                <p>Tendances</p>
                <p>Ambassadeurs</p>
            </div>
        </div>

        <!-- BLOCK INFORMATION -->
        <section class="information" id="Info">
            <div class="block-rectangle-2">
                <img src="img/antenna-ZDN-G1xBWHY-unsplash.jpg" class ="block-rectangle-2" alt="">
            </div>
            <div class="information-content">
                <h2><?php echo $title; ?></h2>
                <p><?php echo $text; ?></p>
            </div>
        </section>

        <!-- INSCRIPTION -->
        <section class="registration-section">
            <h2 id="Inscri">Inscription</h2>
            <form method="post" enctype="multipart/form-data" onsubmit="showPopup(); return false;">
                <h3>
                    <i class="fa-solid fa-user"></i>
                    Informations personnelles
                </h3>
                <div class="registration-form-part">
                    <div class="registration-form-section">
                        <div>
                            <label for="lastname">Nom</label>
                            <input type="text" name="lastname" required>
                        </div>
                        <div>
                            <label for="firstname">Prénom</label>
                            <input type="text" name="firstname" required>
                        </div>
                    </div>
                    <div class="registration-form-section">
                        <div>
                            <label for="tel">Téléphone</label>
                            <input type="text" name="tel" required>
                        </div>

                        <div>
                            <label for="mail">Mail</label>
                            <input type="text" name="mail" required>
                        </div>
                    </div>
                </div>
                <h3>
                    <i class="fa-solid fa-user"></i>
                    Entreprise
                </h3>
                <div class="registration-form-part">
                    <div>
                        <label class="inscri-texte">Entreprise
                        </label>
                        <input type="text" name="company" required>
                    </div>
                    <div>
                        <label for="job">Poste
                        </label>
                        <input type="text" name="job" required>
                    </div>
                </div>
                <label class="label-custom">Je refuse d'être pris en photo
                    <input type="checkbox">
                    <span class="checkmark"></span>

                </label>
                <button type="submit">
                    Valider l'inscription
                </button>
            </form>
        </section>
        <!-- CONTACT EN FOOTER -->

        <section class="contact-section">
            <div class="contact-content">
                <h2>Contact</h2>
                <ul>
                    <li>
                        <i class="fa-solid fa-phone"></i>
                        <p>0606060606</p>
                    </li>
                    <li class="frame-3">
                        <i class="fa-solid fa-envelope"></i>
                        <p>ldna@gmail.com</p>
                    </li>
                    <li class="frame-4">
                        <i class="fa-solid fa-location-dot"></i>
                        <p>adresse</p>
                    </li>
                </ul>
            </div>
            <div id="map"></div>
        </section>
    </main>

</body>

</html>