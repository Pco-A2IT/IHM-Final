<?php
// Connexion à la base de données
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=bdd_plateforme;charset=utf8', 'root', '');

}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());

}

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
    
    if($_POST['num_adeli_m']==''){$num_adeli_m= $donnees['num_adeli_m'];}//s'il ne l'est pas la variable prend la valeur déjà existante dans la bdd
    else{$num_adeli_m=$_POST['num_adeli_m'];}//si le champ est rempli on modifie la bdd
    
    if($_POST['civilite_m']==''){$civilite_m= $donnees['civilite_m'];}
    else{$civilite_m=$_POST['civilite_m'];}
    echo $civilite_m;
    
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
    
    if($_POST['service_m']==''){$service_m= "";}
    else{$service_m=$_POST['service_m'];}
    echo $service_m;
    
    if($_POST['centre_m']==''){$centre_m= "";}
    else{$centre_m=$_POST['centre_m'];}
    echo $centre_m;
}

$req2 = $bdd->prepare('SELECT * FROM service WHERE centre_s = ? AND nom_s=? ');
$req2->execute(array($centre_m, $service_m));

if($centre_m!="" && $service_m!=""){
while ($donn = $req2->fetch()){
        $id_service=$donn['id_service'];
        echo $id_service;
    }
}
else{
    $id_service=$donnees['id_service'];
}
$req->closeCursor();

///////////////////////////
/*Changement dans la base de données*/
///////////////////////////


$req = $bdd->prepare('UPDATE medecin SET num_adeli_m=:nv_num_adeli_m , id_service= :nv_id_service, telephone_m= :nv_telephone_m, civilite_m= :nv_civilite_m, nom_m= :nv_nom_m, prenom_m= :nv_prenom_m, mail_m= :nv_mail_m, adresse_m = :nv_adresse_m, codePostal_m = :nv_codePostal_m, ville_m = :nv_ville_m WHERE id_medecin = :jointure ');
$req->execute(array(
	'nv_num_adeli_m' => $num_adeli_m,
    'nv_id_service' => $id_service,
    'nv_telephone_m' => $telephone_m,
    'nv_civilite_m' => $civilite_m,
    'nv_nom_m' => $nom_m,
    'nv_prenom_m' => $prenom_m,
    'nv_mail_m' => $mail_m,
    'nv_adresse_m' => $adresse_m,
    'nv_codePostal_m' => $codePostal_m,
    'nv_ville_m' => $ville_m,
	':jointure' => $id_medecin
	));

///////////////////////////
/*Retour vers la liste_Service*/
///////////////////////////

//header('Location: Liste_Medecins.php');

?>