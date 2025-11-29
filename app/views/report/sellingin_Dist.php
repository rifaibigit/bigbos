  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Report Selling In - Distributor</h1> 
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
                <form action="<?= base_url; ?>/Report/sellingin_Dist" method="post">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="input-group mb-3">

                                <?php

                                    if(isset($data))
                                    {
                                        $principal = $data['by_principal'];
                                        $cust_code = $data['by_cust_code'];
                                        $sku = $data['by_sku'];
                                        $area = $data['by_area'];
                                        $year = $data['by_year'];

                                    }else
                                    {
                                        $principal = "By Principal";
                                        $outlet_code = "By Distributor";
                                        $sku = "By SKU";
                                    }

                                ?>
                                    <div style="width : 130px;">
                                        <select class="mdb-select md-form form-control" title="By Area" name="by_principal" style="margin-left : 5px;">
                                            <option value="">By Principal</option>
                                                <?php $no=1; ?>
                                                <?php foreach ($data['principal'] as $row) :?>
                                                    <option <?php if( $principal==$row['principal']){echo "selected"; } ?> value="<?= $row['principal'];?>"><b><?= $row['principal'];?></b></option>
                                                <?php $no++; endforeach; ?>
                                        </select>
                                    </div>
                                    <div style="margin-left : 5px; width : 230px; margin-bottom: 5px;">
                                        <select class="mdb-select md-form form-control" title="By Outlet" id="dt_outlet" name="by_outlet_code" style="margin-left : 5px;">
                                            <option value="">By Distributor</option>
                                                <?php $no=1; ?>
                                                <?php foreach ($data['dist'] as $row) :?>
                                                        <option <?php if( $cust_code==$row['cust_code']){echo "selected"; } ?> value="<?= $row['cust_code'];?>"><b><?= $row['distributor'];?></b></option>
                                                <?php $no++; endforeach; ?>
                                        </select>
                                    </div>
                                    <div style="margin-left : 5px; width : 230px; margin-bottom: 5px;">
                                        <select class="mdb-select md-form form-control" title="By SKU" id="dt_sku" name="by_sku" style="margin-left : 5px;">
                                            <option value="">By SKU</option>
                                                <?php $no=1; ?>
                                                <?php foreach ($data['item_name'] as $row) :?>
                                                        <option <?php if( $sku==$row['item_code']){echo "selected"; } ?> value="<?= $row['item_code'];?>"><b><?= $row['item_name'];?></b></option>
                                                <?php $no++; endforeach; ?>
                                        </select>
                                    </div>
                                    <div style="margin-left : 5px;width : 155px; margin-bottom: 5px;">
                                        <select class="select2-multiple2 md-form form-control" title="By Area" name="by_area[]" id="dt_area" style="margin-left : 10px;width : 155px;" multiple="multiple">
                                            <!-- <option value="">By Area</option> -->
                                                <?php $no=1; ?>
                                                <?php foreach ($data['area'] as $row) :?>
                                                        <option <?php if(in_array($row['area'], $area)){echo "selected"; } ?> value="<?= $row['area'];?>"><b><?= $row['area'];?></b></option>
                                                <?php $no++; endforeach; ?>
                                        </select>
                                    </div>
                                    <div style="margin-left : 5px; width : 80px;">
                                        <input name="by_year" class="mdb-select md-form form-control" type="number" min="1900" max="2099" step="1" value="<?= $year ;?>" />
                                    </div>
                                    <div style="margin-left : 10px;">
                                        <button class="btn btn-outline-primary" type="submit">Go!</button>
                                        <a class="btn btn-outline-secondary" href="<?= base_url; ?>/Report/sellingin_Dist">Reset</a>
                                    </div>
                                    <div style="margin-left : 10px;">
                                        <button class="btn btn-outline-success" type="submit" formaction="<?= base_url; ?>/Report/export_sellingin_dist"><i class = "fa fa-download"> Excel</i></button>
                                        <a class="btn btn-outline-info" href="#chart"><i class = "fas fa-chart-bar"> Chart</i></a>
                                    </div>
                            </div>

                            <!-- <div id="hasil_sale_out"></div> -->
                            <div class="table-responsive-sm text-small">
                                <table id="sale_in_dist" class="table table-bordered table-sm nowrap" align="left" style="font-size:85%; border: 1px solid black;table-layout:fixed;">
                                    <thead class="table-warning">
                                        <tr>
                                            <th rowspan="3" class="text-center" style="width: 5px; vertical-align: middle;">#</th>
                                            <th rowspan="3" class="text-center" style="vertical-align: middle;">Cust Code</th>
                                            <th rowspan="3" class="text-center" style="width: 200px; vertical-align: middle;">Distributor</th>
                                            <th rowspan="3" class="text-center" style="width: 60px; vertical-align: middle;">Area</th>
                                            <th colspan="24" class="text-center" style="vertical-align: middle;">Month</th>
                                            <th colspan="2" rowspan="2" class="text-center" style="width: 160px; vertical-align: middle; background-color: #FF6D6D;">Total</th>
                                            <th colspan="2" rowspan="2" class="text-center" style="width: 160px; vertical-align: middle; background-color: #7BFF6D">Average</th>
                                        </tr>
                                        <tr>
                                            <th colspan="2" class="text-center" style="width: 160px">January</th>
                                            <th colspan="2" class="text-center" style="width: 160px">February</th>
                                            <th colspan="2" class="text-center" style="width: 160px">March</th>
                                            <th colspan="2" class="text-center" style="width: 160px">April</th>
                                            <th colspan="2" class="text-center" style="width: 160px">May</th>
                                            <th colspan="2" class="text-center" style="width: 160px">June</th>
                                            <th colspan="2" class="text-center" style="width: 160px">July</th>
                                            <th colspan="2" class="text-center" style="width: 160px">August</th>
                                            <th colspan="2" class="text-center" style="width: 160px">September</th>
                                            <th colspan="2" class="text-center" style="width: 160px">October</th>
                                            <th colspan="2" class="text-center" style="width: 160px">November</th>
                                            <th colspan="2" class="text-center" style="width: 160px">December</th>
                                        </tr>

                                        <tr>
                                            <th class="text-center" style="width: 30px">Qty</th>
                                            <th class="text-center" style="width: 130px">Value</th>
                                            <th class="text-center" style="width: 30px">Qty</th>
                                            <th class="text-center" style="width: 130px">Value</th>
                                            <th class="text-center" style="width: 30px">Qty</th>
                                            <th class="text-center" style="width: 130px">Value</th>
                                            <th class="text-center" style="width: 30px">Qty</th>
                                            <th class="text-center" style="width: 130px">Value</th>
                                            <th class="text-center" style="width: 30px">Qty</th>
                                            <th class="text-center" style="width: 130px">Value</th>
                                            <th class="text-center" style="width: 30px">Qty</th>
                                            <th class="text-center" style="width: 130px">Value</th>
                                            <th class="text-center" style="width: 30px">Qty</th>
                                            <th class="text-center" style="width: 130px">Value</th>
                                            <th class="text-center" style="width: 30px">Qty</th>
                                            <th class="text-center" style="width: 130px">Value</th>
                                            <th class="text-center" style="width: 30px">Qty</th>
                                            <th class="text-center" style="width: 130px">Value</th>
                                            <th class="text-center" style="width: 30px">Qty</th>
                                            <th class="text-center" style="width: 130px">Value</th>
                                            <th class="text-center" style="width: 30px">Qty</th>
                                            <th class="text-center" style="width: 130px">Value</th>
                                            <th class="text-center" style="width: 30px">Qty</th>
                                            <th class="text-center" style="width: 130px">Value</th>
                                            <th class="text-center" style="width: 30px; background-color: #FF6D6D;">Qty</th>
                                            <th class="text-center" style="width: 130px; background-color: #FF6D6D;">Value</th>
                                            <th class="text-center" style="width: 30px; background-color: #7BFF6D">Qty</th>
                                            <th class="text-center" style="width: 130px; background-color: #7BFF6D">Value</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php

                                            $region = '';
                                            $island = '';

                                            $qty_jan = 0;
                                            $qty_feb = 0;
                                            $qty_mar = 0;
                                            $qty_apr = 0;
                                            $qty_mei = 0;
                                            $qty_jun = 0;
                                            $qty_jul = 0;
                                            $qty_agu = 0;
                                            $qty_sep = 0;
                                            $qty_okt = 0;
                                            $qty_nop = 0;
                                            $qty_des = 0;
                                            $qty_year = 0;
                                            $qty_avg = 0;

                                            $val_jan = 0;
                                            $val_feb = 0;
                                            $val_mar = 0;
                                            $val_apr = 0;
                                            $val_mei = 0;
                                            $val_jun = 0;
                                            $val_jul = 0;
                                            $val_agu = 0;
                                            $val_sep = 0;
                                            $val_okt = 0;
                                            $val_nop = 0;
                                            $val_des = 0;
                                            $val_year = 0;
                                            $val_avg = 0;

                                            $sub_qty_jan = 0;
                                            $sub_qty_feb = 0;
                                            $sub_qty_mar = 0;
                                            $sub_qty_apr = 0;
                                            $sub_qty_mei = 0;
                                            $sub_qty_jun = 0;
                                            $sub_qty_jul = 0;
                                            $sub_qty_agu = 0;
                                            $sub_qty_sep = 0;
                                            $sub_qty_okt = 0;
                                            $sub_qty_nop = 0;
                                            $sub_qty_des = 0;
                                            $sub_qty_year = 0;
                                            $sub_qty_avg = 0;

                                            $sub_val_jan = 0;
                                            $sub_val_feb = 0;
                                            $sub_val_mar = 0;
                                            $sub_val_apr = 0;
                                            $sub_val_mei = 0;
                                            $sub_val_jun = 0;
                                            $sub_val_jul = 0;
                                            $sub_val_agu = 0;
                                            $sub_val_sep = 0;
                                            $sub_val_okt = 0;
                                            $sub_val_nop = 0;
                                            $sub_val_des = 0;
                                            $sub_val_year = 0;
                                            $sub_val_avg = 0;

                                            $total_qty_jan = 0;
                                            $total_qty_feb = 0;
                                            $total_qty_mar = 0;
                                            $total_qty_apr = 0;
                                            $total_qty_mei = 0;
                                            $total_qty_jun = 0;
                                            $total_qty_jul = 0;
                                            $total_qty_agu = 0;
                                            $total_qty_sep = 0;
                                            $total_qty_okt = 0;
                                            $total_qty_nop = 0;
                                            $total_qty_des = 0;
                                            $total_qty_year = 0;
                                            $total_qty_avg = 0;

                                            $total_val_jan = 0;
                                            $total_val_feb = 0;
                                            $total_val_mar = 0;
                                            $total_val_apr = 0;
                                            $total_val_mei = 0;
                                            $total_val_jun = 0;
                                            $total_val_jul = 0;
                                            $total_val_agu = 0;
                                            $total_val_sep = 0;
                                            $total_val_okt = 0;
                                            $total_val_nop = 0;
                                            $total_val_des = 0;
                                            $total_val_year = 0;
                                            $total_val_avg = 0;

                                        ?>

                                        <?php $no=1; ?>

                                        <?php foreach ($data['sellingin_Dist'] as $row) :?>

                                            <?php

                                                $dist_name[] = $row['distributor'];
                                                $dist_val[] = $row['val_year'];

                                                if ($region != $row['region'] and $region != '' )
                                                {

                                                    echo '<tr class="table-warning" style="font-weight:bold;">';
                                                        echo '<td></td>';
                                                        echo '<td></td>';
                                                        echo '<td></td>';
                                                        echo '<td class="text-right">' .$region. '</td>';
                                                        echo '<td class="text-right">' .number_format($qty_jan, 2). '</td>';
                                                        echo '<td class="text-right">' .number_format($val_jan, 2). '</td>';
                                                        echo '<td class="text-right">' .number_format($qty_feb, 2). '</td>';
                                                        echo '<td class="text-right">' .number_format($val_feb, 2). '</td>';
                                                        echo '<td class="text-right">' .number_format($qty_mar, 2). '</td>';
                                                        echo '<td class="text-right">' .number_format($val_mar, 2). '</td>';
                                                        echo '<td class="text-right">' .number_format($qty_apr, 2). '</td>';
                                                        echo '<td class="text-right">' .number_format($val_apr, 2). '</td>';
                                                        echo '<td class="text-right">' .number_format($qty_mei, 2). '</td>';
                                                        echo '<td class="text-right">' .number_format($val_mei, 2). '</td>';
                                                        echo '<td class="text-right">' .number_format($qty_jun, 2). '</td>';
                                                        echo '<td class="text-right">' .number_format($val_jun, 2). '</td>';
                                                        echo '<td class="text-right">' .number_format($qty_jul, 2). '</td>';
                                                        echo '<td class="text-right">' .number_format($val_jul, 2). '</td>';
                                                        echo '<td class="text-right">' .number_format($qty_agu, 2). '</td>';
                                                        echo '<td class="text-right">' .number_format($val_agu, 2). '</td>';
                                                        echo '<td class="text-right">' .number_format($qty_sep, 2). '</td>';
                                                        echo '<td class="text-right">' .number_format($val_sep, 2). '</td>';
                                                        echo '<td class="text-right">' .number_format($qty_okt, 2). '</td>';
                                                        echo '<td class="text-right">' .number_format($val_okt, 2). '</td>';
                                                        echo '<td class="text-right">' .number_format($qty_nop, 2). '</td>';
                                                        echo '<td class="text-right">' .number_format($val_nop, 2). '</td>';
                                                        echo '<td class="text-right">' .number_format($qty_des, 2). '</td>';
                                                        echo '<td class="text-right">' .number_format($val_des, 2). '</td>';
                                                        echo '<td class="text-right">' .number_format($qty_year, 2). '</td>';
                                                        echo '<td class="text-right">' .number_format($val_year, 2). '</td>';
                                                        echo '<td class="text-right">' .number_format($qty_year/12, 2). '</td>';
                                                        echo '<td class="text-right">' .number_format($val_year/12, 2). '</td>';
                                                        
                                                    echo '</tr>';
                                                    $qty_jan = 0;
                                                    $qty_feb = 0;
                                                    $qty_mar = 0;
                                                    $qty_apr = 0;
                                                    $qty_mei = 0;
                                                    $qty_jun = 0;
                                                    $qty_jul = 0;
                                                    $qty_agu = 0;
                                                    $qty_sep = 0;
                                                    $qty_okt = 0;
                                                    $qty_nop = 0;
                                                    $qty_des = 0;
                                                    $qty_year = 0;
                                                    $qty_avg = 0;

                                                    $val_jan = 0;
                                                    $val_feb = 0;
                                                    $val_mar = 0;
                                                    $val_apr = 0;
                                                    $val_mei = 0;
                                                    $val_jun = 0;
                                                    $val_jul = 0;
                                                    $val_agu = 0;
                                                    $val_sep = 0;
                                                    $val_okt = 0;
                                                    $val_nop = 0;
                                                    $val_des = 0;
                                                    $val_year = 0;
                                                    $val_avg = 0;
                                                }

                                                if ($island != $row['island'] and $island != '' )
                                                {

                                                    echo '<tr class="table-danger" style="font-weight:bold;">';
                                                        echo '<td></td>';
                                                        echo '<td></td>';
                                                        echo '<td></td>';
                                                        echo '<td class="text-right">' .$island. '</td>';
                                                        echo '<td class="text-right">' .number_format($sub_qty_jan, 2). '</td>';
                                                        echo '<td class="text-right">' .number_format($sub_val_jan, 2). '</td>';
                                                        echo '<td class="text-right">' .number_format($sub_qty_feb, 2). '</td>';
                                                        echo '<td class="text-right">' .number_format($sub_val_feb, 2). '</td>';
                                                        echo '<td class="text-right">' .number_format($sub_qty_mar, 2). '</td>';
                                                        echo '<td class="text-right">' .number_format($sub_val_mar, 2). '</td>';
                                                        echo '<td class="text-right">' .number_format($sub_qty_apr, 2). '</td>';
                                                        echo '<td class="text-right">' .number_format($sub_val_apr, 2). '</td>';
                                                        echo '<td class="text-right">' .number_format($sub_qty_mei, 2). '</td>';
                                                        echo '<td class="text-right">' .number_format($sub_val_mei, 2). '</td>';
                                                        echo '<td class="text-right">' .number_format($sub_qty_jun, 2). '</td>';
                                                        echo '<td class="text-right">' .number_format($sub_val_jun, 2). '</td>';
                                                        echo '<td class="text-right">' .number_format($sub_qty_jul, 2). '</td>';
                                                        echo '<td class="text-right">' .number_format($sub_val_jul, 2). '</td>';
                                                        echo '<td class="text-right">' .number_format($sub_qty_agu, 2). '</td>';
                                                        echo '<td class="text-right">' .number_format($sub_val_agu, 2). '</td>';
                                                        echo '<td class="text-right">' .number_format($sub_qty_sep, 2). '</td>';
                                                        echo '<td class="text-right">' .number_format($sub_val_sep, 2). '</td>';
                                                        echo '<td class="text-right">' .number_format($sub_qty_okt, 2). '</td>';
                                                        echo '<td class="text-right">' .number_format($sub_val_okt, 2). '</td>';
                                                        echo '<td class="text-right">' .number_format($sub_qty_nop, 2). '</td>';
                                                        echo '<td class="text-right">' .number_format($sub_val_nop, 2). '</td>';
                                                        echo '<td class="text-right">' .number_format($sub_qty_des, 2). '</td>';
                                                        echo '<td class="text-right">' .number_format($sub_val_des, 2). '</td>';
                                                        echo '<td class="text-right">' .number_format($sub_qty_year, 2). '</td>';
                                                        echo '<td class="text-right">' .number_format($sub_val_year, 2). '</td>';
                                                        echo '<td class="text-right">' .number_format($sub_qty_year/12, 2). '</td>';
                                                        echo '<td class="text-right">' .number_format($sub_val_year/12, 2). '</td>';
                                                        
                                                    echo '</tr>';
                                                    $sub_qty_jan = 0;
                                                    $sub_qty_feb = 0;
                                                    $sub_qty_mar = 0;
                                                    $sub_qty_apr = 0;
                                                    $sub_qty_mei = 0;
                                                    $sub_qty_jun = 0;
                                                    $sub_qty_jul = 0;
                                                    $sub_qty_agu = 0;
                                                    $sub_qty_sep = 0;
                                                    $sub_qty_okt = 0;
                                                    $sub_qty_nop = 0;
                                                    $sub_qty_des = 0;
                                                    $sub_qty_year = 0;
                                                    $sub_qty_avg = 0;

                                                    $sub_val_jan = 0;
                                                    $sub_val_feb = 0;
                                                    $sub_val_mar = 0;
                                                    $sub_val_apr = 0;
                                                    $sub_val_mei = 0;
                                                    $sub_val_jun = 0;
                                                    $sub_val_jul = 0;
                                                    $sub_val_agu = 0;
                                                    $sub_val_sep = 0;
                                                    $sub_val_okt = 0;
                                                    $sub_val_nop = 0;
                                                    $sub_val_des = 0;
                                                    $sub_val_year = 0;
                                                    $sub_val_avg = 0;
                                                }

                                            ?>

                                        <tr>
                                            <td class="text-center"><?= $no; ?></td>
                                            <td><?= $row['cust_code'];?></td>
                                            <td><?= $row['distributor'];?></td>
                                            <td><?= $row['area'];?></td>
                                            <td class="text-right"><?= number_format($row['qty_jan'], 2);?></td>
                                            <td class="text-right"><?= number_format($row['val_jan'], 2);?></td>
                                            <td class="text-right"><?= number_format($row['qty_feb'], 2);?></td>
                                            <td class="text-right"><?= number_format($row['val_feb'], 2);?></td>
                                            <td class="text-right"><?= number_format($row['qty_mar'], 2);?></td>
                                            <td class="text-right"><?= number_format($row['val_mar'], 2);?></td>
                                            <td class="text-right"><?= number_format($row['qty_apr'], 2);?></td>
                                            <td class="text-right"><?= number_format($row['val_apr'], 2);?></td>
                                            <td class="text-right"><?= number_format($row['qty_mei'], 2);?></td>
                                            <td class="text-right"><?= number_format($row['val_mei'], 2);?></td>
                                            <td class="text-right"><?= number_format($row['qty_jun'], 2);?></td>
                                            <td class="text-right"><?= number_format($row['val_jun'], 2);?></td>
                                            <td class="text-right"><?= number_format($row['qty_jul'], 2);?></td>
                                            <td class="text-right"><?= number_format($row['val_jul'], 2);?></td>
                                            <td class="text-right"><?= number_format($row['qty_agu'], 2);?></td>
                                            <td class="text-right"><?= number_format($row['val_agu'], 2);?></td>
                                            <td class="text-right"><?= number_format($row['qty_sep'], 2);?></td>
                                            <td class="text-right"><?= number_format($row['val_sep'], 2);?></td>
                                            <td class="text-right"><?= number_format($row['qty_okt'], 2);?></td>
                                            <td class="text-right"><?= number_format($row['val_okt'], 2);?></td>
                                            <td class="text-right"><?= number_format($row['qty_nop'], 2);?></td>
                                            <td class="text-right"><?= number_format($row['val_nop'], 2);?></td>
                                            <td class="text-right"><?= number_format($row['qty_des'], 2);?></td>
                                            <td class="text-right"><?= number_format($row['val_des'], 2);?></td>
                                            <td class="text-right"><?= number_format($row['qty_year'], 2);?></td>
                                            <td class="text-right"><?= number_format($row['val_year'], 2);?></td>
                                            <td class="text-right"><?= number_format($row['qty_year']/12, 2);?></td>
                                            <td class="text-right"><?= number_format($row['val_year']/12, 2);?></td>
                                        </tr>

                                        <?php $region = $row['region'] ?>
                                        <?php $island = $row['island'] ?>

                                        <?php $qty_jan += $row['qty_jan']; ?>
                                        <?php $qty_feb += $row['qty_feb']; ?>
                                        <?php $qty_mar += $row['qty_mar']; ?>
                                        <?php $qty_apr += $row['qty_apr']; ?>
                                        <?php $qty_mei += $row['qty_mei']; ?>
                                        <?php $qty_jun += $row['qty_jun']; ?>
                                        <?php $qty_jul += $row['qty_jul']; ?>
                                        <?php $qty_agu += $row['qty_agu']; ?>
                                        <?php $qty_sep += $row['qty_sep']; ?>
                                        <?php $qty_okt += $row['qty_okt']; ?>
                                        <?php $qty_nop += $row['qty_nop']; ?>
                                        <?php $qty_des += $row['qty_des']; ?>
                                        <?php $qty_year += $row['qty_year']; ?>

                                        <?php $val_jan += $row['val_jan']; ?>
                                        <?php $val_feb += $row['val_feb']; ?>
                                        <?php $val_mar += $row['val_mar']; ?>
                                        <?php $val_apr += $row['val_apr']; ?>
                                        <?php $val_mei += $row['val_mei']; ?>
                                        <?php $val_jun += $row['val_jun']; ?>
                                        <?php $val_jul += $row['val_jul']; ?>
                                        <?php $val_agu += $row['val_agu']; ?>
                                        <?php $val_sep += $row['val_sep']; ?>
                                        <?php $val_okt += $row['val_okt']; ?>
                                        <?php $val_nop += $row['val_nop']; ?>
                                        <?php $val_des += $row['val_des']; ?>
                                        <?php $val_year += $row['val_year']; ?>

                                        <?php $sub_qty_jan += $row['qty_jan']; ?>
                                        <?php $sub_qty_feb += $row['qty_feb']; ?>
                                        <?php $sub_qty_mar += $row['qty_mar']; ?>
                                        <?php $sub_qty_apr += $row['qty_apr']; ?>
                                        <?php $sub_qty_mei += $row['qty_mei']; ?>
                                        <?php $sub_qty_jun += $row['qty_jun']; ?>
                                        <?php $sub_qty_jul += $row['qty_jul']; ?>
                                        <?php $sub_qty_agu += $row['qty_agu']; ?>
                                        <?php $sub_qty_sep += $row['qty_sep']; ?>
                                        <?php $sub_qty_okt += $row['qty_okt']; ?>
                                        <?php $sub_qty_nop += $row['qty_nop']; ?>
                                        <?php $sub_qty_des += $row['qty_des']; ?>
                                        <?php $sub_qty_year += $row['qty_year']; ?>

                                        <?php $sub_val_jan += $row['val_jan']; ?>
                                        <?php $sub_val_feb += $row['val_feb']; ?>
                                        <?php $sub_val_mar += $row['val_mar']; ?>
                                        <?php $sub_val_apr += $row['val_apr']; ?>
                                        <?php $sub_val_mei += $row['val_mei']; ?>
                                        <?php $sub_val_jun += $row['val_jun']; ?>
                                        <?php $sub_val_jul += $row['val_jul']; ?>
                                        <?php $sub_val_agu += $row['val_agu']; ?>
                                        <?php $sub_val_sep += $row['val_sep']; ?>
                                        <?php $sub_val_okt += $row['val_okt']; ?>
                                        <?php $sub_val_nop += $row['val_nop']; ?>
                                        <?php $sub_val_des += $row['val_des']; ?>
                                        <?php $sub_val_year += $row['val_year']; ?>

                                        <?php $total_qty_jan += $row['qty_jan']; ?>
                                        <?php $total_qty_feb += $row['qty_feb']; ?>
                                        <?php $total_qty_mar += $row['qty_mar']; ?>
                                        <?php $total_qty_apr += $row['qty_apr']; ?>
                                        <?php $total_qty_mei += $row['qty_mei']; ?>
                                        <?php $total_qty_jun += $row['qty_jun']; ?>
                                        <?php $total_qty_jul += $row['qty_jul']; ?>
                                        <?php $total_qty_agu += $row['qty_agu']; ?>
                                        <?php $total_qty_sep += $row['qty_sep']; ?>
                                        <?php $total_qty_okt += $row['qty_okt']; ?>
                                        <?php $total_qty_nop += $row['qty_nop']; ?>
                                        <?php $total_qty_des += $row['qty_des']; ?>
                                        <?php $total_qty_year += $row['qty_year']; ?>

                                        <?php $total_val_jan += $row['val_jan']; ?>
                                        <?php $total_val_feb += $row['val_feb']; ?>
                                        <?php $total_val_mar += $row['val_mar']; ?>
                                        <?php $total_val_apr += $row['val_apr']; ?>
                                        <?php $total_val_mei += $row['val_mei']; ?>
                                        <?php $total_val_jun += $row['val_jun']; ?>
                                        <?php $total_val_jul += $row['val_jul']; ?>
                                        <?php $total_val_agu += $row['val_agu']; ?>
                                        <?php $total_val_sep += $row['val_sep']; ?>
                                        <?php $total_val_okt += $row['val_okt']; ?>
                                        <?php $total_val_nop += $row['val_nop']; ?>
                                        <?php $total_val_des += $row['val_des']; ?>
                                        <?php $total_val_year += $row['val_year']; ?>

                                        <?php $no++; endforeach; ?>

                                        <tr class="table-warning" style="font-weight:bold;">
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td class="text-right"><?=$region;?></td>
                                            <td class="text-right"><?=number_format($qty_jan, 2);?></td>
                                            <td class="text-right"><?=number_format($val_jan, 2);?></td>
                                            <td class="text-right"><?=number_format($qty_feb, 2);?></td>
                                            <td class="text-right"><?=number_format($val_feb, 2);?></td>
                                            <td class="text-right"><?=number_format($qty_mar, 2);?></td>
                                            <td class="text-right"><?=number_format($val_mar, 2);?></td>
                                            <td class="text-right"><?=number_format($qty_apr, 2);?></td>
                                            <td class="text-right"><?=number_format($val_apr, 2);?></td>
                                            <td class="text-right"><?=number_format($qty_mei, 2);?></td>
                                            <td class="text-right"><?=number_format($val_mei, 2);?></td>
                                            <td class="text-right"><?=number_format($qty_jun, 2);?></td>
                                            <td class="text-right"><?=number_format($val_jun, 2);?></td>
                                            <td class="text-right"><?=number_format($qty_jul, 2);?></td>
                                            <td class="text-right"><?=number_format($val_jul, 2);?></td>
                                            <td class="text-right"><?=number_format($qty_agu, 2);?></td>
                                            <td class="text-right"><?=number_format($val_agu, 2);?></td>
                                            <td class="text-right"><?=number_format($qty_sep, 2);?></td>
                                            <td class="text-right"><?=number_format($val_sep, 2);?></td>
                                            <td class="text-right"><?=number_format($qty_okt, 2);?></td>
                                            <td class="text-right"><?=number_format($val_okt, 2);?></td>
                                            <td class="text-right"><?=number_format($qty_nop, 2);?></td>
                                            <td class="text-right"><?=number_format($val_nop, 2);?></td>
                                            <td class="text-right"><?=number_format($qty_des, 2);?></td>
                                            <td class="text-right"><?=number_format($val_des, 2);?></td>
                                            <td class="text-right"><?=number_format($qty_year, 2);?></td>
                                            <td class="text-right"><?=number_format($val_year, 2);?></td>
                                            <td class="text-right"><?=number_format($qty_year/12, 2);?></td>
                                            <td class="text-right"><?=number_format($val_year/12, 2);?></td>           
                                        </tr>

                                        <tr class="table-danger" style="font-weight:bold;">
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td class="text-right"><?=$island;?></td>
                                            <td class="text-right"><?=number_format($sub_qty_jan, 2);?></td>
                                            <td class="text-right"><?=number_format($sub_val_jan, 2);?></td>
                                            <td class="text-right"><?=number_format($sub_qty_feb, 2);?></td>
                                            <td class="text-right"><?=number_format($sub_val_feb, 2);?></td>
                                            <td class="text-right"><?=number_format($sub_qty_mar, 2);?></td>
                                            <td class="text-right"><?=number_format($sub_val_mar, 2);?></td>
                                            <td class="text-right"><?=number_format($sub_qty_apr, 2);?></td>
                                            <td class="text-right"><?=number_format($sub_val_apr, 2);?></td>
                                            <td class="text-right"><?=number_format($sub_qty_mei, 2);?></td>
                                            <td class="text-right"><?=number_format($sub_val_mei, 2);?></td>
                                            <td class="text-right"><?=number_format($sub_qty_jun, 2);?></td>
                                            <td class="text-right"><?=number_format($sub_val_jun, 2);?></td>
                                            <td class="text-right"><?=number_format($sub_qty_jul, 2);?></td>
                                            <td class="text-right"><?=number_format($sub_val_jul, 2);?></td>
                                            <td class="text-right"><?=number_format($sub_qty_agu, 2);?></td>
                                            <td class="text-right"><?=number_format($sub_val_agu, 2);?></td>
                                            <td class="text-right"><?=number_format($sub_qty_sep, 2);?></td>
                                            <td class="text-right"><?=number_format($sub_val_sep, 2);?></td>
                                            <td class="text-right"><?=number_format($sub_qty_okt, 2);?></td>
                                            <td class="text-right"><?=number_format($sub_val_okt, 2);?></td>
                                            <td class="text-right"><?=number_format($sub_qty_nop, 2);?></td>
                                            <td class="text-right"><?=number_format($sub_val_nop, 2);?></td>
                                            <td class="text-right"><?=number_format($sub_qty_des, 2);?></td>
                                            <td class="text-right"><?=number_format($sub_val_des, 2);?></td>
                                            <td class="text-right"><?=number_format($sub_qty_year, 2);?></td>
                                            <td class="text-right"><?=number_format($sub_val_year, 2);?></td>
                                            <td class="text-right"><?=number_format($sub_qty_year/12, 2);?></td>
                                            <td class="text-right"><?=number_format($sub_val_year/12, 2);?></td>           
                                        </tr>

                                        <tr class="table-danger" style="font-weight:bold;">
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td class="text-right">NATIONAL</td>
                                            <td class="text-right"><?=number_format($total_qty_jan, 2);?></td>
                                            <td class="text-right"><?=number_format($total_val_jan, 2);?></td>
                                            <td class="text-right"><?=number_format($total_qty_feb, 2);?></td>
                                            <td class="text-right"><?=number_format($total_val_feb, 2);?></td>
                                            <td class="text-right"><?=number_format($total_qty_mar, 2);?></td>
                                            <td class="text-right"><?=number_format($total_val_mar, 2);?></td>
                                            <td class="text-right"><?=number_format($total_qty_apr, 2);?></td>
                                            <td class="text-right"><?=number_format($total_val_apr, 2);?></td>
                                            <td class="text-right"><?=number_format($total_qty_mei, 2);?></td>
                                            <td class="text-right"><?=number_format($total_val_mei, 2);?></td>
                                            <td class="text-right"><?=number_format($total_qty_jun, 2);?></td>
                                            <td class="text-right"><?=number_format($total_val_jun, 2);?></td>
                                            <td class="text-right"><?=number_format($total_qty_jul, 2);?></td>
                                            <td class="text-right"><?=number_format($total_val_jul, 2);?></td>
                                            <td class="text-right"><?=number_format($total_qty_agu, 2);?></td>
                                            <td class="text-right"><?=number_format($total_val_agu, 2);?></td>
                                            <td class="text-right"><?=number_format($total_qty_sep, 2);?></td>
                                            <td class="text-right"><?=number_format($total_val_sep, 2);?></td>
                                            <td class="text-right"><?=number_format($total_qty_okt, 2);?></td>
                                            <td class="text-right"><?=number_format($total_val_okt, 2);?></td>
                                            <td class="text-right"><?=number_format($total_qty_nop, 2);?></td>
                                            <td class="text-right"><?=number_format($total_val_nop, 2);?></td>
                                            <td class="text-right"><?=number_format($total_qty_des, 2);?></td>
                                            <td class="text-right"><?=number_format($total_val_des, 2);?></td>
                                            <td class="text-right"><?=number_format($total_qty_year, 2);?></td>
                                            <td class="text-right"><?=number_format($total_val_year, 2);?></td>
                                            <td class="text-right"><?=number_format($total_qty_year/12, 2);?></td>
                                            <td class="text-right"><?=number_format($total_val_year/12, 2);?></td>           
                                        </tr>
                                        
                                    </tbody>
                                </table>

                                <!-- <?php// echo json_encode($dist_val); ?>  -->
                                
                                <div id="chart" style="width: 100%;height: 100%; margin-top: 50px;">
                                    <a style="float:right; margin-right: 30px;" class="btn btn-outline-info" href="#top"><i class="fas fa-table"> Table</i></a>
                                    <canvas id="myChart"></canvas>
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

