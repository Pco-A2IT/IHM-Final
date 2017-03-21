<?php
if(session_status() == PHP_SESSION_NONE){
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

   
    <title>Plateforme AIT</title>

    <!-- Bootstrap core CSS -->
      <link href="css/General.css" rel="stylesheet">
  </head>

  <body>

    <nav class="navbar navbar-inverse">
      <div class="container">
        <div class="navbar-header">
          <!--<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>-->
       <div class=entete>
            <div class="carre";>    
                <img class="icone_logo" src="Icones/logo.png" 
                align='left' alt='sorry' width="60px" heigh="60px"/>
            <?php if (isset($_SESSION['auth'])): ?>
            <a>Connecté en tant que <?= $_SESSION['auth']->username; ?></a>
            <?php endif; ?>
          <ul class="nav navbar-nav">
            <?php if (isset($_SESSION['auth'])): ?>
              <li><img class="supprimer" src="Icones/logout.png"  align='right' alt='sorry' ><a href="logout.php"><div style="color:#ffffff">Se déconnecter</div></a></li>              
            <?php else: ?>
                <li><a href="register.php">S'inscrire</a></li>
                <li><a href="login.php">Se connecter</a></li>
            <?php endif; ?>
          </ul>
             </div> 
            
        </div><!--/.nav-collapse -->
      </div>
   
    <div class="container">
        <?php if(isset($_SESSION['flash'])): ?>
            <?php foreach($_SESSION['flash'] as $type => $message): ?>
                <div class="alert alert-<?= $type; ?>">
                    <?= $message; ?>
                </div>
            <?php endforeach; ?>
            <?php unset($_SESSION['flash']); ?>
        <?php endif; ?>
    
      </div>
      </div>
      </nav>
