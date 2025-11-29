  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Report Selling In - By Outlet</h1> 
                    <!-- <br>
                    <div class="row">
                        <h6 style="margin-left : 20px;">Principal : <b><?= $data['by_principal'] ;?></b></h6>
                        <h6 style="margin-left : 20px;">Channel : <b><?= $data['by_channel'] ;?></b></h6>
                        <h6 style="margin-left : 20px;">Outlet Type : <b><?= $data['by_outlet_type'] ;?></b></h6>
                    </div> -->
                    
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
                <form action="<?= base_url; ?>/Report/sellingin_OT" id="convert_form" method="post">
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
                                }else
                                {
                                    $principal = "By Principal";
                                    $channel = "By Channel";
                                    $outlet_type = "By Outlet Type";
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
                                                        <option <?php if( $channel==$row['channel']){echo "selected"; } ?> value="<?= $row['channel'];?>"><b><?= $row['channel'];?></b></option>
                                                <?php $no++; endforeach; ?>
                                        </select>
                                    </div>
                                    <div style="margin-left : 5px;width : 140px;">
                                        <select class="mdb-select md-form form-control" title="By Outlet Type" id="by_outlet_type" name="by_outlet_type" style="margin-left : 10px;">
                                            <option value="">By Outlet Type</option>
                                                <?php $no=1; ?>
                                                <?php foreach ($data['outlet_type'] as $row) :?>
                                                        <option <?php if( $outlet_type==$row['outlet_type']){echo "selected"; echo ' style="font-weight: bold;"'; } ?> value="<?= $row['outlet_type'];?>"><b><?= $row['outlet_type'];?></b></option>
                                                <?php $no++; endforeach; ?>
                                        </select>
                                    </div>
                                    <div style="margin-left : 10px; width : 80px;">
                                        <input name="by_year" class="mdb-select md-form form-control" type="number" min="1900" max="2099" step="1" value="<?= $year ;?>" />
                                    </div>
                                    <div style="margin-left : 5px;">
                                        <button class="btn btn-outline-primary" type="submit">Go!</button>
                                        <a class="btn btn-outline-secondary" href="<?= base_url; ?>/Report/sellingin_OT">Reset</a>
                                    </div>
                                    <div style="margin-left : 5px;">
                                        <button class="btn float-right btn btn-outline-success" type="submit" formaction="<?= base_url; ?>/Report/export_sellingin_OT"><i class = "fa fa-download"> Excel</i></button>
                                    </div>
                                    
                                    
                            </div>

                            <!-- <div id="hasil_sale_out"></div> -->
                            <div class="table-responsive-sm text-small" id="employee_table">
                                <table id="sale_in_ot" class="table table-bordered table-sm nowrap" align="left" style="font-size:85%; border: 1px solid black;table-layout:fixed;">
                                    <thead class="table-warning">
                                        <tr>
                                            <th rowspan="3" class="text-center" style="width: 5px; vertical-align: middle;">#</th>
                                            <th rowspan="3" class="text-center" style="vertical-align: middle;">Cust Code</th>
                                            <th rowspan="3" class="text-center" style="width: 200px; vertical-align: middle;">Outlet Name</th>
                                            <th rowspan="3" class="text-center" style="vertical-align: middle;">Outlet Type</th>
                                            <th rowspan="3" class="text-center" style="width: 50px; vertical-align: middle;">Area</th>
                                            <th colspan="24" class="text-center" style="vertical-align: middle;">Month</th>
                                            <th colspan="2" rowspan="2" class="text-center" style="width: 160px; vertical-align: middle; background-color: #FF6D6D;">Total</th>
                                            <th colspan="2" rowspan="2" class="text-center" style="width: 160px; vertical-align: middle; background-color: #7BFF6D">Average</th>
                                        </tr>
                                        <tr>
                                            <th colspan="2" class="text-center" style="width: 110px">January</th>
                                            <th colspan="2" class="text-center" style="width: 110px">February</th>
                                            <th colspan="2" class="text-center" style="width: 110px">March</th>
                                            <th colspan="2" class="text-center" style="width: 110px">April</th>
                                            <th colspan="2" class="text-center" style="width: 110px">May</th>
                                            <th colspan="2" class="text-center" style="width: 110px">June</th>
                                            <th colspan="2" class="text-center" style="width: 110px">July</th>
                                            <th colspan="2" class="text-center" style="width: 110px">August</th>
                                            <th colspan="2" class="text-center" style="width: 110px">September</th>
                                            <th colspan="2" class="text-center" style="width: 110px">October</th>
                                            <th colspan="2" class="text-center" style="width: 110px">November</th>
                                            <th colspan="2" class="text-center" style="width: 110px">December</th>
                                            <!-- <th colspan="2" class="text-center" style="width: 110px">Total</th>
                                            <th colspan="2" class="text-center" style="width: 110px">Average</th> -->
                                        </tr>

                                        <tr>
                                            <th class="text-center" style="width: 30px">Qty</th>
                                            <th class="text-center" style="width: 70px">Value</th>
                                            <th class="text-center" style="width: 30px">Qty</th>
                                            <th class="text-center" style="width: 70px">Value</th>
                                            <th class="text-center" style="width: 30px">Qty</th>
                                            <th class="text-center" style="width: 70px">Value</th>
                                            <th class="text-center" style="width: 30px">Qty</th>
                                            <th class="text-center" style="width: 70px">Value</th>
                                            <th class="text-center" style="width: 30px">Qty</th>
                                            <th class="text-center" style="width: 70px">Value</th>
                                            <th class="text-center" style="width: 30px">Qty</th>
                                            <th class="text-center" style="width: 70px">Value</th>
                                            <th class="text-center" style="width: 30px">Qty</th>
                                            <th class="text-center" style="width: 70px">Value</th>
                                            <th class="text-center" style="width: 30px">Qty</th>
                                            <th class="text-center" style="width: 70px">Value</th>
                                            <th class="text-center" style="width: 30px">Qty</th>
                                            <th class="text-center" style="width: 70px">Value</th>
                                            <th class="text-center" style="width: 30px">Qty</th>
                                            <th class="text-center" style="width: 70px">Value</th>
                                            <th class="text-center" style="width: 30px">Qty</th>
                                            <th class="text-center" style="width: 70px">Value</th>
                                            <th class="text-center" style="width: 30px">Qty</th>
                                            <th class="text-center" style="width: 70px">Value</th>
                                            <th class="text-center" style="width: 30px; background-color: #FF6D6D;">Qty</th>
                                            <th class="text-center" style="width: 70px; background-color: #FF6D6D;">Value</th>
                                            <th class="text-center" style="width: 30px; background-color: #7BFF6D">Qty</th>
                                            <th class="text-center" style="width: 70px; background-color: #7BFF6D">Value</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no=1; ?>
                                        <?php foreach ($data['sellingin_OT'] as $row) :?>
                                        <tr>
                                            <td class="text-center"><?= $no; ?></td>
                                            <td><?= $row['outlet_code'];?></td>
                                            <td><?= $row['outlet_name'];?></td>
                                            <td><?= $row['outlet_type'];?></td>
                                            <td class="text-center"><?= $row['area'];?></td>
                                            <td class="text-right"><?= number_format($row['qty_jan'], 0);?></td>
                                            <td class="text-right"><?= number_format($row['val_jan'], 2);?></td>
                                            <td class="text-right"><?= number_format($row['qty_feb'], 0);?></td>
                                            <td class="text-right"><?= number_format($row['val_feb'], 2);?></td>
                                            <td class="text-right"><?= number_format($row['qty_mar'], 0);?></td>
                                            <td class="text-right"><?= number_format($row['val_mar'], 2);?></td>
                                            <td class="text-right"><?= number_format($row['qty_apr'], 0);?></td>
                                            <td class="text-right"><?= number_format($row['val_apr'], 2);?></td>
                                            <td class="text-right"><?= number_format($row['qty_mei'], 0);?></td>
                                            <td class="text-right"><?= number_format($row['val_mei'], 2);?></td>
                                            <td class="text-right"><?= number_format($row['qty_jun'], 0);?></td>
                                            <td class="text-right"><?= number_format($row['val_jun'], 2);?></td>
                                            <td class="text-right"><?= number_format($row['qty_jul'], 0);?></td>
                                            <td class="text-right"><?= number_format($row['val_jul'], 2);?></td>
                                            <td class="text-right"><?= number_format($row['qty_agu'], 0);?></td>
                                            <td class="text-right"><?= number_format($row['val_agu'], 2);?></td>
                                            <td class="text-right"><?= number_format($row['qty_sep'], 0);?></td>
                                            <td class="text-right"><?= number_format($row['val_sep'], 2);?></td>
                                            <td class="text-right"><?= number_format($row['qty_okt'], 0);?></td>
                                            <td class="text-right"><?= number_format($row['val_okt'], 2);?></td>
                                            <td class="text-right"><?= number_format($row['qty_nop'], 0);?></td>
                                            <td class="text-right"><?= number_format($row['val_nop'], 2);?></td>
                                            <td class="text-right"><?= number_format($row['qty_des'], 0);?></td>
                                            <td class="text-right"><?= number_format($row['val_des'], 2);?></td>
                                            <td class="text-right"><?= number_format($row['qty_year'], 0);?></td>
                                            <td class="text-right"><?= number_format($row['val_year'], 2);?></td>
                                            <td class="text-right"><?= number_format($row['qty_year']/12, 0);?></td>
                                            <td class="text-right"><?= number_format($row['val_year']/12, 2);?></td>
                                        </tr>

                                        <?php $no++; endforeach; ?>
                                        
                                    </tbody>
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

<script>  
 $(document).ready(function(){  
      $('#create_excel').click(function(){  
           var excel_data = $('#employee_table').html();  
           var page = "<?= base_url; ?>/Report/export_sellingin_OT?data=" + excel_data;  
           window.location = page;  
      });  
 });  
 </script>

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
