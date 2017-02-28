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
        <title>Médecin</title>  
    </head>
    
<?php
                
$id_medecin=$_GET['idmedecin'];

$req = $bdd->prepare('SELECT * FROM medecin WHERE id_medecin = ? ');
$req->execute(array($id_medecin));
while ($donnees = $req->fetch())
{
    $id_service=$donnees['id_service'];
    $nom_m=$donnees['nom_m'];
    $prenom_m=$donnees['prenom_m'];
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

    while ($donn = $req2->fetch())
    {
        $service_m=$donn['nom_s'];
        $centre_m=$donn['centre_s'];
    
    }
}
else{
        $service_m="Service du médecin";
        $centre_m="Centre du médecin";
}
    echo $service_m;
    echo $centre_m;
                        
$req->closeCursor();            
?>
    
    <body>
    <div class="gris">
         <form action="./Interaction-BDD/ModifBDD_Medecin.php?idmedecin=<?php echo $_GET['idmedecin']; ?>" method="post"> 
           <div  class="gris2">
                                    
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
                <h1 class="titreGauche">Médecin</h1>
            </div>
            <div class="blanc";   style="border-radius: 5px;">
              <input type="submit" accesskey="enter" value="Valider"  onmousemove="changeBgColor('btn')" onmouseout="recoverBgColor('btn');" class="submit position_submit" id="btn" formmethod="post"/>  
                <div class="section4">
                    <div class="div1">
                     <img src='Icones/medecin_bleu.png' align='left' alt='sorry' width="60px" heigh="60px"><h2 style="color:grey"><?php echo $prenom_m." ".$nom_m ?></h2><br>
                    </div>
                    
            <div class="onglet" id="onglet1">
                   
                    <table align="left" cellspacing="5px" class="table" id="modif">
                            <tr>
                            <td align="right">Nom:</td> 
                            <td align="left"><input type="text" name="nom_m" placeholder="<?php echo $nom_m ?>" /></td>
                            </tr>
                            <tr>
                            <td align="right">Prénom:</td> 
                            <td align="left"><input type="text" name="prenom_m" placeholder="<?php echo $prenom_m ?>" /></td>
                            </tr>  
                            <tr> 
                            <td align="right">Mail:</td>
                            <td align="left">
                                <input type="mail" name="mail_m" placeholder="<?php echo $mail_m ?>" id="email" /></td> 
                            </tr> 
                            <tr> 
                            <td align="right">Téléphone:</td> 
                            <td align="left"> 
                            <input type="tel" pattern="[0-9]{10}" id="p" name="telephone_m" placeholder="<?php echo $telephone_m ?>" /> 
                            </td> 
                            </tr> 
                    </table> 

                    <table align="right" cellspacing="5px" class="table" id="modif">
                            <tr> 
                            <td align="right"> Centre: 
                            </td> 
                            <td align="left"> 
                            <input type="text" name="centre_m" placeholder="<?php echo $centre_m; ?>" />
                            </td>
                            </tr>
                            <tr> 
                            <td align="right"> Service: 
                            </td> 
                            <td align="left"> 
                            <input type="text" name="service_m" placeholder="<?php echo $service_m ?>" />
                            </td>
                            </tr>
                            <tr> 
                            <td align="right">Code Postal:</td> 
                            <td align="left"> 
                            <input type="text"  id="p" name="codePostal_m" placeholder="<?php echo $codePostal_m ?>" /> 
                            </td> 
                            </tr> 
                            <tr> 
                            <td align="right">Ville:</td> 
                            <td align="left"> 
                            <input type="text" name="ville_m" placeholder="<?php echo $ville_m ?>"/> 
                            </td> 
                            </tr> 
                            <tr>
                            <td align="right"> Adresse: 
                            </td> 
                            <td align="left"> 
                            <input type="text" name="adresse_m" placeholder="<?php echo $adresse_m ?>" />
                            </td> 
                            </tr>
                            <tr>
                            <td align="center"  colspan="2">
                                <TEXTAREA name="description_m" rows="3" cols="30" placeholder="Commentaires"><?php echo $description_m ?></TEXTAREA> 
                            </td>
                        </tr>
                    </table>
                
                            </div>
                        </div>
                    </div>
            </div>
         </form>
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
