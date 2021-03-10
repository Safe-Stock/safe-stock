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

        public static function GetAllMotsCleV() {
            self::open();
            $req = self::$bdd->query("SELECT * FROM `mot-cle` WHERE ValidationMC IS NOT NULL ORDER BY IdMC ASC");
            return $req;
        }

        public static function DeleteMotCle($IdMC) {
            self::open();
            $req = self::$bdd->prepare('DELETE FROM `mot-cle` WHERE IdMC = ?');
            $req->execute(array($IdMC));
        }

        public static function CreateMotCle($NameMC) {
            self::open();
            $req = self::$bdd->prepare('INSERT INTO `mot-cle` (NomMC) VALUES (?)');
            $req->execute(array($NameMC));
        }

        public static function ModifyMotCle($NameMC, $IdMC) {
            self::open();
            $req = self::$bdd->prepare('UPDATE `mot-cle` SET NomMC = :NameMC WHERE IdMC = :IdMC');
            $req->execute(array('NameMC' => $NameMC, 'IdMC'=> $IdMC));
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
        
        public static function UpdateTheme($ThemeName, $ThemeId) {
            self::open();
            $req = self::$bdd->prepare('UPDATE theme SET NomTheme = :ThemeName WHERE IdTheme = :ThemeId' );
            $req->execute(array('ThemeName' => $ThemeName, 'ThemeId' => $ThemeId)) or die(var_dump($req->errorInfo()));
        }
    
        public static function GetUserInformation($login) {
            self::open();
            $req = self::$bdd->prepare('SELECT * FROM utilisateur WHERE IdentifiantUtil =  ?');
            $req->execute(array($login));
            return $req;
        }

        public static function GetUserWithId($id) {
            self::open();
            $req = self::$bdd->prepare('SELECT * FROM utilisateur u INNER JOIN profil p ON u.IdProfil = p.IdProfil WHERE IdUtil = ?'); 
            $req->execute(array($id));
            return $req;
        }

        public static function UpdateUser($idUser, $avatar) {
            self::open();
            $idUser = htmlspecialchars($idUser);
            $avatar = htmlspecialchars($avatar);
            $req = self::$bdd->prepare('UPDATE utilisateur SET AvatarUtil = ? WHERE IdUtil = ?');
            $req->execute(array($avatar, $idUser));
        }    
        public static function GetLastDocByUser($id) { 
        self::open();
            $id = htmlspecialchars($id);
            $req = self::$bdd->prepare('SELECT * FROM document d INNER JOIN theme t ON d.IdTheme = t.IdTheme WHERE IdUtil = ?  ORDER BY DateImportationDoc ASC');
            $req->execute(array($id));
            return $req;
        }    
 
        public static function GetAllUser() {
            self::open();
            $req = self::$bdd->query('SELECT * FROM utilisateur ORDER BY IdUtil ASC');
            return $req;
        }

        public static function GetAllUserProf() {
            self::open();
            $req = self::$bdd->query('SELECT * FROM utilisateur WHERE IdProfil = 2 ORDER BY IdUtil ASC');
            return $req;
        }

        public static function GetAllUserEleve() {
            self::open();
            $req = self::$bdd->query('SELECT * FROM utilisateur WHERE IdProfil = 3 ORDER BY IdUtil ASC');
            return $req;
        }

        public static function ModifyUser($NomUtil, $PrenomUtil, $IdUtil) {
            self::open();
            $req = self::$bdd->prepare("UPDATE utilisateur SET NomUtil = :NomUtil, PrenomUtil = :PrenomUtil WHERE IdUtil = :IdUtil");
            $req->execute(array('NomUtil' => $NomUtil, 'PrenomUtil' => $PrenomUtil, 'IdUtil'=> $IdUtil));
        }

        public static function ModifyUserPassword($PasswordUtil, $IdUtil) {
            $PasswordUtilDef = password_hash($PasswordUtil, PASSWORD_DEFAULT);
            self::open();
            $req = self::$bdd->prepare("UPDATE utilisateur SET MdpUtil = :MdpUtil WHERE IdUtil = :IdUtil");
            $req->execute(array('MdpUtil' => $PasswordUtilDef, 'IdUtil' => $IdUtil));
        }

        public static function DeleteUser($IdUtil) {
            self::open();
            $req = self::$bdd->prepare('DELETE FROM utilisateur WHERE IdUtil = ?');
            $req->execute(array($IdUtil));
        }

        public static function CreateUserProf($NomUtil, $PrenomUtil, $MdpUtil) {
            $PasswordUtil = password_hash($MdpUtil, PASSWORD_DEFAULT);
            self::open();
            $req = self::$bdd->prepare("INSERT INTO utilisateur (NomUtil, PrenomUtil, MdpUtil, IdProfil) VALUES(:NomUtil, :PrenomUtil, :MdpUtil, 2)");
            $req->execute(array('NomUtil' => $NomUtil, 'PrenomUtil' => $PrenomUtil, 'MdpUtil' => $PasswordUtil));
        }

        public static function CreateUserEleve($NomUtil, $PrenomUtil, $MdpUtil) {
            $PasswordUtil = password_hash($MdpUtil, PASSWORD_DEFAULT);
            self::open();
            $req = self::$bdd->prepare("INSERT INTO utilisateur (NomUtil, PrenomUtil, MdpUtil, IdProfil) VALUES(:NomUtil, :PrenomUtil, :MdpUtil, 3)");
            $req->execute(array('NomUtil' => $NomUtil, 'PrenomUtil' => $PrenomUtil, 'MdpUtil' => $PasswordUtil));
        }

        public static function GetAllMotsCleNonV() {
            self::open();
            $req = self::$bdd->query('SELECT * FROM `mot-cle` WHERE ValidationMC IS NULL ORDER BY IdMC ASC');
            return $req;
        }

        public static function ValidationMotCle($IdMC) {
            self::open();
            $req = self::$bdd->prepare('UPDATE `mot-cle` SET ValidationMC = NOW() WHERE IdMC = ?');
            $req->execute(array($IdMC));
        }

    }
?>