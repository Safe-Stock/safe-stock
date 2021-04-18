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
    <?php include('./view/components/sidebar.php') ?>
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Topbar -->
        <?php include('./view/components/navigation.php') ?>

        <div id="content" class="container">
            <div class="row">
                <div class="col">

                    <!-- Gestion des Mots Clé -->

                    <div class="container-fluid">
                        <!-- Contenu de la colone gauche-->
                        <h1 class="h3 mb-4 text-gray-800">Gestion des mots-clés</h1>
                    </div>

                    <?php
                    if ($user['IdProfil'] == 1)
                    { ?>
                        <!--Affichage de tout les mots clé valider-->

                        <div class="container-fluid">
                            <h2 class="h4 mb-4 text-gray-800">Mots-clés validés</h2>
                            <div class="table-wrapper-scroll-y my-custom-scrollbarB">
                                <table class="table table-bordered mb-0 col-md-12">
                                    <thead style="color:white; background-color:#993366;">
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
                                                                <label>Voulez-vous vraiment supprimer le mot-clé <?=$MotCleReq['NomMC']?> ?</label>
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
                            <div class="mb-4"></div>
                            <a class="btn btn-outline-success" data-toggle="modal" data-target="#CreateMC">Créer un mot-clé</a>
                        </div> <?php
                    } ?>

                    <div class="modal fade" id="CreateMC" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <form action="./routeur/Req_MotCle_Theme.php" method="post">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Créer un mot-clé</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <label>Nom du mot-clé</label>
                                        <input type="text" class="form-control" name="VarCreateMC" required="required">
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
                    if ($user['IdProfil'] == 1 || $user['IdProfil'] == 2)
                    { ?>
                        <!--Affichage de tout les mots clé Non valider-->

                        <div class="container-fluid">
                            <div class="mb-4"></div>
                            <h2 class="h4 mb-4 text-gray-800">Mots-clés non validés</h2> <?php
                            if ($user['IdProfil'] == 2) //Si prof alors tableau grand
                            {
                                echo '<div class="table-wrapper-scroll-y my-custom-scrollbarB">';
                            }
                            elseif ($user['IdProfil'] == 1) //Si Admin alors petit tableau
                            {
                                echo '<div class="table-wrapper-scroll-y my-custom-scrollbarL">';
                            }
                            ?>
                                <table class="table table-bordered mb-0 col-md-12">
                                    <thead style="color:white; background-color:#993366;">
                                    <tr>
                                        <th scope="col">Nom</th>
                                        <th scope="col">Valider</th>
                                        <th scope="col">Refuser</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $MC_Valid_vide =  FALSE;
                                    $req2 = PDORequest::GetAllMotsCleNonV();
                                    while($MotCleReq2 = $req2->fetch())
                                    {
                                        $MC_Valid_vide =  TRUE;?>
                                        <tr>
                                            <td><?= $MotCleReq2['NomMC'] ?></td>
                                            <td><a class="btn btn-outline-success" data-toggle="modal" data-target="#ValideMC-<?= $MotCleReq2['IdMC'] ?>">Valider</a></td>
                                            <td><a class="btn btn-outline-danger" data-toggle="modal" data-target="#RefuserMC-<?= $MotCleReq2['IdMC'] ?>">Refuser</a></td>
                                        </tr>

                                        <!-- Génération Modal pour Valider un mot clé-->

                                        <div class="modal fade" id="ValideMC-<?=$MotCleReq2['IdMC'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <form action="./routeur/Req_MotCle_Theme.php?VarValideMC=<?=$MotCleReq2['IdMC']?>" method="post">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Valider le mot-clé</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <label>Voulez-vous vraiment valider le mot-clé <?=$MotCleReq2['NomMC']?></label>
                                                        </div>
                                                        <input type="hidden" name="TypeProfil" value="<?=$user['IdProfil']?>">
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                                            <button type="submit" class="btn btn-primary">Confirmer</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                        <!-- Génération Modal pour Refuser un mot clé-->

                                        <div class="modal fade" id="RefuserMC-<?=$MotCleReq2['IdMC'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <form action="./routeur/Req_MotCle_Theme.php?VarRefuserMC=<?=$MotCleReq2['IdMC']?>" method="post">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Valider le mot-clé</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <label>Voulez-vous vraiment refuser le mot-clé <?=$MotCleReq2['NomMC']?></label>
                                                        </div>
                                                        <input type="hidden" name="TypeProfil" value="<?=$user['IdProfil']?>">
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                                            <button type="submit" class="btn btn-primary">Confirmer</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                        <?php
                                    }
                                    if ($MC_Valid_vide == FALSE)
                                    {?>
                                        <td></td>
                                        <td>Il n'y a aucun mot-clé à valider</td>
                                        <td></td> <?php
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div> <?php
                    } ?>
                </div>


                <?php
                if ($user['IdProfil'] == 1)
                { ?>
                    <!--Gestion des Thèmes -->

                    <div class="col">
                        <div class="container-fluid">
                            <!-- Contenu de la colone droite-->
                            <h1 class="h3 mb-4 text-gray-800">Gestion des thèmes</h1>
                        </div>

                        <div class="container-fluid">
                            <h2 class="h4 mb-4 text-gray-800">Thèmes utilisés</h2>
                            <div class="table-wrapper-scroll-y my-custom-scrollbarB">
                                <table class="table table-bordered mb-0 col-md-12">
                                    <thead style="color:white; background-color:#993366;">
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
                                                            <label>Voulez-vous vraiment supprimer le thème <?=$ThemeReq['NomTheme']?> ?</label>
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

                            <!--Formulaire pour la création Thème-->

                            <div class="mb-4"></div>
                            <a class="btn btn-outline-success" data-toggle="modal" data-target="#CreateTheme">Créer un Thème</a>

                            <div class="modal fade" id="CreateTheme" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <form action="./routeur/Req_MotCle_Theme.php" method="post">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Créer un Thème</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <label>Nom du Thème</label>
                                                <input type="text" class="form-control" name="VarCreateTheme" required="required">
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
                    </div> <?php
                } ?>
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
<script src="./assets/js/sidebar.js"></script>
</body>

</html>