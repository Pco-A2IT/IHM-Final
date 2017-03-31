<?php

    ////////////////////////
    /* Export des données pour l'autocomplétion du nom des patients dans la barre de recherche de la liste des patients ; appelé depuis la page Liste_Patients.php */
    /////////////////////////

    include('config.php'); //connexion à la bdd
    $term = $_GET['term'];
    $requete = $bdd->prepare('SELECT * FROM patient WHERE nom_p LIKE :term');
    $requete->execute(array('term' => $term.'%')); //requête SQL : les noms de médecins commençant par le terme saisi
    $array = array(); // création d'un tableau
    $row = array();
    while($donnee = $requete->fetch(PDO::FETCH_ASSOC)) { // on effectue une boucle pour obtenir les données
        array_push($array, $donnee['nom_p']); // on ajoute les données à notre tableau
    }
    echo json_encode($array); //  on convertit le tableau en format json
?>

