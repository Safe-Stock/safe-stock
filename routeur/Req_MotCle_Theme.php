<?php
    session_start();
    require('../class/PDO.php');
    require('../class/UITools.php');

    if(isset($_SESSION['user']) && !empty($_SESSION['user']))
    {
        $user = PDORequest::GetUserWithId($_SESSION['user']);
        $user = $user->fetch();

        // Requetes Gestion Mot Clé

        //Modifier le mot cle
        if (isset($_POST['VarModifyName']) && !empty($_POST['VarModifyName']))
        {
            PDORequest::ModifyMotCle($_POST['VarModifyName'], $_GET['VarModifyId']);
            header('Location: ../index.php?admin=gestionmct');
        }

        //Supprimer le Mot Cle
        elseif (isset($_GET['VarDeleteId']))
        {
            PDORequest::DeleteMotCle($_GET['VarDeleteId']);
            header('Location: ../index.php?admin=gestionmct');
        }

        //Cree le Mot Cle
        elseif (isset($_POST['VarCreateMC']))
        {
            $McAlreadyExist = 0;
            $reqMcV = PDORequest::GetAllMotsCleV();
            while ($MotCleVReq = $reqMcV->fetch())
            {
                if ($MotCleVReq['NomMC'] == $_POST['VarCreateMC']) //Verifier si le mot cle existe deja
                {
                    $McAlreadyExist = 1; //Si le mot cle existe deja alors passer variable a 1
                    $_SESSION['McAlreadyExistV'] = "Ce mot cle existe deja";
                }
            }
            $reqMcNV = PDORequest::GetAllMotsCleNonV();
            while ($MotCleNVReq = $reqMcNV->fetch())
            {
                if ($MotCleNVReq['NomMC'] == $_POST['VarCreateMC']) //Verifier si le mot cle existe deja
                {
                    $McAlreadyExist = 2; //Si le mot cle existe deja en attante de validation alors passer variable a 2
                    $_SESSION['McAlreadyExistNV'] = "Ce mot cle est deja en attente de validation";
                }
            }
            if ($user['IdProfil'] == 1) //Si admin alors rediriger vers page gestion admin Mot Cle
            {
                if ($McAlreadyExist == 0) //Si le mot cle existe pas alors on le cree
                {
                    PDORequest::CreateMotCleV($_POST['VarCreateMC']); //Cree et valider mot cle
                    header('Location: ../index.php?admin=gestionmct');
                }
                else
                {
                    header('Location: ../index.php?admin=gestionmct');
                }

            }
            elseif ($user['IdProfil'] == 2) //Si prof alors rediriger vers page validation prof Mot Cle
            {
                if ($McAlreadyExist == 0) //Si le mot cle existe pas alors on le cree
                {
                    PDORequest::CreateMotCleV($_POST['VarCreateMC']);
                    header('Location: ../index.php?prof=gestionmc');
                }
                else
                {
                    header('Location: ../index.php?prof=gestionmc');
                }
            }
            elseif ($user['IdProfil'] == 3) //Si Eleve alors redireger vers Home
            {
                if ($McAlreadyExist == 0) //Si le mot cle existe pas alors on le cree
                {
                    PDORequest::CreateMotCleNV($_POST['VarCreateMC']); //Proposer Mot Cle
                    header('Location: ../index.php');
                }
                else
                {
                    header('Location: ../index.php');
                }
            }
        }

        //Valider le Mot Cle
        elseif (isset($_GET['VarValideMC']))
        {
            PDORequest::ValidationMotCle($_GET['VarValideMC']);
            if ($_POST['TypeProfil'] == 1)
            {
                header('Location: ../index.php?admin=gestionmct');
            }
            elseif ($_POST['TypeProfil'] == 2)
            {
                header('Location: ../index.php?prof=gestionmc');
            }
            else
            {
                header('Location: ../index.php');
            }
        }

        //Refuser le mot cle
        elseif (isset($_GET['VarRefuserMC']))
        {
            PDORequest::DeleteMotCle($_GET['VarRefuserMC']);
            if ($_POST['TypeProfil'] == 1)
            {
                header('Location: ../index.php?admin=gestionmct');
            }
            elseif ($_POST['TypeProfil'] == 2)
            {
                header('Location: ../index.php?prof=gestionmc');
            }
            else
            {
                header('Location: ../index.php');
            }
        }

        // Requetes Gestion Thèmes

        //Modifier le Theme
        elseif (isset($_POST['VarModifyThemeName']) && !empty($_POST['VarModifyThemeName']))
        {
            PDORequest::UpdateTheme($_POST['VarModifyThemeName'], $_GET['VarModifyThemeId']);
            header('Location: ../index.php?admin=gestionmct');
        }

        //Supprimer le Theme
        elseif (isset($_GET['VarDeleteThemeId']))
        {
            PDORequest::DeleteTheme($_GET['VarDeleteThemeId']);
            header('Location: ../index.php?admin=gestionmct');
        }

        //Cree le theme
        elseif (isset($_POST['VarCreateTheme']))
        {
            $ThemeAlreadyExist = 0;
            $reqTheme = PDORequest::GetAllThemes();
            while ($ThemeReq = $reqTheme->fetch())
            {
                if ($ThemeReq['NomTheme'] == $_POST['VarCreateTheme']) //Verifier si le theme existe deja
                {
                    $ThemeAlreadyExist = 1; //Si le theme existe deja alors passer variable a 1
                    $_SESSION['ThemeAlreadyExistV'] = "Ce Theme existe deja";
                }
            }
            if ($ThemeAlreadyExist == 0) //Si le theme existe pas alors on le cree
            {
                PDORequest::CreateTheme($_POST['VarCreateTheme']);
                header('Location: ../index.php?admin=gestionmct');
            }
            else
            {
                header('Location: ../index.php?admin=gestionmct');
            }
        }
    }
    else
    {
        header('Location: ../index.php');
    }
