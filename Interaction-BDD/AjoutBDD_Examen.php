<?php
// Connexion à la base de données
include('../config.php');
$exam= $_POST['type_examen'];
$details= $_POST['details_examen'];

$existe=false;
$req4=$bdd->prepare('SELECT typeExamen FROM Examen');
$req4->execute();
while($donnee = $req4->fetch()){
    if($_POST['type_examen']==$donnee['typeExamen']){
        $existe=true;
    }
}
    
if($existe==false){
    if(isset($_POST['neuro'])){
        $neuro="YES";
    }else{
        $neuro="NO";
    }
$req = $bdd->prepare('INSERT INTO Examen(id_examen, typeExamen, details, neuro) VALUES(NULL,?,?,?)');
$req->execute(array($_POST['type_examen'],$_POST['details_examen'],$neuro));



$req2 = $bdd->prepare("ALTER TABLE Service ADD `".$exam."` ENUM('YES','NO') NOT NULL DEFAULT 'NO'");
$req2->execute();
  
}
else{
    echo "Il y a déjà un examen du même nom";
}

// Redirection du visiteur vers la page du minichat
header('Location: ../Liste_Examens.php');

?>