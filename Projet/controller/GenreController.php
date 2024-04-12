<?php

    namespace Controller;
    use Model\Connect;

    class listGenres {

        public function listGenres() {

            /**
            * Lister les Genre (category)
            */
        
            $pdoGenres = Connect::seConnecter();
            // requete qui va afficher la liste des categories des films (action, comedy...)
            $requeteGenres = $pdoGenres->query("SELECT * FROM genre");
            require "view/listGenres.php";
        }


        // Lister les films par genre 
        public function listFilmGenre()
        
        // Supprimer un genre
        public function supprimGenre()


    }
?>