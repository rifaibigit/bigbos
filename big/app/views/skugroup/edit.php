  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Halaman SKU Group</h1>
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
              <form role="form" action="<?= base_url; ?>/SkuGroup/updateSkuGroup" method="POST" enctype="multipart/form-data">

                <input type="hidden" name="id" value="<?= $data['sku']['id']; ?>">
                <div class="card-body">
                    <div class="form-group">
                        <label>SKU Group</label>
                        <input type="text" class="form-control" placeholder="masukkan Kode SKU..." name="item_group" value="<?= $data['sku']['item_group']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label>Principal</label>
                        <input type="text" class="form-control" placeholder="masukkan Description..." name="principal" value="<?= $data['sku']['principal']; ?>" autofocus>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <a class="btn btn-secondary" href="<?= base_url; ?>/SkuGroup" >Cancel</a>
                </div>
              </form>
            </div>


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->