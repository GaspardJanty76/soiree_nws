<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Sondage</title>
</head>
<body class="bg-gray-200 p-8 flex items-center justify-center h-screen">

    <div class="text-center">
        <h1 class="text-3xl font-semibold mb-4 text-gray-800">Sondage</h1>
        
        <!-- Question fixe -->
        <p>Quelle est votre réponse à la question suivante :</p>
        <p><strong>Votre question fixe ici.</strong></p>

        <!-- Ajouter le formulaire de sondage ici -->
        <form action="process_survey.php" method="post">
            <!-- Champ de réponse modifiable -->
            <label for="answer">Votre réponse :</label>
            <input type="text" name="answer" id="answer" required>
            
            <!-- Bouton de soumission -->
            <button type="submit" class="mt-4 bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                Soumettre
            </button>
        </form>
    </div>

</body>
</html>