<?php

    namespace Controller;
    use Model\Connect;

    class ActeurController {

        public function listActeurs() {

            /**
             * Lister les Acteurs 
            */
            $pdoActeurs = Connect::seConnecter();
            // requete qui va afficher la liste des acteurs (nom prenom dateNaissance)
            $requeteActeurs = $pdoActeurs->query("SELECT * FROM acteur");
            require "view/listActeurs.php";
        }


        // Afficher les détails d'un acteur 
        public function detailsActeur()
        
        // Ajouter un acteur 
        public function ajoutActeur()

        // Supprimer un Acteur 
        public function supprimActeur()

    }
?>