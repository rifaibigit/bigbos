
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
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url; ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url; ?>/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page" style="background-image: url('<?= base_url; ?>/dist/img/Background/Background5.jpg');">
<div class="login-box">
  <div class="login-logo">
    <!-- <b>BIG</b>Report -->
    <img src="<?= base_url; ?>/dist/img/B I G copy.png" class="img-fluid">
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body" style="border-radius: 20px;">
      <h4><p class="login-box-msg"><b>BIG</b> Login</p></h4>

      <form action="<?= base_url; ?>/Login/prosesLogin" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="ketikkan username.." name="username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="ketikkan password.." name="password" id="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span id="togglePassword" class="fas fa-lock field_icon"></span>
              <!-- <span class="fas fa-lock"></span> -->
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
  <div class="row">
        <div class="col-sm-12">
          <?php
            Flasher::Message();
          ?>
        </div>
      </div>
</div>
<!-- /.login-box -->

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
<script src="<?= base_url; ?>/dist/js/adminlte.min.js"></script>

</body>
</html>
