<!-- Inscription d'un nouvel utilisateur -->

<body style="background: #1270B3; /* fallback for old browsers */
  background: -webkit-linear-gradient(right, #22427C, #1270B3);
  background: -moz-linear-gradient(right, #22427C, #1270B3);
  background: -o-linear-gradient(right, #22427C, #1270B3);
  background: linear-gradient(to left, #22427C, #1270B3);"      
      
<?php
require_once 'inc/functions.php';
session_start();

if(!empty($_POST)){
    $errors=array();
    require_once 'config2.php';
    
    /* Verification de erreurs */
    if(empty($_POST['username']) || !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['username'])){
        $errors['username'] = "Votre pseudo n'est pas valide (ne pas mettre de caractères spéciaux)";
    }
    else{           //Verifier que le pseudo n'est pas deja utilise
        $req = $bdd->prepare('SELECT id FROM users WHERE username = ?');
        $req->execute([$_POST['username']]);
        $user = $req->fetch();
        if($user){
            $errors['username'] = 'Ce pseudo est déjà pris';
        }
    }
    
    if(empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        $errors['email'] = "Votre email n'est pas valide";
    }
    
    if(empty($_POST['password']) || $_POST['password'] != $_POST['password_confirm']){
        $errors['password'] = "Rentrez un mot de passe valide s'il vous plait";
    }
    
    /* Inscription */
    if(empty($errors)){
        $req = $bdd->prepare("INSERT INTO users SET username = ?, password = ?, email = ?, confirmation_token = ?");
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);         // cryptage du mdp pour le securiser dans la bdd
        $token = str_random(60); // generation d'un token aléatoire
        $req->execute([$_POST['username'], $password, $_POST['email'], $token]);
        $user_id = $bdd->lastInsertId(); // preparation de l'id a envoyer dans le mail
        
        //--ajouter ici l'envoi du mail--//
        die("Rendez vous à l'adresse suivante pour valider votre inscription :<br><br>http://localhost/GitHub/IHM-Final/confirm.php?id=$user_id&token=$token<br><br>ATTENTION : Remplacez http://localhost/GitHub/IHM-Final/ par le chemin correspondant sur votre poste !!"); // Envoie d'un mail pour valider le compte
        
        $_SESSION['flash']['success'] = 'Un lien de confirmation vous a été envoyé pour valider votre compte';
        header('Location: login.php');
        exit();
    }

}
?>

<?php require 'inc/header.php'; ?>


<!-- Affichage des erreurs -->
<?php if(!empty($errors)): ?>
<div class="alert alert-danger">
    <p>Vous n'avez pas rempli le formulaire correctement</p>
    <ul>
        <?php foreach($errors as $error): ?>
            <li><?= $error; ?></li>
        <?php endforeach; ?>
    </ul>
</div>
<?php endif; ?>

 <!-- <div class="login-page">
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
    </div> -->

<!-- Formulaire de saisie -->
<form action="" method="POST">
<div class="login-page">
    <div class="form2">
        <input type="text" name="username" class="form-control" placeholder="Identifiant" autocomplete="off"/>
        <input type="text" name="email" class="form-control" placeholder="Email" autocomplete="off"/>
        <input type="password" name="password" class="form-control" placeholder="Mot de passe"/>
        <input type="password" name="password_confirm" class="form-control" placeholder="Confirmez votre mot de passe"/>
        <input type="submit" accesskey="enter" value="S'inscrire" onmousemove="changeBgColor('btn')" onmouseout="recoverBgColor('btn');"  formmethod="post" style="text-align:center"/> 
        <a href="login.php" style="text-decoration:none">Déjà inscrit ?</a>

    </div>
</div>    
</form>

<?php require 'inc/footer.php'; ?>

