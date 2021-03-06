<!-- authentification -->
<?php 
    require 'inc/functions.php';
    logged_only();
    require 'inc/header.php'; 
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
                    <h4>Tableau de bord</h4>
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
                    <h4>Outils</h4>
                    <img class="icone_menu" src="Icones/parametres_blanc.png"/>      
                </div>

                <script src="js/General.js"></script>

            </div>

            <div class="titre";   style="border-radius: 5px;">
                <h1 class="titreGauche">Prise de Rendez-vous</h1>
                <script>
                    jQuery(document).ready(function() {
                        jQuery(".datepick").datepicker({
                            minDate: '0'
                        });
                    });
                </script>

            </div>
            <div class="blanc";   style="border-radius: 5px;">
                <div class="section4">
                    <div class="div1" style="color:black">
                        <?php
                            $id_patient=$_GET['id_patient'];
                            $req = $bdd->prepare('SELECT * FROM patient WHERE id_patient = ? ');
                            $req->execute(array($id_patient));
                            while ($donnees = $req->fetch()){
                                $nom_p=$donnees['nom_p'];
                                $prenom_p=$donnees['prenom_p'];
                                $telephone_p=$donnees['telephone_p'];
                                $ville_p=$donnees['ville_p'];
                                $codePostal_p=$donnees['codePostal_p'];
                                $adresse_p=$donnees['adresse_p'];
                            }
                        ?>
                
                        <br>
                        <img src='Icones/patient_bleu.png' align='left' alt='sorry' width="50px" heigh="50px">
                        <h2 style="color:grey";><?php echo $nom_p." ".$prenom_p ?><br><br><?php echo $telephone_p; ?></h2>
                        <br>
                              
                        <style>
                            #divConteneur{
                                min-height:630px;
                                height:630px;
                                min-width:100%;
                                width:100%;
                                overflow:auto;/*pour activer les scrollbarres*/
                            }
                        </style>
                        
                        <div id="divConteneur">
                             <div class="liste">
                                 <form action='./Interaction-BDD/ModifBDD_Patient_Examens.php?id_patient=<?php echo $id_patient; ?>' id= "form" class ="form" namemethod="post">    
                                     <div class="position_table">                                
                                        <table cellspacing="0px" id="tbl" class="table" style="margin-left:0px">   
                                            <tr>
                                                <th colspan="8">  
                                                    <h4>Récapitulatif des rendez-vous planifiés :</h4>
                                                </th>
                                            </tr>
                                            <tr>
                                                <th>Examen</th>
                                                <th>Hôpital </th>
                                                <th>Service/Centre d'examen </th>
                                                <th>Jour </th>
                                                <th>Horaire </th>
                                                <th>Réalisé </th>
                                                <th></th>
                                                <th></th>
                                            </tr>


                                            <?php
                                                $req= $bdd->prepare('SELECT * FROM Examen_patient WHERE id_patient=?');
                                                $req->execute(array($id_patient));
                                                //$cmpt=1;
                                                while ($donnees = $req->fetch()){ 
                                            ?>
                                                                                    
                                            <tr>

                                                <?php 
                                                    $req1= $bdd->prepare('SELECT * FROM Examen WHERE id_examen=?');
                                                    $req1->execute(array($donnees["id_examen"]));
                                                    while ($dnn= $req1->fetch()){
                                                ?>

                                                <td><?php echo $dnn["typeExamen"];?></td> 

                                                <?php 
                                                    } 
                                                    if($donnees["id_service"]==0){ 
                                                ?>
                                                
                                                <td><?php echo "NC"; ?></td>
                                                <td><?php echo "NC"; ?></td>
                                                
                                                <?php 
                                                    }
                                                    else {
                                                         $req2= $bdd->prepare('SELECT * FROM Service WHERE id_service=?');
                                                         $req2->execute(array($donnees["id_service"]));
                                                         while ($dnn2= $req2->fetch()) {
                                                ?>

                                                        <td><?php echo $dnn2["centre_s"]; ?></td>
                                                        <td><?php echo $dnn2["nom_s"]; ?></td>
                                    
                                                <?php 
                                                        }       
                                                    }
                                                ?>
            
                                                <?php 
                                                    if($donnees["date_examen"]=="1970-01-01") { 
                                                ?>
                                                
                                                <td><?php echo "NC"; ?></td>
                                                <td><?php echo "NC"; ?></td>

                                                <?php 
                                                    }
                                                    else { 
                                                ?>
                                                
                                                <td><?php echo $donnees["date_examen"]; ?></td>
                                                <td><?php echo $donnees["heure_examen"]; ?></td>
                                                
                                                <?php 
                                                    } 
                                                ?>
                                                
                                                <?php
                                                    if($donnees["effectue"]=="YES"){
                                                ?> 
                                                
                                                <td>
                                                    <input type="checkbox" name="<?php echo $donnees["id_examen"]; ?>" value="YES" onchange="document.getElementById('btntest').style.display = 'block';" checked />
                                                </td>
                                                
                                                <?php
                                                    }
                                                    else {
                                                ?> 
                                                
                                                <td>
                                                    <input type="checkbox" name="<?php echo $donnees["id_examen"]; ?>" onchange="document.getElementById('btntest').style.display = 'block';" value="NO"/>
                                                </td>
                                                
                                                <?php
                                                    }
                                                ?>
                                                
                                                <td>
                                                    <input align="center" type="submit" accesskey="enter" value="Valider" class="submit" formmethod="post" />
                                                </td>
                                                <form>
                                                    <td>
                                                        <a href="./Interaction-BDD/SupprBDD_ExamPatient.php?id_examen=<?php echo $donnees["id_examen"]; ?>&amp id_patient=<?php echo $id_patient; ?>"; onclick="return sure();">
                                                            <img class="supprimer" src="Icones/button_supprimer.png">
                                                        </a>
                                                    </td>
                                                </form>  
                                            </tr>
                                            
                                            <?php
                                                }
                                            ?>  
                                        
                                         </table>                                                   
                                     </div>        
                                 </form>
                 
                                 <!-- AFFICHAGE des EXAMENS A PLANIFIER -->                                
                                 <form action="Prise_RDV.php?id_patient=<?php echo $id_patient; ?>" method="post">         
                                    <?php
                                        /*Compter le nombre d'examen dans la bdd*/
                                        $req= $bdd->prepare('SELECT * FROM Examen');
                                        $req->execute();
                                        $nbexam=0;
                                        while($donnees= $req->fetch()) {//Parcour de la table examen
                                          $nbexam=$nbexam+1;//on incrémente à chaque examen
                                        }
                                        
                                        ///////////////////////////////////////////////////////////////////
                                        /*Construction de la requete sql en fonction des checkbox cochées*/
                                        ///////////////////////////////////////////////////////////////////
                                     
                                        $premier=true;
                                        $req1= $bdd->prepare('SELECT * FROM Examen');
                                        $req1->execute();
                                        $compteur=1;//va parcourir toutes les checkbox de la page (créees plus haut)
                                        $comptExamVrai=1;//Désigne le nombre d'examen cochées par l'utilisateur
                                        $chaine = 'SELECT * FROM Service ';//désigne le début de la requete que nous allons faire à la bdd
                                        while($donnee= $req1->fetch()) {
                                          if(isset($_POST[$compteur])) {//si la checkbox de name $compteur est cochée on complète la requête "$chaine"
                                                //selon que la checkbox est la première ou pas l'ajout à la requete est différent
                                                if($premier==true) {//WHERE pour la première checkbox cochée
                                                  $chaine=$chaine.' WHERE( `'.$donnee['typeExamen'].'`="YES"';
                                                  $premier=false;
                                                }
                                                else {//OR pour les autres checkbox
                                                    $chaine=$chaine.' OR `'.$donnee['typeExamen'].'`="YES"';
                                                } 
                                                $comptExamVrai=$comptExamVrai+1;//on incrémente le compteur des examens cochés
                                            }
                                            $compteur=$compteur+1;//on incrémente le compteur qui parturt TOUTES les checkbox
                                        }
                                        $chaine=$chaine.") ORDER BY centre_s";//la requete est contruite

                                        ///////////////////////////////////////////////////////////////////
                                        /*          Execution de la requete                              */
                                        ///////////////////////////////////////////////////////////////////

                                        if($comptExamVrai==1) {//Si aucune cases n'est cochée on ne veut rien afficher
                                            $chaine = 'Cocher au moins une case examen';
                                            $aucune_demande=true;
                                        }
                                        else {//sinon, on execute la requete

                                            $aucune_demande=false;
                                            $req2=$bdd->prepare($chaine);
                                            $req2->execute();
                                        }
                                    ?>
       
                                    <br>   
                                    <table cellspacing="0px" id="tbl" class="table"> 
                                       <tr>
                                           <th colspan="7"><h4>Veuillez choisir les examens et planifier les rendez-vous :</h4></th>
                                        </tr>
                                        <tr>  
                                            <form>
                                                <td colspan="7" >   
                                                    <?php
                                                        //marche mais ne prend pas en compte les examens déjà planifié
                                                        /////////////////////////            
                                                        $req3= $bdd->prepare('SELECT * FROM Examen_patient WHERE id_patient=? and id_examen=1');
                                                        $req3->execute(array($id_patient));
                                                        if($req3->fetch()){
                                                            $compteur=1;
                                                            $req4= $bdd->prepare('SELECT * FROM Examen');
                                                            $req4->execute();
                                                            while($dnn4 = $req4->fetch()){
                                                                if($dnn4["id_examen"]!=1){
                                                    ?>                                                                    
                                                    
                                                    <input type="checkbox" name="<?php echo $compteur; ?>" class="regular checkbox" value="YES"/> <label for="<?php echo($compteur); ?>"></label>&nbsp;<?php print_r($dnn4['typeExamen']); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        
                                                    <?php  
                                                                }
                                                                $compteur=$compteur+1;
                                                            }
                                                        }
                                                        else {
                                                            $compteur=1;
                                                            $reponse = $bdd->query('SELECT * FROM Examen');      
                                                            while($dnn = $reponse->fetch()){
                                                                $dejaRealise=false;
                                                                if($dnn['id_examen']!=1){

                                                                    $req1= $bdd->prepare('SELECT * FROM Examen WHERE id_examen NOT IN(SELECT id_examen FROM examen_patient WHERE id_patient=?)');
                                                                    $req1->execute(array($id_patient));

                                                                    while ($dnn2 = $req1->fetch()){
                                                                        if($dnn2["typeExamen"] == $dnn["typeExamen"]){
                                                                            $dejaRealise=true;
                                                                        }
                                                                    }
                                                                    if($dejaRealise==true){

                                                    ?>     
                                    
                                                    <input type="checkbox" name="<?php echo $compteur; ?>" class="regular checkbox" value="YES" checked/><label for="<?php echo($compteur); ?>"></label>&nbsp;<?php print_r($dnn['typeExamen']); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                                                    <?php
                                                                    }
                                                                    else {

                                                    ?>     
                                    
                                                    <input type="checkbox" name="<?php echo $compteur; ?>" class="regular checkbox" value="YES"/><label for="<?php echo($compteur); ?>"></label>&nbsp;<?php print_r($dnn['typeExamen']); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                                                    <?php
                                                                    }
                                                                }
                                                                $compteur= $compteur+1;
                                                            }
                                                        }
                                                    ?>
                                                    
                                                </td>
                                                <td>
                                                    <input align="center" type="submit" accesskey="enter" value="Rechercher" id="btnrecherche" onmousemove="changeBgColor('btn')" onmouseout="recoverBgColor('btn');"  formmethod="post"/>
                                                </td>
                                                <td></td>                               
                                            </form>                            
                                        </tr>                                          
                                        <tr>
                                            <th>Hôpital</th>
                                            <th>Service/Centre d'examen</th>
                                            <th>Ville</th>
                                            <th>Adresse</th>
                                            <th>Téléphone</th> 
                                            <th>Examen</th>
                                            <th>Jour</th>
                                            <th>Horaire</th>
                                            <th></th>
                                        </tr>
                                        
                                        <?php 
                                            $req1= $bdd->prepare('SELECT * FROM Service WHERE id_service=1 ');
                                            $req1->execute();
                                            while($donnees= $req1->fetch()){
                                        ?>                                        
                            
                                        <tr>
                                            <td><?php echo $donnees['centre_s']; ?> </td>
                                            <td><?php echo $donnees['nom_s']; ?></td>
                                            <td><?php echo $donnees['ville_s']; ?></td>
                                            <td><?php echo $donnees['adresse_s']; ?></td>
                                            <td><?php echo $donnees['telephone_s']; ?></td>
                                            
                                                <?php 
                                                    $req11= $bdd->prepare('SELECT * FROM examen WHERE id_examen=1 ');
                                                    $req11->execute();
                                                    while($donnees11= $req11->fetch()){
                                                ?>
                                
                                            <form action="./Interaction-BDD/AjoutBDD_ExamPatient.php?id_patient=<?php echo $id_patient;?> &amp; idservice= <?php echo $donnees["id_service"];?> &amp; idexamen=<?php echo $donnees11["id_examen"];?>" method="post">                                        
                                                <td><?php echo $donnees11['typeExamen'] ?></td>
                                                <td><label for="date"></label><input id="1" name="date" class="datepick" type="date"  onblur="verifDate(this);" value=""/></td>
                                                <td><label for="heure"></label><input id="heure" name="heure" type="time" value="" required/></td>
                                                <td><input align="center" type="submit" accesskey="enter" value="Valider" sytle="color:black" id="valider1"  class="submit" disabled formmethod="post"/></td>
                                                <td><span id="erreurdate1"></span></td>                                
                                            </form>                            
                                        </tr>
                            
                                        <?php 
                                                    }
                                                }

                                                ///////////////////////////////////////////////////////////////////
                                                /*          Affichage de Prise de RDV                            */
                                                ///////////////////////////////////////////////////////////////////        

                                                //On affiche que si au moins une case est cochée
                                                if($aucune_demande==false){
                                                    //on parcourt tous les services qui effectue les examens cochés
                                                    $nb=1;
                                                    while ($donnees = $req2->fetch()){
                                                        if($donnees["id_service"]!=1){
                                                                $req3= $bdd->prepare('SELECT * FROM Examen');
                                                                $req3->execute();

                                                                /////////////////////////////////////////////////////////////////////
                                                                /* Calcul du nbre de ligne a afficher à partir de la colonne examen*/
                                                                /////////////////////////////////////////////////////////////////////

                                                                $nbcroix=1;//désigne le parcours des checkbox 
                                                                $comptspan=0;
                                                                    while($dnn= $req3->fetch()){
                                                                        //on affiche une ligne lorsque les examens cochés sont dispensés dans le service considéré
                                                                        if($donnees[$dnn['typeExamen']]=="YES" && isset($_POST[$nbcroix])){
                                                                            $comptspan=$comptspan+1;
                                                                        }
                                                                        $nbcroix=$nbcroix+1;
                                                                    }
                                        ?>
                                                                        
                                        <tr>
                                            <td rowspan="<?php echo $comptspan; ?>"> <?php echo $donnees['centre_s']; ?></td>
                                            <td rowspan="<?php echo $comptspan; ?>"> <?php echo $donnees['nom_s']; ?></td>
                                            <td rowspan="<?php echo $comptspan; ?>"> <?php echo $donnees['ville_s']; ?></td>
                                            <td rowspan="<?php echo $comptspan; ?>"><?php echo $donnees['adresse_s']; ?></td>
                                            <td rowspan="<?php echo $comptspan; ?>"><?php echo $donnees['telephone_s']; ?></td>

                                            <?php
                                                /////////////////////////////////////////////////////////////////////
                                                /*  affichage des colonnes examens, jour, horaires, planifié       */
                                                /////////////////////////////////////////////////////////////////////

                                                                    $req4= $bdd->prepare('SELECT * FROM Examen');
                                                                    $req4->execute();
                                                                    $nbcroix=1;
                                                                    $nbcroixValide=1;
                                                                    $cmpt=1;

                                                                    //on parcourt les examens cochés ET dispensé par le service considéré
                                                                    while($dnn= $req4->fetch()){
                                                                            if($donnees[$dnn['typeExamen']]=="YES" && isset($_POST[$nbcroix])){
                                            ?>
                                                                            
                                            <form action="./Interaction-BDD/AjoutBDD_ExamPatient.php?id_patient=<?php echo $id_patient;?> &amp; idservice= <?php echo $donnees["id_service"];?> &amp; idexamen=<?php echo $dnn["id_examen"];?> " method="post">
                                                <td><?php echo $dnn['typeExamen'] ?></td>
                                                <td><label for="date"></label><input id="<?php echo $nb.$nbcroixValide; ?>" name="date" class="datepick" type="date"  onblur="verifDate(this);" value=""/></td>
                                                <td><label for="heure"></label><input id="heure" name="heure" type="time" value="" required/></td>
                                                <td><input align="center" type="submit" accesskey="enter" value="Valider" sytle="color:black" id="<?php echo "valider".$nb.$nbcroixValide; ?>"  class="submit" disabled formmethod="post"/></td>
                                                <td><span id="<?php echo "erreurdate".$nb.$nbcroixValide; ?>"></span></td>
                                            </form>                                                                        
                                        </tr>
                                        <tr>
                                        <?php 
                                                                                $nbcroixValide=$nbcroixValide+1;
                                                                            }
                                                                            $nbcroix=$nbcroix+1;
                                                                        }
                                                                    }
                                                                    $nb=$nb+1;
                                                                }
                                                            }
                                        ?>
                                        </tr>                                                           
                                     </table>
                                </form>                       
                            </div>                   
                        </div>            
                    </div>              
                    <script src="js/General.js"></script>        
                </div>    
            </div>    
        </div>
    </body>
