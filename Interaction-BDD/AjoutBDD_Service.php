<?php
// Connexion à la base de données
include('../config.php');

//

//Récupérer certaines données du formulaires
$ouv=$_POST['heured'].':'. $_POST['mind'].':'. '00';
$ferm=$_POST['heuref'].':'. $_POST['minf'].':'. '00';
$descr=$_POST['description_s'];
echo $descr;

// Insertion du message à l'aide d'une requête préparée
$req =$bdd->prepare('INSERT INTO Service(id_service, numSiret, centre_s,nom_s, telephone_s,horairesd_s, horairesf_s, adresse_s,codePostal_s,ville_s, description_s) VALUES(NULL, ? ,? , ?,?, ?,?,? ,?,?, ? )'); // ici le ? correspond à la valeur que l'on rentre dans le formulaire


$req->execute(array($_POST['siret_s'], $_POST['centre_s'],$_POST['service_s'], $_POST['telephone_s'], $ouv,$ferm, $_POST['adresse_s'], $_POST['codePostal_s'],$_POST['ville_s'], $_POST['description_s'] ));



// Redirection du visiteur vers la page du minichat
//header('Location: ../Dossier_Patient.php');
?>