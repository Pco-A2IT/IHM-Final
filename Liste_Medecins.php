<?php
   include('config.php');
?>

<html>
<head>
    <meta charset="UTF-8">
    <link href="css/General.css"type="text/css"rel="stylesheet"/> 
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> 
        <!--inclusion CSSS pour autocompletion-->
    <title>Liste Médecins</title>
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
         <div id="menu0" class="carreGris";>
                <h4>Patients</h4>    
                <img class="icone_menu" src="Icones/patient_blanc.png"/>
            </div> 
            <div id="menu1" class="carreGris";>
                <h4>Suivi</h4>
                <img class="icone_suivi" src="Icones/recapitulatif.png"/>
            </div>
            <div id="menu2" class="carreGris"  style="background-color:#1270B3"  ;>
                <h4>Médecins</h4>    
                <img class="icone_menu" src="Icones/medecin_blanc.png"/>
            </div>
                        
            <div id="menu3" class="carreGris" ;>
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
            
            <div class="titre";   style="border-radius: 5px;">
                <h1 class="titreGauche">Médecins</h1>
                        <form id="recherche" method="post">

                            <input name="saisie" id="saisie" type="text" placeholder="Rechercher médecin..."  />
                            <input class="loupe" type="submit" value="" />

                    </form>   
                
            </div>
            
            <script>
                //utilisation de jQuery :
                $(function($)   {
                    $('#saisie').autocomplete({
                        source : 'listeMedecins.php'
                    });
                });
            </script>
                    
            <script src="js/General.js"></script>        
            <div class="blanc";   style="border-radius: 5px;">
                        <div class="myButton" id="Ajouter_liste">
                            <a href="Dossier_Medecin.php" class="myButton1"><img class="icone_ajouter" src="Icones/button_ajouter.png"> Ajouter Médecin</a>
                        </div><br>
                
                    <table cellspacing='0' id="tbl">   
                        <th></th>
                        <th>Civilité </th>
                        <th>Nom </th>
                        <th>Prénom </th>
                        <th>Email </th>
                        <th>Service</th>
                        <th>Téléphone</th>
                        <th>Ville</th>
                        <th></th>
                        <th></th>
                        
                        
                        
                        <?php

if(isset($_POST['saisie'])){
    $query = 'SELECT * FROM medecin WHERE nom_m LIKE :term';
    $term = $_POST['saisie'];
}
else{
    $query = 'SELECT * FROM medecin ';
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
                           <td><img class="icone_liste" src="Icones/medecin_bleu.png"width="50px" heigh="50px" alt="Photo de médecin" /></td>
                           <td><?php print_r($dnn['civilite_m']); ?></td>
                           <td><?php print_r($dnn['nom_m']); ?></td>
                           <td><?php print_r($dnn['prenom_m']); ?></td>
                           <td><?php print_r($dnn['mail_m']); ?></td>
                           <td><?php print_r($dnn['id_service']); ?></td>
                            <td><?php print_r($dnn['telephone_m']); ?></td>
                            <td><?php print_r($dnn['ville_m']); ?></td>
                            <td><a href="Dossier_Medecin_modif.php?idmedecin=<?php echo $dnn['id_medecin']; ?>"> <img class="supprimer" src="Icones/button_modifier.png"> </a></td>
                            <td><a href="./Interaction-BDD/SupprBDD_Medecin.php?idmedecin=<?php echo $dnn['id_medecin']; ?>"> <img class="supprimer" src="Icones/button_supprimer.png"> </a></td>
                        </tr>
                        
<?php
}
?>


                       <!-- <tr>
                           <td><img src="medecin.png"width="50px" heigh="50px" alt="Photo de médecin" /></td>
                           <td>Monsieur</td>
                           <td>Bardi</td>
                           <td>Luigi</td>
                           <td>luigi.bardi@gmail.com</td>
                           <td>Cardiologue</td>
                            <td>0988834944</td>
                            <td>Villeurbanne</td>
                            <td><a href="Dossier_Medecin_modif.html"> <img class="supprimer" src="loupe.png"> </a></td>
                            <td><img class="supprimer" src="button_supprimer.png"></td>
                        </tr>
                        <tr>
                            <td><img src="medecin.png" width="50px" heigh="50px" alt="Photo de patient"  /></td>
                            <td>Monsieur</td>
                           <td>Delabarre</td>
                           <td>Lucas</td>
                           <td>lucas.d@gmail.com</td>
                           <td>Généraliste</td>
                            <td>0788834944</td>
                            <td>Villeurbanne</td>
                            <td><img class="supprimer" src="loupe.png"></td>
                            <td><img class="supprimer" src="button_supprimer.png"></td>
                        </tr> -->
                    </table> 
                    
                     
            </div>
        </div>
        
    
    </div>
</body>
</html>
