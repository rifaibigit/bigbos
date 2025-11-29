<!DOCTYPE html>
<html lang="en" style="height: auto;wdth: auto;">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>BIG - <?= $data['title']; ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- logo -->
  <link rel="icon" type="image/png" href="<?= base_url; ?>/dist/img/just logo.png" sizes="196x196" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url; ?>/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- datatables -->
  <link rel="stylesheet" href="<?= base_url; ?>/plugins/datatables/1.10.25/jquery.dataTables.min.css">
  <link rel="stylesheet" href="<?= base_url; ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url; ?>/dist/css/adminlte.min.css">
   <!-- overlayScrollbars -->
   <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
   <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- Select 2 -->
  <link rel="stylesheet" href="<?= base_url; ?>/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?= base_url; ?>/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- row group -->
  <link rel="stylesheet" href="<?= base_url; ?>/plugins/datatables-rowgroup/css/rowGroup.bootstrap4.min.css">
  <!-- fixed columns -->
  <link rel="stylesheet" href="<?= base_url; ?>/plugins/datatables-fixedcolumns/css/fixedColumns.dataTables.min.css">
  <link rel="stylesheet" href="<?= base_url; ?>/plugins/datatables-fixedcolumns/css/fixedColumns.bootstrap4.min.css">
  <!-- Export Button -->
  <link rel="stylesheet" href="<?= base_url; ?>/plugins/datatables-buttons/css/buttons.dataTables.min.css">
  <!-- Date picker -->
  <link rel="stylesheet" href="<?= base_url; ?>/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">


<!-- jQuery -->
<script src="<?= base_url; ?>/plugins/jquery/jquery-3.5.1.js"></script>
<!-- <script src="<?= base_url; ?>/plugins/jquery/jquery.min.js"></script> -->
<!-- Bootstrap 4 -->
<script src="<?= base_url; ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url; ?>/dist/js/adminlte.min.js"></script>
<!-- dataTables -->
<script src="<?= base_url; ?>/plugins/datatables/1.10.25/jquery.dataTables.min.js"></script>
<script src="<?= base_url; ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url; ?>/dist/js/demo.js"></script>
<!-- Rowspan -->
<script src="<?= base_url; ?>/plugins/jquery-rowspanizer/jquery.rowspanizer.js"></script>
<!-- row group -->
<script src="<?= base_url; ?>/plugins/datatables-rowgroup/js/dataTables.rowGroup.min.js"></script>
<script src="<?= base_url; ?>/plugins/datatables-rowgroup/js/rowGroup.bootstrap4.min.js"></script>
<!-- Select 2 -->
<script src="<?= base_url; ?>/plugins/select2/js/select2.min.js"></script>
<!-- table2excel -->
<script src="<?= base_url; ?>/plugins/table2excel/jquery.table2excel.min.js"></script>

<!-- fixed columns -->
<script src="<?= base_url; ?>/plugins/datatables-fixedcolumns/js/dataTables.fixedColumns.min.js"></script>
<script src="<?= base_url; ?>/plugins/datatables-fixedcolumns/js/fixedColumns.bootstrap4.min.js"></script>

<!-- Export Button -->
<script src="<?= base_url; ?>/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url; ?>/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url; ?>/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url; ?>/plugins/jszip/jszip.min.js"></script>
<script src="<?= base_url; ?>/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url; ?>/plugins/pdfmake/vfs_fonts.js"></script>

<!-- Date picker -->
<script src="<?= base_url; ?>/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<script src="<?= base_url; ?>/plugins/moment/moment.min.js"></script>

  <!-- Chart -->
  <script src="<?= base_url; ?>/plugins/chart.js/Chart.bundle.js"></script>
  <script src="<?= base_url; ?>/plugins/chart.js/chartjs-plugin-labels.js"></script>
  <script src="<?= base_url; ?>/plugins/chart.js/chartjs-plugin-piechart-outlabels.min.js"></script>
  <!-- <script src="<?= base_url; ?>/plugins/chart.js/chartjs-plugin-datalabels.js"></script> -->
  <!-- <script src="<?= base_url; ?>/plugins/highchartTable/highcharts.js"></script> -->
  <!-- <script src="<?= base_url; ?>/plugins/highchartTable/jquery.highchartTable.js"></script> -->

<!-- tinymce -->
<script src="<?= base_url; ?>/plugins/tinymce/tinymce.min.js"></script> 

<!-- ckeditor -->
<script src="<?= base_url; ?>/plugins/ckeditor/ckeditor.js"></script> 


  
  

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

  <!-- <script>
    $(document).ready(function(){
      $(".preloader").fadeOut();
    })
  </script> -->


</head>
<body id="top" class="hold-transition sidebar-mini">

  <div class="preloader">
    <div class="loading">
      <div class="spinner-border" role="status">
	      <span class="sr-only">Loading...</span>
      </div>
    </div>
  </div>

<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?= $data['nama'];?>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <a href="<?= base_url; ?>/Logout" class="nav-link">Logout</a>
        </div>
      </li>
      <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="<?= base_url; ?>/Logout" class="nav-link">Logout</a>
      </li> -->
    </ul>
  </nav>
  <!-- /.navbar -->