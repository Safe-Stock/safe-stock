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
                                                <img src="./data/avatar/<?= $user['AvatarUtil'] ?>" class="rounded">
                                            </div>
                                            <br>
                                            <h5 class=" mb-1 text-white">DUPONT Didier</h5>
                                            <h6 class="text-light">Eleve</h6>
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
                                                                <tr>
                                                                    <td>
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
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <!--/row-->
                                            </div>


                                            <div class="tab-pane" id="edit">
                                                <?php if(isset($_SESSION['error']) && !empty($_SESSION['error'])) { ?>
                                                    <div class="alert alert-danger" role="alert">
                                                        <?= $_SESSION['error'] ?>
                                                    </div>
                                               <?php unset($_SESSION['error']); } ?>
                                                <form action="./routeur/updateProfil.php" method="POST" enctype="multipart/form-data">
                                                    <div class="form-group row">
                                                        <label class="col-lg-3 col-form-label form-control-label">Nom</label>
                                                        <div class="col-lg-9">
                                                            <input class="form-control" type="text" value="<?= $user['NomUtil'] ?>" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-3 col-form-label form-control-label">Prénom</label>
                                                        <div class="col-lg-9">
                                                            <input class="form-control" type="text" value="<?= $user['PrenomUtil'] ?>" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-3 col-form-label form-control-label">Email</label>
                                                        <div class="col-lg-9">
                                                            <input class="form-control" type="email" placeholder="email@exemple.com" value="<?= $user['MailUtil'] ?>" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-3 col-form-label form-control-label">Image de Profil</label>
                                                        <div class="col-lg-9">
                                                            <input name="avatar" class="form-control-file" type="file">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-3 col-form-label form-control-label">Mot de passe</label>
                                                        <div class="col-lg-9">
                                                            <input class="form-control" name="password" type="password" placeholder="Entrez votre mot de passe pour valider les changements">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-3 col-form-label form-control-label"></label>
                                                        <div class="col-lg-9">
                                                            <input type="reset" class="btn btn-secondary" value="Annuler">
                                                            <input type="submit" class="btn btn-primary" value="Enregistrer">
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