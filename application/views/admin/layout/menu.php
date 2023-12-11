<div class="col-md-3 left_col">
  <div class="left_col scroll-view">
    <div class="navbar nav_title" style="border: 0;">
      <a href="<?php echo site_url('adminpetugas'); ?>" class="site_title"><img src=<?php echo base_url('assets/img/logo-brand.png'); ?> alt="..." style="width:45px; height: 45px;"> <span><b>NgeTrash</b></span></a>
    </div>

    <div class="clearfix"></div>

    <!-- menu profile quick info -->
    <div class="profile clearfix">
      <div class="profile_pic">
        <img src="<?php echo base_url('assets/admin/production/images/user.png'); ?>" alt="..." class="img-circle profile_img">
      </div>
      <div class="profile_info">
        <span>Hello Admin,</span>
        <h2><?php echo $admin->name; ?></h2>
      </div>
    </div>
    <!-- /menu profile quick info -->

    <br />

    <!-- sidebar menu -->
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
      <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">
          <li><a href="<?php echo site_url('adminpetugas'); ?>"><i class="fa fa-edit"></i> Petugas </a>
          </li>
          <li><a href="<?php echo site_url('adminuser'); ?>"><i class="fa fa-desktop"></i> User </a>
          </li>
          <li><a><i class="fa fa-file-pdf-o"></i>Laporan <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="<?php echo site_url('Admin/laporan_petugas'); ?>">Petugas</a></li>
              <li><a href="<?php echo site_url('Admin/laporan_user'); ?>">User</a></li>
              <li><a href="<?php echo site_url('Admin/laporan_iuran'); ?>">Iuran Wajib</a></li>
              <li><a href="<?php echo site_url('Admin/laporan_status'); ?>">Status Pengambilan</a></li>
              <li><a href="<?php echo site_url('Admin/laporan_daur'); ?>">Daur Ulang</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
    <!-- /sidebar menu -->
  </div>
</div>