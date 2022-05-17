<?php
//include('../admin/includes/conn.php');

$conn = $pdo->open();

$stmt = $conn->prepare("SELECT * FROM t_categorie");
$stmt->execute();
		
$pdo->close();
?>
<!-- Add -->
<div class="modal fade" id="reserver">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Reservation de place</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="operation/add_reservation.php">
                <div class="form-group">
                    <input type="hidden" class="match" name="id">
                    <label for="categorie" class="col-sm-3 control-label">Categorie</label>
                    <div class="col-sm-9">
                      <select name="categorie" id="categorie" class="form-control">
                        <?php
                        foreach($stmt as $row)
                        {
                            ?>
                            <option value="<?php echo $row['CodeCategorie']; ?>"><?php echo $row['Categorie']; ?></option>
                            <?php
                        }
                        ?>
                      </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="nbre" class="col-sm-3 control-label">Nombre</label>

                    <div class="col-sm-9">
                      <input type="number" class="form-control" id="nbre" name="nbre" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="nom" class="col-sm-3 control-label">Votre nom</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="nom" name="nom" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="postnom" class="col-sm-3 control-label">Votre postnom</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="postnom" name="postnom" required>
                    </div>
                </div>
                
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Fermer</button>
              <button type="submit" class="btn btn-primary btn-flat" name="reserver"><i class="fa fa-key"></i> Reserver</button>
              </form>
            </div>
        </div>
    </div>
</div>




     