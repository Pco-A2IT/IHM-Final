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
                <h4>Outils</h4>
                <img class="icone_menu" src="Icones/parametres_blanc.png"/>      
            </div>
         
            
            <div class="titre";   style="border-radius: 5px;">
                <h1 class="titreGauche">Médecins</h1>
                
            </div>
            
            <script type="text/javascript">
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
                            <a href="Dossier_Medecin.php" class="myButton1">Ajouter Médecin</a>
                        </div>  
                <br>
                <br>
                <br>
                <form id="recherche" method="post" class="recherche">

                        <input name="saisie" id="saisie" type="text" placeholder="Rechercher médecin..."  />
                        <input class="loupe" type="submit" value="" />
                        <input  type="submit"  value="Afficher liste complète" >

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
                        <th></th>
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
                           <td><?php print_r($dnn['nom_m']); ?></td>
                           <td><?php print_r($dnn['prenom_m']); ?></td>
                           <td><?php print_r($dnn['mail_m']); ?></td>
                            <td><?php print_r($dnn['telephone_m']); ?></td>
                            <td><?php print_r($dnn['ville_m']); ?></td>
                            <td><a href="Dossier_Medecin_modif.php?idmedecin=<?php echo $dnn['id_medecin']; ?>"> <img class="supprimer" src="Icones/button_modifier.png"> </a></td>
                            <td><a href="./Interaction-BDD/SupprBDD_Medecin.php?idmedecin=<?php echo $dnn['id_medecin']; ?>" onclick="return sure();"> <img class="supprimer" src="Icones/button_supprimer.png"> </a></td>
                        </tr>
                        
<?php
}
?>

<!--La fonction qui permet de demander une confirmation lors de la demande de suppression-->     
<script> 
function sure()
    {return(confirm('Etes-vous sûr de vouloir supprimer ce Medecin ?'));}
</script>  


                    </table> 
                    
                </div>
                </div>
            </div>
        </div>
        
    
    </div>
</body>
</html>
