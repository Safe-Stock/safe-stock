<?php
require("../class/PDO.php");
session_start();
    if(isset($_POST['login'], $_POST['password']) && !empty($_POST['login']) && !empty($_POST['password']))  //Vérifie que identifiant et mdp pas vide
    {
        $login = htmlspecialchars($_POST['login']);
        $password = htmlspecialchars($_POST['password']);

        $userData = PDORequest::GetUserInformation($login);
        $userData = $userData->fetch();

        if($userData) {
            if(password_verify($password, $userData['MdpUtil'])) {
                $_SESSION['user'] = $userData['IdUtil'];
                if(isset($_POST['SubmitBtn'])){
                    setcookie('email',$userData['MailUtil'],time()+2629800,"/",null,false,true);
                    setcookie('password',$password,time()+2629800,"/",null,false,true);
                }
                header('location: ../index.php');
            }  else  {
                $_SESSION['error'] = "Le mot de passe est incorrect.";
                header('location: ../index.php');
            }
        } else {
            $_SESSION['error'] = "Cet utilisateur n'existe pas.";
            header('location: ../index.php');
        }
    } else
    {
        $_SESSION['error'] = "Tout les champs ne sont pas remplis";
        header('location: ../index.php');
    }
?>
