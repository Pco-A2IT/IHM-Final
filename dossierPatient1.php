<?php
    include('config.php');


$term = $_GET['term'];

$requete = $bdd->prepare('SELECT * FROM medecin WHERE prenom_m LIKE :term'); // j'effectue ma requête SQL grâce au mot-clé LIKE
$requete->execute(array('term' => $term.'%'));

$array = array(); // on créé le tableau

while($donnee = $requete->fetch(PDO::FETCH_ASSOC)) // on effectue une boucle pour obtenir les données
{
    array_push($array, $donnee['prenom_m']); // et on ajoute celles-ci à notre tableau

}


echo json_encode($array); // il n'y a plus qu'à convertir en JSON

?>