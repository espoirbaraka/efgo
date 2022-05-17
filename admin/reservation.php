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
        Les reservations
      </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Accueil</a></li>
        <li class="active">Les reservations</li>
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
                  <th>Client</th>
                  <th>Match</th>
                  <th>Date reservation</th>
                  <th>Nombre des places</th>
                  <th>Prix standard</th>
                  <th>Action</th>
                </thead>
                <tbody>
                  <?php
                    $conn = $pdo->open();

                    try{
                      $stmt = $conn->prepare("SELECT *,t_reservation.Status as st FROM t_reservation
                                                INNER JOIN t_categorie
                                                ON t_reservation.CodeCategorie=t_categorie.CodeCategorie
                                                INNER JOIN t_match
                                                ON t_reservation.CodeMatch=t_match.CodeMatch
                                                INNER JOIN t_equipe
                                                ON t_match.Equipe_A=t_equipe.CodeEquipe");
                      $stmt->execute();
                      foreach($stmt as $reserv){
                        $status = $reserv['st'];
                        if($status == 0)
                        {
                          echo "
                          <tr>
                            <td>".$reserv['NomClient'].' '.$reserv['PostnomClient']."</td>
                            <td>".$reserv['NomEquipe'].' VS '.$reserv['Equipe_B']."</td>
                            <td>".$reserv['DateReservation']."</td>
                            <td>".$reserv['Nombre'].' places '.$reserv['Categorie']."</td>
                            <td>".$reserv['MontantStandard']." $</td>
                            <td>
                              <button class='btn btn-primary btn-sm payer btn-flat' data-id='".$reserv['CodeReservation']."'><i class='fa fa-edit'></i> Payer</button>
                              
                            </td>
                          </tr>
                        ";
                        }
                        else{
                          echo "
                          <tr>
                            <td>".$reserv['NomClient'].' '.$reserv['PostnomClient']."</td>
                            <td>".$reserv['NomEquipe'].' VS '.$reserv['Equipe_B']."</td>
                            <td>".$reserv['DateReservation']."</td>
                            <td>".$reserv['Nombre'].' places '.$reserv['Categorie']."</td>
                            <td>".$reserv['MontantStandard']." $</td>
                            <td> 
                            <button class='btn btn-success btn-sm achever btn-flat' data-id='".$reserv['CodeReservation']."'><i class='fa fa-print'></i> Facture</button>
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
    <?php include 'modal/reservation.php'; ?>
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

  $(document).on('click', '.payer', function(e){
    e.preventDefault();
    $('#payer').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });





});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'operation/reservation_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.reservation').val(response.CodeReservation);
    }
  });
}
</script>
</body>
</html>
