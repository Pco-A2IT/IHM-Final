<?php
// Connexion à la base de données
include('../config.php');

    $service_m=$_POST['service_m'];
    echo "Le service rentré est ".$service_m;
    
    $centre_m=$_POST['centre_m'];
    echo "Le service rentré est ".$centre_m;

$req2 = $bdd->prepare('SELECT * FROM service WHERE centre_s = ? AND nom_s=? ');
$req2->execute(array($centre_m, $service_m));

if($centre_m!="" && $service_m!=""){
while ($donn = $req2->fetch()){
        $id_service=$donn['id_service'];
        
    }
}
else{
    $id_service=0;
}
echo "essai".$id_service;

$req = $bdd->prepare('INSERT INTO medecin(id_medecin,id_service, civilite_m, nom_m, prenom_m, mail_m, ville_m, codePostal_m, adresse_m, telephone_m) VALUES(NULL ,?, ?,?,?,?,?,?,?,?)');


$req->execute(array( $id_service, $_POST['civilite_m'], $_POST['nom_m'], $_POST['prenom_m'], $_POST['email_m'],  $_POST['ville_m'],  $_POST['codePostal_m'],$_POST['adresse_m'] ,$_POST['telephone_m']));



//


// Redirection du visiteur vers la page du minichat
//header('Location: ../Dossier_Medecin.php');
?>