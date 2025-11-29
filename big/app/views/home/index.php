<!DOCTYPE html>
<html lang="en" style="height: 100%;width: 100%;">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Bintang Inter Global</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- logo -->
  <link rel="icon" type="image/png" href="<?= base_url; ?>/dist/img/just logo.png" sizes="196x196"/>
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url; ?>/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="<?= base_url; ?>/plugins/bootstrap/css/bootstrap.min.css">
  <!-- Libraries CSS Files -->
  <link href="<?= base_url; ?>/plugins/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?= base_url; ?>/plugins/lib/animate/animate.min.css" rel="stylesheet">
  <link href="<?= base_url; ?>/plugins/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="<?= base_url; ?>/plugins/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="<?= base_url; ?>/plugins/lib/magnific-popup/magnific-popup.css" rel="stylesheet">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800|Montserrat:300,400,700" rel="stylesheet">
  <!-- overlayScrollbars -->
  <!-- <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script> -->

  <!-- Main Stylesheet File -->
  <link href="<?= base_url; ?>/dist/css/style.css" rel="stylesheet">



  <!-- jQuery -->
  <script src="<?= base_url; ?>/plugins/jquery/jquery-3.5.1.js"></script>
  <!-- <script src="<?= base_url; ?>/plugins/jquery/jquery.min.js"></script> -->
  <!-- Bootstrap 4 -->
  <script src="<?= base_url; ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Template Main Javascript File -->
  <script src="<?= base_url; ?>/dist/js/main.js"></script>
  <!-- JavaScript Libraries -->
  <!-- <script src="<?= base_url; ?>/plugins/lib/jquery/jquery.min.js"></script> -->
  <script src="<?= base_url; ?>/plugins/lib/jquery/jquery-migrate.min.js"></script>
  <!-- <script src="<?= base_url; ?>/plugins/lib/bootstrap/js/bootstrap.bundle.min.js"></script> -->
  <script src="<?= base_url; ?>/plugins/lib/easing/easing.min.js"></script>
  <script src="<?= base_url; ?>/plugins/lib/superfish/hoverIntent.js"></script>
  <script src="<?= base_url; ?>/plugins/lib/superfish/superfish.min.js"></script>
  <script src="<?= base_url; ?>/plugins/lib/wow/wow.min.js"></script>
  <script src="<?= base_url; ?>/plugins/lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="<?= base_url; ?>/plugins/lib/magnific-popup/magnific-popup.min.js"></script>
  <script src="<?= base_url; ?>/plugins/lib/sticky/sticky.js"></script>
  
<!-- Google Font: Source Sans Pro -->
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <style type="text/css">
    .preloader {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: 9999;
      background-color: #fff;
    }
    .preloader .loading {
      position: absolute;
      left: 50%;
      top: 50%;
      transform: translate(-50%,-50%);
      font: 14px arial;
    }
  </style>

  <script>
    $(document).ready(function(){
      $(".preloader").fadeOut();
    })
  </script>


</head>

<body>
    <div id="header"></div>
    <div id="content">
      <div class="row align-items-center h-100">
        <div class="col-sm-6">
          <div class="card-flex shadow-lg wow fadeInLeft">
            <a href="<?= base_url; ?>/Home/FMCG">
              <center>
                <img class="img-fluid" src="<?= base_url; ?>/dist/img/freezer n chiller/menu_fmcg.png" alt="">
              </center>
            </a>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="card-flex shadow-lg wow fadeInRight">
            <a href="<?= base_url; ?>/Home/Rental">
              <center>
                <img class="img-fluid" src="<?= base_url; ?>/dist/img/freezer n chiller/menu_rental.png" alt="">
              </center>
            </a>
          </div>
        </div>
      </div>  
    </div>
    <div id="footer"></div>
</body>

<style>
  html { height: 100%; }
  body {
      height:100%;
      width:100%;
      /* background: #000000; */
      color: #FFFFFF;
      position:relative;
  }
  #header {
    background-image: url("<?= base_url; ?>/dist/img/Background/header_index.jpg");
    background-repeat: no-repeat;
    background-size: 100% 100%;
    /* padding:0; */
    height:125px;
    width:100%;
    top:0px;
    left:0px;
    position:fixed;
  }
  #footer {
    background-image: url("<?= base_url; ?>/dist/img/Background/footer_index.jpg");
    background-repeat: no-repeat;
    background-size: 100% 100%;
    height:125px;
    width:100%;
    bottom:0px;
    left:0px;
    position:fixed;
  }
  #content {
    height:510px;
    width:100%;
    background-image: url("<?= base_url; ?>/dist/img/Background/body_index.jpg");
    background-repeat: no-repeat;
    background-size: 100% 100%;
    padding: 0;
    margin: 0;
  }
  #content .row {
    margin-top: 0px;
    margin-bottom: 0px;
    padding:0;
    margin:0;
    width: 100%;
    height:100%;
  }

  @media (max-width: 400px) {
    html { height: 100%; }
    body {
      height:100%;
      /* background: #000000; */
      color: #FFFFFF;
      position:relative;
    }

    #header {
      background-image: url("<?= base_url; ?>/dist/img/Background/header_index_small.jpg");
      background-repeat: no-repeat;
      /* background-size: 100% 100%; */
      padding:0;
      height:70px;
      top:0px;
      left:0px;
      position:fixed;
    }

    .card-flex .img-fluid {
      height:200px;
      width:100%;
    }

    #footer {
      background-image: url("<?= base_url; ?>/dist/img/Background/footer_index_small.jpg");
      background-repeat: no-repeat;
      /* background-size: 100% 100%; */
      height:70px;
      bottom:0px;
      left:0px;
      position:fixed;
    }
  }
</style>

</html>