<?php
// Connexion à la base de données
include('../config.php');

$id_service=$_GET['id_service'];

$req2=$bdd->prepare('SELECT typeExamen FROM Examen  WHERE id_examen NOT IN(SELECT id_examen FROM Examen WHERE id_examen=1)');
$req2->execute();
$compteur3=1;
while($dnn = $req2->fetch()){
  if(isset($_POST[$compteur3])){
            $bool="YES";
  }else{
            $bool="NO";
  }
 
  
  $stmt = $bdd->prepare("UPDATE Service SET`".$dnn['typeExamen']."`= ? WHERE id_service =".$id_service."");
  $stmt->execute(array($bool));
  $compteur3=$compteur3+1;

}

?>

<script>
    top.location.href="../Liste_Services.php";
</script>