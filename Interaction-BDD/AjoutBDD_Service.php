<?php
// Connexion à la base de données
include('../config.php');

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
$id_service=$bdd->lastInsertId();
echo $id_service;
?>

<script>
    top.location.href="../Dossier_Service_Examens.php?id_service=<?php echo $id_service; ?>";
</script>
