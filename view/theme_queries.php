
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Theme_Query</title>
</head>
<body>
<?php
    require('../class/PDO.php');
    require('../class/UITools.php');

    /*$QueryCreateTheme =  $_POST['create'];
    $QueryDeleteTheme =  $_GET['delete'];
    $QueryUpdateThemeId =  $_GET['update_id'];
    $QueryUpdateThemeName =  $_POST['update_name'];*/

    if ( isset($_POST['update_name']) && !empty($_POST['update_name']) )
    
    {
        var_dump('test');
        PDORequest::UpdateTheme( $_POST['update_name'], $_GET['id'] );
        header('Location: http://localhost/safe-stock/?route=themegestion');

    }

    elseif ( isset($_GET['delete']))
    
    {

        PDORequest::DeleteTheme($_GET['delete']); 
        header('Location: http://localhost/safe-stock/?route=themegestion');
    }

    else

    {

        PDORequest::CreateTheme($_POST['create']);
        header('Location: http://localhost/safe-stock/?route=themegestion');
    }

?>
</body>
</html>>
