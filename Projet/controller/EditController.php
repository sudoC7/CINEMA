<?php

    namespace Controller;
    use Model\Connect;
    //use Connect\FilmController;
    //use Connect\ActeurController;
    //use Connect\GenreController;
    //use Connect\RealisateurController;
    //use Connect\RolepersoController;

    // Dans cette page je vais inclure les fonctions de supprimer des autres controller pour les envoyer dans "editCinema.php"
    // 

    class EditController{
        
        //$film = new FilmController;
        //$acteur = new ActeurController;
        //$genre = new GenreController;
        //$realisateur = new RealisateurController;
        //$roleperso = new RolepersoController;

        //
        public function listEditCinema(){

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
            
            //var_dump($requeteGenresEdit->fetchAll());die;
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











        // Fonction suppFilm
        public function suppCinemaFilm($id){
            


            header("Location: index.php?action=listEditCinema");
        }
        
        // Fonction suppActeur
        public function suppCinemaActeur($id){



            header("Location: index.php?action=listEditCinema");
        }
        
        // Fonction suppGenre
        public function suppCinemaGenre($id){



            header("Location: index.php?action=listEditCinema");
        }
        
        // Fonction suppRealisateur
        public function suppCinemaRealisteur($id){



            header("Location: index.php?action=listEditCinema");
        }
        
        // Fonction suppRoleperso
        public function suppCinemaRoleperso($id){



            header("Location: index.php?action=listEditCinema");
        }


    }

?>