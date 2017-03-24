<?php
    include 'PHPExcel-1.8/classes/PHPExcel.php';
    include 'PHPExcel-1.8/classes/PHPExcel/Writer/Excel2007.php'; //inclusion de phpExcel et de fichier type excel 2007 (.xlsx)

    header('Content-Type: text/csv; charset=utf-8'); 
    header('Content-Disposition: attachment;filename=examens.xlsx'); //description du fichier créé : encodage, nom

    $objPHPExcel = new PHPExcel(); //création d'un nouveau document avec phpExcel
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007'); //mise du document en format xlsx

    include('config.php'); //connexion à la bdd
    $sql = $bdd->prepare('SELECT * FROM examen'); // requête sql : selection de l'ensemble des noms des examens
    $sql->execute();

    //création des en-têtes de ligne
    $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A1', 'ID_examen')
                ->setCellValue('B1', 'nom')
                ->setCellValue('C1', 'details');

    $row=2;
    while($row_data=$sql->fetch(PDO::FETCH_ASSOC)) { //on effectue une boucle pour chercher l'ensemble des informations de la table examen et on insère les données dans les différentes lignes/colonnes de l'Excel
        $col=0;
        foreach($row_data as $key=>$value){
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col,$row,$value);
            $col++;
        }
        $row++;
    }      

    $objPHPExcel->getActiveSheet()->setTitle('examen');  // on nomme la feuille excel 'service'  
    $objPHPExcel->setActiveSheetIndex(0);
    $objWriter->save('php://output');
    exit;
?>