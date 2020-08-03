<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Kab Tegal | Tingkat Kesejahteraan</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url() ?>assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url() ?>assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url() ?>assets/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- jQuery custom content scroller -->
    <link href="<?php echo base_url() ?>assets/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet"/>
 <!-- bootstrap-progressbar -->
 <link href="<?php echo base_url() ?>assets/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?php echo base_url() ?>assets/vendors/iCheck/skins/flat/green.css" rel="stylesheet">

     <!-- Datatables -->
     <link href="<?php echo base_url() ?>assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url() ?>assets/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
  <div class="col-md-3 left_col menu_fixed">
          <div class="left_col scroll-view">
            <div class="clearfix"></div>
            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?php echo base_url() ?>assets/production/images/logo.png" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <h2>Kabupaten Tegal</h2>
                <span>PMKS</span>
              </div>
            </div>
            <!-- /menu profile quick info -->

<br><br>

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                <li><a href="<?php echo base_url()?>"><i class="fa fa-home"></i> Dashboard</a>
                  </li>
                   <li><a><i class="fa fa-table"></i> Hasil Klasifikasi <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url()?>c_user/klasifikasi_kecamatan">Kecamatan</a></li>
                      <li><a href="<?php echo base_url()?>c_user/klasifikasi_kelurahan">Desa</a></li>
                    </ul>
                  </li>
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right ">
                <li class="">
                <a href="<?php echo base_url()?>auth/index" class="user-profile"
                aria-hidden="true"><img src="<?php echo base_url() ?>assets/production/images/login.png" alt="">
                <b>Login </b>
                
                  </a>
                </li>
                
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->
