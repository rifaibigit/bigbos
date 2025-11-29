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
              <form role="form" action="<?= base_url; ?>/sku/updateSku" method="POST" enctype="multipart/form-data">

                <input type="hidden" name="id" value="<?= $data['sku']['id']; ?>">
                <div class="card-body">
                    <div class="form-group">
                        <label >Kode SKU</label>
                        <input type="text" class="form-control" placeholder="masukkan Kode SKU..." name="item_code" value="<?= $data['sku']['item_code']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label >Description</label>
                        <input type="text" class="form-control" placeholder="masukkan Description..." name="item_name" value="<?= $data['sku']['item_name']; ?>" autofocus>
                    </div>
                    <div class="form-group">
                        <label >Unit</label>
                        <input type="text" class="form-control" placeholder="masukkan Unit..." name="item_name" value="<?= $data['sku']['unit']; ?>" >
                    </div>
                    <div class="form-group">
                      <label>Group SKU</label>
                      <select class="mdb-select md-form form-control" title="By Group SKU" id="dt_groupsku" name="by_group_sku" style="margin-left : 10px;">
                        <option value="">--</option>
                          <?php $no=1; ?>
                          <?php foreach ($data['item_group'] as $row) :?>
                            <option <?php if( $data['sku']['item_group']==$row['item_group']){echo "selected"; } ?> value="<?= $row['item_group'];?>"><b><?= $row['item_group'];?></b></option>
                          <?php $no++; endforeach; ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label >Principal</label>
                      <select class="mdb-select md-form form-control" title="By Principal" id="dt_principal" name="by_principal">
                        <option value="">--</option>
                          <?php $no=1; ?>
                          <?php foreach ($data['principal'] as $row) :?>
                            <option <?php if( $data['sku']['principal']==$row['principal']){echo "selected"; } ?> value="<?= $row['principal'];?>"><b><?= $row['principal'];?></b></option>
                          <?php $no++; endforeach; ?>
                      </select>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <a class="btn btn-secondary" href="<?= base_url; ?>/sku" >Cancel</a>
                </div>
              </form>
            </div>


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->