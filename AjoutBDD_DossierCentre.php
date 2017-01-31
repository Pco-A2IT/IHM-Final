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

$req = $bdd->prepare('INSERT INTO CentreSante(num_siret,num_telephone,heure_ouverture,heure_fermeture,adresse,hcl,presence_scan_cerebral,presence_angioscan,presence_scan_bilan_biologique,presence_scan_bilan_cardiaque,presence_neurologue     ) VALUES(1,?,?,?,?,?,FALSE,FALSE,FALSE,FALSE,FALSE)'
// ici le ? correspond à la valeur que l'on rentre dans le formulaire, les examens sont false par défault
)



// Redirection du visiteur vers la page du minichat
header('Location: Dossier_Centre.php');


?>
