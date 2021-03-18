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

        // Requetes Gestion Documents

        if (isset($_GET['VarValideDoc']) && isset($_POST['VarUpdateNameDocNv']) && isset($_POST['VarUpdateDescDocNv']))
        {
            PDORequest::UpdateDocNv($_POST['VarUpdateNameDocNv'], $_POST['VarUpdateDescDocNv'], $_GET['VarValideDoc']);
            header('Location: http://localhost/safe-stock/?admin=gestiondoc');
        }

        elseif (isset($_GET['VarDeleteDoc']))
        {
            PDORequest::DeleteDoc($_GET['VarDeleteDoc']);
            header('Location: http://localhost/safe-stock/?admin=gestiondoc');
        }

        elseif (isset($_GET['VarValideDoc']))
        {
            PDORequest::ValidationDoc($_GET['VarValideDoc']);
            header('Location: http://localhost/safe-stock/?admin=gestiondoc');
        }

        elseif (isset($_GET['VarUpdateDocV']) && isset($_POST['VarUpdateNameDocV']) && isset($_POST['VarUpdateDescDocV']))
        {
            PDORequest::UpdateDocV($_POST['VarUpdateNameDocV'], $_POST['VarUpdateDescDocV'], $_GET['VarUpdateDocV']);
            header('Location: http://localhost/safe-stock/?admin=gestiondoc');
        }

        elseif (isset($_GET['VarUpdateDocVH']) && isset($_POST['VarUpdateNameDocV']) && isset($_POST['VarUpdateDescDocV']))
        {
            PDORequest::UpdateDocV($_POST['VarUpdateNameDocV'], $_POST['VarUpdateDescDocV'], $_GET['VarUpdateDocVH']);
            header('Location: http://localhost/safe-stock/index.php');
        }

    ?>
</body>
</html>>
