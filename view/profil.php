<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>FilesFranck - Profil</title>
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
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="profile-card-4 z-depth-3">
                                    <div class="card">
                                        <div class="card-body text-center bg-primary rounded-top">
                                            <div class="user-box">
                                                <div style="font-size: 24px; color: white;">
                                                    <i class="fa fa-user fa-10x" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                            <br>
                                            <?php
                                            $query = PDORequest::GetUserWithId($_SESSION['user']);
                                            while ($getUser = $query->fetch()) {
                                            ?>
                                                <h5 class=" mb-1 text-white"><?php echo  $getUser['NomUtil'] . ' ' . $getUser['PrenomUtil'] ?></h5>
                                                <h6 class="text-light"><?php echo $getUser['NomProfil'] ?></h6>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="card z-depth-3">
                                    <div class="card-body">
                                        <ul class="nav nav-pills nav-pills-primary nav-justified">
                                            <li class="nav-item">
                                                <a href="javascript:void();" data-target="#profile" data-toggle="pill" class="nav-link active show"><i class="icon-user"></i> <span class="hidden-xs">Profile</span></a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="javascript:void();" data-target="#edit" data-toggle="pill" class="nav-link"><i class="icon-note"></i> <span class="hidden-xs">Edit</span></a>
                                            </li>
                                        </ul>
                                        <div class="tab-content p-3">
                                            <div class="tab-pane active show" id="profile">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h5 class="mt-2 mb-3 m-5"><span class="fa fa-clock-o ion-clock float-right"></span> Activité </h5>
                                                        <table class="table table-hover table-striped">
                                                            <tbody>        
                                                                    <?php

                                                                    $query = PDORequest::GetLastDocByUser($_SESSION['user']);
                                                                    while ($getTheme = $query->fetch()) {
                                                                        
                                                                    ?>
                                                                    <tr>
                                                                        <td>
                                                                            <strong><?php echo $getTheme['NomDoc'] . '.' . $getTheme['TypeDoc'] ?></strong> a été crée dans <strong><?php echo $getTheme['NomTheme'] ?></strong>
                                                                        </td>
                                                                    </tr>    
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                   <!-- <td>
                                                                        <strong>Test.pdf</strong> a été crée dans <strong>`Theme 1`</strong>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <strong>Test.svg</strong> a été crée dans <strong>`Theme 1`</strong>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <strong>Img.jpg</strong> a été crée dans <strong>`Theme 2`</strong>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <strong>Tableau.csv</strong> a été crée dans <strong>`Theme 2`</strong>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <strong>Test.docx</strong> a été crée dans <strong>`Theme 1`</strong>
                                                                    </td>-->
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <!--/row-->
                                            </div>

                                            <div class="tab-pane" id="edit">
                                                <form>
                                                    <div class="form-group row">
                                                        <label class="col-lg-3 col-form-label form-control-label">Nom</label>
                                                        <div class="col-lg-9">
                                                            <input class="form-control" type="text" value="DUPONT">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-3 col-form-label form-control-label">Prénom</label>
                                                        <div class="col-lg-9">
                                                            <input class="form-control" type="text" value="Didier">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-3 col-form-label form-control-label">Email</label>
                                                        <div class="col-lg-9">
                                                            <input class="form-control" type="email" value="email@exemple.com">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-3 col-form-label form-control-label">Image de Profil</label>
                                                        <div class="col-lg-9">
                                                            <input class="form-control" type="file">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-3 col-form-label form-control-label">Nom d'utilisateur</label>
                                                        <div class="col-lg-9">
                                                            <input class="form-control" type="text" value="utilisateur1">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-3 col-form-label form-control-label">Mot de passe</label>
                                                        <div class="col-lg-9">
                                                            <input class="form-control" type="password" value="11111122333">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-3 col-form-label form-control-label">Confirmer mot de passe</label>
                                                        <div class="col-lg-9">
                                                            <input class="form-control" type="password" value="11111122333">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-3 col-form-label form-control-label"></label>
                                                        <div class="col-lg-9">
                                                            <input type="reset" class="btn btn-secondary" value="Annuler">
                                                            <input type="button" class="btn btn-primary" value="Enregistrer">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- Footer -->
                    <br>
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