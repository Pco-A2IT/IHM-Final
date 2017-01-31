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
        <title>Nouveau patient</title>    

    </head>
    
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

    
    $ID_medecin_traitant=$donnees['ID_medecin_traitant'];
    $ID_medecin_autre=$donnees['ID_medecin_autre'];
    
    
    $req2 = $bdd->prepare('SELECT * FROM medecin WHERE id_medecin = ? ');
    $req2->execute(array($ID_medecin_traitant));

    while ($donn = $req2->fetch())
    {
        $nom_m_traitant=$donn['nom_m'];
        $prenom_m_traitant=$donn['prenom_m'];

    
    }
    $req3 = $bdd->prepare('SELECT * FROM medecin WHERE id_medecin = ? ');
    $req3->execute(array($ID_medecin_autre));

    while ($don = $req3->fetch())
    {
        $nom_m_appelant=$don['nom_m'];
        $prenom_m_appelant=$don['prenom_m'];
    
    }

}                              
$req->closeCursor();            
?> 
    
    <body>
   
    <div class="gris">
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
             <div class="myButton" id="Ajouter_liste">
                            <a href="Dossier_Patient.php" class="myButton1"><img class="icone_ajouter" src="Icones/button_ajouter.png"> Modifier dossier</a>
                </div>
            <div class="section4">
            <div class="div1">
             <img src='Icones/patient_bleu.png' align='left' alt='sorry' width="50px" heigh="50px"><h1 style="color:black";><?php echo $nom_p." ".$prenom_p ?></h1><br>
            </div>
            
         <div id="container">

            <div id="titles"> 
                <span class="title active"  target="onglet1"> Patient</span> 
                <span class="title" target="onglet3"> Examens</span> 
            </div>

            <div class="onglet" id="onglet1">
                <form action="./Interaction-BDD/ModifBDD_Patient.php?id_patient=<?php echo $_GET['id_patient']; ?>" method="post"> 
                    <table align="left" cellspacing="5px" class="table">
                        
                        <input type="submit" accesskey="enter" value="Valider" id="btn" onmousemove="changeBgColor('btn')" onmouseout="recoverBgColor('btn');" class="submit" formmethod="post"/>
                            <tr> 
                                <td align="right">Date de l'AIT:</td> 
                                <td align="left"><input type="date" name="date_ait_p" value ="" /></td> 
                            </tr>
                            <tr> 
                            <td align="right">Civilité:</td>
                            <td align="left"><input type="text" name="civilite_p" placeholder="<?php echo $civilite_p ?>" list="c"/>
                                <datalist id="c">
                                        <option>Mr</option>
                                        <option>Mme</option>
                                </datalist>
                                </td>
                                </tr>
                            <tr>
                            <td align="right">Nom:</td> 
                            <td align="left"><input type="text" name="nom_p" placeholder="<?php echo $nom_p ?>" /></td>
                            </tr>
                            <tr>
                            <td align="right">Prénom:</td> 
                            <td align="left"><input type="text" name="prenom_p" placeholder="<?php echo $prenom_p ?>" /></td>
                            </tr>  
                            <tr> 
                            <td align="right">Date de naissance:</td> 
                            <td align="left"><input type="date" name="birthday_p" placeholder="<?php echo strftime("%d",strtotime($date_naissance))."/".strftime("%m",strtotime($date_naissance))."/".strftime("%Y",strtotime($date_naissance)) ?>"/></td> 
                            </tr>
                            <tr> 
                            <td align="right">Mail:</td>
                            <td align="left">
                                <input type="email" name="mail_p" placeholder="<?php echo $mail_p ?>" id="email" /></td> 
                            </tr> 
                            <tr> 
                            <td align="right">Téléphone:</td> 
                            <td align="left"> 
                            <input type="tel" pattern="[0-9]{10}" id="p" name="telephone_p" placeholder="<?php echo $telephone_p ?>" /> 
                            </td> 
                            </tr> 
                    </table> 

                    <table align="right" cellspacing="5px" class="table"> 
                            <tr> 
                            <td align="right">Ville:</td> 
                            <td align="left"> 
                            <input type="text" name="ville_p" placeholder="<?php echo $ville_p ?>"/> 
                            </td> 
                            </tr> 
                            <tr> 
                            <td align="right"> 
                            Adresse: 
                            </td> 
                            <td align="left"> 
                            <input type="text" name="adresse_p" placeholder="<?php echo $adresse_p ?>" />
                            </td> 
                            </tr>
                            <tr> 
                            <td align="right">Code Postal:</td> 
                            <td align="left"> 
                            <input type="text"  id="p" name="codePostal_p" placeholder="<?php echo $codePostal_p ?>" /> 
                            </td> 
                            </tr> 
                            <tr>
                            <td align="right">Médecin traitant:</td> 
                            <td align="left"> 
                            <input type="text" name="nom_m_traitant" placeholder="<?php if($ID_medecin_traitant!=0){echo $nom_m_traitant;} else{echo "Nom du médecin traitant";} ?>"/>
                            </td>
                            <td align="left"> 
                            <input type="text" name="prenom_m_traitant" placeholder="<?php if($ID_medecin_traitant!=0){echo $prenom_m_traitant;} else{echo "Prénom du médecin traitant";} ?>"/>
                            </td>
                            </tr>
                            <tr>
                            <td align="right">Médecin appelant:</td> 
                            <td align="left"> 
                            <input type="text" name="nom_m_appelant" placeholder="<?php if($ID_medecin_autre!=0){echo $nom_m_appelant;} else{echo "Nom du médecin appelant";} ?>" list="a"/> 
                            </td>
                            <td align="left"> 
                            <input type="text" name="prenom_m_appelant" placeholder="<?php if($ID_medecin_autre!=0){echo $prenom_m_appelant;} else{echo "Prénom du médecin appelant";} ?>" list="a"/> 
                            </td>
                            </tr>   
                    </table>
                </form>
             </div>
                
            <div class="onglet" id="onglet3">
                     <div class="position_table">
                     <table cellspacing='5px'>   
                        <tr>
                            <th></th>
                            <th>Examen</th>
                            <th style="text-align:center">Réalisé</th>
                        <tr>
                            <td rowspan="3"> 1ère intention  </td>
                            <td>Scan cérébral</td>
                            <td><input type="checkbox" id="checkbox-1" class="regular-checkbox" /><label for="checkbox-1"></label></td>
                        </tr>
                        <tr>
                            <td>AngioScan ou Echo Doppler</td>
                            <td><input type="checkbox" id="checkbox-2" class="regular-checkbox" /><label for="checkbox-2"></label></td>
                        </tr>
                        <tr>
                            <td>Bilan biologique</td>
                            <td><input type="checkbox" id="checkbox-3" class="regular-checkbox" /><label for="checkbox-3"></label></td>
                        </tr>
                         <tr>
                            <td rowspan="3"> 2nd intention  </td>
                            <td>Bilan Cardiaque</td>
                            <td><input type="checkbox" id="checkbox-4" class="regular-checkbox" /><label for="checkbox-4"></label></td>
                        </tr>
                        <tr>
                            <td>RDV neurologue</td>
                            <td><input type="checkbox" id="checkbox-5" class="regular-checkbox" /><label for="checkbox-5"></label></td>
                        </tr>
                         <tr rowspan="3">
                             <td align="center"  colspan="2"> 
                                 <a href="Prise_RDV.html">  <input type="submit" accesskey="enter" value="Modifier" id="btn" onmousemove="changeBgColor('btn')" onmouseout="recoverBgColor('btn');" class="submit" formmethod="post"/> </a>
                            </td> 
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
