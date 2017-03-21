<body style="background: #1270B3; /* fallback for old browsers */
  background: -webkit-linear-gradient(right, #22427C, #1270B3);
  background: -moz-linear-gradient(right, #22427C, #1270B3);
  background: -o-linear-gradient(right, #22427C, #1270B3);
  background: linear-gradient(to left, #22427C, #1270B3);"      
      

<?php require 'inc/header.php'; ?>

<?php
if(!empty($_POST) && !empty($_POST['username']) && !empty($_POST['password'])){
    require_once 'config2.php';
    require_once 'inc/functions.php';
    $req = $bdd->prepare('SELECT * FROM users WHERE (username = :username) AND confirmed_at IS NOT NULL');
    $req->execute(['username' => $_POST['username']]);
    $user = $req->fetch();
    if(password_verify($_POST['password'], $user->password)){
       //$bdd->prepare('UPDATE users SET last_connection = ? WHERE id = ?')->execute([$user_id]);
        
        $req3 = $bdd->prepare('UPDATE users SET last_connection = NOW() WHERE username = ?');
        $req3->execute(array($_POST['username']));
         $_SESSION['auth'] = $user;
        header('Location: Liste_Patients.php');
        exit();        
    }else{
        $_SESSION['flash']['danger']='Identifiant ou mot de passe incorrecte';
    }
    

}
?>


        <form action="" method="POST">
          <div class="login-page">
             <div class="form">
              <input type="text" name="username" class="form-control" placeholder="Identifiant"/>
            <input type="password" name="password" class="form-control" placeholder="Mot de passe"/>
            <input type="submit" accesskey="enter" value="Se connecter" onmousemove="changeBgColor('btn')" onmouseout="recoverBgColor('btn');"  formmethod="post"/> 
            <li><a href="register.php">Pas encore inscrit ?</a></li>
                   </div>
            </div>
        </form>


<?php require 'inc/footer.php'; ?>