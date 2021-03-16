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
<!-- Modal -->
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
          <p class = "m-2"><strong>Taille :  </strong><?php echo UITools::ConvertBytes(filesize("./data/doc/" . $doc['NomDoc'] . "." . $doc['TypeDoc'])) ?></p>
          <p class = "m-2"><strong>Date de l'importation :  </strong><?php echo UITools::ConvertDate($doc['ValidationDoc']) ?></p>
          <p class = "m-2"><strong>Date de Validation :  </strong> <?php echo UITools::ConvertDate($doc['DateImportationDoc']) ?> </p>
          <p class = "m-2"><strong>Type :  </strong>.<?php echo $doc['TypeDoc'] ?></p>
          <p class = "m-2"><strong>Description :   </strong><?php echo $doc['DescriptionDoc'] ?></p>
          <?php if($doc['TypeDoc'] == "pdf") { ?>
            <div class="row">  
              <iframe class = "m-3" width="1200" height="600" src="./data/doc/<?php echo $doc['NomDoc'] ?>.<?php echo $doc['TypeDoc'] ?>" style=" width: 98%;"></iframe>
            </div>
          <?php } ?>
        </div>
          <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Retour</button>
          <button type="button" class="btn btn-primary">Télécharger</button>
        </div>
      </div>
    </div>
  </div>