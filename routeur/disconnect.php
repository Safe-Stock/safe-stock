<?php 
    session_destroy();

    // Suppression des cookies de connexion automatique
    setcookie('email','',time()-3600,'/');
    setcookie('password','',time()-3600,'/');
    setcookie('PHPSESSID','',time()-3600,'/');
    header('location: ./index.php');
?>