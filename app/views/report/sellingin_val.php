  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Report Selling In - Value</h1> 
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
            <form action="<?= base_url; ?>/Report/sellingin_val" method="post">
                <div class="row">
                    <div class="col-md-12">
                      <div class="input-group mb-3">

                        <?php

                        if(isset($data))
                        {
                            $region = $data['by_region'];
                            $area = $data['by_area'];
                            $island = $data['by_island'];
                            $year = $data['by_year'];

                        }else
                        {
                            $region = "By Region";
                            $area = "By Area";
                            $island = "By Island";
                        }

                        ?>
                          
                          <div>
                            <select class="mdb-select md-form form-control" title="By Island" name="by_island" id="dt_island" style="margin-left : 10px;" <?php if( $_SESSION['area'] != 'ALL'){echo "disabled"; } ?>>
                              <option value="">By Island</option>
                                  <?php $no=1; ?>
                                  <?php foreach ($data['island'] as $row) :?>
                                        <option <?php if( $island==$row['island']){echo "selected"; } ?> value="<?= $row['island'];?>"><b><?= $row['island'];?></b></option>
                                  <?php $no++; endforeach; ?>
                            </select>
                          </div>
                          <div style="margin-left : 5px;">
                            <select class="mdb-select md-form form-control" title="By Region" name="by_region" id="dt_region" style="margin-left : 10px;"<?php if( $_SESSION['area'] != 'ALL'){echo "disabled"; } ?>>
                              <option value="">By Region</option>
                                  <?php $no=1; ?>
                                  <?php foreach ($data['region'] as $row) :?>
                                        <option <?php if( $region==$row['region']){echo "selected"; } ?> value="<?= $row['region'];?>"><b><?= $row['region'];?></b></option>
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
                          <div style="margin-left : 20px; width : 80px;">
                              <input name="by_year" class="mdb-select md-form form-control" type="number" min="1900" max="2099" step="1" value="<?= $year ;?>" />
                          </div>
                          <div style="margin-left : 5px;">
                            <button class="btn btn-outline-primary" type="submit" style="margin-left : 10px;">Go!</button>
                            <a class="btn btn-outline-secondary" href="<?= base_url; ?>/Report/sellingin_val">Reset</a>
                            <button class="btn btn btn-outline-success" type="submit" style="margin-left : 20px;" formaction="<?= base_url; ?>/Report/export_sellingin_val"><i class = "fa fa-download"> Excel</i></button>
                            <a class="btn btn-outline-info" href="#chart"><i class = "fas fa-chart-line"> Chart</i></a>
                        </div>
                      </div>


                        <!-- <div id="hasil_sale_out"></div> -->
                        <div class="table-responsive-sm text-small">
                          <table id="sale_in_performance" class="table table-bordered table-sm order-column nowrap" align="left" style="font-size:85%; border: 1px solid black;">
                          <thead class="table-warning">
                              <tr>
                                <th class="text-center" style="width: 5px; vertical-align: middle;">#</th>
                                <th class="text-center" style="width: 25px; vertical-align: middle;">Principal</th>
                                <th class="text-center" style="width: 90px; vertical-align: middle;">Group SKU</th>
                                <th class="text-center" style="width: 12px; vertical-align: middle;">Kode Item</th>
                                <th class="text-center" style="width: 250px; vertical-align: middle;">SKU</th>
                                <th class="text-center" style="width: 15px; vertical-align: middle;">Unit</th>
                                <th class="text-center">January</th>
                                <th class="text-center">February</th>
                                <th class="text-center">March</th>
                                <th class="text-center">April</th>
                                <th class="text-center">May</th>
                                <th class="text-center">June</th>
                                <th class="text-center">July</th>
                                <th class="text-center">August</th>
                                <th class="text-center">September</th>
                                <th class="text-center">October</th>
                                <th class="text-center">November</th>
                                <th class="text-center">December</th>
                                <th class="text-center" style="background-color: #FF6D6D">Total</th>
                              </tr>
                            </thead>
                            <tbody>
                                <?php 

                                    $item_group = '';
                                    $principal = '';

                                    $qty_jan = 0;
                                    $qty_feb = 0;
                                    $qty_mar = 0;
                                    $qty_q1 = 0;
                                    $qty_apr = 0;
                                    $qty_mei = 0;
                                    $qty_jun = 0;
                                    $qty_q2 = 0;
                                    $qty_jul = 0;
                                    $qty_agu = 0;
                                    $qty_sep = 0;
                                    $qty_q3 = 0;
                                    $qty_okt = 0;
                                    $qty_nop = 0;
                                    $qty_des = 0;
                                    $qty_q4 = 0;
                                    $qty_year = 0;
                                    $qty_avg = 0;

                                    $sub_qty_jan = 0;
                                    $sub_qty_feb = 0;
                                    $sub_qty_mar = 0;
                                    $sub_qty_q1 = 0;
                                    $sub_qty_apr = 0;
                                    $sub_qty_mei = 0;
                                    $sub_qty_jun = 0;
                                    $sub_qty_q2 = 0;
                                    $sub_qty_jul = 0;
                                    $sub_qty_agu = 0;
                                    $sub_qty_sep = 0;
                                    $sub_qty_q3 = 0;
                                    $sub_qty_okt = 0;
                                    $sub_qty_nop = 0;
                                    $sub_qty_des = 0;
                                    $sub_qty_q4 = 0;
                                    $sub_qty_year = 0;
                                    $sub_qty_avg = 0;

                                    $total_qty_jan = 0;
                                    $total_qty_feb = 0;
                                    $total_qty_mar = 0;
                                    $total_qty_q1 = 0;
                                    $total_qty_apr = 0;
                                    $total_qty_mei = 0;
                                    $total_qty_jun = 0;
                                    $total_qty_q2 = 0;
                                    $total_qty_jul = 0;
                                    $total_qty_agu = 0;
                                    $total_qty_sep = 0;
                                    $total_qty_q3 = 0;
                                    $total_qty_okt = 0;
                                    $total_qty_nop = 0;
                                    $total_qty_des = 0;
                                    $total_qty_q4 = 0;
                                    $total_qty_year = 0;
                                    $total_qty_avg = 0;

                                ?>
                                <?php $no=1; ?>

                                <?php foreach ($data['sellingin'] as $row) :?>

                                    <?php

                                        if ($item_group != $row['item_group'] and $item_group != '' )
                                        {

                                            echo '<tr class="table-warning" style="font-weight:bold;">';
                                                echo '<td class="text-center"></td>';
                                                echo '<td>' . $principal. '</td>';
                                                echo '<td>' . $item_group. '</td>';
                                                echo '<td></td>';
                                                echo '<td class="text-center">Sub Total ' . $item_group. '</td>';
                                                echo '<td class="text-center"></td>';
                                                echo '<td class="text-right">' . number_format($qty_jan, 0). '</td>';                                           
                                                echo '<td class="text-right">' . number_format($qty_feb, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($qty_mar, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($qty_apr, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($qty_mei, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($qty_jun, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($qty_jul, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($qty_agu, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($qty_sep, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($qty_okt, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($qty_nop, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($qty_des, 0). '</td>';

                                                $qty_year = $qty_jan + $qty_feb + $qty_mar + $qty_apr + $qty_mei + $qty_jun + $qty_jul + $qty_agu + $qty_sep + $qty_okt + $qty_nop + $qty_des;

                                                echo '<td class="text-right">' . number_format($qty_year, 0). '</td>';
                                            echo '</tr>';

                                            $qty_jan = 0;
                                            $qty_feb = 0;
                                            $qty_mar = 0;
                                            $qty_q1 = 0;
                                            $qty_apr = 0;
                                            $qty_mei = 0;
                                            $qty_jun = 0;
                                            $qty_q2 = 0;
                                            $qty_jul = 0;
                                            $qty_agu = 0;
                                            $qty_sep = 0;
                                            $qty_q3 = 0;
                                            $qty_okt = 0;
                                            $qty_nop = 0;
                                            $qty_des = 0;
                                            $qty_q4 = 0;
                                            $qty_year = 0;
                                            $qty_avg = 0;
        
                                        }


                                        if ($principal != $row['principal'] and $principal != '' )
                                        {

                                            echo '<tr class="table-danger" style="font-weight:bold;">';
                                                echo '<td class="text-center"></td>';
                                                echo '<td>' . $principal. '</td>';
                                                echo '<td></td>';
                                                echo '<td></td>';
                                                echo '<td class="text-center">TOTAL ' . $principal. '</td>';
                                                echo '<td class="text-center"></td>';
                                                echo '<td class="text-right">' . number_format($sub_qty_jan, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_qty_feb, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_qty_mar, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_qty_apr, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_qty_mei, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_qty_jun, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_qty_jul, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_qty_agu, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_qty_sep, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_qty_okt, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_qty_nop, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_qty_des, 0). '</td>';

                                                $sub_qty_year = $sub_qty_jan + $sub_qty_feb + $sub_qty_mar + $sub_qty_apr + $sub_qty_mei + $sub_qty_jun + $sub_qty_jul + $sub_qty_agu + $sub_qty_sep + $sub_qty_okt + $sub_qty_nop + $sub_qty_des;

                                                echo '<td class="text-right">' . number_format($sub_qty_year, 0). '</td>';
                                            echo '</tr>';

                                            $sub_qty_jan = 0;
                                            $sub_qty_feb = 0;
                                            $sub_qty_mar = 0;
                                            $sub_qty_q1 = 0;
                                            $sub_qty_apr = 0;
                                            $sub_qty_mei = 0;
                                            $sub_qty_jun = 0;
                                            $sub_qty_q2 = 0;
                                            $sub_qty_jul = 0;
                                            $sub_qty_agu = 0;
                                            $sub_qty_sep = 0;
                                            $sub_qty_q3 = 0;
                                            $sub_qty_okt = 0;
                                            $sub_qty_nop = 0;
                                            $sub_qty_des = 0;
                                            $sub_qty_q4 = 0;
                                            $sub_qty_year = 0;
                                            $sub_qty_avg = 0;
        
                                        }

                                        

                                    ?>

                                <tr>
                                    <td class="text-center"><?= $no; ?></td>
                                    <td><?= $row['principal'];?></td>
                                    <td><?= $row['item_group'];?></td>
                                    <td><?= $row['item_code'];?></td>
                                    <td><?= $row['item_name'];?></td>
                                    <td class="text-center"><?= $row['unit'];?></td>
                                    <td class="text-right"><?= number_format($row['value_jan'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_feb'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_mar'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_apr'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_mei'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_jun'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_jul'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_agu'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_sep'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_okt'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_nop'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_des'], 0);?></td>

                                    <?php $qty_year = $row['value_jan'] + $row['value_feb'] + $row['value_mar'] + $row['value_apr'] + $row['value_mei'] + $row['value_jun'] + $row['value_jul'] + $row['value_agu'] + $row['value_sep'] + $row['value_okt'] + $row['value_nop'] + $row['value_des']; ?>

                                    <td class="text-right"><?= number_format($qty_year, 0);?></td>

                                </tr>

                                <?php $item_group = $row['item_group'] ?>
                                <?php $principal = $row['principal'] ?>

                                <?php $qty_jan += $row['value_jan']; ?>
                                <?php $qty_feb += $row['value_feb']; ?>
                                <?php $qty_mar += $row['value_mar']; ?>
                                <?php $qty_q1 += $row['value_q1']; ?>

                                <?php $qty_apr += $row['value_apr']; ?>
                                <?php $qty_mei += $row['value_mei']; ?>
                                <?php $qty_jun += $row['value_jun']; ?>
                                <?php $qty_q2 += $row['value_q2']; ?>

                                <?php $qty_jul += $row['value_jul']; ?>
                                <?php $qty_agu += $row['value_agu']; ?>
                                <?php $qty_sep += $row['value_sep']; ?>
                                <?php $qty_q3 += $row['value_q3']; ?>

                                <?php $qty_okt += $row['value_okt']; ?>
                                <?php $qty_nop += $row['value_nop']; ?>
                                <?php $qty_des += $row['value_des']; ?>
                                <?php $qty_q4 += $row['value_q4']; ?>
  
                                <?php $sub_qty_jan += $row['value_jan']; ?>
                                <?php $sub_qty_feb += $row['value_feb']; ?>
                                <?php $sub_qty_mar += $row['value_mar']; ?>
                                <?php $sub_qty_q1 += $row['value_q1']; ?>

                                <?php $sub_qty_apr += $row['value_apr']; ?>
                                <?php $sub_qty_mei += $row['value_mei']; ?>
                                <?php $sub_qty_jun += $row['value_jun']; ?>
                                <?php $sub_qty_q2 += $row['value_q2']; ?>

                                <?php $sub_qty_jul += $row['value_jul']; ?>
                                <?php $sub_qty_agu += $row['value_agu']; ?>
                                <?php $sub_qty_sep += $row['value_sep']; ?>
                                <?php $sub_qty_q3 += $row['value_q3']; ?>

                                <?php $sub_qty_okt += $row['value_okt']; ?>
                                <?php $sub_qty_nop += $row['value_nop']; ?>
                                <?php $sub_qty_des += $row['value_des']; ?>
                                <?php $sub_qty_q4 += $row['value_q4']; ?>

                                <?php $total_qty_jan += $row['value_jan']; ?>
                                <?php $total_qty_feb += $row['value_feb']; ?>
                                <?php $total_qty_mar += $row['value_mar']; ?>
                                <?php $total_qty_q1 += $row['value_q1']; ?>

                                <?php $total_qty_apr += $row['value_apr']; ?>
                                <?php $total_qty_mei += $row['value_mei']; ?>
                                <?php $total_qty_jun += $row['value_jun']; ?>
                                <?php $total_qty_q2 += $row['value_q2']; ?>

                                <?php $total_qty_jul += $row['value_jul']; ?>
                                <?php $total_qty_agu += $row['value_agu']; ?>
                                <?php $total_qty_sep += $row['value_sep']; ?>
                                <?php $total_qty_q3 += $row['value_q3']; ?>

                                <?php $total_qty_okt += $row['value_okt']; ?>
                                <?php $total_qty_nop += $row['value_nop']; ?>
                                <?php $total_qty_des += $row['value_des']; ?>
                                <?php $total_qty_q4 += $row['value_q4']; ?>

                                <?php $no++; endforeach; ?>

                                <?php $sub_qty_year = $sub_qty_jan + $sub_qty_feb + $sub_qty_mar + $sub_qty_apr + $sub_qty_mei + $sub_qty_jun + $sub_qty_jul + $sub_qty_agu + $sub_qty_sep + $sub_qty_okt + $sub_qty_nop + $sub_qty_des;?>
                                <?php $total_qty_year = $total_qty_jan + $total_qty_feb + $total_qty_mar + $total_qty_apr + $total_qty_mei + $total_qty_jun + $total_qty_jul + $total_qty_agu + $total_qty_sep + $total_qty_okt + $total_qty_nop + $total_qty_des;?>
                                
                                <tr class="table-warning" style="font-weight:bold">
                                    <td></td>
                                    <td><?= $principal;?></td>
                                    <td><?= $item_group;?></td>
                                    <td></td>
                                    <td class="text-center">Sub Total <?= $item_group;?></td>
                                    <td></td>
                                    <td class="text-right"><?= number_format($qty_jan, 0);?></td>
                                    <td class="text-right"><?= number_format($qty_feb, 0);?></td>
                                    <td class="text-right"><?= number_format($qty_mar, 0);?></td>
                                    <td class="text-right"><?= number_format($qty_apr, 0);?></td>
                                    <td class="text-right"><?= number_format($qty_mei, 0);?></td>
                                    <td class="text-right"><?= number_format($qty_jun, 0);?></td>
                                    <td class="text-right"><?= number_format($qty_jul, 0);?></td>
                                    <td class="text-right"><?= number_format($qty_agu, 0);?></td>
                                    <td class="text-right"><?= number_format($qty_sep, 0);?></td>
                                    <td class="text-right"><?= number_format($qty_okt, 0);?></td>
                                    <td class="text-right"><?= number_format($qty_nop, 0);?></td>
                                    <td class="text-right"><?= number_format($qty_des, 0);?></td>
                                    <td class="text-right"><?= number_format($qty_year, 0);?></td>

                                </tr>

                                <tr class="table-danger" style="font-weight:bold">
                                    <td></td>
                                    <td><?= $principal;?></td>
                                    <td></td>
                                    <td></td>
                                    <td class="text-center">TOTAL <?= $principal;?></td>
                                    <td></td>
                                    <td class="text-right"><?= number_format($sub_qty_jan, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_qty_feb, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_qty_mar, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_qty_apr, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_qty_mei, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_qty_jun, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_qty_jul, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_qty_agu, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_qty_sep, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_qty_okt, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_qty_nop, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_qty_des, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_qty_year, 0);?></td>

                                </tr>

                                <tr class="table-danger" style="font-weight:bold">
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td class="text-center">GRAND TOTAL</td>
                                    <td></td>
                                    <td class="text-right"><?= number_format($total_qty_jan, 0);?></td>
                                    <td class="text-right"><?= number_format($total_qty_feb, 0);?></td>
                                    <td class="text-right"><?= number_format($total_qty_mar, 0);?></td>
                                    <td class="text-right"><?= number_format($total_qty_apr, 0);?></td>
                                    <td class="text-right"><?= number_format($total_qty_mei, 0);?></td>
                                    <td class="text-right"><?= number_format($total_qty_jun, 0);?></td>
                                    <td class="text-right"><?= number_format($total_qty_jul, 0);?></td>
                                    <td class="text-right"><?= number_format($total_qty_agu, 0);?></td>
                                    <td class="text-right"><?= number_format($total_qty_sep, 0);?></td>
                                    <td class="text-right"><?= number_format($total_qty_okt, 0);?></td>
                                    <td class="text-right"><?= number_format($total_qty_nop, 0);?></td>
                                    <td class="text-right"><?= number_format($total_qty_des, 0);?></td>
                                    <td class="text-right"><?= number_format($total_qty_year, 0);?></td>

                                </tr>

                            </tbody>
                          </table>

                          <?php
                            $item_group = [];

                            foreach ($data['chart'] as $row2) :
                              $item_group[] = $row2['item_group'];
                            endforeach;

                          ?>

                          <div id="chart" style="width: 100%;height: 100%; margin-top: 50px;">
                            <a style="float:right; margin-right: 30px;" class="btn btn-outline-info" href="#top"><i class="fas fa-table"> Table</i></a>
                            <canvas id="myChart"></canvas>
                          </div>

                          <style>
                            .table tr { line-height: 3px; }
                            .DTFC_LeftBodyLiner { overflow-x: hidden; }
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
  <!-- /.content-wrapper -->


<script>  

/* var randomColorGenerator = function () { 
    return '#' + (Math.random().toString(16) + '0000000').slice(2, 8); 
}; */

var ctx = document.getElementById("myChart");
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
        datasets: [{
          label: '#  <?php echo $item_group[0]; ?>',
                data: ['<?php echo $data['chart'][0]['value_jan']; ?>', '<?php echo $data['chart'][0]['value_feb']; ?>', '<?php echo $data['chart'][0]['value_mar']; ?>', '<?php echo $data['chart'][0]['value_apr']; ?>', '<?php echo $data['chart'][0]['value_mei']; ?>', '<?php echo $data['chart'][0]['value_jun']; ?>', '<?php echo $data['chart'][0]['value_jul']; ?>', '<?php echo $data['chart'][0]['value_agu']; ?>', '<?php echo $data['chart'][0]['value_sep']; ?>', '<?php echo $data['chart'][0]['value_okt']; ?>', '<?php echo $data['chart'][0]['value_nop']; ?>', '<?php echo $data['chart'][0]['value_des']; ?>'],
                backgroundColor: [
                    'rgba(0, 0, 0, 0)',
                    'rgba(0, 0, 0, 0)',
                    'rgba(0, 0, 0, 0)',
                    'rgba(0, 0, 0, 0)',
                    'rgba(0, 0, 0, 0)',
                    'rgba(0, 0, 0, 0)',
                    'rgba(0, 0, 0, 0)',
                    'rgba(0, 0, 0, 0)',
                    'rgba(0, 0, 0, 0)',
                    'rgba(0, 0, 0, 0)',
                    'rgba(0, 0, 0, 0)',
                    'rgba(0, 0, 0, 0)',
                    /* 'rgba(0, 15, 255, 0.5)',
                    'rgba(0, 15, 255, 0.5)',
                    'rgba(0, 15, 255, 0.5)',
                    'rgba(0, 15, 255, 0.5)',
                    'rgba(0, 15, 255, 0.5)',
                    'rgba(0, 15, 255, 0.5)',
                    'rgba(0, 15, 255, 0.5)',
                    'rgba(0, 15, 255, 0.5)',
                    'rgba(0, 15, 255, 0.5)',
                    'rgba(0, 15, 255, 0.5)',
                    'rgba(0, 15, 255, 0.5)',
                    'rgba(0, 15, 255, 0.5)', */
                ],
                borderColor: [
                    'rgba(0, 11, 255, 1.0)',
                    'rgba(0, 11, 255, 1.0)',
                    'rgba(0, 11, 255, 1.0)',
                    'rgba(0, 11, 255, 1.0)', //blue
                    'rgba(0, 11, 255, 1.0)',
                    'rgba(0, 11, 255, 1.0)',
                    'rgba(0, 11, 255, 1.0)',
                    'rgba(0, 11, 255, 1.0)',
                    'rgba(0, 11, 255, 1.0)',
                    'rgba(0, 11, 255, 1.0)', 
                    'rgba(0, 11, 255, 1.0)',
                    'rgba(0, 11, 255, 1.0)',

                ],
                borderWidth: 1
            },
            {
                label: '#  <?php echo $item_group[1]; ?>',
                data: ['<?php echo $data['chart'][1]['value_jan']; ?>', '<?php echo $data['chart'][1]['value_feb']; ?>', '<?php echo $data['chart'][1]['value_mar']; ?>', '<?php echo $data['chart'][1]['value_apr']; ?>', '<?php echo $data['chart'][1]['value_mei']; ?>', '<?php echo $data['chart'][1]['value_jun']; ?>', '<?php echo $data['chart'][1]['value_jul']; ?>', '<?php echo $data['chart'][1]['value_agu']; ?>', '<?php echo $data['chart'][1]['value_sep']; ?>', '<?php echo $data['chart'][1]['value_okt']; ?>', '<?php echo $data['chart'][1]['value_nop']; ?>', '<?php echo $data['chart'][1]['value_des']; ?>'],
                backgroundColor: [
                    'rgba(0, 0, 0, 0)',
                    'rgba(0, 0, 0, 0)',
                    'rgba(0, 0, 0, 0)',
                    'rgba(0, 0, 0, 0)',
                    'rgba(0, 0, 0, 0)',
                    'rgba(0, 0, 0, 0)',
                    'rgba(0, 0, 0, 0)',
                    'rgba(0, 0, 0, 0)',
                    'rgba(0, 0, 0, 0)',
                    'rgba(0, 0, 0, 0)',
                    'rgba(0, 0, 0, 0)',
                    'rgba(0, 0, 0, 0)',
                    /* 'rgba(127, 255, 212, 0.5)',
                    'rgba(127, 255, 212, 0.5)',
                    'rgba(127, 255, 212, 0.5)',
                    'rgba(127, 255, 212, 0.5)',
                    'rgba(127, 255, 212, 0.5)',
                    'rgba(127, 255, 212, 0.5)',
                    'rgba(127, 255, 212, 0.5)',
                    'rgba(127, 255, 212, 0.5)',
                    'rgba(127, 255, 212, 0.5)',
                    'rgba(127, 255, 212, 0.5)',
                    'rgba(127, 255, 212, 0.5)',
                    'rgba(127, 255, 212, 0.5)', */
                ],
                borderColor: [
                    'rgba(47, 244, 79, 1.0)', //green
                    'rgba(47, 244, 79, 1.0)',
                    'rgba(47, 244, 79, 1.0)',
                    'rgba(47, 244, 79, 1.0)',
                    'rgba(47, 244, 79, 1.0)',
                    'rgba(47, 244, 79, 1.0)',
                    'rgba(47, 244, 79, 1.0)',
                    'rgba(47, 244, 79, 1.0)',
                    'rgba(47, 244, 79, 1.0)',
                    'rgba(47, 244, 79, 1.0)',
                    'rgba(47, 244, 79, 1.0)',
                    'rgba(47, 244, 79, 1.0)',
                ],
                borderWidth: 1
            },
            {
                label: '#  <?php echo $item_group[2]; ?>',
                data: ['<?php echo $data['chart'][2]['value_jan']; ?>', '<?php echo $data['chart'][2]['value_feb']; ?>', '<?php echo $data['chart'][2]['value_mar']; ?>', '<?php echo $data['chart'][2]['value_apr']; ?>', '<?php echo $data['chart'][2]['value_mei']; ?>', '<?php echo $data['chart'][2]['value_jun']; ?>', '<?php echo $data['chart'][2]['value_jul']; ?>', '<?php echo $data['chart'][2]['value_agu']; ?>', '<?php echo $data['chart'][2]['value_sep']; ?>', '<?php echo $data['chart'][2]['value_okt']; ?>', '<?php echo $data['chart'][2]['value_nop']; ?>', '<?php echo $data['chart'][2]['value_des']; ?>'],
                backgroundColor: [
                    'rgba(0, 0, 0, 0)',
                    'rgba(0, 0, 0, 0)',
                    'rgba(0, 0, 0, 0)',
                    'rgba(0, 0, 0, 0)',
                    'rgba(0, 0, 0, 0)',
                    'rgba(0, 0, 0, 0)',
                    'rgba(0, 0, 0, 0)',
                    'rgba(0, 0, 0, 0)',
                    'rgba(0, 0, 0, 0)',
                    'rgba(0, 0, 0, 0)',
                    'rgba(0, 0, 0, 0)',
                    'rgba(0, 0, 0, 0)',
                    /* 'rgba(222, 235, 135, 0.5)',
                    'rgba(222, 235, 135, 0.5)',
                    'rgba(222, 235, 135, 0.5)',
                    'rgba(222, 235, 135, 0.5)',
                    'rgba(222, 235, 135, 0.5)',
                    'rgba(222, 235, 135, 0.5)',
                    'rgba(222, 235, 135, 0.5)',
                    'rgba(222, 235, 135, 0.5)',
                    'rgba(222, 235, 135, 0.5)',
                    'rgba(222, 235, 135, 0.5)',
                    'rgba(222, 235, 135, 0.5)',
                    'rgba(222, 235, 135, 0.5)', */
                ],
                borderColor: [
                    'rgba(255, 140, 0, 1)', //dark-orange
                    'rgba(255, 140, 0, 1)',
                    'rgba(255, 140, 0, 1)',
                    'rgba(255, 140, 0, 1)',
                    'rgba(255, 140, 0, 1)',
                    'rgba(255, 140, 0, 1)',
                    'rgba(255, 140, 0, 1)',
                    'rgba(255, 140, 0, 1)',
                    'rgba(255, 140, 0, 1)',
                    'rgba(255, 140, 0, 1)',
                    
                ],
                borderWidth: 1
            },
            {
                label: '#  <?php echo $item_group[3]; ?>',
                data: ['<?php echo $data['chart'][3]['value_jan']; ?>', '<?php echo $data['chart'][3]['value_feb']; ?>', '<?php echo $data['chart'][3]['value_mar']; ?>', '<?php echo $data['chart'][3]['value_apr']; ?>', '<?php echo $data['chart'][3]['value_mei']; ?>', '<?php echo $data['chart'][3]['value_jun']; ?>', '<?php echo $data['chart'][3]['value_jul']; ?>', '<?php echo $data['chart'][3]['value_agu']; ?>', '<?php echo $data['chart'][3]['value_sep']; ?>', '<?php echo $data['chart'][3]['value_okt']; ?>', '<?php echo $data['chart'][3]['value_nop']; ?>', '<?php echo $data['chart'][3]['value_des']; ?>'],
                backgroundColor: [
                    'rgba(0, 0, 0, 0)',
                    'rgba(0, 0, 0, 0)',
                    'rgba(0, 0, 0, 0)',
                    'rgba(0, 0, 0, 0)',
                    'rgba(0, 0, 0, 0)',
                    'rgba(0, 0, 0, 0)',
                    'rgba(0, 0, 0, 0)',
                    'rgba(0, 0, 0, 0)',
                    'rgba(0, 0, 0, 0)',
                    'rgba(0, 0, 0, 0)',
                    'rgba(0, 0, 0, 0)',
                    'rgba(0, 0, 0, 0)',
                    /* 'rgba(242, 32, 130, 0.5)',
                    'rgba(242, 32, 130, 0.5)',
                    'rgba(242, 32, 130, 0.5)',
                    'rgba(242, 32, 130, 0.5)',
                    'rgba(242, 32, 130, 0.5)',
                    'rgba(242, 32, 130, 0.5)',
                    'rgba(242, 32, 130, 0.5)',
                    'rgba(242, 32, 130, 0.5)',
                    'rgba(242, 32, 130, 0.5)',
                    'rgba(242, 32, 130, 0.5)',
                    'rgba(242, 32, 130, 0.5)',
                    'rgba(242, 32, 130, 0.5)', */
                ],
                borderColor: [
                    'rgba(210, 36, 68, 1.0)', //red
                    'rgba(210, 36, 68, 1.0)',
                    'rgba(210, 36, 68, 1.0)',
                    'rgba(210, 36, 68, 1.0)',
                    'rgba(210, 36, 68, 1.0)',
                    'rgba(210, 36, 68, 1.0)',
                    'rgba(210, 36, 68, 1.0)',
                    'rgba(210, 36, 68, 1.0)',
                    'rgba(210, 36, 68, 1.0)',
                    'rgba(210, 36, 68, 1.0)',
                    'rgba(210, 36, 68, 1.0)',
                    'rgba(210, 36, 68, 1.0)',
                ],
                borderWidth: 1
            },
            {
                label: '#  <?php echo $item_group[4]; ?>',
                data: ['<?php echo $data['chart'][4]['value_jan']; ?>', '<?php echo $data['chart'][4]['value_feb']; ?>', '<?php echo $data['chart'][4]['value_mar']; ?>', '<?php echo $data['chart'][4]['value_apr']; ?>', '<?php echo $data['chart'][4]['value_mei']; ?>', '<?php echo $data['chart'][4]['value_jun']; ?>', '<?php echo $data['chart'][4]['value_jul']; ?>', '<?php echo $data['chart'][4]['value_agu']; ?>', '<?php echo $data['chart'][4]['value_sep']; ?>', '<?php echo $data['chart'][4]['value_okt']; ?>', '<?php echo $data['chart'][4]['value_nop']; ?>', '<?php echo $data['chart'][4]['value_des']; ?>'],
                backgroundColor: [
                    'rgba(0, 0, 0, 0)',
                    'rgba(0, 0, 0, 0)',
                    'rgba(0, 0, 0, 0)',
                    'rgba(0, 0, 0, 0)',
                    'rgba(0, 0, 0, 0)',
                    'rgba(0, 0, 0, 0)',
                    'rgba(0, 0, 0, 0)',
                    'rgba(0, 0, 0, 0)',
                    'rgba(0, 0, 0, 0)',
                    'rgba(0, 0, 0, 0)',
                    'rgba(0, 0, 0, 0)',
                    'rgba(0, 0, 0, 0)',
                    /* 'rgba(242, 32, 130, 0.5)',
                    'rgba(242, 32, 130, 0.5)',
                    'rgba(242, 32, 130, 0.5)',
                    'rgba(242, 32, 130, 0.5)',
                    'rgba(242, 32, 130, 0.5)',
                    'rgba(242, 32, 130, 0.5)',
                    'rgba(242, 32, 130, 0.5)',
                    'rgba(242, 32, 130, 0.5)',
                    'rgba(242, 32, 130, 0.5)',
                    'rgba(242, 32, 130, 0.5)',
                    'rgba(242, 32, 130, 0.5)',
                    'rgba(242, 32, 130, 0.5)', */
                ],
                borderColor: [
                    'rgba(240, 15, 255, 1.0)', //violet
                    'rgba(240, 15, 255, 1.0)',
                    'rgba(240, 15, 255, 1.0)',
                    'rgba(240, 15, 255, 1.0)',
                    'rgba(240, 15, 255, 1.0)',
                    'rgba(240, 15, 255, 1.0)',
                    'rgba(240, 15, 255, 1.0)',
                    'rgba(240, 15, 255, 1.0)',
                    'rgba(240, 15, 255, 1.0)',
                    'rgba(240, 15, 255, 1.0)',
                    'rgba(240, 15, 255, 1.0)',
                    'rgba(240, 15, 255, 1.0)',
                ],
                borderWidth: 1
            },
            {
                label: '#  <?php echo $item_group[5]; ?>',
                data: ['<?php echo $data['chart'][5]['value_jan']; ?>', '<?php echo $data['chart'][5]['value_feb']; ?>', '<?php echo $data['chart'][5]['value_mar']; ?>', '<?php echo $data['chart'][5]['value_apr']; ?>', '<?php echo $data['chart'][5]['value_mei']; ?>', '<?php echo $data['chart'][5]['value_jun']; ?>', '<?php echo $data['chart'][5]['value_jul']; ?>', '<?php echo $data['chart'][5]['value_agu']; ?>', '<?php echo $data['chart'][5]['value_sep']; ?>', '<?php echo $data['chart'][5]['value_okt']; ?>', '<?php echo $data['chart'][5]['value_nop']; ?>', '<?php echo $data['chart'][5]['value_des']; ?>'],
                backgroundColor: [
                    'rgba(0, 0, 0, 0)',
                    'rgba(0, 0, 0, 0)',
                    'rgba(0, 0, 0, 0)',
                    'rgba(0, 0, 0, 0)',
                    'rgba(0, 0, 0, 0)',
                    'rgba(0, 0, 0, 0)',
                    'rgba(0, 0, 0, 0)',
                    'rgba(0, 0, 0, 0)',
                    'rgba(0, 0, 0, 0)',
                    'rgba(0, 0, 0, 0)',
                    'rgba(0, 0, 0, 0)',
                    'rgba(0, 0, 0, 0)',
                    /* 'rgba(242, 32, 130, 0.5)',
                    'rgba(242, 32, 130, 0.5)',
                    'rgba(242, 32, 130, 0.5)',
                    'rgba(242, 32, 130, 0.5)',
                    'rgba(242, 32, 130, 0.5)',
                    'rgba(242, 32, 130, 0.5)',
                    'rgba(242, 32, 130, 0.5)',
                    'rgba(242, 32, 130, 0.5)',
                    'rgba(242, 32, 130, 0.5)',
                    'rgba(242, 32, 130, 0.5)',
                    'rgba(242, 32, 130, 0.5)',
                    'rgba(242, 32, 130, 0.5)', */
                ],
                borderColor: [
                    'rgba(124, 207, 0, 1.0)', 
                    'rgba(124, 207, 0, 1.0)',
                    'rgba(124, 207, 0, 1.0)',
                    'rgba(124, 207, 0, 1.0)',
                    'rgba(124, 207, 0, 1.0)',
                    'rgba(124, 207, 0, 1.0)',
                    'rgba(124, 207, 0, 1.0)',
                    'rgba(124, 207, 0, 1.0)',
                    'rgba(124, 207, 0, 1.0)',
                    'rgba(124, 207, 0, 1.0)',
                    'rgba(124, 207, 0, 1.0)',
                    'rgba(124, 207, 0, 1.0)',
                ],
                borderWidth: 1
            },
            {
                label: '#  <?php echo $item_group[6]; ?>',
                data: ['<?php echo $data['chart'][6]['value_jan']; ?>', '<?php echo $data['chart'][6]['value_feb']; ?>', '<?php echo $data['chart'][6]['value_mar']; ?>', '<?php echo $data['chart'][6]['value_apr']; ?>', '<?php echo $data['chart'][6]['value_mei']; ?>', '<?php echo $data['chart'][6]['value_jun']; ?>', '<?php echo $data['chart'][6]['value_jul']; ?>', '<?php echo $data['chart'][6]['value_agu']; ?>', '<?php echo $data['chart'][6]['value_sep']; ?>', '<?php echo $data['chart'][6]['value_okt']; ?>', '<?php echo $data['chart'][6]['value_nop']; ?>', '<?php echo $data['chart'][6]['value_des']; ?>'],
                backgroundColor: [
                    'rgba(0, 0, 0, 0)',
                    'rgba(0, 0, 0, 0)',
                    'rgba(0, 0, 0, 0)',
                    'rgba(0, 0, 0, 0)',
                    'rgba(0, 0, 0, 0)',
                    'rgba(0, 0, 0, 0)',
                    'rgba(0, 0, 0, 0)',
                    'rgba(0, 0, 0, 0)',
                    'rgba(0, 0, 0, 0)',
                    'rgba(0, 0, 0, 0)',
                    'rgba(0, 0, 0, 0)',
                    'rgba(0, 0, 0, 0)',
                    /* 'rgba(242, 32, 130, 0.5)',
                    'rgba(242, 32, 130, 0.5)',
                    'rgba(242, 32, 130, 0.5)',
                    'rgba(242, 32, 130, 0.5)',
                    'rgba(242, 32, 130, 0.5)',
                    'rgba(242, 32, 130, 0.5)',
                    'rgba(242, 32, 130, 0.5)',
                    'rgba(242, 32, 130, 0.5)',
                    'rgba(242, 32, 130, 0.5)',
                    'rgba(242, 32, 130, 0.5)',
                    'rgba(242, 32, 130, 0.5)',
                    'rgba(242, 32, 130, 0.5)', */
                ],
                borderColor: [
                    'rgba(95, 249, 160, 1.0)', 
                    'rgba(95, 249, 160, 1.0)',
                    'rgba(95, 249, 160, 1.0)',
                    'rgba(95, 249, 160, 1.0)',
                    'rgba(95, 249, 160, 1.0)',
                    'rgba(95, 249, 160, 1.0)',
                    'rgba(95, 249, 160, 1.0)',
                    'rgba(95, 249, 160, 1.0)',
                    'rgba(95, 249, 160, 1.0)',
                    'rgba(95, 249, 160, 1.0)',
                    'rgba(95, 249, 160, 1.0)',
                    'rgba(95, 249, 160, 1.0)',
                ],
                borderWidth: 1
            },
            {
                label: '#  <?php echo $item_group[7]; ?>',
                data: ['<?php echo $data['chart'][7]['value_jan']; ?>', '<?php echo $data['chart'][7]['value_feb']; ?>', '<?php echo $data['chart'][7]['value_mar']; ?>', '<?php echo $data['chart'][7]['value_apr']; ?>', '<?php echo $data['chart'][7]['value_mei']; ?>', '<?php echo $data['chart'][7]['value_jun']; ?>', '<?php echo $data['chart'][7]['value_jul']; ?>', '<?php echo $data['chart'][7]['value_agu']; ?>', '<?php echo $data['chart'][7]['value_sep']; ?>', '<?php echo $data['chart'][7]['value_okt']; ?>', '<?php echo $data['chart'][7]['value_nop']; ?>', '<?php echo $data['chart'][7]['value_des']; ?>'],
                backgroundColor: [
                    'rgba(0, 0, 0, 0)',
                    'rgba(0, 0, 0, 0)',
                    'rgba(0, 0, 0, 0)',
                    'rgba(0, 0, 0, 0)',
                    'rgba(0, 0, 0, 0)',
                    'rgba(0, 0, 0, 0)',
                    'rgba(0, 0, 0, 0)',
                    'rgba(0, 0, 0, 0)',
                    'rgba(0, 0, 0, 0)',
                    'rgba(0, 0, 0, 0)',
                    'rgba(0, 0, 0, 0)',
                    'rgba(0, 0, 0, 0)',
                    /* 'rgba(242, 32, 130, 0.5)',
                    'rgba(242, 32, 130, 0.5)',
                    'rgba(242, 32, 130, 0.5)',
                    'rgba(242, 32, 130, 0.5)',
                    'rgba(242, 32, 130, 0.5)',
                    'rgba(242, 32, 130, 0.5)',
                    'rgba(242, 32, 130, 0.5)',
                    'rgba(242, 32, 130, 0.5)',
                    'rgba(242, 32, 130, 0.5)',
                    'rgba(242, 32, 130, 0.5)',
                    'rgba(242, 32, 130, 0.5)',
                    'rgba(242, 32, 130, 0.5)', */
                ],
                borderColor: [
                    'rgba(0, 0, 139, 1.0)', 
                    'rgba(0, 0, 139, 1.0)',
                    'rgba(0, 0, 139, 1.0)',
                    'rgba(0, 0, 139, 1.0)',
                    'rgba(0, 0, 139, 1.0)',
                    'rgba(0, 0, 139, 1.0)',
                    'rgba(0, 0, 139, 1.0)',
                    'rgba(0, 0, 139, 1.0)',
                    'rgba(0, 0, 139, 1.0)',
                    'rgba(0, 0, 139, 1.0)',
                    'rgba(0, 0, 139, 1.0)',
                    'rgba(0, 0, 139, 1.0)',
                    
                ],
                borderWidth: 1
            },
            {
                label: '#  <?php echo $item_group[8]; ?>',
                data: ['<?php echo $data['chart'][8]['value_jan']; ?>', '<?php echo $data['chart'][8]['value_feb']; ?>', '<?php echo $data['chart'][8]['value_mar']; ?>', '<?php echo $data['chart'][8]['value_apr']; ?>', '<?php echo $data['chart'][8]['value_mei']; ?>', '<?php echo $data['chart'][8]['value_jun']; ?>', '<?php echo $data['chart'][8]['value_jul']; ?>', '<?php echo $data['chart'][8]['value_agu']; ?>', '<?php echo $data['chart'][8]['value_sep']; ?>', '<?php echo $data['chart'][8]['value_okt']; ?>', '<?php echo $data['chart'][8]['value_nop']; ?>', '<?php echo $data['chart'][8]['value_des']; ?>'],
                backgroundColor: [
                    'rgba(0, 0, 0, 0)',
                    'rgba(0, 0, 0, 0)',
                    'rgba(0, 0, 0, 0)',
                    'rgba(0, 0, 0, 0)',
                    'rgba(0, 0, 0, 0)',
                    'rgba(0, 0, 0, 0)',
                    'rgba(0, 0, 0, 0)',
                    'rgba(0, 0, 0, 0)',
                    'rgba(0, 0, 0, 0)',
                    'rgba(0, 0, 0, 0)',
                    'rgba(0, 0, 0, 0)',
                    'rgba(0, 0, 0, 0)',
                    /* 'rgba(242, 32, 130, 0.5)',
                    'rgba(242, 32, 130, 0.5)',
                    'rgba(242, 32, 130, 0.5)',
                    'rgba(242, 32, 130, 0.5)',
                    'rgba(242, 32, 130, 0.5)',
                    'rgba(242, 32, 130, 0.5)',
                    'rgba(242, 32, 130, 0.5)',
                    'rgba(242, 32, 130, 0.5)',
                    'rgba(242, 32, 130, 0.5)',
                    'rgba(242, 32, 130, 0.5)',
                    'rgba(242, 32, 130, 0.5)',
                    'rgba(242, 32, 130, 0.5)', */
                ],
                borderColor: [
                    'rgba(210, 36, 68, 1.0)', //red
                    'rgba(210, 36, 68, 1.0)',
                    'rgba(210, 36, 68, 1.0)',
                    'rgba(210, 36, 68, 1.0)',
                    'rgba(210, 36, 68, 1.0)',
                    'rgba(210, 36, 68, 1.0)',
                    'rgba(210, 36, 68, 1.0)',
                    'rgba(210, 36, 68, 1.0)',
                    'rgba(210, 36, 68, 1.0)',
                    'rgba(210, 36, 68, 1.0)',
                    'rgba(210, 36, 68, 1.0)',
                    'rgba(210, 36, 68, 1.0)',
                ],
                borderWidth: 1
            },
            {
                label: '#  <?php echo $item_group[9]; ?>',
                data: ['<?php echo $data['chart'][9]['value_jan']; ?>', '<?php echo $data['chart'][9]['value_feb']; ?>', '<?php echo $data['chart'][9]['value_mar']; ?>', '<?php echo $data['chart'][9]['value_apr']; ?>', '<?php echo $data['chart'][9]['value_mei']; ?>', '<?php echo $data['chart'][9]['value_jun']; ?>', '<?php echo $data['chart'][9]['value_jul']; ?>', '<?php echo $data['chart'][9]['value_agu']; ?>', '<?php echo $data['chart'][9]['value_sep']; ?>', '<?php echo $data['chart'][9]['value_okt']; ?>', '<?php echo $data['chart'][9]['value_nop']; ?>', '<?php echo $data['chart'][9]['value_des']; ?>'],
                backgroundColor: [
                    'rgba(0, 0, 0, 0)',
                    'rgba(0, 0, 0, 0)',
                    'rgba(0, 0, 0, 0)',
                    'rgba(0, 0, 0, 0)',
                    'rgba(0, 0, 0, 0)',
                    'rgba(0, 0, 0, 0)',
                    'rgba(0, 0, 0, 0)',
                    'rgba(0, 0, 0, 0)',
                    'rgba(0, 0, 0, 0)',
                    'rgba(0, 0, 0, 0)',
                    'rgba(0, 0, 0, 0)',
                    'rgba(0, 0, 0, 0)',
                    /* 'rgba(242, 32, 130, 0.5)',
                    'rgba(242, 32, 130, 0.5)',
                    'rgba(242, 32, 130, 0.5)',
                    'rgba(242, 32, 130, 0.5)',
                    'rgba(242, 32, 130, 0.5)',
                    'rgba(242, 32, 130, 0.5)',
                    'rgba(242, 32, 130, 0.5)',
                    'rgba(242, 32, 130, 0.5)',
                    'rgba(242, 32, 130, 0.5)',
                    'rgba(242, 32, 130, 0.5)',
                    'rgba(242, 32, 130, 0.5)',
                    'rgba(242, 32, 130, 0.5)', */
                ],
                borderColor: [
                    'rgba(210, 36, 68, 1.0)', //red
                    'rgba(210, 36, 68, 1.0)',
                    'rgba(210, 36, 68, 1.0)',
                    'rgba(210, 36, 68, 1.0)',
                    'rgba(210, 36, 68, 1.0)',
                    'rgba(210, 36, 68, 1.0)',
                    'rgba(210, 36, 68, 1.0)',
                    'rgba(210, 36, 68, 1.0)',
                    'rgba(210, 36, 68, 1.0)',
                    'rgba(210, 36, 68, 1.0)',
                    'rgba(210, 36, 68, 1.0)',
                    'rgba(210, 36, 68, 1.0)',
                ],
                borderWidth: 1
            },
            
          ]
    },
    options: {
        scales: {
            yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
        },
        title: {
            display: true,
            position: "top",
            text: "Chart Selling In - Value",
            fontSize: 16,
            fontColor: "#111"
        },
        legend: {
          display: true,
          position: 'bottom',
          labels: {
              boxWidth: 20,
              fontColor: '#111',
              padding: 10
          }
        },
        
    }
});


</script>

<script type="text/javascript">
    $(document).ready(function(){
      
        $('#dt_island').change(function(){ 
            var id=$('#dt_island').val();
            $.ajax({
                    url : "<?= base_url; ?>/Report/showRegion_ByIsland",
                    method : "POST",
                    data : {id: id},
                    async : true,
                    success: function(data){
                        $('#dt_region').html(data);
                    }
                }
            );
            return false;
        });

        $('#dt_island').change(function(){ 
          var id=$('#dt_island').val();
            $.ajax({
                    url : "<?= base_url; ?>/Report/showArea_ByIsland",
                    method : "POST",
                    data : {id: id},
                    async : true,
                    success: function(data){
                        $("#dt_area").empty();
                        $('#dt_area').html(data);
                    }
                }
            );
            return false;
        });

        $('#dt_region').change(function(){ 
          var id=$('#dt_region').val();
            $.ajax({
                    url : "<?= base_url; ?>/Report/showArea_ByRegion",
                    method : "POST",
                    data : {id: id},
                    async : true,
                    success: function(data){
                        $("#dt_area").empty();
                        $('#dt_area').html(data);
                    }
                }
            );
            return false;
        });
        
    });
</script>