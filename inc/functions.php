<!-- Fonctions utilisees dans le cadre de l'authentification -->

<?php

/* affichage des erreurs pour la programmation */
function debug($variable){
    echo '<pre>' . print_r($variable, true) . '</pre>';
}

/* generation d'un token aleatoire */
function str_random($length){
    $alphabet = "0123456789azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN";
    return substr(str_shuffle(str_repeat($alphabet, $length)), 0, $length);
}

/* verifier que la personne est connectee*/
function logged_only(){
    if(session_status() == PHP_SESSION_NONE){
    session_start();
    }
    
    if(!isset($_SESSION['auth'])){
        $_SESSION['flash']['danger'] = "Vous n'avez pas le droit d'accéder à la page";
        header('Location: login.php');
        exit();
    }
}