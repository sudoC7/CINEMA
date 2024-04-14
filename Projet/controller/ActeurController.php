<?php

    namespace Controller;
    use Model\Connect;

    class ActeurController   
        /**
         * Lister les Acteurs 
        */

        public function listActeurs() {

            $rocketActeurs = "SELECT nom, prenom, sexe FROM acteur";

            $pdoActeurs = Connect::seConnecter();
            $requeteActeurs = $pdoActeurs->query($rocketActeurs);
           
            require "view/listActeurs.php";
        }


        // Afficher les détails d'un acteur 
        public function detailsActeur() {}
        
        // Ajouter un acteur 
        public function ajoutActeur() {}

        // Supprimer un Acteur 
        public function supprimActeur() {}

    }
?>