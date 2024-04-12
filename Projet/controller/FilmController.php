<?php

    namespace Controller;
    use Model\Connect;

    class FilmController {

        /**
         * Lister les films
         */

        public function listFilms() {

            $pdoFilms = Connect::seConnecter();
            $requeteFilms = $pdoFilms->query("SELECT * FROM film");

            require "view/listFilms.php";
        }


        //Détails d'un film 
        
        public function detailsFilm() 

        //Ajout d'un film 

        public function ajoutFilm() 

        //Ajout d'un casting

        public function ajoutCasting() 

        //Supprimer un film 

        public function supprimFilm() 


    }







?>