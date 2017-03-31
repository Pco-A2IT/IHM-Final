<?php
// Connexion à la base de données
include('config.php');
require('fpdf.php');
header('Content-Type: text/pdf; charset=utf-8');

fopen('texteEcrire.txt', 'w');



$reqExam=$bdd->prepare('SELECT * FROM examen_patient,examen,service,patient WHERE examen.id_examen=examen_patient.id_examen AND examen_patient.id_service=service.id_service AND patient.id_patient=examen_patient.id_patient AND patient.id_patient=1');
$reqExam->execute();
$examen="";
$centre="";
$service="";
$jour="";
$horaire="";
$effectue="";
$patientNom="";
$patientPrenom="";



  while($dnn= $reqExam->fetch()){
      // on choisit la colonne du tableau que l'on souhaite afficher
      
      
      $patientNom=$dnn["nom_p"];
      $patientPrenom=$dnn["prenom_p"];
      
      
      // typeExamen 
      $examen=$dnn["typeExamen"];
     
      # Chemin vers fichier texte
      $file ="texteEcrire.txt";
      # Ouverture en mode écriture
      $fileopen=(fopen("$file",'a'));
      # Ecriture de "Début du fichier" dansle fichier texte
      fwrite($fileopen,$examen);
      # On ferme le fichier proprement
      fclose($fileopen);
      
      // centre
      $centre=$dnn["centre_s"];
     
      # Chemin vers fichier texte
      $file ="texteEcrire.txt";
      # Ouverture en mode écriture
      $fileopen=(fopen("$file",'a'));
      # Ecriture de "Début du fichier" dansle fichier texte
      fwrite($fileopen,";".$centre);
      # On ferme le fichier proprement
      fclose($fileopen);
      
         
      // service
      $service=$dnn["nom_s"];
     
      # Chemin vers fichier texte
      $file ="texteEcrire.txt";
      # Ouverture en mode écriture
      $fileopen=(fopen("$file",'a'));
      # Ecriture de "Début du fichier" dansle fichier texte
      fwrite($fileopen,";".$service);
      # On ferme le fichier proprement
      fclose($fileopen);
      
      
      
       // jour
      $jour=$dnn["date_examen"];
      
      $jour = date("d-m-Y", strtotime($jour));
     
      # Chemin vers fichier texte
      $file ="texteEcrire.txt";
      # Ouverture en mode écriture
      $fileopen=(fopen("$file",'a'));
      # Ecriture de "Début du fichier" dansle fichier texte
      fwrite($fileopen,";".$jour);
      # On ferme le fichier proprement
      fclose($fileopen);
    
      
      
      
      // horaire
      $horaire=$dnn["heure_examen"];
     
      # Chemin vers fichier texte
      $file ="texteEcrire.txt";
      # Ouverture en mode écriture
      $fileopen=(fopen("$file",'a'));
      # Ecriture de "Début du fichier" dansle fichier texte
      fwrite($fileopen,";".$horaire);
      # On ferme le fichier proprement
      fclose($fileopen);
      
      
      // effectue
      $effectue=$dnn["effectue"];
      
      if($effectue=="NO"){
           $effectue="non";
      }else{
           $effectue="oui";
      }
     
      # Chemin vers fichier texte
      $file ="texteEcrire.txt";
      # Ouverture en mode écriture
      $fileopen=(fopen("$file",'a'));
      # Ecriture de "Début du fichier" dansle fichier texte
      fwrite($fileopen,";".$effectue."\r\n");
      # On ferme le fichier proprement
      fclose($fileopen);
      
      
      
      }



class PDF extends FPDF
{
// Chargement des données
function LoadData($file)
{
    // Lecture des lignes du fichier
    $lines = file($file);
    $data = array();
    foreach($lines as $line)
        $data[] = explode(';',trim($line));
    return $data;
}


// Tableau coloré
function FancyTable($header, $data)
{
    // Couleurs, épaisseur du trait et police grasse
    $this->SetFillColor(74,115,232);
    $this->SetTextColor(255);
    $this->SetDrawColor(74,115,232);
    $this->SetLineWidth(.4);
    $this->SetFont('','B');
    // En-tête
    $w = array(65, 35, 60, 40, 30,20);
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
    $this->Ln();
    // Restauration des couleurs et de la police
    $this->SetFillColor(224,235,255);
    $this->SetTextColor(0);
    $this->SetFont('');
    // Données
    $fill = false;
    foreach($data as $row)
    {
        $this->Cell($w[0],6,$row[0],'LR',0,'L',$fill);
        $this->Cell($w[1],6,$row[1],'LR',0,'L',$fill);
        $this->Cell($w[2],6,$row[2],'LR',0,'L',$fill);
        $this->Cell($w[3],6,$row[3],'LR',0,'L',$fill);
        $this->Cell($w[4],6,$row[4],'LR',0,'L',$fill);
        $this->Cell($w[5],6,$row[5],'LR',0,'L',$fill);
        
       
        $this->Ln();
        $fill = !$fill;
    }
    // Trait de terminaison
    $this->Cell(array_sum($w),0,'','T');
}
    

}

    

// INSTANCIATION DU PDF


$pdf = new PDF();



// Chargement des données
$data = $pdf->LoadData('texteEcrire.txt');
$pdf->SetFont('Arial','',14);
$pdf->AddPage("L");
 // Police Arial gras 15
    $pdf->SetFont('Arial','B',15);
    // Décalage à droite
    $pdf->Cell(100);
    // Titre
    $pdf->Cell(70,10,'RECAPITULATIF DES RDV',1,0,'C');
    // Saut de ligne
    $pdf->Ln(20);
    //descriptif
    $pdf->Cell(40,10,'Ci dessous se trouve le tableau récapitulatif des rendez-vous de '.$patientPrenom." ".$patientNom." :");
$pdf->Ln(15);
// Titres des colonnes
$header = array('Examen', 'Centre', 'Service', 'Date','Heure','Réalisé');
$pdf->FancyTable($header,$data);

$pdf->Output();


// pour le mettre sur la plateforme 

/** <a href="./ExportPDF/extractionPDF.php?id_patient=<?php echo $id_patient;?>" class="myButton1"> Télécharger le récapitulatif </a> **/

?>

