<?php
    include 'PHPExcel-1.8/classes/PHPExcel.php';
    include 'PHPExcel-1.8/classes/PHPExcel/Writer/Excel2007.php';
    //inclusion de phpExcel et de fichier type excel 2007 (.xlsx)

    header('Content-Type: text/csv; charset=utf-8'); 
    header('Content-Disposition: attachment;filename=examens_patients.xlsx');
    //description du fichier créé : encodage, nom

    $objPHPExcel = new PHPExcel(); //création d'un nouveau document avec phpExcel
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007'); //mise du document en format xlsx

    include('config.php'); //connexion à la bdd
    $sql = $bdd->prepare('SELECT * FROM examen_patient'); // requête sql : selection de l'ensemble des liens entre les examens pour chaque patient
    $sql->execute();

    //création des en-têtes de ligne
    $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A1', 'ID_examen')
                ->setCellValue('B1', 'ID_patient')
                ->setCellValue('C1', 'ID_service')
                ->setCellValue('D1', 'date_examen')
                ->setCellValue('E1', 'heure_examen')
                ->setCellValue('F1', 'effectué');

    $row=2;
    while($row_data=$sql->fetch(PDO::FETCH_ASSOC)) { //on effectue une boucle pour chercher le nom des examens et le mettre en tête de ligne à la suite des autres en-têtes
        $col=0;
        foreach($row_data as $key=>$value){
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col,$row,$value);
            $col++;
        }
        $row++;
    }      

    $objPHPExcel->getActiveSheet()->setTitle('examPatient'); // on nomme la feuille excel 'examPatient'    
    $objPHPExcel->setActiveSheetIndex(0); 
    $objWriter->save('php://output');
    exit;
?>