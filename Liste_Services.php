<!-- Page permettant d'afficher la liste des services ; appelée depuis le menu principal, en appuyant sur le bouton Services (id=menu3). -->

<!-- authentification -->
<?php 
    require 'inc/functions.php';
    logged_only();
    require 'inc/header.php'; 
    include('config.php');
?>

<html>
    <head>
        <title> Liste Services</title>
        <link href="css/General.css"type="text/css"rel="stylesheet"/> 
        <meta charset="UTF-8">    
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> <!--inclusion CSS pour autocompletion-->

        <script>
            function deleteRow(obj){
                if(confirm('Vous êtes sure?')) {
                    tbl.deleteRow(obj.parentElement.parentElement.rowIndex);
                }
            }
        </script>    
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
                    <h4>Tableau de bord</h4>
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

                <div class="titre"; style="border-radius: 5px;">
                    <h1 class="titreGauche">Services</h1>
                </div>

                <script>
                    //utilisation de jQuery :
                    $(function($)   {
                        $('#saisie').autocomplete({
                            source : 'listeServices.php' 
                        });
                    });
                </script>    

                <script src="js/General.js"></script> 
                <div class="blanc"; style="border-radius: 5px;">  
                    <div class="myButton" id="Ajouter_liste">
                        <a href="Dossier_Service.php" class="myButton1"  style=" cursor:copy;"> Ajouter Service</a>
                    </div>
                    <br>
                    <br>
                    <br>
                    <form id="recherche" method="post" class="recherche">
                        <input name="saisie" id="saisie" type="text" placeholder="Rechercher Service..."  />
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
                            <table cellspacing="0px" id="tbl" class="table"> <!-- cellspacing='0' is important, must stay -->
                                <th></th>
                                <th>Service/Centre d'examen</th>
                                <th>Hôpital</th>
                                <th>Adresse</th>
                                <th>Code postal</th>
                                <th>Ville</th>
                                <th>Téléphone</th>
                                <th></th>

                                <?php
                                    if(isset($_POST['saisie'])) {
                                        $query = 'SELECT * FROM service WHERE nom_s LIKE :term ORDER BY centre_s ';
                                        $term = $_POST['saisie'];
                                    }
                                    else {
                                        $query = 'SELECT * FROM service ORDER BY centre_s ';
                                        $term="";
                                    }

                                    try {
                                        $pdo_select = $bdd->prepare($query);
                                        $pdo_select->execute(array('term' => $term.'%'));
                                    } 
                                    catch (PDOException $e) {
                                        echo 'Erreur SQL : '. $e->getMessage().'<br/>'; die(); 
                                    }

                                    while($dnn = $pdo_select->fetch() ) {
                                        if($dnn['id_service']!=1){
                                ?>

        
                                <tr onclick="document.location='Dossier_Service_modif.php?idservice=<?php echo $dnn['id_service']; ?>'" style="cursor:zoom-in">
                                    <td><img class="icone_liste" src="Icones/hopital_bleu.png" width="50px" heigh="50px" alt="Photo de patient" /></td>
                                    <td class="left"> <?php print_r($dnn['nom_s']); ?></td>
                                    <td class="left"> <?php print_r($dnn['centre_s']); ?></td>
                                    <td class="left"> <?php print_r($dnn['adresse_s']); ?></td>
                                    <td class="left"> <?php print_r($dnn['codePostal_s']); ?></td>
                                    <td class="left"> <?php print_r($dnn['ville_s']); ?></td>
                                    <td class="left"> <?php print_r($dnn['telephone_s']); ?></td>
                                    <td><a href="./Interaction-BDD/SupprBDD_Service.php?idservice=<?php echo $dnn['id_service']; ?>" onclick="return sure();"><img class="supprimer" src="Icones/button_supprimer.png"></a></td>
                                </tr>
                                
                                <?php
                                        }
                                        else{

                                ?>
                                
                                <tr onclick="document.location='Dossier_Service_modif.php?idservice=<?php echo $dnn['id_service']; ?>'" style="cursor:zoom-in">
                                    <td><img class="icone_liste" src="Icones/hopital_bleu.png" width="50px" heigh="50px" alt="Photo de patient" /></td>
                                    <td class="left"> <?php print_r($dnn['nom_s']); ?></td>
                                    <td class="left"> <?php print_r($dnn['centre_s']); ?></td>
                                    <td class="left"> <?php print_r($dnn['adresse_s']); ?></td>
                                    <td class="left"> <?php print_r($dnn['codePostal_s']); ?></td>
                                    <td class="left"> <?php print_r($dnn['ville_s']); ?></td>
                                    <td class="left"> <?php print_r($dnn['telephone_s']); ?></td>
                                    <td></td>
                                </tr>                   
                      
                                <?php              
                                        }
                                    }   
                                ?>
                                
                                <!--La fonction qui permet de demander une confirmation lors de la demande de suppression-->                  
                                <script> 
                                    function sure() {
                                        return(confirm('Etes-vous sûr de vouloir supprimer ce Service ?'));
                                    }                 
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
