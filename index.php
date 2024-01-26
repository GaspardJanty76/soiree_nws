<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <link data-require="leaflet@0.7.3" data-semver="0.7.3" rel="stylesheet"
        href="//cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.3/leaflet.css" />
    <link rel="stylesheet" href="./css/global.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

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
                <h1>La nuit de la NWS</h1>
                <p>votre évènement commence dans :</p>
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

        <div class="cloud">
            <div class="word">
            </div>
        </div>

        <script src="js/nuage.js"></script>

        <section class="information" id="Info">
            <div class="block-rectangle-2"></div>
            <div class="information-content">
                <h2>Informations</h2>
                <p>
                    Au cœur de cette soirée, La Normandie Web School aspire à atteindre un objectif clair :
                    favoriser la
                    création de liens significatifs
                    et le développement de collaborations innovantes entre les acteurs du monde académique et
                    professionnel.
                    Nous croyons en l'importance
                    de dépasser les frontières traditionnelles pour créer des opportunités concrètes.<br><br>
                    Participez à cette soirée, où chaque interaction contribue à esquisser un futur riche en
                    collaborations
                    fructueuses. Soyez acteur de cette
                    expérience qui encourage la création de liens durables et le partage d'expertise. Rejoignez-nous
                    dans
                    cette aventure vers un futur collaboratif et innovant.
                </p>
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