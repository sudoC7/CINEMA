<?php

    namespace Controller;
    use Model\Connect;

    class GenreController {
        
        /**
        * Lister les Genre (category)
        */

        public function listGenres() {

            $rocketGenres ="SELECT id_genre, genreFilm FROM genre";
        
            $pdoGenres = Connect::seConnecter();
            $requeteGenres = $pdoGenres->query($rocketGenres);
            require "view/genre/listGenres.php";
        }


        // Detail d'un genre 
        public function detailGenre($id) {

            $pdoGenre1 = Connect::seConnecter();
            $pdoGenre = Connect::seConnecter();

            if(isset($_GET['id'])){

                // Requete pour afficher le genre particulier
                $rocketGenre = "SELECT id_genre, genreFilm
                FROM genre
                WHERE id_genre = :id ";

                $pdoGenreParticulier = $pdoGenre1->prepare($rocketGenre);
                $pdoGenreParticulier->execute(["id" => $id]);
                $requeteGenre = $pdoGenreParticulier->fetch();

                // Requete pour afficher tous les films du genre choisi
                $rocketGenreFilms = "SELECT genre.id_genre, titre
                FROM genre
                INNER JOIN categorie ON categorie.id_genre = genre.id_genre
                INNER JOIN film ON categorie.id_film = film.id_film
                WHERE genre.id_genre = :id";

                $pdoGenreFilms = $pdoGenre->prepare($rocketGenreFilms);
                $pdoGenreFilms->execute(["id" => $id]);
                $requeteGenreFilms = $pdoGenreFilms->fetchAll();


            } else {
                echo "Pas de contenu\n";
            }

            require "view/genre/detailGenre.php";
        }

        //Ajout d'un genre
        public function ajoutGenre() {}

        // Supprimer un genre
        public function supprimGenre() {}


    }


?>