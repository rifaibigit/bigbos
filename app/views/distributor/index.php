  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Halaman Distributor</h1>
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
          <h3 class="card-title"><?= $data['title'] ?></h3> <div class="btn-group float-right"><a href="<?= base_url; ?>/Distributor/tambah" class="btn float-right btn-sm btn btn-primary"><i class="fas fa-plus" style="margin-right: 5px;"></i> New Distributor</a></div>
        </div>
        <div class="card-body"> 
          <table id="dist" class="table table-bordered nowrap" style="font-size:85%; border: 1px solid black; width: 100%;">
            
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

  <script>
    $(document).ready(function() {
      $('#dist').DataTable({
        "ajax": "<?= base_url; ?>/Distributor/show",
        "columns": [
              { "title": "#", "data": "id" },
              { "title": "Code", "data": "cust_code" },
              { "title": "Distributor", "data": "distributor"},
              { "title": "Area", "data": "area" },
              { "title": "ASM", "data": "asm" },
              { "title": "PIC", "data": "pic" },
              { "title": "Buffer Stock", "data": "buffer_stock", "sClass": "text-right", "width": "50px" },
              { "title": "Lead Time", "data": "lead_time", "sClass": "text-right", "width": "50px" },
              { "title": "Active", 
                "data": "is_active", 
                "sClass": "text-center", 
                "render": function ( data, type, row ) {
                      if ( type === 'display' ) {
                          return '<input type="checkbox" class="editor-active" onclick="return false;" onkeydown="return false;">';
                      }
                      return data;
                  },
              },
              {
                "title": "Action",
                "data": "id",
                "width": "100px",
                "sClass": "text-center",
                "orderable": false,
                "mRender": function (data) {
                  return '<a href="<?= base_url; ?>/Distributor/edit/'+ data +'" style="margin-left : 10px;margin-right : 10px;"><i class="fas fa-edit" style="margin-left : 10px;margin-right : 10px;"></i></a> | <a href="<?= base_url; ?>/Distributor/hapus/'+ data +'" onclick="javascript:return confirm(\'Hapus data?\');" style="margin-left : 20px;margin-right : 10px;"><i class="fas fa-trash-alt" style="color:red" style="margin-left : 10px;margin-right : 10px;"></i></a>' ;
                          
                }
              }
        ],
        rowCallback: function ( row, data ) {
            // Set the checked state of the checkbox in the table
            $('input.editor-active', row).prop( 'checked', data.is_active == 1 );
        },
        "autoWidth": true,
        "responsive": true,
        "scrollY": true,
        "scrollX": true,
        "paging": true,
        "dom": 'Bfrtip',
        "lengthMenu": [
              [ 10, 25, 50, -1 ],
              [ '10 rows', '25 rows', '50 rows', 'Show all' ]
          ],
        "buttons": [
              'pageLength',
              { extend: 'excel', text: '<i class = "fa fa-download"> Excel</i>' },
        ],
      });
    });
  </script>

