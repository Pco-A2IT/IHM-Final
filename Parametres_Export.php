<?php 
require 'inc/functions.php';
logged_only();
require 'inc/header.php'; 
include('config.php');
?>

<html>
<head>
    <meta charset="UTF-8">
    <link href="css/General.css"type="text/css"rel="stylesheet"/> 
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> 
        <!--inclusion CSSS pour autocompletion-->
    <title>Export Données</title>
</head>
    <body>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <!-- inclusion de jQuery et jQuery.ui-->
    <div class="gris">
         <form action="./Interaction-BDD/AjoutBDD_Examen.php" method="post">
                <div  class="gris2">
         <div id="menu0" class="carreGris";>
                <h4>Patients</h4>    
                <img class="icone_menu" src="Icones/patient_blanc.png"/>
            </div> 
            <div id="menu1" class="carreGris";>
                <h4>Suivi</h4>
                <img class="icone_suivi" src="Icones/recapitulatif.png"/>
            </div>
            <div id="menu2" class="carreGris";>
                <h4>Médecins</h4>    
                <img class="icone_menu" src="Icones/medecin_blanc.png"/>
            </div>
                        
            <div id="menu3" class="carreGris" ;>
                <h4>Services</h4>
                <img class="icone_menu" src="Icones/hopital_blanc.png"/>
            </div>
             <div id="menu4" class="carreGris" style="background-color:#1270B3"  >
                <h4>Outils</h4>
                <img class="icone_menu" src="Icones/parametres_blanc.png"/>      
            </div>
        
            <div class="titre";   style="border-radius: 5px;">
                <h1 class="titreGauche">Outils</h1>
    
            </div>
            <script src="js/General.js"></script>
    <div class="blanc";   style="border-radius: 5px;">
        <div class="section4">
                <form action="" method="POST">
                    <div class="login-page">
                        <div class="form2" align="vertical">
        <input  style="text-align:center" value="Export Données">
        <a href="exportExcel.php?nom_table=<?php echo 'total'; ?>" class="myButton1">Ensemble des données <img src="Icones/hopital_bleu.png" align='left' alt='sorry' width="25px" heigh="25px"/></a>
        <a href="exportPatient.php?nom_table=<?php echo 'patient'; ?>" class="myButton1" >Données Patients <img src="Icones/patient_bleu.png" align='left' alt='sorry' width="25px" heigh="25px"/></a>
        <a href="exportMedecin.php?nom_table=<?php echo 'medecin'; ?>" class="myButton1">Données Médecins <img src="Icones/medecin_bleu.png" align='left' alt='sorry' width="25px" heigh="25px"/></a>
        <a href="exportExamen.php?nom_table=<?php echo 'examen'; ?>" class="myButton1">Données Examens <img src="Icones/parametres_bleu.png" align='left' alt='sorry' width="25px" heigh="25px"/></a>
        <a href="exportExamPatient.php?nom_table=<?php echo 'examPatient'; ?>" class="myButton1">Données Examens par patient <img src="Icones/parametres_bleu.png" align='left' alt='sorry' width="25px" heigh="25px"/></a><a href="exportService.php?nom_table=<?php echo 'service'; ?>" class="myButton1">Données Services <img src="Icones/hopital_bleu.png" align='left' alt='sorry' width="25px" heigh="25px"/></a>

                            </div>
       
    </div>
                            </form>
            </div>
        </div>
         </div>
                
        </form>
    </div>
</body>
</html>
        
<?php require 'inc/footer.php'; ?>