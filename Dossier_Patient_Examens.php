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
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> 
        
        
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
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	   <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <!-- inclusion de jQuery et jQuery.ui-->
    <?php $id_patient=$_GET['id_patient']; ?>
    <form action="./Interaction-BDD/AjoutBDD_dossierPatient_Examens.php?id_patient=<?php echo $id_patient; ?>" method="post">
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
                            <br><img src='Icones/patient_bleu.png' align='left' alt='sorry' width="50px" heigh="50px"><h2 style="color:grey";><?php echo $prenom_p." ".$nom_p ; ?><br></h2>
                      
                        
            
                <div id="container">
                    <br>
                           

                    <div class="position_table"> 
                        <div class="liste">
                        <table align="center" cellspacing="5px" cellpadding="15px" class="table">


                                <tr>
                                    <th>Examen</th>
                                    <th style="text-align:center">Réalisé</th>
                                <?php
                                        $compteur=1;
                                        $reponse = $bdd->query('SELECT * FROM Examen');
                                        while($dnn = $reponse->fetch()){
                                    ?>
                                    <tr>
                                    <td><?php print_r($dnn['typeExamen']); ?></td> 
                                    <td><input type="checkbox" name="<?php echo($compteur); ?>" value="YES"/></td>
                                    <?php $compteur=$compteur+1; ?>
                                    </tr>
                                    <?php
                                        };
                                    ?>

                        </table>
                              <input type="submit" accesskey="enter" value="Prendre RDV" onmousemove="changeBgColor('btn')" onmouseout="recoverBgColor('btn');"  class="submit position_submit" id="btn" formmethod="post" /> 
                        </div>
                    </div>
                </div>
                    </div>
        </div>
            </div>
        </div>
        </div>
        </form>
            <script type="text/javascript">
                //utilisation de jQuery :
                $(function($)   {
                    $('#nom_m_appelant').autocomplete({
                        source : 'dossierPatient.php'
                    });
                    $('#nom_m_traitant').autocomplete({
                        source : 'dossierPatient.php'
                    });
                });
            </script>  
         <script src="General.js"></script>
    </body>

</html>

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
