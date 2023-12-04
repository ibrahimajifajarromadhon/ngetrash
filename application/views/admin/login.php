<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="<?php echo base_url('assets/img/logo.png'); ?>">

  <title>Login Admin | NgeTrash</title>
  
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
</head>

<body class="login">
  <div>
    <div class="login_wrapper">
        <section class="login_content">
        <?php if(isset($error_message)) { ?> 
              <?php echo $error_message; ?>
            <?php } ?>
          <form action="<?php echo site_url('admin/login_aksi'); ?>" method="post">
            <h1><b>Login Admin</b></h1>
            <div>
              <input type="text" id="userName" name="userName" class="form-control" placeholder="Username" required="" />
            </div>
            <div>
              <input type="password" id="password" name="password" class="form-control" placeholder="Password" required="" />
            </div>
            <div>
              <button type="submit" class="btn btn-primary btn-block"><b>Sign In</b></button>
            </div>

            <div class="clearfix"></div>

            <div class="separator">
              <p class="change_link">New to site?
              <a href="<?php echo site_url('admin/register'); ?>" class="text-center"><b>Create Account</b></a>
              </p>

              <div class="clearfix"></div>
              <br />

              <div>
                <h1><b>NgeTrash!</b></h1>
                <p>©2023 All Rights Reserved.</p>
              </div>
            </div>
          </form>
        </section>
      </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</html>