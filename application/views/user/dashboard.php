  <!-- Hero Section Starts -->
  <section id="hero">
    <div class="hero container py-5 my-5">
      <div class="row flex-lg-row-reverse align-items-center g-5 mt-2 py-5">
        <div class="col-10 col-sm-4 col-lg-5 py-md-5 my-md-5" data-aos="fade-left">
          <img src="<?php echo base_url('assets/img/truk.png'); ?>" class="d-block mx-lg-auto img-fluid" style="filter: drop-shadow(15px 5px 5px orange);" alt="Bootstrap Themes" width="100%" height="100%" loading="lazy">
        </div>
        <div class="col-lg-7 col-sm-8 py-md-5 my-md-5" data-aos="fade-right">
          <h1 class=" lh-1 mb-3">Peduli Sampah untuk Lingkungan yang Lebih Sehat.</h1>
          <ul class="list-unstyled my-5">
            <li class="my-2">
              <h5>1 &nbsp; Pengambilan yang Terjadwal </h5>
            </li>
            <li class="my-2">
              <h5>2 &nbsp; Pendataan yang Akurat </h5>
            </li>
            <li class="my-2">
              <h5>3 &nbsp; Biaya yang Murah </h5>
            </li>
          </ul>
          <div class="">
            <a href="<?php echo site_url('user/login'); ?>" class="icon-link">
              <h5><b>Get Started</b></h5>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Feature Section Starts -->
  <section id="calender" data-aos="fade-up">
    <div class="container">
      <div class="row">
        <h1 class="mb-5 text-center" data-aos="fade-up">Jadwal Pengambilan Sampah</h1>
        <div class="row">
          <div class="col-md-12">
            <div id='calendar'></div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Services Section Starts -->
  <section id="services" class="my-5">
    <div class="container ">
      <h1 class="text-center my-5" data-aos="fade-up">Jenis-Jenis Sampah</h1>
      <div class="row py-1">
        <div class="col-md-3 mt-2" data-aos="fade-up">
          <div class="service-post py-5 px-5">
            <div class="feature-icon d-inline-flex align-items-center justify-content-center  fs-2 mb-3">
              <img src="<?php echo base_url('assets/img/organik.png'); ?>" style="width: 150px; height: 200px;" alt="">
            </div>
            <div class="text-align-center">
              <h3>Sampah Organik</h3>
              <p>Sampah organik merupakan sampah yang bisa terurai.
                <br />
                <br />
                Contoh:<br />
                - Sisa makanan<br />
                - Sisa sayur dan kulit buah<br />
                - Daun daunan<br />
                <br />
                Pengolahannya:<br />
                - Dibuat menjadi kompos<br />
                - Diubah menjadi biogas dan listrik<br />
                - Dibuat menjadi tambahan pakan hewan,dll
              </p><br />
            </div>
            <hr>
            <h2 class="text-center" style="font-weight: 700; color: green;">Rp. 10.000/kg</h2>
          </div>
        </div>
        <div class="col-md-3 mt-2" data-aos="fade-up">
          <div class="service-post py-5 px-5">
            <div class="feature-icon d-inline-flex align-items-center justify-content-center fs-2 mb-3">
              <img src="<?php echo base_url('assets/img/plastik.png'); ?>" style="width: 150px; height: 200px;" alt="">
            </div>
            <div class="text-align-center">
              <h3>Sampah Anorganik</h3>
              <p>Sampah anorganik adalah sampah yang sulit untuk membusuk dan tidak bisa terurai.<br /><br />
                Contoh:<br />
                - Plastik bekas<br />
                - Gelas bekas air mineral<br />
                - Botol minuman dan plastik,dll<br /><br />

                Pengolahannya:<br />
                - Dijadikan kerajinan tangan<br />
                - Diolah dan digunakan kembali menjadi produk baru seperti pot, tempat pensil, dll<br /></p>
            </div><br>
            <hr>
            <h2 class="text-center" style="font-weight: 700; color: red;">Rp. 15.000/kg</h2>
          </div>
        </div>
        <div class="col-md-3 mt-2" data-aos="fade-up">
          <div class="service-post py-5 px-5">
            <div class="feature-icon d-inline-flex align-items-center justify-content-center fs-2 mb-3">
              <img src="<?php echo base_url('assets/img/kertas.png'); ?>" style="width: 150px; height: 200px;" alt="">
            </div>
            <div class="text-align-center">
              <h3>Sampah Kertas</h3>
              <p>Sampah Kertas adalah Semua sampah yang memiliki bahan serat kayu (selulosa dan hemiselulosa) dari pohon<br /><br />

                Contoh:<br />
                - Kertas<br />
                - Kardus<br />
                - Koran<br /><br />

                Pengolahannya:<br />
                - Didaur Ulang menjadi kertas yang baru<br />
                - Dibuat menjadi Kompos<br />
                - Dijadikan kerajinan tangan<br /></p>
            </div><br>
            <hr>
            <h2 class="text-center" style="font-weight: 700; color: orange;">Rp. 5.000/kg</h2>
          </div>
        </div>
        <div class="col-md-3 mt-2" data-aos="fade-up">
          <div class="service-post py-5 px-5">
            <div class="feature-icon d-inline-flex align-items-center justify-content-center fs-2 mb-3">
              <img src="<?php echo base_url('assets/img/besi.png'); ?>" style="width: 150px; height: 200px;" alt="">
            </div>
            <div class="text-align-center">
              <h3>Sampah B3</h3>
              <p>Sampah B3 biasanya merupakan sisa dari pengolahan bahan yang berbahaya.<br /><br />

                Contoh:<br />
                - Sampah beling<br />
                - Kaca<br />
                - Bekas kemasan Desinfektan<br />
                - Bekas parfum atau pengharum ruangan<br />
                - Bekas detergen<br />
                - Lem<br />
                - Baterai,dll<br /><br />

                Pengolahannya:<br />
                - Diolah dengan cara thermal, stabilisasi, solidifikasi secara fisika, kimia, maupun biologi dengan cara teknologi bersih atau ramah lingkungan<br /></p>
            </div><br>
            <hr>
            <h2 class="text-center" style="font-weight: 700; color: grey;">Rp. 7.500/kg</h2>
          </div>
        </div>
      </div>

    </div>
  </section>

  <section id="pricing" class="pricing-content section-padding mb-5">
    <div class="container">
      <h1 class="text-center my-5" data-aos="fade-up">Harga Iuran Wajib</h1>
      <div class="row text-center">
        <div class="col-lg-4 col-sm-6 col-xs-12 wow fadeInUp mt-2" data-wow-duration="1s" data-wow-delay="0.1s" data-wow-offset="0" style="visibility: visible; animation-duration: 1s; animation-delay: 0.1s; animation-name: fadeInUp;" data-aos="zoom-in-up">
          <div class="pricing_design">
            <div class="single-pricing">
              <div class="price-head">
                <h2>1 Bulan</h2>
                <h1>Rp. 30.000</h1>
              </div>
            </div>
          </div>
        </div><!--- END COL -->
        <div class="col-lg-4 col-sm-6 col-xs-12 wow fadeInUp mt-2" data-wow-duration="1s" data-wow-delay="0.1s" data-wow-offset="0" style="visibility: visible; animation-duration: 1s; animation-delay: 0.1s; animation-name: fadeInUp;" data-aos="zoom-in-up">
          <div class="pricing_design">
            <div class="single-pricing">
              <div class="price-head">
                <h2>6 Bulan</h2>
                <h1>Rp. 150.000</h1>
              </div>
            </div>
          </div>
        </div><!--- END COL -->
        <div class="col-lg-4 col-sm-6 col-xs-12 wow fadeInUp mt-2" data-wow-duration="1s" data-wow-delay="0.1s" data-wow-offset="0" style="visibility: visible; animation-duration: 1s; animation-delay: 0.1s; animation-name: fadeInUp;" data-aos="zoom-in-up">
          <div class="pricing_design">
            <div class="single-pricing">
              <div class="price-head">
                <h2>1 Tahun</h2>
                <h1>Rp. 300.000</h1>
              </div>
            </div>
          </div>
        </div><!--- END COL -->
      </div><!--- END ROW -->
    </div><!--- END CONTAINER -->
  </section>