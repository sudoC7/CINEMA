<?php

    namespace Controller;
    use Model\Connect;

    class GenreController {
        
        /**
        * Lister les Genre (category)
        */

        public function listGenres() {

            $rocketGenres ="SELECT genreFilm FROM genre";
        
            $pdoGenres = Connect::seConnecter();
            $requeteGenres = $pdoGenres->query($rocketGenres);
            require "view/genre/listGenres.php";
        }


        // Lister les films par genre 
        public function listFilmGenre() {}

        //Ajout d'un genre
        public function ajoutGenre() {}

        // Supprimer un genre
        public function supprimGenre() {}


    }


?>