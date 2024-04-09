<?php

    namespace Controller;
    use Model\Connect;

    class CinemaController {

        /**
         * Lister les films
         */

        public function listFilms() {

            $pdoFilms = Connect::seConnecter();
            $requeteFilms = $pdoFilms->query("SELECT * FROM film");

            require "view/listFilms.php";
        }

        public function listActeurs() {
            // requête Acteurs
            $pdoActeurs = Connect::seConnecter();
            // cree une requete qui va afficher ula liste des acteurs (nom prenom dateNaissance)
            $requeteActeurs = $pdoActeurs->query("SELECT * FROM acteur")
            require "view/listActeurs.php";
        }

        public function listRealisateurs() {
            // requête Realisateurs
            $pdoRealisateurs = Connect::seConnecter();
            // cree une requete qui va afficher ula liste des acteurs (nom prenom dateNaissance)
            $requeteRealisateurs = $pdoRealisateurs->query("SELECT * FROM realisateur")
            require "view/listRealisateurs.php";
        }

        public function listGenres() {
            // requête Genre
            $pdoGenres = Connect::seConnecter();
            // cree une requete qui va afficher ula liste des categories des films (action, comedy...)
            $requeteGenres = $pdoGenres->query("SELECT * FROM genre")
            require "view/listGenres.php";
        }

        public function detailFilm() {

            $pdoDetailFilm = Connect::seConnecter();

            $requeteDetailFilm = $pdoDetailFilm->prepare("SELECT * FROM acteur WHERE id_acteur : id");
            $requeteDetailFilm -> execute(["id"=>$id])

        }
        
    }


?>