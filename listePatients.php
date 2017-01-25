<?php

 include('config.php');

$term = $_GET['term'];

$requete = $bdd->prepare('SELECT * FROM patient WHERE nom_p LIKE :term'); // j'effectue ma requête SQL grâce au mot-clé LIKE
$requete->execute(array('term' => $term.'%'));

$array = array(); // on créé le tableau
$row = array();

while($donnee = $requete->fetch(PDO::FETCH_ASSOC)) // on effectue une boucle pour obtenir les données
{
  //  if (stripos($donnee[''], $_GET['term']) === 0) {
    $concat = $donnee['nom_p'] . " " . $donnee['prenom_p'];
    array_push($array, $concat);
   // et on ajoute celles-ci à notre tableau
   // $concat=($array . $row)
   // }
}


echo json_encode($array); // il n'y a plus qu'à convertir en JSON

?>