</html>

<?php require 'inc/footer.php'; ?>

<script> 
    function sure() {
        return(confirm('Etes-vous sûr de vouloir supprimer ce rendez-vous ?'));
    }                 
</script>

<script language="JavaScript">
    
    console.log("Bouton afficher");

    function Afficher_1(id) { 
        console.log('valider'+id);
        document.getElementById('valider'+id).disabled= false;
        document.getElementById('valider'+id).style.background="#1270B3";
    }
    function Cacher_1(id) {   
        console.log('valider'+id);
        document.getElementById('valider'+id).disabled= true;
        document.getElementById('valider'+id).style.background="red";
    }
    
    function verifDate(champ) {
        id=champ.id;
        console.log(id);
        var date = new Date();
        var date_n = document.getElementById(id).value;
        var date2 = new Date(date_n);
        console.log(date);
        console.log(date_n);
        console.log(date2);
        console.log(date2-date);

        var WNbJours = date2.getTime() - date.getTime();
        console.log(Math.ceil(WNbJours/(1000*60*60*24)));

        if(Math.ceil(WNbJours/(1000*60*60*24))>=0) {
            document.getElementById('erreurdate'+id).innerHTML = 'Valider la ligne avant de remplir une autre ligne';
            Afficher_1(id);
            return true;
        }
        else {
            document.getElementById('erreurdate'+id).innerHTML = 'Date déjà passée';
            Cacher_1(id);
          return false;
        }
    }
 
    function test() {
        console.log("tester");
        <?php
            echo "olaaaa";
        ?>
    }
    
</script>


    
