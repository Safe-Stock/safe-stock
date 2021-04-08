<?php 
    class PDORequest {
        private static $bdd;

        private static function open() {
            self::$bdd = new PDO('mysql:host=localhost;dbname=filesranks;charset=utf8', 'root','');  
        }

        public static function GetLatestDocuments() {
            self::open();
            $req = self::$bdd->query('SELECT * FROM document WHERE DateImportationDoc IS NOT NULL ORDER BY ValidationDoc DESC LIMIT 4');
            return $req;
        }

        public static function GetAllDocuments() {
            self::open();
            $req = self::$bdd->query('SELECT * FROM document ORDER BY DateImportationDoc ASC');
            return $req;
        }

        public static function GetAllDocumentsV() {
            self::open();
            $req = self::$bdd->query('SELECT * FROM document WHERE ValidationDoc IS NOT NULL ORDER BY DateImportationDoc ASC');
            return $req;
        }

        public static function GetAllDocumentsNV() {
            self::open();
            $req = self::$bdd->query('SELECT * FROM document WHERE ValidationDoc IS NULL ORDER BY DateImportationDoc ASC');
            return $req;
        }

        public static function DeleteDoc($IdDoc) {
            self::open();
            $req = self::$bdd->prepare('DELETE FROM document WHERE IdDoc = ?');
            $req->execute(array($IdDoc));
        }

        public static function UpdateValidDocNv($NomDoc, $DescriptionDoc, $IdDoc) {
            self::open();
            $req = self::$bdd->prepare('UPDATE document SET NomDoc = :NomDoc, DescriptionDoc = :DescriptionDoc, ValidationDoc = NOW() WHERE IdDoc = :IdDoc');
            $req->execute(array('NomDoc' => $NomDoc, 'DescriptionDoc'=> $DescriptionDoc, 'IdDoc' => $IdDoc));
        }

        public static function UpdateDocV($NomDoc, $DescriptionDoc, $IdDoc) {
            self::open();
            $req = self::$bdd->prepare('UPDATE document SET NomDoc = :NomDoc, DescriptionDoc = :DescriptionDoc WHERE IdDoc = :IdDoc');
            $req->execute(array('NomDoc' => $NomDoc, 'DescriptionDoc'=> $DescriptionDoc, 'IdDoc' => $IdDoc));
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

        public static function ModifyUser($NomUtil, $PrenomUtil, $IdentifiantUtil, $IdUtil) {
            self::open();
            $req = self::$bdd->prepare("UPDATE utilisateur SET NomUtil = :NomUtil, PrenomUtil = :PrenomUtil, IdentifiantUtil = :IdentifiantUtil WHERE IdUtil = :IdUtil");
            $req->execute(array('NomUtil' => $NomUtil, 'PrenomUtil' => $PrenomUtil, 'IdentifiantUtil' => $IdentifiantUtil, 'IdUtil'=> $IdUtil));
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

        public static function CreateUserProf($NomUtil, $PrenomUtil, $IdentifiantUtil, $MdpUtil) {
            $PasswordUtil = password_hash($MdpUtil, PASSWORD_DEFAULT);
            self::open();
            $req = self::$bdd->prepare("INSERT INTO utilisateur (NomUtil, PrenomUtil, IdentifiantUtil, MdpUtil, IdProfil) VALUES(:NomUtil, :PrenomUtil, :IdentifiantUtil, :MdpUtil, 2)");
            $req->execute(array('NomUtil' => $NomUtil, 'PrenomUtil' => $PrenomUtil, 'IdentifiantUtil' => $IdentifiantUtil, 'MdpUtil' => $PasswordUtil));
        }

        public static function CreateUserEleve($NomUtil, $PrenomUtil, $IdentifiantUtil, $MdpUtil) {
            $PasswordUtil = password_hash($MdpUtil, PASSWORD_DEFAULT);
            self::open();
            $req = self::$bdd->prepare("INSERT INTO utilisateur (NomUtil, PrenomUtil, IdentifiantUtil, MdpUtil, IdProfil) VALUES(:NomUtil, :PrenomUtil, :IdentifiantUtil, :MdpUtil, 3)");
            $req->execute(array('NomUtil' => $NomUtil, 'PrenomUtil' => $PrenomUtil, 'IdentifiantUtil' => $IdentifiantUtil, 'MdpUtil' => $PasswordUtil));
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

        public static function SearchBar($keyword) {
            self::open();
            $req = self::$bdd->query('SELECT * FROM document WHERE NomDoc LIKE "%'.$keyword.'%"');
            return $req;
        }

        public static function GetMotCleFromDoc($id_doc) {
            self::open();
            $req = self::$bdd->prepare('SELECT * FROM `appartient_mot-cle` A INNER JOIN `mot-cle` M ON A.id_keyword = M.IdMC WHERE id_doc = ?');
            $req->execute(array($id_doc));
            return $req;
        }

        public static function GetAllKeyWord() {
            self::open();
            $req = self::$bdd->query('SELECT * FROM `mot-cle` ORDER BY NomMC');
            return $req;
        }

        public static function AddKeywordOnDocument($id_doc, $id_keyword) {
            self::open();
            $req = self::$bdd->prepare('INSERT INTO `appartient_mot-cle`(id_doc, id_keyword) VALUES( ?, ? )');
            $req->execute(array($id_doc, $id_keyword));
        }

        public static function DeleteKeywordOnDocument($id_doc, $id_keyword) {
            self::open();
            $req = self::$bdd->prepare('DELETE FROM `appartient_mot-cle` WHERE id_doc = ? AND id_keyword = ?');
            $req->execute(array($id_doc, $id_keyword));
        }

        public static function AddDocument($DocName, $DocEx, $DocDescription, $today, $DateV, $DocSize, $IDuser, $DocTheme ) {
            self::open();
            $req = self::$bdd->prepare('INSERT INTO document (NomDoc, TypeDoc, DescriptionDoc, DateImportationDoc, ValidationDoc, TailleDoc ,IdUtil , IdTheme ) VALUES(?, ?, ?, ?, ?, ?, ?, ?)');
            $req->execute(array($DocName, $DocEx, $DocDescription, $today, $DateV, $DocSize, $IDuser, $DocTheme ));
        }

    }
