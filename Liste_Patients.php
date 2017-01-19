<?php
   include('config.php');
?>
<html>
<head>
    <meta charset="UTF-8">
    <link href="CSS.css"type="text/css"rel="stylesheet"/> 
    <link href="CSS.css"type="text/css"rel="stylesheet"/> 
     <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> 
        <!--inclusion CSS pour autocompletion-->
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
            <div id="menu1" class="carreGris" ;>
                <h4>Suivi</h4>
                <img class="icone_calendrier" src="recapitulatif.png"/>
            </div>
            
            <div id="menu2" class="carreGris";>
                <h4>Services</h4>
                <img class="icone_hopital" src="hopital.PNG"/>
            </div>
                
            <div id="menu3" class="carreGris" style="background-color:#1270B3";>
                <h4>Patients</h4>    
                <img class="icone_patient" src="icone_bonhomme.png"/>
            </div> 
            <div id="menu4" class="carreGris";>
                <h4>Médecins</h4>    
                <img class="icone_patient" src="icone_bonhomme.png"/>
            </div> 
            
            
            <div class="titre";   style="border-radius: 5px;">
                <h1 class="titreGauche">Patients</h1>
                 <form id="recherche" method="post">

                    <input name="saisie" id="saisie" type="text" placeholder="Rechercher patient..." required />
                    <input class="loupe" type="submit" value="" />

                    </form>   
                
            </div>
            <script>
                //utilisation de jQuery :
                $(function($)   {
                    $('#saisie').autocomplete({
                        source : 'listePatients.php'
                    });
                });
            </script>    
            
            <script src="General.js"></script>
            <div class="blanc";   style="border-radius: 5px;">
                <div class="myButton">
                            <a href="Dossier_Patient.html" class="myButton1"><img class="icone_ajouter" src="ajouter.png"> Ajouter Patient</a>
                        </div>
                <div class="section1">
                    <table cellspacing='0'>   
                        <th>Fiche</th>
                        <th>Nom </th>
                        <th>Prénom </th>
                        <th>Date de naissance </th>
                        <th>Code postal </th>
                        <th>Ville </th>
                        <th>Téléphone </th>
                        <th>Médecin traitant </th>
                        
                         
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
?><tr>
                           <td><img src="patient.png" width="50px" heigh="50px" alt="Photo de patient" /></td>
                           <td><?php print_r($dnn['nom_p']); ?></td>
                           <td><?php print_r($dnn['prenom_p']); ?></td>
                           <td><?php print_r($dnn['date_naissance']); ?></td>
                           <td><?php print_r($dnn['codePostal_p']); ?></td>
                           <td><?php print_r($dnn['ville_p']); ?></td>
                           <td><?php print_r($dnn['telephone_p']); ?></td>
                            <td><a href="Dossier_Medecin_modif.html">Luigi Bardi</a></td>
                            
                           <td><a href="Dossier_Patient.html"> <img class="supprimer" src="loupe.png"> </a></td>
                            <td><img class="supprimer" src="button_supprimer.png"></td>
                        </tr>
                        
                                                
<?php
}
?>

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
</body>
</html>