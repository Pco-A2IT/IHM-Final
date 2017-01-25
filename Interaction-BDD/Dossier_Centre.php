<!DOCTYPE html>
<html>
    <head>
        <title>Dossier Centre</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <link rel="stylesheet" href="CSS.css" />
        <title>Dossier patient</title>
    </head>
    
    <body>
    <form action="AjoutBDD_DossierCentre.php" method="post">
    <div class="gris">
            <div  class="gris2">
            <div  class="carreGris" id="menu1";>
                <h4>Menu</h4>
                <img class="icone_menu" src="Menu.PNG"/>
            </div>
                            
             <div id="menu5" class="carreGris";>
                <img class="icone_calendrier" src="calendrier.png"/>
                </div>
            
            <div id="menu3" class="carreGris";>
                <h4>Liste Centres</h4>
                <img class="icone_hopital" src="hopital.PNG"/>
            </div>
                
            <div id="menu2" class="carreGris";>
                <h4>Liste patients</h4>    
                <img class="icone_patient" src="icone_bonhomme.png"/>
            </div>
                           
                
            <div id="menu4" class="carreGris";>
                <h4>Nouveau Patient</h4>
                <img class="icone_dossier" src="ajouter.png"/>
            </div>
    <div class="titre";   style="border-radius: 5px;">
        <h1 class="titreGauche">Dossier Centre</h1>
        <div class="myButton">
            <input type="submit" value="Modifier" class="Valider" onclick="<script> console.log('clic') </script>"  />
            <a href="#" class="myButton2">Supprimer</a>
        </div>
    </div>
    <div class="blanc";   style="border-radius: 5px;">
            <div class="section4">
            <div class="div1">
             <img src='hospital.png' align='left' alt='sorry' width="60px" heigh="60px"><h1 style="color:black">Unité Neurovasculaire de Lyon</h1><br>
            </div>
            <p class="date" style="color:black">Date création dossier : 
                <script language="JavaScript">writeSource("js10");</script>
                <input name="date10_jour" value="" size="1" type="text"  placeholder="jj"> /
                <input name="date10_mois" value="" size="1" type="text"  placeholder="mm"> /
                <input name="date10_annee" value="" size="2" type="text"  placeholder="aaaa">
            </p>
            
            
         <div id="container">
            <div class="onglet" id="onglet1">
                <div class="infos1_patient">
                    <table>
                        <tr>
                          <tr>
                            <th>Sevice</th>
                            <td><input type="text" name="service_p" id="nom_p"/></td>
                        </tr>
                        <tr>
                            <th>Téléphone</th>
                            <td><input type="text" name="telephone_p" id="telephone_p"/></td>
                        </tr>
                        <tr>
                            <th>Horaire Ouverture</th>
                            <td>
                                <script language="JavaScript">writeSource("js10");</script>
                                <input class="inputDate" name="date10_jour" id="date10_jour" value="" size="2" type="text"  placeholder="h"> :
                                <input class="inputDate" name="date10_mois" id="date10_mois"value="" size="2" type="text"  placeholder="mn"> /
                                
                                <input class="inputDate" name="date10_jour" id="date10_jour" value="" size="2" type="text"  placeholder="h"> :
                                <input class="inputDate" name="date10_mois" id="date10_mois"value="" size="2" type="text"  placeholder="mn"> 
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="infos2_patient">
                    <table>
                        <tr>
                            <th>Adresse</th>
                            <td><input type="text" name="adresse_p" id="adresse_p"/></td>
                        </tr>
                        <tr>
                            <th>Ville</th>
                            <td><input type="text" name="ville_p" id="ville_p"/></td>
                        </tr>
                        <tr>
                            <th>Code postal</th>
                            <td><input type="text" name="codePostal_p" id="codePostal_p"/></td>
                        </tr>
                </table>
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
