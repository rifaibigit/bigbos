  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Report Selling Out - By Outlet</h1> 

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
                <form action="<?= base_url; ?>/Report/Sellingout_OT" method="post">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="input-group mb-3">

                                <?php

                                    if(isset($data))
                                    {
                                        $principal = $data['by_principal'];
                                        $channel = $data['by_channel'];
                                        $outlet_type = $data['by_outlet_type'];
                                        $outlet_code = $data['by_outlet_code'];
                                        $sku = $data['by_sku'];
                                        $area = $data['by_area'];
                                        $year = $data['by_year'];

                                    }else
                                    {
                                        $principal = "By Principal";
                                        $channel = "By Channel";
                                        $outlet_type = "By Outlet Type";
                                        $outlet_code = "By Outlet Code";
                                        $sku = "By SKU";
                                        $area = "By Area";
                                    }

                                ?>
                                    <div style="width : 130px; margin-bottom: 5px;">
                                        <select class="mdb-select md-form form-control" title="By Principal" id="by_principal" name="by_principal">
                                            <option value="">By Principal</option>
                                                <?php $no=1; ?>
                                                <?php foreach ($data['principal'] as $row) :?>
                                                    <option <?php if( $principal==$row['principal']){echo "selected"; } ?> value="<?= $row['principal'];?>"><b><?= $row['principal'];?></b></option>
                                                <?php $no++; endforeach; ?>
                                        </select>
                                    </div>
                                    <div style="margin-left : 5px;width : 130px; margin-bottom: 5px;">
                                        <select class="mdb-select md-form form-control" title="By Channel" id="by_channel" name="by_channel" style="margin-left : 10px;">
                                            <option value="">By Channel</option>
                                                <?php $no=1; ?>
                                                <?php foreach ($data['channel'] as $row) :?>
                                                        <option <?php if( $channel==$row['channel']){echo "selected"; } ?> value="<?= $row['channel'];?>"><b><?= $row['channel'];?></b></option>
                                                <?php $no++; endforeach; ?>
                                        </select>
                                    </div>
                                    <div style="margin-left : 5px;width : 140px; margin-bottom: 5px;">
                                        <select class="mdb-select md-form form-control" title="By Outlet Type" id="by_outlet_type" name="by_outlet_type" style="margin-left : 10px;">
                                            <option value="">By Outlet Type</option>
                                                <?php $no=1; ?>
                                                <?php foreach ($data['outlet_type'] as $row) :?>
                                                        <option <?php if( $outlet_type==$row['outlet_type']){echo "selected"; echo ' style="font-weight: bold;"'; } ?> value="<?= $row['outlet_type'];?>"><b><?= $row['outlet_type'];?></b></option>
                                                <?php $no++; endforeach; ?>
                                        </select>
                                    </div>
                                    <div style="margin-left : 5px; width : 230px; margin-bottom: 5px;">
                                        <select class="mdb-select md-form form-control" title="By Outlet" id="by_outlet_code" name="by_outlet_code" style="margin-left : 5px;">
                                            <option value="">By Outlet</option>
                                                <?php $no=1; ?>
                                                <?php foreach ($data['outlet'] as $row) :?>
                                                        <option <?php if( $outlet_code==$row['cust_code']){echo "selected"; } ?> value="<?= $row['cust_code'];?>"><b><?= $row['cust_name'];?></b></option>
                                                <?php $no++; endforeach; ?>
                                        </select>
                                    </div>
                                    <div style="margin-left : 5px; width : 230px; margin-bottom: 5px;">
                                        <select class="mdb-select md-form form-control" title="By SKU" id="by_sku" name="by_sku" style="margin-left : 5px;">
                                            <option value="">By SKU</option>
                                                <?php $no=1; ?>
                                                <?php foreach ($data['item_name'] as $row) :?>
                                                        <option <?php if( $sku==$row['item_code']){echo "selected"; } ?> value="<?= $row['item_code'];?>"><b><?= $row['item_name'];?></b></option>
                                                <?php $no++; endforeach; ?>
                                        </select>
                                    </div>
                                    <div style="margin-left : 5px;width : 155px; margin-bottom: 5px;">
                                        <select class="mdb-select md-form form-control" title="By Area" name="by_area" id="by_area" style="margin-left : 10px;width : 155px;">
                                            <option value="">By Area</option>
                                                <?php $no=1; ?>
                                                <?php foreach ($data['area'] as $row) :?>
                                                        <option <?php if( $area==$row['area']){echo "selected"; } ?> value="<?= $row['area'];?>"><b><?= $row['area'];?></b></option>
                                                <?php $no++; endforeach; ?>
                                        </select>
                                    </div>
                                    <div style="margin-left : 10px; width : 80px; margin-bottom: 5px;">
                                        <input id="by_year" name="by_year" class="mdb-select md-form form-control" type="number" min="1900" max="2099" step="1" value="<?= $year ;?>" />
                                    </div>
                                    <div style="margin-left : 5px; margin-bottom: 5px;">
                                        <button class="btn btn-outline-primary" type="submit">Go!</button>
                                        <a class="btn btn-outline-secondary" href="<?= base_url; ?>/Report/Sellingout_OT">Reset</a>
                                    </div>
                                    <div style="margin-left : 5px; margin-bottom: 5px;">
                                        <button class="btn float-right btn btn-outline-success" type="submit" formaction="<?= base_url; ?>/Report/export_sellingout_OT"><i class = "fa fa-download"> Excel</i></button>
                                    </div>
                            </div>

                            <!-- <div id="hasil_sale_out"></div> -->
                            <div class="table-responsive-sm text-small">
                                <table id="sale_out_ot2" class="table table-bordered table-sm nowrap" align="left" style="font-size:85%; border: 1px solid black;table-layout:fixed;">
                                    <thead class="table-warning">
                                        <tr>
                                            <th rowspan="3" class="text-center" style="width: 5px; vertical-align: middle;">#</th>
                                            <th rowspan="3" class="text-center" style="vertical-align: middle;">Outlet Code</th>
                                            <th rowspan="3" class="text-center" style="vertical-align: middle;">BIG Code</th>
                                            <th rowspan="3" class="text-center" style="width: 200px; vertical-align: middle;">Outlet Name</th>
                                            <th rowspan="3" class="text-center" style="vertical-align: middle;">Outlet Type</th>
                                            <th rowspan="3" class="text-center" style="vertical-align: middle;">Outlet Count</th>
                                            <th rowspan="3" class="text-center" style="vertical-align: middle;">Area</th>
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
                                    <!-- <tbody>
                                        <?php// $no=1; ?>
                                        <?php //foreach ($data['sellingout_OT'] as $row) :?>
                                        <tr>
                                            <td class="text-center"><?= $no; ?></td>
                                            <td><?= $row['cust_code'];?></td>
                                            <td><?= $row['cust_name'];?></td>
                                            <td class="text-center"><?= $row['outlet_count'];?></td>
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

                                        <?php //$no++; //endforeach; ?>
                                        
                                    </tbody> -->
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

