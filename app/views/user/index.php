  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Halaman User</h1>
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
          <h3 class="card-title"><?= $data['title'] ?></h3> <a href="<?= base_url; ?>/User/tambah" class="btn float-right btn-sm btn btn-primary"><i class="fas fa-plus" style="margin-right: 5px;"></i> New User</a>
        </div>
        <div class="card-body">
          <div class="table-responsive-sm text-small">
            <table id="user" class="table table-bordered nowrap" style="font-size:85%; border: 1px solid black; width: 100%;"> 

            </table>
          </div>
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
    $('#user').DataTable({
      "ajax": "<?= base_url; ?>/User/show",
      "fnCreatedRow": function (row, data, index) {
			$('td', row).eq(0).html(index + 1);
			},
      "columns": [
            { "title": "#", "data": "id", "width": "10" },
            { "title": "Nama", "data": "nama"},
            { "title": "User Name", "data": "username" },
            { "title": "Area", "data": "area" },
            { "title": "Dashboard", 
              "data": "dashboard", 
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
                return '<a href="<?= base_url; ?>/User/edit/'+ data +'" style="margin-left : 10px;margin-right : 10px;"><i class="fas fa-edit" style="margin-left : 10px;margin-right : 10px;"></i></a> | <a href="<?= base_url; ?>/User/hapus/'+ data +'" onclick="javascript:return confirm(\'Hapus data?\');" style="margin-left : 20px;margin-right : 10px;"><i class="fas fa-trash-alt" style="color:red" style="margin-left : 10px;margin-right : 10px;"></i></a>' ;
                        
               }
            }
      ],
      rowCallback: function ( row, data ) {
            // Set the checked state of the checkbox in the table
            $('input.editor-active', row).prop( 'checked', data.dashboard == 1 );
      },
      "autoWidth": true,
      "responsive": true,
      "scrollY": true,
      "scrollX": true,
      "paging": true,

    });
  </script>

