<?php
// Connexion à la base de données
include('../config.php');
///////////////////////////
/*Récupération de l'id du service qu'on veut modifier via $_GET['idservice']*/
///////////////////////////

$idservice=$_GET['idservice'];
echo $idservice;


$req2=$bdd->prepare('SELECT typeExamen FROM Examen');
$req2->execute();
$compteur3=1;
while($dnn = $req2->fetch()){
  if(isset($_POST[$compteur3])){
            $bool="YES";
  }else{
            $bool="NO";
  }
  echo $bool;
  
  
  $stmt = $bdd->prepare("UPDATE Service SET`".$dnn['typeExamen']."`= ? WHERE id_service =".$idservice."");
  echo "prepare effectué";
  $stmt->execute(array($bool));
  echo "requete executée";
  $compteur3=$compteur3+1;

}

//header('Location: ../Dossier_Service_modif_Examens.php');

?>

<script>
    //top.location.href="../Liste_Services.php";
</script>