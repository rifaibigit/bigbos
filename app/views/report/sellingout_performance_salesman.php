  
    <!-- <div class="preloader">
        <div class="loading">
            <div class="spinner-border" role="status">
	            <span class="sr-only">Loading...</span>
            </div>
        </div>
    </div> -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Report Selling Out - Performance (by Salesman)</h1> 
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
        <!-- <div class="card-header">
          
        </div> -->

        <div class="card-body"> 

            <!-- <div class="preloader">
                <div class="loading">
                    <div class="spinner-border" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
            </div> -->

            <form action="<?= base_url; ?>/Report/sellingout_performance_salesman" method="post">
                <div class="row">
                    <div class="col-md-12">
                      <div class="input-group mb-3">

                        <?php

                        if(isset($data))
                        {
                            $region = $data['by_region'];
                            $area = $data['by_area'];
                            $island = $data['by_island'];

                        }else
                        {
                            $region = "By Region";
                            $area = "By Area";
                            $island = "By Island";
                        }

                        ?>
                          
                          <div>
                            <select class="mdb-select md-form form-control" title="By Island" name="by_island" id="dt_island" style="margin-left : 10px;">
                              <!-- <?php
                                if ($_SESSION['area'] == 'ALL')
                                {
                                  echo '<option value="">By Island</option>';
                                }else 
                              ?> -->
                              <option value="">By Island</option>
                                  <?php $no=1; ?>
                                  <?php foreach ($data['island'] as $row) :?>
                                        <option <?php if( $island==$row['island']){echo "selected"; } ?> value="<?= $row['island'];?>"><b><?= $row['island'];?></b></option>
                                  <?php $no++; endforeach; ?>
                            </select>
                          </div>
                          <div style="margin-left : 5px;">
                            <select class="mdb-select md-form form-control" title="By Region" name="by_region" id="dt_region" style="margin-left : 10px;">
                              <!-- <?php
                                if ($_SESSION['area'] == 'ALL')
                                {
                                  echo '<option value="">By Region</option>';
                                }else 
                              ?> -->
                              <option value="">By Region</option>
                                  <?php $no=1; ?>
                                  <?php foreach ($data['region'] as $row) :?>
                                        <option <?php if( $region==$row['region']){echo "selected"; } ?> value="<?= $row['region'];?>"><b><?= $row['region'];?></b></option>
                                  <?php $no++; endforeach; ?>
                            </select>
                          </div>
                          <div style="margin-left : 5px;">
                            <select class="mdb-select md-form form-control" title="By Area" name="by_area" id="dt_area" style="margin-left : 10px;">
                              <!-- <?php
                                if ($_SESSION['area'] == 'ALL')
                                {
                                  echo '<option value="">By Area</option>';
                                }else 
                              ?> -->
                                <option value="">By Area</option>
                                    <?php $no=1; ?>
                                    <?php foreach ($data['area'] as $row) :?>
                                            <option <?php if( $area==$row['area']){echo "selected"; } ?> value="<?= $row['area'];?>"><b><?= $row['area'];?></b></option>
                                    <?php $no++; endforeach; ?>
                            </select>
                          </div>
                          <div style="margin-left : 5px;">
                            <button class="btn btn-outline-primary" type="submit" style="margin-left : 10px;">Go!</button>
                            <a class="btn btn-outline-secondary" href="<?= base_url; ?>/Report/sellingout_qty">Reset</a>
                        </div>
                      </div>

                        <!-- <div id="hasil_sale_out"></div> -->
                        <div class="table-responsive-sm text-small">
                          <table id="sale_out_salesman" class="table table-bordered table-sm" align="left" style="font-size:70%; border: 1px solid black;">
                          <thead class="table-warning">
                              <tr>
                                <!-- <th rowspan="2" class="text-center" style="width: 5px; vertical-align: middle;">#</th> -->
                                <th rowspan="2" class="text-center" style="width: 225px; vertical-align: middle;">Salesman</th>
                                <th rowspan="2" class="text-center" style="width: 260px; vertical-align: middle;">Outlet</th>
                                <th rowspan="2" class="text-center" style="width: 230px; vertical-align: middle;">Item Name</th>
                                <th colspan="2" class="text-center">January</th>
                                <th colspan="2" class="text-center">February</th>
                                <th colspan="2" class="text-center">March</th>
                                <th colspan="2" class="text-center">April</th>
                                <th colspan="2" class="text-center">May</th>
                                <th colspan="2" class="text-center">June</th>
                                <th colspan="2" class="text-center">July</th>
                                <th colspan="2" class="text-center">August</th>
                                <th colspan="2" class="text-center">September</th>
                                <th colspan="2" class="text-center">October</th>
                                <th colspan="2" class="text-center">November</th>
                                <th colspan="2" class="text-center">December</th>
                              </tr>                 
                              <tr>
                              <th class="text-center" style="width: 10px">Qty</th>
                                <th class="text-center" style="width: 30px">Value</th>
                                <th class="text-center" style="width: 10px">Qty</th>
                                <th class="text-center" style="width: 30px">Value</th>
                                <th class="text-center" style="width: 10px">Qty</th>
                                <th class="text-center" style="width: 30px">Value</th>
                                <th class="text-center" style="width: 10px">Qty</th>
                                <th class="text-center" style="width: 30px">Value</th>
                                <th class="text-center" style="width: 10px">Qty</th>
                                <th class="text-center" style="width: 30px">Value</th>
                                <th class="text-center" style="width: 10px">Qty</th>
                                <th class="text-center" style="width: 30px">Value</th>
                                <th class="text-center" style="width: 10px">Qty</th>
                                <th class="text-center" style="width: 30px">Value</th>
                                <th class="text-center" style="width: 10px">Qty</th>
                                <th class="text-center" style="width: 30px">Value</th>
                                <th class="text-center" style="width: 10px">Qty</th>
                                <th class="text-center" style="width: 30px">Value</th>
                                <th class="text-center" style="width: 10px">Qty</th>
                                <th class="text-center" style="width: 30px">Value</th>
                                <th class="text-center" style="width: 10px">Qty</th>
                                <th class="text-center" style="width: 30px">Value</th>
                                <th class="text-center" style="width: 10px">Qty</th>
                                <th class="text-center" style="width: 30px">Value</th>
                              </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $qty1 = 0;
                                    $qty2 = 0;
                                    $qty3 = 0;
                                    $qty4 = 0;
                                    $qty5 = 0;
                                    $qty6 = 0;
                                    $qty7 = 0;
                                    $qty8 = 0;
                                    $qty9 = 0;
                                    $qty10 = 0;
                                    $qty11 = 0;
                                    $qty12 = 0;

                                    $val1 = 0;
                                    $val2 = 0;
                                    $val3 = 0;
                                    $val4 = 0;
                                    $val5 = 0;
                                    $val6 = 0;
                                    $val7 = 0;
                                    $val8 = 0;
                                    $val9 = 0;
                                    $val10 = 0;
                                    $val11 = 0;
                                    $val12 = 0;

                                    $sub_qty1 = 0;
                                    $sub_qty2 = 0;
                                    $sub_qty3 = 0;
                                    $sub_qty4 = 0;
                                    $sub_qty5 = 0;
                                    $sub_qty6 = 0;
                                    $sub_qty7 = 0;
                                    $sub_qty8 = 0;
                                    $sub_qty9 = 0;
                                    $sub_qty10 = 0;
                                    $sub_qty11 = 0;
                                    $sub_qty12 = 0;

                                    $sub_val1 = 0;
                                    $sub_val2 = 0;
                                    $sub_val3 = 0;
                                    $sub_val4 = 0;
                                    $sub_val5 = 0;
                                    $sub_val6 = 0;
                                    $sub_val7 = 0;
                                    $sub_val8 = 0;
                                    $sub_val9 = 0;
                                    $sub_val10 = 0;
                                    $sub_val11 = 0;
                                    $sub_val12 = 0;

                                    $total_qty1 = 0;
                                    $total_qty2 = 0;
                                    $total_qty3 = 0;
                                    $total_qty4 = 0;
                                    $total_qty5 = 0;
                                    $total_qty6 = 0;
                                    $total_qty7 = 0;
                                    $total_qty8 = 0;
                                    $total_qty9 = 0;
                                    $total_qty10 = 0;
                                    $total_qty11 = 0;
                                    $total_qty12 = 0;

                                    $total_val1 = 0;
                                    $total_val2 = 0;
                                    $total_val3 = 0;
                                    $total_val4 = 0;
                                    $total_val5 = 0;
                                    $total_val6 = 0;
                                    $total_val7 = 0;
                                    $total_val8 = 0;
                                    $total_val9 = 0;
                                    $total_val10 = 0;
                                    $total_val11 = 0;
                                    $total_val12 = 0;

                                    $grandtotal_qty1 = 0;
                                    $grandtotal_qty2 = 0;
                                    $grandtotal_qty3 = 0;
                                    $grandtotal_qty4 = 0;
                                    $grandtotal_qty5 = 0;
                                    $grandtotal_qty6 = 0;
                                    $grandtotal_qty7 = 0;
                                    $grandtotal_qty8 = 0;
                                    $grandtotal_qty9 = 0;
                                    $grandtotal_qty10 = 0;
                                    $grandtotal_qty11 = 0;
                                    $grandtotal_qty12 = 0;

                                    $grandtotal_val1 = 0;
                                    $grandtotal_val2 = 0;
                                    $grandtotal_val3 = 0;
                                    $grandtotal_val4 = 0;
                                    $grandtotal_val5 = 0;
                                    $grandtotal_val6 = 0;
                                    $grandtotal_val7 = 0;
                                    $grandtotal_val8 = 0;
                                    $grandtotal_val9 = 0;
                                    $grandtotal_val10 = 0;
                                    $grandtotal_val11 = 0;
                                    $grandtotal_val12 = 0;

                                ?>
                                <?php $no=1; ?>
                                <?php $cust_name=''; ?>
                                <?php $salesman=''; ?>
                                <!-- D/E -->
                                <?php foreach ($data['sellingout_salesman_year'] as $row) :?>
                                    <?php
                                        if ($cust_name != $row['cust_name'] and $cust_name != '')
                                        {

                                            echo '<tr class="table-warning" style="font-weight:bold">';
                                                //echo '<td class="text-center"></td>';
                                                echo '<td class="text-center">--' .$salesman. '--</td>';
                                                echo '<td class="text-center">--' .$cust_name. '--</td>';
                                                echo '<td class="text-center">TOTAL</td>';
                                                echo '<td class="text-right">' .number_format($sub_qty1, 0). '</td>';
                                                echo '<td class="text-right">' .number_format($sub_val1, 2). '</td>';
                                                echo '<td class="text-right">' .number_format($sub_qty2, 0). '</td>';
                                                echo '<td class="text-right">' .number_format($sub_val2, 2). '</td>';
                                                echo '<td class="text-right">' .number_format($sub_qty3, 0). '</td>';
                                                echo '<td class="text-right">' .number_format($sub_val3, 2). '</td>';
                                                echo '<td class="text-right">' .number_format($sub_qty4, 0). '</td>';
                                                echo '<td class="text-right">' .number_format($sub_val4, 2). '</td>';
                                                echo '<td class="text-right">' .number_format($sub_qty5, 0). '</td>';
                                                echo '<td class="text-right">' .number_format($sub_val5, 2). '</td>';
                                                echo '<td class="text-right">' .number_format($sub_qty6, 0). '</td>';
                                                echo '<td class="text-right">' .number_format($sub_val6, 2). '</td>';
                                                echo '<td class="text-right">' .number_format($sub_qty7, 0). '</td>';
                                                echo '<td class="text-right">' .number_format($sub_val7, 2). '</td>';
                                                echo '<td class="text-right">' .number_format($sub_qty8, 0). '</td>';
                                                echo '<td class="text-right">' .number_format($sub_val8, 2). '</td>';
                                                echo '<td class="text-right">' .number_format($sub_qty9, 0). '</td>';
                                                echo '<td class="text-right">' .number_format($sub_val9, 2). '</td>';
                                                echo '<td class="text-right">' .number_format($sub_qty10, 0). '</td>';
                                                echo '<td class="text-right">' .number_format($sub_val10, 2). '</td>';
                                                echo '<td class="text-right">' .number_format($sub_qty11, 0). '</td>';
                                                echo '<td class="text-right">' .number_format($sub_val11, 2). '</td>';
                                                echo '<td class="text-right">' .number_format($sub_qty12, 0). '</td>';
                                                echo '<td class="text-right">' .number_format($sub_val12, 2). '</td>';
                                            echo '</tr>';

                                            $total_qty1 = $total_qty1 + $sub_qty1;
                                            $total_qty2 = $total_qty2 + $sub_qty2;
                                            $total_qty3 = $total_qty3 + $sub_qty3;
                                            $total_qty4 = $total_qty4 + $sub_qty4;
                                            $total_qty5 = $total_qty5 + $sub_qty5;
                                            $total_qty6 = $total_qty6 + $sub_qty6;
                                            $total_qty7 = $total_qty7 + $sub_qty7;
                                            $total_qty8 = $total_qty8 + $sub_qty8;
                                            $total_qty9 = $total_qty9 + $sub_qty9;
                                            $total_qty10 = $total_qty10 + $sub_qty10;
                                            $total_qty11 = $total_qty11 + $sub_qty11;
                                            $total_qty12 = $total_qty12 + $sub_qty12;

                                            $total_val1 = $total_val1 + $sub_val1;
                                            $total_val2 = $total_val2 + $sub_val2;
                                            $total_val3 = $total_val3 + $sub_val3;
                                            $total_val4 = $total_val4 + $sub_val4;
                                            $total_val5 = $total_val5 + $sub_val5;
                                            $total_val6 = $total_val6 + $sub_val6;
                                            $total_val7 = $total_val7 + $sub_val7;
                                            $total_val8 = $total_val8 + $sub_val8;
                                            $total_val9 = $total_val9 + $sub_val9;
                                            $total_val10 = $total_val10 + $sub_val10;
                                            $total_val11 = $total_val11 + $sub_val11;
                                            $total_val12 = $total_val12 + $sub_val12;

                                            $sub_qty1 = 0;
                                            $sub_qty2 = 0;
                                            $sub_qty3 = 0;
                                            $sub_qty4 = 0;
                                            $sub_qty5 = 0;
                                            $sub_qty6 = 0;
                                            $sub_qty7 = 0;
                                            $sub_qty8 = 0;
                                            $sub_qty9 = 0;
                                            $sub_qty10 = 0;
                                            $sub_qty11 = 0;
                                            $sub_qty12 = 0;

                                            $sub_val1 = 0;
                                            $sub_val2 = 0;
                                            $sub_val3 = 0;
                                            $sub_val4 = 0;
                                            $sub_val5 = 0;
                                            $sub_val6 = 0;
                                            $sub_val7 = 0;
                                            $sub_val8 = 0;
                                            $sub_val9 = 0;
                                            $sub_val10 = 0;
                                            $sub_val11 = 0;
                                            $sub_val12 = 0;

                                        }
                                    ?>

                                    <?php
                                        if ($salesman != $row['salesman'] and $salesman != '')
                                        {

                                            echo '<tr class="table-danger" style="font-weight:bold">';
                                                //echo '<td class="text-center"></td>';
                                                echo '<td class="text-center">..::' .$salesman. '::..</td>';
                                                echo '<td class="text-center">TOTAL</td>';
                                                echo '<td></td>';
                                                echo '<td class="text-right">' .number_format($total_qty1, 0). '</td>';
                                                echo '<td class="text-right">' .number_format($total_val1, 2). '</td>';
                                                echo '<td class="text-right">' .number_format($total_qty2, 0). '</td>';
                                                echo '<td class="text-right">' .number_format($total_val2, 2). '</td>';
                                                echo '<td class="text-right">' .number_format($total_qty3, 0). '</td>';
                                                echo '<td class="text-right">' .number_format($total_val3, 2). '</td>';
                                                echo '<td class="text-right">' .number_format($total_qty4, 0). '</td>';
                                                echo '<td class="text-right">' .number_format($total_val4, 2). '</td>';
                                                echo '<td class="text-right">' .number_format($total_qty5, 0). '</td>';
                                                echo '<td class="text-right">' .number_format($total_val5, 2). '</td>';
                                                echo '<td class="text-right">' .number_format($total_qty6, 0). '</td>';
                                                echo '<td class="text-right">' .number_format($total_val6, 2). '</td>';
                                                echo '<td class="text-right">' .number_format($total_qty7, 0). '</td>';
                                                echo '<td class="text-right">' .number_format($total_val7, 2). '</td>';
                                                echo '<td class="text-right">' .number_format($total_qty8, 0). '</td>';
                                                echo '<td class="text-right">' .number_format($total_val8, 2). '</td>';
                                                echo '<td class="text-right">' .number_format($total_qty9, 0). '</td>';
                                                echo '<td class="text-right">' .number_format($total_val9, 2). '</td>';
                                                echo '<td class="text-right">' .number_format($total_qty10, 0). '</td>';
                                                echo '<td class="text-right">' .number_format($total_val10, 2). '</td>';
                                                echo '<td class="text-right">' .number_format($total_qty11, 0). '</td>';
                                                echo '<td class="text-right">' .number_format($total_val11, 2). '</td>';
                                                echo '<td class="text-right">' .number_format($total_qty12, 0). '</td>';
                                                echo '<td class="text-right">' .number_format($total_val12, 2). '</td>';
                                            echo '</tr>';

                                            $grandtotal_qty1 = $grandtotal_qty1 + $total_qty1;
                                            $grandtotal_qty2 = $grandtotal_qty2 + $total_qty2;
                                            $grandtotal_qty3 = $grandtotal_qty3 + $total_qty3;
                                            $grandtotal_qty4 = $grandtotal_qty4 + $total_qty4;
                                            $grandtotal_qty5 = $grandtotal_qty5 + $total_qty5;
                                            $grandtotal_qty6 = $grandtotal_qty6 + $total_qty6;
                                            $grandtotal_qty7 = $grandtotal_qty7 + $total_qty7;
                                            $grandtotal_qty8 = $grandtotal_qty8 + $total_qty8;
                                            $grandtotal_qty9 = $grandtotal_qty9 + $total_qty9;
                                            $grandtotal_qty10 = $grandtotal_qty10 + $total_qty10;
                                            $grandtotal_qty11 = $grandtotal_qty11 + $total_qty11;
                                            $grandtotal_qty12 = $grandtotal_qty12 + $total_qty12;

                                            $grandtotal_val1 = $grandtotal_val1 + $total_val1;
                                            $grandtotal_val2 = $grandtotal_val2 + $total_val2;
                                            $grandtotal_val3 = $grandtotal_val3 + $total_val3;
                                            $grandtotal_val4 = $grandtotal_val4 + $total_val4;
                                            $grandtotal_val5 = $grandtotal_val5 + $total_val5;
                                            $grandtotal_val6 = $grandtotal_val6 + $total_val6;
                                            $grandtotal_val7 = $grandtotal_val7 + $total_val7;
                                            $grandtotal_val8 = $grandtotal_val8 + $total_val8;
                                            $grandtotal_val9 = $grandtotal_val9 + $total_val9;
                                            $grandtotal_val10 = $grandtotal_val10 + $total_val10;
                                            $grandtotal_val11 = $grandtotal_val11 + $total_val11;
                                            $grandtotal_val12 = $grandtotal_val12 + $total_val12;

                                            $total_qty1 = 0;
                                            $total_qty2 = 0;
                                            $total_qty3 = 0;
                                            $total_qty4 = 0;
                                            $total_qty5 = 0;
                                            $total_qty6 = 0;
                                            $total_qty7 = 0;
                                            $total_qty8 = 0;
                                            $total_qty9 = 0;
                                            $total_qty10 = 0;
                                            $total_qty11 = 0;
                                            $total_qty12 = 0;

                                            $total_val1 = 0;
                                            $total_val2 = 0;
                                            $total_val3 = 0;
                                            $total_val4 = 0;
                                            $total_val5 = 0;
                                            $total_val6 = 0;
                                            $total_val7 = 0;
                                            $total_val8 = 0;
                                            $total_val9 = 0;
                                            $total_val10 = 0;
                                            $total_val11 = 0;
                                            $total_val12 = 0;

                                        }
                                    ?>

                                <tr>
                                    <!-- <td class="text-center"></td> -->
                                    <td><?= $row['salesman'];?></td>
                                    <td><?= $row['cust_name'];?></td>
                                    <td><?= $row['item_name'];?></td>
                                    <td class="text-right"><?= number_format($row['qty_1'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_inc_1'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['qty_2'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_inc_2'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['qty_3'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_inc_3'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['qty_4'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_inc_4'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['qty_5'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_inc_5'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['qty_6'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_inc_6'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['qty_7'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_inc_7'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['qty_8'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_inc_8'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['qty_9'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_inc_9'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['qty_10'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_inc_10'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['qty_11'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_inc_11'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['qty_12'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_inc_12'], 2);?></td>
                                </tr>

                                <?php $cust_name = $row['cust_name'] ?>
                                <?php $salesman = $row['salesman'] ?>

                                <?php $qty1 += $row['qty_1']; ?>
                                <?php $qty2 += $row['qty_2']; ?>
                                <?php $qty3 += $row['qty_3']; ?>
                                <?php $qty4 += $row['qty_4']; ?>
                                <?php $qty5 += $row['qty_5']; ?>
                                <?php $qty6 += $row['qty_6']; ?>
                                <?php $qty7 += $row['qty_7']; ?>
                                <?php $qty8 += $row['qty_8']; ?>
                                <?php $qty9 += $row['qty_9']; ?>
                                <?php $qty10 += $row['qty_10']; ?>
                                <?php $qty11 += $row['qty_11']; ?>
                                <?php $qty12 += $row['qty_12']; ?>

                                <?php $sub_qty1 += $row['qty_1']; ?>
                                <?php $sub_qty2 += $row['qty_2']; ?>
                                <?php $sub_qty3 += $row['qty_3']; ?>
                                <?php $sub_qty4 += $row['qty_4']; ?>
                                <?php $sub_qty5 += $row['qty_5']; ?>
                                <?php $sub_qty6 += $row['qty_6']; ?>
                                <?php $sub_qty7 += $row['qty_7']; ?>
                                <?php $sub_qty8 += $row['qty_8']; ?>
                                <?php $sub_qty9 += $row['qty_9']; ?>
                                <?php $sub_qty10 += $row['qty_10']; ?>
                                <?php $sub_qty11 += $row['qty_11']; ?>
                                <?php $sub_qty12 += $row['qty_12']; ?>

                                <?php $val1 += $row['value_inc_1']; ?>
                                <?php $val2 += $row['value_inc_2']; ?>
                                <?php $val3 += $row['value_inc_3']; ?>
                                <?php $val4 += $row['value_inc_4']; ?>
                                <?php $val5 += $row['value_inc_5']; ?>
                                <?php $val6 += $row['value_inc_6']; ?>
                                <?php $val7 += $row['value_inc_7']; ?>
                                <?php $val8 += $row['value_inc_8']; ?>
                                <?php $val9 += $row['value_inc_9']; ?>
                                <?php $val10 += $row['value_inc_10']; ?>
                                <?php $val11 += $row['value_inc_11']; ?>
                                <?php $val12 += $row['value_inc_12']; ?>

                                <?php $sub_val1 += $row['value_inc_1']; ?>
                                <?php $sub_val2 += $row['value_inc_2']; ?>
                                <?php $sub_val3 += $row['value_inc_3']; ?>
                                <?php $sub_val4 += $row['value_inc_4']; ?>
                                <?php $sub_val5 += $row['value_inc_5']; ?>
                                <?php $sub_val6 += $row['value_inc_6']; ?>
                                <?php $sub_val7 += $row['value_inc_7']; ?>
                                <?php $sub_val8 += $row['value_inc_8']; ?>
                                <?php $sub_val9 += $row['value_inc_9']; ?>
                                <?php $sub_val10 += $row['value_inc_10']; ?>
                                <?php $sub_val11 += $row['value_inc_11']; ?>
                                <?php $sub_val12 += $row['value_inc_12']; ?>

                                <?php endforeach; ?>


                                <tr class="table-warning" style="font-weight:bold">
                                    <!-- <td class="text-center"></td> -->
                                    <td class="text-center">--<?= $salesman;?>--</td>
                                    <td class="text-center">--<?= $cust_name;?>--</td>
                                    <td class="text-center">TOTAL</td>
                                    <td class="text-right"><?= number_format($sub_qty1, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_val1, 2);?></td>
                                    <td class="text-right"><?= number_format($sub_qty2, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_val2, 2);?></td>
                                    <td class="text-right"><?= number_format($sub_qty3, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_val3, 2);?></td>
                                    <td class="text-right"><?= number_format($sub_qty4, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_val4, 2);?></td>
                                    <td class="text-right"><?= number_format($sub_qty5, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_val5, 2);?></td>
                                    <td class="text-right"><?= number_format($sub_qty6, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_val6, 2);?></td>
                                    <td class="text-right"><?= number_format($sub_qty7, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_val7, 2);?></td>
                                    <td class="text-right"><?= number_format($sub_qty8, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_val8, 2);?></td>
                                    <td class="text-right"><?= number_format($sub_qty9, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_val9, 2);?></td>
                                    <td class="text-right"><?= number_format($sub_qty10, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_val10, 2);?></td>
                                    <td class="text-right"><?= number_format($sub_qty11, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_val11, 2);?></td>
                                    <td class="text-right"><?= number_format($sub_qty12, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_val12, 2);?></td>
                                    
                                </tr>

                                <tr class="table-danger" style="font-weight:bold">
                                    <!-- <td class="text-center"></td> -->
                                    <td class="text-center">..::<?= $salesman;?>::..</td>
                                    <td class="text-center">TOTAL</td>
                                    <td></td>
                                    <td class="text-right"><?= number_format($total_qty1, 0);?></td>
                                    <td class="text-right"><?= number_format($total_val1, 2);?></td>
                                    <td class="text-right"><?= number_format($total_qty2, 0);?></td>
                                    <td class="text-right"><?= number_format($total_val2, 2);?></td>
                                    <td class="text-right"><?= number_format($total_qty3, 0);?></td>
                                    <td class="text-right"><?= number_format($total_val3, 2);?></td>
                                    <td class="text-right"><?= number_format($total_qty4, 0);?></td>
                                    <td class="text-right"><?= number_format($total_val4, 2);?></td>
                                    <td class="text-right"><?= number_format($total_qty5, 0);?></td>
                                    <td class="text-right"><?= number_format($total_val5, 2);?></td>
                                    <td class="text-right"><?= number_format($total_qty6, 0);?></td>
                                    <td class="text-right"><?= number_format($total_val6, 2);?></td>
                                    <td class="text-right"><?= number_format($total_qty7, 0);?></td>
                                    <td class="text-right"><?= number_format($total_val7, 2);?></td>
                                    <td class="text-right"><?= number_format($total_qty8, 0);?></td>
                                    <td class="text-right"><?= number_format($total_val8, 2);?></td>
                                    <td class="text-right"><?= number_format($total_qty9, 0);?></td>
                                    <td class="text-right"><?= number_format($total_val9, 2);?></td>
                                    <td class="text-right"><?= number_format($total_qty10, 0);?></td>
                                    <td class="text-right"><?= number_format($total_val10, 2);?></td>
                                    <td class="text-right"><?= number_format($total_qty11, 0);?></td>
                                    <td class="text-right"><?= number_format($total_val11, 2);?></td>
                                    <td class="text-right"><?= number_format($total_qty12, 0);?></td>
                                    <td class="text-right"><?= number_format($total_val12, 2);?></td>
                                    
                                </tr>


                                <tr class="table-danger" style="font-weight:bold">
                                    <!-- <td class="text-center"></td> -->
                                    <td></td>
                                    <td class="text-center">GRAND TOTAL</td>
                                    <td></td>
                                    <td class="text-right"><?= number_format($grandtotal_qty1, 0);?></td>
                                    <td class="text-right"><?= number_format($grandtotal_val1, 2);?></td>
                                    <td class="text-right"><?= number_format($grandtotal_qty2, 0);?></td>
                                    <td class="text-right"><?= number_format($grandtotal_val2, 2);?></td>
                                    <td class="text-right"><?= number_format($grandtotal_qty3, 0);?></td>
                                    <td class="text-right"><?= number_format($grandtotal_val3, 2);?></td>
                                    <td class="text-right"><?= number_format($grandtotal_qty4, 0);?></td>
                                    <td class="text-right"><?= number_format($grandtotal_val4, 2);?></td>
                                    <td class="text-right"><?= number_format($grandtotal_qty5, 0);?></td>
                                    <td class="text-right"><?= number_format($grandtotal_val5, 2);?></td>
                                    <td class="text-right"><?= number_format($grandtotal_qty6, 0);?></td>
                                    <td class="text-right"><?= number_format($grandtotal_val6, 2);?></td>
                                    <td class="text-right"><?= number_format($grandtotal_qty7, 0);?></td>
                                    <td class="text-right"><?= number_format($grandtotal_val7, 2);?></td>
                                    <td class="text-right"><?= number_format($grandtotal_qty8, 0);?></td>
                                    <td class="text-right"><?= number_format($grandtotal_val8, 2);?></td>
                                    <td class="text-right"><?= number_format($grandtotal_qty9, 0);?></td>
                                    <td class="text-right"><?= number_format($grandtotal_val9, 2);?></td>
                                    <td class="text-right"><?= number_format($grandtotal_qty10, 0);?></td>
                                    <td class="text-right"><?= number_format($grandtotal_val10, 2);?></td>
                                    <td class="text-right"><?= number_format($grandtotal_qty11, 0);?></td>
                                    <td class="text-right"><?= number_format($grandtotal_val11, 2);?></td>
                                    <td class="text-right"><?= number_format($grandtotal_qty12, 0);?></td>
                                    <td class="text-right"><?= number_format($grandtotal_val12, 2);?></td>
                                    
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