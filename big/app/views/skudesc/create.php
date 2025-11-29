  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Halaman SKU Description</h1>
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
              <form role="form" action="<?= base_url; ?>/SkuDesc/simpanSKU" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label>Kode</label>
                    <select class="mdb-select md-form form-control" title="Item Code" id="item_code" name="item_code" style="margin-left : 10px;">
                        <option value="">--</option>
                        <?php foreach ($data['sku'] as $row) :?>
                            <option value="<?= $row['item_code'];?>"><b><?= $row['item_code'];?></b></option>
                        <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Description in English</label>
                    <textarea class="form-control" name="desc_en" id="desc_en" style="height:500px;"></textarea>
                  </div>
                  <div class="form-group">
                    <label>Description in Bahasa Indonesia</label>
                    <textarea class="form-control" name="desc_id" id="desc_id" style="height:500px;"></textarea>
                  </div>
                  <div class="form-group">
                    <label>Picture</label>
                    <br>
                    <img src="<?= base_url; ?>/dist/img/fmcg/preview.png" id="preview" class="img-thumbnail" style="width:165px; height:243px;background-color:grey;margin-bottom:10px;">
                    <div class="custom-file mb-3">
                        <input type="file" class="form-control" id="img" name="img">
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <a class="btn btn-secondary" href="<?= base_url; ?>/SkuDesc" >Cancel</a>
                </div>
              </form>
            </div>


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <script>
    $('input[type="file"]').change(function(e) {
        var fileName = e.target.files[0].name;
        $("#file").val(fileName);

        var reader = new FileReader();
        reader.onload = function(e) {
            // get loaded data and render thumbnail.
            document.getElementById("preview").src = e.target.result;
        };
        // read the image file as a data URL.
        reader.readAsDataURL(this.files[0]);
    });

  </script>