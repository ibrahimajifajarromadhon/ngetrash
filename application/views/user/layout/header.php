<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" href="<?php echo base_url('assets/img/logo.png'); ?>">

  <title>NgeTrash</title>

  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/user/css/vendor.css'); ?>">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/user/style.css'); ?>">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Jost&family=Roboto:wght@400;700&display=swap" rel="stylesheet">

  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

  <style>
    .pricing-content {
      position: relative;
    }

    .pricing_design {
      position: relative;
      margin: 0px 15px;
    }

    .pricing_design .single-pricing {
      background: #554c86;
      padding: 60px 40px;
      border-radius: 30px;
      box-shadow: 0 10px 40px -10px rgba(0, 64, 128, .2);
      position: relative;
      z-index: 1;
    }

    .pricing_design .single-pricing:before {
      content: "";
      background-color: #fff;
      width: 100%;
      height: 100%;
      border-radius: 18px 18px 190px 18px;
      border: 1px solid #eee;
      position: absolute;
      bottom: 0;
      right: 0;
      z-index: -1;
    }

    .price-head {}

    .price-head h2 {
      margin-bottom: 20px;
      font-size: 26px;
      font-weight: 600;
    }

    .price-head h1 {
      font-weight: 600;
      margin-top: 30px;
      margin-bottom: 5px;
    }

    .price-head span {}

    .single-pricing ul {
      list-style: none;
      margin-top: 30px;
    }

    .single-pricing ul li {
      line-height: 36px;
    }

    .single-pricing ul li i {
      background: #554c86;
      color: #fff;
      width: 20px;
      height: 20px;
      border-radius: 30px;
      font-size: 11px;
      text-align: center;
      line-height: 20px;
      margin-right: 6px;
    }

    .pricing-price {}

    .price_btn {
      background: #554c86;
      padding: 10px 30px;
      color: #fff;
      display: inline-block;
      margin-top: 20px;
      border-radius: 2px;
      -webkit-transition: 0.3s;
      transition: 0.3s;
    }

    .price_btn:hover {
      background: #0aa1d6;
    }

    a {
      text-decoration: none;
    }

    .section-title {
      margin-bottom: 60px;
    }

    .text-center {
      text-align: center !important;
    }

    .section-title h2 {
      font-size: 45px;
      font-weight: 600;
      margin-top: 0;
      position: relative;
      text-transform: capitalize;
    }
  </style>

  <!-- script ================================================== -->
  <script src="<?php echo base_url('assets/user/js/modernizr.js'); ?>"></script>
  <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js'></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('calendar');
      var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        events: [{
            title: 'Pembayaran',
            start: '2023-12-03',
            color: '#FF4500'
          },
          {
            title: 'Pembayaran',
            start: '2023-12-10',
            color: '#FF4500'
          },
          {
            title: 'Pengambilan',
            start: '2023-12-04',
            color: '#32CD32'
          },
          {
            title: 'Pengambilan',
            start: '2023-12-11',
            color: '#32CD32'
          },
          {
            title: 'Pengambilan',
            start: '2023-12-18',
            color: '#32CD32'
          },
          {
            title: 'Pengambilan',
            start: '2023-12-25',
            color: '#32CD32'
          },
          {
            title: 'Pengambilan',
            start: '2023-12-07',
            color: '#32CD32'
          },
          {
            title: 'Pengambilan',
            start: '2023-12-14',
            color: '#32CD32'
          },
          {
            title: 'Pengambilan',
            start: '2023-12-21',
            color: '#32CD32'
          },
          {
            title: 'Pengambilan',
            start: '2023-12-28',
            color: '#32CD32'
          },
        ]
      });
      calendar.render();
    });
  </script>

</head>

