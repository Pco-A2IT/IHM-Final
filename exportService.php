<?php
include 'PHPExcel-1.8/classes/PHPExcel.php';
include 'PHPExcel-1.8/classes/PHPExcel/Writer/Excel2007.php';

header('Content-Type: text/csv; charset=utf-8'); 
header('Content-Disposition: attachment;filename=services.xlsx');

$objPHPExcel = new PHPExcel();
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

include('config.php');
$sql = $bdd->prepare('select typeExamen from examen');
$sql->execute();

$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'id_service')
            ->setCellValue('B1', 'centre')
            ->setCellValue('C1', 'nom')
            ->setCellValue('D1', 'téléphone')
            ->setCellValue('E1', 'horaireDébut')
            ->setCellValue('F1', 'horairesFin')
            ->setCellValue('G1', 'adresse')
            ->setCellValue('H1', 'codePostal')
            ->setCellValue('I1', 'ville')
            ->setCellValue('J1', 'description');

$row=10;
while($row_data=$sql->fetch(PDO::FETCH_ASSOC))
{
    $col=1;
    foreach($row_data as $key=>$value){
        
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($row,$col,$value);
        $col++;
    }
   
    $row++;
}      

$res = $bdd->prepare('select * from service');
$res->execute();

$row2=2;
while($data=$res->fetch(PDO::FETCH_ASSOC))
{
    $col2=0;
    foreach($data as $key=>$value){
        
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col2,$row2,$value);
        $col2++;
    }
   
    $row2++;
}      

$objPHPExcel->getActiveSheet()->setTitle('service');      //设置sheet的名称
$objPHPExcel->setActiveSheetIndex(0);  //设置sheet的起始位置
$objWriter->save('php://output');
exit;
?>