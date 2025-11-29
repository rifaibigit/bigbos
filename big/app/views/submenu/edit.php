  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Halaman User Submenu</h1>
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
              <form role="form" action="<?= base_url; ?>/submenu/updatesubMenu" method="POST" enctype="multipart/form-data">

                <input type="hidden" name="id" value="<?= $data['sub_menu']['id']; ?>">
                <input type="hidden" name="menu_id" value="<?= $data['sub_menu']['menu_id']; ?>">
                <div class="card-body">
                  <div class="form-group">
                    <label >Menu</label>
                    <input type="text" class="form-control" placeholder="masukkan Menu..." name="menu" value="<?= $data['menu']['menu']; ?>" readonly>
                  </div>
                  <input type="hidden" name="sub_menu_id" value="<?= $data['sub_menu']['sub_menu_id']; ?>">
                  <div class="form-group">
                    <label >Sub Menu</label>
                    <input type="text" class="form-control" placeholder="masukkan Sub Menu..." name="sub_menu" value="<?= $data['sub_menu']['sub_menu']; ?>" autofocus>
                  </div>
                  <div class="form-group">
                    <label >URL</label>
                    <input type="text" class="form-control" placeholder="masukkan url.." name="url" value="<?= $data['sub_menu']['url']; ?>" >
                  </div>
                  <div class="form-group">
                    <label >Dashboard</label>
                    <select class="form-control input-sm" name="is_active">
                        <option <?php if($data['sub_menu']['is_active'] == "1"){ echo "selected='selected'";} ?> value="1" />Active
                        <option <?php if($data['sub_menu']['is_active'] == "0"){ echo "selected='selected'";} ?> value="0" />Non Active 
                    </select>
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