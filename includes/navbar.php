<body>
     <div id="pre-div">
        <div id="loader">
        </div>
    </div>
    <!--/. End Preloader -->
    
    <div id="home" class="navbar navbar-default move-me ">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <a class="navbar-brand" href="index.php">
                    <img src="assets/img/logo1.png" class="navbar-brand-logo " alt="">
                </a>
            </div>
            <div class="navbar-collapse collapse ">
                <ul class="nav navbar-nav navbar-right">

                    <li class="dropdown">
                        <a href="index.php">ACCEUIL <i class="fa fa-bars"></i>
                            <span>Page d'acceuil</span>

                        </a>

                    </li>
                    <li class="dropdown">
                        <a href="#about">EFGO <i class="fa fa-bars"></i>
                            <span>Qui sommes-nous?</span>

                        </a>

                    </li>

                    

                    <li class="dropdown">
                        <a href="#impact">LINAFOOT  <i class="fa fa-bars"></i>
                            <span>Championnat</span>
                        </a>

                    </li>
                    <li class="dropdown">
                        <a href="#recent-events">NOS STADES<i class="fa fa-bars"></i>
                            <span>Visite</span>
                        </a>

                    </li>
                    <li class="dropdown">
                        <a href="#contact">CONTACT <i class="fa fa-bars"></i>
                            <span>Contactez-nous</span>
                        </a>

                    </li>
                    <a href="admin/index.php" style="margin-top: 80px;">Login</a>
                    <?php
                    if(isset($_SESSION['CodeSpectateur'])){
                       ?>
                       <p style="color: white;">ok</p>
                       <?php
                    }
                    else{
                        ?>
                       <p style="color: white;">non ok</p>
                       <?php
                    }
                    ?>
                </ul>
            </div>

        </div>
    </div>
    <!--./ NAV BAR END -->
    <div class="header-sec-bar" >
        <span>
            <i class="fa fa-envelope-o "></i>info@efgo.com 
            <i class="fa fa-phone "></i>+243977553723
            <i class="fa fa-globe"></i>www.efgo.com

        </span>

    </div>