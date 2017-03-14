<?php
include 'PHPExcel-1.8/classes/PHPExcel.php';
include 'PHPExcel-1.8/classes/PHPExcel/Writer/Excel2007.php';

header('Content-Type: text/csv; charset=utf-8'); 
header('Content-Disposition: attachment;filename=DonneesPlateformeSOSAIT.xlsx');
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'); 

$objPHPExcel = new PHPExcel();

//premier sheet
$objPHPExcel->getActiveSheet()->setTitle('patient');      //设置sheet的名称
$objPHPExcel->setActiveSheetIndex(0);  //设置sheet的起始位置

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
        
        $objPHPExcel->getActiveSheet(0)->setCellValueByColumnAndRow($col,$row,$value);
        $col++;
    }
   
    $row++;
}      

//deuxieme sheet
$exaWorkSheet = new PHPExcel_Worksheet($objPHPExcel, 'examen'); //创建一个工作表
$objPHPExcel->addSheet($exaWorkSheet); //插入工作表
$objPHPExcel->setActiveSheetIndex(1); //切换到新创建的工作表
       
include('config.php');
$sql = $bdd->prepare('select * from examen');
$sql->execute();

$objPHPExcel->setActiveSheetIndex(1)
            ->setCellValue('A1', 'id_examen')
            ->setCellValue('B1', 'typeExamen')
            ->setCellValue('C1', 'details');

$row=2;
while($row_data=$sql->fetch(PDO::FETCH_ASSOC))
{
    $col=0;
    foreach($row_data as $key=>$value){
        
        $objPHPExcel->getActiveSheet(1)->setCellValueByColumnAndRow($col,$row,$value);
        $col++;
    }
   
    $row++;
}    

//troisieme sheet
$exaWorkSheet = new PHPExcel_Worksheet($objPHPExcel, 'ExamenPatient'); //创建一个工作表
$objPHPExcel->addSheet($exaWorkSheet); //插入工作表
$objPHPExcel->setActiveSheetIndex(2); //切换到新创建的工作表

include('config.php');
$sql = $bdd->prepare('select * from examen_patient');
$sql->execute();

$objPHPExcel->setActiveSheetIndex(2)
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

//quatrieme sheet
$exaWorkSheet = new PHPExcel_Worksheet($objPHPExcel, 'Medecin'); //创建一个工作表
$objPHPExcel->addSheet($exaWorkSheet); //插入工作表
$objPHPExcel->setActiveSheetIndex(3); //切换到新创建的工作表

include('config.php');
$sql = $bdd->prepare('select * from medecin');
$sql->execute();

$objPHPExcel->setActiveSheetIndex(3)
            ->setCellValue('A1', 'id_medecin')
            ->setCellValue('B1', 'id_service')
            ->setCellValue('C1', 'nom')
            ->setCellValue('D1', 'prénom')
            ->setCellValue('E1', 'mail')
            ->setCellValue('F1', 'ville')
            ->setCellValue('G1', 'codePostal')
            ->setCellValue('H1', 'adresse')
            ->setCellValue('I1', 'téléphone')
            ->setCellValue('J1', 'description');

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

//cinquieme sheet
$exaWorkSheet = new PHPExcel_Worksheet($objPHPExcel, 'Service'); //创建一个工作表
$objPHPExcel->addSheet($exaWorkSheet); //插入工作表
$objPHPExcel->setActiveSheetIndex(4); //切换到新创建的工作表

include('config.php');
$sql = $bdd->prepare('select typeExamen from examen');
$sql->execute();

$objPHPExcel->setActiveSheetIndex(4)
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

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
ob_end_clean();
$objWriter->save('php://output');

exit;
?>