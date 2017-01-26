<?php
// Connexion à la base de données
include('../config.php');


//On récupère la date de naissance dans l'html
$date= $_POST['birthday_p'];
echo $date;

//on explose la date de naissance
list($j,$m,$a)=explode("/",$date);
$date="$a-$m-$j";


//On récupère les id_medecin dans la table medecin en fonction du nom et du prénom rentré
    $nom_m_traitant=$_POST['nom_m_traitant'];
    echo $nom_m_traitant;
    
    $prenom_m_traitant=$_POST['prenom_m_traitant'];
    echo $prenom_m_traitant;
    
    $nom_m_appelant=$_POST['nom_m_appelant'];
    echo $nom_m_appelant;
    
    $prenom_m_appelant=$_POST['prenom_m_appelant'];
    echo $prenom_m_appelant;

$req2 = $bdd->prepare('SELECT * FROM medecin WHERE nom_m = ? AND prenom_m=? ');
$req2->execute(array($nom_m_traitant, $prenom_m_traitant ));

if($nom_m_traitant!="" && $prenom_m_traitant!="" ){
while ($donn = $req2->fetch()){
    $id_medecin_traitant=$donn['id_medecin'];
}
}
else{
    $id_medecin_traitant=0;
}
echo "le medecin traintant: ".$id_medecin_traitant;

$req3 = $bdd->prepare('SELECT * FROM medecin WHERE nom_m = ? AND prenom_m=? ');
$req3->execute(array($nom_m_appelant, $prenom_m_appelant ));

if($nom_m_appelant!="" && $prenom_m_appelant!="" ){
    while ($do = $req3->fetch()){
        $id_medecin_appelant=$do['id_medecin'];        
    }
}
else{
    $id_medecin_appelant=0;
}
// Insertion du message à l'aide d'une requête préparée
$req =$bdd->prepare('INSERT INTO Patient(id_patient, ID_medecin_traitant, ID_medecin_autre,nom_p, prenom_p,civilite_p,date_naissance,mail_p,telephone_p,ville_p,codePostal_p,adresse_p,date_creation_dossier) VALUES(NULL, ? ,? , ?,?,?,? ,?,?, ?, ?, ?,NOW() )'); // ici le ? correspond à la valeur que l'on rentre dans le formulaire

$req->execute(array($id_medecin_traitant, $id_medecin_appelant, $_POST['nom_p'], $_POST['prenom_p'],$_POST['civilite_p'] ,  $a.'-'. $m.'-'. $j, $_POST['mail_p'],$_POST['telephone_p'], $_POST['ville_p'],$_POST['codePostal_p'],$_POST['adresse_p']));




// Redirection du visiteur vers la page du minichat
header('Location: ../Dossier_Patient.php');
?>