<!-- Add -->
<?php
//include('../includes/sessionconnected.php');

$conn = $pdo->open();

$stmt = $conn->prepare("SELECT * FROM t_equipe");
$stmt->execute();
$stmt2 = $conn->prepare("SELECT * FROM t_equipe");
$stmt2->execute();
$stmt3 = $conn->prepare("SELECT * FROM t_stade");
$stmt3->execute();
$stmt4 = $conn->prepare("SELECT * FROM t_championnat");
$stmt4->execute();
		
$pdo->close();
?>
<div class="modal fade" id="addmatch">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Ajouter un match</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="operation/add_match.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="equipea" class="col-sm-3 control-label">Equipe A</label>

                    <div class="col-sm-9">
                    <select name="equipea" id="equipea" class="form-control">
                        <?php
                            foreach($stmt as $row){
                                ?>
                            <option value="<?php echo $row['CodeEquipe'] ?>"><?php echo $row['NomEquipe']; ?></option>
                            <?php
                            }
                            ?>
                        
                      </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="equipeb" class="col-sm-3 control-label">Equipe B</label>

                    <div class="col-sm-9">
                    <select name="equipeb" id="equipeb" class="form-control">
                        <?php
                            foreach($stmt2 as $row){
                                ?>
                            <option value="<?php echo $row['NomEquipe'] ?>"><?php echo $row['NomEquipe']; ?></option>
                            <?php
                            }
                            ?>
                        
                      </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="presentateur" class="col-sm-3 control-label">Date</label>

                    <div class="col-sm-9">
                      <input type="date" class="form-control" name="date">
                    </div>
                </div>
                <div class="form-group">
                    <label for="heure" class="col-sm-3 control-label">Heure</label>

                    <div class="col-sm-9">
                      <input type="time" class="form-control" name="heure">
                    </div>
                </div>
                <div class="form-group">
                    <label for="montant" class="col-sm-3 control-label">Montant standard</label>

                    <div class="col-sm-9">
                      <input type="number" class="form-control" name="montant">
                    </div>
                </div>
                <div class="form-group">
                    <label for="stade" class="col-sm-3 control-label">Stade</label>

                    <div class="col-sm-9">
                    <select name="stade" id="stade" class="form-control">
                        <?php
                            foreach($stmt3 as $row){
                                ?>
                            <option value="<?php echo $row['CodeStade'] ?>"><?php echo $row['Stade']; ?></option>
                            <?php
                            }
                            ?>
                        
                      </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="championnat" class="col-sm-3 control-label">Championnat</label>

                    <div class="col-sm-9">
                    <select name="championnat" id="championnat" class="form-control">
                        <?php
                            foreach($stmt4 as $row){
                                ?>
                            <option value="<?php echo $row['CodeChampionnat'] ?>"><?php echo $row['Championnat']; ?></option>
                            <?php
                            }
                            ?>
                        
                      </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Fermer</button>
              <button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Ajouter</button>
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
              <h4 class="modal-title"><b>Modifier le match</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="operation/update_match.php">
                <input type="hidden" class="match" name="id">
                <div class="form-group">
                    <label for="edit_heure" class="col-sm-3 control-label">Heure</label>

                    <div class="col-sm-9">
                      <input type="time" class="form-control" name="edit_heure">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_date" class="col-sm-3 control-label">Date</label>

                    <div class="col-sm-9">
                      <input type="date" class="form-control" name="edit_date">
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

<!-- Edit -->
<div class="modal fade" id="achever">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Achever le match</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="operation/update_score.php">
                <input type="hidden" class="match" name="id">
                <div class="form-group">
                    <label for="score" class="col-sm-3 control-label">Score</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="score">
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

<!-- Activate -->
<div class="modal fade" id="activate">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Activation...</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="operation/active_emission.php">
                <input type="hidden" class="emission" name="id">
                <div class="text-center">
                    <p>ACTIVER EMISSION</p>
                    <?php
                    // $conn = $pdo->open();
                    // $id = $_POST['id'];       
                    // $stmt = $conn->prepare("SELECT * FROM t_programme WHERE CodeProgramme = $id");
                    // $stmt->execute();
                        
                    // $pdo->close();
                    ?>
                    <h2 class="bold fullname"></h2>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Fermer</button>
              <button type="submit" class="btn btn-success btn-flat" name="activate"><i class="fa fa-check"></i> Activer</button>
              </form>
            </div>
        </div>
    </div>
</div> 

<!-- Desactivate -->
<div class="modal fade" id="desactivate">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Desctivation...</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="operation/desactive_emission.php">
                <input type="hidden" class="emission" name="id">
                <div class="text-center">
                    <p>DESACTIVER EMISSION</p>
                    <h2 class="bold fullname"></h2>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Fermer</button>
              <button type="submit" class="btn btn-danger btn-flat" name="desactivate"><i class="fa fa-check"></i> Desactiver</button>
              </form>
            </div>
        </div>
    </div>
</div> 


