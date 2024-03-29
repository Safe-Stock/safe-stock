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
        <?php include('./view/components/sidebar.php') ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <!-- Topbar -->
                <?php include('./view/components/navigation.php') ?>
                <div class="container-fluid">
                    <!-- Contenu de la page-->
                    <?php
                    if(isset($_SESSION['NouveauMdpFalse']))    //Alerte si fichier selectionner n'est pas un SCV
                    { ?>
                    <div class="alert alert-danger" role="alert"> Les deux nouveaux mot de passe sont différent
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                    </div> <?php
                         unset($_SESSION['NouveauMdpFalse']);
                    }

                    if(isset($_SESSION['MdpModifSuccess']))    //Alerte si fichier selectionner n'est pas un SCV
                    { ?>
                        <div class="alert alert-success" role="alert"> Votre mot de passe à été modifié avec succès
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                        </div> <?php
                        unset($_SESSION['MdpModifSuccess']);
                    }

                    if(isset($_SESSION['ActuelMdpFalse']))    //Alerte si fichier selectionner n'est pas un SCV
                    { ?>
                    <div class="alert alert-danger" role="alert"> Mauvais mot de passe actuel
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                    </div> <?php
                         unset($_SESSION['ActuelMdpFalse']);
                    } ?>

                    <div>
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="profile-card-4 z-depth-3">
                                        <div class="card">
                                            <div class="card-body text-center bg-primary rounded-top">
                                                <div class="user-box">
                                                    <img width="310px" style="max-height: 310px;" src="./data/avatar/<?= $user['AvatarUtil'] ?>" class="rounded">
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
                                                            <h5 class="mt-4 mb-3"><span class="fa fa-clock-o ion-clock float-right"></span> Activité </h5>
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
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <!--/row-->
                                                </div>


                                                <div class="tab-pane" id="edit">
                                                    <?php if (isset($_SESSION['error']) && !empty($_SESSION['error'])) { ?>
                                                        <div class="alert alert-danger" role="alert">
                                                            <?= $_SESSION['error'] ?>
                                                        </div>
                                                    <?php unset($_SESSION['error']);
                                                    } ?>
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
                                                            <label class="col-lg-3 col-form-label form-control-label">Image de Profil</label>
                                                            <div class="col-lg-9">
                                                                <input name="avatar" class="form-control-file" type="file">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-lg-3 col-form-label form-control-label">Mot de passe</label>
                                                            <div class="col-lg-9">
                                                                <input name="password" class="form-control" type="password" placeholder="Entrez votre mot de passe pour valider les changements">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row mt-5">
                                                            <div class="col-lg-9">
                                                                <input type="reset" class="btn btn-secondary" value="Annuler">
                                                                <a class="btn btn-secondary" data-toggle="modal" data-target="#UpdateMdpProfil">Modifier MDP</a>
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
                    </div>
                </div>

                <div class="modal fade" id="UpdateMdpProfil" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <form action="./routeur/Req_Utilisateur.php?UpdateMdpProfilId=<?=$user['IdUtil'] ?>" method="post">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modifier le mot de passe</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <label>Mot de passe Actuel</label>
                                    <input type="password" class="form-control" name="UpdateMdpProfilPassword" required="required">
                                </div>
                                <div class="modal-body">
                                    <label>Nouveau Mot De Passe</label>
                                    <input type="password" class="form-control" name="VarModifyMdpProfil" required="required">
                                </div>
                                <div class="modal-body">
                                    <label>Confirmation Nouveau Mot de passe</label>
                                    <input type="password" class="form-control" name="VarModifyMdpconfProfil" required="required">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                    <button type="submit" class="btn btn-primary">Confirmer</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Footer -->
                <div class="mt-5">
                <?php include('./view/components/footer.html') ?>
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
        <script src="./assets/js/sidebar.js"></script>
</body>

</html>