<?php

    namespace Controller;
    use Model\Connect;

    class FilmController {

        /**
         * Lister les films
         */

        public function listFilms() {

            $rocket = "SELECT titre, anneeSortie FROM film";

            $pdoFilms = Connect::seConnecter();
            $requeteFilms = $pdoFilms->query($rocket);

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