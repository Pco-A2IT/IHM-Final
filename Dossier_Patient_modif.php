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

</head>

<body>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <!-- inclusion de jQuery et jQuery.ui-->
    
<?php
                
$id_patient=$_GET['id_patient'];
$req = $bdd->prepare('SELECT * FROM patient WHERE id_patient = ? ');
$req->execute(array($id_patient));
while ($donnees = $req->fetch())
{
    $date_ait_p=$donnees['date_ait_p'];
    $nom_p=$donnees['nom_p'];
    $prenom_p=$donnees['prenom_p'];
    $civilite_p=$donnees['civilite_p'];
    $date_naissance=$donnees['date_naissance'];
    $mail_p=$donnees['mail_p'];
    $telephone_p=$donnees['telephone_p'];
    $ville_p=$donnees['ville_p'];
    $codePostal_p=$donnees['codePostal_p'];
    $adresse_p=$donnees['adresse_p'];
    $description_p=$donnees['description_p'];

    
    $ID_medecin_traitant=$donnees['ID_medecin_traitant'];
    $ID_medecin_autre=$donnees['ID_medecin_autre'];
    
    
    $req2 = $bdd->prepare('SELECT * FROM medecin WHERE id_medecin = ? ');
    $req2->execute(array($ID_medecin_traitant));

    while ($donn = $req2->fetch())
    {
        $nom_m_traitant=$donn['nom_m'];
        $prenom_m_traitant=$donn['prenom_m'];
        $mail_m_traitant=$donn['mail_m'];
        $ville_m_traitant=$don['ville_m'];
    
    }
    $req3 = $bdd->prepare('SELECT * FROM medecin WHERE id_medecin = ? ');
    $req3->execute(array($ID_medecin_autre));

    while ($don = $req3->fetch())
    {
        $nom_m_appelant=$don['nom_m'];
        $prenom_m_appelant=$don['prenom_m'];
        $mail_m_appelant=$don['mail_m'];
        $ville_m_appelant=$don['ville_m'];
    }

}                              
$req->closeCursor();            
?> 
    
   
    <div class="gris">
            <form action="./Interaction-BDD/ModifBDD_Patient.php?id_patient=<?php echo $id_patient; ?> " id= "form" class ="form" method="post"> 
                
        <div  class="gris2">
                <div id="menu0" class="carreGris" style="background-color:#1270B3";>
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
                    <h1 class="titreGauche">Patient</h1>
                </div>
                
                <div class="blanc";   style="border-radius: 5px;">
                    <div class="section4">
                        <div class="div1">

                         <img src='Icones/patient_bleu.png' align='left' alt='sorry' width="50px" heigh="50px">
                          <h2 style="color:grey";><?php echo $nom_p." ".$prenom_p ?><br><br><?php echo $telephone_p; ?></h2>
                        </div>

            <div class="onglet" id="onglet1">
                   
                
                            <br>
                            <table cellspacing="5px" class="table" id="modif" style="float:left">
                                <tr> 
                                    <td align="right">Date des symptomes:</td> 
                                    <td align="left"><input type="date" name="date_ait_p" value ="<?php echo $date_ait_p; ?>" color="black" /></td> 
                                </tr>
                                <tr> 
                                    <td align="right">Civilité:</td>
                                    <td align="left"><input type="text" name="civilite_p" value="<?php echo $civilite_p ?>" list="c"/>
                                        <datalist id="c" style="background-color:eeeeee">
                                                <option>M.</option>
                                                <option>Mme</option>
                                        </datalist>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right">Nom:</td> 
                                    <td align="left"><input type="text" name="nom_p" value="<?php echo $nom_p ?>" /></td>
                                </tr>
                                <tr>
                                    <td align="right">Prénom:</td> 
                                    <td align="left"><input type="text" name="prenom_p" value="<?php echo $prenom_p ?>" /></td>
                                </tr>  
                                <tr> 
                                    <td align="right">Date de naissance:</td> 
                                    <td align="left"><input type="date" name="birthday_p" value="<?php echo $date_naissance; ?>" placeholder=""/></td> 
                                </tr>
                                <tr> 
                                    <td align="right">Mail:</td>
                                    <td align="left">
                                        <input type="email" name="mail_p" value="<?php echo $mail_p ?>" id="email" />
                                    </td> 
                                </tr> 
                                <tr> 
                                    <td align="right">Téléphone:</td> 
                                    <td align="left"> 
                                        <input type="tel" pattern="[0-9]{10}" id="p" name="telephone_p" value="<?php echo $telephone_p ?>" /> 
                                    </td> 
                                </tr> 
                        </table>
                                <table cellspacing="5px"  id="modif" style="float:left">
                                <tr> 
                                    <td align="right">Adresse:</td> 
                                    <td align="left" colspan="3"> 
                                        <input type="text" name="adresse_p" value="<?php echo $adresse_p ?>" />
                                    </td> 
                                </tr>
                                <tr> 
                                    <td align="right">Code Postal:</td> 
                                    <td align="left" colspan="3"> 
                                        <input type="text"  id="p" name="codePostal_p" value="<?php echo $codePostal_p ?>" /> 
                                    </td> 
                                </tr> 
                                <tr> 
                                    <td align="right">Ville:</td> 
                                    <td align="left" colspan="3"> 
                                        <input type="text" name="ville_p" value="<?php echo $ville_p ?>"/> 
                                    </td> 
                                </tr>
                                <tr>
                                    <td align="right" rowspan="2">Médecin traitant:</td> 
                                    <td align="left"> 
                                        <input type="text" id="nom_m_traitant" name="nom_m_traitant" placeholder="<?php if($ID_medecin_traitant!=0){echo $nom_m_traitant;} else{echo "Nom du médecin traitant";} ?>" 
                                        onFocus="alert('Si vous voulez attribuer un nouveau medecin au patient, remplir les champs nom et prénom obligatoirement')"/>
                                    </td>
                                    <td align="left"> 
                                        <input type="text" name="prenom_m_traitant" id="prenom_m_traitant" placeholder="<?php if($ID_medecin_traitant!=0){echo $prenom_m_traitant;} else{echo "Prénom du médecin traitant";} ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left">
                                        <input type="text" id="ville_m_traitant" name="ville_m_traitant" placeholder="<?php if($ID_medecin_traitant!=0){echo $ville_m_traitant;} else{echo "Ville du médecin traitant";} ?>"/>
                                    </td>
                                    <td align="left"> 
                                        <input type="text" id="mail_m_traitant"  name="mail_m_traitant" placeholder="<?php if($ID_medecin_traitant!=0){echo $mail_m_traitant;} else{echo "Mail du médecin traitant";} ?>"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right" rowspan="2">Médecin appelant:</td> 
                                    <td align="left"> 
                                        <input type="text" name="nom_m_appelant" placeholder="<?php if($ID_medecin_autre!=0){echo $nom_m_appelant;} else{echo "Nom du médecin appelant";} ?>" onFocus="alert('Si vous voulez attribuer un nouveau medecin au patient, remplir les champs nom et prénom obligatoirement')" list="a"/> 
                                    </td>
                                    <td align="left"> 
                                        <input type="text" name="prenom_m_appelant" placeholder="<?php if($ID_medecin_autre!=0){echo $prenom_m_appelant;} else{echo "Prénom du médecin appelant";} ?>" list="a"/> 
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left">
                                        <input type="text" id="ville_m_appelant" name="ville_m_appelant" placeholder="<?php if($ID_medecin_autre!=0){echo $ville_m_appelant;} else{ echo "Ville du médecin appelant"; } ?>"/>
                                    </td>
                                    <td align="left"> 
                                        <input type="text" name="mail_m_appelant" placeholder="<?php if($ID_medecin_autre!=0){echo $mail_m_appelant;} else{ echo "Mail du médecin appelant"; } ?>"/>
                                    </td>
                                </tr>
                                <tr height="60px">
                                    <td align="center" colspan="4"><TEXTAREA name="description_p" rows="4" cols="40"  ><?php echo $description_p ?></TEXTAREA></td>
                                </tr>
                            </table>
                      
                        <input type="submit" accesskey="enter" value="Valider" onmousemove="changeBgColor('btn')" onmouseout="recoverBgColor('btn');" class="submit position_submit" id="btn" formmethod="post"> <?php echo $_GET['id_patient'];?>"/>  
                
                    </div>
                </div> 
            </div>
                </div>
            </form>
        <script type="text/javascript">
                //utilisation de jQuery :
                $(function($)   {
                    $('#nom_m_appelant').autocomplete({
                         source: function(request, response) {
						  $.ajax({
								// Fichier servant à récuperer les valeurs dans la BDD
								url: "autocompletionMedecin.php",
								// Définition du type de données que l'on reçoit de la part de autoServeur.php
								dataType: "json",
								// Valeur que l'on envoie dans le fichier Autocompletion.php pour la requête
								data: {nom: $("#nom_m_appelant").val(), maxRows: 10},
								// Type d'envoie des données vers le serveur
								type: 'POST',
								// En cas de succès de récupération de données JSON depuis AutocCompletion.php
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
                   // delay: 400,
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
								// Fichier servant à récuperer les valeurs dans la BDD
								url: "autocompletionMedecin.php",
								// Définition du type de données que l'on reçoit de la part de autoServeur.php
								dataType: "json",
								// Valeur que l'on envoie dans le fichier Autocompletion.php pour la requête
								data: {nom: $("#nom_m_traitant").val(), maxRows: 10},
								// Type d'envoie des données vers le serveur
								type: 'POST',
								// En cas de succès de récupération de données JSON depuis AutocCompletion.php
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
                   // delay: 400,
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
        </div>
    
    
    <script src="General.js"></script>
    
</body>

</html>
    
<?php require 'inc/footer.php'; ?>
    
    <script> 
        function activer() {
            document.getElementById("prenom_m_traitant").addEventListener.onfocus();
        }
    </script> 
    <script> 
            function sure()
            {
                return(confirm('Etes-vous sûr de vouloir supprimer cet examen ?'));
            }                 
    </script>   

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


