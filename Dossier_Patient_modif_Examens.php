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
            <form action="./Interaction-BDD/ModifBDD_Patient.php?id_patient=<?php echo $_GET['id_patient']; ?> " id= "form" class ="form" method="post"> 
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
                     <img src='Icones/patient_bleu.png' align='left' alt='sorry' width="50px" heigh="50px"><h2 style="color:grey";><?php echo $nom_p." ".$prenom_p ?><br><br><?php echo $telephone_p; ?>
                
        
                <div id="container">
                    <br>
                   
                <div class="liste">
                
                        <div class="position_table">
                            <!-- AFFICHAGE des EXAMENS PLANIFIES -->
                            <table cellspacing="0px" id="tbl" class="table">   
                    <tr>
                        <th>Examen</th>
                        <th>Hôpital </th>
                        <th>Service/Centre d'examen </th>
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
