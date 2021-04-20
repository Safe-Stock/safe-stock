<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Utilisateur - Requete</title>
    </head>
    <body>
        <?php
            require('../class/PDO.php');
            require('../class/UITools.php');

            // Requettes Gestion Eleve

            if (isset($_POST['VarCreateNomEleve']) && isset($_POST['VarCreatePrenomEleve']) && isset($_POST['VarCreateIdentifiantEleve']) && isset($_POST['VarCreateMdpEleve']))
            {   //Creation Compte Eleve
                PDORequest::CreateUserEleve($_POST['VarCreateNomEleve'], $_POST['VarCreatePrenomEleve'], $_POST['VarCreateIdentifiantEleve'], $_POST['VarCreateMdpEleve']);
                header('Location: ../index.php?admin=gestionuser');
            }

            // Requettes Gestion Prof

            elseif (isset($_POST['VarCreateNomProf']) && isset($_POST['VarCreatePrenomProf']) && isset($_POST['VarCreateIdentifiantProf']) && isset($_POST['VarCreateMdpProf']))
            {   //Creation Compte Eleve
                PDORequest::CreateUserProf($_POST['VarCreateNomProf'], $_POST['VarCreatePrenomProf'], $_POST['VarCreateIdentifiantProf'], $_POST['VarCreateMdpProf']);
                header('Location: ../index.php?admin=gestionuser');
            }

            //Requettes Commune Prof et Eleve

            elseif (isset($_GET['VarModifyIdUtil']) && isset($_POST['VarModifyNomUtil']) && isset($_POST['VarModifyPrenomUtil']) && isset($_POST['VarModifyIdentifiantUtil']))
            {   //Modifier les informations d'un utilisateur
                PDORequest::ModifyUser($_POST['VarModifyNomUtil'], $_POST['VarModifyPrenomUtil'], $_POST['VarModifyIdentifiantUtil'], $_GET['VarModifyIdUtil']);
                header('Location: ../index.php?admin=gestionuser');
            }

            elseif (isset($_GET['VarModifyIdUtil']) && isset($_POST['VarModifyMdpUtil']) &&isset($_POST['VarModifyMdpconfUtil']))
            {   //Modifier mdp utilisateur si les deux mdp sont identiaue
                if ($_POST['VarModifyMdpUtil'] == $_POST['VarModifyMdpconfUtil'])
                {   //Si deux MDP Identiaue alors changer le mot de passe de l' utilisateur
                    PDORequest::ModifyUserPassword($_POST['VarModifyMdpUtil'], $_GET['VarModifyIdUtil']);
                    header('Location: ../index.php?admin=gestionuser');
                }
                else
                {   //Si deux mot de passe different alors session pour prevenir l admin de son erreur
                    session_start();
                    $_SESSION['MdpNonIdentique']="Les deux mdp ne sont pas identiques";
                    header('Location: ../index.php?admin=gestionuser');
                }
            }

            elseif (isset($_GET['VarDeleteUtil']))
            {   //Supprimer un Utilisateur
                PDORequest::DeleteUser($_GET['VarDeleteUtil']);
                header('Location: ../index.php?admin=gestionuser');
            }

            //Update MDP By Profil Page

            if (isset($_GET['UpdateMdpProfilId']))
            {   //Récupération informations User viser
                $userData = PDORequest::GetUserWithId($_GET['UpdateMdpProfilId']);
                $userData = $userData->fetch();
                $password = htmlspecialchars($_POST['UpdateMdpProfilPassword']);
                if (password_verify($password, $userData['MdpUtil']))
                {   //Si mot de passe actuel bon Alors
                    if (isset($_POST['VarModifyMdpProfil']) && isset($_POST['VarModifyMdpconfProfil']))
                    {   //Vérifie que les deux nouveaux mdp existe
                        if ($_POST['VarModifyMdpProfil'] == $_POST['VarModifyMdpconfProfil'])
                        {   //Vérifie que les deux nouveaux mdp sont identique
                            PDORequest::ModifyUserPassword($_POST['VarModifyMdpconfProfil'], $userData['IdUtil']);
                            session_start();
                            $_SESSION['MdpModifSuccess'] = "Votre Mot de passe à bien été modifier";
                            header('Location: ../index.php?route=profil');
                        }
                        else
                        {   //Si deux new mdp différent alors afficher erreur via session
                            session_start();
                            $_SESSION['NouveauMdpFalse'] = "Les deux nouveaux mot de passe ne sont pas identique";
                            header('Location: ../?route=profil');
                        }
                    }
                }
                else
                {   //Si deux new mdp actuel afficher erreur via session
                    session_start();
                    $_SESSION['ActuelMdpFalse'] = "Ancien Mot de passe faux";
                    header('Location: ../?route=profil');
                }
            }

            // Importer User avec fichier Csv

            elseif (isset($_FILES['VarCsvFile']) && !empty($_FILES['VarCsvFile']['name']))
            {
                $file = file($_FILES['VarCsvFile']['tmp_name']);
                $extensionsValides = array('csv');

                $extensionUpload = strtolower(substr(strrchr($_FILES['VarCsvFile']['name'], '.'), 1));

                if (in_array($extensionUpload, $extensionsValides)) {
                    $filet = fopen($_FILES['VarCsvFile']['tmp_name'], 'r');
                    while (!feof($filet))
                    {
                        $line[] = fgetcsv($filet, 1024);
                    }
                    fclose($filet);
                    foreach ($line as $val)
                    {
                        $champs[] = explode(";", $val[0]);
                    }
                    foreach ($champs as $line) {
                        PDORequest::CreateUserEleve($line[0], $line[1], $line[2], $line[3]);
                    }
                    session_start();
                    $_SESSION['goodCsv'] = "Utilisateurs Ajouter";
                    header('Location: ../?admin=gestionuser');
                }
                else
                {
                    session_start();
                    $_SESSION['errorCsv'] = "Entrez un fichier csv";
                    header('Location: ../?admin=gestionuser');
                }
                header('Location: ../?admin=gestionuser');
            }

        ?>
    </body>
</html>>
