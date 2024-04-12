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


        //Details des RolePersos
        public function afficherRolePerso()
        
        //Afficher ???
        //Ajouter un RolePerso
        public function ajouterRolePerso()
        
        
        //Suprimer un RolePerso
        public function supprimRolePerso()

    }
?>