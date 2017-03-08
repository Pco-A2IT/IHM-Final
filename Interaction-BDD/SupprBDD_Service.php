<?php
// Connexion à la base de données
include('../config.php');
///////////////////////////
/*Récupération de l'id du service qu'on veut modifier via $_GET['idservice']*/
///////////////////////////

$idservice=$_GET['idservice'];
echo $idservice;

///////////////////////////
/*Suppression du tuple correspondant*/
///////////////////////////
    
$req = $bdd->prepare('DELETE FROM service WHERE id_service = ? ');
$req->execute(array($idservice));

/////////////////////////////////
/*Retour vers la liste_Patients*/
/////////////////////////////////

header('Location: ../Liste_Services.php');

?>