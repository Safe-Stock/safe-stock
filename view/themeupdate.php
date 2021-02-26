
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

    $themefill =  $_POST['updatename'];

    PDORequest::UpdateTheme($themefill);


?>
</body>
</html>>
