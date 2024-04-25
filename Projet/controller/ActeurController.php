<?php

    namespace Controller;
    use Model\Connect;

    class ActeurController {  
        /**
         * Lister les Acteurs 
        */

        public function listActeurs() {

            $rocketActeurs = "SELECT id_acteur, CONCAT(nom, ' ' , prenom) AS Acteur, sexe FROM acteur";

            $pdoActeurs = Connect::seConnecter();
            $requeteActeurs = $pdoActeurs->query($rocketActeurs);
           
            require "view/acteur/listActeurs.php";
        }


        // Afficher les détails d'un acteur 
        public function detailActeur($id) {

            $pdoActeur1 = Connect::seConnecter();
            $pdoActeur = Connect::seConnecter();

            if(isset($_GET['id'])) {

                // Affiche un acteur en particulier 

                $rocketActeur1 = "SELECT id_acteur, CONCAT(nom, ' ' , prenom) AS Acteur, sexe 
                FROM acteur
                WHERE acteur.id_acteur = :id";

                $pdoDetailActeur1 = $pdoActeur1->prepare($rocketActeur1);
                $pdoDetailActeur1->execute(["id" => $id]);
                $requeteActeur1 = $pdoDetailActeur1->fetch();


                //Affiche les films de l'acteur 

                $rocketDetailActeur = "SELECT acteur.id_acteur, film.titre, roleperso.nomPerso, film.anneeSortie
                FROM acteur
                INNER JOIN jouerole ON acteur.id_acteur = jouerole.id_acteur
                INNER JOIN roleperso ON jouerole.id_role_personnage = roleperso.id_roleperso
                INNER JOIN film ON film.id_film = jouerole.id_film
                WHERE acteur.id_acteur = :id";

                $pdoDetailActeur = $pdoActeur->prepare($rocketDetailActeur);
                $pdoDetailActeur->execute(["id" => $id]);
                $requeteActeur = $pdoDetailActeur->fetchAll();


            } else {
                echo "Pas de contenu\n";
            }

            require "view/acteur/detailActeur.php";
        }
        
        // Ajouter un Acteur 
        public function ajoutActeur() {}

        // Supprimer un Acteur 
        public function supprimActeur($id) {}

    }
?>