
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

    $QueryCreateTheme =  $_POST['create'];
    $QueryDeleteTheme =  $_GET['delete'];
    $QueryUpdateThemeName =  $_POST['update_name'];
    $QueryUpdateThemeId =  $_POST['update_id'];

    if ($QueryUpdateThemeName > 0)
    
    {

        PDORequest::UpdateTheme($QueryUpdateThemeId, $QueryUpdateThemeName);

    }

    elseif ($QueryDeleteTheme > 0)
    
    {

        PDORequest::DeleteTheme($QueryDeleteTheme);

    }

    else

    {

        PDORequest::CreateTheme($QueryCreateTheme);

    }

?>
</body>
</html>>
