<!-- Page affichant le dossier d’un service prérempli avec les informations déjà connues dans la BDD. Y sont gérés :
-	L'affichage du menu ;
-	L'affichage de la page (en HTML) ;
-	L'affichage dynamique des examens disponibles ;
-	La récupération des valeurs des champs dans la BDD (nom, prénom, date de naissance, ville, etc…). -->

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
        <title>Service</title>    

    </head>
    
    <?php
        $idservice=$_GET['idservice'];
        //echo $idservice;
        $req = $bdd->prepare('SELECT * FROM service WHERE id_service = ? ');
        $req->execute(array($idservice));
        while ($donnees = $req->fetch()) {
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
                        <h4>Tableau de bord</h4>
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
                        <h1 class="titreGauche">Service</h1>
                    </div>
                    <div class="blanc";   style="border-radius: 5px;">
                        <div class="section4">
                            <div class="div1">
                                <br>
                                <img src='Icones/hopital_bleu.png' align='left' alt='sorry' width="50px" heigh="50px">
                                <h2 style="color:grey;vertical-align:middle"><?php echo "Service ".$nom_s." du centre ".$centre_s ?> </h2><br>
                                <br><br><br><br>
                            </div>
            
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
                 
                                    <table align="left" cellspacing="5px" class="table" id="modif">
                                        <tr> 
                                            <td align="left" style="color:grey" style="font-style:italic">* Champs obligatoires </td></tr>
                                        <tr> 
                                            <td align="right">Service/Centre d'examen: *</td>
                                            <td align="left"><input type="text" name="service_s" id="nom_s" placeholder="(ex: Service Neurologie)" value="<?php echo $nom_s ?>" autocomplete="off">
                                        </tr>
                                        <tr> 
                                            <td align="right">Hôpital:</td>
                                            <td align="left"><input type="text" name="centre_s" id="centre_s" placeholder="(ex: UNV Lyon)" value="<?php echo $centre_s;?>" autocomplete="off">
                                        </tr>
                                        <tr> 
                                            <td align="right">Téléphone: *</td>
                                            <td align="left"><input type="text" name="telephone_s" id="telephone_s" placeholder="(ex: 0946243546)" value="<?php echo $telephone_s ?>" autocomplete="off">
                                        </tr>    
                                    </table> 
                    
                                    <table align="right" cellspacing="5px" class="table" id="modif"> 
                                        <tr>
                                            <td>Horaires Ouverture</td>
                                            <td>
                                                <script language="JavaScript">writeSource("js10");</script>
                                                <input id="heured" name="heured" type="time" value="<?php echo strftime("%H",strtotime($horairesd_s)).":".strftime("%M",strtotime($horairesd_s)) ?>"  /> 
                                                <br> à <br>
                                                <input id="heuref" name="heuref" type="time" value="<?php echo strftime("%H",strtotime($horairesf_s)).":".strftime("%M",strtotime($horairesf_s)) ?>"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="right"> Adresse: * </td> 
                                            <td align="left"> 
                                                <input type="text" name="adresse_s" placeholder="(ex: 26, rue de l'hôpital)" value="<?php echo $adresse_s ?>" autocomplete="off"/>
                                            </td> 
                                        </tr>
                                        <tr> 
                                            <td align="right">Code Postal: *</td> 
                                            <td align="left"> 
                                                <input type="text"  id="p" name="codePostal_s" placeholder="(ex: 69100)" value="<?php echo $codePostal_s ?>" autocomplete="off"> 
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="right">Ville: *</td> 
                                            <td align="left"> 
                                                <input type="text" name="ville_s" placeholder="(ex: Villeurbanne)" value="<?php echo $ville_s ?>" autocomplete="off"> 
                                            </td> 
                                        </tr> 
                                        <tr>
                                            <td align="center"  colspan="2">
                                                <TEXTAREA name="description_s" rows="3" cols="30" placeholder="Commentaires"><?php echo $description_s?></TEXTAREA> 
                                            </td>
                                        </tr>
                                    </table>             
                                </div>
                            <input type="submit" accesskey="enter" value="Valider"  onmousemove="changeBgColor('btn')" onmouseout="recoverBgColor('btn');" class="submit position_submit" id="btn" formmethod="post"/>                
                            </div>        
                        </div>        
                    </div>        
                </div>        
            </div>
        </form>
    </body>
</html>

<?php require 'inc/footer.php'; ?>
  
