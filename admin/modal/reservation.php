<!-- payer -->
<div class="modal fade" id="payer">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Payement de la reservation</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="operation/add_payement.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="montant" class="col-sm-3 control-label">Montant</label>
                    <input type="hidden" name="id" class="reservation">
                    <div class="col-sm-9">
                    <input type="number" name="montant" class="form-control">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Fermer</button>
              <button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Payer</button>
              </form>
            </div>
        </div>
    </div>
</div>
 


