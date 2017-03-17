<?php
   include('config.php');
?>
<html>
    <head>
        <title>Récapitulatif</title>
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
                <div class="titre"; style="border-radius: 5px;">
                    <h1 class="titreGauche">Suivi</h1>
                </div>
                
                <div class="blanc";   style="border-radius: 5px;">
                    <!--
                    <p class="date" style="color:black">
                      <script language="JavaScript">writeSource("js10");</script>
                    </p>
                    -->
                    <div class="section4">
                            <div class="ongletC" id="ongletC1">
                                <div class="section_centre">
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
                                 <table  cellspacing="5px" class="table">
                                     <!-- Ligne d'en-tête -->
                                    <tr>
                                        <th><strong>Patient</strong></th>
                                        <?php
                                        $req1= $bdd->prepare('SELECT * FROM Examen');
                                        $req1->execute();
                                        $nbexam=1;
                                        while($dnn1= $req1->fetch()){
                                        ?>
                                            <th><strong><?php echo "Examen $nbexam"; ?></strong></th>
                                        <?php
                                            $nbexam=$nbexam+1;
                                        }
                                        ?>
                                    </tr>
                                    
                                        <?php
                                        $req2= $bdd->prepare('SELECT * FROM Patient');
                                        $req2->execute();
                                        while($dnn2= $req2->fetch()){
                                            $id_patient= $dnn2["id_patient"];
                                            $patientaAfficher=false;
                                            $req3= $bdd->prepare('SELECT * FROM Examen_patient WHERE id_patient=?');
                                            $req3->execute(array($id_patient));
                                            while($dnn3= $req3->fetch()){
                                                if($dnn3["effectue"]==true && strtotime($dnn3["date_examen"]) <= strtotime(date("Y-m-d")) ){
                                                    $patientaAfficher=true;
                                                }
                                            }
                                            if($patientaAfficher==true){
                                        ?>
                                    <!-- Ligne nom d'examen -->
                                    <tr>
                                        <td rowspan="4"><span class=type><?php echo $dnn2["nom_p"]; ?></span><br><?php echo $dnn2["prenom_p"]; ?><br><I>06 85 47 51 45</I></td>
                                        
                                        <?php
                                        $req4= $bdd->prepare('SELECT * FROM Examen');
                                        $req4->execute();
                                        while($dnn4= $req4->fetch()){
                                            $req41= $bdd->prepare('SELECT * FROM Examen_patient WHERE id_patient=? AND id_examen=?');
                                            $req41->execute(array($id_patient, $dnn4["id_examen"]));
                                            
                                            $rows = $req41->fetchAll();
                                            if (count($rows) == 0) {
                                        ?>
                                        <?php
                                            }
                                       
                                            else {
                                                $req41= $bdd->prepare('SELECT * FROM Examen_patient WHERE id_patient=? AND id_examen=?');
                                                $req41->execute(array($id_patient, $dnn4["id_examen"]));
                                                    while($dnn41= $req41->fetch()){
                                                        if(strtotime($dnn41["date_examen"]) <= strtotime(date("Y-m-d")) ){
                                        ?>
                                                            <td><span class=type><?php echo $dnn4["typeExamen"]; ?></span></td>
                                        <?php
                                                        }
                                                    }
                                            }
                                        }
                                        ?>
                                    </tr>
                                    <?php
                                        
                                    ?>
                                    <tr>
                                    <?php
                                        $req5= $bdd->prepare('SELECT * FROM Examen');
                                        $req5->execute();
                                        while($dnn5= $req5->fetch()){ 
                                            $req6= $bdd->prepare('SELECT * FROM Examen_patient WHERE id_patient=? AND id_examen=?');
                                            $req6->execute(array($id_patient, $dnn5["id_examen"]));
                                            while($dnn6= $req6->fetch()){
                                                if(strtotime($dnn6["date_examen"]) <= strtotime(date("Y-m-d")) ){
                                                    $req7= $bdd->prepare('SELECT * FROM Service WHERE id_service=?');
                                                    $req7->execute(array($dnn6["id_service"]));
                                                    while($dnn7= $req7->fetch()){
                                    ?>
                                                        <td><?php echo $dnn7["centre_s"]." ".$dnn7["nom_s"]; ?></td>
                                     <?php
                                                    }
                                                }  
                                            }
                                        }
                                        
                                    ?>
                                    </tr>
                                    <tr>
                                    <?php
                                        $req5= $bdd->prepare('SELECT * FROM Examen');
                                        $req5->execute();
                                        while($dnn5= $req5->fetch()){       
                                            $req6= $bdd->prepare('SELECT * FROM examen_patient WHERE id_patient=? AND id_examen=?');
                                            $req6->execute(array($id_patient, $dnn5["id_examen"]));
                                            while($dnn6= $req6->fetch()){
                                                if(strtotime($dnn6["date_examen"]) <= strtotime(date("Y-m-d")) ){
                                    ?>
                                                    <td><?php echo $dnn6["date_examen"]; ?><br><?php echo $dnn6["heure_examen"]; ?></td>
                                    <?php
                                                }
                                            }
                                        }
                                    ?>
                                    </tr>
                                    <tr>
                                    <?php
                                    $req5= $bdd->prepare('SELECT * FROM Examen');
                                    $req5->execute();
                                    while($dnn5= $req5->fetch()){
                                        $req51= $bdd->prepare('SELECT * FROM Examen_patient WHERE id_patient=? AND id_examen=?');
                                        $req51->execute(array($id_patient, $dnn5["id_examen"])); 
                                        $rows = $req51->fetchAll();
                                        if (count($rows) != 0) {
                                            $req51= $bdd->prepare('SELECT * FROM Examen_patient WHERE id_patient=? AND id_examen=?');
                                            $req51->execute(array($id_patient, $dnn5["id_examen"]));
                                            while($dnn51= $req51->fetch()){
                                                if(strtotime($dnn51["date_examen"]) <= strtotime(date("Y-m-d")) ){
                                                    if($dnn51["effectue"] == "YES"){
                                    ?>
                                                        <td><input type="checkbox" id="choix3_ligne1" value="0" class="regular-checkbox small-checkbox" checked/><label for="choix3_ligne2" ></label>Réalisé
                                                        <input type="checkbox" id="choix3_ligne2" value="1" class="regular-checkbox small-checkbox" /><label for="choix3_ligne2"></label>Non effectué</td>
                                    <?php
                                                    }
                                                    else{
                                    ?>
                                                        <td><input type="checkbox" id="choix3_ligne1" value="0" class="regular-checkbox small-checkbox" /><label for="choix3_ligne1"></label>Réalisé<input type="checkbox" id="choix3_ligne2" value="1" class="regular-checkbox small-checkbox" /><label for="choix3_ligne2"></label>Non effectué</td>
                                    <?php
                                                     
                                                    }
                                            }
                                            }
                                        }
                                    
                                    
                                        }
                                    ?>
                                    </tr>
                                    <?php
                                        }
                                    }
                                    ?>
                                    <!--
                                    <tr>
                                        <td rowspan="5"><span class=type>Sophie Martin</span><br><I>06 85 47 51 45</I></td>
                                        <td><span class=type>Consultation neuro</span></td>
                                        <td rowspan="5"><I>Aucun examen à venir</I></td>
                                        <td rowspan="5"><I>Aucun examen à venir</I></td>
                                        <td rowspan="5"> 
                            <a href="Dossier_Medecin.php" class="myButton"><img class="icone_ajouter" src="Icones/icone_email.png"> Envoyer récapitulatif au médecin</a> </td>
                                    </tr>
                                    <tr>
                                        <td>UNV Lyon</td>
                                    </tr>
                                    <tr>
                                        <td>04/01/2017</td>
                                    </tr>
                                    <tr>
                                        <td>14:00</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" id="choix4_ligne1" value="0" class="regular-checkbox small-checkbox" /><label for="choix4_ligne1"></label>Réalisé<input type="checkbox" id="choix4_ligne2" value="1" class="regular-checkbox small-checkbox" /><label for="choix4_ligne2"></label>Non effectué</td>
                                    </tr>
                                    
                                    <tr>
                                        <td rowspan="5"><span class=type>Isabelle Albert</span><br><I>06 85 47 51 45</I></td>
                                        <td><span class=type>Hospitalisation de Jour</span></td>
                                        <td rowspan="5"><I>Aucun examen à venir</I></td>
                                        <td rowspan="5"><I>Aucun examen à venir</I></td>
                                        <td rowspan="5"> 
                            <a href="Dossier_Medecin.php" class="myButton"><img class="icone_ajouter" src="Icones/icone_email.png"> Envoyer récapitulatif au médecin</a> </td>
                                    </tr>
                                    <tr>
                                        <td>UNV Lyon</td>
                                    </tr>
                                    <tr>
                                        <td>04/01/2017</td>
                                    </tr>
                                    <tr>
                                        <td>10:00</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" id="choix5_ligne1" value="0" class="regular-checkbox small-checkbox" /><label for="choix5_ligne1"></label>Réalisé<input type="checkbox" id="choix5_ligne2" value="1" class="regular-checkbox small-checkbox" /><label for="choix5_ligne2"></label>Non effectué</td>
                                    </tr>
                                -->
                                </table>
                            </div>
 
                                
                            </div>
                        </div>
                        
                            
                            <div class="ongletC" id="ongletC2" >
                                <!--
                                <div class="section_centre">
                                 <table align="center" cellspacing="5px" cellpadding="15px" class="table">    
                                
                                    <tr>
                                        <td><span class=type>Sophie Martin</span>
                                        <td>a effectué son dernier examen</td>
                                        <td><a href=".html" class="myButton">Envoyer récapitulatif</a></td>
                                    </tr>
                                    <tr>
                                       <td><span class=type>Isabelle Albert</span>
                                        <td>a effectué son dernier examen</td>
                                        <td><a href="Dossier_Patient.html" class="myButton">Envoyer récapitulatif</a></td>
                                    </tr>
                        
                                </table>

                                </div>
                                -->

            
                    </div>

                </div>

            </div>

                 </div>
        </div>
        </div>
    </body>
</html>
<script>

        $(document).ready(function(){

           
            //Initialisation : on cache tous les onglets puis on affiche le premier
            $('.ongletC').hide();
            $('#ongletC1').show();

            //Quand on clique sur un titre
            $('.title').on('click',function(){

                // On recupere le div global id = container
                var container = $(this).parent().parent();

                $('.active').removeClass('active');

                
                // On cache tous les onglets
                container.children('.ongletC').hide();

                //On affiche celui correspondant à l'attribut target
                container.children('#'+$(this).attr('target')).show();
                $(this).addClass("active");
            });
         }); 
        
    </script>
