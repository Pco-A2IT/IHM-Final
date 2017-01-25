<?php
// Connexion à la base de données
include('../config.php');

$req = $bdd->prepare('INSERT INTO medecin(id_medecin, num_adeli_m ,id_service, civilite_m, nom_m, prenom_m, mail_m, ville_m, codePostal_m, adresse_m, telephone_m) VALUES(NULL, ? ,111, ?,?,?,?,?,?,?,?)');



//$req = $bdd->exec('INSERT INTO medecin(id_medecin,num_adeli_m,id_service, civilite_m, nom_m, prenom_m, mail_m, ville_m, codePostal_m, adresse_m, telephone_m) VALUES(NULL, ?,1111, ?,?,?,?,?,?,? ,?)');

$req->execute(array($_POST['num_adeli_m'], $_POST['civilite_m'], $_POST['nom_m'], $_POST['prenom_m'], $_POST['email_m'],  $_POST['ville_m'],  $_POST['codePostal_m'],$_POST['adresse_m'] ,$_POST['telephone_m']));



//


// Redirection du visiteur vers la page du minichat
//header('Location: ../Dossier_Medecin.php');
?>