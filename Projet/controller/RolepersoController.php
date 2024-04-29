<?php

    namespace Controller;
    use Model\Connect;

    class RolepersoController {

        /**
         * Lister le Role des Personnage 
         */

        public function listRoleperso() {

            $rocketRole = "SELECT id_roleperso, nomPerso FROM roleperso";

            $pdoRolePerso = Connect::seConnecter();
            $requeteRolePerso = $pdoRolePerso->query($rocketRole);
            
            require "view/role/listroleperso.php";
        }
        
        
        //Details des RolePersos
        public function detailRolePerso($id) {

            $pdoRP1 = Connect::seConnecter();
            $pdoRP = Connect::seConnecter();

            if(isset($_GET['id'])) {
                
                // !!!!  REVOIR LA REQUETE "$roqueteRolePersoFilms" ( Affiche les mauvais films et acteur sur certains ??)!!! 

                //Afficher le Role Personnage 
    
                $roqueteRolePerso = "SELECT id_roleperso, nomPerso
                FROM roleperso 
                WHERE id_roleperso = :id";

                $pdoDetailRolePerso = $pdoRP1->prepare($roqueteRolePerso);
                $pdoDetailRolePerso->execute(["id" => $id]);
                $requeteRP = $pdoDetailRolePerso->fetch();
                    
    
                //Afficher les films et l'acteur du Personnage  
    
                $roqueteRolePersoFilms = " SELECT film.titre, CONCAT(acteur.nom, ' ', acteur.prenom) AS Acteur
                FROM acteur
                INNER JOIN jouerole ON acteur.id_acteur = jouerole.id_acteur
                INNER JOIN roleperso ON jouerole.id_role_personnage = roleperso.id_roleperso
                INNER JOIN film ON film.id_film = jouerole.id_film
                WHERE jouerole.id_role_personnage = :id"; 

                $pdoDetailRolePersoFilms = $pdoRP->prepare($roqueteRolePersoFilms);
                $pdoDetailRolePersoFilms->execute(["id" => $id]);
                $requeteFilmRolePerso = $pdoDetailRolePersoFilms->fetchAll();


            } else {
                echo "Pas de contenu\n";
            }

            require "view/role/detailRoleperso.php";
        }
        
        
        //Ajouter un RolePerso
        public function ajouterRolePerso() {}
        
        
        //Suprimer un RolePerso
        public function suppRolePerso($id) {

            $pdoRoleperso = Connect::seConnecter();

            if(isset($_GET['id'])){

                //On supprime le role personnage du tableau jouerole
                $rocket1 = "DELETE FROM jouerole WHERE id_role_personnage = :id";
                $pdoRoleperso1 = $pdoRoleperso->prepare($rocket1);
                $pdoRoleperso1->execute(['id' => $id]);

                //Ensuite du tableau role_personnage
                $rocket2 = "DELETE FROM roleperso WHERE id_roleperso = :id";
                $pdoRoleperso2 = $pdoRoleperso->prepare($rocket2);
                $pdoRoleperso2->execute(['id' => $id]);

            } else {
                echo "Erreur de suppression\n";
            }

            header("Location: index.php?action=listEditCinema");

        }
        
    }
    ?>