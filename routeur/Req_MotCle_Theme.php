<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Mots Clé - Requete</title>
</head>
<body>
    <?php
        require('../class/PDO.php');
        require('../class/UITools.php');

        // Requetes Gestion Mot Clé

        if (isset($_POST['VarModifyName']) && !empty($_POST['VarModifyName']))              //Modifier le Nom du mot clé
        {
            PDORequest::ModifyMotCle($_POST['VarModifyName'], $_GET['VarModifyId']);
            header('Location: ../index.php?admin=gestionmct');
        }
        elseif (isset($_GET['VarDeleteId']))                                                //Supprimer le Mot Clé
        {
            PDORequest::DeleteMotCle($_GET['VarDeleteId']);
            header('Location: ../index.php?admin=gestionmct');
        }
        elseif (isset($_POST['VarCreateMC']))                  //Crée le Mot Clé
        {
            if (!empty($_POST['VarCreateMC']))
            {
                PDORequest::CreateMotCleV($_POST['VarCreateMC']);
                header('Location: ../index.php?admin=gestionmct');
            }
            else        //Si le formulaire est vide alors ne pas crée le Thème
                header('Location: ../index.php?admin=gestionmct');
        }
        elseif (isset($_GET['VarValideMC']))                                                //Valider le Mot CLé
        {
            PDORequest::ValidationMotCle($_GET['VarValideMC']);
            header('Location: ../index.php?admin=gestionmct');
        }

        elseif (isset($_GET['VarRefuserMC']))               //Refuser le mot clé en attente
        {
            PDORequest::DeleteMotCle($_GET['VarRefuserMC']);
            header('Location: ../index.php?admin=gestionmct');
        }

        // Requetes Gestion Thèmes

        elseif (isset($_POST['VarModifyThemeName']) && !empty($_POST['VarModifyThemeName']))    //Modifier le Thème
        {
            PDORequest::UpdateTheme($_POST['VarModifyThemeName'], $_GET['VarModifyThemeId']);
            header('Location: ../index.php?admin=gestionmct');
        }

        elseif (isset($_GET['VarDeleteThemeId']))                                           //Supprimer le Thème
        {
            PDORequest::DeleteTheme($_GET['VarDeleteThemeId']);
            header('Location: ../index.php?admin=gestionmct');
        }

        elseif (isset($_POST['VarCreateTheme']))                    //Crée le Thème
        {
            if (!empty($_POST['VarCreateTheme']))
            {
                PDORequest::CreateTheme($_POST['VarCreateTheme']);
                header('Location: ../index.php?admin=gestionmct');
            }
            else        //Si le formulaire est vide alors ne pas crée le Thème
                header('Location: ../index.php?admin=gestionmct');
        }

    ?>
</body>
</html>>
