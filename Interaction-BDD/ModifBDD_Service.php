<?php
// Connexion à la base de données
include('../config.php');
///////////////////////////
/*Récupération de l'id du service qu'on veut modifier via $_GET['idservice']*/
///////////////////////////

$idservice=$_GET['idservice'];

///////////////////////////
/*Récupération tuple correspondant dans la bdd*/
///////////////////////////
$req = $bdd->prepare('SELECT * FROM service WHERE id_service = ? ');
$req->execute(array($idservice));
while ($donnees = $req->fetch())
{       
    if($_POST['centre_s']==''){$centre_s= $donnees['centre_s'];}
    else{$centre_s=$_POST['centre_s'];}
    
    if($_POST['telephone_s']==''){$telephone_s= $donnees['telephone_s'];}
    else{$telephone_s=$_POST['telephone_s'];}
    
    if($_POST['adresse_s']==''){$adresse_s= $donnees['adresse_s'];}
    else{$adresse_s=$_POST['adresse_s'];}
    
    if($_POST['codePostal_s']==''){$codePostal_s= $donnees['codePostal_s'];}
    else{$codePostal_s=$_POST['codePostal_s'];}
    
    if($_POST['ville_s']==''){$ville_s= $donnees['ville_s'];}
    else{$ville_s=$_POST['ville_s'];}
    
    if($_POST['description_s']==''){$description_s= $donnees['description_s'];}
    else{$description_s=$_POST['description_s'];}
    
    
    
}

///////////////////////////
/*Changement dans la base de données*/
///////////////////////////


$req1 = $bdd->prepare('UPDATE service SET centre_s = :nv_centre_s, telephone_s= :nv_telephone_s, horairesd_s= :nv_horairesd_s, horairesf_s= :nv_horairesf_s, adresse_s = :nv_adresse_s, codePostal_s = :nv_codePostal_s, ville_s = :nv_ville_s, description_s= :nv_description_s WHERE id_service = :jointure');
$req1->execute(array(
    'nv_centre_s' => $centre_s,
    'nv_telephone_s' => $telephone_s,
    'nv_horairesd_s' => $_POST['heured'],
    'nv_horairesf_s' => $_POST['heuref'],
    'nv_adresse_s' => $adresse_s,
    'nv_codePostal_s' => $codePostal_s,
    'nv_ville_s' => $ville_s,
    ':nv_description_s'=> $description_s,
	':jointure' => $idservice
    
	));

///////////////////////////
/*Retour vers le dossier service avec modification prise en compte*/
///////////////////////////

//header('Location: ../Dossier_Service_modif_Examens.php');

?>

<script>
    top.location.href="../Dossier_Service_modif_Examens.php?idservice=<?php echo $idservice; ?>";
</script>