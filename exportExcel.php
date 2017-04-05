<!-- fichier permettant l'export les données de l'ensemble des tables de la bdd (excepté la table des utilisateurs) ; appelé depuis la page Parametres_Export.php -->

<?php
    include 'PHPExcel-1.8/classes/PHPExcel.php';
    include 'PHPExcel-1.8/classes/PHPExcel/Writer/Excel2007.php'; //inclusion de phpExcel et de fichier type excel 2007 (.xlsx)

    header('Content-Type: text/csv; charset=utf-8'); 
    header('Content-Disposition: attachment;filename=DonneesPlateformeSOSAIT.xlsx'); //description du fichier créé : encodage, nom
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'); //donne la possibilité d'exporter sur un classeur plusieurs feuilles

    $objPHPExcel = new PHPExcel(); //création d'un nouveau document avec phpExcel

    include('config.php'); //connexion à la bdd

    //////////////////////////////////////
    /*Première feuille : table patient */
    //////////////////////////////////////

    $objPHPExcel->getActiveSheet()->setTitle('patient'); // on nomme la feuille excel 'patient'      
    $objPHPExcel->setActiveSheetIndex(0); 

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
                ->setCellValue('O1', 'ID_médecin_appelant');

    $row=2;
    while($row_data=$sql->fetch(PDO::FETCH_ASSOC)) { //on effectue une boucle pour chercher l'ensemble des informations de la table patient et on insère les données dans les différentes lignes/colonnes de l'Excel
        $col=0;
        foreach($row_data as $key=>$value){
            $objPHPExcel->getActiveSheet(0)->setCellValueByColumnAndRow($col,$row,$value);
            $col++;
        }
        $row++;
    }      

    //////////////////////////////////////
    /*Deuxième feuille : table examen*/
    //////////////////////////////////////

    $exaWorkSheet = new PHPExcel_Worksheet($objPHPExcel, 'examen'); // on nomme la feuille excel 'service'  
    $objPHPExcel->addSheet($exaWorkSheet); //on ajoute une feuille au classeur 
    $objPHPExcel->setActiveSheetIndex(1); //la feuille active est la deuxième

    $sql = $bdd->prepare('SELECT * FROM examen'); // requête sql : selection de l'ensemble des noms des examens
    $sql->execute();
    
    //création des en-têtes de ligne
    $objPHPExcel->setActiveSheetIndex(1)
                ->setCellValue('A1', 'ID_examen')
                ->setCellValue('B1', 'nom')
                ->setCellValue('C1', 'details');

    $row=2;
    while($row_data=$sql->fetch(PDO::FETCH_ASSOC)) { //on effectue une boucle pour chercher l'ensemble des informations de la table examen et on insère les données dans les différentes lignes/colonnes de l'Excel
        $col=0;
        foreach($row_data as $key=>$value){
            $objPHPExcel->getActiveSheet(1)->setCellValueByColumnAndRow($col,$row,$value);
            $col++;
        }
        $row++;
    }    

    //////////////////////////////////////
    /*Troisième feuille : table des liens entre examens et patients*/
    //////////////////////////////////////

    $exaWorkSheet = new PHPExcel_Worksheet($objPHPExcel, 'ExamenPatient'); // on nomme la feuille excel 'ExamenPatient'   
    $objPHPExcel->addSheet($exaWorkSheet); //on ajoute une feuille au classeur 
    $objPHPExcel->setActiveSheetIndex(2); //la feuille active est la troisième

    $sql = $bdd->prepare('SELECT * FROM examen_patient');
    $sql->execute();

    //création des en-têtes de ligne
    $objPHPExcel->setActiveSheetIndex(2)
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

    //////////////////////////////////////
    /*Quatrième feuille : table médecin*/
    //////////////////////////////////////

    $exaWorkSheet = new PHPExcel_Worksheet($objPHPExcel, 'Medecin'); 
    $objPHPExcel->addSheet($exaWorkSheet); //on ajoute une feuille au classeur 
    $objPHPExcel->setActiveSheetIndex(3); //la feuille active est la quatrième

    $sql = $bdd->prepare('SELECT * FROM medecin'); // requête sql : selection de l'ensemble des noms des médecins
    $sql->execute();

    $objPHPExcel->setActiveSheetIndex(3)
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

    //////////////////////////////////////
    /*Cinquième feuille : table service*/
    //////////////////////////////////////

    $exaWorkSheet = new PHPExcel_Worksheet($objPHPExcel, 'Service'); // on nomme la feuille excel 'service'     
    $objPHPExcel->addSheet($exaWorkSheet); //on ajoute une feuille au classeur 
    $objPHPExcel->setActiveSheetIndex(4); //la feuille active est la cinquième

    $sql = $bdd->prepare('SELECT typeExamen FROM examen'); // requête sql : selection de l'ensemble des noms des examens
    $sql->execute();

    //création des en-têtes de ligne
    $objPHPExcel->setActiveSheetIndex(4)
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
    while($row_data=$sql->fetch(PDO::FETCH_ASSOC)) { //on effectue une boucle pour chercher l'ensemble des informations de la table service et on insère les données dans les différentes lignes/colonnes de l'Excel
        $col=1;
        foreach($row_data as $key=>$value){
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($row,$col,$value);
            $col++;
        }
        $row++;
    }      

    $res = $bdd->prepare('SELECT * FROM service'); // requête sql : selection de l'ensemble des services
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

    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
    ob_end_clean();
    $objWriter->save('php://output');

    exit;
?>