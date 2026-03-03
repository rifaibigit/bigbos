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
                      <select name="by_month" id="dt_month" class="mdb-select xs-form form-control">
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
                        <input name="by_year" id="dt_year" class="mdb-select md-form form-control" type="number" min="1900" max="2099" step="1" value="<?= $year ;?>" />
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
            <table id="si_raw" class="table table-bordered nowrap" style="font-size:80%; border: 1px solid black; width: 100%;">

              <tfoot>
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
                      <th class="text-center" style="vertical-align: middle;">Total Discount</th>
                      <th class="text-center" style="vertical-align: middle;">Value Exc</th>
                      <th class="text-center" style="vertical-align: middle;">Value Inc</th>
                      <th class="text-center" style="vertical-align: middle;">Create By</th>
                      <th class="text-center" style="vertical-align: middle;">Create Date</th>
                  </tr>
              </tfoot>
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

  <script>
    $(document).ready(function(){

      var month = document.getElementById("dt_month").value;
      var year = document.getElementById("dt_year").value;

      $('#si_raw tfoot th').each(function () {
          var title = $(this).text();
          $(this).html('<input type="text" class="text-center" placeholder="'+title+'" style="width: 100%" />');
      });

      tb_so_raw = $('#si_raw').DataTable({
        "retrieve": true,
        "language": { 
          "loadingRecords": "<img src='<?= base_url; ?>/dist/img/BIG Rotate.gif' style='width:50px;'/>Loading ..."
        },
        "ajax": {
            'type': 'POST',
            'url': '<?= base_url; ?>/Report/sellingin_RAW_show',
            'data': {'by_month': month, 'by_year': year},
          },
        "fnCreatedRow": function (row, data, index) {
          $('td', row).eq(0).html(index + 1);
        },
        "columns": [
              { "title": "#", "data": "id", "sClass": "text-center"},
              { "title": "Tanggal", "data": "tanggal", "sClass": "text-center"},
              { "title": "Invoice", "data": "invoice", "sClass": "text-center"},
              { "title": "Principal", "data": "principal", "sClass": "text-center"},
              { "title": "Cust Code", "data": "cust_code", "sClass": "text-center"},
              { "title": "Cust Name", "data": "cust_name", "sClass": "text-center"},
              { "title": "Item Code", "data": "item_code", "sClass": "text-center"},
              { "title": "SKU", "data": "item_name", "sClass": "text-center"},
              { "title": "Qty", "data": "qty", "sClass": "text-right"},
              { "title": "Sale Price", "data": "sale_price", "sClass": "text-right"},
              { "title": "Total Discount", "data": "total_diskon", "sClass": "text-right"},
              { "title": "Value Exc", "data": "value_exc", "sClass": "text-right"},
              { "title": "Value Inc", "data": "value_inc", "sClass": "text-right"},
              { "title": "Create By", "data": "create_by", "sClass": "text-center"},
              { "title": "Create Date", "data": "create_date", "sClass": "text-center"},
              
        ],
        "scrollY": 450,
        "scrollX": true,
        "autoWidth": false,
        "responsive": true,
        "pageResize": true,
        "paging": true,
        "info": true,
        "paging":   true,
        "lengthMenu": [200, 300, 400, 500],
        "pageLength": 200,
        // "fixedColumns":   {
        //     "leftColumns": 2
        // },
        "dom": 'Bfrtip',
        "buttons": [
              'pageLength',
              { extend: 'excel', text: '<i class = "fa fa-download"> Excel</i>' },
        ],
        initComplete: function () {
          // Apply the search
          this.api()
              .columns()
              .every(function () {
                  var that = this;

                  $('input', this.footer()).on('keyup change clear', function () {
                      if (that.search() !== this.value) {
                          that.search(this.value).draw();
                      }
                  });
              });
        },
      });

    });
  </script>

