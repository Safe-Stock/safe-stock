<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Mots-Cle-Requete</title>
</head>
<body>
    <?php
        require('../../class/PDO.php');
        require('../../class/UITools.php');

        if (isset($_POST['VarModifyName']) && !empty($_POST['VarModifyName']))
        {
            PDORequest::ModifyMotCle($_POST['VarModifyName'], $_GET['VarModifyId']);
            header('Location: http://localhost/safe-stock/?route=mcgestion');
        }
        elseif (isset($_GET['VarDeleteId']))
        {
            PDORequest::DeleteMotCle($_GET['VarDeleteId']);
            header('Location: http://localhost/safe-stock/?route=mcgestion');
        }
        elseif (isset($_POST['NewMotCle']))
        {
            PDORequest::CreateMotCle($_POST['NewMotCle']);
            header('Location: http://localhost/safe-stock/?route=mcgestion');
        }
        elseif (isset($_GET['VarValideMC']))
        {
            PDORequest::ValidationMotCle($_GET['VarValideMC']);
            header('Location: http://localhost/safe-stock/?route=mcgestion');
        }
    ?>
</body>
</html>>
