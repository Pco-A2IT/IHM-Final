<?php require 'inc/header.php'; ?>

<?php
if(!empty($_POST)){
    $errors=array();
    require_once 'config.php';
    
    if(empty($_POST['username']) || !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['username'])){
        $errors['username'] = "Votre pseudo n'est pas valide (ne pas mettre de caractères spéciaux)";
    } else{
        $req = $bdd->prepare('SELECT id FROM users WHERE username = ?');
        $req->execute([$_POST['username']]);
        $user = $req->fetch();
        if($user){
            $errors['username'] = 'Ce pseuo est déjà pris';
        }
    }
    
    if(empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        $errors['email'] = "Votre email n'est pas valide";
    }
    
    if(empty($_POST['password']) || $_POST['password'] != $_POST['password_confirm']){
        $errors['password'] = "Rentrez un mot de passe valide s'il vous plait";
    }
    
    if(empty($errors)){
        $req = $bdd->prepare("INSERT INTO users SET username = ?, password = ?, email = ?");
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $req->execute([$_POST['username'], $password, $_POST['email']]);
        die('Le compte a bien été créé');
    }
    
    debug($errors);

}
?>


<h1>S'inscrire</h1>

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