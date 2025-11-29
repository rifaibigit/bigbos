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
        <form role="form" action="<?= base_url; ?>/Dc/simpanDc" method="POST" enctype="multipart/form-data">
          <div class="card-body">
            <div class="form-group">
              <label >Outlet Code</label>
              <input type="text" class="form-control" name="outlet_code" id="outlet_code" readonly>
            </div>
            <div class="form-group">
              <label>Outlet Name</label>
              <select class="mdb-select md-form form-control" title="By Outlet" name="outlet" id="dt_outlet" onchange="document.getElementById('outlet_name').value=this.options[this.selectedIndex].text" style="margin-left : 10px;">
                <option value="">--</option>
                <?php $no=1; ?>
                <?php foreach ($data['outlet'] as $row) :?>
                  <option value="<?= $row['outlet_code'];?>"><b><?= $row['outlet_name'];?></b></option>
                <?php $no++; endforeach; ?>
              </select>
            </div>
            <div class="form-group">
              <input type="hidden" class="form-control" name="outlet_name" id="outlet_name">
            </div>
            <div class="form-group">
              <label>Outlet Count</label>
              <input type="number" class="form-control" placeholder="masukkan outlet count..." name="outlet_count">
            </div>
          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a class="btn btn-secondary" href="<?= base_url; ?>/Dc" >Cancel</a>
          </div>
        </form>
      </div>


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <script>
    $("#dt_outlet").change(function(){
      $("#outlet_code").val($(this).val());
    }); 
	
  </script>
