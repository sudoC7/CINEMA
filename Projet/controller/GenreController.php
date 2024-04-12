<?php

    namespace Controller;
    use Model\Connect;

    class listGenres {

        public function listGenres() {
        
            $pdoGenres = Connect::seConnecter();
            // requete qui va afficher la liste des categories des films (action, comedy...)
            $requeteGenres = $pdoGenres->query("SELECT * FROM genre");
            require "view/listGenres.php";
        }

    }
?>