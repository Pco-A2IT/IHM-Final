<?php
// Connexion à la base de données
include('../config.php');

$id_patient=$_GET['idpatient'];
$id_service=$_GET['idservice'];
$id_examen=$_GET['idexamen'];


echo $id_patient;
echo $id_service;
echo $id_examen;
echo $_POST["date"];
echo $_POST["heure"];

$req = $bdd->prepare('INSERT INTO examen_patient(id_examen,id_patient, id_service, date_examen, heure_examen, realise) VALUES(?, ?,?,?,?,?)');

$req->execute(array( $id_examen, $id_patient, $id_service, $_POST["date"], $_POST["heure"], "NO"));



?>

<script>
top.location.href="../Prise_RDV.php?idpatient=<?php echo $id_patient; ?>";
</script>