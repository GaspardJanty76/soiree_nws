<?php
// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer la réponse du formulaire
    $answer = htmlspecialchars($_POST["answer"]);

    // Traitement supplémentaire si nécessaire (par exemple, enregistrement dans une base de données)
    // ...

    // Redirection vers une page de remerciements ou toute autre page appropriée
    header("Location: thank_you.php");
    exit();
} else {
    // Rediriger l'utilisateur s'il essaie d'accéder à cette page directement sans soumettre le formulaire
    header("Location: survey.php");
    exit();
}
?>