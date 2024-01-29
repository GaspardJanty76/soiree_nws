<!doctype html>
<html lang="en"> 

<head> 
    <meta charset="UTF-8"> 
    <link rel="stylesheet" href="css/styleguide.css"> 
    <link rel="stylesheet" href="css/connexion.css"> 
</head> 
<body>
    <div class="login-page">
        <div class="form">
            <form class="login-form" action="methodes/adminAuth.php" method="post">
                <div class="titre-connect">
                    <a class="titre-connexion">Connexion</a>
                </div>
                <input type="text" id="auth" name="auth" placeholder="nom d'utilisateur" required/>
                <input type="password" id="password" name="password" placeholder="mot de passe" required/>
                <input type="submit" class="btn-cnx" value="Se connecter">
            </form>
        </div>
    </div>
</body>
</html>