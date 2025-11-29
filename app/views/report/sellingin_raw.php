  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-xs-6">
            <h1>Selling In - Raw Data</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <?php
            Flasher::Message();
          ?>
        </div>
      </div>
      <!-- Default box -->

      <div class="card">
        <div class="card-body"> 
          <div class="row">
            <div class="col-sm-6">
              <!-- <form action="<?= base_url; ?>/SellingIn/importExcel" enctype="multipart/form-data" method="POST" role="form">
                <div class="row">
                  <div class="col-xs-5">
                    <div class="input-group mb-3">
                      <div class="custom-file">
                          <input type="file" name="file" id="file" class="form-control">
                      </div>
                      <div class="input-group-append">
                        <button class="btn btn-outline-primary" type="submit" name="save">Upload</button>
                      </div>
                      <div style="margin-left: 5px;">
                        <a href="<?= base_url; ?>/app/upload/Format Upload Data Selling In.xlsx" class="btn float-right btn btn-outline-success"><i class = "fa fa-download"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
              </form> -->
            </div>

            <div class="col-sm-6" style="display: flex; justify-content: flex-end">
              <form action="<?= base_url; ?>/Report/sellingin_RAW" enctype="multipart/form-data" method="POST" role="form">
                <?php
                    if(isset($data))
                    {
                        $month = $data['by_month'];
                        $year = $data['by_year'];
                    }
                ?>
                <div class="row">
                  <div class="input-group mb-3">
                    <div style="margin-left : 10px; width : 110px;">
                      <select name="by_month" class="mdb-select xs-form form-control">
                        <option <?php if( $month=='all' or $month=='All' ){echo 'selected'; } ?> value="all">All</option>
                        <option <?php if( $month=='1' or $month=='1' ){echo 'selected'; } ?> value="1">Januari</option>
                        <option <?php if( $month=='2' or $month=='2' ){echo 'selected'; } ?> value="2">Februari</option>
                        <option <?php if( $month=='3' or $month=='3' ){echo 'selected'; } ?> value="3">Maret</option>
                        <option <?php if( $month=='4' or $month=='4' ){echo 'selected'; } ?> value="4">April</option>
                        <option <?php if( $month=='5' or $month=='5' ){echo 'selected'; } ?> value="5">Mei</option>
                        <option <?php if( $month=='6' or $month=='6' ){echo 'selected'; } ?> value="6">Juni</option>
                        <option <?php if( $month=='7' or $month=='7' ){echo 'selected'; } ?> value="7">Juli</option>
                        <option <?php if( $month=='8' or $month=='8' ){echo 'selected'; } ?> value="8">Agustus</option>
                        <option <?php if( $month=='9' or $month=='9' ){echo 'selected'; } ?> value="9">September</option>
                        <option <?php if( $month=='10' or $month=='10'){echo 'selected'; } ?> value="10">Oktober</option>
                        <option <?php if( $month=='11' or $month=='11'){echo 'selected'; } ?> value="11">Nopember</option>
                        <option <?php if( $month=='12' or $month=='12'){echo 'selected'; } ?> value="12">Desember</option>
                      </select>
                    </div>
                    <div style="margin-left : 5px; width : 80px;">
                        <input name="by_year" class="mdb-select md-form form-control" type="number" min="1900" max="2099" step="1" value="<?= $year ;?>" />
                    </div>
                    <div style="margin-left : 5px;">
                        <button class="btn btn-outline-primary" type="submit">Go!</button>
                        <a class="btn btn-outline-secondary" href="<?= base_url; ?>/Report/sellingin_RAW">Reset</a>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>

          <div class="table-responsive-sm text-small">
            <table id="selling-in" class="table table-bordered nowrap" style="font-size:80%; border: 1px solid black; width: 100%;">
              <thead>
                  <tr>
                      <th class="text-center" style="vertical-align: middle;">#</th>
                      <th class="text-center" style="vertical-align: middle;">Tanggal</th>
                      <th class="text-center" style="vertical-align: middle;">Invoice</th>
                      <th class="text-center" style="vertical-align: middle;">Principal</th>
                      <th class="text-center" style="vertical-align: middle;">Cust Code</th>
                      <th class="text-center" style="vertical-align: middle;">Cust Name</th>
                      <th class="text-center" style="vertical-align: middle;">Item Code</th>
                      <th class="text-center" style="vertical-align: middle;">Item Name</th>
                      <th class="text-center" style="vertical-align: middle;">Qty</th>
                      <th class="text-center" style="vertical-align: middle;">Sale Price</th>
                      <th class="text-center" style="vertical-align: middle;">Value Exc</th>
                      <th class="text-center" style="vertical-align: middle;">Value Inc</th>
                      <th class="text-center" style="vertical-align: middle;">Create By</th>
                      <th class="text-center" style="vertical-align: middle;">Create Date</th>
                  </tr>
              </thead>
              <tbody>
                  <?php $no=1; ?>
                  <?php foreach ($data['sellingin'] as $row) :?>
                  <tr>
                      <td class="text-center"><?= $no; ?></td>
                      <td><?= $row['tanggal'];?></td>
                      <td><?= $row['invoice'];?></td>
                      <td><?= $row['principal'];?></td>
                      <td><?= $row['cust_code'];?></td>
                      <td><?= $row['cust_name'];?></td>
                      <td><?= $row['item_code'];?></td>
                      <td><?= $row['item_name'];?></td>
                      <td class="text-right"><?= number_format($row['qty'], 0);?></td>
                      <td class="text-right"><?= number_format($row['sale_price'], 2);?></td>
                      <td class="text-right"><?= number_format($row['value_exc'], 2);?></td>
                      <td class="text-right"><?= number_format($row['value_inc'], 2);?></td>
                      <td><?= $row['create_by'];?></td>
                      <td><?= $row['create_date'];?></td>
                  </tr>
                  <?php $no++; endforeach; ?>
              </tbody>
            </table>
            <style>
              .table tr { line-height: 10px; }
              .DTFC_LeftBodyLiner { overflow-x: hidden; }
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

