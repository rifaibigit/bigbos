  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Halaman Channel</h1>
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
          <h3 class="card-title"><?= $data['title'] ?></h3> <div class="btn-group float-right"><a href="<?= base_url; ?>/Channel/tambah" class="btn float-right btn-sm btn btn-primary"><i class="fas fa-plus" style="margin-right: 5px;"></i> New Channel</a></div>
        </div>
        <div class="card-body"> 
          <table id="channel" class="table table-bordered nowrap" style="font-size:85%; border: 1px solid black; width: 100%;">
          <thead>
              <tr>
                <th class="text-center" style="vertical-align: middle;">#</th>
                <th class="text-center" style="vertical-align: middle;">CHANNEL</th>
                <th class="text-center" style="vertical-align: middle;">DESCRIPTION</th>
                <th class="text-center" style="vertical-align: middle;">OUTLET TYPE</th>
                <th class="text-center" style="vertical-align: middle;">ACTION</th>
              </tr>
            </thead>
            <tbody>
                <?php $no=1; ?>
                <?php foreach ($data['channel'] as $row) :?>
                <tr>
                    <td class="text-center" width="10"><?= $no; ?></td>
                    <td class="text-center"><?= $row['channel'];?></td>
                    <td class="text-center"><?= $row['desc_type'];?></td>
                    <td class="text-center"><?= $row['outlet_type'];?></td>
                    <td class="text-center" style="width:100px;"><a href="<?= base_url; ?>/Channel/edit/<?= $row['id']; ?>" style="margin-left : 10px;margin-right : 10px;"><i class="fas fa-edit" style="margin-left : 10px;margin-right : 10px;"></i></a>
                      | <a href="<?= base_url; ?>/Channel/hapus/<?= $row['id']; ?>" onclick="return confirm('Hapus Area <?= $row['area']; ?>?')" style="margin-left : 20px;margin-right : 10px;"><i class="fas fa-trash-alt" style="color:red" style="margin-left : 10px;margin-right : 10px;"></i></a>
                    </td>
                </tr>
                <?php $no++; endforeach; ?>
            </tbody>
          </table>

          <style>
            .table tr { line-height: 10px; }
          </style>
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

