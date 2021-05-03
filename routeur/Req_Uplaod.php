<?php
require('../class/PDO.php');
session_start();
if(isset($_SESSION['user']) && !empty($_SESSION['user'])) {
    $user = PDORequest::GetUserWithId($_SESSION['user']);
    $user = $user->fetch();
    //echo $user['IdProfil'];
    //echo $user['IdUtil'];
}
//verification du nom et de la description theme et mots cle peuvent etre vide pour les rajouter apres.
if (isset($_POST['DocDescription']) && !empty($_POST['DocDescription'])) {
        $DocDescription = $_POST['DocDescription'];
    }else{
        $ErrorFrom = "Il ni a pas de description";
    }
if (isset($_POST['DocName']) && !empty($_POST['DocName'])) {
        $DocName = $_POST['theme'];
    }else{
        $ErrorFrom ="le titre est vide";
}

        //parametre du doc 
        $DocN1 = $_FILES['monfichier2']['name'];
        $DocSize = $_FILES['monfichier2']['size'];
        $DocEx = pathinfo($DocN1, PATHINFO_EXTENSION);
        $today = date("Y-m-d");
        $IDuser = $user['IdProfil'];
        if($IDuser == 1 || 2) 
        {
            echo "sale chien";
            $DateV = $today;
        }else{
            $DateV = NULL;
        }
        $DocTheme = $_POST['theme'];
        $DocMc1 = $_POST['MotsCle1'];
        $DocMc2 = $_POST['MotsCle2'];
        $DocMc3 = $_POST['MotsCle3'];


    ?><pre><?php print_r($_POST) ?></pre>        
    <?php
     ?><pre><?php print_r($_FILES) ?></pre>        
     <?php


    if (!isset($ErrorFrom))
    {
        if ($_FILES['monfichier2']['error'] == 0) {
                                                                    //test la taille du doc 32Mb
            if ($_FILES['monfichier2']['size'] > 3200000) {
                $error = "Votre fichier est trop lourd.";
            }
            echo"Voici de recap de votre document :";
                                                                    // test extension ca marche pas bien
            /*$extensionsValid = array('.png', '.gif', '.jpg', '.jpeg' );
            $extension = strrchr($_FILES['monfichier2']['name'],'.');
            if($extension !=  '.docx' || '.pdf')
            {
                $error = "Votre fichier n'est pas conforme.";
            }*/

            if (!isset($error)) {

                $req = PDORequest::AddDocument($DocName, $DocEx, $DocDescription, $today, $DateV, $DocSize, $IDuser, $DocTheme );

                $req2 = PDORequest::GetLastIdDoc();
                $req2 = $req2->fetch();
                //ajoute les mots clés
                $req3 = PDORequest::InsertMC($req2, $DocMc1);
                echo $req2['IdDoc'];         
               
                $extensionUpload = strtolower(substr(strrchr($_FILES['monfichier2']['name'], '.'), 1));
                move_uploaded_file($_FILES['monfichier2']['tmp_name'], '../data/doc/' .  $req2['IdDoc'] . "." . $extensionUpload);
                    
                    echo "le fichier est chargé";  
                    
            }
        }
        
          
    }
    else 
    {
        echo $ErrorFrom;
    } 