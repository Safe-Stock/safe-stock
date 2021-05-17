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
        <?php include('./view/components/sidebar.php') ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <!-- Topbar -->
                <?php include('./view/components/navigation.php') ?>
                <div class="container-fluid">
                    <!-- Contenu de la page-->
                    <div class="text-center">
                        <div class="form-group">
                            <div class="col-10  d-flex h-100 p-5 mx-auto flex-column ">
                                <header class="masthead mb-auto">
                                    <div class="inner">


                                        <?php
                                        if (isset($_SESSION['DocUplaodVert'])) {
                                        ?>
                                            <div class="alert alert-success" role="alert">
                                                <?= $_SESSION['DocUplaodVert']; ?>
                                            </div>
                                        <?php

                                        }
                                        if (isset($_SESSION['DocUplaodRouge'])) {
                                        ?>
                                            <div class="alert alert-danger" role="alert">
                                                <?= $_SESSION['DocUplaodRouge']; ?>
                                            </div>
                                        <?php
                                        }

                                        unset($_SESSION['DocUplaodVert']);
                                        unset($_SESSION['DocUplaodRouge']);
                                        ?>

                                        <br>
                                        <h1>Importer un fichier </h1>
                                        <br>


                                        <!--requete Theme mots cle-->
                                        <?php
                                        $req = PDORequest::GetAllThemes();
                                        $THeme = $req->fetchAll();

                                        $req = PDORequest::GetAllMotsCleV();
                                        $MC = $req->fetchAll();
                                        ?>

                                        <!--Formulaire pour l'upload-->
                                        <form method="POST" action="/routeur/Req_Uplaod.php" enctype="multipart/form-data">

                                            <!--Nom du doc-->
                                            <div class="mb-3">
                                                <label for="formGroupExampleInput" class="form-label">Nom de votre document</label>
                                                <input type="text" class="form-control" name="DocName" placeholder="" required>
                                            </div>

                                            <div class="row">
                                                <div class="col">
                                                    <!--theme du doc-->
                                                    <label for="exampleFormControlSelect1">Sélectionner un thème</label>
                                                    <select class="form-control" name="theme">
                                                        <option value="<?php echo 0; ?>"></option>
                                                        <?php for ($i = 0; $i < count($THeme); $i++) { ?>
                                                            <option value="<?php echo $THeme[$i]["IdTheme"] ?>"> <?php echo $THeme[$i]["NomTheme"]; ?></option>

                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="col">
                                                    <!--Mots clés 1, 2, 3 du doc-->
                                                    <label for="exampleFormControlSelect1">Sélectionner des Mots clés</label>
                                                    <select class="form-control" name="MotsCle1">
                                                        <option value="<?php echo 0; ?>"></option>
                                                        <?php
                                                        for ($i = 0; $i < count($MC); $i++) {
                                                        ?>
                                                            <option value="<?php echo $MC[$i]["IdMC"] ?>"><?php echo $MC[$i]["NomMC"] ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select><br>
                                                    <select class="form-control" name="MotsCle2">
                                                        <option value="<?php echo 0; ?>"></option>
                                                        <?php
                                                        for ($i = 0; $i < count($MC); $i++) {
                                                        ?>
                                                            <option value="<?php echo $MC[$i]["IdMC"] ?>"><?php echo $MC[$i]["NomMC"] ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select><br>
                                                    <select class="form-control" name="MotsCle3">
                                                        <option value="<?php echo 0; ?>"></option>
                                                        <!--<option>. . .</option>-->
                                                        <?php
                                                        for ($i = 0; $i < count($MC); $i++) {
                                                        ?>
                                                            <option value="<?php echo $MC[$i]["IdMC"] ?>"><?php echo $MC[$i]["NomMC"] ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>


                                                <div class="input-group mb-3">
                                                    <div class="col">
                                                        <br>
                                                        <!--Description du doc-->
                                                        <label for="formGroupExampleInput" class="form-label">Description</label>
                                                        <textarea class="form-control " name="DocDescription" rows="4" placeholder="" maxlength="150" required></textarea>

                                                        <!--Document-->
                                                        <br>
                                                        <label for="formGroupExampleInput" class="form-label">Document à importer</label>
                                                        <div class="input-group">
                                                            <input type="file" class="form-control" aria-label="file example" name="monfichier2" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <br><br>
                                                            <input class="btn btn-outline-primary" type="submit" name="chargement" value="Téléverser">
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            </from>

                                    </div>
                                </header>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer -->
            <?php include('./view/components/footer.html') ?>
        </div>
    </div>


    <!-- Bootstrap core JavaScript-->
    <script src="./assets/vendor/jquery/jquery.min.js"></script>
    <script src="./assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="./assets/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="./assets/js/sb-admin-2.min.js"></script>
    <script src="./assets/js/sidebar.js"></script>
</body>

</html>