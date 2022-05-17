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
        Nos agents
      </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Accueil</a></li>
        <li class="active">Nos agents</li>
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
              <a href="#addagent" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> Nouveau</a>
            </div>
            <div class="box-body">
              <table id="tableau" class="table table-bordered">
                <thead>
                  <th>Photo</th>
                  <th>Nom</th>
                  <th>Post-nom</th>
                  <th>Prenom</th>
                  <th>Username</th>
                  <th>Action</th>
                </thead>
                <tbody>
                  <?php
                    $conn = $pdo->open();

                    try{
                      $stmt = $conn->prepare("SELECT * FROM t_agent");
                      $stmt->execute();
                      foreach($stmt as $agent){
                        $image = (!empty($agent['Photo'])) ? 'img/'.$agent['Photo'] : 'img/user.png';
                        echo "
                          <tr>
                            <td>
                              <img src='".$image."' height='30px' width='30px'>
                              <span class='pull-right'><a href='#modifier_photo' class='photo' data-toggle='modal' data-id='".$agent['CodeAgent']."'><i class='fa fa-edit'></i></a></span>
                            </td>
                            <td>".$agent['NomAgent']."</td>
                            <td>".$agent['PostnomAgent']."</td>
                            <td>".$agent['PrenomAgent']."</td>
                            <td>".$agent['Username']."</td>
                            <td>
                              <button class='btn btn-success btn-sm edit btn-flat' data-id='".$agent['CodeAgent']."'><i class='fa fa-edit'></i> Modifier</button>
                              <button class='btn btn-danger btn-sm delete btn-flat' data-id='".$agent['CodeAgent']."'><i class='fa fa-trash'></i> Supprimer</button>
                            </td>
                          </tr>
                        ";
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
    <?php include 'modal/agent.php'; ?>
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

  $(document).on('click', '.delete', function(e){
    e.preventDefault();
    $('#delete').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $(document).on('click', '.photo', function(e){
    e.preventDefault();
    var id = $(this).data('id');
    getRow(id);
  });

  $(document).on('click', '.status', function(e){
    e.preventDefault();
    var id = $(this).data('id');
    getRow(id);
  });

});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'operation/agent_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.agent').val(response.CodeAgent);
      $('#edit_mail').val(response.MailAgent);
      $('#edit_nom').val(response.NomAgent);
      $('#edit_postnom').val(response.PostnomAgent);
      $('#edit_prenom').val(response.PrenomAgent);
      $('#edit_adresse').val(response.AdresseAgent);
      $('#edit_telephone').val(response.TelephoneAgent);
      $('.fullname').html(response.NomAgent+' '+response.PostnomAgent+' '+response.PrenomAgent);
    }
  });
}
</script>
</body>
</html>
