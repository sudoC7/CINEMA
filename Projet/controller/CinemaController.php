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
            
            $pdoActeurs = Connect::seConnecter();
            // requete qui va afficher la liste des acteurs (nom prenom dateNaissance)
            $requeteActeurs = $pdoActeurs->query("SELECT * FROM acteur")
            require "view/listActeurs.php";
        }

        public function listRealisateurs() {
            
            $pdoRealisateurs = Connect::seConnecter();
            // requete qui va afficher la liste des acteurs (nom prenom dateNaissance)
            $requeteRealisateurs = $pdoRealisateurs->query("SELECT * FROM realisateur")
            require "view/listRealisateurs.php";
        }

        public function listGenres() {
            
            $pdoGenres = Connect::seConnecter();
            // requete qui va afficher la liste des categories des films (action, comedy...)
            $requeteGenres = $pdoGenres->query("SELECT * FROM genre")
            require "view/listGenres.php";
        }

        public function detailFilm() {

            $pdoDetailFilm = Connect::seConnecter();

            //requete qui n'affichera qu'un acteur en particulier 
            $requeteDetailFilm = $pdoDetailFilm->prepare("SELECT * FROM acteur WHERE id_acteur : id");
            $requeteDetailFilm -> execute(["id"=>$id])

        }

    }


?>