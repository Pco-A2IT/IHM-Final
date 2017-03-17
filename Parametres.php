<?php 
require 'inc/functions.php';
logged_only();
require 'inc/header.php'; 
include('config.php');
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
        <h1 class="titreGauche">Paramètres</h1>
    </div>
    <div class="blanc"; style="border-radius: 5px;">
          
        <div class="section2">
               <a href="Liste_Examens.php" class="myButton1" id="btn1">Gestion Examens</a>
             <a href="Parametres_Export.php" class="myButton1" id="btn2">Export Données</a>
           <a href="Authentification.php" class="myButton1" id="btn3">Gestion Utilisateurs</a>
       
   </div>
         <script src="js/General.js"></script>
</div>
    </div>
    </div>
</body>
</html>
    
<?php require 'inc/footer.php'; ?>