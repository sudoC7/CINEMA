<?php

    namespace Controller;
    use Model\Connect;

    class CinemaController {

        /**
         * Lister les films
         */

        public function listFilms() {

            $pdo = Connect::seConnecter();
            $requete = $pdo->query("SELECT * FROM film");

            require "view/listFilms.php";
        }

        public function listActeurs() {
            // requête Acteurs

            require "view/listActeurs.php";
        }

        public function listRealisateurs() {
            // requête Realisateurs
            
            require "view/listRealisateurs.php";
        }

        public function listGenres() {
            // requête Genre

            require "view/listGenres.php";
        }

    }


?>