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

            // cree une requete qui va afficher ula liste des acteurs (nom prenom dateNaissance)
            require "view/listActeurs.php";
        }

        public function listRealisateurs() {
            // requête Realisateurs

            // cree une requete qui va afficher ula liste des acteurs (nom prenom dateNaissance)
            require "view/listRealisateurs.php";
        }

        public function listGenres() {
            // requête Genre

            // cree une requete qui va afficher ula liste des categories des films (action, comedy...)
            require "view/listGenres.php";
        }

    }


?>