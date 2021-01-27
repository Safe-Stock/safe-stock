<?php 
require('./class/UITools.php');
    if(isset($_GET['route'])) {
        switch($_GET['route']) {
            case "login":
                include('./view/login.html');
                break;
            default:
                include('./view/404.html');
                break;
        }
    } else {
        include('./view/home.html');
    }
?>