<?php
// Connexion à la base de données
include('../config.php');

///////////////////////////
/*Récupération de l'id du service qu'on veut modifier via $_GET['idservice']*/
///////////////////////////

$id_patient=$_GET['id_patient'];
echo $id_patient;

///////////////////////////
/*Récupération tuple correspondant dans la bdd*/
///////////////////////////
$req = $bdd->prepare('SELECT * FROM patient WHERE id_patient = ? ');
$req->execute(array($id_patient));
while ($donnees = $req->fetch())
{   
    
    if($_POST['nom_p']==''){$nom_p= $donnees['nom_p'];}//s'il ne l'est pas la variable prend la valeur déjà existante dans la bdd
    else{$nom_p=$_POST['nom_p'];}//si le champ est rempli on modifie la bdd
    
    if($_POST['prenom_p']==''){$prenom_p= $donnees['prenom_p'];}
    else{$prenom_p=$_POST['prenom_p'];}
    echo $prenom_p;
    
    if($_POST['civilite_p']==''){$civilite_p= $donnees['civilite_p'];}
    else{$civilite_p=$_POST['civilite_p'];}
    echo $civilite_p;
    
    if($_POST['telephone_p']==''){$telephone_p= $donnees['telephone_p'];}
    else{$telephone_p=$_POST['telephone_p'];}
    echo $telephone_p;
    
    
    if($_POST['mail_p']==''){$mail_p= $donnees['mail_p'];}
    else{$mail_p=$_POST['mail_p'];}
    echo $mail_p;
    
    if($_POST['codePostal_p']==''){$codePostal_p= $donnees['codePostal_p'];}
    else{$codePostal_p=$_POST['codePostal_p'];}
    echo $codePostal_p;
    
    if($_POST['ville_p']==''){$ville_p= $donnees['ville_p'];}
    else{$ville_p=$_POST['ville_p'];}
    echo $ville_p;
    
    if($_POST['adresse_p']==''){$adresse_p= $donnees['adresse_p'];}
    else{$adresse_p=$_POST['adresse_p'];}
    echo $adresse_p;
    
    if($_POST['birthday_p']==''){$birthday_p= $donnees['date_naissance'];}
    else{
    $birthday_p=$_POST['birthday_p'];
    //on explose la date de naissance
    list($j,$m,$a)=explode("/",$birthday_p);
    $birthday_p="$a-$m-$j";
    echo $birthday_p;
    }
    
    $id_medecin_traitant= $donnees['ID_medecin_traitant'];
    echo $id_medecin_traitant;
    
    $id_medecin_appelant= $donnees['ID_medecin_autre'];
    echo $id_medecin_appelant;
    
    ///////////////////////////////////
    /*Récupération des champs médecin*/
    ///////////////////////////////////
    $nom_m_traitant=$_POST['nom_m_traitant'];
    echo $nom_m_traitant;
    
    $prenom_m_traitant=$_POST['prenom_m_traitant'];
    echo $prenom_m_traitant;
    
    $nom_m_appelant=$_POST['nom_m_appelant'];
    echo $nom_m_appelant;
    
    $prenom_m_appelant=$_POST['prenom_m_appelant'];
    echo $prenom_m_appelant;
    
}
///////////////////////////
/*recherche de l'ID medecin traitant correspondant*/
///////////////////////////
/*$req2 = $bdd->prepare('SELECT * FROM medecin WHERE nom_m = ? AND prenom_m=? ');
$req2->execute(array($nom_m_traitant, $prenom_m_traitant ));

if($nom_m_traitant !="" && $prenom_m_traitant !=""){
    while ($donn = $req2->fetch()){
        $id_medecin_traitant=$donn['id_medecin'];
    }
}
/*else{
    $id_medecin_traitant=$donnees['ID_medecin_traitant'];
}*/

//echo "Nouveau medecin traitant: ".$id_medecin_traitant;

///////////////////////////////////////////////////////////////////////////////////////
/*      ID_medecin_traitant                                                          */
///////////////////////////////////////////////////////////////////////////////////////

