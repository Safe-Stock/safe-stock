<?php 
require('./class/PDO.php');
require('./class/UITools.php');
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
            case "settings":
                    include('./view/settings.php');
                    break;
            case "theme":
                include('./view/theme.php');
                break;
            case "mcgestion":
                include('./view/AdminGestion/MotsCleGestion.php');
                break;
            case "themegestion":
                    include('./view/settings.php');
                    break;
            default:
                include('./view/404.html');
                break;
        }
    } else {
        include('./view/home.php');
    }
?>