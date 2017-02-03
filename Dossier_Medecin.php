<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <link href="css/General.css" type="text/css" rel="stylesheet"/>
        <title>Nouveau Médecin</title>  
    </head>
    
    <body>
    <div class="gris">
            <div  class="gris2">
<<<<<<< HEAD
              <div id="menu0" class="carreGris";>
                    <h4>Patients</h4>    
                    <img class="icone_menu" src="Icones/patient_blanc.png"/>
                </div> 
                <div id="menu1" class="carreGris";>
                    <h4>Suivi</h4>
                    <img class="icone_suivi" src="Icones/recapitulatif.png"/>
                </div>
                <div id="menu2" class="carreGris" style="background-color:#1270B3";>
                    <h4>Médecins</h4>    
                    <img class="icone_menu" src="Icones/medecin_blanc.png"/>
                </div>
                <div id="menu3" class="carreGris";>
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
                    <h1 class="titreGauche">Nouveau Médecin</h1>
                </div>
                
                <div class="blanc";   style="border-radius: 5px;">
                    <div class="section4">
                        <div class="div1">
                        <img src='Icones/medecin_bleu.png' align='left' alt='sorry' width="60px" heigh="60px"><h1 style="color:grey">.... ....</h1><br>
                        </div>
                    
                            <div class="onglet" id="onglet1">
                                <div id="container">
                                    <form action="./Interaction-BDD/AjoutBDD_dossierMedecin.php" method="post"> 
                                        <table align="left" cellspacing="5px" class="table"> 
                                            
                                            <tr>
                                                <td align="right">Nom:</td> 
                                                <td align="left"><input type="text" name="nom_m" placeholder="(ex: Dupont)" required/></td>
                                            </tr>
                                            <tr>
                                                <td align="right">Prénom:</td> 
                                                <td align="left"><input type="text" name="prenom_m" placeholder="(ex: Marion)" required/></td>
                                            </tr>  
                                            <tr> 
                                                <td align="right">Mail:</td>
                                                <td align="left">
                                                    <input type="email" name="email_m" placeholder="(ex: adresse@gmail.com)" id="email"/>
                                                </td> 
                                            </tr> 
                                            <tr> 
                                                <td align="right">Téléphone:</td> 
                                                <td align="left"> 
                                                    <input type="tel" pattern="[0-9]{10}" id="p" name="telephone_m" placeholder="(ex: 0786413073)" /> 
                                                </td> 
                                            </tr> 
                                        </table> 

                                        <table align="right" cellspacing="5px" class="table"> 
                                            <tr> 
                                                <td align="right">Service:</td> 
                                                <td align="left"> 
                                                    <input type="text" name="service_m" placeholder="Rentrer Service associé" />
                                                </td>
                                            </tr>
                                            <tr> 
                                                <td align="right">Centre:</td> 
                                                <td align="left"> 
                                                    <input type="text" name="centre_m" placeholder="Rentrer Centre associé" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="right">Adresse:</td> 
                                                <td align="left"> 
                                                    <input type="text" name="adresse_m" placeholder="(ex: 10, rue du tonkin)"/>
                                                </td> 
                                            </tr>
                                            <tr> 
                                                <td align="right">Code Postale:</td> 
                                                <td align="left"> 
                                                    <input type="number" pattern="[0-9]{5}" id="p" name="codePostal_m" placeholder="(ex: 69100)"/> 
                                                </td> 
                                            </tr>
                                            <tr> 
                                                <td align="right">Ville:</td> 
                                                <td align="left"> 
                                                    <input type="text" name="ville_m" placeholder="(ex: Villeurbanne)"/> 
                                                </td> 
                                            </tr>
                                            <tr height="60px">
                                                <td align="center"  colspan="2">
                                                <input type="text" name="commentaire_m" placeholder="Commentaire éventuel"/> 
                                                </td> 
                                            </tr>
                                            <tr height="60px"> 
                                                <td align="center"  colspan="2"> 
                                                    <input type="submit" accesskey="enter" value="Valider" id="btn" onmousemove="changeBgColor('btn')" onmouseout="recoverBgColor('btn');" class="submit" formmethod="post"/> 
                                                </td> 
                                            </tr> 
                                        </table>
                                    </form>   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
