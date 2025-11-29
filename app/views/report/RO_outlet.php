  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>RO - Outlet</h1>  
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
                <form action="<?= base_url; ?>/Report/RO_outlet" id="convert_form" method="post">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="input-group mb-3">

                                <?php

                                if(isset($data))
                                {
                                    $principal = $data['by_principal'];
                                    $channel = $data['by_channel'];
                                    $outlet_type = $data['by_outlet_type'];
                                    $year = $data['by_year'];
                                    $month = $data['by_month'];
                                    $area = $data['by_area'];
                                }else
                                {
                                    $principal = "By Principal";
                                    $channel = "By Channel";
                                    $outlet_type = "By Outlet Type";
                                    $area = "By Area";
                                    
                                }

                                ?>
                                    <div style="width : 130px;">
                                        <select class="mdb-select md-form form-control" title="By Principal" id="principal" name="by_principal">
                                            <option value="">By Principal</option>
                                                <?php $no=1; ?>
                                                <?php foreach ($data['principal'] as $row) :?>
                                                    <option <?php if( $principal==$row['principal']){echo "selected"; } ?> value="<?= $row['principal'];?>"><b><?= $row['principal'];?></b></option>
                                                <?php $no++; endforeach; ?>
                                        </select>
                                    </div>
                                    <div style="margin-left : 5px;width : 130px;">
                                        <select class="mdb-select md-form form-control" title="By Channel" id="by_channel" name="by_channel" style="margin-left : 10px;">
                                            <option value="">By Channel</option>
                                                <?php $no=1; ?>
                                                <?php foreach ($data['channel'] as $row) :?>
                                                        <option <?php if( $channel==$row['channel']){echo "selected"; } ?> value="<?= $row['channel'];?>"><?= $row['channel'];?></option>
                                                <?php $no++; endforeach; ?>
                                        </select>
                                    </div>
                                    <div style="margin-left : 5px;width : 140px;">
                                        <select class="mdb-select md-form form-control" title="By Outlet Type" id="by_outlet_type" name="by_outlet_type" style="margin-left : 10px;">
                                            <option value="">By Outlet Type</option>
                                                <?php $no=1; ?>
                                                <?php foreach ($data['outlet_type'] as $row) :?>
                                                        <option <?php if( $outlet_type==$row['outlet_type']){echo "selected"; echo ' style="font-weight: bold;"'; } ?> value="<?= $row['outlet_type'];?>"><?= $row['outlet_type'];?></option>
                                                <?php $no++; endforeach; ?>
                                        </select>
                                    </div>
                                    <div style="margin-left : 5px;width : 155px;">
                                        <select class="select2-multiple2 md-form form-control" title="By Area" name="by_area[]" id="dt_area" style="margin-left : 10px;width : 155px;" multiple="multiple">
                                            <!-- <option value="">By Area</option> -->
                                                <?php $no=1; ?>
                                                <?php foreach ($data['area'] as $row) :?>
                                                        <option <?php if(in_array($row['area'], $area)){echo "selected"; } ?> value="<?= $row['area'];?>"><?= $row['area'];?></option>
                                                <?php $no++; endforeach; ?>
                                        </select>
                                    </div>
                                    <div style="margin-left : 10px; width:120px;">
                                        <select name="by_month" class="mdb-select md-form form-control" style="margin-left : 10px;">
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
                                    <!-- <div style="margin-left : 10px; width : 80px;">
                                        <input name="by_year" class="mdb-select md-form form-control" type="number" min="1900" max="2099" step="1" value="<?= $year ;?>" />
                                    </div> -->
                                    <div style="margin-left : 5px;">
                                        <button class="btn btn-outline-primary" type="submit">Go!</button>
                                        <a class="btn btn-outline-secondary" href="<?= base_url; ?>/Report/RO_outlet">Reset</a>
                                    </div>
                                    <div style="margin-left : 5px;">
                                        <button class="btn float-right btn btn-outline-success" type="submit" formaction="<?= base_url; ?>/Report/export_RO_Outlet"><i class = "fa fa-download"> Excel</i></button>
                                    </div>
                                    
                                    
                            </div>

                            <!-- <div id="hasil_sale_out"></div> -->
                            <div class="table-responsive-sm text-small" id="employee_table">
                                <table id="ro_outlet" class="table table-bordered table-sm nowrap" align="left" style="font-size:85%; border: 1px solid black;table-layout:fixed;">
                                    <thead class="table-warning">
                                        <tr>
                                            <th class="text-center" style="width: 5px; vertical-align: middle;">#</th>
                                            <th class="text-center" style="width: 50px;vertical-align: middle;">BIG Code</th>
                                            <th class="text-center" style="width: 350px; vertical-align: middle;">Outlet Name</th>
                                            <th class="text-center" style="width: 50px; vertical-align: middle;">Area</th>
                                            <th class="text-center" style="width: 50px; vertical-align: middle;">Outlet Type</th>
                                            <th class="text-center" style="width: 50px; vertical-align: middle;">RO</th>
                                            <th class="text-center" style="width: 250px; vertical-align: middle;">Distributor</th>
                                            <th class="text-center" style="width: 50px; vertical-align: middle;">DISTR</th>
                                            <th class="text-center" style="width: 50px; vertical-align: middle;">AO</th>
                                        </tr>
                                        <!-- <tr>
                                            <td class="text-center" style="width: 5px; vertical-align: middle;"></td>
                                            <td class="text-center" style="width: 50px;vertical-align: middle;"></td>
                                            <td class="text-center" style="width: 350px; vertical-align: middle;"></td>
                                            <td class="text-center" style="width: 50px; vertical-align: middle;"></td>
                                            <td class="text-center" style="width: 50px; vertical-align: middle;"></td>
                                            <td class="text-center" style="width: 50px; vertical-align: middle;"></td>
                                            <td class="text-center" style="width: 250px; vertical-align: middle;"></td>
                                        </tr> -->
                                    </thead>
                                    <tbody>
                                        <?php $no=1; ?>
                                        <?php foreach ($data['RO_outlet'] as $row) :?>
                                        <tr>
                                            <td class="text-center"><?= $no; ?></td>
                                            <td style="overflow: hidden;"><?= $row['big_code'];?></td>
                                            <td><?= $row['outlet_name'];?></td>
                                            <td class="text-center"><?= $row['area'];?></td>
                                            <td class="text-center"><?= $row['outlet_type'];?></td>
                                            <td class="text-center"><?= $row['ro'];?></td>
                                            <td class="text-center"><?= $row['distributor'];?></td>
                                            <td class="text-center" <?php if($row['distr'] === '0') {echo('style="background-color: pink;"');};?>><?= $row['distr'];?></td>
                                            <td class="text-center" <?php if($row['ao'] === '0') {echo('style="background-color: pink;"');};?>><?= $row['ao'];?></td>
                                        </tr>

                                        <?php 
                                            $ro += $row['ro'];
                                            $total_distr += $row['distr'];
                                            $total_ao += $row['ao'];
                                        ?>

                                        <?php $no++; endforeach; ?>

                                        <tr class="table-danger" style="font-weight:bold;">
                                            <td class="text-center"></td>
                                            <td></td>
                                            <td class="text-center">TOTAL</td>
                                            <td class="text-center"></td>
                                            <td class="text-center"></td>
                                            <td class="text-center"><?= number_format($ro);?></td>
                                            <td class="text-center"></td>
                                            <td class="text-center"><?= number_format($total_distr);?></td>
                                            <td class="text-center"><?= number_format($total_ao);?></td>
                                        </tr>
                                        
                                    </tbody>
                                    <!-- <tfoot align="center">
                                        <tr class="table-danger" style="font-weight:bold;">
                                            <th></th><th></th><th></th><th></th><th></th><th></th><th></th>
                                        </tr>
                                    </tfoot> -->
                                </table>
                                
                                <div>
                                    <br>
                                </div>
                                

                                <style>
                                    .table tr { line-height: 3px; }
                                    .DTFC_LeftBodyLiner { overflow-x: hidden; }
                                    .select2-selection {
                                        height: 40px !important;
                                    }
                                    .select2-selection__arrow {
                                        margin: 5px;
                                    }
                                    .table thead th {
                                        background-color: #ffeeba;
                                    }
                                </style>
                            
                            </div>
                        </div>
                    </div>
                </form>
                
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

