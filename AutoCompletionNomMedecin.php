<?php

    /////////////////    
    /* création d'une classe pour permettre l'autocomplétion sur champs multiples : lors de la création d'un dossier patient ou de sa modification l'ensemble des champs du médecin sont entrés si le médecin existe déjà dans la BDD ; appelé depuis autocompletionMedecin.php */
    /////////////////////////

    // Les propriétés doivent être public pour qu'elle puisse entre lu par la méthode de transformation en JSON.
    // on crée une propriété par donnée issue de la bdd
    class AutoCompletionNomMedecin {
        public $nom_m;
        public $prenom_m;
        public $mail_m;
        public $ville_m;
    }
?>