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
        $ErrorFrom = "aucun nom";
        $_SESSION['DocUplaodRouge'] = '<strong>Vous devez mettre une description.</strong>';
        header('Location: http://safe-stock.test/index.php?route=upload');
    }
if (isset($_POST['DocName']) && !empty($_POST['DocName'])) {
        $DocName = $_POST['DocName'];
        if ($_POST['DocName'] > 50)
        {
        $ErrorFrom = "nom trop long";
        $_SESSION['DocUplaodRouge'] = '<strong>Le nom de votre document ne doit pas dépasser 50 caractères. </strong>';
        header('Location: http://safe-stock.test/index.php?route=upload');

        }
    }else{
        $ErrorFrom = "aucun nom";
        $_SESSION['DocUplaodRouge'] = '<strong>Vous devez mettre un nom à votre document.</strong>';
        header('Location: http://safe-stock.test/index.php?route=upload');
}

if (isset($_FILES['monfichier2']['name']) && !empty($_FILES['monfichier2']['name'])) {
    $DocN1 = $_FILES['monfichier2']['name'];
}else{
    $ErrorFrom = "aucun doc";
    $_SESSION['DocUplaodRouge'] = '<strong>Vous n’avez pas sélectionné de documents, réessayer !</strong>';
    header('Location: http://safe-stock.test/index.php?route=upload');
}

        //parametre du doc 
        $DocSize = $_FILES['monfichier2']['size'];
        $DocEx = pathinfo($DocN1, PATHINFO_EXTENSION);
        $today = date("Y-m-d");
        $IDuser = $user['IdUtil'];
        $DateV = $today;

        //getion des thme / mots cle pour le rendre null
        if ($_POST['theme'] == 0) {
            $DocTheme = NULL;
        }else{
            $DocTheme = $_POST['theme']; }

        if ($_POST['MotsCle1'] == 0) {
            $DocMc1 = NULL;
        }else{
            $DocMc1 = $_POST['MotsCle1']; }

        if ($_POST['MotsCle2'] == 0) {
            $DocMc2 = NULL;
        }else{
            $DocMc2 = $_POST['MotsCle2']; }

        if ($_POST['MotsCle3'] == 0) {
            $DocMc3 = NULL;
        }else{
            $DocMc3 = $_POST['MotsCle3']; }
        


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
                $_SESSION['DocUplaodRouge'] = '<strong>Votre document est trop volumineux, il ne doit pas dépasser 32Mo</strong>';
                header('Location: http://safe-stock.test/index.php?route=upload');

            }
            echo"Voici le recap de votre document :";
                                                                    // test extension ca marche pas
            /*$extensionsValid = array('.png', '.gif', '.jpg', '.jpeg' );
            $extension = strrchr($_FILES['monfichier2']['name'],'.');
            if($extension =  '.txt')
            {
                $oui = "Votre fichier n'est pas conforme.";
            }
            $error = "Votre fichier n'est pas conforme.";
            $_SESSION['DocUplaodRouge'] = '<strong> Vous ne pouvez pas importer de document avec cette extension !</strong>';
            header('Location: http://safe-stock.test/index.php?route=upload');*/


            if (!isset($error)) {

                if($user['IdProfil'] == 3) {
                    $req = PDORequest::AddDocumentNV($DocName, $DocEx, $DocDescription, $today, $DocSize, $IDuser, $DocTheme);
                    echo "requete id user = 3 : " . $user['IdProfil'];
                }else{
                    $req = PDORequest::AddDocumentV($DocName, $DocEx, $DocDescription, $today, $DateV, $DocSize, $IDuser, $DocTheme );
                }


                // recup il du doc
                $req2 = PDORequest::GetLastIdDoc();
                $req2 = $req2->fetch();


                //ajoute les mots clés
                $IdDoc1 = $req2['IdDoc']; 
                $req3 = PDORequest::InsertMC($IdDoc1, $DocMc1, $DocMc2, $DocMc3);
                 
                
                $extensionUpload = strtolower(substr(strrchr($_FILES['monfichier2']['name'], '.'), 1));
                move_uploaded_file($_FILES['monfichier2']['tmp_name'], '../data/doc/' .  $req2['IdDoc'] . "." . $extensionUpload);
                    

                //Alerte success
                if($user['IdProfil'] == 3) {
                    $_SESSION['DocUplaodVert'] = '<strong>Bien joué !</strong>
                    <br>
                    Votre document a été importer avec succès, il sera mis dans une file d’attente en attendant la validation par un professeur ou un administrateur.    
                    <br>
                    À tout moment vous pouvez le retrouver dans votre espace personnel.
                    ';
                }else{
                    $_SESSION['DocUplaodVert'] = '<strong>Bien joué !</strong>
                    <br>
                    Votre document a été importer avec succès.
                    <br>
                    À tout moment vous pouvez le retrouver dans votre espace personnel.
                    ';         
                }
                    header('Location: http://safe-stock.test/index.php?route=upload');

            }
        }
        
          
    }
    else 
    {
        echo $ErrorFrom;
    } 

    header('Location: http://safe-stock.test/index.php?route=upload');