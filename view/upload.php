<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>FilesFranck - Importer des documents</title>
    <!-- Custom fonts for this template-->
    <link href="./assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="./assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <?php include('./view/components/sidebar.html') ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <!-- Topbar -->
                <?php include('./view/components/navigation.html') ?>
                <div class="container-fluid">
                    <!-- Contenu de la page-->                   

                    <body class="text-center">
                        <div class="form-group">
                            <div class="col-10  d-flex h-100 p-5 mx-auto flex-column ">
                                <header class="masthead mb-auto">
                                    <div class="inner">


                                        <h1>Choisissez le fichier à téléverser</h1><br>
                                        <?php                                        
                                        $req = PDORequest::GetAllThemes();
                                        while ($THeme = $req->fetchAll()) {
                                        ?>
                                    </div>
                                    <div style="color:red">
                                        <p><?php if (isset($error)) echo $error; ?></p>
                                    </div>
                                    <form method="POST" action="/routeur/Req_Uplaod.php" enctype="multipart/form-data">
                                    <?php $user['IdProfil']; ?>
                                        <div class="row">
                                            <div class="col">
                                                <label for="exampleFormControlSelect1">Sélectionner un thème</label>
                                                <select class="form-control" name="theme">
                                                    <?php
                                                    for ($i = 0; $i < count($THeme); $i++) {
                                                    ?>
                                                        <option value="<?php echo $THeme[$i]["IdTheme"] ?>"> <?php echo $THeme[$i]["NomTheme"]; ?></option>

                                                    <?php } ?>
                                                </select>
                                                <br>
                                            </div>

                                            <?php
                                            $req = PDORequest::GetAllMotsCleV();
                                            while ($MC = $req->fetchAll()) {
                                            ?>
                                                <div class="col">
                                                    <label for="exampleFormControlSelect1">Sélectionner des Mots clées</label>
                                                    <select class="form-control" name="MotsCle1">
                                                        <?php
                                                        ?><option>. . .</option><?php
                                                            for ($i = 0; $i < count($MC); $i++) {
                                                            ?>
                                                            <option><?php echo $MC[$i]["NomMC"] ?></option>
                                                        <?php
                                                            }
                                                        ?>
                                                    </select><br>
                                                    <select class="form-control" name="MotsCle2">
                                                        <option>. . .</option>
                                                        <?php
                                                        for ($i = 0; $i < count($MC); $i++) {
                                                        ?>
                                                            <option><?php echo $MC[$i]["NomMC"] ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select><br>
                                                    <select class="form-control" name="MotsCle3" >
                                                        <option>. . .</option>
                                                        <?php
                                                        for ($i = 0; $i < count($MC); $i++) {
                                                        ?>
                                                            <option><?php echo $MC[$i]["NomMC"] ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                            <?php
                                            }
                                        }
                                            ?>
                                                </div>
                                                <div class="input-group mb-3">

                                                    <div class="col">
                                                        <label for="exampleFormControlTextarea1"></label>
                                                        <br>
                                                        <textarea class="form-control " name="DocDescription" rows="4" placeholder="Description" required></textarea>
                                                        
                                                        <br>
                                                        <div class="mb-3">
    
                                                        </div>
                                                    </div>
                                                    <!--<div class="custom-file">
                                                    <div>
                                                        <input type="file" class="custom-file-input" id="validatedCustomFile" required>
                                                        <label class="custom-file-label" for="validatedCustomFile">Choisir le fichier à téléverser</label>
                                                        <div class="invalid-feedback">Votre fichier seras mis dans une fille d’attend le temps qu’un administrateur vérifie son contenu</div>
                                                        </div>
                                                    </div>-->

                                                </div>
                                                <div class="input-group mb-3">

                                                    <div class="col">
                                                        <div class="mb-3">
                                                            <div class="input-group">
                                                                <input type="file" class="form-control" aria-label="file example" name="monfichier2" required>
                                                            </div>
                                                        </div>
                                                        <div class="dropzone">
                                                        </div>
                                                        <br>


                                                        <div class="form-group">
                                                            <br><br>
                                                            <input class="btn btn-outline-primary" type="submit" name="chargement" value="Téléverser">
                                                        </div>
                                                    </div>
                                    </form>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('./view/components/footer.html') ?>
    </div>
</body>
</html>