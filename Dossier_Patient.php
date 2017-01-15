<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <link href="CSS.css" type="text/css" rel="stylesheet"/>
        <title>Nouveau patient</title>    
    </head>
    
    <body>
    <form action="AjoutBDD_dossierPatient.php" method="post">    
    <div class="gris">
                     <div  class="gris2">
                             
            <div id="menu1" class="carreGris";>
                <h4>Suivi</h4>
                <img class="icone_calendrier" src="recapitulatif.png"/>
            </div>
            
            <div id="menu2" class="carreGris";>
                <h4>Services</h4>
                <img class="icone_hopital" src="hopital.PNG"/>
            </div>
                
            <div id="menu3" class="carreGris" style="background-color:#1270B3" ;>
                <h4>Patients</h4>    
                <img class="icone_patient" src="icone_bonhomme.png"/>
            </div> 
            <div id="menu4" class="carreGris";>
                <h4>Médecins</h4>    
                <img class="icone_patient" src="icone_bonhomme.png"/>
            </div> 
            
            <script src="General.js"></script>
    <div class="titre";   style="border-radius: 5px;">
        <h1 class="titreGauche">Nouveau Patient</h1>
    </div>
    <div class="blanc";   style="border-radius: 5px;">
            <div class="section4">
            <div class="div1">
             <img src='patient.png' align='left' alt='sorry' width="50px" heigh="50px"><h1 style="color:black";>... ...</h1><br>
            </div>
            
         <div id="container">

            <div id="titles"> 
                <span class="title active"  target="onglet1"> Patient</span> 
                <span class="title" target="onglet3"> Examens</span> 
            </div>

            <div class="onglet" id="onglet1">
                <div class="infos1_patient">
                    <iframe  frameborder="0" width="100%" height="100%" src="test_dossierPatient.php">
                  </iframe>
                </div>
            </div>
            <div class="onglet" id="onglet3">
                     <table cellspacing='0'>   
                        <tr>
                            <th></th>
                            <th>Examen</th>
                            <th style="text-align:center">Réalisé</th>
                        <tr>
                            <td rowspan="3"> 1ère intention  </td>
                            <td>Scan cérébral</td>
                            <td><INPUT type="checkbox" name="ScanC" id="ScanC"value="1"/></td>
                        </tr>
                        <tr>
                            <td>AngioScan ou Echo Doppler</td>
                            <td><INPUT type="checkbox" name="AngioScan" id="AngioScan" value="1"/></td>
                        </tr>
                        <tr>
                            <td>Bilan biologique</td>
                            <td><INPUT type="checkbox" name="BilanBiologique" id="BilanBiologique" value="1"/></td>
                        </tr>
                         <tr>
                            <td rowspan="3"> 2nd intention  </td>
                            <td>Bilan Cardiaque</td>
                            <td><INPUT type="checkbox" name="ScanC" id="ScanC"value="1"/></td>
                        </tr>
                        <tr>
                            <td>RDV neurologue</td>
                            <td><INPUT type="checkbox" name="AngioScan" id="AngioScan" value="1"/></td>
                        </tr>
                    </table>
                </div>
        </div>
        </div>
        </div>
        </div>
        </div>
         <script src="General.js"></script>
        </form>
    </body>

</html>

     <script>

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
