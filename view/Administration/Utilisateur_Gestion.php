<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>FilesFranck - Gestion - Utilisateur</title>
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
                    <?php
                    if (isset($_SESSION['MdpNonIdentique']))
                    { ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            Les deux mot de passe rentrer doivent etre <strong>Identique !</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div> <?php
                        unset($_SESSION['MdpNonIdentique']);
                    }
                     ?>
                     <?php if(isset($_SESSION['error'])){ ?>
                        <div class="alert alert-danger" role="alert">
                            <?= $_SESSION['error'] ?>
                        </div>
                    <?php } ?>
                    <!-- Gestion des Utilisateurs -->

                    <div class="container-fluid">
                        <h1 class="h3 mb-4 text-gray-800">Gestion Utilisateurs</h1>
                    </div>
                        <!-- Gestion des élèves -->

                        <div class="container-fluid">
                            <h2 class="h4 mb-4 text-gray-800">Elèves</h2>
                            <div class="table-wrapper-scroll-y my-custom-scrollbarB">
                                <table class="table table-bordered mb-0 col-md-12">
                                    <thead style="color:white; background-color:#993366;">
                                    <tr>
                                        <th scope="col">Nom</th>
                                        <th scope="col">Prenom</th>
                                        <th scope="col">Identifiant</th>
                                        <th scope="col">Information</th>
                                        <th scope="col">Mot de Passe</th>
                                        <th scope="col">Supprimer</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $req1 = PDORequest::GetAllUserEleve();
                                    while($UtilisateurReq1 = $req1->fetch())
                                    { ?>
                                        <tr>
                                            <td><?= $UtilisateurReq1['NomUtil'] ?></td>
                                            <td><?= $UtilisateurReq1['PrenomUtil'] ?></td>
                                            <td><?= $UtilisateurReq1['IdentifiantUtil'] ?></td>
                                            <td><a class="btn btn-outline-info" data-toggle="modal" data-target="#UpdateEleve-<?= $UtilisateurReq1['IdUtil'] ?>">Modifier</a></td>
                                            <td><a class="btn btn-outline-warning" data-toggle="modal" data-target="#UpdateMdpEleve-<?= $UtilisateurReq1['IdUtil'] ?>">Modifier</a></td>
                                            <td><a class="btn btn-outline-danger" data-toggle="modal" data-target="#DeleteEleve-<?= $UtilisateurReq1['IdUtil'] ?>">Supprimer</a></td>
                                        </tr>

                                        <!-- Génération Modal pour modifier un élève-->

                                        <div class="modal fade" id="UpdateEleve-<?=$UtilisateurReq1['IdUtil'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <form action="./routeur/Req_Utilisateur.php?VarModifyIdUtil=<?=$UtilisateurReq1['IdUtil'] ?>" method="post">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Modifier le professeur</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <label>Nom</label>
                                                            <input type="text" class="form-control" name="VarModifyNomUtil" value="<?=$UtilisateurReq1['NomUtil']?>" required="required">
                                                        </div>
                                                        <div class="modal-body">
                                                            <label>Prénom</label>
                                                            <input type="text" class="form-control" name="VarModifyPrenomUtil" value="<?=$UtilisateurReq1['PrenomUtil']?>" required="required">
                                                        </div>
                                                        <div class="modal-body">
                                                            <label>Identifiant</label>
                                                            <input type="text" class="form-control" name="VarModifyIdentifiantUtil" value="<?=$UtilisateurReq1['IdentifiantUtil']?>" required="required">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                                            <button type="submit" class="btn btn-primary">Confirmer</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                        <!-- Génération Modal pour modifier mot de passe d'un élève-->

                                        <div class="modal fade" id="UpdateMdpEleve-<?=$UtilisateurReq1['IdUtil'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <form action="./routeur/Req_Utilisateur.php?VarModifyIdUtil=<?=$UtilisateurReq1['IdUtil'] ?>" method="post">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Modifier le mot de passe</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <label>Mot de passe</label>
                                                            <input type="password" class="form-control" name="VarModifyMdpUtil" required="required">
                                                        </div>
                                                        <div class="modal-body">
                                                            <label>Confirmation Mot de passe</label>
                                                            <input type="password" class="form-control" name="VarModifyMdpconfUtil" required="required">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                                            <button type="submit" class="btn btn-primary">Confirmer</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                        <!-- Génération des modals confirmation suppresion élève -->

                                        <div class="modal fade" id="DeleteEleve-<?= $UtilisateurReq1['IdUtil'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <form action="./routeur/Req_Utilisateur.php?VarDeleteUtil=<?= $UtilisateurReq1['IdUtil'] ?>" method="post">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Supprimer l'élève ?</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <label>Voulez vous vraiment supprimer le l'élève <?=$UtilisateurReq1['NomUtil']?> ?</label>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                                            <button type="submit" class="btn btn-primary">Confirmer</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <?php
                                    } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!--Modale Formulaire pour la création d'un élève-->

                        <div class="mb-4"></div>
                        <div class="container-fluid">
                            <a class="btn btn-outline-success" data-toggle="modal" data-target="#CreateEleve">Crée un Elève</a>
                            <a class="btn btn-outline-success ml-" data-toggle="modal" data-target="#ListEleve">Ajouter liste d'élèves</a>
                            <div class="modal fade" id="CreateEleve" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <form action="./routeur/Req_Utilisateur.php" method="post">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Crée l'élève</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <label>Identifiant</label>
                                                <input type="text" class="form-control" name="VarCreateIdentifiantEleve" required="required">
                                            </div>
                                            <div class="modal-body">
                                                <label>Nom</label>
                                                <input type="text" class="form-control" name="VarCreateNomEleve" required="required">
                                            </div>
                                            <div class="modal-body">
                                                <label>Prénom</label>
                                                <input type="text" class="form-control" name="VarCreatePrenomEleve" required="required">
                                            </div>
                                            <div class="modal-body">
                                                <label>Mot de Passe</label>
                                                <input type="password" class="form-control" name="VarCreateMdpEleve" required="required">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                                <button type="submit" class="btn btn-primary">Confirmer</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="container-fluid">
                            <div class="modal fade" id="ListEleve" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <form action="./routeur/Req_Utilisateur.php" method="post" enctype="multipart/form-data">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Ajouter liste d'élèves</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <label>Importer fichier .csv</label>
                                                <input name="VarCsvFile" type="file" />
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                                <button name="VarCsvFileSubmit" type="submit" class="btn btn-primary">Confirmer</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    <!--Affichage de tout les professeurs-->

                    <div class="container-fluid">
                        <h1 class="h3 mb-4 text-gray-800"></h1>
                    </div>

                    <div class="container-fluid">
                        <h2 class="h4 mb-4 text-gray-800">Professeurs</h2>
                        <div class="table-wrapper-scroll-y my-custom-scrollbarB">
                            <table class="table table-bordered mb-0 col-md-12">
                                <thead style="color:white; background-color:#993366;">
                                <tr>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Prenom</th>
                                    <th scope="col">Identifiant</th>
                                    <th scope="col">Information</th>
                                    <th scope="col">Mot de passe</th>
                                    <th scope="col">Supprimer</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $req = PDORequest::GetAllUserProf();
                                while($UtilisateurReq = $req->fetch())
                                { ?>
                                    <tr>
                                        <td><?= $UtilisateurReq['NomUtil'] ?></td>
                                        <td><?= $UtilisateurReq['PrenomUtil'] ?></td>
                                        <td><?= $UtilisateurReq['IdentifiantUtil'] ?></td>
                                        <td><a class="btn btn-outline-info" data-toggle="modal" data-target="#UpdateProf-<?= $UtilisateurReq['IdUtil'] ?>">Modifier</a></td>
                                        <td><a class="btn btn-outline-warning" data-toggle="modal" data-target="#UpdateMdpProf-<?= $UtilisateurReq['IdUtil'] ?>">Modifier</a></td>
                                        <td><a class="btn btn-outline-danger" data-toggle="modal" data-target="#DeleteProf-<?= $UtilisateurReq['IdUtil'] ?>">Supprimer</a></td>
                                    </tr>

                                    <!-- Génération Modal pour modifier un prof-->

                                    <div class="modal fade" id="UpdateProf-<?=$UtilisateurReq['IdUtil'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <form action="./routeur/Req_Utilisateur.php?VarModifyIdUtil=<?=$UtilisateurReq['IdUtil'] ?>" method="post">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Modifier le professeur</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <label>Identifiant</label>
                                                        <input type="text" class="form-control" name="VarModifyIdentifiantUtil" value="<?=$UtilisateurReq['IdentifiantUtil']?>" required="required">
                                                    </div>
                                                    <div class="modal-body">
                                                        <label>Nom</label>
                                                        <input type="text" class="form-control" name="VarModifyNomUtil" value="<?=$UtilisateurReq['NomUtil']?>" required="required">
                                                    </div>
                                                    <div class="modal-body">
                                                        <label>Prénom</label>
                                                        <input type="text" class="form-control" name="VarModifyPrenomUtil" value="<?=$UtilisateurReq['PrenomUtil']?>" required="required">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                                        <button type="submit" class="btn btn-primary">Confirmer</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                    <!-- Génération Modal pour modifier mot de passe d'un Prof-->

                                    <div class="modal fade" id="UpdateMdpProf-<?=$UtilisateurReq['IdUtil'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <form action="./routeur/Req_Utilisateur.php?VarModifyIdUtil=<?=$UtilisateurReq['IdUtil'] ?>" method="post">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Modifier le mot de passe</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <label>Mot de passe</label>
                                                        <input type="password" class="form-control" name="VarModifyMdpUtil" required="required">
                                                    </div>
                                                    <div class="modal-body">
                                                        <label>Confirmation Mot de passe</label>
                                                        <input type="password" class="form-control" name="VarModifyMdpconfUtil" required="required">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                                        <button type="submit" class="btn btn-primary">Confirmer</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                    <!-- Génération des modals confirmation suppresion prof -->

                                    <div class="modal fade" id="DeleteProf-<?= $UtilisateurReq['IdUtil'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <form action="./routeur/Req_Utilisateur.php?VarDeleteUtil=<?= $UtilisateurReq['IdUtil'] ?>" method="post">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Supprimer le Professeur</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <label>Voulez vous vraiment supprimer le professeur <?=$UtilisateurReq['NomUtil']?> ?</label>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                                        <button type="submit" class="btn btn-primary">Confirmer</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <?php
                                } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!--Formulaire pour la création d'un professeur-->

                    <div class="mb-4"></div>
                    <div class="container-fluid">
                        <a class="btn btn-outline-success" data-toggle="modal" data-target="#CreateProf">Crée un Professeur</a>
                        <div class="modal fade" id="CreateProf" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <form action="./routeur/Req_Utilisateur.php" method="post">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Crée le professeur</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <label>Identifiant</label>
                                            <input type="text" class="form-control" name="VarCreateIdentifiantProf" placeholder="<?=$UtilisateurReq['IdentifiantUtil']?>" required="required">
                                        </div>
                                        <div class="modal-body">
                                            <label>Nom</label>
                                            <input type="text" class="form-control" name="VarCreateNomProf" placeholder="<?=$UtilisateurReq['NomUtil']?>" required="required">
                                        </div>
                                        <div class="modal-body">
                                            <label>Prénom</label>
                                            <input type="text" class="form-control" name="VarCreatePrenomProf" placeholder="<?=$UtilisateurReq['PrenomUtil']?>" required="required">
                                        </div>
                                        <div class="modal-body">
                                            <label>Mot de Passe</label>
                                            <input type="password" class="form-control" name="VarCreateMdpProf" placeholder="<?=$UtilisateurReq['PrenomUtil']?>" required="required">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                            <button type="submit" class="btn btn-primary">Confirmer</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
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

</body>

</html>