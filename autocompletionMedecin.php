<?php

    ////////////////////////
    /* Export des données pour l'autocomplétion du nom des médecins dans le dossier patient et le dossier patient modifiable ; appelé depuis la page Dossier_patient.php et Dossier_patient_modif.php Cette page est liée à autoCompletionNomMedecin.php et ne peut fonctionner sans.*/
    ////////////////////////

    include('config.php'); //connexion à la bdd
    require_once('AutoCompletionNomMedecin.php'); //nécessite le fichier mentionné

    $list = array(); // création d'un tableau

    $requete = $bdd->prepare('SELECT nom_m,prenom_m,mail_m,ville_m FROM medecin WHERE nom_m LIKE :nom'); // requête SQL : on choisit les médecins dont le nom commence par le terme saisi
    $value = $_POST["nom"]."%"; //La terme est celui envoyé par POST
    $requete->bindParam(":nom", $value, PDO::PARAM_STR);
    $requete->execute();

    $list = $requete->fetchAll(PDO::FETCH_CLASS, "AutoCompletionNomMedecin");; // On affecte les valeurs récupérées dans la requête pour les affecter à $list

    echo json_encode($list); // on convertit le tableau en format json
?>