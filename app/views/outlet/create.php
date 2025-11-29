  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Halaman Outlet</h1>
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
        <form role="form" action="<?= base_url; ?>/Outlet/simpanOutlet" method="POST" enctype="multipart/form-data">
          <div class="card-body">
            <div class="form-group">
              <label >Area</label>
              <select class="mdb-select md-form form-control" title="By Area" name="area" id="dt_area" style="margin-left : 10px;">
                <option value="">--</option>
                <?php $no=1; ?>
                <?php foreach ($data['area'] as $row) :?>
                  <option value="<?= $row['area'];?>"><b><?= $row['area'];?></b></option>
                <?php $no++; endforeach; ?>
              </select>
            </div>
            <div class="form-group">
              <label >Cust Code</label>
              <input type="text" class="form-control" placeholder="masukkan customer code..." name="outlet_code">
            </div>
            <div class="form-group">
              <label >Cust Name</label>
              <input type="text" class="form-control" placeholder="masukkan customer name..." name="outlet_name">
            </div>
            <div class="form-group">
              <label >Alamat</label>
              <textarea name="alamat" rows="3" class="form-control"><?= $data['outlet']['alamat']; ?></textarea>
            </div>
            <div class="form-group">
              <label >Outlet Type</label>
              <select class="mdb-select md-form form-control" title="By Outlet Type" id="by_outlet_type" name="outlet_type" style="margin-left : 10px;">
                <option value="">--</option>
                  <?php $no=1; ?>
                  <?php foreach ($data['outlet_type'] as $row) :?>
                    <option value="<?= $row['outlet_type'];?>"><b><?= $row['outlet_type'];?></b></option>
                  <?php $no++; endforeach; ?>
              </select>
            </div>
            <div class="form-group">
              <label >Total Outlet</label>
              <input type="number" class="form-control" placeholder="total outlet" name="total_outlet">
            </div>
            <div class="form-group">
              <label >Distributor Code</label>
              <select class="mdb-select md-form form-control" id="by_dist_code" name="dist_code" style="margin-left : 10px;">
                <option value="">--</option>
                  <?php $no=1; ?>
                  <?php foreach ($data['distributor'] as $row) :?>
                    <option value="<?= $row['cust_code'];?>"><b><?= $row['distributor'];?></b></option>
                  <?php $no++; endforeach; ?>
              </select>
            </div>
          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a class="btn btn-secondary" href="<?= base_url; ?>/Outlet" >Cancel</a>
          </div>
        </form>
      </div>


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->