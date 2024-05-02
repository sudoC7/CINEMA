<?php

    namespace Controller;
    use Model\Connect;

    class RealisateurController {

        /**
         * Lister les Réalisateurs
         */

        public function listRealisateurs() {
            
            $rocketReal = "SELECT id_realisateur ,CONCAT(nomReal, ' ', prenomReal) AS Realisateur , dateNaissanceReal FROM realisateur";
            
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
                $rocketRealisateur = "SELECT id_realisateur, CONCAT(nomReal, ' ', prenomReal) AS Realisateur 
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