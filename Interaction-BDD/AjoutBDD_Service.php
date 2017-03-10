<?php
// Connexion à la base de données
include('../config.php');

//

//Récupérer certaines données du formulaires
$ouv=$_POST['heured'].':'. $_POST['mind'].':'. '00';
$ferm=$_POST['heuref'].':'. $_POST['minf'].':'. '00';

$horairesd_s=$_POST['heured'].':'. $_POST['mind'].':'. '00';
if ($horairesd_s=="::00"){$horairesd_s= "00:00:00";}
        
$horairesf_s=$_POST['heuref'].':'. $_POST['minf'].':'. '00';
if ($horairesf_s=="::00"){$horairesf_s= "00:00:00";}
$descr=$_POST['description_s'];

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
$req1=$bdd->prepare($statique);
echo "       ".$statique;
$req1->execute(array($_POST['centre_s'],$_POST['service_s'], $_POST['telephone_s'], $horairesd_s, $horairesf_s, $_POST['adresse_s'], $_POST['codePostal_s'],$_POST['ville_s'], $descr));
echo "c'est pas req1 execute qui merde";
//Modification des attributs enum examens (la construction les initialise à NON)
$id_dernier=$bdd->lastInsertId();
echo $id_dernier;
$req2=$bdd->prepare('SELECT typeExamen FROM Examen');
$req2->execute();
$compteur3=1;

echo "c'est la boucle qui merde";
while($dnn = $req2->fetch()){
  if(isset($_POST[$compteur3])){
            $bool="YES";
  }else{
            $bool="NO";
  }
  echo $bool;
  
  $stmt = $bdd->prepare("UPDATE Service SET`".$dnn['typeExamen']."`= ? WHERE id_service =".$id_dernier."");
  echo "prepare effectué";
  $stmt->execute(array($bool));
  echo "requete executée";
  $compteur3=$compteur3+1;

}
echo "boucle effectuée";



// Redirection du visiteur vers la page du minichat
header('Location: ../Liste_Services.php');
?>