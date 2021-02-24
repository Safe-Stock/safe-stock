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
                <h1 class="h3 mb-4 text-gray-800">Gestion Mots clé </h1>

            </div>

            <div class="container-fluid">
                <table class="table table-bordered col-md-5">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Date Validation</th>
                        <th scope="col">Modifier</th>
                        <th scope="col">Supprimer</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        $req = PDORequest::GetAllMotsCle();
                        while($MotCleReq = $req->fetch())
                        {
                            echo "<tr>";
                            echo "<th scope=\"row\">" . $MotCleReq['IdMC'] . "</th>"; $iMotCle = $MotCleReq['IdMC'];
                            echo "<td>" . $MotCleReq['NomMC'] . "</td>";
                            echo "<td>" . $MotCleReq['ValidationMC'] . "</td>";
                            echo "<td><a"; echo " <a class='btn btn-outline-warning' href=\"./view/AdminGestion/MotsCleRequete.php?vari=$iMotCle\">Modifier";
                            echo "<td><a"; echo " <a class='btn btn-outline-danger' href=\"./view/AdminGestion/MotsCleRequete.php?vari=$iMotCle\">Supprimer";
                            echo "</tr>";
                        }
                    ?>

                    </tbody>
                </table>
            </div>

            <div class="container-fluid">
                <form action="04-Store_Theme.php" method="post">
                    <div class="form-group col-md-3">
                        <label for="exampleInputEmail1">Crée un nouveau mot clé</label>
                        <input type="text" class="form-control" id="NewMotCle" aria-describedby="NewMotCleHelp">
                    </div>
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </form>
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