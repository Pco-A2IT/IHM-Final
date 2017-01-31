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

//
//$reqmt = $bdd->exec('INSERT INTO medecin(id_medecin,nom_m, prenom_m, mail_m,telephone_m) VALUES(NULL,\'YES\',\'YES\',\'YES\',\'YES\')');

/*$reqmt = $bdd->prepare('INSERT INTO medecin(id_medecin,nom_m, prenom_m, mail_m,telephone_m) VALUES(NULL,?,?,?,?)');
$reqmt->execute(array($_POST['nom_mt'], $_POST['prenom_mt'], $_POST['email_mt'],  $_POST['telephone_mt']));

$id_medecin_trait=$bdd->lastInsertId();

$reqmu = $bdd->prepare('INSERT INTO medecin(id_medecin,nom_m, prenom_m, mail_m,telephone_m) VALUES(NULL,?,?,?,?)');
$reqmu->execute(array($_POST['nom_mu'], $_POST['prenom_mu'], $_POST['email_mu'],  $_POST['telephone_mu']));

$id_medecin_autre=$bdd->lastInsertId();*/

//On récupère la date de naissance dans l'html
$date= $_POST['birthday_p'];
echo $date;

//on explose la date de naissance
list($j,$m,$a)=explode("/",$date);
$date="$a-$m-$j";


// Insertion du message à l'aide d'une requête préparée
$req =$bdd->prepare('INSERT INTO Patient(id_patient, ID_medecin_traitant, ID_medecin_autre,nom_p, prenom_p,civilite_p,date_naissance,mail_p,telephone_p,ville_p,codePostal_p,adresse_p,date_creation_dossier) VALUES(NULL, 1111 ,1111 , ?,?,?,? ,?,?, ?, ?, ?,NOW() )'); // ici le ? correspond à la valeur que l'on rentre dans le formulaire

$req->execute(array($_POST['nom_p'], $_POST['prenom_p'],$_POST['civilite_p'] ,  $a.'-'. $m.'-'. $j, $_POST['mail_p'],$_POST['telephone_p'], $_POST['ville_p'],$_POST['codePostal_p'],$_POST['adresse_p']));



// Redirection du visiteur vers la page du minichat
//header('Location: Dossier_Patient.php');
?>