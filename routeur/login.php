<?php

    include('./view/login.html');

    if (isset($_POST["submitBtn"])) //Vérifie qu'un formulaire à bien été envoyer
    {
        echo "Le formulaire à bien été envoyer";

        if (isset($_POST["Identifiant"]) && isset($_POST["Password"]))  //Vérifie que identifiant et mdp pas vide
        {
            echo "Gg le reuf ta tt rentrer";
        }
        else
        {
            echo "Rentrez des valeurs dans les champs de connexion ";
        }
    }


?>
