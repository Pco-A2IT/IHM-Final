<?php
   include('config.php');
?>

<html>
<head>
    <meta charset="UTF-8">
    <link href="CSS.css"type="text/css"rel="stylesheet"/> 
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> 
        <!--inclusion CSS pour autocompletion-->
    <title>Liste Médecins</title>
</head>
<body>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <!-- inclusion de jQuery et jQuery.ui-->
    <div class="gris">
        
                <div  class="gris2">
             <div id="menu0" class="carreGris" ;>
                <h4>Logout</h4>
                <br>
                <a href="index.html"><img class="icone_hopital" src="logout.png"/></a>
            </div> 
            <div id="menu1" class="carreGris";>
                <h4>Suivi</h4>
                <img class="icone_calendrier" src="recapitulatif.png"/>
            </div>
            
            <div id="menu2" class="carreGris";>
                <h4>Services</h4>
                <img class="icone_hopital" src="hopital.PNG"/>
            </div>
                
            <div id="menu3" class="carreGris";>
                <h4>Patients</h4>    
                <img class="icone_patient" src="icone_bonhomme.png"/>
            </div> 
            <div id="menu4" class="carreGris" style="background-color:#1270B3";>
                <h4>Médecins</h4>    
                <img class="icone_patient" src="icone_bonhomme.png"/>
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
                    
            <script src="General.js"></script>        
            <div class="blanc";   style="border-radius: 5px;">
                        <div class="myButton">
                            <a href="Dossier_Medecin.html" class="myButton1"><img class="icone_ajouter" src="ajouter.png"> Ajouter Médecin</a>
                        </div>
                
                
                <div class="section1">
                    <table cellspacing='0'>   
                        <th></th>
                        <th>Civilié </th>
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
                           <td><img src="medecin.png"width="50px" heigh="50px" alt="Photo de médecin" /></td>
                           <td><?php print_r($dnn['civilite_m']); ?></td>
                           <td><?php print_r($dnn['nom_m']); ?></td>
                           <td><?php print_r($dnn['prenom_m']); ?></td>
                           <td><?php print_r($dnn['mail_m']); ?></td>
                           <td><?php print_r($dnn['id_service']); ?></td>
                            <td><?php print_r($dnn['telephone_m']); ?></td>
                            <td><?php print_r($dnn['ville_m']); ?></td>
                            <td><a href="Dossier_Medecin_modif.html"> <img class="supprimer" src="loupe.png"> </a></td>
                            <td><img class="supprimer" src="button_supprimer.png"></td>
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
        
    
    </div>
</body>
</html>
