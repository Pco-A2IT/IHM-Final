<?php

  try
        {
	       $bdd = new PDO('mysql:host=localhost;dbname=bdd_plateforme;charset=utf8', 'root', '');
        }
    catch(Exception $e)
        {
    die('Erreur : '.$e->getMessage());
        }

$term = $_GET['term'];

$requete = $bdd->prepare('SELECT * FROM service WHERE numSiret LIKE :term'); // j'effectue ma requête SQL grâce au mot-clé LIKE
$requete->execute(array('term' => $term.'%'));

$array = array(); // on créé le tableau

while($donnee = $requete->fetch(PDO::FETCH_ASSOC)) // on effectue une boucle pour obtenir les données
{
    array_push($array, $donnee['numSiret']); // et on ajoute celles-ci à notre tableau

}

echo json_encode($array); // il n'y a plus qu'à convertir en JSON

?>