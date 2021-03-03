<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>FilesFranck - Gestion - Mots Cle et Thème</title>
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

                    <!-- Gestion des Mots Clé -->

                    <div class="container-fluid">
                        <!-- Contenu de la colone gauche-->
                        <h1 class="h3 mb-4 text-gray-800">Gestion Mots clé</h1>
                    </div>

                    <!--Affichage de tout les mots clé valider-->

                    <div class="container-fluid">
                        <h2 class="h4 mb-4 text-gray-800">Mots clé valider</h2>
                        <table class="table table-bordered col-md-12">
                            <thead>
                                <tr>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Date Validation</th>
                                    <th scope="col">Modifier</th>
                                    <th scope="col">Supprimer</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $req = PDORequest::GetAllMotsCleV();
                                while($MotCleReq = $req->fetch())
                                { ?>
                                    <tr>
                                    <td><?= $MotCleReq['NomMC'] ?></td>
                                    <td><?=UITools::ConvertDate($MotCleReq['ValidationMC']) ?></td>
                                    <td><a class="btn btn-outline-warning" data-toggle="modal" data-target="#UpdateMC-<?= $MotCleReq['IdMC'] ?>">Modifier</a></td>
                                    <td><a class="btn btn-outline-danger" data-toggle="modal" data-target="#DeleteMC-<?= $MotCleReq['IdMC'] ?>">Supprimer</a></td>
                                    </tr>

                                    <!-- Génération Modal pour modifier un mot clé-->

                                    <div class="modal fade" id="UpdateMC-<?=$MotCleReq['IdMC'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <form action="./routeur/Req_MotCle_Theme.php?VarModifyId=<?=$MotCleReq['IdMC'] ?>" method="post">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Modifier le mot clé</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <label>Nom</label>
                                                        <input type="text" class="form-control" name="VarModifyName" placeholder="<?=$MotCleReq['NomMC']?>" required="required">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                                        <button type="submit" class="btn btn-primary">Confirmer</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                    <!-- Génération des modals confirmation suppresion mot clé -->

                                    <div class="modal fade" id="DeleteMC-<?= $MotCleReq['IdMC'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <form action="./routeur/Req_MotCle_Theme.php?VarDeleteId=<?= $MotCleReq['IdMC'] ?>" method="post">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Supprimer le mot clé</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <label>Voulez vous vraiment supprimer le mot clé <?=$MotCleReq['NomMC']?> ?</label>
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

                    <!--Affichage de tout les mots clé Non valider-->

                    <div class="container-fluid">
                        <h2 class="h4 mb-4 text-gray-800">Mots clé non valider</h2>
                        <table class="table table-bordered col-md-12">
                            <thead>
                            <tr>
                                <th scope="col">Nom</th>
                                <th scope="col">Valider</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $req2 = PDORequest::GetAllMotsCleNonV();
                            while($MotCleReq2 = $req2->fetch())
                            { ?>
                                <tr>
                                    <td><?= $MotCleReq2['NomMC'] ?></td>
                                    <td><a class="btn btn-outline-success" data-toggle="modal" data-target="#ValideMC-<?= $MotCleReq2['IdMC'] ?>">Valider</a></td>
                                </tr>

                                <!-- Génération Modal pour Valider un mot clé-->

                                <div class="modal fade" id="ValideMC-<?=$MotCleReq2['IdMC'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <form action="./routeur/Req_MotCle_Theme.php?VarValideMC=<?=$MotCleReq2['IdMC']?>" method="post">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Valider le mot clé</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <label>Voulez vous vraiment valider le mot clé <?=$MotCleReq2['NomMC']?></label>
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

                    <!--Formulaire pour la création Mot Clé-->

                    <div class="container-fluid">
                        <form action="./routeur/Req_MotCle_Theme.php" method="post">
                            <div class="form-group col-md-12">
                                <label for="exampleInputEmail1">Crée un nouveau mot clé</label>
                                <input type="text" class="form-control" name="NewMotCle" aria-describedby="NewMotCleHelp">
                            </div>
                            <button type="submit" class="btn btn-primary">Ajouter</button>
                        </form>
                    </div>
                </div>

                    <!--Gestion des Thèmes -->

                <div class="col">
                    <div class="container-fluid">
                        <!-- Contenu de la colone droite-->
                        <h1 class="h3 mb-4 text-gray-800">Gestion Thèmes</h1>
                    </div>

                    <div class="container-fluid">
                        <h2 class="h4 mb-4 text-gray-800">Thèmes utiliser</h2>
                        <table class="table table-bordered col-md-12">
                            <thead>
                            <tr>
                                <th scope="col">Nom</th>
                                <th scope="col">Modifier</th>
                                <th scope="col">Supprimer</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $req3 = PDORequest::GetAllThemes();
                            while($ThemeReq = $req3->fetch())
                            { ?>
                                <tr>
                                    <td><?= $ThemeReq['NomTheme'] ?></td>
                                    <td><a class="btn btn-outline-warning" data-toggle="modal" data-target="#UpdateTheme-<?= $ThemeReq['IdTheme'] ?>">Modifier</a></td>
                                    <td><a class="btn btn-outline-danger" data-toggle="modal" data-target="#DeleteTheme-<?= $ThemeReq['IdTheme'] ?>">Supprimer</a></td>
                                </tr>

                                <!-- Génération Modal pour modifier un Thème-->

                                <div class="modal fade" id="UpdateTheme-<?=$ThemeReq['IdTheme'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <form action="./routeur/Req_MotCle_Theme.php?VarModifyThemeId=<?=$ThemeReq['IdTheme'] ?>" method="post">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Modifier le Thème</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <label>Nom</label>
                                                    <input type="text" class="form-control" name="VarModifyThemeName" placeholder="<?=$ThemeReq['NomTheme']?>" required="required">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                                    <button type="submit" class="btn btn-primary">Confirmer</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <!-- Génération des modals confirmation suppresion Thème -->

                                <div class="modal fade" id="DeleteTheme-<?= $ThemeReq['IdTheme'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <form action="./routeur/Req_MotCle_Theme.php?VarDeleteThemeId=<?= $ThemeReq['IdTheme'] ?>" method="post">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Supprimer le Thème</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <label>Voulez vous vraiment supprimer le thème <?=$ThemeReq['NomTheme']?> ?</label>
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

                        <!--Formulaire pour la création Thème-->

                        <div class="container-fluid">
                            <form action="./routeur/Req_MotCle_Theme.php" method="post">
                                <div class="form-group col-md-12">
                                    <label for="exampleInputEmail1">Crée un nouveau thème</label>
                                    <input type="text" class="form-control" name="NewTheme" aria-describedby="NewMotCleHelp">
                                </div>
                                <button type="submit" class="btn btn-primary">Ajouter</button>
                            </form>
                        </div>
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