=======
            <div id="menu0" class="carreGris";>
                <h4>Patients</h4>    
                <img class="icone_menu" src="Icones/patient_blanc.png"/>
            </div> 
            <div id="menu1" class="carreGris";>
                <h4>Suivi</h4>
                <img class="icone_suivi" src="Icones/recapitulatif.png"/>
            </div>
            <div id="menu2" class="carreGris" style="background-color:#1270B3";>
                <h4>Médecins</h4>    
                <img class="icone_menu" src="Icones/medecin_blanc.png"/>
            </div>
                        
            <div id="menu3" class="carreGris";>
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
        </div> 
            <script src="js/General.js"></script>
            <div class="titre";   style="border-radius: 5px;">
                <h1 class="titreGauche">Nouveau Médecin</h1>
            </div>
            <div class="blanc";   style="border-radius: 5px;">
                <div class="section4">
                    <div class="div1">
                     <img src='Icones/medecin_bleu.png' align='left' alt='sorry' width="60px" heigh="60px"><h1 style="color:grey">.... ....</h1><br>
                    </div>
    
                <div class="onglet" id="onglet1">
                    <form action="./Interaction-BDD/AjoutBDD_dossierMedecin.php" method="post"> 
                    </form>
                    <table cellspacing="5px" class="table" style="float:left"> 
                            
                            <tr>
                            <td align="right">Nom:</td> 
                            <td align="left"><input type="text" name="nom_m" placeholder="(ex: Dupont)" required/></td>
                            </tr>
                            <tr>
                            <td align="right">Prénom:</td> 
                            <td align="left"><input type="text" name="prenom_m" placeholder="(ex: Marion)" required/></td>
                            </tr>  
                            <tr> 
                            <td align="right">Mail:</td>
                            <td align="left">
                                <input type="email" name="email_m" placeholder="(ex: adresse@gmail.com)" id="email" required/></td> 
                            </tr> 
                            <tr> 
                            <td align="right">Téléphone:</td> 
                            <td align="left"> 
                            <input type="tel" pattern="[0-9]{10}" id="p" name="telephone_m" placeholder="(ex: 0786413073)" /> 
                            </td> 
                            </tr> 
                    </table> 
                    
                    <table align="right" cellspacing="5px" class="table" style="float:left"> 
                            <tr> 
                            <td align="right"> Service: 
                            </td> 
                            <td align="left"> 
                            <input type="text" name="service_m" placeholder="Rentrer Service associé" />
                            </td>
                            </tr>
                            <tr> 
                            <td align="right"> Centre: 
                            </td> 
                            <td align="left"> 
                            <input type="text" name="centre_m" placeholder="Rentrer Centre associé" />
                            </td>
                            </tr>
                            <tr> 
                            <td align="right">Ville:</td> 
                            <td align="left"> 
                            <input type="text" name="ville_m" placeholder="(ex: Villeurbanne)"/> 
                            </td> 
                            </tr> 
                            <tr>
                            <td align="right"> Adresse: 
                            </td> 
                            <td align="left"> 
                            <input type="text" name="adresse_m" placeholder="(ex: 10, rue du tonkin)" required/>
                            </td> 
                            </tr>
                            <tr> 
                            <td align="right">Code Postale:</td> 
                            <td align="left"> 
                            <input type="number" pattern="[0-9]{6}" id="p" name="codePostal_m" placeholder="(ex: 69100)" /> 
                            </td> 
                            </tr> 
                            <tr height="60px"> 
                            <td align="center"  colspan="2"> 
                                <FORM class=Zone_Texte>
                        <TEXTAREA name="nom" rows=4 cols=40>Commentaire éventuel</TEXTAREA>
                                </FORM>
                            <tr height="60px">
                            <td align="center"  colspan="2"> 
                                <input type="submit" accesskey="enter" value="Valider" id="btn" onmousemove="changeBgColor('btn')" onmouseout="recoverBgColor('btn');" class="submit" formmethod="post"/> 
                            </td> 
                            </tr>
                                </td>
                                
                </table>
                    </div>
          </div>
          </div>
    </div>

>>>>>>> master
            <script src="General.js"></script>
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
