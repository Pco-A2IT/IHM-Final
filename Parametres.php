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
               <div  class="gris2";>
          <div id="menu0" class="carreGris";>
                <h4 >Patients</h4>    
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
                <h4>Outils</h4>
                <img class="icone_menu" src="Icones/parametres_blanc.png"/>      
            </div>
         
    
    <div class="titre";   style="border-radius: 5px;">
        <h1 class="titreGauche">Outils</h1>
    </div>
     <div class="blanc"; style="border-radius: 5px;">
               <div class="section4">
                            

                <form action="" method="POST">
                    <div class="login-page">
                        <div class="form2">
              <p><a href="Liste_Examens.php" class="myButton1" id="btn_outils">Gestion Examens</a></p> 
             <p><a href="Parametres_Export.php" class="myButton1" id="btn_outils">Export Données</a></p>
           <p><a href="account.php" class="myButton1" id="btn_outils">Changement mot de passe</a></p>
       
   </div>
              
         <script src="js/General.js"></script>
</div>
                   </form>
    </div>
         </div>
                   </div>
    </div>
</body>
</html>
    
<?php require 'inc/footer.php'; ?>