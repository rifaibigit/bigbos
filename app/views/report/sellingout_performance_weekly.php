  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Report Selling Out - Weekly</h1> 
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
            <form action="<?= base_url; ?>/Report/sellingout_performance_weekly" method="post">
                <div class="row">
                    <div class="col-md-12">
                      <div class="input-group mb-3">

                        <?php

                        if(isset($data))
                        {
                            $region = $data['by_region'];
                            $area = $data['by_area'];
                            $island = $data['by_island'];
                            $kode_dist = $data['by_dist'];
                            $year = $data['by_year'];
                            $month = $data['by_month'];

                        }else
                        {
                            $region = "By Region";
                            $area = "By Area";
                            $island = "By Island";
                            $kode_dist = "By Distributor";
                        }

                        ?>
                          
                          
                          <div style="margin-left : 5px; width : 350px; margin-bottom: 5px;">
                              <select class="mdb-select md-form form-control" title="By Outlet" id="dt_dist" name="by_dist" style="margin-left : 5px;" required>
                                  <option value="">By Distributor</option>
                                      <?php $no=1; ?>
                                      <?php foreach ($data['dist'] as $row) :?>
                                              <option <?php if( $kode_dist==$row['cust_code']){echo "selected"; } ?> value="<?= $row['cust_code'];?>"><b><?= $row['distributor'];?></b></option>
                                      <?php $no++; endforeach; ?>
                              </select>
                          </div>
                          <div style="margin-left : 10px; width : 125px;">
                            <select name="by_month" class="mdb-select xs-form form-control">
                              <option <?php if( $month=='all' or $month=='All' ){echo 'selected'; } ?> value="all">All</option>
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
                          <div style="margin-left : 10px;">
                            <button class="btn btn-outline-primary" type="submit">Go!</button>
                            <a class="btn btn-outline-secondary" href="<?= base_url; ?>/Report/sellingout_performance_weekly">Reset</a>
                          </div>
                          <div style="margin-left : 10px;">
                            <button class="btn float-right btn btn-outline-success" type="submit" formaction="<?= base_url; ?>/Report/export_sellingout_weekly"><i class = "fa fa-download"> Excel</i></button>
                          </div>
                        </div>

                        <div>

                        </div>

                        <!-- <div id="hasil_sale_out"></div> -->
                        <div class="table-responsive-sm text-small">
                          <table id="sale_out_performance" class="table table-bordered table-sm order-column nowrap" align="left" style="font-size:85%; border: 1px solid black;">
                          <thead class="table-warning">
                              <tr>
                                <th rowspan="3" class="text-center" style="width: 5px; vertical-align: middle;">#</th>
                                <th rowspan="3" class="text-center" style="width: 25px; vertical-align: middle;">Principal</th>
                                <th rowspan="3" class="text-center" style="width: 90px; vertical-align: middle;">Group SKU</th>
                                <th rowspan="3" class="text-center" style="width: 12px; vertical-align: middle;">Kode Item</th>
                                <th rowspan="3" class="text-center" style="width: 250px; vertical-align: middle;">SKU</th>
                                <th rowspan="3" class="text-center" style="width: 15px; vertical-align: middle;">Unit</th>
                                <th colspan="18" class="text-center">Selling Out</th>
                                <th colspan="6" class="text-center">STOCK</th>
                                <th rowspan="3" class="text-center" style="width: 15px; vertical-align: middle;">W 1</th>
                                <th rowspan="3" class="text-center" style="width: 15px; vertical-align: middle;">W 1 ~ W 2</th>
                                <th rowspan="3" class="text-center" style="width: 15px; vertical-align: middle;">W 1 ~ W 3</th>
                                <th rowspan="3" class="text-center" style="width: 15px; vertical-align: middle;">W 1 ~ W 4</th>
                                <th rowspan="3" class="text-center" style="width: 15px; vertical-align: middle;">W 1 ~ W 5</th>
                                <th rowspan="3" class="text-center" style="width: 15px; vertical-align: middle;">W 1 ~ W 6</th>
                              </tr>
                              <tr>
                                <th colspan="2" class="text-center">Week I</th>
                                <th colspan="2" class="text-center">Week II</th>
                                <th colspan="2" class="text-center">Week III</th>
                                <th colspan="2" class="text-center">Week IV</th>
                                <th colspan="2" class="text-center">Week V</th>
                                <th colspan="2" class="text-center">Week VI</th>
                                <th colspan="2" class="text-center">Total</th>
                                <th colspan="2" class="text-center">Target</th>
                                <th colspan="2" class="text-center">Index(%)</th>
                                <th colspan="2" class="text-center">ENDING STOCK</th>
                                <th colspan="2" class="text-center">GOODS IN TRANSIT</th>
                                <th colspan="2" class="text-center">TOTAL ENDING STOCK</th>
                              </tr>                  
                              <tr>
                                <th class="text-center" style="width: 15px">Qty</th>
                                <th class="text-center" style="width: 30px">Value</th>
                                <th class="text-center" style="width: 15px">Qty</th>
                                <th class="text-center" style="width: 30px">Value</th>
                                <th class="text-center" style="width: 15px">Qty</th>
                                <th class="text-center" style="width: 30px">Value</th>
                                <th class="text-center" style="width: 15px">Qty</th>
                                <th class="text-center" style="width: 30px">Value</th>
                                <th class="text-center" style="width: 15px">Qty</th>
                                <th class="text-center" style="width: 30px">Value</th>
                                <th class="text-center" style="width: 15px">Qty</th>
                                <th class="text-center" style="width: 30px">Value</th>
                                <th class="text-center" style="width: 15px">Qty</th>
                                <th class="text-center" style="width: 30px">Value</th>
                                <th class="text-center" style="width: 15px">Qty</th>
                                <th class="text-center" style="width: 30px">Value</th>
                                <th class="text-center" style="width: 15px">Qty</th>
                                <th class="text-center" style="width: 30px">Value</th>
                                <th class="text-center" style="width: 15px">Qty</th>
                                <th class="text-center" style="width: 30px">Value</th>
                                <th class="text-center" style="width: 15px">Qty</th>
                                <th class="text-center" style="width: 30px">Value</th>
                                <th class="text-center" style="width: 15px">Qty</th>
                                <th class="text-center" style="width: 30px">Value</th>
                              </tr>
                            </thead>
                            <tbody>
                                <?php 

                                    $item_group = '';
                                    $principal = '';

                                    $qty_w1 = 0;
                                    $qty_w2 = 0;
                                    $qty_w3 = 0;
                                    $qty_w4 = 0;
                                    $qty_w5 = 0;
                                    $qty_w6 = 0;
                                    $qty_total = 0;
                                    $qty_target = 0;
                                    $qty_ending = 0;
                                    $qty_transit = 0;

                                    $value_w1 = 0;
                                    $value_w2 = 0;
                                    $value_w3 = 0;
                                    $value_w4 = 0;
                                    $value_w5 = 0;
                                    $value_w6 = 0;
                                    $value_total = 0;
                                    $value_target = 0;
                                    $value_ending = 0;
                                    $value_transit = 0;

                                    $sub_qty_w1 = 0;
                                    $sub_qty_w2 = 0;
                                    $sub_qty_w3 = 0;
                                    $sub_qty_w4 = 0;
                                    $sub_qty_w5 = 0;
                                    $sub_qty_w6 = 0;
                                    $sub_qty_total = 0;
                                    $sub_qty_target = 0;
                                    $sub_qty_ending = 0;
                                    $sub_qty_transit = 0;

                                    $sub_value_w1 = 0;
                                    $sub_value_w2 = 0;
                                    $sub_value_w3 = 0;
                                    $sub_value_w4 = 0;
                                    $sub_value_w5 = 0;
                                    $sub_value_w6 = 0;
                                    $sub_value_total = 0;
                                    $sub_value_target = 0;
                                    $sub_value_ending = 0;
                                    $sub_value_transit = 0;

                                    $total_qty_w1 = 0;
                                    $total_qty_w2 = 0;
                                    $total_qty_w3 = 0;
                                    $total_qty_w4 = 0;
                                    $total_qty_w5 = 0;
                                    $total_qty_w6 = 0;
                                    $total_qty_total = 0;
                                    $total_qty_target = 0;
                                    $total_qty_ending = 0;
                                    $total_qty_transit = 0;

                                    $total_value_w1 = 0;
                                    $total_value_w2 = 0;
                                    $total_value_w3 = 0;
                                    $total_value_w4 = 0;
                                    $total_value_w5 = 0;
                                    $total_value_w6 = 0;
                                    $total_value_total = 0;
                                    $total_value_target = 0;
                                    $total_value_ending = 0;
                                    $total_value_transit = 0;

                                ?>
                                <?php $no=1; ?>

                                <?php foreach ($data['sellingout'] as $row) :?>

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
                                                echo '<td class="text-right">' . number_format($qty_w1, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($value_w1, 2). '</td>';
                                                echo '<td class="text-right">' . number_format($qty_w2, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($value_w2, 2). '</td>';
                                                echo '<td class="text-right">' . number_format($qty_w3, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($value_w3, 2). '</td>';
                                                echo '<td class="text-right">' . number_format($qty_w4, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($value_w4, 2). '</td>';
                                                echo '<td class="text-right">' . number_format($qty_w5, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($value_w5, 2). '</td>';
                                                echo '<td class="text-right">' . number_format($qty_w6, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($value_w6, 2). '</td>';
                                                echo '<td class="text-right">' . number_format($qty_total, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($value_total, 2). '</td>';
                                                echo '<td class="text-right">' . number_format($qty_target, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($value_target, 2). '</td>';
                                                
                                                if($qty_target != 0 and $value_index != 0)
                                                {
                                                  $qty_index = ($qty_total/($qty_target) ?: 0)*100;
                                                  $value_index = ($value_total/($value_target) ?: 0)*100;
                                                }
                                                else
                                                {
                                                  $qty_index = 0;
                                                  $value_index = 0;
                                                }
                                                                                       
                                                echo '<td class="text-right">' . number_format($qty_index, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($value_index, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($qty_ending, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($value_ending, 2). '</td>';
                                                echo '<td class="text-right">' . number_format($qty_transit, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($value_transit, 2). '</td>';

                                                $qty_total_ending = $qty_ending + $qty_transit;
                                                $value_total_ending = $value_ending + $value_transit;

                                                echo '<td class="text-right">' . number_format($qty_total_ending, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($value_total_ending, 2). '</td>';

                                                echo '<td class="text-right">' . number_format($qty_w1, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($qty_w1 + $qty_w2, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($qty_w1 + $qty_w2 + $qty_w3, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($qty_w1 + $qty_w2 + $qty_w3 + $qty_w4, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($qty_w1 + $qty_w2 + $qty_w3 + $qty_w4 + $qty_w5, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($qty_w1 + $qty_w2 + $qty_w3 + $qty_w4 + $qty_w5 + $qty_w6, 0). '</td>';
                                                
                                            echo '</tr>';

                                            $qty_w1 = 0;
                                            $qty_w2 = 0;
                                            $qty_w3 = 0;
                                            $qty_w4 = 0;
                                            $qty_w5 = 0;
                                            $qty_w6 = 0;
                                            $qty_total = 0;
                                            $qty_target = 0;
                                            $qty_ending = 0;
                                            $qty_transit = 0;

                                            $value_w1 = 0;
                                            $value_w2 = 0;
                                            $value_w3 = 0;
                                            $value_w4 = 0;
                                            $value_w5 = 0;
                                            $value_w6 = 0;
                                            $value_total = 0;
                                            $value_target = 0;
                                            $value_ending = 0;
                                            $value_transit = 0;
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
                                                echo '<td class="text-right">' . number_format($sub_qty_w1, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_value_w1, 2). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_qty_w2, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_value_w2, 2). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_qty_w3, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_value_w3, 2). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_qty_w4, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_value_w4, 2). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_qty_w5, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_value_w5, 2). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_qty_w6, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_value_w6, 2). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_qty_total, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_value_total, 2). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_qty_target, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_value_target, 2). '</td>';

                                                if($sub_qty_target != 0 and $sub_value_target != 0)
                                                {
                                                  $sub_qty_index = ($sub_qty_total/($sub_qty_target) ?: 0)*100;
                                                  $sub_value_index = ($sub_value_total/($sub_value_target) ?: 0)*100;
                                                }
                                                else
                                                {
                                                  $sub_qty_index = 0;
                                                  $sub_value_index = 0;
                                                }

                                                echo '<td class="text-right">' . number_format($sub_qty_index, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_value_index, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_qty_ending, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_value_ending, 2). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_qty_transit, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_value_transit, 2). '</td>';

                                                $sub_qty_total_ending = $sub_qty_ending + $sub_qty_transit;
                                                $sub_value_total_ending = $sub_value_ending + $sub_value_transit;

                                                echo '<td class="text-right">' . number_format($qty_total_ending, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($value_total_ending, 2). '</td>';

                                                echo '<td class="text-right">' . number_format($sub_qty_w1, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_qty_w1 + $sub_qty_w2, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_qty_w1 + $sub_qty_w2 + $sub_qty_w3, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_qty_w1 + $sub_qty_w2 + $sub_qty_w3 + $sub_qty_w4, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_qty_w1 + $sub_qty_w2 + $sub_qty_w3 + $sub_qty_w4 + $sub_qty_w5, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_qty_w1 + $sub_qty_w2 + $sub_qty_w3 + $sub_qty_w4 + $sub_qty_w5 + $sub_qty_w6, 0). '</td>';
                                            echo '</tr>';

                                            $sub_qty_w1 = 0;
                                            $sub_qty_w2 = 0;
                                            $sub_qty_w3 = 0;
                                            $sub_qty_w4 = 0;
                                            $sub_qty_w5 = 0;
                                            $sub_qty_w6 = 0;
                                            $sub_qty_total = 0;
                                            $sub_qty_target = 0;
                                            $sub_qty_ending = 0;
                                            $sub_qty_transit = 0;

                                            $sub_value_w1 = 0;
                                            $sub_value_w2 = 0;
                                            $sub_value_w3 = 0;
                                            $sub_value_w4 = 0;
                                            $sub_value_w5 = 0;
                                            $sub_value_w6 = 0;
                                            $sub_value_total = 0;
                                            $sub_value_target = 0;
                                            $sub_value_ending = 0;
                                            $sub_value_transit = 0;
                                        }

                                        

                                    ?>

                                <tr>
                                    <td class="text-center"><?= $no; ?></td>
                                    <td><?= $row['principal'];?></td>
                                    <td><?= $row['item_group'];?></td>
                                    <td><?= $row['item_code'];?></td>
                                    <td><?= $row['item_name'];?></td>
                                    <td class="text-center"><?= $row['unit'];?></td>
                                    <td class="text-right"><?= number_format($row['qty_w1'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_w1'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['qty_w2'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_w2'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['qty_w3'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_w3'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['qty_w4'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_w4'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['qty_w5'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_w5'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['qty_w6'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_w6'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['qty_total'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_total'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_value'], 2);?></td>
                                    <?php
                                      if($row['target_qty'] != 0 and $row['target_value'] != 0)
                                      {
                                        $index_qty = ($row['qty_total']/($row['target_qty']) ?: 0)*100;
                                        $index_val = ($row['value_total']/($row['target_value']) ?: 0)*100;
                                      }
                                      else
                                      {
                                        $index_qty = 0;
                                        $index_val = 0;
                                      }
                                    ?>
                                    <td class="text-right"><?= number_format($index_qty, 0);?></td>
                                    <td class="text-right"><?= number_format($index_val, 0);?></td>
                                    <td class="text-right"><?= number_format($row['ending_qty'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['ending_value'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['transit_qty'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['transit_value'], 2);?></td>
                                    <?php $total_ending_qty = $row['ending_qty'] + $row['transit_qty'] ;?>
                                    <?php $total_ending_val = $row['ending_value'] + $row['transit_value'] ;?>
                                    <td class="text-right"><?= number_format($total_ending_qty, 0);?></td>
                                    <td class="text-right"><?= number_format($total_ending_val, 2);?></td>

                                    <td class="text-right"><?= number_format($row['qty_w1'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['qty_w1'] + $row['qty_w2'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['qty_w1'] + $row['qty_w2'] + $row['qty_w3'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['qty_w1'] + $row['qty_w2'] + $row['qty_w3'] + $row['qty_w4'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['qty_w1'] + $row['qty_w2'] + $row['qty_w3'] + $row['qty_w4'] + $row['qty_w5'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['qty_w1'] + $row['qty_w2'] + $row['qty_w3'] + $row['qty_w4'] + $row['qty_w5'] + $row['qty_w6'], 0);?></td>
                                    
                                    
                                </tr>

                                <?php $item_group = $row['item_group'] ?>
                                <?php $principal = $row['principal'] ?>

                                <?php $qty_w1 += $row['qty_w1']; ?>
                                <?php $value_w1 += $row['value_w1']; ?>
                                <?php $qty_w2 += $row['qty_w2']; ?>
                                <?php $value_w2 += $row['value_w2']; ?>
                                <?php $qty_w3 += $row['qty_w3']; ?>
                                <?php $value_w3 += $row['value_w3']; ?>
                                <?php $qty_w4 += $row['qty_w4']; ?>
                                <?php $value_w4 += $row['value_w4']; ?>
                                <?php $qty_w5 += $row['qty_w5']; ?>
                                <?php $value_w5 += $row['value_w5']; ?>
                                <?php $qty_w6 += $row['qty_w6']; ?>
                                <?php $value_w6 += $row['value_w6']; ?>
                                <?php $qty_total += $row['qty_total']; ?>
                                <?php $value_total += $row['value_total']; ?>
                                <?php $qty_target += $row['target_qty']; ?>
                                <?php $value_target += $row['target_value']; ?>
                                <?php $sum_index_qty += $index_qty; ?>
                                <?php $sum_index_val += $index_val; ?>
                                <?php $sum_total_ending_qty += $total_ending_qty; ?>
                                <?php $sum_total_ending_val += $total_ending_val; ?>

                                <?php $sub_qty_w1 += $row['qty_w1']; ?>
                                <?php $sub_value_w1 += $row['value_w1']; ?>
                                <?php $sub_qty_w2 += $row['qty_w2']; ?>
                                <?php $sub_value_w2 += $row['value_w2']; ?>
                                <?php $sub_qty_w3 += $row['qty_w3']; ?>
                                <?php $sub_value_w3 += $row['value_w3']; ?>
                                <?php $sub_qty_w4 += $row['qty_w4']; ?>
                                <?php $sub_value_w4 += $row['value_w4']; ?>
                                <?php $sub_qty_w5 += $row['qty_w5']; ?>
                                <?php $sub_value_w5 += $row['value_w5']; ?>
                                <?php $sub_qty_w6 += $row['qty_w6']; ?>
                                <?php $sub_value_w6 += $row['value_w6']; ?>
                                <?php $sub_qty_total += $row['qty_total']; ?>
                                <?php $sub_value_total += $row['value_total']; ?>
                                <?php $sub_qty_target += $row['target_qty']; ?>
                                <?php $sub_value_target += $row['target_value']; ?>
                                <?php $sub_sum_index_qty += $index_qty; ?>
                                <?php $sub_sum_index_val += $index_val; ?>
                                <?php $sub_sum_total_ending_qty += $total_ending_qty; ?>
                                <?php $sub_sum_total_ending_val += $total_ending_val; ?>
                                
                                <?php $total_qty_w1 += $row['qty_w1']; ?>
                                <?php $total_value_w1 += $row['value_w1']; ?>
                                <?php $total_qty_w2 += $row['qty_w2']; ?>
                                <?php $total_value_w2 += $row['value_w2']; ?>
                                <?php $total_qty_w3 += $row['qty_w3']; ?>
                                <?php $total_value_w3 += $row['value_w3']; ?>
                                <?php $total_qty_w4 += $row['qty_w4']; ?>
                                <?php $total_value_w4 += $row['value_w4']; ?>
                                <?php $total_qty_w5 += $row['qty_w5']; ?>
                                <?php $total_value_w5 += $row['value_w5']; ?>
                                <?php $total_qty_w6 += $row['qty_w6']; ?>
                                <?php $total_value_w6 += $row['value_w6']; ?>
                                <?php $total_qty_total += $row['qty_total']; ?>
                                <?php $total_value_total += $row['value_total']; ?>
                                <?php $total_qty_target += $row['target_qty']; ?>
                                <?php $total_value_target += $row['target_value']; ?>
                                <?php $total_sum_index_qty += $index_qty; ?>
                                <?php $total_sum_index_val += $index_val; ?>
                                <?php $total_sum_total_ending_qty += $total_ending_qty; ?>
                                <?php $total_sum_total_ending_val += $total_ending_val; ?>

                                <?php $no++; endforeach; ?>
                                
                                <tr class="table-warning" style="font-weight:bold">
                                    <td></td>
                                    <td><?= $principal;?></td>
                                    <td><?= $item_group;?></td>
                                    <td></td>
                                    <td class="text-center">Sub Total <?= $item_group;?></td>
                                    <td></td>
                                    <td class="text-right"><?= number_format($qty_w1, 0);?></td>
                                    <td class="text-right"><?= number_format($value_w1, 2);?></td>
                                    <td class="text-right"><?= number_format($qty_w2, 0);?></td>
                                    <td class="text-right"><?= number_format($value_w2, 2);?></td>
                                    <td class="text-right"><?= number_format($qty_w3, 0);?></td>
                                    <td class="text-right"><?= number_format($value_w3, 2);?></td>
                                    <td class="text-right"><?= number_format($qty_w4, 0);?></td>
                                    <td class="text-right"><?= number_format($value_w4, 2);?></td>
                                    <td class="text-right"><?= number_format($qty_w5, 0);?></td>
                                    <td class="text-right"><?= number_format($value_w5, 2);?></td>
                                    <td class="text-right"><?= number_format($qty_w6, 0);?></td>
                                    <td class="text-right"><?= number_format($value_w6, 2);?></td>
                                    <td class="text-right"><?= number_format($qty_total, 0);?></td>
                                    <td class="text-right"><?= number_format($value_total, 2);?></td>
                                    <td class="text-right"><?= number_format($qty_target, 0);?></td>
                                    <td class="text-right"><?= number_format($value_target, 2);?></td>

                                    <?php
                                      if($qty_target != 0 and $value_index != 0)
                                      {
                                        $qty_index = ($qty_total/($qty_target) ?: 0)*100;
                                        $value_index = ($value_total/($value_target) ?: 0)*100;
                                      }
                                      else
                                      {
                                        $qty_index = 0;
                                        $value_index = 0;
                                      }
                                    ?>
                                    
                                    <td class="text-right"><?= number_format($qty_index, 0);?></td>
                                    <td class="text-right"><?= number_format($value_index, 0);?></td>
                                    <td class="text-right"><?= number_format($qty_ending, 0);?></td>
                                    <td class="text-right"><?= number_format($value_ending, 2);?></td>
                                    <td class="text-right"><?= number_format($qty_transit, 0);?></td>
                                    <td class="text-right"><?= number_format($value_transit, 2);?></td>

                                    <?php $qty_total_ending = $qty_ending + $qty_transit; ?>
                                    <?php $value_total_ending = $value_ending + $value_transit; ?>

                                    <td class="text-right"><?= number_format($qty_total_ending, 0);?></td>
                                    <td class="text-right"><?= number_format($value_total_ending, 2);?></td>

                                    <td class="text-right"><?= number_format($qty_w1, 0);?></td>
                                    <td class="text-right"><?= number_format($qty_w1 + $qty_w2, 0);?></td>
                                    <td class="text-right"><?= number_format($qty_w1 + $qty_w2 + $qty_w3, 0);?></td>
                                    <td class="text-right"><?= number_format($qty_w1 + $qty_w2 + $qty_w3 + $qty_w4, 0);?></td>
                                    <td class="text-right"><?= number_format($qty_w1 + $qty_w2 + $qty_w3 + $qty_w4 + $qty_w5, 0);?></td>
                                    <td class="text-right"><?= number_format($qty_w1 + $qty_w2 + $qty_w3 + $qty_w4 + $qty_w5 + $qty_w6, 0);?></td>
                                    
                                </tr>

                                <tr class="table-danger" style="font-weight:bold">
                                    <td></td>
                                    <td><?= $principal;?></td>
                                    <td></td>
                                    <td></td>
                                    <td class="text-center">TOTAL <?= $principal;?></td>
                                    <td></td>
                                    <td class="text-right"><?= number_format($sub_qty_w1, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_value_w1, 2);?></td>
                                    <td class="text-right"><?= number_format($sub_qty_w2, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_value_w2, 2);?></td>
                                    <td class="text-right"><?= number_format($sub_qty_w3, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_value_w3, 2);?></td>
                                    <td class="text-right"><?= number_format($sub_qty_w4, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_value_w4, 2);?></td>
                                    <td class="text-right"><?= number_format($sub_qty_w5, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_value_w5, 2);?></td>
                                    <td class="text-right"><?= number_format($sub_qty_w6, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_value_w6, 2);?></td>
                                    <td class="text-right"><?= number_format($sub_qty_total, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_value_total, 2);?></td>
                                    <td class="text-right"><?= number_format($sub_qty_target, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_value_target, 2);?></td>

                                    <?php
                                      if($sub_qty_target != 0 and $sub_value_target != 0)
                                      {
                                        $sub_qty_index = ($sub_qty_total/($sub_qty_target) ?: 0)*100;
                                        $sub_value_index = ($sub_value_total/($sub_value_target) ?: 0)*100;
                                      }
                                      else
                                      {
                                        $sub_qty_index = 0;
                                        $sub_value_index = 0;
                                      }
                                    ?>

                                    <td class="text-right"><?= number_format($sub_qty_index, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_value_index, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_qty_ending, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_value_ending, 2);?></td>
                                    <td class="text-right"><?= number_format($sub_qty_transit, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_value_transit, 2);?></td>

                                    <?php $sub_qty_total_ending = $sub_qty_ending + $sub_qty_transit; ?>
                                    <?php $sub_value_total_ending = $sub_value_ending + $sub_value_transit; ?>

                                    <td class="text-right"><?= number_format($sub_qty_total_ending, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_value_total_ending, 2);?></td>

                                    <td class="text-right"><?= number_format($sub_qty_w1, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_qty_w1 + $sub_qty_w2, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_qty_w1 + $sub_qty_w2 + $sub_qty_w3, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_qty_w1 + $sub_qty_w2 + $sub_qty_w3 + $sub_qty_w4, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_qty_w1 + $sub_qty_w2 + $sub_qty_w3 + $sub_qty_w4 + $sub_qty_w5, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_qty_w1 + $sub_qty_w2 + $sub_qty_w3 + $sub_qty_w4 + $sub_qty_w5 + $sub_qty_w6, 0);?></td>

                                </tr>

                                <tr class="table-danger" style="font-weight:bold">
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td class="text-center">GRAND TOTAL</td>
                                    <td></td>
                                    <td class="text-right"><?= number_format($total_qty_w1, 0);?></td>
                                    <td class="text-right"><?= number_format($total_value_w1, 2);?></td>
                                    <td class="text-right"><?= number_format($total_qty_w2, 0);?></td>
                                    <td class="text-right"><?= number_format($total_value_w2, 2);?></td>
                                    <td class="text-right"><?= number_format($total_qty_w3, 0);?></td>
                                    <td class="text-right"><?= number_format($total_value_w3, 2);?></td>
                                    <td class="text-right"><?= number_format($total_qty_w4, 0);?></td>
                                    <td class="text-right"><?= number_format($total_value_w4, 2);?></td>
                                    <td class="text-right"><?= number_format($total_qty_w5, 0);?></td>
                                    <td class="text-right"><?= number_format($total_value_w5, 2);?></td>
                                    <td class="text-right"><?= number_format($total_qty_w6, 0);?></td>
                                    <td class="text-right"><?= number_format($total_value_w6, 2);?></td>
                                    <td class="text-right"><?= number_format($total_qty_total, 0);?></td>
                                    <td class="text-right"><?= number_format($total_value_total, 2);?></td>
                                    <td class="text-right"><?= number_format($total_qty_target, 0);?></td>
                                    <td class="text-right"><?= number_format($total_value_target, 2);?></td>

                                    <?php
                                      if($total_qty_target != 0 and $total_value_target != 0)
                                      {
                                        $total_qty_index = ($total_qty_total/($total_qty_target) ?: 0)*100;
                                        $total_value_index = ($total_value_total/($total_value_target) ?: 0)*100;
                                      }
                                      else
                                      {
                                        $total_qty_index = 0;
                                        $total_value_index = 0;
                                      }
                                    ?>                              

                                    <td class="text-right"><?= number_format($total_qty_index, 0);?></td>
                                    <td class="text-right"><?= number_format($total_value_index, 0);?></td>
                                    <td class="text-right"><?= number_format($total_qty_ending, 0);?></td>
                                    <td class="text-right"><?= number_format($total_value_ending, 2);?></td>
                                    <td class="text-right"><?= number_format($total_qty_transit, 0);?></td>
                                    <td class="text-right"><?= number_format($total_value_transit, 2);?></td>

                                    <?php $total_qty_total_ending = $total_qty_ending + $total_qty_transit; ?>
                                    <?php $total_value_total_ending = $total_value_ending + $total_value_transit; ?>

                                    <td class="text-right"><?= number_format($total_qty_total_ending, 0);?></td>
                                    <td class="text-right"><?= number_format($total_value_total_ending, 2);?></td>

                                    <td class="text-right"><?= number_format($total_qty_w1, 0);?></td>
                                    <td class="text-right"><?= number_format($total_qty_w1 + $total_qty_w2, 0);?></td>
                                    <td class="text-right"><?= number_format($total_qty_w1 + $total_qty_w2 + $total_qty_w3, 0);?></td>
                                    <td class="text-right"><?= number_format($total_qty_w1 + $total_qty_w2 + $total_qty_w3 + $total_qty_w4, 0);?></td>
                                    <td class="text-right"><?= number_format($total_qty_w1 + $total_qty_w2 + $total_qty_w3 + $total_qty_w4 + $total_qty_w5, 0);?></td>
                                    <td class="text-right"><?= number_format($total_qty_w1 + $total_qty_w2 + $total_qty_w3 + $total_qty_w4 + $total_qty_w5 + $total_qty_w6, 0);?></td>
                                </tr>

                            </tbody>
                          </table>

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
  <!-- /.content-wrapper -->

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
                        $('#dt_area').html(data);
                    }
                }
            );
            return false;
        });
        
    });
</script>