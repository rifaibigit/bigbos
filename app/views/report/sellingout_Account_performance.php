  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Report Selling Out - Group Account Performance</h1> 

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
                <form action="<?= base_url; ?>/Report/Sellingout_Account_Performance" method="post">
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
                                        $old_year = $year - 1;

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
                                        <a class="btn btn-outline-secondary" href="<?= base_url; ?>/Report/Sellingout_Account_Performance">Reset</a>
                                    </div>
                                    <div style="margin-left : 5px; margin-bottom: 5px;">
                                        <button class="btn float-right btn btn-outline-success" type="submit" formaction="<?= base_url; ?>/Report/export_sellingout_Account_Performance"><i class = "fa fa-download"> Excel</i></button>
                                    </div>
                            </div>

                            <!-- <div id="hasil_sale_out"></div> -->
                            <div class="table-responsive-sm text-small">
                                <table id="sale_out_ot2" class="table table-bordered table-sm nowrap" align="left" style="font-size:85%; border: 1px solid black;table-layout:fixed;">
                                    <thead class="table-warning">
                                        <tr>
                                            <th rowspan="3" class="text-center" style="vertical-align: middle;">#</th>
                                            <th rowspan="3" class="text-center" style="vertical-align: middle;">Group Account</th>
                                            <th rowspan="3" class="text-center" style="vertical-align: middle;">Outlet Code</th>
                                            <th rowspan="3" class="text-center" style="vertical-align: middle;">BIG Code</th>
                                            <th rowspan="3" class="text-center" style="vertical-align: middle;">Outlet Name</th>
                                            <th rowspan="3" class="text-center" style="vertical-align: middle;">Outlet Type</th>
                                            <th rowspan="3" class="text-center" style="vertical-align: middle;">Outlet Count</th>
                                            <th rowspan="3" class="text-center" style="vertical-align: middle;">Area</th>
                                            <th colspan="36" class="text-center" style="vertical-align: middle;">Month</th>
                                            <th colspan="3" rowspan="2" class="text-center" style="width: 280px !important; vertical-align: middle; background-color: #fd9191ff;">Total <?=  $year; ?></th>
                                            <th colspan="3" rowspan="2" class="text-center" style="width: 280px !important; vertical-align: middle; background-color: #fd9191ff;">Total <?= $old_year; ?></th>
                                        </tr>
                                        <tr>
                                            <th colspan="3" class="text-center" style="width: 300px !important;">January</th>
                                            <th colspan="3" class="text-center" style="width: 300px !important;">February</th>
                                            <th colspan="3" class="text-center" style="width: 300px !important;">March</th>
                                            <th colspan="3" class="text-center" style="width: 300px !important;">April</th>
                                            <th colspan="3" class="text-center" style="width: 300px !important;">May</th>
                                            <th colspan="3" class="text-center" style="width: 300px !important;">June</th>
                                            <th colspan="3" class="text-center" style="width: 300px !important;">July</th>
                                            <th colspan="3" class="text-center" style="width: 300px !important;">August</th>
                                            <th colspan="3" class="text-center" style="width: 300px !important;">September</th>
                                            <th colspan="3" class="text-center" style="width: 300px !important;">October</th>
                                            <th colspan="3" class="text-center" style="width: 300px !important;">November</th>
                                            <th colspan="3" class="text-center" style="width: 300px !important;">December</th>
                                            <!-- <th colspan="2" class="text-center" style="width: 110px">Total</th>
                                            <th colspan="2" class="text-center" style="width: 110px">Average</th> -->
                                        </tr>

                                        <tr>
                                            <th class="text-center" style="width: 100px !important;">Target</th>
                                            <th class="text-center" style="width: 100px !important;">Actual</th>
                                            <th class="text-center">%</th>
                                            <th class="text-center" style="width: 100px !important;">Target</th>
                                            <th class="text-center" style="width: 100px !important;">Actual</th>
                                            <th class="text-center">%</th>
                                            <th class="text-center" style="width: 100px !important;">Target</th>
                                            <th class="text-center" style="width: 100px !important;">Actual</th>
                                            <th class="text-center">%</th>
                                            <th class="text-center" style="width: 100px !important;">Target</th>
                                            <th class="text-center" style="width: 100px !important;">Actual</th>
                                            <th class="text-center">%</th>
                                            <th class="text-center" style="width: 100px !important;">Target</th>
                                            <th class="text-center" style="width: 100px !important;">Actual</th>
                                            <th class="text-center">%</th>
                                            <th class="text-center" style="width: 100px !important;">Target</th>
                                            <th class="text-center" style="width: 100px !important;">Actual</th>
                                            <th class="text-center">%</th>
                                            <th class="text-center" style="width: 100px !important;">Target</th>
                                            <th class="text-center" style="width: 100px !important;">Actual</th>
                                            <th class="text-center">%</th>
                                            <th class="text-center" style="width: 100px !important;">Target</th>
                                            <th class="text-center" style="width: 100px !important;">Actual</th>
                                            <th class="text-center">%</th>
                                            <th class="text-center" style="width: 100px !important;">Target</th>
                                            <th class="text-center" style="width: 100px !important;">Actual</th>
                                            <th class="text-center">%</th>
                                            <th class="text-center" style="width: 100px !important;">Target</th>
                                            <th class="text-center" style="width: 100px !important;">Actual</th>
                                            <th class="text-center">%</th>
                                            <th class="text-center" style="width: 100px !important;">Target</th>
                                            <th class="text-center" style="width: 100px !important;">Actual</th>
                                            <th class="text-center">%</th>
                                            <th class="text-center" style="width: 100px !important;">Target</th>
                                            <th class="text-center" style="width: 100px !important;">Actual</th>
                                            <th class="text-center">%</th>
                                            <th class="text-center" style="background-color: #fd9191ff;">Target</th>
                                            <th class="text-center" style="background-color: #fd9191ff;">Actual</th>
                                            <th class="text-center" style="background-color: #fd9191ff;">%</th>
                                            <th class="text-center" style="background-color: #fd9191ff;">Target</th>
                                            <th class="text-center" style="background-color: #fd9191ff;">Actual</th>
                                            <th class="text-center" style="background-color: #fd9191ff;">%</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 

                                            $group_account = '';
                                            $outlet_count = 0;
                                            $total_outlet_count = 0;

                                            $target_jan = 0;
                                            $target_feb = 0;
                                            $target_mar = 0;
                                            $target_apr = 0;
                                            $target_mei = 0;
                                            $target_jun = 0;
                                            $target_jul = 0;
                                            $target_agu = 0;
                                            $target_sep = 0;
                                            $target_okt = 0;
                                            $target_nop = 0;
                                            $target_des = 0;
                                            $target_year_now = 0;
                                            $target_year_old = 0;

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
                                            $val_year_now = 0;
                                            $val_year_old = 0;

                                            $p_jan = 0;
                                            $p_feb = 0;
                                            $p_mar = 0;
                                            $p_apr = 0;
                                            $p_mei = 0;
                                            $p_jun = 0;
                                            $p_jul = 0;
                                            $p_agu = 0;
                                            $p_sep = 0;
                                            $p_okt = 0;
                                            $p_nop = 0;
                                            $p_des = 0;
                                            $p_year_now = 0;
                                            $p_year_old = 0;

                                            $total_target_jan = 0;
                                            $total_target_feb = 0;
                                            $total_target_mar = 0;
                                            $total_target_apr = 0;
                                            $total_target_mei = 0;
                                            $total_target_jun = 0;
                                            $total_target_jul = 0;
                                            $total_target_agu = 0;
                                            $total_target_sep = 0;
                                            $total_target_okt = 0;
                                            $total_target_nop = 0;
                                            $total_target_des = 0;
                                            $total_target_year_now = 0;
                                            $total_target_year_old = 0;

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
                                            $total_val_year_now = 0;
                                            $total_val_year_old = 0;

                                            $total_p_jan = 0;
                                            $total_p_feb = 0;
                                            $total_p_mar = 0;
                                            $total_p_apr = 0;
                                            $total_p_mei = 0;
                                            $total_p_jun = 0;
                                            $total_p_jul = 0;
                                            $total_p_agu = 0;
                                            $total_p_sep = 0;
                                            $total_p_okt = 0;
                                            $total_p_nop = 0;
                                            $total_p_des = 0;
                                            $total_p_year_now = 0;
                                            $total_p_year_old = 0;
                                        ?>

                                        <?php
                                            function persen($val, $target) {
                                                $val = (float)$val;
                                                $target = (float)$target;

                                                return ($target > 0) ? number_format(($val / $target) * 100, 0) : 0;
                                            }
                                        ?>

                                        <?php $no=1; ?>
                                        <?php foreach ($data['sellingout_account_performance'] as $row) :?>

                                        <?php
                                            if ($group_account != $row['group_account'] and $group_account != '' )
                                            {

                                                echo '<tr class="table-warning" style="font-weight:bold;">';
                                                    echo '<td class="text-center"></td>';
                                                    echo '<td class="text-center"></td>';
                                                    echo '<td class="text-center"></td>';
                                                    echo '<td class="text-center"></td>';
                                                    echo '<td class="text-center">' . $group_account. '</td>';
                                                    echo '<td class="text-center"></td>';
                                                    echo '<td class="text-center">' . number_format($outlet_count, 0) . '</td>';
                                                    echo '<td class="text-center"></td>';
                                                    echo '<td class="text-right">' . number_format($target_jan, 0). '</td>';
                                                    echo '<td class="text-right">' . number_format($val_jan, 0). '</td>';
                                                    echo '<td class="text-right">' . number_format($p_jan, 0). '</td>';
                                                    echo '<td class="text-right">' . number_format($target_feb, 0). '</td>';
                                                    echo '<td class="text-right">' . number_format($val_feb, 0). '</td>';
                                                    echo '<td class="text-right">' . number_format($p_feb, 0). '</td>';
                                                    echo '<td class="text-right">' . number_format($target_mar, 0). '</td>';
                                                    echo '<td class="text-right">' . number_format($val_mar, 0). '</td>';
                                                    echo '<td class="text-right">' . number_format($p_mar, 0). '</td>';
                                                    echo '<td class="text-right">' . number_format($target_apr, 0). '</td>';
                                                    echo '<td class="text-right">' . number_format($val_apr, 0). '</td>';
                                                    echo '<td class="text-right">' . number_format($p_apr, 0). '</td>';
                                                    echo '<td class="text-right">' . number_format($target_mei, 0). '</td>';
                                                    echo '<td class="text-right">' . number_format($val_mei, 0). '</td>';
                                                    echo '<td class="text-right">' . number_format($p_mei, 0). '</td>';
                                                    echo '<td class="text-right">' . number_format($target_jun, 0). '</td>';
                                                    echo '<td class="text-right">' . number_format($val_jun, 0). '</td>';
                                                    echo '<td class="text-right">' . number_format($p_jun, 0). '</td>';
                                                    echo '<td class="text-right">' . number_format($target_jul, 0). '</td>';
                                                    echo '<td class="text-right">' . number_format($val_jul, 0). '</td>';
                                                    echo '<td class="text-right">' . number_format($p_jul, 0). '</td>';
                                                    echo '<td class="text-right">' . number_format($target_agu, 0). '</td>';
                                                    echo '<td class="text-right">' . number_format($val_agu, 0). '</td>';
                                                    echo '<td class="text-right">' . number_format($p_agu, 0). '</td>';
                                                    echo '<td class="text-right">' . number_format($target_sep, 0). '</td>';
                                                    echo '<td class="text-right">' . number_format($val_sep, 0). '</td>';
                                                    echo '<td class="text-right">' . number_format($p_sep, 0). '</td>';
                                                    echo '<td class="text-right">' . number_format($target_okt, 0). '</td>';
                                                    echo '<td class="text-right">' . number_format($val_okt, 0). '</td>';
                                                    echo '<td class="text-right">' . number_format($p_okt, 0). '</td>';
                                                    echo '<td class="text-right">' . number_format($target_nop, 0). '</td>';
                                                    echo '<td class="text-right">' . number_format($val_nop, 0). '</td>';
                                                    echo '<td class="text-right">' . number_format($p_nop, 0). '</td>';
                                                    echo '<td class="text-right">' . number_format($target_des, 0). '</td>';
                                                    echo '<td class="text-right">' . number_format($val_des, 0). '</td>';
                                                    echo '<td class="text-right">' . number_format($p_des, 0). '</td>';
                                                    echo '<td class="text-right">' . number_format($target_year_now, 0). '</td>';
                                                    echo '<td class="text-right">' . number_format($val_year_now, 0). '</td>';
                                                    echo '<td class="text-right">' . number_format($p_year_now, 0). '</td>';
                                                    echo '<td class="text-right">' . number_format($target_year_old, 0). '</td>';
                                                    echo '<td class="text-right">' . number_format($val_year_old, 0). '</td>';
                                                    echo '<td class="text-right">' . number_format($p_year_old, 0). '</td>';
                                                    
                                                echo '</tr>';

                                                $outlet_count = 0;

                                                $target_jan = 0;
                                                $target_feb = 0;
                                                $target_mar = 0;
                                                $target_apr = 0;
                                                $target_mei = 0;
                                                $target_jun = 0;
                                                $target_jul = 0;
                                                $target_agu = 0;
                                                $target_sep = 0;
                                                $target_okt = 0;
                                                $target_nop = 0;
                                                $target_des = 0;
                                                $target_year_now = 0;
                                                $target_year_old = 0;

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
                                                $val_year_now = 0;
                                                $val_year_old = 0;

                                                $p_jan = 0;
                                                $p_feb = 0;
                                                $p_mar = 0;
                                                $p_apr = 0;
                                                $p_mei = 0;
                                                $p_jun = 0;
                                                $p_jul = 0;
                                                $p_agu = 0;
                                                $p_sep = 0;
                                                $p_okt = 0;
                                                $p_nop = 0;
                                                $p_des = 0;
                                                $p_year_now = 0;
                                                $p_year_old = 0;

                                            }
                                        ;?>
                                        <tr>
                                            <td class="text-center"><?= $no; ?></td>
                                            <td class="text-center"><?= $row['group_account'];?></td>
                                            <td class="text-center"><?= $row['cust_code'];?></td>
                                            <td class="text-center"><?= $row['big_code'];?></td>
                                            <td class="text-left"><?= $row['cust_name'];?></td>
                                            <td class="text-center"><?= $row['outlet_type'];?></td>
                                            <td class="text-center"><?= $row['outlet_count'];?></td>
                                            <td class="text-center"><?= $row['area'];?></td>
                                            <td class="text-right td-num"><?= number_format($row['target_jan'], 0);?></td>
                                            <td class="text-right td-num"><?= number_format($row['val_jan'], 0);?></td>
                                            <td class="text-right td-num"><?= persen($row['val_jan'], $row['target_jan']);?></td>
                                            <td class="text-right td-num"><?= number_format($row['target_feb'], 0);?></td>
                                            <td class="text-right td-num"><?= number_format($row['val_feb'], 0);?></td>
                                            <td class="text-right td-num"><?= persen($row['val_feb'], $row['target_feb']);?></td>
                                            <td class="text-right td-num"><?= number_format($row['target_mar'], 0);?></td>
                                            <td class="text-right td-num"><?= number_format($row['val_mar'], 0);?></td>
                                            <td class="text-right td-num"><?= persen($row['val_mar'], $row['target_mar']);?></td>
                                            <td class="text-right td-num"><?= number_format($row['target_apr'], 0);?></td>
                                            <td class="text-right td-num"><?= number_format($row['val_apr'], 0);?></td>
                                            <td class="text-right td-num"><?= persen($row['val_apr'], $row['target_apr']);?></td>
                                            <td class="text-right td-num"><?= number_format($row['target_mei'], 0);?></td>
                                            <td class="text-right td-num"><?= number_format($row['val_mei'], 0);?></td>
                                            <td class="text-right td-num"><?= persen($row['val_mei'], $row['target_mei']);?></td>
                                            <td class="text-right td-num"><?= number_format($row['target_jun'], 0);?></td>
                                            <td class="text-right td-num"><?= number_format($row['val_jun'], 0);?></td>
                                            <td class="text-right td-num"><?= persen($row['val_jun'], $row['target_jun']);?></td>
                                            <td class="text-right td-num"><?= number_format($row['target_jul'], 0);?></td>
                                            <td class="text-right td-num"><?= number_format($row['val_jul'], 0);?></td>
                                            <td class="text-right td-num"><?= persen($row['val_jul'], $row['target_jul']);?></td>
                                            <td class="text-right td-num"><?= number_format($row['target_agu'], 0);?></td>
                                            <td class="text-right td-num"><?= number_format($row['val_agu'], 0);?></td>
                                            <td class="text-right td-num"><?= persen($row['val_agu'], $row['target_agu']);?></td>
                                            <td class="text-right td-num"><?= number_format($row['target_sep'], 0);?></td>
                                            <td class="text-right td-num"><?= number_format($row['val_sep'], 0);?></td>
                                            <td class="text-right td-num"><?= persen($row['val_sep'], $row['target_sep']);?></td>
                                            <td class="text-right td-num"><?= number_format($row['target_okt'], 0);?></td>
                                            <td class="text-right td-num"><?= number_format($row['val_okt'], 0);?></td>
                                            <td class="text-right td-num"><?= persen($row['val_okt'], $row['target_okt']);?></td>
                                            <td class="text-right td-num"><?= number_format($row['target_nop'], 0);?></td>
                                            <td class="text-right td-num"><?= number_format($row['val_nop'], 0);?></td>
                                            <td class="text-right td-num"><?= persen($row['val_nop'], $row['target_nop']);?></td>
                                            <td class="text-right td-num"><?= number_format($row['target_des'], 0);?></td>
                                            <td class="text-right td-num"><?= number_format($row['val_des'], 0);?></td>
                                            <td class="text-right td-num"><?= persen($row['val_des'], $row['target_des']);?></td>
                                            <td class="text-right td-num"><?= number_format($row['target_year_now'], 0);?></td>
                                            <td class="text-right td-num"><?= number_format($row['val_year_now'], 0);?></td>
                                            <td class="text-right td-num"><?= persen($row['val_year_now'], $row['target_year_now']);?></td>
                                            <td class="text-right td-num"><?= number_format($row['target_year_old'], 0);?></td>
                                            <td class="text-right td-num"><?= number_format($row['val_year_old'], 0);?></td>
                                            <td class="text-right td-num"><?= persen($row['val_year_old'], $row['target_year_old']);?></td>
                                        </tr>

                                        <?php $group_account = $row['group_account']; ?>
                                        <?php $outlet_count += $row['outlet_count']; ?>
                                        <?php $total_outlet_count += $row['outlet_count']; ?>

                                        <?php $target_jan += $row['target_jan']; ?>
                                        <?php $target_feb += $row['target_feb']; ?>
                                        <?php $target_mar += $row['target_mar']; ?>
                                        <?php $target_apr += $row['target_apr']; ?>
                                        <?php $target_mei += $row['target_mei']; ?>
                                        <?php $target_jun += $row['target_jun']; ?>
                                        <?php $target_jul += $row['target_jul']; ?>
                                        <?php $target_agu += $row['target_agu']; ?>
                                        <?php $target_sep += $row['target_sep']; ?>
                                        <?php $target_okt += $row['target_okt']; ?>
                                        <?php $target_nop += $row['target_nop']; ?>
                                        <?php $target_des += $row['target_des']; ?>
                                        <?php $target_year_now += $row['target_year_now']; ?>
                                        <?php $target_year_old += $row['target_year_old']; ?>

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
                                        <?php $val_year_now += $row['val_year_now']; ?>
                                        <?php $val_year_old += $row['val_year_old']; ?>

                                        <?php $p_jan += persen($row['val_jan'], $row['target_jan']); ?>
                                        <?php $p_feb += persen($row['val_feb'], $row['target_feb']); ?>
                                        <?php $p_mar += persen($row['val_mar'], $row['target_mar']); ?>
                                        <?php $p_apr += persen($row['val_apr'], $row['target_apr']); ?>
                                        <?php $p_mei += persen($row['val_mei'], $row['target_mei']); ?>
                                        <?php $p_jun += persen($row['val_jun'], $row['target_jun']); ?>
                                        <?php $p_jul += persen($row['val_jul'], $row['target_jul']); ?>
                                        <?php $p_agu += persen($row['val_agu'], $row['target_agu']); ?>
                                        <?php $p_sep += persen($row['val_sep'], $row['target_sep']); ?>
                                        <?php $p_okt += persen($row['val_okt'], $row['target_okt']); ?>
                                        <?php $p_nop += persen($row['val_nop'], $row['target_nop']); ?>
                                        <?php $p_des += persen($row['val_des'], $row['target_des']); ?>
                                        <?php $p_year_now += persen($row['val_year_now'], $row['target_year_now']); ?>
                                        <?php $p_year_old += persen($row['val_year_old'], $row['target_year_old']); ?>

                                        <?php $total_target_jan += $row['target_jan']; ?>
                                        <?php $total_target_feb += $row['target_feb']; ?>
                                        <?php $total_target_mar += $row['target_mar']; ?>
                                        <?php $total_target_apr += $row['target_apr']; ?>
                                        <?php $total_target_mei += $row['target_mei']; ?>
                                        <?php $total_target_jun += $row['target_jun']; ?>
                                        <?php $total_target_jul += $row['target_jul']; ?>
                                        <?php $total_target_agu += $row['target_agu']; ?>
                                        <?php $total_target_sep += $row['target_sep']; ?>
                                        <?php $total_target_okt += $row['target_okt']; ?>
                                        <?php $total_target_nop += $row['target_nop']; ?>
                                        <?php $total_target_des += $row['target_des']; ?>
                                        <?php $total_target_year_now += $row['target_year_now']; ?>
                                        <?php $total_target_year_old += $row['target_year_old']; ?>

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
                                        <?php $total_val_year_now += $row['val_year_now']; ?>
                                        <?php $total_val_year_old += $row['val_year_old']; ?>

                                        <?php $total_p_jan += persen($row['val_jan'], $row['target_jan']); ?>
                                        <?php $total_p_feb += persen($row['val_feb'], $row['target_feb']); ?>
                                        <?php $total_p_mar += persen($row['val_mar'], $row['target_mar']); ?>
                                        <?php $total_p_apr += persen($row['val_apr'], $row['target_apr']); ?>
                                        <?php $total_p_mei += persen($row['val_mei'], $row['target_mei']); ?>
                                        <?php $total_p_jun += persen($row['val_jun'], $row['target_jun']); ?>
                                        <?php $total_p_jul += persen($row['val_jul'], $row['target_jul']); ?>
                                        <?php $total_p_agu += persen($row['val_agu'], $row['target_agu']); ?>
                                        <?php $total_p_sep += persen($row['val_sep'], $row['target_sep']); ?>
                                        <?php $total_p_okt += persen($row['val_okt'], $row['target_okt']); ?>
                                        <?php $total_p_nop += persen($row['val_nop'], $row['target_nop']); ?>
                                        <?php $total_p_des += persen($row['val_des'], $row['target_des']); ?>
                                        <?php $total_p_year_now += persen($row['val_year_now'], $row['target_year_now']); ?>
                                        <?php $total_p_year_old += persen($row['val_year_old'], $row['target_year_old']); ?>

                                        <?php $no++; endforeach; ?>

                                        <tr class="table-warning" style="font-weight:bold;">
                                            <td class="text-center"></td>
                                            <td class="text-center"></td>
                                            <td class="text-center"></td>
                                            <td class="text-center"></td>
                                            <td class="text-center"><?= $group_account; ?></td>
                                            <td class="text-center"></td>
                                            <td class="text-center"><?= number_format($outlet_count, 0); ?></td>
                                            <td class="text-center"></td>
                                            <td class="text-right td-num"><?= number_format($target_jan, 0); ?></td>
                                            <td class="text-right td-num"><?= number_format($val_jan, 0); ?></td>
                                            <td class="text-right td-num"><?= number_format($p_jan, 0); ?></td>
                                            <td class="text-right td-num"><?= number_format($target_feb, 0); ?></td>
                                            <td class="text-right td-num"><?= number_format($val_feb, 0); ?></td>
                                            <td class="text-right td-num"><?= number_format($p_feb, 0); ?></td>
                                            <td class="text-right td-num"><?= number_format($target_mar, 0); ?></td>
                                            <td class="text-right td-num"><?= number_format($val_mar, 0); ?></td>
                                            <td class="text-right td-num"><?= number_format($p_mar, 0); ?></td>
                                            <td class="text-right td-num"><?= number_format($target_apr, 0); ?></td>
                                            <td class="text-right td-num"><?= number_format($val_apr, 0); ?></td>
                                            <td class="text-right td-num"><?= number_format($p_apr, 0); ?></td>
                                            <td class="text-right td-num"><?= number_format($target_mei, 0); ?></td>
                                            <td class="text-right td-num"><?= number_format($val_mei, 0); ?></td>
                                            <td class="text-right td-num"><?= number_format($p_mei, 0); ?></td>
                                            <td class="text-right td-num"><?= number_format($target_jun, 0); ?></td>
                                            <td class="text-right td-num"><?= number_format($val_jun, 0); ?></td>
                                            <td class="text-right td-num"><?= number_format($p_jun, 0); ?></td>
                                            <td class="text-right td-num"><?= number_format($target_jul, 0); ?></td>
                                            <td class="text-right td-num"><?= number_format($val_jul, 0); ?></td>
                                            <td class="text-right td-num"><?= number_format($p_jul, 0); ?></td>
                                            <td class="text-right td-num"><?= number_format($target_agu, 0); ?></td>
                                            <td class="text-right td-num"><?= number_format($val_agu, 0); ?></td>
                                            <td class="text-right td-num"><?= number_format($p_agu, 0); ?></td>
                                            <td class="text-right td-num"><?= number_format($target_sep, 0); ?></td>
                                            <td class="text-right td-num"><?= number_format($val_sep, 0); ?></td>
                                            <td class="text-right td-num"><?= number_format($p_sep, 0); ?></td>
                                            <td class="text-right td-num"><?= number_format($target_okt, 0); ?></td>
                                            <td class="text-right td-num"><?= number_format($val_okt, 0); ?></td>
                                            <td class="text-right td-num"><?= number_format($p_okt, 0); ?></td>
                                            <td class="text-right td-num"><?= number_format($target_nop, 0); ?></td>
                                            <td class="text-right td-num"><?= number_format($val_nop, 0); ?></td>
                                            <td class="text-right td-num"><?= number_format($p_nop, 0); ?></td>
                                            <td class="text-right td-num"><?= number_format($target_des, 0); ?></td>
                                            <td class="text-right td-num"><?= number_format($val_des, 0); ?></td>
                                            <td class="text-right td-num"><?= number_format($p_des, 0); ?></td>
                                            <td class="text-right td-num"><?= number_format($target_year_now, 0); ?></td>
                                            <td class="text-right td-num"><?= number_format($val_year_now, 0); ?></td>
                                            <td class="text-right td-num"><?= number_format($p_year_now, 0); ?></td>
                                            <td class="text-right td-num"><?= number_format($target_year_old, 0); ?></td>
                                            <td class="text-right td-num"><?= number_format($val_year_old, 0); ?></td> 
                                            <td class="text-right td-num"><?= number_format($p_year_old, 0); ?></td>
                                        </tr>

                                        <tr class="table-danger" style="font-weight:bold;">
                                            <td class="text-center"></td>
                                            <td class="text-center"></td>
                                            <td class="text-center"></td>
                                            <td class="text-center"></td>
                                            <td class="text-center">TOTAL</td>
                                            <td class="text-center"></td>
                                            <td class="text-center"><?= number_format($total_outlet_count, 0); ?></td>
                                            <td class="text-center"></td>
                                            <td class="text-right td-num"><?= number_format($total_target_jan, 0); ?></td>
                                            <td class="text-right td-num"><?= number_format($total_val_jan, 0); ?></td>
                                            <td class="text-right td-num"><?= number_format($total_p_jan, 0); ?></td>
                                            <td class="text-right td-num"><?= number_format($total_target_feb, 0); ?></td>
                                            <td class="text-right td-num"><?= number_format($total_val_feb, 0); ?></td>
                                            <td class="text-right td-num"><?= number_format($total_p_feb, 0); ?></td>
                                            <td class="text-right td-num"><?= number_format($total_target_mar, 0); ?></td>
                                            <td class="text-right td-num"><?= number_format($total_val_mar, 0); ?></td>
                                            <td class="text-right td-num"><?= number_format($total_p_mar, 0); ?></td>
                                            <td class="text-right td-num"><?= number_format($total_target_apr, 0); ?></td>
                                            <td class="text-right td-num"><?= number_format($total_val_apr, 0); ?></td>
                                            <td class="text-right td-num"><?= number_format($total_p_apr, 0); ?></td>
                                            <td class="text-right td-num"><?= number_format($total_target_mei, 0); ?></td>
                                            <td class="text-right td-num"><?= number_format($total_val_mei, 0); ?></td>
                                            <td class="text-right td-num"><?= number_format($total_p_mei, 0); ?></td>
                                            <td class="text-right td-num"><?= number_format($total_target_jun, 0); ?></td>
                                            <td class="text-right td-num"><?= number_format($total_val_jun, 0); ?></td>
                                            <td class="text-right td-num"><?= number_format($total_p_jun, 0); ?></td>
                                            <td class="text-right td-num"><?= number_format($total_target_jul, 0); ?></td>
                                            <td class="text-right td-num"><?= number_format($total_val_jul, 0); ?></td>
                                            <td class="text-right td-num"><?= number_format($total_p_jul, 0); ?></td>
                                            <td class="text-right td-num"><?= number_format($total_target_agu, 0); ?></td>
                                            <td class="text-right td-num"><?= number_format($total_val_agu, 0); ?></td>
                                            <td class="text-right td-num"><?= number_format($total_p_agu, 0); ?></td>
                                            <td class="text-right td-num"><?= number_format($total_target_sep, 0); ?></td>
                                            <td class="text-right td-num"><?= number_format($total_val_sep, 0); ?></td>
                                            <td class="text-right td-num"><?= number_format($total_p_sep, 0); ?></td>
                                            <td class="text-right td-num"><?= number_format($total_target_okt, 0); ?></td>
                                            <td class="text-right td-num"><?= number_format($total_val_okt, 0); ?></td>
                                            <td class="text-right td-num"><?= number_format($total_p_okt, 0); ?></td>
                                            <td class="text-right td-num"><?= number_format($total_target_nop, 0); ?></td>
                                            <td class="text-right td-num"><?= number_format($total_val_nop, 0); ?></td>
                                            <td class="text-right td-num"><?= number_format($total_p_nop, 0); ?></td>
                                            <td class="text-right td-num"><?= number_format($total_target_des, 0); ?></td>
                                            <td class="text-right td-num"><?= number_format($total_val_des, 0); ?></td>
                                            <td class="text-right td-num"><?= number_format($total_p_des, 0); ?></td>
                                            <td class="text-right td-num"><?= number_format($total_target_year_now, 0); ?></td>
                                            <td class="text-right td-num"><?= number_format($total_val_year_now, 0); ?></td>
                                            <td class="text-right td-num"><?= number_format($total_p_year_now, 0); ?></td>
                                            <td class="text-right td-num"><?= number_format($total_target_year_old, 0); ?></td>
                                            <td class="text-right td-num"><?= number_format($total_val_year_old, 0); ?></td> 
                                            <td class="text-right td-num"><?= number_format($total_p_year_old, 0); ?></td>
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
                                    /* .table td, 
                                    .table th {
                                        vertical-align: middle;
                                        white-space: nowrap !important;
                                    }
                                    .td-num {
                                        white-space: nowrap !important;
                                    } */
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
        tb_sale_out_ot = $('#sale_out_ot2').DataTable({
            "scrollY": 460,
            "scrollX": true,
            "autoWidth": true,
            "responsive": true,
            "paging":   false,
            // "lengthMenu": [200, 300, 400, 500],
            // "pageLength": 200,
            "ordering": false,
            "searching": false,
            "info": false,
            "fixedColumns":   {
                "leftColumns": 5
            },
        });
    
    });
