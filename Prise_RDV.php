<?php
   include('config.php');
?>
<html>
<head>
   <link href="css/General.css"type="text/css"rel="stylesheet"/>    <!-- BOOTSTRAP -->
</head>
<body>
      <div class="gris">
            <div  class="gris2">
           <div id="menu0" class="carreGris" style="background-color:#1270B3" ;>
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
                        
            <div id="menu3" class="carreGris" ;>
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
                
            <div class="extra" id="RetourDossierPatient" style="border-radius: 5px;">
                <img class="icone_extra" src="medecin.png"/>
                <h4>Retour au dossier patient</h4></div>
            </div>
            
    
    <div class="titre";   style="border-radius: 5px;">
        <h1 class="titreGauche">Prise de Rendez-vous</h1>
    </div>
    <div class="blanc";   style="border-radius: 5px;">
          <div class="section4">
              <div class="div1" style="color:black">
             <img src='Icones/patient_bleu.png' align='left' alt='sorry' width="50px" heigh="50px"><h1 style="color:black";>Vincent Pasteur</h1><br>
          <div id="container"> 
              <br><br>
              
             <h4 style='color:grey padding-left:2; margin-top:10; margin-bottom:10'>Examens</h4>
             <form action="Prise_RDV.php" method="post">
                          <input type="checkbox" name="choix1" class="regular checkbox" value="on"/><label for="checkbox-1"></label>&nbsp;IRM&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          <input type="checkbox" name="choix2" class="regular checkbox" value="on"/><label for="checkbox-1"></label>&nbsp;Bilan Cardiaque&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          <input type="checkbox" name="choix3" class="regular checkbox" value="on"/><label for="checkbox-1"></label>&nbsp;RDV neurologue&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          <td align="center"  colspan="2">
                                <input align="center" type="submit" accesskey="enter" value="Rechercher" id="btn" onmousemove="changeBgColor('btn')" onmouseout="recoverBgColor('btn');" class="submit" formmethod="post"/> 
                          </td>
             </form>
             
              <?php
                
                
                if($_POST["choix1"]=="on"){
                $irm='YES';
              }else{
                $irm='NO';
              }
              if($_POST["choix2"]=="on"){
                $cardiaque="YES";
              }else{
                $cardiaque="NO";
              }
              if($_POST["choix3"]=="on"){
                $neuro="YES";
              }else{
                $neuro="NO";
              }
              
              
              if($irm=="YES"){
                //$reponse = $bdd->query('SELECT * FROM Service WHERE irm_s LIKE :YES');
                
                
              $reponse=$bdd->query('SELECT * FROM service WHERE irm_s=\'YES\' ');
             
               
                    
              }
              if($cardiaque=="YES"){
                $reponse = $bdd->query('SELECT * FROM service WHERE cardiaque_s=\'YES\'');
                
              }
              if($neuro=="YES"){
                $reponse = $bdd->query('SELECT * FROM service WHERE neuro_s=\'YES\'');
               
              }
              ?>
            <br>
            <br>
              <div class="div3">
                  <h4 style='color:grey padding-left:2; margin-top:10; margin-bottom:10'>Résultats Recherche</h4>
                  <table align="right" cellspacing="5px" class="table"> 
                      <tr><th>Centres</th><th>Adresse</th><th>Contact</th><th>Examens</th><th>Jour</th><th>Horaire</th><th>Planifié</th></tr>
                      <?php
                    while ($donnees = $reponse->fetch()){
                        ?>
                      <tr><td rowspan="3"><?php echo $donnees[centre_s]; ?></td><td rowspan="3"><?php echo $donnees['adresse_s']; ?></td><td rowspan="3"><?php echo $donnees['telephone_s']; ?></td><td> IRM </td>
                       <td>
                           <label for="date"></label><input id="date" type="date" value=""/></td>
                           <td><label for="heure"></label><input id="heure" type="time" value=""/></td>       
                           <td><input type="checkbox" id="checkbox-1" class="regular-checkbox" /><label for="checkbox-1"></label></td>
                      </tr>
                      <tr>
                    <?php
                       // if($donnees['cardiaque_s']=="YES"){
                    ?>
                      <td> Bilan Cardiaque </td>
                       <td>
                           <label for="date"></label><input id="date" type="date" value=""/></td>
                           <td><label for="heure"></label><input id="heure" type="time" value=""/></td>       
                           <td><input type="checkbox" id="checkbox-2" class="regular-checkbox" /><label for="checkbox-2"></label></td>
                      </tr>
                       <tr>
                    <?php
                        //}
                    ?>
                    <?php
                        //if($donnees['neuro_s']=="YES"){
                    ?>
                      <td> RDV neurologue </td>
                       <td>
                           <label for="date"></label><input id="date" type="date" value=""/></td>
                           <td><label for="heure"></label><input id="heure" type="time" value=""/></td>       
                           <td><input type="checkbox" id="checkbox-3" class="regular-checkbox" /><label for="checkbox-3"></label></td>
                      </tr>
                    <?php
                      //}
                      ?>
                    <?php
                        }
                    ?>
                      </table>
              </div>
              </div>
    </div>
    </div>
    </div>
    
         <script src="js/General.js"></script>
    </div>
</body>
</html>
    
