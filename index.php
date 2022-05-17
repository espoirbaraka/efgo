<?php
include("includes/head.php");

include 'admin/includes/conn.php';

include './includes/navbar.php';
?>

    <!--./ HEADER SECTION BAR END -->
    <div id="main-head">

        <div class="container">
            <div class="row">
                <div class="col-lg-3  col-md-3 col-sm-12">

                    <?php
                    
                    $conn = $pdo->open();

                    $stmt = $conn->prepare("SELECT *,MIN(Date) FROM t_match
                                            INNER JOIN t_equipe
                                            ON t_match.Equipe_A=t_equipe.CodeEquipe
                                            INNER JOIN t_stade
                                            ON t_match.CodeStade=t_stade.CodeStade
                                            WHERE Status=0");
                    $stmt->execute();
                    $match=$stmt->fetch();       
                    $pdo->close();
                    ?>

                    <h3 style="color: white; text-decoration: underline">PROCHAIN MATCH</h3>
                    <h4><?php echo $match['NomEquipe'].' vs '.$match['Equipe_B']; ?>  </h4>
                    <p><?php echo $match['Stade']; ?> en Date du : <?php echo $match['Date']; ?> à <?php echo $match['Heure']; ?></p>
                    
                    <p>Prix standard: </p>
                    <span><strong><i class="fa fa-dollar"></i><?php echo $match['MontantStandard']; ?> $ </strong></span>
                    <h5>Prix VIP: </h5>
                    <span><strong><i class="fa fa-dollar"></i><?php echo $match['MontantStandard']*1.5; ?> $ </strong></span>
                    <form>

                        <div class="form-group">
                            <!-- <button type="submit" class="btn btn-style-1 btn-lg ">BILLETTERIE</button> -->
                            <a href="match.php" class="btn btn-style-1 btn-lg">BILLETERIE</a>
                        </div>

                    </form>


                </div>
                <div class="col-lg-9 col-md-9 col-sm-12">
                    <div id="carousel-slider" class="carousel slide" data-ride="carousel">

                        <div class="carousel-inner">
                            <div class="item active">

                                <img src="assets/img/vclub.jpg" alt="">
                            </div>
                            <div class="item">
                                <img src="assets/img/tpm.jpg" alt="">
                            </div>
                            <div class="item">
                                <img src="assets/img/leopard.jpeg" alt="">
                            </div>
                        </div>
                        <!--INDICATORS-->
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-slider" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-slider" data-slide-to="1"></li>
                            <li data-target="#carousel-slider" data-slide-to="2"></li>
                        </ol>
                        <!--PREVIUS-NEXT BUTTONS-->
                        <a class="left carousel-control" href="#carousel-example" data-slide="prev">
                            <i class="fa fa-angle-left fa-2x control-icon main-color"></i>
                        </a>
                        <a class="right carousel-control" href="#carousel-example" data-slide="next">
                            <i class="fa fa-angle-right fa-2x control-icon main-color"></i>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>



    <!--./ Contact End -->
    <div id="footer-sec">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4" id="about-ftr">
                    <h3><span>Presentantion de la FECOFA</span></h3>
                    <p>
                        La FECOFA est une instance nationale qui gère le foot sur toute l'entendue
                        de la République Démocratique du Congo. Son president s'appelle Constant OMAR.
                        Son siège social se trouve à KINSHASA
                    </p>
                </div>
                <div class="col-lg-4 col-md-4">
                    <h3><span>Match passé</span></h3>
                    <div id="blog-footer-div">
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
                        
                        
                    </div>
                </div>

                <div class="col-lg-4 col-md-4">
                    <h3><span>Contact</span></h3>
                    <div>
                        90, Commune de la GOMBE , KINSHASA, RDC
                    <br />
                        Call: +243977553723
                        <br />
                        E-mail: info@efgo.com

                    </div>



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

          <?php
          include("modal/connect.php");
          ?>
     <!--END SCROLLUP LINK SECTION-->
    
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
      
    </script>
</body>
</html>
