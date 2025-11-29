  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Halaman User</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="row">
        <div class="col-sm-12">
          <?php
            Flasher::Message();
          ?>
        </div>
      </div>
      <!-- Default box -->

      <div class="card">
        <div class="card-header">
          <h3 class="card-title"><?= $data['title'] ?></h3> <a href="<?= base_url; ?>/user/tambah" class="btn float-right btn-sm btn btn-primary"><i class="fas fa-plus" style="margin-right: 5px;"></i> New User</a>
        </div>
        <div class="card-body">
          <div class="table-responsive-sm text-small">
            <table id="user" class="table table-bordered" style="font-size:80%; border: 1px solid black; width: 100%;">   
            </table>
          </div>
          <style>
            .table tr { line-height: 10px; }
          </style>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          Footer
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

