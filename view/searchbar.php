<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>FilesFranck - Blank</title>
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
                    <?php

                    if (isset($_POST['keyword']) && !empty($_POST['keyword'])) {
                    ?>
                        <h1 class="h1 mb-4 text-gray-800">Résultat de la recherche</h1>

                        <?php
                        $ValidDoc = FALSE;
                        $req = PDORequest::SearchBar($_POST['keyword']);

                        while ($doc = $req->fetch()) {
                            $ValidDoc = TRUE;
                            include('./view/components/file_card_min.php');
                        }
                        if ($doc != $req->fetch() || $ValidDoc = FALSE) { ?>
                            <h2 class="h1 mb-4 text-red">Pas de résultat</h1>

                        <?php
                        }
                    }
                        ?>
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

</body>

</html>