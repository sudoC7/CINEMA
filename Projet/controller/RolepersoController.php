<?php

    namespace Controller;
    use Model\Connect;

    class RolepersoController {

        /**
         * Lister le Role des Personnage 
         */

        public function listRoleperso() {

            $rocketRole = "SELECT nomPerso FROM roleperso";

            $pdoRolePerso = Connect::seConnecter();
            $requeteRolePerso = $pdoRolePerso->query($rocketRole);
            
            require "view/role/listroleperso.php";
        }


        //Details des RolePersos
        public function afficherRolePerso() {}
        
    
        //Ajouter un RolePerso
        public function ajouterRolePerso() {}
        
        
        //Suprimer un RolePerso
        public function supprimRolePerso() {}

    }
?>