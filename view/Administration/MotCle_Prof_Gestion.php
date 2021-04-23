<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>FilesFranck - Validation Mots Clé</title>
    <!-- Custom fonts for this template-->
    <link href="./assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="./assets/css/sb-admin-2.min.css" rel="stylesheet">

    <style>
        .my-custom-scrollbarXB {
            position: relative;
            height: 500px;
            overflow: auto;
        }
    </style> <!-- Ca marche pas dans le ptn de css c'est pour ca je l'ai mit la  !-->

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

            <!-- Gestion SESSION avec alerte -->

            <?php
            if (isset($_SESSION['McAlreadyExistV']))    //Alerte si MotCle create existe Deja
            { ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    Le mot cle que vous voulez ajouter existe deja !
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div> <?php
                unset($_SESSION['McAlreadyExistV']);
            }

            if (isset($_SESSION['McAlreadyExistNV']))    //Alerte si MotCle deja en attente de validation
            { ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    Ce mot cle est deja en attente de validation !
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div> <?php
                unset($_SESSION['McAlreadyExistNV']);
            } ?>

            <div class="row">

                <!-- Mot Cle Valider -->

                <div class="col">
                    <div class="container-fluid">
                        <div class="mb-4"></div>
                        <h2 class="h4 mb-4 text-gray-800">Mots-clés validés</h2>
                        <div class="table-wrapper-scroll-y my-custom-scrollbarXB">
                            <table class="table table-bordered mb-0 col-md-12">
                                <thead style="color:white; background-color:#993366;">
                                <tr>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Date Validation</th>
                                </tr>
                                </thead>
                                <tbody> <?php
                                $MC_Valid_vide =  FALSE;
                                $req1 = PDORequest::GetAllMotsCleV();
                                while($MotCleReq1 = $req1->fetch())
                                {
                                    $MC_Valid_vide =  TRUE;?>
                                    <tr>
                                        <td><?= $MotCleReq1['NomMC']?></td>
                                        <td><?= $MotCleReq1['ValidationMC']?></td>
                                    </tr> <?php
                                }
                                if ($MC_Valid_vide == FALSE)
                                { ?>
                                    <td></td>
                                    <td>Il n'y a aucun mot-clé</td>
                                    <td></td> <?php
                                } ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="mb-4"></div>
                        <a class="btn btn-outline-success" data-toggle="modal" data-target="#CreateMC">Créer un mot-clé</a>
                    </div>
                </div>

                <!--Affichage de tout les mots clé Non valider-->

                <div class="col">
                    <div class="container-fluid">
                        <div class="mb-4"></div>
                        <h2 class="h4 mb-4 text-gray-800">Mots-clés non validés</h2>
                        <div class="table-wrapper-scroll-y my-custom-scrollbarXB">
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
                                        </div> <?php

                                    }
                                    if ($MC_Valid_vide == FALSE)
                                    { ?>
                                        <td></td>
                                        <td>Il n'y a aucun mot-clé à valider</td>
                                        <td></td> <?php
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Crée un Mot Clé -->

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