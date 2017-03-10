<?php
// Connexion à la base de données
include('../config.php');


if($_POST['type_examen']!=""){//On ne peux pas créer d'examen 

    $details= $_POST['details_examen'];
  
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



        $req2 = $bdd->prepare("ALTER TABLE Service ADD `".$_POST['type_examen']."` ENUM('YES','NO') NOT NULL DEFAULT 'NO'");
        $req2->execute();
        
        $req4 = $bdd->prepare("ALTER TABLE Patient ADD `".$_POST['type_examen']."` ENUM('YES','NO') NOT NULL DEFAULT 'NO'");
        $req4->execute();
  
    }
    else{
        echo "Il y a déjà un examen du même nom";
    }   
}
else{
    echo "Remplissez le champ examen";
}

// Redirection du visiteur vers la page du minichat
header('Location: ../Liste_Examens.php');

?>