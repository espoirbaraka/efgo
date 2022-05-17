<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo (!empty($user['Photo'])) ? 'img/'.$user['Photo'] : 'img/user.png'; ?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php //echo $admin['firstname'].' '.$admin['lastname']; ?></p>
        <a><i class="fa fa-circle text-success"></i> Enline</a>
      </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">GESTION</li>
      <li><a href="home.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
      <li><a href="reservation.php"><i class="fa fa-users"></i> <span>Reservation</span></a></li>
      <li><a href="payement.php"><i class="fa fa-money"></i> <span>Payement</span></a></li>
      <li class="header">CONFIGURATION</li>
      <li><a href="equipe.php"><i class="fa fa-users"></i> <span>Equipe</span></a></li>
      <li><a href="match.php"><i class="fa fa-home"></i> <span>Match</span></a></li>
      <li><a href="championnat.php"><i class="fa fa-edit"></i> <span>Championnat</span></a></li>
      <li><a href="stade.php"><i class="fa fa-edit"></i> <span>Stade</span></a></li>
      <li class="header">AUTRES</li>
      <li><a href="agent.php"><i class="fa fa-users"></i> <span>Agent</span></a></li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
