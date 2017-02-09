<?php
   include('config.php');
?>
<html>
<head>
    <meta charset="UTF-8">
    <link href="css/General.css"type="text/css"rel="stylesheet"/> 
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> 
        <!--inclusion CSSS pour autocompletion-->
    <title>Liste Examens</title>
</head>
    <body>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <!-- inclusion de jQuery et jQuery.ui-->
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
                <h1 class="titreGauche">Examens</h1>
                
            </div>
            <script src="js/General.js"></script>
    <div class="blanc";   style="border-radius: 5px;">
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
                return(confirm('Etes-vous sûr de vouloir supprimer ce Service ?'));
            }                 
        </script>                                                                                                                       
        </table>
        <table cellspacing="0px" class="table" style="margin-top:30px;">
        <form action="./Interaction-BDD/AjoutBDD_Examen.php" method="post">
        <tr> 
            <td align="right">Nom de l'examen:</td> 
            <td align="left" colspan="2"> 
                <input type="text" name="type_examen" placeholder="(ex: IRM)"/> 
            </td> 
        </tr> 
        <tr> 
            <td align="right">Description:</td> 
            <td align="left" colspan="2"> 
                <input type="text" name="details_examen" placeholder="(ex: visualiser le cerveau)"/>
            </td> 
        </tr>
        <tr height="60px"> 
                <td align="center"  colspan="2"> 
                    <input align="center" type="submit" accesskey="enter" value="Ajouter" id="btn" onmousemove="changeBgColor('btn')" onmouseout="recoverBgColor('btn');" class="submit" formmethod="post"/> 
                </td> 
        </tr>
        </form>
        </table>
    </div>
    </div>
    </div>
</body>
</html>
        