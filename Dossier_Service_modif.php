<!--Connexion à la bdd 'bdd_plateforme' à travers un fichier annexe-->
<?php
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
<?php
                
$idservice=$_GET['idservice'];
//echo $idservice;
$req = $bdd->prepare('SELECT * FROM service WHERE id_service = ? ');
$req->execute(array($idservice));
while ($donnees = $req->fetch())
{
    $siret_s=$donnees['numSiret'];
    $centre_s=$donnees['centre_s'];
    $nom_s=$donnees['nom_s'];
    $telephone_s=$donnees['telephone_s'];
    $horairesd_s=$donnees['horairesd_s'];
    $horairesf_s=$donnees['horairesf_s'];
    $adresse_s=$donnees['adresse_s'];
    $codePostal_s=$donnees['codePostal_s'];
    $ville_s=$donnees['ville_s'];
    $description_s=$donnees['description_s'];

}                              
$req->closeCursor();            
?> 
    <body>
    <form action="./Interaction-BDD/ModifBDD_Service.php?idservice=<?php echo $_GET['idservice']; ?>" method="post">    
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
            <h1 class="titreGauche">Service</h1>
        </div>
        <div class="blanc";   style="border-radius: 5px;">
              <div class="myButton" id="Ajouter_liste">
                            <a href="Dossier_Patient.html" class="myButton1"><img class="icone_ajouter" src="Icones/button_ajouter.png"> Modifier dossier</a>
                </div>
            <div class="section4">
            <div class="div1">
             <img src='Icones/hopital_bleu.png' align='left' alt='sorry' width="50px" heigh="50px"><h1 style="color:black";><?php echo "Service ".$nom_s." du centre ".$centre_s ?> </h1><br>
            </div>
            
         <div id="container">

            <div id="titles"> 
                <span class="title active"  target="onglet1"> Service</span> 
                <span class="title" target="onglet3"> Examens</span> 
            </div>

            <div class="onglet" id="onglet1">
                 
                    <table align="left" cellspacing="5px" class="table">
                        <input type="submit" accesskey="enter" value="Valider" id="btn" onmousemove="changeBgColor('btn')" onmouseout="recoverBgColor('btn');" class="submit" formmethod="post"/>
                        
                        

                        <tr> 
                                <td align="right">Service:</td>
                                <td align="left"><input type="text" name="service_s" id="nom_s" placeholder="<?php echo $nom_s ?>" >
                        </tr>
                        <tr> 
                                <td align="right">Numéro Siret:</td>
                                <td align="left"><input type="text" name="siret_s" id="hopital_s" placeholder="<?php echo $siret_s ?>" >
                        </tr>
                        <tr> 
                                <td align="right">Centre:</td>
                                <td align="left"><input type="text" name="centre_s" id="centre_s" placeholder="<?php echo $centre_s;?>">
                        </tr>
                         <tr> 
                                <td align="right">Téléphone:</td>
                                <td align="left"><input type="text" name="telephone_s" id="telephone_s" placeholder="<?php echo $telephone_s ?>" >
                        </tr>    
                    </table> 
                    
                    <table align="right" cellspacing="5px" class="table"> 
                        <tr>
                            <td>Horaires Ouverture</td>
                            <td>
                                <script language="JavaScript">writeSource("js10");</script>
                                <input class="inputDate" name="heured" id="heured" value="" size="2" type="time"  placeholder="<?php echo strftime("%H",strtotime($horairesd_s)) ?>"> :
                               <input class="inputDate" name="mind" id="mind"value="" size="2" type="text"  placeholder="<?php echo strftime("%M",strtotime($horairesd_s)) ?>"> 
                                
                                <input class="inputDate" name="heuref" id="heuref" value="" size="2" type="text"  placeholder="<?php echo strftime("%H",strtotime($horairesf_s)) ?>"> :
                                <input class="inputDate" name="minf" id="minf"value="" size="2" type="text"  placeholder="<?php echo strftime("%M",strtotime($horairesf_s)) ?>"> 
                            </td>
                        </tr>
                        <tr> 
                            <td align="right">Ville:</td> 
                            <td align="left"> 
                            <input type="text" name="ville_s" placeholder="<?php echo $ville_s ?>" > 
                            </td> 
                            </tr> 
                        <tr>
                            <td align="right"> Adresse: 
                            </td> 
                            <td align="left"> 
                            <input type="text" name="adresse_s" placeholder="<?php echo $adresse_s ?>" />
                            </td> 
                         </tr>
                        <tr> 
                            <td align="right">Code Postal:</td> 
                            <td align="left"> 
                            <input type="text"  id="p" name="codePostal_s" placeholder="<?php echo $codePostal_s ?>" > 
                            </td> 
                        </tr>
            
                    </table>

             </div>
                
            <div class="onglet" id="onglet3">
                       <div class="position_table"> 
                       <table align="center" cellspacing="5px"  cellpadding="15px" class="table"> 
                            <tr> 
                            <td rowspan=3>Examens disponibles</td> 
                            <td>IRM</td> 
                            <td><input type="checkbox" id="checkbox-1" class="regular-checkbox" /><label for="checkbox-1"></label></td>
                            </tr> 
                            <tr> 
                            <td>Bilan cardiaque</td>
                            <td><input type="checkbox" id="checkbox-2" class="regular-checkbox" /><label for="checkbox-2"></label></td> 
                            </tr> 
                            <tr> 
                            <td>Consultation neuro</td>
                            <td><input type="checkbox" id="checkbox-3" class="regular-checkbox" /><label for="checkbox-3"></label></td> 
                            </tr>
                            <tr>
        
                             </tr>
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
