<?php
// Connexion à la base de données
include('../config.php');
///////////////////////////
/*Récupération de l'id du service qu'on veut modifier via $_GET['idservice']*/
///////////////////////////

$id_examen=$_GET['idexamen'];



    
$req3=$bdd->prepare('SELECT typeExamen FROM Examen WHERE id_examen = ? ');
$req3->execute(array($id_examen));

while($dnn = $req3->fetch()){
    $req2 = $bdd->prepare("ALTER TABLE Service DROP `".$dnn['typeExamen']."`");
    $req2->execute();
}

///////////////////////////////////////////////
/*Suppression de l'enregistrement selectionne*/
///////////////////////////////////////////////
$req = $bdd->prepare('DELETE FROM Examen WHERE id_examen = ? ');
$req->execute(array($id_examen));


header('Location: ../Liste_Examens.php');

?>