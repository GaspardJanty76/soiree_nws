<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Récupérer et envoyer des données</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

<button id="recuperer-donnees">Récupérer et envoyer les données</button>

<script>
$(document).ready(function(){
    // Fonction pour récupérer et envoyer les données lorsque le bouton est cliqué
    $("#recuperer-donnees").click(function(){
        // Requête AJAX pour récupérer les données depuis la page PHP
        $.ajax({
            url: 'getinfo.php', // Assurez-vous de remplacer "votre_page_php.php" par le chemin correct de votre page PHP
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                // Vérifiez si les données sont un tableau JSON
                if(Array.isArray(data)) {
                    const allUserData = data.map(function(item) {
                        return {
                            "nom": item.lastname,
                            "prenom": item.firstname,
                            "email": item.mail,
                            "tel": item.tel,
                            "entreprise": item.company,
                            "poste": item.job
                        };
                    });

                    // Envoi des données regroupées vers l'API
                    $.ajax({
                        url: 'https://app-nuit.normandiewebschool.fr/api/user/tab',
                        type: 'POST',
                        contentType: 'application/json',
                        data: JSON.stringify(allUserData),

                        success: function(response) {
                            console.log('Données envoyées avec succès');
                        },
                        error: function(error) {
                            console.error('Erreur lors de l\'envoi des données');
                        }
                    });
                } else {
                    console.error('Les données reçues ne sont pas au format attendu.');
                }
            },
            error: function(error) {
                console.error('Erreur lors de la récupération des données depuis la base de données');
            }
        });
    });
});
</script>

</body>
</html>
