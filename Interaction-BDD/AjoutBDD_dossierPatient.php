<?php
// Connexion à la base de données
include('../config.php');


//On récupère la date de naissance dans l'html
$date= $_POST['birthday_p'];
if($date==""){
    $date= "1970-01-01";
}
echo $date;


$date1= $_POST['date_ait_p'];
if($date1==""){
    $date1 = "1970-01-01";
}
echo $date1;

$civilite_p= $_POST['civilite_p'];
echo $civilite_p;


///////////////////////////////////
/*Récupération des champs médecin*/
///////////////////////////////////

    $nom_m_traitant=$_POST['nom_m_traitant'];
    echo $nom_m_traitant;
    
    $prenom_m_traitant=$_POST['prenom_m_traitant'];
    echo $prenom_m_traitant;

    $mail_m_traitant=$_POST['mail_m_traitant'];
    echo $mail_m_traitant;
    
    $nom_m_appelant=$_POST['nom_m_appelant'];
    echo $nom_m_appelant;
    
    $prenom_m_appelant=$_POST['prenom_m_appelant'];
    echo $prenom_m_appelant;

    $mail_m_appelant=$_POST['mail_m_appelant'];
    echo $mail_m_appelant;

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
        $reqmt = $bdd->prepare('INSERT INTO medecin(id_medecin,id_service, nom_m, prenom_m, mail_m, ville_m, codePostal_m, adresse_m, telephone_m) VALUES(NULL, 0, ?,?,?,\'A renseigner\',\'00000\',\'A renseigner\',\'A renseigner\')');
        $reqmt->execute(array($nom_m_traitant, $prenom_m_traitant, $mail_m_traitant));
        //$id_medecin_traitant est celui du medecin qu'on vient de créer
        $id_medecin_traitant=$bdd->lastInsertId();
    }
}
//Si on n'a pas rempli les champs medecin on met l'id medecin traitant à 0 pour pas qu'il y ai de pb dans la bdd
else{
    $id_medecin_traitant=0;
}

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
        $reqmu = $bdd->prepare('INSERT INTO medecin(id_medecin, id_service, nom_m, prenom_m, mail_m, ville_m, codePostal_m, adresse_m, telephone_m) VALUES(NULL, 0, ?,?,?,\'A renseigner\',\'00000\',\'A renseigner\',\'A renseigner\')');
        $reqmu->execute(array($nom_m_appelant, $prenom_m_appelant, $mail_m_appelant));
        $id_medecin_appelant=$bdd->lastInsertId();
    }
}

//Si on n'a pas rempli les champs medecin on met l'id medecin traitant à 0 pour pas qu'il y ai de pb dans la bdd
else{
    $id_medecin_appelant=0;
}
///////////////////////////////////////////////////////////////////////////////////////
/*      Insertion dans la base donnée                                                */
///////////////////////////////////////////////////////////////////////////////////////
// Insertion du message à l'aide d'une requête préparée
$req =$bdd->prepare('INSERT INTO Patient(id_patient, ID_medecin_traitant, ID_medecin_autre, date_ait_p, civilite_p, nom_p, prenom_p,date_naissance, mail_p, telephone_p, ville_p, codePostal_p, adresse_p, description_p, date_creation_dossier) VALUES(NULL,?, ?,?, ? ,? , ?,?,? ,?,?, ?, ?, ?, NOW() )'); // ici le ? correspond à la valeur que l'on rentre dans le formulaire

$req->execute(array($id_medecin_traitant, $id_medecin_appelant, $date1, $_POST['civilite_p'],$_POST['nom_p'], $_POST['prenom_p'],$date,  $_POST['mail_p'],$_POST['telephone_p'], $_POST['ville_p'],$_POST['codePostal_p'],$_POST['adresse_p'],$_POST['description_p'], ));




// Redirection du visiteur vers la page du minichat
//header('Location: ../Dossier_Patient.php');
?>