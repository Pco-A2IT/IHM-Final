<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=bdd_plateforme;charset=utf8', 'root', 'root');
    
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
    catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}
?>