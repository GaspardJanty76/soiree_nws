<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Merci</title>
</head>
<body class="bg-gray-200 p-8 flex items-center justify-center h-screen">

    <div class="text-center">
        <h1 class="text-3xl font-semibold mb-4 text-gray-800">Merci pour votre réponse!</h1>
        <p>Vous allez être redirigé vers le jeu dans quelques secondes...</p>
    </div>

    <script>
        // Rediriger vers l'accueil après un court délai (2 secondes dans cet exemple)
        setTimeout(function () {
            window.location.href = "game.php";
        }, 2000);
    </script>

</body>
</html>
