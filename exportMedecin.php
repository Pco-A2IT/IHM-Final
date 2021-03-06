<!-- fichier permettant l'export les données de la table medecin ; appelé depuis la page Parametres_Export.php -->

<?php
    include 'PHPExcel-1.8/classes/PHPExcel.php';
    include 'PHPExcel-1.8/classes/PHPExcel/Writer/Excel2007.php'; //inclusion de phpExcel et de fichier type excel 2007 (.xlsx)

    header('Content-Type: text/csv; charset=utf-8'); 
    header('Content-Disposition: attachment;filename=medecins.xlsx'); //description du fichier créé : encodage, nom

    $objPHPExcel = new PHPExcel(); //création d'un nouveau document avec phpExcel
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007'); //mise du document en format xlsx

    include('config.php'); //connexion à la bdd
    $sql = $bdd->prepare('SELECT * FROM medecin'); // requête sql : selection de l'ensemble des noms des médecins
    $sql->execute();

    //création des en-têtes de ligne
    $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A1', 'ID_medecin')
                ->setCellValue('B1', 'ID_service')
                ->setCellValue('C1', 'nom')
                ->setCellValue('D1', 'prénom')
                ->setCellValue('E1','spécialité')
                ->setCellValue('F1', 'mail')
                ->setCellValue('G1', 'ville')
                ->setCellValue('H1', 'codePostal')
                ->setCellValue('I1', 'adresse')
                ->setCellValue('J1', 'téléphone')
                ->setCellValue('K1', 'description');

    $row=2;
    while($row_data=$sql->fetch(PDO::FETCH_ASSOC)) { //on effectue une boucle pour chercher l'ensemble des informations de la table médecin et on insère les données dans les différentes lignes/colonnes de l'Excel
        $col=0;
        foreach($row_data as $key=>$value){

            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col,$row,$value);
            $col++;
        }

        $row++;
    }      

    $objPHPExcel->getActiveSheet()->setTitle('medecin');      //设置sheet的名称
    $objPHPExcel->setActiveSheetIndex(0);  //设置sheet的起始位置
    $objWriter->save('php://output');
    exit;
?>