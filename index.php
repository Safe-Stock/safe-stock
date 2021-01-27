<?php 
    if(isset($_GET['route'])) {
        switch($_GET['route']) {
<<<<<<< HEAD
            case"test":
                include('./view/test.html');
                break;

            case"blank1":
                include('./view/blank.html');
                break;
            
            case"themetest":
                include('./view/theme/themetest.html');
                break;    
                
            default:
                include('./view/404.html');
                break;
=======
            case "login":
                include('./view/login.html');
                break;
            default:
>>>>>>> 4a7a2f9c07e66ebe1a1a5951986e19c83a82cbfc
                include('./view/404.html');
                break;
        }
    } else {
        include('./view/home.html');
    }
?>