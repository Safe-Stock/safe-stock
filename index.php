<?php 
    if(isset($_GET['route'])) {
        switch($_GET['route']) {
            default:
                include('./view/404.html');
                break;
        }
    } else {
        include('./view/home.html');
    }
?>