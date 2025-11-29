
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>BIG | Login</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- logo -->
  <link rel="icon" type="image/png" href="<?= base_url; ?>/dist/img/just logo.png" sizes="196x196" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url; ?>/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <!-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> -->
  <!-- icheck bootstrap -->
  <!-- <link rel="stylesheet" href="<?= base_url; ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css"> -->
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url; ?>/dist/css/style/style.css">
  <!-- <link rel="stylesheet" href="<?= base_url; ?>/dist/css/adminlte.css"> -->
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">
  <!-- <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet"> -->

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

</head>
<body class="hold-transition login-page" style="background-color: #ffffff;">

  <div class="preloader">
    <div class="loading">
      <div class="loader-style-1 panelLoad">
        <div><img src="<?= base_url; ?>/dist/img/BIG Rotate.gif" style="width:100px;"/></div>
      </div>
      <span class="cube-face"></span>
    </div>
  </div>

  <section class="ftco-section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-12 col-lg-9">
          <div class="wrap d-md-flex">
            <div class="text-wrap p-4 p-lg-5 text-center d-flex align-items-center order-md-last">
              <div class="text w-100">
                <img src="<?= base_url; ?>/dist/img/BIG-BOS2.jpg" class="img-fluid">
              </div>
        </div>
        <div class="login-wrap p-4 px-lg-5">
          <div class="d-flex">
            <div class="w-100">
              <h3 class="mb-4">
                <center><img src="<?= base_url; ?>/dist/img/B I G copy3.png" class="img-fluid"></center>
              </h3>
            </div>
          </div>
          <form action="<?= base_url; ?>/Login/prosesLogin" class="signin-form" method="post">
            <div class="form-group mb-3">
              <label class="label" for="name">Username</label>
              <input type="text" class="form-control" placeholder="Username" name="username" required>
            </div>
            <div class="form-group mb-3">
              <label class="label" for="password">Password</label>
              <input type="password" class="form-control" placeholder="Password" name="password" id="password" required>
                <!-- <span id="togglePassword" class="fas fa-lock field_icon"></span> -->
                <!-- <span class="fas fa-lock"></span> -->
            </div>
            <div class="form-group">
              <button type="submit" class="form-control btn btn-primary submit px-3" onclick="openLoader()">Log In</button>
            </div>
          </form>
          <div class="row">
            <div class="col-sm-12">
              <?php
                Flasher::Message();
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

<script>
  const togglePassword = document
      .querySelector('#togglePassword');

  const password = document.querySelector('#password');

  togglePassword.addEventListener('click', () => {

      // Toggle the type attribute using
      // getAttribure() method
      const type = password
          .getAttribute('type') === 'password' ?
          'text' : 'password';
            
      password.setAttribute('type', type);

      // Toggle the eye and bi-eye icon
      this.classList.toggle('fas fa-eye-slash');
  });
</script>

<!-- jQuery -->
<script src="<?= base_url; ?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url; ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<!-- <script src="<?= base_url; ?>/dist/js/adminlte.js"></script> -->
<script src="<?= base_url; ?>/plugins/popper/popper.js"></script>
<!-- <script src="js/main.js"></script> -->

<script>
    $(document).ready(function(){
      $(".preloader").fadeOut();
    })

    function openLoader(){
      $(".preloader").fadeIn();
    }

    function closeLoader(){
      $(".preloader").fadeOut();
    }
</script>

</body>
</html>
