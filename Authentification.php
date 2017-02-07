<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Authentification</title>
  <link rel="stylesheet" href="css/Authentification.css">
</head>

<body>
    <div class="login-page">
        <div class="form">
            <form class="register-form">
                <input type="text" placeholder="Identifiant"/>
                <input type="password" placeholder="Mot de passe"/>
                <input type="text" placeholder="Email"/>
                <button>create</button>
                <p class="message">Déjà inscrit? <a href="#">Connexion</a></p>
            </form>
            <form class="login-form">
                <input type="text" placeholder="Identifiant"/>
                <input type="password" placeholder="Mot de passe"/>
                <a href="Liste_Patients.php">Se connecter</a>
                <p class="message">Pas encore inscrit? <a href="#">Inscription</a></p>
            </form>
      </div>
    </div>
    
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="js/Authentification.js"></script>
</body>
    
</html>
