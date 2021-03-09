<?php
session_start();
require("../class/PDO.php");
if (isset($_POST['password']) && !empty($_POST['password'])) {
    $userData = PDORequest::GetUserWithId($_SESSION['user']);
    $userData = $userData->fetch();
    $password = htmlspecialchars($_POST['password']);
    if (password_verify($password, $userData['MdpUtil'])) {

        // On verifie si un fichier a été envoyé

        if (isset($_FILES['avatar']) and !empty($_FILES['avatar']['name'])) {
            $tailleMax = 2097152;
            $extensionsValides = array('jpg', 'jpeg', 'png');
            // On verifie si la taille est inferieur ou égale à 2MB
            if ($_FILES['avatar']['size'] <= $tailleMax) {
                $extensionUpload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));
                // On verifie si l'extention du fichier est une extension autorisé
                if (in_array($extensionUpload, $extensionsValides)) {
                    $newName = strtotime(date("Y-m-d H:i:s")) . "." . $extensionUpload;
                    $chemin = "../data/avatar/" . $newName;
                    $resultat = move_uploaded_file($_FILES['avatar']['tmp_name'], $chemin);
                    // Si $resultat est vrai alors on upload l'image
                    if ($resultat) {
                        // On Update la bdd
                        var_dump("C'est bon");
                        PDORequest::UpdateUser($_SESSION['user'], $newName);

                    } else {
                        $_SESSION['error'] = "Il y a eu une erreur !";
                    }
                } else {
                    $_SESSION['error'] = "Votre image n'a pas le bon format !";
                }
            } else {
                $_SESSION['error'] = "Votre image doit faire 2Mb ou moins !";
            }
        }



    }
} else {
    $_SESSION['error'] = "Entrer votre mot de passe pour valider les changements";
}

header('location: ../index.php?route=profil');
