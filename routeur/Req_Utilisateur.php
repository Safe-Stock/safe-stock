<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Utilisateur-Requete</title>
</head>

<body>
    <?php
    require('../class/PDO.php');
    require('../class/UITools.php');

    // Requetes Gestion Utilisateur

    //Modifier Le nom, prénom d'un utilisateur (meme requette pour un prof et un élève
    if (isset($_POST['VarModifyNomUtil']) && isset($_POST['VarModifyPrenomUtil']) && isset($_POST['VarModifyIdentifiantUtil'])) {
        PDORequest::ModifyUser($_POST['VarModifyNomUtil'], $_POST['VarModifyPrenomUtil'], $_POST['VarModifyIdentifiantUtil'], $_GET['VarModifyIdUtil']);
        header('Location: ../?admin=gestionuser');
    }
    //Modifier le mot de passe d'un utilisateur (meme requette pour un prof et un élève)
    elseif (isset($_POST['VarModifyMdpUtil']) && isset($_POST['VarModifyMdpconfUtil'])) {
        if ($_POST['VarModifyMdpUtil'] == $_POST['VarModifyMdpconfUtil']) //Vérifie que mdp et confirmation mdp sont Identique)
        {
            PDORequest::ModifyUserPassword($_POST['VarModifyMdpUtil'], $_GET['VarModifyIdUtil']);
            header('Location: ../?admin=gestionuser');
        } else {   //Si mdp non identique alors Session pour afficher erreur sur page gestion User
            session_start();
            $_SESSION['MdpNonIdentique'] = "Les deux mdp ne sont pas identiques";
            header('Location: ../?admin=gestionuser');
        }
    } elseif (isset($_GET['VarDeleteUtil']))  //Supprimer un Utilisateur (Meme requette pour prof et Utilisateur)
    {
        PDORequest::DeleteUser($_GET['VarDeleteUtil']);
        header('Location: ../?admin=gestionuser');
    }
    //Crée un Professeur avec Mdp Hasher dans PDO
    elseif (isset($_POST['VarCreateNomProf']) && isset($_POST['VarCreatePrenomProf']) && isset($_POST['VarCreateIdentifiantProf']) && isset($_POST['VarCreateMdpProf'])) {
        PDORequest::CreateUserProf($_POST['VarCreateNomProf'], $_POST['VarCreatePrenomProf'], $_POST['VarCreateIdentifiantProf'], $_POST['VarCreateMdpProf']);
        header('Location: ../?admin=gestionuser');
    }
    //Crée un Elève avec Mdp Hasher dans PDO
    elseif (isset($_POST['VarCreateNomEleve']) && isset($_POST['VarCreatePrenomEleve']) && isset($_POST['VarCreateIdentifiantEleve']) && isset($_POST['VarCreateMdpEleve'])) {
        PDORequest::CreateUserEleve($_POST['VarCreateNomEleve'], $_POST['VarCreatePrenomEleve'], $_POST['VarCreateIdentifiantEleve'], $_POST['VarCreateMdpEleve']);
        header('Location: ../?admin=gestionuser');
    } elseif (isset($_FILES['VarCsvFile']) && !empty($_FILES['VarCsvFile']['name'])) {

        $file = file($_FILES['VarCsvFile']['tmp_name']);
        $extensionsValides = array('csv');

        $extensionUpload = strtolower(substr(strrchr($_FILES['VarCsvFile']['name'], '.'), 1));

        if (in_array($extensionUpload, $extensionsValides)) {
            $filet = fopen($_FILES['VarCsvFile']['tmp_name'], 'r');
            while (!feof($filet)) {
                $line[] = fgetcsv($filet, 1024);
            }
            fclose($filet);
            foreach ($line as $val) {
                $champs[] = explode(";", $val[0]);
            }

            foreach ($champs as $line) {
                PDORequest::CreateUserEleve($line[0], $line[1], $line[2], $line[3]);
            }
        } else {
            $_SESSION['error'] = "Entrez un fichier csv.";
        }
        header('Location: ../?admin=gestionuser');
    }

    ?>
</body>

</html>