<?php
include("includes/head.php");

include './includes/sessionoutconnection.php';

include './includes/navbar.php';
?>

    <!--./ HEADER SECTION BAR END -->
    <div id="main-head">

        <div class="container">
            <div class="row">
                <!-- <div class="col-lg-5  col-md-5 col-sm-5">
                    <?php
                            
                            $conn = $pdo->open();

                            $stmt = $conn->prepare("SELECT * FROM t_match
                                                    INNER JOIN t_equipe
                                                    ON t_match.Equipe_A=t_equipe.CodeEquipe
                                                    WHERE Status=1
                                                    ORDER BY Date DESC
                                                    LIMIT 4");
                            $stmt->execute();      
                            $pdo->close();
                            foreach($stmt as $row)
                            {
                                $image = (!empty($row['LogoEquipe'])) ? 'admin/img/'.$row['LogoEquipe'] : 'admin/img/ballon.jpg';
                                ?>
                                <div class="media">
                                    <div class="pull-left">
                                        <img style="width: 40px; heigth: 40px;" src="<?php echo $image; ?>" class="img-thumbnail" alt="">
                                    </div>
                                    <div class="media-body">
                                        <span class="media-heading"><?php echo $row['NomEquipe'].' vs '.$row['Equipe_B']; ?></span>
                                        <p class="">Score: <?php echo $row['Score']; ?></p>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                </div> -->
                <div class="col-lg-10  col-md-10 col-sm-10">
                    <table class="table table-bordered">
                        <thead>
                            <th>Match</th>
                            <th>Stade</th>
                            <th>Jour</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                    <?php
                            
                            $conn = $pdo->open();

                            $stmt = $conn->prepare("SELECT * FROM t_match
                                                    INNER JOIN t_equipe
                                                    ON t_match.Equipe_A=t_equipe.CodeEquipe
                                                    INNER JOIN t_stade
                                                    ON t_match.CodeStade=t_stade.CodeStade
                                                    ORDER BY CodeMatch DESC
                                                    LIMIT 20");
                            $stmt->execute();      
                            $pdo->close();
                            foreach($stmt as $row){
                                $status = $row['Status'];
                                if($status==0){
                                    echo "
                                    <tr>
                                      <td>".$row['NomEquipe'].' vs '.$row['Equipe_B']."</td>
                                      <td>".$row['Stade']."</td>
                                      <td>".$row['Date'].' à '.$row['Heure']."</td>
                                      <td>
                                        <button class='btn btn-primary btn-sm reserver btn-flat' data-id='".$row['CodeMatch']."'><i class='fa fa-money'></i> Reserver</button>
                                       
                                      </td>
                                    </tr>
                                  ";
                                }elseif($status==1)
                                {
                                    echo "
                                    <tr>
                                        <td>".$row['NomEquipe'].' vs '.$row['Equipe_B']."</td>
                                        <td>".$row['Stade']."</td>
                                        <td>".$row['Date'].' à '.$row['Heure']."</td>
                                        <td>Achevé sur le score de ".$row['Score']."</td>
                                    </tr>
                                  ";
                                }
                                
                               }
                            ?>
                        </tbody>
                    </table>
                </div>
                <!-- <div class="col-lg-5  col-md-5 col-sm-5">
                    <table style="border: 2px solid white;">
                        <thead>
                            <tr>
                                <td>Match</td>
                                <td>Jour</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>OK</td>
                                <td>OK</td>
                            </tr>
                        </tbody>
                    </table>
                </div> -->
                <div class="col-lg-2  col-md-3 col-sm-2">
                    


                    <h3>Inscrivez-vous</h3>
                    <form class="form-horizontal" method="POST" action="operation/add_spectateur.php">
                        <div class="form-group">
                            <input type="text" class="form-control" name="nom" placeholder="Nom">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="postnom" placeholder="Post-nom">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="prenom" placeholder="Prenom">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="username" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="Password">
                        </div>
                        <div class="form-group">
                        <button type="submit" class="btn btn-primary" name="add">S'inscrire<button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>



    
    <div id="footser-end">
        <div class="container">

            <div class="row">
                <div class="col-lg-12 col-md-12">
                    2021 Tout droit reservés pour les étudiants de L1 IG/ISIG 2020-2021 

                </div>
            </div>

        </div>
    </div>
    <!--./ footer-end End -->
      <div class="move-me">

      
    <a href="#home" class="scrollup"><i class="fa fa-chevron-up"></i></a>
          </div>
     <!--END SCROLLUP LINK SECTION-->
        <?php
          include("modal/reservation.php");
          ?>
    <!--  Jquery Core Script -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!--  Core Bootstrap Script -->
    <script src="assets/js/bootstrap.js"></script>
    <!--  Scrolling Script -->
    <script src="assets/js/jquery.easing.min.js"></script>
    <!--  PrettyPhoto Script -->
    <script src="assets/js/jquery.prettyPhoto.js"></script>
    <!--  knob Scripts -->
    <script src="assets/js/jquery.knob.js"></script>
     <!--  SCROLL REVEAL Scripts -->
    <script src="assets/js/scrollReveal.js"></script>
    <!--  Custom Scripts -->
    <script src="assets/js/custom.js"></script>
    <script>
    $(function(){

    $(document).on('click', '.reserver', function(e){
        e.preventDefault();
        $('#reserver').modal('show');
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
        }
    });
    }
</script>
</body>
</html>
