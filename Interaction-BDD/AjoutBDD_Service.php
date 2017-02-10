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
//Brouillon
//echo $irm;
/*if($_POST['choix1_ligne1']=="YES"){
    $irm="YES";
}else{
    $irm="NO";
}
if($_POST['choix1_ligne2']=="YES"){
    $cardiaque="YES";
}else{
    $cardiaque="NO";
}
if($_POST['choix1_ligne3']=="YES"){
    $neuro="YES";
}else{
    $neuro="NO";
}*/


//echo $cardiaque;
//echo $neuro;
//echo $irm;

$descr=$_POST['description_s'];
//$descr="A changer la description";


// Insertion du message à l'aide d'une requête préparée
//$req =$bdd->prepare('INSERT INTO Service(id_service, numSiret, centre_s,nom_s, telephone_s,horairesd_s, horairesf_s, adresse_s,codePostal_s,ville_s, description_s,irm_s,cardiaque_s,neuro_s) VALUES(NULL, ? ,? , ?,?, ?,?,? ,?,?, ?,?,?,? )'); // ici le ? correspond à la valeur que l'on rentre dans le formulaire


//$req->execute(array($_POST['siret_s'], $_POST['centre_s'],$_POST['service_s'], $_POST['telephone_s'], $ouv,$ferm, $_POST['adresse_s'], $_POST['codePostal_s'],$_POST['ville_s'], $descr, $irm, $cardiaque, $neuro));*/
//Brouillon
//Construction de requêtes en fonction du nombre d'attributs examen
$req=$bdd->prepare('SELECT typeExamen FROM Examen');
$req->execute();
$statique1='INSERT INTO Service(id_service, numSiret, centre_s,nom_s, telephone_s,horairesd_s, horairesf_s, adresse_s,codePostal_s,ville_s, description_s';
$statique2='VALUES(NULL, ? ,? , ?,?, ?,?,? ,?,?, ?';
$compteur=1;
while($dnn = $req->fetch()){
  $statique1=$statique1.', `'.$dnn['typeExamen'].'`';
  $statique2=$statique2.', "NO"';
  $compteur=$compteur+1;

}
$compteur=$compteur-1;
$compteur2=1;
// Construction d'un tableau contenant les valeurs des POST --Fausse Piste mais pourra servir plus tard
/*$array1=array(
    'key1' => $_POST['siret_s'],
    'key2' => $_POST['centre_s'],
    'key3' => $_POST['service_s'],
    'key4' => $_POST['telephone_s'],
    'key5' => $ouv,
    'key6' => $ferm,
    'key7' => $_POST['adresse_s'],
    'key8' => $_POST['codePostal_s'],
    'key9' => $_POST['ville_s'],
    'key10' => $descr,
);
while($compteur2<=$compteur){
        if($_POST[$compteur2]=="YES"){
            $valeur="YES";
        }else{
            $valeur="NO";
        }
        $array1[] = $valeur;
        $compteur2=$compteur2+1;
}

foreach ($array1 as $value) {
    echo $value;
}*/

//Concaténation des chaînes pour executer la requete d'ajout
        
$statique1=$statique1.') ';
$statique2=$statique2.') ';
$statique=$statique1.$statique2;
//echo $statique;
//echo $statique;
$req1=$bdd->prepare($statique);
echo $statique;
//$req1->execute($array1);
//$req1=$bdd->prepare("INSERT INTO Service(id_service, numSiret, centre_s,nom_s, telephone_s,horairesd_s, horairesf_s, adresse_s,codePostal_s,ville_s, description_s, `Test IRM`, `Test Musculaire`, `Test Neuro`) VALUES(NULL, ? ,? , ?,?, ?,?,? ,?,?, ?, ?, ?, ? )");
//$req1=$bdd->prepare('INSERT INTO Service(id_service, numSiret, centre_s,nom_s, telephone_s,horairesd_s, horairesf_s, adresse_s,codePostal_s,ville_s, description_s, `Test Poumon`, `Test du Foie`, `Test Musculaire`) VALUES(NULL, ? ,? , ?,?, ?,?,? ,?,?, ?, "NO", "NO", "NO")');
$req1->execute(array($_POST['siret_s'], $_POST['centre_s'],$_POST['service_s'], $_POST['telephone_s'], $horairesd_s, $horairesf_s, $_POST['adresse_s'], $_POST['codePostal_s'],$_POST['ville_s'], $descr));
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
  if($_POST[$compteur3]=="YES"){
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
//header('Location: ../Dossier_Patient.php');
?>