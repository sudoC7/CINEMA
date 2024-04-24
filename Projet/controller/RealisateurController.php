<?php

    namespace Controller;
    use Model\Connect;

    class RealisateurController {

        /**
         * Lister les Réalisateurs
         */

        public function listRealisateurs() {
            
            $rocketReal = "SELECT CONCAT(nomReal, ' ', prenomReal) AS Realisateur , dateNaissanceReal FROM realisateur";
            
            $pdoRealisateurs = Connect::seConnecter();
            $requeteRealisateurs = $pdoRealisateurs->query($rocketReal);
            require "view/realisateur/listRealisateurs.php";
        }


        // ??? details d'un réalisateur ??? 
        public function afficheRealisateur() {}

        //Ajouter un réalisateur 
        public function ajoutRealisateur() {}

        //Supprimer un réalisateur 
        public function spprimRealisateur() {}

    }

?>