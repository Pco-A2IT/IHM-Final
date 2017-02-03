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
                    <h1 class="titreGauche">Récapitulatif</h1>
                </div>
                
                <div class="blanc";   style="border-radius: 5px;">
                      <p class="date" style="color:black">Date: 05/01/2017
                      <script language="JavaScript">writeSource("js10");</script>
                    </p>
                    <div class="section4">
                            <div class="ongletC" id="ongletC1">
                                <div class="section_centre">
                                 <table  cellspacing="5px" class="table">  
                                    <tr>
                                        <th><strong>Patient</strong></th>
                                        <th><strong>Examen 1</strong></th>
                                        <th><strong>Examen 2</strong></th>
                                        <th><strong>Examen 3</strong></th>
                                    </tr>
                                    <tr>
                                        <td rowspan="5"><span class=type>Vincent Pasteur</span><br><I>06 85 47 51 45</I></td>
                                        <td><span class=type>IRM</span></td>
                                        <td><span class=type>Bilan cardiaque</span></td>
                                        <td><span class=type>Consultation neuro</span></td>
                                         <td rowspan="5"> 
                            <a href="Dossier_Medecin.php" class="myButton"><img class="icone_ajouter" src="Icones/icone_email.png"> Envoyer récapitulatif au médecin</a> </td>
                                    </tr>
                                    <tr>
                                        <td>Neurologie Lyon</td>
                                        <td>Cardiologie Tonkin</td>
                                        <td>UNV Lyon</td>
                                    </tr>
                                    <tr>
                                        <td>02/01/2017</td>
                                        <td>03/01/2017</td>
                                        <td>05/01/2017</td>
                                        
                                    </tr>
                                    <tr>
                                        <td>10:00 - 11:00</td>
                                        <td>10:00 - 11:00</td>
                                        <td>14:00 - 15:00</td>
                                         
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" id="choix1_ligne1" value="0" class="regular-checkbox small-checkbox" /><label for="choix1_ligne1"></label>Réalisé<input type="checkbox" id="choix1_ligne2" value="1" class="regular-checkbox small-checkbox" /><label for="choix1_ligne2"></label>Non effectué</td>
                                        <td><input type="checkbox" id="choix2_ligne1" value="0" class="regular-checkbox small-checkbox" /><label for="choix2_ligne1"></label>Réalisé<input type="checkbox" id="choix2_ligne2" value="1" class="regular-checkbox small-checkbox" /><label for="choix2_ligne2"></label>Non effectué</td>
                                        <td><input type="checkbox" id="choix3_ligne1" value="0" class="regular-checkbox small-checkbox" /><label for="choix3_ligne1"></label>Réalisé<input type="checkbox" id="choix3_ligne2" value="1" class="regular-checkbox small-checkbox" /><label for="choix3_ligne2"></label>Non effectué</td>
                                    </tr>
                                    
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
                                        <td>14:00 - 15:00</td>
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
                                        <td>10:00 - 15:00</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" id="choix5_ligne1" value="0" class="regular-checkbox small-checkbox" /><label for="choix5_ligne1"></label>Réalisé<input type="checkbox" id="choix5_ligne2" value="1" class="regular-checkbox small-checkbox" /><label for="choix5_ligne2"></label>Non effectué</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                            
                            <div class="ongletC" id="ongletC2" >
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
            
                    </div>
                </div>
                <!--
                <div id="calendar" class="calendaire"><iframe  frameborder="0" width="300px" height="300px" src="calendar.html"/>
                </div>-->
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
