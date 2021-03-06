<!-- Page affichant le dossier d'un médecin prérempli avec les informations déjà connues dans la BDD. Y sont gérés :
-	L'affichage du menu ;
-	L'affichage de la page (en HTML) ;
-	L’auto complétion des champs du service et la spécialité du médecin ;
-	La récupération des valeurs des champs dans la BDD (nom, prénom, ville, etc…). -->

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
        <title>Médecin</title>  
    </head>
    
    <?php

        $id_medecin=$_GET['idmedecin'];

        $req = $bdd->prepare('SELECT * FROM medecin WHERE id_medecin = ? ');
        $req->execute(array($id_medecin));
        while ($donnees = $req->fetch()) {
            $id_service=$donnees['id_service'];
            $nom_m=$donnees['nom_m'];
            $prenom_m=$donnees['prenom_m'];
            $specialite_m=$donnees['specialite_m'];
            $mail_m=$donnees['mail_m'];
            $ville_m=$donnees['ville_m'];
            $codePostal_m=$donnees['codePostal_m'];
            $adresse_m=$donnees['adresse_m'];
            $telephone_m=$donnees['telephone_m'];
            $description_m=$donnees['description_m'];
        } 
        if($id_service!=0){
            $req2 = $bdd->prepare('SELECT * FROM service WHERE id_service = ? ');
            $req2->execute(array($id_service));

            while ($donn = $req2->fetch()) {
                $service_m=$donn['nom_s'];
                $centre_m=$donn['centre_s'];
            }
        }
        else {
            $service_m="";
            $centre_m="";
        }
            
        echo $service_m;
        echo $centre_m;

        $req->closeCursor();            
    ?>
    
    <body>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <!-- inclusion de jQuery et jQuery.ui-->
        <div class="gris">
            <form action="./Interaction-BDD/ModifBDD_Medecin.php?idmedecin=<?php echo $_GET['idmedecin']; ?>" method="post"> 
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


                    <script src="js/General.js"></script>
                    <div class="titre";   style="border-radius: 5px;">
                        <h1 class="titreGauche">Médecin</h1>
                    </div>
                    <div class="blanc";   style="border-radius: 5px;">
                        <div class="section4">
                            <div class="div1">
                                <br>
                                <img src='Icones/medecin_bleu.png' align='left' alt='sorry' width="60px" heigh="60px"><h2 style="color:grey"><?php echo $prenom_m." ".$nom_m ?></h2><br>
                            </div>
                            <br>
                            
                            <style>
                            #divConteneur3 {
                                min-height:500px;
                                height:500px;
                                min-width:100%;
                                width:100%;
                                overflow:auto;/*pour activer les scrollbarres*/
                            }
                            </style>

                            <div id="divConteneur3">
                                <div class="onglet_d" id="onglet1">

                                    <table align="left" cellspacing="5px" class="table" id="modif">
                                            <tr> 
                                                <td align="left" style="color:grey" style="font-style:italic">* Champs obligatoires </td></tr>
                                            <tr>
                                                <td align="right">Nom: *</td> 
                                                <td align="left"><input type="text" name="nom_m" value="<?php echo $nom_m ?>" /></td>
                                            </tr>
                                            <tr>
                                                <td align="right">Prénom: *</td> 
                                                <td align="left"><input type="text" name="prenom_m" value="<?php echo $prenom_m ?>" /></td>
                                            </tr>  
                                            <tr> 
                                                <td align="right">Mail:</td>
                                                <td align="left">
                                                    <input type="mail" name="mail_m" value="<?php echo $mail_m ?>" id="email" />
                                                </td> 
                                            </tr> 
                                            <tr> 
                                                <td align="right">Téléphone:</td> 
                                                <td align="left"> 
                                                    <input type="tel" pattern="[0-9]{10}" id="p" name="telephone_m" value="<?php echo $telephone_m ?>" /> 
                                                </td> 
                                            </tr> 
                                    </table> 

                                    <table align="right" cellspacing="5px" class="table" id="modif">
                                        <tr> 
                                            <td align="right">Spécialité:
                                        </td> 
                                            <td align="left"> 
                                                <input type="text" id="specialite_m" name="specialite_m" value="<?php echo $specialite_m; ?>" />
                                            </td>
                                        </tr>
                                        <tr> 
                                            <td align="right"> Service/Centre d'examen:
                                        </td> 
                                            <td align="left"> 
                                                <input type="text" id="service_m" name="service_m" value="<?php echo $service_m ?>" />
                                            </td>
                                        </tr>

                                        <tr> 
                                            <td align="right"> Hôpital: </td> 
                                            <td align="left"> 
                                                <input type="text" id="centre_m" name="centre_m" value="<?php echo $centre_m; ?>" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="right"> Adresse: </td> 
                                            <td align="left"> 
                                                <input type="text" id="adresse_m" name="adresse_m" value="<?php echo $adresse_m ?>" />
                                            </td> 
                                        </tr>
                                        <tr> 
                                            <td align="right">Code Postal:</td> 
                                            <td align="left"> 
                                                <input type="text" pattern="{6}" id="codePostal_m" name="codePostal_m" value="<?php echo $codePostal_m ?>" /> 
                                            </td> 
                                        </tr> 
                                        <tr> 
                                            <td align="right">Ville: *</td> 
                                            <td align="left"> 
                                                <input type="text" id="ville_m" name="ville_m" value="<?php echo $ville_m ?>" autocomplete="off"/> 
                                            </td> 
                                        </tr> 
                                        <tr>
                                            <td align="center"  colspan="2">
                                                <TEXTAREA name="description_m" rows="3" cols="30" placeholder="Commentaires"><?php echo $description_m ?></TEXTAREA> 
                                            </td>
                                        </tr>
                                    </table>

                                </div>
                                <input type="submit" accesskey="enter" value="Valider" onmousemove="changeBgColor('btn')" onmouseout="recoverBgColor('btn');" class="submit position_submit" id="btn" formmethod="post" /> 
                            </div>
                        </div>
                    </div>
                </div>
             </form>
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
                            dataType: "json", // Définition du type de données que l'on reçoit                                     
                            data: {nom: $("#service_m").val(), maxRows: 10}, // Valeur que l'on envoie pour la requête                                    
                            type: 'POST', // Type d'envoi des données vers le serveur
                            // En cas de succès de récupération de données JSON  : 
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



