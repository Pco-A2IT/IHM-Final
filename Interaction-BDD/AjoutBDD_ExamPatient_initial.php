<?php
// Connexion à la base de données
include('../config.php');

$id_patient=$_GET['id_patient'];
echo $id_patient;
//Parcours des checkbox
$compteur=1;
$reponse = $bdd->query('SELECT * FROM Examen');
while($dnn = $reponse->fetch()){
    $id_examen=$dnn['id_examen'];
    if(isset($_POST[$compteur])){
        $req = $bdd->prepare('INSERT INTO examen_patient(id_examen,id_patient, id_service, date_examen, heure_examen, effectue) VALUES(?, ?,?,?,?,?)');
        $req->execute(array( $id_examen, $id_patient, 0, "1970-01-01", "00:00:00", "NO"));
    }
    $compteur=$compteur+1;
}


?>

<!--<script>
top.location.href="../Prise_RDV.php?id_patient=<//?php echo $id_patient; ?>";
</script>-->