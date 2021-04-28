<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>FilesFranck - Gestion - Document</title>
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

                    <!-- Gestion des Documents -->

                    <div class="container-fluid">
                        <h1 class="h3 mb-4 text-gray-800">Gestion des documents</h1>
                    </div>

                    <!--Gestion de l'épsace de stockage -->

                    <?php
                    $df_c = disk_free_space("/");  //Espace Libre
                    $ds = disk_total_space("/");   //Taille total du disque
                    $ValueStock = $ds - $df_c;              //Calcule espace utiliser
                    $RateStock = 1 - ($df_c / $ds);         //Calcule % d'espace disk1
                    $RateLvl = $RateStock * 100;            //Calcule % de la barre a afficher
                    ?>

                    <div class="container-fluid">
                        <!--<h2 class="h4 mb-4 text-gray-800">Gestion espace disque</h2>-->
                        <div class="progress"> <?php
                            if ($RateStock <= 0.4)
                            {?>
                                <div class="progress-bar bg-success" role="progressbar" style="width: <?=$RateLvl?>%;" aria-valuemin="0" aria-valuemax="100"><?=UITools::ConvertBytes($ValueStock)?> / <?=UITools::ConvertBytes($ds)?></div> <?php
                            }
                            elseif ($RateStock > 0.4 && $RateStock <= 0.8)
                            {?>
                                <div class="progress-bar bg-warning" role="progressbar" style="width: <?=$RateLvl?>%;" aria-valuemin="0" aria-valuemax="100"><?=UITools::ConvertBytes($ValueStock)?> / <?=UITools::ConvertBytes($ds)?></div> <?php
                            }
                            elseif ($RateStock > 0.8)
                            {?>
                                <div class="progress-bar bg-danger" role="progressbar" style="width: <?=$RateLvl?>%;" aria-valuemin="0" aria-valuemax="100"><?=UITools::ConvertBytes($ValueStock)?> / <?=UITools::ConvertBytes($ds)?></div> <?php
                            }?>
                        </div>
                            <p></p>
                            <p class="text-center">Il vous reste <?=UITools::ConvertBytes($df_c)?> d'espace libre</p>
                    </div>

                        <!-- Gestion des Documents Valider -->

                        <div class="container-fluid">

                            <h2 class="h4 mb-4 text-gray-800">Documents validés</h2>
                            <div class="table-wrapper-scroll-y my-custom-scrollbarB">
                                <table class="table table-bordered mb-0 col-md-12">
                                    <thead style="color:white; background-color:#993366;">
                                    <tr>
                                        <th scope="col">Nom</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Theme</th>
                                        <th scope="col">Date Importation</th>
                                        <th scope="col">Date Validation</th>
                                        <th scope="col">Taille</th>
                                        <th scope="col">Type</th>
                                        <th scope="col">Mots-clés</th>
                                        <th scope="col">Informations</th>
                                        <th scope="col">Supprimer</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $req = PDORequest::GetAllDocumentsV();
                                    while($DocumentVReq = $req->fetch())
                                    { ?>
                                        <tr>
                                            <td><?= $DocumentVReq['NomDoc'] ?></td>
                                            <td><?= $DocumentVReq['DescriptionDoc'] ?></td><?php
                                            $NameTheme = PDORequest::GetNameTheme($DocumentVReq['IdDoc']);
                                            $NameTheme = $NameTheme->fetch();
                                            ?>
                                            <td><?= $NameTheme['NomTheme'] ?></td>
                                            <td><?= $DocumentVReq['DateImportationDoc'] ?></td>
                                            <td><?= $DocumentVReq['ValidationDoc'] ?></td>
                                            <td><?= $DocumentVReq['TailleDoc'] ?></td>
                                            <td><?= $DocumentVReq['TypeDoc'] ?></td>
                                            <td><a class="btn btn-outline-success" data-toggle="modal" data-target="#key-document-<?= $DocumentVReq['IdDoc'] ?>">Modifier</a></td>
                                            <td><a class="btn btn-outline-warning" data-toggle="modal" data-target="#UpdateDocV-<?= $DocumentVReq['IdDoc'] ?>">Modifier</a></td>
                                            <td><a class="btn btn-outline-danger" data-toggle="modal" data-target="#DeleteDocV-<?= $DocumentVReq['IdDoc'] ?>">Supprimer</a></td>
                                        </tr>

                                        <!-- Modal Confirmation Suppression Document -->

                                        <div class="modal fade" id="DeleteDocV-<?= $DocumentVReq['IdDoc'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <form action="./routeur/Req_Document.php?VarDeleteDoc=<?= $DocumentVReq['IdDoc'] ?>" method="post">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Supprimer un Document</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <label>Voulez-vous vraiment supprimer le document <?=$DocumentVReq['NomDoc']?> ?</label>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                                            <button type="submit" class="btn btn-primary">Confirmer</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                          <!-- Modal mots-clés document -->
                                          <div class="modal fade" id="key-document-<?= $DocumentVReq['IdDoc'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Gestion des mots-clés du document <?= $DocumentVReq['NomDoc'] ?></h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <?php $req2 = PDORequest::GetMotCleFromDoc($DocumentVReq['IdDoc']); ?>
                                                           <div>
                                                                <p>Mot-clé assigné à ce document :</p>
                                                                <ul>
                                                                    <?php while($keyword = $req2->fetch()) { ?>
                                                                        <li><?= $keyword['NomMC'] ?></li>
                                                                    <?php } ?>
                                                                </ul>
                                                           </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                                            <a class="btn btn-outline-success" data-toggle="modal" data-dismiss="modal"  data-target="#add-key-document-<?= $DocumentVReq['IdDoc'] ?>">Ajouter un mot-clé</a>
                                                            <a class="btn btn-outline-danger" data-toggle="modal" data-dismiss="modal"  data-target="#delete-key-document-<?= $DocumentVReq['IdDoc'] ?>">Supprimer un mot-clé</a>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>

                                         <!-- Modal Ajouter mots-clés document -->
                                         <div class="modal fade" id="add-key-document-<?= $DocumentVReq['IdDoc'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <form action="./routeur/Req_Document.php?VarAddKeyword=<?= $DocumentVReq['IdDoc'] ?>" method="post">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Ajout d'un mots-clés au document <?= $DocumentVReq['NomDoc'] ?></h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form>
                                                        <div class="modal-body">
                                                            <?php $req3 = PDORequest::GetAllMotsCleV() ?>
                                                            <label>Mots-clés :</label>
                                                            <select name="IdKeyword">
                                                                <?php while($keyword = $req3->fetch()) { ?>
                                                                    <option value="<?= $keyword['IdMC'] ?>"><?= $keyword['NomMC'] ?></option>
                                                               <?php }?>
                                                            </select>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                                            <button type="submit" class="btn btn-outline-success">Ajouter</button>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                         <!-- Modal Supprimer mots-clés document -->
                                         <div class="modal fade" id="delete-key-document-<?= $DocumentVReq['IdDoc'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <form action="./routeur/Req_Document.php?VarDeleteKeyword=<?= $DocumentVReq['IdDoc'] ?>" method="post">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Suppression d'un mots-clés au document <?= $DocumentVReq['NomDoc'] ?></h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form>
                                                        <div class="modal-body">
                                                            <?php $req4 = PDORequest::GetMotCleFromDoc($DocumentVReq['IdDoc']); ?>
                                                            <label>Mots-clés :</label>
                                                            <select name="IdKeyword">
                                                                <?php while($keyword = $req4->fetch()) { ?>
                                                                    <option value="<?= $keyword['IdMC'] ?>"><?= $keyword['NomMC'] ?></option>
                                                               <?php }?>
                                                            </select>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                                            <button type="submit" class="btn btn-outline-danger">Supprimer</button>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        
                                            <!--Modal Modifier un doc deja valider -->

                                        <div class="modal fade" id="UpdateDocV-<?=$DocumentVReq['IdDoc'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <form action="./routeur/Req_Document.php?VarUpdateDocV=<?=$DocumentVReq['IdDoc'] ?>" method="post">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Modifier le document</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <label>Nom</label>
                                                            <input type="text" class="form-control" value="<?=$DocumentVReq['NomDoc']?>" name="VarUpdateNameDocV" required="required">
                                                        </div>
                                                        <div class="modal-body">
                                                            <label>Description</label>
                                                            <input type="text" class="form-control" value="<?=$DocumentVReq['DescriptionDoc']?>" name="VarUpdateDescDocV" required="required">
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

                    <!-- Gestion des Documents non valider -->

                    <div class="container-fluid">
                        <h1 class="h3 mb-4 text-gray-800"></h1>
                    </div>

                    <div class="container-fluid">
                        <h2 class="h4 mb-4 text-gray-800">Documents non validés</h2>
                        <div class="table-wrapper-scroll-y my-custom-scrollbarB">
                            <table class="table table-bordered mb-0 col-md-12">
                                <thead style="color:white; background-color:#993366;">
                                <tr>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Theme</th>
                                    <th scope="col">Date Importation</th>
                                    <th scope="col">Taille</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Valider</th>
                                    <th scope="col">Refuser</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $Doc_NValid_vide =  FALSE;
                                $reqNv = PDORequest::GetAllDocumentsNV();
                                while($DocumentNvReq = $reqNv->fetch())
                                {
                                    $Doc_NValid_vide =  TRUE;?>
                                    <tr>
                                        <td><?= $DocumentNvReq['NomDoc'] ?></td>
                                        <td><?= $DocumentNvReq['DescriptionDoc'] ?></td> <?php
                                        $NameThemeNV = PDORequest::GetNameTheme($DocumentNvReq['IdTheme']);
                                        $NameThemeNV = $NameThemeNV->fetch();
                                        ?>
                                        <td><?= $NameThemeNV['NomTheme'] ?></td>
                                        <td><?= $DocumentNvReq['DateImportationDoc'] ?></td>
                                        <td><?= $DocumentNvReq['TailleDoc'] ?></td>
                                        <td><?= $DocumentNvReq['TypeDoc'] ?></td>
                                        <td><a class="btn btn-outline-success" data-toggle="modal" data-target="#ValideDocNv-<?= $DocumentNvReq['IdDoc'] ?>">Valider</a></td>
                                        <td><a class="btn btn-outline-danger" data-toggle="modal" data-target="#RefuseDocNv-<?= $DocumentNvReq['IdDoc'] ?>">Refuser</a></td>
                                    </tr>

                                    <!-- Modal Confirmation Suppression Document -->

                                    <div class="modal fade" id="RefuseDocNv-<?= $DocumentNvReq['IdDoc'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <form action="./routeur/Req_Document.php?VarDeleteDoc=<?= $DocumentNvReq['IdDoc'] ?>" method="post">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Refuser un Document</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <label>Voulez-vous vraiment refuser le document <?=$DocumentNvReq['NomDoc']?> ?</label>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                                        <button type="submit" class="btn btn-primary">Confirmer</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                    <!-- Génération Modal pour Valider un doc-->

                                    <div class="modal fade" id="ValideDocNv-<?=$DocumentNvReq['IdDoc'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <form action="./routeur/Req_Document.php?VarValideDoc=<?=$DocumentNvReq['IdDoc']?>" method="post">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Valider un Document</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <label>Vous allez valider le document <?=$DocumentNvReq['NomDoc']?></label>
                                                    </div>

                                                    <!--Formulaire déroulant pour modifier les infos du doc -->

                                                        <div class="col">
                                                            <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                                modifier
                                                            </a>
                                                        </div>
                                                    <p></p>
                                                    <div class="collapse" id="collapseExample">
                                                        <div class="card card-body">
                                                            <div class="modal-body">
                                                                <label>Nom</label>
                                                                <input type="text" class="form-control" value="<?=$DocumentNvReq['NomDoc']?>" name="VarUpdateNameDocNv" required="required">
                                                            </div>
                                                            <div class="modal-body">
                                                                <label>Description</label>
                                                                <input type="text" class="form-control" value="<?=$DocumentNvReq['DescriptionDoc']?>" name="VarUpdateDescDocNv" required="required">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!--Fin du formulaire déroulant pour modification doc -->

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
                                if ($Doc_NValid_vide == FALSE)
                                    {?>
                                <td></td>
                                <td>Il n'y a aucun document à valider</td>
                                <td></td><td></td><td></td><td></td><td></td> <?php
                                } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer -->
        <?php include('./view/components/footer.html') ?>
    </div>


<!-- Bootstrap core JavaScript-->
<script src="./assets/vendor/jquery/jquery.min.js"></script>
<script src="./assets/jQuery/add_keywords.js"></script>
<script src="./assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Core plugin JavaScript-->
<script src="./assets/vendor/jquery-easing/jquery.easing.min.js"></script>
<!-- Custom scripts for all pages-->
<script src="./assets/js/sb-admin-2.min.js"></script>
<script src="./assets/js/sidebar.js"></script>
</body>

</html>