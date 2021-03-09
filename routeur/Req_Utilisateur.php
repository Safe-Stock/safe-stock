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

        if (isset($_POST['VarModifyNomUtil']) && isset($_POST['VarModifyPrenomUtil']))              //Modifier le Nom du mot clé
        {
            PDORequest::ModifyUser($_POST['VarModifyNomUtil'], $_POST['VarModifyPrenomUtil'], $_GET['VarModifyIdUtil']);
            header('Location: http://localhost/safe-stock/?route=gestionuser');
        }
        elseif (isset($_GET['VarDeleteUtil']))                                                //Supprimer le Mot Clé
        {
            PDORequest::DeleteUser($_GET['VarDeleteUtil']);
            header('Location: http://localhost/safe-stock/?route=gestionuser');
        }
            //Crée un Prof
        elseif (isset($_POST['VarCreateNomProf']) && isset($_POST['VarCreatePrenomProf']) && isset($_POST['VarCreateMdpProf']))
        {
            PDORequest::CreateUserProf($_POST['VarCreateNomProf'], $_POST['VarCreatePrenomProf'], $_POST['VarCreateMdpProf']);
            header('Location: http://localhost/safe-stock/?route=gestionuser');
        }

        elseif (isset($_POST['VarCreateNomEleve']) && isset($_POST['VarCreatePrenomEleve']) && isset($_POST['VarCreateMdpEleve']))
        {
            PDORequest::CreateUserEleve($_POST['VarCreateNomEleve'], $_POST['VarCreatePrenomEleve'], $_POST['VarCreateMdpEleve']);
            header('Location: http://localhost/safe-stock/?route=gestionuser');
        }

    ?>
</body>
</html>>
