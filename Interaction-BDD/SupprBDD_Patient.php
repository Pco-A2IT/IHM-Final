<?php
// Connexion à la base de données
include('../config.php');
///////////////////////////
/*Récupération de l'id du service qu'on veut modifier via $_GET['idservice']*/
///////////////////////////

$id_patient=$_GET['id_patient'];

///////////////////////////
/*Suppression du tuple correspondant*/
///////////////////////////
    
$req = $bdd->prepare('DELETE FROM patient WHERE id_patient = ? ');
$req->execute(array($id_patient));

///////////////////////////
/*Retour vers la liste_Patients*/
///////////////////////////

header('Location: ../Liste_Patients.php');

?>