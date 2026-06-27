  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Report Selling Out - Growth by SKU Category</h1> 
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
                <form action="<?= base_url; ?>/Report/sellingout_growth_sku_category" method="post">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="input-group mb-3">

                                <?php

                                    extract($data);

                                    $total_from = 0;
                                    $total_to = 0;
                                    $total_exist = 0;
                                    $total_add_sku = 0;
                                    $total_noo = 0;

                                    if(isset($data))
                                    {
                                        $principal = $data['by_principal'];
                                        $area = $data['by_area'];
                                        $year = $data['by_year'];
                                        $month1 = $data['by_month1'];
                                        $month2 = $data['by_month2'];
                                        $year_to = $year;
		                                $year_from = $year_to - 1;
                                    }

                                    foreach ($data['so_growth_sku'] as $row):

                                        $total_from += $row['value_from'];
                                        $total_to += $row['value_to'];
                                        $total_exist += $row['value_exist'];
                                        $total_add_sku += $row['value_add_sku'];
                                        $total_noo += $row['value_noo'];

                                    endforeach;
                                ?>
                                    <div style="margin-left : 5px; width : 130px;">
                                        <select class="mdb-select md-form form-control" title="By Principal" id="by_principal" name="by_principal">
                                            <option value="">By Principal</option>
                                                <?php $no=1; ?>
                                                <?php foreach ($data['principal'] as $row) :?>
                                                    <option <?php if( $principal==$row['principal']){echo "selected"; } ?> value="<?= $row['principal'];?>"><b><?= $row['principal'];?></b></option>
                                                <?php $no++; endforeach; ?>
                                        </select>
                                    </div>
                                    <div style="margin-left : 10px;width : 155px;">
                                        <select class="select2-multiple2 md-form form-control" title="By Area" name="by_area[]" id="dt_area" style="margin-left : 10px;width : 155px;" multiple="multiple">
                                            <!-- <option value="">By Area</option> -->
                                                <?php $no=1; ?>
                                                <?php foreach ($data['area'] as $row) :?>
                                                        <option <?php if(in_array($row['area'], $area)){echo "selected"; } ?> value="<?= $row['area'];?>"><b><?= $row['area'];?></b></option>
                                                <?php $no++; endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="row" style="margin-left : 10px; width:110px;">
                                        <div></div>
                                        <select name="by_month1" title="MONTH" class="mdb-select md-form form-control" style="margin-left : 10px;  width:110px;">
                                        <option <?php if( $month1=='1' or $month1=='1' ){echo 'selected'; } ?> value="1">Januari</option>
                                        <option <?php if( $month1=='2' or $month1=='2' ){echo 'selected'; } ?> value="2">Februari</option>
                                        <option <?php if( $month1=='3' or $month1=='3' ){echo 'selected'; } ?> value="3">Maret</option>
                                        <option <?php if( $month1=='4' or $month1=='4' ){echo 'selected'; } ?> value="4">April</option>
                                        <option <?php if( $month1=='5' or $month1=='5' ){echo 'selected'; } ?> value="5">Mei</option>
                                        <option <?php if( $month1=='6' or $month1=='6' ){echo 'selected'; } ?> value="6">Juni</option>
                                        <option <?php if( $month1=='7' or $month1=='7' ){echo 'selected'; } ?> value="7">Juli</option>
                                        <option <?php if( $month1=='8' or $month1=='8' ){echo 'selected'; } ?> value="8">Agustus</option>
                                        <option <?php if( $month1=='9' or $month1=='9' ){echo 'selected'; } ?> value="9">September</option>
                                        <option <?php if( $month1=='10' or $month1=='10'){echo 'selected'; } ?> value="10">Oktober</option>
                                        <option <?php if( $month1=='11' or $month1=='11'){echo 'selected'; } ?> value="11">Nopember</option>
                                        <option <?php if( $month1=='12' or $month1=='12'){echo 'selected'; } ?> value="12">Desember</option>
                                        </select>
                                    </div>
                                    <div class="row" style="margin-left : 5px;">
                                        <div style="margin-left : 8px;margin-right : 10px; margin-top: 5px;">
                                        <label>To</label>
                                        </div>
                                        <select name="by_month2" title="MONTH" class="mdb-select md-form form-control" style="margin-left : 10px;  width:110px;">
                                        <option <?php if( $month2=='1' or $month2=='1' ){echo 'selected'; } ?> value="1">Januari</option>
                                        <option <?php if( $month2=='2' or $month2=='2' ){echo 'selected'; } ?> value="2">Februari</option>
                                        <option <?php if( $month2=='3' or $month2=='3' ){echo 'selected'; } ?> value="3">Maret</option>
                                        <option <?php if( $month2=='4' or $month2=='4' ){echo 'selected'; } ?> value="4">April</option>
                                        <option <?php if( $month2=='5' or $month2=='5' ){echo 'selected'; } ?> value="5">Mei</option>
                                        <option <?php if( $month2=='6' or $month2=='6' ){echo 'selected'; } ?> value="6">Juni</option>
                                        <option <?php if( $month2=='7' or $month2=='7' ){echo 'selected'; } ?> value="7">Juli</option>
                                        <option <?php if( $month2=='8' or $month2=='8' ){echo 'selected'; } ?> value="8">Agustus</option>
                                        <option <?php if( $month2=='9' or $month2=='9' ){echo 'selected'; } ?> value="9">September</option>
                                        <option <?php if( $month2=='10' or $month2=='10'){echo 'selected'; } ?> value="10">Oktober</option>
                                        <option <?php if( $month2=='11' or $month2=='11'){echo 'selected'; } ?> value="11">Nopember</option>
                                        <option <?php if( $month2=='12' or $month2=='12'){echo 'selected'; } ?> value="12">Desember</option>
                                        </select>
                                    </div>
                                    <div style="margin-left : 10px; width : 80px;">
                                        <input name="by_year" class="mdb-select md-form form-control" type="number" min="1900" max="2099" step="1" value="<?= $year ;?>" />
                                    </div>
                                    <div>
                                        <button class="btn btn-outline-primary" type="submit" style="margin-left : 10px;">Go!</button>
                                        <a class="btn btn-outline-secondary" href="<?= base_url; ?>/Report/sellingout_growth_sku_category">Reset</a>
                                        <button class="btn float-right btn btn-outline-success" type="submit" style="margin-left : 20px;" formaction="<?= base_url; ?>/Report/export_sellingout_growth_SKUCategory"><i class = "fa fa-download"> Excel</i></button>
                                    </div>
                            </div>

                            <!-- <div id="hasil_sale_out"></div> -->
                            <div class="table-responsive-sm text-small">
                                <table id="so_growth_sku_category" class="table table-bordered table-sm nowrap" align="left" style="font-size:85%; border: 1px solid black;table-layout:fixed;">
                                    <thead class="table-warning">
                                        <tr>
                                            <th rowspan="2" class="text-center" style="width: 5px; vertical-align: middle;">#</th>
                                            <th rowspan="2" class="text-center" style="vertical-align: middle;">Category</th>
                                            <th colspan="3" class="text-center" style="vertical-align: middle;">Full Year</th>
                                            <th colspan="3" class="text-center" style="vertical-align: middle;">SKU Existing</th>
                                            <th colspan="2" class="text-center" style="vertical-align: middle;">Add SKU</th>
                                            <th colspan="2" class="text-center" style="vertical-align: middle;">NOO</th>
                                        </tr>
                                        <tr>
                                            <th class="text-center" style="width: 100px"><?= $year_from ;?></th>
                                            <th class="text-center" style="width: 100px"><?= $year_to ;?></th>
                                            <th class="text-center" style="width: 50px">Growth %</th>

                                            <th class="text-center" style="width: 100px"><?= $year_from ;?></th>
                                            <th class="text-center" style="width: 100px"><?= $year_to ;?></th>
                                            <th class="text-center" style="width: 50px">Growth %</th>

                                            <th class="text-center" style="width: 100px">Value</th>
                                            <th class="text-center" style="width: 50px">Contr %</th>

                                            <th class="text-center" style="width: 100px">Value</th>
                                            <th class="text-center" style="width: 50px">Contr %</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php

                                            $item_group = '';
                                            $item_category = '';

                                            $sub_value_from = 0;
                                            $sub_value_to = 0;
                                            $sub_value_exist = 0;
                                            $sub_value_add_sku = 0;
                                            $sub_value_noo = 0;

                                            $total_value_from = 0;
                                            $total_value_to = 0;
                                            $total_value_exist = 0;
                                            $total_value_add_sku = 0;
                                            $total_value_noo = 0;

                                            if (!is_array($area)) {
                                                $area = empty($area) ? [] : [$area];
                                            }

                                        ?>

                                        <?php $no=1; ?>

                                        <?php foreach ($data['so_growth_sku'] as $row) :?>

                                            <?php

                                                if ($item_group != $row['item_group'] and $item_group != '' )
                                                {

                                                    echo '<tr class="table-warning" style="font-weight:bold;">';
                                                        echo '<td></td>';
                                                        echo '<td class="text-center">' . $item_group . '</td>';
                                                        echo '<td class="text-right">' .number_format($sub_value_from, 0). '</td>';
                                                        echo '<td class="text-right">' .number_format($sub_value_to, 0). '</td>';
                                                        if($sub_value_from == 0 or $sub_value_to == 0)
                                                        {
                                                            $sub_growth_year = 0;
                                                        }
                                                        else
                                                        {
                                                            $sub_growth_year = (($sub_value_to/$sub_value_from) - 1)*100;
                                                        }
                                                        echo '<td class="text-right">' .number_format($sub_growth_year, 2). '%</td>';    
                                                        echo '<td class="text-right">' .number_format($sub_value_from, 0). '</td>';
                                                        echo '<td class="text-right">' .number_format($sub_value_exist, 0). '</td>';
                                                        if($sub_value_from == 0 or $sub_value_exist == 0)
                                                        {
                                                            $sub_growth_exit = 0;
                                                        }
                                                        else
                                                        {
                                                            $sub_growth_exit = (($sub_value_exist/$sub_value_from) - 1)*100;
                                                        }
                                                        echo '<td class="text-right">' .number_format($sub_growth_exit, 2). '%</td>';
                                                        echo '<td class="text-right">' .number_format($sub_value_add_sku, 0). '</td>';
                                                        if($sub_value_from == 0 or $sub_value_add_sku == 0)
                                                        {
                                                            $sub_growth_add_sku = 0;
                                                        }
                                                        else
                                                        {
                                                            $sub_growth_add_sku = ($sub_value_add_sku/$total_add_sku)*100;
                                                        }
                                                        echo '<td class="text-right">' .number_format($sub_growth_add_sku, 2). '%</td>';
                                                        echo '<td class="text-right">' .number_format($sub_value_noo, 0). '</td>';
                                                        if($sub_value_from == 0 or $sub_value_noo == 0)
                                                        {
                                                            $sub_growth_noo = 0;
                                                        }
                                                        else
                                                        {
                                                            $sub_growth_noo = ($sub_value_noo/$total_noo)*100;
                                                        }
                                                        echo '<td class="text-right">' .number_format($sub_growth_noo, 2). '%</td>';
                                                    echo '</tr>';
                                                    
                                                    $sub_value_from = 0;
                                                    $sub_value_to = 0;
                                                    $sub_value_exist = 0;
                                                    $sub_value_add_sku = 0;
                                                    $sub_value_noo = 0;

                                                    //$total_actual = 0;
                                                    //$total_target = 0;
                                                    //$total_p = 0;
                                                }

                                            ?>

                                        <tr>
                                            <td class="text-center"><?= $no; ?></td>
                                            <td style="white-space:nowrap;"><?= $row['item_category'];?></td>
                                            <td class="text-right"><?= number_format($row['value_from'], 0);?></td>
                                            <td class="text-right"><?= number_format($row['value_to'], 0);?></td>
                                            <?php
                                                if($row['value_from'] == 0 or $row['value_to'] == 0)
                                                {
                                                    $growth_year = 0;
                                                }
                                                else
                                                {
                                                    $growth_year = (($row['value_to']/$row['value_from']) - 1)*100;
                                                }
                                            ;?>
                                            <td class="text-right"><?= number_format($growth_year, 2);?>%</td>
                                            <td class="text-right"><?= number_format($row['value_from'], 0);?></td>
                                            <td class="text-right"><?= number_format($row['value_exist'], 0);?></td>
                                            <?php
                                                if($row['value_from'] == 0 or $row['value_exist'] == 0)
                                                {
                                                    $growth_exist = 0;
                                                }
                                                else
                                                {
                                                    $growth_exist = (($row['value_exist']/$row['value_from']) - 1)*100;
                                                }
                                            ;?>
                                            <td class="text-right"><?= number_format($growth_exist, 2);?>%</td>
                                            <td class="text-right"><?= number_format($row['value_add_sku'], 0);?></td>
                                            <?php
                                                if($row['value_from'] == 0 or $row['value_add_sku'] == 0)
                                                {
                                                    $growth_add_sku = 0;
                                                }
                                                else
                                                {
                                                    $growth_add_sku = ($row['value_add_sku']/$total_add_sku)*100;
                                                }
                                            ;?>
                                            <td class="text-right"><?= number_format($growth_add_sku, 2);?>%</td>
                                            <td class="text-right"><?= number_format($row['value_noo'], 0);?></td>
                                            <?php
                                                if($row['value_from'] == 0 or $row['value_noo'] == 0)
                                                {
                                                    $growth_noo = 0;
                                                }
                                                else
                                                {
                                                    $growth_noo = ($row['value_noo']/$total_noo)*100;
                                                }
                                            ;?>
                                            <td class="text-right"><?= number_format($growth_noo, 2);?>%</td>
                                        </tr>

                                        <?php $item_group = $row['item_group']; ?>
                                        
                                        <?php 
                                            
                                            $sub_value_from += $row['value_from'];
                                            $sub_value_to += $row['value_to'];
                                            $sub_value_exist += $row['value_exist'];
                                            $sub_value_add_sku += $row['value_add_sku'];
                                            $sub_value_noo += $row['value_noo'];

                                            $total_value_from += $row['value_from'];
                                            $total_value_to += $row['value_to'];
                                            $total_value_exist += $row['value_exist'];
                                            $total_value_add_sku += $row['value_add_sku'];
                                            $total_value_noo += $row['value_noo'];
                                            
                                        ?>

                                        <?php $no++; endforeach; ?>

                                        <tr class="table-warning" style="font-weight:bold;">
                                            <td></td>
                                            <td class="text-center"><?= $item_group;?></td>
                                            <td class="text-right"><?= number_format($sub_value_from, 0);?></td>
                                            <td class="text-right"><?= number_format($sub_value_to, 0);?></td>
                                            <?php
                                                if($sub_value_from == 0 or $sub_value_to == 0)
                                                {
                                                    $sub_growth_year = 0;
                                                }
                                                else
                                                {
                                                    $sub_growth_year = (($sub_value_to/$sub_value_from) - 1)*100;
                                                }
                                            ;?>
                                            <td class="text-right"><?= number_format($sub_growth_year, 2);?>%</td>
                                            <td class="text-right"><?= number_format($sub_value_from, 0);?></td>
                                            <td class="text-right"><?= number_format($sub_value_exist, 0);?></td>
                                            <?php
                                                if($sub_value_from == 0 or $sub_value_exist == 0)
                                                {
                                                    $sub_growth_exist = 0;
                                                }
                                                else
                                                {
                                                    $sub_growth_exist = (($sub_value_exist/$sub_value_from) - 1)*100;
                                                }
                                            ;?>
                                            <td class="text-right"><?= number_format($sub_growth_exist, 2);?>%</td>
                                            <td class="text-right"><?= number_format($sub_value_add_sku, 0);?></td>
                                            <?php
                                                if($sub_value_from == 0 or $sub_value_add_sku == 0)
                                                {
                                                    $sub_growth_add_sku = 0;
                                                }
                                                else
                                                {
                                                    $sub_growth_add_sku = ($sub_value_add_sku/$total_add_sku)*100;
                                                }
                                            ;?>
                                            <td class="text-right"><?= number_format($sub_growth_add_sku, 2);?>%</td>
                                            <td class="text-right"><?= number_format($sub_value_noo, 0);?></td>
                                            <?php
                                                if($sub_value_from == 0 or $sub_value_noo == 0)
                                                {
                                                    $sub_growth_noo = 0;
                                                }
                                                else
                                                {
                                                    $sub_growth_noo = ($sub_value_noo/$total_noo)*100;
                                                }
                                            ;?>
                                            <td class="text-right"><?= number_format($sub_growth_noo, 2);?>%</td>         
                                        </tr>
                                    
                                        <tr class="table-danger" style="font-weight:bold;">
                                            <td></td>
                                            <td class="text-center">GRAND TOTAL</td>
                                            <td class="text-right"><?= number_format($total_value_from, 0);?></td>
                                            <td class="text-right"><?= number_format($total_value_to, 0);?></td>
                                            <?php
                                                if($total_value_from == 0 or $total_value_to == 0)
                                                {
                                                    $total_growth_year = 0;
                                                }
                                                else
                                                {
                                                    $total_growth_year = (($total_value_to/$total_value_from) - 1)*100;
                                                }
                                            ;?>
                                            <td class="text-right"><?= number_format($total_growth_year, 2);?>%</td>
                                            <td class="text-right"><?= number_format($total_value_from, 0);?></td>
                                            <td class="text-right"><?= number_format($total_value_exist, 0);?></td>
                                            <?php
                                                if($total_value_from == 0 or $total_value_exist == 0)
                                                {
                                                    $total_growth_exist = 0;
                                                }
                                                else
                                                {
                                                    $total_growth_exist = (($total_value_exist/$total_value_from) - 1)*100;
                                                }
                                            ;?>
                                            <td class="text-right"><?= number_format($total_growth_exist, 2);?>%</td>
                                            <td class="text-right"><?= number_format($total_value_add_sku, 0);?></td>
                                            <?php
                                                if($total_value_from == 0 or $total_value_add_sku == 0)
                                                {
                                                    $total_growth_add_sku = 0;
                                                }
                                                else
                                                {
                                                    $total_growth_add_sku = ($total_value_add_sku/$total_value_to)*100;
                                                }
                                            ;?>
                                            <td class="text-right"><?= number_format($total_growth_add_sku, 2);?>%</td>
                                            <td class="text-right"><?= number_format($total_value_noo, 0);?></td>
                                            <?php
                                                if($total_value_from == 0 or $total_value_noo == 0)
                                                {
                                                    $total_growth_noo = 0;
                                                }
                                                else
                                                {
                                                    $total_growth_noo = ($total_value_noo/$total_value_to)*100;
                                                }
                                            ;?>
                                            <td class="text-right"><?= number_format($total_growth_noo, 2);?>%</td>             
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

<script>
    $(document).ready(function(){
      
        $('#so_growth_sku_category').DataTable({
            "scrollY": 450,
            "scrollX": true,
            "autoWidth": true,
            "responsive": true,
            "paging":   false,
            "ordering": false,
            "searching": false,
            "info": false,
            "fixedColumns":   {
                "leftColumns": 2
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

    })

</script>
