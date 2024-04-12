<?php

    namespace Controller;
    use Model\Connect;

    class listRoleperso {

        /**
         * Lister le Role des Personnage 
         */

        public function listRoleperso() {
            $pdoRolePerso = Connect::seConnecter();

            $requeteRolePerso = $pdoRolePerso->query("SELECT * FROM jouerole");
            require "view/listFilms.php";
        }

    }
?>