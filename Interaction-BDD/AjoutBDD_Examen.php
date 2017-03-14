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
echo "ALTER TABLE Service ADD `".$exam."` ENUM('YES','NO') NOT NULL DEFAULT 'NO'";
$req2->execute();
  
}
else{
    echo "Il y a déjà un examen du même nom";
}

// Redirection du visiteur vers la page du minichat
header('Location: ../Liste_Examens.php');

?>