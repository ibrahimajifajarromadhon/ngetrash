        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="<?php echo site_url('petugasiuran');?>" class="site_title"><img src=<?php echo base_url('assets/img/logo-brand.png'); ?> alt="..." style="width:45px; height: 45px;"> <span><b>NgeTrash</b></span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?php echo base_url('assets/admin/production/images/user.png'); ?>" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Hello Petugas,</span>
                <h2><?php echo $petugas->name; ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="<?php echo site_url('petugasiuran');?>"><i class="fa fa-edit"></i> Iuran Wajib </a>
                  </li>
                  <li><a href="<?php echo site_url('petugasstatus');?>"><i class="fa fa-desktop"></i> Status Pengambilan </a>
                  </li>
                  <li><a href="<?php echo site_url('petugasdaur');?>"><i class="fa fa-table"></i> Daur Ulang </a>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->

          </div>
        </div>