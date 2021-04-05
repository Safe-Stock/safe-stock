<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Document - Requete</title>
</head>
<body>
    <?php
        require('../class/PDO.php');
        require('../class/UITools.php');

        // Requetes Gestion Documents

        if (isset($_GET['VarValideDoc']) && isset($_POST['VarUpdateNameDocNv']) && isset($_POST['VarUpdateDescDocNv']))
        {
            PDORequest::UpdateValidDocNv($_POST['VarUpdateNameDocNv'], $_POST['VarUpdateDescDocNv'], $_GET['VarValideDoc']);
            header('Location: ../index.php?admin=gestiondoc');
        }   //Modification d'un doc puis validation directe

        elseif (isset($_GET['VarDeleteDoc']))
        {
            PDORequest::DeleteDoc($_GET['VarDeleteDoc']);
            header('Location: ../index.php?admin=gestiondoc');
        }   //Suppression d'un document

        elseif (isset($_GET['VarUpdateDocV']) && isset($_POST['VarUpdateNameDocV']) && isset($_POST['VarUpdateDescDocV']))
        {
            PDORequest::UpdateDocV($_POST['VarUpdateNameDocV'], $_POST['VarUpdateDescDocV'], $_GET['VarUpdateDocV']);
            header('Location: ../index.php?admin=gestiondoc');
        }   //Modification d'un document déja valider

        elseif (isset($_GET['VarUpdateDocVH']) && isset($_POST['VarUpdateNameDocV']) && isset($_POST['VarUpdateDescDocV']))
        {
            PDORequest::UpdateDocV($_POST['VarUpdateNameDocV'], $_POST['VarUpdateDescDocV'], $_GET['VarUpdateDocVH']);
            header('Location: ../index.php?admin=gestiondoc');
        }   //Modification d'un document déjà valider depuis modal sur le home

        elseif (isset($_GET['VarAddKeyword']) && isset($_POST['IdKeyword'])) {
            PDORequest::AddKeywordOnDocument($_GET['VarAddKeyword'], $_POST['IdKeyword']);
            //print("Ajout d'un mot-clé");
            header('Location: ../index.php?admin=gestiondoc');
        }
        elseif (isset($_GET['VarDeleteKeyword']) && isset($_POST['IdKeyword'])) {
            PDORequest::DeleteKeywordOnDocument($_GET['VarDeleteKeyword'], $_POST['IdKeyword']);
            //print("Suppression d'un mot-clé");
            header('Location: ../index.php?admin=gestiondoc');
        }
    ?>
</body>
</html>>
