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





    public function detailFilm() {

        $pdoDetailFilm = Connect::seConnecter();

        //requete qui n'affichera qu'un acteur en particulier 
        $requeteDetailFilm = $pdoDetailFilm->prepare("SELECT * FROM acteur WHERE id_acteur : id");
        $requeteDetailFilm -> execute(["id"=>$id]);

    }






?>