    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100" style="height:60vh;" src="<?= base_url; ?>/dist/img/carousel_about_us.jpg" alt="First slide">
        </div>
        <div class="col-md-12 mb">
          <center>  
            <div class="flip-box" style="margin-top:20px;">
              <div class="flip-box-inner">
                <div class="flip-box-front" style="padding:30px;">
                  <h2>Visi</h2>
                  <p>
                    PT. Bintang Inter Global didedikasikan untuk menjadi perusahaan publik di bidang penyedia chiller & freezer dan semua peralatan untuk industri makanan dan minuman dengan cakupan layanan penuh yang memenuhi kebutuhan pelanggan di Asia Pasifik pada tahun 2020.
                  </p>
                </div>
                <div class="flip-box-back" style="padding:30px;">
                  <h2>Misi</h2>
                </div>
              </div>
            </div>
          </center>
        </div>
      </div>
    </div>

    <style>
      body {
        font-family: Arial, Helvetica, sans-serif;
      }

      .flip-box {
        background-color: transparent;
        /* width: 60%; */
        min-width: 275px;
        max-width:700px;
        height: 300px;
        perspective: 1000px;
      }

      .flip-box-inner {
        position: relative;
        width: 100%;
        height: 100%;
        text-align: center;
        transition: transform 0.8s;
        transform-style: preserve-3d;
      }

      .flip-box:hover .flip-box-inner {
        transform: rotateY(180deg);
      }

      .flip-box-front, .flip-box-back {
        position: absolute;
        width: 100%;
        height: 100%;
        -webkit-backface-visibility: hidden;
        backface-visibility: hidden;
      }

      .flip-box-front {
        background-color: #dd3333;
        color: white;
      }

      .flip-box-back {
        background-color: #dd3333;
        color: white;
        transform: rotateY(180deg);
      }
    </style>

    <section id="about" class="wow fadeInUp">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 about-img">
            <img src="<?= base_url; ?>/dist/img/BIG Staff2.jpg" alt="">
          </div>

          <div class="col-lg-6 content">
            <h2>TENTANG KAMI</h2>
            <h3><b>PT. BINTANG INTER GLOBAL</b></h3>

            <p>
              PT. Bintang Inter Global adalah perusahaan yang bergerak di bidang Operation System Freezer & Chiller dan Sebagai principal Sikat & Pasta Gigi Merk Jordan, Alat Cukur Lord dan Kami juga mempunya Kantor Group yaitu PT Mitra Adikarya Solusindo (Semi Distributor Multi Produk Makanan & Minuman Ringan) Dan PT Bintang Multi Global.
            </p>

            <!-- <ul>
              <li><i class="ion-android-checkmark-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
              <li><i class="ion-android-checkmark-circle"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
              <li><i class="ion-android-checkmark-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.</li>
            </ul> -->

          </div>
        </div>

      </div>
    </section><!-- #about -->
  <!-- /.content-wrapper -->

  <!--==========================
      Area Section
    ============================-->
    <section id="area" class="wow fadeInUp">
      <div class="container">
        <div class="section-header">
          <h2>Coverage Area</h2>
        </div>

        <div class="area-map">
          <img src="<?= base_url; ?>/dist/img/area.png">
        </div>

      </div>
    </section><!-- #area -->

    <!--==========================
      Contact Section
    ============================-->
    <section id="contact" class="wow fadeInUp">
      <div class="container">
        <div class="section-header">
          <h2>Kontak Kami</h2>
        </div>

        <div class="row contact-info">

          <div class="col-md-4">
            <div class="contact-address">
              <i class="ion-ios-location-outline"></i>
              <h3>Address</h3>
              <address>Bizpark 2 Commercial Estate Blok C No.35, Penggilingan - Cakung, East Jakarta</address>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-phone">
              <i class="ion-ios-telephone-outline"></i>
              <h3>Phone Number</h3>
              <p>
                <a href="tel:+622129573941">+62-21-2957-3941</a>
              </p>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-email">
              <i class="ion-ios-email-outline"></i>
              <h3>Email</h3>
              <p>
                <a href="mailto:customer-care@bintanginterglobal.com">customer-care@bintanginterglobal.com</a>
              </p>
            </div>
          </div>

        </div>
      </div>

      <div class="container mb-4">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2307.9653638337377!2d106.93341242007432!3d-6.195743223911159!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e698b22925e64c5%3A0x6b0963d1d4ee5856!2sPT%20Bintang%20Inter%20Global!5e0!3m2!1sid!2sid!4v1638426181642!5m2!1sid!2sid" width="100%" height="380" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
      </div>

    </section><!-- #contact -->

    <script>
      $('#vision').flipbox({
          animationDuration: 400,
          animationEasing: 'ease',
          autoplay: false,
          autoplayReverse: false,
          autoplayWaitDuration: 3000,
          autoplayPauseOnHover: false
      });
    </script>