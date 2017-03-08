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
                    <?php
                        $id_patient=$_GET['idpatient'];
                        $req = $bdd->prepare('SELECT * FROM patient WHERE id_patient = ? ');
                        $req->execute(array($id_patient));
                        while ($donnees = $req->fetch()){
                            $nom_p=$donnees['nom_p'];
                            $prenom_p=$donnees['prenom_p'];
                        }
                    ?>
                    <img src='Icones/patient_bleu.png' align='left' alt='sorry' width="50px" heigh="50px"/><h1 style="color:black";><?php echo $prenom_p." ".$nom_p; ?></h1><br>
                    <div id="container"> 
                  
                        <br><br>
              
                        <h4 style='color:grey padding-left:2; margin-top:10; margin-bottom:10'>Examens</h4>
                        <form action="Prise_RDV.php?idpatient=<?php echo $id_patient; ?>" method="post">
                    <?php
                        
                        //marche mais ne prend pas en compte les examens déjà planifié
                        $compteur=1;
                            
                        $reponse = $bdd->query('SELECT * FROM Examen');      
                        while($dnn = $reponse->fetch()){
                            $dejaRealise=false;
                            
                            $req1= $bdd->prepare('SELECT * FROM Examen WHERE id_examen NOT IN(SELECT id_examen FROM examen_patient WHERE id_patient=?)');
                            $req1->execute(array($id_patient));
                            
                            while ($dnn2 = $req1->fetch()){
                                if($dnn2["typeExamen"] == $dnn["typeExamen"]){
                                    $dejaRealise=true;
                                }
                            }
                            if($dejaRealise==true){
                        
                    ?>     
                            <input type="checkbox" name="<?php echo $compteur; ?>" class="regular checkbox" value="YES" checked/><label for="<?php echo($compteur); ?>"></label>&nbsp;<?php print_r($dnn['typeExamen']); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          
                    <?php
                            }
                            else{
                        
                    ?>     
                            <input type="checkbox" name="<?php echo $compteur; ?>" class="regular checkbox" value="YES"/><label for="<?php echo($compteur); ?>"></label>&nbsp;<?php print_r($dnn['typeExamen']); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          
                    <?php
                            }
                            $compteur= $compteur+1;
                        }
                    ?>
                            <td align="center"  colspan="2">
                                <input align="center" type="submit" accesskey="enter" value="Rechercher" id="btn" onmousemove="changeBgColor('btn')" onmouseout="recoverBgColor('btn');" class="submit" formmethod="post"/> 
                            </td>
                        </form>
                    </div>
            
    <?php
                    /*Compter le nombre d'examen dans la bdd*/
                    $req= $bdd->prepare('SELECT * FROM Examen');
                    $req->execute();
                    $nbexam=0;
                    while($donnees= $req->fetch()){//Parcour de la table examen
                      $nbexam=$nbexam+1;//on incrémente à chaque examen
                    }
                    ///////////////////////////////////////////////////////////////////
                    /*Construction de la requete sql en fonction des checkbox cochées*/
                    ///////////////////////////////////////////////////////////////////
                    $premier=true;
                    $req1= $bdd->prepare('SELECT * FROM Examen');
                    $req1->execute();
                    $compteur=1;//va parcourir toutes les checkbox de la page (créees plus haut)
                    $comptExamVrai=1;//Désigne le nombre d'examen cochées par l'utilisateur
                    $chaine = 'SELECT * FROM Service ';//désigne le début de la requete que nous allons faire à la bdd
                    while($donnee= $req1->fetch()){
                      if(isset($_POST[$compteur])){//si la checkbox de name $compteur est cochée on complète la requête "$chaine"
                            //selon que la checkbox est la première ou pas l'ajout à la requete est différent
                            if($premier==true){//WHERE pour la première checkbox cochée
                              $chaine=$chaine.' WHERE( `'.$donnee['typeExamen'].'`="YES"';
                              $premier=false;
                            }
                            else{//OR pour les autres checkbox
                                $chaine=$chaine.' OR `'.$donnee['typeExamen'].'`="YES"';
                            } 
                            $comptExamVrai=$comptExamVrai+1;//on incrémente le compteur des examens cochés
                        }
                        $compteur=$compteur+1;//on incrémente le compteur qui parturt TOUTES les checkbox
                    }
                    $chaine=$chaine.") ORDER BY centre_s";//la requete est contruite
                    //////////////////////////////////////////
                    
                    
                    
                    ///////////////////////////////////////////////////////////////////
                    /*          Execution de la requete                              */
                    ///////////////////////////////////////////////////////////////////
                    
                    if($comptExamVrai==1){//Si aucune cases n'est cochée on ne veut rien afficher
                        $chaine = 'Cocher au moins une case examen';
                        $aucune_demande=true;
                    }
                    else{//sinon, on execute la requete
                        
                        $aucune_demande=false;
                        $req2=$bdd->prepare($chaine);
                        $req2->execute();
                    }
                    echo $chaine;
                    ///////////////////////////////////////////
                  
                        
    ?>
                    <div class="div3">
                          <div class="liste">
                        <h4 style='color:grey padding-left:2; margin-top:10; margin-bottom:10'>Résultats Recherche</h4>
                        <table align="right" cellspacing="5px" class="table"> 
                            <tr>
                                <th>Centres</th>
                                <th>Service</th>
                                <th>Adresse</th>
                                <th>Contact</th>
                                <th>Ouverture</th>
                                <th>Fermeture</th>
                                <th>Examens</th>
                                <th>Jour</th>
                                <th>Horaire</th>
                                <th></th>
                            </tr>
                            
            <?php  
                            
                    ///////////////////////////////////////////////////////////////////
                    /*          Affichage de Prise de RDV                            */
                    ///////////////////////////////////////////////////////////////////        
                    
                    //On affiche que si au moins une case est cochée
                    if($aucune_demande==false){
                        //on parcourt tous les services qui effectue les examens cochés
                        $nb=1;
                        while ($donnees = $req2->fetch()){
                                    $req3= $bdd->prepare('SELECT * FROM Examen');
                                    $req3->execute();
                                    
                            
                                    /////////////////////////////////////////////////////////////////////
                                    /* Calcul du nbre de ligne a afficher à partir de la colonne examen*/
                                    /////////////////////////////////////////////////////////////////////
                            
                                    $nbcroix=1;//désigne le parcours des checkbox 
                                    $comptspan=0;
                                        while($dnn= $req3->fetch()){
                                            //on affiche une ligne lorsque les examens cochés sont dispensés dans le service considéré
                                            if($donnees[$dnn['typeExamen']]=="YES" && isset($_POST[$nbcroix])){
                                                $comptspan=$comptspan+1;
                                            }
                                            $nbcroix=$nbcroix+1;
                                        }
                                    /////////////////////////////////////////////////////////////////////
                                    ?>
                            
                            
                                <tr>
                                    <td rowspan="<?php echo $comptspan; ?>"> <?php echo $donnees['centre_s']; ?></td>
                                    <td rowspan="<?php echo $comptspan; ?>"> <?php echo $donnees['nom_s']; ?></td>
                                    <td rowspan="<?php echo $comptspan; ?>"><?php echo $donnees['adresse_s']; ?></td>
                                    <td rowspan="<?php echo $comptspan; ?>"><?php echo $donnees['telephone_s']; ?></td>
                                    <td rowspan="<?php echo $comptspan; ?>"><?php echo $donnees['horairesd_s']; ?></td>
                                    <td rowspan="<?php echo $comptspan; ?>"><?php echo $donnees['horairesf_s']; ?></td>
                                    
                                    <?php

                                        /////////////////////////////////////////////////////////////////////
                                        /*  affichage des colonnes examens, jour, horaires, planifié       */
                                        /////////////////////////////////////////////////////////////////////

                                        $req4= $bdd->prepare('SELECT * FROM Examen');
                                        $req4->execute();
                                        $nbcroix=1;
                                        $nbcroixValide=1;
                                
                                        //on parcourt les examens cochés ET dispensé par le service considéré
                                        while($dnn= $req4->fetch()){
                                                if($donnees[$dnn['typeExamen']]=="YES" && isset($_POST[$nbcroix])){
                                        ?>
                                    <form action="./Interaction-BDD/AjoutBDD_ExamPatient.php?idpatient=<?php echo $id_patient;?> &amp; idservice= <?php echo $donnees["id_service"];?> &amp; idexamen=<?php echo $dnn["id_examen"];?> " method="post">
                                        <td><?php echo $dnn['typeExamen'] ?></td>
                                        <td><label for="date"></label><input id="date" name="date" type="date" value=""/></td>
                                        <td><label for="heure"></label><input id="heure" name="heure" type="time" value=""/></td>
                                        <td><input align="center" type="submit" accesskey="enter" value="Valider" id="btn" onmousemove="changeBgColor('btn')" onmouseout="recoverBgColor('btn');" class="submit" formmethod="post"/></td>
                                    </form>
                                </tr>
                            
                                    <tr>
                                    <?php 
                                                $nbcroixValide=$nbcroixValide+1;
                                            }
                                            $nbcroix=$nbcroix+1;
                                    }
                                    $nb=$nb+1;
                                    ///////////////////////////////////////////////////////////////////////
                        }
                    }
                    ?>
                            </tr>
                            
                   
                        </table>
                      
                        </div>
                    </div>
                </div>
            </div>
    
            <script src="js/General.js"></script>
        </div>
    </div>
</body>
</html>
    
