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
    if(isset($_POST[$compteur])){
        $req = $bdd->prepare('INSERT INTO examen_patient(id_examen,id_patient, id_service, date_examen, heure_examen, effectue) VALUES(?, ?,?,?,?,?)');
        $req->execute(array( $id_examen, $id_patient, 0, "1900-01-01", "00:00", "YES"));
    }
    $compteur=$compteur+1;
}




// Redirection du visiteur vers la page du minichat
//header("Location: ../Dossier_Patient_examens.php?id_patient=<?php echo $_GET['id_patient']; ?>");
?>

<script>
    top.location.href="../Dossier_Patient_modif_Examens.php?id_patient=<?php echo $id_patient; ?>";
</script>