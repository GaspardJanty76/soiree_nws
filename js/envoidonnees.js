// Importer le module mysql
import { createConnection } from 'mysql';

// Configuration de la connexion à la base de données
const connection = createConnection({
  host: '51.178.29.201:3306',
  user: 'westypbl',
  password: '8morts6blesses@',
  database: 'nwsnight'
});

// Fonction pour récupérer les données de la base de données
function obtenirDonneesDeLaBase(callback) {
  // Connexion à la base de données
  connection.connect();

  // Requête SQL pour récupérer les données
  const sqlQuery = 'SELECT lastname, firstname, mail, tel, company, job FROM registrationgasp';

  // Exécution de la requête
  connection.query(sqlQuery, (error, results) => {
    if (error) {
      // En cas d'erreur lors de l'exécution de la requête, appeler la fonction de rappel avec l'erreur
      callback(error, null);
    } else {
      // En cas de succès, appeler la fonction de rappel avec les résultats de la requête
      callback(null, results);
    }
  });

  // Fermeture de la connexion à la base de données
  connection.end();
}

// Supposons que vous ayez un bouton avec l'id "bouton-envoi"
document.getElementById('bouton-envoi').addEventListener('click', function() {
    console.log('click');
    // Utilisation de la fonction pour récupérer les données de la base de données
    obtenirDonneesDeLaBase((error, donneesDeLaBase) => {
        console.log(donneesDeLaBase);
        if (error) {
            console.error('Erreur lors de la récupération des données : ', error);
        } else {
            // Boucle à travers les données de la base
            donneesDeLaBase.forEach(function(donnee) {
                // Récupération des informations de chaque ligne de la base de données
                var nom = donnee.nom;
                var prenom = donnee.prenom;
                var email = donnee.email;
                var tel = donnee.tel;
                var entreprise = donnee.entreprise;
                var poste = donnee.poste;

                // Création de l'objet JSON avec les informations récupérées
                var donnees = {
                    "nom": nom,
                    "prenom": prenom,
                    "email": email,
                    "tel": tel,
                    "entreprise": entreprise,
                    "poste": poste
                };

                // Configuration de la requête vers votre API
                var requestOptions = {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(donnees)
                };

                // Envoi des données à l'API
                fetch('https://app-nuit.normandiewebschool.fr/api/user/tab', requestOptions)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Erreur lors de la requête : ' + response.status);
                        }
                        console.log('Données envoyées avec succès !');
                        // Vous pouvez gérer la réponse de l'API ici si nécessaire
                    })
                    .catch(error => {
                        console.error('Erreur lors de l\'envoi des données : ', error);
                    });
            });
        }
    });
});
