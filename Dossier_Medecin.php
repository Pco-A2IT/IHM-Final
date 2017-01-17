<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <link href="CSS.css" type="text/css" rel="stylesheet"/>
        <title>Nouveau Médecin</title>  
    </head>
    
    <body>
    <div class="gris">
            <div  class="gris2">
             <div id="menu0" class="carreGris" ;>
                <h4>Logout</h4>
                <br>
                <a href="index.html"><img class="icone_hopital" src="logout.png"/></a>
            </div>     
            <div id="menu1" class="carreGris";>
                <h4>Suivi</h4>
                <img class="icone_calendrier" src="recapitulatif.png"/>
            </div>
            
            <div id="menu2" class="carreGris";>
                <h4>Services</h4>
                <img class="icone_hopital" src="hopital.PNG"/>
            </div>
                
            <div id="menu3" class="carreGris";>
                <h4>Patients</h4>    
                <img class="icone_patient" src="icone_bonhomme.png"/>
            </div> 
            <div id="menu4" class="carreGris" style="background-color:#1270B3";>
                <h4>Médecins</h4>    
                <img class="icone_patient" src="icone_bonhomme.png"/>
            </div> 
            
            <script src="General.js"></script>
            <div class="titre";   style="border-radius: 5px;">
                <h1 class="titreGauche">Nouveau Médecin</h1>
            </div>
            <div class="blanc";   style="border-radius: 5px;">
                <div class="section4">
                    <div class="div1">
                     <img src='medecin.png' align='left' alt='sorry' width="60px" heigh="60px"><h1 style="color:grey">.... ....</h1><br>
                    </div>
                    
            <div class="onglet" id="onglet1">
                    <div id="container">
                    <form action="AjoutBDD_dossierMedecin.php" method="post"> 
                    <table align="left" cellspacing="5px" class="table"> 
                            <tr>
                            <td align="right">N°Adeli:</td> 
                            <td align="left"><input type="text" name="" placeholder="nom" required/></td>
                            </tr>
                            <tr> 
                            <td align="right">Civilité:</td>
                            <td align="left"><input type="text" name="civilite_m" placeholder="civilité" list="c"/>
                                <datalist id="c">
                                        <option>Mr</option>
                                        <option>Mme</option>
                                </datalist>
                                </td>
                            </tr>
                            <tr>
                            <td align="right">Nom:</td> 
                            <td align="left"><input type="text" name="nom_m" placeholder="nom" required/></td>
                            </tr>
                            <tr>
                            <td align="right">Prénom:</td> 
                            <td align="left"><input type="text" name="prenom_m" placeholder="prénom" required/></td>
                            </tr>  
                            <tr> 
                            <td align="right">Mail:</td>
                            <td align="left">
                                <input type="email" name="mail_m" placeholder="mail" id="email" required/></td> 
                            </tr> 
                            <tr> 
                            <td align="right">Téléphone:</td> 
                            <td align="left"> 
                            <input type="tel" pattern="[0-9]{10}" id="p" name="telephone_m" placeholder="Input 10 numbers" /> 
                            </td> 
                            </tr> 
                    </table> 

                    <table align="right" cellspacing="5px" class="table"> 
                            <tr> 
                            <td align="right"> Service: 
                            </td> 
                            <td align="left"> 
                            <input type="text" name="nom_s" placeholder="Rue,Résidence" required/>
                            </td>
                            </tr>
                            <tr> 
                            <td align="right"> Centre: 
                            </td> 
                            <td align="left"> 
                            <input type="text" name="nom_c" placeholder="Rue,Résidence" required/>
                            </td>
                            </tr>
                            <tr> 
                            <td align="right">Ville:</td> 
                            <td align="left"> 
                            <input type="text" name="ville_m" placeholder="choisir une ville"/> 
                            </td> 
                            </tr> 
                            <tr>
                            <td align="right"> Adresse: 
                            </td> 
                            <td align="left"> 
                            <input type="text" name="adresse_m" placeholder="Rue,Résidence" required/>
                            </td> 
                            </tr>
                            <tr> 
                            <td align="right">Code Postale:</td> 
                            <td align="left"> 
                            <input type="number" pattern="[0-9]{6}" id="p" name="codePostal_m" placeholder="Input 6 numbers" /> 
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
