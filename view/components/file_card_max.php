<button class="bg-white pl-4 pr-2 py-4 my-2 mx-2 border rounded shadow-sm" data-toggle="modal" data-target="#modal-<?php echo $doc['IdDoc'] ?>">
  <div style="width: 570px !important;" class="d-flex flex-row pl-2 pr-5 ">
    <div class="bg-gray-100 rounded d-flex justify-content-center align-items-center mr-3 px-2">
      <img width="100px" src="./assets/icon/svg/<?php echo $doc['TypeDoc'] ?>.svg">
    </div>
    <div class="ml-1">
      <h4 class="font-weight-bold text-gray-900 m-0 p-0 text-left"><?php echo $doc['NomDoc'] ?></h4>
      <p class="text-gray-800 mt-1 "><?php echo UITools::ResizeText($doc['DescriptionDoc'], 100) ?></p>
      <p class="text-gray-500 mt-4 p-0 text-left"><small><?php echo UITools::GetTimeAgo($doc['DateImportationDoc']) ?></small></p>
    </div>
  </div>
</button>

<!-- Modal Fichier -->

<div class="modal fade" id="modal-<?php echo $doc['IdDoc'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl" role="document">

    <div class="modal-content">
      <div class="modal-header">
        <img width="35px" src="./assets/icon/svg/<?php echo $doc['TypeDoc'] ?>.svg">
        <h5 class="mx-4 modal-title" id="exampleModalLongTitle"><?php echo $doc['NomDoc'] ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-8">
            <p class="m-2"><strong>Taille : </strong><?php echo UITools::ConvertBytes(filesize("./data/doc/" . $doc['IdDoc'] . "." . $doc['TypeDoc'])) ?></p>
            <p class="m-2"><strong>Date de l'importation : </strong><?php echo UITools::ConvertDate($doc['ValidationDoc']) ?></p>
            <p class="m-2"><strong>Date de validation : </strong> <?php echo UITools::ConvertDate($doc['DateImportationDoc']) ?> </p>
            <p class="m-2"><strong>Type : </strong>.<?php echo $doc['TypeDoc'] ?></p>
            <p class="m-2"><strong>Description : </strong><?php echo $doc['DescriptionDoc'] ?></p>
            <br>
          </div>


          <?php
          $ReqTheme = PDORequest::GetOneTheme($doc['IdTheme']);
          $Theme = $ReqTheme->fetch();
          if ($Theme == NULL) {
            $Theme = "Aucun";
          } else {
            $Theme = $Theme["NomTheme"];
          }

          $req2 = PDORequest::GetNameMc1($doc['IdDoc']);
          $NameMc1 = $req2->fetch();
          $req3 = PDORequest::GetNameMc2($doc['IdDoc']);
          $NameMc2 = $req3->fetch();
          $req4 = PDORequest::GetNameMc3($doc['IdDoc']);
          $NameMc3 = $req4->fetch();
          ?>

          <!-- 1er affichage des mots clé responsive mais j’aime moins-->
          <!--<div class="container">
            <div class="row">
              <div class="col-6 col-sm-2">
                <p><strong>Thème : </strong></p>
              </div>
              <div class="col-6 col-sm-4"><?php echo $Theme ?></div>
              <div class="w-100 d-none d-md-block"></div>
              <div class="col-6 col-sm-2"><strong>Mots clés : </strong></div>
              <div class="col-6 col-sm-4"><?= $NameMc1['NomMC'] ?>
                <br>
                <?= $NameMc2['NomMC'] ?>
                <br>
                <?= $NameMc3['NomMC'] ?>
              </div>
            </div>
          </div>-->

          <!-- 2eme pas full responsive mais bien mieux sur pc-->
          <div class="col-md-2 ms-auto">
            <p class="m-2"><strong>Thème : </strong></p>
            <p class="m-2"><strong>Mots clés : </strong></p>
          </div>

          <div class="col-md-2 ms-auto">
            <p class="m-2"><?php echo $Theme ?></p>
            <p class="m-2"><?= $NameMc1['NomMC'] ?></p>
            <p class="m-2"><?= $NameMc2['NomMC'] ?></p>
            <p class="m-2"><?= $NameMc3['NomMC'] ?></p>
          </div>

        </div>
        <?php if ($doc['TypeDoc'] == "pdf") { ?>
          <div class="row">
            <iframe class="m-3" width="1200" height="600" src="./data/doc/<?php echo $doc['IdDoc'] ?>.<?php echo $doc['TypeDoc'] ?>" style=" width: 98%;"></iframe>
          </div>
        <?php } ?>
      </div>
      <div class="modal-footer"> <?php
          if ($user['IdProfil'] == 1) { ?>
          <button type="button" class="btn btn-google" data-dismiss="modal" data-toggle="modal" data-target="#modalUpdate-<?php echo $doc['IdDoc'] ?>">Modifier</button>
        <?php  } ?>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Retour</button>
         <a type="button" class="btn btn-primary" href="./data/doc/<?php echo $doc['IdDoc'] ?>.<?php echo $doc['TypeDoc'] ?>" download>Télécharger</a>
      </div>
    </div>
  </div>
</div>

<!-- Modal Modification Fichier si admin-->

<div class="modal fade" id="modalUpdate-<?php echo $doc['IdDoc'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <form action="./routeur/Req_Document.php?VarUpdateDocVH=<?= $doc['IdDoc'] ?>" method="post">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modifier le document</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="card card-body">
          <div class="modal-body">
            <label>Nom</label>
            <input type="text" class="form-control" value="<?= $doc['NomDoc'] ?>" name="VarUpdateNameDocV" required="required">
          </div>
          <div class="modal-body">
            <label>Description</label>
            <input type="text" class="form-control" value="<?= $doc['DescriptionDoc'] ?>" name="VarUpdateDescDocV" required="required">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
          <button type="submit" class="btn btn-primary">Confirmer</button>
        </div>
      </div>
    </div>
  </form>
</div>