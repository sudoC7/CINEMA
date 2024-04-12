<?php

    namespace Controller;
    use Model\Connect;

    class RealisateurController {

        public function listActeurs() {
                
            $pdoActeurs = Connect::seConnecter();
            // requete qui va afficher la liste des acteurs (nom prenom dateNaissance)
            $requeteActeurs = $pdoActeurs->query("SELECT * FROM acteur");
            require "view/listActeurs.php";
        }
    }
?>