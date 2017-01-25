<?php
// Connexion à la base de données
include('config.php');
///////////////////////////
/*Récupération de l'id du service qu'on veut modifier via $_GET['idservice']*/
///////////////////////////

$id_medecin=$_GET['idmedecin'];
echo $id_medecin;

///////////////////////////
/*Suppression du tuple correspondant*/
///////////////////////////
    
$req = $bdd->prepare('DELETE FROM medecin WHERE id_medecin = ? ');
$req->execute(array($id_medecin));

///////////////////////////
/*Retour vers la liste_Patients*/
///////////////////////////

header('Location: Liste_Services.php');

?>