<ul class="navbar-nav bg-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="./index.php">

        <div class="img-fluid"><img width="100px" src="./assets/img/filesrank.png"></div>
        <div class="d-flex justify-content-start mt-4" style="justify-content:left"><div id="filesrank">FilesRANK</div></div>

    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->

    <!-- NavBar Admin -->
    <?php if($user['IdProfil'] == 1) { ?>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDashboard"
               aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Tableau de Bord</span>
            </a>
            <div id="collapseDashboard" class="collapse" aria-labelledby="headingUtilities"
                 data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href= "index.php?admin=gestionmct">Gestion thèmes/mots-clés</a>
                    <a class="collapse-item" href= "index.php?admin=gestionuser">Gestion Utilisateurs</a>
                    <a class="collapse-item" href= "index.php?admin=gestiondoc">Gestion Documents</a>
                    <a class="collapse-item" href= "index.php?route=upload">Ajouter un document</a>
                </div>
            </div>
        </li>
    <?php  }

    // NavBar Prof
    if ($user['IdProfil'] == 2)
    { ?>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDashboard"
               aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Tableau de Bord</span>
            </a>
            <div id="collapseDashboard" class="collapse" aria-labelledby="headingUtilities"
                 data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href= "index.php?prof=gestionmc">Validation mots-clés</a>
                    <a class="collapse-item" href= "index.php?route=upload">Proposer un document</a>
                </div>
            </div>
        </li> <?php
    }

    // NavBar Eleve
    if ($user['IdProfil'] == 3)
    { ?>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDashboard"
               aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Tableau de Bord</span>
            </a>
            <div id="collapseDashboard" class="collapse" aria-labelledby="headingUtilities"
                 data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href= "index.php?route=upload">Proposer un document</a>
                    <a class="collapse-item" href="" data-toggle="modal" data-target="#CreateMC">Proposer un mot-clé</a>
                </div>
            </div>
        </li> <?php
    }
    ?>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Mots Cle -->

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
           aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Mots Clés</span>
        </a> <?php
        //Si Nombre de mot cle > 8 Alors mettre une taille fix et un scroll
        if (count(PDORequest::GetAllMotsCleV()->fetchAll()) > 8)
        { ?>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded" style="position: relative;max-height: 350px;overflow-y: scroll">
                    <h6 class="collapse-header">Tout les Mots Clés</h6> <?php
                    $ReqGetAllMc = PDORequest::GetAllMotsCleV();
                    while ($ResultAllMc = $ReqGetAllMc->fetch())
                    { ?>
                        <a class="collapse-item" href="index.php?route=searchmc&mc=<?=$ResultAllMc['IdMC']?>"><?=$ResultAllMc['NomMC']?></a> <?php
                    } ?>
                </div>
            </div> <?php
        }
        else //Si nombre MC < 10 Alors afficher tt les mot cles normalement
        { ?>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Tout les Mots Clés</h6> <?php
                    $ReqGetAllMc = PDORequest::GetAllMotsCleV();
                    while ($ResultAllMc = $ReqGetAllMc->fetch())
                    { ?>
                        <a class="collapse-item" href="index.php?route=searchmc&mc=<?=$ResultAllMc['IdMC']?>"><?=$ResultAllMc['NomMC']?></a> <?php
                    } ?>
                </div>
            </div> <?php
        }
        ?>
    </li>

    <!-- Nav Item - Theme -->

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
           aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-folder"></i>
            <span>Thèmes</span>
        </a> <?php
        if (count(PDORequest::GetAllThemes()->fetchall()) > 8)
        { ?>
            <div id="collapseUtilities" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded" style="position: relative;max-height: 350px;overflow-y: scroll">
                    <h6 class="collapse-header">Tout les Thèmes</h6> <?php
                    $ReqGetAllTheme = PDORequest::GetAllThemes();
                    while ($ResultAllTheme = $ReqGetAllTheme->fetch())
                    { ?>
                        <a class="collapse-item" href="index.php?route=theme&id=<?=$ResultAllTheme['IdTheme']?>"><?=$ResultAllTheme['NomTheme']?></a> <?php
                    } ?>
                </div>
            </div> <?php
        }
        else
        { ?>
            <div id="collapseUtilities" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Tout les Thèmes</h6> <?php
                    $ReqGetAllTheme = PDORequest::GetAllThemes();
                    while ($ResultAllTheme = $ReqGetAllTheme->fetch())
                    { ?>
                        <a class="collapse-item" href="index.php?route=theme&id=<?=$ResultAllTheme['IdTheme']?>"><?=$ResultAllTheme['NomTheme']?></a> <?php
                    } ?>
                </div>
            </div> <?php
        }
        ?>
    </li>

    <!-- Modale Proposer un mot cle pour eleve -->

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

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
