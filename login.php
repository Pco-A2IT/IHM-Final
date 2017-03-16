<?php require 'inc/header.php'; ?>

<?php
if(!empty($_POST) && !empty($_POST['username']) && !empty($_POST['password'])){
    require_once 'config2.php';
    require_once 'inc/functions.php';
    $req = $bdd->prepare('SELECT * FROM users WHERE (username = :username) AND confirmed_at IS NOT NULL');
    $req->execute(['username' => $_POST['username']]);
    $user = $req->fetch();
    if(password_verify($_POST['password'], $user->password)){
        $_SESSION['auth'] = $user;
        //$bdd->prepare('UPDATE users SET last_connection = ? WHERE id = ?')->execute([$user_id]);
        
        $req3 = $bdd->prepare('UPDATE users SET last_connection = NOW() WHERE username = ?');
        $req3->execute(array($_POST['username']));

        
        $_SESSION['flash']['success']='Vous êtes maintenant connecté';
        header('Location: Liste_Patients.php');
        exit();        
    }else{
        $_SESSION['flash']['danger']='Identifiant ou mot de passe incorrecte';
    }
    

}
?>

    <h1> Se connecter</h1>

        <form action="" method="POST">
            <div class="form-group">
                <label for="">Pseudo</label>
                <input type="text" name="username" class="form-control"/>
            </div>

            <div class="form-group">
                <label for="">Mot de passe</label>
                <input type="password" name="password" class="form-control"/>
            </div>

            <button type="submit" class="btn btn-primary">Se connecter</button>
        </form>

<?php require 'inc/footer.php'; ?>