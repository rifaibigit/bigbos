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
        <form role="form" action="<?= base_url; ?>/User/simpanUser" method="POST" enctype="multipart/form-data">
          <div class="card-body">
            <div class="form-group">
              <label >Nama</label>
              <input type="text" class="form-control" placeholder="masukkan nama..." name="nama">
            </div>
            <div class="form-group">
              <label >Username</label>
              <input type="text" class="form-control" placeholder="masukkan username..." name="username">
            </div>
            <div class="form-group">
              <label >Area</label>
              <select class="mdb-select form-control input-sm" name="area[]" multiple="multiple">
                  <option value="ALL">All</option>
                  <?php foreach($data['area'] as $row) : ?>
                      <option value="<?= $row['area'];?>"><?= $row['area'] ;?></option>
                  <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group">
              <label >Dashboard</label>
              <select class="form-control input-sm" name="dashboard">
                  <option value="1" />Active
                  <option value="0" />Non Active 
              </select>
            </div>
            <div class="form-group">
              <label >Password</label>
              <input type="password" class="form-control" placeholder="masukkan password..." name="password">
            </div>
            <div class="form-group">
              <label >Ulangi Password</label>
              <input type="password" class="form-control" name="ulangi_password">
            </div>
          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a class="btn btn-secondary" href="<?= base_url; ?>/User">Cancel</a>
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