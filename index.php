<?php 
session_start();
require('./class/PDO.php');
require('./class/UITools.php');
    if(isset($_SESSION['user']) && !empty($_SESSION['user'])) {
        $user = PDORequest::GetUserWithId($_SESSION['user']);
        $user = $user->fetch();
        if(isset($_GET['route'])) {
            switch($_GET['route']) {
                case"test":
                    include('./view/test.html');
                    break;
    
                case"blank1":
                    include('./view/blank.html');
                    break;
                
                case"themetest":
                    include('./view/theme/themetest.html');
                    break;    
                case "login":
                    include('./routeur/login.php');
                    break;
                case "profil":
                        include('./view/profil.php');
                        break;
                case "theme":
                    include('./view/theme.php');
                    break;
                case "disconnect":
                    include('./routeur/disconnect.php');
                    break;
                case "upload":
                        include('./view/upload.php');
                        break;
                default:
                    include('./view/404.html');
                    break;
            }
        } else if(isset($_GET['admin']) && $user['IdProfil'] == 1){
            switch($_GET['admin']) {
                case "gestionmct":
                    include('./view/Administration/MotCle_Theme_Gestion.php');
                    break;
                case "gestionuser":
                    include('./view/Administration/Utilisateur_Gestion.php');
                    break;
                case "gestiondoc":
                    include('./view/Administration/Document_Gestion.php');
                    break;
                default:
                    include('./view/404.html');
                    break;
            }
        } else {
            include('./view/home.php');
        }
    } elseif(isset($_COOKIE['email'], $_COOKIE['password']) AND !empty($_COOKIE['email']) AND !empty($_COOKIE['password'])){
        require('./class/user.php');
        User::ConnectWithCookies($_COOKIE['email'], $_COOKIE['password']);
        header('location: ./index.php');
    } else {
        include('./view/login.php');
    }
?>