</script>

<!-- <script type="text/javascript">
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
            'url': '<?= base_url; ?>/Report/Sellingout_AccountShow',
            'data': {'by_principal': by_principal, 'by_channel': by_channel, 'by_outlet_type': by_outlet_type, 'by_outlet_code': by_outlet_code, 'by_sku': by_sku, 'by_area': by_area, 'by_year': by_year},
            },
            "fnCreatedRow": function (row, data, index) {
            $('td', row).eq(0).html(index + 1);
            },
            "columns": [
                { "data": "cust_code","sClass": "text-center"},
                { "data": "group_account","sClass": "text-center"},
                { "data": "cust_code","sClass": "text-center"},
                { "data": "big_code","sClass": "text-left"},
                { "data": "cust_name","sClass": "text-left"},
                { "data": "outlet_type","sClass": "text-center"},
                { "data": "outlet_count","sClass": "text-center"},
                { "data": "area","sClass": "text-center"},
                { "data": "qty_jan","sClass": "text-right", render: $.fn.dataTable.render.number( ',', '.', 0, '' )},
                { "data": "val_jan","sClass": "text-right", render: $.fn.dataTable.render.number( ',', '.', 0, '' )},
                { "data": "qty_feb","sClass": "text-right", render: $.fn.dataTable.render.number( ',', '.', 0, '' )},
                { "data": "val_feb","sClass": "text-right", render: $.fn.dataTable.render.number( ',', '.', 0, '' )},
                { "data": "qty_mar","sClass": "text-right", render: $.fn.dataTable.render.number( ',', '.', 0, '' )},
                { "data": "val_mar","sClass": "text-right", render: $.fn.dataTable.render.number( ',', '.', 0, '' )},
                { "data": "qty_apr","sClass": "text-right", render: $.fn.dataTable.render.number( ',', '.', 0, '' )},
                { "data": "val_apr","sClass": "text-right", render: $.fn.dataTable.render.number( ',', '.', 0, '' )},
                { "data": "qty_mei","sClass": "text-right", render: $.fn.dataTable.render.number( ',', '.', 0, '' )},
                { "data": "val_mei","sClass": "text-right", render: $.fn.dataTable.render.number( ',', '.', 0, '' )},
                { "data": "qty_jun","sClass": "text-right", render: $.fn.dataTable.render.number( ',', '.', 0, '' )},
                { "data": "val_jun","sClass": "text-right", render: $.fn.dataTable.render.number( ',', '.', 0, '' )},
                { "data": "qty_jul","sClass": "text-right", render: $.fn.dataTable.render.number( ',', '.', 0, '' )},
                { "data": "val_jul","sClass": "text-right", render: $.fn.dataTable.render.number( ',', '.', 0, '' )},
                { "data": "qty_agu","sClass": "text-right", render: $.fn.dataTable.render.number( ',', '.', 0, '' )},
                { "data": "val_agu","sClass": "text-right", render: $.fn.dataTable.render.number( ',', '.', 0, '' )},
                { "data": "qty_sep","sClass": "text-right", render: $.fn.dataTable.render.number( ',', '.', 0, '' )},
                { "data": "val_sep","sClass": "text-right", render: $.fn.dataTable.render.number( ',', '.', 0, '' )},
                { "data": "qty_okt","sClass": "text-right", render: $.fn.dataTable.render.number( ',', '.', 0, '' )},
                { "data": "val_okt","sClass": "text-right", render: $.fn.dataTable.render.number( ',', '.', 0, '' )},
                { "data": "qty_nop","sClass": "text-right", render: $.fn.dataTable.render.number( ',', '.', 0, '' )},
                { "data": "val_nop","sClass": "text-right", render: $.fn.dataTable.render.number( ',', '.', 0, '' )},
                { "data": "qty_des","sClass": "text-right", render: $.fn.dataTable.render.number( ',', '.', 0, '' )},
                { "data": "val_des","sClass": "text-right", render: $.fn.dataTable.render.number( ',', '.', 0, '' )},
                { "data": "qty_year_now","sClass": "text-right", render: $.fn.dataTable.render.number( ',', '.', 0, '' )},
                { "data": "val_year_now","sClass": "text-right", render: $.fn.dataTable.render.number( ',', '.', 0, '' )},
                { "data": "qty_year_old","sClass": "text-right", render: $.fn.dataTable.render.number( ',', '.', 0, '' )},
                { "data": "val_year_old","sClass": "text-right", render: $.fn.dataTable.render.number( ',', '.', 0, '' )},
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
</script> -->
