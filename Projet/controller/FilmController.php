<?php

    namespace Controller;
    use Model\Connect;

    class FilmController {

        /**
         * Lister les films
         */

        public function listFilms() {

            $rocketFilm = "SELECT id_film, titre, anneeSortie, afficheFilm, afficheBack FROM film ORDER BY anneeSortie DESC";

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

                // Instructions pour ajouter un film 
                if(isset($_POST["submit"])){
                   
                    //var_dump($_POST);

                    // Les variables des deux images du Film
                    $afficheFilm = NULL; 
                    $afficheBack = NULL;

                    // Controle du première Image
                    if(isset($_FILES['afficheFilm'])){
                        $afficheFilm = $this->uploadImg($_FILES['afficheFilm']);
                    }

                    // Controle du deuxième Image
                    if(isset($_FILES['afficheBack'])){
                        $afficheBack = $this->uploadImg($_FILES['afficheBack']);
                    }

                    var_dump($afficheFilm);
                    var_dump($afficheBack);

                    //  id_film, titre, anneeSortie, duree, resumeFilm, noteFilm, afficheFilm, afficheBack, id_realisateur
                    $titre = filter_input(INPUT_POST, "titre", FILTER_SANITIZE_SPECIAL_CHARS);
                    $anneeSortie = filter_input(INPUT_POST, "anneeSortie", FILTER_VALIDATE_INT);  
                    $duree = filter_input(INPUT_POST, "duree", FILTER_VALIDATE_FLOAT);
                    $resumeFilm = filter_input(INPUT_POST, "resumeFilm", FILTER_SANITIZE_SPECIAL_CHARS);
                    $noteFilm = filter_input(INPUT_POST, "noteFilm", FILTER_VALIDATE_INT);
                    $id_realisateur = filter_input(INPUT_POST, "id_realisateur", FILTER_VALIDATE_INT);

                    if($titre && $anneeSortie && $duree && $resumeFilm && $noteFilm && $id_realisateur && $afficheFilm && $afficheBack) {
                        $pdoAjout = Connect::seConnecter();
                        $rocketAjout = "INSERT INTO film (titre, anneeSortie, duree, resumeFilm, noteFilm, id_realisateur, afficheFilm, afficheBack) VALUES (:titre, :anneeSortie, :duree, :resumeFilm, :noteFilm, :id_realisateur, :afficheFilm, :afficheBack);";
                        $ajoutRealisateur = $pdoAjout->prepare($rocketAjout);
                        $ajoutRealisateur->execute([
                                                        "titre" => $titre,
                                                        "anneeSortie" => $anneeSortie,
                                                        "duree" => $duree,
                                                        "resumeFilm" => $resumeFilm,
                                                        "noteFilm" => $noteFilm,
                                                        "id_realisateur" => $id_realisateur,
                                                        "afficheFilm" => $afficheFilm,
                                                        "afficheBack" => $afficheBack
                                                    ]);                    
                    }  
                } 
            require "view/film/ajoutFilm.php";
        }

        // Fonction lié avec la fonction ajoutFilm pour le controlle des fichier téléchargés  
        private function uploadImg($file){

            $fileName = $file['name'];
            $fileFullPath = $file['full_path'];
            $fileType = $file['type'];
            $fileTmpName = $file['tmp_name'];
            $fileError = $file['error'];
            $fileSize = $file['size'];
                        
            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));
                        
            // extension from file 
            $allowed = array('jpg', 'jpeg', 'png', 'pdf');
                        
            if(in_array($fileActualExt, $allowed) && $fileError === 0 && $fileSize < 5000000) {
                //creat a unique ID
                $fileNameNew = uniqid('', true).".".$fileActualExt;
                $fileDestination = './public/picture/filmsImg/'.$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
                $locationFile = $fileDestination;
                return $locationFile;
                   
            } else {
                return $locationFile = NULL;
            }
        }

      


        // Qu'est-ce que je devrais avoir dans le casting ? : ajout de genre, role perso et acteur 
        // Ajout d'un casting
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