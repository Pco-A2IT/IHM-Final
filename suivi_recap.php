<?php 
require 'inc/functions.php';
logged_only();
require 'inc/header.php'; 
include('config.php');
?>



<html>
 <head>
        <title>Envoi des récapitulatifs</title>
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
                <h4>Paramètres</h4>
                <img class="icone_menu" src="Icones/parametres_blanc.png"/>      
            </div>
            <div id="menu5" class="carreGris">
                <h4>Logout</h4>
                <img class="icone_menu" src="Icones/logout.png"/>      
            </div>
            
            <script src="js/General.js"></script>
                
                <div class="titre";   style="border-radius: 5px;">
                    <h1 class="titreGauche">Envoi des récapitulatifs</h1>
                </div>
                
                <div class="blanc";   style="border-radius: 5px;">
                  
                    <div class="section4">
                        <div class="div1">
       
                <div id="container">
                    <br>
                            <div id="titles"> 
                                <span class="title active" target="onglet1"> Examens planifiés</span> 
                                <span class="title" target="onglet3"> Avant examen neurologue</span>
                                <span class="title" target="onglet4"> Examens réalisés</span>
                            </div>
                             
                            
                            <div class="onglet" id="onglet1">
                                <div class="position_table">
                
                                    <div class="liste">
                                        <table cellspacing="0px"  class="table">   
                                            <tr>
                                                <th>Patient</th>
                                                <th>Medecin Traitant </th>
                                                <th>Medecin Appelant</th>
                                                <th>Date de création du dossier</th>
                                                <th></th>
                                                <th></th>
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
                                               <td><img class="icone_liste" src="Icones/icon_pdf.png" width="50px" heigh="50px"/></td>
                                        <?php
                                            } ?>
                                            </tr>
                                        <?php                             
                                            }?>
                                            </table>
                                    </div>
                            </div>
                               

              
                                  
                        </div>
                    <br>
                    
                              <div class="onglet" id="onglet3">
                                       <div class="position_table">
                
                                    <div class="liste">
                                        <table cellspacing="0px"  class="table">   
                                            <tr>
                                                <th>Patient</th>
                                                <th>Medecin Traitant </th>
                                                <th>Medecin Appelant</th>
                                                <th>Date de création du dossier</th>
                                                <th></th>
                                                <th></th>
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
                                               <td><img class="icone_liste" src="Icones/icon_pdf.png" width="50px" heigh="50px"/></td>
                                        <?php
                                            } ?>
                                            </tr>
                                        <?php                             
                                            }?>
                                            </table>
                                    </div>
                            </div>
                        
                                  
                            
                        </div>
                          <div class="onglet" id="onglet4">
                                     <div class="position_table">
                
                                    <div class="liste">
                                        <table cellspacing="0px"  class="table">   
                                            <tr>
                                                <th>Patient</th>
                                                <th>Medecin Traitant </th>
                                                <th>Medecin Appelant</th>
                                                <th>Date de création du dossier</th>
                                                <th></th>
                                                <th></th>
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
                                               <td><img class="icone_liste" src="Icones/icon_pdf.png" width="50px" heigh="50px"/></td>
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
               $('.onglet3').hide();
            $('#onglet4').show();

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