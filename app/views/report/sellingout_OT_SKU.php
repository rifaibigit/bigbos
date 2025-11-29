  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Report Selling Out - By Outlet & SKU</h1> 

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
                <form action="<?= base_url; ?>/Report/Sellingout_OT_SKU" method="post">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="input-group mb-3">

                                <?php

                                    if(isset($data))
                                    {
                                        $principal = $data['by_principal'];
                                        $channel = $data['by_channel'];
                                        $outlet_type = $data['by_outlet_type'];
                                        $area = $data['by_area'];
                                        $year = $data['by_year'];

                                    }else
                                    {
                                        $principal = "By Principal";
                                        $channel = "By Channel";
                                        $outlet_type = "By Outlet Type";
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
                                    <?php $area_arr = explode(',', $area);?>
                                    <div style="margin-left : 5px;width : 155px; margin-bottom: 5px;">
                                        <select class="select2-multiple2 md-form form-control" title="By Area" name="by_area[]" id="by_area" style="margin-left : 10px;width : 155px;" multiple="multiple">
                                            <!-- <option value="">By Area</option> -->
                                                <?php $no=1; ?>
                                                <?php foreach ($data['area'] as $row) :?>
                                                        <option <?php if(in_array($row['area'], $area_arr)){echo "selected"; } ?> value="<?= $row['area'];?>"><b><?= $row['area'];?></b></option>
                                                <?php $no++; endforeach; ?>
                                        </select>
                                    </div>
                                    <div style="margin-left : 10px; width : 80px; margin-bottom: 5px;">
                                        <input id="by_year" name="by_year" class="mdb-select md-form form-control" type="number" min="1900" max="2099" step="1" value="<?= $year ;?>" />
                                    </div>
                                    <div style="margin-left : 5px; margin-bottom: 5px;">
                                        <button class="btn btn-outline-primary" type="submit">Go!</button>
                                        <a class="btn btn-outline-secondary" href="<?= base_url; ?>/Report/Sellingout_OT_SKU">Reset</a>
                                    </div>
                                    <div style="margin-left : 5px; margin-bottom: 5px;">
                                        <button class="btn float-right btn btn-outline-success" type="submit" formaction="<?= base_url; ?>/Report/export_sellingout_OT_SKU"><i class = "fa fa-download"> Excel</i></button>
                                    </div>
                            </div>

                            <!-- <div id="hasil_sale_out"></div> -->
                            <div class="table-responsive-sm text-small">
                                <table id="sale_out_ot_sku" class="table table-bordered table-sm" align="left" style="font-size:85%; border: 1px solid black;table-layout:fixed;">
                                    <thead class="table-warning">
                                        <tr>
                                            <th rowspan="3" class="text-center" style="width: 5px; vertical-align: middle;">#</th>
                                            <th rowspan="3" class="text-center" style="width: 70px;vertical-align: middle;">BIG Code</th>
                                            <th rowspan="3" class="text-center" style="width: 200px; vertical-align: middle;">Outlet Name</th>
                                            <th rowspan="3" class="text-center" style="width: 100px;vertical-align: middle;">Outlet Type</th>
                                            <th rowspan="3" class="text-center" style="width: 70px;vertical-align: middle;">Area</th>
                                            <?php foreach ($data['sku_code'] as $row) :?>
                                            <th colspan="2" class="text-center" style="width: 130px;vertical-align: middle;"><?= $row['item_code'];?></th>
                                            <?php endforeach ?> 
                                        </tr>
                                        <tr style="line-height: 12px; vertical-align: middle;">
                                            <?php foreach ($data['sku_code'] as $row) :?>
                                            <th colspan="2" class="text-center" style="width: 130px;vertical-align: middle;"><?= $row['item_name'];?></th>
                                            <?php endforeach ?>  
                                        </tr>
                                        <tr style="line-height: 12px; vertical-align: middle;">
                                            <?php foreach ($data['sku_code'] as $row) :?>
                                            <th class="text-center" style="width: 30px;">Qty</th>
                                            <th class="text-center" style="width: 70px;">Value</th>
                                            <?php endforeach ?>  
                                        </tr>
                                    </thead>
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
        var by_area = $('#by_area').val();
        var by_year = document.getElementById("by_year").value;

        tb_sale_out_ot = $('#sale_out_ot_sku').DataTable({
            // "retrieve": true,
            // "language": { 
            //     "loadingRecords": "<img src='<?= base_url; ?>/dist/img/BIG Rotate.gif' style='width:50px;'/>Loading ..."
            // },
            "ajax": {
                'type': 'POST',
                'url': '<?= base_url; ?>/Report/Sellingout_OT_SKU_show',
                'data': {'by_principal': by_principal, 'by_channel': by_channel, 'by_outlet_type': by_outlet_type, 'by_area': by_area, 'by_year': by_year},
                "beforeSend": function() {
                    $('#sale_out_ot_sku > tbody').html(
                        '<tr style="text-align: left;"><td></td><td></td><td></td><td></td><td></td><td colspan="36"><img src="<?= base_url; ?>/dist/img/BIG Rotate.gif" style="width:50px;"/>Loading ...</td></tr>'
                    );
                },
                error:function(xhr, status, exception){
                    Swal.fire('Error', xhr.responseText,'error');
                    $('#sale_out_ot_sku > tbody').html(
                        '<tr style="text-align: left;"><td></td><td></td><td></td><td></td><td></td><td colspan="36">No data ...</td></tr>'
                    );
                }
            },
            "fnCreatedRow": function (row, data, index) {
            $('td', row).eq(0).html(index + 1);
            },
            "columns": [
                { "data": "cust_code","sClass": "text-center"},
                { "data": "big_code","sClass": "text-center"},
                { "data": "cust_name","sClass": "text-left"},
                { "data": "outlet_type","sClass": "text-center"},
                { "data": "area","sClass": "text-center"},
                <?php
                    foreach($data['sku_code'] as $sku):
                        echo '{ "data": "qty_'.$sku['item_code'].'","sClass": "text-right", render: $.fn.dataTable.render.number( ",", ".", 0, "" )},';
                        echo '{ "data": "val_'.$sku['item_code'].'","sClass": "text-right", render: $.fn.dataTable.render.number( ",", ".", 0, "" )},';
                    endforeach;
                ;?>
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
