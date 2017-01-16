<!DOCTYPE html>
<html>
    <head>
        <title>Nouveau Service</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <link rel="stylesheet" href="CSS.css" />
        
    </head>
    
    <body>
        <form action="AjoutBDD_Service.php" method="post">  
       <div class="gris">
            <div  class="gris2">
                             
            <div id="menu1" class="carreGris";>
                <h4>Suivi</h4>
                <img class="icone_calendrier" src="recapitulatif.png"/>
            </div>
            
            <div id="menu2" class="carreGris" style="background-color:#1270B3";>
                <h4>Services</h4>
                <img class="icone_hopital" src="hopital.PNG"/>
            </div>
                
            <div id="menu3" class="carreGris";>
                <h4>Patients</h4>    
                <img class="icone_patient" src="icone_bonhomme.png"/>
            </div> 
            <div id="menu4" class="carreGris";>
                <h4>Médecins</h4>    
                <img class="icone_patient" src="icone_bonhomme.png"/>
            </div> 
            
            <script src="General.js"></script>
    <div class="titre";   style="border-radius: 5px;">
        <h1 class="titreGauche">Nouveau Service</h1>
        <div class="myButton">
            <input type="submit" accesskey="enter" value="Valider" id="btn" onmousemove="changeBgColor('btn')" onmouseout="recoverBgColor('btn');" class="submit" formmethod="post"/>
        </div>
    </div>
    <div class="blanc";   style="border-radius: 5px;">
            <div class="section4">
            <div class="div1">
             <img src='hospital.png' align='left' alt='sorry' width="60px" heigh="60px"><h1 style="color:black">Nom du service</h1><br>
            </div>
            
            
         <div id="container">
            <div class="onglet" id="onglet1">
                <div class="infos1_patient">
                    <table>
                        <tr>
                          <tr>
                            <th>Service</th>
                            <td><input type="text" name="service_s" id="nom_s"/></td>
                        </tr>
                        <tr>
                                <th>Numero Siret</th>
                                <td><input type="text" name="siret_s" id="hopital_s"/></td>
                        </tr>
                         <tr>
                            <tr>
                                <th>Centre</th>
                                <td><input type="text" name="centre_s" id="centre_s"/></td>
                            </tr>
                        
                        <tr>
                            <th>Téléphone</th>
                            <td><input type="text" name="telephone_s" id="telephone_s"/></td>
                        </tr>
                        <tr>
                            <th>Horaires Ouverture</th>
                            <td>
                                <script language="JavaScript">writeSource("js10");</script>
                                <input class="inputDate" name="heured" id="heured" value="" size="2" type="time"  placeholder="h"> :
                               <input class="inputDate" name="mind" id="mind"value="" size="2" type="text"  placeholder="mn"> 
                                
                                <input class="inputDate" name="heuref" id="heuref" value="" size="2" type="text"  placeholder="h"> :
                                <input class="inputDate" name="minf" id="minf"value="" size="2" type="text"  placeholder="mn"> 
                            </td>
                        </tr>
                        </table>
                    
                            <TABLE>
                            <TR> 
                            <TD rowspan=3>Examens disponibles</TD> 
                            <TD >IRM</TD> 
                            <TD ><input type="radio" name="choix1_ligne1" value="0"/></TD>
                            </TR> 
                            <TR> 
                            <TD >Bilan cardiaque</TD>
                            <TD ><input type="radio" name="choix1_ligne2" value="1"/></TD> 
                            </TR> 
                            <TR> 
                            <TD >Consultation neuro</TD>
                            <TD ><input type="radio" name="choix1_ligne3" value="2"/></TD> 
                            </TR> 
                            </TABLE>
                        
                        
                    
                </div>
                <div class="infos2_patient">
                    <table>
                        <tr>
                            <th>Adresse</th>
                            <td><input type="text" name="adresse_s" id="adresse_s"/></td>
                        </tr>
                        <tr>
                            <th>Ville</th>
                            <td><input type="text" name="ville_s" id="ville_s"/></td>
                        </tr>
                        <tr>
                            <th>Code postal</th>
                            <td><input type="text" name="codePostal_s" id="codePostal_s"/></td>
                        </tr>
                </table>
                    <br><br>
                    <FORM class=Zone_Texte>
                        <TEXTAREA name="description_s" rows=10 cols=40>Description</TEXTAREA>
                    </FORM>
                </div>
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
