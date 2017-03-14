<?php
include 'PHPExcel-1.8/classes/PHPExcel.php';
include 'PHPExcel-1.8/classes/PHPExcel/Writer/Excel2007.php';

header('Content-Type: text/csv; charset=utf-8'); 
header('Content-Disposition: attachment;filename=mulit_sheet.xlsx');
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
//header('Content-Type: application/vnd.ms-excel');  

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


//$objWriter->save('php://output');
$objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
//$objWriter->save('mulit_sheet.xlsx');

if(!empty($_GET['excel'])){
            $objWriter->save('php://output'); //文件通过浏览器下载
        }else{
          $objWriter->save('mulit_sheet.xlsx'); //脚本方式运行，保存在当前目录
        }

/**if($type == 'excel2007'){  
   header('Content-Type: application/vnd.ms-excel');  
   header("Content-Disposition: attachment;filename='{$fileName}'");  
   header('Cache-Control: max-age=0');  
   $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');  
   $objWriter->save('php://output');  
  }
else{  
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');    
header("Content-Disposition: attachment;filename='{$fileName}'");    
header('Cache-Control: max-age=0');    
$objWriter = \PHPExcel_IOFactory:: createWriter($objPHPExcel, 'Excel2007');    
$objWriter->save( 'php://output');    
  
  }  **/

$objPHPExcel->disconnectWorksheets();
unset($objPHPExcel);
exit;
?>