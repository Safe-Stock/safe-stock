<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Delete_Themes</title>
</head>
<body>
<?php
    require('../../class/PDO.php');
    require('../../class/UITools.php');

    $VarModifyNameMC = $_POST['VarModifyName'];
    $VarModifyIdMC = $_POST['VarModifyId'];
    $VarDeleteMC =  $_GET['varDelete'];
    $VarNewMC = $_POST['NewMotCle'];

    if ($VarModifyIdMC > 0)
    {
        PDORequest::ModifyMotCle($VarModifyNameMC, $VarModifyIdMC);
        header('Location: http://localhost/safe-stock/?route=mcgestion');
    }
    elseif ($VarDeleteMC > 0)
    {
        PDORequest::DeleteMotCle($VarDeleteMC);
        header('Location: http://localhost/safe-stock/?route=mcgestion');
    }
    else
    {
        PDORequest::CreateMotCle($VarNewMC);
        header('Location: http://localhost/safe-stock/?route=mcgestion');
    }

?>
</body>
</html>>
