  
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
            <h1>Report Selling Out - Value</h1> 
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

            <form action="<?= base_url; ?>/Report/sellingout_performance" method="post">
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
                            <select class="mdb-select md-form form-control" title="By Area" name="by_area" style="margin-left : 10px;">
                                <option value="">By Area</option>
                                    <?php $no=1; ?>
                                    <?php foreach ($data['area'] as $row) :?>
                                            <option <?php if( $area==$row['area']){echo "selected"; } ?> value="<?= $row['area'];?>"><b><?= $row['area'];?></b></option>
                                    <?php $no++; endforeach; ?>
                            </select>
                          </div>
                          <div style="margin-left : 5px;">
                            <select class="mdb-select md-form form-control" title="By Region" name="by_region" style="margin-left : 10px;">
                              <option value="">By Region</option>
                                  <?php $no=1; ?>
                                  <?php foreach ($data['region'] as $row) :?>
                                        <option <?php if( $region==$row['region']){echo "selected"; } ?> value="<?= $row['region'];?>"><b><?= $row['region'];?></b></option>
                                  <?php $no++; endforeach; ?>
                            </select>
                          </div>
                          <div style="margin-left : 5px;">
                            <select class="mdb-select md-form form-control" title="By Island" name="by_island" style="margin-left : 10px;">
                              <option value="">By Island</option>
                                  <?php $no=1; ?>
                                  <?php foreach ($data['island'] as $row) :?>
                                        <option <?php if( $island==$row['island']){echo "selected"; } ?> value="<?= $row['island'];?>"><b><?= $row['island'];?></b></option>
                                  <?php $no++; endforeach; ?>
                            </select>
                          </div>
                          <div style="margin-left : 5px;">
                            <button class="btn btn-outline-primary" type="submit" style="margin-left : 10px;">Go!</button>
                            <a class="btn btn-outline-secondary" href="<?= base_url; ?>/Report/sellingout_performance">Reset</a>
                        </div>
                      </div>


                        <!-- <div id="hasil_sale_out"></div> -->
                        <div class="table-responsive-sm text-small">
                          <table id="sale_out_performance" class="table table-bordered table-sm order-column nowrap" align="left" style="font-size:70%; border: 1px solid black;">
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
                                    $DE_val_jan = 0;
                                    $DE_val_feb = 0;
                                    $DE_val_mar = 0;
                                    $DE_val_q1 = 0;
                                    $DE_val_apr = 0;
                                    $DE_val_mei = 0;
                                    $DE_val_jun = 0;
                                    $DE_val_q2 = 0;
                                    $DE_val_jul = 0;
                                    $DE_val_agu = 0;
                                    $DE_val_sep = 0;
                                    $DE_val_q3 = 0;
                                    $DE_val_okt = 0;
                                    $DE_val_nop = 0;
                                    $DE_val_des = 0;
                                    $DE_val_q4 = 0;

                                    $principal = '';
                                    $group_sku = '';

                                ?>
                                <?php $no=1; ?>
                                <!-- D/E -->
                                <?php foreach ($data['sellingout_DE'] as $row) :?>
                                <tr>
                                    <td class="text-center"><?= $no; ?></td>
                                    <td><?= $row['principal'];?></td>
                                    <td><?= $row['item_group'];?></td>
                                    <td><?= $row['item_code'];?></td>
                                    <td><?= $row['item_name'];?></td>
                                    <td class="text-center"><?= $row['unit'];?></td>
                                    <td class="text-right"><?= number_format($row['value_jan'], 2);?></td>                          
                                    <td class="text-right"><?= number_format($row['value_feb'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['value_mar'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['value_apr'], 2);?></td>                                  
                                    <td class="text-right"><?= number_format($row['value_mei'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['value_jun'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['value_jul'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['value_agu'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['value_sep'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['value_okt'], 2);?></td>                                   
                                    <td class="text-right"><?= number_format($row['value_nop'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['value_des'], 2);?></td>

                                    <?php $val_year = $row['value_jan'] + $row['value_feb'] + $row['value_mar'] + $row['value_apr'] + $row['value_mei'] + $row['value_jun'] + $row['value_jul'] + $row['value_agu'] + $row['value_sep'] + $row['value_okt'] + $row['value_nop'] + $row['value_des']; ?>
                                    <td class="text-right"><?= number_format($val_year, 2);?></td>
                                    
                                </tr>
                                
                                
                                <!-- sub val -->
                                <?php $DE_val_jan += $row['value_jan']; ?>
                                <?php $DE_val_feb += $row['value_feb']; ?>
                                <?php $DE_val_mar += $row['value_mar']; ?>
                                <?php $DE_val_q1 += $row['value_q1']; ?>

                                <?php $DE_val_apr += $row['value_apr']; ?>
                                <?php $DE_val_mei += $row['value_mei']; ?>
                                <?php $DE_val_jun += $row['value_jun']; ?>
                                <?php $DE_val_q2 += $row['value_q2']; ?>

                                <?php $DE_val_jul += $row['value_jul']; ?>
                                <?php $DE_val_agu += $row['value_agu']; ?>
                                <?php $DE_val_sep += $row['value_sep']; ?>
                                <?php $DE_val_q3 += $row['value_q3']; ?>

                                <?php $DE_val_okt += $row['value_okt']; ?>
                                <?php $DE_val_nop += $row['value_nop']; ?>
                                <?php $DE_val_des += $row['value_des']; ?>
                                <?php $DE_val_q4 += $row['value_q4']; ?>

                                <?php $principal = $row['principal']; ?>
                                <?php $group_sku = $row['item_group']; ?>
                                <?php $no++; endforeach; ?>

                                <?php $DE_val_year = $DE_val_jan + $DE_val_feb + $DE_val_mar + $DE_val_apr + $DE_val_mei + $DE_val_jun + $DE_val_jul + $DE_val_agu + $DE_val_sep + $DE_val_okt + $DE_val_nop + $DE_val_des;?>

                                
                                <tr class="table-warning" style="font-weight:bold">
                                    <td></td>
                                    <td><?= $principal;?></td>
                                    <td><?= $group_sku;?></td>
                                    <td></td>
                                    <td class="text-center">Sub Total <?= $group_sku;?></td>
                                    <td></td>
                                    <td class="text-right"><?= number_format($DE_val_jan, 2);?></td>
                                    <td class="text-right"><?= number_format($DE_val_feb, 2);?></td>
                                    <td class="text-right"><?= number_format($DE_val_mar, 2);?></td>
                                    <td class="text-right"><?= number_format($DE_val_apr, 2);?></td>
                                    <td class="text-right"><?= number_format($DE_val_mei, 2);?></td>
                                    <td class="text-right"><?= number_format($DE_val_jun, 2);?></td>
                                    <td class="text-right"><?= number_format($DE_val_jul, 2);?></td>
                                    <td class="text-right"><?= number_format($DE_val_agu, 2);?></td>
                                    <td class="text-right"><?= number_format($DE_val_sep, 2);?></td>
                                    <td class="text-right"><?= number_format($DE_val_okt, 2);?></td>
                                    <td class="text-right"><?= number_format($DE_val_nop, 2);?></td>
                                    <td class="text-right"><?= number_format($DE_val_des, 2);?></td>
                                    <td class="text-right"><?= number_format($DE_val_year, 2);?></td>

                                </tr>

                                <!-- Disposables -->
                                <?php
                                    
                                    $DP_val_jan = 0;
                                    $DP_val_feb = 0;
                                    $DP_val_mar = 0;
                                    $DP_val_q1 = 0;
                                    $DP_val_apr = 0;
                                    $DP_val_mei = 0;
                                    $DP_val_jun = 0;
                                    $DP_val_q2 = 0;
                                    $DP_val_jul = 0;
                                    $DP_val_agu = 0;
                                    $DP_val_sep = 0;
                                    $DP_val_q3 = 0;
                                    $DP_val_okt = 0;
                                    $DP_val_nop = 0;
                                    $DP_val_des = 0;
                                    $DP_val_q4 = 0;

                                ?>
                                <?php foreach ($data['sellingout_Disposables'] as $row) :?>
                                <tr>
                                    <td class="text-center"><?= $no; ?></td>
                                    <td><?= $row['principal'];?></td>
                                    <td><?= $row['item_group'];?></td>
                                    <td><?= $row['item_code'];?></td>
                                    <td><?= $row['item_name'];?></td>
                                    <td class="text-center"><?= $row['unit'];?></td>
                                    <td class="text-right"><?= number_format($row['value_jan'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['value_feb'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['value_mar'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['value_apr'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['value_mei'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['value_jun'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['value_jul'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['value_agu'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['value_sep'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['value_okt'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['value_nop'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['value_des'], 2);?></td>
                                    

                                    <?php $qty_year = $row['qty_jan'] + $row['qty_feb'] + $row['qty_mar'] + $row['qty_apr'] + $row['qty_mei'] + $row['qty_jun'] + $row['qty_jul'] + $row['qty_agu'] + $row['qty_sep'] + $row['qty_okt'] + $row['qty_nop'] + $row['qty_des']; ?>
                                    <?php $target_qty_year = $row['target_qty_jan'] + $row['target_qty_feb'] + $row['target_qty_mar'] + $row['target_qty_apr'] + $row['target_qty_mei'] + $row['target_qty_jun'] + $row['target_qty_jul'] + $row['target_qty_agu'] + $row['target_qty_sep'] + $row['target_qty_okt'] + $row['target_qty_nop'] + $row['target_qty_des']; ?>
                                    <?php $idx_qty_year = ($qty_year/($target_qty_year ?: 1))*100; ?>
                                    <?php $val_year = $row['value_jan'] + $row['value_feb'] + $row['value_mar'] + $row['value_apr'] + $row['value_mei'] + $row['value_jun'] + $row['value_jul'] + $row['value_agu'] + $row['value_sep'] + $row['value_okt'] + $row['value_nop'] + $row['value_des']; ?>
                                    <?php $target_val_year = $row['target_val_jan'] + $row['target_val_feb'] + $row['target_val_mar'] + $row['target_val_apr'] + $row['target_val_mei'] + $row['target_val_jun'] + $row['target_val_jul'] + $row['target_val_agu'] + $row['target_val_sep'] + $row['target_val_okt'] + $row['target_val_nop'] + $row['target_val_des']; ?>
                                    <?php $idx_val_year = ($val_year/($target_val_year ?: 1))*100; ?>
                                    <?php $qty_avg = $qty_year / 12; ?>
                                    <?php $target_qty_avg = $target_qty_year / 12; ?>
                                    <?php $idx_qty_avg = ($qty_avg/($target_qty_avg ?: 1))*100; ?>
                                    <?php $val_avg = $val_year / 12; ?>
                                    <?php $target_val_avg = $target_val_year / 12; ?>
                                    <?php $idx_val_avg = ($val_avg/($target_val_avg ?: 1))*100; ?>

                                    <td class="text-right"><?= number_format($val_year, 2);?></td>
                                </tr>
                                
                                <!-- sub val -->
                                <?php $DP_val_jan += $row['value_jan']; ?>
                                <?php $DP_val_feb += $row['value_feb']; ?>
                                <?php $DP_val_mar += $row['value_mar']; ?>
                                <?php $DP_val_q1 += $row['value_q1']; ?>

                                <?php $DP_val_apr += $row['value_apr']; ?>
                                <?php $DP_val_mei += $row['value_mei']; ?>
                                <?php $DP_val_jun += $row['value_jun']; ?>
                                <?php $DP_val_q2 += $row['value_q2']; ?>

                                <?php $DP_val_jul += $row['value_jul']; ?>
                                <?php $DP_val_agu += $row['value_agu']; ?>
                                <?php $DP_val_sep += $row['value_sep']; ?>
                                <?php $DP_val_q3 += $row['value_q3']; ?>

                                <?php $DP_val_okt += $row['value_okt']; ?>
                                <?php $DP_val_nop += $row['value_nop']; ?>
                                <?php $DP_val_des += $row['value_des']; ?>
                                <?php $DP_val_q4 += $row['value_q4']; ?>
                                
                                <?php $principal = $row['principal']; ?>
                                <?php $group_sku = $row['item_group']; ?>
                                <?php $no++; endforeach; ?>

                                <?php $DP_val_year = $DP_val_jan + $DP_val_feb + $DP_val_mar + $DP_val_apr + $DP_val_mei + $DP_val_jun + $DP_val_jul + $DP_val_agu + $DP_val_sep + $DP_val_okt + $DP_val_nop + $DP_val_des;?>
                                
                                <tr class="table-warning" style="font-weight:bold">
                                    <td></td>
                                    <td><?= $principal;?></td>
                                    <td><?= $group_sku;?></td>
                                    <td></td>
                                    <td class="text-center">Sub Total <?= $group_sku;?></td>
                                    <td></td>
                                    <td class="text-right"><?= number_format($DP_val_jan, 2);?></td>
                                    <td class="text-right"><?= number_format($DP_val_feb, 2);?></td>
                                    <td class="text-right"><?= number_format($DP_val_mar, 2);?></td>
                                    <td class="text-right"><?= number_format($DP_val_apr, 2);?></td>
                                    <td class="text-right"><?= number_format($DP_val_mei, 2);?></td>
                                    <td class="text-right"><?= number_format($DP_val_jun, 2);?></td>
                                    <td class="text-right"><?= number_format($DP_val_jul, 2);?></td>
                                    <td class="text-right"><?= number_format($DP_val_agu, 2);?></td>
                                    <td class="text-right"><?= number_format($DP_val_sep, 2);?></td>
                                    <td class="text-right"><?= number_format($DP_val_okt, 2);?></td>
                                    <td class="text-right"><?= number_format($DP_val_nop, 2);?></td>
                                    <td class="text-right"><?= number_format($DP_val_des, 2);?></td>
                                    <td class="text-right"><?= number_format($DP_val_year, 2);?></td>
                                </tr>

                                <!-- System Cartridges -->
                                <?php

                                    $SC_val_jan = 0;
                                    $SC_val_feb = 0;
                                    $SC_val_mar = 0;
                                    $SC_val_q1 = 0;
                                    $SC_val_apr = 0;
                                    $SC_val_mei = 0;
                                    $SC_val_jun = 0;
                                    $SC_val_q2 = 0;
                                    $SC_val_jul = 0;
                                    $SC_val_agu = 0;
                                    $SC_val_sep = 0;
                                    $SC_val_q3 = 0;
                                    $SC_val_okt = 0;
                                    $SC_val_nop = 0;
                                    $SC_val_des = 0;
                                    $SC_val_q4 = 0;

                                ?>
                                <?php foreach ($data['sellingout_SC'] as $row) :?>
                                <tr>
                                    <td class="text-center"><?= $no; ?></td>
                                    <td><?= $row['principal'];?></td>
                                    <td><?= $row['item_group'];?></td>
                                    <td><?= $row['item_code'];?></td>
                                    <td><?= $row['item_name'];?></td>
                                    <td class="text-center"><?= $row['unit'];?></td>
                                    <td class="text-right"><?= number_format($row['value_jan'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['value_feb'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['value_mar'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['value_apr'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['value_mei'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['value_jun'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['value_jul'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['value_agu'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['value_sep'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['value_okt'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['value_nop'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['value_des'], 2);?></td>

                                    <?php $qty_year = $row['qty_jan'] + $row['qty_feb'] + $row['qty_mar'] + $row['qty_apr'] + $row['qty_mei'] + $row['qty_jun'] + $row['qty_jul'] + $row['qty_agu'] + $row['qty_sep'] + $row['qty_okt'] + $row['qty_nop'] + $row['qty_des']; ?>
                                    <?php $target_qty_year = $row['target_qty_jan'] + $row['target_qty_feb'] + $row['target_qty_mar'] + $row['target_qty_apr'] + $row['target_qty_mei'] + $row['target_qty_jun'] + $row['target_qty_jul'] + $row['target_qty_agu'] + $row['target_qty_sep'] + $row['target_qty_okt'] + $row['target_qty_nop'] + $row['target_qty_des']; ?>
                                    <?php $idx_qty_year = ($qty_year/($target_qty_year ?: 1))*100; ?>
                                    <?php $val_year = $row['value_jan'] + $row['value_feb'] + $row['value_mar'] + $row['value_apr'] + $row['value_mei'] + $row['value_jun'] + $row['value_jul'] + $row['value_agu'] + $row['value_sep'] + $row['value_okt'] + $row['value_nop'] + $row['value_des']; ?>
                                    <?php $target_val_year = $row['target_val_jan'] + $row['target_val_feb'] + $row['target_val_mar'] + $row['target_val_apr'] + $row['target_val_mei'] + $row['target_val_jun'] + $row['target_val_jul'] + $row['target_val_agu'] + $row['target_val_sep'] + $row['target_val_okt'] + $row['target_val_nop'] + $row['target_val_des']; ?>
                                    <?php $idx_val_year = ($val_year/($target_val_year ?: 1))*100; ?>
                                    <?php $qty_avg = $qty_year / 12; ?>
                                    <?php $target_qty_avg = $target_qty_year / 12; ?>
                                    <?php $idx_qty_avg = ($qty_avg/($target_qty_avg ?: 1))*100; ?>
                                    <?php $val_avg = $val_year / 12; ?>
                                    <?php $target_val_avg = $target_val_year / 12; ?>
                                    <?php $idx_val_avg = ($val_avg/($target_val_avg ?: 1))*100; ?>

                                    <td class="text-right"><?= number_format($val_year, 2);?></td>
                            
                                </tr>
                                
                                <!-- sub val -->
                                <?php $SC_val_jan += $row['value_jan']; ?>
                                <?php $SC_val_feb += $row['value_feb']; ?>
                                <?php $SC_val_mar += $row['value_mar']; ?>
                                <?php $SC_val_q1 += $row['value_q1']; ?>

                                <?php $SC_val_apr += $row['value_apr']; ?>
                                <?php $SC_val_mei += $row['value_mei']; ?>
                                <?php $SC_val_jun += $row['value_jun']; ?>
                                <?php $SC_val_q2 += $row['value_q2']; ?>

                                <?php $SC_val_jul += $row['value_jul']; ?>
                                <?php $SC_val_agu += $row['value_agu']; ?>
                                <?php $SC_val_sep += $row['value_sep']; ?>
                                <?php $SC_val_q3 += $row['value_q3']; ?>

                                <?php $SC_val_okt += $row['value_okt']; ?>
                                <?php $SC_val_nop += $row['value_nop']; ?>
                                <?php $SC_val_des += $row['value_des']; ?>
                                <?php $SC_val_q4 += $row['value_q4']; ?>
                                
                                <?php $principal = $row['principal']; ?>
                                <?php $group_sku = $row['item_group']; ?>
                                <?php $no++; endforeach; ?>

                                <?php $SC_val_year = $SC_val_jan + $SC_val_feb + $SC_val_mar + $SC_val_apr + $SC_val_mei + $SC_val_jun + $SC_val_jul + $SC_val_agu + $SC_val_sep + $SC_val_okt + $SC_val_nop + $SC_val_des;?>
                                
                                <tr class="table-warning" style="font-weight:bold">
                                    <td></td>
                                    <td><?= $principal;?></td>
                                    <td><?= $group_sku;?></td>
                                    <td></td>
                                    <td class="text-center">Sub Total <?= $group_sku;?></td>
                                    <td></td>
                                    <td class="text-right"><?= number_format($SC_val_jan, 2);?></td>
                                    <td class="text-right"><?= number_format($SC_val_feb, 2);?></td>
                                    <td class="text-right"><?= number_format($SC_val_mar, 2);?></td>
                                    <td class="text-right"><?= number_format($SC_val_apr, 2);?></td>
                                    <td class="text-right"><?= number_format($SC_val_mei, 2);?></td>
                                    <td class="text-right"><?= number_format($SC_val_jun, 2);?></td>
                                    <td class="text-right"><?= number_format($SC_val_jul, 2);?></td>
                                    <td class="text-right"><?= number_format($SC_val_agu, 2);?></td>
                                    <td class="text-right"><?= number_format($SC_val_sep, 2);?></td>
                                    <td class="text-right"><?= number_format($SC_val_okt, 2);?></td>
                                    <td class="text-right"><?= number_format($SC_val_nop, 2);?></td>
                                    <td class="text-right"><?= number_format($SC_val_des, 2);?></td>
                                    <td class="text-right"><?= number_format($SC_val_year, 2);?></td>

                                </tr>


                                <!-- System Razor -->
                                <?php

                                    $SR_val_jan = 0;
                                    $SR_val_feb = 0;
                                    $SR_val_mar = 0;
                                    $SR_val_q1 = 0;
                                    $SR_val_apr = 0;
                                    $SR_val_mei = 0;
                                    $SR_val_jun = 0;
                                    $SR_val_q2 = 0;
                                    $SR_val_jul = 0;
                                    $SR_val_agu = 0;
                                    $SR_val_sep = 0;
                                    $SR_val_q3 = 0;
                                    $SR_val_okt = 0;
                                    $SR_val_nop = 0;
                                    $SR_val_des = 0;
                                    $SR_val_q4 = 0;

                                ?>
                                <?php foreach ($data['sellingout_SR'] as $row) :?>
                                <tr>
                                    <td class="text-center"><?= $no; ?></td>
                                    <td><?= $row['principal'];?></td>
                                    <td><?= $row['item_group'];?></td>
                                    <td><?= $row['item_code'];?></td>
                                    <td><?= $row['item_name'];?></td>
                                    <td class="text-center"><?= $row['unit'];?></td>
                                    <td class="text-right"><?= number_format($row['value_jan'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['value_feb'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['value_mar'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['value_apr'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['value_mei'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['value_jun'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['value_jul'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['value_agu'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['value_sep'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['value_okt'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['value_nop'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['value_des'], 2);?></td>

                                    <?php $qty_year = $row['qty_jan'] + $row['qty_feb'] + $row['qty_mar'] + $row['qty_apr'] + $row['qty_mei'] + $row['qty_jun'] + $row['qty_jul'] + $row['qty_agu'] + $row['qty_sep'] + $row['qty_okt'] + $row['qty_nop'] + $row['qty_des']; ?>
                                    <?php $target_qty_year = $row['target_qty_jan'] + $row['target_qty_feb'] + $row['target_qty_mar'] + $row['target_qty_apr'] + $row['target_qty_mei'] + $row['target_qty_jun'] + $row['target_qty_jul'] + $row['target_qty_agu'] + $row['target_qty_sep'] + $row['target_qty_okt'] + $row['target_qty_nop'] + $row['target_qty_des']; ?>
                                    <?php $idx_qty_year = ($qty_year/($target_qty_year ?: 1))*100; ?>
                                    <?php $val_year = $row['value_jan'] + $row['value_feb'] + $row['value_mar'] + $row['value_apr'] + $row['value_mei'] + $row['value_jun'] + $row['value_jul'] + $row['value_agu'] + $row['value_sep'] + $row['value_okt'] + $row['value_nop'] + $row['value_des']; ?>
                                    <?php $target_val_year = $row['target_val_jan'] + $row['target_val_feb'] + $row['target_val_mar'] + $row['target_val_apr'] + $row['target_val_mei'] + $row['target_val_jun'] + $row['target_val_jul'] + $row['target_val_agu'] + $row['target_val_sep'] + $row['target_val_okt'] + $row['target_val_nop'] + $row['target_val_des']; ?>
                                    <?php $idx_val_year = ($val_year/($target_val_year ?: 1))*100; ?>
                                    <?php $qty_avg = $qty_year / 12; ?>
                                    <?php $target_qty_avg = $target_qty_year / 12; ?>
                                    <?php $idx_qty_avg = ($qty_avg/($target_qty_avg ?: 1))*100; ?>
                                    <?php $val_avg = $val_year / 12; ?>
                                    <?php $target_val_avg = $target_val_year / 12; ?>
                                    <?php $idx_val_avg = ($val_avg/($target_val_avg ?: 1))*100; ?>

                                    <td class="text-right"><?= number_format($val_year, 2);?></td>
                                
                                <!-- sub val -->
                                <?php $SR_val_jan += $row['value_jan']; ?>
                                <?php $SR_val_feb += $row['value_feb']; ?>
                                <?php $SR_val_mar += $row['value_mar']; ?>
                                <?php $SR_val_q1 += $row['value_q1']; ?>

                                <?php $SR_val_apr += $row['value_apr']; ?>
                                <?php $SR_val_mei += $row['value_mei']; ?>
                                <?php $SR_val_jun += $row['value_jun']; ?>
                                <?php $SR_val_q2 += $row['value_q2']; ?>

                                <?php $SR_val_jul += $row['value_jul']; ?>
                                <?php $SR_val_agu += $row['value_agu']; ?>
                                <?php $SR_val_sep += $row['value_sep']; ?>
                                <?php $SR_val_q3 += $row['value_q3']; ?>

                                <?php $SR_val_okt += $row['value_okt']; ?>
                                <?php $SR_val_nop += $row['value_nop']; ?>
                                <?php $SR_val_des += $row['value_des']; ?>
                                <?php $SR_val_q4 += $row['value_q4']; ?>
                                
                                <?php $principal = $row['principal']; ?>
                                <?php $group_sku = $row['item_group']; ?>
                                <?php $no++; endforeach; ?>

                                <?php $SR_val_year = $SR_val_jan + $SR_val_feb + $SR_val_mar + $SR_val_apr + $SR_val_mei + $SR_val_jun + $SR_val_jul + $SR_val_agu + $SR_val_sep + $SR_val_okt + $SR_val_nop + $SR_val_des;?>
                               
                                
                                <tr class="table-warning" style="font-weight:bold">
                                    <td></td>
                                    <td><?= $principal;?></td>
                                    <td><?= $group_sku;?></td>
                                    <td></td>
                                    <td class="text-center">Sub Total <?= $group_sku;?></td>
                                    <td></td>
                                    <td class="text-right"><?= number_format($SR_val_jan, 2);?></td>
                                    <td class="text-right"><?= number_format($SR_val_feb, 2);?></td>
                                    <td class="text-right"><?= number_format($SR_val_mar, 2);?></td>
                                    <td class="text-right"><?= number_format($SR_val_apr, 2);?></td>
                                    <td class="text-right"><?= number_format($SR_val_mei, 2);?></td>
                                    <td class="text-right"><?= number_format($SR_val_jun, 2);?></td>
                                    <td class="text-right"><?= number_format($SR_val_jul, 2);?></td>
                                    <td class="text-right"><?= number_format($SR_val_agu, 2);?></td>
                                    <td class="text-right"><?= number_format($SR_val_sep, 2);?></td>
                                    <td class="text-right"><?= number_format($SR_val_okt, 2);?></td>
                                    <td class="text-right"><?= number_format($SR_val_nop, 2);?></td>
                                    <td class="text-right"><?= number_format($SR_val_des, 2);?></td>
                                    
                                    <td class="text-right"><?= number_format($SR_val_year, 2);?></td>


                                <!-- D/E Razor -->
                                <?php

                                    $DR_val_jan = 0;
                                    $DR_val_feb = 0;
                                    $DR_val_mar = 0;
                                    $DR_val_q1 = 0;
                                    $DR_val_apr = 0;
                                    $DR_val_mei = 0;
                                    $DR_val_jun = 0;
                                    $DR_val_q2 = 0;
                                    $DR_val_jul = 0;
                                    $DR_val_agu = 0;
                                    $DR_val_sep = 0;
                                    $DR_val_q3 = 0;
                                    $DR_val_okt = 0;
                                    $DR_val_nop = 0;
                                    $DR_val_des = 0;
                                    $DR_val_q4 = 0;

                                ?>
                                <?php foreach ($data['sellingout_DR'] as $row) :?>
                                <tr>
                                    <td class="text-center"><?= $no; ?></td>
                                    <td><?= $row['principal'];?></td>
                                    <td><?= $row['item_group'];?></td>
                                    <td><?= $row['item_code'];?></td>
                                    <td><?= $row['item_name'];?></td>
                                    <td class="text-center"><?= $row['unit'];?></td>
                                    <td class="text-right"><?= number_format($row['value_jan'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['value_feb'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['value_mar'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['value_apr'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['value_mei'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['value_jun'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['value_jul'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['value_agu'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['value_sep'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['value_okt'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['value_nop'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['value_des'], 2);?></td>

                                    <?php $qty_year = $row['qty_jan'] + $row['qty_feb'] + $row['qty_mar'] + $row['qty_apr'] + $row['qty_mei'] + $row['qty_jun'] + $row['qty_jul'] + $row['qty_agu'] + $row['qty_sep'] + $row['qty_okt'] + $row['qty_nop'] + $row['qty_des']; ?>
                                    <?php $target_qty_year = $row['target_qty_jan'] + $row['target_qty_feb'] + $row['target_qty_mar'] + $row['target_qty_apr'] + $row['target_qty_mei'] + $row['target_qty_jun'] + $row['target_qty_jul'] + $row['target_qty_agu'] + $row['target_qty_sep'] + $row['target_qty_okt'] + $row['target_qty_nop'] + $row['target_qty_des']; ?>
                                    <?php $idx_qty_year = ($qty_year/($target_qty_year ?: 1))*100; ?>
                                    <?php $val_year = $row['value_jan'] + $row['value_feb'] + $row['value_mar'] + $row['value_apr'] + $row['value_mei'] + $row['value_jun'] + $row['value_jul'] + $row['value_agu'] + $row['value_sep'] + $row['value_okt'] + $row['value_nop'] + $row['value_des']; ?>
                                    <?php $target_val_year = $row['target_val_jan'] + $row['target_val_feb'] + $row['target_val_mar'] + $row['target_val_apr'] + $row['target_val_mei'] + $row['target_val_jun'] + $row['target_val_jul'] + $row['target_val_agu'] + $row['target_val_sep'] + $row['target_val_okt'] + $row['target_val_nop'] + $row['target_val_des']; ?>
                                    <?php $idx_val_year = ($val_year/($target_val_year ?: 1))*100; ?>
                                    <?php $qty_avg = $qty_year / 12; ?>
                                    <?php $target_qty_avg = $target_qty_year / 12; ?>
                                    <?php $idx_qty_avg = ($qty_avg/($target_qty_avg ?: 1))*100; ?>
                                    <?php $val_avg = $val_year / 12; ?>
                                    <?php $target_val_avg = $target_val_year / 12; ?>
                                    <?php $idx_val_avg = ($val_avg/($target_val_avg ?: 1))*100; ?>

                                    <td class="text-right"><?= number_format($val_year, 2);?></td>
                                </tr>
                                
                                <!-- sub val -->
                                <?php $DR_val_jan += $row['value_jan']; ?>
                                <?php $DR_val_feb += $row['value_feb']; ?>
                                <?php $DR_val_mar += $row['value_mar']; ?>
                                <?php $DR_val_q1 += $row['value_q1']; ?>

                                <?php $DR_val_apr += $row['value_apr']; ?>
                                <?php $DR_val_mei += $row['value_mei']; ?>
                                <?php $DR_val_jun += $row['value_jun']; ?>
                                <?php $DR_val_q2 += $row['value_q2']; ?>

                                <?php $DR_val_jul += $row['value_jul']; ?>
                                <?php $DR_val_agu += $row['value_agu']; ?>
                                <?php $DR_val_sep += $row['value_sep']; ?>
                                <?php $DR_val_q3 += $row['value_q3']; ?>

                                <?php $DR_val_okt += $row['value_okt']; ?>
                                <?php $DR_val_nop += $row['value_nop']; ?>
                                <?php $DR_val_des += $row['value_des']; ?>
                                <?php $DR_val_q4 += $row['value_q4']; ?>
                                
                                <?php $principal = $row['principal']; ?>
                                <?php $group_sku = $row['item_group']; ?>
                                <?php $no++; endforeach; ?>

                                <?php $DR_val_year = $DR_val_jan + $DR_val_feb + $DR_val_mar + $DR_val_apr + $DR_val_mei + $DR_val_jun + $DR_val_jul + $DR_val_agu + $DR_val_sep + $DR_val_okt + $DR_val_nop + $DR_val_des;?>
                                
                                <tr class="table-warning" style="font-weight:bold">
                                    <td></td>
                                    <td><?= $principal;?></td>
                                    <td><?= $group_sku;?></td>
                                    <td></td>
                                    <td class="text-center">Sub Total <?= $group_sku;?></td>
                                    <td></td>
                                    <td class="text-right"><?= number_format($DR_val_jan, 2);?></td>
                                    <td class="text-right"><?= number_format($DR_val_feb, 2);?></td>
                                    <td class="text-right"><?= number_format($DR_val_mar, 2);?></td>
                                    <td class="text-right"><?= number_format($DR_val_apr, 2);?></td>
                                    <td class="text-right"><?= number_format($DR_val_mei, 2);?></td>
                                    <td class="text-right"><?= number_format($DR_val_jun, 2);?></td>
                                    <td class="text-right"><?= number_format($DR_val_jul, 2);?></td>
                                    <td class="text-right"><?= number_format($DR_val_agu, 2);?></td>
                                    <td class="text-right"><?= number_format($DR_val_sep, 2);?></td>
                                    <td class="text-right"><?= number_format($DR_val_okt, 2);?></td>
                                    <td class="text-right"><?= number_format($DR_val_nop, 2);?></td>
                                    <td class="text-right"><?= number_format($DR_val_des, 2);?></td>
                                    <td class="text-right"><?= number_format($DR_val_year, 2);?></td>
                                </tr>

                                <!-- TOTAL LORD -->
                                <?php

                                    $LORD_val_jan = $DE_val_jan + $DP_val_jan + $SC_val_jan + $SR_val_jan + $DR_val_jan;
                                    $LORD_val_feb = $DE_val_feb + $DP_val_feb + $SC_val_feb + $SR_val_feb + $DR_val_feb;
                                    $LORD_val_mar = $DE_val_mar + $DP_val_mar + $SC_val_mar + $SR_val_mar + $DR_val_mar;
                                    $LORD_val_q1 = $DE_val_q1 + $DP_val_q1 + $SC_val_q1 + $SR_val_q1 + $DR_val_q1;
                                    $LORD_val_apr = $DE_val_apr + $DP_val_apr + $SC_val_apr + $SR_val_apr + $DR_val_apr;
                                    $LORD_val_mei = $DE_val_mei + $DP_val_mei + $SC_val_mei + $SR_val_mei + $DR_val_mei;
                                    $LORD_val_jun = $DE_val_jun + $DP_val_jun + $SC_val_jun + $SR_val_jun + $DR_val_jun;
                                    $LORD_val_q2 = $DE_val_q2 + $DP_val_q2 + $SC_val_q2 + $SR_val_q2 + $DR_val_q2;
                                    $LORD_val_jul = $DE_val_jul + $DP_val_jul + $SC_val_jul + $SR_val_jul + $DR_val_jul;
                                    $LORD_val_agu = $DE_val_agu + $DP_val_agu + $SC_val_agu + $SR_val_agu + $DR_val_agu;
                                    $LORD_val_sep = $DE_val_sep + $DP_val_sep + $SC_val_sep + $SR_val_sep + $DR_val_sep;
                                    $LORD_val_q3 = $DE_val_q3 + $DP_val_q3 + $SC_val_q3 + $SR_val_q3 + $DR_val_q3;
                                    $LORD_val_okt = $DE_val_okt + $DP_val_okt + $SC_val_okt + $SR_val_okt + $DR_val_okt;
                                    $LORD_val_nop = $DE_val_nop + $DP_val_nop + $SC_val_nop + $SR_val_nop + $DR_val_nop;
                                    $LORD_val_des = $DE_val_des + $DP_val_des + $SC_val_des + $SR_val_des + $DR_val_des;
                                    $LORD_val_q4 = $DE_val_q4 + $DP_val_q4 + $SC_val_q4 + $SR_val_q4 + $DR_val_q4;

                                    $LORD_val_year = $LORD_val_jan + $LORD_val_feb + $LORD_val_mar + $LORD_val_apr + $LORD_val_mei + $LORD_val_jun + $LORD_val_jul + $LORD_val_agu + $LORD_val_sep + $LORD_val_okt + $LORD_val_nop + $LORD_val_des;

                                ?>

                                <tr class="table-danger" style="font-weight:bold">
                                    <td></td>
                                    <td>LORD</td>
                                    <td></td>
                                    <td></td>
                                    <td class="text-center">TOTAL LORD</td>
                                    <td></td>
                                    <td class="text-right"><?= number_format($LORD_val_jan, 2);?></td>
                                    <td class="text-right"><?= number_format($LORD_val_feb, 2);?></td>
                                    <td class="text-right"><?= number_format($LORD_val_mar, 2);?></td>
                                    <td class="text-right"><?= number_format($LORD_val_apr, 2);?></td>
                                    <td class="text-right"><?= number_format($LORD_val_mei, 2);?></td>
                                    <td class="text-right"><?= number_format($LORD_val_jun, 2);?></td>
                                    <td class="text-right"><?= number_format($LORD_val_jul, 2);?></td>
                                    <td class="text-right"><?= number_format($LORD_val_agu, 2);?></td>
                                    <td class="text-right"><?= number_format($LORD_val_sep, 2);?></td>
                                    <td class="text-right"><?= number_format($LORD_val_okt, 2);?></td>
                                    <td class="text-right"><?= number_format($LORD_val_nop, 2);?></td>
                                    <td class="text-right"><?= number_format($LORD_val_des, 2);?></td>
                                    <td class="text-right"><?= number_format($LORD_val_year, 2);?></td>
                                </tr>


                                <?php $no=1; ?>
                                <!-- ADULT TOOTHBRUSH -->
                                <?php

                                    $AT_val_jan = 0;
                                    $AT_val_feb = 0;
                                    $AT_val_mar = 0;
                                    $AT_val_q1 = 0;
                                    $AT_val_apr = 0;
                                    $AT_val_mei = 0;
                                    $AT_val_jun = 0;
                                    $AT_val_q2 = 0;
                                    $AT_val_jul = 0;
                                    $AT_val_agu = 0;
                                    $AT_val_sep = 0;
                                    $AT_val_q3 = 0;
                                    $AT_val_okt = 0;
                                    $AT_val_nop = 0;
                                    $AT_val_des = 0;
                                    $AT_val_q4 = 0;

                                ?>
                                <?php foreach ($data['sellingout_AT'] as $row) :?>
                                <tr>
                                    <td class="text-center"><?= $no; ?></td>
                                    <td><?= $row['principal'];?></td>
                                    <td><?= $row['item_group'];?></td>
                                    <td><?= $row['item_code'];?></td>
                                    <td><?= $row['item_name'];?></td>
                                    <td class="text-center"><?= $row['unit'];?></td>
                                    <td class="text-right"><?= number_format($row['value_jan'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['value_feb'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['value_mar'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['value_apr'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['value_mei'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['value_jun'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['value_jul'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['value_agu'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['value_sep'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['value_okt'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['value_nop'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['value_des'], 2);?></td>

                                    <?php $qty_avg = $qty_year / 12; ?>
                                    <td class="text-right"><?= number_format($val_year, 2);?></td>
                                    
                                </tr>
                                
                                
                                
                                <!-- sub val -->
                                <?php $AT_val_jan += $row['value_jan']; ?>
                                <?php $AT_val_feb += $row['value_feb']; ?>
                                <?php $AT_val_mar += $row['value_mar']; ?>
                                <?php $AT_val_q1 += $row['value_q1']; ?>

                                <?php $AT_val_apr += $row['value_apr']; ?>
                                <?php $AT_val_mei += $row['value_mei']; ?>
                                <?php $AT_val_jun += $row['value_jun']; ?>
                                <?php $AT_val_q2 += $row['value_q2']; ?>

                                <?php $AT_val_jul += $row['value_jul']; ?>
                                <?php $AT_val_agu += $row['value_agu']; ?>
                                <?php $AT_val_sep += $row['value_sep']; ?>
                                <?php $AT_val_q3 += $row['value_q3']; ?>

                                <?php $AT_val_okt += $row['value_okt']; ?>
                                <?php $AT_val_nop += $row['value_nop']; ?>
                                <?php $AT_val_des += $row['value_des']; ?>
                                <?php $AT_val_q4 += $row['value_q4']; ?>

                                
                                <?php $principal = $row['principal']; ?>
                                <?php $group_sku = $row['item_group']; ?>
                                <?php $no++; endforeach; ?>

        
                                <?php $AT_val_year = $AT_val_jan + $AT_val_feb + $AT_val_mar + $AT_val_apr + $AT_val_mei + $AT_val_jun + $AT_val_jul + $AT_val_agu + $AT_val_sep + $AT_val_okt + $AT_val_nop + $AT_val_des;?>
                                
                                <tr class="table-warning" style="font-weight:bold">
                                    <td></td>
                                    <td><?= $principal;?></td>
                                    <td><?= $group_sku;?></td>
                                    <td></td>
                                    <td class="text-center">Sub Total <?= $group_sku;?></td>
                                    <td></td>

                                    <td class="text-right"><?= number_format($AT_val_jan, 2);?></td>
                                    <td class="text-right"><?= number_format($AT_val_feb, 2);?></td>
                                    <td class="text-right"><?= number_format($AT_val_mar, 2);?></td>
                                    <td class="text-right"><?= number_format($AT_val_apr, 2);?></td>
                                    <td class="text-right"><?= number_format($AT_val_mei, 2);?></td>
                                    <td class="text-right"><?= number_format($AT_val_jun, 2);?></td>
                                    <td class="text-right"><?= number_format($AT_val_jul, 2);?></td>
                                    <td class="text-right"><?= number_format($AT_val_agu, 2);?></td>
                                    <td class="text-right"><?= number_format($AT_val_sep, 2);?></td>
                                    <td class="text-right"><?= number_format($AT_val_okt, 2);?></td>
                                    <td class="text-right"><?= number_format($AT_val_nop, 2);?></td>
                                    <td class="text-right"><?= number_format($AT_val_des, 2);?></td>
                                    
                                    <td class="text-right"><?= number_format($AT_val_year, 2);?></td>
                                </tr>

                                <!-- KIDS TOOTHBRUSH -->
                                <?php

                                    $KT_val_jan = 0;
                                    $KT_val_feb = 0;
                                    $KT_val_mar = 0;
                                    $KT_val_q1 = 0;
                                    $KT_val_apr = 0;
                                    $KT_val_mei = 0;
                                    $KT_val_jun = 0;
                                    $KT_val_q2 = 0;
                                    $KT_val_jul = 0;
                                    $KT_val_agu = 0;
                                    $KT_val_sep = 0;
                                    $KT_val_q3 = 0;
                                    $KT_val_okt = 0;
                                    $KT_val_nop = 0;
                                    $KT_val_des = 0;
                                    $KT_val_q4 = 0;

                                    
                                ?>
                                <?php foreach ($data['sellingout_KT'] as $row) :?>
                                <tr>
                                    <td class="text-center"><?= $no; ?></td>
                                    <td><?= $row['principal'];?></td>
                                    <td><?= $row['item_group'];?></td>
                                    <td><?= $row['item_code'];?></td>
                                    <td><?= $row['item_name'];?></td>
                                    <td class="text-center"><?= $row['unit'];?></td>
                                    <td class="text-right"><?= number_format($row['value_jan'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['value_feb'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['value_mar'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['value_apr'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['value_mei'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['value_jun'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['value_jul'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['value_agu'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['value_sep'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['value_okt'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['value_nop'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['value_des'], 2);?></td>

                                    <?php $qty_year = $row['qty_jan'] + $row['qty_feb'] + $row['qty_mar'] + $row['qty_apr'] + $row['qty_mei'] + $row['qty_jun'] + $row['qty_jul'] + $row['qty_agu'] + $row['qty_sep'] + $row['qty_okt'] + $row['qty_nop'] + $row['qty_des']; ?>

                                    <td class="text-right"><?= number_format($val_year, 2);?></td>
                                    
                                </tr>
                                
                                
                                <!-- sub val -->
                                <?php $KT_val_jan += $row['value_jan']; ?>
                                <?php $KT_val_feb += $row['value_feb']; ?>
                                <?php $KT_val_mar += $row['value_mar']; ?>
                                <?php $KT_val_q1 += $row['value_q1']; ?>

                                <?php $KT_val_apr += $row['value_apr']; ?>
                                <?php $KT_val_mei += $row['value_mei']; ?>
                                <?php $KT_val_jun += $row['value_jun']; ?>
                                <?php $KT_val_q2 += $row['value_q2']; ?>

                                <?php $KT_val_jul += $row['value_jul']; ?>
                                <?php $KT_val_agu += $row['value_agu']; ?>
                                <?php $KT_val_sep += $row['value_sep']; ?>
                                <?php $KT_val_q3 += $row['value_q3']; ?>

                                <?php $KT_val_okt += $row['value_okt']; ?>
                                <?php $KT_val_nop += $row['value_nop']; ?>
                                <?php $KT_val_des += $row['value_des']; ?>
                                <?php $KT_val_q4 += $row['value_q4']; ?>

                                
                                <?php $principal = $row['principal']; ?>
                                <?php $group_sku = $row['item_group']; ?>
                                <?php $no++; endforeach; ?>

                                <?php $KT_val_year = $KT_val_jan + $KT_val_feb + $KT_val_mar + $KT_val_apr + $KT_val_mei + $KT_val_jun + $KT_val_jul + $KT_val_agu + $KT_val_sep + $KT_val_okt + $KT_val_nop + $KT_val_des;?>
                                
                                <tr class="table-warning" style="font-weight:bold">
                                    <td></td>
                                    <td><?= $principal;?></td>
                                    <td><?= $group_sku;?></td>
                                    <td></td>
                                    <td class="text-center">Sub Total <?= $group_sku;?></td>
                                    <td></td>
                                    <td class="text-right"><?= number_format($KT_val_jan, 2);?></td>
                                    <td class="text-right"><?= number_format($KT_val_feb, 2);?></td>
                                    <td class="text-right"><?= number_format($KT_val_mar, 2);?></td>
                                    <td class="text-right"><?= number_format($KT_val_apr, 2);?></td>
                                    <td class="text-right"><?= number_format($KT_val_mei, 2);?></td>
                                    <td class="text-right"><?= number_format($KT_val_jun, 2);?></td>
                                    <td class="text-right"><?= number_format($KT_val_jul, 2);?></td>
                                    <td class="text-right"><?= number_format($KT_val_agu, 2);?></td>
                                    <td class="text-right"><?= number_format($KT_val_sep, 2);?></td>
                                    <td class="text-right"><?= number_format($KT_val_okt, 2);?></td>
                                    <td class="text-right"><?= number_format($KT_val_nop, 2);?></td>
                                    <td class="text-right"><?= number_format($KT_val_des, 2);?></td>
                                    <td class="text-right"><?= number_format($KT_val_year, 2);?></td>
                                </tr>



                                <!-- DENTAL FLOSS -->
                                <?php

                                    $DF_val_jan = 0;
                                    $DF_val_feb = 0;
                                    $DF_val_mar = 0;
                                    $DF_val_q1 = 0;
                                    $DF_val_apr = 0;
                                    $DF_val_mei = 0;
                                    $DF_val_jun = 0;
                                    $DF_val_q2 = 0;
                                    $DF_val_jul = 0;
                                    $DF_val_agu = 0;
                                    $DF_val_sep = 0;
                                    $DF_val_q3 = 0;
                                    $DF_val_okt = 0;
                                    $DF_val_nop = 0;
                                    $DF_val_des = 0;
                                    $DF_val_q4 = 0;

                    
                                ?>
                                <?php foreach ($data['sellingout_DF'] as $row) :?>
                                <tr>
                                    <td class="text-center"><?= $no; ?></td>
                                    <td><?= $row['principal'];?></td>
                                    <td><?= $row['item_group'];?></td>
                                    <td><?= $row['item_code'];?></td>
                                    <td><?= $row['item_name'];?></td>
                                    <td class="text-center"><?= $row['unit'];?></td>
                                    <td class="text-right"><?= number_format($row['value_jan'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['value_feb'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['value_mar'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['value_apr'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['value_mei'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['value_jun'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['value_jul'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['value_agu'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['value_sep'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['value_okt'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['value_nop'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['value_des'], 2);?></td>

                                    <?php $val_year = $row['value_jan'] + $row['value_feb'] + $row['value_mar'] + $row['value_apr'] + $row['value_mei'] + $row['value_jun'] + $row['value_jul'] + $row['value_agu'] + $row['value_sep'] + $row['value_okt'] + $row['value_nop'] + $row['value_des']; ?>

                                    <td class="text-right"><?= number_format($val_year, 2);?></td>

                                
                                <!-- sub val -->
                                <?php $DF_val_jan += $row['value_jan']; ?>
                                <?php $DF_val_feb += $row['value_feb']; ?>
                                <?php $DF_val_mar += $row['value_mar']; ?>
                                <?php $DF_val_q1 += $row['value_q1']; ?>

                                <?php $DF_val_apr += $row['value_apr']; ?>
                                <?php $DF_val_mei += $row['value_mei']; ?>
                                <?php $DF_val_jun += $row['value_jun']; ?>
                                <?php $DF_val_q2 += $row['value_q2']; ?>

                                <?php $DF_val_jul += $row['value_jul']; ?>
                                <?php $DF_val_agu += $row['value_agu']; ?>
                                <?php $DF_val_sep += $row['value_sep']; ?>
                                <?php $DF_val_q3 += $row['value_q3']; ?>

                                <?php $DF_val_okt += $row['value_okt']; ?>
                                <?php $DF_val_nop += $row['value_nop']; ?>
                                <?php $DF_val_des += $row['value_des']; ?>
                                <?php $DF_val_q4 += $row['value_q4']; ?>

                        
                                
                                <?php $principal = $row['principal']; ?>
                                <?php $group_sku = $row['item_group']; ?>
                                <?php $no++; endforeach; ?>

                                
                                <?php $DF_val_year = $DF_val_jan + $DF_val_feb + $DF_val_mar + $DF_val_apr + $DF_val_mei + $DF_val_jun + $DF_val_jul + $DF_val_agu + $DF_val_sep + $DF_val_okt + $DF_val_nop + $DF_val_des;?>
                                
                                <tr class="table-warning" style="font-weight:bold">
                                    <td></td>
                                    <td><?= $principal;?></td>
                                    <td><?= $group_sku;?></td>
                                    <td></td>
                                    <td class="text-center">Sub Total <?= $group_sku;?></td>
                                    <td></td>
                                    <td class="text-right"><?= number_format($DF_val_jan, 2);?></td>
                                    <td class="text-right"><?= number_format($DF_val_feb, 2);?></td>
                                    <td class="text-right"><?= number_format($DF_val_mar, 2);?></td>
                                    <td class="text-right"><?= number_format($DF_val_apr, 2);?></td>
                                    <td class="text-right"><?= number_format($DF_val_mei, 2);?></td>
                                    <td class="text-right"><?= number_format($DF_val_jun, 2);?></td>
                                    <td class="text-right"><?= number_format($DF_val_jul, 2);?></td>
                                    <td class="text-right"><?= number_format($DF_val_agu, 2);?></td>
                                    <td class="text-right"><?= number_format($DF_val_sep, 2);?></td>
                                    <td class="text-right"><?= number_format($DF_val_okt, 2);?></td>
                                    <td class="text-right"><?= number_format($DF_val_nop, 2);?></td>
                                    <td class="text-right"><?= number_format($DF_val_des, 2);?></td>
                                    <td class="text-right"><?= number_format($DF_val_year, 2);?></td>
                                </tr>


                                <!-- INTERDENTAL -->
                                <?php

                                    $ID_val_jan = 0;
                                    $ID_val_feb = 0;
                                    $ID_val_mar = 0;
                                    $ID_val_q1 = 0;
                                    $ID_val_apr = 0;
                                    $ID_val_mei = 0;
                                    $ID_val_jun = 0;
                                    $ID_val_q2 = 0;
                                    $ID_val_jul = 0;
                                    $ID_val_agu = 0;
                                    $ID_val_sep = 0;
                                    $ID_val_q3 = 0;
                                    $ID_val_okt = 0;
                                    $ID_val_nop = 0;
                                    $ID_val_des = 0;
                                    $ID_val_q4 = 0;

                                    
                                ?>
                                <?php foreach ($data['sellingout_ID'] as $row) :?>
                                <tr>
                                    <td class="text-center"><?= $no; ?></td>
                                    <td><?= $row['principal'];?></td>
                                    <td><?= $row['item_group'];?></td>
                                    <td><?= $row['item_code'];?></td>
                                    <td><?= $row['item_name'];?></td>
                                    <td class="text-center"><?= $row['unit'];?></td>
                                    <td class="text-right"><?= number_format($row['value_jan'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['value_feb'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['value_mar'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['value_apr'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['value_mei'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['value_jun'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['value_jul'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['value_agu'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['value_sep'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['value_okt'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['value_nop'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['value_des'], 2);?></td>

                                    <?php $val_year = $row['value_jan'] + $row['value_feb'] + $row['value_mar'] + $row['value_apr'] + $row['value_mei'] + $row['value_jun'] + $row['value_jul'] + $row['value_agu'] + $row['value_sep'] + $row['value_okt'] + $row['value_nop'] + $row['value_des']; ?>
                                
                                    <td class="text-right"><?= number_format($val_year, 2);?></td>
                                    
                                </tr>
                                
                                <!-- sub val -->
                                <?php $ID_val_jan += $row['value_jan']; ?>
                                <?php $ID_val_feb += $row['value_feb']; ?>
                                <?php $ID_val_mar += $row['value_mar']; ?>
                                <?php $ID_val_q1 += $row['value_q1']; ?>

                                <?php $ID_val_apr += $row['value_apr']; ?>
                                <?php $ID_val_mei += $row['value_mei']; ?>
                                <?php $ID_val_jun += $row['value_jun']; ?>
                                <?php $ID_val_q2 += $row['value_q2']; ?>

                                <?php $ID_val_jul += $row['value_jul']; ?>
                                <?php $ID_val_agu += $row['value_agu']; ?>
                                <?php $ID_val_sep += $row['value_sep']; ?>
                                <?php $ID_val_q3 += $row['value_q3']; ?>

                                <?php $ID_val_okt += $row['value_okt']; ?>
                                <?php $ID_val_nop += $row['value_nop']; ?>
                                <?php $ID_val_des += $row['value_des']; ?>
                                <?php $ID_val_q4 += $row['value_q4']; ?>
                                
                                <?php $principal = $row['principal']; ?>
                                <?php $group_sku = $row['item_group']; ?>
                                <?php $no++; endforeach; ?>

                                <?php $ID_val_year = $ID_val_jan + $ID_val_feb + $ID_val_mar + $ID_val_apr + $ID_val_mei + $ID_val_jun + $ID_val_jul + $ID_val_agu + $ID_val_sep + $ID_val_okt + $ID_val_nop + $ID_val_des;?>
                                
                                <tr class="table-warning" style="font-weight:bold">
                                    <td></td>
                                    <td><?= $principal;?></td>
                                    <td><?= $group_sku;?></td>
                                    <td></td>
                                    <td class="text-center">Sub Total <?= $group_sku;?></td>
                                    <td></td>
                                    <td class="text-right"><?= number_format($ID_val_jan, 2);?></td>
                                    <td class="text-right"><?= number_format($ID_val_feb, 2);?></td>
                                    <td class="text-right"><?= number_format($ID_val_mar, 2);?></td>
                                    <td class="text-right"><?= number_format($ID_val_apr, 2);?></td>
                                    <td class="text-right"><?= number_format($ID_val_mei, 2);?></td>
                                    <td class="text-right"><?= number_format($ID_val_jun, 2);?></td>
                                    <td class="text-right"><?= number_format($ID_val_jul, 2);?></td>
                                    <td class="text-right"><?= number_format($ID_val_agu, 2);?></td>
                                    <td class="text-right"><?= number_format($ID_val_sep, 2);?></td>
                                    <td class="text-right"><?= number_format($ID_val_okt, 2);?></td>
                                    <td class="text-right"><?= number_format($ID_val_nop, 2);?></td>
                                    <td class="text-right"><?= number_format($ID_val_des, 2);?></td>
                                    <td class="text-right"><?= number_format($ID_val_year, 2);?></td>
                                </tr>

                                <!-- KIDS TOOTHPASTE -->
                                <?php

                                    $KP_val_jan = 0;
                                    $KP_val_feb = 0;
                                    $KP_val_mar = 0;
                                    $KP_val_q1 = 0;
                                    $KP_val_apr = 0;
                                    $KP_val_mei = 0;
                                    $KP_val_jun = 0;
                                    $KP_val_q2 = 0;
                                    $KP_val_jul = 0;
                                    $KP_val_agu = 0;
                                    $KP_val_sep = 0;
                                    $KP_val_q3 = 0;
                                    $KP_val_okt = 0;
                                    $KP_val_nop = 0;
                                    $KP_val_des = 0;
                                    $KP_val_q4 = 0;
                                ?>
                                <?php foreach ($data['sellingout_KP'] as $row) :?>
                                <tr>
                                    <td class="text-center"><?= $no; ?></td>
                                    <td><?= $row['principal'];?></td>
                                    <td><?= $row['item_group'];?></td>
                                    <td><?= $row['item_code'];?></td>
                                    <td><?= $row['item_name'];?></td>
                                    <td class="text-center"><?= $row['unit'];?></td>
                                    <td class="text-right"><?= number_format($row['value_jan'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['value_feb'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['value_mar'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['value_apr'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['value_mei'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['value_jun'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['value_jul'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['value_agu'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['value_sep'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['value_okt'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['value_nop'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['value_des'], 2);?></td>

                                    <?php $val_year = $row['value_jan'] + $row['value_feb'] + $row['value_mar'] + $row['value_apr'] + $row['value_mei'] + $row['value_jun'] + $row['value_jul'] + $row['value_agu'] + $row['value_sep'] + $row['value_okt'] + $row['value_nop'] + $row['value_des']; ?>

                                    <td class="text-right"><?= number_format($val_year, 2);?></td>
                                    
                                </tr>
                                
                                <!-- sub val -->
                                <?php $KP_val_jan += $row['value_jan']; ?>
                                <?php $KP_val_feb += $row['value_feb']; ?>
                                <?php $KP_val_mar += $row['value_mar']; ?>
                                <?php $KP_val_q1 += $row['value_q1']; ?>

                                <?php $KP_val_apr += $row['value_apr']; ?>
                                <?php $KP_val_mei += $row['value_mei']; ?>
                                <?php $KP_val_jun += $row['value_jun']; ?>
                                <?php $KP_val_q2 += $row['value_q2']; ?>

                                <?php $KP_val_jul += $row['value_jul']; ?>
                                <?php $KP_val_agu += $row['value_agu']; ?>
                                <?php $KP_val_sep += $row['value_sep']; ?>
                                <?php $KP_val_q3 += $row['value_q3']; ?>

                                <?php $KP_val_okt += $row['value_okt']; ?>
                                <?php $KP_val_nop += $row['value_nop']; ?>
                                <?php $KP_val_des += $row['value_des']; ?>
                                <?php $KP_val_q4 += $row['value_q4']; ?>

                                
                                <?php $principal = $row['principal']; ?>
                                <?php $group_sku = $row['item_group']; ?>
                                <?php $no++; endforeach; ?>

                                <?php $KP_val_year = $KP_val_jan + $KP_val_feb + $KP_val_mar + $KP_val_apr + $KP_val_mei + $KP_val_jun + $KP_val_jul + $KP_val_agu + $KP_val_sep + $KP_val_okt + $KP_val_nop + $KP_val_des;?>
                                
                                <tr class="table-warning" style="font-weight:bold">
                                    <td></td>
                                    <td><?= $principal;?></td>
                                    <td><?= $group_sku;?></td>
                                    <td></td>
                                    <td class="text-center">Sub Total <?= $group_sku;?></td>
                                    <td></td>
                                    <td class="text-right"><?= number_format($KP_val_jan, 2);?></td>
                                    <td class="text-right"><?= number_format($KP_val_feb, 2);?></td>
                                    <td class="text-right"><?= number_format($KP_val_mar, 2);?></td>
                                    <td class="text-right"><?= number_format($KP_val_apr, 2);?></td>
                                    <td class="text-right"><?= number_format($KP_val_mei, 2);?></td>
                                    <td class="text-right"><?= number_format($KP_val_jun, 2);?></td>
                                    <td class="text-right"><?= number_format($KP_val_jul, 2);?></td>
                                    <td class="text-right"><?= number_format($KP_val_agu, 2);?></td>
                                    <td class="text-right"><?= number_format($KP_val_sep, 2);?></td>
                                    <td class="text-right"><?= number_format($KP_val_okt, 2);?></td>
                                    <td class="text-right"><?= number_format($KP_val_nop, 2);?></td>
                                    <td class="text-right"><?= number_format($KP_val_des, 2);?></td>
                                    <td class="text-right"><?= number_format($KP_val_year, 2);?></td>
                                </tr>


                                <!-- TOTAL JORDAN -->
                                <?php

                                    $JORDAN_val_jan = $AT_val_jan + $KT_val_jan + $DF_val_jan + $ID_val_jan + $KP_val_jan;
                                    $JORDAN_val_feb = $AT_val_feb + $KT_val_feb + $DF_val_feb + $ID_val_feb + $KP_val_feb;
                                    $JORDAN_val_mar = $AT_val_mar + $KT_val_mar + $DF_val_mar + $ID_val_mar + $KP_val_mar;
                                    $JORDAN_val_q1 = $AT_val_q1 + $KT_val_q1 + $DF_val_q1 + $ID_val_q1 + $KP_val_q1;
                                    $JORDAN_val_apr = $AT_val_apr + $KT_val_apr + $DF_val_apr + $ID_val_apr + $KP_val_apr;
                                    $JORDAN_val_mei = $AT_val_mei + $KT_val_mei + $DF_val_mei + $ID_val_mei + $KP_val_mei;
                                    $JORDAN_val_jun = $AT_val_jun + $KT_val_jun + $DF_val_jun + $ID_val_jun + $KP_val_jun;
                                    $JORDAN_val_q2 = $AT_val_q2 + $KT_val_q2 + $DF_val_q2 + $ID_val_q2 + $KP_val_q2;
                                    $JORDAN_val_jul = $AT_val_jul + $KT_val_jul + $DF_val_jul + $ID_val_jul + $KP_val_jul;
                                    $JORDAN_val_agu = $AT_val_agu + $KT_val_agu + $DF_val_agu + $ID_val_agu + $KP_val_agu;
                                    $JORDAN_val_sep = $AT_val_sep + $KT_val_sep + $DF_val_sep + $ID_val_sep + $KP_val_sep;
                                    $JORDAN_val_q3 = $AT_val_q3 + $KT_val_q3 + $DF_val_q3 + $ID_val_q3 + $KP_val_q3;
                                    $JORDAN_val_okt = $AT_val_okt + $KT_val_okt + $DF_val_okt + $ID_val_okt + $KP_val_okt;
                                    $JORDAN_val_nop = $AT_val_nop + $KT_val_nop + $DF_val_nop + $ID_val_nop + $KP_val_nop;
                                    $JORDAN_val_des = $AT_val_des + $KT_val_des + $DF_val_des + $ID_val_des + $KP_val_des;
                                    $JORDAN_val_q4 = $AT_val_q4 + $KT_val_q4 + $DF_val_q4 + $ID_val_q4 + $KP_val_q4;


                                    
                                    $JORDAN_val_year = $JORDAN_val_jan + $JORDAN_val_feb + $JORDAN_val_mar + $JORDAN_val_apr + $JORDAN_val_mei + $JORDAN_val_jun + $JORDAN_val_jul + $JORDAN_val_agu + $JORDAN_val_sep + $JORDAN_val_okt + $JORDAN_val_nop + $JORDAN_val_des;

                                ?>

                                <tr class="table-danger" style="font-weight:bold">
                                    <td></td>
                                    <td>JORDAN</td>
                                    <td></td>
                                    <td></td>
                                    <td class="text-center">TOTAL JORDAN</td>
                                    <td></td>
                                    <td class="text-right"><?= number_format($JORDAN_val_jan, 2);?></td>
                                    <td class="text-right"><?= number_format($JORDAN_val_feb, 2);?></td>
                                    <td class="text-right"><?= number_format($JORDAN_val_mar, 2);?></td>
                                    <td class="text-right"><?= number_format($JORDAN_val_apr, 2);?></td>
                                    <td class="text-right"><?= number_format($JORDAN_val_mei, 2);?></td>
                                    <td class="text-right"><?= number_format($JORDAN_val_jun, 2);?></td>
                                    <td class="text-right"><?= number_format($JORDAN_val_jul, 2);?></td>
                                    <td class="text-right"><?= number_format($JORDAN_val_agu, 2);?></td>
                                    <td class="text-right"><?= number_format($JORDAN_val_sep, 2);?></td>
                                    <td class="text-right"><?= number_format($JORDAN_val_okt, 2);?></td>
                                    <td class="text-right"><?= number_format($JORDAN_val_nop, 2);?></td>
                                    <td class="text-right"><?= number_format($JORDAN_val_des, 2);?></td>
                                    <td class="text-right"><?= number_format($JORDAN_val_year, 2);?></td>
                                </tr>



                                <!-- GRAND TOTAL -->
                                <?php

                                    $GRANDTOTAL_val_jan = $LORD_val_jan + $JORDAN_val_jan;
                                    $GRANDTOTAL_val_feb = $LORD_val_feb + $JORDAN_val_feb;
                                    $GRANDTOTAL_val_mar = $LORD_val_mar + $JORDAN_val_mar;
                                    $GRANDTOTAL_val_q1 = $LORD_val_q1 + $JORDAN_val_q1;
                                    $GRANDTOTAL_val_apr = $LORD_val_apr + $JORDAN_val_apr;
                                    $GRANDTOTAL_val_mei = $LORD_val_mei + $JORDAN_val_mei;
                                    $GRANDTOTAL_val_jun = $LORD_val_jun + $JORDAN_val_jun;
                                    $GRANDTOTAL_val_q2 = $LORD_val_q2 + $JORDAN_val_q2;
                                    $GRANDTOTAL_val_jul = $LORD_val_jul + $JORDAN_val_jul;
                                    $GRANDTOTAL_val_agu = $LORD_val_agu + $JORDAN_val_agu;
                                    $GRANDTOTAL_val_sep = $LORD_val_sep + $JORDAN_val_sep;
                                    $GRANDTOTAL_val_q3 = $LORD_val_q3 + $JORDAN_val_q3;
                                    $GRANDTOTAL_val_okt = $LORD_val_okt + $JORDAN_val_okt;
                                    $GRANDTOTAL_val_nop = $LORD_val_nop + $JORDAN_val_nop;
                                    $GRANDTOTAL_val_des = $LORD_val_des + $JORDAN_val_des;
                                    $GRANDTOTAL_val_q4 = $LORD_val_q4 + $JORDAN_val_q4;

                                    
                                    $GRANDTOTAL_val_year = $LORD_val_year + $JORDAN_val_year;
                                    
                                ?>


                                <tr class="table-danger" style="font-weight:bold">
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td class="text-center">Grand Total LORD + JORDAN</td>
                                    <td></td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_val_jan, 2);?></td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_val_feb, 2);?></td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_val_mar, 2);?></td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_val_apr, 2);?></td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_val_mei, 2);?></td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_val_jun, 2);?></td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_val_jul, 2);?></td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_val_agu, 2);?></td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_val_sep, 2);?></td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_val_okt, 2);?></td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_val_nop, 2);?></td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_val_des, 2);?></td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_val_year, 2);?></td>
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