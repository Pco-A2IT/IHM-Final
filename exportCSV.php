<?php 
// connexion à la base des données :  
include('config.php'); 
 
// on indique au navigateur qu'on va exporter un CSV 
header('Content-Type: text/csv'); 
header('Content-Disposition: attachment;filename='.$_GET['patient'].'patient.csv');  
 
// selection de la table à exporter 
$select_table = mysql_query('select * from '.$_GET['patient']); 
$rows = mysql_fetch_assoc($select_table); 
 
if($rows) { 
  makecsv(array_keys($rows)); 
} 
 
while($rows) { 
  makecsv($rows); 
  $rows = mysql_fetch_assoc($select_table);  
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