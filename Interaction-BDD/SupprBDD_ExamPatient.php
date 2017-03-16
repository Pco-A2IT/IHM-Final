<?php
// Connexion à la base de données
include('../config.php');

///////////////////////////
/*Récupération de l'id du service qu'on veut modifier via $_GET['idservice']*/
///////////////////////////

$id_patient=$_GET['id_patient'];
echo $id_patient;

$id_examen=$_GET['id_examen'];
echo $id_examen;

///////////////////////////
/*Suppression du tuple correspondant*/
///////////////////////////
    
$req = $bdd->prepare('DELETE FROM Examen_patient WHERE id_patient = ? AND id_examen=?  ');
$req->execute(array($id_patient, $id_examen));

///////////////////////////
/*Retour vers la liste_Patients*/
///////////////////////////

//header('Location: ../Liste_Patients.php');

?>
<script>
    top.location.href="../Dossier_Patient_modif.php?id_patient=<?php echo $id_patient; ?>";
</script>