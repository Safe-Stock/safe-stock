<?php 
session_start();
require('./class/PDO.php');
require('./class/UITools.php');
    if(isset($_SESSION['user']) && !empty($_SESSION['user']) && isset($_COOKIE['PHPSESSID']) && !empty($_COOKIE['PHPSESSID']))
    {
        $user = PDORequest::GetUserWithId($_SESSION['user']);
        $user = $user->fetch();
        if(isset($_GET['route']))
        {
            switch($_GET['route'])
            {
                case"test":
                    include('./view/test.php');
                    break;
    
                case"blank1":
                    include('./view/blank.php');
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
                case "search":
                        include('./view/searchbar.php');
                        break;
                case "report":
                    include('./view/Report_Probleme.php');
                    break;
                case "about":
                    include('./view/about.php');
                    break;
                case "searchmc":
                    include('./view/SearchMC.php');
                    break;
                default:
                    include('./view/404.php');
                    break;
            }
        }
        else if(isset($_GET['prof']) && $user['IdProfil'] == 2)
        {
            switch($_GET['prof'])
            {
                case "gestionmc":
                    include('./view/Administration/MotCle_Prof_Gestion.php');
                    break;
                default:
                    include('./view/404.php');
                    break;
            }
        }
        else if(isset($_GET['admin']) && $user['IdProfil'] == 1)
        {
            switch($_GET['admin'])
            {
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
                    include('./view/404.php');
                    break;
            }
        }
        else
        {
            include('./view/home.php');
        }
    }
    else
    {
        include('./view/login.php');
    }
?>