<?php 
  include 'includes/sessionconnected.php';
  include 'includes/format.php'; 
?>
<?php 
  // $today = date('Y-m-d');
  // $year = date('Y');
  // if(isset($_GET['year'])){
  //   $year = $_GET['year'];
  // }

  $conn = $pdo->open();
?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Les matchs
      </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Accueil</a></li>
        <li class="active">Les matchs</li>
      </ol>
    </section>
    
    <!-- Main content -->
    <section class="content">
    <?php
        if(isset($_SESSION['error'])){
          echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Erreur!</h4>
              ".$_SESSION['error']."
            </div>
          ";
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
          echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Succès!</h4>
              ".$_SESSION['success']."
            </div>
          ";
          unset($_SESSION['success']);
        }
      ?>
      <!-- debut tableau -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              <a href="#addmatch" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> Nouveau</a>
            </div>
            <div class="box-body">
              <table id="tableau" class="table table-bordered">
                <thead>
                  <th>Date</th>
                  <th>Equipes</th>
                  <th>Heure</th>
                  <th>Stade</th>
                  <th>Championnat</th>
                  <th>Montant standard</th>
                  <th>Action</th>
                </thead>
                <tbody>
                  <?php
                    $conn = $pdo->open();

                    try{
                      $stmt = $conn->prepare("SELECT * FROM t_match
                                                INNER JOIN t_championnat
                                                ON t_match.CodeChampionnat=t_championnat.CodeChampionnat
                                                INNER JOIN t_equipe
                                                ON t_match.Equipe_A=t_equipe.CodeEquipe
                                                INNER JOIN t_stade
                                                ON t_match.CodeStade=t_stade.CodeStade
                                                ORDER BY Status");
                      $stmt->execute();
                      foreach($stmt as $match){
                        $status = $match['Status'];
                        if($status == 0)
                        {
                          echo "
                          <tr>
                            <td>".$match['Date']."</td>
                            <td>".$match['NomEquipe'].' VS '.$match['Equipe_B']."</td>
                            <td>".$match['Heure']."</td>
                            <td>".$match['Stade']."</td>
                            <td>".$match['Championnat']."</td>
                            <td>".$match['MontantStandard']." $</td>
                            <td>
                              <button class='btn btn-success btn-sm edit btn-flat' data-id='".$match['CodeMatch']."'><i class='fa fa-edit'></i> Modifier</button>
                              <button class='btn btn-primary btn-sm achever btn-flat' data-id='".$match['CodeMatch']."'><i class='fa fa-trash'></i> Achever</button>
                            </td>
                          </tr>
                        ";
                        }
                        else{
                          echo "
                          <tr>
                            <td>".$match['Date']."</td>
                            <td>".$match['NomEquipe'].' VS '.$match['Equipe_B']."</td>
                            <td>".$match['Heure']."</td>
                            <td>".$match['Stade']."</td>
                            <td>".$match['Championnat']."</td>
                            <td>".$match['MontantStandard']." $</td>
                            <td>Terminé 
                            ".$match['Score']."
                              
                            </td>
                          </tr>
                        ";
                        }
                        
                      }
                    }
                    catch(PDOException $e){
                      echo $e->getMessage();
                    }

                    $pdo->close();
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      </section>
      <!-- right col -->
    </div>
  	<?php include 'includes/footer.php'; ?>
    <?php include 'modal/match.php'; ?>
</div>
<!-- ./wrapper -->

<!-- Chart Data -->
<?php

?>

<?php 
?>
<?php include 'includes/scripts.php'; ?>
<script>
$(function(){

  $(document).on('click', '.edit', function(e){
    e.preventDefault();
    $('#edit').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $(document).on('click', '.achever', function(e){
    e.preventDefault();
    $('#achever').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });



});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'operation/match_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.match').val(response.CodeMatch);
      $('#edit_date').val(response.Date);
      $('#edit_heure').val(response.Heure);
    }
  });
}
</script>
</body>
</html>
