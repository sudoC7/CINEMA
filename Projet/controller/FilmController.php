<?php

    namespace Controller;
    use Model\Connect;

    class FilmController {

        /**
         * Lister les films
         */

        public function listFilms() {

            $rocketFilm = "SELECT id_film, titre, anneeSortie FROM film ORDER BY anneeSortie DESC";

            $pdoFilms = Connect::seConnecter();
            $requeteFilms = $pdoFilms->query($rocketFilm);

            require "view/film/listFilms.php";
        }


        //Détails d'un Film 
        
        public function detailsFilm() {

            if(isset($_GET[$id])) {
		
                $rocketDetailsFilm = "SELECT titre, resumeFilm, noteFilm, duree, anneeSortie, CONCAT(realisateur.nomReal, ' ', realisateur.prenomReal) AS realisateur, CONCAT(acteur.nom, ' ', acteur.prenom) AS acteur, nomPerso AS roleActeur 
                FROM acteur  	
                INNER JOIN jouerole ON acteur.id_acteur = jouerole.id_acteur  
                INNER JOIN roleperso ON jouerole.id_role_personnage = roleperso.id_roleperso  
                INNER JOIN film ON film.id_film = jouerole.id_film  
                INNER JOIN realisateur ON film.id_realisateur = realisateur.id_realisateur  
                WHERE film.id_film = :id";
                
                $pdoDetailsFilm = Connect::seConnecter();
                $rocketDetailsFilm->execute(["id" => $id]);
                $recette = $rocketDetailsFilm->fetch();
        


        }

        //Ajouter un Film 

        public function ajoutFilm() {}

        //Ajout d'un casting

        public function ajoutCasting() {}

        //Supprimer un film 

        public function supprimFilm() {}


    }







?>