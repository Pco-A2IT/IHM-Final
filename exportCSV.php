<?php 
// connexion à la base des données :  
include('config.php'); 
 
// on indique au navigateur qu'on va exporter un CSV 
header('Content-Type: text/csv'); 
header('Content-Disposition: attachment;filename=bdd_plateforme.csv');  
 
// selection de la table à exporter 
$select_table = $bdd->prepare('select * from patient' /*.$_GET['patient']*/); 
$rows = $select_table->fetch(PDO::FETCH_ASSOC); 
 
if($rows) { 
  makecsv(array_keys($rows)); 
} 
 
while($rows) { 
  makecsv($rows); 
  $rows = $select_table->fetch(PDO::FETCH_ASSOC);  
} 
 
// la fonction magique 
function makecsv($num_field_names) { 
  $separate = ''; 
   
  // on formate les données pour remplacer les séparateurs par des traits d'union 
  foreach ($num_field_names as $field_name) { 
    $field_name = str_replace( array('<br>', '<br />', "n", "r", ",", ";"), array( '-', '-', '-', '-', '-', '-'), $field_name); 
    echo $separate . $field_name;
     
    // on insère un séparateur de champ reconnu par Excel (si ça ne marche pas, essayez avec une virgule) 
    $separate = ';'; 
  } 
     
  // nouvelle rangée, nouvelle ligne 
  echo "\rn"; 
} 
?>
