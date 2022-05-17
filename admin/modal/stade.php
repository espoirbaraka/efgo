<!-- Add -->
<div class="modal fade" id="addstade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Ajouter un stade</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="operation/add_stade.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="stade" class="col-sm-3 control-label">Stade</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="stade" name="stade" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="localisation" class="col-sm-3 control-label">Localisation</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="localisation" name="localisation" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Fermer</button>
              <button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Enregistrer</button>
              </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit -->
<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Modifier le stade</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="operation/update_stade.php">
                <input type="hidden" class="stade" name="id">
                <div class="form-group">
                    <label for="edit_stade" class="col-sm-3 control-label">Stade</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_stade" name="stade">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_localisation" class="col-sm-3 control-label">Localisation</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_localisation" name="localisation">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Fermer</button>
              <button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Modifier</button>
              </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Suppression...</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="operation/delete_stade.php">
                <input type="hidden" class="stade" name="id">
                <div class="text-center">
                    <p>SUPPRIMER LE STADE</p>
                    <h2 class="bold fullname"></h2>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Fermer</button>
              <button type="submit" class="btn btn-danger btn-flat" name="delete"><i class="fa fa-trash"></i> Supprimer</button>
              </form>
            </div>
        </div>
    </div>
</div>




     