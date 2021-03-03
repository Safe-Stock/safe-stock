<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Mots-Cle-Requete</title>
</head>
<body>
    <?php
        require('../class/PDO.php');
        require('../class/UITools.php');

        // Requetes Gestion Mot Clé

        if (isset($_POST['VarModifyName']) && !empty($_POST['VarModifyName']))              //Modifier le Nom du mot clé
        {
            PDORequest::ModifyMotCle($_POST['VarModifyName'], $_GET['VarModifyId']);
            header('Location: http://localhost/safe-stock/?route=gestionmct');
        }
        elseif (isset($_GET['VarDeleteId']))                                                //Supprimer le Mot Clé
        {
            PDORequest::DeleteMotCle($_GET['VarDeleteId']);
            header('Location: http://localhost/safe-stock/?route=gestionmct');
        }
        elseif (isset($_POST['NewMotCle']))                  //Crée le Mot Clé
        {
            if (!empty($_POST['NewMotCle']))
            {
                PDORequest::CreateMotCle($_POST['NewMotCle']);
                header('Location: http://localhost/safe-stock/?route=gestionmct');
            }
            else        //Si le formulaire est vide alors ne pas crée le Thème
                header('Location: http://localhost/safe-stock/?route=gestionmct');
        }
        elseif (isset($_GET['VarValideMC']))                                                //Valider le Mot CLé
        {
            PDORequest::ValidationMotCle($_GET['VarValideMC']);
            header('Location: http://localhost/safe-stock/?route=gestionmct');
        }

        elseif (isset($_GET['VarRefuserMC']))               //Refuser le mot clé en attente
        {
            PDORequest::DeleteMotCle($_GET['VarRefuserMC']);
            header('Location: http://localhost/safe-stock/?route=gestionmct');
        }

        // Requetes Gestion Thèmes

        elseif (isset($_POST['VarModifyThemeName']) && !empty($_POST['VarModifyThemeName']))    //Modifier le Thème
        {
            PDORequest::UpdateTheme($_POST['VarModifyThemeName'], $_GET['VarModifyThemeId']);
            header('Location: http://localhost/safe-stock/?route=gestionmct');
        }

        elseif (isset($_GET['VarDeleteThemeId']))                                           //Supprimer le Thème
        {
            PDORequest::DeleteTheme($_GET['VarDeleteThemeId']);
            header('Location: http://localhost/safe-stock/?route=gestionmct');
        }

        elseif (isset($_POST['NewTheme']))                    //Crée le Thème
        {
            if (!empty($_POST['NewTheme']))
            {
                PDORequest::CreateTheme($_POST['NewTheme']);
                header('Location: http://localhost/safe-stock/?route=gestionmct');
            }
            else        //Si le formulaire est vide alors ne pas crée le Thème
                header('Location: http://localhost/safe-stock/?route=gestionmct');
        }

    ?>
</body>
</html>>
