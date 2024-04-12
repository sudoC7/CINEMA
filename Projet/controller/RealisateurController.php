<?php

    namespace Controller;
    use Model\Connect;

    class RealisateurController {

        /**
         * Lister les Réalisateurs  
         */

        public function listRealisateurs() {
            $pdoRealisateurs = Connect::seConnecter();

            $rocketReal = "SELECT nomReal, prenomReal, dateNaissanceReal FROM realisateur";
            $requeteRealisateurs = $pdoRealisateurs->query($rocketReal);
            
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