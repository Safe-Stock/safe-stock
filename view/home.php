<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/egg.js/1.0/egg.min.js"></script>
    <title>FilesFrank</title>
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
                    <h1 class="h1 mb-4 text-gray-800">Accueil</h1>
                    <h2 class="h4 mb-4 text-gray-500">Fichiers récents</h2>

                    <div class="d-flex flex-row flex-wrap">
                        <?php
                        $req = PDORequest::GetLatestDocuments();
                        while ($doc = $req->fetch()) {
                            include('./view/components/file_card_max.php');
                        }
                        ?>
                    </div>
                    <h2 class="h4 mb-4 text-gray-500 mt-4">Tout les fichiers</h2>
                    <div class="d-flex flex-row flex-wrap mb-5 mt-2">
                        <?php
                        $req = PDORequest::GetAllDocumentsV();
                        while ($doc = $req->fetch()) {
                            include('./view/components/file_card_min.php');
                        }
                        ?>
                    </div>
                </div>
                <!-- up,up,down,down,left,right,left,right,b,a  -->
                <img id="egggif" width="500px" src="./assets/img/dog.gif" />
            </div>
            <!-- Footer -->
            <?php include('./view/components/footer.html') ?>
        </div>
    </div>


    <!-- Bootstrap core JavaScript-->
    <script src="./assets/vendor/jquery/jquery.min.js"></script>
    <script src="./assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="./assets/js/egg.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="./assets/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="./assets/js/sb-admin-2.min.js"></script>

    <style>
        #egggif {
            position: absolute;
            top: 50%;
            left: 50%;
            margin-right: -50%;
            transform: translate(-50%, -50%);
            display: none;
        }
    </style>

<script src="./assets/js/sidebar.js"></script>

</body>

</html>