<body data-bs-spy="scroll" data-bs-target="#navbar-example2" tabindex="0">

  <!-- Navigation Section Starts -->
  <section id="navigation-bar" class="navigation position-fixed">

    <nav id="navbar-example2" class="navbar navbar-expand-lg">

      <div class="navigation container-fluid d-flex flex-wrap align-items-center my-2 pe-4 ps-5">

        <div class="col-md-3 brand-logo">
          <a href="<?php echo site_url('user'); ?>" class="d-inline-flex link-body-emphasis text-decoration-none">
            <h2><b>NgeTrash</b></h2>
          </a>
        </div>

        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar2" aria-controls="offcanvasNavbar2" aria-label="Toggle navigation"><ion-icon name="menu-outline"></ion-icon></button>

        <div class="offcanvas offcanvas-end" style="width: 220px;" tabindex="-1" id="offcanvasNavbar2" aria-labelledby="offcanvasNavbar2Label">

          <div class="offcanvas-header justify-content-end">
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>

          <?php if (empty($this->session->userdata('User'))) { ?>
            <div class="offcanvas-body">
              <ul class="navbar-nav align-items-center flex-grow-1 justify-content-end">
                <li class="nav-list mx-3">
                  <a href="<?php echo site_url('user'); ?>" class="nav-link px-2">
                    <h5> Home </h5>
                  </a>
                </li>
                <li class="nav-list mx-3">
                  <a href="<?php echo site_url('user/login'); ?>" class="nav-link px-2">
                    <h5> Login </h5>
                  </a>
                </li>
              </ul>
            </div>
          <?php } else { ?>
            <div class="offcanvas-body">
              <ul class="navbar-nav align-items-center flex-grow-1 justify-content-end">
                <li class="nav-list mx-3">
                  <a href="<?php echo site_url('user'); ?>" class="nav-link px-2">
                    <h5> Home </h5>
                  </a>
                </li>
                <li class="nav-list mx-3">
                  <a href="<?php echo site_url('userstatus'); ?>" class="nav-link px-2">
                    <h5> Status </h5>
                  </a>
                </li>
                <li class="nav-list mx-3">
                  <a href="<?php echo site_url('userriwayat'); ?>" class="nav-link px-2">
                    <h5> Riwayat </h5>
                  </a>
                </li>
                <li class="nav-list mx-3">
                  <a href="" class="nav-link px-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <h5> Profil </h5>
                  </a>
                </li>
                <li class="nav-list mx-3">
                  <a href="<?php echo site_url('user/logout'); ?>" class="nav-link px-2">
                    <h5> Logout </h5>
                  </a>
                </li>
              </ul>

              <div class="account d-flex align-items-center mt-5 mt-lg-0 justify-content-center justify-content-lg-end">
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <div class="tabs-listing">
                          <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade active show" id="nav-sign-in" role="tabpanel" aria-labelledby="nav-sign-in-tab">
                              <form id="form1" class="form-group flex-wrap p-3">
                                <h3 for="exampleInputEmail1" class="form-label text-uppercase fw-bold text-black mt-0 d-flex justify-content-center">Profil</h3>
                                <div class="form-input col-lg-12 my-4 mt-0">
                                  <label for="exampleInputEmail1" class="form-label fs-6 text-uppercase fw-bold text-black">Name</label>
                                  <input type="text" class="form-control ps-3" value="<?php echo $user->name; ?>" disabled>
                                </div>
                                <div class="form-input col-lg-12 my-4 mt-0">
                                  <label for="exampleInputEmail2" class="form-label fs-6 text-uppercase fw-bold text-black">Alamat</label>
                                  <input type="text" class="form-control ps-3" value="<?php echo $user->alamat; ?>" disabled></input>
                                </div>
                                <div class="form-input col-lg-12 my-4 mt-0">
                                  <label for="exampleInputEmail3" class="form-label fs-6 text-uppercase fw-bold text-black">Total Saldo</label>
                                  <input type="text" class="form-control ps-3" value="Rp.  <?php echo number_format($user->totalSaldo, 0, ',', '.'); ?>" disabled></input>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          <?php } ?>
        </div>

      </div>

    </nav>

  </section>