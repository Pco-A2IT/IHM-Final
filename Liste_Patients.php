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
     <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!--inclusion CSS pour autocompletion-->
    <script>
    function deleteRow(obj){
      if(confirm('Vous êtes sure?'))
    {
      tbl.deleteRow(obj.parentElement.parentElement.rowIndex);
    }
    }
    </script>
</head>
<body>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <!-- inclusion de jQuery et jQuery.ui-->
       <div class="gris">
           <div  class="gris2">
                <div id="menu0" class="carreGris" style="background-color:#1270B3" ;>
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
                        
            <div id="menu3" class="carreGris" ;>
                <h4>Services</h4>
                <img class="icone_menu" src="Icones/hopital_blanc.png"/>
            </div>
             <div id="menu4" class="carreGris">
                <h4>Outils</h4>
                <img class="icone_menu" src="Icones/parametres_blanc.png"/>      
            </div>
          
            <div class="titre";   style="border-radius: 5px;">
                <h1 class="titreGauche">Patients</h1> 
                
            </div>
            <script>
                //utilisation de jQuery :
                $(function($)   {
                    $('#saisie').autocomplete({
                        source : 'listePatients.php'
                    });
                });
            </script>    
            
            <script src="js/General.js"></script>
            <div class="blanc";   style="border-radius: 5px;">
                <div class="myButton" id="Ajouter_liste">
                            <a href="Dossier_Patient.php" class="myButton1">Ajouter Patient</a>
                </div>
                <br>
                <br>
                <br>
                    <form id="recherche" method="post" class="recherche">

                        <input name="saisie" id="saisie" type="text" placeholder="Rechercher patient..."/>
                        <input class="loupe" type="submit" value="" />
                        <input  type="submit" id="afficher" value="Afficher liste complète" >
                    </form>
                <style>
                                        #divConteneur{
                           min-height:630px;
                            height:630px;
                            min-width:100%;
                            width:100%;
                            overflow:auto;/*pour activer les scrollbarres*/
                            }
                           
                            </style>

                <div id="divConteneur">
                
                <div class="liste">
                
                <table cellspacing="0px" id="tbl" class="table">   
                    <tr>
                        <th>Fiche</th>
                        <th>Nom </th>
                        <th>Prénom </th>
                        <th>Date de naissance </th>
                        <th>Code postal </th>
                        <th>Ville </th>
                        <th>Téléphone </th>
                    </tr>   
                         
<?php

if(isset($_POST['saisie'])){
    $query = 'SELECT * FROM patient WHERE nom_p LIKE :term';
    $term = $_POST['saisie'];
}
else{
    $query = 'SELECT * FROM patient ';
    $term="";
}
                        

                        
try {
	$pdo_select = $bdd->prepare($query);
	$pdo_select->execute(array('term' => $term.'%'));
  } catch (PDOException $e){ echo 'Erreur SQL : '. $e->getMessage().'<br/>'; die(); }

while($dnn = $pdo_select->fetch() )
{
                        ?>
                        <tr onclick="document.location='Dossier_Patient_modif.php?id_patient=<?php echo $dnn['id_patient'];?>'" style="cursor:zoom-in">
                           <td><img class="icone_liste" src="Icones/patient_bleu.png" width="50px" heigh="50px" alt="Photo de patient" /></td>
                           <td><?php print_r($dnn['nom_p']); ?></td>
                           <td><?php print_r($dnn['prenom_p']); ?></td>
                           <td><?php print_r($dnn['date_naissance']); ?></td>
                           <td><?php print_r($dnn['codePostal_p']); ?></td>
                           <td><?php print_r($dnn['ville_p']); ?></td>
                           <td><?php print_r($dnn['telephone_p']); ?></td>                            
                           <td><a href="Prise_RDV.php?id_patient=<?php echo $dnn['id_patient'];?>"> <img class="supprimer" src="Icones/bouton_rdv.png"> </a></td>
                            <td><a href="./Interaction-BDD/SupprBDD_Patient.php?id_patient=<?php echo $dnn['id_patient'];?>" onclick="return sure();"><img class="supprimer" src="Icones/button_supprimer.png"> </a></td>
                        </tr>
                        
                                                
<?php
}
?>
<!--La fonction qui permet de demander une confirmation lors de la demande de suppression-->                         
<script> 
function sure()
{
    return(confirm('Etes-vous sûr de vouloir supprimer ce Dossier Patient ?'));
}                 
</script>



                        <!--<tr>
                           <td><img src="patient.png" width="50px" heigh="50px" alt="Photo de patient" /></td>
                           <td>Pasteur</td>
                           <td>Vincent</td>
                           <td>12/07/1990</td>
                           <td>77700</td>
                           <td>Carré</td>
                           <td>0988834944</td>
                            <td><a href="Dossier_Medecin_modif.html">Luigi Bardi</a></td>
                            
                           <td><a href="Dossier_Patient.html"> <img class="supprimer" src="loupe.png"> </a></td>
                            <td><img class="supprimer" src="button_supprimer.png"></td>
                        </tr>
                        <tr>
                            <td><img src="patient.png" width="50px" heigh="50px" alt="Photo de patient"  /></td>
                            <td>Pasteur</td>
                            <td>Vincent</td>
                            <td>12/07/1990</td>
                            <td>77700</td>
                            <td>Carré</td>
                            <td>0988834944</td>
                               <td><a href="Dossier_Medecin_modif.html">Luigi Bardi</a></td>
                            
                           <td><a href="Dossier_Patient.html"> <img class="supprimer" src="loupe.png"> </a></td>
                            <td><img class="supprimer" src="button_supprimer.png"></td>
                        </tr> -->
                    </table> 
                </div>     
                </div> 
            </div>
        </div>
        </div>
        
    
</body>
</html>

<?php require 'inc/footer.php'; ?>