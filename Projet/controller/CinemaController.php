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
        }

        public function listRealisateurs() {
            // requête Realisateurs
        }

        public function listGenre() {
            // requête Genre
        }

    }


?>