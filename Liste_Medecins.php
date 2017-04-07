<!--fichier permettant d'afficher la liste des médecins ; appelé depuis le menu principal, en appuyant sur le bouton Medecins (id=menu2)-->

<!--authentification-->
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
        <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
            <!--inclusion CSS pour autocompletion-->
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> 
        <title>Liste Médecins</title>
    </head>
    
    <body>
            <!-- inclusion de jQuery et jQuery.ui-->
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
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
                <div id="menu2" class="carreGris"  style="background-color:#1270B3"  ;>
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
         
                <div class="titre";   style="border-radius: 5px;">
                    <h1 class="titreGauche">Médecins</h1>
                </div>
            
                <!-- autocomplétion du champ saisie pour la recherche -->
                <script type="text/javascript">
                    $(function($)   {
                        $('#saisie').autocomplete({
                            source : 'listeMedecins.php'
                        });
                    });
                </script>
                    
                <script src="js/General.js"></script>        
                <div class="blanc";   style="border-radius: 5px;">
                    <div class="myButton" id="Ajouter_liste"> 
                        <a href="Dossier_Medecin.php" class="myButton1" style=" cursor:copy;">Ajouter Médecin</a>
                    </div>  
                    <br>
                    <br>
                    <br>
                        <form id="recherche" method="post" class="recherche">
                               <input name="saisie" id="saisie" type="text" placeholder="Rechercher médecin..."  />
                        <input class="loupe" type="submit" value="" />
                        <input  type="submit" id="afficher" value="Afficher liste complète" >

                        </form> 
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
                
                <table cellspacing="0px" id="tbl" class="table">   
                        
                                <th></th>
                                <th>Nom </th>
                                <th>Prénom </th>
                                <th>Email </th>
                                <th>Téléphone</th>
                                <th>Spécialité</th>
                                <th>Service </th>
                                <th>Hôpital</th>
                                <th></th>
                        
                                <?php
                                    if(isset($_POST['saisie'])){
                                        $query = 'SELECT * FROM medecin ORDER BY nom_m WHERE nom_m LIKE :term';
                                        $term = $_POST['saisie'];
                                    }
                                    else{
                                        $query = 'SELECT * FROM medecin ORDER BY nom_m';
                                        $term="";
                                    }  
                                    try {
	                                    $pdo_select = $bdd->prepare($query);
	                                    $pdo_select->execute(array('term' => $term.'%'));
                                    }
                                    catch (PDOException $e){ echo 'Erreur SQL : '. $e->getMessage().'<br/>'; die(); }
                                    while($dnn = $pdo_select->fetch() ) {
                                ?>
                                        
                                    <tr onclick="document.location='Dossier_Medecin_modif.php?idmedecin=<?php echo  $dnn['id_medecin']; ?>'" style="cursor:zoom-in">
                                        <td><img class="icone_liste" src="Icones/medecin_bleu.png"width="50px" heigh="50px" alt="Photo de médecin" /></td>
                                        <td><?php print_r($dnn['nom_m']); ?></td>
                                        <td><?php print_r($dnn['prenom_m']); ?></td>
                                        <td><?php print_r($dnn['mail_m']); ?></td>
                                        <td><?php print_r($dnn['telephone_m']); ?></td>
                                        <td><?php print_r($dnn['specialite_m']); ?></td>
                                <?php
                                    if($dnn['id_service']==0){
                                ?>
                                        <td>NC</td>
                                        <td>NC</td>
                                 <?php       
                                    }
                                    else{    
                                        $req21 = $bdd->prepare('SELECT * FROM service WHERE id_service = ? ');
                                        $req21->execute(array($dnn['id_service']));
                                        while ($dnn21 = $req21->fetch()){
                                ?>
                                        <td><?php print_r($dnn21['nom_s']); ?></td>
                                        <td><?php print_r($dnn21['centre_s']); ?></td>
                                        
                                <?php
                                        }
                                    }
                                        ?>
                                       
                                        <td><a href="./Interaction-BDD/SupprBDD_Medecin.php?idmedecin=<?php echo $dnn['id_medecin']; ?>" onclick="return sure();"> <img class="supprimer" src="Icones/button_supprimer.png"> </a></td>
                                    </tr>

                                <?php
                                    }
                                ?>

                                <!-- Fonction permettant de demander une confirmation lors de la demande de suppression-->     
                                <script> 
                                    function sure() {
                                        return(confirm('Etes-vous sûr de vouloir supprimer ce Medecin ?'));}
                                </script>  

                        </table> 
                    </div>
                </div>
            </div>
        </div>
        </div>
    </body>
</html>

<?php require 'inc/footer.php'; ?>