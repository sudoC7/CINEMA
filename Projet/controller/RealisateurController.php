<?php

    namespace Controller;
    use Model\Connect;

    class RealisateurController {

        /**
         * Lister les Réalisateurs
         */

        public function listRealisateurs() {
            
            $rocketReal = "SELECT nomReal, prenomReal, dateNaissanceReal FROM realisateur";
            
            $pdoRealisateurs = Connect::seConnecter();
            $requeteRealisateurs = $pdoRealisateurs->query($rocketReal);
            require "view/listRealisateurs.php";
        }


        // ??? details d'un réalisateur ??? 
        public function afficheRealisateur() {}

        //Ajouter un réalisateur 
        public function ajoutRealisateur() {}

        //Supprimer un réalisateur 
        public function spprimRealisateur() {}

    }

?>