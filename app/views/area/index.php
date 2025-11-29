  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Halaman Area</h1>
          </div>
          <!-- <div class="col-sm-6">
            <div class="float-right">Mater Data > Area</div>
          </div> -->
          
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
          <h3 class="card-title"><?= $data['title'] ?></h3> <div class="btn-group float-right"><a href="<?= base_url; ?>/Area/tambah" class="btn float-right btn-sm btn btn-primary"><i class="fas fa-plus" style="margin-right: 5px;"></i> New Area</a></div>
        </div>
        <div class="card-body"> 
          <div class="table-responsive-sm text-small">
            <table id="area" class="table table-bordered nowrap" style="font-size:85%; border: 1px solid black; width: 100%;">
              <thead>
                <tr>
                  <th class="text-center" style="vertical-align: middle;">#</th>
                  <th class="text-center" style="vertical-align: middle;">ISLAND</th>
                  <th class="text-center" style="vertical-align: middle;">REGION</th>
                  <th class="text-center" style="vertical-align: middle;">AREA</th>
                  <th class="text-center" style="vertical-align: middle;">ACTION</th>
                </tr>
              </thead>
              <tbody>
                  <?php $no=1; ?>
                  <?php foreach ($data['area'] as $row) :?>
                  <tr>
                      <td class="text-center" width="10"><?= $no; ?></td>
                      <td class="text-center"><?= $row['island'];?></td>
                      <td class="text-center"><?= $row['region'];?></td>
                      <td class="text-center"><?= $row['area'];?></td>
                      <td class="text-center" style="width:100px;"><a href="<?= base_url; ?>/Area/edit/<?= $row['id']; ?>" style="margin-left : 10px;margin-right : 10px;"><i class="fas fa-edit" style="margin-left : 10px;margin-right : 10px;"></i></a>
                        | <a href="<?= base_url; ?>/Area/hapus/<?= $row['id']; ?>" onclick="return confirm('Hapus Area <?= $row['area']; ?>?')" style="margin-left : 20px;margin-right : 10px;"><i class="fas fa-trash-alt" style="color:red" style="margin-left : 10px;margin-right : 10px;"></i></a>
                      </td>
                  </tr>
                  <?php $no++; endforeach; ?>
              </tbody>
            </table>

            <style>
            .table tr { line-height: 10px; }
            </style>

            <style>
              .dataTables_scrollHeadInner, .display{
                width:100%!important
              };
            </style>
          </div>
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

