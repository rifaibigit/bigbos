  <main id="main">

    <!-- <div class="content-wrapper"> -->
    <!--==========================
    Intro Section
    ============================-->
    <section id="intro">
      <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100" style="height:60vh;" src="<?= base_url; ?>/dist/img/carousel1.jpg" alt="First slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" style="height:60vh;" src="<?= base_url; ?>/dist/img/carousel2.jpg" alt="Second slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" style="height:60vh;" src="<?= base_url; ?>/dist/img/carousel3.jpg" alt="Third slide">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </section>

    <!--==========================
      About Section
    ============================-->
    <section id="about" class="wow fadeInUp">
      <div class="container">
        <div class="section-header">
          <h2>Tentang Kami</h2>
        </div>

        <div class="row">
          <div class="col-lg-6 about-img">
            <img src="<?= base_url; ?>/dist/img/freezer n chiller/rental_about.png" alt="">
          </div>

          <div class="col-lg-6 content">
            <h2>Chiller & Freezer Rental</h2>
            <h3>PT. Bintang Inter Global menawarkan penyewaan chiller dan freezer untuk produk minuman dan makanan beku.</h3>

            <ul>
              <li><i class="ion-android-checkmark-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
              <li><i class="ion-android-checkmark-circle"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
              <li><i class="ion-android-checkmark-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.</li>
            </ul>
            <a href="<?= base_url; ?>/About/about_rental_id" class="btn btn-info" role="button">Selengkapnya >></a>
          </div>
          
        </div>

      </div>
    </section><!-- #about -->
    <!-- </div> -->
    <!-- /.content-wrapper -->

    <!--==========================
      Producs Section
    ============================-->
    <section id="products" class="wow fadeInUp">
      <div class="container">
        <div class="section-header">
          <h2>Produk</h2>
        </div>

        <div class="row">
          <?php foreach($data['sku'] as $row): ?>
            <div class="col-sm-3 wow fadeInLeft">
                <div class="card-box" style="margin-left:10px;margin-right:10px;margin-top:10px;margin-bottom:10px;padding-top:10px;padding-bottom:10px;width:250px;height:330px;">
                  <div class="card-body" style="height:220px;">
                    <a href="<?= base_url; ?>/Product/Fridge_ID/<?= $row['id'];?>">
                    <center><img src="<?= base_url; ?>/dist/img/freezer n chiller/<?= $row['img']; ?>" style="width:80%;margin-bottom:10px;" alt=""></center>
                  </div>
                  <div class="card-footer-flex" style="margin-top: 10px;background-color:white;height:50px;">
                    <center><h2><span class="badge badge-pill badge-dark shadow"><b><?= $row['item_name']; ?></b></span></h2></center>
                  </div>
                  </a>
                </div>
            </div>
          <?php endforeach;?>
        </div>

      </div>
    </section><!-- #services -->

    <!--==========================
      Clients Section
    ============================-->
    <section id="clients" class="wow fadeInUp">
      <div class="container">
        <div class="section-header">
          <h2>Klien</h2>
        </div>

        <div class="owl-carousel clients-carousel">
          <img src="<?= base_url; ?>/dist/img/client/belfoods.png" alt="">
          <img src="<?= base_url; ?>/dist/img/client/danone.png" alt="">
          <img src="<?= base_url; ?>/dist/img/client/BK.png" alt="">
          <img src="<?= base_url; ?>/dist/img/client/nestle.png" alt="">
          <img src="<?= base_url; ?>/dist/img/client/cp prima.png" alt="">
          <img src="<?= base_url; ?>/dist/img/client/knm.png" alt="">
          <img src="<?= base_url; ?>/dist/img/client/sreeya.png" alt="">
          <img src="<?= base_url; ?>/dist/img/client/sekar.png" alt="">
          <img src="<?= base_url; ?>/dist/img/client/jala.png" alt="">
          <img src="<?= base_url; ?>/dist/img/client/kml.png" alt="">
        </div>

      </div>
    </section><!-- #clients -->

    <!--==========================
      Services Section
    ============================-->
    <section id="services" class="wow fadeInUp">
      <div class="container">
        <div class="section-header">
          <h2>Pelayanan</h2>
        </div>

        <div class="row">

          <div class="col-lg-6">
            <div class="box wow fadeInLeft">
              <div class="icon"><img src="<?= base_url; ?>/dist/img/fast services.png" alt=""></div>
              <h4 class="title"><a href="">Pelayanan Cepat</a></h4>
              <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident etiro rabeta lingo.</p>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="box wow fadeInRight">
              <div class="icon"><img src="<?= base_url; ?>/dist/img/call center.png" alt=""></div>
              <h4 class="title"><a href="">Call Center Responsif</a></h4>
              <p class="description">Minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat tarad limino ata nodera clas.</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- #services -->

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
              <h3>Alamat</h3>
              <address>Bizpark 2 Commercial Estate Blok C No.35, Penggilingan - Cakung, Jakarta Timur</address>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-phone">
              <i class="ion-ios-telephone-outline"></i>
              <h3>No Telepon</h3>
              <p><a href="tel:+622129573941">+62-21-2957-3941</a></p> 
              <p><a href="https://api.whatsapp.com/send?phone=6285310212345" target="blank">+62-853-102-12345</a></p>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-email">
              <i class="ion-ios-email-outline"></i>
              <h3>Email</h3>
              <p><a href="mailto:customer-care@bintanginterglobal.com">customer-care@bintanginterglobal.com</a></p>
            </div>
          </div>

        </div>
      </div>

      <div class="container mb-4">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2307.9653638337377!2d106.93341242007432!3d-6.195743223911159!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e698b22925e64c5%3A0x6b0963d1d4ee5856!2sPT%20Bintang%20Inter%20Global!5e0!3m2!1sid!2sid!4v1638426181642!5m2!1sid!2sid" width="100%" height="380" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
      </div>

    </section><!-- #contact -->

<style>
  .card-box {
    display: inline-block;
    width: 100%;
    border: 0px solid #e6e6e6;
    border-bottom: 0px solid #b9babc;
    border-top-left-radius: 2px;
    border-top-right-radius: 2px;
    padding: 27px 30px 26px 30px;
    line-height: 1.3;
    transition: all 100ms ease-out;
  }
  .card-box:hover {
    box-shadow: 0px 0px 30px rgba(73, 78, 92, 0.15);
    transform: translateY(-10px);
    -webkit-transform: translateY(-10px);
    -moz-transform: translateY(-10px);
  }
  
</style>