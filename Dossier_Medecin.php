<!-- Page pour l'affichage d'un dossier patient. Y sont gérés :
-L'affichage du menu
-L’autocomplétion des champs du service et la spécialité du médecin -->

<?php 
    require 'inc/functions.php';
    logged_only();
    require 'inc/header.php'; 
    include('config.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <link href="css/General.css" type="text/css" rel="stylesheet"/>
        <link href="css/General.css" type="text/css" rel="stylesheet"/>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> 
        <title>Médecins</title>  
    </head>
    
    <body>
        <!-- inclusion de jQuery et jQuery.ui-->
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <div class="gris">
            <div  class="gris2">
                <div id="menu0" class="carreGris";>
                    <h4>Patients</h4>    
                    <img class="icone_menu" src="Icones/patient_blanc.png"/>
                </div> 
                <div id="menu1" class="carreGris";>
                    <h4>Tableau de bord</h4>
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
                    <h4>Outils</h4>
                    <img class="icone_menu" src="Icones/parametres_blanc.png"/>      
                </div>
            </div> 
            <script src="js/General.js"></script>
            <div class="titre";   style="border-radius: 5px;">
                <h1 class="titreGauche">Médecins</h1>
            </div>
            <div>
                <div class="blanc";   style="border-radius: 5px;">
                    <form action="./Interaction-BDD/AjoutBDD_dossierMedecin.php" method="post"> 
                        <div class="section4">
                                <br><img src='Icones/medecin_bleu.png' align='left' alt='sorry' width="60px" heigh="60px"><h2 style="color:grey";>Nouveau Médecin </h2><br>
                                <br>
                            <style>
                                #divConteneur3{
                                       min-height:500px;
                                        height:500px;
                                        min-width:100%;
                                        width:100%;
                                        overflow:auto;/*pour activer les scrollbarres*/
                                        }   
                            </style>
                            <div id="divConteneur3">
                                <div class="onglet_d" >
                                    <table cellspacing="5px" class="table" style="float:left"> 
                                        <tr> 
                                            <td align="left" style="color:grey" style="font-style:italic">* Champs obligatoires </td>
                                        </tr>
                                        <tr>
                                            <td align="right">Nom: *</td> 
                                            <td align="left">
                                                <input type="text" name="nom_m" placeholder="(ex: Dupont)" autocomplete="off" required/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="right">Prénom: *</td> 
                                            <td align="left">
                                                <input type="text" name="prenom_m" placeholder="(ex: Marion)" autocomplete="off" required/>
                                            </td>
                                        </tr>  
                                        <tr> 
                                            <td align="right">Mail:</td>
                                            <td align="left">
                                                <input type="email" name="email_m" placeholder="(ex: adresse@gmail.com)" id="email" autocomplete="off"/>
                                            </td> 
                                        </tr> 
                                        <tr> 
                                            <td align="right">Téléphone:</td> 
                                            <td align="left">
                                                <input type="tel" pattern="[0-9]{10}" id="p" name="telephone_m" placeholder="(ex: 0786413073)" autocomplete="off" />
                                            </td> 
                                        </tr> 
                                    </table> 

                                    <table align="right" cellspacing="5px"  style="float:left"> 
                                        <tr> 
                                            <td align="right">Spécialité:</td> 
                                            <td align="left"> 
                                                <input type="text" id="specialite_m" name="specialite_m" placeholder="(ex: Neurologie)" autocomplete="off" />
                                            </td>
                                        </tr>
                                        <tr> 
                                            <td align="right">Service/Centre d'examen: </td> 
                                            <td align="left"> 
                                                <input type="text" id="service_m" name="service_m" placeholder="(ex:Service Neurologie)" autocomplete="off"/>
                                            </td>
                                        </tr>
                                        <tr> 
                                            <td align="right"> Hôpital: </td> 
                                            <td align="left"> 
                                                <input type="text" id="centre_m" name="centre_m" placeholder="(ex:Hôpital Pierre Weir)" autocomplete="off" />
                                            </td>
                                        </tr> 
                                        <tr>
                                            <td align="right"> Adresse: </td> 
                                            <td align="left"> 
                                                <input type="text" id="adresse_m" name="adresse_m" placeholder="(ex: 10, rue du tonkin)" autocomplete="off"/>
                                            </td> 
                                        </tr>
                                        <tr> 
                                            <td align="right">Code Postal:</td> 
                                            <td align="left"> 
                                                <input type="text" pattern="{6}" id="codePostal_m" name="codePostal_m" placeholder="(ex: 69100)" autocomplete="off"/> 
                                            </td> 
                                        </tr> 
                                        <tr> 
                                            <td align="right">Ville: *</td> 
                                            <td align="left"> 
                                                <input type="text" id="ville_m" name="ville_m" placeholder="(ex: Villeurbanne)" autocomplete="off" required/> 
                                            </td> 
                                        </tr>
                                        <tr>
                                            <td align="center"  colspan="2">
                                                <TEXTAREA name="description_m" rows="3" cols="30" placeholder="Commentaires"></TEXTAREA> 
                                            </td>
                                        </tr>         
                                    </table>
                                </div>
                                <input type="submit" accesskey="enter" value="Valider" onmousemove="changeBgColor('btn')" onmouseout="recoverBgColor('btn');" class="submit position_submit" id="btn" formmethod="post" /> 
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
       
        <script type="text/javascript">
            //utilisation de jQuery :
            $(function()   {
                $('#specialite_m').autocomplete({
                   source : 'dossierMedecin.php' 
                });
                $('#service_m').autocomplete({
                    source: function(request, response) {
				        $.ajax({
				            url: "autocompletionService.php", // Fichier servant à récuperer les valeurs dans la BDD
				            dataType: "json", // Définition du type de données que l'on reçoit de la part de autocompletionService.php
				            data: {nom: $("#service_m").val(), maxRows: 10}, // Valeur que l'on envoie pour la requête
                            type: 'POST', // Type d'envoie des données vers le serveur
				            // En cas de succès de récupération de données JSON :
                            success: function (data){
				                response( $.map( data, function( item ){ 
	                                return {
		                                label: item.nom_s + ", " + item.centre_s + ", " + item.ville_s,
		                                value: item
	                                }
                                }));
			                 }
                        });
                    },
                    minLength: 2,
                    select : function( event, ui ){
	                   var obj = ui.item.value;
	                       $( "#service_m" ).val( obj.nom_s )
	                       $( "#centre_m" ).val( obj.centre_s );
	                       $( "#adresse_m" ).val( obj.adresse_s);
	                       $( "#codePostal_m" ).val( obj.codePostal_s );
                           $( "#ville_m").val( obj.ville_s);
	                       return false;
                    }     
                });
            </script>
            <script src="General.js"></script>
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
