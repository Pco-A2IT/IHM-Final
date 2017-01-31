<!--Connexion à la bdd 'bdd_plateforme' à travers un fichier annexe-->
<?php
    include('config.php');
?> 
<html>
<head>
   <title> Liste Services</title>
   <link href="css/General.css"type="text/css"rel="stylesheet"/> 
    <meta charset="UTF-8">    
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> 
   
        <!--inclusion CSS pour autocompletion-->
</head>
<body>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <!-- inclusion de jQuery et jQuery.ui-->
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
                        
            <div id="menu3" class="carreGris" style="background-color:#1270B3";>
                <h4>Services</h4>
                <img class="icone_menu" src="Icones/hopital_blanc.png"/>
            </div>
             <div id="menu4" class="carreGris">
                <h4>Paramètres</h4>
                <img class="icone_menu" src="Icones/parametres_blanc.png"/>      
            </div>
            <div id="menu5" class="carreGris">
                <h4>Logout</h4>
                <img class="icone_menu" src="Icones/logout.png"/>      
            </div>
            
            <div class="titre"; style="border-radius: 5px;">
                <h1 class="titreGauche">Services</h1>
                        <form id="recherche" method="post">

                            <input name="saisie" id="saisie" type="text" placeholder="Rechercher Service..."  />
                            <input class="loupe" type="submit" value="" />

                    </form>   
                
            </div>
            
            <script>
                //utilisation de jQuery :
                $(function($)   {
                    $('#saisie').autocomplete({
                        source : 'listeServices.php' 
                        
                        
                    });
                });
            </script>    
             <script type="text/javascript">
           function confirm(){
      var msg="Vous êtes sûr?\n\nConfirmez s'il vous plaît!";
      if(confirm(msg)==true)
    {
     return true;
    }
      else
    {
      return false;
    }
    }
    </script> 
            <script src="js/General.js"></script> 
            <div class="blanc"; style="border-radius: 5px;">
                       <div class="myButton" id="Ajouter_liste">
                            <a href="Dossier_Service.php" class="myButton1"><img class="icone_ajouter" src="Icones/button_ajouter.png"> Ajouter Service</a>
                        </div><br>
               
                    <table cellspacing='0' id="tbl"> <!-- cellspacing='0' is important, must stay -->
                        <th>Fiche</th>
                        <th></th>
                        <th>Num Siret</th>
                        <th>Service</th>
                        <th>Adresse</th>
                        <th>Code postal</th>
                        <th>Ville</th>
                        <th>Téléphone</th>
                        <th>Horaires Ouverture</th>
                        <th>Horaires Fermeture</th>
                        <th></th>
                        <th></th>

                        
<?php

if(isset($_POST['saisie'])){
    $query = 'SELECT * FROM service WHERE numSiret LIKE :term';
    $term = $_POST['saisie'];
}
else{
    $query = 'SELECT * FROM service ';
    $term="";
}
                        

                        
try {
	$pdo_select = $bdd->prepare($query);
	$pdo_select->execute(array('term' => $term.'%'));
  } catch (PDOException $e){ echo 'Erreur SQL : '. $e->getMessage().'<br/>'; die(); }

while($dnn = $pdo_select->fetch() )
{
?>
       
    <tr>
        <td><img class="icone_liste" src="Icones/hopital_bleu.png" width="50px" heigh="50px" alt="Photo de patient" /></td>
        <td class="left"><?php print_r($dnn['id_service']); ?></td>
        <td class="left"> <?php print_r($dnn['numSiret']); ?> </td>
        <td class="left"> <?php print_r($dnn['centre_s']); ?></td>
        <td class="left"> <?php print_r($dnn['adresse_s']); ?></td>
        <td class="left"> <?php print_r($dnn['codePostal_s']); ?></td>
        <td class="left"> <?php print_r($dnn['ville_s']); ?></td>
        <td class="left"> <?php print_r($dnn['telephone_s']); ?></td>
        <td class="left"> <?php print_r($dnn['horairesd_s']); ?></td>
        <td class="left"> <?php print_r($dnn['horairesf_s']); ?></td>
        <td><a href="Dossier_Service_modif.php?idservice=<?php echo $dnn['id_service']; ?>"><img class="supprimer" src="Icones/button_modifier.png"></a></td>
        <td><a href="./Interaction-BDD/SupprBDD_Service.php?idservice=<?php echo $dnn['id_service']; ?>" onclick="return confirm();"><img class="supprimer" src="Icones/button_supprimer.png"></a></td>
        
            
    </tr>
<?php
}
?>
                        
                        
                        <!--<tr>
                            <td><img src="hospital.png" width="50px" heigh="50px"  alt="Photo de hopital" /></td>
                            <td>Hopital de Lyon</td>
                            <td>Service neurovasculaire</td>
                            <td>59 boulevard Pinel</td>
                            <td>69100</td>
                            <td>Bron</td>
                            <td>0988834944</td>
                            <td>9:00 - 18:00</td>
                            <td><a href="Dossier_Service_modif.html"><img class="supprimer" src="loupe.png"></a></td>
                            <td><img class="supprimer" src="button_supprimer.png"></td>
                        </tr>
                        <tr>
                            <td><img src="hospital.png" width="50px" heigh="50px"  alt="Photo de hopital" /></td>
                            <td>Hôpital de la Croix-Rousse</td>
                            <td>Service cardio</td>
                            <td>103 rue de la vie</td>
                            <td>69000</td>
                            <td>Lyon</td>
                            <td>0988834944</td>
                            <td>9:00 - 18:00</td>
                            <td><img class="supprimer" src="loupe.png"></td>
                            <td><img class="supprimer" src="button_supprimer.png"></td>
                        </tr> -->
                    </table> 
            
            
            </div>
        </div>
    </div>
</body>
</html>
