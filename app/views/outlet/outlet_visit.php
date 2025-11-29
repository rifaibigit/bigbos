  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Halaman Outlet Visitasi</h1>
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
        <div class="card-body"> 
          <div class="table-responsive-sm text-small">
            <table id="outletVisit" class="table table-bordered" style="font-size:85%; border: 1px solid black;">

              <thead>
                  <tr>
                      <th class="text-center" style="vertical-align: middle;">#</th>
                      <th class="text-center" style="vertical-align: middle;">ISLAND</th>
                      <th class="text-center" style="vertical-align: middle;">REGION</th>
                      <th class="text-center" style="vertical-align: middle;">AREA</th>
                      <th class="text-center" style="vertical-align: middle;">BIG CODE</th>
                      <th class="text-center" style="vertical-align: middle;">CUST CODE</th>
                      <th class="text-center" style="vertical-align: middle;">CUST NAME</th>
                      <th class="text-center" style="vertical-align: middle;">ALAMAT</th>
                      <th class="text-center" style="vertical-align: middle;">OUTLET TYPE</th>
                      <th class="text-center" style="vertical-align: middle;">DIST CODE</th>
                      <th class="text-center" style="vertical-align: middle;">DISTRIBUTOR</th>
                      <th class="text-center" style="vertical-align: middle;">REGISTER DATE</th>
                      <!-- <th class="text-center" style="vertical-align: middle;">Action</th> -->
                  </tr>
              </thead>

              <tfoot>
                  <tr>
                      <th class="text-center" style="vertical-align: middle;">#</th>
                      <th class="text-center" style="vertical-align: middle;">ISLAND</th>
                      <th class="text-center" style="vertical-align: middle;">REGION</th>
                      <th class="text-center" style="vertical-align: middle;">AREA</th>
                      <th class="text-center" style="vertical-align: middle;">BIG CODE</th>
                      <th class="text-center" style="vertical-align: middle;">CUST CODE</th>
                      <th class="text-center" style="vertical-align: middle;">CUST NAME</th>
                      <th class="text-center" style="vertical-align: middle;">ALAMAT</th>
                      <th class="text-center" style="vertical-align: middle;">OUTLET TYPE</th>
                      <th class="text-center" style="vertical-align: middle;">DIST CODE</th>
                      <th class="text-center" style="vertical-align: middle;">DISTRIBUTOR</th>
                      <th class="text-center" style="vertical-align: middle;">REGISTER DATE</th>
                      <!-- <th class="text-center" style="vertical-align: middle;">Action</th> -->
                  </tr>
              </tfoot>
              
            </table>
            <div>
              <input type="text" name="json" id="json" class="form-control" style="font-size:100%;" hidden required>
            </div>

            <style>
              .table tr { line-height: 10px; }
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

      $('#outletVisit tfoot th').each(function () {
        var title = $(this).text();
        $(this).html('<input type="text" class="text-center" placeholder="'+title+'" style="width: 100%" />');
      });

      $('#outletVisit').DataTable({
        "retrieve": true,
        "language": { 
          "loadingRecords": "<img src='<?= base_url; ?>/dist/img/BIG Rotate.gif' style='width:50px;'/>Loading ..."
        },
        "ajax": "<?= base_url; ?>/Outlet/showVisit",
        "fnCreatedRow": function (row, data, index) {
          $('td', row).eq(0).html(index + 1);
        },
        "columns": [
              { "data": "big_code", "sClass": "text-center", "width": "10px" },
              { "data": "island", "sClass": "text-center", "width": "70px",},
              { "data": "region", "sClass": "text-center", "width": "70px",},
              { "data": "area", "sClass": "text-center", "width": "70px",},
              { "data": "big_code", "sClass": "text-center","width": "90px",},
              { "data": "outlet_code","width": "70px",},
              { "data": "outlet_name","width": "300px",},
              { "data": "alamat","width": "400px", },
              { "data": "outlet_type", "sClass": "text-center", "width": "90px",},
              { "data": "dist_code", "sClass": "text-center", "width": "70px",},
              { "data": "distributor", "sClass": "text-center", "width": "300px",},
              { "data": "register_date", "sClass": "text-center", "width": "100px",},
        ],
        // "fixedHeader": false,
        "autoWidth": true,
        "responsive": true,
        "scrollY": true,
        "scrollX": true,
        "paging": true,
        // "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
        "dom": 'Bfrtip',
        "lengthMenu": [
              [ 10, 25, 50, -1 ],
              [ '10 rows', '25 rows', '50 rows', 'Show all' ]
          ],
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