<!-- <script>  
 $(document).ready(function(){  
      $('#create_excel').click(function(){  
           var excel_data = $('#employee_table').html();  
           var page = "<?= base_url; ?>/Report/export_sellingin_OT?data=" + excel_data;  
           window.location = page;  
      });  
 });  
 </script> -->

<!-- <script>  
 $(document).ready(function(){  
      $('#create_excel').click(function(){  
           var excel_data = $('#employee_table').html();  
           var page = "excel.php?data=" + excel_data;  
           window.location = page;  
      });  
 });  
 </script> -->



<!-- <script type="text/javascript">
 $(document).ready(function() {
  $('#export').click(function() {
   var table_content = '<table>';
   table_content += $('#sale_in_ot').html();
   table_content += '</table>';
   $('#file_content').val(table_content);
   $('#convert_form').html();
  });
 });
</script> -->

<script>
    $('#ro_outlet').DataTable({
        "scrollY": 400,
        "scrollX": true,
        "autoWidth": true,
        "responsive": true,
        "paging":   false,
        "ordering": false,
        "searching": false,
        "info": true,
        "orderCellsTop": true,
        "stateSave": true,
        /* "dom": 'Bfrtip',
        "buttons": [
                'excel',
        ] */
        // initComplete: function() {
        //     this.api()
        //     .columns([3, 4, 5, 6])
        //     .every(function() {
        //         var column = this;
        //         var select = $('<select class="form-control form-control--filter"><option value=""> -- Filter -- </option></select>')
        //         .appendTo($('thead tr:eq(1) td:eq(' + this.index() + ')'))
        //         .on('change', function() {
        //             var val = $.fn.dataTable.util.escapeRegex(
        //             $(this).val()
        //             );
        //             column
        //             .search(val ? '^' + val + '$' : '', true, false)
        //             .draw();
        //         });

        //         column.data().unique().sort().each(function(d, j) {
        //         if (!d == '') {
        //             select.append('<option value="' + d + '">' + d + '</option>');
        //         }
        //         });
        //     });
        // },
        // stateLoadParams: function(settings, data) {
        //     for (i = 0; i < data.columns["length"]; i++) {
        //     var col_search_val = data.columns[i].search.search;

        //     if (col_search_val != "") {
        //         var filterColumn = $("#ro_outlet thead tr:eq(1) td:eq(" + i + ") select");
        //         console.log(filterColumn, i);
        //     }
        //     }
        // },
        // "footerCallback": function ( row, data, start, end, display ) {
        //     var api = this.api(), data;
 
        //     // converting to interger to find total
        //     var intVal = function ( i ) {
        //         return typeof i === 'string' ?
        //             i.replace(/[\$,]/g, '')*1 :
        //             typeof i === 'number' ?
        //                 i : 0;
        //     };
 		
	    //     var friTotal = api
        //         .column( 5 )
        //         .data()
        //         .reduce( function (a, b) {
        //             return intVal(a) + intVal(b);
        //         }, 0 );
			
        //     $( api.column( 2 ).footer() ).html('TOTAL');
        //     $( api.column( 5 ).footer() ).html(friTotal);
        // },
    });
</script>
