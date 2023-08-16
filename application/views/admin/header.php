<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Aplikasi Pengelolaan UKM Poliban</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style_umum.css">


</head>

<body class="hold-transition sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="<?php echo base_url('admin'); ?>" class="nav-link">Home</a>
        </li>

      </ul>

    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="<?php echo base_url(); ?>assets/adminlte/index3.html" class="brand-link">
        <img src="<?php echo base_url(); ?>assets/adminlte/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Admin Poliban</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
              <a href="<?php echo base_url("admin"); ?>" class="nav-link">
                <i class="nav-icon fa fa-th"></i>
                <p>
                  Home
                </p>
              </a>
            </li>
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <?php
            $menu_master1 = array('mahasiswa', 'mahasiswa_detil', 'mahasiswa_tambah', 'mahasiswa_edit');
            $menu_master2 = array('ukm', 'ukm_detil', 'ukm_tambah', 'ukm_edit');
            $menu_master3 = array( 'daftar_tambah', 'daftar_edit');
            ?>
            <li class="nav-item  
              <?php
              if (in_array($page, $menu_master1) || in_array($page, $menu_master2) || in_array($page, $menu_master3))
                echo "menu-open";
              ?>
            ">
              <a href="#" class="nav-link 
                <?php
                if (in_array($page, $menu_master1) || in_array($page, $menu_master2) || in_array($page, $menu_master3))
                  echo "active";
                ?>
              ">
                <i class="nav-icon fas fa-book"></i>
                <p>
                  Data Master
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>

              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo base_url('admin/mahasiswa'); ?>" class="nav-link
                    <?php
                    if (in_array($page, $menu_master1))
                      echo "active";
                    ?>
                  ">
                    <i class="nav-icon fas fa-users"></i>
                    <p>Mahasiswa</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="<?php echo base_url('admin/ukm'); ?>" class="nav-link
                    <?php
                    if (in_array($page, $menu_master2))
                      echo "active";
                    ?>                  
                  ">
                    <i class="nav-icon fas fa-user"></i>
                    <p>Unit Kegiatan Mahasiswa</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="<?php echo base_url('admin/daftar_tambah'); ?>" class="nav-link
                    <?php
                    if (in_array($page, $menu_master3))
                      echo "active";
                    ?>                  
                  ">
                    <i class="nav-icon fas fa-building"></i>
                    <p>Pendaftaran Anggota</p>
                  </a>
                </li>



              </ul>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url("admin/daftar"); ?>" class="nav-link">
                <i class="nav-icon fas fa-id-badge"></i>
                <p>
                  Anggota UKM
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?php echo base_url("login/logout"); ?>" class="nav-link">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>
                  Logout
                </p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>