var randomColorGenerator = function () { 
    return '#' + (Math.random().toString(16) + '0000000').slice(2, 8); 
};

var ctx = document.getElementById("myChart");
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: <?php echo json_encode($dist_name); ?>,
        datasets: [
            {
                label: "Value",
                backgroundColor: [
                    randomColorGenerator(),
                    randomColorGenerator(),
                    randomColorGenerator(),
                    randomColorGenerator(),
                    randomColorGenerator(),
                    randomColorGenerator(),
                    randomColorGenerator(),
                    randomColorGenerator(),
                    randomColorGenerator(),
                    randomColorGenerator(),
                    randomColorGenerator(),
                    randomColorGenerator(),
                    randomColorGenerator(),
                    randomColorGenerator(),
                    randomColorGenerator(),
                    randomColorGenerator(),
                    randomColorGenerator(),
                    randomColorGenerator(),
                    randomColorGenerator(),
                    randomColorGenerator(),
                    randomColorGenerator(),
                    randomColorGenerator(),
                    randomColorGenerator(),
                    randomColorGenerator(),
                    randomColorGenerator(),
                    randomColorGenerator(),
                    randomColorGenerator(),
                    randomColorGenerator(),
                    randomColorGenerator(),
                    randomColorGenerator(),
                    randomColorGenerator(),
                    randomColorGenerator(),
                    randomColorGenerator(),
                    randomColorGenerator(),
                    randomColorGenerator(),
                ],
                data: <?php echo json_encode($dist_val); ?>
            }
        ]
    },
    options: {
      legend: { display: false },
      title: {
        display: true,
        text: 'Selling In - Distributor',
        fontSize: 16,
      },
      plugins: {
          labels: false,
      }
    }
});
</script>