<script type="text/javascript">
    $(document).ready(function(){

        var tb_sale_out_ot = "";
        var by_principal = document.getElementById("by_principal").value;
        var by_channel = document.getElementById("by_channel").value;
        var by_outlet_type = document.getElementById("by_outlet_type").value;
        var by_outlet_code = document.getElementById("by_outlet_code").value;
        var by_sku = document.getElementById("by_sku").value;
        var by_area = document.getElementById("by_area").value;
        var by_year = document.getElementById("by_year").value;
        

        // Swal.fire('Error', area,'error');

        tb_sale_out_ot = $('#sale_out_ot2').DataTable({
            "ajax": {
            'type': 'POST',
            'url': '<?= base_url; ?>/Report/Sellingout_OTshow',
            'data': {'by_principal': by_principal, 'by_channel': by_channel, 'by_outlet_type': by_outlet_type, 'by_outlet_code': by_outlet_code, 'by_sku': by_sku, 'by_area': by_area, 'by_year': by_year},
            },
            "fnCreatedRow": function (row, data, index) {
            $('td', row).eq(0).html(index + 1);
            },
            "columns": [
                { "data": "cust_code","sClass": "text-center"},
                { "data": "cust_code","sClass": "text-center"},
                { "data": "big_code","sClass": "text-left"},
                { "data": "cust_name","sClass": "text-left"},
                { "data": "outlet_type","sClass": "text-center"},
                { "data": "outlet_count","sClass": "text-center"},
                { "data": "area","sClass": "text-center"},
                { "data": "qty_jan","sClass": "text-right"},
                { "data": "val_jan","sClass": "text-right", render: $.fn.dataTable.render.number( ',', '.', 0, '' )},
                { "data": "qty_feb","sClass": "text-right"},
                { "data": "val_feb","sClass": "text-right", render: $.fn.dataTable.render.number( ',', '.', 0, '' )},
                { "data": "qty_mar","sClass": "text-right"},
                { "data": "val_mar","sClass": "text-right", render: $.fn.dataTable.render.number( ',', '.', 0, '' )},
                { "data": "qty_apr","sClass": "text-right"},
                { "data": "val_apr","sClass": "text-right", render: $.fn.dataTable.render.number( ',', '.', 0, '' )},
                { "data": "qty_mei","sClass": "text-right"},
                { "data": "val_mei","sClass": "text-right", render: $.fn.dataTable.render.number( ',', '.', 0, '' )},
                { "data": "qty_jun","sClass": "text-right"},
                { "data": "val_jun","sClass": "text-right", render: $.fn.dataTable.render.number( ',', '.', 0, '' )},
                { "data": "qty_jul","sClass": "text-right"},
                { "data": "val_jul","sClass": "text-right", render: $.fn.dataTable.render.number( ',', '.', 0, '' )},
                { "data": "qty_agu","sClass": "text-right"},
                { "data": "val_agu","sClass": "text-right", render: $.fn.dataTable.render.number( ',', '.', 0, '' )},
                { "data": "qty_sep","sClass": "text-right"},
                { "data": "val_sep","sClass": "text-right", render: $.fn.dataTable.render.number( ',', '.', 0, '' )},
                { "data": "qty_okt","sClass": "text-right"},
                { "data": "val_okt","sClass": "text-right", render: $.fn.dataTable.render.number( ',', '.', 0, '' )},
                { "data": "qty_nop","sClass": "text-right"},
                { "data": "val_nop","sClass": "text-right", render: $.fn.dataTable.render.number( ',', '.', 0, '' )},
                { "data": "qty_des","sClass": "text-right"},
                { "data": "val_des","sClass": "text-right", render: $.fn.dataTable.render.number( ',', '.', 0, '' )},
                { "data": "qty_year","sClass": "text-right"},
                { "data": "val_year","sClass": "text-right", render: $.fn.dataTable.render.number( ',', '.', 0, '' )},
                { "data": "qty_year","sClass": "text-right"},
                { "data": "val_year","sClass": "text-right", render: $.fn.dataTable.render.number( ',', '.', 0, '' )},
            ],
            "scrollY": 420,
            "scrollX": true,
            "autoWidth": true,
            "responsive": true,
            "paging":   true,
            "lengthMenu": [200, 300, 400, 500],
            "pageLength": 200,
            "ordering": false,
            "searching": true,
            "info": true,
            "fixedColumns":   {
                "leftColumns": 5
            },
        });
    
    });
</script>
