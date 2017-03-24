<?php
include 'PHPExcel-1.8/classes/PHPExcel.php';
include 'PHPExcel-1.8/classes/PHPExcel/Writer/Excel2007.php'; //inclusion de phpExcel et de fichier type excel 2007 (.xlsx)

header('Content-Type: text/csv; charset=utf-8'); 
header('Content-Disposition: attachment;filename=medecins.xlsx'); //description du fichier créé : encodage, nom

$objPHPExcel = new PHPExcel(); //création d'un nouveau document avec phpExcel
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007'); //mise du document en format xlsx

include('config.php'); //connexion à la bdd
$sql = $bdd->prepare('SELECT * FROM medecin'); // requête sql : selection de l'ensemble des noms des médecins
$sql->execute();

//création des en-têtes de ligne
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'ID_medecin')
            ->setCellValue('B1', 'ID_service')
            ->setCellValue('C1', 'nom')
            ->setCellValue('D1', 'prénom')
            ->setCellValue('E1', 'mail')
            ->setCellValue('F1', 'ville')
            ->setCellValue('G1', 'codePostal')
            ->setCellValue('H1', 'adresse')
            ->setCellValue('I1', 'téléphone')
            ->setCellValue('J1', 'description');

$row=2;
while($row_data=$sql->fetch(PDO::FETCH_ASSOC)) { //on effectue une boucle pour chercher l'ensemble des informations de la table médecin et on insère les données dans les différentes lignes/colonnes de l'Excel
    $col=0;
    foreach($row_data as $key=>$value){
        
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col,$row,$value);
        $col++;
    }
   
    $row++;
}      

$objPHPExcel->getActiveSheet()->setTitle('medecin');      //设置sheet的名称
$objPHPExcel->setActiveSheetIndex(0);  //设置sheet的起始位置
$objWriter->save('php://output');
exit;
?>