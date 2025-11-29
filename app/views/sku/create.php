  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Halaman SKU</h1>
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
              <form role="form" action="<?= base_url; ?>/Sku/simpanSku" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label >Kode SKU</label>
                    <input type="text" class="form-control" placeholder="masukkan Kode..." name="item_code">
                  </div>
                  <div class="form-group">
                    <label >Description</label>
                    <input type="text" class="form-control" placeholder="masukkan Description..." name="item_name">
                  </div>
                  <div class="form-group">
                    <label >Unit</label>
                    <input type="text" class="form-control" placeholder="masukkan Unit..." name="unit">
                    <input type="text" class="form-control"  name="create_by" value="<?= $_SESSION['username'];?>" hidden>
                  </div>
                  <div class="form-group">
                    <label>Group SKU</label>
                    <select class="mdb-select md-form form-control" title="By Group SKU" id="dt_groupsku" name="item_group" style="margin-left : 10px;">
                      <option value="">--</option>
                        <?php $no=1; ?>
                        <?php foreach ($data['item_group'] as $row) :?>
                          <option value="<?= $row['item_group'];?>"><b><?= $row['item_group'];?></b></option>
                        <?php $no++; endforeach; ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label >Principal</label>
                    <select class="mdb-select md-form form-control" title="By Principal" id="dt_principal" name="principal">
                      <option value="">--</option>
                        <?php $no=1; ?>
                        <?php foreach ($data['principal'] as $row) :?>
                          <option value="<?= $row['principal'];?>"><b><?= $row['principal'];?></b></option>
                        <?php $no++; endforeach; ?>
                    </select>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <a class="btn btn-secondary" href="<?= base_url; ?>/Sku" >Cancel</a>
                </div>
              </form>
            </div>


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->