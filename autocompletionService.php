<?php
require_once('AutoCompletionNomService.php');
 
//Initialisation de la liste
$list = array();
//Connexion MySQL
include('config.php');
 
//Construction de la requete
$requete = $bdd->prepare('SELECT nom_s,centre_s,adresse_s,codePostal_s,ville_s FROM service WHERE nom_s LIKE :nom'); // j'effectue ma requête SQL grâce au mot-clé LIKE
//On dit que la valeur est celle envoyée par POST
$value = $_POST["nom"]."%";
$requete->bindParam(":nom", $value, PDO::PARAM_STR);
$requete->execute();
 
// On affecte les valeurs récupérées dans la requête pour les affecter à $list
$list = $requete->fetchAll(PDO::FETCH_CLASS, "AutoCompletionNomService");;
 
// On encode les résulats ($list) en JSON et on les renvoie à notre page désirant l'autocomplétion
echo json_encode($list);
?>