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

    }







?>