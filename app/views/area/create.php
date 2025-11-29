  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Halaman Area</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- <div class="col-sm-4"> -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title"><?= $data['title']; ?></h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form role="form" action="<?= base_url; ?>/Area/simpanArea" method="POST" enctype="multipart/form-data">
            <div class="card-body">
              <div class="form-group">
                <label >Island</label>
                <input type="text" class="form-control" placeholder="masukkan island..." name="island">
              </div>
              <div class="form-group">
                <label >Region</label>
                <input type="text" class="form-control" placeholder="masukkan region..." name="region">
              </div>
              <div class="form-group">
                <label >Area</label>
                <input type="text" class="form-control" placeholder="masukkan area..." name="area">
              </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
              <a class="btn btn-secondary" href="<?= base_url; ?>/Area" >Cancel</a>
            </div>
          </form>
        </div>
      <!-- </div> -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->