  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Report Selling In - Contribution</h1> 
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

                <!-- <div class="preloader">
                    <div class="loading">
                        <div class="spinner-border" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                </div> -->

                <form action="<?= base_url; ?>/Report/sellingin_contribution" method="post">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="input-group mb-3">

                                <?php

                                    if(isset($data))
                                    {
                                        $principal = $data['by_principal'];
                                        $year = $data['by_year'];

                                    }else
                                    {
                                        $principal = "By Principal";
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
                                    <div style="margin-left : 5px; width : 80px;">
                                        <input name="by_year" class="mdb-select md-form form-control" type="number" min="1900" max="2099" step="1" value="<?= $year ;?>" />
                                    </div>
                                    <div style="margin-left : 10px;"> 
                                        <button class="btn btn-outline-primary" type="submit">Go!</button>
                                        <a class="btn btn-outline-secondary" href="<?= base_url; ?>/Report/sellingin_contribution">Reset</a>
                                    </div>
                                    <div style="margin-left : 10px;">
                                        <button class="btn float-right btn btn-outline-success" type="submit" formaction="<?= base_url; ?>/Report/export_sellingin_contribution"><i class = "fa fa-download"> Excel</i></button>
                                    </div>
                                    
                                    
                            </div>

                            <!-- <div id="hasil_sale_out"></div> -->
                            <div class="table-responsive-sm text-small">
                                <table id="sale_in_dist" class="table table-bordered table-sm nowrap" align="left" style="font-size:85%; border: 1px solid black;table-layout:fixed;">
                                    <thead class="table-warning">
                                        <tr>
                                            <th rowspan="3" class="text-center" style="width: 5px; vertical-align: middle;">#</th>
                                            <th rowspan="3" class="text-center" style="vertical-align: middle;">Cust Code</th>
                                            <th rowspan="3" class="text-center" style="width: 200px; vertical-align: middle;">Ditributor</th>
                                            <th rowspan="3" class="text-center" style="width: 60px; vertical-align: middle;">Area</th>
                                            <th colspan="24" class="text-center" style="vertical-align: middle;">Month</th>
                                            <th colspan="2" rowspan="2" class="text-center" style="width: 160px; vertical-align: middle; background-color: #FF6D6D;">Total</th>
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
                                        <th class="text-center" style="width: 130px">Value</th>
                                            <th class="text-center" style="width: 30px">Cont %</th>
                                            <th class="text-center" style="width: 130px">Value</th>
                                            <th class="text-center" style="width: 30px">Cont %</th>
                                            <th class="text-center" style="width: 130px">Value</th>
                                            <th class="text-center" style="width: 30px">Cont %</th>
                                            <th class="text-center" style="width: 130px">Value</th>
                                            <th class="text-center" style="width: 30px">Cont %</th>
                                            <th class="text-center" style="width: 130px">Value</th>
                                            <th class="text-center" style="width: 30px">Cont %</th>
                                            <th class="text-center" style="width: 130px">Value</th>
                                            <th class="text-center" style="width: 30px">Cont %</th>
                                            <th class="text-center" style="width: 130px">Value</th>
                                            <th class="text-center" style="width: 30px">Cont %</th>
                                            <th class="text-center" style="width: 130px">Value</th>
                                            <th class="text-center" style="width: 30px">Cont %</th>
                                            <th class="text-center" style="width: 130px">Value</th>
                                            <th class="text-center" style="width: 30px">Cont %</th>
                                            <th class="text-center" style="width: 130px">Value</th>
                                            <th class="text-center" style="width: 30px">Cont %</th>
                                            <th class="text-center" style="width: 130px">Value</th>
                                            <th class="text-center" style="width: 30px">Cont %</th>
                                            <th class="text-center" style="width: 130px">Value</th>
                                            <th class="text-center" style="width: 30px">Cont %</th>
                                            <th class="text-center" style="width: 130px; background-color: #FF6D6D;">Value</th>
                                            <th class="text-center" style="width: 30px; background-color: #FF6D6D;">Cont %</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php

                                            $region = '';
                                            $island = '';

                                            $cont_jan = 0;
                                            $cont_feb = 0;
                                            $cont_mar = 0;
                                            $cont_apr = 0;
                                            $cont_mei = 0;
                                            $cont_jun = 0;
                                            $cont_jul = 0;
                                            $cont_agu = 0;
                                            $cont_sep = 0;
                                            $cont_okt = 0;
                                            $cont_nop = 0;
                                            $cont_des = 0;
                                            $cont_year = 0;
                                            

                                            $total_jan = 0;
                                            $total_feb = 0;
                                            $total_mar = 0;
                                            $total_apr = 0;
                                            $total_mei = 0;
                                            $total_jun = 0;
                                            $total_jul = 0;
                                            $total_agu = 0;
                                            $total_sep = 0;
                                            $total_okt = 0;
                                            $total_nop = 0;
                                            $total_des = 0;
                                            $total_year = 0;

                                            foreach ($data['total_sellingin_Dist'] as $row1) :
                                                if ($row1['bulan'] === '1') {
                                                    $total_jan = $row1['val'];
                                                }elseif ($row1['bulan'] === '2') {
                                                    $total_feb = $row1['val'];
                                                }elseif ($row1['bulan'] === '3') {
                                                    $total_mar = $row1['val'];
                                                }elseif ($row1['bulan'] === '4') {
                                                    $total_apr = $row1['val'];
                                                }elseif ($row1['bulan'] === '5') {
                                                    $total_mei = $row1['val'];
                                                }elseif ($row1['bulan'] === '6') {
                                                    $total_jun = $row1['val'];
                                                }elseif ($row1['bulan'] === '7') {
                                                    $total_jul = $row1['val'];
                                                }elseif ($row1['bulan'] === '8') {
                                                    $total_agu = $row1['val'];
                                                }elseif ($row1['bulan'] === '9') {
                                                    $total_sep = $row1['val'];
                                                }elseif ($row1['bulan'] === '10') {
                                                    $total_okt = $row1['val'];
                                                }elseif ($row1['bulan'] === '11') {
                                                    $total_nop = $row1['val'];
                                                }elseif ($row1['bulan'] === '12') {
                                                    $total_des = $row1['val'];
                                                }
                                                
                                            endforeach;

                                            $total_year = $total_jan + $total_feb + $total_mar + $total_apr + $total_mei + $total_jun + $total_jul + $total_agu + $total_sep + $total_okt + $total_nop + $total_des = 0;
                                            
                                            $sub_cont_jan = 0;
                                            $sub_cont_feb = 0;
                                            $sub_cont_mar = 0;
                                            $sub_cont_apr = 0;
                                            $sub_cont_mei = 0;
                                            $sub_cont_jun = 0;
                                            $sub_cont_jul = 0;
                                            $sub_cont_agu = 0;
                                            $sub_cont_sep = 0;
                                            $sub_cont_okt = 0;
                                            $sub_cont_nop = 0;
                                            $sub_cont_des = 0;
                                            $sub_cont_year = 0;
                                            $sub_cont_avg = 0;

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

                                            $total_cont_jan = 0;
                                            $total_cont_feb = 0;
                                            $total_cont_mar = 0;
                                            $total_cont_apr = 0;
                                            $total_cont_mei = 0;
                                            $total_cont_jun = 0;
                                            $total_cont_jul = 0;
                                            $total_cont_agu = 0;
                                            $total_cont_sep = 0;
                                            $total_cont_okt = 0;
                                            $total_cont_nop = 0;
                                            $total_cont_des = 0;
                                            $total_cont_year = 0;
                                            $total_cont_avg = 0;

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

                                            $grandtotal_cont_jan = 0;
                                            $grandtotal_cont_feb = 0;
                                            $grandtotal_cont_mar = 0;
                                            $grandtotal_cont_apr = 0;
                                            $grandtotal_cont_mei = 0;
                                            $grandtotal_cont_jun = 0;
                                            $grandtotal_cont_jul = 0;
                                            $grandtotal_cont_agu = 0;
                                            $grandtotal_cont_sep = 0;
                                            $grandtotal_cont_okt = 0;
                                            $grandtotal_cont_nop = 0;
                                            $grandtotal_cont_des = 0;
                                            $grandtotal_cont_year = 0;
                                            $grandtotal_cont_avg = 0;

                                            $grandtotal_val_jan = 0;
                                            $grandtotal_val_feb = 0;
                                            $grandtotal_val_mar = 0;
                                            $grandtotal_val_apr = 0;
                                            $grandtotal_val_mei = 0;
                                            $grandtotal_val_jun = 0;
                                            $grandtotal_val_jul = 0;
                                            $grandtotal_val_agu = 0;
                                            $grandtotal_val_sep = 0;
                                            $grandtotal_val_okt = 0;
                                            $grandtotal_val_nop = 0;
                                            $grandtotal_val_des = 0;
                                            $grandtotal_val_year = 0;
                                            $grandtotal_val_avg = 0;

                                        ?>

                                        <?php $no=1; ?>

                                        <?php foreach ($data['sellingin_Dist'] as $row) :?>

                                            <?php

                                                if ($region != $row['region'] and $region != '' )
                                                {

                                                    echo '<tr class="table-warning" style="font-weight:bold;">';
                                                        echo '<td></td>';
                                                        echo '<td></td>';
                                                        echo '<td></td>';
                                                        echo '<td class="text-right">' .$region. '</td>';
                                                        echo '<td class="text-right">' .number_format($sub_val_jan, 2). '</td>';
                                                        echo '<td class="text-right">' .number_format($sub_cont_jan, 2). '</td>';
                                                        echo '<td class="text-right">' .number_format($sub_val_feb, 2). '</td>';
                                                        echo '<td class="text-right">' .number_format($sub_cont_feb, 2). '</td>';
                                                        echo '<td class="text-right">' .number_format($sub_val_mar, 2). '</td>';
                                                        echo '<td class="text-right">' .number_format($sub_cont_mar, 2). '</td>';
                                                        echo '<td class="text-right">' .number_format($sub_val_apr, 2). '</td>';
                                                        echo '<td class="text-right">' .number_format($sub_cont_apr, 2). '</td>';
                                                        echo '<td class="text-right">' .number_format($sub_val_mei, 2). '</td>';
                                                        echo '<td class="text-right">' .number_format($sub_cont_mei, 2). '</td>';
                                                        echo '<td class="text-right">' .number_format($sub_val_jun, 2). '</td>';
                                                        echo '<td class="text-right">' .number_format($sub_cont_jun, 2). '</td>';
                                                        echo '<td class="text-right">' .number_format($sub_val_jul, 2). '</td>';
                                                        echo '<td class="text-right">' .number_format($sub_cont_jul, 2). '</td>';
                                                        echo '<td class="text-right">' .number_format($sub_val_agu, 2). '</td>';
                                                        echo '<td class="text-right">' .number_format($sub_cont_agu, 2). '</td>';
                                                        echo '<td class="text-right">' .number_format($sub_val_sep, 2). '</td>';
                                                        echo '<td class="text-right">' .number_format($sub_cont_sep, 2). '</td>';
                                                        echo '<td class="text-right">' .number_format($sub_val_okt, 2). '</td>';
                                                        echo '<td class="text-right">' .number_format($sub_cont_okt, 2). '</td>';
                                                        echo '<td class="text-right">' .number_format($sub_val_nop, 2). '</td>';
                                                        echo '<td class="text-right">' .number_format($sub_cont_nop, 2). '</td>';
                                                        echo '<td class="text-right">' .number_format($sub_val_des, 2). '</td>';
                                                        echo '<td class="text-right">' .number_format($sub_cont_des, 2). '</td>';
                                                        echo '<td class="text-right">' .number_format($sub_val_year, 2). '</td>';
                                                        echo '<td class="text-right">' .number_format($sub_cont_year, 2). '</td>';
                                                        
                                                    echo '</tr>';

                                                    $sub_cont_jan = 0;
                                                    $sub_cont_feb = 0;
                                                    $sub_cont_mar = 0;
                                                    $sub_cont_apr = 0;
                                                    $sub_cont_mei = 0;
                                                    $sub_cont_jun = 0;
                                                    $sub_cont_jul = 0;
                                                    $sub_cont_agu = 0;
                                                    $sub_cont_sep = 0;
                                                    $sub_cont_okt = 0;
                                                    $sub_cont_nop = 0;
                                                    $sub_cont_des = 0;
                                                    $sub_cont_year = 0;
                                                    $sub_cont_avg = 0;

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

                                                if ($island != $row['island'] and $island != '' )
                                                {

                                                    echo '<tr class="table-danger" style="font-weight:bold;">';
                                                        echo '<td></td>';
                                                        echo '<td></td>';
                                                        echo '<td></td>';
                                                        echo '<td class="text-right">' .$island. '</td>';
                                                        echo '<td class="text-right">' .number_format($total_val_jan, 2). '</td>';
                                                        echo '<td class="text-right">' .number_format($total_cont_jan, 2). '</td>';
                                                        echo '<td class="text-right">' .number_format($total_val_feb, 2). '</td>';
                                                        echo '<td class="text-right">' .number_format($total_cont_feb, 2). '</td>';
                                                        echo '<td class="text-right">' .number_format($total_val_mar, 2). '</td>';
                                                        echo '<td class="text-right">' .number_format($total_cont_mar, 2). '</td>';
                                                        echo '<td class="text-right">' .number_format($total_val_apr, 2). '</td>';
                                                        echo '<td class="text-right">' .number_format($total_cont_apr, 2). '</td>';
                                                        echo '<td class="text-right">' .number_format($total_val_mei, 2). '</td>';
                                                        echo '<td class="text-right">' .number_format($total_cont_mei, 2). '</td>';
                                                        echo '<td class="text-right">' .number_format($total_val_jun, 2). '</td>';
                                                        echo '<td class="text-right">' .number_format($total_cont_jun, 2). '</td>';
                                                        echo '<td class="text-right">' .number_format($total_val_jul, 2). '</td>';
                                                        echo '<td class="text-right">' .number_format($total_cont_jul, 2). '</td>';
                                                        echo '<td class="text-right">' .number_format($total_val_agu, 2). '</td>';
                                                        echo '<td class="text-right">' .number_format($total_cont_agu, 2). '</td>';
                                                        echo '<td class="text-right">' .number_format($total_val_sep, 2). '</td>';
                                                        echo '<td class="text-right">' .number_format($total_cont_sep, 2). '</td>';
                                                        echo '<td class="text-right">' .number_format($total_val_okt, 2). '</td>';
                                                        echo '<td class="text-right">' .number_format($total_cont_okt, 2). '</td>';
                                                        echo '<td class="text-right">' .number_format($total_val_nop, 2). '</td>';
                                                        echo '<td class="text-right">' .number_format($total_cont_nop, 2). '</td>';
                                                        echo '<td class="text-right">' .number_format($total_val_des, 2). '</td>';
                                                        echo '<td class="text-right">' .number_format($total_cont_des, 2). '</td>';
                                                        echo '<td class="text-right">' .number_format($total_val_year, 2). '</td>';
                                                        echo '<td class="text-right">' .number_format($total_cont_year, 2). '</td>';
                                                        
                                                    echo '</tr>';

                                                    $total_cont_jan = 0;
                                                    $total_cont_feb = 0;
                                                    $total_cont_mar = 0;
                                                    $total_cont_apr = 0;
                                                    $total_cont_mei = 0;
                                                    $total_cont_jun = 0;
                                                    $total_cont_jul = 0;
                                                    $total_cont_agu = 0;
                                                    $total_cont_sep = 0;
                                                    $total_cont_okt = 0;
                                                    $total_cont_nop = 0;
                                                    $total_cont_des = 0;
                                                    $total_cont_year = 0;
                                                    $total_cont_avg = 0;

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
                                                }

                                                $cont_jan = ($row['val_jan']/($total_jan ? :1))*100;
                                                $cont_feb = ($row['val_feb']/($total_feb ? :1))*100;
                                                $cont_mar = ($row['val_mar']/($total_mar ? :1))*100;
                                                $cont_apr = ($row['val_apr']/($total_apr ? :1))*100;
                                                $cont_mei = ($row['val_mei']/($total_mei ? :1))*100;
                                                $cont_jun = ($row['val_jun']/($total_jun ? :1))*100;
                                                $cont_jul = ($row['val_jul']/($total_jul ? :1))*100;
                                                $cont_agu = ($row['val_agu']/($total_agu ? :1))*100;
                                                $cont_sep = ($row['val_sep']/($total_sep ? :1))*100;
                                                $cont_okt = ($row['val_okt']/($total_okt ? :1))*100;
                                                $cont_nop = ($row['val_nop']/($total_nop ? :1))*100;
                                                $cont_des = ($row['val_des']/($total_des ? :1))*100;
                                                $cont_year = ($row['val_year']/($total_year ? :1))*100;

                                            ?>

                                        <tr>
                                            <td class="text-center"><?= $no; ?></td>
                                            <td><?= $row['cust_code'];?></td>
                                            <td><?= $row['distributor'];?></td>
                                            <td><?= $row['area'];?></td>
                                            <td class="text-right"><?= number_format($row['val_jan'], 2);?></td>
                                            <td class="text-right"><?= number_format($cont_jan, 2);?></td>
                                            <td class="text-right"><?= number_format($row['val_feb'], 2);?></td>
                                            <td class="text-right"><?= number_format($cont_feb, 2);?></td>
                                            <td class="text-right"><?= number_format($row['val_mar'], 2);?></td>
                                            <td class="text-right"><?= number_format($cont_mar, 2);?></td>
                                            <td class="text-right"><?= number_format($row['val_apr'], 2);?></td>
                                            <td class="text-right"><?= number_format($cont_apr, 2);?></td>
                                            <td class="text-right"><?= number_format($row['val_mei'], 2);?></td>
                                            <td class="text-right"><?= number_format($cont_mei, 2);?></td>
                                            <td class="text-right"><?= number_format($row['val_jun'], 2);?></td>
                                            <td class="text-right"><?= number_format($cont_jun, 2);?></td>
                                            <td class="text-right"><?= number_format($row['val_jul'], 2);?></td>
                                            <td class="text-right"><?= number_format($cont_jul, 2);?></td>
                                            <td class="text-right"><?= number_format($row['val_agu'], 2);?></td>
                                            <td class="text-right"><?= number_format($cont_agu, 2);?></td>
                                            <td class="text-right"><?= number_format($row['val_sep'], 2);?></td>
                                            <td class="text-right"><?= number_format($cont_sep, 2);?></td>
                                            <td class="text-right"><?= number_format($row['val_okt'], 2);?></td>
                                            <td class="text-right"><?= number_format($cont_okt, 2);?></td>
                                            <td class="text-right"><?= number_format($row['val_nop'], 2);?></td>
                                            <td class="text-right"><?= number_format($cont_nop, 2);?></td>
                                            <td class="text-right"><?= number_format($row['val_des'], 2);?></td>
                                            <td class="text-right"><?= number_format($cont_des, 2);?></td>
                                            <td class="text-right"><?= number_format($row['val_year'], 2);?></td>
                                            <td class="text-right"><?= number_format($cont_year, 2);?></td>
                                        </tr>

                                        <?php $region = $row['region'] ?>
                                        <?php $island = $row['island'] ?>

                                        <?php $sub_cont_jan += $cont_jan; ?>
                                        <?php $sub_cont_feb += $cont_feb; ?>
                                        <?php $sub_cont_mar += $cont_mar; ?>
                                        <?php $sub_cont_apr += $cont_apr; ?>
                                        <?php $sub_cont_mei += $cont_mei; ?>
                                        <?php $sub_cont_jun += $cont_jun; ?>
                                        <?php $sub_cont_jul += $cont_jul; ?>
                                        <?php $sub_cont_agu += $cont_agu; ?>
                                        <?php $sub_cont_sep += $cont_sep; ?>
                                        <?php $sub_cont_okt += $cont_okt; ?>
                                        <?php $sub_cont_nop += $cont_nop; ?>
                                        <?php $sub_cont_des += $cont_des; ?>
                                        <?php $sub_cont_year += $cont_year; ?>

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

                                        <?php $total_cont_jan += $cont_jan; ?>
                                        <?php $total_cont_feb += $cont_feb; ?>
                                        <?php $total_cont_mar += $cont_mar; ?>
                                        <?php $total_cont_apr += $cont_apr; ?>
                                        <?php $total_cont_mei += $cont_mei; ?>
                                        <?php $total_cont_jun += $cont_jun; ?>
                                        <?php $total_cont_jul += $cont_jul; ?>
                                        <?php $total_cont_agu += $cont_agu; ?>
                                        <?php $total_cont_sep += $cont_sep; ?>
                                        <?php $total_cont_okt += $cont_okt; ?>
                                        <?php $total_cont_nop += $cont_nop; ?>
                                        <?php $total_cont_des += $cont_des; ?>
                                        <?php $total_cont_year += $cont_year; ?>

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

                                        <?php $grandtotal_cont_jan += $cont_jan; ?>
                                        <?php $grandtotal_cont_feb += $cont_feb; ?>
                                        <?php $grandtotal_cont_mar += $cont_mar; ?>
                                        <?php $grandtotal_cont_apr += $cont_apr; ?>
                                        <?php $grandtotal_cont_mei += $cont_mei; ?>
                                        <?php $grandtotal_cont_jun += $cont_jun; ?>
                                        <?php $grandtotal_cont_jul += $cont_jul; ?>
                                        <?php $grandtotal_cont_agu += $cont_agu; ?>
                                        <?php $grandtotal_cont_sep += $cont_sep; ?>
                                        <?php $grandtotal_cont_okt += $cont_okt; ?>
                                        <?php $grandtotal_cont_nop += $cont_nop; ?>
                                        <?php $grandtotal_cont_des += $cont_des; ?>
                                        <?php $grandtotal_cont_year += $cont_year; ?>

                                        <?php $grandtotal_val_jan += $row['val_jan']; ?>
                                        <?php $grandtotal_val_feb += $row['val_feb']; ?>
                                        <?php $grandtotal_val_mar += $row['val_mar']; ?>
                                        <?php $grandtotal_val_apr += $row['val_apr']; ?>
                                        <?php $grandtotal_val_mei += $row['val_mei']; ?>
                                        <?php $grandtotal_val_jun += $row['val_jun']; ?>
                                        <?php $grandtotal_val_jul += $row['val_jul']; ?>
                                        <?php $grandtotal_val_agu += $row['val_agu']; ?>
                                        <?php $grandtotal_val_sep += $row['val_sep']; ?>
                                        <?php $grandtotal_val_okt += $row['val_okt']; ?>
                                        <?php $grandtotal_val_nop += $row['val_nop']; ?>
                                        <?php $grandtotal_val_des += $row['val_des']; ?>
                                        <?php $grandtotal_val_year += $row['val_year']; ?>

                                        <?php $no++; endforeach; ?>

                                        <tr class="table-warning" style="font-weight:bold;">
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td class="text-right"><?= $region;?></td>
                                            <td class="text-right"><?= number_format($sub_val_jan, 2);?></td>
                                            <td class="text-right"><?= number_format($sub_cont_jan, 2);?></td>
                                            <td class="text-right"><?= number_format($sub_val_feb, 2);?></td>
                                            <td class="text-right"><?= number_format($sub_cont_feb, 2);?></td>
                                            <td class="text-right"><?= number_format($sub_val_mar, 2);?></td>
                                            <td class="text-right"><?= number_format($sub_cont_mar, 2);?></td>
                                            <td class="text-right"><?= number_format($sub_val_apr, 2);?></td>
                                            <td class="text-right"><?= number_format($sub_cont_apr, 2);?></td>
                                            <td class="text-right"><?= number_format($sub_val_mei, 2);?></td>
                                            <td class="text-right"><?= number_format($sub_cont_mei, 2);?></td>
                                            <td class="text-right"><?= number_format($sub_val_jun, 2);?></td>
                                            <td class="text-right"><?= number_format($sub_cont_jun, 2);?></td>
                                            <td class="text-right"><?= number_format($sub_val_jul, 2);?></td>
                                            <td class="text-right"><?= number_format($sub_cont_jul, 2);?></td>
                                            <td class="text-right"><?= number_format($sub_val_agu, 2);?></td>
                                            <td class="text-right"><?= number_format($sub_cont_agu, 2);?></td>
                                            <td class="text-right"><?= number_format($sub_val_sep, 2);?></td>
                                            <td class="text-right"><?= number_format($sub_cont_sep, 2);?></td>
                                            <td class="text-right"><?= number_format($sub_val_okt, 2);?></td>
                                            <td class="text-right"><?= number_format($sub_cont_okt, 2);?></td>
                                            <td class="text-right"><?= number_format($sub_val_nop, 2);?></td>
                                            <td class="text-right"><?= number_format($sub_cont_nop, 2);?></td>
                                            <td class="text-right"><?= number_format($sub_val_des, 2);?></td>
                                            <td class="text-right"><?= number_format($sub_cont_des, 2);?></td>
                                            <td class="text-right"><?= number_format($sub_val_year, 2);?></td>
                                            <td class="text-right"><?= number_format($sub_cont_year, 2);?></td>
                                            
                                        </tr>

                                        <tr class="table-danger" style="font-weight:bold;">
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td class="text-right"><?= $island;?></td>
                                            <td class="text-right"><?= number_format($total_val_jan, 2);?></td>
                                            <td class="text-right"><?= number_format($total_cont_jan, 2);?></td>
                                            <td class="text-right"><?= number_format($total_val_feb, 2);?></td>
                                            <td class="text-right"><?= number_format($total_cont_feb, 2);?></td>
                                            <td class="text-right"><?= number_format($total_val_mar, 2);?></td>
                                            <td class="text-right"><?= number_format($total_cont_mar, 2);?></td>
                                            <td class="text-right"><?= number_format($total_val_apr, 2);?></td>
                                            <td class="text-right"><?= number_format($total_cont_apr, 2);?></td>
                                            <td class="text-right"><?= number_format($total_val_mei, 2);?></td>
                                            <td class="text-right"><?= number_format($total_cont_mei, 2);?></td>
                                            <td class="text-right"><?= number_format($total_val_jun, 2);?></td>
                                            <td class="text-right"><?= number_format($total_cont_jun, 2);?></td>
                                            <td class="text-right"><?= number_format($total_val_jul, 2);?></td>
                                            <td class="text-right"><?= number_format($total_cont_jul, 2);?></td>
                                            <td class="text-right"><?= number_format($total_val_agu, 2);?></td>
                                            <td class="text-right"><?= number_format($total_cont_agu, 2);?></td>
                                            <td class="text-right"><?= number_format($total_val_sep, 2);?></td>
                                            <td class="text-right"><?= number_format($total_cont_sep, 2);?></td>
                                            <td class="text-right"><?= number_format($total_val_okt, 2);?></td>
                                            <td class="text-right"><?= number_format($total_cont_okt, 2);?></td>
                                            <td class="text-right"><?= number_format($total_val_nop, 2);?></td>
                                            <td class="text-right"><?= number_format($total_cont_nop, 2);?></td>
                                            <td class="text-right"><?= number_format($total_val_des, 2);?></td>
                                            <td class="text-right"><?= number_format($total_cont_des, 2);?></td>
                                            <td class="text-right"><?= number_format($total_val_year, 2);?></td>
                                            <td class="text-right"><?= number_format($total_cont_year, 2);?></td>
                                            
                                        </tr>

                                        <tr class="table-danger" style="font-weight:bold;">
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td class="text-right">NATIONAL</td>
                                            <td class="text-right"><?= number_format($grandtotal_val_jan, 2);?></td>
                                            <td class="text-right"><?= number_format($grandtotal_cont_jan, 2);?></td>
                                            <td class="text-right"><?= number_format($grandtotal_val_feb, 2);?></td>
                                            <td class="text-right"><?= number_format($grandtotal_cont_feb, 2);?></td>
                                            <td class="text-right"><?= number_format($grandtotal_val_mar, 2);?></td>
                                            <td class="text-right"><?= number_format($grandtotal_cont_mar, 2);?></td>
                                            <td class="text-right"><?= number_format($grandtotal_val_apr, 2);?></td>
                                            <td class="text-right"><?= number_format($grandtotal_cont_apr, 2);?></td>
                                            <td class="text-right"><?= number_format($grandtotal_val_mei, 2);?></td>
                                            <td class="text-right"><?= number_format($grandtotal_cont_mei, 2);?></td>
                                            <td class="text-right"><?= number_format($grandtotal_val_jun, 2);?></td>
                                            <td class="text-right"><?= number_format($grandtotal_cont_jun, 2);?></td>
                                            <td class="text-right"><?= number_format($grandtotal_val_jul, 2);?></td>
                                            <td class="text-right"><?= number_format($grandtotal_cont_jul, 2);?></td>
                                            <td class="text-right"><?= number_format($grandtotal_val_agu, 2);?></td>
                                            <td class="text-right"><?= number_format($grandtotal_cont_agu, 2);?></td>
                                            <td class="text-right"><?= number_format($grandtotal_val_sep, 2);?></td>
                                            <td class="text-right"><?= number_format($grandtotal_cont_sep, 2);?></td>
                                            <td class="text-right"><?= number_format($grandtotal_val_okt, 2);?></td>
                                            <td class="text-right"><?= number_format($grandtotal_cont_okt, 2);?></td>
                                            <td class="text-right"><?= number_format($grandtotal_val_nop, 2);?></td>
                                            <td class="text-right"><?= number_format($grandtotal_cont_nop, 2);?></td>
                                            <td class="text-right"><?= number_format($grandtotal_val_des, 2);?></td>
                                            <td class="text-right"><?= number_format($grandtotal_cont_des, 2);?></td>
                                            <td class="text-right"><?= number_format($grandtotal_val_year, 2);?></td>
                                            <td class="text-right"><?= number_format($grandtotal_cont_year, 2);?></td>
                                            
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
