<?php 
require 'inc/functions.php';
logged_only();
require 'inc/header.php'; 
include('config.php');
?>


<html>
<head>
    <meta charset="UTF-8">
    <link href="css/General.css"type="text/css"rel="stylesheet"/> 
    <title>Liste Examens</title>
</head>
    <body>
    <div class="gris">
         <form action="./Interaction-BDD/AjoutBDD_Examen.php" method="post">
                <div  class="gris2">
         <div id="menu0" class="carreGris";>
                <h4>Patients</h4>    
                <img class="icone_menu" src="Icones/patient_blanc.png"/>
            </div> 
            <div id="menu1" class="carreGris";>
                <h4>Suivi</h4>
                <img class="icone_suivi" src="Icones/recapitulatif.png"/>
            </div>
            <div id="menu2" class="carreGris";>
                <h4>Médecins</h4>    
                <img class="icone_menu" src="Icones/medecin_blanc.png"/>
            </div>
                        
            <div id="menu3" class="carreGris" ;>
                <h4>Services</h4>
                <img class="icone_menu" src="Icones/hopital_blanc.png"/>
            </div>
             <div id="menu4" class="carreGris" style="background-color:#1270B3"  >
                <h4>Paramètres</h4>
                <img class="icone_menu" src="Icones/parametres_blanc.png"/>      
            </div>
            <div id="menu5" class="carreGris">
                <h4>Logout</h4>
                <img class="icone_menu" src="Icones/logout.png"/>      
            </div>
            <div class="titre";   style="border-radius: 5px;">
                <h1 class="titreGauche">Paramètres</h1>
    
            </div>
            <script src="js/General.js"></script>
    <div class="blanc";   style="border-radius: 5px;">
        <div class="section4">
                        <div class="div1">
                            <br><img src='Icones/parametres_bleu.png' align='left' alt='sorry' width="50px" heigh="50px"><h2 style="color:grey";>Examens<br></h2>
        <div class="liste">
        <table cellspacing="0px" id="tbl" class="table" style="margin-top:70px;">  
                        
                        <th>Nom Examen </th>
                        <th>Description </th>
        <?php
            $reponse = $bdd->query('SELECT * FROM Examen');
            while($dnn = $reponse->fetch()){
        ?>
        <tr>
        <td class="left"><?php print_r($dnn['typeExamen']); ?></td>
        <td class="left"> <?php print_r($dnn['details']); ?> </td>
        <td><a href="./Interaction-BDD/SupprBDD_Examen.php?idexamen=<?php echo $dnn['id_examen']; ?>" onclick="return sure();"><img class="supprimer" src="Icones/button_supprimer.png"></a></td> 
        </tr>                
            <?php
                };
            ?>
        <script> 
            function sure()
            {
                return(confirm('Etes-vous sûr de vouloir supprimer cet examen ?'));
            }                 
        </script>                                                                                                                       
        </table>
        <table cellspacing="0px" class="table" style="margin-top:30px;">
        <tr> 
            <td class="left">Nom de l'examen:</td> 
            <td class="left" > 
                <input type="text" name="type_examen" placeholder="(ex: IRM)" autocomplete="off"/> 
            </td> 
        </tr> 
        <tr> 
            <td class="left">Description:</td> 
            <td class="left"> 
                <input type="text" name="details_examen" placeholder="(ex: visualiser le cerveau)" autocomplete="off"/>
            </td> 
        </tr>
        <tr height="60px"> 
                <td align="center" colspan="2"> 
                    <input type="submit" accesskey="enter" value="Ajouter" id="btn" onmousemove="changeBgColor('btn')" onmouseout="recoverBgColor('btn')" class="submit" formmethod="post"/>
                </td>
        </tr>
        </table>
</div>
    </div>
    </div>
         </div>
                </div>
        </form>
    </div>
</body>
</html>
       
<?php require 'inc/footer.php'; ?>