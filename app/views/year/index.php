  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Report Year Setting</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="row">
        <div class="col-sm-12">
          <?php
            Flasher::Message();
          ?>
        </div>
    </div>
      <!-- Default box -->

      <div class="card">
        <div class="card-header">
          <h3 class="card-title"><?= $data['title'] ?></h3>
        </div>
        <div class="card-body">
          <form action="<?= base_url; ?>/Year/updateYear" method="post">
            <div class="row">
              <div class="col-md-12">
                <div class="input-group mb-3">
                  <div style="margin-left : 5px; width : 80px;">
                      <input name="year" class="mdb-select md-form form-control" type="number" min="1900" max="2099" step="1" value="<?= $data['year']['year'] ;?>" />
                  </div>
                  <div style="margin-left : 10px;">
                    <button class="btn btn-outline-primary" type="submit">Update Year!</button>
                    <a class="btn btn-outline-secondary" href="<?= base_url; ?>/Home">Back</a>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          Footer
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

