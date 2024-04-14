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
            require "view/listGenres.php";
        }


        // Lister les films par genre 
        public function listFilmGenre() {}

        // Supprimer un genre
        public function supprimGenre() {}


    }


?>