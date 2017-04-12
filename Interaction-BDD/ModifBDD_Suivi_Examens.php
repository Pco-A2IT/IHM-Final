<?php
// Connexion à la base de données
include('../config.php');

///////////////////////////
/*Récupération de l'id du service qu'on veut modifier via $_GET['idservice']*/
///////////////////////////
$name_checkbox=$_GET['name_checkbox'];
$id_patient=$_GET['id_patient'];
echo $id_patient;
$id_examen=$_GET['id_examen'];
if($name_checkbox==" 1 "){
    $name_checkbox="1";
}
///////////////////////////
/*Changement champ planfie table examen_patient*/
///////////////////////////
if(isset($_POST[$name_checkbox])){
    $bool="YES";
}
else{  
    $bool="NO";
}
echo $bool;

$req5 = $bdd->prepare(' UPDATE examen_patient SET effectue=?  WHERE id_patient=? and id_examen=? ');
$req5->execute(array($bool, $id_patient,$id_examen ));


///////////////////////////
/*Retour vers la liste_Patients*/
///////////////////////////


?>

<script>
    //top.location.href="../Prise_RDV.php?id_patient=<?php //echo $id_patient; ?>";
</script>