<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="<?php if($page=='dashboard') echo 'active'; else echo ''; ?>">
          <a href="index.php?page=dashboard">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="treeview <?php if($page=='masterprovinsi' || $page=='masterkota') echo 'active'; else echo ''; ?>">
          <a @click="tab=2" href="#">
            <i class="fa fa-archive"></i>
            <span>Master Data</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if($page=='masterprovinsi') echo 'active'; else echo ''; ?>"><a href="index.php?page=masterprovinsi"><i class="fa fa-circle-o"></i> Master Provinsi</a></li>
            <li class="<?php if($page=='masterkota') echo 'active'; else echo ''; ?>"><a href="index.php?page=masterkota"><i class="fa fa-circle-o"></i> Master Kota</a></li>
          </ul>
        </li>
        <?php if($_SESSION['role_id'] == 4 || $_SESSION['role_id'] == 1){ ?>
        <li class="treeview <?php if($page=='konfirmasikirim') echo 'active'; else echo ''; ?>">
          <a href="#">
            <i class="fa fa-circle-o"></i>
            <span>Konfirmasi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if($page=='konfirmasikirim') echo 'active'; else echo ''; ?>"><a href="index.php?page=konfirmasikirim"><i class="fa fa-arrow-circle-right"></i> Konfirmasi Pengiriman</a></li>
          </ul>
        </li>
      <?php } ?>
      <?php if($_SESSION['role_id'] != 4){ ?>
        <li class="treeview <?php if($page=='daftarpengiriman' || $page=='caripengiriman' || $page=='inputpengiriman' || $page=='editpengiriman') echo 'active'; else echo ''; ?>">
          <a href="#">
            <i class="fa fa-circle-o"></i>
            <span>Transaksi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if($page=='daftarpengiriman' || $page=='caripengiriman' || $page=='inputpengiriman' || $page=='editpengiriman') echo 'active'; else echo ''; ?>"><a href="index.php?page=daftarpengiriman"><i class="fa fa-arrow-circle-right"></i> Pengiriman Barang</a></li>
          </ul>
        </li>
      <?php } ?>
        <?php if($_SESSION['role_id'] < 3) {
        ?>
        <li class="treeview <?php if($page=='laporankeu') echo 'active'; else echo ''; ?>">
          <a href="#">
            <i class="fa fa-circle-o"></i>
            <span>Laporan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if($page=='laporankeu') echo 'active'; else echo ''; ?>"><a href="index.php?page=laporankeu"><i class="fa fa-arrow-circle-right"></i> Laporan Keuangan</a></li>
          </ul>
        </li>
        <li class="treeview <?php if($page=='daftaruser' || $page=='buatuser' || $page=='edituser') echo 'active'; else echo ''; ?>">
          <a href="#">
            <i class="fa fa-gear"></i>
            <span>Setting</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if($page=='daftaruser' || $page=='buatuser' || $page=='edituser') echo 'active'; else echo ''; ?>"><a href="index.php?page=daftaruser"><i class="fa fa-user"></i> User</a></li>
          </ul>
        </li>
      <?php } ?>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>