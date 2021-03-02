<button type="button" class="bg-white border rounded shadow-sm py-3 mx-4 my-2" data-toggle="modal" data-target="#modal-<?php echo $doc['IdDoc'] ?>">
    <div style="width: 150px !important;" class="d-flex flex-column justify-content-center align-items-center">
        <img width="100px" src="./assets/icon/svg/<?php echo $doc['TypeDoc'] ?>.svg">
        <p class="text-center mb-0 mt-3"><?php echo $doc['NomDoc'] ?></p>
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
          <p class = "m-2"><strong>Taille :  </strong><?php echo UITools::ConvertBytes(filesize("./data/" . $doc['NomDoc'] . "." . $doc['TypeDoc'])) ?></p>
          <p class = "m-2"><strong>Date de l'importation :  </strong><?php echo UITools::ConvertDate($doc['DateImportationDoc']) ?></p>
          <p class = "m-2"><strong>Date de Validation :  </strong> <?php echo UITools::ConvertDate($doc['ValidationDoc']) ?> </p>
          <p class = "m-2"><strong>Type :  </strong>.<?php echo $doc['TypeDoc'] ?></p>
          <p class = "m-2"><strong>Description :   </strong><?php echo $doc['DescriptionDoc'] ?></p>
          <?php if($doc['TypeDoc'] == "pdf") { ?>
            <div class="row"> 
              <iframe class = "m-3" width="1200" height="600" src="./data/<?php echo $doc['NomDoc'] ?>.<?php echo $doc['TypeDoc'] ?>" style=" width: 98%;"></iframe>
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