<?php

    namespace Controller;
    use Model\Connect;
 
    class EditController{
        

        public function listEditCinema(){
            
            //var_dump($requeteGenresEdit->fetchAll());die;

            //Affiche FILM
            $rocketFilm = "SELECT id_film, titre FROM film";
            $pdoFilms = Connect::seConnecter();
            $requeteFilmsEdit = $pdoFilms->query($rocketFilm);
            
            
            // Affiche ACTEUR
            $rocketActeurs = "SELECT id_acteur, CONCAT(nom, ' ' , prenom) AS Acteur FROM acteur";
            $pdoActeurs = Connect::seConnecter();
            $requeteActeursEdit = $pdoActeurs->query($rocketActeurs);
            
            
            // Affiche Genre
            $rocketGenres ="SELECT id_genre, genreFilm FROM genre";
            $pdoGenres = Connect::seConnecter();
            $requeteGenresEdit = $pdoGenres->query($rocketGenres);
            
            // Affiche Realisateur
            $rocketReal = "SELECT id_realisateur ,CONCAT(nomReal, ' ', prenomReal) AS Realisateur FROM realisateur";
            $pdoRealisateurs = Connect::seConnecter();
            $requeteRealisateursEdit = $pdoRealisateurs->query($rocketReal);

            // Affiche Roleperso
            $rocketRole = "SELECT id_roleperso, nomPerso FROM roleperso";
            $pdoRolePerso = Connect::seConnecter();
            $requeteRolePersoEdit = $pdoRolePerso->query($rocketRole);


            require "view/edit/editCinema.php";
        }


    }

?>