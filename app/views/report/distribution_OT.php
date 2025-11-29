  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Distribution - Outlet</h1>  
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
                <form action="<?= base_url; ?>/Report/Distribution_OT" id="convert_form" method="post">
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
                                    <div style="margin-left : 5px;width : 155px;">
                                        <select class="select2-multiple2 md-form form-control" title="By Area" name="by_area[]" id="dt_area" style="margin-left : 10px;width : 155px;" multiple="multiple">
                                            <!-- <option value="">By Area</option> -->
                                                <?php $no=1; ?>
                                                <?php foreach ($data['area'] as $row) :?>
                                                        <option <?php if(in_array($row['area'], $area)){echo "selected"; } ?> value="<?= $row['area'];?>"><b><?= $row['area'];?></b></option>
                                                <?php $no++; endforeach; ?>
                                        </select>
                                    </div>
                                    <div style="margin-left : 10px; width : 80px;">
                                        <input name="by_year" class="mdb-select md-form form-control" type="number" min="1900" max="2099" step="1" value="<?= $year ;?>" />
                                    </div>
                                    <div style="margin-left : 5px;">
                                        <button class="btn btn-outline-primary" type="submit">Go!</button>
                                        <a class="btn btn-outline-secondary" href="<?= base_url; ?>/Report/Distribution_OT">Reset</a>
                                    </div>
                                    <div style="margin-left : 5px;">
                                        <button class="btn float-right btn btn-outline-success" type="submit" formaction="<?= base_url; ?>/Report/export_distribution_OT"><i class = "fa fa-download"> Excel</i></button>
                                    </div>  
                            </div>

                            <!-- <div id="hasil_sale_out"></div> -->
                            <div style="margin-left : 5px;width: 1500px;">
                                <b>NOTE</b> : Jika <b>total angka distribusi</b> berbeda (lebih kecil) dari data di <b>summary</b>.
                                        Kemungkinan <b>Kode Outlet / Total Outlet</b> "tidak ada (tidak sesuai)" di <b>master data outlet</b>. Mohon di cek kembali!.
                            </div>
                            <div class="table-responsive-sm text-small">
                                <table id="distr_ot" class="table table-bordered table-sm nowrap" align="left" style="font-size:85%; border: 1px solid black;table-layout:fixed;">
                                    <thead class="table-warning">
                                        <tr>
                                            <th rowspan="2" class="text-center" style="width: 5px; vertical-align: middle;">#</th>
                                            <th rowspan="2" class="text-center" style="width: 70px;vertical-align: middle;">BIG Code</th>
                                            <th rowspan="2" class="text-center" style="width: 400px; vertical-align: middle;">Outlet Name</th>
                                            <th rowspan="2" class="text-center" style="width: 50px; vertical-align: middle;">Area</th>
                                            <th colspan="12" class="text-center" style="vertical-align: middle;">Month</th>
                                        </tr>
                                        <tr>
                                            <th class="text-center" style="width: 30px; vertical-align: middle;">Jan</th>
                                            <th class="text-center" style="width: 30px; vertical-align: middle;">Feb</th>
                                            <th class="text-center" style="width: 30px; vertical-align: middle;">Mar</th>
                                            <th class="text-center" style="width: 30px; vertical-align: middle;">Apr</th>
                                            <th class="text-center" style="width: 30px; vertical-align: middle;">May</th>
                                            <th class="text-center" style="width: 30px; vertical-align: middle;">Jun</th>
                                            <th class="text-center" style="width: 30px; vertical-align: middle;">Jul</th>
                                            <th class="text-center" style="width: 30px; vertical-align: middle;">Aug</th>
                                            <th class="text-center" style="width: 30px; vertical-align: middle;">Sep</th>
                                            <th class="text-center" style="width: 30px; vertical-align: middle;">Oct</th>
                                            <th class="text-center" style="width: 30px; vertical-align: middle;">Nov</th>
                                            <th class="text-center" style="width: 30px; vertical-align: middle;">Dec</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no=1; ?>
                                        <?php foreach ($data['sellingin_OT'] as $row) :?>
                                        <tr>
                                            <td class="text-center"><?= $no; ?></td>
                                            <td style="overflow: hidden;"><?= $row['big_code'];?></td>
                                            <td><?= $row['cust_name'];?></td>
                                            <td class="text-center"><?= $row['area'];?></td>
                                            <td class="text-center"><?= number_format($row['qty_jan'], 0);?></td>
                                            <td class="text-center"><?= number_format($row['qty_feb'], 0);?></td>
                                            <td class="text-center"><?= number_format($row['qty_mar'], 0);?></td>
                                            <td class="text-center"><?= number_format($row['qty_apr'], 0);?></td>
                                            <td class="text-center"><?= number_format($row['qty_mei'], 0);?></td>
                                            <td class="text-center"><?= number_format($row['qty_jun'], 0);?></td>
                                            <td class="text-center"><?= number_format($row['qty_jul'], 0);?></td>
                                            <td class="text-center"><?= number_format($row['qty_agu'], 0);?></td>
                                            <td class="text-center"><?= number_format($row['qty_sep'], 0);?></td>
                                            <td class="text-center"><?= number_format($row['qty_okt'], 0);?></td>
                                            <td class="text-center"><?= number_format($row['qty_nop'], 0);?></td>
                                            <td class="text-center"><?= number_format($row['qty_des'], 0);?></td>
                                        </tr>

                                        <?php 
                                            $total_jan += $row['qty_jan'];
                                            $total_feb += $row['qty_feb'];
                                            $total_mar += $row['qty_mar'];
                                            $total_apr += $row['qty_apr'];
                                            $total_mei += $row['qty_mei'];
                                            $total_jun += $row['qty_jun'];
                                            $total_jul += $row['qty_jul'];
                                            $total_agu += $row['qty_agu'];
                                            $total_sep += $row['qty_sep'];
                                            $total_okt += $row['qty_okt'];
                                            $total_nop += $row['qty_nop'];
                                            $total_des += $row['qty_des'];
                                        ?>

                                        <?php $no++; endforeach; ?>

                                        <tr class="table-danger" style="font-weight:bold;">
                                            <td class="text-center"></td>
                                            <td></td>
                                            <td class="text-center">TOTAL</td>
                                            <td class="text-center"></td>
                                            <td class="text-center"><?= number_format($total_jan, 0);?></td>
                                            <td class="text-center"><?= number_format($total_feb, 0);?></td>
                                            <td class="text-center"><?= number_format($total_mar, 0);?></td>
                                            <td class="text-center"><?= number_format($total_apr, 0);?></td>
                                            <td class="text-center"><?= number_format($total_mei, 0);?></td>
                                            <td class="text-center"><?= number_format($total_jun, 0);?></td>
                                            <td class="text-center"><?= number_format($total_jul, 0);?></td>
                                            <td class="text-center"><?= number_format($total_agu, 0);?></td>
                                            <td class="text-center"><?= number_format($total_sep, 0);?></td>
                                            <td class="text-center"><?= number_format($total_okt, 0);?></td>
                                            <td class="text-center"><?= number_format($total_nop, 0);?></td>
                                            <td class="text-center"><?= number_format($total_des, 0);?></td>
                                        </tr>
                                        
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

<!-- <script>  
 $(document).ready(function(){  
      $('#create_excel').click(function(){  
           var excel_data = $('#employee_table').html();  
           var page = "<?= base_url; ?>/Report/export_sellingin_OT?data=" + excel_data;  
           window.location = page;  
      });  
 });  
</script> -->

<script>  
    $(document).ready(function() {
        $('#distr_ot').DataTable({
            "scrollY": 500,
            "scrollX": true,
            "autoWidth": true,
            "responsive": true,
            "paging":   false,
            "ordering": false,
            "searching": false,
            "info":     false,
            "fixedColumns":   {
                    "leftColumns": 4
            },
            // "dom": 'Bfrtip',
            // "buttons": [
            //   'pageLength',
            //   { extend: 'excel', 
            //     text: '<i class = "fa fa-download"> Excel</i>',
            //     customizeData: function(data) {
            //       for(var i = 0; i < data.body.length; i++) {
            //         for(var j = 0; j < data.body[i].length; j++) {
            //           data.body[i][j] = '\u200C' + data.body[i][j];
            //         }
            //       }
            //     } 
            //   },
            // ]
        });
    });
</script>


