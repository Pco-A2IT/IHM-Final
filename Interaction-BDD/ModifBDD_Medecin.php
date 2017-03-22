<?php
// Connexion à la base de données
include('../config.php');

///////////////////////////
/*Récupération de l'id du service qu'on veut modifier via $_GET['idservice']*/
///////////////////////////

$id_medecin=$_GET['idmedecin'];
echo $id_medecin;

///////////////////////////
/*Récupération tuple correspondant dans la bdd*/
///////////////////////////
$req = $bdd->prepare('SELECT * FROM medecin WHERE id_medecin = ? ');
$req->execute(array($id_medecin));
while ($donnees = $req->fetch())
{   
    
    if($_POST['telephone_m']==''){$telephone_m= $donnees['telephone_m'];}
    else{$telephone_m=$_POST['telephone_m'];}
    echo $telephone_m;
    
    if($_POST['nom_m']==''){$nom_m= $donnees['nom_m'];}
    else{$nom_m=$_POST['nom_m'];}
    echo $nom_m;
    
    if($_POST['prenom_m']==''){$prenom_m= $donnees['prenom_m'];}
    else{$prenom_m=$_POST['prenom_m'];}
    echo $prenom_m;
    
    if($_POST['mail_m']==''){$mail_m= $donnees['mail_m'];}
    else{$mail_m=$_POST['mail_m'];}
    echo $mail_m;
    
    if($_POST['ville_m']==''){$ville_m= $donnees['ville_m'];}
    else{$ville_m=$_POST['ville_m'];}
    echo $ville_m;
    
    if($_POST['codePostal_m']==''){$codePostal_m= $donnees['codePostal_m'];}
    else{$codePostal_m=$_POST['codePostal_m'];}
    echo $codePostal_m;
    
    if($_POST['adresse_m']==''){$adresse_m= $donnees['adresse_m'];}
    else{$adresse_m=$_POST['adresse_m'];}
    echo $adresse_m;
    
    if($_POST['description_m']==''){$description_m= $donnees['description_m'];}
    else{$description_m=$_POST['description_m'];}
    echo $description_m;
    
    if($_POST['service_m']==''){$service_m= "";}
    else{$service_m=$_POST['service_m'];}
    echo "Le service rentré est ".$service_m;
    
    if($_POST['centre_m']==''){$centre_m= "";}
    else{$centre_m=$_POST['centre_m'];}
    echo "Le service rentré est ".$centre_m;
    
    $id_service=$donnees['id_service'];// on récupère l'id_service existant dans le tuple selectionné
}

////////////////////////////////////////////////////////////////////////////
/*      ID_service                                                        */
////////////////////////////////////////////////////////////////////////////

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
        $reqSer = $bdd->prepare('INSERT INTO Service(id_service, centre_s,nom_s, telephone_s,horairesd_s, horairesf_s, adresse_s,codePostal_s,ville_s, description_s) VALUES(NULL, \'NC\' ,? , ?,\'NC\', \'00:00\',\' 00:00\',\'NC\' ,\'NC\',\'NC\',\'NC\' )');
        $reqSer->execute(array($centre_m, $service_m));
        //$id_medecin_traitant est celui du medecin qu'on vient de créer
        $id_service=$bdd->lastInsertId();
    }
}
$req->closeCursor();

//////////////////////////////////////
/*Changement dans la base de données*/
//////////////////////////////////////


$req = $bdd->prepare('UPDATE medecin SET  id_service= :nv_id_service, telephone_m= :nv_telephone_m, nom_m= :nv_nom_m, prenom_m= :nv_prenom_m, mail_m= :nv_mail_m, adresse_m = :nv_adresse_m, codePostal_m = :nv_codePostal_m, ville_m = :nv_ville_m, description_m= :nv_description_m WHERE id_medecin = :jointure ');
$req->execute(array(
    'nv_id_service' => $id_service,
    'nv_telephone_m' => $telephone_m,
    'nv_nom_m' => $nom_m,
    'nv_prenom_m' => $prenom_m,
    'nv_mail_m' => $mail_m,
    'nv_adresse_m' => $adresse_m,
    'nv_codePostal_m' => $codePostal_m,
    'nv_ville_m' => $ville_m,
    'nv_description_m' => $description_m,
	':jointure' => $id_medecin
	));

///////////////////////////
/*Retour vers la liste_patient*/
///////////////////////////

header('Location: ../Liste_Medecins.php');

?>