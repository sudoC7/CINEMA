<?php

    namespace Controller;
    use Model\Connect;

    class ActeurController {  
        /**
         * Lister les Acteurs 
        */

        public function listActeurs() {

            $rocketActeurs = "SELECT CONCAT(nom, ' ' , prenom) AS Acteur, sexe FROM acteur";

            $pdoActeurs = Connect::seConnecter();
            $requeteActeurs = $pdoActeurs->query($rocketActeurs);
           
            require "view/acteur/listActeurs.php";
        }


        // Afficher les détails d'un acteur 
        public function detailActeur($id) {

            $pdoActeur = Connect::seConnecter();

            if(isset($_GET['id'])) {

                $rocketDetailActeur = "";

                $pdoDetailActeur = $pdoFilm->prepare($rocketDetailActeur);
                $pdoDetailActeur->execute(["id" => $id]);
                $requeteFilm = $pdoDetailActeur->fetchAll();

            } else {
                echo "Pas de contenu\n";
            }

            require "view/acteur/listActeurs.php";

        }
        
        // Ajouter un Acteur 
        public function ajoutActeur() {}

        // Supprimer un Acteur 
        public function supprimActeur() {}

    }
?>