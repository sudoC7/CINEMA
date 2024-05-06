<?php

    namespace Controller;
    use Model\Connect;

    class RealisateurController {

        /**
         * Lister les Réalisateurs
         */

        public function listRealisateurs() {
            
            $rocketReal = "SELECT id_realisateur ,CONCAT(nomReal, ' ', prenomReal) AS Realisateur , dateNaissanceReal, afficheReal FROM realisateur";
            
            $pdoRealisateurs = Connect::seConnecter();
            $requeteRealisateurs = $pdoRealisateurs->query($rocketReal);
            require "view/realisateur/listRealisateurs.php";
        }


        // ??? detail d'un réalisateur ??? 
        public function detailRealisateur($id) {

            if(isset($_GET['id'])) {

                $pdoRealisateur1 = Connect::seConnecter();
                $pdoRealisateur = Connect::seConnecter();
    
                // Affiche un realisateur en particulier 
                $rocketRealisateur = "SELECT id_realisateur, CONCAT(nomReal, ' ', prenomReal) AS Realisateur, afficheReal
                FROM realisateur 
                WHERE id_realisateur = :id";
    
                $pdoDetailRealisateur = $pdoRealisateur1->prepare($rocketRealisateur);
                $pdoDetailRealisateur->execute(["id" => $id]);
                $requeteRealisateur = $pdoDetailRealisateur->fetch();


                // Affiche le detail d'un réalisateur

                $rocketRealisateur1 = "SELECT realisateur.id_realisateur, titre, anneeSortie
                FROM film 
                INNER JOIN realisateur ON realisateur.id_realisateur = film.id_realisateur
                WHERE realisateur.id_realisateur = :id";

                $pdoDetailRealisateur1 = $pdoRealisateur1->prepare($rocketRealisateur1);
                $pdoDetailRealisateur1->execute(["id" => $id]);
                $requeteDetailRealisateur = $pdoDetailRealisateur1->fetchAll();


            } else {
                echo "Pas de contenu\n";
            }

            require "view/realisateur/detailRealisateur.php";
        }


        
        
        //Ajouter un réalisateur 
        public function ajoutRealisateur() {
            
            if(isset($_POST["submit"])){
                
                $file = $_FILES["fileImg"];
                    
                if(isset($file)) {
                    
                // toute informations sur l'image
                $fileName = $_FILES['fileImg']['name'];
                $fileFullPath = $_FILES['fileImg']['full_path'];
                $fileType = $_FILES['fileImg']['type'];
                $fileTmpName = $_FILES['fileImg']['tmp_name'];
                $fileError = $_FILES['fileImg']['error'];
                $fileSize = $_FILES['fileImg']['size'];

                $fileExt = explode('.', $fileName);
                $fileActualExt = strtolower(end($fileExt));

                // extensions du fichiers
                $allowed = array('jpg', 'jpeg', 'png', 'svg');

                if(in_array($fileActualExt, $allowed) && $fileError === 0 && $fileSize < 5000000) {
                    
                            // creation de l'unique ID
                            $fileNameNew = uniqid('', true).".".$fileActualExt; 
                            $fileDestination = './public/picture/realisateursImg/'.$fileNameNew;  
                            move_uploaded_file($fileTmpName, $fileDestination);   
                            $locationFile = $fileDestination;  // "./Projet/picture/". facultatif pour le chemin 
                } else {
                    $locationFile = NULL;
                }

            } else {
                echo "n'existe pas \n";
            }

            // controle nom prenom et la date de naissance 
            $nom = filter_input(INPUT_POST, "lastname", FILTER_SANITIZE_SPECIAL_CHARS);
            $prenom = filter_input(INPUT_POST, "firstname", FILTER_SANITIZE_SPECIAL_CHARS);
            $bDay = filter_input(INPUT_POST, 'bday', FILTER_VALIDATE_REGEXP, array(
                    "options" => array("regexp"=>"/^\d{4}-\d{2}-\d{2}$/")));

                //     id_realisateur, nomReal, prenomReal, dateNaissanceReal, afficheReal   -->
                // j'ai réussi à ajouter la date de naissance maintenant il me reste à afficher la photo du réalisateur 
            if($nom && $prenom && $bDay && $locationFile){
                $pdoAjout = Connect::seConnecter();
                $rocketAjout = "INSERT INTO realisateur (nomReal, prenomReal, dateNaissanceReal, afficheReal) VALUES (:nom, :prenom, :bday, :fileImg);";
                $ajoutRealisateur = $pdoAjout->prepare($rocketAjout);
                $ajoutRealisateur->execute([
                                                "nom" => $nom,
                                                "prenom" => $prenom,
                                                "bday" => $bDay,
                                                "fileImg" => $locationFile
                                            ]);                    
                }  
            }
            require "view/realisateur/ajoutRealisateur.php";
        }




        //Supprimer un réalisateur 
        public function suppRealisateur($id) {
            
            $pdoRealisateur = Connect::seConnecter();

            if(isset($_GET['id'])){

                //On supprime le realisateur du tableau realisateur
                $rocket1 = "DELETE FROM realisateur WHERE id_realisateur = :id";
                $rocketRealisateur1 = $pdoRealisateur->prepare($rocket1);
                $rocketRealisateur1->execute(['id' => $id]);

            } else {
                echo "Erreur de suppression\n";
            }

            header("Location: index.php?action=listEditCinema");
        }
                    
    }

?>