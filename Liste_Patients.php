<!--Page permettant d'afficher la liste des patients ; appelée depuis la page le menu principal, en appuyant sur le bouton Patients (id=menu0). -->

<!-- authentification -->
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
        <!--inclusion CSS pour autocompletion-->
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    </head>
    <body>
        <!-- inclusion de jQuery et jQuery.ui-->
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
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

                <div class="titre";   style="border-radius: 5px;">
                    <h1 class="titreGauche">Patients</h1> 
                </div>

                <script>
                    //script pour autocompletion
                    $(function($)   {
                        $('#saisie').autocomplete({
                            source : 'listePatients.php'
                        });
                    });
                </script>    

                <script src="js/General.js"></script>
                <div class="blanc";   style="border-radius: 5px;">
                    <div class="myButton" id="Ajouter_liste">
                        <a href="Dossier_Patient.php" class="myButton1"  style=" cursor:copy;">Ajouter Patient</a>
                    </div>
                    <br>
                    <br>
                    <br>
                    <form id="recherche" method="post" class="recherche">
                        <input name="saisie" id="saisie" type="text" placeholder="Rechercher Patient..."  />
                        <input class="loupe" type="submit" value="" />
                        <input  type="submit" id="afficher" value="Afficher liste complète"/>
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
                                <tr>
                                    <th></th>
                                    <th>Nom </th>
                                    <th>Prénom </th>
                                    <th>Date de naissance </th>
                                    <th>Date Symptôme </th>
                                    <th>Ville </th>
                                    <th>Téléphone </th>
                                </tr>   

                                <?php
                                    if(isset($_POST['saisie'])){
                                        $query = 'SELECT * FROM patient WHERE nom_p LIKE :term ORDER BY nom_p';
                                        $term = $_POST['saisie'];
                                    }
                                    else{
                                        $query = 'SELECT * FROM patient ORDER BY nom_p';
                                        $term="";
                                    }

                                    try {
                                        $pdo_select = $bdd->prepare($query);
                                        $pdo_select->execute(array('term' => $term.'%'));
                                    }
                                    catch (PDOException $e){ echo 'Erreur SQL : '. $e->getMessage().'<br/>'; die(); }

                                    while($dnn = $pdo_select->fetch() ) {
                                ?>
                                    <tr onclick="document.location='Dossier_Patient_modif.php?id_patient=<?php echo $dnn['id_patient'];?>'" style="cursor:zoom-in">
                                       <td><img class="icone_liste" src="Icones/patient_bleu.png" width="50px" heigh="50px" alt="Photo de patient" /></td>
                                       <td><?php print_r($dnn['nom_p']); ?></td>
                                       <td><?php print_r($dnn['prenom_p']); ?></td>
                                       <td><?php if(($dnn['date_naissance'])!= "1900-01-01"){print_r($dnn['date_naissance']);} else{ print_r("NC");}  ?></td>
                                       <td><?php if(($dnn['date_ait_p'])!= "1900-01-01"){print_r($dnn['date_ait_p']);} else{ print_r("NC");}  ?></td>
                                       <td><?php print_r($dnn['ville_p']); ?></td>
                                       <td><?php print_r($dnn['telephone_p']); ?></td>                            
                                       <td><a href="Prise_RDV.php?id_patient=<?php echo $dnn['id_patient'];?>"> <img class="supprimer" src="Icones/bouton_rdv.png"> </a></td>
                                        <td><a href="./Interaction-BDD/SupprBDD_Patient.php?id_patient=<?php echo $dnn['id_patient'];?>" onclick="return sure();"><img class="supprimer" src="Icones/button_supprimer.png"> </a></td>
                                    </tr>


                                <?php
                                    }
                                ?>

                                <!--Fonction qui permet de demander une confirmation lors de la demande de suppression-->                      
                                <script> 
                                    function sure() {
                                        return(confirm('Etes-vous sûr de vouloir supprimer ce Dossier Patient ?'));
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