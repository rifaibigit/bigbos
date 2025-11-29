  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Halaman Outlet</h1>
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
          <!-- <h3 class="card-title"><?= $data['title'] ?></h3> <div class="btn-group float-right"><a href="<?= base_url; ?>/Outlet/tambah" class="btn float-right btn-sm btn btn-primary"><i class="fas fa-plus" style="margin-right: 5px;"></i> New Outlet</a></div> -->
          <div class="row">
            <div class="col-sm-6">
              <form action="#" enctype="multipart/form-data" method="POST" role="form">
                <div class="input-group" style="width:450px;">
                  <div class="custom-file">
                      <input type="file" name="file_noo" id="file_noo" class="form-control">
                  </div>
                  <div class="input-group-append">
                    <!-- <button class="btn btn-outline-primary" type="submit" name="save">Upload</button> -->
                    <input type="button" class="btn btn-info" name="upload_noo" id="upload_noo" value="Upload NOO">
                  </div>
                  <div style="margin-left: 5px;">
                    <a href="<?= base_url; ?>/app/upload/Format Upload NOO.xlsx" class="btn float-right btn btn-outline-success"><i class = "fa fa-download"></i></a>
                  </div>
                </div>
              </form>
            </div>
            <div class="col-sm-6">
              <form action="#" enctype="multipart/form-data" method="POST" role="form">
                <div class="input-group float-right" style="width:500px;">
                  <div class="custom-file">
                      <input type="file" name="file_outlet" id="file_outlet" class="form-control">
                  </div>
                  <div class="input-group-append">
                    <!-- <button class="btn btn-outline-primary" type="submit" name="save">Upload</button> -->
                    <input type="button" class="btn btn-success" name="upload_outlet" id="upload_outlet" value="Upload BIG CODE Exist">
                  </div>
                  <div style="margin-left: 5px;">
                    <a href="<?= base_url; ?>/app/upload/Format Upload Outlet with BIG Code.xlsx" class="btn float-right btn btn-outline-success"><i class = "fa fa-download"></i></a>
                  </div>
                </div>
              </form>
              <!-- <div class="btn-group float-right">
                <a href="<?= base_url; ?>/Outlet/tambah" class="btn btn-sm btn-primary" style="color: white;">
                  <i class="fas fa-plus" style="margin-right: 5px;"></i> 
                  New Outlet
                </a>
              </div> -->
            </div>
          </div>
        </div>
        <div class="card-body"> 
          <div class="table-responsive-sm text-small">
            <table id="outlet" class="table table-bordered" style="font-size:85%; border: 1px solid black;">

              <thead>
                  <tr>
                      <th class="text-center" style="vertical-align: middle;">#</th>
                      <th class="text-center" style="vertical-align: middle;">AREA</th>
                      <th class="text-center" style="vertical-align: middle;">BIG CODE</th>
                      <th class="text-center" style="vertical-align: middle;">CUST CODE</th>
                      <th class="text-center" style="vertical-align: middle;">CUST NAME</th>
                      <th class="text-center" style="vertical-align: middle;">ALAMAT</th>
                      <th class="text-center" style="vertical-align: middle;">OUTLET TYPE</th>
                      <th class="text-center" style="vertical-align: middle;">TOTAL OUTLET</th>
                      <th class="text-center" style="vertical-align: middle;">DIST CODE</th>
                      <th class="text-center" style="vertical-align: middle;">DISTRIBUTOR</th>
                      <th class="text-center" style="vertical-align: middle;">Action</th>
                  </tr>
              </thead>

              <tfoot>
                  <tr>
                      <th class="text-center" style="vertical-align: middle;">#</th>
                      <th class="text-center" style="vertical-align: middle;">AREA</th>
                      <th class="text-center" style="vertical-align: middle;">BIG CODE</th>
                      <th class="text-center" style="vertical-align: middle;">CUST CODE</th>
                      <th class="text-center" style="vertical-align: middle;">CUST NAME</th>
                      <th class="text-center" style="vertical-align: middle;">ALAMAT</th>
                      <th class="text-center" style="vertical-align: middle;">OUTLET TYPE</th>
                      <th class="text-center" style="vertical-align: middle;">TOTAL OUTLET</th>
                      <th class="text-center" style="vertical-align: middle;">DIST CODE</th>
                      <th class="text-center" style="vertical-align: middle;">DISTRIBUTOR</th>
                      <th class="text-center" style="vertical-align: middle;">Action</th>
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

    const file_noo = document.getElementById('file_noo');

    file_noo.addEventListener('change', (event) => {

        if(!['application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'application/vnd.ms-excel'].includes(event.target.files[0].type))
        {
            Swal.fire('Error','Format file .xlsx atau .xls!','error');

            file_noo.value = '';

            return false;
        }

        var reader = new FileReader();

        reader.readAsArrayBuffer(event.target.files[0]);

        reader.onload = function(event){

            var data = new Uint8Array(reader.result);
            var work_book = XLSX.read(data, {type:'array'});
            var sheet_name = work_book.SheetNames;
            var sheet_data = XLSX.utils.sheet_to_json(work_book.Sheets[sheet_name[0]], {header:1});
            var XL_row_object = XLSX.utils.sheet_to_row_object_array(work_book.Sheets[sheet_name[0]]);
            var json_object = JSON.stringify(XL_row_object);

            if(sheet_data.length > 1)
            {

              if(sheet_data[0][1].toUpperCase() != "CUST_CODE" || sheet_data[0][2].toUpperCase() != "CUST_NAME" || sheet_data[0][3].toUpperCase() != "ADDRESS" || sheet_data[0][4].toUpperCase() != "AREA" || sheet_data[0][5].toUpperCase() != "OUTLET_TYPE" || sheet_data[0][6].toUpperCase() != "TOTAL_OUTLET" || sheet_data[0][7].toUpperCase() != "DIST_CODE" || sheet_data[0][8].toUpperCase() != "REGISTER_DATE")
              {
                Swal.fire('Error','Template file excel tidak sesuai!','error');

                file_noo.value = '';

                return false;
              }

              if(sheet_data.length > 10001)
              {
                Swal.fire('Error','Jumlah data tidak boleh lebih dari 10000 baris!!!','error');

                file_noo.value = '';

                return false;
              }

                document.getElementById('json').value = json_object;
                
            }
            else
            {
              Swal.fire('Error','Data NOO Kosong','error');

              file_noo.value = '';

              return false;
            }
        }
    }); 

  </script>

  <script>

    const file_outlet = document.getElementById('file_outlet');

    file_outlet.addEventListener('change', (event) => {

        if(!['application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'application/vnd.ms-excel'].includes(event.target.files[0].type))
        {
            Swal.fire('Error','Format file .xlsx atau .xls!','error');

            file_outlet.value = '';

            return false;
        }

        var reader = new FileReader();

        reader.readAsArrayBuffer(event.target.files[0]);

        reader.onload = function(event){

            var data = new Uint8Array(reader.result);
            var work_book = XLSX.read(data, {type:'array'});
            var sheet_name = work_book.SheetNames;
            var sheet_data = XLSX.utils.sheet_to_json(work_book.Sheets[sheet_name[0]], {header:1});
            var XL_row_object = XLSX.utils.sheet_to_row_object_array(work_book.Sheets[sheet_name[0]]);
            var json_object = JSON.stringify(XL_row_object);

            if(sheet_data.length > 1)
            {

              if(sheet_data[0][1].toUpperCase() != "BIG_CODE" || sheet_data[0][2].toUpperCase() != "CUST_CODE" || sheet_data[0][3].toUpperCase() != "CUST_NAME" || sheet_data[0][4].toUpperCase() != "ADDRESS" || sheet_data[0][5].toUpperCase() != "AREA" || sheet_data[0][6].toUpperCase() != "OUTLET_TYPE" || sheet_data[0][7].toUpperCase() != "TOTAL_OUTLET" || sheet_data[0][8].toUpperCase() != "DIST_CODE" || sheet_data[0][9].toUpperCase() != "REGISTER_DATE")
              {
                Swal.fire('Error','Template file excel tidak sesuai!','error');

                file_outlet.value = '';

                return false;
              }

              if(sheet_data.length > 10001)
              {
                Swal.fire('Error','Jumlah data tidak boleh lebih dari 10000 baris!!!','error');

                file_outlet.value = '';

                return false;
              }

                document.getElementById('json').value = json_object;
                
            }
            else
            {
              Swal.fire('Error','Data Outlet Kosong','error');

              file_outlet.value = '';

              return false;
            }
        }
    }); 

  </script>

  <script>
    $(document).ready(function(){
      $('#upload_noo').click(function(){ 
        //var file = document.getElementById("file").value;
        var json = document.getElementById("json").value;

        if(json == '')
        {
          Swal.fire('Error', 'File Excel belum diinput!!','error');
          return false;
        }
        else
        {
          Swal.fire({
            title: 'Upload Data NOO?',
            showCancelButton: true,
            confirmButtonText: 'Simpan',
            cancelButtonText: 'Batal',
            type: 'question',
          }).then((result) => {
            if (result.value) {
              $.ajax({
                type: 'POST',
                url:  '<?= base_url; ?>/Outlet/uploadNOO',
                data: {json:json},
                beforeSend: function() {
                  Swal.fire({
                    title: 'Uploading...',
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    showConfirmButton: false,
                    onOpen: () => {
                      Swal.showLoading()
                    },
                  })
                },
                success:function(response){
                  Swal.fire({
                      title: "Data NOO telah tersimpan.",
                      text: response,
                      type: "success"
                  }).then(function() {
                      window.location = "<?= base_url; ?>/Outlet";
                  });
                },
                error:function(xhr, status, exception){
                  Swal.fire('Error', xhr.responseText,'error');
                }
              });
            } 
          })
        }

      });
    });
  </script>

<script>
    $(document).ready(function(){
      $('#upload_outlet').click(function(){ 
        //var file = document.getElementById("file").value;
        var json = document.getElementById("json").value;

        if(json == '')
        {
          Swal.fire('Error', 'File Excel belum diinput!!','error');
          return false;
        }
        else
        {
          Swal.fire({
            title: 'Upload Data Outlet?',
            showCancelButton: true,
            confirmButtonText: 'Simpan',
            cancelButtonText: 'Batal',
            type: 'question',
          }).then((result) => {
            if (result.value) {
              $.ajax({
                type: 'POST',
                url:  '<?= base_url; ?>/Outlet/uploadOutlet',
                data: {json:json},
                beforeSend: function() {
                  Swal.fire({
                    title: 'Uploading...',
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    showConfirmButton: false,
                    onOpen: () => {
                      Swal.showLoading()
                    },
                  })
                },
                success:function(response){
                  Swal.fire({
                      title: "Data Outlet telah tersimpan.",
                      text: response,
                      type: "success"
                  }).then(function() {
                      window.location = "<?= base_url; ?>/Outlet";
                  });
                },
                error:function(xhr, status, exception){
                  Swal.fire('Error', xhr.responseText,'error');
                }
              });
            } 
          })
        }

      });
    });
  </script>

  <script>
    $(document).ready(function(){

      $('#outlet tfoot th').each(function () {
        var title = $(this).text();
        $(this).html('<input type="text" class="text-center" placeholder="'+title+'" style="width: 100%" />');
      });

      $('#outlet').DataTable({
        "retrieve": true,
        "language": { 
          "loadingRecords": "<img src='<?= base_url; ?>/dist/img/BIG Rotate.gif' style='width:50px;'/>Loading ..."
        },
        "ajax": "<?= base_url; ?>/Outlet/show",
        "fnCreatedRow": function (row, data, index) {
          $('td', row).eq(0).html(index + 1);
        },
        "columns": [
              { "data": "id", "sClass": "text-center", "width": "10px" },
              { "data": "area", "sClass": "text-center", "width": "50px",},
              { "data": "big_code", "sClass": "text-center","width": "70px",},
              { "data": "outlet_code","width": "70px",},
              { "data": "outlet_name","width": "300px",},
              { "data": "alamat","width": "400px", },
              { "data": "outlet_type", "sClass": "text-center", "width": "90px",},
              { "data": "total_outlet", "sClass": "text-center", "width": "100px",},
              { "data": "dist_code", "sClass": "text-center", "width": "70px",},
              { "data": "distributor", "sClass": "text-center", "width": "300px",},
              {
                "title": "Action",
                "data": "id", 
                "width": "100px",
                "sClass": "text-center",
                "orderable": false,
                "mRender": function (data) {
                  return '<a href="<?= base_url; ?>/Outlet/edit/'+ data +'" style="margin-left : 5px;margin-right : 5px;"><i class="fas fa-edit" style="margin-left : 5px;margin-right : 5px;"></i></a> | <a href="<?= base_url; ?>/Outlet/hapus/'+ data +'" onclick="javascript:return confirm(\'Hapus data?\');" style="margin-left : 10px;margin-right : 5px;"><i class="fas fa-trash-alt" style="color:red" style="margin-left : 5px;margin-right : 5px;"></i></a>' ;
                          
                 }
              }
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

