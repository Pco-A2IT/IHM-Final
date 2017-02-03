<?php
// Connexion à la base de données
include('../config.php');

///////////////////////////
/*Récupération des horaires ouvertures*/
///////////////////////////

if($_POST['heured']=="" && $_POST['mind']==""){//si aucun champ n'est rempli on met une vaeur par défaut
        $horairesd_s= "00:00:00";
}
else{// si les deux champs sont remplis on les récupère
    $horairesd_s=$_POST['heured'].':'. $_POST['mind'].':'. '00';
}
///////////////////////////////////////
/*Récupération des horaires fermetures*/
////////////////////////////////////////
if($_POST['heuref']=="" && $_POST['minf']==""){
    $horairesf_s= "00:00:00";
}
else{
    $horairesf_s=$_POST['heuref'].':'. $_POST['minf'].':'. '00';
}

$descr="A changer la description";
echo $descr;

// Insertion du message à l'aide d'une requête préparée
$req =$bdd->prepare('INSERT INTO Service(id_service, numSiret, centre_s,nom_s, telephone_s,horairesd_s, horairesf_s, adresse_s,codePostal_s,ville_s, description_s) VALUES(NULL, ? ,? , ?,?, ?,?,? ,?,?, ? )'); // ici le ? correspond à la valeur que l'on rentre dans le formulaire


$req->execute(array($_POST['siret_s'], $_POST['centre_s'],$_POST['service_s'], $_POST['telephone_s'], $horairesd_s,$horairesf_s, $_POST['adresse_s'], $_POST['codePostal_s'],$_POST['ville_s'], $descr));



// Redirection du visiteur vers la page du minichat
header('Location: ../Liste_Services.php');
?>