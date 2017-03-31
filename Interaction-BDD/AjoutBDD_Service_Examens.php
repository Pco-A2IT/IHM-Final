<?php
// Connexion à la base de données
include('../config.php');

$id_service=$_GET['id_service'];
echo $id_service;

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
 
  
  $stmt = $bdd->prepare("UPDATE Service SET`".$dnn['typeExamen']."`= ? WHERE id_service =".$id_service."");
  echo "prepare effectué";
  $stmt->execute(array($bool));
  echo "requete executée";
  $compteur3=$compteur3+1;

}
echo "boucle effectuée";

?>

<script>
    top.location.href="../Liste_Services.php";
</script>