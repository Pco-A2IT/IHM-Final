<?php

    ////////////////
    /*Export des données pour l'autocomplétion du nom des services/centres d'examens dans la barre de recherche de la liste des examens ; appelé depuis la page Liste_Examens.php */
    //////////////////

    include('config.php'); //connexion à la bdd
    $term = $_GET['term'];
    $requete = $bdd->prepare('SELECT * FROM service WHERE nom_s LIKE :term'); 
    $requete->execute(array('term' => $term.'%')); //requête SQL : les noms de examens commençant par le terme saisi
    $array = array(); // création d'un tableau
    while($donnee = $requete->fetch(PDO::FETCH_ASSOC)) { // on effectue une boucle pour obtenir les données
        array_push($array, $donnee['nom_s']); // on ajoute les données à notre tableau
    }
    echo json_encode($array); // il n'y a plus qu'à convertir en JSON
?>