<!-- Add -->
<div class="modal fade" id="addequipe">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Ajouter une equipe</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="operation/add_equipe.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="equipe" class="col-sm-3 control-label">Equipe</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="equipe" name="equipe" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="siege" class="col-sm-3 control-label">Siege</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="siege" name="siege" required>
                    </div>
                </div>
               
                <div class="form-group">
                    <label for="photo" class="col-sm-3 control-label">Logo</label>

                    <div class="col-sm-9">
                      <input type="file" id="photo" name="photo">
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
              <h4 class="modal-title"><b>Modifier l'équipe</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="operation/update_equipe.php">
                <input type="hidden" class="equipe" name="id">
                <div class="form-group">
                    <label for="edit_equipe" class="col-sm-3 control-label">Equipe</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_equipe" name="edit_equipe">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_siege" class="col-sm-3 control-label">Siege</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_siege" name="edit_siege">
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
              <form class="form-horizontal" method="POST" action="operation/delete_equipe.php">
                <input type="hidden" class="equipe" name="id">
                <div class="text-center">
                    <p>SUPPRIMER L'EQUIPE</p>
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

<!-- Update Photo -->
<div class="modal fade" id="modifier_photo">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b><span class="fullname"></span></b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="operation/update_logo_equipe.php" enctype="multipart/form-data">
                <input type="hidden" class="equipe" name="id">
                <div class="form-group">
                    <label for="photo" class="col-sm-3 control-label">Logo</label>

                    <div class="col-sm-9">
                      <input type="file" id="photo" name="photo" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Fermer</button>
              <button type="submit" class="btn btn-success btn-flat" name="upload"><i class="fa fa-check-square-o"></i> Modifier</button>
              </form>
            </div>
        </div>
    </div>
</div> 




     