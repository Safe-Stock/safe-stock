
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Delete_Themes</title>
</head>
<body>
<?php
    require('../class/PDO.php');
    require('../class/UITools.php');

    $themefill =  $_GET['var'];

    PDORequest::DeleteTheme($themefill);

    echo "Le thème à été supprimé.";


?>
</body>
</html>>
