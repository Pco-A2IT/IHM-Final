<?php 
require 'inc/functions.php';
logged_only();
require 'inc/header.php'; 
include('config.php');
?>

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
                        <h4>Outils</h4>
                        <img class="icone_menu" src="Icones/parametres_blanc.png"/>
                    </div>
                        
                    <script src="js/General.js"></script>
                    <div class="titre";   style="border-radius: 5px;">
                        <h1 class="titreGauche">Services</h1>
                    </div>

                    <div class="blanc";   style="border-radius: 5px;">
                        <div class="section4">
                            <div class="div1">
                                <br><img src='Icones/hopital_bleu.png' align='left' alt='sorry' width="50px" heigh="50px"><h2 style="color:grey";>Nouveau Service<br></h2>
                                <br><br><br><br>
                            </div>
                            <div id="titles"> 
                                <span class="title active"  target="onglet1"> Service</span> 
                                <span class="title" target="onglet3"> Examens</span> 
                            </div>

                            <div class="onglet" id="onglet1">
                                <table  cellspacing="5px" class="table" style="float:left"> 
                                    <tr> <td align="left" style="color:grey" style="font-style:italic">* Champs obligatoires </td></tr>
                                    <tr> 
                                        <td align="right">Service/Centre d'examen: *</td>
                                        <td align="left"><input type="text" name="service_s" id="nom_s" placeholder="(ex: Service Neurologie)" required/></td>
                                    </tr>
                                    <tr> 
                                        <td align="right">Hôpital:</td>
                                        <td align="left"><input type="text" name="centre_s" id="centre_s" placeholder="(ex: UNV Lyon)"/>
                                    </tr>
                                    <tr> 
                                        <td align="right">Téléphone: *</td>
                                        <td align="left"><input type="tel" pattern="[0-9]{10}" name="telephone_s" id="telephone_s" placeholder="(ex: 0946243546)" autocomplete="off" required/>
                                    </tr>    
                                </table> 
                    
                                <table cellspacing="5px" class="table" style="float:left"> 
                                    <tr>
                                        <td>Horaires ouverture</td>
                                        <td>
                                            <script language="JavaScript">writeSource("js10");</script>

                                            <input id="heured" name="heured" type="time" value=""/> 
                                            <br> à <br>
                                            <input id="heuref" name="heuref" type="time" value=""/>

                                        </td>
                                    </tr>
                                    <tr> 
                                        <td align="right">Ville: *</td> 
                                        <td align="left"> 
                                        <input type="text" name="ville_s" placeholder="(ex: Bron)" required/> 
                                        </td> 
                                    </tr>
                                    <tr>
                                        <td align="right"> Adresse: *
                                        </td> 
                                        <td align="left"> 
                                        <input type="text" name="adresse_s" placeholder="(ex: 26, rue de l'hôpital)" autocomplete="off" required/>
                                        </td> 
                                    </tr>
                                    <tr> 
                                        <td align="right">Code Postal: *</td> 
                                        <td align="left"> 
                                        <input type="text" pattern="[0-9]{5}" id="p" name="codePostal_s" placeholder="(ex: 69100)" required/> 
                                        </td> 
                                    </tr>
                                    <tr height="60px">
                                        <td align="center"  colspan="2">
                                            <TEXTAREA name="description_s" rows="3" cols="40" placeholder="Commentaires"></TEXTAREA> 
                                        </td>
                                    </tr>
                                </table>

                            </div>
                            <input type="submit" accesskey="enter" value="Valider"  onmousemove="changeBgColor('btn')" onmouseout="recoverBgColor('btn');" class="submit position_submit" id="btn" formmethod="post"/> 

                            <div class="onglet" id="onglet3">
                                <div class="position_table">
                                    <div class="liste">
                                        <table align="center" cellspacing="5px" class="table">

                                            <tr>
                                                <th></th>
                                                <td>Examens disponibles</td>
                                            </tr>
    <?php
        $compteur=1;
        $reponse = $bdd->query('SELECT * FROM Examen');
        while($dnn = $reponse->fetch()){
    ?>
                                            <tr>
                                                <td><?php print_r($dnn['typeExamen']); ?></td> 
                                                <td><input type="checkbox" name="<?php echo($compteur); ?>" value="YES"/></td>
    <?php $compteur=$compteur+1; ?>
                                            </tr>
    <?php
        };
    ?>
                           
                                        </table>
                                    </div>    
                                </div> 
                            </div>                                    
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </body>
</html>
    
<?php require 'inc/footer.php'; ?>

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
