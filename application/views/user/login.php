<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="icon" type="image/png" href="<?php echo base_url('assets/img/logo.png'); ?>">

    <title>NgeTrash - Login User</title>
    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://use.fontawesome.com/releases/v5.7.2/css/all.css' rel='stylesheet'>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif
        }

        body {
            height: 100vmin;
            background: linear-gradient(to top, #c9c9ff 30%, #3ac5ce 90%) no-repeat
        }

        .alert {
            font-size: 0.8em;
        }

        .container {
            margin: 50px auto
        }

        .panel-heading {
            text-align: center;
            margin-bottom: 10px
        }

        a:hover {
            text-decoration: none
        }

        .form-inline label {
            padding-left: 10px;
            margin: 0;
            cursor: pointer
        }

        .btn {
            margin-top: 20px;
            border-radius: 15px;
            background-color: #3ac5ce;
            color: white;
        }

        .far {
            color: #3ac5ce;
        }

        .fas {
            color: #3ac5ce;
        }

        .panel {
            min-height: 380px;
            box-shadow: 20px 20px 80px rgb(218, 218, 218);
            border-radius: 12px
        }

        .input-field {
            border-radius: 5px;
            padding: 5px;
            display: flex;
            align-items: center;
            cursor: pointer;
            border: 1px solid #ddd;
            color: #4343ff
        }

        input[type='text'],
        input[type='password'] {
            border: none;
            outline: none;
            box-shadow: none;
            width: 100%
        }

        .fa-eye-slash.btn {
            border: none;
            outline: none;
            box-shadow: none
        }

        img {
            width: 40px;
            height: 40px;
            object-fit: cover;
            border-radius: 50%;
            position: relative
        }

        a[target='_blank'] {
            position: relative;
            transition: all 0.1s ease-in-out
        }

        .bordert {
            border-top: 1px solid #aaa;
            position: relative
        }

        .bordert:after {
            content: "or connect with";
            position: absolute;
            top: -13px;
            left: 33%;
            background-color: #fff;
            padding: 0px 8px
        }

        @media(max-width: 1024px) {
            body {
                height: 100vmax
            }

            .container {
                margin: 30px 0
            }

            .bordert:after {
                left: 25%
            }
        }
    </style>
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js'></script>
    <script type='text/javascript' src='https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js'></script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="offset-md-2 col-lg-5 col-md-7 offset-lg-4 offset-md-3">
                <div class="panel border bg-white mt-5 mt-md-5">
                    <div class="panel-heading">
                        <h3 class="pt-3 font-weight-bold">Login User</h3>
                    </div>
                    <div class="panel-body p-3">
                        <form action="<?php echo site_url('user/login_aksi'); ?>" method="POST">
                            <?php if ($this->session->flashdata('success')) : ?>
                                <div class="pb-3 pt-3 alert alert-success alert-dismissible text-whitesmoke">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close" style="font-size:2em; margin-right: 0px; margin-top:3px;">&times;</a>
                                    <strong><?php echo $this->session->flashdata('success'); ?></strong>
                                </div>
                            <?php endif; ?>
                            <?php if ($this->session->flashdata('error')) : ?>
                                <div class="pb-3 pt-3 alert alert-danger alert-dismissible text-whitesmoke">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close" style="font-size:2em; margin-right: 0px; margin-top:3px;">&times;</a>
                                    <strong><?php echo $this->session->flashdata('error'); ?></strong>
                                </div>
                            <?php endif; ?>
                            <?php if ($this->session->flashdata('error_userName')) : ?>
                                <div class="pb-0 pt-3 alert alert-danger alert-dismissible text-whitesmoke">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close" style="font-size:2em; margin-right: 0px;">&times;</a>
                                    <strong><?php echo $this->session->flashdata('error_userName'); ?></strong>
                                </div>
                            <?php endif; ?>
                            <div class="form-group py-2">
                                <div class="input-field"> <span class="far fa-user p-2"></span> <input type="text" id="userName" name="userName" placeholder="Enter your username" value="<?php echo $this->session->flashdata('input_userName') ?>" required> </div>
                            </div>
                            <?php if ($this->session->flashdata('error_password')) : ?>
                                <div class="pb-0 pt-3 alert alert-danger alert-dismissible text-whitesmoke">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close" style="font-size:2em; margin-right: 0px;">&times;</a>
                                    <strong><?php echo $this->session->flashdata('error_password'); ?></strong>
                                </div>
                            <?php endif; ?>
                            <div class="form-group py-2 pb-2">
                                <div class="input-field"> <span class="fas fa-lock p-2"></span> <input type="password" id="password" name="password" placeholder="Enter your password" value="<?php echo $this->session->flashdata('input_password') ?>" required> </div>
                            </div>
                            <button class="btn btn-block mt-3" type="submit">Login</button>
                            <div class="text-center pt-4 text-muted">Don't have an account? <a href="<?php echo site_url('user/register'); ?>">Register</a> </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type='text/javascript'></script>
</body>

</html>