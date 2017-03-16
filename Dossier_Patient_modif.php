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
    
    }
    $req3 = $bdd->prepare('SELECT * FROM medecin WHERE id_medecin = ? ');
    $req3->execute(array($ID_medecin_autre));

    while ($don = $req3->fetch())
    {
        $nom_m_appelant=$don['nom_m'];
        $prenom_m_appelant=$don['prenom_m'];
        $mail_m_appelant=$don['mail_m'];
    
    }

}                              
$req->closeCursor();            
?> 
    
<body>
   
    <div class="gris">
        <div  class="gris2">
            <form action="./Interaction-BDD/ModifBDD_Patient.php?id_patient=<?php echo $_GET['id_patient']; ?>" id= "form" class ="form" method="post"> 
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
                     <img src='Icones/patient_bleu.png' align='left' alt='sorry' width="50px" heigh="50px"><h2 style="color:grey";><?php echo $nom_p." ".$prenom_p ?></h1><br>
                    </div>
            
                <div id="container">

                    <div id="titles"> 
                        <span class="title active"  target="onglet1"> 1. Patient</span> 
                        <span class="title" target="onglet3"> 2. Examens</span> 
                    </div>

                    <div class="onglet" id="onglet1">
                        <table cellspacing="5px" class="table" id="modif" style="float:left">
                        
                            <tr> 
                                <td align="right">Date des symptomes:</td> 
                                <td align="left"><input type="date" name="date_ait_p" value ="<?php echo $date_ait_p; ?>" color="black" /></td> 
                            </tr>
                            <tr> 
                                <td align="right">Civilité:</td>
                                <td align="left"><input type="text" name="civilite_p" value="<?php echo $civilite_p ?>" list="c"/>
                                    <datalist id="c">
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

                        <table cellspacing="5px" class="table" id="modif" style="float:left"> 
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
                                <td align="left" colspan="2"> 
                                    <input type="text"  name="mail_m_traitant" placeholder="<?php if($ID_medecin_traitant!=0){echo $mail_m_traitant;} else{echo "Mail du médecin traitant";} ?>"/>
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
                                <td align="left" colspan="2"> 
                                    <input type="text" name="mail_m_appelant" placeholder="<?php if($ID_medecin_autre!=0){echo $mail_m_appelant;} else{ echo "Mail du médecin appelant"; } ?>"/>
                                </td>
                            </tr>
                            <tr height="60px">
                                <td align="center" colspan="4"><TEXTAREA name="description_p" rows="4" cols="40"  ><?php echo $description_p ?></TEXTAREA></td>
                            </tr>
                        </table>
                    </div>
                     <input type="submit" accesskey="enter" value="Valider" onmousemove="changeBgColor('btn')" onmouseout="recoverBgColor('btn');" class="submit position_submit" id="btn" formmethod="post" /> 
                    <div class="onglet" id="onglet3">
                <div class="liste">
                
                        <div class="position_table">
                            <!-- AFFICHAGE des EXAMENS PLANIFIES -->
                            <table cellspacing="0px" id="tbl" class="table">   
                    <tr>
                        <th>Examen</th>
                        <th>Centre </th>
                        <th>Service </th>
                        <th>Jour </th>
                        <th>Horaire </th>
                        <th>Réalisé </th>
                        <th></th>
                    </tr>
                                
                    
<?php
    
    $req= $bdd->prepare('SELECT * FROM Examen_patient WHERE id_patient=?');
    $req->execute(array($id_patient));
    $cmpt=1;
    while ($donnees = $req->fetch()){ ?>
        
        <tr>
            
        <?php 
        $req1= $bdd->prepare('SELECT * FROM Examen WHERE id_examen=?');
        $req1->execute(array($donnees["id_examen"]));
        while ($dnn= $req1->fetch()){
        
?>
                        
                            <td><?php echo $dnn["typeExamen"];?></td> 
                            
        <?php } 
        if($donnees["id_service"]==0){ ?>
            <td><?php echo "NC"; ?></td>
            <td><?php echo "NC"; ?></td>
  <?php }else{
                 $req2= $bdd->prepare('SELECT * FROM Service WHERE id_service=?');
                 $req2->execute(array($donnees["id_service"]));
                 while ($dnn2= $req2->fetch()){
        ?>
            
                            
                            <td><?php echo $dnn2["centre_s"]; ?></td>
                            <td><?php echo $dnn2["nom_s"]; ?></td>
        <?php 
                }
        }
        ?>
        <?php 
       
        
        if($donnees["date_examen"]=="1970-01-01" /*&& $donnees["heure_examen"]="00:00:00"*/){ ?>
                            <td><?php echo "NC"; ?></td>
                            <td><?php echo "NC"; ?></td>
                            
        <?php }else{ ?>
                            <?php echo "on entre dans la boucle"; ?>
                            <td><?php echo $donnees["date_examen"]; ?></td>
                            <td><?php echo $donnees["heure_examen"]; ?></td>
        <?php } ?>
        <?php 
            if($donnees["effectue"]=="YES"){
        ?> 
                            <td><input type="checkbox" name="<?php echo $cmpt; ?>" value="YES" checked/></td>
        <?php
            }
            else{
        ?>  
                            <td><input type="checkbox" name="<?php echo $cmpt; ?>" value="YES"/></td>
        <?php
            }
        ?>
                            <td><a href="./Interaction-BDD/SupprBDD_ExamPatient.php?id_examen=<?php echo $donnees["id_examen"]; ?>&amp id_patient=<?php echo $id_patient; ?>"; onclick="return sure();"><img class="supprimer" src="Icones/button_supprimer.png"></a></td> 
            
        </tr>
<?php
        $cmpt=$cmpt+1;
    }
?>  
                            
                            </table>
                            <!-- AFFICHAGE des EXAMENS A PLANIFIER -->
                            <br>
                           
                            <table cellspacing="0px" id="tbl" class="table">   
                            <tr>
                                <th>Examens à planifier </th>
                            </tr>
                    
<?php
                                
    $req3= $bdd->prepare('SELECT * FROM Examen WHERE id_examen NOT IN(SELECT id_examen FROM examen_patient WHERE id_patient=?)');
    $req3->execute(array($id_patient));
    while ($donnees3 = $req3->fetch()){
?>   
                        <tr>
                            <td align="center"> <?php echo $donnees3["typeExamen"]; ?></td> 
                        </tr>
<?php
    }
?>     
                            </table>
                            <br>
                               <div class="myButton" id="Prendre_rdv">
                            <a href="Prise_RDV.php?id_patient=<?php echo $_GET['id_patient'];?>" class="myButton1"> Prendre RDV</a>
                        </div>
                        </div> 
                    </div>
                </div>
                </div>
                </div>
                </div>
            </form>
          
        </div>
        </div>
    
        
         <script src="General.js"></script>
</body>

</html>
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
