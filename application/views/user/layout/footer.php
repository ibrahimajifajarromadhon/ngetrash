<!-- Footer Section Starts -->
<section class="footer-2">
  <footer class="container footer-2-container  d-flex align-items-center">
    <div class="col-md-10 d-flex justify-content-center justify-content-md-start">
      <p class="footer2-paragraph">© 2023 NgeTrash. All rights reserved.</p>
    </div>

    <div class="col-md-2 text-center">
      <a href="#" class="text-decoration-none">
        <iconify-icon class="footer-2-icon px-2" icon="ri:facebook-fill"></iconify-icon>
      </a>
      <a href="#" class="text-decoration-none">
        <iconify-icon class="footer-2-icon px-2" icon="ri:twitter-fill"></iconify-icon>
      </a>
      <a href="#" class="text-decoration-none">
        <iconify-icon class="footer-2-icon px-2" icon="ri:instagram-fill"></iconify-icon>
      </a>
    </div>
  </footer>
</section>
<!-- mengatur peta diy -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBJ03mkue5yADYzuyq1Xzi0sVlRhsz3N8c&callback=initMap" async defer></script>
<script>
  var map;

  function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
      center: {
        lat: -7.8012,
        lng: 110.3648
      }, // Pusat peta di Yogyakarta
      zoom: 12 // Level zoom awal
    });

    // Tambahkan marker di Yogyakarta
    var marker = new google.maps.Marker({
      position: {
        lat: -7.8012,
        lng: 110.3648
      },
      map: map,
      title: 'Special Region of Yogyakarta',
      animation: google.maps.Animation.DROP
    });

    marker.addListener('click', function() {
      var infowindow = new google.maps.InfoWindow({
        content: marker.getTitle()
      });
      infowindow.open(map, marker);
    });
  }
</script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script>
  AOS.init();
</script>
<!-- Scripts  Starts -->
<script src="<?php echo base_url('assets/user/js/jquery-1.11.0.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/user/js/plugins.js'); ?>"></script>
<script src="<?php echo base_url('assets/user/js/script.js'); ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.7/dist/iconify-icon.min.js"></script>
</body>

</html>