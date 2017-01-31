<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <link href="css/General.css" type="text/css" rel="stylesheet"/>
        <title>Service</title>    

    </head>
    
    <body>
    <form action="./Interaction-BDD/AjoutBDD_Service.php" method="post">    
    <div class="gris">
              <div  class="gris2">
                 <div id="menu0" class="carreGris";>
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
                        
            <div id="menu3" class="carreGris" style="background-color:#1270B3";>
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
            <h1 class="titreGauche">Nouveau Service</h1>
        </div>
        <div class="blanc";   style="border-radius: 5px;">
            <div class="section4">
            <div class="div1">
             <img src='Icones/hopital_bleu.png' align='left' alt='sorry' width="50px" heigh="50px"><h1 style="color:black";>... ...</h1><br>
            </div>
            
         <div id="container">

            <div id="titles"> 
                <span class="title active"  target="onglet1"> Service</span> 
                <span class="title" target="onglet3"> Examens</span> 
            </div>

            <div class="onglet" id="onglet1">
                <form action="./Interaction-BDD/AjoutBDD_Service.php" method="post"> 
                    <table align="left" cellspacing="5px" class="table"> 
                        <tr> 
                                <td align="right">Service:</td>
                                <td align="left"><input type="text" name="service_s" id="nom_s" placeholder="(ex: Service Neurologie)" required/>
                        </tr>
                        <tr> 
                                <td align="right">Centre:</td>
                                <td align="left"><input type="text" name="centre_s" id="centre_s" placeholder="(ex: UNV Lyon)" required/>
                        </tr>
                        <tr> 
                                <td align="right">Numéro Siret:</td>
                                <td align="left"><input type="text" name="siret_s" id="hopital_s" placeholder="(ex: 12345678)"/>
                        </tr>
                         <tr> 
                                <td align="right">Téléphone:</td>
                                <td align="left"><input type="tel" pattern="^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$" name="telephone_s" id="telephone_s" placeholder="(ex: 0946243546)" minlength=10 maxlength=10/>
                        </tr>    
                    </table> 
                    
                    <table align="right" cellspacing="5px" class="table"> 
                        <tr>
                            <td>Horaires Ouverture</td>
                            <td>
                                <script language="JavaScript">writeSource("js10");</script>
                                <input class="inputDate" name="heured" id="heured" value="" size="2" type="text"  placeholder="h"> :
                               <input class="inputDate" name="mind" id="mind"value="" size="2" type="text"  placeholder="mn"> 
                                à
                                <input class="inputDate" name="heuref" id="heuref" value="" size="2" type="text"  placeholder="h"> :
                                <input class="inputDate" name="minf" id="minf"value="" size="2" type="text"  placeholder="mn">
                            </td>
                        </tr>
                        <tr>
                            <td align="right"> Adresse: 
                            </td> 
                            <td align="left"> 
                            <input type="text" name="adresse_s" placeholder="(ex: 26, rue de l'hôpital)"/>
                            </td> 
                        </tr>
                        <tr> 
                            <td align="right">Code Postale:</td> 
                            <td align="left"> 
                            <input type="number" pattern="[0-9]{6}" id="p" name="codePostal_s" placeholder="(ex: 69100)"/> 
                            </td> 
                        </tr>
                        <tr> 
                            <td align="right">Ville:</td> 
                            <td align="left"> 
                            <input type="text" name="ville_s" placeholder="(ex: Bron)"/> 
                            </td> 
                        </tr>
                        <tr height="60px"> 
                            <td align="center"  colspan="2"> 
                                <input align="center" type="submit" accesskey="enter" value="Valider" id="btn" onmousemove="changeBgColor('btn')" onmouseout="recoverBgColor('btn');" class="submit" formmethod="post"/> 
                            </td> 
                        </tr> 
                    </table>
                </form>
             </div>
                
            <div class="onglet" id="onglet3">
                       <table align="center" cellspacing="5px" class="table"> 
                            <tr> 
                            <td rowspan=3>Examens disponibles</td> 
                            <td>IRM</td> 
                            <td><input type="radio" name="choix1_ligne1" value="0"/></td>
                            </tr> 
                            <tr> 
                            <td>Bilan cardiaque</td>
                            <td><input type="radio" name="choix1_ligne2" value="1"/></td> 
                            </tr> 
                            <tr> 
                            <td>Consultation neuro</td>
                            <td><input type="radio" name="choix1_ligne3" value="2"/></td> 
                            </tr>
                            <tr>
                            <td align="center"  colspan="2"> 
                                <input align="center" type="submit" accesskey="enter" value="Valider" id="btn" onmousemove="changeBgColor('btn')" onmouseout="recoverBgColor('btn');" class="submit" formmethod="post"/> 
                            </td> 
                             </tr>
                    </table>
                </div> 
                </div>
        </div>
        </div>
        </div>
        </div>
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
