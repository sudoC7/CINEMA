<?php

    namespace Model; 

    abstract class Connect {

        const HOST = "localhost";
        const DB = "cinema";
        const USER = "root";
        const PASS = "";

        public function static seConnecter() {
            try{
                retrun new \PDO(
                    "mysqp:host=".self::HOST.";dbname=".self::DB.";charset=utf8", self::USER, self::PASS);
            } catch(\PDOException $ex) {
                return $ex->getMessage();
            }
        }
    }

?>