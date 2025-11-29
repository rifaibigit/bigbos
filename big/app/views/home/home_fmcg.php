  <main id="main">

    <!-- <div class="content" id="wrapper"> -->
    <!--==========================
    Intro Section
    ============================-->
    <section id="intro">
      <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100" style="height:60vh;" src="<?= base_url; ?>/dist/img/carousel_jordan1.jpg" alt="First slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" style="height:60vh;" src="<?= base_url; ?>/dist/img/carousel_lord1.jpg" alt="Second slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" style="height:60vh;" src="<?= base_url; ?>/dist/img/carousel_jordan2.jpg" alt="Third slide">
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
          <h2>About Us</h2>
        </div>

        <div class="row">
          <div class="col-lg-6 about-img">
            <img src="<?= base_url; ?>/dist/img/freezer n chiller/fmcg.png" alt="">
          </div>

          <div class="col-lg-6 content">
            <h2>FMCG Retail Distribution</h2>
            <h3>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</h3>

            <ul>
              <li><i class="ion-android-checkmark-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
              <li><i class="ion-android-checkmark-circle"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
              <li><i class="ion-android-checkmark-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.</li>
            </ul>
            <a href="<?= base_url; ?>/About/about_fmcg" class="btn btn-info" role="button">Read more >></a>
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
          <h2>Products</h2>
        </div>

        <div class="row">

          <div class="col-sm-4 ml-auto wow fadeInLeft" style="margin:5px;">
              <div class="card-box" style="height:200px;">
                <a href="<?= base_url; ?>/Product/lord">
                  <div style="display: flex;justify-content: center;height:100%;padding:15px;">
                    <img src="<?= base_url; ?>/dist/img/LORD logo.png" alt="">
                  </div>
                </a>
                  
              </div>
          </div>
          <div class="col-sm-4 mr-auto wow fadeInRight" style="margin:5px;">
              <div class="card-box" style="height:200px;">
                <a href="<?= base_url; ?>/Product/jordan">
                  <div style="display: flex;justify-content: center;height:100%;padding:15px;">
                    <img src="<?= base_url; ?>/dist/img/Jordan logo.png" alt="">
                  </div>
                </a>
              </div>
          </div>
        </div>
      </div>
    </section><!-- #products -->

    <!--==========================
      Clients Section
    ============================-->
    <section id="clients" class="wow fadeInUp">
      <div class="container">
        <div class="section-header">
          <h2>Clients</h2>
        </div>

        <!-- <div class="section-body">
          <div class="row">
            <div class="col-md-1 mx-auto">
              <center><img src="<?= base_url; ?>/dist/img/client/fmcg/aeon.png" alt=""></center>
            </div>
            <div class="col-md-1 mx-auto">
              <center><img src="<?= base_url; ?>/dist/img/client/fmcg/century.jpg" alt=""></center>
            </div>
            <div class="col-md-1 mx-auto">
              <center><img src="<?= base_url; ?>/dist/img/client/fmcg/farmers.png" alt=""></center>
            </div>
            <div class="col-md-2 my-auto">
              <center><img src="<?= base_url; ?>/dist/img/client/fmcg/FOODHALL-Logo.jpg" alt=""></center>
            </div>
            <div class="col-md-2 my-auto">
              <center><img src="<?= base_url; ?>/dist/img/client/fmcg/grand lucky.png" alt=""></center>
            </div>
            <div class="col-md-1 mx-auto">
              <center><img src="<?= base_url; ?>/dist/img/client/fmcg/gelael.jpg" alt=""></center>
            </div>
            <div class="col-md-1 mx-auto">
              <center><img src="<?= base_url; ?>/dist/img/client/fmcg/kem chicks.png" alt=""></center>
            </div>
            <div class="col-md-1 mx-auto">
              <center><img src="<?= base_url; ?>/dist/img/client/fmcg/logo-lottemart.jpg" alt=""></center>
            </div>
            <div class="col-md-2 mx-auto">
              <center><img src="<?= base_url; ?>/dist/img/client/fmcg/transmart - carrefour.png" alt=""></center>
            </div>
          </div>
        </div> -->

        <div class="owl-carousel clients-carousel">
          <img src="<?= base_url; ?>/dist/img/client/fmcg/aeon.png" alt="">
          <img src="<?= base_url; ?>/dist/img/client/fmcg/century.jpg" alt="">
          <img src="<?= base_url; ?>/dist/img/client/fmcg/farmers.png" alt="">
          <img src="<?= base_url; ?>/dist/img/client/fmcg/FOODHALL-Logo.jpg" alt="">
          <img src="<?= base_url; ?>/dist/img/client/fmcg/grand lucky.png" alt="">
          <img src="<?= base_url; ?>/dist/img/client/fmcg/gelael.jpg" alt="">
          <img src="<?= base_url; ?>/dist/img/client/fmcg/kem chicks.png" alt="">
          <img src="<?= base_url; ?>/dist/img/client/fmcg/logo-lottemart.jpg" alt="">
          <img src="<?= base_url; ?>/dist/img/client/fmcg/transmart - carrefour.png" alt="">
        </div>


      </div>
    </section><!-- #clients -->

    <!--==========================
      Services Section
    ============================-->
    <section id="services" class="wow fadeInUp">
      <div class="container">
        <div class="section-header">
          <h2>Services</h2>
        </div>

        <div class="row">

          <div class="col-lg-6">
            <div class="box wow fadeInLeft">
              <div class="icon"><img src="<?= base_url; ?>/dist/img/fast services.png" alt=""></div>
              <h4 class="title"><a href="">Fast Services</a></h4>
              <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident etiro rabeta lingo.</p>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="box wow fadeInRight">
              <div class="icon"><img src="<?= base_url; ?>/dist/img/call center.png" alt=""></div>
              <h4 class="title"><a href="">Responsive Call Center</a></h4>
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
          <h2>Contact Us</h2>
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
              <p><a href="tel:+622129573940">+62-21-2957-3940</a></p>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-email">
              <i class="ion-ios-email-outline"></i>
              <h3>Email</h3>
              <p><a href="mailto:mkt@bintanginterglobal.com">mkt@bintanginterglobal.com</a></p>
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