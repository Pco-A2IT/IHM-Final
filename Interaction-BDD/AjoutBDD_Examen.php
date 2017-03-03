<?php
// Connexion à la base de données
include('../config.php');
$exam= $_POST['type_examen'];
$details= $_POST['details_examen'];
echo $exam;
echo $details;

$existe=false;
$req4=$bdd->prepare('SELECT typeExamen FROM Examen');
$req4->execute();
while($donnee = $req4->fetch()){
    if($_POST['type_examen']==$donnee['typeExamen']){
        $existe=true;
    }
}
    
if($existe==false){

$req = $bdd->prepare('INSERT INTO Examen(id_examen, typeExamen, details) VALUES(NULL,?,?)');
$req->execute(array($_POST['type_examen'],$_POST['details_examen']));



$req2 = $bdd->prepare("ALTER TABLE Service ADD `".$exam."` ENUM('YES','NO') NOT NULL DEFAULT 'NO'");

$req2->execute();
    
$req4 = $bdd->prepare("ALTER TABLE Patient ADD `".$exam."` ENUM('YES','NO') NOT NULL DEFAULT 'NO'");
$req4->execute();
  
}
else{
    echo "Il y a déjà un examen du même nom";
}
/*$req2='ALTER TABLE produit ADD image ENUM("YES","NO") NOT NULL;';
$connexion=mysqli_connect("localhost","root","root","bdd_plateforme");
$envoi=mysqli_query($connexion,$req2) or die("execution de la requete impossible");*/
?>