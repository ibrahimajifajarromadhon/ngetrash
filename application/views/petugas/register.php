<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="<?php echo base_url('assets/img/logo.png'); ?>">

  <title>Register Petugas | NgeTrash</title>
  
  <!-- Bootstrap -->
  <link href="<?php echo base_url("assets/admin/vendors/bootstrap/dist/css/bootstrap.min.css"); ?>" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="<?php echo base_url("assets/admin/vendors/font-awesome/css/font-awesome.min.css"); ?>"  rel="stylesheet">
  <!-- NProgress -->
  <link href="<?php echo base_url("assets/admin/vendors/nprogress/nprogress.css"); ?>"  rel="stylesheet">
  <!-- Animate.css -->
  <link href="<?php echo base_url("assets/admin/vendors/animate.css/animate.min.css"); ?>"  rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="<?php echo base_url("assets/admin/build/css/custom.min.css"); ?>"  rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

    .login {
      font-family: 'Poppins', sans-serif;
    }

    .alert {
      font-size: 0.8em; 
    }
  </style>
</head>

<body class="login">
  <div>
    <div class="login_wrapper">
        <section class="login_content">
          <form action="<?php echo site_url('petugas/register_aksi'); ?>" method="post">
            <h1 style="font-size:1.7em; font-family:Poppins, sans-serif;"><b>Register Petugas</b></h1>
            <?php if ($this->session->flashdata('error_name')) : ?>
            <div class="pb-0 pt-3 alert alert-danger alert-dismissible text-whitesmoke">
              <a href="#" class="close" data-dismiss="alert" aria-label="close" style="font-size:2em; margin-right: 0px;">&times;</a>
              <strong><?php echo $this->session->flashdata('error_name'); ?></strong>
            </div>
          <?php endif; ?>
            <div>
              <input type="text" id="name" name="name" class="form-control" placeholder="Name" value="<?php echo $this->session->flashdata('input_name') ?>" required />
            </div>
            <?php if ($this->session->flashdata('error_userName')) : ?>
            <div class="pb-0 pt-3 alert alert-danger alert-dismissible text-whitesmoke">
              <a href="#" class="close" data-dismiss="alert" aria-label="close" style="font-size:2em; margin-right: 0px;">&times;</a>
              <strong><?php echo $this->session->flashdata('error_userName'); ?></strong>
            </div>
          <?php endif; ?>
            <div>
              <input type="text" id="userName" name="userName" class="form-control" placeholder="Username" value="<?php echo $this->session->flashdata('input_userName') ?>" required />
            </div>
            <?php if ($this->session->flashdata('error_password')) : ?>
            <div class="pb-0 pt-3 alert alert-danger alert-dismissible text-whitesmoke">
              <a href="#" class="close" data-dismiss="alert" aria-label="close" style="font-size:2em; margin-right: 0px;">&times;</a>
              <strong><?php echo $this->session->flashdata('error_password'); ?></strong>
            </div>
          <?php endif; ?>
            <div>
              <input type="password" id="password" name="password" class="form-control" placeholder="Password" value="<?php echo $this->session->flashdata('input_password') ?>" required />
            </div>
            <div>
              <input type="hidden" class="form-control" name="statusAktif" value="N">
            </div>
            <div>
              <button type="submit" class="btn btn-primary btn-block"><b>Register</b></button>
            </div>

            <div class="clearfix"></div>

            <div class="separator">
              <p class="change_link">New to site?
              <a href="<?php echo site_url('petugas/login'); ?>" class="text-center"><b>Login Account</b></a>
              </p>

              <div class="clearfix"></div>
              <br />

              <div>
                <h1 style="font-size:1.7em; font-family:Poppins, sans-serif;"><b>NgeTrash!</b></h1>
                <p>©2023 All Rights Reserved.</p>
              </div>
            </div>
          </form>
        </section>
      </div>
  </div>
  <!-- jQuery -->
  <script src="<?php echo base_url('assets/admin/vendors/jquery/dist/jquery.min.js'); ?>"></script>
  <!-- Bootstrap -->
  <script src="<?php echo base_url('assets/admin/vendors/bootstrap/dist/js/bootstrap.bundle.min.js'); ?>"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</html>