  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Halaman Channel</h1>
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
              <form role="form" action="<?= base_url; ?>/Channel/updateChannel" method="POST" enctype="multipart/form-data">

                <input type="hidden" name="id" value="<?= $data['channel']['id']; ?>">
                <div class="card-body">
                  <div class="form-group">
                    <label >Channel</label>
                    <input type="text" class="form-control" placeholder="masukkan Channel..." name="channel" value="<?= $data['channel']['channel']; ?>" readonly>
                  </div>
                  <div class="form-group">
                    <label >Description</label>
                    <input type="text" class="form-control" placeholder="masukkan Description..." name="desc_type" value="<?= $data['channel']['desc_type']; ?>" readonly>
                  </div>
                  <div class="form-group">
                    <label >Outlet Type</label>
                    <input type="text" class="form-control" placeholder="masukkan outlet type..." name="outlet_type" value="<?= $data['channel']['outlet_type']; ?>" autofocus>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <a class="btn btn-secondary" href="<?= base_url; ?>/Channel" >Cancel</a>
                </div>
              </form>
            </div>


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->