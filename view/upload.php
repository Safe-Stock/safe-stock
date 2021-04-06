<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>FilesFranck - Importer des documents</title>
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
                    <!-- Contenu de la page -->



                    <?php
                    if (isset($_POST) && !empty($_POST)) 
                    {

//variable du doc
$DocName = $_FILES['monfichier2']['name'];
$DocSize = $_FILES['monfichier2']['size'];
$DocEx = pathinfo($DocName, PATHINFO_EXTENSION);
$DocTheme = $_POST['theme'];
$DocMc1 = $_POST['MotsCle1'];
$DocMc2 = $_POST['MotsCle2'];
$DocMc3 = $_POST['MotsCle3'];
$DocDescription = $_POST['DocDescription'];
$DateN = $today = date("Y-m-d"); 


//Affichage info du doc
echo $DocName;
?> <br> <?php
echo $DocSize;
?> <br> <?php
echo $DocEx;
?> <br> <?php
echo $DocTheme;
?> <br> <?php
echo $DocMc1;
?> <br> <?php
echo $DocMc2;
?> <br> <?php
echo $DocMc3;
?> <br> <?php
echo $DocDescription;
?> <br> <?php
echo $today;



//affichage des $_FILES
var_dump($_FILES);


                        if ($_FILES['monfichier2']['error'] == 0) 
                        {
                        ?>
                            <pre>
                                <?php 
                                    print_r($_POST)
                                    
                                ?> 

                            </pre>


                            <?php





                            //test taille
                                if ($_FILES['monfichier2']['size'] > 3200000) 
                                {
                                    $error = "Votre fichier est trop lourd.";
                                }


                                // test extension
                                /*
                                $extension = strrchr($_FILES['monfichier']['name'],'.');
                                if($extension !=  '.docx')
                                {
                                    $error = "Votre fichier n'est pas conforme.";
                                }*/


                                // Apres verification :
                                    if (!isset($error)) 
                                    {
                                        move_uploaded_file($_FILES['monfichier2']['tmp_name'], './data/doc/' . $_FILES['monfichier2']['name']);
                                        echo "le fichier est chargé";

                                        /*if (isset($_POST['VarCreateNomEleve']) && isset($_POST['VarCreatePrenomEleve']) && isset($_POST['VarCreateIdentifiantEleve']) && isset($_POST['VarCreateMdpEleve']))
                                        {*/
                                            
                                            
                                        /*}*/

                                        
                                    }
                        } 
                        else 
                        {
                            $error = "problème formulaire";
                        }
                        $bdd = new PDO('mysql:host=localhost;dbname=filesranks;charset=utf8', 'root','');
                            $req = $bdd->prepare("INSERT INTO document VALUES(NULL, :NomDoc, :TypeDoc, :DescriptionDoc, :DateN, NULL, :TailleDoc ,NULL ,NULL )");
                            $req->execute(array('NomDoc' => $DocName, 'TypeDoc' => $DocEx, 'DescriptionDoc' => $DocDescription, 'DateN' => $today, 'TailleDoc' => $DocSize));
                            var_dump($req);          
                    }
                    ?>

                    <body class="text-center">
                        <div class="form-group">
                            <div class="col-10  d-flex h-100 p-5 mx-auto flex-column ">
                                <header class="masthead mb-auto">
                                    <div class="inner">


                                    <h1>Choisissez le fichier à téléverser</h1>
                                    <br>
                                    <?php
                                    $req = PDORequest::GetAllThemes();
                                    while ($THeme = $req->fetchAll()) 
                                    {
                                    ?>
                                    </div>
                                    <div style="color:red">
                                        <p><?php if (isset($error)) echo $error; ?></p>
                                    </div>
                                    <form method="POST" action="" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col">
                                                <label for="exampleFormControlSelect1">Sélectionner un thème</label>
                                                <select class="form-control" name="theme">
                                                    <option>. . .</option>
                                                    <?php
                                                    for ($i = 0; $i < count($THeme); $i++) { ?>
                                                        <option><?php echo $THeme[$i]["NomTheme"] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>

                                            <?php
                                            $req = PDORequest::GetAllMotsCleV();
                                            while ($MC = $req->fetchAll()) {
                                            ?>

                                                <div class="col">
                                                    <label for="exampleFormControlSelect1">Sélectionner des Mots clées</label>
                                                    <select class="form-control" name="MotsCle1">
                                                        <?php
                                                        ?><option>. . .</option><?php
                                                                                    for ($i = 0; $i < count($MC); $i++) {
                                                                                    ?>
                                                            <option><?php echo $MC[$i]["NomMC"] ?></option>
                                                        <?php
                                                                                    }
                                                        ?>
                                                    </select>
                                                    <br>
                                                    <select class="form-control" name="MotsCle2">
                                                        <option>. . .</option>
                                                        <?php
                                                        for ($i = 0; $i < count($MC); $i++) {
                                                        ?>
                                                            <option><?php echo $MC[$i]["NomMC"] ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                    <br>
                                                    <select class="form-control" name="MotsCle3">
                                                        <option>. . .</option>
                                                        <?php
                                                        for ($i = 0; $i < count($MC); $i++) {
                                                        ?>
                                                            <option><?php echo $MC[$i]["NomMC"] ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                            <?php
                                            }
                                        }
                                            ?>
                                </div>
                                <div class="input-group mb-3">
                                
                                <div class="col">
                                    <label for="exampleFormControlTextarea1"></label>
                                    <br>                             
                                    <textarea class="form-control" name="DocDescription" rows="4">Description</textarea>
                                    <br>
                                    

                                    </div>
                                    <!--<div class="custom-file">
                                            <div>
                                                <input type="file" class="custom-file-input" id="validatedCustomFile" required>
                                                <label class="custom-file-label" for="validatedCustomFile">Choisir le fichier à téléverser</label>
                                            <div class="invalid-feedback">Votre fichier seras mis dans une fille d’attend le temps qu’un administrateur vérifie son contenu</div>
                                        </div>
                                    </div>-->

                                    </div>
                                    <div class="input-group mb-3">
                                
                                <div class="col">
                                    <div class="mb-3">
                                        <input type="file" class="upload-input form-control" aria-label="file example" name="monfichier2">
                                </div>
                                <div class="dropzone">
                                    
                                    <br>
                                </div>

                                <div class="form-group">
                                    <br>
                                    <br>
                                        <input class="btn btn-outline-primary" type="submit" name="chargement" value="Téléverser">
                                    </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    <?php include('./view/components/footer.html') ?>
    </div>
    <script src="./assets/js/sidebar.js"></script>
</body>

</html>