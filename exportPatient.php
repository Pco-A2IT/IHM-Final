<!-- fichier permettant l'export les données de la table patient ; appelé depuis la page Parametres_Export.php -->

<?php
    include 'PHPExcel-1.8/classes/PHPExcel.php'; 
    include 'PHPExcel-1.8/classes/PHPExcel/Writer/Excel2007.php'; //inclusion de phpExcel et de fichier type excel 2007 (.xlsx)

    header('Content-Type: text/csv; charset=utf-8'); 
    header('Content-Disposition: attachment;filename=patients.xlsx'); //description du fichier créé : encodage, nom

    $objPHPExcel = new PHPExcel(); //création d'un nouveau document avec phpExcel
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007'); //mise du document en format xlsx

    include('config.php'); //connexion à la bdd
    $sql = $bdd->prepare('SELECT * FROM patient'); // requête sql : selection de l'ensemble des patients
    $sql->execute();

    //création des en-têtes de ligne
    $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A1', 'ID_patient')
                ->setCellValue('B1', 'date_symptomes')
                ->setCellValue('C1', 'nom')
                ->setCellValue('D1', 'prénom')
                ->setCellValue('E1', 'civilité')
                ->setCellValue('F1', 'date_naissance')
                ->setCellValue('G1', 'mail')
                ->setCellValue('H1', 'téléphone')
                ->setCellValue('I1', 'ville')
                ->setCellValue('J1', 'codePostal')
                ->setCellValue('K1', 'adresse')
                ->setCellValue('L1', 'commentaire')
                ->setCellValue('M1', 'date_création_dossier')
                ->setCellValue('N1', 'ID_médecin_traitant')
                ->setCellValue('O1', 'ID_médecin_appelant')
                ->setCellValue('P1', 'récapitulatif_planification')
                ->setCellValue('Q1', 'récapitulatif_réalisation');

    $row=2;
    while($row_data=$sql->fetch(PDO::FETCH_ASSOC)) { //on effectue une boucle pour chercher l'ensemble des informations de la table patient et on insère les données dans les différentes lignes/colonnes de l'Excel
        $col=0;
        foreach($row_data as $key=>$value){
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col,$row,$value);
            $col++;
        }
        $row++;
    }      

    $objPHPExcel->getActiveSheet()->setTitle('patient'); // on nomme la feuille excel 'patient'     
    $objPHPExcel->setActiveSheetIndex(0);  
    $objWriter->save('php://output');
    exit;
?>