//On prend dans 'medecin' l'éventuel tuple qui correspond au nom et prenom rentré dans le formulaire
$req2 = $bdd->prepare('SELECT * FROM medecin WHERE nom_m = ? AND prenom_m=? ');
$req2->execute(array($nom_m_traitant, $prenom_m_traitant ));
//Si on a rempli les champs medecin
if($nom_m_traitant!="" && $prenom_m_traitant!="" ){
$test=false;
//il faut trouver l'id du medecin correspond
    while ($donn = $req2->fetch()){
        //on regarde si le médecin existe déjà dans la bdd
        if($nom_m_traitant==$donn['nom_m'] && $prenom_m_traitant==$donn['prenom_m']){
            $test=true;
            if($test==true){
                echo "olaaaaa";
                $id_medecin_traitant=$donn['id_medecin'];
            }
        }
    }
    //s'il n'existe pas on le crée en renseignant juste le minimum
    if($test!=true){
        $reqmt = $bdd->prepare('INSERT INTO medecin(id_medecin, num_adeli_m ,id_service, civilite_m, nom_m, prenom_m, mail_m, ville_m, codePostal_m, adresse_m, telephone_m) VALUES(NULL, 1111 ,2, \'Mr\',?,?,\'A renseigner\',\'A renseigner\',\'A renseigner\',\'A renseigner\',\'A renseigner\')');
        $reqmt->execute(array($nom_m_traitant, $prenom_m_traitant));
        //$id_medecin_traitant est celui du medecin qu'on vient de créer
        $id_medecin_traitant=$bdd->lastInsertId();
    }
}
//Si on n'a pas rempli les champs medecin on met l'id medecin traitant à 0 pour pas qu'il y ai de pb dans la bdd
else{
    $id_medecin_traitant=0;
}

///////////////////////////
/*recherche de l'ID medecin appelant correspondant*/
///////////////////////////
/*$req3 = $bdd->prepare('SELECT * FROM medecin WHERE nom_m = ? AND prenom_m=? ');
$req3->execute(array($nom_m_appelant, $prenom_m_appelant ));

if($nom_m_appelant!="" && $prenom_m_appelant!=""){
while ($do = $req3->fetch()){
        $id_medecin_appelant=$do['id_medecin'];        
    }
}
/*else{
    $id_medecin_appelant=$donnees['ID_medecin_appelant'];
    echo $donnees['ID_medecin_appelant'];
}*/

///////////////////////////////////////////////////////////////////////////////////////
/*      ID_medecin_appelant                                                          */
///////////////////////////////////////////////////////////////////////////////////////

//On prend dans 'medecin' l'éventuel tuple qui correspond au nom et prenom rentré dans le formulaire
$req3 = $bdd->prepare('SELECT * FROM medecin WHERE nom_m = ? AND prenom_m=? ');
$req3->execute(array($nom_m_appelant, $prenom_m_appelant ));
//Si on a rempli le nom et le medecin appelant
if($nom_m_appelant!="" && $prenom_m_appelant!="" ){
    $test2=false;
    
    while ($do = $req3->fetch()){
        if($nom_m_appelant==$do['nom_m'] && $prenom_m_appelant==$do['prenom_m']){
            $test2=true;
            if($test2==true){
                $id_medecin_appelant=$do['id_medecin'];
            }
        }
                
    }
    if($test2!=true){
        //s'il n'existe pas on le crée en renseignant juste le minimum
        $reqmu = $bdd->prepare('INSERT INTO medecin(id_medecin, num_adeli_m ,id_service, civilite_m, nom_m, prenom_m, mail_m, ville_m, codePostal_m, adresse_m, telephone_m) VALUES(NULL, 1111 ,2, \'Mr\',?,?,\'A renseigner\',\'A renseigner\',\'A renseigner\',\'A renseigner\',\'A renseigner\')');
        $reqmu->execute(array($nom_m_appelant, $prenom_m_appelant));
        $id_medecin_appelant=$bdd->lastInsertId();;
    }
}

//Si on n'a pas rempli les champs medecin on met l'id medecin traitant à 0 pour pas qu'il y ai de pb dans la bdd
else{
    $id_medecin_appelant=0;
}

//echo "Nouveau medecin appelant :".$id_medecin_appelant;
$req->closeCursor();
$req2->closeCursor();
$req3->closeCursor();

///////////////////////////
/*Changement dans la base de données*/
///////////////////////////


$req = $bdd->prepare('UPDATE patient SET nom_p= :nv_nom_p, prenom_p= :nv_prenom_p, civilite_p= :nv_civilite_p, date_naissance= :nv_date_naissance_p, mail_p= :nv_mail_p, telephone_p= :nv_telephone_p, ville_p = :nv_ville_p, codePostal_p = :nv_codePostal_p,  adresse_p = :nv_adresse_p, ID_medecin_traitant= :nv_id_medecin_traitant, ID_medecin_autre= :nv_id_medecin_appelant  WHERE id_patient = :jointure ');
$req->execute(array(
    'nv_nom_p' => $nom_p,
    'nv_prenom_p' => $prenom_p,
    'nv_civilite_p' => $civilite_p,
	'nv_date_naissance_p' => $birthday_p,
    'nv_mail_p' => $mail_p,
    'nv_telephone_p' => $telephone_p,
    'nv_ville_p' => $ville_p,
    'nv_codePostal_p' => $codePostal_p,
    'nv_adresse_p' => $adresse_p,
    'nv_id_medecin_traitant' => $id_medecin_traitant,
    'nv_id_medecin_appelant' => $id_medecin_appelant,
    
	':jointure' => $id_patient
	));

///////////////////////////
/*Retour vers la liste_Patients*/
///////////////////////////

//header('Location: ../Liste_Patients.php');

?>