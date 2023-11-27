<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Deliver - Free Courier Website Template</title>

  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/user/css/vendor.css');?>">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/user/style.css'); ?>">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Jost&family=Roboto:wght@400;700&display=swap" rel="stylesheet">

  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

  <!-- script ================================================== -->
  <script src="<?php echo base_url('assets/user/js/modernizr.js'); ?>"></script>

</head>

<body data-bs-spy="scroll" data-bs-target="#navbar-example2" tabindex="0">

  <!-- Navigation Section Starts -->
  <section id="navigation-bar" class="navigation position-fixed">

    <nav id="navbar-example2" class="navbar navbar-expand-lg ">

      <div class="navigation container-fluid d-flex flex-wrap align-items-center my-2 pe-4 ps-5 ">

        <div class="col-md-3 brand-logo">
          <a href="index.html" class="d-inline-flex link-body-emphasis text-decoration-none">
            <img src="<?php echo base_url('assets/user/images/Deliver.png'); ?>" alt="">
          </a>
        </div>

        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar2"
          aria-controls="offcanvasNavbar2" aria-label="Toggle navigation"><ion-icon
            name="menu-outline"></ion-icon></button>

        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar2"
          aria-labelledby="offcanvasNavbar2Label">

          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasNavbar2Label">Menu</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>

          <div class="offcanvas-body">
            <ul class="navbar-nav align-items-center flex-grow-1">
              <li class="nav-list mx-3">
                <a href="index.html" class="nav-link active px-2">
                  <h5> Home </h5>
                </a>
              </li>
              <li class="nav-list mx-3">
                <a href="#resources" class="nav-link px-2">
                  <h5> About </h5>
                </a>
              </li>
              <li class="nav-list mx-3">
                <a href="#services" class="nav-link px-2">
                  <h5> Services </h5>
                </a>
              </li>
              <li class="nav-list mx-3">
                <a href="#articles" class="nav-link px-2">
                  <h5> Blog </h5>
                </a>
              </li>
              <li class="nav-list mx-3">
                <a href="#contact" class="nav-link px-2">
                  <h5> Contact </h5>
                </a>
              </li>
              <li class="nav-list mx-3 dropdown text-center">
                <a class="nav-link px-2 dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                  aria-expanded="false">
                  <h5> Pages <iconify-icon icon="ic:outline-arrow-drop-down"></iconify-icon> </h5>
                </a>
                <ul class="dropdown-menu">
                  <li><a href="about.html" class="dropdown-item text-uppercase ">About <span
                        class="badge bg-secondary">Pro</span></a></li>
                  <li><a href="blog.html" class="dropdown-item text-uppercase ">Blog <span
                        class="badge bg-secondary">Pro</span></a></li>
                  <li><a href="blog-single.html" class="dropdown-item text-uppercase ">Blog-Single <span
                        class="badge bg-secondary">Pro</span></a></li>
                  <li><a href="services.html" class="dropdown-item text-uppercase ">Services <span
                        class="badge bg-secondary">Pro</span></a></li>
                  <li><a href="services-single.html" class="dropdown-item text-uppercase ">Service-Single
                      <span class="badge bg-secondary">Pro</span></a></li>
                  <li><a href="gallery.html" class="dropdown-item text-uppercase ">Gallery <span
                        class="badge bg-secondary">Pro</span></a></li>
                  <li><a href="pricing.html" class="dropdown-item text-uppercase ">Pricing <span
                        class="badge bg-secondary">Pro</span></a></li>
                  <li><a href="quote.html" class="dropdown-item text-uppercase ">Get a Quote <span
                        class="badge bg-secondary">Pro</span></a></li>
                  <li><a href="contact.html" class="dropdown-item text-uppercase ">Contact <span
                        class="badge bg-secondary">Pro</span></a></li>
                  <li><a href="team.html" class="dropdown-item text-uppercase ">Our Team <span
                        class="badge bg-secondary">Pro</span></a></li>
                  <li><a href="review.html" class="dropdown-item text-uppercase ">Reviews <span
                        class="badge bg-secondary">Pro</span></a></li>
                  <li><a href="faq.html" class="dropdown-item text-uppercase ">FAQs <span
                        class="badge bg-secondary">Pro</span></a></li>
                  <li><a href="styles.html" class="dropdown-item text-uppercase ">Styles <span
                        class="badge bg-secondary">Pro</span></a></li>
                </ul>
              </li>
              <li class="nav-list mx-3">
                <a href="https://templatesjungle.gumroad.com/l/free-bootstrap-5-html-website-template-for-courier-and-transportation-company"
                  class="nav-link px-2 fw-bolder text-uppercase get-pro">
                  <h5> get pro </h5>
                </a>
              </li>
            </ul>

            <div class="account d-flex align-items-center mt-5 mt-lg-0 justify-content-center justify-content-lg-end">
              <a href="#" class="nav-link me-5 login" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <h5>Login</h5>
              </a>
              <!-- Modal -->
              <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <div class="tabs-listing">
                        <nav>
                          <div class="nav nav-tabs d-flex justify-content-center border-0" id="nav-tab" role="tablist">
                            <button class="btn btn-outline-primary text-uppercase px-4 py-2 me-4 active"
                              id="nav-sign-in-tab" data-bs-toggle="tab" data-bs-target="#nav-sign-in" type="button"
                              role="tab" aria-controls="nav-sign-in" aria-selected="true">Log
                              In</button>
                            <button class="btn btn-outline-primary text-uppercase px-4 py-2" id="nav-register-tab"
                              data-bs-toggle="tab" data-bs-target="#nav-register" type="button" role="tab"
                              aria-controls="nav-register" aria-selected="false">Sign
                              Up</button>
                          </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                          <div class="tab-pane fade active show" id="nav-sign-in" role="tabpanel"
                            aria-labelledby="nav-sign-in-tab">
                            <form id="form1" class="form-group flex-wrap p-3 ">
                              <div class="form-input col-lg-12 my-4">
                                <label for="exampleInputEmail1"
                                  class="form-label fs-6 text-uppercase fw-bold text-black">Email
                                  Address</label>
                                <input type="text" id="exampleInputEmail1" name="email" placeholder="Email"
                                  class="form-control ps-3">
                              </div>
                              <div class="form-input col-lg-12 my-4">
                                <label for="inputPassword1"
                                  class="form-label  fs-6 text-uppercase fw-bold text-black">Password</label>
                                <input type="password" id="inputPassword1" placeholder="Password"
                                  class="form-control ps-3" aria-describedby="passwordHelpBlock">
                                <div id="passwordHelpBlock" class="form-text text-center">
                                  <a href="#" class=" password">Forgot Password ?</a>
                                </div>

                              </div>
                              <label class="py-3">
                                <input type="checkbox" required="" class="d-inline">
                                <span class="label-body text-black">Remember Me</span>
                              </label>
                              <div class="d-grid my-3">
                                <button class="btn btn-primary btn-lg btn-dark text-uppercase btn-rounded-none fs-6">Log
                                  In</button>
                              </div>
                            </form>
                          </div>
                          <div class="tab-pane fade" id="nav-register" role="tabpanel"
                            aria-labelledby="nav-register-tab">
                            <form id="form2" class="form-group flex-wrap p-3 ">
                              <div class="form-input col-lg-12 my-4">
                                <label for="exampleInputEmail2"
                                  class="form-label fs-6 text-uppercase fw-bold text-black">Email
                                  Address</label>
                                <input type="text" id="exampleInputEmail2" name="email" placeholder="Email"
                                  class="form-control ps-3">
                              </div>
                              <div class="form-input col-lg-12 my-4">
                                <label for="inputPassword2"
                                  class="form-label  fs-6 text-uppercase fw-bold text-black">Password</label>
                                <input type="password" id="inputPassword2" placeholder="Password"
                                  class="form-control ps-3" aria-describedby="passwordHelpBlock">
                              </div>
                              <label class="py-3">
                                <input type="checkbox" required="" class="d-inline">
                                <span class="label-body text-black">I agree to the <a href="#"
                                    class="text-black password border-bottom">Privacy
                                    Policy</a>
                                </span>
                              </label>
                              <div class="d-grid my-3">
                                <button
                                  class="btn btn-primary btn-lg btn-dark text-uppercase btn-rounded-none fs-6">Sign
                                  Up</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <button type="button" class="btn btn-primary first-button signup px-4 py-3" data-bs-toggle="modal"
                data-bs-target="#exampleModal2">Sign up</button>
              <!-- Modal -->
              <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <div class="tabs-listing">
                        <nav>
                          <div class="nav nav-tabs d-flex justify-content-center border-0" id="nav-tab2" role="tablist">
                            <button class="btn btn-outline-primary text-uppercase px-4 py-2 me-4 " id="nav-sign-in-tab2"
                              data-bs-toggle="tab" data-bs-target="#nav-sign-in2" type="button" role="tab"
                              aria-controls="nav-sign-in2" aria-selected="false">Log
                              In</button>
                            <button class="btn btn-outline-primary text-uppercase px-4 py-2 active"
                              id="nav-register-tab2" data-bs-toggle="tab" data-bs-target="#nav-register2" type="button"
                              role="tab" aria-controls="nav-register2" aria-selected="true">Sign
                              Up</button>
                          </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent1">
                          <div class="tab-pane fade " id="nav-sign-in2" role="tabpanel"
                            aria-labelledby="nav-sign-in-tab2">
                            <form id="form3" class="form-group flex-wrap p-3 ">
                              <div class="form-input col-lg-12 my-4">
                                <label for="exampleInputEmail3"
                                  class="form-label fs-6 text-uppercase fw-bold text-black">Email
                                  Address</label>
                                <input type="text" id="exampleInputEmail3" name="email" placeholder="Email"
                                  class="form-control ps-3">
                              </div>
                              <div class="form-input col-lg-12 my-4">
                                <label for="inputPassword3"
                                  class="form-label  fs-6 text-uppercase fw-bold text-black">Password</label>
                                <input type="password" id="inputPassword3" placeholder="Password"
                                  class="form-control ps-3" aria-describedby="passwordHelpBlock">
                                <div id="passwordHelpBlock2" class="form-text text-center">
                                  <a href="#" class=" password">Forgot Password ?</a>
                                </div>

                              </div>
                              <label class="py-3">
                                <input type="checkbox" required="" class="d-inline">
                                <span class="label-body text-black">Remember Me</span>
                              </label>
                              <div class="d-grid my-3">
                                <button class="btn btn-primary btn-lg btn-dark text-uppercase btn-rounded-none fs-6">Log
                                  In</button>
                              </div>
                            </form>
                          </div>
                          <div class="tab-pane fade active show" id="nav-register2" role="tabpanel"
                            aria-labelledby="nav-register-tab2">
                            <form id="form4" class="form-group flex-wrap p-3 ">
                              <div class="form-input col-lg-12 my-4">
                                <label for="exampleInputEmail4"
                                  class="form-label fs-6 text-uppercase fw-bold text-black">Email
                                  Address</label>
                                <input type="text" id="exampleInputEmail4" name="email" placeholder="Email"
                                  class="form-control ps-3">
                              </div>
                              <div class="form-input col-lg-12 my-4">
                                <label for="inputPassword4"
                                  class="form-label  fs-6 text-uppercase fw-bold text-black">Password</label>
                                <input type="password" id="inputPassword4" placeholder="Password"
                                  class="form-control ps-3" aria-describedby="passwordHelpBlock">
                              </div>
                              <label class="py-3">
                                <input type="checkbox" required="" class="d-inline">
                                <span class="label-body text-black">I agree to the <a href="#"
                                    class="text-black password border-bottom">Privacy
                                    Policy</a>
                                </span>
                              </label>
                              <div class="d-grid my-3">
                                <button
                                  class="btn btn-primary btn-lg btn-dark text-uppercase btn-rounded-none fs-6">Sign
                                  Up</button>
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
        </div>

      </div>

    </nav>

  </section>

  <!-- Hero Section Starts -->
  <section id="hero">
    <div class="hero container py-5 my-5">
      <div class="row flex-lg-row-reverse align-items-center g-5 mt-2 py-5">
        <div class="col-10 col-sm-8 col-lg-6 py-md-5 my-md-5">
          <img src="<?php echo base_url('assets/user/images/scooter.png'); ?>" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700"
            height="500" loading="lazy">
        </div>
        <div class="col-lg-6 py-md-5 my-md-5">
          <h1 class=" lh-1 mb-3">We offer a wide range of logistics solutions.</h1>
          <ul class="list-unstyled my-5">
            <li class="my-2">
              <h5>1 &nbsp; Easy booking </h5>
            </li>
            <li class="my-2">
              <h5>2 &nbsp; Global Coverage </h5>
            </li>
            <li class="my-2">
              <h5>3 &nbsp; Customer Support </h5>
            </li>
          </ul>
          <div class="">
            <a href="#" class="icon-link">
              <h5> Get Started</h5>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Feature Section Starts -->
  <section id="features">
    <div id="resources" class="container py-5 my-5">

      <div class="row row-cols-1 row-cols-md-2 align-items-md-center gx-5 py-5">
        <div class="col-md-7 d-flex flex-column align-items-start">
          <h1 class="">Go global with ease</h1>
          <p class="feature-paragraph my-5">We simplify your logistics, while plugging your company into a world of
            opportunities. We believe every company deserves to feel the excitement of going global, regardless of size.
          </p>
          <a href="about.html" class="btn btn-outline-primary second-button">Read More</a>
        </div>

        <div class="col-md-5">
          <div class="row flex-column g-4 mt-3">
            <div class="feature-post py-2 px-5">
              <h4 class="py-3">Easy booking, multiple services</h4>
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                industry's standard dummy text ever since</p>
            </div>

            <div class="feature-post py-2 px-5">
              <h4 class="py-3">One place to manage all your shipments</h4>
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                industry's standard dummy text ever since</p>
            </div>

            <div class="feature-post py-2 px-5">
              <h4 class="py-3">Giving you clear visibility</h4>
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                industry's standard dummy text ever since</p>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Services Section Starts -->
  <section id="services" class="my-5">
    <div class="container ">
      <h1 class="text-center my-5">Our Services</h1>
      <div class="row py-5">
        <div class="col-md-3">
          <div class="service-post py-5 px-5">
            <div class="feature-icon d-inline-flex align-items-center justify-content-center  fs-2 mb-3">
              <img src="<?php echo base_url('assets/user/images/van.png'); ?>" alt="">
            </div>
            <h3>Fast Transportation</h3>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting Ipsum has been the industry's standard
              dummy text ever since</p>
            <a href="services-single.html" class="icon-link">More info </a>
          </div>
        </div>
        <div class="col-md-3">
          <div class="service-post py-5 px-5">
            <div class="feature-icon d-inline-flex align-items-center justify-content-center fs-2 mb-3">
              <img src="<?php echo base_url('assets/user/images/ship.png'); ?>" alt="">
            </div>
            <h3>Ocean Freight</h3>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting Ipsum has been the industry's standard
              dummy text ever since</p>
            <a href="services-single.html" class="icon-link">More info </a>
          </div>
        </div>
        <div class="col-md-3">
          <div class="service-post py-5 px-5">
            <div class="feature-icon d-inline-flex align-items-center justify-content-center fs-2 mb-3">
              <img src="<?php echo base_url('assets/user/images/headset.png'); ?>" alt="">
            </div>
            <h3>Customs Services</h3>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting Ipsum has been the industry's standard
              dummy text ever since</p>
            <a href="services-single.html" class="icon-link">More info </a>
          </div>
        </div>
        <div class="col-md-3">
          <div class="service-post py-5 px-5">
            <div class="feature-icon d-inline-flex align-items-center justify-content-center fs-2 mb-3">
              <img src="<?php echo base_url('assets/user/images/rate.png'); ?>" alt="">
            </div>
            <h3>Monthly Rates</h3>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting Ipsum has been the industry's standard
              dummy text ever since</p>
            <a href="services-single.html" class="icon-link">More info </a>
          </div>
        </div>
      </div>
      <div class="text-center">
        <a href="services.html" class="btn btn-primary first-button my-5">Explore Services</a>
      </div>

    </div>
  </section>

  <!-- Articles Section Starts -->
  <section id="articles">
    <div id="company" class="container pt-5 my-5">
      <h1 class="text-center  my-5">Latest Articles</h1>
      <div class="row g-4 py-5">
        <div class="feature col-md-4">
          <div class="artical-post">
            <div class="feature-icon d-inline-flex align-items-center justify-content-center ">
              <img src="<?php echo base_url('assets/user/images/plane.png'); ?>" alt="" class="img-fluid">
            </div>
            <div class="artical-content py-5 px-5 ">
              <h3>Learn and stay updated with</h3>
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting Ipsum has been the industry's standard
                dummy text ever since</p>
              <a href="blog-single.html" class="icon-link">More info </a>
            </div>
          </div>
        </div>
        <div class="feature col-md-4">
          <div class="artical-post">
            <div class="feature-icon d-inline-flex align-items-center justify-content-center">
              <img src="<?php echo base_url('assets/user/images/box.png'); ?>" alt="" class="img-fluid">
            </div>
            <div class="artical-content py-5 px-5 ">
              <h3>Asia-Pacific shipping update</h3>
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting Ipsum has been the industry's standard
                dummy text ever since</p>
              <a href="blog-single.html" class="icon-link">More info </a>
            </div>
          </div>
        </div>
        <div class="feature col-md-4">
          <div class="artical-post">
            <div class="feature-icon d-inline-flex align-items-center justify-content-center">
              <img src="<?php echo base_url('assets/user/images/plane.png'); ?>" alt="" class="img-fluid">
            </div>
            <div class="artical-content py-5 px-5 ">
              <h3>Stay up to date with logistics</h3>
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting Ipsum has been the industry's standard
                dummy text ever since</p>
              <a href="blog-single.html" class="icon-link">More info </a>
            </div>
          </div>
        </div>
      </div>
      <div class="text-center">
        <a href="blog.html" class="btn btn-primary first-button my-5">More Articles</a>
      </div>

    </div>
  </section>

  <!-- Client Section Starts -->
  <section id="client">
    <div class="container py-5 my-5" id="featured-3">
      <h1 class="text-center my-5">What Our Client Say</h1>
      <div class="swiper client-Swiper py-5">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <div class="col client-section d-flex align-items-center p-3 ">
              <img src="<?php echo base_url('assets/user/images/person1.png'); ?>" alt="">
              <div class="client-name ps-4">
                <h4>Ramen Maggie </h4>
                <p>Seoul, South Korea</p>
              </div>
            </div>
            <div class="client-description px-3 py-3">
              <iconify-icon class="client-quote-icon" icon="bxs:quote-alt-left"></iconify-icon>
              <h5>Thank you for your great service</h5>
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting Ipsum has been the industry's standard
                dummy text ever since</p>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="col client-section d-flex align-items-center p-3 ">
              <img src="<?php echo base_url('assets/user/images/person2.png'); ?>" alt="">
              <div class="client-name ps-4">
                <h4>John D’souza </h4>
                <p>New York, USA</p>
              </div>
            </div>
            <div class="client-description px-3 py-3">
              <iconify-icon class="client-quote-icon" icon="bxs:quote-alt-left"></iconify-icon>
              <h5>Thank you for your great service</h5>
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting Ipsum has been the industry's standard
                dummy text ever since</p>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="col client-section d-flex align-items-center p-3 ">
              <img src="<?php echo base_url('assets/user/images/person1.png'); ?>" alt="">
              <div class="client-name ps-4">
                <h4>Karl Walter</h4>
                <p>Munich, German</p>
              </div>
            </div>
            <div class="client-description px-3 py-3">
              <iconify-icon class="client-quote-icon" icon="bxs:quote-alt-left"></iconify-icon>
              <h5>Thank you for your great service</h5>
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting Ipsum has been the industry's standard
                dummy text ever since</p>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="col client-section d-flex align-items-center p-3 ">
              <img src="<?php echo base_url('assets/user/images/person2.png'); ?>" alt="">
              <div class="client-name ps-4">
                <h4>Ramen Maggie </h4>
                <p>Seoul, South Korea</p>
              </div>
            </div>
            <div class="client-description px-3 py-3">
              <iconify-icon class="client-quote-icon" icon="bxs:quote-alt-left"></iconify-icon>
              <h5>Thank you for your great service</h5>
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting Ipsum has been the industry's standard
                dummy text ever since</p>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="col client-section d-flex align-items-center p-3 ">
              <img src="<?php echo base_url('assets/user/images/person1.png');?>" alt="">
              <div class="client-name ps-4">
                <h4>Ramen Maggie </h4>
                <p>Seoul, South Korea</p>
              </div>
            </div>
            <div class="client-description px-3 py-3">
              <iconify-icon class="client-quote-icon" icon="bxs:quote-alt-left"></iconify-icon>
              <h5>Thank you for your great service</h5>
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting Ipsum has been the industry's standard
                dummy text ever since</p>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="col client-section d-flex align-items-center p-3 ">
              <img src="<?php echo base_url('assets/user/images/person2.png'); ?>" alt="">
              <div class="client-name ps-4">
                <h4>Ramen Maggie </h4>
                <p>Seoul, South Korea</p>
              </div>
            </div>
            <div class="client-description px-3 py-3">
              <iconify-icon class="client-quote-icon" icon="bxs:quote-alt-left"></iconify-icon>
              <h5>Thank you for your great service</h5>
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting Ipsum has been the industry's standard
                dummy text ever since</p>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="col client-section d-flex align-items-center p-3 ">
              <img src="<?php echo base_url('assets/user/images/person1.png'); ?>" alt="">
              <div class="client-name ps-4">
                <h4>Ramen Maggie </h4>
                <p>Seoul, South Korea</p>
              </div>
            </div>
            <div class="client-description px-3 py-3">
              <iconify-icon class="client-quote-icon" icon="bxs:quote-alt-left"></iconify-icon>
              <h5>Thank you for your great service</h5>
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting Ipsum has been the industry's standard
                dummy text ever since</p>
            </div>
          </div>

        </div>
        <div class="swiper-pagination"></div>
      </div>

    </div>
  </section>

  <!-- Action Section Starts -->
  <section id="action">
    <div id="contact" class="container py-5 my-5">

      <div class="row row-cols-1 row-cols-md-2 align-items-md-center g-5 py-5 ">
        <div class="col-md-5 action-column1">
          <div class="row flex-column py-5 px-5">
            <div class=" ms-3 mb-5 mt-5 ">
              <h1 class="mt-2">2043</h1>
              <h5>Active Customers</h5>
            </div>

            <div class=" ms-3 mb-5 ">
              <h1>3298</h1>
              <h5>Monthly Shipments</h5>
            </div>

            <div class=" ms-3 mb-5 ">
              <h1>5 min</h1>
              <h5 class="mb-2">To Book A Shipment</h5>
            </div>

          </div>
        </div>

        <div class="col-md-7 action-column2 d-flex flex-column align-items-center py-5 px-5">
          <h1 class="action-heading text-center mt-5 py-2 px-5 ">Ready to book your shipment?</h1>
          <p class="action-paragraph text-center my-5 px-5 ">Create an account to book. It only takes a few steps!</p>
          <button type="button" class="btn btn-primary first-button action-button  my-5" data-bs-toggle="modal"
            data-bs-target="#exampleModal2">Create Account</button>
        </div>

      </div>
    </div>
  </section>

  <!-- Footer Section Starts -->
  <section id="footer">
    <div class="container footer-container py-5">
      <footer class="row row-cols-1 row-cols-sm-2 row-cols-md-5 py-5  ">

        <div class="col-md-3 ">
          <h4 class="py-3">Shipping Information</h4>
          <ul class="nav flex-column">
            <li class="nav-item mb-3"><a href="#" class="nav-link footer-1-link p-0 "> Shipping to United States </a>
            </li>
            <li class="nav-item mb-3"><a href="#" class="nav-link footer-1-link p-0 "> Shipping to The Netherlands </a>
            </li>
            <li class="nav-item mb-3"><a href="#" class="nav-link footer-1-link p-0 "> Shipping to United Kingdom </a>
            </li>
            <li class="nav-item mb-3"><a href="#" class="nav-link footer-1-link p-0 "> Shipping to Spain </a></li>
            <li class="nav-item mb-3"><a href="#" class="nav-link footer-1-link p-0 "> Shipping to Germany </a></li>
          </ul>
        </div>

        <div class="col-md-3 ">
          <h4 class="py-3">Knowledge Hub</h4>
          <ul class="nav flex-column">
            <li class="nav-item mb-3"><a href="#" class="nav-link footer-1-link p-0 "> Logistics Know How </a></li>
            <li class="nav-item mb-3"><a href="#" class="nav-link footer-1-link p-0 "> Logistics News </a></li>
            <li class="nav-item mb-3"><a href="#" class="nav-link footer-1-link p-0 "> Local Solutions </a></li>
            <li class="nav-item mb-3"><a href="#" class="nav-link footer-1-link p-0 "> Logistics Trends & Events </a>
            </li>
            <li class="nav-item mb-3"><a href="#" class="nav-link footer-1-link p-0 "> Customer Stories </a></li>
          </ul>
        </div>

        <div class="col-md-3 ">
          <h4 class="py-3">Useful Links</h4>
          <ul class="nav flex-column">
            <li class="nav-item mb-3"><a href="#" class="nav-link footer-1-link p-0 "> Contact </a></li>
            <li class="nav-item mb-3"><a href="#" class="nav-link footer-1-link p-0 "> Services </a></li>
            <li class="nav-item mb-3"><a href="#" class="nav-link footer-1-link p-0 "> Terms and Conditions </a></li>
            <li class="nav-item mb-3"><a href="#" class="nav-link footer-1-link p-0 "> Why Us </a></li>
            <li class="nav-item mb-3"><a href="#" class="nav-link footer-1-link p-0 "> Careers </a></li>
          </ul>
        </div>

        <div class="col-md-3 ">
          <h4 class="py-3">Contact</h4>
          <ul class="nav flex-column">
            <li class="nav-item mb-3"><a href="#" class="nav-link footer-1-link p-0 "> Company Headquarter </a></li>
            <li class="nav-item mb-3"><a href="#" class="nav-link footer-1-link p-0 "> United States of America </a>
            </li>
            <li class="nav-item mb-3"><a href="#" class="nav-link footer-1-link p-0 "> Ney York 10 </a></li>
            <li class="nav-item mb-3"><a href="#" class="nav-link footer-1-link p-0 "> 2511 DP Den Haag </a></li>
            <li class="nav-item mb-3"><a href="#" class="nav-link footer-1-link p-0 "> courier@gmaile.com </a></li>
          </ul>
        </div>
      </footer>
    </div>



  </section>

  <section class="footer-2">
    <footer class="container footer-2-container  d-flex align-items-center">
      <div class="col-md-4 d-flex justify-content-center justify-content-md-start">
        <p class="footer2-paragraph">© 2023 TemplatesJungle. All rights reserved.</p>
      </div>

      <div class="col-md-4 text-center">
        <a href="https://templatesjungle.com/" class="text-decoration-none">
          <iconify-icon class="footer-2-icon px-2" icon="ri:facebook-fill"></iconify-icon>
        </a>
        <a href="https://templatesjungle.com/" class="text-decoration-none">
          <iconify-icon class="footer-2-icon px-2" icon="ri:twitter-fill"></iconify-icon>
        </a>
        <a href="https://templatesjungle.com/" class="text-decoration-none">
          <iconify-icon class="footer-2-icon px-2" icon="ri:instagram-fill"></iconify-icon>
        </a>
      </div>

      <div class="col-md-4">
        <p class="footer2-paragraph d-flex justify-content-center justify-content-md-end">HTML template by :<a
            href="https://templatesjungle.com/" class="text-white templatesjungle" target="_blank"> <u> TemplatesJungle
            </u> </a></p>
      </div>
    </footer>
  </section>



  <!-- Scripts  Starts -->
  <script src="<?php echo base_url('assets/user/js/jquery-1.11.0.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/user/js/plugins.js'); ?>"></script>
  <script src="<?php echo base_url('assets/user/js/script.js'); ?>"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.7/dist/iconify-icon.min.js"></script>
</body>

</html>