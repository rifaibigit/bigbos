  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Halaman Distributor</h1>
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
              <form role="form" action="<?= base_url; ?>/Distributor/updateDist" method="POST" enctype="multipart/form-data">

                <input type="hidden" name="id" value="<?= $data['distributor']['id']; ?>">
                <div class="card-body">
                    <div class="form-group">
                        <label >Kode</label>
                        <input type="text" class="form-control" placeholder="masukkan Kode..." name="cust_code" value="<?= $data['distributor']['cust_code']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label >Distributor</label>
                        <input type="text" class="form-control" placeholder="masukkan distributor..." name="distributor" value="<?= $data['distributor']['distributor']; ?>" autofocus>
                    </div>
                    <div class="form-group">
                      <label >Area</label>
                      <select class="mdb-select md-form form-control" title="By Area" name="area" id="dt_area" style="margin-left : 10px;">
                        <?php $no=1; ?>
                        <?php foreach ($data['area'] as $row) :?>
                          <option <?php if( $data['distributor']['area']==$row['area']){echo "selected"; } ?> value="<?= $row['area'];?>"><b><?= $row['area'];?></b></option>
                        <?php $no++; endforeach; ?>
                      </select>
                    </div>
                    <div class="form-group">
                        <label >ASM</label>
                        <input type="text" class="form-control" placeholder="masukkan asm..." name="asm" value="<?= $data['distributor']['asm']; ?>" >
                    </div>
                    <div class="form-group">
                        <label >PIC</label>
                        <input type="text" class="form-control" placeholder="masukkan pic..." name="pic" value="<?= $data['distributor']['pic']; ?>" >
                    </div>
                    <div class="form-group">
                        <label >Buffer Stock</label>
                        <input type="number" class="form-control" placeholder="masukkan Buffer Stock..." name="buffer_stock" value="<?= $data['distributor']['buffer_stock']; ?>" >
                    </div>
                    <div class="form-group">
                        <label >Lead Time</label>
                        <input type="number" class="form-control" placeholder="masukkan Lead Time..." name="lead_time" value="<?= $data['distributor']['lead_time']; ?>" >
                    </div>
                    <div class="form-group">
                      <label >Active</label>
                      <select class="mdb-select md-form form-control" name="is_active" id="is_active" style="margin-left : 10px;">
                        <option value="">--</option>
                        <option <?php if( $data['distributor']['is_active']=="1"){echo "selected"; } ?> value="1"><b>Aktif</b></option>
                        <option <?php if( $data['distributor']['is_active']=="0"){echo "selected"; } ?> value="0"><b>Non-Aktif</b></option>
                      </select>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <a class="btn btn-secondary" href="<?= base_url; ?>/Distributor" >Cancel</a>
                </div>
              </form>
            </div>


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->