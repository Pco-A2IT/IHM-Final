<?php
// Connexion à la base de données
include('../config.php');

  
///////////////////////////////////
/*Récupération des champs formulaires*/
///////////////////////////////////

if($_POST['nom_m']==""){
    $nom_m="NC";
}
else{
    $nom_m=$_POST['nom_m'];
}

if($_POST['prenom_m']==""){
    $prenom_m="NC";
}
else{
    $prenom_m=$_POST['prenom_m'];
}

if($_POST['email_m']==""){
    $email_m="NC";
}
else{
    $email_m=$_POST['email_m'];
}

if($_POST['ville_m']==""){
    $ville_m="NC";
}
else{
    $ville_m=$_POST['ville_m'];
}

if($_POST['codePostal_m']==""){
    $codePostal_m="NC";
}
else{
    $codePostal_m=$_POST['codePostal_m'];
}

if($_POST['adresse_m']==""){
    $adresse_m="NC";
}
else{
    $adresse_m=$_POST['adresse_m'];
}

if($_POST['telephone_m']==""){
    $telephone_m="NC";
}
else{
    $telephone_m=$_POST['telephone_m'];
}

if($_POST['description_m']==""){
    $description_m="NC";
}
else{
    $description_m=$_POST['description_m'];
}

///////////////////////////////////
/*Récupération des champs service et centre*/
///////////////////////////////////

  $service_m=$_POST['service_m'];
    echo "Le service rentré est ".$service_m;
    
  $centre_m=$_POST['centre_m'];
    echo "Le service rentré est ".$centre_m;


///////////////////////////////////////////////////////////////////////////////////////
/*      ID_service                                                                   */
///////////////////////////////////////////////////////////////////////////////////////

//On prend dans 'service' l'éventuel tuple qui correspond au service et centre rentré dans le formulaire
$req2 = $bdd->prepare('SELECT * FROM service WHERE nom_s = ? AND centre_s=? ');
$req2->execute(array($service_m, $centre_m));
//Si on a rempli les champs service
if($service_m!="" && $centre_m!="" ){
$test=false;
//il faut trouver l'id du service correspond
    while ($donn = $req2->fetch()){
        //on regarde si le service existe déjà dans la bdd
        if($service_m==$donn['nom_s'] && $centre_m==$donn['centre_s']){
            $test=true;
            if($test==true){
                echo "olaaaaa";
                $id_service=$donn['id_service'];
            }
        }
    }
    //s'il n'existe pas on le crée en renseignant juste le minimum
    if($test!=true){
        $reqSer = $bdd->prepare('INSERT INTO Service(id_service, centre_s,nom_s, telephone_s,horairesd_s, horairesf_s, adresse_s,codePostal_s,ville_s, description_s) VALUES(NULL ,? , ?,\'NC\', \'00:00\',\' 00:00\',\'NC\' ,\'NC\',\'NC\',\'NC\' )');
        $reqSer->execute(array($centre_m, $service_m));
        //$id_medecin_traitant est celui du medecin qu'on vient de créer
        $id_service=$bdd->lastInsertId();
    }
}
//Si on n'a pas rempli les champs medecin on met l'id medecin traitant à 0 pour pas qu'il y ai de pb dans la bdd
else{
    $id_service=0;
}

 
    
/*
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

*/

$req = $bdd->prepare('INSERT INTO medecin(id_medecin,id_service, nom_m, prenom_m, mail_m, ville_m, codePostal_m, adresse_m, telephone_m, description_m) VALUES(NULL ,?, ?,?,?,?,?,?,?, ?)');


$req->execute(array( $id_service, $nom_m, $prenom_m, $email_m,  $ville_m,  $codePostal_m, $adresse_m ,$telephone_m, $description_m));



//


// Redirection du visiteur vers la page du minichat
header('Location: ../Liste_Medecins.php');
?>