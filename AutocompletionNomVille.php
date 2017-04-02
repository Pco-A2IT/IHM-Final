<?php
    
    ////////////////////
    /* création d'une classe pour permettre l'autocomplétion sur champs multiples : lors de la création d'un dossier médecin ou de sa modification l'ensemble des champs du service sont entrés si le service existe déjà dans la BDD ; appelé depuis autocompletionService.php */
    ////////////////////

    // Les propriétés doivent être public pour qu'elle puisse entre lu par la méthode de transformation en JSON.
    // on crée une propriété par donnée issue de la bdd
    class AutoCompletionNomVille {
        public $ville_p;
        public $codePostal_p;
    }
?>