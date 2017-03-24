<!-- Export des données pour l'autocomplétion des données du service ou centre d'examen dans le dossier médecin et le dossier médecin modifiable ; appelé depuis la page Dossier_medecin.php et Dossier_medecin_modif.php -->

<?php
    include('config.php'); // connexion à la bdd
    require_once('AutoCompletionNomService.php'); // nécessite le fichier mentionné

    $list = array(); // création d'un tableau
    
    $requete = $bdd->prepare('SELECT nom_s,centre_s,adresse_s,codePostal_s,ville_s FROM service WHERE nom_s LIKE :nom'); // requête SQL : on choisit les services dont le nom commence par le terme saisi
    $value = $_POST["nom"]."%"; //On dit que la valeur est celle envoyée par POST
    $requete->bindParam(":nom", $value, PDO::PARAM_STR);
    $requete->execute();

    $list = $requete->fetchAll(PDO::FETCH_CLASS, "AutoCompletionNomService");; // On affecte les valeurs récupérées dans la requête pour les affecter à $list

    echo json_encode($list); // on convertit le tableau en format json
?>