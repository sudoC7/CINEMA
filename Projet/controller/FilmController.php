<?php

    namespace Controller;
    use Model\Connect;

    class FilmController {

        /**
         * Lister les films
         */

        public function listFilms() {

            $rocketFilm = "SELECT titre, anneeSortie FROM film ORDER BY anneeSortie DESC";

            $pdoFilms = Connect::seConnecter();
            $requeteFilms = $pdoFilms->query($rocketFilm);

            require "view/listFilms.php";
        }


        //Détails d'un film 
        
        public function detailsFilm() {}

        //Ajout d'un film 

        public function ajoutFilm() {}

        //Ajout d'un casting

        public function ajoutCasting() {}

        //Supprimer un film 

        public function supprimFilm() {}


    }







?>