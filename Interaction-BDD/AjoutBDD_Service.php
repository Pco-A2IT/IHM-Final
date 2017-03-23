<?php
// Connexion à la base de données
include('../config.php');

//

//Récupérer données du formulaires
if($_POST['centre_s']==""){
    $centre_s="NC";
}
else{
    $centre_s=$_POST['centre_s'];
}

if($_POST['service_s']==""){
    $service_s="NC";
}
else{
    $service_s=$_POST['service_s'];
}

if($_POST['telephone_s']==""){
    $telephone_s="NC";
}
else{
    $telephone_s=$_POST['telephone_s'];
}

if($_POST['heured']==""){
    $heured="00:00";
}
else{
    $heured=$_POST['heured'];
}

if($_POST['heuref']==""){
    $heuref="00:00";
}
else{
    $heuref=$_POST['heuref'];
}

if($_POST['adresse_s']==""){
    $adresse_s="NC";
}
else{
    $adresse_s=$_POST['adresse_s'];
}

if($_POST['codePostal_s']==""){
    $codePostal_s="NC";
}
else{
    $codePostal_s=$_POST['codePostal_s'];
}

if($_POST['ville_s']==""){
    $ville_s="NC";
}
else{
    $ville_s=$_POST['ville_s'];
}


$descr=$_POST['codePostal_s'];
//$descr="A changer la description";



//$req->execute(array($_POST['siret_s'], $_POST['centre_s'],$_POST['service_s'], $_POST['telephone_s'], $ouv,$ferm, $_POST['adresse_s'], $_POST['codePostal_s'],$_POST['ville_s'], $descr, $irm, $cardiaque, $neuro));*/
//Brouillon
//Construction de requêtes en fonction du nombre d'attributs examen
$req=$bdd->prepare('SELECT typeExamen FROM Examen');
$req->execute();
$statique1='INSERT INTO Service(id_service, centre_s,nom_s, telephone_s,horairesd_s, horairesf_s, adresse_s,codePostal_s,ville_s, description_s';
$statique2='VALUES(NULL,? , ?,?, ?,?,? ,?,?, ?';
$compteur=1;
while($dnn = $req->fetch()){
  $statique1=$statique1.', `'.$dnn['typeExamen'].'`';
  $statique2=$statique2.', "NO"';
  $compteur=$compteur+1;

}
$compteur=$compteur-1;
$compteur2=1;


//Concaténation des chaînes pour executer la requete d'ajout
        
$statique1=$statique1.') ';
$statique2=$statique2.') ';
$statique=$statique1.$statique2;
//echo $statique;
//echo $statique;
$req1=$bdd->prepare($statique);
echo $statique;

$req1->execute(array($centre_s,$service_s, $telephone_s, $heured, $heuref, $adresse_s, $codePostal_s ,$ville_s, $descr));
echo "c'est pas req1 execute qui merde";
//Modification des attributs enum examens (la construction les initialise à NON)
$id_dernier=$bdd->lastInsertId();
echo $id_dernier;
$req2=$bdd->prepare('SELECT typeExamen FROM Examen');
$req2->execute();
$compteur3=1;
//$stmt = $bdd->prepare("UPDATE Service SET `Test IRM`=? WHERE id_service =".$id_dernier."");
//echo "prepare effectué";
//$stmt->execute(array("YES"));
//echo "requete executée";
echo "c'est la boucle qui merde";
while($dnn = $req2->fetch()){
  if(isset($_POST[$compteur3])){
            $bool="YES";
  }else{
            $bool="NO";
  }
  echo $bool;
  //$sql = "UPDATE Service SET `".$dnn['typeExamen']."`= :`nv".$dnn['typeExamen']."`";
  //echo $sql;
  //$id_boucle=7;
  //echo $id_boucle;
  
  $stmt = $bdd->prepare("UPDATE Service SET`".$dnn['typeExamen']."`= ? WHERE id_service =".$id_dernier."");
  echo "prepare effectué";
  $stmt->execute(array($bool));
  echo "requete executée";
  $compteur3=$compteur3+1;

}
echo "boucle effectuée";



// Redirection du visiteur vers la page du minichat
header('Location: ../Dossier_Service_Examens.php');
?>