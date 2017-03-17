<?php
include 'PHPExcel-1.8/classes/PHPExcel.php';
include 'PHPExcel-1.8/classes/PHPExcel/Writer/CSV.php';

header('Content-Type: text/csv;charset=ISO-8859-15'); 
header('Content-Disposition: attachment;filename=patients.csv');
header('Content-type:application/vnd.ms-csv;ISO-8859-15');  

$objPHPExcel = new PHPExcel();
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, "CSV");


include('config.php');
$sql = $bdd->prepare('select * from patient');
$sql->execute();

$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'id_patient')
            ->setCellValue('B1', 'date_ait')
            ->setCellValue('C1', 'nom')
            ->setCellValue('D1', 'prenom')
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
/*
function convertUTF8($str)
{
   if(empty($str)) return '';
   return  iconv('utf-8', 'ISO-8859-1', $str);
}*/

function convertUTF8($str)
{
   if(empty($str)) " ";
   return  iconv('ISO-8859-1', 'utf-8', $str);
}


$row=2;
while($row_data=$sql ->fetch(PDO::FETCH_ASSOC))
{
    $col=0;
    foreach($row_data as $key=>$value){
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col,$row,convertUTF8($value));
        $col++;
    }
    $row++;
}

$objPHPExcel->getActiveSheet()->setTitle('patient');      //设置sheet的名称
$objPHPExcel->setActiveSheetIndex(0);  //设置sheet的起始位置
$objWriter->save('php://output');
exit;
?>