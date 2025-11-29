  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Halaman User menu</h1>
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
              <form role="form" action="<?= base_url; ?>/Menu/updateMenu" method="POST" enctype="multipart/form-data">

                <input type="hidden" name="menu_id" value="<?= $data['menu']['menu_id']; ?>">
                <div class="card-body">
                  <div class="form-group">
                    <label >Menu</label>
                    <input type="text" class="form-control" placeholder="masukkan Menu..." name="menu" value="<?= $data['menu']['menu']; ?>" readonly>
                  </div>
                  <div class="form-group">
                    <label >Menu Icon</label>
                    <input type="text" class="form-control" placeholder="masukkan Menu Icon..." name="menu_icon" value="<?= $data['menu']['menu_icon']; ?>" autofocus>
                  </div>
                  <div class="form-group">
                    <label >Is Active</label>
                    <select class="form-control input-sm" name="is_active">
                        <option <?php if($data['menu']['is_active'] == "1"){ echo "selected='selected'";} ?> value="1" />Active
                        <option <?php if($data['menu']['is_active'] == "0"){ echo "selected='selected'";} ?> value="0" />Non Active 
                    </select>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <a class="btn btn-secondary" href="<?= base_url; ?>/Menu" >Cancel</a>
                </div>
              </form>
            </div>


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->