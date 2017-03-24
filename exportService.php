<?php
    include 'PHPExcel-1.8/classes/PHPExcel.php';
    include 'PHPExcel-1.8/classes/PHPExcel/Writer/Excel2007.php'; //inclusion de phpExcel et de fichier type excel 2007 (.xlsx)

    header('Content-Type: text/csv; charset=utf-8'); 
    header('Content-Disposition: attachment;filename=services.xlsx'); //description du fichier créé : encodage, nom

    $objPHPExcel = new PHPExcel(); //création d'un nouveau document avec phpExcel
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007'); //mise du document en format xlsx

    include('config.php'); //connexion à la bdd
    $sql = $bdd->prepare('SELECT typeExamen FROM examen'); // requête sql : selection de l'ensemble des noms des examens
    $sql->execute();

    //création des en-têtes de ligne
    $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'ID_service')
            ->setCellValue('B1', 'centre')
            ->setCellValue('C1', 'nom')
            ->setCellValue('D1', 'téléphone')
            ->setCellValue('E1', 'heure_début')
            ->setCellValue('F1', 'heure_fin')
            ->setCellValue('G1', 'adresse')
            ->setCellValue('H1', 'codePostal')
            ->setCellValue('I1', 'ville')
            ->setCellValue('J1', 'commentaire');

    $row=10;
    while($row_data=$sql->fetch(PDO::FETCH_ASSOC)) { //on effectue une boucle pour chercher le nom des examens et le mettre en tête de ligne à la suite des autres en-têtes
        $col=1;
        foreach($row_data as $key=>$value){
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($row,$col,$value);
            $col++;
        }
        $row++;
    }      

    $res = $bdd->prepare('SELECT * FROM service');  // requête sql : selection de l'ensemble des services
    $res->execute();

    $row2=2;
    while($data=$res->fetch(PDO::FETCH_ASSOC)) { //on effectue une boucle pour chercher l'ensemble des informations de la table service et on insère les données dans les différentes lignes/colonnes de l'Excel
        $col2=0;
        foreach($data as $key=>$value){
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col2,$row2,$value);
            $col2++;
        }
        $row2++;
    }      

    $objPHPExcel->getActiveSheet()->setTitle('service'); // on nomme la feuille excel 'service'     
    $objPHPExcel->setActiveSheetIndex(0);  
    $objWriter->save('php://output');
    exit;
?>