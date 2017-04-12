<?php

    //////////////////
    /* Réalise la connexion avec la BDD. Affiche un message d’erreur si la connexion est impossible. Fichier appelé depuis toutes les pages en lien avec la BDD*/
    ////////////////////

    try {
        $bdd = new PDO('mysql:host=localhost;dbname=bdd_plateforme;charset=utf8', 'root', '');

        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }
    catch(Exception $e) {
        die('Erreur : '.$e->getMessage());
    }

?>