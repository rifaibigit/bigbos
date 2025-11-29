  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-xs-6">
            <h1>Selling Out - Raw Data</h1> 
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

            <div class="col-sm-12" style="display: flex; justify-content: flex-end">
              <form action="<?= base_url; ?>/Report/sellingout_RAW" enctype="multipart/form-data" method="POST" role="form">
                <?php
                    if(isset($data))
                    {
                        $region = $data['by_region'];
                        $area = $data['by_area'];
                        $dist_code = $data['by_dist_code'];
                        $big_code = $data['by_big_code'];
                        $outlet_name = $data['by_outlet_name'];
                        $month = $data['by_month'];
                        $year = $data['by_year'];
                    }
                    else
                    {
                        $region = "By Region";
                        $area = "By Area";
                        $dist_code = "By Distributor";
                    }
                ?>
                <div class="row">
                  <div class="input-group mb-3">
                    <div style="margin-left : 5px; width : 380px; margin-bottom: 5px;">
                        <div class="row">
                          <div class="col-sm-2 my-auto" style="width: 90px;">
                            OUTLET
                          </div>
                          <div class="col-sm-10" style="width: 350px;">
                            <input type="text" name="by_big_code" id="by_big_code" class="form-control" value="<?= $big_code;?>" hidden>
                            <div class="input-group" style="width:310px;height:3840pxpx;">
                              <input type="text" name="by_outlet_name" id="by_outlet_name" class="form-control otName" value="<?= $outlet_name;?>" style="width:70%;font-size:100%;height:40px;" readonly>
                              <div class="input-group-append">
                                <button type="button" id="btn_outlet" name="btn_outlet" class="btn btn-primary btnOT" data-toggle="modal" data-target="#outletModal" style="height:40px;">
                                  <i class="fas fa-search-plus fa-lg"></i>
                                </button>
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>
                    <div style="margin-left : 5px; width : 260px;">
                        <select class="mdb-select md-form form-control" title="By Distributor" id="dt_dist" name="by_dist_code" style="margin-left : 5px;">
                            <option value="">By Distributor</option>
                                <?php $no=1; ?>
                                <?php foreach ($data['dist'] as $row) :?>
                                        <option <?php if( $dist_code==$row['cust_code']){echo "selected"; } ?> value="<?= $row['cust_code'];?>"><?= $row['distributor'];?></option>
                                <?php $no++; endforeach; ?>
                        </select>
                    </div>
                    <div style="margin-left : 5px;width : 155px;">
                      <select class="mdb-select md-form form-control" title="By Area" name="by_area" id="dt_area" style="margin-left : 10px;width : 155px;">
                          <option value="">By Area</option>
                              <?php $no=1; ?>
                              <?php foreach ($data['area'] as $row) :?>
                                      <option <?php if($area==$row['area']){echo "selected"; } ?> value="<?= $row['area'];?>">  <?= $row['area'];?></option>
                              <?php $no++; endforeach; ?>
                      </select>
                    </div>
                    <div style="margin-left : 5px;width : 155px;">
                      <select class="mdb-select md-form form-control" title="By Region" name="by_region" id="dt_region" style="margin-left : 10px;width : 155px;">
                          <option value="">By Region</option>
                              <?php $no=1; ?>
                              <?php foreach ($data['region'] as $row) :?>
                                      <option <?php if($region==$row['region']){echo "selected"; } ?> value="<?= $row['region'];?>">  <?= $row['region'];?></option>
                              <?php $no++; endforeach; ?>
                      </select>
                    </div>
                    <div style="margin-left : 10px; width : 120px;">
                      <select id="dt_month" name="by_month" class="mdb-select xs-form form-control">
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
                        <input id="dt_year" name="by_year" class="mdb-select md-form form-control" type="number" min="1900" max="2099" step="1" value="<?= $year ;?>" />
                    </div>
                    <div style="margin-left : 5px;">
                        <button class="btn btn-outline-primary" type="submit">Go!</button>
                        <a class="btn btn-outline-secondary" href="<?= base_url; ?>/Report/sellingout_RAW">Reset</a>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>

          <div class="table-responsive-xs text-small">
            <table id="so_raw" class="table table-bordered nowrap" style="font-size:80%; border: 1px solid black;">

              <tfoot>
                  <tr>
                      <th class="text-center" style="vertical-align: middle;">#</th>
                      <th class="text-center" style="vertical-align: middle;">Tanggal</th>
                      <th class="text-center" style="vertical-align: middle;">Invoice</th>
                      <th class="text-center" style="vertical-align: middle;">Principal</th>
                      <th class="text-center" style="vertical-align: middle;">Code</th>
                      <th class="text-center" style="vertical-align: middle;">Distributor</th>
                      <th class="text-center" style="vertical-align: middle;">Area</th>
                      <th class="text-center" style="vertical-align: middle;">Region</th>
                      <th class="text-center" style="vertical-align: middle;">BIG Code</th>
                      <th class="text-center" style="vertical-align: middle;">Cust Code</th>
                      <th class="text-center" style="vertical-align: middle;">Cust Name</th>
                      <th class="text-center" style="vertical-align: middle;">Outlet Type</th>
                      <th class="text-center" style="vertical-align: middle;">Item Code</th>
                      <th class="text-center" style="vertical-align: middle;">Item Name</th>
                      <th class="text-center" style="vertical-align: middle;">Item Group</th>
                      <th class="text-center" style="vertical-align: middle;">Qty</th>
                      <th class="text-center" style="vertical-align: middle;">Value Exc</th>
                      <th class="text-center" style="vertical-align: middle;">Value Inc</th>
                      <th class="text-center" style="vertical-align: middle;">Salesman</th>
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

          <!-- Outlet Modal -->
          <div class="modal fade" id="outletModal" tabindex="-1" role="dialog" aria-labelledby="rejectModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content" style="width: 125%;height: 100%;">
                <div class="modal-header">
                  <h5 class="modal-title" id="outletModalLabel"><b>DATA OUTLET</b></h5>
                  <!-- <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button> -->
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form role="form" id="form_outlet" name="form_outlet">
                    <div class="form-group">
                      <div class="table-responsive-sm" style="margin-top: 10px;">
                        <table id="outlet" class="display table-striped table-sm nowrap" style="font-size:80%;width: 100%;">
                    
                        </table>
                      </div>
                      <!-- <input type="text" name="row" id="row" class="form-control" style="width:150px;font-size:100%;"> -->
                    </div>
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCEL</button>
                </div>
                
              </div>
            </div>
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

      var big_code = document.getElementById("by_big_code").value;
      var dist_code = document.getElementById("dt_dist").value;
      var area = document.getElementById("dt_area").value;
      var region = document.getElementById("dt_region").value;
      var month = document.getElementById("dt_month").value;
      var year = document.getElementById("dt_year").value;

      $('#so_raw tfoot th').each(function () {
          var title = $(this).text();
          $(this).html('<input type="text" class="text-center" placeholder="'+title+'" style="width: 100%" />');
      });

      tb_so_raw = $('#so_raw').DataTable({
        "retrieve": true,
        "language": { 
          "loadingRecords": "<img src='<?= base_url; ?>/dist/img/BIG Rotate.gif' style='width:50px;'/>Loading ..."
        },
        "ajax": {
            'type': 'POST',
            'url': '<?= base_url; ?>/Report/sellingout_RAW_show',
            'data': {'by_big_code': big_code, 'by_dist_code': dist_code, 'by_area': area, 'by_region': region, 'by_month': month, 'by_year': year},
          },
        "fnCreatedRow": function (row, data, index) {
          $('td', row).eq(0).html(index + 1);
        },
        "columns": [
              { "title": "#", "data": "id", "sClass": "text-center"},
              { "title": "Tanggal", "data": "tanggal", "sClass": "text-center"},
              { "title": "Principal", "data": "principal", "sClass": "text-center"},
              { "title": "Invoice", "data": "invoice", "sClass": "text-center"},
              { "title": "Code", "data": "kode_dist", "sClass": "text-center"},
              { "title": "Distributor", "data": "nama_dist", "sClass": "text-center"},
              { "title": "Area", "data": "area", "sClass": "text-center"},
              { "title": "Region", "data": "region", "sClass": "text-center"},
              { "title": "BIG Code", "data": "big_code", "sClass": "text-center"},
              { "title": "Cust Code", "data": "cust_code", "sClass": "text-center"},
              { "title": "Cust Name", "data": "cust_name", "sClass": "text-center"},
              { "title": "Outlet Type", "data": "outlet_type", "sClass": "text-center"},
              { "title": "Item Code", "data": "item_code", "sClass": "text-center"},
              { "title": "SKU", "data": "item_name", "sClass": "text-center"},
              { "title": "SKU Group", "data": "item_group", "sClass": "text-center"},
              { "title": "Qty", "data": "qty", "sClass": "text-right"},
              { "title": "Value Exc", "data": "value_exc", "sClass": "text-right"},
              { "title": "Value Inc", "data": "value_inc", "sClass": "text-right"},
              { "title": "Salesman", "data": "salesman", "sClass": "text-center"},
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

      $('#dt_region').change(function(){ 
        var id=$('#dt_region').val();
          $.ajax({
                  url : "<?= base_url; ?>/Report/showArea_ByRegion2",
                  method : "POST",
                  data : {id: id},
                  async : true,
                  success: function(data){
                      $('#dt_area').html(data);
                      $("#dt_area").val("").trigger("change");
                  }
              }
          );
          return false;
      });

    });
  </script>

  <script>
      tb_outlet = $('#outlet').DataTable({
        "ajax": "<?= base_url; ?>/Outlet/show2",
        "fnCreatedRow": function (row, data, index) {
        $('td', row).eq(0).html(index + 1);
        },
        "columns": [
              { "title": "#", "data": "id", "sClass": "text-center", "width": "10px" },
              { "title": "AREA", "data": "area", "sClass": "text-center", "width": "50px",},
              { "title": "BIG CODE", "data": "big_code", "sClass": "text-center","width": "70px",},
              { "title": "OUTLET CODE", "data": "outlet_code","width": "70px",},
              { "title": "OUTLET NAME", "data": "outlet_name","width": "300px",},
              { "title": "ALAMAT", "data": "alamat","width": "400px", },
              { "title": "OUTLET TYPE", "data": "outlet_type", "sClass": "text-center", "width": "90px",},
              { "title": "TOTAL OUTLET", "data": "total_outlet", "sClass": "text-center", "width": "100px",},
              { "title": "DIST CODE", "data": "dist_code", "sClass": "text-center", "width": "70px",},
              { "title": "DISTRIBUTOR", "data": "distributor", "sClass": "text-center", "width": "300px",},
              {
                "title": "Action",
                "data": null,
                "width": "70px",
                "sClass": "text-center",
                "orderable": false,
                "render": function (data) {
                  //return '<button type="button" onclick="select_outlet('+data.outlet_code+', '+data.outlet_code+')" class="btn btn-sm btn-primary"><i class="fa fa-check-circle"></i> Select</button>' ;
                  return '<button type="button" class="btn btn-sm btn-primary"><i class="fa fa-check-circle"></i> Select</button>' ;       
                }
              },
        ],
        "autoWidth": true,
        "responsive": false,
        "scrollY": true,
        "scrollX": true,
        "paging": true,
        "bDestroy": true,
        "fixedColumns":   {
            "leftColumns": 5,
            "rightColumns": 1,
        },
      });

      $('#outlet tbody').on('click', 'button', function () {
          var data = tb_outlet.row($(this).parents('tr')).data();
          select_outlet(data.big_code, data.outlet_name);
      });

      $(document).on('shown.bs.modal', '#outletModal', function () {
          tb_outlet.columns.adjust().draw();
      });
  </script>

  <script>
    function select_outlet(kode, outlet){
      document.getElementById("by_big_code").value = kode;
      document.getElementById("by_outlet_name").value = outlet;
      $("#outletModal").modal('hide');
    }
  </script>

