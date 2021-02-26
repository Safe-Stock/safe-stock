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

        public static function GetLatestDocumentsByTheme($id) {
            self::open();
            $id = htmlspecialchars($id);
            $req = self::$bdd->prepare('SELECT * FROM document d INNER JOIN theme t ON d.IdTheme = t.IdTheme WHERE t.IdTheme = ? ORDER BY DateImportationDoc ASC LIMIT 4');
            $req->execute(array($id));
            return $req;
        }

        public static function GetDocumentsByTheme($id) {
            self::open();
            $id = htmlspecialchars($id);
            $req = self::$bdd->prepare('SELECT * FROM document d INNER JOIN theme t ON d.IdTheme = t.IdTheme WHERE t.IdTheme = ?  ORDER BY DateImportationDoc ASC');
            $req->execute(array($id));
            return $req;
        }

        public static function GetNameTheme($id) {
            self::open();
            $id = htmlspecialchars($id);
            $req = self::$bdd->prepare('SELECT NomTheme FROM theme WHERE IdTheme = ?');
            $req->execute(array($id));
            return $req;
        }

        public static function GetAllMotsCle() {
            self::open();
            $req = self::$bdd->query("SELECT * FROM `mot-cle` ORDER BY IdMC ASC");
            return $req;
        }

        public static function DeleteMotCle($idmc) {
            self::open();
            $req = self::$bdd->prepare('DELETE FROM `mot-cle` WHERE IdMC = ?');
            $req->execute(array($idmc));
        }
        
        public static function DeleteTheme($idtheme) {
            self::open();
            $req = self::$bdd->prepare('DELETE FROM theme WHERE IdTheme = ?' );
            $req->execute(array($idtheme));
        }
    
        public static function CreateTheme($idtheme) {
            self::open();
            $req = self::$bdd->prepare('INSERT INTO theme( NomTheme) VALUES( ? )' );
            $req->execute(array($idtheme));
        }
        
        public static function UpdateTheme($idtheme) {
            self::open();
            $req = self::$bdd->prepare('UPDATE theme SET NomTheme = ? WHERE IdTheme = ?' );
            $req->execute(array($idtheme));
        }
    
    
    
    }
?>