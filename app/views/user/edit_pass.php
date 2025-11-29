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
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title"><?= $data['title']; ?></h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" action="<?= base_url; ?>/User/updatePassword" method="POST" enctype="multipart/form-data">

          <input type="hidden" name="id" value="<?= $data['user']['id']; ?>">
          <div class="card-body">
            <div class="form-group">
              <!-- <label >Nama</label> -->
              <input type="hidden" class="form-control" placeholder="masukkan nama..." name="nama" value="<?= $data['user']['nama']; ?>" readonly>
            </div>
            <div class="form-group">
              <!-- <label >Username</label> -->
              <input type="hidden" class="form-control" placeholder="masukkan username..." name="username" value="<?= $data['user']['username']; ?>" readonly>
            </div>
            <div class="form-group">
              <label >Password Lama</label>
              <input type="password" class="form-control" placeholder="masukkan password lama..." name="old_password">
            </div>
            <div class="form-group">
              <label >Password Baru</label>
              <input type="password" class="form-control" placeholder="masukkan password baru..." name="password">
            </div>
            <div class="form-group">
              <label >Ulangi Password</label>
              <input type="password" class="form-control" placeholder="ulangi password baru..." name="ulangi_password">
            </div>
          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a class="btn btn-secondary" href="<?= base_url; ?>/Home">Cancel</a>
          </div>
        </form>
      </div>
      
      <style>
          .select2-selection {
              height: 40px !important;
          }
          .select2-selection__arrow {
              margin: 5px;
          }
      </style>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->