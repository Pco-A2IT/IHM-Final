<?php
include 'PHPExcel-1.8/classes/PHPExcel.php';
include 'PHPExcel-1.8/classes/PHPExcel/Writer/Excel2007.php';

header('Content-Type: text/csv; charset=utf-8'); 
header('Content-Disposition: attachment;filename=patients.xlsx');

$objPHPExcel = new PHPExcel();
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

include('config.php');
$sql = $bdd->prepare('select * from patient');
$sql->execute();

$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'id_patient')
            ->setCellValue('B1', 'date_symptomes_ait')
            ->setCellValue('C1', 'nom')
            ->setCellValue('D1', 'prénom')
            ->setCellValue('E1', 'civilité')
            ->setCellValue('F1', 'date_naissance')
            ->setCellValue('G1', 'mail')
            ->setCellValue('H1', 'téléphone')
            ->setCellValue('I1', 'ville')
            ->setCellValue('J1', 'codePostal')
            ->setCellValue('K1', 'adresse')
            ->setCellValue('L1', 'description')
            ->setCellValue('M1', 'date_creation_dossier')
            ->setCellValue('N1', 'ID_medecin_traitant')
            ->setCellValue('O1', 'ID_medecin_autre');

$row=2;
while($row_data=$sql->fetch(PDO::FETCH_ASSOC))
{
    $col=0;
    foreach($row_data as $key=>$value){
        
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col,$row,$value);
        $col++;
    }
   
    $row++;
}      

$objPHPExcel->getActiveSheet()->setTitle('patient');      //设置sheet的名称
$objPHPExcel->setActiveSheetIndex(0);  //设置sheet的起始位置
$objWriter->save('php://output');
exit;
?>