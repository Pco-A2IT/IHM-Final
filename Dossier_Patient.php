<!-- Page affichant le dossier d’un patient vide. Y sont gérés :
-	L'affichage du menu
-	L'affichage de la page (en HTML) ; 
-	L’autocomplétion des champs relatifs aux médecins ;
-	L’ajout d’un médecin traitant et/ou d’un médecin appelant lié(s) au patient. -->

<!--authentification-->
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
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> 

        <title>Nouveau patient</title>    

        <script language="javascript" type="text/javascript">  
	    $(document).ready(function() {
		$(".required").each(function() {
			var $this  = $(this);
			$(this).html("<font>*</font>"+$this.html());
		});
	    });

        </script>  
    </head>
    
    <body>
        <!-- inclusion de jQuery et jQuery.ui-->
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <form action="./Interaction-BDD/AjoutBDD_dossierPatient.php" method="post">
            <div class="gris">
                <div  class="gris2">
                    <div id="menu0" class="carreGris" style="background-color:#1270B3";>
                        <h4>Patients</h4>    
                        <img class="icone_menu" src="Icones/patient_blanc.png"/>
                    </div> 
                    <div id="menu1" class="carreGris";>
                        <h4>Tableau de bord</h4>
                        <img class="icone_suivi" src="Icones/recapitulatif.png"/>
                    </div>
                    <div id="menu2" class="carreGris" ;>
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

                    <script src="js/General.js"></script>

                    <div class="titre";   style="border-radius: 5px;">
                        <h1 class="titreGauche">Patients</h1>
                    </div>

                    <div class="blanc";   style="border-radius: 5px;">
                        <div class="section4">
                            <br><img src='Icones/patient_bleu.png' align='left' alt='sorry' width="50px" heigh="50px"><h2 style="color:grey";>Nouveau Patient<br></h2>
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
                                <div class="onglet_d">
                                    <form action="./Interaction-BDD/AjoutBDD_dossierPatient.php" method="post">
                                        <br>
                                        <table cellspacing="5px" class="table" >
                                            <tr>
                                                <td align="left" style="color:grey" style="font-style:italic">* Champs obligatoires </td>
                                            </tr>
                                            <tr> 
                                                <td align="right">Date des symptomes:</td> 
                                                <td align="left">
                                                    <input type="date" name="date_ait_p" value ="" style="color:#a9a9a9"/>
                                                </td> 
                                            </tr>
                                            <tr> 
                                                <td align="right">Civilité: *</td>
                                                <td align="left">
                                                    <section id="main">
                                                        <select id="choix" class="placeholder" onchange="changeColor(this);" name="civilite_p" style="background-color:eeeeee" required>
                                                            <option value="" >Civilité</option>
                                                            <option value="M.">M.</option>
                                                            <option value="Mme">Mme</option>
                                                        </select>
                                                    </section>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="right">Nom: *</td> 
                                                <td align="left">
                                                    <input type="text" name="nom_p" placeholder="(ex: Bardi)" autocomplete="off" required/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="right">Prénom: *</td> 
                                                <td align="left">
                                                    <input type="text" name="prenom_p" placeholder="(ex: Luigi)" autocomplete="off" required/>
                                                </td>
                                            </tr>  
                                            <tr> 
                                                <td align="right">Date de naissance:</td> 
                                                <td align="left">
                                                    <input type="date" name="birthday_p" value="" style="color:#a9a9a9"/>
                                                </td> 
                                            </tr>
                                            <tr> 
                                                <td align="right">Mail:</td>
                                                <td align="left">
                                                    <input type="email" name="mail_p" placeholder="(ex: adresse@gmail.com)" id="email" autocomplete="off"/>
                                                </td> 
                                            </tr> 
                                            <tr> 
                                                <td align="right">Téléphone:</td> 
                                                <td align="left"> 
                                                    <input type="tel" pattern="[0-9]{10}" id="p" name="telephone_p" placeholder="(ex: 0786413073)" autocomplete="off"/> 
                                                </td> 
                                            </tr> 
                                        </table> 
                                        <table cellspacing="5px" class="table">                                   
                                            <tr> 
                                                <td align="right">Adresse:</td> 
                                                <td align="left" colspan="2"> 
                                                    <input type="text" name="adresse_p" placeholder="(ex: 20, avenue albert Einstein)" autocomplete="off"/>
                                                </td> 
                                            </tr>
                                            <tr> 
                                                <td align="right">Code Postal:</td> 
                                                <td align="left" colspan="2"> 
                                                    <input type="text" pattern="[0-9]{5}" id="codePostal_p" name="codePostal_p" placeholder="(ex: 69100)" autocomplete="off" /> 
                                                </td> 
                                            </tr> 
                                            <tr> 
                                                <td align="right">Ville: *</td> 
                                                <td align="left" colspan="2"> 
                                                    <input type="text" id="ville_p" name="ville_p" placeholder="(ex: Lyon)" autocomplete="off" required/> 
                                                </td> 
                                            </tr> 
                                            <tr>
                                                <td align="right" rowspan="2">Médecin traitant:</td> 
                                                <td align="left"> 
                                                    <input style="width:140px" type="text" id="nom_m_traitant" name="nom_m_traitant"  placeholder="Nom: *" required/>
                                                </td>
                                                <td align="left"> 
                                                    <input style="width:140px" type="text" id="prenom_m_traitant" name="prenom_m_traitant" placeholder="Prénom: *" autocomplete="off" required/>
                                                </td>    
                                            </tr>
                                            <tr>
                                                <td align="left">
                                                    <input style="width:140px" type="text" id="ville_m_traitant" name="ville_m_traitant" placeholder="Ville: *" autocomplete="off" required/>
                                                </td>
                                                <td align="left"> 
                                                    <input type="text" id="mail_m_traitant" name="mail_m_traitant" placeholder="Mail" autocomplete="off"/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="right" rowspan="2">Médecin appelant:</td> 
                                                <td align="left">             
                                                    <input type="text" id="nom_m_appelant" onblur="verifDate(this)" name="nom_m_appelant" placeholder="Nom" autocomplete="off"/> 
                                                </td>
                                                <td align="left"> 
                                                    <input type="text" id="prenom_m_appelant" name="prenom_m_appelant" placeholder="Prénom" onblur="verifDate1(this)" autocomplete="off"/>
                                                </td>
                                            </tr> 
                                            <tr>
                                                 <td align="left"> 
                                                    <input type="text" id="ville_m_appelant" name="ville_m_appelant" placeholder="Ville"autocomplete="off"/>
                                                </td>
                                                <td align="left"> 
                                                    <input type="text" id="mail_m_appelant" name="mail_m_appelant" placeholder="Mail" autocomplete="off"/>
                                                </td>
                                            </tr>
                                            <tr height="60px">
                                                <td align="center"  colspan="4">
                                                    <TEXTAREA name="description_p" rows="3" cols="40" placeholder="Commentaires"></TEXTAREA> 
                                                </td> 
                                            </tr>
                                        </table>
                                    </form>
                                </div>        
                                <input type="submit" accesskey="enter" value="Suivant"  onmousemove="changeBgColor('btn')" onmouseout="recoverBgColor('btn');" class="position_submit" formmethod="post" style="cursor:e-resize;"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        
        <script>
            function verifDate(champ){
                if(champ.value!=""){
                    document.getElementById("prenom_m_appelant").required=true;
                }
            }
            function verifDate1(champ){
                if(champ.value!=""){
                    var r= confirm("Appuyez sur ok si vous voulez renseigner le médecin appelant du patient ou appuyer sur annuler");
                    if(r==true){
                        x="you pressed Ok";
                        console.log('Press a button');
                        document.getElementById("prenom_m_appelant").required=true;
                        document.getElementById("nom_m_appelant").required=true;
                        
                    }
                    else{
                        x="You pressed cancel";
                        console.log('You pressed cancel');
                        document.getElementById("prenom_m_appelant").required=false;
                        document.getElementById("nom_m_appelant").required=false;
                        
                    }
                    
                }
            }
        </script>
        <script type="text/javascript">
            //utilisation de jQuery :
            $(function($)   {
                $('#nom_m_appelant').autocomplete({
                    source: function(request, response) {
                        $.ajax({
                            url: "autocompletionMedecin.php", // Fichier servant à récuperer les valeurs dans la BDD
                            dataType: "json", // Définition du type de données que l'on reçoit
                            data: {nom: $("#nom_m_appelant").val(), maxRows: 10}, // Valeur que l'on envoie pour la requête
                            type: 'POST', // Type d'envoi des données vers le serveur
                            // En cas de succès de récupération de données JSON :
                            success: function (data){
                                response( $.map( data, function( item ){ 
                                   return {
                                      label: item.nom_m + ", " + item.prenom_m + ", " + item.ville_m,
                                      value: item
                                   }
                                }));
                             }
                       });
                    },
                    minLength: 2,
                    select : function( event, ui ){
                       var obj = ui.item.value;
                       $( "#nom_m_appelant" ).val( obj.nom_m )
                       $( "#prenom_m_appelant" ).val( obj.prenom_m);
                       $( "#mail_m_appelant" ).val( obj.mail_m);
                       $( "#ville_m_appelant" ).val( obj.ville_m );
                       return false;
                    }
                });
                $('#nom_m_traitant').autocomplete({
                    source: function(request, response) {
                        $.ajax({
                            url: "autocompletionMedecin.php", // Fichier servant à récuperer les valeurs dans la BDD
                            dataType: "json", // Définition du type de données que l'on reçoit 
                            data: {nom: $("#nom_m_traitant").val(), maxRows: 10}, // Valeur que l'on envoie pour la requête
                            type: 'POST', // Type d'envoi des données vers le serveur
                            // En cas de succès de récupération de données JSON :
                            success: function (data){
                                response( $.map( data, function( item ){ 
                                   return {
                                      label: item.nom_m + ", " + item.prenom_m + ", " + item.ville_m,
                                      value: item
                                   }
                                }));
                             }
                        });
                    },
                    minLength: 2,
                    select : function( event, ui ){
                       var obj = ui.item.value;
                       $( "#nom_m_traitant" ).val( obj.nom_m )
                       $( "#prenom_m_traitant" ).val( obj.prenom_m);
                       $( "#mail_m_traitant" ).val( obj.mail_m);
                       $( "#ville_m_traitant" ).val( obj.ville_m );
                       return false;
                    }
                }); 
            });
        </script>  
        <script src="General.js"></script>
    </body>
</html>

<?php require 'inc/footer.php'; ?>

     <script>
         function changeColor(s) {
            if(s.options[s.selectedIndex].value == "") {
                s.style.color = "#a9a9a9";
            }     
            else {
                s.style.color = "black";
            }
         }

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
