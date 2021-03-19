<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>FilesFranck - Importer</title>
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
            <div id="content">
                <!-- Topbar -->
                <?php include('./view/components/navigation.html') ?>
                <div class="container-fluid">
                    <!-- Contenu de la page-->


       

      





<?php

                var_dump($_FILES);
            
                if($_FILES['monfichier']['error'] == 0){
                    ?> <pre><?php print_r($_POST) ?> </pre> <?php
                    
                    //test taille
                    if($_FILES['monfichier']['size'] > 3200000){
                        $error = "Votre fichier est trop lourd.";
                    }
                    
                    // test extension
                    /*
                    $extension = strrchr($_FILES['monfichier']['name'],'.');
                    if($extension !=  '.docx'){
                        $error = "Votre fichier n'est pas conforme.";
                    }*/
            
                    // au final :
                    if(!isset($error)){
                        move_uploaded_file($_FILES['monfichier']['tmp_name'], './data/'.$_FILES['monfichier']['name']);
                        echo "le fichier est chargé";
                    }
            
                }
                else
                {
                    $error = "problème formulaire";
                }?>
            <?php
   $message="";
   if(isset($_POST["valider"])){
      if(!preg_match("#jpeg|png#",$_FILES["monfichier"]["type"]))
         $message='<span class="nook">Format invalide!</span>';
      elseif($_FILES["monfichier"]["size"]>2000000)
         $message='<span class="nook">Taille trop grande!</span>';
      else{
         $message='Nom du fichier :<b>'.
            $_FILES["monfichier"]["name"].
            '</b><br />';?><br><br><?php
         $message.='Nom temporaire du fichier :<b>'.
            $_FILES["monfichier"]["tmp_name"].
            '</b><br />';?><br><br><?php
         $message.='Type du fichier :<b>'.
            $_FILES["monfichier"]["type"].
            '</b><br />';?><br><br><?php
         $message.='Taille du fichier :<b>'.
            $_FILES["monfichier"]["size"].
            ' octets</b><br />';?><br><br><?php
         if(move_uploaded_file($_FILES["monfichier"]["tmp_name"],"uploads/".$_FILES["monfichier"]["name"]))
            $message.='<span class="ok">Image chargée avec succès</span>';
            echo $message;
      }
   }
?>
            



    <div class="frame">
        <div class="center">
            <div class="title">
                <h1>Choisissez le fichier à téléverser</h1>
            </div>
                <div style="color:red"><p><?php if(isset($error)) echo $error; ?></p></div>
                    <form method="POST" action="" enctype="multipart/form-data">                
                    <div class="dropzone">
                <img src="http://100dayscss.com/codepen/upload.svg" class="upload-icon" />
                <input type="file" class="upload-input" name="monfichier"/>
            </div>
                    <div class="form-group">
                        <input class="btn2" type= "submit" name="chargement" value="Téléverser">

                    </form>
                    </div>        
        </div>
    </div>




    </div> 



</div>
                    

            </div>
            </div>
           
            <?php include('./view/components/footer.html') ?> 
        </div>                   
 
   

    <!-- Bootstrap core JavaScript-->
    <script src="./assets/vendor/jquery/jquery.min.js"></script>
    <script src="./assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="./assets/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="./assets/js/sb-admin-2.min.js"></script>








    <style>
        .frame {
            position: absolute; /* postulat de départ */
            top: 50%; left: 50%; /* à 50%/50% du parent référent */
            transform: translate(-11%, -25%);
            width: 800px;
            height: 650px;
            margin-top: -150px;
            margin-left: -200px;
            border-radius: 15px;
            box-shadow: 10px 12px 16px 0 rgba(0, 0, 0, 0.1);
            overflow: hidden;
            background: linear-gradient(to top right, darkmagenta 0%, hotpink 100%);
            color: #333;
            font-family: "Open Sans", Helvetica, sans-serif;
        }
        
        .center {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 500px;
            height: 600px;
            border-radius: 10px;
            box-shadow: 8px 10px 15px 0 rgba(0, 0, 0, 0.2);
            background: #fff;
            display: flex;
            align-items: center;
            justify-content: space-evenly;
            flex-direction: column;
        }
        
        .title {
            width: 100%;
            height: 50px;
            border-bottom: 1px solid #999;
            text-align: center;
        }
        
        h1 {
            position: absolute; /* postulat de départ */
            top: 10%; left: 25%; /* à 50%/50% du parent référent */
            transform: translate(-11%, -25%);
            font-size: 20px;
            font-weight: 300;
            color: #666;
        }
        
        .dropzone {
            width: 200px;
            height: 100px;
            border: 2px dashed #999;
            border-radius: 10px;
            text-align: center;
        }
        
        .upload-icon {
            margin: 25px 2px 2px 2px;
        }
        
        .upload-input {
            position: relative;
            top: -62px;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
        }
        
        .btn2 {
            display: block;
            width: 140px;
            height: 40px;
            background: darkmagenta;
            color: #fff;
            border-radius: 3px;
            border: 0;
            box-shadow: 0 3px 0 0 hotpink;
            transition: all 0.3s ease-in-out;
            font-size: 14px;
        }
        
        .btn:hover {
            background: rebeccapurple;
            box-shadow: 0 3px 0 0 deeppink;
        }
        </style>

</body>
</html>





