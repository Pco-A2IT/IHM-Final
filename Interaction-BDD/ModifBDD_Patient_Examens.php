<?php
// Connexion à la base de données
include('../config.php');

///////////////////////////
/*Récupération de l'id du service qu'on veut modifier via $_GET['idservice']*/
///////////////////////////

$id_patient=$_GET['id_patient'];

///////////////////////////
/*Changement champ planfie table examen_patient*/
///////////////////////////

$req4 = $bdd->prepare('SELECT * FROM examen');
$req4->execute();

$cmpt=1;
while ($donn4 = $req4->fetch()){
  
if(isset($_POST[$cmpt])){
    echo "yes marche";
    $bool="YES";
}
else{  
    $bool="NO";
}
echo $bool;
echo $id_patient;
echo $donn4['id_examen'];
    
$req5 = $bdd->prepare(' UPDATE examen_patient SET effectue=?  WHERE id_patient=? and id_examen=? ');
$req5->execute(array($bool, $id_patient, $donn4['id_examen'] ));
    
$cmpt=$cmpt+1;
    
}


///////////////////////////
/*Retour vers la liste_Patients*/
///////////////////////////


?>

<script>
    top.location.href="../Dossier_Patient_modif_Examens.php?id_patient=<?php echo $id_patient; ?>";
</script>