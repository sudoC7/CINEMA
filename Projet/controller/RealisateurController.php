<?php

    namespace Controller;
    use Model\Connect;

    class RealisateurController {

        /**
         * Lister les Réalisateurs  
         */

        public function listRealisateurs() {
            $pdoRealisateurs = Connect::seConnecter();
            // requete qui va afficher la liste des acteurs (nom prenom dateNaissance)
            $requeteRealisateurs = $pdoRealisateurs->query("SELECT * FROM realisateur");
            require "view/listRealisateurs.php";
        }


        //Afficher les réalisateurs 
        public function afficheRealisateur() {}

        //Ajouter un réalisateur 
        public function ajoutRealisateur() {}

        //Supprimer un réalisateur 
        public function spprimRealisateur() {}

    }

?>