<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Compte à rebours sondage</title>
</head>
<body class="bg-gray-200 p-8 flex items-center justify-center h-screen">

    <div class="text-center">
        <h1 class="text-3xl font-semibold mb-4 text-gray-800">Sondage</h1>
        <div id="countdown" class="text-4xl font-bold bg-gray-800 text-white p-4 rounded-md shadow-md">
            Chargement...
        </div>
        
        <!-- Bouton pour accéder au sondage (initialement masqué) -->
        <a id="surveyButton" href="survey.php" class="hidden bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md mt-4">Accéder au sondage</a>
    </div>

    <script src="countdown.js"></script>
</body>
</html>
