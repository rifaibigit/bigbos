  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Halaman DC</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title"><?= $data['title']; ?></h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" action="<?= base_url; ?>/Dc/updateDc" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="id" value="<?= $data['dc']['id']; ?>">
          <div class="card-body">
            <div class="form-group">
              <label >Outlet Code</label>
              <input type="text" class="form-control" name="outlet_code" value="<?= $data['dc']['outlet_code']; ?>" readonly>
            </div>
            <div class="form-group">
              <label>Outlet Name</label>
              <input type="text" class="form-control" name="outlet_name" value="<?= $data['dc']['outlet_name']; ?>" readonly>
            </div>
            <div class="form-group">
              <label>Outlet Count</label>
              <input type="number" class="form-control" name="outlet_count" value="<?= $data['dc']['outlet_count']; ?>">
            </div>
          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a class="btn btn-secondary" href="<?= base_url; ?>/Dc">Cancel</a>
          </div>
        </form>
      </div>


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->