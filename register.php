<!-- Verification des erreurs de saisi des informations -->
<?php
require_once 'inc/functions.php';
session_start();

if(!empty($_POST)){
    $errors=array();
    require_once 'config2.php';
    
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

<h1>S'inscrire</h1>

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


<!-- Formulaire de saisie -->
<form action="" method="POST">
    <div class="form-group">
        <label for="">Pseudo</label>
        <input type="text" name="username" class="form-control"/>
    </div>
    
    <div class="form-group">
        <label for="">Email</label>
        <input type="text" name="email" class="form-control"/>
    </div>
    
    <div class="form-group">
        <label for="">Mot de passe</label>
        <input type="password" name="password" class="form-control"/>
    </div>
    
    <div class="form-group">
        <label for="">Confirmez votre mot de passe</label>
        <input type="password" name="password_confirm" class="form-control"/>
    </div>
    
    <button type="submit" class="btn btn-primary">M'inscrire</button>
</form>

<?php require 'inc/footer.php'; ?>