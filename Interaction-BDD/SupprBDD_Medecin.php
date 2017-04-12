<?php
// Connexion à la base de données
include('../config.php');
///////////////////////////
/*Récupération de l'id du service qu'on veut modifier via $_GET['idservice']*/
///////////////////////////

$id_medecin=$_GET['idmedecin'];

///////////////////////////
/*Suppression du tuple correspondant*/
///////////////////////////
    
$req = $bdd->prepare('DELETE FROM medecin WHERE id_medecin = ? ');
$req->execute(array($id_medecin));

///////////////////////////
/*Changement médecin ID_medecin supprimé dans table patient*/
///////////////////////////

$req1 = $bdd->prepare('SELECT * FROM patient WHERE ID_medecin_traitant = ? OR ID_medecin_autre= ? ');
$req1->execute(array($id_medecin,$id_medecin, ));
while($donnee= $req1->fetch()){
    if($donnee['ID_medecin_traitant']==$id_medecin){
        $req2 = $bdd->prepare('UPDATE patient SET ID_medecin_traitant= ? WHERE id_patient = ? ');
        $req2->execute(array(0, $donnee['id_patient']));
    }
    if($donnee['ID_medecin_autre']==$id_medecin){
        $req2 = $bdd->prepare('UPDATE patient SET ID_medecin_autre= ? WHERE id_patient = ? ');
        $req2->execute(array(0, $donnee['id_patient']));
    }
}



///////////////////////////
/*Retour vers la liste_Patients*/
///////////////////////////

header('Location: ../Liste_Medecins.php');

?>