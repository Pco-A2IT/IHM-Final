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
        
        <?php $id_patient=$_GET['id_patient']; 
        $req = $bdd->prepare('SELECT * FROM patient WHERE id_patient = ? ');
        $req->execute(array($id_patient));
        while ($donnees = $req->fetch())
        {
            $nom_p=$donnees['nom_p'];
            $prenom_p=$donnees['prenom_p'];
        }
        
        ?>
        
        <title></title>   
        
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
    <?php $id_patient=$_GET['id_patient']; ?>
    <form action="./Interaction-BDD/AjoutBDD_dossierPatient_Examens.php?id_patient=<?php echo $id_patient; ?>" method="post">
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
                        <div class="div1">

                          <br>
                         <img src='Icones/patient_bleu.png' align='left' alt='sorry' width="50px" heigh="50px">
                          <h2 style="color:grey";><?php echo $nom_p." ".$prenom_p ?><br><br><?php echo $telephone_p; ?></h2>
                        
                    <br>
            
                  <style>
                                        #divConteneur{
                           min-height:400px;
                            height:400px;
                            min-width:100%;
                            width:100%;
                            overflow:auto;/*pour activer les scrollbarres*/
                            }
                           
                            </style>
                        
                              
                        <div id="divConteneur">

                    <div class="position_table"> 
                        <div class="liste">
                        <table cellspacing="0px" id="tbl" class="table"> 


                                <tr>
                                    <th>Examen</th>
                                    <th colspan="3" style="text-align:left">Réalisé avant Prise de contact avec SOS AIT</th>
                                    <th style="text-align:center">Date</th>
                                </tr>
                                
                                        
<?php
$compteur=1;
$nbligne=0;                         
$reponse = $bdd->query('SELECT * FROM Examen');
while($dnn = $reponse->fetch()){
?>
                                    
<?php
    $req1 = $bdd->prepare('SELECT * FROM examen_patient WHERE id_patient = ? AND id_examen=? ');
    $req1->execute(array($id_patient,$dnn['id_examen'] ));
                                
    if($req1->fetch()){
        $req2 = $bdd->prepare('SELECT * FROM examen_patient WHERE id_patient = ? AND id_examen=? ');
        $req2->execute(array($id_patient,$dnn['id_examen'] ));
        while($dnn2= $req2->fetch()){
            if($dnn2['planifie_avant']=='YES'){
            
        
        
?>
                                <tr disabled=true >
                                    <td><?php print_r($dnn['typeExamen']); ?></td>
                                    <td colspan="3" background="#1270B3"><input type="checkbox" disabled=true  name="<?php echo($compteur); ?>" value="YES" checked /></td>
                                    <td align="left"><input disabled=true background="#1270B3" type="date" id="<?php echo "date".$compteur; ?>" name="<?php echo "date".$compteur; ?>" color="#1270B3" value="<?php echo $dnn2["date_examen"];?>"   /></td>
                                    <td><span id="<?php echo "erreurdate".$compteur; ?>"></span></td>
<?php
            $nbligne=$nbligne+1;
            }
        }
    }
    else{
?>
            
                                <tr>
                                    <td><?php print_r($dnn['typeExamen']); ?></td>
                                    <td colspan="3"><input type="checkbox" name="<?php echo($compteur); ?>" value="YES" onclick="afficherDate(<?php echo($compteur); ?>)" /></td>
                                    <td><input id="<?php echo $compteur; ?>" style="display:none" name="<?php echo "date".$compteur; ?>"  type="date"  /></td>
                                    <td><span id="<?php echo "erreurdate".$compteur; ?>"></span></td>
                                
<?php
        $nbligne=$nbligne+1;
    }
    
?>
                                
<?php
        $compteur=$compteur+1;
}
if($nbligne==0){                   
?>
                            <tr>
                                      <td colspan="3"> <h4>Tous les examens ont déjà été planifiés pas SOS AIT </h4></td>
<?php
}
?>
                            </tr>
                        </table>
                              <input type="submit" accesskey="enter" id="Prendre_rdv" value="Valider" onmousemove="changeBgColor('btn')" onmouseout="recoverBgColor('btn');"  formmethod="post" style="margin-left:400px"/> 
                        </div>
                    </div>
                </div>
                    </div>
        </div>
            </div>
        </div>
        </div>
        </form>
         <script src="General.js"></script>
    </body>

</html>

<script>
function masquerDate(id)
{ 
    console.log(id);
    document.getElementById(id).style.display="none";
    document.getElementById(id).attributes["required"] = "";
    document.getElementById(id).required=false;
}
    
function afficherDate(id)
{ 
    
    console.log(id);
    if(document.getElementById(id).checked==false){
        document.getElementById(id).style.display="block";
        console.log("checker");
        document.getElementById(id).checked=true;
        document.getElementById(id).required=true;
        
        document.getElementById('erreurdate'+id).innerHTML = '';
        document.getElementById("btn").disabled= false;
        document.getElementById("btn").style.background="#1270B3";
    }
    else{
        console.log("pas checker");
        document.getElementById(id).style.display="none";
        document.getElementById(id).value="";
        document.getElementById(id).checked=false;
        document.getElementById(id).required=false;
        
        document.getElementById('erreurdate'+id).innerHTML = '';
        document.getElementById("btn").disabled= false;
        document.getElementById("btn").style.background="#1270B3";
    }
    
}
         
function Afficher_1(id)
{ 
    console.log(id);
    document.getElementById(id).disabled= false;
    document.getElementById(id).style.background="#1270B3";
}
function Cacher_1(id)
{   
    console.log('valider'+id);
    document.getElementById(id).disabled= true;
    document.getElementById(id).style.background="red";
    
    //console.log("Bouton caché");
}
         
/*function verifDate(champ){
    id=champ.id;
    console.log(id);
	var date = new Date();
	var date_n = document.getElementById(id).value;
    console.log(date_n);
	var date2 = new Date(date_n);
	if(date2 < date){
        document.getElementById('erreurdate'+id).innerHTML = 'Date déjà passée';
        Cacher_1("btn");
      return false;
	}else{
        document.getElementById('erreurdate'+id).innerHTML = '';
        Afficher_1("btn");
		return true;
	}
}*/
         
         
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
