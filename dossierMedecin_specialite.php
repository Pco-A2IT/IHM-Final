<?php

    ///////////////////
    /*Export des données pour l'autocomplétion de la spécialité des médecins dans le champ spécialité du dossier médecin ; appelé depuis la page Dossier_Medecin.php et Dossier_Medecin_modif.php*/
    ///////////////////

    include('config.php'); //connexion à la bdd
    $term = $_GET['term'];
    $requete = $bdd->prepare('SELECT specialite_m FROM medecin WHERE specialite_m LIKE :term'); 
    $requete->execute(array('term' => $term.'%')); // requête SQL : les nspécialités des médecins commençant par le terme saisi
    $array = array(); // création d'un tableau

    while($donnee = $requete->fetch(PDO::FETCH_ASSOC)) { // on effectue une boucle pour obtenir les données
        array_push($array, $donnee['specialite_m']); // on ajoute les données à notre tableau
    }
    echo json_encode($array); // on convertit le tableau en format json
?>