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
    $id_service=$_GET['id_service'];
?>
    
    <body>
        <form action="./Interaction-BDD/AjoutBDD_Service_Examens.php?id_service=<?php echo $id_service; ?>" method="post">    
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
                        <h4>Outils</h4>
                        <img class="icone_menu" src="Icones/parametres_blanc.png"/>
                    </div>
                        
                    <script src="js/General.js"></script>
                    <div class="titre";   style="border-radius: 5px;">
                        <h1 class="titreGauche">Services</h1>
                    </div>

                    <div class="blanc";   style="border-radius: 5px;">
                        <div class="section4">
                            <div class="div1">
                                <br><img src='Icones/hopital_bleu.png' align='left' alt='sorry' width="50px" heigh="50px"><h2 style="color:grey";>Nouveau Service<br></h2>
                                <br><br><br><br>
                            </div>
                           
                            <div class="onglet" id="onglet3">
                                <div class="position_table">
                                    <div class="liste">
                                        <table align="center" cellspacing="5px" class="table">

                                            <tr>
                                                <th></th>
                                                <td>Examens disponibles</td>
                                            </tr>
    <?php
        $compteur=1;
        $reponse = $bdd->query('SELECT * FROM Examen');
        while($dnn = $reponse->fetch()){
            if($dnn["id_examen"]!=1){
    ?>
                                            <tr>
                                                <td><?php print_r($dnn['typeExamen']); ?></td> 
                                                <td><input type="checkbox" name="<?php echo($compteur); ?>" value="YES"/></td>
    
                                            </tr>
    <?php
            }
            $compteur=$compteur+1;
        }
    ?>
                           
                                        </table>
                                        <input type="submit" accesskey="enter" value="Suivant"  onmousemove="changeBgColor('btn')" onmouseout="recoverBgColor('btn');" class="submit position_submit" id="btn" formmethod="post"/>   
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
    
<?php require 'inc/footer.php'; ?>

