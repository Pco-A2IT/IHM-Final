<?php 
require 'inc/functions.php';
logged_only();
require 'inc/header.php'; 
include('config.php');
?>


<html>
 <head>
        <title>Tableau de bord</title>
        <meta charset="UTF-8">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <link href="css/General.css"type="text/css"rel="stylesheet"/>
    </head>
    
    <body>
            <div class="gris">
             <div  class="gris2">
            <div id="menu0" class="carreGris";>
                <h4>Patients</h4>    
                <img class="icone_menu" src="Icones/patient_blanc.png"/>
            </div> 
            <div id="menu1" class="carreGris"  style="background-color:#1270B3" ;>
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
                <h4>Outils</h4>
                <img class="icone_menu" src="Icones/parametres_blanc.png"/>      
            </div>
         
            
            <script src="js/General.js"></script>
                
                <div class="titre";   style="border-radius: 5px;">
                    <h1 class="titreGauche">Tableau de bord</h1>
                </div>
                
                <div class="blanc";   style="border-radius: 5px;">
                  
                    <div class="section4">
                        <div class="div1">
       
                <div id="container">
                    <br>
                            <div id="titles"> 
                                <span class="title active" target="onglet1">Planification</span> 
                                <span class="title" target="onglet3">Suivi</span>
                                <span class="title" target="onglet4"> Récapitulatif 1</span>
                                <span class="title" target="onglet5"> Récapitulatif 2</span>
                                <span class="title" target="onglet6"> Récapitulatif 3</span>
                                
                            </div>
                             
                            
                            <div class="onglet" id="onglet3">
                                <div class="position_table">
                                
                                    <style>
                                        #divConteneur{
                           min-height:630px;
                            height:630px;
                            min-width:100%;
                            width:100%;
                            overflow:auto;/*pour activer les scrollbarres*/
                            }
                           
                            </style>
                        
                        <div id="divConteneur">
                                    <div class="liste">
                                        <h4>Patients ayant des rendez-vous antécédents à la date d'aujourd'hui </h4>
                                        <br>
                                        
                                        <table cellspacing="0px" id="tbl" class="table" >   
                                            <tr>
                                                <th>Patient</th>
                                                <th colspan=5>A réaliser aujourd'hui au plus tard</th>
                                            </tr>
                                            <tr>
                                                <th></th>
                                                <th >Examen</th>
                                                <th>Service et Centre</th>
                                                <th>Date du RDV</th>
                                                <th>Réalisé</th>
                                                <th></th>
                                                
                                            </tr>
                                            
                            
                                    <?php
                                        
                                        
                                        //Parcours de tous les patients
                                        $rep1= $bdd->prepare('SELECT * FROM Patient ORDER BY "date_creation_dossier"');
                                        $rep1->execute(array());
                                   
                                        while ($dnn1= $rep1->fetch()){ ?>
                                            
                                            <tr>
                                        
                                            <?php
                                        //Calcul du nombre d'examenspatient non réalisés à temps
                                            $calcul2= $bdd->prepare('SELECT COUNT(DISTINCT id_examen) AS NB2 FROM Examen_patient WHERE id_patient=? AND effectue="NO" AND date_examen<=NOW()');
                                            $calcul2->execute(array($dnn1['id_patient']));
                                            $nb2=$calcul2->fetch();
                                            //echo $nb2['NB2'];
                                        //Condition pour apparaître dans le tableau
                                            if($nb2['NB2']>0){ ?>
                                                <td rowspan="<?php echo $nb2['NB2']; ?>"><?php echo $dnn1['prenom_p'].' '.$dnn1['nom_p']; ?>
                                                    <br>
                                                    <?php echo $dnn1['telephone_p']; ?>
                                                    <br>
                                                    <?php echo $dnn1['mail_p']; ?>
                                                </td>
                                                <?php
                                                //Parcours des examens non réalisés à temps
                                                $rep2= $bdd->prepare('SELECT * FROM Examen_patient WHERE id_patient=? AND effectue="NO" AND date_examen<=NOW()');
                                                $rep2->execute(array($dnn1['id_patient']));
                                                
                                                $cmpt1=1;
                                                $cmpt2=1;                                                
                                                while($dnn2=$rep2->fetch()){?>
                                                <?php 
                                                    $rep3= $bdd->prepare('SELECT * FROM Examen WHERE id_examen=?');
                                                    $rep3->execute(array($dnn2["id_examen"]));
                                                    while ($dnn3= $rep3->fetch()){ ?>
                                                        <td><?php $id_examen=$dnn3["id_examen"];echo $dnn3["typeExamen"];?></td> 
                            
                                                    <?php } 
                                                    if($dnn2["id_service"]==0){ ?>
                                                        <td><?php echo "NC"; ?></td>
                                                        
                                            <?php   }else{
                                                        $rep4= $bdd->prepare('SELECT * FROM Service WHERE id_service=?');
                                                        $rep4->execute(array($dnn2["id_service"]));
                                                        while ($dnn4= $rep4->fetch()){ ?>
                                                            <td><?php echo $dnn4["centre_s"]; ?>
                                                                <br>
                                                                <?php echo $dnn4["nom_s"]; ?>
                                                                <br>
                                                                <?php echo $dnn4["telephone_s"]; ?>
                                                                            
                                                            </td>
                                                            
                                                            
                                                <?php 
                                                        }
                                                    }
                                                    if($dnn2["date_examen"]=="1970-01-01" /*&& $donnees["heure_examen"]="00:00:00"*/){ ?>
                                                        <td><?php echo "NC"; ?>
                                                            <br>
                                                            <?php echo "NC"; ?>
                                                        </td>
                                            <?php   }else{ ?>
                                                        <td><?php echo strftime("%m/%d/%y",strtotime($dnn2["date_examen"] )); ?>
                                                            <br>
                                                            <?php echo $dnn2["heure_examen"]; ?>
                                                        </td>
                                            <?php   
                                            } 
                                                
                                            ?>
                                                <form action="./Interaction-BDD/ModifBDD_Suivi_Examens.php?id_patient=<?php echo $dnn1["id_patient"];?> &amp; name_checkbox= <?php echo $cmpt1;?> &amp; id_examen=<?php echo $dnn2["id_examen"];?>" method="post">
                                                    
                                                    <td><input type="checkbox" class="regular checkbox" name="<?php echo($cmpt1);?>" value="YES"/><?php echo $cmpt1; ?></td>
                                                    
                                                    <td><input align="center" type="submit" accesskey="enter" value="Valider" class="submit" formmethod="post" /></td>
                                                </form>
                                                  
                                            <?php
                                                    $cmpt1=$cmpt1+1;
                                                    $cmpt2=$cmpt2+1;
                                            ?>
                                            </tr>
                                            
                                            <?php
                                                }
                                        }
                                }
                    ?>
                                          
                                        </table>
                                        
                                    </div>
                                    </div>
                            </div>
                               

              
                                  
                        </div>
                    <br>
                    
                              <div class="onglet" id="onglet1">
                                <div class="position_table">
                                    
                                    <style>
                                        #divConteneur{
                           min-height:630px;
                            height:630px;
                            min-width:100%;
                            width:100%;
                            overflow:auto;/*pour activer les scrollbarres*/
                            }
                           
                            </style>
                        
                        <div id="divConteneur">
                                    <div class="liste">
                                        <h4>Patients ayant des rendez-vous non planifiés </h4>
                                        <br>
                                        <table cellspacing="0px" id="tbl" class="table">   
                                            <tr>
                                                <th>Patient</th>
                                                <th colspan="4"> Examens à planifier</th>
                                                
                                            </tr>
                                            
                                           
                                            
                            
                                    <?php
                                        
                                        
                                        //Parcours de tous les patients
                                        $rep1= $bdd->prepare('SELECT * FROM Patient ORDER BY "date_creation_dossier"');
                                        $rep1->execute(array());
                                   
                                        while ($dnn1= $rep1->fetch()){ ?>
                                            <tr>
                                            <?php
                                            //Calcul du nombre d'examens
                                            //$calcul = $bdd->query('SELECT COUNT(*) AS NB FROM Examen');
                                            //$nb= $calcul->fetch();
                                            //echo $nb['NB'];
                                        //Calcul du nombre d'examens
                                            $calcul = $bdd->query('SELECT COUNT(*) AS NB FROM Examen');
                                            $nb= $calcul->fetch();
                                        //Calcul du nombre d'examens planifiés pour le patient
                                            $calcul2= $bdd->prepare('SELECT COUNT(DISTINCT id_examen) AS NB2 FROM Examen_patient WHERE id_patient=? ');
                                            $calcul2->execute(array($dnn1['id_patient']));
                                            $nb2=$calcul2->fetch();
                                            
                            
                                            //echo $nb2['NB2'];
                                        //Condition pour apparaître dans le tableau si hospit de jour on affiche pas
                                            if($nb2['NB2']<$nb['NB']){ 
                                                $ecart=$nb['NB']-$nb2['NB2'];
                                            ?>
                                                <td rowspan="<?php echo $ecart; ?>"><?php echo $dnn1['prenom_p'].' '.$dnn1['nom_p']; ?>
                                                </td>
                                                
                                                <?php
                                                //Parcours des examens non planifiés
                                                $rep2= $bdd->prepare('SELECT * FROM Examen WHERE id_examen NOT IN(SELECT id_examen FROM examen_patient WHERE id_patient=?)');
                                                $rep2->execute(array($dnn1['id_patient']));
                                                
                                                
                                                
                                                while($dnn2=$rep2->fetch()){?>
                                                <?php 
                                                    $rep3= $bdd->prepare('SELECT * FROM Examen WHERE id_examen=?');
                                                    $rep3->execute(array($dnn2["id_examen"]));
                                                    while ($dnn3= $rep3->fetch()){ ?>
                                                        <td><?php echo $dnn3["typeExamen"];?></td>
                                                       
                                            
                                                  
                                                        
                            
                                                    <?php 
                                                    }
                                                    ?>
                                                        
                                                
                                                  
                                                
                    <?php 
                                                }?>
                                                 
                                         
                                                
                                                 <td><a href="Prise_RDV.php?id_patient=<?php echo $dnn1['id_patient'];?>"> <img class="supprimer" src="Icones/bouton_rdv.png"> </a></td>
                                                  </tr>
                                        <?php
                                            }
                                }
                    ?>
                                          
                                            </table>
                                    </div>
                                    </div>
                            </div>
                        
                                  
                            
                        </div>
                          <div class="onglet" id="onglet4">
                                <div class="position_table">
                                
                                    <style>
                                        #divConteneur{
                           min-height:630px;
                            height:630px;
                            min-width:100%;
                            width:100%;
                            overflow:auto;/*pour activer les scrollbarres*/
                            }
                           
                            </style>
                        
                        <div id="divConteneur">
                                    <div class="liste">
                                         <h4>Patients dont tous les examens sont planifiés </h4>
                                        <br>
                                        <table cellspacing="0px" id="tbl" class="table">   
                                            <tr>
                                                <th>Patient</th>
                                                <th>Medecin Traitant </th>
                                                <th>Medecin Appelant</th>
                                                <th>Date de création du dossier</th>

                                                <th>Récapitulatif</th>
                                            </tr>
                            <!-- AFFICHAGE des EXAMENS PLANIFIES -->
                                    <?php
                                        
                                        
                                        //Parcours de tous les patients
                                        $rep1= $bdd->prepare('SELECT * FROM Patient ORDER BY "date_creation_dossier"');
                                        $rep1->execute(array());
                                        while ($dnn1= $rep1->fetch()){ ?>
                                            <tr>
                                            <?php
                                            //Calcul du nombre d'examens
                                            $calcul = $bdd->query('SELECT COUNT(*) AS NB FROM Examen');
                                            $nb= $calcul->fetch();
                                            //echo $nb['NB'];
                                        //Calcul du nombre d'examenspatient
                                            $calcul2= $bdd->prepare('SELECT COUNT(DISTINCT id_examen) AS NB2 FROM Examen_patient WHERE id_patient=?');
                                            $calcul2->execute(array($dnn1['id_patient']));
                                            $nb2=$calcul2->fetch();
                                            //echo $nb2['NB2'];
                                        //Condition pour apparaître dans le tableau
                                            if($nb2['NB2']==$nb['NB']){ ?>
                                                <td><?php echo $dnn1['prenom_p'].' '.$dnn1['nom_p']; ?></td>
                                                <?php
                                                if($dnn1['ID_medecin_traitant']==0){?>
                                                    <td><?php echo "Pas de medecin traitant attribué"; ?></td>
                                          <?php }else{
                                                    $rep2= $bdd->prepare('SELECT * FROM Medecin WHERE id_medecin=?');
                                                    $rep2->execute(array($dnn1['ID_medecin_traitant']));
                                                    while($dnn2=$rep2->fetch()){?>
                                                        <td><?php echo $dnn2['prenom_m'].' '.$dnn2['nom_m']; ?>
                                                            <br>
                                                            <?php echo $dnn2['mail_m'].' - '.$dnn2['telephone_m']; ?>
                                                        </td>
                                        <?php       }
                                                }
                                                if($dnn1['ID_medecin_autre']==0){?>
                                                    <td><?php echo "Pas de medecin appelant attribué"; ?></td>
                                        <?php }else{
                                                    $rep3= $bdd->prepare('SELECT * FROM Medecin WHERE id_medecin=?');
                                                    $rep3->execute(array($dnn1['ID_medecin_autre']));
                                                    while($dnn3=$rep3->fetch()){ ?>
                                                        <td><?php echo $dnn3['prenom_m'].' '.$dnn3['nom_m']; ?>
                                                            <br>
                                                            <?php echo $dnn3['mail_m'].' - '.$dnn3['telephone_m']; ?>
                                                        </td>
                                        <?php       }
                                               }?>
                                               <td><?php echo strftime("%d/%m/%Y",strtotime($dnn1['date_creation_dossier'])); ?></td>
                                               <td></td>
                                               <td>
                                               <a href="./ExportPdf/ExportExamPlanifie.php?id_patient=<?php echo $dnn1["id_patient"];?>"> <img class="icone_liste" src="Icones/icon_pdf.png" width="60px" heigh="60px"/></a> 
                                                
                                               </td>
                                        <?php
                                            } ?>
                                            </tr>
                                        <?php                             
                                            }?>
                                            </table>
                                    </div>
                                    </div>
                            </div>
                               

              
                                  
                        </div>
                        <div class="onglet" id="onglet5">
                                       <div class="position_table">
                                           <style>
                                        #divConteneur{
                           min-height:630px;
                            height:630px;
                            min-width:100%;
                            width:100%;
                            overflow:auto;/*pour activer les scrollbarres*/
                            }
                           
                            </style>
                        
                        <div id="divConteneur">
                
                                    <div class="liste">
                                        <h4>Patients ayant réalisé tous les examens sauf le rendez-vous neuro </h4>
                                        <br>
                                        <table cellspacing="0px" id="tbl" class="table">   
                                            <tr>
                                                <th>Patient</th>
                                                <th>Medecin Traitant </th>
                                                <th>Medecin Appelant</th>
                                                <th>Date de création du dossier</th>
                                             
                                                <th>Récapitulatif</th>
                                            </tr>
                            <!-- AFFICHAGE des EXAMENS PLANIFIES -->
                                    <?php
                                        
                                        
                                        //Parcours de tous les patients
                                        $rep1= $bdd->prepare('SELECT * FROM Patient ORDER BY "date_creation_dossier"');
                                        $rep1->execute(array());
                                   
                                        while ($dnn1= $rep1->fetch()){ ?>
                                            <tr>
                                            <?php
                                            //récupérer l'id de l'examen neuro
                                            
                                            $idexam = $bdd->query('SELECT id_examen AS ID FROM Examen WHERE neuro="YES" ');
                                            $idef=$idexam->fetch();
                                            
                                            //Calcul du nombre d'examens
                                            $calcul = $bdd->query('SELECT COUNT(*) AS NB FROM Examen');
                                            $nb= $calcul->fetch();
                                            //echo $nb['NB'];
                                        //Calcul du nombre d'examens réalisés sauf neuro
                                            $calcul3= $bdd->prepare('SELECT COUNT(DISTINCT id_examen) AS NB3 FROM Examen_patient WHERE id_patient=? AND effectue="YES" AND id_examen <> ?');
                                            $calcul3->execute(array($dnn1['id_patient'],$idef['ID']));
                                            $nb3=$calcul3->fetch();
                                        //Calcul du nombre d'examens plannifiés
                                            $calcul2= $bdd->prepare('SELECT COUNT(DISTINCT id_examen) AS NB2 FROM Examen_patient WHERE id_patient=?');
                                            $calcul2->execute(array($dnn1['id_patient']));
                                            $nb2=$calcul2->fetch();
                                            
                                            //echo $nb2['NB2'];
                                        //Condition pour apparaître dans le tableau
                                            if($nb2['NB2']==$nb['NB'] && $nb3['NB3']==$nb['NB']-1){ ?>
                                                <td><?php echo $dnn1['prenom_p'].' '.$dnn1['nom_p']; ?></td>
                                                <?php
                                                if($dnn1['ID_medecin_traitant']==0){?>
                                                    <td><?php echo "Pas de medecin traitant attribué"; ?></td>
                                          <?php }else{
                                                    $rep2= $bdd->prepare('SELECT * FROM Medecin WHERE id_medecin=?');
                                                    $rep2->execute(array($dnn1['ID_medecin_traitant']));
                                                    while($dnn2=$rep2->fetch()){?>
                                                        <td><?php echo $dnn2['prenom_m'].' '.$dnn2['nom_m']; ?>
                                                            <br>
                                                            <?php echo $dnn2['mail_m'].' - '.$dnn2['telephone_m']; ?>
                                                        </td>
                                        <?php       }
                                                }
                                                if($dnn1['ID_medecin_autre']==0){?>
                                                    <td><?php echo "Pas de medecin appelant attribué"; ?></td>
                                        <?php }else{
                                                    $rep3= $bdd->prepare('SELECT * FROM Medecin WHERE id_medecin=?');
                                                    $rep3->execute(array($dnn1['ID_medecin_autre']));
                                                    while($dnn3=$rep3->fetch()){ ?>
                                                        <td><?php echo $dnn3['prenom_m'].' '.$dnn3['nom_m']; ?>
                                                            <br>
                                                            <?php echo $dnn3['mail_m'].' - '.$dnn3['telephone_m']; ?>
                                                        </td>
                                        <?php       }
                                               }?>
                                               <td><?php echo strftime("%d/%m/%Y",strtotime($dnn1['date_creation_dossier'])); ?></td>
                                               <td></td>
                                               <td>
                                                      <a href="./ExportPdf/ExportExamAngioscan.php?id_patient=<?php echo $dnn1["id_patient"];?>"> <img class="icone_liste" src="Icones/icon_pdf.png" width="60px" heigh="60px"/></a> 
                                               </td>
                                        <?php
                                            } ?>
                                            </tr>
                                        <?php                             
                                            }?>
                                            </table>
                                    </div>
                                </div>
                            </div>
                        
                                  
                            
                        </div>
                           <div class="onglet" id="onglet6">
                                     <div class="position_table">
                                
                                         <style>
                                        #divConteneur{
                           min-height:630px;
                            height:630px;
                            min-width:100%;
                            width:100%;
                            overflow:auto;/*pour activer les scrollbarres*/
                            }
                           
                            </style>
                        
                        <div id="divConteneur">
                                    <div class="liste">
                                        <h4>Patients ayant réalisé tous les examens </h4>
                                        <br>
                                        <table cellspacing="0px" id="tbl" class="table">   
                                            <tr>
                                                <th>Patient</th>
                                                <th>Medecin Traitant </th>
                                                <th>Medecin Appelant</th>
                                                <th>Date de création du dossier</th>
                                        
                                                <th>Récapitulatif</th>
                                            </tr>
                            <!-- AFFICHAGE des EXAMENS PLANIFIES -->
                                    <?php
                                        
                                        
                                        //Parcours de tous les patients
                                        $rep1= $bdd->prepare('SELECT * FROM Patient ORDER BY "date_creation_dossier"');
                                        $rep1->execute(array());
                                   
                                        while ($dnn1= $rep1->fetch()){ ?>
                                            <tr>
                                            <?php
                                            //récupérer l'id de l'examen neuro
                                            
                                            //$idexam = $bdd->query('SELECT id_examen AS ID FROM Examen WHERE neuro="YES" ');
                                            //$idef=$idexam->fetch();
                                            
                                            //Calcul du nombre d'examens
                                            $calcul = $bdd->query('SELECT COUNT(*) AS NB FROM Examen');
                                            $nb= $calcul->fetch();
                                            //echo $nb['NB'];
                                        //Calcul du nombre d'examens réalisés sauf neuro
                                            $calcul3= $bdd->prepare('SELECT COUNT(DISTINCT id_examen) AS NB3 FROM Examen_patient WHERE id_patient=? AND effectue="YES"');
                                            $calcul3->execute(array($dnn1['id_patient']));
                                            $nb3=$calcul3->fetch();
                                        //Calcul du nombre d'examens plannifiés
                                            $calcul2= $bdd->prepare('SELECT COUNT(DISTINCT id_examen) AS NB2 FROM Examen_patient WHERE id_patient=?');
                                            $calcul2->execute(array($dnn1['id_patient']));
                                            $nb2=$calcul2->fetch();
                                            
                                            //echo $nb2['NB2'];
                                        //Condition pour apparaître dans le tableau
                                            if($nb2['NB2']==$nb['NB'] && $nb3['NB3']==$nb['NB']){ ?>
                                                <td><?php echo $dnn1['prenom_p'].' '.$dnn1['nom_p']; ?></td>
                                                <?php
                                                if($dnn1['ID_medecin_traitant']==0){?>
                                                    <td><?php echo "Pas de medecin traitant attribué"; ?></td>
                                          <?php }else{
                                                    $rep2= $bdd->prepare('SELECT * FROM Medecin WHERE id_medecin=?');
                                                    $rep2->execute(array($dnn1['ID_medecin_traitant']));
                                                    while($dnn2=$rep2->fetch()){?>
                                                        <td><?php echo $dnn2['prenom_m'].' '.$dnn2['nom_m']; ?>
                                                            <br>
                                                            <?php echo $dnn2['mail_m'].' - '.$dnn2['telephone_m']; ?>
                                                        </td>
                                        <?php       }
                                                }
                                                if($dnn1['ID_medecin_autre']==0){?>
                                                    <td><?php echo "Pas de medecin appelant attribué"; ?></td>
                                        <?php }else{
                                                    $rep3= $bdd->prepare('SELECT * FROM Medecin WHERE id_medecin=?');
                                                    $rep3->execute(array($dnn1['ID_medecin_autre']));
                                                    while($dnn3=$rep3->fetch()){ ?>
                                                        <td><?php echo $dnn3['prenom_m'].' '.$dnn3['nom_m']; ?>
                                                            <br>
                                                            <?php echo $dnn3['mail_m'].' - '.$dnn3['telephone_m']; ?>
                                                        </td>
                                        <?php       }
                                               }?>
                                               <td><?php echo strftime("%d/%m/%Y",strtotime($dnn1['date_creation_dossier'])); ?></td>
                                               <td></td>
                                               <td>
                                                     <a href="./ExportPdf/ExportExamRealise.php?id_patient=<?php echo $dnn1["id_patient"];?>"> <img class="icone_liste" src="Icones/icon_pdf.png" width="60px" heigh="60px"/></a> 
                                             
                                               </td>
                                        <?php
                                            } ?>
                                            </tr>
                                        <?php                             
                                            }?>
                                            </table>
                                    </div>
                                         </div>
                            </div>
                                  
                       
                        </div>
                    
                       
                    
                   
                    </div>
                                
                    
                
                            
                    
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </body>
</html>

<script>
         
         function changeColor(s) {
    if(s.options[s.selectedIndex].value == "") {
        s.style.color = "#a9a9a9";
    }
     
    else {
        s.style.color = "black";
    }
}
         

        $(document).ready(function(){

           
            //Initialisation : on cache tous les onglets puis on affiche le premier
            $('.onglet').hide();
            $('#onglet1').show();

            //Quand on clique sur un titre
            $('.title').on('click',function(){

                // On recupere le div global id = container
                var container = $(this).parent().parent();

                $('.active').removeClass('active');

                
                // On cache tous les onglets
                container.children('.onglet').hide();

                //On affiche celui correspondant à l'attribut target
                container.children('#'+$(this).attr('target')).show();
                $(this).addClass("active");
            });
         }); 
        
    </script>