<?php
   include('config.php');
?>
<html>
<head>
   <link href="css/General.css"type="text/css"rel="stylesheet"/>    <!-- BOOTSTRAP -->
</head>
<body>
    <div class="gris">
        <div  class="gris2">
            <div id="menu0" class="carreGris" style="background-color:#1270B3" ;>
                <h4>Patients</h4>    
                <img class="icone_menu" src="Icones/patient_blanc.png"/>
            </div> 
            <div id="menu1" class="carreGris";>
                <h4>Suivi</h4>
                <img class="icone_suivi" src="Icones/recapitulatif.png"/>
            </div>
            <div id="menu2" class="carreGris" ;>
                <h4>Médecins</h4>    
                <img class="icone_menu" src="Icones/medecin_blanc.png"/>
            </div>
                        
            <div id="menu3" class="carreGris" ;>
                <h4>Services</h4>
                <img class="icone_menu" src="Icones/hopital_blanc.png"/>
            </div>
            <div id="menu4" class="carreGris">
                <h4>Paramètres</h4>
                <img class="icone_menu" src="Icones/parametres_blanc.png"/>      
            </div>
            <div id="menu5" class="carreGris">
                <h4>Logout</h4>
                <img class="icone_menu" src="Icones/logout.png"/>      
            </div>
            
            <script src="js/General.js"></script>
                
            <div class="extra" id="RetourDossierPatient" style="border-radius: 5px;">
                <img class="icone_extra" src="medecin.png"/>
                <h4>Retour au dossier patient</h4>
            </div>
        </div>
            
    
        <div class="titre";   style="border-radius: 5px;">
            <h1 class="titreGauche">Prise de Rendez-vous</h1>
        </div>
        <div class="blanc";   style="border-radius: 5px;">
            <div class="section4">
                <div class="div1" style="color:black">
                    <img src='Icones/patient_bleu.png' align='left' alt='sorry' width="50px" heigh="50px"/><h1 style="color:black";>Vincent Pasteur</h1><br>
                    <div id="container"> 
                        <br><br>
              
                        <h4 style='color:grey padding-left:2; margin-top:10; margin-bottom:10'>Examens</h4>
                        <form action="Prise_RDV.php" method="post">
                    <?php
                        $compteur=1;
                        $reponse = $bdd->query('SELECT * FROM Examen');      
                        while($dnn = $reponse->fetch()){
                    ?>     
                            <input type="checkbox" name="<?php echo($compteur); ?>" class="regular checkbox" value="YES"/><label for="<?php echo($compteur); ?>"></label>&nbsp;<?php print_r($dnn['typeExamen']); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          
                    <?php
                          $compteur= $compteur+1;
                        }
                    ?>
                            <td align="center"  colspan="2">
                                <input align="center" type="submit" accesskey="enter" value="Rechercher" id="btn" onmousemove="changeBgColor('btn')" onmouseout="recoverBgColor('btn');" class="submit" formmethod="post"/> 
                            </td>
                        </form>
       
                    </div>
            
    <?php
                    /*Compter le nombre d'exmen dans la bdd*/
                    $req= $bdd->prepare('SELECT * FROM Examen');
                    $req->execute();
                    $nbexam=0;
                    while($donnees= $req->fetch()){
                      $nbexam=$nbexam+1;
                    }
                    echo $nbexam;
                    
                    $premier=true;
                    $req1= $bdd->prepare('SELECT * FROM Examen');
                    $req1->execute();
                    $compteur=1;
                    $comptExamVrai=1;
                    $chaine = 'SELECT * FROM Service';
                    while($donnee= $req1->fetch()){
                      if(isset($_POST[$compteur])){
                            echo "ola";
                            if($premier==true){
                              $chaine=$chaine.' WHERE( `'.$donnee['typeExamen'].'`="YES"';
                              $premier=false;
                            }
                            else{
                                $chaine=$chaine.' OR `'.$donnee['typeExamen'].'`="YES"';
                            } 
                            $comptExamVrai=$comptExamVrai+1;
                        }
                        $compteur=$compteur+1;
                    }
                    $chaine=$chaine.")";
                    if($comptExamVrai==1){
                        $chaine = 'SELECT * FROM Service';
                        $aucune_demande=true;
                    }
                    else{
                        $aucune_demande=false;
                    }
                  echo $chaine;
                  $req2=$bdd->prepare($chaine);
                  $req2->execute();
                  
                  
                        
    ?>
                    <div class="div3">
                        <h4 style='color:grey padding-left:2; margin-top:10; margin-bottom:10'>Résultats Recherche</h4>
                        <table align="right" cellspacing="5px" class="table"> 
                            <tr>
                                <th>Centres</th>
                                <th>Adresse</th>
                                <th>Contact</th>
                                <th>Examens</th>
                                <th>Jour</th>
                                <th>Horaire</th>
                                <th>Planifié</th>
                            </tr>
            <?php  while ($donnees = $req2->fetch()){ ?>
                            <?php
                                    $nb=1;
                                    $req3= $bdd->prepare('SELECT * FROM Examen');
                                    $req3->execute();
                                    $comptspan=0;
                                        while($dnn= $req3->fetch()){//sinon on compte ombien d'examn sont à YES
                                            if($donnees[$dnn['typeExamen']]=="YES"){
                                                $comptspan=$comptspan+1;
                                            }
                                        }
                                    ?>
                            
                            <tr>
                                <td rowspan="<?php echo $comptspan; ?>"> <?php echo $donnees['centre_s']; ?></td>
                                <td rowspan="<?php echo $comptspan; ?>"><?php echo $donnees['adresse_s']; ?></td>
                                <td rowspan="<?php echo $comptspan; ?>"><?php echo $donnees['telephone_s']; ?></td>
                            
                                <?php
    
                                    $req4= $bdd->prepare('SELECT * FROM Examen');
                                    $req4->execute();
                                    $nbcroix=1;
                                    while($dnn= $req4->fetch()){
                                        if($aucune_demande==false){
                                            if($donnees[$dnn['typeExamen']]=="YES" && isset($_POST[$nbcroix])){
                                    ?>
                                    <td><?php echo $dnn['typeExamen'] ?></td>
                                    <td><label for="date"></label><input id="date" type="date" value=""/></td>
                                    <td><label for="heure"></label><input id="heure" type="time" value=""/></td>
                                    <td><input type="checkbox" id="checkbox-3" class="regular-checkbox" /><label for="checkbox-3"></label></td>
                                    </tr>
                                    <tr>
                                    <?php 
                                            }
                                        }
                                        else{
                                            if($donnees[$dnn['typeExamen']]=="YES"){
                                        ?>
                                        <td><?php echo $dnn['typeExamen'] ?></td>
                                        <td><label for="date"></label><input id="date" type="date" value=""/></td>
                                        <td><label for="heure"></label><input id="heure" type="time" value=""/></td>
                                        <td><input type="checkbox" id="checkbox-3" class="regular-checkbox" /><label for="checkbox-3"></label></td>
                                        </tr>
                                        <tr>
                                    <?php 
                                            }
                                        }
                                        $nbcroix=$nbcroix+1;
                                    }
                                ?>
                            
                            
                                               
                                
                                <?php 
                                   $nb=$nb+1; 
                                   } ?>
                            </tr>
                            
                   
                        </table>
                      
                  
                    </div>
                </div>
            </div>
    
            <script src="js/General.js"></script>
        </div>
    </div>
</body>
</html>
    
