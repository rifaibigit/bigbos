  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Halaman User Sub Menu</h1>
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
              <form role="form" action="<?= base_url; ?>/submenu/simpansubMenu" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="form-group">
                        <label >Menu</label>
                        <select class="form-control input-sm" name="menu">
                            <option value="">--</option>
                            <?php foreach($data['menu'] as $row) : ?>
                                <option value="<?= $row['menu_id'];?>"><?= $row['menu'] ;?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label >Sub Menu</label>
                        <input type="text" class="form-control" placeholder="masukkan sub menu..." name="sub_menu" required>
                    </div>
                    <div class="form-group">
                        <label >URL</label>
                        <input type="text" class="form-control" placeholder="masukkan url..." name="url" required>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <a class="btn btn-secondary" href="<?= base_url; ?>/submenu" >Cancel</a>
                </div>
              </form>
            </div>


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->