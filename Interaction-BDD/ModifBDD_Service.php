<?php
// Connexion à la base de données
include('../config.php');
///////////////////////////
/*Récupération de l'id du service qu'on veut modifier via $_GET['idservice']*/
///////////////////////////

$idservice=$_GET['idservice'];
echo $idservice;

///////////////////////////
/*Récupération tuple correspondant dans la bdd*/
///////////////////////////
$req = $bdd->prepare('SELECT * FROM service WHERE id_service = ? ');
$req->execute(array($idservice));
while ($donnees = $req->fetch())
{   
    
    if($_POST['siret_s']==''){$siret_s= $donnees['numSiret'];}//s'il ne l'est pas la variable prend la valeur déjà existante dans la bdd
    else{$siret_s=$_POST['siret_s'];}//si le champ est rempli on modifie la bdd
    
    if($_POST['centre_s']==''){$centre_s= $donnees['centre_s'];}
    else{$centre_s=$_POST['centre_s'];}
    echo $centre_s;
    
    if($_POST['telephone_s']==''){$telephone_s= $donnees['telephone_s'];}
    else{$telephone_s=$_POST['telephone_s'];}
    echo $telephone_s;
    
    if($_POST['adresse_s']==''){$adresse_s= $donnees['adresse_s'];}
    else{$adresse_s=$_POST['adresse_s'];}
    echo $adresse_s;
    
    if($_POST['codePostal_s']==''){$codePostal_s= $donnees['codePostal_s'];}
    else{$codePostal_s=$_POST['codePostal_s'];}
    echo $codePostal_s;
    
    if($_POST['ville_s']==''){$ville_s= $donnees['ville_s'];}
    else{$ville_s=$_POST['ville_s'];}
    echo $ville_s;
    
    /* Il manque la case description */
    $horairesd_s=$donnees['horairesd_s'];
    if($_POST['heured']=="" && $_POST['mind']==""){
        $horairesd_s= $donnees['horairesd_s'];
    }
    else{
        if($_POST['heured']==""){
            $horairesd_s=strftime("%H",strtotime($horairesd_s)).":". $_POST['mind'].":00";
        }
        else{
            if($_POST['mind']==""){
                $horairesd_s= $_POST['heured'].":".strftime("%M",strtotime($horairesd_s)).":00";
            }
            else{
                $horairesd_s= $_POST['heured'].":".$_POST['mind'].":00";
            }
            
        }
        
    }
    
    echo $horairesd_s;
    $horairesf_s=$donnees['horairesf_s'];
    if($_POST['heuref']=="" && $_POST['minf']==""){
        $horairesf_s= $donnees['horairesf_s'];
    }
    else{
        if($_POST['heuref']==""){
            $horairesf_s=strftime("%H",strtotime($horairesf_s)).":". $_POST['minf'].":00";
        }
        
        else{
            if($_POST['minf']==""){
                $horairesf_s= $_POST['heuref'].":".strftime("%M",strtotime($horairesf_s)).":00";
            }
            else{
                $horairesf_s= $_POST['heuref'].":".$_POST['minf'].":00";
            }
        }
    }
    echo $horairesf_s;
}                              
$req->closeCursor();

///////////////////////////
/*Changement dans la base de données*/
///////////////////////////


$req = $bdd->prepare('UPDATE service SET numSiret=:nv_NumSiret, centre_s = :nv_centre_s, telephone_s= :nv_telephone_s, horairesd_s= :nv_horairesd_s, horairesf_s= :nv_horairesf_s, adresse_s = :nv_adresse_s, codePostal_s = :nv_codePostal_s, ville_s = :nv_ville_s WHERE id_service = :jointure ');
$req->execute(array(
	'nv_NumSiret' => $siret_s,
    'nv_centre_s' => $centre_s,
    'nv_telephone_s' => $telephone_s,
    'nv_horairesd_s' => $horairesd_s,
    'nv_horairesf_s' => $horairesf_s,
    'nv_adresse_s' => $adresse_s,
    'nv_codePostal_s' => $codePostal_s,
    'nv_ville_s' => $ville_s,
	':jointure' => $idservice
	));

///////////////////////////
/*Retour vers le dossier service avec modification prise en compte*/
///////////////////////////

header('Location: ../Liste_Services.php');

?>