<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>FilesFranck - Report</title>
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

        <!-- Topbar -->
        <?php include('./view/components/navigation.html') ?>

        <div id="content" class="container">
            <div class="row">
                <div class="col">

                    <form>
                        <h1 class="h3 mb-4 text-gray-800">Signaler un problème</h1>
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label for="exampleFormControlSelect1">Type de problème</label>
                                    <select class="form-control" id="exampleFormControlSelect1">
                                        <option>Oublie mot de passe</option>
                                        <option>Bug sur FilesRanks</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlSelect1">Navigateur Utiliser</label>
                                    <select class="form-control" id="exampleFormControlSelect1">
                                        <option>Google Chrome</option>
                                        <option>Mozilla Firefox</option>
                                        <option>Microsoft Edge</option>
                                        <option>Internet Explorer</option>
                                        <option>Opera</option>
                                        <option>Safari</option>
                                        <option>Brave</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Titre </label>
                            <input type="text" class="form-control" id="TitreReport">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Description</label>
                            <textarea class="form-control" id="DescReport" rows="10"></textarea>
                        </div>
                        <h5 class="h3 mb-4 text-gray-800"></h5>
                        <div class="form-group">
                            <input type="submit" value="Report" name="SubmitReport" class="btn btn-primary">
                        </div>
                        <h5 class="h3 mb-4 text-gray-800"></h5>
                    </form>

                </div>
            </div>
    </div>
        <!-- Footer -->
        <?php include('./view/components/footer.html') ?>
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