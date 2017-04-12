<!-- Realise la connexion avec la base de donnees.
A la difference de config.php, on considere les lignes de la BDD comme des objets.
Utilise pour l'authentification -->

<?php
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=bdd_plateforme;charset=utf8', 'root', ''); //connexion a la bdd

        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //configuration de la recuperation des erreurs

        $bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ); //les lignes de la bdd sont traitees comme des objets
    }
    catch(Exception $e) {
        die('Erreur : '.$e->getMessage());
    }
 
?>