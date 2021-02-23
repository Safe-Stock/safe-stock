<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>FilesFranck - Thêmes</title>
    <!-- Custom fonts for this template-->
    <link href="./assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
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
                    <h1 class="h1 mb-4 text-gray-800">Thème : <?php echo PDORequest::GetNameTheme($_GET['id'])->fetch()['NomTheme'] ?></h1>
                    <h2 class="h4 mb-4 text-gray-500">Fichiers récents</h2>

                    <div class="d-flex flex-row flex-wrap">
                        <?php 
                             if(count(PDORequest::GetLatestDocumentsByTheme($_GET['id'])->fetchAll()) >= 1) {
                                $req = PDORequest::GetLatestDocumentsByTheme($_GET['id']);
                                while($doc = $req->fetch()) {
                                    include('./view/components/file_card_max.html');
                                }
                            } else { ?>
                               <div class="h5"> <?php echo 'Aucun document pour ce thème =(' ?> </div>
                           <?php }  ?>
                     </div>
                     <h2 class="h4 mb-4 text-gray-500 mt-4">Tout les fichiers</h2>
                     <div class="d-flex flex-row flex-wrap mb-5 mt-2">
                         <?php
                         $req = PDORequest::GetDocumentsByTheme($_GET['id']);
                         while($doc = $req->fetch()) {
                             include('./view/components/file_card_min.html');
                         } 
                         ?>
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

</body>

</html>