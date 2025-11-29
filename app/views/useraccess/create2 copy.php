  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Halaman User Sub Menu</h1>
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
              <form role="form" action="<?= base_url; ?>/useraccess/simpanUserAccess" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="form-group">
                        <label >User</label>
                        <select class="mdb-select md-form form-control input-sm" name="user">
                            <option value="">--</option>
                            <?php foreach($data['user'] as $row) : ?>
                                <option value="<?= $row['id'];?>"><?= $row['username'] ;?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label >Menu</label>
                        <select class="mdb-select md-form form-control input-sm" name="menu" id="menu">
                            <option value="">--</option>
                            <?php foreach($data['menu'] as $row) : ?>
                                <option value="<?= $row['menu_id'];?>"><?= $row['menu'] ;?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label >Sub Menu</label>
                        <select class="mdb-select md-form form-control input-sm" id="submenu" name="sub_menu[]" multiple="multiple">
                            <!-- <option value="">--</option> -->
                            <?php foreach($data['menu'] as $row) : ?>
                                <optgroup label="<?= $row['menu'] ;?>">
                                <?php foreach($data['sub_menu'] as $row2) : ?>
                                    <?php if($row['menu'] != $row2['menu']){ ;?>
                                        <?php continue;?>
                                    <?php } else {;?>
                                        <option value="<?= $row2['sub_menu_id'];?>"><?= $row2['sub_menu'] ;?></option>
                                    <?php };?>
                                <?php endforeach; ?>
                                </optgroup>
                            <?php endforeach; ?>
                        </select>
                        <!-- <input type="text" class="form-control" placeholder="masukkan sub menu..." name="sub_menu" required> -->
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <a class="btn btn-secondary" href="<?= base_url; ?>/useraccess" >Cancel</a>
                </div>
              </form>
            </div>


    </section>

    <style>
        .select2-selection {
            height: 40px !important;
        }
        .select2-selection__arrow {
            margin: 5px;
        }
    </style>

    <script>
      
    </script>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->