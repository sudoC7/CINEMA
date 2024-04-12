<?php

    namespace Controller;
    use Model\Connect;

    class RealisateurController {

        public function listRealisateurs() {
            $pdoRealisateurs = Connect::seConnecter();
            // requete qui va afficher la liste des acteurs (nom prenom dateNaissance)
            $requeteRealisateurs = $pdoRealisateurs->query("SELECT * FROM realisateur");
            require "view/listRealisateurs.php";
        }

    }

?>