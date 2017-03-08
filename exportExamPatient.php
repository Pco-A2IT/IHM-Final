<?php
include 'PHPExcel-1.8/classes/PHPExcel.php';
include 'PHPExcel-1.8/classes/PHPExcel/Writer/Excel2007.php';

header('Content-Type: text/csv; charset=utf-8'); 
header('Content-Disposition: attachment;filename=examens_patients.xlsx');

$objPHPExcel = new PHPExcel();
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

include('config.php');
$sql = $bdd->prepare('select * from examen_patient');
$sql->execute();

$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'id_examen')
            ->setCellValue('B1', 'id_patient')
            ->setCellValue('C1', 'date_examen')
            ->setCellValue('D1', 'heure_examen')
            ->setCellValue('E1', 'planifié')
            ->setCellValue('F1', 'effectué');

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

$objPHPExcel->getActiveSheet()->setTitle('examPatient');      //设置sheet的名称
$objPHPExcel->setActiveSheetIndex(0);  //设置sheet的起始位置
$objWriter->save('php://output');
exit;
?>