<?php
// Connexion à la base de données
include('../config.php');


$id_patient=$_GET['id_patient'];
echo $id_patient;


///////////////////////////////////////////////////////////////////////////////////////
/*      Création des examens déjà réalisés                                           */
///////////////////////////////////////////////////////////////////////////////////////


//Parcours des checkbox
$compteur=1;
$reponse = $bdd->query('SELECT * FROM Examen');
while($dnn = $reponse->fetch()){
    $id_examen=$dnn['id_examen'];
    $date_cmpt="date".$compteur;
    echo $date_cmpt;
    
    $req1 = $bdd->prepare('SELECT * FROM examen_patient WHERE id_patient = ? AND id_examen=? ');
    $req1->execute(array($id_patient,$dnn['id_examen'] ));
    
    if(isset($_POST[$compteur]) && !($req1->fetch()) ){
        
        /*if(isset( $_POST[$date_cmpt] ) ){
            echo "ola";
            $_POST[$date_cmpt]="NC";
        }
        else{}*/
        
        $req = $bdd->prepare('INSERT INTO examen_patient(id_examen,id_patient, id_service, date_examen, heure_examen, effectue) VALUES(?, ?,?,?,?,?)');
        $req->execute(array( $id_examen, $id_patient, 0, $_POST[$date_cmpt], "00:00", "YES"));
    }
    $compteur=$compteur+1;
}




// Redirection du visiteur vers la page du minichat
?>

<script>
    top.location.href="../Prise_RDV.php?id_patient=<?php echo $id_patient; ?>";
</script>