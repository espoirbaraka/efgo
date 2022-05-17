<!-- Encaisser -->
<div class="modal fade" id="encaisser">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Encaisser un montant a partir de cette commande</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="operation/encaisser.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nom" class="col-sm-3 control-label">Montant</label>
                    <input type="hidden" class="commande" name="id">
                    <div class="col-sm-9">
                      <input type="number" class="form-control" id="montant" name="montant" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="nom" class="col-sm-3 control-label">Motif</label>
                    <div class="col-sm-9">
                      <textarea class="form-control" name="motif" id="" cols="30" rows="2"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Fermer</button>
              <button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Encaisser</button>
              </form>
            </div>
        </div>
    </div>
</div>

