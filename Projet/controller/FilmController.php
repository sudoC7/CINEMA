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

        //Détail d'un Film 
        
        public function detailFilm($id) {

            $pdoFilm1 = Connect::seConnecter();
            $pdoFilm = Connect::seConnecter();

            if(isset($_GET['id'])) {

                // affiche un film en particulier 
                $rocketDetailsFilm1 = "SELECT titre, resumeFilm, noteFilm, duree, anneeSortie, CONCAT(realisateur.nomReal, ' ', realisateur.prenomReal) AS Realisateur
                FROM film
                INNER JOIN realisateur ON realisateur.id_realisateur = film.id_realisateur
                WHERE film.id_film = :id";

                $pdoDetailsFilm1 = $pdoFilm1->prepare($rocketDetailsFilm1);
                $pdoDetailsFilm1->execute(["id" => $id]);
                $requeteFilmtitre = $pdoDetailsFilm1->fetch();

                // affiche le detail du film en particulier 
                $rocketDetailsFilm = "SELECT CONCAT(realisateur.nomReal, ' ', realisateur.prenomReal) AS realisateur, CONCAT(acteur.nom, ' ', acteur.prenom) AS acteur, nomPerso AS roleActeur 
                FROM acteur  	
                INNER JOIN jouerole ON acteur.id_acteur = jouerole.id_acteur  
                INNER JOIN roleperso ON jouerole.id_role_personnage = roleperso.id_roleperso  
                INNER JOIN film ON film.id_film = jouerole.id_film  
                INNER JOIN realisateur ON film.id_realisateur = realisateur.id_realisateur  
                WHERE film.id_film = :id";
                    
                $pdoDetailsFilm = $pdoFilm->prepare($rocketDetailsFilm);
                $pdoDetailsFilm->execute(["id" => $id]);
                $requeteFilm = $pdoDetailsFilm->fetchAll();

            } else {
                echo "Pas de contenu\n";
            }
            
            require "view/film/detailFilm.php";
            
            // $requeteFilm = $pdo->prepare("SELECT * FROM film WHERE id_film = :id"); $requeteFilm->execute(["id"=> $id]) 
        }
        

        //Ajouter un Film 
        public function ajoutFilm() {

            // Pour afficher les realisateur 
            $rocketReal = "SELECT id_realisateur ,CONCAT(nomReal, ' ', prenomReal) AS Realisateur FROM realisateur";
            $pdoRealisateurs = Connect::seConnecter();
            $requeteRealisateurs = $pdoRealisateurs->query($rocketReal);

                // code d'ajout de film
                if(isset($_POST["submit"])){

                    var_dump($_POST).

                    //  id_film, titre, anneeSortie, duree, resumeFilm, noteFilm, afficheFilm, afficheBack, id_realisateur
                    $titre = filter_input(INPUT_POST, "titre", FILTER_SANITIZE_SPECIAL_CHARS);
                    $anneeSortie = filter_input(INPUT_POST, "anneeSortie", FILTER_VALIDATE_INT);  
                    $duree = filter_input(INPUT_POST, "duree", FILTER_VALIDATE_FLOAT);
                    $resumeFilm = filter_input(INPUT_POST, "resumeFilm", FILTER_SANITIZE_SPECIAL_CHARS);
                    $noteFilm = filter_input(INPUT_POST, "noteFilm", FILTER_VALIDATE_INT);
                    $id_realisateur = filter_input(INPUT_POST, "idRealisateur", FILTER_VALIDATE_INT);

                    if($titre && $anneeSortie && $duree && $resumeFilm && $noteFilm) {
                        $pdoAjout = Connect::seConnecter();
                        $rocketAjout = "INSERT INTO film (titre, anneeSortie, duree, resumeFilm, noteFilm, id_realisateur) VALUES (:titre, :anneeSortie, :duree, :resumeFilm, :noteFilm, :idRealisateur);";
                        $ajoutRealisateur = $pdoAjout->prepare($rocketAjout);
                        $ajoutRealisateur->execute([
                                                        "titre" => $titre,
                                                        "anneeSortie" => $anneeSortie,
                                                        "duree" => $duree,
                                                        "resumeFilm" => $resumeFilm,
                                                        "noteFilm" => $noteFilm,
                                                        "idRealisateur" => $id_realisateur
                                                    ]);                    
                    }  
                }
            require "view/film/ajoutFilm.php";
        }

        




        //Ajout d'un casting
        public function ajoutCasting() {}





        //Supprimer un film 

        public function suppFilm($id) {

            $pdoFilm = Connect::seConnecter();

            if(isset($_GET['id'])) {

                // On supprime du tableau jouerole en premier 
                $rocket1 = "DELETE FROM jouerole WHERE id_film = :id";
                $rocketFilm1 = $pdoFilm->prepare($rocket1);
                $rocketFilm1->execute(['id' => $id]);

                // Ensuite on supprime du tableau categorie 
                $rocket2 = "DELETE FROM categorie WHERE id_film = :id";
                $rocketFilm2 = $pdoFilm->prepare($rocket2);
                $rocketFilm2->execute(['id' => $id]);

                // Et en dernier on supprime du tableau film 
                $rocket3 = "DELETE FROM film WHERE id_film = :id";
                $rocketFilm3 = $pdoFilm->prepare($rocket3);
                $rocketFilm3->execute(['id' => $id]);
                
                
            } else {
                echo "Erreur de suppression\n";
            }
            
            header("Location: index.php?action=listEditCinema");
        }


    }

?>