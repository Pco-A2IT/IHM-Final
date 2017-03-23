<?php 
require 'inc/functions.php';
logged_only();
if(!empty($_POST)){
    
    if(empty($_POST['password']) || $_POST['password'] != $_POST['password']){
        $_SESSION['flash']['danger'] = "Les mots de passe ne correspondent pas";
        }else{
            $user_id = $_SESSION['auth']->id;
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        require_once 'config.php';
        $bdd->prepare('UPDATE users SET password = ? WHERE id = ?')->execute([$password, $user_id]);
        $_SESSION['flash']['success'] = "Votre mot de passe a bien été mis à jour";
    }
}
require 'inc/header.php'; 
?>

<html>
<head>
    <meta charset="UTF-8">
   <link href="css/General.css"type="text/css"rel="stylesheet"/>    <!-- BOOTSTRAP -->
</head>
<body>
    <div class="gris">
        <div  class="gris2">
            <div id="menu0" class="carreGris";>
                <h4>Patients</h4>    
                <img class="icone_menu" src="Icones/patient_blanc.png"/>
            </div> 
            <div id="menu1" class="carreGris";>
                <h4>Suivi</h4>
                <img class="icone_suivi" src="Icones/recapitulatif.png"/>
            </div>
            <div id="menu2" class="carreGris" ;>
                <h4>Médecins</h4>    
                <img class="icone_menu" src="Icones/medecin_blanc.png"/>
            </div>       
            <div id="menu3" class="carreGris";>
                <h4>Services</h4>
                <img class="icone_menu" src="Icones/hopital_blanc.png"/>
            </div>
            <div id="menu4" class="carreGris"  style="background-color:#1270B3">
                <h4>Paramètres</h4>
                <img class="icone_menu" src="Icones/parametres_blanc.png"/>      
            </div>
            <div id="menu5" class="carreGris">
                <h4>Logout</h4>
                <img class="icone_menu" src="Icones/logout.png"/>      
            </div>
    
            <div class="titre";   style="border-radius: 5px;">
                <h1 class="titreGauche">Paramètres utilisateur</h1>
            </div>
            
            <div class="blanc"; style="border-radius: 5px;">
                <h1>Changement de mot de passe</h1>

                <form action="" method="post">
                    <div class="form-group">
                        <input class="form-control" type="password" name="password" placeholder="Nouveau mot de passe" />
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="password_confirm" placeholder="Confirmer nouveau mot de passe" />
                    </div>
                    <button class="btn btn-primary">Changer mot de passe</button>
                </form>

                <script src="js/General.js"></script>
            </div>
        </div>
    </div>
</body>
</html>
    
<?php require 'inc/footer.php'; ?>