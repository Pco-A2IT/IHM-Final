<?php
include 'PHPExcel-1.8/classes/PHPExcel.php';
include 'PHPExcel-1.8/classes/PHPExcel/Writer/Excel2007.php';

$objPHPExcel = new PHPExcel();
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, "Excel2007");
$objWriter->save("patient.xlsx");

include('config.php');//$conn = mysql_connect("localhost","root","") or die("fail to connect！");    
$sql = $bdd->prepare("select * from patient");

$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Fiche')
            ->setCellValue('B1', 'Nom')
            ->setCellValue('C1', 'Prénom')
            ->setCellValue('D1', 'Date de naissance')
            ->setCellValue('E1', 'Code postal')
            ->setCellValue('F1', 'Ville')
            ->setCellValue('G1', 'Téléphone');

//$row = $bdd->GetAll($sql); 
//$count = count($row);
$i=2;                //定义一个i变量，目的是在循环输出数据是控制行数
while($rs=mysql_fetch_array($sql)){
 $objPHPExcel->getActiveSheet()->setCellValue('A1' . $i,  $rs[0]);
 $objPHPExcel->getActiveSheet()->setCellValue('B1' . $i,  $rs[1]);
 $objPHPExcel->getActiveSheet()->setCellValue('C1' . $i,  $rs[2]);
 $objPHPExcel->getActiveSheet()->setCellValue('D1' . $i,  date("d-m-Y", $rs[3]));
 $objPHPExcel->getActiveSheet()->setCellValue('E1' . $i,  $rs[4]);
 $objPHPExcel->getActiveSheet()->setCellValue('F1' . $i,  $rs[5]);
 $objPHPExcel->getActiveSheet()->setCellValue('G1' . $i,  $rs[6]);
}
 
echo date('H:i:s') . " Create new Worksheet object\n";
$objPHPExcel->getActiveSheet()->setTitle('patient');      //设置sheet的名称
$objPHPExcel->setActiveSheetIndex(0);                            //设置sheet的起始位置
?>