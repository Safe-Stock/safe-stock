<?php 
    class PDORequest {
        private static $bdd;

        private static function open() {
            self::$bdd = new PDO('mysql:host=localhost;dbname=filesranks;charset=utf8', 'root','');  
        }

        public static function GetLatestDocuments() {
            self::open();
            $req = self::$bdd->query('SELECT * FROM document ORDER BY DateImportationDoc ASC LIMIT 4');
            return $req;
        }

        public static function GetAllDocuments() {
            self::open();
            $req = self::$bdd->query('SELECT * FROM document ORDER BY DateImportationDoc ASC');
            return $req;
        }

        public static function GetAllThemes() {
            self::open();
            $req = self::$bdd->query('SELECT * FROM theme ORDER BY NomTheme ASC');
            return $req;
        }
    }
?>