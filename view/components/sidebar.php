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
                    <a class="collapse-item" href= "index.php?admin=gestionmct">Gestion themes/mots-clés</a>
                    <a class="collapse-item" href= "index.php?admin=gestionuser">Gestion Utilisateur</a>
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
                    <a class="collapse-item" href= "index.php?prof=gestionmc">Verification mots-clés</a>
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

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
           aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Components</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Components:</h6>
                <a class="collapse-item" href="buttons.html">Buttons</a>
                <a class="collapse-item" href="cards.html">Cards</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Utilities</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Utilities:</h6>

                <a class="collapse-item" href="utilities-color.html">Colors</a>
                <a class="collapse-item" href="utilities-border.html">Borders</a>
                <a class="collapse-item" href="utilities-animation.html">Animations</a>
                <a class="collapse-item" href="utilities-other.html">Other</a>
            </div>
        </div>
    </li> -->





    <!-- Nav Item - Pages Collapse Menu -->
    <!-- <li class="nav-item active">
         <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
             aria-controls="collapsePages">
             <i class="fas fa-fw fa-folder"></i>
             <span>Pages</span>
         </a>
         <div id="collapsePages" class="collapse show" aria-labelledby="headingPages"
             data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <h6 class="collapse-header">Login Screens:</h6>
                 <a class="collapse-item" href="login.html">Login</a>
                 <a class="collapse-item" href="register.html">Register</a>
                 <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                 <div class="collapse-divider"></div>
                 <h6 class="collapse-header">Other Pages:</h6>
                 <a class="collapse-item" href="404.html">404 Page</a>
                 <a class="collapse-item " href="index.php?route=blank1">Blank Page</a>
                 <a class="collapse-item " href="index.php?route=test">Page Test</a>
             </div>
         </div>
     </li>-->

    <!-- Nav Item - Charts -->
    <!-- <li class="nav-item">
         <a class="nav-link" href="charts.html">
             <i class="fas fa-fw fa-chart-area"></i>
             <span>Charts</span></a>
     </li> -->

    <!-- Nav Item - Tables -->
    <!-- <li class="nav-item">
        <a class="nav-link" href="tables.html">
            <i class="fas fa-fw fa-table"></i>
            <span>Tables</span></a>
    </li> -->

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
           aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-folder"></i>
            <span>Themes</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
             data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <?php
                $req = PDORequest::GetAllThemes();
                while($themes = $req->fetch()) { ?>
                    <a class="collapse-item" href= "index.php?route=theme&id=<?php echo $themes['IdTheme'] ?>"><?php echo $themes['NomTheme'] ?></a>
                <?php } ?>
            </div>
        </div>
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
