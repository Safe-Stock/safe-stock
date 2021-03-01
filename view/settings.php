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
                    <h1 class="h4 mb-3 b-5 text-gray-800">Paramètres</h1>
                    <br>
                    <div class="container">
                        <h5 class="mb-3 b-5 text-gray">Gestion de thèmes</h5>
                        <table class="table table-bordered m-3" style="width: 1000px;">
                            <thead style="background-color: 993366;">
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Nom du thème</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $req = PDORequest::GetAllThemes();
                                while ($fillthemes = $req->fetch()) {


                                    echo "<tr>";
                                    echo "<th scope=\"row\">" . $fillthemes['IdTheme'] . "</th>";
                                    $themequery = $fillthemes['IdTheme'];
                                    echo "<td>" . $fillthemes['NomTheme'] . "</td>";
                                    echo "<td><a";
                                    echo " <a class='btn btn-outline-warning' data-toggle=\"modal\" data-target=\"#UpdateTheme\">Modifier";
                                    echo " <a class='btn btn-outline-danger' href=\"./view/theme_queries.php?delete=$themequery\">Supprimer";
                                    echo "</tr>";
                                }
                                ?>

                                <!-- Modal pour créer un thème -->
                                <div class="container-fluid">
                                    <form action="./view/theme_queries.php" method="post">
                                        <div class="form-group col-md-3">
                                            <label for="exampleInputEmail1">Creer un thème</label>
                                            <input type="text" class="form-control" id="CreateTheme" name="create" aria-describedby="RequestCreateTheme">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Creer</button>
                                    </form>
                                </div>

                                <!-- Modal pour modifier un thème-->
                                <div class="modal fade" id="UpdateTheme" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <form action="./view/theme_queries.php" method="post">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Modifier le thème</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <input type="text" class="form-control" name="update_name">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                                    <button type="submit" class="btn btn-primary">Confirmer</button>
                                                </div>
                                    </form>
                                </div>
                    </div>
                </div>
            </div>
            <div class="panel-footer navbar-bottom">
                <!-- Footer -->
                <?php include('./view/components/footer.html') ?>
            </div>
            </tbody>
        </div>
    </div>


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