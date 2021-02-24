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

    $iMotCle =  $_GET['vari'];

    PDORequest::DeleteMotCle($iMotCle);
    header('Location: http://localhost/safe-stock/?route=mcgestion');

?>
</body>
</html>>
