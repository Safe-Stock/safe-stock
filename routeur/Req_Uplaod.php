<?php
require('../class/PDO.php');
session_start();
if (
    isset($_POST['theme']) && !empty($_POST['theme'])
    && isset($_POST['MotsCle1']) && !empty($_POST['MotsCle1'])
    && isset($_POST['MotsCle2']) && !empty($_POST['MotsCle2'])
    && isset($_POST['MotsCle3']) && !empty($_POST['MotsCle3'])
    && isset($_POST['DocDescription']) && !empty($_POST['DocDescription'])
    //&& isset($_POST['monfichier2']) && !empty($_POST['monfichier2'])
    ) {
    //variable du doc
    $DocName = $_FILES['monfichier2']['name'];
    $DocSize = $_FILES['monfichier2']['size'];
    $DocEx = pathinfo($DocName, PATHINFO_EXTENSION);
    //$DocTheme = $_POST['theme']; 

    if ($_POST['theme'] == 6 ) { //verifie que le theme n'est pas null 6 c'est dans ma bdd c'est un theme vide qui s'affiche toujours en premier jsp comment faire autrement
        $DocTheme = NULL;
    }else{
        $DocTheme = $_POST['theme'];
    }

    //$Idprofil = $_POST['IdProfil'];
    $DocMc1 = $_POST['MotsCle1'];
    $DocMc2 = $_POST['MotsCle2'];
    $DocMc3 = $_POST['MotsCle3'];
    $DocDescription = $_POST['DocDescription'];
    $today = date("Y-m-d");
    $DateV = NULL;
    //$IDuser = $_GET['IdProfil'];
    //if(isset($_GET['admin']) && $user['IdProfil'] == 1)
    if($user['IdProfil'] == 1)
    {
        $DateV = $today;
    }else{
        $DateV = NULL;
    }
    $user = PDORequest::GetUserWithId($_SESSION['user']);
    $user = $user->fetch();
    //Affichage info du doc a suprimer
    echo $DocName;
        ?> <br> <?php
        echo $DocSize;
        ?> <br> <?php
        echo $DocEx;
        ?> <br> <?php
        echo "theme : ";
        ?> <br> <?php
        echo $DocMc1;
        ?> <br> <?php
        echo $DocMc2;
        ?> <br> <?php
        echo $DocMc3;
        ?> <br> <?php
        echo $DocDescription;
        ?> <br> <?php
        echo $today;
        ?> <br> <?php
        $null = NULL;
        echo $DateV;
        ?> <br> <?php
        //echo $Idprofil;
        //echo "Id user"; var_dump($user);
        ?> <br> <?php  


        //affichage des $_FILES
        var_dump($_FILES);


        if ($_FILES['monfichier2']['error'] == 0) {

        ?><pre><?php print_r($_POST) ?></pre>        
        <?php

            //test taille
            if ($_FILES['monfichier2']['size'] > 3200000) {
                $error = "Votre fichier est trop lourd.";
            }


            // test extension 
            /*$extensionsValid = array('.png', '.gif', '.jpg', '.jpeg' );
            $extension = strrchr($_FILES['monfichier2']['name'],'.');
            if($extension !=  '.docx' || '.pdf')
            {
                $error = "Votre fichier n'est pas conforme.";
            }*/


            // Apres verification :
                if (!isset($error)) {
                    move_uploaded_file($_FILES['monfichier2']['tmp_name'], '../data/doc/' . $_FILES['monfichier2']['name']);
                        PDORequest::AddDocument($DocName, $DocEx, $DocDescription, $today, $DateV, $DocSize, $IDuser, $DocTheme);
                        echo "le fichier est chargé";    
                }
        } else {
            $error = "il y a un problème dans le formulaire";            
        }
    }
?>