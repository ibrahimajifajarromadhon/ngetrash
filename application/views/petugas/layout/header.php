<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="<?php echo base_url('assets/img/logo.png'); ?>">

  <title>Dashboard Petugas | NgeTrash</title>

  <!-- Bootstrap -->
  <link href="<?php echo base_url('assets/admin/vendors/bootstrap/dist/css/bootstrap.min.css'); ?>" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="<?php echo base_url('assets/admin/vendors/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet">
  <!-- NProgress -->
  <link href="<?php echo base_url('assets/admin/vendors/nprogress/nprogress.css'); ?>" rel="stylesheet">
  <!-- iCheck -->
  <link href="<?php echo base_url('assets/admin/vendors/iCheck/skins/flat/green.css'); ?>" rel="stylesheet">

  <!-- bootstrap-progressbar -->
  <link href="<?php echo base_url('assets/admin/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css'); ?>" rel="stylesheet">
  <!-- JQVMap -->
  <link href="<?php echo base_url('assets/admin/vendors/jqvmap/dist/jqvmap.min.css'); ?>" rel="stylesheet" />
  <!-- bootstrap-daterangepicker -->
  <link href="<?php echo base_url('assets/admin/vendors/bootstrap-daterangepicker/daterangepicker.css'); ?>" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="<?php echo base_url('assets/admin/build/css/custom.min.css'); ?>" rel="stylesheet">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

    body {
      font-family: 'Poppins', sans-serif;
    }
    
    .fa {
      font-family: 'FontAwesome' !important;
    }
  </style>

</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">

      <!-- top navigation -->
      <div class="top_nav">
        <div class="nav_menu">
          <div class="nav toggle">
            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
          </div>
          <nav class="nav navbar-nav">
            <ul class=" navbar-right">
              <li class="nav-item dropdown open" style="padding-left: 15px;">
                <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                  <img src="<?php echo base_url('assets/admin/production/images/user.png'); ?>" alt=""><?php echo $petugas->name; ?>
                </a>
                <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                  <a href="<?php echo site_url('petugas/logout'); ?>" class="dropdown-item" href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                </div>
              </li>
            </ul>
          </nav>
        </div>
      </div>
      <!-- /top navigation -->