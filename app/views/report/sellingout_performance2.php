  
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
            <h1>Report Selling Out - Performance</h1> 
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

            <form action="<?= base_url; ?>/Report/sellingout_performance2" method="post">
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
                            <a class="btn btn-outline-secondary" href="<?= base_url; ?>/Report/sellingout_performance2">Reset</a>
                        </div>
                      </div>


                        <!-- <div id="hasil_sale_out"></div> -->
                        <div class="table-responsive-sm text-small">
                          <table id="sale_out_performance" class="table table-bordered table-sm order-column nowrap" align="left" style="font-size:70%; border: 1px solid black;">
                          <thead class="table-warning">
                              <tr>
                                <th rowspan="3" class="text-center" style="width: 5px; vertical-align: middle;">#</th>
                                <th rowspan="3" class="text-center" style="width: 25px; vertical-align: middle;">Principal</th>
                                <th rowspan="3" class="text-center" style="width: 90px; vertical-align: middle;">Group SKU</th>
                                <th rowspan="3" class="text-center" style="width: 12px; vertical-align: middle;">Kode Item</th>
                                <th rowspan="3" class="text-center" style="width: 250px; vertical-align: middle;">SKU</th>
                                <th rowspan="3" class="text-center" style="width: 15px; vertical-align: middle;">Unit</th>
                                <th colspan="6" class="text-center">January</th>
                                <th colspan="6" class="text-center">February</th>
                                <th colspan="6" class="text-center">March</th>
                                <th colspan="6" class="text-center" style="background-color: yellow">Quarter 1</th>
                                <th colspan="6" class="text-center">April</th>
                                <th colspan="6" class="text-center">May</th>
                                <th colspan="6" class="text-center">June</th>
                                <th colspan="6" class="text-center" style="background-color: yellow">Quarter 2</th>
                                <th colspan="6" class="text-center">July</th>
                                <th colspan="6" class="text-center">August</th>
                                <th colspan="6" class="text-center">September</th>
                                <th colspan="6" class="text-center" style="background-color: yellow">Quarter 3</th>
                                <th colspan="6" class="text-center">October</th>
                                <th colspan="6" class="text-center">November</th>
                                <th colspan="6" class="text-center">December</th>
                                <th colspan="6" class="text-center" style="background-color: yellow">Quarter 4</th>
                                <th colspan="6" class="text-center" style="background-color: #FF6D6D">Total</th>
                                <th colspan="6" class="text-center" style="background-color: #7BFF6D">Average</th>
                              </tr>
                              <tr>
                                <th colspan="2" class="text-center">Actual</th>
                                <th colspan="2" class="text-center">Target</th>
                                <th colspan="2" class="text-center">Index(%)</th>
                                <th colspan="2" class="text-center">Actual</th>
                                <th colspan="2" class="text-center">Target</th>
                                <th colspan="2" class="text-center">Index(%)</th>
                                <th colspan="2" class="text-center">Actual</th>
                                <th colspan="2" class="text-center">Target</th>
                                <th colspan="2" class="text-center">Index(%)</th>
                                <th colspan="2" class="text-center" style="background-color: yellow">Actual</th>
                                <th colspan="2" class="text-center" style="background-color: yellow">Target</th>
                                <th colspan="2" class="text-center" style="background-color: yellow">Index(%)</th>
                                <th colspan="2" class="text-center">Actual</th>
                                <th colspan="2" class="text-center">Target</th>
                                <th colspan="2" class="text-center">Index(%)</th>
                                <th colspan="2" class="text-center">Actual</th>
                                <th colspan="2" class="text-center">Target</th>
                                <th colspan="2" class="text-center">Index(%)</th>
                                <th colspan="2" class="text-center">Actual</th>
                                <th colspan="2" class="text-center">Target</th>
                                <th colspan="2" class="text-center">Index(%)</th>
                                <th colspan="2" class="text-center" style="background-color: yellow">Actual</th>
                                <th colspan="2" class="text-center" style="background-color: yellow">Target</th>
                                <th colspan="2" class="text-center" style="background-color: yellow">Index(%)</th>
                                <th colspan="2" class="text-center">Actual</th>
                                <th colspan="2" class="text-center">Target</th>
                                <th colspan="2" class="text-center">Index(%)</th>
                                <th colspan="2" class="text-center">Actual</th>
                                <th colspan="2" class="text-center">Target</th>
                                <th colspan="2" class="text-center">Index(%)</th>
                                <th colspan="2" class="text-center">Actual</th>
                                <th colspan="2" class="text-center">Target</th>
                                <th colspan="2" class="text-center">Index(%)</th>
                                <th colspan="2" class="text-center" style="background-color: yellow">Actual</th>
                                <th colspan="2" class="text-center" style="background-color: yellow">Target</th>
                                <th colspan="2" class="text-center" style="background-color: yellow">Index(%)</th>
                                <th colspan="2" class="text-center">Actual</th>
                                <th colspan="2" class="text-center">Target</th>
                                <th colspan="2" class="text-center">Index(%)</th>
                                <th colspan="2" class="text-center">Actual</th>
                                <th colspan="2" class="text-center">Target</th>
                                <th colspan="2" class="text-center">Index(%)</th>
                                <th colspan="2" class="text-center">Actual</th>
                                <th colspan="2" class="text-center">Target</th>
                                <th colspan="2" class="text-center">Index(%)</th>
                                <th colspan="2" class="text-center" style="background-color: yellow">Actual</th>
                                <th colspan="2" class="text-center" style="background-color: yellow">Target</th>
                                <th colspan="2" class="text-center" style="background-color: yellow">Index(%)</th>
                                <th colspan="2" class="text-center" style="background-color: #FF6D6D">Actual</th>
                                <th colspan="2" class="text-center" style="background-color: #FF6D6D">Target</th>
                                <th colspan="2" class="text-center" style="background-color: #FF6D6D">Index(%)</th>
                                <th colspan="2" class="text-center" style="background-color: #7BFF6D">Actual</th>
                                <th colspan="2" class="text-center" style="background-color: #7BFF6D">Target</th>
                                <th colspan="2" class="text-center" style="background-color: #7BFF6D">Index(%)</th>
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
                                <th class="text-center" style="width: 15px; background-color: yellow">Qty</th>
                                <th class="text-center" style="width: 30px; background-color: yellow">Value</th>
                                <th class="text-center" style="width: 15px; background-color: yellow">Qty</th>
                                <th class="text-center" style="width: 30px; background-color: yellow">Value</th>
                                <th class="text-center" style="width: 15px; background-color: yellow">Qty</th>
                                <th class="text-center" style="width: 30px; background-color: yellow">Value</th>
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
                                <th class="text-center" style="width: 15px; background-color: yellow">Qty</th>
                                <th class="text-center" style="width: 30px; background-color: yellow">Value</th>
                                <th class="text-center" style="width: 15px; background-color: yellow">Qty</th>
                                <th class="text-center" style="width: 30px; background-color: yellow">Value</th>
                                <th class="text-center" style="width: 15px; background-color: yellow">Qty</th>
                                <th class="text-center" style="width: 30px; background-color: yellow">Value</th>
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
                                <th class="text-center" style="width: 15px; background-color: yellow">Qty</th>
                                <th class="text-center" style="width: 30px; background-color: yellow">Value</th>
                                <th class="text-center" style="width: 15px; background-color: yellow">Qty</th>
                                <th class="text-center" style="width: 30px; background-color: yellow">Value</th>
                                <th class="text-center" style="width: 15px; background-color: yellow">Qty</th>
                                <th class="text-center" style="width: 30px; background-color: yellow">Value</th>
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
                                <th class="text-center" style="width: 15px; background-color: yellow">Qty</th>
                                <th class="text-center" style="width: 30px; background-color: yellow">Value</th>
                                <th class="text-center" style="width: 15px; background-color: yellow">Qty</th>
                                <th class="text-center" style="width: 30px; background-color: yellow">Value</th>
                                <th class="text-center" style="width: 15px; background-color: yellow">Qty</th>
                                <th class="text-center" style="width: 30px; background-color: yellow">Value</th>
                                <th class="text-center" style="width: 15px; background-color: #FF6D6D">Qty</th>
                                <th class="text-center" style="width: 30px; background-color: #FF6D6D">Value</th>
                                <th class="text-center" style="width: 15px; background-color: #FF6D6D">Qty</th>
                                <th class="text-center" style="width: 30px; background-color: #FF6D6D">Value</th>
                                <th class="text-center" style="width: 15px; background-color: #FF6D6D">Qty</th>
                                <th class="text-center" style="width: 30px; background-color: #FF6D6D">Value</th>
                                <th class="text-center" style="width: 15px; background-color: #7BFF6D">Qty</th>
                                <th class="text-center" style="width: 30px; background-color: #7BFF6D">Value</th>
                                <th class="text-center" style="width: 15px; background-color: #7BFF6D">Qty</th>
                                <th class="text-center" style="width: 30px; background-color: #7BFF6D">Value</th>
                                <th class="text-center" style="width: 15px; background-color: #7BFF6D">Qty</th>
                                <th class="text-center" style="width: 30px; background-color: #7BFF6D">Value</th>
                              </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $DE_qty_jan = 0;
                                    $DE_qty_feb = 0;
                                    $DE_qty_mar = 0;
                                    $DE_qty_q1 = 0;
                                    $DE_qty_apr = 0;
                                    $DE_qty_mei = 0;
                                    $DE_qty_jun = 0;
                                    $DE_qty_q2 = 0;
                                    $DE_qty_jul = 0;
                                    $DE_qty_agu = 0;
                                    $DE_qty_sep = 0;
                                    $DE_qty_q3 = 0;
                                    $DE_qty_okt = 0;
                                    $DE_qty_nop = 0;
                                    $DE_qty_des = 0;
                                    $DE_qty_q4 = 0;

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

                                    $DE_target_qty_jan = 0;
                                    $DE_target_qty_feb = 0;
                                    $DE_target_qty_mar = 0;
                                    $DE_target_qty_q1 = 0;
                                    $DE_target_qty_apr = 0;
                                    $DE_target_qty_mei = 0;
                                    $DE_target_qty_jun = 0;
                                    $DE_target_qty_q2 = 0;
                                    $DE_target_qty_jul = 0;
                                    $DE_target_qty_agu = 0;
                                    $DE_target_qty_sep = 0;
                                    $DE_target_qty_q3 = 0;
                                    $DE_target_qty_okt = 0;
                                    $DE_target_qty_nop = 0;
                                    $DE_target_qty_des = 0;
                                    $DE_target_qty_q4 = 0;

                                    $DE_target_val_jan = 0;
                                    $DE_target_val_feb = 0;
                                    $DE_target_val_mar = 0;
                                    $DE_target_val_q1 = 0;
                                    $DE_target_val_apr = 0;
                                    $DE_target_val_mei = 0;
                                    $DE_target_val_jun = 0;
                                    $DE_target_val_q2 = 0;
                                    $DE_target_val_jul = 0;
                                    $DE_target_val_agu = 0;
                                    $DE_target_val_sep = 0;
                                    $DE_target_val_q3 = 0;
                                    $DE_target_val_okt = 0;
                                    $DE_target_val_nop = 0;
                                    $DE_target_val_des = 0;
                                    $DE_target_val_q4 = 0;

                                    $DE_idx_qty_jan = 0;
                                    $DE_idx_qty_feb = 0;
                                    $DE_idx_qty_mar = 0;
                                    $DE_idx_qty_q1 = 0;
                                    $DE_idx_qty_apr = 0;
                                    $DE_idx_qty_mei = 0;
                                    $DE_idx_qty_jun = 0;
                                    $DE_idx_qty_q2 = 0;
                                    $DE_idx_qty_jul = 0;
                                    $DE_idx_qty_agu = 0;
                                    $DE_idx_qty_sep = 0;
                                    $DE_idx_qty_q3 = 0;
                                    $DE_idx_qty_okt = 0;
                                    $DE_idx_qty_nop = 0;
                                    $DE_idx_qty_des = 0;
                                    $DE_idx_qty_q4 = 0;

                                    $DE_idx_val_jan = 0;
                                    $DE_idx_val_feb = 0;
                                    $DE_idx_val_mar = 0;
                                    $DE_idx_val_q1 = 0;
                                    $DE_idx_val_apr = 0;
                                    $DE_idx_val_mei = 0;
                                    $DE_idx_val_jun = 0;
                                    $DE_idx_val_q2 = 0;
                                    $DE_idx_val_jul = 0;
                                    $DE_idx_val_agu = 0;
                                    $DE_idx_val_sep = 0;
                                    $DE_idx_val_q3 = 0;
                                    $DE_idx_val_okt = 0;
                                    $DE_idx_val_nop = 0;
                                    $DE_idx_val_des = 0;
                                    $DE_idx_val_q4 = 0;

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
                                    <td class="text-right"><?= number_format($row['qty_jan'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_jan'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_jan'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_jan'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_jan'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_jan'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_feb'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_feb'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_feb'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_feb'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_feb'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_feb'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_mar'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_mar'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_mar'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_mar'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_mar'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_mar'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_q1'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_q1'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_q1'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_value_q1'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_q1'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_q1'], 0);?>%</td>

                                    <td class="text-right"><?= number_format($row['qty_apr'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_apr'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_apr'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_apr'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_apr'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_apr'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_mei'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_mei'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_mei'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_mei'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_mei'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_mei'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_jun'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_jun'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_jun'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_jun'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_jun'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_jun'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_q2'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_q2'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_q2'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_value_q2'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_q2'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_q2'], 0);?>%</td>

                                    <td class="text-right"><?= number_format($row['qty_jul'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_jul'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_jul'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_jul'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_jul'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_jul'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_agu'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_agu'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_agu'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_agu'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_agu'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_agu'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_sep'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_sep'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_sep'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_sep'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_sep'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_sep'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_q3'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_q3'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_q3'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_value_q3'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_q3'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_q3'], 0);?>%</td>

                                    <td class="text-right"><?= number_format($row['qty_okt'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_okt'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_okt'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_okt'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_okt'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_okt'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_nop'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_nop'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_nop'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_nop'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_nop'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_nop'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_des'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_des'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_des'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_des'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_des'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_des'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_q4'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_q4'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_q4'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_value_q4'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_q4'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_q4'], 0);?>%</td>

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

                                    <td class="text-right"><?= number_format($qty_year, 0);?></td>
                                    <td class="text-right"><?= number_format($val_year, 2);?></td>
                                    <td class="text-right"><?= number_format($target_qty_year, 0);?></td>
                                    <td class="text-right"><?= number_format($target_val_year, 2);?></td>
                                    <td class="text-right"><?= number_format($idx_qty_year, 0);?>%</td>
                                    <td class="text-right"><?= number_format($idx_val_year, 0);?>%</td>
                                    <td class="text-right"><?= number_format($qty_avg, 0);?></td>
                                    <td class="text-right"><?= number_format($val_avg, 2);?></td>
                                    <td class="text-right"><?= number_format($target_qty_avg, 0);?></td>
                                    <td class="text-right"><?= number_format($target_val_avg, 2);?></td>
                                    <td class="text-right"><?= number_format($idx_qty_avg, 0);?>%</td>
                                    <td class="text-right"><?= number_format($idx_val_avg, 0);?>%</td>
                                </tr>
                                
                                <!-- sub qty -->
                                <?php $DE_qty_jan += $row['qty_jan']; ?>
                                <?php $DE_qty_feb += $row['qty_feb']; ?>
                                <?php $DE_qty_mar += $row['qty_mar']; ?>
                                <?php $DE_qty_q1 += $row['qty_q1']; ?>

                                <?php $DE_qty_apr += $row['qty_apr']; ?>
                                <?php $DE_qty_mei += $row['qty_mei']; ?>
                                <?php $DE_qty_jun += $row['qty_jun']; ?>
                                <?php $DE_qty_q2 += $row['qty_q2']; ?>

                                <?php $DE_qty_jul += $row['qty_jul']; ?>
                                <?php $DE_qty_agu += $row['qty_agu']; ?>
                                <?php $DE_qty_sep += $row['qty_sep']; ?>
                                <?php $DE_qty_q3 += $row['qty_q3']; ?>

                                <?php $DE_qty_okt += $row['qty_okt']; ?>
                                <?php $DE_qty_nop += $row['qty_nop']; ?>
                                <?php $DE_qty_des += $row['qty_des']; ?>
                                <?php $DE_qty_q4 += $row['qty_q4']; ?>
                                
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

                                <?php $DE_target_qty_jan += $row['target_qty_jan']; ?>
                                <?php $DE_target_qty_feb += $row['target_qty_feb']; ?>
                                <?php $DE_target_qty_mar += $row['target_qty_mar']; ?>
                                <?php $DE_target_qty_q1 += $row['target_qty_q1']; ?>

                                <?php $DE_target_qty_apr += $row['target_qty_apr']; ?>
                                <?php $DE_target_qty_mei += $row['target_qty_mei']; ?>
                                <?php $DE_target_qty_jun += $row['target_qty_jun']; ?>
                                <?php $DE_target_qty_q2 += $row['target_qty_q2']; ?>

                                <?php $DE_target_qty_jul += $row['target_qty_jul']; ?>
                                <?php $DE_target_qty_agu += $row['target_qty_agu']; ?>
                                <?php $DE_target_qty_sep += $row['target_qty_sep']; ?>
                                <?php $DE_target_qty_q3 += $row['target_qty_q3']; ?>

                                <?php $DE_target_qty_okt += $row['target_qty_okt']; ?>
                                <?php $DE_target_qty_nop += $row['target_qty_nop']; ?>
                                <?php $DE_target_qty_des += $row['target_qty_des']; ?>
                                <?php $DE_target_qty_q4 += $row['target_qty_q4']; ?>
                                
                                <!-- sub val -->
                                <?php $DE_target_val_jan += $row['target_val_jan']; ?>
                                <?php $DE_target_val_feb += $row['target_val_feb']; ?>
                                <?php $DE_target_val_mar += $row['target_val_mar']; ?>
                                <?php $DE_target_val_q1 += $row['target_value_q1']; ?>

                                <?php $DE_target_val_apr += $row['target_val_apr']; ?>
                                <?php $DE_target_val_mei += $row['target_val_mei']; ?>
                                <?php $DE_target_val_jun += $row['target_val_jun']; ?>
                                <?php $DE_target_val_q2 += $row['target_value_q2']; ?>

                                <?php $DE_target_val_jul += $row['target_val_jul']; ?>
                                <?php $DE_target_val_agu += $row['target_val_agu']; ?>
                                <?php $DE_target_val_sep += $row['target_val_sep']; ?>
                                <?php $DE_target_val_q3 += $row['target_value_q3']; ?>

                                <?php $DE_target_val_okt += $row['target_val_okt']; ?>
                                <?php $DE_target_val_nop += $row['target_val_nop']; ?>
                                <?php $DE_target_val_des += $row['target_val_des']; ?>
                                <?php $DE_target_val_q4 += $row['target_value_q4']; ?>

                                <?php $DE_idx_qty_jan = ($DE_qty_jan/($DE_target_qty_jan ?: 1))*100; ?>
                                <?php $DE_idx_qty_feb = ($DE_qty_feb/($DE_target_qty_feb ?: 1))*100; ?>
                                <?php $DE_idx_qty_mar = ($DE_qty_mar/($DE_target_qty_mar ?: 1))*100; ?>
                                <?php $DE_idx_qty_q1 = ($DE_qty_q1/($DE_target_qty_q1 ?: 1))*100; ?>

                                <?php $DE_idx_qty_apr = ($DE_qty_apr/($DE_target_qty_apr ?: 1))*100; ?>
                                <?php $DE_idx_qty_mei = ($DE_qty_mei/($DE_target_qty_mei ?: 1))*100; ?>
                                <?php $DE_idx_qty_jun = ($DE_qty_jun/($DE_target_qty_jun ?: 1))*100; ?>
                                <?php $DE_idx_qty_q2 = ($DE_qty_q2/($DE_target_qty_q2 ?: 1))*100; ?>

                                <?php $DE_idx_qty_jul = ($DE_qty_jul/($DE_target_qty_jul ?: 1))*100; ?>
                                <?php $DE_idx_qty_agu = ($DE_qty_agu/($DE_target_qty_agu ?: 1))*100; ?>
                                <?php $DE_idx_qty_sep = ($DE_qty_sep/($DE_target_qty_sep ?: 1))*100; ?>
                                <?php $DE_idx_qty_q3 = ($DE_qty_q3/($DE_target_qty_q3 ?: 1))*100; ?>

                                <?php $DE_idx_qty_okt = ($DE_qty_okt/($DE_target_qty_okt ?: 1))*100; ?>
                                <?php $DE_idx_qty_nop = ($DE_qty_nop/($DE_target_qty_nop ?: 1))*100; ?>
                                <?php $DE_idx_qty_des = ($DE_qty_des/($DE_target_qty_des ?: 1))*100; ?>
                                <?php $DE_idx_qty_q4 = ($DE_qty_q4/($DE_target_qty_q4 ?: 1))*100; ?>
                                
                                <!-- sub val -->
                                <?php $DE_idx_val_jan = ($DE_val_jan/($DE_target_val_jan ?: 1))*100; ?>
                                <?php $DE_idx_val_feb = ($DE_val_feb/($DE_target_val_feb ?: 1))*100; ?>
                                <?php $DE_idx_val_mar = ($DE_val_mar/($DE_target_val_mar ?: 1))*100; ?>
                                <?php $DE_idx_val_q1 = ($DE_val_q1/($DE_target_val_q1 ?: 1))*100; ?>

                                <?php $DE_idx_val_apr = ($DE_val_apr/($DE_target_val_apr ?: 1))*100; ?>
                                <?php $DE_idx_val_mei = ($DE_val_mei/($DE_target_val_mei ?: 1))*100; ?>
                                <?php $DE_idx_val_jun = ($DE_val_jun/($DE_target_val_jun ?: 1))*100; ?>
                                <?php $DE_idx_val_q2 = ($DE_val_q2/($DE_target_val_q2 ?: 1))*100; ?>

                                <?php $DE_idx_val_jul = ($DE_val_jul/($DE_target_val_jul ?: 1))*100; ?>
                                <?php $DE_idx_val_agu = ($DE_val_agu/($DE_target_val_agu ?: 1))*100; ?>
                                <?php $DE_idx_val_sep = ($DE_val_sep/($DE_target_val_sep ?: 1))*100; ?>
                                <?php $DE_idx_val_q3 = ($DE_val_q3/($DE_target_val_q3 ?: 1))*100; ?>

                                <?php $DE_idx_val_okt = ($DE_val_okt/($DE_target_val_okt ?: 1))*100; ?>
                                <?php $DE_idx_val_nop = ($DE_val_nop/($DE_target_val_nop ?: 1))*100; ?>
                                <?php $DE_idx_val_des = ($DE_val_des/($DE_target_val_des ?: 1))*100; ?>
                                <?php $DE_idx_val_q4 = ($DE_val_q4/($DE_target_val_q4 ?: 1))*100; ?>

                                
                                <?php $principal = $row['principal']; ?>
                                <?php $group_sku = $row['item_group']; ?>
                                <?php $no++; endforeach; ?>

                                <?php $DE_qty_year = $DE_qty_jan + $DE_qty_feb + $DE_qty_mar + $DE_qty_apr + $DE_qty_mei + $DE_qty_jun + $DE_qty_jul + $DE_qty_agu + $DE_qty_sep + $DE_qty_okt + $DE_qty_nop + $DE_qty_des;?>
                                <?php $DE_val_year = $DE_val_jan + $DE_val_feb + $DE_val_mar + $DE_val_apr + $DE_val_mei + $DE_val_jun + $DE_val_jul + $DE_val_agu + $DE_val_sep + $DE_val_okt + $DE_val_nop + $DE_val_des;?>
                                <?php $DE_target_qty_year = $DE_target_qty_jan + $DE_target_qty_feb + $DE_target_qty_mar + $DE_target_qty_apr + $DE_target_qty_mei + $DE_target_qty_jun + $DE_target_qty_jul + $DE_target_qty_agu + $DE_target_qty_sep + $DE_target_qty_okt + $DE_target_qty_nop + $DE_target_qty_des;?> 
                                <?php $DE_target_val_year = $DE_target_val_jan + $DE_target_val_feb + $DE_target_val_mar + $DE_target_val_apr + $DE_target_val_mei + $DE_target_val_jun + $DE_target_val_jul + $DE_target_val_agu + $DE_target_val_sep + $DE_target_val_okt + $DE_target_val_nop + $DE_target_val_des;?>
                                <?php $DE_idx_qty_year = ($DE_qty_year/($DE_target_qty_year ?: 1))*100;?> 
                                <?php $DE_idx_val_year = ($DE_val_year/($DE_target_val_year ?: 1))*100;?> 
                                <?php $DE_qty_avg = $DE_qty_year/12;?>
                                <?php $DE_val_avg = $DE_val_year/12;?>
                                <?php $DE_target_qty_avg = $DE_target_qty_year/12;?>
                                <?php $DE_target_val_avg = $DE_target_val_year/12;?>
                                <?php $DE_idx_qty_avg = ($DE_qty_avg/($DE_target_qty_avg ?: 1))*100;?>
                                <?php $DE_idx_val_avg = ($DE_val_avg/($DE_target_val_avg ?: 1))*100;?>
                                
                                <tr class="table-warning" style="font-weight:bold">
                                    <td></td>
                                    <td><?= $principal;?></td>
                                    <td><?= $group_sku;?></td>
                                    <td></td>
                                    <td class="text-center">Sub Total <?= $group_sku;?></td>
                                    <td></td>
                                    <td class="text-right"><?= number_format($DE_qty_jan, 0);?></td>
                                    <td class="text-right"><?= number_format($DE_val_jan, 2);?></td>
                                    <td class="text-right"><?= number_format($DE_target_qty_jan, 0);?></td>
                                    <td class="text-right"><?= number_format($DE_target_val_jan, 2);?></td>
                                    <td class="text-right"><?= number_format($DE_idx_qty_jan, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DE_idx_val_jan, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DE_qty_feb, 0);?></td>
                                    <td class="text-right"><?= number_format($DE_val_feb, 2);?></td>
                                    <td class="text-right"><?= number_format($DE_target_qty_feb, 0);?></td>
                                    <td class="text-right"><?= number_format($DE_target_val_feb, 2);?></td>
                                    <td class="text-right"><?= number_format($DE_idx_qty_feb, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DE_idx_val_feb, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DE_qty_mar, 0);?></td>
                                    <td class="text-right"><?= number_format($DE_val_mar, 2);?></td>
                                    <td class="text-right"><?= number_format($DE_target_qty_mar, 0);?></td>
                                    <td class="text-right"><?= number_format($DE_target_val_mar, 2);?></td>
                                    <td class="text-right"><?= number_format($DE_idx_qty_mar, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DE_idx_val_mar, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DE_qty_q1, 0);?></td>
                                    <td class="text-right"><?= number_format($DE_val_q1, 2);?></td>
                                    <td class="text-right"><?= number_format($DE_target_qty_q1, 0);?></td>
                                    <td class="text-right"><?= number_format($DE_target_val_q1, 2);?></td>
                                    <td class="text-right"><?= number_format($DE_idx_qty_q1, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DE_idx_val_q1, 0);?>%</td>

                                    <td class="text-right"><?= number_format($DE_qty_apr, 0);?></td>
                                    <td class="text-right"><?= number_format($DE_val_apr, 2);?></td>
                                    <td class="text-right"><?= number_format($DE_target_qty_apr, 0);?></td>
                                    <td class="text-right"><?= number_format($DE_target_val_apr, 2);?></td>
                                    <td class="text-right"><?= number_format($DE_idx_qty_apr, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DE_idx_val_apr, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DE_qty_mei, 0);?></td>
                                    <td class="text-right"><?= number_format($DE_val_mei, 2);?></td>
                                    <td class="text-right"><?= number_format($DE_target_qty_mei, 0);?></td>
                                    <td class="text-right"><?= number_format($DE_target_val_mei, 2);?></td>
                                    <td class="text-right"><?= number_format($DE_idx_qty_mei, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DE_idx_val_mei, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DE_qty_jun, 0);?></td>
                                    <td class="text-right"><?= number_format($DE_val_jun, 2);?></td>
                                    <td class="text-right"><?= number_format($DE_target_qty_jun, 0);?></td>
                                    <td class="text-right"><?= number_format($DE_target_val_jun, 2);?></td>
                                    <td class="text-right"><?= number_format($DE_idx_qty_jun, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DE_idx_val_jun, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DE_qty_q2, 0);?></td>
                                    <td class="text-right"><?= number_format($DE_val_q2, 2);?></td>
                                    <td class="text-right"><?= number_format($DE_target_qty_q2, 0);?></td>
                                    <td class="text-right"><?= number_format($DE_target_val_q2, 2);?></td>
                                    <td class="text-right"><?= number_format($DE_idx_qty_q2, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DE_idx_val_q2, 0);?>%</td>

                                    <td class="text-right"><?= number_format($DE_qty_jul, 0);?></td>
                                    <td class="text-right"><?= number_format($DE_val_jul, 2);?></td>
                                    <td class="text-right"><?= number_format($DE_target_qty_jul, 0);?></td>
                                    <td class="text-right"><?= number_format($DE_target_val_jul, 2);?></td>
                                    <td class="text-right"><?= number_format($DE_idx_qty_jul, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DE_idx_val_jul, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DE_qty_agu, 0);?></td>
                                    <td class="text-right"><?= number_format($DE_val_agu, 2);?></td>
                                    <td class="text-right"><?= number_format($DE_target_qty_agu, 0);?></td>
                                    <td class="text-right"><?= number_format($DE_target_val_agu, 2);?></td>
                                    <td class="text-right"><?= number_format($DE_idx_qty_agu, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DE_idx_val_agu, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DE_qty_sep, 0);?></td>
                                    <td class="text-right"><?= number_format($DE_val_sep, 2);?></td>
                                    <td class="text-right"><?= number_format($DE_target_qty_sep, 0);?></td>
                                    <td class="text-right"><?= number_format($DE_target_val_sep, 2);?></td>
                                    <td class="text-right"><?= number_format($DE_idx_qty_sep, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DE_idx_val_sep, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DE_qty_q3, 0);?></td>
                                    <td class="text-right"><?= number_format($DE_val_q3, 2);?></td>
                                    <td class="text-right"><?= number_format($DE_target_qty_q3, 0);?></td>
                                    <td class="text-right"><?= number_format($DE_target_val_q3, 2);?></td>
                                    <td class="text-right"><?= number_format($DE_idx_qty_q3, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DE_idx_val_q3, 0);?>%</td>

                                    <td class="text-right"><?= number_format($DE_qty_okt, 0);?></td>
                                    <td class="text-right"><?= number_format($DE_val_okt, 2);?></td>
                                    <td class="text-right"><?= number_format($DE_target_qty_okt, 0);?></td>
                                    <td class="text-right"><?= number_format($DE_target_val_okt, 2);?></td>
                                    <td class="text-right"><?= number_format($DE_idx_qty_okt, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DE_idx_val_okt, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DE_qty_nop, 0);?></td>
                                    <td class="text-right"><?= number_format($DE_val_nop, 2);?></td>
                                    <td class="text-right"><?= number_format($DE_target_qty_nop, 0);?></td>
                                    <td class="text-right"><?= number_format($DE_target_val_nop, 2);?></td>
                                    <td class="text-right"><?= number_format($DE_idx_qty_nop, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DE_idx_val_nop, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DE_qty_des, 0);?></td>
                                    <td class="text-right"><?= number_format($DE_val_des, 2);?></td>
                                    <td class="text-right"><?= number_format($DE_target_qty_des, 0);?></td>
                                    <td class="text-right"><?= number_format($DE_target_val_des, 2);?></td>
                                    <td class="text-right"><?= number_format($DE_idx_qty_des, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DE_idx_val_des, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DE_qty_q4, 0);?></td>
                                    <td class="text-right"><?= number_format($DE_val_q4, 2);?></td>
                                    <td class="text-right"><?= number_format($DE_target_qty_q4, 0);?></td>
                                    <td class="text-right"><?= number_format($DE_target_val_q4, 2);?></td>
                                    <td class="text-right"><?= number_format($DE_idx_qty_q4, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DE_idx_val_q4, 0);?>%</td>

                                    <td class="text-right"><?= number_format($DE_qty_year, 0);?></td>
                                    <td class="text-right"><?= number_format($DE_val_year, 2);?></td>
                                    <td class="text-right"><?= number_format($DE_target_qty_year, 0);?></td>
                                    <td class="text-right"><?= number_format($DE_target_val_year, 2);?></td>
                                    <td class="text-right"><?= number_format($DE_idx_qty_year, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DE_idx_val_year, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DE_qty_avg, 0);?></td>
                                    <td class="text-right"><?= number_format($DE_val_avg, 2);?></td>
                                    <td class="text-right"><?= number_format($DE_target_qty_avg, 0);?></td>
                                    <td class="text-right"><?= number_format($DE_target_val_avg, 2);?></td>
                                    <td class="text-right"><?= number_format($DE_idx_qty_avg, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DE_idx_val_avg, 0);?>%</td>

                                </tr>

                                <!-- Disposables -->
                                <?php
                                    $DP_qty_jan = 0;
                                    $DP_qty_feb = 0;
                                    $DP_qty_mar = 0;
                                    $DP_qty_q1 = 0;
                                    $DP_qty_apr = 0;
                                    $DP_qty_mei = 0;
                                    $DP_qty_jun = 0;
                                    $DP_qty_q2 = 0;
                                    $DP_qty_jul = 0;
                                    $DP_qty_agu = 0;
                                    $DP_qty_sep = 0;
                                    $DP_qty_q3 = 0;
                                    $DP_qty_okt = 0;
                                    $DP_qty_nop = 0;
                                    $DP_qty_des = 0;
                                    $DP_qty_q4 = 0;

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

                                    $DP_target_qty_jan = 0;
                                    $DP_target_qty_feb = 0;
                                    $DP_target_qty_mar = 0;
                                    $DP_target_qty_q1 = 0;
                                    $DP_target_qty_apr = 0;
                                    $DP_target_qty_mei = 0;
                                    $DP_target_qty_jun = 0;
                                    $DP_target_qty_q2 = 0;
                                    $DP_target_qty_jul = 0;
                                    $DP_target_qty_agu = 0;
                                    $DP_target_qty_sep = 0;
                                    $DP_target_qty_q3 = 0;
                                    $DP_target_qty_okt = 0;
                                    $DP_target_qty_nop = 0;
                                    $DP_target_qty_des = 0;
                                    $DP_target_qty_q4 = 0;

                                    $DP_target_val_jan = 0;
                                    $DP_target_val_feb = 0;
                                    $DP_target_val_mar = 0;
                                    $DP_target_val_q1 = 0;
                                    $DP_target_val_apr = 0;
                                    $DP_target_val_mei = 0;
                                    $DP_target_val_jun = 0;
                                    $DP_target_val_q2 = 0;
                                    $DP_target_val_jul = 0;
                                    $DP_target_val_agu = 0;
                                    $DP_target_val_sep = 0;
                                    $DP_target_val_q3 = 0;
                                    $DP_target_val_okt = 0;
                                    $DP_target_val_nop = 0;
                                    $DP_target_val_des = 0;
                                    $DP_target_val_q4 = 0;

                                    $DP_idx_qty_jan = 0;
                                    $DP_idx_qty_feb = 0;
                                    $DP_idx_qty_mar = 0;
                                    $DP_idx_qty_q1 = 0;
                                    $DP_idx_qty_apr = 0;
                                    $DP_idx_qty_mei = 0;
                                    $DP_idx_qty_jun = 0;
                                    $DP_idx_qty_q2 = 0;
                                    $DP_idx_qty_jul = 0;
                                    $DP_idx_qty_agu = 0;
                                    $DP_idx_qty_sep = 0;
                                    $DP_idx_qty_q3 = 0;
                                    $DP_idx_qty_okt = 0;
                                    $DP_idx_qty_nop = 0;
                                    $DP_idx_qty_des = 0;
                                    $DP_idx_qty_q4 = 0;

                                    $DP_idx_val_jan = 0;
                                    $DP_idx_val_feb = 0;
                                    $DP_idx_val_mar = 0;
                                    $DP_idx_val_q1 = 0;
                                    $DP_idx_val_apr = 0;
                                    $DP_idx_val_mei = 0;
                                    $DP_idx_val_jun = 0;
                                    $DP_idx_val_q2 = 0;
                                    $DP_idx_val_jul = 0;
                                    $DP_idx_val_agu = 0;
                                    $DP_idx_val_sep = 0;
                                    $DP_idx_val_q3 = 0;
                                    $DP_idx_val_okt = 0;
                                    $DP_idx_val_nop = 0;
                                    $DP_idx_val_des = 0;
                                    $DP_idx_val_q4 = 0;
                                ?>
                                <?php foreach ($data['sellingout_Disposables'] as $row) :?>
                                <tr>
                                    <td class="text-center"><?= $no; ?></td>
                                    <td><?= $row['principal'];?></td>
                                    <td><?= $row['item_group'];?></td>
                                    <td><?= $row['item_code'];?></td>
                                    <td><?= $row['item_name'];?></td>
                                    <td class="text-center"><?= $row['unit'];?></td>
                                    <td class="text-right"><?= number_format($row['qty_jan'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_jan'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_jan'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_jan'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_jan'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_jan'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_feb'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_feb'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_feb'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_feb'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_feb'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_feb'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_mar'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_mar'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_mar'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_mar'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_mar'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_mar'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_q1'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_q1'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_q1'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_value_q1'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_q1'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_q1'], 0);?>%</td>

                                    <td class="text-right"><?= number_format($row['qty_apr'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_apr'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_apr'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_apr'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_apr'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_apr'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_mei'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_mei'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_mei'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_mei'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_mei'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_mei'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_jun'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_jun'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_jun'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_jun'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_jun'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_jun'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_q2'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_q2'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_q2'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_value_q2'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_q2'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_q2'], 0);?>%</td>

                                    <td class="text-right"><?= number_format($row['qty_jul'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_jul'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_jul'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_jul'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_jul'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_jul'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_agu'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_agu'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_agu'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_agu'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_agu'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_agu'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_sep'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_sep'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_sep'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_sep'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_sep'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_sep'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_q3'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_q3'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_q3'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_value_q3'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_q3'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_q3'], 0);?>%</td>

                                    <td class="text-right"><?= number_format($row['qty_okt'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_okt'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_okt'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_okt'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_okt'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_okt'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_nop'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_nop'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_nop'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_nop'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_nop'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_nop'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_des'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_des'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_des'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_des'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_des'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_des'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_q4'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_q4'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_q4'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_value_q4'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_q4'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_q4'], 0);?>%</td>

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

                                    <td class="text-right"><?= number_format($qty_year, 0);?></td>
                                    <td class="text-right"><?= number_format($val_year, 2);?></td>
                                    <td class="text-right"><?= number_format($target_qty_year, 0);?></td>
                                    <td class="text-right"><?= number_format($target_val_year, 2);?></td>
                                    <td class="text-right"><?= number_format($idx_qty_year, 0);?>%</td>
                                    <td class="text-right"><?= number_format($idx_val_year, 0);?>%</td>
                                    <td class="text-right"><?= number_format($qty_avg, 0);?></td>
                                    <td class="text-right"><?= number_format($val_avg, 2);?></td>
                                    <td class="text-right"><?= number_format($target_qty_avg, 0);?></td>
                                    <td class="text-right"><?= number_format($target_val_avg, 2);?></td>
                                    <td class="text-right"><?= number_format($idx_qty_avg, 0);?>%</td>
                                    <td class="text-right"><?= number_format($idx_val_avg, 0);?>%</td>
                                </tr>
                                
                                <!-- sub qty -->
                                <?php $DP_qty_jan += $row['qty_jan']; ?>
                                <?php $DP_qty_feb += $row['qty_feb']; ?>
                                <?php $DP_qty_mar += $row['qty_mar']; ?>
                                <?php $DP_qty_q1 += $row['qty_q1']; ?>

                                <?php $DP_qty_apr += $row['qty_apr']; ?>
                                <?php $DP_qty_mei += $row['qty_mei']; ?>
                                <?php $DP_qty_jun += $row['qty_jun']; ?>
                                <?php $DP_qty_q2 += $row['qty_q2']; ?>

                                <?php $DP_qty_jul += $row['qty_jul']; ?>
                                <?php $DP_qty_agu += $row['qty_agu']; ?>
                                <?php $DP_qty_sep += $row['qty_sep']; ?>
                                <?php $DP_qty_q3 += $row['qty_q3']; ?>

                                <?php $DP_qty_okt += $row['qty_okt']; ?>
                                <?php $DP_qty_nop += $row['qty_nop']; ?>
                                <?php $DP_qty_des += $row['qty_des']; ?>
                                <?php $DP_qty_q4 += $row['qty_q4']; ?>
                                
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

                                <?php $DP_target_qty_jan += $row['target_qty_jan']; ?>
                                <?php $DP_target_qty_feb += $row['target_qty_feb']; ?>
                                <?php $DP_target_qty_mar += $row['target_qty_mar']; ?>
                                <?php $DP_target_qty_q1 += $row['target_qty_q1']; ?>

                                <?php $DP_target_qty_apr += $row['target_qty_apr']; ?>
                                <?php $DP_target_qty_mei += $row['target_qty_mei']; ?>
                                <?php $DP_target_qty_jun += $row['target_qty_jun']; ?>
                                <?php $DP_target_qty_q2 += $row['target_qty_q2']; ?>

                                <?php $DP_target_qty_jul += $row['target_qty_jul']; ?>
                                <?php $DP_target_qty_agu += $row['target_qty_agu']; ?>
                                <?php $DP_target_qty_sep += $row['target_qty_sep']; ?>
                                <?php $DP_target_qty_q3 += $row['target_qty_q3']; ?>

                                <?php $DP_target_qty_okt += $row['target_qty_okt']; ?>
                                <?php $DP_target_qty_nop += $row['target_qty_nop']; ?>
                                <?php $DP_target_qty_des += $row['target_qty_des']; ?>
                                <?php $DP_target_qty_q4 += $row['target_qty_q4']; ?>
                                
                                <!-- sub val -->
                                <?php $DP_target_val_jan += $row['target_val_jan']; ?>
                                <?php $DP_target_val_feb += $row['target_val_feb']; ?>
                                <?php $DP_target_val_mar += $row['target_val_mar']; ?>
                                <?php $DP_target_val_q1 += $row['target_value_q1']; ?>

                                <?php $DP_target_val_apr += $row['target_val_apr']; ?>
                                <?php $DP_target_val_mei += $row['target_val_mei']; ?>
                                <?php $DP_target_val_jun += $row['target_val_jun']; ?>
                                <?php $DP_target_val_q2 += $row['target_value_q2']; ?>

                                <?php $DP_target_val_jul += $row['target_val_jul']; ?>
                                <?php $DP_target_val_agu += $row['target_val_agu']; ?>
                                <?php $DP_target_val_sep += $row['target_val_sep']; ?>
                                <?php $DP_target_val_q3 += $row['target_value_q3']; ?>

                                <?php $DP_target_val_okt += $row['target_val_okt']; ?>
                                <?php $DP_target_val_nop += $row['target_val_nop']; ?>
                                <?php $DP_target_val_des += $row['target_val_des']; ?>
                                <?php $DP_target_val_q4 += $row['target_value_q4']; ?>

                                <?php $DP_idx_qty_jan = ($DP_qty_jan/($DP_target_qty_jan ?: 1))*100; ?>
                                <?php $DP_idx_qty_feb = ($DP_qty_feb/($DP_target_qty_feb ?: 1))*100; ?>
                                <?php $DP_idx_qty_mar = ($DP_qty_mar/($DP_target_qty_mar ?: 1))*100; ?>
                                <?php $DP_idx_qty_q1 = ($DP_qty_q1/($DP_target_qty_q1 ?: 1))*100; ?>

                                <?php $DP_idx_qty_apr = ($DP_qty_apr/($DP_target_qty_apr ?: 1))*100; ?>
                                <?php $DP_idx_qty_mei = ($DP_qty_mei/($DP_target_qty_mei ?: 1))*100; ?>
                                <?php $DP_idx_qty_jun = ($DP_qty_jun/($DP_target_qty_jun ?: 1))*100; ?>
                                <?php $DP_idx_qty_q2 = ($DP_qty_q2/($DP_target_qty_q2 ?: 1))*100; ?>

                                <?php $DP_idx_qty_jul = ($DP_qty_jul/($DP_target_qty_jul ?: 1))*100; ?>
                                <?php $DP_idx_qty_agu = ($DP_qty_agu/($DP_target_qty_agu ?: 1))*100; ?>
                                <?php $DP_idx_qty_sep = ($DP_qty_sep/($DP_target_qty_sep ?: 1))*100; ?>
                                <?php $DP_idx_qty_q3 = ($DP_qty_q3/($DP_target_qty_q3 ?: 1))*100; ?>

                                <?php $DP_idx_qty_okt = ($DP_qty_okt/($DP_target_qty_okt ?: 1))*100; ?>
                                <?php $DP_idx_qty_nop = ($DP_qty_nop/($DP_target_qty_nop ?: 1))*100; ?>
                                <?php $DP_idx_qty_des = ($DP_qty_des/($DP_target_qty_des ?: 1))*100; ?>
                                <?php $DP_idx_qty_q4 = ($DP_qty_q4/($DP_target_qty_q4 ?: 1))*100; ?>
                                
                                <!-- sub val -->
                                <?php $DP_idx_val_jan = ($DP_val_jan/($DP_target_val_jan ?: 1))*100; ?>
                                <?php $DP_idx_val_feb = ($DP_val_feb/($DP_target_val_feb ?: 1))*100; ?>
                                <?php $DP_idx_val_mar = ($DP_val_mar/($DP_target_val_mar ?: 1))*100; ?>
                                <?php $DP_idx_val_q1 = ($DP_val_q1/($DP_target_val_q1 ?: 1))*100; ?>

                                <?php $DP_idx_val_apr = ($DP_val_apr/($DP_target_val_apr ?: 1))*100; ?>
                                <?php $DP_idx_val_mei = ($DP_val_mei/($DP_target_val_mei ?: 1))*100; ?>
                                <?php $DP_idx_val_jun = ($DP_val_jun/($DP_target_val_jun ?: 1))*100; ?>
                                <?php $DP_idx_val_q2 = ($DP_val_q2/($DP_target_val_q2 ?: 1))*100; ?>

                                <?php $DP_idx_val_jul = ($DP_val_jul/($DP_target_val_jul ?: 1))*100; ?>
                                <?php $DP_idx_val_agu = ($DP_val_agu/($DP_target_val_agu ?: 1))*100; ?>
                                <?php $DP_idx_val_sep = ($DP_val_sep/($DP_target_val_sep ?: 1))*100; ?>
                                <?php $DP_idx_val_q3 = ($DP_val_q3/($DP_target_val_q3 ?: 1))*100; ?>

                                <?php $DP_idx_val_okt = ($DP_val_okt/($DP_target_val_okt ?: 1))*100; ?>
                                <?php $DP_idx_val_nop = ($DP_val_nop/($DP_target_val_nop ?: 1))*100; ?>
                                <?php $DP_idx_val_des = ($DP_val_des/($DP_target_val_des ?: 1))*100; ?>
                                <?php $DP_idx_val_q4 = ($DP_val_q4/($DP_target_val_q4 ?: 1))*100; ?>
                                
                                <?php $principal = $row['principal']; ?>
                                <?php $group_sku = $row['item_group']; ?>
                                <?php $no++; endforeach; ?>

                                <?php $DP_qty_year = $DP_qty_jan + $DP_qty_feb + $DP_qty_mar + $DP_qty_apr + $DP_qty_mei + $DP_qty_jun + $DP_qty_jul + $DP_qty_agu + $DP_qty_sep + $DP_qty_okt + $DP_qty_nop + $DP_qty_des;?>
                                <?php $DP_val_year = $DP_val_jan + $DP_val_feb + $DP_val_mar + $DP_val_apr + $DP_val_mei + $DP_val_jun + $DP_val_jul + $DP_val_agu + $DP_val_sep + $DP_val_okt + $DP_val_nop + $DP_val_des;?>
                                <?php $DP_target_qty_year = $DP_target_qty_jan + $DP_target_qty_feb + $DP_target_qty_mar + $DP_target_qty_apr + $DP_target_qty_mei + $DP_target_qty_jun + $DP_target_qty_jul + $DP_target_qty_agu + $DP_target_qty_sep + $DP_target_qty_okt + $DP_target_qty_nop + $DP_target_qty_des;?> 
                                <?php $DP_target_val_year = $DP_target_val_jan + $DP_target_val_feb + $DP_target_val_mar + $DP_target_val_apr + $DP_target_val_mei + $DP_target_val_jun + $DP_target_val_jul + $DP_target_val_agu + $DP_target_val_sep + $DP_target_val_okt + $DP_target_val_nop + $DP_target_val_des;?>
                                <?php $DP_idx_qty_year = ($DP_qty_year/($DP_target_qty_year ?: 1))*100;?> 
                                <?php $DP_idx_val_year = ($DP_val_year/($DP_target_val_year ?: 1))*100;?> 
                                <?php $DP_qty_avg = $DP_qty_year/12;?>
                                <?php $DP_val_avg = $DP_val_year/12;?>
                                <?php $DP_target_qty_avg = $DP_target_qty_year/12;?>
                                <?php $DP_target_val_avg = $DP_target_val_year/12;?>
                                <?php $DP_idx_qty_avg = ($DP_qty_avg/($DP_target_qty_avg ?: 1))*100;?>
                                <?php $DP_idx_val_avg = ($DP_val_avg/($DP_target_val_avg ?: 1))*100;?>
                                
                                <tr class="table-warning" style="font-weight:bold">
                                    <td></td>
                                    <td><?= $principal;?></td>
                                    <td><?= $group_sku;?></td>
                                    <td></td>
                                    <td class="text-center">Sub Total <?= $group_sku;?></td>
                                    <td></td>
                                    <td class="text-right"><?= number_format($DP_qty_jan, 0);?></td>
                                    <td class="text-right"><?= number_format($DP_val_jan, 2);?></td>
                                    <td class="text-right"><?= number_format($DP_target_qty_jan, 0);?></td>
                                    <td class="text-right"><?= number_format($DP_target_val_jan, 2);?></td>
                                    <td class="text-right"><?= number_format($DP_idx_qty_jan, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DP_idx_val_jan, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DP_qty_feb, 0);?></td>
                                    <td class="text-right"><?= number_format($DP_val_feb, 2);?></td>
                                    <td class="text-right"><?= number_format($DP_target_qty_feb, 0);?></td>
                                    <td class="text-right"><?= number_format($DP_target_val_feb, 2);?></td>
                                    <td class="text-right"><?= number_format($DP_idx_qty_feb, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DP_idx_val_feb, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DP_qty_mar, 0);?></td>
                                    <td class="text-right"><?= number_format($DP_val_mar, 2);?></td>
                                    <td class="text-right"><?= number_format($DP_target_qty_mar, 0);?></td>
                                    <td class="text-right"><?= number_format($DP_target_val_mar, 2);?></td>
                                    <td class="text-right"><?= number_format($DP_idx_qty_mar, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DP_idx_val_mar, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DP_qty_q1, 0);?></td>
                                    <td class="text-right"><?= number_format($DP_val_q1, 2);?></td>
                                    <td class="text-right"><?= number_format($DP_target_qty_q1, 0);?></td>
                                    <td class="text-right"><?= number_format($DP_target_val_q1, 2);?></td>
                                    <td class="text-right"><?= number_format($DP_idx_qty_q1, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DP_idx_val_q1, 0);?>%</td>

                                    <td class="text-right"><?= number_format($DP_qty_apr, 0);?></td>
                                    <td class="text-right"><?= number_format($DP_val_apr, 2);?></td>
                                    <td class="text-right"><?= number_format($DP_target_qty_apr, 0);?></td>
                                    <td class="text-right"><?= number_format($DP_target_val_apr, 2);?></td>
                                    <td class="text-right"><?= number_format($DP_idx_qty_apr, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DP_idx_val_apr, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DP_qty_mei, 0);?></td>
                                    <td class="text-right"><?= number_format($DP_val_mei, 2);?></td>
                                    <td class="text-right"><?= number_format($DP_target_qty_mei, 0);?></td>
                                    <td class="text-right"><?= number_format($DP_target_val_mei, 2);?></td>
                                    <td class="text-right"><?= number_format($DP_idx_qty_mei, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DP_idx_val_mei, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DP_qty_jun, 0);?></td>
                                    <td class="text-right"><?= number_format($DP_val_jun, 2);?></td>
                                    <td class="text-right"><?= number_format($DP_target_qty_jun, 0);?></td>
                                    <td class="text-right"><?= number_format($DP_target_val_jun, 2);?></td>
                                    <td class="text-right"><?= number_format($DP_idx_qty_jun, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DP_idx_val_jun, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DP_qty_q2, 0);?></td>
                                    <td class="text-right"><?= number_format($DP_val_q2, 2);?></td>
                                    <td class="text-right"><?= number_format($DP_target_qty_q2, 0);?></td>
                                    <td class="text-right"><?= number_format($DP_target_val_q2, 2);?></td>
                                    <td class="text-right"><?= number_format($DP_idx_qty_q2, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DP_idx_val_q2, 0);?>%</td>

                                    <td class="text-right"><?= number_format($DP_qty_jul, 0);?></td>
                                    <td class="text-right"><?= number_format($DP_val_jul, 2);?></td>
                                    <td class="text-right"><?= number_format($DP_target_qty_jul, 0);?></td>
                                    <td class="text-right"><?= number_format($DP_target_val_jul, 2);?></td>
                                    <td class="text-right"><?= number_format($DP_idx_qty_jul, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DP_idx_val_jul, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DP_qty_agu, 0);?></td>
                                    <td class="text-right"><?= number_format($DP_val_agu, 2);?></td>
                                    <td class="text-right"><?= number_format($DP_target_qty_agu, 0);?></td>
                                    <td class="text-right"><?= number_format($DP_target_val_agu, 2);?></td>
                                    <td class="text-right"><?= number_format($DP_idx_qty_agu, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DP_idx_val_agu, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DP_qty_sep, 0);?></td>
                                    <td class="text-right"><?= number_format($DP_val_sep, 2);?></td>
                                    <td class="text-right"><?= number_format($DP_target_qty_sep, 0);?></td>
                                    <td class="text-right"><?= number_format($DP_target_val_sep, 2);?></td>
                                    <td class="text-right"><?= number_format($DP_idx_qty_sep, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DP_idx_val_sep, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DP_qty_q3, 0);?></td>
                                    <td class="text-right"><?= number_format($DP_val_q3, 2);?></td>
                                    <td class="text-right"><?= number_format($DP_target_qty_q3, 0);?></td>
                                    <td class="text-right"><?= number_format($DP_target_val_q3, 2);?></td>
                                    <td class="text-right"><?= number_format($DP_idx_qty_q3, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DP_idx_val_q3, 0);?>%</td>

                                    <td class="text-right"><?= number_format($DP_qty_okt, 0);?></td>
                                    <td class="text-right"><?= number_format($DP_val_okt, 2);?></td>
                                    <td class="text-right"><?= number_format($DP_target_qty_okt, 0);?></td>
                                    <td class="text-right"><?= number_format($DP_target_val_okt, 2);?></td>
                                    <td class="text-right"><?= number_format($DP_idx_qty_okt, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DP_idx_val_okt, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DP_qty_nop, 0);?></td>
                                    <td class="text-right"><?= number_format($DP_val_nop, 2);?></td>
                                    <td class="text-right"><?= number_format($DP_target_qty_nop, 0);?></td>
                                    <td class="text-right"><?= number_format($DP_target_val_nop, 2);?></td>
                                    <td class="text-right"><?= number_format($DP_idx_qty_nop, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DP_idx_val_nop, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DP_qty_des, 0);?></td>
                                    <td class="text-right"><?= number_format($DP_val_des, 2);?></td>
                                    <td class="text-right"><?= number_format($DP_target_qty_des, 0);?></td>
                                    <td class="text-right"><?= number_format($DP_target_val_des, 2);?></td>
                                    <td class="text-right"><?= number_format($DP_idx_qty_des, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DP_idx_val_des, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DP_qty_q4, 0);?></td>
                                    <td class="text-right"><?= number_format($DP_val_q4, 2);?></td>
                                    <td class="text-right"><?= number_format($DP_target_qty_q4, 0);?></td>
                                    <td class="text-right"><?= number_format($DP_target_val_q4, 2);?></td>
                                    <td class="text-right"><?= number_format($DP_idx_qty_q4, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DP_idx_val_q4, 0);?>%</td>

                                    <td class="text-right"><?= number_format($DP_qty_year, 0);?></td>
                                    <td class="text-right"><?= number_format($DP_val_year, 2);?></td>
                                    <td class="text-right"><?= number_format($DP_target_qty_year, 0);?></td>
                                    <td class="text-right"><?= number_format($DP_target_val_year, 2);?></td>
                                    <td class="text-right"><?= number_format($DP_idx_qty_year, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DP_idx_val_year, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DP_qty_avg, 0);?></td>
                                    <td class="text-right"><?= number_format($DP_val_avg, 2);?></td>
                                    <td class="text-right"><?= number_format($DP_target_qty_avg, 0);?></td>
                                    <td class="text-right"><?= number_format($DP_target_val_avg, 2);?></td>
                                    <td class="text-right"><?= number_format($DP_idx_qty_avg, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DP_idx_val_avg, 0);?>%</td>
                                </tr>

                                <!-- System Cartridges -->
                                <?php
                                    $SC_qty_jan = 0;
                                    $SC_qty_feb = 0;
                                    $SC_qty_mar = 0;
                                    $SC_qty_q1 = 0;
                                    $SC_qty_apr = 0;
                                    $SC_qty_mei = 0;
                                    $SC_qty_jun = 0;
                                    $SC_qty_q2 = 0;
                                    $SC_qty_jul = 0;
                                    $SC_qty_agu = 0;
                                    $SC_qty_sep = 0;
                                    $SC_qty_q3 = 0;
                                    $SC_qty_okt = 0;
                                    $SC_qty_nop = 0;
                                    $SC_qty_des = 0;
                                    $SC_qty_q4 = 0;

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

                                    $SC_target_qty_jan = 0;
                                    $SC_target_qty_feb = 0;
                                    $SC_target_qty_mar = 0;
                                    $SC_target_qty_q1 = 0;
                                    $SC_target_qty_apr = 0;
                                    $SC_target_qty_mei = 0;
                                    $SC_target_qty_jun = 0;
                                    $SC_target_qty_q2 = 0;
                                    $SC_target_qty_jul = 0;
                                    $SC_target_qty_agu = 0;
                                    $SC_target_qty_sep = 0;
                                    $SC_target_qty_q3 = 0;
                                    $SC_target_qty_okt = 0;
                                    $SC_target_qty_nop = 0;
                                    $SC_target_qty_des = 0;
                                    $SC_target_qty_q4 = 0;

                                    $SC_target_val_jan = 0;
                                    $SC_target_val_feb = 0;
                                    $SC_target_val_mar = 0;
                                    $SC_target_val_q1 = 0;
                                    $SC_target_val_apr = 0;
                                    $SC_target_val_mei = 0;
                                    $SC_target_val_jun = 0;
                                    $SC_target_val_q2 = 0;
                                    $SC_target_val_jul = 0;
                                    $SC_target_val_agu = 0;
                                    $SC_target_val_sep = 0;
                                    $SC_target_val_q3 = 0;
                                    $SC_target_val_okt = 0;
                                    $SC_target_val_nop = 0;
                                    $SC_target_val_des = 0;
                                    $SC_target_val_q4 = 0;

                                    $SC_idx_qty_jan = 0;
                                    $SC_idx_qty_feb = 0;
                                    $SC_idx_qty_mar = 0;
                                    $SC_idx_qty_q1 = 0;
                                    $SC_idx_qty_apr = 0;
                                    $SC_idx_qty_mei = 0;
                                    $SC_idx_qty_jun = 0;
                                    $SC_idx_qty_q2 = 0;
                                    $SC_idx_qty_jul = 0;
                                    $SC_idx_qty_agu = 0;
                                    $SC_idx_qty_sep = 0;
                                    $SC_idx_qty_q3 = 0;
                                    $SC_idx_qty_okt = 0;
                                    $SC_idx_qty_nop = 0;
                                    $SC_idx_qty_des = 0;
                                    $SC_idx_qty_q4 = 0;

                                    $SC_idx_val_jan = 0;
                                    $SC_idx_val_feb = 0;
                                    $SC_idx_val_mar = 0;
                                    $SC_idx_val_q1 = 0;
                                    $SC_idx_val_apr = 0;
                                    $SC_idx_val_mei = 0;
                                    $SC_idx_val_jun = 0;
                                    $SC_idx_val_q2 = 0;
                                    $SC_idx_val_jul = 0;
                                    $SC_idx_val_agu = 0;
                                    $SC_idx_val_sep = 0;
                                    $SC_idx_val_q3 = 0;
                                    $SC_idx_val_okt = 0;
                                    $SC_idx_val_nop = 0;
                                    $SC_idx_val_des = 0;
                                    $SC_idx_val_q4 = 0;
                                ?>
                                <?php foreach ($data['sellingout_SC'] as $row) :?>
                                <tr>
                                    <td class="text-center"><?= $no; ?></td>
                                    <td><?= $row['principal'];?></td>
                                    <td><?= $row['item_group'];?></td>
                                    <td><?= $row['item_code'];?></td>
                                    <td><?= $row['item_name'];?></td>
                                    <td class="text-center"><?= $row['unit'];?></td>
                                    <td class="text-right"><?= number_format($row['qty_jan'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_jan'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_jan'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_jan'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_jan'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_jan'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_feb'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_feb'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_feb'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_feb'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_feb'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_feb'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_mar'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_mar'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_mar'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_mar'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_mar'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_mar'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_q1'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_q1'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_q1'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_value_q1'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_q1'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_q1'], 0);?>%</td>

                                    <td class="text-right"><?= number_format($row['qty_apr'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_apr'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_apr'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_apr'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_apr'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_apr'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_mei'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_mei'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_mei'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_mei'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_mei'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_mei'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_jun'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_jun'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_jun'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_jun'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_jun'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_jun'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_q2'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_q2'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_q2'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_value_q2'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_q2'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_q2'], 0);?>%</td>

                                    <td class="text-right"><?= number_format($row['qty_jul'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_jul'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_jul'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_jul'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_jul'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_jul'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_agu'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_agu'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_agu'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_agu'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_agu'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_agu'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_sep'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_sep'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_sep'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_sep'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_sep'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_sep'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_q3'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_q3'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_q3'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_value_q3'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_q3'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_q3'], 0);?>%</td>

                                    <td class="text-right"><?= number_format($row['qty_okt'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_okt'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_okt'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_okt'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_okt'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_okt'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_nop'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_nop'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_nop'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_nop'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_nop'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_nop'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_des'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_des'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_des'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_des'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_des'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_des'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_q4'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_q4'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_q4'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_value_q4'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_q4'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_q4'], 0);?>%</td>

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

                                    <td class="text-right"><?= number_format($qty_year, 0);?></td>
                                    <td class="text-right"><?= number_format($val_year, 2);?></td>
                                    <td class="text-right"><?= number_format($target_qty_year, 0);?></td>
                                    <td class="text-right"><?= number_format($target_val_year, 2);?></td>
                                    <td class="text-right"><?= number_format($idx_qty_year, 0);?>%</td>
                                    <td class="text-right"><?= number_format($idx_val_year, 0);?>%</td>
                                    <td class="text-right"><?= number_format($qty_avg, 0);?></td>
                                    <td class="text-right"><?= number_format($val_avg, 2);?></td>
                                    <td class="text-right"><?= number_format($target_qty_avg, 0);?></td>
                                    <td class="text-right"><?= number_format($target_val_avg, 2);?></td>
                                    <td class="text-right"><?= number_format($idx_qty_avg, 0);?>%</td>
                                    <td class="text-right"><?= number_format($idx_val_avg, 0);?>%</td>
                                </tr>
                                
                                <!-- sub qty -->
                                <?php $SC_qty_jan += $row['qty_jan']; ?>
                                <?php $SC_qty_feb += $row['qty_feb']; ?>
                                <?php $SC_qty_mar += $row['qty_mar']; ?>
                                <?php $SC_qty_q1 += $row['qty_q1']; ?>

                                <?php $SC_qty_apr += $row['qty_apr']; ?>
                                <?php $SC_qty_mei += $row['qty_mei']; ?>
                                <?php $SC_qty_jun += $row['qty_jun']; ?>
                                <?php $SC_qty_q2 += $row['qty_q2']; ?>

                                <?php $SC_qty_jul += $row['qty_jul']; ?>
                                <?php $SC_qty_agu += $row['qty_agu']; ?>
                                <?php $SC_qty_sep += $row['qty_sep']; ?>
                                <?php $SC_qty_q3 += $row['qty_q3']; ?>

                                <?php $SC_qty_okt += $row['qty_okt']; ?>
                                <?php $SC_qty_nop += $row['qty_nop']; ?>
                                <?php $SC_qty_des += $row['qty_des']; ?>
                                <?php $SC_qty_q4 += $row['qty_q4']; ?>
                                
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

                                <?php $SC_target_qty_jan += $row['target_qty_jan']; ?>
                                <?php $SC_target_qty_feb += $row['target_qty_feb']; ?>
                                <?php $SC_target_qty_mar += $row['target_qty_mar']; ?>
                                <?php $SC_target_qty_q1 += $row['target_qty_q1']; ?>

                                <?php $SC_target_qty_apr += $row['target_qty_apr']; ?>
                                <?php $SC_target_qty_mei += $row['target_qty_mei']; ?>
                                <?php $SC_target_qty_jun += $row['target_qty_jun']; ?>
                                <?php $SC_target_qty_q2 += $row['target_qty_q2']; ?>

                                <?php $SC_target_qty_jul += $row['target_qty_jul']; ?>
                                <?php $SC_target_qty_agu += $row['target_qty_agu']; ?>
                                <?php $SC_target_qty_sep += $row['target_qty_sep']; ?>
                                <?php $SC_target_qty_q3 += $row['target_qty_q3']; ?>

                                <?php $SC_target_qty_okt += $row['target_qty_okt']; ?>
                                <?php $SC_target_qty_nop += $row['target_qty_nop']; ?>
                                <?php $SC_target_qty_des += $row['target_qty_des']; ?>
                                <?php $SC_target_qty_q4 += $row['target_qty_q4']; ?>
                                
                                <!-- sub val -->
                                <?php $SC_target_val_jan += $row['target_val_jan']; ?>
                                <?php $SC_target_val_feb += $row['target_val_feb']; ?>
                                <?php $SC_target_val_mar += $row['target_val_mar']; ?>
                                <?php $SC_target_val_q1 += $row['target_value_q1']; ?>

                                <?php $SC_target_val_apr += $row['target_val_apr']; ?>
                                <?php $SC_target_val_mei += $row['target_val_mei']; ?>
                                <?php $SC_target_val_jun += $row['target_val_jun']; ?>
                                <?php $SC_target_val_q2 += $row['target_value_q2']; ?>

                                <?php $SC_target_val_jul += $row['target_val_jul']; ?>
                                <?php $SC_target_val_agu += $row['target_val_agu']; ?>
                                <?php $SC_target_val_sep += $row['target_val_sep']; ?>
                                <?php $SC_target_val_q3 += $row['target_value_q3']; ?>

                                <?php $SC_target_val_okt += $row['target_val_okt']; ?>
                                <?php $SC_target_val_nop += $row['target_val_nop']; ?>
                                <?php $SC_target_val_des += $row['target_val_des']; ?>
                                <?php $SC_target_val_q4 += $row['target_value_q4']; ?>

                                <?php $SC_idx_qty_jan = ($SC_qty_jan/($SC_target_qty_jan ?: 1))*100; ?>
                                <?php $SC_idx_qty_feb = ($SC_qty_feb/($SC_target_qty_feb ?: 1))*100; ?>
                                <?php $SC_idx_qty_mar = ($SC_qty_mar/($SC_target_qty_mar ?: 1))*100; ?>
                                <?php $SC_idx_qty_q1 = ($SC_qty_q1/($SC_target_qty_q1 ?: 1))*100; ?>

                                <?php $SC_idx_qty_apr = ($SC_qty_apr/($SC_target_qty_apr ?: 1))*100; ?>
                                <?php $SC_idx_qty_mei = ($SC_qty_mei/($SC_target_qty_mei ?: 1))*100; ?>
                                <?php $SC_idx_qty_jun = ($SC_qty_jun/($SC_target_qty_jun ?: 1))*100; ?>
                                <?php $SC_idx_qty_q2 = ($SC_qty_q2/($SC_target_qty_q2 ?: 1))*100; ?>

                                <?php $SC_idx_qty_jul = ($SC_qty_jul/($SC_target_qty_jul ?: 1))*100; ?>
                                <?php $SC_idx_qty_agu = ($SC_qty_agu/($SC_target_qty_agu ?: 1))*100; ?>
                                <?php $SC_idx_qty_sep = ($SC_qty_sep/($SC_target_qty_sep ?: 1))*100; ?>
                                <?php $SC_idx_qty_q3 = ($SC_qty_q3/($SC_target_qty_q3 ?: 1))*100; ?>

                                <?php $SC_idx_qty_okt = ($SC_qty_okt/($SC_target_qty_okt ?: 1))*100; ?>
                                <?php $SC_idx_qty_nop = ($SC_qty_nop/($SC_target_qty_nop ?: 1))*100; ?>
                                <?php $SC_idx_qty_des = ($SC_qty_des/($SC_target_qty_des ?: 1))*100; ?>
                                <?php $SC_idx_qty_q4 = ($SC_qty_q4/($SC_target_qty_q4 ?: 1))*100; ?>
                                
                                <!-- sub val -->
                                <?php $SC_idx_val_jan = ($SC_val_jan/($SC_target_val_jan ?: 1))*100; ?>
                                <?php $SC_idx_val_feb = ($SC_val_feb/($SC_target_val_feb ?: 1))*100; ?>
                                <?php $SC_idx_val_mar = ($SC_val_mar/($SC_target_val_mar ?: 1))*100; ?>
                                <?php $SC_idx_val_q1 = ($SC_val_q1/($SC_target_val_q1 ?: 1))*100; ?>

                                <?php $SC_idx_val_apr = ($SC_val_apr/($SC_target_val_apr ?: 1))*100; ?>
                                <?php $SC_idx_val_mei = ($SC_val_mei/($SC_target_val_mei ?: 1))*100; ?>
                                <?php $SC_idx_val_jun = ($SC_val_jun/($SC_target_val_jun ?: 1))*100; ?>
                                <?php $SC_idx_val_q2 = ($SC_val_q2/($SC_target_val_q2 ?: 1))*100; ?>

                                <?php $SC_idx_val_jul = ($SC_val_jul/($SC_target_val_jul ?: 1))*100; ?>
                                <?php $SC_idx_val_agu = ($SC_val_agu/($SC_target_val_agu ?: 1))*100; ?>
                                <?php $SC_idx_val_sep = ($SC_val_sep/($SC_target_val_sep ?: 1))*100; ?>
                                <?php $SC_idx_val_q3 = ($SC_val_q3/($SC_target_val_q3 ?: 1))*100; ?>

                                <?php $SC_idx_val_okt = ($SC_val_okt/($SC_target_val_okt ?: 1))*100; ?>
                                <?php $SC_idx_val_nop = ($SC_val_nop/($SC_target_val_nop ?: 1))*100; ?>
                                <?php $SC_idx_val_des = ($SC_val_des/($SC_target_val_des ?: 1))*100; ?>
                                <?php $SC_idx_val_q4 = ($SC_val_q4/($SC_target_val_q4 ?: 1))*100; ?>
                                
                                <?php $principal = $row['principal']; ?>
                                <?php $group_sku = $row['item_group']; ?>
                                <?php $no++; endforeach; ?>

                                <?php $SC_qty_year = $SC_qty_jan + $SC_qty_feb + $SC_qty_mar + $SC_qty_apr + $SC_qty_mei + $SC_qty_jun + $SC_qty_jul + $SC_qty_agu + $SC_qty_sep + $SC_qty_okt + $SC_qty_nop + $SC_qty_des;?>
                                <?php $SC_val_year = $SC_val_jan + $SC_val_feb + $SC_val_mar + $SC_val_apr + $SC_val_mei + $SC_val_jun + $SC_val_jul + $SC_val_agu + $SC_val_sep + $SC_val_okt + $SC_val_nop + $SC_val_des;?>
                                <?php $SC_target_qty_year = $SC_target_qty_jan + $SC_target_qty_feb + $SC_target_qty_mar + $SC_target_qty_apr + $SC_target_qty_mei + $SC_target_qty_jun + $SC_target_qty_jul + $SC_target_qty_agu + $SC_target_qty_sep + $SC_target_qty_okt + $SC_target_qty_nop + $SC_target_qty_des;?> 
                                <?php $SC_target_val_year = $SC_target_val_jan + $SC_target_val_feb + $SC_target_val_mar + $SC_target_val_apr + $SC_target_val_mei + $SC_target_val_jun + $SC_target_val_jul + $SC_target_val_agu + $SC_target_val_sep + $SC_target_val_okt + $SC_target_val_nop + $SC_target_val_des;?>
                                <?php $SC_idx_qty_year = ($SC_qty_year/($SC_target_qty_year ?: 1))*100;?> 
                                <?php $SC_idx_val_year = ($SC_val_year/($SC_target_val_year ?: 1))*100;?> 
                                <?php $SC_qty_avg = $SC_qty_year/12;?>
                                <?php $SC_val_avg = $SC_val_year/12;?>
                                <?php $SC_target_qty_avg = $SC_target_qty_year/12;?>
                                <?php $SC_target_val_avg = $SC_target_val_year/12;?>
                                <?php $SC_idx_qty_avg = ($SC_qty_avg/($SC_target_qty_avg ?: 1))*100;?>
                                <?php $SC_idx_val_avg = ($SC_val_avg/($SC_target_val_avg ?: 1))*100;?>
                                
                                <tr class="table-warning" style="font-weight:bold">
                                    <td></td>
                                    <td><?= $principal;?></td>
                                    <td><?= $group_sku;?></td>
                                    <td></td>
                                    <td class="text-center">Sub Total <?= $group_sku;?></td>
                                    <td></td>
                                    <td class="text-right"><?= number_format($SC_qty_jan, 0);?></td>
                                    <td class="text-right"><?= number_format($SC_val_jan, 2);?></td>
                                    <td class="text-right"><?= number_format($SC_target_qty_jan, 0);?></td>
                                    <td class="text-right"><?= number_format($SC_target_val_jan, 2);?></td>
                                    <td class="text-right"><?= number_format($SC_idx_qty_jan, 0);?>%</td>
                                    <td class="text-right"><?= number_format($SC_idx_val_jan, 0);?>%</td>
                                    <td class="text-right"><?= number_format($SC_qty_feb, 0);?></td>
                                    <td class="text-right"><?= number_format($SC_val_feb, 2);?></td>
                                    <td class="text-right"><?= number_format($SC_target_qty_feb, 0);?></td>
                                    <td class="text-right"><?= number_format($SC_target_val_feb, 2);?></td>
                                    <td class="text-right"><?= number_format($SC_idx_qty_feb, 0);?>%</td>
                                    <td class="text-right"><?= number_format($SC_idx_val_feb, 0);?>%</td>
                                    <td class="text-right"><?= number_format($SC_qty_mar, 0);?></td>
                                    <td class="text-right"><?= number_format($SC_val_mar, 2);?></td>
                                    <td class="text-right"><?= number_format($SC_target_qty_mar, 0);?></td>
                                    <td class="text-right"><?= number_format($SC_target_val_mar, 2);?></td>
                                    <td class="text-right"><?= number_format($SC_idx_qty_mar, 0);?>%</td>
                                    <td class="text-right"><?= number_format($SC_idx_val_mar, 0);?>%</td>
                                    <td class="text-right"><?= number_format($SC_qty_q1, 0);?></td>
                                    <td class="text-right"><?= number_format($SC_val_q1, 2);?></td>
                                    <td class="text-right"><?= number_format($SC_target_qty_q1, 0);?></td>
                                    <td class="text-right"><?= number_format($SC_target_val_q1, 2);?></td>
                                    <td class="text-right"><?= number_format($SC_idx_qty_q1, 0);?>%</td>
                                    <td class="text-right"><?= number_format($SC_idx_val_q1, 0);?>%</td>

                                    <td class="text-right"><?= number_format($SC_qty_apr, 0);?></td>
                                    <td class="text-right"><?= number_format($SC_val_apr, 2);?></td>
                                    <td class="text-right"><?= number_format($SC_target_qty_apr, 0);?></td>
                                    <td class="text-right"><?= number_format($SC_target_val_apr, 2);?></td>
                                    <td class="text-right"><?= number_format($SC_idx_qty_apr, 0);?>%</td>
                                    <td class="text-right"><?= number_format($SC_idx_val_apr, 0);?>%</td>
                                    <td class="text-right"><?= number_format($SC_qty_mei, 0);?></td>
                                    <td class="text-right"><?= number_format($SC_val_mei, 2);?></td>
                                    <td class="text-right"><?= number_format($SC_target_qty_mei, 0);?></td>
                                    <td class="text-right"><?= number_format($SC_target_val_mei, 2);?></td>
                                    <td class="text-right"><?= number_format($SC_idx_qty_mei, 0);?>%</td>
                                    <td class="text-right"><?= number_format($SC_idx_val_mei, 0);?>%</td>
                                    <td class="text-right"><?= number_format($SC_qty_jun, 0);?></td>
                                    <td class="text-right"><?= number_format($SC_val_jun, 2);?></td>
                                    <td class="text-right"><?= number_format($SC_target_qty_jun, 0);?></td>
                                    <td class="text-right"><?= number_format($SC_target_val_jun, 2);?></td>
                                    <td class="text-right"><?= number_format($SC_idx_qty_jun, 0);?>%</td>
                                    <td class="text-right"><?= number_format($SC_idx_val_jun, 0);?>%</td>
                                    <td class="text-right"><?= number_format($SC_qty_q2, 0);?></td>
                                    <td class="text-right"><?= number_format($SC_val_q2, 2);?></td>
                                    <td class="text-right"><?= number_format($SC_target_qty_q2, 0);?></td>
                                    <td class="text-right"><?= number_format($SC_target_val_q2, 2);?></td>
                                    <td class="text-right"><?= number_format($SC_idx_qty_q2, 0);?>%</td>
                                    <td class="text-right"><?= number_format($SC_idx_val_q2, 0);?>%</td>

                                    <td class="text-right"><?= number_format($SC_qty_jul, 0);?></td>
                                    <td class="text-right"><?= number_format($SC_val_jul, 2);?></td>
                                    <td class="text-right"><?= number_format($SC_target_qty_jul, 0);?></td>
                                    <td class="text-right"><?= number_format($SC_target_val_jul, 2);?></td>
                                    <td class="text-right"><?= number_format($SC_idx_qty_jul, 0);?>%</td>
                                    <td class="text-right"><?= number_format($SC_idx_val_jul, 0);?>%</td>
                                    <td class="text-right"><?= number_format($SC_qty_agu, 0);?></td>
                                    <td class="text-right"><?= number_format($SC_val_agu, 2);?></td>
                                    <td class="text-right"><?= number_format($SC_target_qty_agu, 0);?></td>
                                    <td class="text-right"><?= number_format($SC_target_val_agu, 2);?></td>
                                    <td class="text-right"><?= number_format($SC_idx_qty_agu, 0);?>%</td>
                                    <td class="text-right"><?= number_format($SC_idx_val_agu, 0);?>%</td>
                                    <td class="text-right"><?= number_format($SC_qty_sep, 0);?></td>
                                    <td class="text-right"><?= number_format($SC_val_sep, 2);?></td>
                                    <td class="text-right"><?= number_format($SC_target_qty_sep, 0);?></td>
                                    <td class="text-right"><?= number_format($SC_target_val_sep, 2);?></td>
                                    <td class="text-right"><?= number_format($SC_idx_qty_sep, 0);?>%</td>
                                    <td class="text-right"><?= number_format($SC_idx_val_sep, 0);?>%</td>
                                    <td class="text-right"><?= number_format($SC_qty_q3, 0);?></td>
                                    <td class="text-right"><?= number_format($SC_val_q3, 2);?></td>
                                    <td class="text-right"><?= number_format($SC_target_qty_q3, 0);?></td>
                                    <td class="text-right"><?= number_format($SC_target_val_q3, 2);?></td>
                                    <td class="text-right"><?= number_format($SC_idx_qty_q3, 0);?>%</td>
                                    <td class="text-right"><?= number_format($SC_idx_val_q3, 0);?>%</td>

                                    <td class="text-right"><?= number_format($SC_qty_okt, 0);?></td>
                                    <td class="text-right"><?= number_format($SC_val_okt, 2);?></td>
                                    <td class="text-right"><?= number_format($SC_target_qty_okt, 0);?></td>
                                    <td class="text-right"><?= number_format($SC_target_val_okt, 2);?></td>
                                    <td class="text-right"><?= number_format($SC_idx_qty_okt, 0);?>%</td>
                                    <td class="text-right"><?= number_format($SC_idx_val_okt, 0);?>%</td>
                                    <td class="text-right"><?= number_format($SC_qty_nop, 0);?></td>
                                    <td class="text-right"><?= number_format($SC_val_nop, 2);?></td>
                                    <td class="text-right"><?= number_format($SC_target_qty_nop, 0);?></td>
                                    <td class="text-right"><?= number_format($SC_target_val_nop, 2);?></td>
                                    <td class="text-right"><?= number_format($SC_idx_qty_nop, 0);?>%</td>
                                    <td class="text-right"><?= number_format($SC_idx_val_nop, 0);?>%</td>
                                    <td class="text-right"><?= number_format($SC_qty_des, 0);?></td>
                                    <td class="text-right"><?= number_format($SC_val_des, 2);?></td>
                                    <td class="text-right"><?= number_format($SC_target_qty_des, 0);?></td>
                                    <td class="text-right"><?= number_format($SC_target_val_des, 2);?></td>
                                    <td class="text-right"><?= number_format($SC_idx_qty_des, 0);?>%</td>
                                    <td class="text-right"><?= number_format($SC_idx_val_des, 0);?>%</td>
                                    <td class="text-right"><?= number_format($SC_qty_q4, 0);?></td>
                                    <td class="text-right"><?= number_format($SC_val_q4, 2);?></td>
                                    <td class="text-right"><?= number_format($SC_target_qty_q4, 0);?></td>
                                    <td class="text-right"><?= number_format($SC_target_val_q4, 2);?></td>
                                    <td class="text-right"><?= number_format($SC_idx_qty_q4, 0);?>%</td>
                                    <td class="text-right"><?= number_format($SC_idx_val_q4, 0);?>%</td>

                                    <td class="text-right"><?= number_format($SC_qty_year, 0);?></td>
                                    <td class="text-right"><?= number_format($SC_val_year, 2);?></td>
                                    <td class="text-right"><?= number_format($SC_target_qty_year, 0);?></td>
                                    <td class="text-right"><?= number_format($SC_target_val_year, 2);?></td>
                                    <td class="text-right"><?= number_format($SC_idx_qty_year, 0);?>%</td>
                                    <td class="text-right"><?= number_format($SC_idx_val_year, 0);?>%</td>
                                    <td class="text-right"><?= number_format($SC_qty_avg, 0);?></td>
                                    <td class="text-right"><?= number_format($SC_val_avg, 2);?></td>
                                    <td class="text-right"><?= number_format($SC_target_qty_avg, 0);?></td>
                                    <td class="text-right"><?= number_format($SC_target_val_avg, 2);?></td>
                                    <td class="text-right"><?= number_format($SC_idx_qty_avg, 0);?>%</td>
                                    <td class="text-right"><?= number_format($SC_idx_val_avg, 0);?>%</td>
                                </tr>


                                <!-- System Razor -->
                                <?php
                                    $SR_qty_jan = 0;
                                    $SR_qty_feb = 0;
                                    $SR_qty_mar = 0;
                                    $SR_qty_q1 = 0;
                                    $SR_qty_apr = 0;
                                    $SR_qty_mei = 0;
                                    $SR_qty_jun = 0;
                                    $SR_qty_q2 = 0;
                                    $SR_qty_jul = 0;
                                    $SR_qty_agu = 0;
                                    $SR_qty_sep = 0;
                                    $SR_qty_q3 = 0;
                                    $SR_qty_okt = 0;
                                    $SR_qty_nop = 0;
                                    $SR_qty_des = 0;
                                    $SR_qty_q4 = 0;

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

                                    $SR_target_qty_jan = 0;
                                    $SR_target_qty_feb = 0;
                                    $SR_target_qty_mar = 0;
                                    $SR_target_qty_q1 = 0;
                                    $SR_target_qty_apr = 0;
                                    $SR_target_qty_mei = 0;
                                    $SR_target_qty_jun = 0;
                                    $SR_target_qty_q2 = 0;
                                    $SR_target_qty_jul = 0;
                                    $SR_target_qty_agu = 0;
                                    $SR_target_qty_sep = 0;
                                    $SR_target_qty_q3 = 0;
                                    $SR_target_qty_okt = 0;
                                    $SR_target_qty_nop = 0;
                                    $SR_target_qty_des = 0;
                                    $SR_target_qty_q4 = 0;

                                    $SR_target_val_jan = 0;
                                    $SR_target_val_feb = 0;
                                    $SR_target_val_mar = 0;
                                    $SR_target_val_q1 = 0;
                                    $SR_target_val_apr = 0;
                                    $SR_target_val_mei = 0;
                                    $SR_target_val_jun = 0;
                                    $SR_target_val_q2 = 0;
                                    $SR_target_val_jul = 0;
                                    $SR_target_val_agu = 0;
                                    $SR_target_val_sep = 0;
                                    $SR_target_val_q3 = 0;
                                    $SR_target_val_okt = 0;
                                    $SR_target_val_nop = 0;
                                    $SR_target_val_des = 0;
                                    $SR_target_val_q4 = 0;

                                    $SR_idx_qty_jan = 0;
                                    $SR_idx_qty_feb = 0;
                                    $SR_idx_qty_mar = 0;
                                    $SR_idx_qty_q1 = 0;
                                    $SR_idx_qty_apr = 0;
                                    $SR_idx_qty_mei = 0;
                                    $SR_idx_qty_jun = 0;
                                    $SR_idx_qty_q2 = 0;
                                    $SR_idx_qty_jul = 0;
                                    $SR_idx_qty_agu = 0;
                                    $SR_idx_qty_sep = 0;
                                    $SR_idx_qty_q3 = 0;
                                    $SR_idx_qty_okt = 0;
                                    $SR_idx_qty_nop = 0;
                                    $SR_idx_qty_des = 0;
                                    $SR_idx_qty_q4 = 0;

                                    $SR_idx_val_jan = 0;
                                    $SR_idx_val_feb = 0;
                                    $SR_idx_val_mar = 0;
                                    $SR_idx_val_q1 = 0;
                                    $SR_idx_val_apr = 0;
                                    $SR_idx_val_mei = 0;
                                    $SR_idx_val_jun = 0;
                                    $SR_idx_val_q2 = 0;
                                    $SR_idx_val_jul = 0;
                                    $SR_idx_val_agu = 0;
                                    $SR_idx_val_sep = 0;
                                    $SR_idx_val_q3 = 0;
                                    $SR_idx_val_okt = 0;
                                    $SR_idx_val_nop = 0;
                                    $SR_idx_val_des = 0;
                                    $SR_idx_val_q4 = 0;
                                ?>
                                <?php foreach ($data['sellingout_SR'] as $row) :?>
                                <tr>
                                    <td class="text-center"><?= $no; ?></td>
                                    <td><?= $row['principal'];?></td>
                                    <td><?= $row['item_group'];?></td>
                                    <td><?= $row['item_code'];?></td>
                                    <td><?= $row['item_name'];?></td>
                                    <td class="text-center"><?= $row['unit'];?></td>
                                    <td class="text-right"><?= number_format($row['qty_jan'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_jan'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_jan'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_jan'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_jan'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_jan'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_feb'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_feb'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_feb'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_feb'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_feb'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_feb'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_mar'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_mar'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_mar'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_mar'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_mar'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_mar'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_q1'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_q1'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_q1'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_value_q1'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_q1'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_q1'], 0);?>%</td>

                                    <td class="text-right"><?= number_format($row['qty_apr'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_apr'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_apr'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_apr'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_apr'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_apr'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_mei'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_mei'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_mei'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_mei'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_mei'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_mei'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_jun'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_jun'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_jun'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_jun'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_jun'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_jun'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_q2'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_q2'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_q2'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_value_q2'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_q2'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_q2'], 0);?>%</td>

                                    <td class="text-right"><?= number_format($row['qty_jul'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_jul'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_jul'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_jul'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_jul'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_jul'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_agu'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_agu'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_agu'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_agu'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_agu'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_agu'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_sep'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_sep'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_sep'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_sep'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_sep'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_sep'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_q3'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_q3'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_q3'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_value_q3'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_q3'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_q3'], 0);?>%</td>

                                    <td class="text-right"><?= number_format($row['qty_okt'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_okt'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_okt'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_okt'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_okt'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_okt'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_nop'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_nop'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_nop'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_nop'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_nop'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_nop'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_des'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_des'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_des'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_des'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_des'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_des'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_q4'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_q4'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_q4'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_value_q4'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_q4'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_q4'], 0);?>%</td>

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

                                    <td class="text-right"><?= number_format($qty_year, 0);?></td>
                                    <td class="text-right"><?= number_format($val_year, 2);?></td>
                                    <td class="text-right"><?= number_format($target_qty_year, 0);?></td>
                                    <td class="text-right"><?= number_format($target_val_year, 2);?></td>
                                    <td class="text-right"><?= number_format($idx_qty_year, 0);?>%</td>
                                    <td class="text-right"><?= number_format($idx_val_year, 0);?>%</td>
                                    <td class="text-right"><?= number_format($qty_avg, 0);?></td>
                                    <td class="text-right"><?= number_format($val_avg, 2);?></td>
                                    <td class="text-right"><?= number_format($target_qty_avg, 0);?></td>
                                    <td class="text-right"><?= number_format($target_val_avg, 2);?></td>
                                    <td class="text-right"><?= number_format($idx_qty_avg, 0);?>%</td>
                                    <td class="text-right"><?= number_format($idx_val_avg, 0);?>%</td>
                                </tr>
                                
                                <!-- sub qty -->
                                <?php $SR_qty_jan += $row['qty_jan']; ?>
                                <?php $SR_qty_feb += $row['qty_feb']; ?>
                                <?php $SR_qty_mar += $row['qty_mar']; ?>
                                <?php $SR_qty_q1 += $row['qty_q1']; ?>

                                <?php $SR_qty_apr += $row['qty_apr']; ?>
                                <?php $SR_qty_mei += $row['qty_mei']; ?>
                                <?php $SR_qty_jun += $row['qty_jun']; ?>
                                <?php $SR_qty_q2 += $row['qty_q2']; ?>

                                <?php $SR_qty_jul += $row['qty_jul']; ?>
                                <?php $SR_qty_agu += $row['qty_agu']; ?>
                                <?php $SR_qty_sep += $row['qty_sep']; ?>
                                <?php $SR_qty_q3 += $row['qty_q3']; ?>

                                <?php $SR_qty_okt += $row['qty_okt']; ?>
                                <?php $SR_qty_nop += $row['qty_nop']; ?>
                                <?php $SR_qty_des += $row['qty_des']; ?>
                                <?php $SR_qty_q4 += $row['qty_q4']; ?>
                                
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

                                <?php $SR_target_qty_jan += $row['target_qty_jan']; ?>
                                <?php $SR_target_qty_feb += $row['target_qty_feb']; ?>
                                <?php $SR_target_qty_mar += $row['target_qty_mar']; ?>
                                <?php $SR_target_qty_q1 += $row['target_qty_q1']; ?>

                                <?php $SR_target_qty_apr += $row['target_qty_apr']; ?>
                                <?php $SR_target_qty_mei += $row['target_qty_mei']; ?>
                                <?php $SR_target_qty_jun += $row['target_qty_jun']; ?>
                                <?php $SR_target_qty_q2 += $row['target_qty_q2']; ?>

                                <?php $SR_target_qty_jul += $row['target_qty_jul']; ?>
                                <?php $SR_target_qty_agu += $row['target_qty_agu']; ?>
                                <?php $SR_target_qty_sep += $row['target_qty_sep']; ?>
                                <?php $SR_target_qty_q3 += $row['target_qty_q3']; ?>

                                <?php $SR_target_qty_okt += $row['target_qty_okt']; ?>
                                <?php $SR_target_qty_nop += $row['target_qty_nop']; ?>
                                <?php $SR_target_qty_des += $row['target_qty_des']; ?>
                                <?php $SR_target_qty_q4 += $row['target_qty_q4']; ?>
                                
                                <!-- sub val -->
                                <?php $SR_target_val_jan += $row['target_val_jan']; ?>
                                <?php $SR_target_val_feb += $row['target_val_feb']; ?>
                                <?php $SR_target_val_mar += $row['target_val_mar']; ?>
                                <?php $SR_target_val_q1 += $row['target_value_q1']; ?>

                                <?php $SR_target_val_apr += $row['target_val_apr']; ?>
                                <?php $SR_target_val_mei += $row['target_val_mei']; ?>
                                <?php $SR_target_val_jun += $row['target_val_jun']; ?>
                                <?php $SR_target_val_q2 += $row['target_value_q2']; ?>

                                <?php $SR_target_val_jul += $row['target_val_jul']; ?>
                                <?php $SR_target_val_agu += $row['target_val_agu']; ?>
                                <?php $SR_target_val_sep += $row['target_val_sep']; ?>
                                <?php $SR_target_val_q3 += $row['target_value_q3']; ?>

                                <?php $SR_target_val_okt += $row['target_val_okt']; ?>
                                <?php $SR_target_val_nop += $row['target_val_nop']; ?>
                                <?php $SR_target_val_des += $row['target_val_des']; ?>
                                <?php $SR_target_val_q4 += $row['target_value_q4']; ?>

                                <?php $SR_idx_qty_jan = ($SR_qty_jan/($SR_target_qty_jan ?: 1))*100; ?>
                                <?php $SR_idx_qty_feb = ($SR_qty_feb/($SR_target_qty_feb ?: 1))*100; ?>
                                <?php $SR_idx_qty_mar = ($SR_qty_mar/($SR_target_qty_mar ?: 1))*100; ?>
                                <?php $SR_idx_qty_q1 = ($SR_qty_q1/($SR_target_qty_q1 ?: 1))*100; ?>

                                <?php $SR_idx_qty_apr = ($SR_qty_apr/($SR_target_qty_apr ?: 1))*100; ?>
                                <?php $SR_idx_qty_mei = ($SR_qty_mei/($SR_target_qty_mei ?: 1))*100; ?>
                                <?php $SR_idx_qty_jun = ($SR_qty_jun/($SR_target_qty_jun ?: 1))*100; ?>
                                <?php $SR_idx_qty_q2 = ($SR_qty_q2/($SR_target_qty_q2 ?: 1))*100; ?>

                                <?php $SR_idx_qty_jul = ($SR_qty_jul/($SR_target_qty_jul ?: 1))*100; ?>
                                <?php $SR_idx_qty_agu = ($SR_qty_agu/($SR_target_qty_agu ?: 1))*100; ?>
                                <?php $SR_idx_qty_sep = ($SR_qty_sep/($SR_target_qty_sep ?: 1))*100; ?>
                                <?php $SR_idx_qty_q3 = ($SR_qty_q3/($SR_target_qty_q3 ?: 1))*100; ?>

                                <?php $SR_idx_qty_okt = ($SR_qty_okt/($SR_target_qty_okt ?: 1))*100; ?>
                                <?php $SR_idx_qty_nop = ($SR_qty_nop/($SR_target_qty_nop ?: 1))*100; ?>
                                <?php $SR_idx_qty_des = ($SR_qty_des/($SR_target_qty_des ?: 1))*100; ?>
                                <?php $SR_idx_qty_q4 = ($SR_qty_q4/($SR_target_qty_q4 ?: 1))*100; ?>
                                
                                <!-- sub val -->
                                <?php $SR_idx_val_jan = ($SR_val_jan/($SR_target_val_jan ?: 1))*100; ?>
                                <?php $SR_idx_val_feb = ($SR_val_feb/($SR_target_val_feb ?: 1))*100; ?>
                                <?php $SR_idx_val_mar = ($SR_val_mar/($SR_target_val_mar ?: 1))*100; ?>
                                <?php $SR_idx_val_q1 = ($SR_val_q1/($SR_target_val_q1 ?: 1))*100; ?>

                                <?php $SR_idx_val_apr = ($SR_val_apr/($SR_target_val_apr ?: 1))*100; ?>
                                <?php $SR_idx_val_mei = ($SR_val_mei/($SR_target_val_mei ?: 1))*100; ?>
                                <?php $SR_idx_val_jun = ($SR_val_jun/($SR_target_val_jun ?: 1))*100; ?>
                                <?php $SR_idx_val_q2 = ($SR_val_q2/($SR_target_val_q2 ?: 1))*100; ?>

                                <?php $SR_idx_val_jul = ($SR_val_jul/($SR_target_val_jul ?: 1))*100; ?>
                                <?php $SR_idx_val_agu = ($SR_val_agu/($SR_target_val_agu ?: 1))*100; ?>
                                <?php $SR_idx_val_sep = ($SR_val_sep/($SR_target_val_sep ?: 1))*100; ?>
                                <?php $SR_idx_val_q3 = ($SR_val_q3/($SR_target_val_q3 ?: 1))*100; ?>

                                <?php $SR_idx_val_okt = ($SR_val_okt/($SR_target_val_okt ?: 1))*100; ?>
                                <?php $SR_idx_val_nop = ($SR_val_nop/($SR_target_val_nop ?: 1))*100; ?>
                                <?php $SR_idx_val_des = ($SR_val_des/($SR_target_val_des ?: 1))*100; ?>
                                <?php $SR_idx_val_q4 = ($SR_val_q4/($SR_target_val_q4 ?: 1))*100; ?>
                                
                                <?php $principal = $row['principal']; ?>
                                <?php $group_sku = $row['item_group']; ?>
                                <?php $no++; endforeach; ?>

                                <?php $SR_qty_year = $SR_qty_jan + $SR_qty_feb + $SR_qty_mar + $SR_qty_apr + $SR_qty_mei + $SR_qty_jun + $SR_qty_jul + $SR_qty_agu + $SR_qty_sep + $SR_qty_okt + $SR_qty_nop + $SR_qty_des;?>
                                <?php $SR_val_year = $SR_val_jan + $SR_val_feb + $SR_val_mar + $SR_val_apr + $SR_val_mei + $SR_val_jun + $SR_val_jul + $SR_val_agu + $SR_val_sep + $SR_val_okt + $SR_val_nop + $SR_val_des;?>
                                <?php $SR_target_qty_year = $SR_target_qty_jan + $SR_target_qty_feb + $SR_target_qty_mar + $SR_target_qty_apr + $SR_target_qty_mei + $SR_target_qty_jun + $SR_target_qty_jul + $SR_target_qty_agu + $SR_target_qty_sep + $SR_target_qty_okt + $SR_target_qty_nop + $SR_target_qty_des;?> 
                                <?php $SR_target_val_year = $SR_target_val_jan + $SR_target_val_feb + $SR_target_val_mar + $SR_target_val_apr + $SR_target_val_mei + $SR_target_val_jun + $SR_target_val_jul + $SR_target_val_agu + $SR_target_val_sep + $SR_target_val_okt + $SR_target_val_nop + $SR_target_val_des;?>
                                <?php $SR_idx_qty_year = ($SR_qty_year/($SR_target_qty_year ?: 1))*100;?> 
                                <?php $SR_idx_val_year = ($SR_val_year/($SR_target_val_year ?: 1))*100;?> 
                                <?php $SR_qty_avg = $SR_qty_year/12;?>
                                <?php $SR_val_avg = $SR_val_year/12;?>
                                <?php $SR_target_qty_avg = $SR_target_qty_year/12;?>
                                <?php $SR_target_val_avg = $SR_target_val_year/12;?>
                                <?php $SR_idx_qty_avg = ($SR_qty_avg/($SR_target_qty_avg ?: 1))*100;?>
                                <?php $SR_idx_val_avg = ($SR_val_avg/($SR_target_val_avg ?: 1))*100;?>
                                
                                <tr class="table-warning" style="font-weight:bold">
                                    <td></td>
                                    <td><?= $principal;?></td>
                                    <td><?= $group_sku;?></td>
                                    <td></td>
                                    <td class="text-center">Sub Total <?= $group_sku;?></td>
                                    <td></td>
                                    <td class="text-right"><?= number_format($SR_qty_jan, 0);?></td>
                                    <td class="text-right"><?= number_format($SR_val_jan, 2);?></td>
                                    <td class="text-right"><?= number_format($SR_target_qty_jan, 0);?></td>
                                    <td class="text-right"><?= number_format($SR_target_val_jan, 2);?></td>
                                    <td class="text-right"><?= number_format($SR_idx_qty_jan, 0);?>%</td>
                                    <td class="text-right"><?= number_format($SR_idx_val_jan, 0);?>%</td>
                                    <td class="text-right"><?= number_format($SR_qty_feb, 0);?></td>
                                    <td class="text-right"><?= number_format($SR_val_feb, 2);?></td>
                                    <td class="text-right"><?= number_format($SR_target_qty_feb, 0);?></td>
                                    <td class="text-right"><?= number_format($SR_target_val_feb, 2);?></td>
                                    <td class="text-right"><?= number_format($SR_idx_qty_feb, 0);?>%</td>
                                    <td class="text-right"><?= number_format($SR_idx_val_feb, 0);?>%</td>
                                    <td class="text-right"><?= number_format($SR_qty_mar, 0);?></td>
                                    <td class="text-right"><?= number_format($SR_val_mar, 2);?></td>
                                    <td class="text-right"><?= number_format($SR_target_qty_mar, 0);?></td>
                                    <td class="text-right"><?= number_format($SR_target_val_mar, 2);?></td>
                                    <td class="text-right"><?= number_format($SR_idx_qty_mar, 0);?>%</td>
                                    <td class="text-right"><?= number_format($SR_idx_val_mar, 0);?>%</td>
                                    <td class="text-right"><?= number_format($SR_qty_q1, 0);?></td>
                                    <td class="text-right"><?= number_format($SR_val_q1, 2);?></td>
                                    <td class="text-right"><?= number_format($SR_target_qty_q1, 0);?></td>
                                    <td class="text-right"><?= number_format($SR_target_val_q1, 2);?></td>
                                    <td class="text-right"><?= number_format($SR_idx_qty_q1, 0);?>%</td>
                                    <td class="text-right"><?= number_format($SR_idx_val_q1, 0);?>%</td>

                                    <td class="text-right"><?= number_format($SR_qty_apr, 0);?></td>
                                    <td class="text-right"><?= number_format($SR_val_apr, 2);?></td>
                                    <td class="text-right"><?= number_format($SR_target_qty_apr, 0);?></td>
                                    <td class="text-right"><?= number_format($SR_target_val_apr, 2);?></td>
                                    <td class="text-right"><?= number_format($SR_idx_qty_apr, 0);?>%</td>
                                    <td class="text-right"><?= number_format($SR_idx_val_apr, 0);?>%</td>
                                    <td class="text-right"><?= number_format($SR_qty_mei, 0);?></td>
                                    <td class="text-right"><?= number_format($SR_val_mei, 2);?></td>
                                    <td class="text-right"><?= number_format($SR_target_qty_mei, 0);?></td>
                                    <td class="text-right"><?= number_format($SR_target_val_mei, 2);?></td>
                                    <td class="text-right"><?= number_format($SR_idx_qty_mei, 0);?>%</td>
                                    <td class="text-right"><?= number_format($SR_idx_val_mei, 0);?>%</td>
                                    <td class="text-right"><?= number_format($SR_qty_jun, 0);?></td>
                                    <td class="text-right"><?= number_format($SR_val_jun, 2);?></td>
                                    <td class="text-right"><?= number_format($SR_target_qty_jun, 0);?></td>
                                    <td class="text-right"><?= number_format($SR_target_val_jun, 2);?></td>
                                    <td class="text-right"><?= number_format($SR_idx_qty_jun, 0);?>%</td>
                                    <td class="text-right"><?= number_format($SR_idx_val_jun, 0);?>%</td>
                                    <td class="text-right"><?= number_format($SR_qty_q2, 0);?></td>
                                    <td class="text-right"><?= number_format($SR_val_q2, 2);?></td>
                                    <td class="text-right"><?= number_format($SR_target_qty_q2, 0);?></td>
                                    <td class="text-right"><?= number_format($SR_target_val_q2, 2);?></td>
                                    <td class="text-right"><?= number_format($SR_idx_qty_q2, 0);?>%</td>
                                    <td class="text-right"><?= number_format($SR_idx_val_q2, 0);?>%</td>

                                    <td class="text-right"><?= number_format($SR_qty_jul, 0);?></td>
                                    <td class="text-right"><?= number_format($SR_val_jul, 2);?></td>
                                    <td class="text-right"><?= number_format($SR_target_qty_jul, 0);?></td>
                                    <td class="text-right"><?= number_format($SR_target_val_jul, 2);?></td>
                                    <td class="text-right"><?= number_format($SR_idx_qty_jul, 0);?>%</td>
                                    <td class="text-right"><?= number_format($SR_idx_val_jul, 0);?>%</td>
                                    <td class="text-right"><?= number_format($SR_qty_agu, 0);?></td>
                                    <td class="text-right"><?= number_format($SR_val_agu, 2);?></td>
                                    <td class="text-right"><?= number_format($SR_target_qty_agu, 0);?></td>
                                    <td class="text-right"><?= number_format($SR_target_val_agu, 2);?></td>
                                    <td class="text-right"><?= number_format($SR_idx_qty_agu, 0);?>%</td>
                                    <td class="text-right"><?= number_format($SR_idx_val_agu, 0);?>%</td>
                                    <td class="text-right"><?= number_format($SR_qty_sep, 0);?></td>
                                    <td class="text-right"><?= number_format($SR_val_sep, 2);?></td>
                                    <td class="text-right"><?= number_format($SR_target_qty_sep, 0);?></td>
                                    <td class="text-right"><?= number_format($SR_target_val_sep, 2);?></td>
                                    <td class="text-right"><?= number_format($SR_idx_qty_sep, 0);?>%</td>
                                    <td class="text-right"><?= number_format($SR_idx_val_sep, 0);?>%</td>
                                    <td class="text-right"><?= number_format($SR_qty_q3, 0);?></td>
                                    <td class="text-right"><?= number_format($SR_val_q3, 2);?></td>
                                    <td class="text-right"><?= number_format($SR_target_qty_q3, 0);?></td>
                                    <td class="text-right"><?= number_format($SR_target_val_q3, 2);?></td>
                                    <td class="text-right"><?= number_format($SR_idx_qty_q3, 0);?>%</td>
                                    <td class="text-right"><?= number_format($SR_idx_val_q3, 0);?>%</td>

                                    <td class="text-right"><?= number_format($SR_qty_okt, 0);?></td>
                                    <td class="text-right"><?= number_format($SR_val_okt, 2);?></td>
                                    <td class="text-right"><?= number_format($SR_target_qty_okt, 0);?></td>
                                    <td class="text-right"><?= number_format($SR_target_val_okt, 2);?></td>
                                    <td class="text-right"><?= number_format($SR_idx_qty_okt, 0);?>%</td>
                                    <td class="text-right"><?= number_format($SR_idx_val_okt, 0);?>%</td>
                                    <td class="text-right"><?= number_format($SR_qty_nop, 0);?></td>
                                    <td class="text-right"><?= number_format($SR_val_nop, 2);?></td>
                                    <td class="text-right"><?= number_format($SR_target_qty_nop, 0);?></td>
                                    <td class="text-right"><?= number_format($SR_target_val_nop, 2);?></td>
                                    <td class="text-right"><?= number_format($SR_idx_qty_nop, 0);?>%</td>
                                    <td class="text-right"><?= number_format($SR_idx_val_nop, 0);?>%</td>
                                    <td class="text-right"><?= number_format($SR_qty_des, 0);?></td>
                                    <td class="text-right"><?= number_format($SR_val_des, 2);?></td>
                                    <td class="text-right"><?= number_format($SR_target_qty_des, 0);?></td>
                                    <td class="text-right"><?= number_format($SR_target_val_des, 2);?></td>
                                    <td class="text-right"><?= number_format($SR_idx_qty_des, 0);?>%</td>
                                    <td class="text-right"><?= number_format($SR_idx_val_des, 0);?>%</td>
                                    <td class="text-right"><?= number_format($SR_qty_q4, 0);?></td>
                                    <td class="text-right"><?= number_format($SR_val_q4, 2);?></td>
                                    <td class="text-right"><?= number_format($SR_target_qty_q4, 0);?></td>
                                    <td class="text-right"><?= number_format($SR_target_val_q4, 2);?></td>
                                    <td class="text-right"><?= number_format($SR_idx_qty_q4, 0);?>%</td>
                                    <td class="text-right"><?= number_format($SR_idx_val_q4, 0);?>%</td>

                                    <td class="text-right"><?= number_format($SR_qty_year, 0);?></td>
                                    <td class="text-right"><?= number_format($SR_val_year, 2);?></td>
                                    <td class="text-right"><?= number_format($SR_target_qty_year, 0);?></td>
                                    <td class="text-right"><?= number_format($SR_target_val_year, 2);?></td>
                                    <td class="text-right"><?= number_format($SR_idx_qty_year, 0);?>%</td>
                                    <td class="text-right"><?= number_format($SR_idx_val_year, 0);?>%</td>
                                    <td class="text-right"><?= number_format($SR_qty_avg, 0);?></td>
                                    <td class="text-right"><?= number_format($SR_val_avg, 2);?></td>
                                    <td class="text-right"><?= number_format($SR_target_qty_avg, 0);?></td>
                                    <td class="text-right"><?= number_format($SR_target_val_avg, 2);?></td>
                                    <td class="text-right"><?= number_format($SR_idx_qty_avg, 0);?>%</td>
                                    <td class="text-right"><?= number_format($SR_idx_val_avg, 0);?>%</td>
                                </tr>


                                <!-- D/E Razor -->
                                <?php
                                    $DR_qty_jan = 0;
                                    $DR_qty_feb = 0;
                                    $DR_qty_mar = 0;
                                    $DR_qty_q1 = 0;
                                    $DR_qty_apr = 0;
                                    $DR_qty_mei = 0;
                                    $DR_qty_jun = 0;
                                    $DR_qty_q2 = 0;
                                    $DR_qty_jul = 0;
                                    $DR_qty_agu = 0;
                                    $DR_qty_sep = 0;
                                    $DR_qty_q3 = 0;
                                    $DR_qty_okt = 0;
                                    $DR_qty_nop = 0;
                                    $DR_qty_des = 0;
                                    $DR_qty_q4 = 0;

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

                                    $DR_target_qty_jan = 0;
                                    $DR_target_qty_feb = 0;
                                    $DR_target_qty_mar = 0;
                                    $DR_target_qty_q1 = 0;
                                    $DR_target_qty_apr = 0;
                                    $DR_target_qty_mei = 0;
                                    $DR_target_qty_jun = 0;
                                    $DR_target_qty_q2 = 0;
                                    $DR_target_qty_jul = 0;
                                    $DR_target_qty_agu = 0;
                                    $DR_target_qty_sep = 0;
                                    $DR_target_qty_q3 = 0;
                                    $DR_target_qty_okt = 0;
                                    $DR_target_qty_nop = 0;
                                    $DR_target_qty_des = 0;
                                    $DR_target_qty_q4 = 0;

                                    $DR_target_val_jan = 0;
                                    $DR_target_val_feb = 0;
                                    $DR_target_val_mar = 0;
                                    $DR_target_val_q1 = 0;
                                    $DR_target_val_apr = 0;
                                    $DR_target_val_mei = 0;
                                    $DR_target_val_jun = 0;
                                    $DR_target_val_q2 = 0;
                                    $DR_target_val_jul = 0;
                                    $DR_target_val_agu = 0;
                                    $DR_target_val_sep = 0;
                                    $DR_target_val_q3 = 0;
                                    $DR_target_val_okt = 0;
                                    $DR_target_val_nop = 0;
                                    $DR_target_val_des = 0;
                                    $DR_target_val_q4 = 0;

                                    $DR_idx_qty_jan = 0;
                                    $DR_idx_qty_feb = 0;
                                    $DR_idx_qty_mar = 0;
                                    $DR_idx_qty_q1 = 0;
                                    $DR_idx_qty_apr = 0;
                                    $DR_idx_qty_mei = 0;
                                    $DR_idx_qty_jun = 0;
                                    $DR_idx_qty_q2 = 0;
                                    $DR_idx_qty_jul = 0;
                                    $DR_idx_qty_agu = 0;
                                    $DR_idx_qty_sep = 0;
                                    $DR_idx_qty_q3 = 0;
                                    $DR_idx_qty_okt = 0;
                                    $DR_idx_qty_nop = 0;
                                    $DR_idx_qty_des = 0;
                                    $DR_idx_qty_q4 = 0;

                                    $DR_idx_val_jan = 0;
                                    $DR_idx_val_feb = 0;
                                    $DR_idx_val_mar = 0;
                                    $DR_idx_val_q1 = 0;
                                    $DR_idx_val_apr = 0;
                                    $DR_idx_val_mei = 0;
                                    $DR_idx_val_jun = 0;
                                    $DR_idx_val_q2 = 0;
                                    $DR_idx_val_jul = 0;
                                    $DR_idx_val_agu = 0;
                                    $DR_idx_val_sep = 0;
                                    $DR_idx_val_q3 = 0;
                                    $DR_idx_val_okt = 0;
                                    $DR_idx_val_nop = 0;
                                    $DR_idx_val_des = 0;
                                    $DR_idx_val_q4 = 0;
                                ?>
                                <?php foreach ($data['sellingout_DR'] as $row) :?>
                                <tr>
                                    <td class="text-center"><?= $no; ?></td>
                                    <td><?= $row['principal'];?></td>
                                    <td><?= $row['item_group'];?></td>
                                    <td><?= $row['item_code'];?></td>
                                    <td><?= $row['item_name'];?></td>
                                    <td class="text-center"><?= $row['unit'];?></td>
                                    <td class="text-right"><?= number_format($row['qty_jan'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_jan'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_jan'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_jan'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_jan'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_jan'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_feb'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_feb'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_feb'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_feb'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_feb'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_feb'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_mar'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_mar'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_mar'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_mar'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_mar'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_mar'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_q1'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_q1'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_q1'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_value_q1'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_q1'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_q1'], 0);?>%</td>

                                    <td class="text-right"><?= number_format($row['qty_apr'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_apr'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_apr'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_apr'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_apr'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_apr'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_mei'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_mei'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_mei'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_mei'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_mei'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_mei'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_jun'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_jun'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_jun'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_jun'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_jun'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_jun'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_q2'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_q2'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_q2'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_value_q2'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_q2'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_q2'], 0);?>%</td>

                                    <td class="text-right"><?= number_format($row['qty_jul'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_jul'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_jul'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_jul'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_jul'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_jul'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_agu'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_agu'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_agu'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_agu'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_agu'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_agu'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_sep'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_sep'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_sep'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_sep'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_sep'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_sep'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_q3'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_q3'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_q3'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_value_q3'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_q3'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_q3'], 0);?>%</td>

                                    <td class="text-right"><?= number_format($row['qty_okt'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_okt'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_okt'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_okt'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_okt'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_okt'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_nop'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_nop'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_nop'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_nop'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_nop'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_nop'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_des'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_des'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_des'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_des'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_des'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_des'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_q4'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_q4'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_q4'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_value_q4'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_q4'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_q4'], 0);?>%</td>

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

                                    <td class="text-right"><?= number_format($qty_year, 0);?></td>
                                    <td class="text-right"><?= number_format($val_year, 2);?></td>
                                    <td class="text-right"><?= number_format($target_qty_year, 0);?></td>
                                    <td class="text-right"><?= number_format($target_val_year, 2);?></td>
                                    <td class="text-right"><?= number_format($idx_qty_year, 0);?>%</td>
                                    <td class="text-right"><?= number_format($idx_val_year, 0);?>%</td>
                                    <td class="text-right"><?= number_format($qty_avg, 0);?></td>
                                    <td class="text-right"><?= number_format($val_avg, 2);?></td>
                                    <td class="text-right"><?= number_format($target_qty_avg, 0);?></td>
                                    <td class="text-right"><?= number_format($target_val_avg, 2);?></td>
                                    <td class="text-right"><?= number_format($idx_qty_avg, 0);?>%</td>
                                    <td class="text-right"><?= number_format($idx_val_avg, 0);?>%</td>
                                </tr>
                                
                                <!-- sub qty -->
                                <?php $DR_qty_jan += $row['qty_jan']; ?>
                                <?php $DR_qty_feb += $row['qty_feb']; ?>
                                <?php $DR_qty_mar += $row['qty_mar']; ?>
                                <?php $DR_qty_q1 += $row['qty_q1']; ?>

                                <?php $DR_qty_apr += $row['qty_apr']; ?>
                                <?php $DR_qty_mei += $row['qty_mei']; ?>
                                <?php $DR_qty_jun += $row['qty_jun']; ?>
                                <?php $DR_qty_q2 += $row['qty_q2']; ?>

                                <?php $DR_qty_jul += $row['qty_jul']; ?>
                                <?php $DR_qty_agu += $row['qty_agu']; ?>
                                <?php $DR_qty_sep += $row['qty_sep']; ?>
                                <?php $DR_qty_q3 += $row['qty_q3']; ?>

                                <?php $DR_qty_okt += $row['qty_okt']; ?>
                                <?php $DR_qty_nop += $row['qty_nop']; ?>
                                <?php $DR_qty_des += $row['qty_des']; ?>
                                <?php $DR_qty_q4 += $row['qty_q4']; ?>
                                
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

                                <?php $DR_target_qty_jan += $row['target_qty_jan']; ?>
                                <?php $DR_target_qty_feb += $row['target_qty_feb']; ?>
                                <?php $DR_target_qty_mar += $row['target_qty_mar']; ?>
                                <?php $DR_target_qty_q1 += $row['target_qty_q1']; ?>

                                <?php $DR_target_qty_apr += $row['target_qty_apr']; ?>
                                <?php $DR_target_qty_mei += $row['target_qty_mei']; ?>
                                <?php $DR_target_qty_jun += $row['target_qty_jun']; ?>
                                <?php $DR_target_qty_q2 += $row['target_qty_q2']; ?>

                                <?php $DR_target_qty_jul += $row['target_qty_jul']; ?>
                                <?php $DR_target_qty_agu += $row['target_qty_agu']; ?>
                                <?php $DR_target_qty_sep += $row['target_qty_sep']; ?>
                                <?php $DR_target_qty_q3 += $row['target_qty_q3']; ?>

                                <?php $DR_target_qty_okt += $row['target_qty_okt']; ?>
                                <?php $DR_target_qty_nop += $row['target_qty_nop']; ?>
                                <?php $DR_target_qty_des += $row['target_qty_des']; ?>
                                <?php $DR_target_qty_q4 += $row['target_qty_q4']; ?>
                                
                                <!-- sub val -->
                                <?php $DR_target_val_jan += $row['target_val_jan']; ?>
                                <?php $DR_target_val_feb += $row['target_val_feb']; ?>
                                <?php $DR_target_val_mar += $row['target_val_mar']; ?>
                                <?php $DR_target_val_q1 += $row['target_value_q1']; ?>

                                <?php $DR_target_val_apr += $row['target_val_apr']; ?>
                                <?php $DR_target_val_mei += $row['target_val_mei']; ?>
                                <?php $DR_target_val_jun += $row['target_val_jun']; ?>
                                <?php $DR_target_val_q2 += $row['target_value_q2']; ?>

                                <?php $DR_target_val_jul += $row['target_val_jul']; ?>
                                <?php $DR_target_val_agu += $row['target_val_agu']; ?>
                                <?php $DR_target_val_sep += $row['target_val_sep']; ?>
                                <?php $DR_target_val_q3 += $row['target_value_q3']; ?>

                                <?php $DR_target_val_okt += $row['target_val_okt']; ?>
                                <?php $DR_target_val_nop += $row['target_val_nop']; ?>
                                <?php $DR_target_val_des += $row['target_val_des']; ?>
                                <?php $DR_target_val_q4 += $row['target_value_q4']; ?>

                                <?php $DR_idx_qty_jan = ($DR_qty_jan/($DR_target_qty_jan ?: 1))*100; ?>
                                <?php $DR_idx_qty_feb = ($DR_qty_feb/($DR_target_qty_feb ?: 1))*100; ?>
                                <?php $DR_idx_qty_mar = ($DR_qty_mar/($DR_target_qty_mar ?: 1))*100; ?>
                                <?php $DR_idx_qty_q1 = ($DR_qty_q1/($DR_target_qty_q1 ?: 1))*100; ?>

                                <?php $DR_idx_qty_apr = ($DR_qty_apr/($DR_target_qty_apr ?: 1))*100; ?>
                                <?php $DR_idx_qty_mei = ($DR_qty_mei/($DR_target_qty_mei ?: 1))*100; ?>
                                <?php $DR_idx_qty_jun = ($DR_qty_jun/($DR_target_qty_jun ?: 1))*100; ?>
                                <?php $DR_idx_qty_q2 = ($DR_qty_q2/($DR_target_qty_q2 ?: 1))*100; ?>

                                <?php $DR_idx_qty_jul = ($DR_qty_jul/($DR_target_qty_jul ?: 1))*100; ?>
                                <?php $DR_idx_qty_agu = ($DR_qty_agu/($DR_target_qty_agu ?: 1))*100; ?>
                                <?php $DR_idx_qty_sep = ($DR_qty_sep/($DR_target_qty_sep ?: 1))*100; ?>
                                <?php $DR_idx_qty_q3 = ($DR_qty_q3/($DR_target_qty_q3 ?: 1))*100; ?>

                                <?php $DR_idx_qty_okt = ($DR_qty_okt/($DR_target_qty_okt ?: 1))*100; ?>
                                <?php $DR_idx_qty_nop = ($DR_qty_nop/($DR_target_qty_nop ?: 1))*100; ?>
                                <?php $DR_idx_qty_des = ($DR_qty_des/($DR_target_qty_des ?: 1))*100; ?>
                                <?php $DR_idx_qty_q4 = ($DR_qty_q4/($DR_target_qty_q4 ?: 1))*100; ?>
                                
                                <!-- sub val -->
                                <?php $DR_idx_val_jan = ($DR_val_jan/($DR_target_val_jan ?: 1))*100; ?>
                                <?php $DR_idx_val_feb = ($DR_val_feb/($DR_target_val_feb ?: 1))*100; ?>
                                <?php $DR_idx_val_mar = ($DR_val_mar/($DR_target_val_mar ?: 1))*100; ?>
                                <?php $DR_idx_val_q1 = ($DR_val_q1/($DR_target_val_q1 ?: 1))*100; ?>

                                <?php $DR_idx_val_apr = ($DR_val_apr/($DR_target_val_apr ?: 1))*100; ?>
                                <?php $DR_idx_val_mei = ($DR_val_mei/($DR_target_val_mei ?: 1))*100; ?>
                                <?php $DR_idx_val_jun = ($DR_val_jun/($DR_target_val_jun ?: 1))*100; ?>
                                <?php $DR_idx_val_q2 = ($DR_val_q2/($DR_target_val_q2 ?: 1))*100; ?>

                                <?php $DR_idx_val_jul = ($DR_val_jul/($DR_target_val_jul ?: 1))*100; ?>
                                <?php $DR_idx_val_agu = ($DR_val_agu/($DR_target_val_agu ?: 1))*100; ?>
                                <?php $DR_idx_val_sep = ($DR_val_sep/($DR_target_val_sep ?: 1))*100; ?>
                                <?php $DR_idx_val_q3 = ($DR_val_q3/($DR_target_val_q3 ?: 1))*100; ?>

                                <?php $DR_idx_val_okt = ($DR_val_okt/($DR_target_val_okt ?: 1))*100; ?>
                                <?php $DR_idx_val_nop = ($DR_val_nop/($DR_target_val_nop ?: 1))*100; ?>
                                <?php $DR_idx_val_des = ($DR_val_des/($DR_target_val_des ?: 1))*100; ?>
                                <?php $DR_idx_val_q4 = ($DR_val_q4/($DR_target_val_q4 ?: 1))*100; ?>
                                
                                <?php $principal = $row['principal']; ?>
                                <?php $group_sku = $row['item_group']; ?>
                                <?php $no++; endforeach; ?>

                                <?php $DR_qty_year = $DR_qty_jan + $DR_qty_feb + $DR_qty_mar + $DR_qty_apr + $DR_qty_mei + $DR_qty_jun + $DR_qty_jul + $DR_qty_agu + $DR_qty_sep + $DR_qty_okt + $DR_qty_nop + $DR_qty_des;?>
                                <?php $DR_val_year = $DR_val_jan + $DR_val_feb + $DR_val_mar + $DR_val_apr + $DR_val_mei + $DR_val_jun + $DR_val_jul + $DR_val_agu + $DR_val_sep + $DR_val_okt + $DR_val_nop + $DR_val_des;?>
                                <?php $DR_target_qty_year = $DR_target_qty_jan + $DR_target_qty_feb + $DR_target_qty_mar + $DR_target_qty_apr + $DR_target_qty_mei + $DR_target_qty_jun + $DR_target_qty_jul + $DR_target_qty_agu + $DR_target_qty_sep + $DR_target_qty_okt + $DR_target_qty_nop + $DR_target_qty_des;?> 
                                <?php $DR_target_val_year = $DR_target_val_jan + $DR_target_val_feb + $DR_target_val_mar + $DR_target_val_apr + $DR_target_val_mei + $DR_target_val_jun + $DR_target_val_jul + $DR_target_val_agu + $DR_target_val_sep + $DR_target_val_okt + $DR_target_val_nop + $DR_target_val_des;?>
                                <?php $DR_idx_qty_year = ($DR_qty_year/($DR_target_qty_year ?: 1))*100;?> 
                                <?php $DR_idx_val_year = ($DR_val_year/($DR_target_val_year ?: 1))*100;?> 
                                <?php $DR_qty_avg = $DR_qty_year/12;?>
                                <?php $DR_val_avg = $DR_val_year/12;?>
                                <?php $DR_target_qty_avg = $DR_target_qty_year/12;?>
                                <?php $DR_target_val_avg = $DR_target_val_year/12;?>
                                <?php $DR_idx_qty_avg = ($DR_qty_avg/($DR_target_qty_avg ?: 1))*100;?>
                                <?php $DR_idx_val_avg = ($DR_val_avg/($DR_target_val_avg ?: 1))*100;?>
                                
                                <tr class="table-warning" style="font-weight:bold">
                                    <td></td>
                                    <td><?= $principal;?></td>
                                    <td><?= $group_sku;?></td>
                                    <td></td>
                                    <td class="text-center">Sub Total <?= $group_sku;?></td>
                                    <td></td>
                                    <td class="text-right"><?= number_format($DR_qty_jan, 0);?></td>
                                    <td class="text-right"><?= number_format($DR_val_jan, 2);?></td>
                                    <td class="text-right"><?= number_format($DR_target_qty_jan, 0);?></td>
                                    <td class="text-right"><?= number_format($DR_target_val_jan, 2);?></td>
                                    <td class="text-right"><?= number_format($DR_idx_qty_jan, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DR_idx_val_jan, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DR_qty_feb, 0);?></td>
                                    <td class="text-right"><?= number_format($DR_val_feb, 2);?></td>
                                    <td class="text-right"><?= number_format($DR_target_qty_feb, 0);?></td>
                                    <td class="text-right"><?= number_format($DR_target_val_feb, 2);?></td>
                                    <td class="text-right"><?= number_format($DR_idx_qty_feb, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DR_idx_val_feb, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DR_qty_mar, 0);?></td>
                                    <td class="text-right"><?= number_format($DR_val_mar, 2);?></td>
                                    <td class="text-right"><?= number_format($DR_target_qty_mar, 0);?></td>
                                    <td class="text-right"><?= number_format($DR_target_val_mar, 2);?></td>
                                    <td class="text-right"><?= number_format($DR_idx_qty_mar, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DR_idx_val_mar, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DR_qty_q1, 0);?></td>
                                    <td class="text-right"><?= number_format($DR_val_q1, 2);?></td>
                                    <td class="text-right"><?= number_format($DR_target_qty_q1, 0);?></td>
                                    <td class="text-right"><?= number_format($DR_target_val_q1, 2);?></td>
                                    <td class="text-right"><?= number_format($DR_idx_qty_q1, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DR_idx_val_q1, 0);?>%</td>

                                    <td class="text-right"><?= number_format($DR_qty_apr, 0);?></td>
                                    <td class="text-right"><?= number_format($DR_val_apr, 2);?></td>
                                    <td class="text-right"><?= number_format($DR_target_qty_apr, 0);?></td>
                                    <td class="text-right"><?= number_format($DR_target_val_apr, 2);?></td>
                                    <td class="text-right"><?= number_format($DR_idx_qty_apr, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DR_idx_val_apr, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DR_qty_mei, 0);?></td>
                                    <td class="text-right"><?= number_format($DR_val_mei, 2);?></td>
                                    <td class="text-right"><?= number_format($DR_target_qty_mei, 0);?></td>
                                    <td class="text-right"><?= number_format($DR_target_val_mei, 2);?></td>
                                    <td class="text-right"><?= number_format($DR_idx_qty_mei, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DR_idx_val_mei, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DR_qty_jun, 0);?></td>
                                    <td class="text-right"><?= number_format($DR_val_jun, 2);?></td>
                                    <td class="text-right"><?= number_format($DR_target_qty_jun, 0);?></td>
                                    <td class="text-right"><?= number_format($DR_target_val_jun, 2);?></td>
                                    <td class="text-right"><?= number_format($DR_idx_qty_jun, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DR_idx_val_jun, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DR_qty_q2, 0);?></td>
                                    <td class="text-right"><?= number_format($DR_val_q2, 2);?></td>
                                    <td class="text-right"><?= number_format($DR_target_qty_q2, 0);?></td>
                                    <td class="text-right"><?= number_format($DR_target_val_q2, 2);?></td>
                                    <td class="text-right"><?= number_format($DR_idx_qty_q2, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DR_idx_val_q2, 0);?>%</td>

                                    <td class="text-right"><?= number_format($DR_qty_jul, 0);?></td>
                                    <td class="text-right"><?= number_format($DR_val_jul, 2);?></td>
                                    <td class="text-right"><?= number_format($DR_target_qty_jul, 0);?></td>
                                    <td class="text-right"><?= number_format($DR_target_val_jul, 2);?></td>
                                    <td class="text-right"><?= number_format($DR_idx_qty_jul, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DR_idx_val_jul, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DR_qty_agu, 0);?></td>
                                    <td class="text-right"><?= number_format($DR_val_agu, 2);?></td>
                                    <td class="text-right"><?= number_format($DR_target_qty_agu, 0);?></td>
                                    <td class="text-right"><?= number_format($DR_target_val_agu, 2);?></td>
                                    <td class="text-right"><?= number_format($DR_idx_qty_agu, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DR_idx_val_agu, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DR_qty_sep, 0);?></td>
                                    <td class="text-right"><?= number_format($DR_val_sep, 2);?></td>
                                    <td class="text-right"><?= number_format($DR_target_qty_sep, 0);?></td>
                                    <td class="text-right"><?= number_format($DR_target_val_sep, 2);?></td>
                                    <td class="text-right"><?= number_format($DR_idx_qty_sep, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DR_idx_val_sep, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DR_qty_q3, 0);?></td>
                                    <td class="text-right"><?= number_format($DR_val_q3, 2);?></td>
                                    <td class="text-right"><?= number_format($DR_target_qty_q3, 0);?></td>
                                    <td class="text-right"><?= number_format($DR_target_val_q3, 2);?></td>
                                    <td class="text-right"><?= number_format($DR_idx_qty_q3, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DR_idx_val_q3, 0);?>%</td>

                                    <td class="text-right"><?= number_format($DR_qty_okt, 0);?></td>
                                    <td class="text-right"><?= number_format($DR_val_okt, 2);?></td>
                                    <td class="text-right"><?= number_format($DR_target_qty_okt, 0);?></td>
                                    <td class="text-right"><?= number_format($DR_target_val_okt, 2);?></td>
                                    <td class="text-right"><?= number_format($DR_idx_qty_okt, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DR_idx_val_okt, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DR_qty_nop, 0);?></td>
                                    <td class="text-right"><?= number_format($DR_val_nop, 2);?></td>
                                    <td class="text-right"><?= number_format($DR_target_qty_nop, 0);?></td>
                                    <td class="text-right"><?= number_format($DR_target_val_nop, 2);?></td>
                                    <td class="text-right"><?= number_format($DR_idx_qty_nop, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DR_idx_val_nop, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DR_qty_des, 0);?></td>
                                    <td class="text-right"><?= number_format($DR_val_des, 2);?></td>
                                    <td class="text-right"><?= number_format($DR_target_qty_des, 0);?></td>
                                    <td class="text-right"><?= number_format($DR_target_val_des, 2);?></td>
                                    <td class="text-right"><?= number_format($DR_idx_qty_des, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DR_idx_val_des, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DR_qty_q4, 0);?></td>
                                    <td class="text-right"><?= number_format($DR_val_q4, 2);?></td>
                                    <td class="text-right"><?= number_format($DR_target_qty_q4, 0);?></td>
                                    <td class="text-right"><?= number_format($DR_target_val_q4, 2);?></td>
                                    <td class="text-right"><?= number_format($DR_idx_qty_q4, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DR_idx_val_q4, 0);?>%</td>

                                    <td class="text-right"><?= number_format($DR_qty_year, 0);?></td>
                                    <td class="text-right"><?= number_format($DR_val_year, 2);?></td>
                                    <td class="text-right"><?= number_format($DR_target_qty_year, 0);?></td>
                                    <td class="text-right"><?= number_format($DR_target_val_year, 2);?></td>
                                    <td class="text-right"><?= number_format($DR_idx_qty_year, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DR_idx_val_year, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DR_qty_avg, 0);?></td>
                                    <td class="text-right"><?= number_format($DR_val_avg, 2);?></td>
                                    <td class="text-right"><?= number_format($DR_target_qty_avg, 0);?></td>
                                    <td class="text-right"><?= number_format($DR_target_val_avg, 2);?></td>
                                    <td class="text-right"><?= number_format($DR_idx_qty_avg, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DR_idx_val_avg, 0);?>%</td>
                                </tr>

                                <!-- TOTAL LORD -->
                                <?php
                                    $LORD_qty_jan = $DE_qty_jan + $DP_qty_jan + $SC_qty_jan + $SR_qty_jan + $DR_qty_jan;
                                    $LORD_qty_feb = $DE_qty_feb + $DP_qty_feb + $SC_qty_feb + $SR_qty_feb + $DR_qty_feb;
                                    $LORD_qty_mar = $DE_qty_mar + $DP_qty_mar + $SC_qty_mar + $SR_qty_mar + $DR_qty_mar;
                                    $LORD_qty_q1 = $DE_qty_q1 + $DP_qty_q1 + $SC_qty_q1 + $SR_qty_q1 + $DR_qty_q1;
                                    $LORD_qty_apr = $DE_qty_apr + $DP_qty_apr + $SC_qty_apr + $SR_qty_apr + $DR_qty_apr;
                                    $LORD_qty_mei = $DE_qty_mei + $DP_qty_mei + $SC_qty_mei + $SR_qty_mei + $DR_qty_mei;
                                    $LORD_qty_jun = $DE_qty_jun + $DP_qty_jun + $SC_qty_jun + $SR_qty_jun + $DR_qty_jun;
                                    $LORD_qty_q2 = $DE_qty_q2 + $DP_qty_q2 + $SC_qty_q2 + $SR_qty_q2 + $DR_qty_q2;
                                    $LORD_qty_jul = $DE_qty_jul + $DP_qty_jul + $SC_qty_jul + $SR_qty_jul + $DR_qty_jul;
                                    $LORD_qty_agu = $DE_qty_agu + $DP_qty_agu + $SC_qty_agu + $SR_qty_agu + $DR_qty_agu;
                                    $LORD_qty_sep = $DE_qty_sep + $DP_qty_sep + $SC_qty_sep + $SR_qty_sep + $DR_qty_sep;
                                    $LORD_qty_q3 = $DE_qty_q3 + $DP_qty_q3 + $SC_qty_q3 + $SR_qty_q3 + $DR_qty_q3;
                                    $LORD_qty_okt = $DE_qty_okt + $DP_qty_okt + $SC_qty_okt + $SR_qty_okt + $DR_qty_okt;
                                    $LORD_qty_nop = $DE_qty_nop + $DP_qty_nop + $SC_qty_nop + $SR_qty_nop + $DR_qty_nop;
                                    $LORD_qty_des = $DE_qty_des + $DP_qty_des + $SC_qty_des + $SR_qty_des + $DR_qty_des;
                                    $LORD_qty_q4 = $DE_qty_q4 + $DP_qty_q4 + $SC_qty_q4 + $SR_qty_q4 + $DR_qty_q4;

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

                                    $LORD_target_qty_jan = $DE_target_qty_jan + $DP_target_qty_jan + $SC_target_qty_jan + $SR_target_qty_jan + $DR_target_qty_jan;
                                    $LORD_target_qty_feb = $DE_target_qty_feb + $DP_target_qty_feb + $SC_target_qty_feb + $SR_target_qty_feb + $DR_target_qty_feb;
                                    $LORD_target_qty_mar = $DE_target_qty_mar + $DP_target_qty_mar + $SC_target_qty_mar + $SR_target_qty_mar + $DR_target_qty_mar;
                                    $LORD_target_qty_q1 = $DE_target_qty_q1 + $DP_target_qty_q1 + $SC_target_qty_q1 + $SR_target_qty_q1 + $DR_target_qty_q1;
                                    $LORD_target_qty_apr = $DE_target_qty_apr + $DP_target_qty_apr + $SC_target_qty_apr + $SR_target_qty_apr + $DR_target_qty_apr;
                                    $LORD_target_qty_mei = $DE_target_qty_mei + $DP_target_qty_mei + $SC_target_qty_mei + $SR_target_qty_mei + $DR_target_qty_mei;
                                    $LORD_target_qty_jun = $DE_target_qty_jun + $DP_target_qty_jun + $SC_target_qty_jun + $SR_target_qty_jun + $DR_target_qty_jun;
                                    $LORD_target_qty_q2 = $DE_target_qty_q2 + $DP_target_qty_q2 + $SC_target_qty_q2 + $SR_target_qty_q2 + $DR_target_qty_q2;
                                    $LORD_target_qty_jul = $DE_target_qty_jul + $DP_target_qty_jul + $SC_target_qty_jul + $SR_target_qty_jul + $DR_target_qty_jul;
                                    $LORD_target_qty_agu = $DE_target_qty_agu + $DP_target_qty_agu + $SC_target_qty_agu + $SR_target_qty_agu + $DR_target_qty_agu;
                                    $LORD_target_qty_sep = $DE_target_qty_sep + $DP_target_qty_sep + $SC_target_qty_sep + $SR_target_qty_sep + $DR_target_qty_sep;
                                    $LORD_target_qty_q3 = $DE_target_qty_q3 + $DP_target_qty_q3 + $SC_target_qty_q3 + $SR_target_qty_q3 + $DR_target_qty_q3;
                                    $LORD_target_qty_okt = $DE_target_qty_okt + $DP_target_qty_okt + $SC_target_qty_okt + $SR_target_qty_okt + $DR_target_qty_okt;
                                    $LORD_target_qty_nop = $DE_target_qty_nop + $DP_target_qty_nop + $SC_target_qty_nop + $SR_target_qty_nop + $DR_target_qty_nop;
                                    $LORD_target_qty_des = $DE_target_qty_des + $DP_target_qty_des + $SC_target_qty_des + $SR_target_qty_des + $DR_target_qty_des;
                                    $LORD_target_qty_q4 = $DE_target_qty_q4 + $DP_target_qty_q4 + $SC_target_qty_q4 + $SR_target_qty_q4 + $DR_target_qty_q4;

                                    $LORD_target_val_jan = $DE_target_val_jan + $DP_target_val_jan + $SC_target_val_jan + $SR_target_val_jan + $DR_target_val_jan;
                                    $LORD_target_val_feb = $DE_target_val_feb + $DP_target_val_feb + $SC_target_val_feb + $SR_target_val_feb + $DR_target_val_feb;
                                    $LORD_target_val_mar = $DE_target_val_mar + $DP_target_val_mar + $SC_target_val_mar + $SR_target_val_mar + $DR_target_val_mar;
                                    $LORD_target_val_q1 = $DE_target_val_q1 + $DP_target_val_q1 + $SC_target_val_q1 + $SR_target_val_q1 + $DR_target_val_q1;
                                    $LORD_target_val_apr = $DE_target_val_apr + $DP_target_val_apr + $SC_target_val_apr + $SR_target_val_apr + $DR_target_val_apr;
                                    $LORD_target_val_mei = $DE_target_val_mei + $DP_target_val_mei + $SC_target_val_mei + $SR_target_val_mei + $DR_target_val_mei;
                                    $LORD_target_val_jun = $DE_target_val_jun + $DP_target_val_jun + $SC_target_val_jun + $SR_target_val_jun + $DR_target_val_jun;
                                    $LORD_target_val_q2 = $DE_target_val_q2 + $DP_target_val_q2 + $SC_target_val_q2 + $SR_target_val_q2 + $DR_target_val_q2;
                                    $LORD_target_val_jul = $DE_target_val_jul + $DP_target_val_jul + $SC_target_val_jul + $SR_target_val_jul + $DR_target_val_jul;
                                    $LORD_target_val_agu = $DE_target_val_agu + $DP_target_val_agu + $SC_target_val_agu + $SR_target_val_agu + $DR_target_val_agu;
                                    $LORD_target_val_sep = $DE_target_val_sep + $DP_target_val_sep + $SC_target_val_sep + $SR_target_val_sep + $DR_target_val_sep;
                                    $LORD_target_val_q3 = $DE_target_val_q3 + $DP_target_val_q3 + $SC_target_val_q3 + $SR_target_val_q3 + $DR_target_val_q3;
                                    $LORD_target_val_okt = $DE_target_val_okt + $DP_target_val_okt + $SC_target_val_okt + $SR_target_val_okt + $DR_target_val_okt;
                                    $LORD_target_val_nop = $DE_target_val_nop + $DP_target_val_nop + $SC_target_val_nop + $SR_target_val_nop + $DR_target_val_nop;
                                    $LORD_target_val_des = $DE_target_val_des + $DP_target_val_des + $SC_target_val_des + $SR_target_val_des + $DR_target_val_des;
                                    $LORD_target_val_q4 = $DE_target_val_q4 + $DP_target_val_q4 + $SC_target_val_q4 + $SR_target_val_q4 + $DR_target_val_q4;

                                    $LORD_idx_qty_jan = ($LORD_qty_jan/($LORD_target_qty_jan ?: 1))*100;
                                    $LORD_idx_qty_feb = ($LORD_qty_feb/($LORD_target_qty_feb ?: 1))*100;
                                    $LORD_idx_qty_mar = ($LORD_qty_mar/($LORD_target_qty_mar ?: 1))*100;
                                    $LORD_idx_qty_q1 = ($LORD_qty_q1/($LORD_target_qty_q1 ?: 1))*100;
                                    $LORD_idx_qty_apr = ($LORD_qty_apr/($LORD_target_qty_apr ?: 1))*100;
                                    $LORD_idx_qty_mei = ($LORD_qty_mei/($LORD_target_qty_mei ?: 1))*100;
                                    $LORD_idx_qty_jun = ($LORD_qty_jun/($LORD_target_qty_jun ?: 1))*100;
                                    $LORD_idx_qty_q2 = ($LORD_qty_q2/($LORD_target_qty_q2 ?: 1))*100;
                                    $LORD_idx_qty_jul = ($LORD_qty_jul/($LORD_target_qty_jul ?: 1))*100;
                                    $LORD_idx_qty_agu = ($LORD_qty_agu/($LORD_target_qty_agu ?: 1))*100;
                                    $LORD_idx_qty_sep = ($LORD_qty_sep/($LORD_target_qty_sep ?: 1))*100;
                                    $LORD_idx_qty_q3 = ($LORD_qty_q3/($LORD_target_qty_q3 ?: 1))*100;
                                    $LORD_idx_qty_okt = ($LORD_qty_okt/($LORD_target_qty_okt ?: 1))*100;
                                    $LORD_idx_qty_nop = ($LORD_qty_nop/($LORD_target_qty_nop ?: 1))*100;
                                    $LORD_idx_qty_des = ($LORD_qty_des/($LORD_target_qty_des ?: 1))*100;
                                    $LORD_idx_qty_q4 = ($LORD_qty_q4/($LORD_target_qty_q4 ?: 1))*100;

                                    $LORD_idx_val_jan = ($LORD_val_jan/($LORD_target_val_jan ?: 1))*100;
                                    $LORD_idx_val_feb = ($LORD_val_feb/($LORD_target_val_feb ?: 1))*100;
                                    $LORD_idx_val_mar = ($LORD_val_mar/($LORD_target_val_mar ?: 1))*100;
                                    $LORD_idx_val_q1 = ($LORD_val_q1/($LORD_target_val_q1 ?: 1))*100;
                                    $LORD_idx_val_apr = ($LORD_val_apr/($LORD_target_val_apr ?: 1))*100;
                                    $LORD_idx_val_mei = ($LORD_val_mei/($LORD_target_val_mei ?: 1))*100;
                                    $LORD_idx_val_jun = ($LORD_val_jun/($LORD_target_val_jun ?: 1))*100;
                                    $LORD_idx_val_q2 = ($LORD_val_q2/($LORD_target_val_q2 ?: 1))*100;
                                    $LORD_idx_val_jul = ($LORD_val_jul/($LORD_target_val_jul ?: 1))*100;
                                    $LORD_idx_val_agu = ($LORD_val_agu/($LORD_target_val_agu ?: 1))*100;
                                    $LORD_idx_val_sep = ($LORD_val_sep/($LORD_target_val_sep ?: 1))*100;
                                    $LORD_idx_val_q3 = ($LORD_val_q3/($LORD_target_val_q3 ?: 1))*100;
                                    $LORD_idx_val_okt = ($LORD_val_okt/($LORD_target_val_okt ?: 1))*100;
                                    $LORD_idx_val_nop = ($LORD_val_nop/($LORD_target_val_nop ?: 1))*100;
                                    $LORD_idx_val_des = ($LORD_val_des/($LORD_target_val_des ?: 1))*100;
                                    $LORD_idx_val_q4 = ($LORD_val_q4/($LORD_target_val_q4 ?: 1))*100;

                                    $LORD_qty_year = $LORD_qty_jan + $LORD_qty_feb + $LORD_qty_mar + $LORD_qty_apr + $LORD_qty_mei + $LORD_qty_jun + $LORD_qty_jul + $LORD_qty_agu + $LORD_qty_sep + $LORD_qty_okt + $LORD_qty_nop + $LORD_qty_des;
                                    $LORD_val_year = $LORD_val_jan + $LORD_val_feb + $LORD_val_mar + $LORD_val_apr + $LORD_val_mei + $LORD_val_jun + $LORD_val_jul + $LORD_val_agu + $LORD_val_sep + $LORD_val_okt + $LORD_val_nop + $LORD_val_des;
                                    $LORD_qty_avg = $LORD_qty_year / 12;
                                    $LORD_val_avg = $LORD_val_year / 12;

                                    $LORD_target_qty_year = $LORD_target_qty_jan + $LORD_target_qty_feb + $LORD_target_qty_mar + $LORD_target_qty_apr + $LORD_target_qty_mei + $LORD_target_qty_jun + $LORD_target_qty_jul + $LORD_target_qty_agu + $LORD_target_qty_sep + $LORD_target_qty_okt + $LORD_target_qty_nop + $LORD_target_qty_des;
                                    $LORD_target_val_year = $LORD_target_val_jan + $LORD_target_val_feb + $LORD_target_val_mar + $LORD_target_val_apr + $LORD_target_val_mei + $LORD_target_val_jun + $LORD_target_val_jul + $LORD_target_val_agu + $LORD_target_val_sep + $LORD_target_val_okt + $LORD_target_val_nop + $LORD_target_val_des;
                                    $LORD_target_qty_avg = $LORD_target_qty_year / 12;
                                    $LORD_target_val_avg = $LORD_target_val_year / 12;

                                    $LORD_idx_qty_year = ($LORD_qty_year/($LORD_target_qty_year ?: 1))*100;
                                    $LORD_idx_val_year = ($LORD_val_year/($LORD_target_val_year ?: 1))*100;
                                    $LORD_idx_qty_avg = ($LORD_qty_avg/($LORD_target_qty_avg ?: 1))*100;
                                    $LORD_idx_val_avg = ($LORD_val_avg/($LORD_target_val_avg ?: 1))*100;

                                ?>

                                <tr class="table-danger" style="font-weight:bold">
                                    <td></td>
                                    <td>LORD</td>
                                    <td></td>
                                    <td></td>
                                    <td class="text-center">TOTAL LORD</td>
                                    <td></td>
                                    <td class="text-right"><?= number_format($LORD_qty_jan, 0);?></td>
                                    <td class="text-right"><?= number_format($LORD_val_jan, 2);?></td>
                                    <td class="text-right"><?= number_format($LORD_target_qty_jan, 0);?></td>
                                    <td class="text-right"><?= number_format($LORD_target_val_jan, 2);?></td>
                                    <td class="text-right"><?= number_format($LORD_idx_qty_jan, 0);?>%</td>
                                    <td class="text-right"><?= number_format($LORD_idx_val_jan, 0);?>%</td>
                                    <td class="text-right"><?= number_format($LORD_qty_feb, 0);?></td>
                                    <td class="text-right"><?= number_format($LORD_val_feb, 2);?></td>
                                    <td class="text-right"><?= number_format($LORD_target_qty_feb, 0);?></td>
                                    <td class="text-right"><?= number_format($LORD_target_val_feb, 2);?></td>
                                    <td class="text-right"><?= number_format($LORD_idx_qty_feb, 0);?>%</td>
                                    <td class="text-right"><?= number_format($LORD_idx_val_feb, 0);?>%</td>
                                    <td class="text-right"><?= number_format($LORD_qty_mar, 0);?></td>
                                    <td class="text-right"><?= number_format($LORD_val_mar, 2);?></td>
                                    <td class="text-right"><?= number_format($LORD_target_qty_mar, 0);?></td>
                                    <td class="text-right"><?= number_format($LORD_target_val_mar, 2);?></td>
                                    <td class="text-right"><?= number_format($LORD_idx_qty_mar, 0);?>%</td>
                                    <td class="text-right"><?= number_format($LORD_idx_val_mar, 0);?>%</td>
                                    <td class="text-right"><?= number_format($LORD_qty_q1, 0);?></td>
                                    <td class="text-right"><?= number_format($LORD_val_q1, 2);?></td>
                                    <td class="text-right"><?= number_format($LORD_target_qty_q1, 0);?></td>
                                    <td class="text-right"><?= number_format($LORD_target_val_q1, 2);?></td>
                                    <td class="text-right"><?= number_format($LORD_idx_qty_q1, 0);?>%</td>
                                    <td class="text-right"><?= number_format($LORD_idx_val_q1, 0);?>%</td>

                                    <td class="text-right"><?= number_format($LORD_qty_apr, 0);?></td>
                                    <td class="text-right"><?= number_format($LORD_val_apr, 2);?></td>
                                    <td class="text-right"><?= number_format($LORD_target_qty_apr, 0);?></td>
                                    <td class="text-right"><?= number_format($LORD_target_val_apr, 2);?></td>
                                    <td class="text-right"><?= number_format($LORD_idx_qty_apr, 0);?>%</td>
                                    <td class="text-right"><?= number_format($LORD_idx_val_apr, 0);?>%</td>
                                    <td class="text-right"><?= number_format($LORD_qty_mei, 0);?></td>
                                    <td class="text-right"><?= number_format($LORD_val_mei, 2);?></td>
                                    <td class="text-right"><?= number_format($LORD_target_qty_mei, 0);?></td>
                                    <td class="text-right"><?= number_format($LORD_target_val_mei, 2);?></td>
                                    <td class="text-right"><?= number_format($LORD_idx_qty_mei, 0);?>%</td>
                                    <td class="text-right"><?= number_format($LORD_idx_val_mei, 0);?>%</td>
                                    <td class="text-right"><?= number_format($LORD_qty_jun, 0);?></td>
                                    <td class="text-right"><?= number_format($LORD_val_jun, 2);?></td>
                                    <td class="text-right"><?= number_format($LORD_target_qty_jun, 0);?></td>
                                    <td class="text-right"><?= number_format($LORD_target_val_jun, 2);?></td>
                                    <td class="text-right"><?= number_format($LORD_idx_qty_jun, 0);?>%</td>
                                    <td class="text-right"><?= number_format($LORD_idx_val_jun, 0);?>%</td>
                                    <td class="text-right"><?= number_format($LORD_qty_q2, 0);?></td>
                                    <td class="text-right"><?= number_format($LORD_val_q2, 2);?></td>
                                    <td class="text-right"><?= number_format($LORD_target_qty_q2, 0);?></td>
                                    <td class="text-right"><?= number_format($LORD_target_val_q2, 2);?></td>
                                    <td class="text-right"><?= number_format($LORD_idx_qty_q2, 0);?>%</td>
                                    <td class="text-right"><?= number_format($LORD_idx_val_q2, 0);?>%</td>

                                    <td class="text-right"><?= number_format($LORD_qty_jul, 0);?></td>
                                    <td class="text-right"><?= number_format($LORD_val_jul, 2);?></td>
                                    <td class="text-right"><?= number_format($LORD_target_qty_jul, 0);?></td>
                                    <td class="text-right"><?= number_format($LORD_target_val_jul, 2);?></td>
                                    <td class="text-right"><?= number_format($LORD_idx_qty_jul, 0);?>%</td>
                                    <td class="text-right"><?= number_format($LORD_idx_val_jul, 0);?>%</td>
                                    <td class="text-right"><?= number_format($LORD_qty_agu, 0);?></td>
                                    <td class="text-right"><?= number_format($LORD_val_agu, 2);?></td>
                                    <td class="text-right"><?= number_format($LORD_target_qty_agu, 0);?></td>
                                    <td class="text-right"><?= number_format($LORD_target_val_agu, 2);?></td>
                                    <td class="text-right"><?= number_format($LORD_idx_qty_agu, 0);?>%</td>
                                    <td class="text-right"><?= number_format($LORD_idx_val_agu, 0);?>%</td>
                                    <td class="text-right"><?= number_format($LORD_qty_sep, 0);?></td>
                                    <td class="text-right"><?= number_format($LORD_val_sep, 2);?></td>
                                    <td class="text-right"><?= number_format($LORD_target_qty_sep, 0);?></td>
                                    <td class="text-right"><?= number_format($LORD_target_val_sep, 2);?></td>
                                    <td class="text-right"><?= number_format($LORD_idx_qty_sep, 0);?>%</td>
                                    <td class="text-right"><?= number_format($LORD_idx_val_sep, 0);?>%</td>
                                    <td class="text-right"><?= number_format($LORD_qty_q3, 0);?></td>
                                    <td class="text-right"><?= number_format($LORD_val_q3, 2);?></td>
                                    <td class="text-right"><?= number_format($LORD_target_qty_q3, 0);?></td>
                                    <td class="text-right"><?= number_format($LORD_target_val_q3, 2);?></td>
                                    <td class="text-right"><?= number_format($LORD_idx_qty_q3, 0);?>%</td>
                                    <td class="text-right"><?= number_format($LORD_idx_val_q3, 0);?>%</td>

                                    <td class="text-right"><?= number_format($LORD_qty_okt, 0);?></td>
                                    <td class="text-right"><?= number_format($LORD_val_okt, 2);?></td>
                                    <td class="text-right"><?= number_format($LORD_target_qty_okt, 0);?></td>
                                    <td class="text-right"><?= number_format($LORD_target_val_okt, 2);?></td>
                                    <td class="text-right"><?= number_format($LORD_idx_qty_okt, 0);?>%</td>
                                    <td class="text-right"><?= number_format($LORD_idx_val_okt, 0);?>%</td>
                                    <td class="text-right"><?= number_format($LORD_qty_nop, 0);?></td>
                                    <td class="text-right"><?= number_format($LORD_val_nop, 2);?></td>
                                    <td class="text-right"><?= number_format($LORD_target_qty_nop, 0);?></td>
                                    <td class="text-right"><?= number_format($LORD_target_val_nop, 2);?></td>
                                    <td class="text-right"><?= number_format($LORD_idx_qty_nop, 0);?>%</td>
                                    <td class="text-right"><?= number_format($LORD_idx_val_nop, 0);?>%</td>
                                    <td class="text-right"><?= number_format($LORD_qty_des, 0);?></td>
                                    <td class="text-right"><?= number_format($LORD_val_des, 2);?></td>
                                    <td class="text-right"><?= number_format($LORD_target_qty_des, 0);?></td>
                                    <td class="text-right"><?= number_format($LORD_target_val_des, 2);?></td>
                                    <td class="text-right"><?= number_format($LORD_idx_qty_des, 0);?>%</td>
                                    <td class="text-right"><?= number_format($LORD_idx_val_des, 0);?>%</td>
                                    <td class="text-right"><?= number_format($LORD_qty_q4, 0);?></td>
                                    <td class="text-right"><?= number_format($LORD_val_q4, 2);?></td>
                                    <td class="text-right"><?= number_format($LORD_target_qty_q4, 0);?></td>
                                    <td class="text-right"><?= number_format($LORD_target_val_q4, 2);?></td>
                                    <td class="text-right"><?= number_format($LORD_idx_qty_q4, 0);?>%</td>
                                    <td class="text-right"><?= number_format($LORD_idx_val_q4, 0);?>%</td>

                                    <td class="text-right"><?= number_format($LORD_qty_year, 0);?></td>
                                    <td class="text-right"><?= number_format($LORD_val_year, 2);?></td>
                                    <td class="text-right"><?= number_format($LORD_target_qty_year, 0);?></td>
                                    <td class="text-right"><?= number_format($LORD_target_val_year, 2);?></td>
                                    <td class="text-right"><?= number_format($LORD_idx_qty_year, 0);?>%</td>
                                    <td class="text-right"><?= number_format($LORD_idx_val_year, 0);?>%</td>
                                    <td class="text-right"><?= number_format($LORD_qty_avg, 0);?></td>
                                    <td class="text-right"><?= number_format($LORD_val_avg, 2);?></td>
                                    <td class="text-right"><?= number_format($LORD_target_qty_avg, 0);?></td>
                                    <td class="text-right"><?= number_format($LORD_target_val_avg, 2);?></td>
                                    <td class="text-right"><?= number_format($LORD_idx_qty_avg, 0);?>%</td>
                                    <td class="text-right"><?= number_format($LORD_idx_val_avg, 0);?>%</td>
                                </tr>


                                <?php $no=1; ?>
                                <!-- ADULT TOOTHBRUSH -->
                                <?php
                                    $AT_qty_jan = 0;
                                    $AT_qty_feb = 0;
                                    $AT_qty_mar = 0;
                                    $AT_qty_q1 = 0;
                                    $AT_qty_apr = 0;
                                    $AT_qty_mei = 0;
                                    $AT_qty_jun = 0;
                                    $AT_qty_q2 = 0;
                                    $AT_qty_jul = 0;
                                    $AT_qty_agu = 0;
                                    $AT_qty_sep = 0;
                                    $AT_qty_q3 = 0;
                                    $AT_qty_okt = 0;
                                    $AT_qty_nop = 0;
                                    $AT_qty_des = 0;
                                    $AT_qty_q4 = 0;

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

                                    $AT_target_qty_jan = 0;
                                    $AT_target_qty_feb = 0;
                                    $AT_target_qty_mar = 0;
                                    $AT_target_qty_q1 = 0;
                                    $AT_target_qty_apr = 0;
                                    $AT_target_qty_mei = 0;
                                    $AT_target_qty_jun = 0;
                                    $AT_target_qty_q2 = 0;
                                    $AT_target_qty_jul = 0;
                                    $AT_target_qty_agu = 0;
                                    $AT_target_qty_sep = 0;
                                    $AT_target_qty_q3 = 0;
                                    $AT_target_qty_okt = 0;
                                    $AT_target_qty_nop = 0;
                                    $AT_target_qty_des = 0;
                                    $AT_target_qty_q4 = 0;

                                    $AT_target_val_jan = 0;
                                    $AT_target_val_feb = 0;
                                    $AT_target_val_mar = 0;
                                    $AT_target_val_q1 = 0;
                                    $AT_target_val_apr = 0;
                                    $AT_target_val_mei = 0;
                                    $AT_target_val_jun = 0;
                                    $AT_target_val_q2 = 0;
                                    $AT_target_val_jul = 0;
                                    $AT_target_val_agu = 0;
                                    $AT_target_val_sep = 0;
                                    $AT_target_val_q3 = 0;
                                    $AT_target_val_okt = 0;
                                    $AT_target_val_nop = 0;
                                    $AT_target_val_des = 0;
                                    $AT_target_val_q4 = 0;

                                    $AT_idx_qty_jan = 0;
                                    $AT_idx_qty_feb = 0;
                                    $AT_idx_qty_mar = 0;
                                    $AT_idx_qty_q1 = 0;
                                    $AT_idx_qty_apr = 0;
                                    $AT_idx_qty_mei = 0;
                                    $AT_idx_qty_jun = 0;
                                    $AT_idx_qty_q2 = 0;
                                    $AT_idx_qty_jul = 0;
                                    $AT_idx_qty_agu = 0;
                                    $AT_idx_qty_sep = 0;
                                    $AT_idx_qty_q3 = 0;
                                    $AT_idx_qty_okt = 0;
                                    $AT_idx_qty_nop = 0;
                                    $AT_idx_qty_des = 0;
                                    $AT_idx_qty_q4 = 0;

                                    $AT_idx_val_jan = 0;
                                    $AT_idx_val_feb = 0;
                                    $AT_idx_val_mar = 0;
                                    $AT_idx_val_q1 = 0;
                                    $AT_idx_val_apr = 0;
                                    $AT_idx_val_mei = 0;
                                    $AT_idx_val_jun = 0;
                                    $AT_idx_val_q2 = 0;
                                    $AT_idx_val_jul = 0;
                                    $AT_idx_val_agu = 0;
                                    $AT_idx_val_sep = 0;
                                    $AT_idx_val_q3 = 0;
                                    $AT_idx_val_okt = 0;
                                    $AT_idx_val_nop = 0;
                                    $AT_idx_val_des = 0;
                                    $AT_idx_val_q4 = 0;
                                ?>
                                <?php foreach ($data['sellingout_AT'] as $row) :?>
                                <tr>
                                    <td class="text-center"><?= $no; ?></td>
                                    <td><?= $row['principal'];?></td>
                                    <td><?= $row['item_group'];?></td>
                                    <td><?= $row['item_code'];?></td>
                                    <td><?= $row['item_name'];?></td>
                                    <td class="text-center"><?= $row['unit'];?></td>
                                    <td class="text-right"><?= number_format($row['qty_jan'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_jan'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_jan'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_jan'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_jan'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_jan'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_feb'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_feb'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_feb'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_feb'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_feb'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_feb'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_mar'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_mar'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_mar'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_mar'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_mar'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_mar'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_q1'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_q1'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_q1'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_value_q1'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_q1'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_q1'], 0);?>%</td>

                                    <td class="text-right"><?= number_format($row['qty_apr'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_apr'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_apr'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_apr'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_apr'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_apr'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_mei'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_mei'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_mei'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_mei'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_mei'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_mei'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_jun'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_jun'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_jun'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_jun'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_jun'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_jun'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_q2'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_q2'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_q2'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_value_q2'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_q2'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_q2'], 0);?>%</td>

                                    <td class="text-right"><?= number_format($row['qty_jul'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_jul'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_jul'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_jul'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_jul'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_jul'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_agu'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_agu'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_agu'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_agu'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_agu'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_agu'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_sep'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_sep'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_sep'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_sep'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_sep'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_sep'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_q3'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_q3'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_q3'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_value_q3'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_q3'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_q3'], 0);?>%</td>

                                    <td class="text-right"><?= number_format($row['qty_okt'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_okt'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_okt'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_okt'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_okt'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_okt'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_nop'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_nop'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_nop'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_nop'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_nop'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_nop'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_des'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_des'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_des'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_des'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_des'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_des'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_q4'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_q4'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_q4'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_value_q4'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_q4'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_q4'], 0);?>%</td>

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

                                    <td class="text-right"><?= number_format($qty_year, 0);?></td>
                                    <td class="text-right"><?= number_format($val_year, 2);?></td>
                                    <td class="text-right"><?= number_format($target_qty_year, 0);?></td>
                                    <td class="text-right"><?= number_format($target_val_year, 2);?></td>
                                    <td class="text-right"><?= number_format($idx_qty_year, 0);?>%</td>
                                    <td class="text-right"><?= number_format($idx_val_year, 0);?>%</td>
                                    <td class="text-right"><?= number_format($qty_avg, 0);?></td>
                                    <td class="text-right"><?= number_format($val_avg, 2);?></td>
                                    <td class="text-right"><?= number_format($target_qty_avg, 0);?></td>
                                    <td class="text-right"><?= number_format($target_val_avg, 2);?></td>
                                    <td class="text-right"><?= number_format($idx_qty_avg, 0);?>%</td>
                                    <td class="text-right"><?= number_format($idx_val_avg, 0);?>%</td>
                                </tr>
                                
                                <!-- sub qty -->
                                <?php $AT_qty_jan += $row['qty_jan']; ?>
                                <?php $AT_qty_feb += $row['qty_feb']; ?>
                                <?php $AT_qty_mar += $row['qty_mar']; ?>
                                <?php $AT_qty_q1 += $row['qty_q1']; ?>

                                <?php $AT_qty_apr += $row['qty_apr']; ?>
                                <?php $AT_qty_mei += $row['qty_mei']; ?>
                                <?php $AT_qty_jun += $row['qty_jun']; ?>
                                <?php $AT_qty_q2 += $row['qty_q2']; ?>

                                <?php $AT_qty_jul += $row['qty_jul']; ?>
                                <?php $AT_qty_agu += $row['qty_agu']; ?>
                                <?php $AT_qty_sep += $row['qty_sep']; ?>
                                <?php $AT_qty_q3 += $row['qty_q3']; ?>

                                <?php $AT_qty_okt += $row['qty_okt']; ?>
                                <?php $AT_qty_nop += $row['qty_nop']; ?>
                                <?php $AT_qty_des += $row['qty_des']; ?>
                                <?php $AT_qty_q4 += $row['qty_q4']; ?>
                                
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

                                <?php $AT_target_qty_jan += $row['target_qty_jan']; ?>
                                <?php $AT_target_qty_feb += $row['target_qty_feb']; ?>
                                <?php $AT_target_qty_mar += $row['target_qty_mar']; ?>
                                <?php $AT_target_qty_q1 += $row['target_qty_q1']; ?>

                                <?php $AT_target_qty_apr += $row['target_qty_apr']; ?>
                                <?php $AT_target_qty_mei += $row['target_qty_mei']; ?>
                                <?php $AT_target_qty_jun += $row['target_qty_jun']; ?>
                                <?php $AT_target_qty_q2 += $row['target_qty_q2']; ?>

                                <?php $AT_target_qty_jul += $row['target_qty_jul']; ?>
                                <?php $AT_target_qty_agu += $row['target_qty_agu']; ?>
                                <?php $AT_target_qty_sep += $row['target_qty_sep']; ?>
                                <?php $AT_target_qty_q3 += $row['target_qty_q3']; ?>

                                <?php $AT_target_qty_okt += $row['target_qty_okt']; ?>
                                <?php $AT_target_qty_nop += $row['target_qty_nop']; ?>
                                <?php $AT_target_qty_des += $row['target_qty_des']; ?>
                                <?php $AT_target_qty_q4 += $row['target_qty_q4']; ?>
                                
                                <!-- sub val -->
                                <?php $AT_target_val_jan += $row['target_val_jan']; ?>
                                <?php $AT_target_val_feb += $row['target_val_feb']; ?>
                                <?php $AT_target_val_mar += $row['target_val_mar']; ?>
                                <?php $AT_target_val_q1 += $row['target_value_q1']; ?>

                                <?php $AT_target_val_apr += $row['target_val_apr']; ?>
                                <?php $AT_target_val_mei += $row['target_val_mei']; ?>
                                <?php $AT_target_val_jun += $row['target_val_jun']; ?>
                                <?php $AT_target_val_q2 += $row['target_value_q2']; ?>

                                <?php $AT_target_val_jul += $row['target_val_jul']; ?>
                                <?php $AT_target_val_agu += $row['target_val_agu']; ?>
                                <?php $AT_target_val_sep += $row['target_val_sep']; ?>
                                <?php $AT_target_val_q3 += $row['target_value_q3']; ?>

                                <?php $AT_target_val_okt += $row['target_val_okt']; ?>
                                <?php $AT_target_val_nop += $row['target_val_nop']; ?>
                                <?php $AT_target_val_des += $row['target_val_des']; ?>
                                <?php $AT_target_val_q4 += $row['target_value_q4']; ?>

                                <?php $AT_idx_qty_jan = ($AT_qty_jan/($AT_target_qty_jan ?: 1))*100; ?>
                                <?php $AT_idx_qty_feb = ($AT_qty_feb/($AT_target_qty_feb ?: 1))*100; ?>
                                <?php $AT_idx_qty_mar = ($AT_qty_mar/($AT_target_qty_mar ?: 1))*100; ?>
                                <?php $AT_idx_qty_q1 = ($AT_qty_q1/($AT_target_qty_q1 ?: 1))*100; ?>

                                <?php $AT_idx_qty_apr = ($AT_qty_apr/($AT_target_qty_apr ?: 1))*100; ?>
                                <?php $AT_idx_qty_mei = ($AT_qty_mei/($AT_target_qty_mei ?: 1))*100; ?>
                                <?php $AT_idx_qty_jun = ($AT_qty_jun/($AT_target_qty_jun ?: 1))*100; ?>
                                <?php $AT_idx_qty_q2 = ($AT_qty_q2/($AT_target_qty_q2 ?: 1))*100; ?>

                                <?php $AT_idx_qty_jul = ($AT_qty_jul/($AT_target_qty_jul ?: 1))*100; ?>
                                <?php $AT_idx_qty_agu = ($AT_qty_agu/($AT_target_qty_agu ?: 1))*100; ?>
                                <?php $AT_idx_qty_sep = ($AT_qty_sep/($AT_target_qty_sep ?: 1))*100; ?>
                                <?php $AT_idx_qty_q3 = ($AT_qty_q3/($AT_target_qty_q3 ?: 1))*100; ?>

                                <?php $AT_idx_qty_okt = ($AT_qty_okt/($AT_target_qty_okt ?: 1))*100; ?>
                                <?php $AT_idx_qty_nop = ($AT_qty_nop/($AT_target_qty_nop ?: 1))*100; ?>
                                <?php $AT_idx_qty_des = ($AT_qty_des/($AT_target_qty_des ?: 1))*100; ?>
                                <?php $AT_idx_qty_q4 = ($AT_qty_q4/($AT_target_qty_q4 ?: 1))*100; ?>
                                
                                <!-- sub val -->
                                <?php $AT_idx_val_jan = ($AT_val_jan/($AT_target_val_jan ?: 1))*100; ?>
                                <?php $AT_idx_val_feb = ($AT_val_feb/($AT_target_val_feb ?: 1))*100; ?>
                                <?php $AT_idx_val_mar = ($AT_val_mar/($AT_target_val_mar ?: 1))*100; ?>
                                <?php $AT_idx_val_q1 = ($AT_val_q1/($AT_target_val_q1 ?: 1))*100; ?>

                                <?php $AT_idx_val_apr = ($AT_val_apr/($AT_target_val_apr ?: 1))*100; ?>
                                <?php $AT_idx_val_mei = ($AT_val_mei/($AT_target_val_mei ?: 1))*100; ?>
                                <?php $AT_idx_val_jun = ($AT_val_jun/($AT_target_val_jun ?: 1))*100; ?>
                                <?php $AT_idx_val_q2 = ($AT_val_q2/($AT_target_val_q2 ?: 1))*100; ?>

                                <?php $AT_idx_val_jul = ($AT_val_jul/($AT_target_val_jul ?: 1))*100; ?>
                                <?php $AT_idx_val_agu = ($AT_val_agu/($AT_target_val_agu ?: 1))*100; ?>
                                <?php $AT_idx_val_sep = ($AT_val_sep/($AT_target_val_sep ?: 1))*100; ?>
                                <?php $AT_idx_val_q3 = ($AT_val_q3/($AT_target_val_q3 ?: 1))*100; ?>

                                <?php $AT_idx_val_okt = ($AT_val_okt/($AT_target_val_okt ?: 1))*100; ?>
                                <?php $AT_idx_val_nop = ($AT_val_nop/($AT_target_val_nop ?: 1))*100; ?>
                                <?php $AT_idx_val_des = ($AT_val_des/($AT_target_val_des ?: 1))*100; ?>
                                <?php $AT_idx_val_q4 = ($AT_val_q4/($AT_target_val_q4 ?: 1))*100; ?>
                                
                                <?php $principal = $row['principal']; ?>
                                <?php $group_sku = $row['item_group']; ?>
                                <?php $no++; endforeach; ?>

                                <?php $AT_qty_year = $AT_qty_jan + $AT_qty_feb + $AT_qty_mar + $AT_qty_apr + $AT_qty_mei + $AT_qty_jun + $AT_qty_jul + $AT_qty_agu + $AT_qty_sep + $AT_qty_okt + $AT_qty_nop + $AT_qty_des;?>
                                <?php $AT_val_year = $AT_val_jan + $AT_val_feb + $AT_val_mar + $AT_val_apr + $AT_val_mei + $AT_val_jun + $AT_val_jul + $AT_val_agu + $AT_val_sep + $AT_val_okt + $AT_val_nop + $AT_val_des;?>
                                <?php $AT_target_qty_year = $AT_target_qty_jan + $AT_target_qty_feb + $AT_target_qty_mar + $AT_target_qty_apr + $AT_target_qty_mei + $AT_target_qty_jun + $AT_target_qty_jul + $AT_target_qty_agu + $AT_target_qty_sep + $AT_target_qty_okt + $AT_target_qty_nop + $AT_target_qty_des;?> 
                                <?php $AT_target_val_year = $AT_target_val_jan + $AT_target_val_feb + $AT_target_val_mar + $AT_target_val_apr + $AT_target_val_mei + $AT_target_val_jun + $AT_target_val_jul + $AT_target_val_agu + $AT_target_val_sep + $AT_target_val_okt + $AT_target_val_nop + $AT_target_val_des;?>
                                <?php $AT_idx_qty_year = ($AT_qty_year/($AT_target_qty_year ?: 1))*100;?> 
                                <?php $AT_idx_val_year = ($AT_val_year/($AT_target_val_year ?: 1))*100;?> 
                                <?php $AT_qty_avg = $AT_qty_year/12;?>
                                <?php $AT_val_avg = $AT_val_year/12;?>
                                <?php $AT_target_qty_avg = $AT_target_qty_year/12;?>
                                <?php $AT_target_val_avg = $AT_target_val_year/12;?>
                                <?php $AT_idx_qty_avg = ($AT_qty_avg/($AT_target_qty_avg ?: 1))*100;?>
                                <?php $AT_idx_val_avg = ($AT_val_avg/($AT_target_val_avg ?: 1))*100;?>
                                
                                <tr class="table-warning" style="font-weight:bold">
                                    <td></td>
                                    <td><?= $principal;?></td>
                                    <td><?= $group_sku;?></td>
                                    <td></td>
                                    <td class="text-center">Sub Total <?= $group_sku;?></td>
                                    <td></td>
                                    <td class="text-right"><?= number_format($AT_qty_jan, 0);?></td>
                                    <td class="text-right"><?= number_format($AT_val_jan, 2);?></td>
                                    <td class="text-right"><?= number_format($AT_target_qty_jan, 0);?></td>
                                    <td class="text-right"><?= number_format($AT_target_val_jan, 2);?></td>
                                    <td class="text-right"><?= number_format($AT_idx_qty_jan, 0);?>%</td>
                                    <td class="text-right"><?= number_format($AT_idx_val_jan, 0);?>%</td>
                                    <td class="text-right"><?= number_format($AT_qty_feb, 0);?></td>
                                    <td class="text-right"><?= number_format($AT_val_feb, 2);?></td>
                                    <td class="text-right"><?= number_format($AT_target_qty_feb, 0);?></td>
                                    <td class="text-right"><?= number_format($AT_target_val_feb, 2);?></td>
                                    <td class="text-right"><?= number_format($AT_idx_qty_feb, 0);?>%</td>
                                    <td class="text-right"><?= number_format($AT_idx_val_feb, 0);?>%</td>
                                    <td class="text-right"><?= number_format($AT_qty_mar, 0);?></td>
                                    <td class="text-right"><?= number_format($AT_val_mar, 2);?></td>
                                    <td class="text-right"><?= number_format($AT_target_qty_mar, 0);?></td>
                                    <td class="text-right"><?= number_format($AT_target_val_mar, 2);?></td>
                                    <td class="text-right"><?= number_format($AT_idx_qty_mar, 0);?>%</td>
                                    <td class="text-right"><?= number_format($AT_idx_val_mar, 0);?>%</td>
                                    <td class="text-right"><?= number_format($AT_qty_q1, 0);?></td>
                                    <td class="text-right"><?= number_format($AT_val_q1, 2);?></td>
                                    <td class="text-right"><?= number_format($AT_target_qty_q1, 0);?></td>
                                    <td class="text-right"><?= number_format($AT_target_val_q1, 2);?></td>
                                    <td class="text-right"><?= number_format($AT_idx_qty_q1, 0);?>%</td>
                                    <td class="text-right"><?= number_format($AT_idx_val_q1, 0);?>%</td>

                                    <td class="text-right"><?= number_format($AT_qty_apr, 0);?></td>
                                    <td class="text-right"><?= number_format($AT_val_apr, 2);?></td>
                                    <td class="text-right"><?= number_format($AT_target_qty_apr, 0);?></td>
                                    <td class="text-right"><?= number_format($AT_target_val_apr, 2);?></td>
                                    <td class="text-right"><?= number_format($AT_idx_qty_apr, 0);?>%</td>
                                    <td class="text-right"><?= number_format($AT_idx_val_apr, 0);?>%</td>
                                    <td class="text-right"><?= number_format($AT_qty_mei, 0);?></td>
                                    <td class="text-right"><?= number_format($AT_val_mei, 2);?></td>
                                    <td class="text-right"><?= number_format($AT_target_qty_mei, 0);?></td>
                                    <td class="text-right"><?= number_format($AT_target_val_mei, 2);?></td>
                                    <td class="text-right"><?= number_format($AT_idx_qty_mei, 0);?>%</td>
                                    <td class="text-right"><?= number_format($AT_idx_val_mei, 0);?>%</td>
                                    <td class="text-right"><?= number_format($AT_qty_jun, 0);?></td>
                                    <td class="text-right"><?= number_format($AT_val_jun, 2);?></td>
                                    <td class="text-right"><?= number_format($AT_target_qty_jun, 0);?></td>
                                    <td class="text-right"><?= number_format($AT_target_val_jun, 2);?></td>
                                    <td class="text-right"><?= number_format($AT_idx_qty_jun, 0);?>%</td>
                                    <td class="text-right"><?= number_format($AT_idx_val_jun, 0);?>%</td>
                                    <td class="text-right"><?= number_format($AT_qty_q2, 0);?></td>
                                    <td class="text-right"><?= number_format($AT_val_q2, 2);?></td>
                                    <td class="text-right"><?= number_format($AT_target_qty_q2, 0);?></td>
                                    <td class="text-right"><?= number_format($AT_target_val_q2, 2);?></td>
                                    <td class="text-right"><?= number_format($AT_idx_qty_q2, 0);?>%</td>
                                    <td class="text-right"><?= number_format($AT_idx_val_q2, 0);?>%</td>

                                    <td class="text-right"><?= number_format($AT_qty_jul, 0);?></td>
                                    <td class="text-right"><?= number_format($AT_val_jul, 2);?></td>
                                    <td class="text-right"><?= number_format($AT_target_qty_jul, 0);?></td>
                                    <td class="text-right"><?= number_format($AT_target_val_jul, 2);?></td>
                                    <td class="text-right"><?= number_format($AT_idx_qty_jul, 0);?>%</td>
                                    <td class="text-right"><?= number_format($AT_idx_val_jul, 0);?>%</td>
                                    <td class="text-right"><?= number_format($AT_qty_agu, 0);?></td>
                                    <td class="text-right"><?= number_format($AT_val_agu, 2);?></td>
                                    <td class="text-right"><?= number_format($AT_target_qty_agu, 0);?></td>
                                    <td class="text-right"><?= number_format($AT_target_val_agu, 2);?></td>
                                    <td class="text-right"><?= number_format($AT_idx_qty_agu, 0);?>%</td>
                                    <td class="text-right"><?= number_format($AT_idx_val_agu, 0);?>%</td>
                                    <td class="text-right"><?= number_format($AT_qty_sep, 0);?></td>
                                    <td class="text-right"><?= number_format($AT_val_sep, 2);?></td>
                                    <td class="text-right"><?= number_format($AT_target_qty_sep, 0);?></td>
                                    <td class="text-right"><?= number_format($AT_target_val_sep, 2);?></td>
                                    <td class="text-right"><?= number_format($AT_idx_qty_sep, 0);?>%</td>
                                    <td class="text-right"><?= number_format($AT_idx_val_sep, 0);?>%</td>
                                    <td class="text-right"><?= number_format($AT_qty_q3, 0);?></td>
                                    <td class="text-right"><?= number_format($AT_val_q3, 2);?></td>
                                    <td class="text-right"><?= number_format($AT_target_qty_q3, 0);?></td>
                                    <td class="text-right"><?= number_format($AT_target_val_q3, 2);?></td>
                                    <td class="text-right"><?= number_format($AT_idx_qty_q3, 0);?>%</td>
                                    <td class="text-right"><?= number_format($AT_idx_val_q3, 0);?>%</td>

                                    <td class="text-right"><?= number_format($AT_qty_okt, 0);?></td>
                                    <td class="text-right"><?= number_format($AT_val_okt, 2);?></td>
                                    <td class="text-right"><?= number_format($AT_target_qty_okt, 0);?></td>
                                    <td class="text-right"><?= number_format($AT_target_val_okt, 2);?></td>
                                    <td class="text-right"><?= number_format($AT_idx_qty_okt, 0);?>%</td>
                                    <td class="text-right"><?= number_format($AT_idx_val_okt, 0);?>%</td>
                                    <td class="text-right"><?= number_format($AT_qty_nop, 0);?></td>
                                    <td class="text-right"><?= number_format($AT_val_nop, 2);?></td>
                                    <td class="text-right"><?= number_format($AT_target_qty_nop, 0);?></td>
                                    <td class="text-right"><?= number_format($AT_target_val_nop, 2);?></td>
                                    <td class="text-right"><?= number_format($AT_idx_qty_nop, 0);?>%</td>
                                    <td class="text-right"><?= number_format($AT_idx_val_nop, 0);?>%</td>
                                    <td class="text-right"><?= number_format($AT_qty_des, 0);?></td>
                                    <td class="text-right"><?= number_format($AT_val_des, 2);?></td>
                                    <td class="text-right"><?= number_format($AT_target_qty_des, 0);?></td>
                                    <td class="text-right"><?= number_format($AT_target_val_des, 2);?></td>
                                    <td class="text-right"><?= number_format($AT_idx_qty_des, 0);?>%</td>
                                    <td class="text-right"><?= number_format($AT_idx_val_des, 0);?>%</td>
                                    <td class="text-right"><?= number_format($AT_qty_q4, 0);?></td>
                                    <td class="text-right"><?= number_format($AT_val_q4, 2);?></td>
                                    <td class="text-right"><?= number_format($AT_target_qty_q4, 0);?></td>
                                    <td class="text-right"><?= number_format($AT_target_val_q4, 2);?></td>
                                    <td class="text-right"><?= number_format($AT_idx_qty_q4, 0);?>%</td>
                                    <td class="text-right"><?= number_format($AT_idx_val_q4, 0);?>%</td>

                                    <td class="text-right"><?= number_format($AT_qty_year, 0);?></td>
                                    <td class="text-right"><?= number_format($AT_val_year, 2);?></td>
                                    <td class="text-right"><?= number_format($AT_target_qty_year, 0);?></td>
                                    <td class="text-right"><?= number_format($AT_target_val_year, 2);?></td>
                                    <td class="text-right"><?= number_format($AT_idx_qty_year, 0);?>%</td>
                                    <td class="text-right"><?= number_format($AT_idx_val_year, 0);?>%</td>
                                    <td class="text-right"><?= number_format($AT_qty_avg, 0);?></td>
                                    <td class="text-right"><?= number_format($AT_val_avg, 2);?></td>
                                    <td class="text-right"><?= number_format($AT_target_qty_avg, 0);?></td>
                                    <td class="text-right"><?= number_format($AT_target_val_avg, 2);?></td>
                                    <td class="text-right"><?= number_format($AT_idx_qty_avg, 0);?>%</td>
                                    <td class="text-right"><?= number_format($AT_idx_val_avg, 0);?>%</td>
                                </tr>

                                <!-- KIDS TOOTHBRUSH -->
                                <?php
                                    $KT_qty_jan = 0;
                                    $KT_qty_feb = 0;
                                    $KT_qty_mar = 0;
                                    $KT_qty_q1 = 0;
                                    $KT_qty_apr = 0;
                                    $KT_qty_mei = 0;
                                    $KT_qty_jun = 0;
                                    $KT_qty_q2 = 0;
                                    $KT_qty_jul = 0;
                                    $KT_qty_agu = 0;
                                    $KT_qty_sep = 0;
                                    $KT_qty_q3 = 0;
                                    $KT_qty_okt = 0;
                                    $KT_qty_nop = 0;
                                    $KT_qty_des = 0;
                                    $KT_qty_q4 = 0;

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

                                    $KT_target_qty_jan = 0;
                                    $KT_target_qty_feb = 0;
                                    $KT_target_qty_mar = 0;
                                    $KT_target_qty_q1 = 0;
                                    $KT_target_qty_apr = 0;
                                    $KT_target_qty_mei = 0;
                                    $KT_target_qty_jun = 0;
                                    $KT_target_qty_q2 = 0;
                                    $KT_target_qty_jul = 0;
                                    $KT_target_qty_agu = 0;
                                    $KT_target_qty_sep = 0;
                                    $KT_target_qty_q3 = 0;
                                    $KT_target_qty_okt = 0;
                                    $KT_target_qty_nop = 0;
                                    $KT_target_qty_des = 0;
                                    $KT_target_qty_q4 = 0;

                                    $KT_target_val_jan = 0;
                                    $KT_target_val_feb = 0;
                                    $KT_target_val_mar = 0;
                                    $KT_target_val_q1 = 0;
                                    $KT_target_val_apr = 0;
                                    $KT_target_val_mei = 0;
                                    $KT_target_val_jun = 0;
                                    $KT_target_val_q2 = 0;
                                    $KT_target_val_jul = 0;
                                    $KT_target_val_agu = 0;
                                    $KT_target_val_sep = 0;
                                    $KT_target_val_q3 = 0;
                                    $KT_target_val_okt = 0;
                                    $KT_target_val_nop = 0;
                                    $KT_target_val_des = 0;
                                    $KT_target_val_q4 = 0;

                                    $KT_idx_qty_jan = 0;
                                    $KT_idx_qty_feb = 0;
                                    $KT_idx_qty_mar = 0;
                                    $KT_idx_qty_q1 = 0;
                                    $KT_idx_qty_apr = 0;
                                    $KT_idx_qty_mei = 0;
                                    $KT_idx_qty_jun = 0;
                                    $KT_idx_qty_q2 = 0;
                                    $KT_idx_qty_jul = 0;
                                    $KT_idx_qty_agu = 0;
                                    $KT_idx_qty_sep = 0;
                                    $KT_idx_qty_q3 = 0;
                                    $KT_idx_qty_okt = 0;
                                    $KT_idx_qty_nop = 0;
                                    $KT_idx_qty_des = 0;
                                    $KT_idx_qty_q4 = 0;

                                    $KT_idx_val_jan = 0;
                                    $KT_idx_val_feb = 0;
                                    $KT_idx_val_mar = 0;
                                    $KT_idx_val_q1 = 0;
                                    $KT_idx_val_apr = 0;
                                    $KT_idx_val_mei = 0;
                                    $KT_idx_val_jun = 0;
                                    $KT_idx_val_q2 = 0;
                                    $KT_idx_val_jul = 0;
                                    $KT_idx_val_agu = 0;
                                    $KT_idx_val_sep = 0;
                                    $KT_idx_val_q3 = 0;
                                    $KT_idx_val_okt = 0;
                                    $KT_idx_val_nop = 0;
                                    $KT_idx_val_des = 0;
                                    $KT_idx_val_q4 = 0;
                                ?>
                                <?php foreach ($data['sellingout_KT'] as $row) :?>
                                <tr>
                                    <td class="text-center"><?= $no; ?></td>
                                    <td><?= $row['principal'];?></td>
                                    <td><?= $row['item_group'];?></td>
                                    <td><?= $row['item_code'];?></td>
                                    <td><?= $row['item_name'];?></td>
                                    <td class="text-center"><?= $row['unit'];?></td>
                                    <td class="text-right"><?= number_format($row['qty_jan'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_jan'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_jan'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_jan'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_jan'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_jan'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_feb'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_feb'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_feb'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_feb'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_feb'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_feb'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_mar'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_mar'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_mar'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_mar'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_mar'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_mar'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_q1'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_q1'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_q1'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_value_q1'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_q1'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_q1'], 0);?>%</td>

                                    <td class="text-right"><?= number_format($row['qty_apr'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_apr'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_apr'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_apr'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_apr'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_apr'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_mei'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_mei'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_mei'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_mei'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_mei'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_mei'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_jun'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_jun'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_jun'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_jun'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_jun'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_jun'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_q2'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_q2'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_q2'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_value_q2'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_q2'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_q2'], 0);?>%</td>

                                    <td class="text-right"><?= number_format($row['qty_jul'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_jul'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_jul'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_jul'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_jul'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_jul'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_agu'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_agu'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_agu'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_agu'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_agu'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_agu'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_sep'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_sep'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_sep'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_sep'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_sep'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_sep'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_q3'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_q3'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_q3'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_value_q3'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_q3'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_q3'], 0);?>%</td>

                                    <td class="text-right"><?= number_format($row['qty_okt'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_okt'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_okt'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_okt'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_okt'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_okt'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_nop'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_nop'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_nop'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_nop'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_nop'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_nop'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_des'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_des'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_des'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_des'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_des'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_des'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_q4'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_q4'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_q4'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_value_q4'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_q4'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_q4'], 0);?>%</td>

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

                                    <td class="text-right"><?= number_format($qty_year, 0);?></td>
                                    <td class="text-right"><?= number_format($val_year, 2);?></td>
                                    <td class="text-right"><?= number_format($target_qty_year, 0);?></td>
                                    <td class="text-right"><?= number_format($target_val_year, 2);?></td>
                                    <td class="text-right"><?= number_format($idx_qty_year, 0);?>%</td>
                                    <td class="text-right"><?= number_format($idx_val_year, 0);?>%</td>
                                    <td class="text-right"><?= number_format($qty_avg, 0);?></td>
                                    <td class="text-right"><?= number_format($val_avg, 2);?></td>
                                    <td class="text-right"><?= number_format($target_qty_avg, 0);?></td>
                                    <td class="text-right"><?= number_format($target_val_avg, 2);?></td>
                                    <td class="text-right"><?= number_format($idx_qty_avg, 0);?>%</td>
                                    <td class="text-right"><?= number_format($idx_val_avg, 0);?>%</td>
                                </tr>
                                
                                <!-- sub qty -->
                                <?php $KT_qty_jan += $row['qty_jan']; ?>
                                <?php $KT_qty_feb += $row['qty_feb']; ?>
                                <?php $KT_qty_mar += $row['qty_mar']; ?>
                                <?php $KT_qty_q1 += $row['qty_q1']; ?>

                                <?php $KT_qty_apr += $row['qty_apr']; ?>
                                <?php $KT_qty_mei += $row['qty_mei']; ?>
                                <?php $KT_qty_jun += $row['qty_jun']; ?>
                                <?php $KT_qty_q2 += $row['qty_q2']; ?>

                                <?php $KT_qty_jul += $row['qty_jul']; ?>
                                <?php $KT_qty_agu += $row['qty_agu']; ?>
                                <?php $KT_qty_sep += $row['qty_sep']; ?>
                                <?php $KT_qty_q3 += $row['qty_q3']; ?>

                                <?php $KT_qty_okt += $row['qty_okt']; ?>
                                <?php $KT_qty_nop += $row['qty_nop']; ?>
                                <?php $KT_qty_des += $row['qty_des']; ?>
                                <?php $KT_qty_q4 += $row['qty_q4']; ?>
                                
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

                                <?php $KT_target_qty_jan += $row['target_qty_jan']; ?>
                                <?php $KT_target_qty_feb += $row['target_qty_feb']; ?>
                                <?php $KT_target_qty_mar += $row['target_qty_mar']; ?>
                                <?php $KT_target_qty_q1 += $row['target_qty_q1']; ?>

                                <?php $KT_target_qty_apr += $row['target_qty_apr']; ?>
                                <?php $KT_target_qty_mei += $row['target_qty_mei']; ?>
                                <?php $KT_target_qty_jun += $row['target_qty_jun']; ?>
                                <?php $KT_target_qty_q2 += $row['target_qty_q2']; ?>

                                <?php $KT_target_qty_jul += $row['target_qty_jul']; ?>
                                <?php $KT_target_qty_agu += $row['target_qty_agu']; ?>
                                <?php $KT_target_qty_sep += $row['target_qty_sep']; ?>
                                <?php $KT_target_qty_q3 += $row['target_qty_q3']; ?>

                                <?php $KT_target_qty_okt += $row['target_qty_okt']; ?>
                                <?php $KT_target_qty_nop += $row['target_qty_nop']; ?>
                                <?php $KT_target_qty_des += $row['target_qty_des']; ?>
                                <?php $KT_target_qty_q4 += $row['target_qty_q4']; ?>
                                
                                <!-- sub val -->
                                <?php $KT_target_val_jan += $row['target_val_jan']; ?>
                                <?php $KT_target_val_feb += $row['target_val_feb']; ?>
                                <?php $KT_target_val_mar += $row['target_val_mar']; ?>
                                <?php $KT_target_val_q1 += $row['target_value_q1']; ?>

                                <?php $KT_target_val_apr += $row['target_val_apr']; ?>
                                <?php $KT_target_val_mei += $row['target_val_mei']; ?>
                                <?php $KT_target_val_jun += $row['target_val_jun']; ?>
                                <?php $KT_target_val_q2 += $row['target_value_q2']; ?>

                                <?php $KT_target_val_jul += $row['target_val_jul']; ?>
                                <?php $KT_target_val_agu += $row['target_val_agu']; ?>
                                <?php $KT_target_val_sep += $row['target_val_sep']; ?>
                                <?php $KT_target_val_q3 += $row['target_value_q3']; ?>

                                <?php $KT_target_val_okt += $row['target_val_okt']; ?>
                                <?php $KT_target_val_nop += $row['target_val_nop']; ?>
                                <?php $KT_target_val_des += $row['target_val_des']; ?>
                                <?php $KT_target_val_q4 += $row['target_value_q4']; ?>

                                <?php $KT_idx_qty_jan = ($KT_qty_jan/($KT_target_qty_jan ?: 1))*100; ?>
                                <?php $KT_idx_qty_feb = ($KT_qty_feb/($KT_target_qty_feb ?: 1))*100; ?>
                                <?php $KT_idx_qty_mar = ($KT_qty_mar/($KT_target_qty_mar ?: 1))*100; ?>
                                <?php $KT_idx_qty_q1 = ($KT_qty_q1/($KT_target_qty_q1 ?: 1))*100; ?>

                                <?php $KT_idx_qty_apr = ($KT_qty_apr/($KT_target_qty_apr ?: 1))*100; ?>
                                <?php $KT_idx_qty_mei = ($KT_qty_mei/($KT_target_qty_mei ?: 1))*100; ?>
                                <?php $KT_idx_qty_jun = ($KT_qty_jun/($KT_target_qty_jun ?: 1))*100; ?>
                                <?php $KT_idx_qty_q2 = ($KT_qty_q2/($KT_target_qty_q2 ?: 1))*100; ?>

                                <?php $KT_idx_qty_jul = ($KT_qty_jul/($KT_target_qty_jul ?: 1))*100; ?>
                                <?php $KT_idx_qty_agu = ($KT_qty_agu/($KT_target_qty_agu ?: 1))*100; ?>
                                <?php $KT_idx_qty_sep = ($KT_qty_sep/($KT_target_qty_sep ?: 1))*100; ?>
                                <?php $KT_idx_qty_q3 = ($KT_qty_q3/($KT_target_qty_q3 ?: 1))*100; ?>

                                <?php $KT_idx_qty_okt = ($KT_qty_okt/($KT_target_qty_okt ?: 1))*100; ?>
                                <?php $KT_idx_qty_nop = ($KT_qty_nop/($KT_target_qty_nop ?: 1))*100; ?>
                                <?php $KT_idx_qty_des = ($KT_qty_des/($KT_target_qty_des ?: 1))*100; ?>
                                <?php $KT_idx_qty_q4 = ($KT_qty_q4/($KT_target_qty_q4 ?: 1))*100; ?>
                                
                                <!-- sub val -->
                                <?php $KT_idx_val_jan = ($KT_val_jan/($KT_target_val_jan ?: 1))*100; ?>
                                <?php $KT_idx_val_feb = ($KT_val_feb/($KT_target_val_feb ?: 1))*100; ?>
                                <?php $KT_idx_val_mar = ($KT_val_mar/($KT_target_val_mar ?: 1))*100; ?>
                                <?php $KT_idx_val_q1 = ($KT_val_q1/($KT_target_val_q1 ?: 1))*100; ?>

                                <?php $KT_idx_val_apr = ($KT_val_apr/($KT_target_val_apr ?: 1))*100; ?>
                                <?php $KT_idx_val_mei = ($KT_val_mei/($KT_target_val_mei ?: 1))*100; ?>
                                <?php $KT_idx_val_jun = ($KT_val_jun/($KT_target_val_jun ?: 1))*100; ?>
                                <?php $KT_idx_val_q2 = ($KT_val_q2/($KT_target_val_q2 ?: 1))*100; ?>

                                <?php $KT_idx_val_jul = ($KT_val_jul/($KT_target_val_jul ?: 1))*100; ?>
                                <?php $KT_idx_val_agu = ($KT_val_agu/($KT_target_val_agu ?: 1))*100; ?>
                                <?php $KT_idx_val_sep = ($KT_val_sep/($KT_target_val_sep ?: 1))*100; ?>
                                <?php $KT_idx_val_q3 = ($KT_val_q3/($KT_target_val_q3 ?: 1))*100; ?>

                                <?php $KT_idx_val_okt = ($KT_val_okt/($KT_target_val_okt ?: 1))*100; ?>
                                <?php $KT_idx_val_nop = ($KT_val_nop/($KT_target_val_nop ?: 1))*100; ?>
                                <?php $KT_idx_val_des = ($KT_val_des/($KT_target_val_des ?: 1))*100; ?>
                                <?php $KT_idx_val_q4 = ($KT_val_q4/($KT_target_val_q4 ?: 1))*100; ?>
                                
                                <?php $principal = $row['principal']; ?>
                                <?php $group_sku = $row['item_group']; ?>
                                <?php $no++; endforeach; ?>

                                <?php $KT_qty_year = $KT_qty_jan + $KT_qty_feb + $KT_qty_mar + $KT_qty_apr + $KT_qty_mei + $KT_qty_jun + $KT_qty_jul + $KT_qty_agu + $KT_qty_sep + $KT_qty_okt + $KT_qty_nop + $KT_qty_des;?>
                                <?php $KT_val_year = $KT_val_jan + $KT_val_feb + $KT_val_mar + $KT_val_apr + $KT_val_mei + $KT_val_jun + $KT_val_jul + $KT_val_agu + $KT_val_sep + $KT_val_okt + $KT_val_nop + $KT_val_des;?>
                                <?php $KT_target_qty_year = $KT_target_qty_jan + $KT_target_qty_feb + $KT_target_qty_mar + $KT_target_qty_apr + $KT_target_qty_mei + $KT_target_qty_jun + $KT_target_qty_jul + $KT_target_qty_agu + $KT_target_qty_sep + $KT_target_qty_okt + $KT_target_qty_nop + $KT_target_qty_des;?> 
                                <?php $KT_target_val_year = $KT_target_val_jan + $KT_target_val_feb + $KT_target_val_mar + $KT_target_val_apr + $KT_target_val_mei + $KT_target_val_jun + $KT_target_val_jul + $KT_target_val_agu + $KT_target_val_sep + $KT_target_val_okt + $KT_target_val_nop + $KT_target_val_des;?>
                                <?php $KT_idx_qty_year = ($KT_qty_year/($KT_target_qty_year ?: 1))*100;?> 
                                <?php $KT_idx_val_year = ($KT_val_year/($KT_target_val_year ?: 1))*100;?> 
                                <?php $KT_qty_avg = $KT_qty_year/12;?>
                                <?php $KT_val_avg = $KT_val_year/12;?>
                                <?php $KT_target_qty_avg = $KT_target_qty_year/12;?>
                                <?php $KT_target_val_avg = $KT_target_val_year/12;?>
                                <?php $KT_idx_qty_avg = ($KT_qty_avg/($KT_target_qty_avg ?: 1))*100;?>
                                <?php $KT_idx_val_avg = ($KT_val_avg/($KT_target_val_avg ?: 1))*100;?>
                                
                                <tr class="table-warning" style="font-weight:bold">
                                    <td></td>
                                    <td><?= $principal;?></td>
                                    <td><?= $group_sku;?></td>
                                    <td></td>
                                    <td class="text-center">Sub Total <?= $group_sku;?></td>
                                    <td></td>
                                    <td class="text-right"><?= number_format($KT_qty_jan, 0);?></td>
                                    <td class="text-right"><?= number_format($KT_val_jan, 2);?></td>
                                    <td class="text-right"><?= number_format($KT_target_qty_jan, 0);?></td>
                                    <td class="text-right"><?= number_format($KT_target_val_jan, 2);?></td>
                                    <td class="text-right"><?= number_format($KT_idx_qty_jan, 0);?>%</td>
                                    <td class="text-right"><?= number_format($KT_idx_val_jan, 0);?>%</td>
                                    <td class="text-right"><?= number_format($KT_qty_feb, 0);?></td>
                                    <td class="text-right"><?= number_format($KT_val_feb, 2);?></td>
                                    <td class="text-right"><?= number_format($KT_target_qty_feb, 0);?></td>
                                    <td class="text-right"><?= number_format($KT_target_val_feb, 2);?></td>
                                    <td class="text-right"><?= number_format($KT_idx_qty_feb, 0);?>%</td>
                                    <td class="text-right"><?= number_format($KT_idx_val_feb, 0);?>%</td>
                                    <td class="text-right"><?= number_format($KT_qty_mar, 0);?></td>
                                    <td class="text-right"><?= number_format($KT_val_mar, 2);?></td>
                                    <td class="text-right"><?= number_format($KT_target_qty_mar, 0);?></td>
                                    <td class="text-right"><?= number_format($KT_target_val_mar, 2);?></td>
                                    <td class="text-right"><?= number_format($KT_idx_qty_mar, 0);?>%</td>
                                    <td class="text-right"><?= number_format($KT_idx_val_mar, 0);?>%</td>
                                    <td class="text-right"><?= number_format($KT_qty_q1, 0);?></td>
                                    <td class="text-right"><?= number_format($KT_val_q1, 2);?></td>
                                    <td class="text-right"><?= number_format($KT_target_qty_q1, 0);?></td>
                                    <td class="text-right"><?= number_format($KT_target_val_q1, 2);?></td>
                                    <td class="text-right"><?= number_format($KT_idx_qty_q1, 0);?>%</td>
                                    <td class="text-right"><?= number_format($KT_idx_val_q1, 0);?>%</td>

                                    <td class="text-right"><?= number_format($KT_qty_apr, 0);?></td>
                                    <td class="text-right"><?= number_format($KT_val_apr, 2);?></td>
                                    <td class="text-right"><?= number_format($KT_target_qty_apr, 0);?></td>
                                    <td class="text-right"><?= number_format($KT_target_val_apr, 2);?></td>
                                    <td class="text-right"><?= number_format($KT_idx_qty_apr, 0);?>%</td>
                                    <td class="text-right"><?= number_format($KT_idx_val_apr, 0);?>%</td>
                                    <td class="text-right"><?= number_format($KT_qty_mei, 0);?></td>
                                    <td class="text-right"><?= number_format($KT_val_mei, 2);?></td>
                                    <td class="text-right"><?= number_format($KT_target_qty_mei, 0);?></td>
                                    <td class="text-right"><?= number_format($KT_target_val_mei, 2);?></td>
                                    <td class="text-right"><?= number_format($KT_idx_qty_mei, 0);?>%</td>
                                    <td class="text-right"><?= number_format($KT_idx_val_mei, 0);?>%</td>
                                    <td class="text-right"><?= number_format($KT_qty_jun, 0);?></td>
                                    <td class="text-right"><?= number_format($KT_val_jun, 2);?></td>
                                    <td class="text-right"><?= number_format($KT_target_qty_jun, 0);?></td>
                                    <td class="text-right"><?= number_format($KT_target_val_jun, 2);?></td>
                                    <td class="text-right"><?= number_format($KT_idx_qty_jun, 0);?>%</td>
                                    <td class="text-right"><?= number_format($KT_idx_val_jun, 0);?>%</td>
                                    <td class="text-right"><?= number_format($KT_qty_q2, 0);?></td>
                                    <td class="text-right"><?= number_format($KT_val_q2, 2);?></td>
                                    <td class="text-right"><?= number_format($KT_target_qty_q2, 0);?></td>
                                    <td class="text-right"><?= number_format($KT_target_val_q2, 2);?></td>
                                    <td class="text-right"><?= number_format($KT_idx_qty_q2, 0);?>%</td>
                                    <td class="text-right"><?= number_format($KT_idx_val_q2, 0);?>%</td>

                                    <td class="text-right"><?= number_format($KT_qty_jul, 0);?></td>
                                    <td class="text-right"><?= number_format($KT_val_jul, 2);?></td>
                                    <td class="text-right"><?= number_format($KT_target_qty_jul, 0);?></td>
                                    <td class="text-right"><?= number_format($KT_target_val_jul, 2);?></td>
                                    <td class="text-right"><?= number_format($KT_idx_qty_jul, 0);?>%</td>
                                    <td class="text-right"><?= number_format($KT_idx_val_jul, 0);?>%</td>
                                    <td class="text-right"><?= number_format($KT_qty_agu, 0);?></td>
                                    <td class="text-right"><?= number_format($KT_val_agu, 2);?></td>
                                    <td class="text-right"><?= number_format($KT_target_qty_agu, 0);?></td>
                                    <td class="text-right"><?= number_format($KT_target_val_agu, 2);?></td>
                                    <td class="text-right"><?= number_format($KT_idx_qty_agu, 0);?>%</td>
                                    <td class="text-right"><?= number_format($KT_idx_val_agu, 0);?>%</td>
                                    <td class="text-right"><?= number_format($KT_qty_sep, 0);?></td>
                                    <td class="text-right"><?= number_format($KT_val_sep, 2);?></td>
                                    <td class="text-right"><?= number_format($KT_target_qty_sep, 0);?></td>
                                    <td class="text-right"><?= number_format($KT_target_val_sep, 2);?></td>
                                    <td class="text-right"><?= number_format($KT_idx_qty_sep, 0);?>%</td>
                                    <td class="text-right"><?= number_format($KT_idx_val_sep, 0);?>%</td>
                                    <td class="text-right"><?= number_format($KT_qty_q3, 0);?></td>
                                    <td class="text-right"><?= number_format($KT_val_q3, 2);?></td>
                                    <td class="text-right"><?= number_format($KT_target_qty_q3, 0);?></td>
                                    <td class="text-right"><?= number_format($KT_target_val_q3, 2);?></td>
                                    <td class="text-right"><?= number_format($KT_idx_qty_q3, 0);?>%</td>
                                    <td class="text-right"><?= number_format($KT_idx_val_q3, 0);?>%</td>

                                    <td class="text-right"><?= number_format($KT_qty_okt, 0);?></td>
                                    <td class="text-right"><?= number_format($KT_val_okt, 2);?></td>
                                    <td class="text-right"><?= number_format($KT_target_qty_okt, 0);?></td>
                                    <td class="text-right"><?= number_format($KT_target_val_okt, 2);?></td>
                                    <td class="text-right"><?= number_format($KT_idx_qty_okt, 0);?>%</td>
                                    <td class="text-right"><?= number_format($KT_idx_val_okt, 0);?>%</td>
                                    <td class="text-right"><?= number_format($KT_qty_nop, 0);?></td>
                                    <td class="text-right"><?= number_format($KT_val_nop, 2);?></td>
                                    <td class="text-right"><?= number_format($KT_target_qty_nop, 0);?></td>
                                    <td class="text-right"><?= number_format($KT_target_val_nop, 2);?></td>
                                    <td class="text-right"><?= number_format($KT_idx_qty_nop, 0);?>%</td>
                                    <td class="text-right"><?= number_format($KT_idx_val_nop, 0);?>%</td>
                                    <td class="text-right"><?= number_format($KT_qty_des, 0);?></td>
                                    <td class="text-right"><?= number_format($KT_val_des, 2);?></td>
                                    <td class="text-right"><?= number_format($KT_target_qty_des, 0);?></td>
                                    <td class="text-right"><?= number_format($KT_target_val_des, 2);?></td>
                                    <td class="text-right"><?= number_format($KT_idx_qty_des, 0);?>%</td>
                                    <td class="text-right"><?= number_format($KT_idx_val_des, 0);?>%</td>
                                    <td class="text-right"><?= number_format($KT_qty_q4, 0);?></td>
                                    <td class="text-right"><?= number_format($KT_val_q4, 2);?></td>
                                    <td class="text-right"><?= number_format($KT_target_qty_q4, 0);?></td>
                                    <td class="text-right"><?= number_format($KT_target_val_q4, 2);?></td>
                                    <td class="text-right"><?= number_format($KT_idx_qty_q4, 0);?>%</td>
                                    <td class="text-right"><?= number_format($KT_idx_val_q4, 0);?>%</td>

                                    <td class="text-right"><?= number_format($KT_qty_year, 0);?></td>
                                    <td class="text-right"><?= number_format($KT_val_year, 2);?></td>
                                    <td class="text-right"><?= number_format($KT_target_qty_year, 0);?></td>
                                    <td class="text-right"><?= number_format($KT_target_val_year, 2);?></td>
                                    <td class="text-right"><?= number_format($KT_idx_qty_year, 0);?>%</td>
                                    <td class="text-right"><?= number_format($KT_idx_val_year, 0);?>%</td>
                                    <td class="text-right"><?= number_format($KT_qty_avg, 0);?></td>
                                    <td class="text-right"><?= number_format($KT_val_avg, 2);?></td>
                                    <td class="text-right"><?= number_format($KT_target_qty_avg, 0);?></td>
                                    <td class="text-right"><?= number_format($KT_target_val_avg, 2);?></td>
                                    <td class="text-right"><?= number_format($KT_idx_qty_avg, 0);?>%</td>
                                    <td class="text-right"><?= number_format($KT_idx_val_avg, 0);?>%</td>
                                </tr>



                                <!-- DENTAL FLOSS -->
                                <?php
                                    $DF_qty_jan = 0;
                                    $DF_qty_feb = 0;
                                    $DF_qty_mar = 0;
                                    $DF_qty_q1 = 0;
                                    $DF_qty_apr = 0;
                                    $DF_qty_mei = 0;
                                    $DF_qty_jun = 0;
                                    $DF_qty_q2 = 0;
                                    $DF_qty_jul = 0;
                                    $DF_qty_agu = 0;
                                    $DF_qty_sep = 0;
                                    $DF_qty_q3 = 0;
                                    $DF_qty_okt = 0;
                                    $DF_qty_nop = 0;
                                    $DF_qty_des = 0;
                                    $DF_qty_q4 = 0;

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

                                    $DF_target_qty_jan = 0;
                                    $DF_target_qty_feb = 0;
                                    $DF_target_qty_mar = 0;
                                    $DF_target_qty_q1 = 0;
                                    $DF_target_qty_apr = 0;
                                    $DF_target_qty_mei = 0;
                                    $DF_target_qty_jun = 0;
                                    $DF_target_qty_q2 = 0;
                                    $DF_target_qty_jul = 0;
                                    $DF_target_qty_agu = 0;
                                    $DF_target_qty_sep = 0;
                                    $DF_target_qty_q3 = 0;
                                    $DF_target_qty_okt = 0;
                                    $DF_target_qty_nop = 0;
                                    $DF_target_qty_des = 0;
                                    $DF_target_qty_q4 = 0;

                                    $DF_target_val_jan = 0;
                                    $DF_target_val_feb = 0;
                                    $DF_target_val_mar = 0;
                                    $DF_target_val_q1 = 0;
                                    $DF_target_val_apr = 0;
                                    $DF_target_val_mei = 0;
                                    $DF_target_val_jun = 0;
                                    $DF_target_val_q2 = 0;
                                    $DF_target_val_jul = 0;
                                    $DF_target_val_agu = 0;
                                    $DF_target_val_sep = 0;
                                    $DF_target_val_q3 = 0;
                                    $DF_target_val_okt = 0;
                                    $DF_target_val_nop = 0;
                                    $DF_target_val_des = 0;
                                    $DF_target_val_q4 = 0;

                                    $DF_idx_qty_jan = 0;
                                    $DF_idx_qty_feb = 0;
                                    $DF_idx_qty_mar = 0;
                                    $DF_idx_qty_q1 = 0;
                                    $DF_idx_qty_apr = 0;
                                    $DF_idx_qty_mei = 0;
                                    $DF_idx_qty_jun = 0;
                                    $DF_idx_qty_q2 = 0;
                                    $DF_idx_qty_jul = 0;
                                    $DF_idx_qty_agu = 0;
                                    $DF_idx_qty_sep = 0;
                                    $DF_idx_qty_q3 = 0;
                                    $DF_idx_qty_okt = 0;
                                    $DF_idx_qty_nop = 0;
                                    $DF_idx_qty_des = 0;
                                    $DF_idx_qty_q4 = 0;

                                    $DF_idx_val_jan = 0;
                                    $DF_idx_val_feb = 0;
                                    $DF_idx_val_mar = 0;
                                    $DF_idx_val_q1 = 0;
                                    $DF_idx_val_apr = 0;
                                    $DF_idx_val_mei = 0;
                                    $DF_idx_val_jun = 0;
                                    $DF_idx_val_q2 = 0;
                                    $DF_idx_val_jul = 0;
                                    $DF_idx_val_agu = 0;
                                    $DF_idx_val_sep = 0;
                                    $DF_idx_val_q3 = 0;
                                    $DF_idx_val_okt = 0;
                                    $DF_idx_val_nop = 0;
                                    $DF_idx_val_des = 0;
                                    $DF_idx_val_q4 = 0;
                                ?>
                                <?php foreach ($data['sellingout_DF'] as $row) :?>
                                <tr>
                                    <td class="text-center"><?= $no; ?></td>
                                    <td><?= $row['principal'];?></td>
                                    <td><?= $row['item_group'];?></td>
                                    <td><?= $row['item_code'];?></td>
                                    <td><?= $row['item_name'];?></td>
                                    <td class="text-center"><?= $row['unit'];?></td>
                                    <td class="text-right"><?= number_format($row['qty_jan'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_jan'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_jan'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_jan'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_jan'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_jan'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_feb'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_feb'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_feb'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_feb'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_feb'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_feb'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_mar'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_mar'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_mar'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_mar'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_mar'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_mar'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_q1'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_q1'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_q1'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_value_q1'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_q1'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_q1'], 0);?>%</td>

                                    <td class="text-right"><?= number_format($row['qty_apr'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_apr'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_apr'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_apr'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_apr'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_apr'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_mei'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_mei'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_mei'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_mei'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_mei'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_mei'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_jun'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_jun'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_jun'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_jun'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_jun'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_jun'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_q2'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_q2'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_q2'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_value_q2'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_q2'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_q2'], 0);?>%</td>

                                    <td class="text-right"><?= number_format($row['qty_jul'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_jul'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_jul'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_jul'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_jul'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_jul'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_agu'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_agu'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_agu'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_agu'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_agu'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_agu'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_sep'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_sep'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_sep'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_sep'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_sep'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_sep'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_q3'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_q3'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_q3'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_value_q3'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_q3'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_q3'], 0);?>%</td>

                                    <td class="text-right"><?= number_format($row['qty_okt'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_okt'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_okt'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_okt'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_okt'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_okt'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_nop'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_nop'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_nop'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_nop'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_nop'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_nop'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_des'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_des'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_des'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_des'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_des'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_des'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_q4'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_q4'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_q4'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_value_q4'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_q4'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_q4'], 0);?>%</td>

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

                                    <td class="text-right"><?= number_format($qty_year, 0);?></td>
                                    <td class="text-right"><?= number_format($val_year, 2);?></td>
                                    <td class="text-right"><?= number_format($target_qty_year, 0);?></td>
                                    <td class="text-right"><?= number_format($target_val_year, 2);?></td>
                                    <td class="text-right"><?= number_format($idx_qty_year, 0);?>%</td>
                                    <td class="text-right"><?= number_format($idx_val_year, 0);?>%</td>
                                    <td class="text-right"><?= number_format($qty_avg, 0);?></td>
                                    <td class="text-right"><?= number_format($val_avg, 2);?></td>
                                    <td class="text-right"><?= number_format($target_qty_avg, 0);?></td>
                                    <td class="text-right"><?= number_format($target_val_avg, 2);?></td>
                                    <td class="text-right"><?= number_format($idx_qty_avg, 0);?>%</td>
                                    <td class="text-right"><?= number_format($idx_val_avg, 0);?>%</td>
                                </tr>
                                
                                <!-- sub qty -->
                                <?php $DF_qty_jan += $row['qty_jan']; ?>
                                <?php $DF_qty_feb += $row['qty_feb']; ?>
                                <?php $DF_qty_mar += $row['qty_mar']; ?>
                                <?php $DF_qty_q1 += $row['qty_q1']; ?>

                                <?php $DF_qty_apr += $row['qty_apr']; ?>
                                <?php $DF_qty_mei += $row['qty_mei']; ?>
                                <?php $DF_qty_jun += $row['qty_jun']; ?>
                                <?php $DF_qty_q2 += $row['qty_q2']; ?>

                                <?php $DF_qty_jul += $row['qty_jul']; ?>
                                <?php $DF_qty_agu += $row['qty_agu']; ?>
                                <?php $DF_qty_sep += $row['qty_sep']; ?>
                                <?php $DF_qty_q3 += $row['qty_q3']; ?>

                                <?php $DF_qty_okt += $row['qty_okt']; ?>
                                <?php $DF_qty_nop += $row['qty_nop']; ?>
                                <?php $DF_qty_des += $row['qty_des']; ?>
                                <?php $DF_qty_q4 += $row['qty_q4']; ?>
                                
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

                                <?php $DF_target_qty_jan += $row['target_qty_jan']; ?>
                                <?php $DF_target_qty_feb += $row['target_qty_feb']; ?>
                                <?php $DF_target_qty_mar += $row['target_qty_mar']; ?>
                                <?php $DF_target_qty_q1 += $row['target_qty_q1']; ?>

                                <?php $DF_target_qty_apr += $row['target_qty_apr']; ?>
                                <?php $DF_target_qty_mei += $row['target_qty_mei']; ?>
                                <?php $DF_target_qty_jun += $row['target_qty_jun']; ?>
                                <?php $DF_target_qty_q2 += $row['target_qty_q2']; ?>

                                <?php $DF_target_qty_jul += $row['target_qty_jul']; ?>
                                <?php $DF_target_qty_agu += $row['target_qty_agu']; ?>
                                <?php $DF_target_qty_sep += $row['target_qty_sep']; ?>
                                <?php $DF_target_qty_q3 += $row['target_qty_q3']; ?>

                                <?php $DF_target_qty_okt += $row['target_qty_okt']; ?>
                                <?php $DF_target_qty_nop += $row['target_qty_nop']; ?>
                                <?php $DF_target_qty_des += $row['target_qty_des']; ?>
                                <?php $DF_target_qty_q4 += $row['target_qty_q4']; ?>
                                
                                <!-- sub val -->
                                <?php $DF_target_val_jan += $row['target_val_jan']; ?>
                                <?php $DF_target_val_feb += $row['target_val_feb']; ?>
                                <?php $DF_target_val_mar += $row['target_val_mar']; ?>
                                <?php $DF_target_val_q1 += $row['target_value_q1']; ?>

                                <?php $DF_target_val_apr += $row['target_val_apr']; ?>
                                <?php $DF_target_val_mei += $row['target_val_mei']; ?>
                                <?php $DF_target_val_jun += $row['target_val_jun']; ?>
                                <?php $DF_target_val_q2 += $row['target_value_q2']; ?>

                                <?php $DF_target_val_jul += $row['target_val_jul']; ?>
                                <?php $DF_target_val_agu += $row['target_val_agu']; ?>
                                <?php $DF_target_val_sep += $row['target_val_sep']; ?>
                                <?php $DF_target_val_q3 += $row['target_value_q3']; ?>

                                <?php $DF_target_val_okt += $row['target_val_okt']; ?>
                                <?php $DF_target_val_nop += $row['target_val_nop']; ?>
                                <?php $DF_target_val_des += $row['target_val_des']; ?>
                                <?php $DF_target_val_q4 += $row['target_value_q4']; ?>

                                <?php $DF_idx_qty_jan = ($DF_qty_jan/($DF_target_qty_jan ?: 1))*100; ?>
                                <?php $DF_idx_qty_feb = ($DF_qty_feb/($DF_target_qty_feb ?: 1))*100; ?>
                                <?php $DF_idx_qty_mar = ($DF_qty_mar/($DF_target_qty_mar ?: 1))*100; ?>
                                <?php $DF_idx_qty_q1 = ($DF_qty_q1/($DF_target_qty_q1 ?: 1))*100; ?>

                                <?php $DF_idx_qty_apr = ($DF_qty_apr/($DF_target_qty_apr ?: 1))*100; ?>
                                <?php $DF_idx_qty_mei = ($DF_qty_mei/($DF_target_qty_mei ?: 1))*100; ?>
                                <?php $DF_idx_qty_jun = ($DF_qty_jun/($DF_target_qty_jun ?: 1))*100; ?>
                                <?php $DF_idx_qty_q2 = ($DF_qty_q2/($DF_target_qty_q2 ?: 1))*100; ?>

                                <?php $DF_idx_qty_jul = ($DF_qty_jul/($DF_target_qty_jul ?: 1))*100; ?>
                                <?php $DF_idx_qty_agu = ($DF_qty_agu/($DF_target_qty_agu ?: 1))*100; ?>
                                <?php $DF_idx_qty_sep = ($DF_qty_sep/($DF_target_qty_sep ?: 1))*100; ?>
                                <?php $DF_idx_qty_q3 = ($DF_qty_q3/($DF_target_qty_q3 ?: 1))*100; ?>

                                <?php $DF_idx_qty_okt = ($DF_qty_okt/($DF_target_qty_okt ?: 1))*100; ?>
                                <?php $DF_idx_qty_nop = ($DF_qty_nop/($DF_target_qty_nop ?: 1))*100; ?>
                                <?php $DF_idx_qty_des = ($DF_qty_des/($DF_target_qty_des ?: 1))*100; ?>
                                <?php $DF_idx_qty_q4 = ($DF_qty_q4/($DF_target_qty_q4 ?: 1))*100; ?>
                                
                                <!-- sub val -->
                                <?php $DF_idx_val_jan = ($DF_val_jan/($DF_target_val_jan ?: 1))*100; ?>
                                <?php $DF_idx_val_feb = ($DF_val_feb/($DF_target_val_feb ?: 1))*100; ?>
                                <?php $DF_idx_val_mar = ($DF_val_mar/($DF_target_val_mar ?: 1))*100; ?>
                                <?php $DF_idx_val_q1 = ($DF_val_q1/($DF_target_val_q1 ?: 1))*100; ?>

                                <?php $DF_idx_val_apr = ($DF_val_apr/($DF_target_val_apr ?: 1))*100; ?>
                                <?php $DF_idx_val_mei = ($DF_val_mei/($DF_target_val_mei ?: 1))*100; ?>
                                <?php $DF_idx_val_jun = ($DF_val_jun/($DF_target_val_jun ?: 1))*100; ?>
                                <?php $DF_idx_val_q2 = ($DF_val_q2/($DF_target_val_q2 ?: 1))*100; ?>

                                <?php $DF_idx_val_jul = ($DF_val_jul/($DF_target_val_jul ?: 1))*100; ?>
                                <?php $DF_idx_val_agu = ($DF_val_agu/($DF_target_val_agu ?: 1))*100; ?>
                                <?php $DF_idx_val_sep = ($DF_val_sep/($DF_target_val_sep ?: 1))*100; ?>
                                <?php $DF_idx_val_q3 = ($DF_val_q3/($DF_target_val_q3 ?: 1))*100; ?>

                                <?php $DF_idx_val_okt = ($DF_val_okt/($DF_target_val_okt ?: 1))*100; ?>
                                <?php $DF_idx_val_nop = ($DF_val_nop/($DF_target_val_nop ?: 1))*100; ?>
                                <?php $DF_idx_val_des = ($DF_val_des/($DF_target_val_des ?: 1))*100; ?>
                                <?php $DF_idx_val_q4 = ($DF_val_q4/($DF_target_val_q4 ?: 1))*100; ?>
                                
                                <?php $principal = $row['principal']; ?>
                                <?php $group_sku = $row['item_group']; ?>
                                <?php $no++; endforeach; ?>

                                <?php $DF_qty_year = $DF_qty_jan + $DF_qty_feb + $DF_qty_mar + $DF_qty_apr + $DF_qty_mei + $DF_qty_jun + $DF_qty_jul + $DF_qty_agu + $DF_qty_sep + $DF_qty_okt + $DF_qty_nop + $DF_qty_des;?>
                                <?php $DF_val_year = $DF_val_jan + $DF_val_feb + $DF_val_mar + $DF_val_apr + $DF_val_mei + $DF_val_jun + $DF_val_jul + $DF_val_agu + $DF_val_sep + $DF_val_okt + $DF_val_nop + $DF_val_des;?>
                                <?php $DF_target_qty_year = $DF_target_qty_jan + $DF_target_qty_feb + $DF_target_qty_mar + $DF_target_qty_apr + $DF_target_qty_mei + $DF_target_qty_jun + $DF_target_qty_jul + $DF_target_qty_agu + $DF_target_qty_sep + $DF_target_qty_okt + $DF_target_qty_nop + $DF_target_qty_des;?> 
                                <?php $DF_target_val_year = $DF_target_val_jan + $DF_target_val_feb + $DF_target_val_mar + $DF_target_val_apr + $DF_target_val_mei + $DF_target_val_jun + $DF_target_val_jul + $DF_target_val_agu + $DF_target_val_sep + $DF_target_val_okt + $DF_target_val_nop + $DF_target_val_des;?>
                                <?php $DF_idx_qty_year = ($DF_qty_year/($DF_target_qty_year ?: 1))*100;?> 
                                <?php $DF_idx_val_year = ($DF_val_year/($DF_target_val_year ?: 1))*100;?> 
                                <?php $DF_qty_avg = $DF_qty_year/12;?>
                                <?php $DF_val_avg = $DF_val_year/12;?>
                                <?php $DF_target_qty_avg = $DF_target_qty_year/12;?>
                                <?php $DF_target_val_avg = $DF_target_val_year/12;?>
                                <?php $DF_idx_qty_avg = ($DF_qty_avg/($DF_target_qty_avg ?: 1))*100;?>
                                <?php $DF_idx_val_avg = ($DF_val_avg/($DF_target_val_avg ?: 1))*100;?>
                                
                                <tr class="table-warning" style="font-weight:bold">
                                    <td></td>
                                    <td><?= $principal;?></td>
                                    <td><?= $group_sku;?></td>
                                    <td></td>
                                    <td class="text-center">Sub Total <?= $group_sku;?></td>
                                    <td></td>
                                    <td class="text-right"><?= number_format($DF_qty_jan, 0);?></td>
                                    <td class="text-right"><?= number_format($DF_val_jan, 2);?></td>
                                    <td class="text-right"><?= number_format($DF_target_qty_jan, 0);?></td>
                                    <td class="text-right"><?= number_format($DF_target_val_jan, 2);?></td>
                                    <td class="text-right"><?= number_format($DF_idx_qty_jan, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DF_idx_val_jan, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DF_qty_feb, 0);?></td>
                                    <td class="text-right"><?= number_format($DF_val_feb, 2);?></td>
                                    <td class="text-right"><?= number_format($DF_target_qty_feb, 0);?></td>
                                    <td class="text-right"><?= number_format($DF_target_val_feb, 2);?></td>
                                    <td class="text-right"><?= number_format($DF_idx_qty_feb, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DF_idx_val_feb, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DF_qty_mar, 0);?></td>
                                    <td class="text-right"><?= number_format($DF_val_mar, 2);?></td>
                                    <td class="text-right"><?= number_format($DF_target_qty_mar, 0);?></td>
                                    <td class="text-right"><?= number_format($DF_target_val_mar, 2);?></td>
                                    <td class="text-right"><?= number_format($DF_idx_qty_mar, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DF_idx_val_mar, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DF_qty_q1, 0);?></td>
                                    <td class="text-right"><?= number_format($DF_val_q1, 2);?></td>
                                    <td class="text-right"><?= number_format($DF_target_qty_q1, 0);?></td>
                                    <td class="text-right"><?= number_format($DF_target_val_q1, 2);?></td>
                                    <td class="text-right"><?= number_format($DF_idx_qty_q1, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DF_idx_val_q1, 0);?>%</td>

                                    <td class="text-right"><?= number_format($DF_qty_apr, 0);?></td>
                                    <td class="text-right"><?= number_format($DF_val_apr, 2);?></td>
                                    <td class="text-right"><?= number_format($DF_target_qty_apr, 0);?></td>
                                    <td class="text-right"><?= number_format($DF_target_val_apr, 2);?></td>
                                    <td class="text-right"><?= number_format($DF_idx_qty_apr, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DF_idx_val_apr, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DF_qty_mei, 0);?></td>
                                    <td class="text-right"><?= number_format($DF_val_mei, 2);?></td>
                                    <td class="text-right"><?= number_format($DF_target_qty_mei, 0);?></td>
                                    <td class="text-right"><?= number_format($DF_target_val_mei, 2);?></td>
                                    <td class="text-right"><?= number_format($DF_idx_qty_mei, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DF_idx_val_mei, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DF_qty_jun, 0);?></td>
                                    <td class="text-right"><?= number_format($DF_val_jun, 2);?></td>
                                    <td class="text-right"><?= number_format($DF_target_qty_jun, 0);?></td>
                                    <td class="text-right"><?= number_format($DF_target_val_jun, 2);?></td>
                                    <td class="text-right"><?= number_format($DF_idx_qty_jun, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DF_idx_val_jun, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DF_qty_q2, 0);?></td>
                                    <td class="text-right"><?= number_format($DF_val_q2, 2);?></td>
                                    <td class="text-right"><?= number_format($DF_target_qty_q2, 0);?></td>
                                    <td class="text-right"><?= number_format($DF_target_val_q2, 2);?></td>
                                    <td class="text-right"><?= number_format($DF_idx_qty_q2, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DF_idx_val_q2, 0);?>%</td>

                                    <td class="text-right"><?= number_format($DF_qty_jul, 0);?></td>
                                    <td class="text-right"><?= number_format($DF_val_jul, 2);?></td>
                                    <td class="text-right"><?= number_format($DF_target_qty_jul, 0);?></td>
                                    <td class="text-right"><?= number_format($DF_target_val_jul, 2);?></td>
                                    <td class="text-right"><?= number_format($DF_idx_qty_jul, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DF_idx_val_jul, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DF_qty_agu, 0);?></td>
                                    <td class="text-right"><?= number_format($DF_val_agu, 2);?></td>
                                    <td class="text-right"><?= number_format($DF_target_qty_agu, 0);?></td>
                                    <td class="text-right"><?= number_format($DF_target_val_agu, 2);?></td>
                                    <td class="text-right"><?= number_format($DF_idx_qty_agu, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DF_idx_val_agu, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DF_qty_sep, 0);?></td>
                                    <td class="text-right"><?= number_format($DF_val_sep, 2);?></td>
                                    <td class="text-right"><?= number_format($DF_target_qty_sep, 0);?></td>
                                    <td class="text-right"><?= number_format($DF_target_val_sep, 2);?></td>
                                    <td class="text-right"><?= number_format($DF_idx_qty_sep, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DF_idx_val_sep, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DF_qty_q3, 0);?></td>
                                    <td class="text-right"><?= number_format($DF_val_q3, 2);?></td>
                                    <td class="text-right"><?= number_format($DF_target_qty_q3, 0);?></td>
                                    <td class="text-right"><?= number_format($DF_target_val_q3, 2);?></td>
                                    <td class="text-right"><?= number_format($DF_idx_qty_q3, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DF_idx_val_q3, 0);?>%</td>

                                    <td class="text-right"><?= number_format($DF_qty_okt, 0);?></td>
                                    <td class="text-right"><?= number_format($DF_val_okt, 2);?></td>
                                    <td class="text-right"><?= number_format($DF_target_qty_okt, 0);?></td>
                                    <td class="text-right"><?= number_format($DF_target_val_okt, 2);?></td>
                                    <td class="text-right"><?= number_format($DF_idx_qty_okt, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DF_idx_val_okt, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DF_qty_nop, 0);?></td>
                                    <td class="text-right"><?= number_format($DF_val_nop, 2);?></td>
                                    <td class="text-right"><?= number_format($DF_target_qty_nop, 0);?></td>
                                    <td class="text-right"><?= number_format($DF_target_val_nop, 2);?></td>
                                    <td class="text-right"><?= number_format($DF_idx_qty_nop, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DF_idx_val_nop, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DF_qty_des, 0);?></td>
                                    <td class="text-right"><?= number_format($DF_val_des, 2);?></td>
                                    <td class="text-right"><?= number_format($DF_target_qty_des, 0);?></td>
                                    <td class="text-right"><?= number_format($DF_target_val_des, 2);?></td>
                                    <td class="text-right"><?= number_format($DF_idx_qty_des, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DF_idx_val_des, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DF_qty_q4, 0);?></td>
                                    <td class="text-right"><?= number_format($DF_val_q4, 2);?></td>
                                    <td class="text-right"><?= number_format($DF_target_qty_q4, 0);?></td>
                                    <td class="text-right"><?= number_format($DF_target_val_q4, 2);?></td>
                                    <td class="text-right"><?= number_format($DF_idx_qty_q4, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DF_idx_val_q4, 0);?>%</td>

                                    <td class="text-right"><?= number_format($DF_qty_year, 0);?></td>
                                    <td class="text-right"><?= number_format($DF_val_year, 2);?></td>
                                    <td class="text-right"><?= number_format($DF_target_qty_year, 0);?></td>
                                    <td class="text-right"><?= number_format($DF_target_val_year, 2);?></td>
                                    <td class="text-right"><?= number_format($DF_idx_qty_year, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DF_idx_val_year, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DF_qty_avg, 0);?></td>
                                    <td class="text-right"><?= number_format($DF_val_avg, 2);?></td>
                                    <td class="text-right"><?= number_format($DF_target_qty_avg, 0);?></td>
                                    <td class="text-right"><?= number_format($DF_target_val_avg, 2);?></td>
                                    <td class="text-right"><?= number_format($DF_idx_qty_avg, 0);?>%</td>
                                    <td class="text-right"><?= number_format($DF_idx_val_avg, 0);?>%</td>
                                </tr>


                                <!-- INTERDENTAL -->
                                <?php
                                    $ID_qty_jan = 0;
                                    $ID_qty_feb = 0;
                                    $ID_qty_mar = 0;
                                    $ID_qty_q1 = 0;
                                    $ID_qty_apr = 0;
                                    $ID_qty_mei = 0;
                                    $ID_qty_jun = 0;
                                    $ID_qty_q2 = 0;
                                    $ID_qty_jul = 0;
                                    $ID_qty_agu = 0;
                                    $ID_qty_sep = 0;
                                    $ID_qty_q3 = 0;
                                    $ID_qty_okt = 0;
                                    $ID_qty_nop = 0;
                                    $ID_qty_des = 0;
                                    $ID_qty_q4 = 0;

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

                                    $ID_target_qty_jan = 0;
                                    $ID_target_qty_feb = 0;
                                    $ID_target_qty_mar = 0;
                                    $ID_target_qty_q1 = 0;
                                    $ID_target_qty_apr = 0;
                                    $ID_target_qty_mei = 0;
                                    $ID_target_qty_jun = 0;
                                    $ID_target_qty_q2 = 0;
                                    $ID_target_qty_jul = 0;
                                    $ID_target_qty_agu = 0;
                                    $ID_target_qty_sep = 0;
                                    $ID_target_qty_q3 = 0;
                                    $ID_target_qty_okt = 0;
                                    $ID_target_qty_nop = 0;
                                    $ID_target_qty_des = 0;
                                    $ID_target_qty_q4 = 0;

                                    $ID_target_val_jan = 0;
                                    $ID_target_val_feb = 0;
                                    $ID_target_val_mar = 0;
                                    $ID_target_val_q1 = 0;
                                    $ID_target_val_apr = 0;
                                    $ID_target_val_mei = 0;
                                    $ID_target_val_jun = 0;
                                    $ID_target_val_q2 = 0;
                                    $ID_target_val_jul = 0;
                                    $ID_target_val_agu = 0;
                                    $ID_target_val_sep = 0;
                                    $ID_target_val_q3 = 0;
                                    $ID_target_val_okt = 0;
                                    $ID_target_val_nop = 0;
                                    $ID_target_val_des = 0;
                                    $ID_target_val_q4 = 0;

                                    $ID_idx_qty_jan = 0;
                                    $ID_idx_qty_feb = 0;
                                    $ID_idx_qty_mar = 0;
                                    $ID_idx_qty_q1 = 0;
                                    $ID_idx_qty_apr = 0;
                                    $ID_idx_qty_mei = 0;
                                    $ID_idx_qty_jun = 0;
                                    $ID_idx_qty_q2 = 0;
                                    $ID_idx_qty_jul = 0;
                                    $ID_idx_qty_agu = 0;
                                    $ID_idx_qty_sep = 0;
                                    $ID_idx_qty_q3 = 0;
                                    $ID_idx_qty_okt = 0;
                                    $ID_idx_qty_nop = 0;
                                    $ID_idx_qty_des = 0;
                                    $ID_idx_qty_q4 = 0;

                                    $ID_idx_val_jan = 0;
                                    $ID_idx_val_feb = 0;
                                    $ID_idx_val_mar = 0;
                                    $ID_idx_val_q1 = 0;
                                    $ID_idx_val_apr = 0;
                                    $ID_idx_val_mei = 0;
                                    $ID_idx_val_jun = 0;
                                    $ID_idx_val_q2 = 0;
                                    $ID_idx_val_jul = 0;
                                    $ID_idx_val_agu = 0;
                                    $ID_idx_val_sep = 0;
                                    $ID_idx_val_q3 = 0;
                                    $ID_idx_val_okt = 0;
                                    $ID_idx_val_nop = 0;
                                    $ID_idx_val_des = 0;
                                    $ID_idx_val_q4 = 0;
                                ?>
                                <?php foreach ($data['sellingout_ID'] as $row) :?>
                                <tr>
                                    <td class="text-center"><?= $no; ?></td>
                                    <td><?= $row['principal'];?></td>
                                    <td><?= $row['item_group'];?></td>
                                    <td><?= $row['item_code'];?></td>
                                    <td><?= $row['item_name'];?></td>
                                    <td class="text-center"><?= $row['unit'];?></td>
                                    <td class="text-right"><?= number_format($row['qty_jan'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_jan'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_jan'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_jan'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_jan'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_jan'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_feb'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_feb'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_feb'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_feb'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_feb'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_feb'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_mar'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_mar'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_mar'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_mar'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_mar'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_mar'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_q1'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_q1'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_q1'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_value_q1'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_q1'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_q1'], 0);?>%</td>

                                    <td class="text-right"><?= number_format($row['qty_apr'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_apr'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_apr'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_apr'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_apr'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_apr'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_mei'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_mei'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_mei'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_mei'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_mei'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_mei'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_jun'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_jun'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_jun'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_jun'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_jun'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_jun'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_q2'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_q2'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_q2'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_value_q2'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_q2'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_q2'], 0);?>%</td>

                                    <td class="text-right"><?= number_format($row['qty_jul'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_jul'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_jul'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_jul'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_jul'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_jul'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_agu'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_agu'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_agu'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_agu'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_agu'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_agu'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_sep'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_sep'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_sep'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_sep'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_sep'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_sep'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_q3'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_q3'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_q3'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_value_q3'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_q3'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_q3'], 0);?>%</td>

                                    <td class="text-right"><?= number_format($row['qty_okt'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_okt'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_okt'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_okt'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_okt'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_okt'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_nop'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_nop'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_nop'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_nop'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_nop'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_nop'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_des'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_des'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_des'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_des'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_des'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_des'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_q4'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_q4'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_q4'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_value_q4'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_q4'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_q4'], 0);?>%</td>

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

                                    <td class="text-right"><?= number_format($qty_year, 0);?></td>
                                    <td class="text-right"><?= number_format($val_year, 2);?></td>
                                    <td class="text-right"><?= number_format($target_qty_year, 0);?></td>
                                    <td class="text-right"><?= number_format($target_val_year, 2);?></td>
                                    <td class="text-right"><?= number_format($idx_qty_year, 0);?>%</td>
                                    <td class="text-right"><?= number_format($idx_val_year, 0);?>%</td>
                                    <td class="text-right"><?= number_format($qty_avg, 0);?></td>
                                    <td class="text-right"><?= number_format($val_avg, 2);?></td>
                                    <td class="text-right"><?= number_format($target_qty_avg, 0);?></td>
                                    <td class="text-right"><?= number_format($target_val_avg, 2);?></td>
                                    <td class="text-right"><?= number_format($idx_qty_avg, 0);?>%</td>
                                    <td class="text-right"><?= number_format($idx_val_avg, 0);?>%</td>
                                </tr>
                                
                                <!-- sub qty -->
                                <?php $ID_qty_jan += $row['qty_jan']; ?>
                                <?php $ID_qty_feb += $row['qty_feb']; ?>
                                <?php $ID_qty_mar += $row['qty_mar']; ?>
                                <?php $ID_qty_q1 += $row['qty_q1']; ?>

                                <?php $ID_qty_apr += $row['qty_apr']; ?>
                                <?php $ID_qty_mei += $row['qty_mei']; ?>
                                <?php $ID_qty_jun += $row['qty_jun']; ?>
                                <?php $ID_qty_q2 += $row['qty_q2']; ?>

                                <?php $ID_qty_jul += $row['qty_jul']; ?>
                                <?php $ID_qty_agu += $row['qty_agu']; ?>
                                <?php $ID_qty_sep += $row['qty_sep']; ?>
                                <?php $ID_qty_q3 += $row['qty_q3']; ?>

                                <?php $ID_qty_okt += $row['qty_okt']; ?>
                                <?php $ID_qty_nop += $row['qty_nop']; ?>
                                <?php $ID_qty_des += $row['qty_des']; ?>
                                <?php $ID_qty_q4 += $row['qty_q4']; ?>
                                
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

                                <?php $ID_target_qty_jan += $row['target_qty_jan']; ?>
                                <?php $ID_target_qty_feb += $row['target_qty_feb']; ?>
                                <?php $ID_target_qty_mar += $row['target_qty_mar']; ?>
                                <?php $ID_target_qty_q1 += $row['target_qty_q1']; ?>

                                <?php $ID_target_qty_apr += $row['target_qty_apr']; ?>
                                <?php $ID_target_qty_mei += $row['target_qty_mei']; ?>
                                <?php $ID_target_qty_jun += $row['target_qty_jun']; ?>
                                <?php $ID_target_qty_q2 += $row['target_qty_q2']; ?>

                                <?php $ID_target_qty_jul += $row['target_qty_jul']; ?>
                                <?php $ID_target_qty_agu += $row['target_qty_agu']; ?>
                                <?php $ID_target_qty_sep += $row['target_qty_sep']; ?>
                                <?php $ID_target_qty_q3 += $row['target_qty_q3']; ?>

                                <?php $ID_target_qty_okt += $row['target_qty_okt']; ?>
                                <?php $ID_target_qty_nop += $row['target_qty_nop']; ?>
                                <?php $ID_target_qty_des += $row['target_qty_des']; ?>
                                <?php $ID_target_qty_q4 += $row['target_qty_q4']; ?>
                                
                                <!-- sub val -->
                                <?php $ID_target_val_jan += $row['target_val_jan']; ?>
                                <?php $ID_target_val_feb += $row['target_val_feb']; ?>
                                <?php $ID_target_val_mar += $row['target_val_mar']; ?>
                                <?php $ID_target_val_q1 += $row['target_value_q1']; ?>

                                <?php $ID_target_val_apr += $row['target_val_apr']; ?>
                                <?php $ID_target_val_mei += $row['target_val_mei']; ?>
                                <?php $ID_target_val_jun += $row['target_val_jun']; ?>
                                <?php $ID_target_val_q2 += $row['target_value_q2']; ?>

                                <?php $ID_target_val_jul += $row['target_val_jul']; ?>
                                <?php $ID_target_val_agu += $row['target_val_agu']; ?>
                                <?php $ID_target_val_sep += $row['target_val_sep']; ?>
                                <?php $ID_target_val_q3 += $row['target_value_q3']; ?>

                                <?php $ID_target_val_okt += $row['target_val_okt']; ?>
                                <?php $ID_target_val_nop += $row['target_val_nop']; ?>
                                <?php $ID_target_val_des += $row['target_val_des']; ?>
                                <?php $ID_target_val_q4 += $row['target_value_q4']; ?>

                                <?php $ID_idx_qty_jan = ($ID_qty_jan/($ID_target_qty_jan ?: 1))*100; ?>
                                <?php $ID_idx_qty_feb = ($ID_qty_feb/($ID_target_qty_feb ?: 1))*100; ?>
                                <?php $ID_idx_qty_mar = ($ID_qty_mar/($ID_target_qty_mar ?: 1))*100; ?>
                                <?php $ID_idx_qty_q1 = ($ID_qty_q1/($ID_target_qty_q1 ?: 1))*100; ?>

                                <?php $ID_idx_qty_apr = ($ID_qty_apr/($ID_target_qty_apr ?: 1))*100; ?>
                                <?php $ID_idx_qty_mei = ($ID_qty_mei/($ID_target_qty_mei ?: 1))*100; ?>
                                <?php $ID_idx_qty_jun = ($ID_qty_jun/($ID_target_qty_jun ?: 1))*100; ?>
                                <?php $ID_idx_qty_q2 = ($ID_qty_q2/($ID_target_qty_q2 ?: 1))*100; ?>

                                <?php $ID_idx_qty_jul = ($ID_qty_jul/($ID_target_qty_jul ?: 1))*100; ?>
                                <?php $ID_idx_qty_agu = ($ID_qty_agu/($ID_target_qty_agu ?: 1))*100; ?>
                                <?php $ID_idx_qty_sep = ($ID_qty_sep/($ID_target_qty_sep ?: 1))*100; ?>
                                <?php $ID_idx_qty_q3 = ($ID_qty_q3/($ID_target_qty_q3 ?: 1))*100; ?>

                                <?php $ID_idx_qty_okt = ($ID_qty_okt/($ID_target_qty_okt ?: 1))*100; ?>
                                <?php $ID_idx_qty_nop = ($ID_qty_nop/($ID_target_qty_nop ?: 1))*100; ?>
                                <?php $ID_idx_qty_des = ($ID_qty_des/($ID_target_qty_des ?: 1))*100; ?>
                                <?php $ID_idx_qty_q4 = ($ID_qty_q4/($ID_target_qty_q4 ?: 1))*100; ?>
                                
                                <!-- sub val -->
                                <?php $ID_idx_val_jan = ($ID_val_jan/($ID_target_val_jan ?: 1))*100; ?>
                                <?php $ID_idx_val_feb = ($ID_val_feb/($ID_target_val_feb ?: 1))*100; ?>
                                <?php $ID_idx_val_mar = ($ID_val_mar/($ID_target_val_mar ?: 1))*100; ?>
                                <?php $ID_idx_val_q1 = ($ID_val_q1/($ID_target_val_q1 ?: 1))*100; ?>

                                <?php $ID_idx_val_apr = ($ID_val_apr/($ID_target_val_apr ?: 1))*100; ?>
                                <?php $ID_idx_val_mei = ($ID_val_mei/($ID_target_val_mei ?: 1))*100; ?>
                                <?php $ID_idx_val_jun = ($ID_val_jun/($ID_target_val_jun ?: 1))*100; ?>
                                <?php $ID_idx_val_q2 = ($ID_val_q2/($ID_target_val_q2 ?: 1))*100; ?>

                                <?php $ID_idx_val_jul = ($ID_val_jul/($ID_target_val_jul ?: 1))*100; ?>
                                <?php $ID_idx_val_agu = ($ID_val_agu/($ID_target_val_agu ?: 1))*100; ?>
                                <?php $ID_idx_val_sep = ($ID_val_sep/($ID_target_val_sep ?: 1))*100; ?>
                                <?php $ID_idx_val_q3 = ($ID_val_q3/($ID_target_val_q3 ?: 1))*100; ?>

                                <?php $ID_idx_val_okt = ($ID_val_okt/($ID_target_val_okt ?: 1))*100; ?>
                                <?php $ID_idx_val_nop = ($ID_val_nop/($ID_target_val_nop ?: 1))*100; ?>
                                <?php $ID_idx_val_des = ($ID_val_des/($ID_target_val_des ?: 1))*100; ?>
                                <?php $ID_idx_val_q4 = ($ID_val_q4/($ID_target_val_q4 ?: 1))*100; ?>
                                
                                <?php $principal = $row['principal']; ?>
                                <?php $group_sku = $row['item_group']; ?>
                                <?php $no++; endforeach; ?>

                                <?php $ID_qty_year = $ID_qty_jan + $ID_qty_feb + $ID_qty_mar + $ID_qty_apr + $ID_qty_mei + $ID_qty_jun + $ID_qty_jul + $ID_qty_agu + $ID_qty_sep + $ID_qty_okt + $ID_qty_nop + $ID_qty_des;?>
                                <?php $ID_val_year = $ID_val_jan + $ID_val_feb + $ID_val_mar + $ID_val_apr + $ID_val_mei + $ID_val_jun + $ID_val_jul + $ID_val_agu + $ID_val_sep + $ID_val_okt + $ID_val_nop + $ID_val_des;?>
                                <?php $ID_target_qty_year = $ID_target_qty_jan + $ID_target_qty_feb + $ID_target_qty_mar + $ID_target_qty_apr + $ID_target_qty_mei + $ID_target_qty_jun + $ID_target_qty_jul + $ID_target_qty_agu + $ID_target_qty_sep + $ID_target_qty_okt + $ID_target_qty_nop + $ID_target_qty_des;?> 
                                <?php $ID_target_val_year = $ID_target_val_jan + $ID_target_val_feb + $ID_target_val_mar + $ID_target_val_apr + $ID_target_val_mei + $ID_target_val_jun + $ID_target_val_jul + $ID_target_val_agu + $ID_target_val_sep + $ID_target_val_okt + $ID_target_val_nop + $ID_target_val_des;?>
                                <?php $ID_idx_qty_year = ($ID_qty_year/($ID_target_qty_year ?: 1))*100;?> 
                                <?php $ID_idx_val_year = ($ID_val_year/($ID_target_val_year ?: 1))*100;?> 
                                <?php $ID_qty_avg = $ID_qty_year/12;?>
                                <?php $ID_val_avg = $ID_val_year/12;?>
                                <?php $ID_target_qty_avg = $ID_target_qty_year/12;?>
                                <?php $ID_target_val_avg = $ID_target_val_year/12;?>
                                <?php $ID_idx_qty_avg = ($ID_qty_avg/($ID_target_qty_avg ?: 1))*100;?>
                                <?php $ID_idx_val_avg = ($ID_val_avg/($ID_target_val_avg ?: 1))*100;?>
                                
                                <tr class="table-warning" style="font-weight:bold">
                                    <td></td>
                                    <td><?= $principal;?></td>
                                    <td><?= $group_sku;?></td>
                                    <td></td>
                                    <td class="text-center">Sub Total <?= $group_sku;?></td>
                                    <td></td>
                                    <td class="text-right"><?= number_format($ID_qty_jan, 0);?></td>
                                    <td class="text-right"><?= number_format($ID_val_jan, 2);?></td>
                                    <td class="text-right"><?= number_format($ID_target_qty_jan, 0);?></td>
                                    <td class="text-right"><?= number_format($ID_target_val_jan, 2);?></td>
                                    <td class="text-right"><?= number_format($ID_idx_qty_jan, 0);?>%</td>
                                    <td class="text-right"><?= number_format($ID_idx_val_jan, 0);?>%</td>
                                    <td class="text-right"><?= number_format($ID_qty_feb, 0);?></td>
                                    <td class="text-right"><?= number_format($ID_val_feb, 2);?></td>
                                    <td class="text-right"><?= number_format($ID_target_qty_feb, 0);?></td>
                                    <td class="text-right"><?= number_format($ID_target_val_feb, 2);?></td>
                                    <td class="text-right"><?= number_format($ID_idx_qty_feb, 0);?>%</td>
                                    <td class="text-right"><?= number_format($ID_idx_val_feb, 0);?>%</td>
                                    <td class="text-right"><?= number_format($ID_qty_mar, 0);?></td>
                                    <td class="text-right"><?= number_format($ID_val_mar, 2);?></td>
                                    <td class="text-right"><?= number_format($ID_target_qty_mar, 0);?></td>
                                    <td class="text-right"><?= number_format($ID_target_val_mar, 2);?></td>
                                    <td class="text-right"><?= number_format($ID_idx_qty_mar, 0);?>%</td>
                                    <td class="text-right"><?= number_format($ID_idx_val_mar, 0);?>%</td>
                                    <td class="text-right"><?= number_format($ID_qty_q1, 0);?></td>
                                    <td class="text-right"><?= number_format($ID_val_q1, 2);?></td>
                                    <td class="text-right"><?= number_format($ID_target_qty_q1, 0);?></td>
                                    <td class="text-right"><?= number_format($ID_target_val_q1, 2);?></td>
                                    <td class="text-right"><?= number_format($ID_idx_qty_q1, 0);?>%</td>
                                    <td class="text-right"><?= number_format($ID_idx_val_q1, 0);?>%</td>

                                    <td class="text-right"><?= number_format($ID_qty_apr, 0);?></td>
                                    <td class="text-right"><?= number_format($ID_val_apr, 2);?></td>
                                    <td class="text-right"><?= number_format($ID_target_qty_apr, 0);?></td>
                                    <td class="text-right"><?= number_format($ID_target_val_apr, 2);?></td>
                                    <td class="text-right"><?= number_format($ID_idx_qty_apr, 0);?>%</td>
                                    <td class="text-right"><?= number_format($ID_idx_val_apr, 0);?>%</td>
                                    <td class="text-right"><?= number_format($ID_qty_mei, 0);?></td>
                                    <td class="text-right"><?= number_format($ID_val_mei, 2);?></td>
                                    <td class="text-right"><?= number_format($ID_target_qty_mei, 0);?></td>
                                    <td class="text-right"><?= number_format($ID_target_val_mei, 2);?></td>
                                    <td class="text-right"><?= number_format($ID_idx_qty_mei, 0);?>%</td>
                                    <td class="text-right"><?= number_format($ID_idx_val_mei, 0);?>%</td>
                                    <td class="text-right"><?= number_format($ID_qty_jun, 0);?></td>
                                    <td class="text-right"><?= number_format($ID_val_jun, 2);?></td>
                                    <td class="text-right"><?= number_format($ID_target_qty_jun, 0);?></td>
                                    <td class="text-right"><?= number_format($ID_target_val_jun, 2);?></td>
                                    <td class="text-right"><?= number_format($ID_idx_qty_jun, 0);?>%</td>
                                    <td class="text-right"><?= number_format($ID_idx_val_jun, 0);?>%</td>
                                    <td class="text-right"><?= number_format($ID_qty_q2, 0);?></td>
                                    <td class="text-right"><?= number_format($ID_val_q2, 2);?></td>
                                    <td class="text-right"><?= number_format($ID_target_qty_q2, 0);?></td>
                                    <td class="text-right"><?= number_format($ID_target_val_q2, 2);?></td>
                                    <td class="text-right"><?= number_format($ID_idx_qty_q2, 0);?>%</td>
                                    <td class="text-right"><?= number_format($ID_idx_val_q2, 0);?>%</td>

                                    <td class="text-right"><?= number_format($ID_qty_jul, 0);?></td>
                                    <td class="text-right"><?= number_format($ID_val_jul, 2);?></td>
                                    <td class="text-right"><?= number_format($ID_target_qty_jul, 0);?></td>
                                    <td class="text-right"><?= number_format($ID_target_val_jul, 2);?></td>
                                    <td class="text-right"><?= number_format($ID_idx_qty_jul, 0);?>%</td>
                                    <td class="text-right"><?= number_format($ID_idx_val_jul, 0);?>%</td>
                                    <td class="text-right"><?= number_format($ID_qty_agu, 0);?></td>
                                    <td class="text-right"><?= number_format($ID_val_agu, 2);?></td>
                                    <td class="text-right"><?= number_format($ID_target_qty_agu, 0);?></td>
                                    <td class="text-right"><?= number_format($ID_target_val_agu, 2);?></td>
                                    <td class="text-right"><?= number_format($ID_idx_qty_agu, 0);?>%</td>
                                    <td class="text-right"><?= number_format($ID_idx_val_agu, 0);?>%</td>
                                    <td class="text-right"><?= number_format($ID_qty_sep, 0);?></td>
                                    <td class="text-right"><?= number_format($ID_val_sep, 2);?></td>
                                    <td class="text-right"><?= number_format($ID_target_qty_sep, 0);?></td>
                                    <td class="text-right"><?= number_format($ID_target_val_sep, 2);?></td>
                                    <td class="text-right"><?= number_format($ID_idx_qty_sep, 0);?>%</td>
                                    <td class="text-right"><?= number_format($ID_idx_val_sep, 0);?>%</td>
                                    <td class="text-right"><?= number_format($ID_qty_q3, 0);?></td>
                                    <td class="text-right"><?= number_format($ID_val_q3, 2);?></td>
                                    <td class="text-right"><?= number_format($ID_target_qty_q3, 0);?></td>
                                    <td class="text-right"><?= number_format($ID_target_val_q3, 2);?></td>
                                    <td class="text-right"><?= number_format($ID_idx_qty_q3, 0);?>%</td>
                                    <td class="text-right"><?= number_format($ID_idx_val_q3, 0);?>%</td>

                                    <td class="text-right"><?= number_format($ID_qty_okt, 0);?></td>
                                    <td class="text-right"><?= number_format($ID_val_okt, 2);?></td>
                                    <td class="text-right"><?= number_format($ID_target_qty_okt, 0);?></td>
                                    <td class="text-right"><?= number_format($ID_target_val_okt, 2);?></td>
                                    <td class="text-right"><?= number_format($ID_idx_qty_okt, 0);?>%</td>
                                    <td class="text-right"><?= number_format($ID_idx_val_okt, 0);?>%</td>
                                    <td class="text-right"><?= number_format($ID_qty_nop, 0);?></td>
                                    <td class="text-right"><?= number_format($ID_val_nop, 2);?></td>
                                    <td class="text-right"><?= number_format($ID_target_qty_nop, 0);?></td>
                                    <td class="text-right"><?= number_format($ID_target_val_nop, 2);?></td>
                                    <td class="text-right"><?= number_format($ID_idx_qty_nop, 0);?>%</td>
                                    <td class="text-right"><?= number_format($ID_idx_val_nop, 0);?>%</td>
                                    <td class="text-right"><?= number_format($ID_qty_des, 0);?></td>
                                    <td class="text-right"><?= number_format($ID_val_des, 2);?></td>
                                    <td class="text-right"><?= number_format($ID_target_qty_des, 0);?></td>
                                    <td class="text-right"><?= number_format($ID_target_val_des, 2);?></td>
                                    <td class="text-right"><?= number_format($ID_idx_qty_des, 0);?>%</td>
                                    <td class="text-right"><?= number_format($ID_idx_val_des, 0);?>%</td>
                                    <td class="text-right"><?= number_format($ID_qty_q4, 0);?></td>
                                    <td class="text-right"><?= number_format($ID_val_q4, 2);?></td>
                                    <td class="text-right"><?= number_format($ID_target_qty_q4, 0);?></td>
                                    <td class="text-right"><?= number_format($ID_target_val_q4, 2);?></td>
                                    <td class="text-right"><?= number_format($ID_idx_qty_q4, 0);?>%</td>
                                    <td class="text-right"><?= number_format($ID_idx_val_q4, 0);?>%</td>

                                    <td class="text-right"><?= number_format($ID_qty_year, 0);?></td>
                                    <td class="text-right"><?= number_format($ID_val_year, 2);?></td>
                                    <td class="text-right"><?= number_format($ID_target_qty_year, 0);?></td>
                                    <td class="text-right"><?= number_format($ID_target_val_year, 2);?></td>
                                    <td class="text-right"><?= number_format($ID_idx_qty_year, 0);?>%</td>
                                    <td class="text-right"><?= number_format($ID_idx_val_year, 0);?>%</td>
                                    <td class="text-right"><?= number_format($ID_qty_avg, 0);?></td>
                                    <td class="text-right"><?= number_format($ID_val_avg, 2);?></td>
                                    <td class="text-right"><?= number_format($ID_target_qty_avg, 0);?></td>
                                    <td class="text-right"><?= number_format($ID_target_val_avg, 2);?></td>
                                    <td class="text-right"><?= number_format($ID_idx_qty_avg, 0);?>%</td>
                                    <td class="text-right"><?= number_format($ID_idx_val_avg, 0);?>%</td>
                                </tr>

                                <!-- KIDS TOOTHPASTE -->
                                <?php
                                    $KP_qty_jan = 0;
                                    $KP_qty_feb = 0;
                                    $KP_qty_mar = 0;
                                    $KP_qty_q1 = 0;
                                    $KP_qty_apr = 0;
                                    $KP_qty_mei = 0;
                                    $KP_qty_jun = 0;
                                    $KP_qty_q2 = 0;
                                    $KP_qty_jul = 0;
                                    $KP_qty_agu = 0;
                                    $KP_qty_sep = 0;
                                    $KP_qty_q3 = 0;
                                    $KP_qty_okt = 0;
                                    $KP_qty_nop = 0;
                                    $KP_qty_des = 0;
                                    $KP_qty_q4 = 0;

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

                                    $KP_target_qty_jan = 0;
                                    $KP_target_qty_feb = 0;
                                    $KP_target_qty_mar = 0;
                                    $KP_target_qty_q1 = 0;
                                    $KP_target_qty_apr = 0;
                                    $KP_target_qty_mei = 0;
                                    $KP_target_qty_jun = 0;
                                    $KP_target_qty_q2 = 0;
                                    $KP_target_qty_jul = 0;
                                    $KP_target_qty_agu = 0;
                                    $KP_target_qty_sep = 0;
                                    $KP_target_qty_q3 = 0;
                                    $KP_target_qty_okt = 0;
                                    $KP_target_qty_nop = 0;
                                    $KP_target_qty_des = 0;
                                    $KP_target_qty_q4 = 0;

                                    $KP_target_val_jan = 0;
                                    $KP_target_val_feb = 0;
                                    $KP_target_val_mar = 0;
                                    $KP_target_val_q1 = 0;
                                    $KP_target_val_apr = 0;
                                    $KP_target_val_mei = 0;
                                    $KP_target_val_jun = 0;
                                    $KP_target_val_q2 = 0;
                                    $KP_target_val_jul = 0;
                                    $KP_target_val_agu = 0;
                                    $KP_target_val_sep = 0;
                                    $KP_target_val_q3 = 0;
                                    $KP_target_val_okt = 0;
                                    $KP_target_val_nop = 0;
                                    $KP_target_val_des = 0;
                                    $KP_target_val_q4 = 0;

                                    $KP_idx_qty_jan = 0;
                                    $KP_idx_qty_feb = 0;
                                    $KP_idx_qty_mar = 0;
                                    $KP_idx_qty_q1 = 0;
                                    $KP_idx_qty_apr = 0;
                                    $KP_idx_qty_mei = 0;
                                    $KP_idx_qty_jun = 0;
                                    $KP_idx_qty_q2 = 0;
                                    $KP_idx_qty_jul = 0;
                                    $KP_idx_qty_agu = 0;
                                    $KP_idx_qty_sep = 0;
                                    $KP_idx_qty_q3 = 0;
                                    $KP_idx_qty_okt = 0;
                                    $KP_idx_qty_nop = 0;
                                    $KP_idx_qty_des = 0;
                                    $KP_idx_qty_q4 = 0;

                                    $KP_idx_val_jan = 0;
                                    $KP_idx_val_feb = 0;
                                    $KP_idx_val_mar = 0;
                                    $KP_idx_val_q1 = 0;
                                    $KP_idx_val_apr = 0;
                                    $KP_idx_val_mei = 0;
                                    $KP_idx_val_jun = 0;
                                    $KP_idx_val_q2 = 0;
                                    $KP_idx_val_jul = 0;
                                    $KP_idx_val_agu = 0;
                                    $KP_idx_val_sep = 0;
                                    $KP_idx_val_q3 = 0;
                                    $KP_idx_val_okt = 0;
                                    $KP_idx_val_nop = 0;
                                    $KP_idx_val_des = 0;
                                    $KP_idx_val_q4 = 0;
                                ?>
                                <?php foreach ($data['sellingout_KP'] as $row) :?>
                                <tr>
                                    <td class="text-center"><?= $no; ?></td>
                                    <td><?= $row['principal'];?></td>
                                    <td><?= $row['item_group'];?></td>
                                    <td><?= $row['item_code'];?></td>
                                    <td><?= $row['item_name'];?></td>
                                    <td class="text-center"><?= $row['unit'];?></td>
                                    <td class="text-right"><?= number_format($row['qty_jan'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_jan'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_jan'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_jan'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_jan'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_jan'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_feb'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_feb'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_feb'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_feb'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_feb'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_feb'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_mar'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_mar'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_mar'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_mar'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_mar'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_mar'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_q1'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_q1'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_q1'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_value_q1'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_q1'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_q1'], 0);?>%</td>

                                    <td class="text-right"><?= number_format($row['qty_apr'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_apr'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_apr'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_apr'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_apr'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_apr'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_mei'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_mei'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_mei'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_mei'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_mei'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_mei'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_jun'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_jun'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_jun'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_jun'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_jun'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_jun'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_q2'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_q2'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_q2'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_value_q2'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_q2'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_q2'], 0);?>%</td>

                                    <td class="text-right"><?= number_format($row['qty_jul'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_jul'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_jul'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_jul'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_jul'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_jul'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_agu'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_agu'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_agu'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_agu'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_agu'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_agu'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_sep'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_sep'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_sep'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_sep'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_sep'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_sep'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_q3'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_q3'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_q3'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_value_q3'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_q3'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_q3'], 0);?>%</td>

                                    <td class="text-right"><?= number_format($row['qty_okt'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_okt'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_okt'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_okt'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_okt'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_okt'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_nop'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_nop'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_nop'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_nop'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_nop'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_nop'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_des'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_des'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_des'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_des'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_des'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_des'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['qty_q4'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_q4'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_q4'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_value_q4'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_q4'], 0);?>%</td>
                                    <td class="text-right"><?= number_format($row['idx_val_q4'], 0);?>%</td>

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

                                    <td class="text-right"><?= number_format($qty_year, 0);?></td>
                                    <td class="text-right"><?= number_format($val_year, 2);?></td>
                                    <td class="text-right"><?= number_format($target_qty_year, 0);?></td>
                                    <td class="text-right"><?= number_format($target_val_year, 2);?></td>
                                    <td class="text-right"><?= number_format($idx_qty_year, 0);?>%</td>
                                    <td class="text-right"><?= number_format($idx_val_year, 0);?>%</td>
                                    <td class="text-right"><?= number_format($qty_avg, 0);?></td>
                                    <td class="text-right"><?= number_format($val_avg, 2);?></td>
                                    <td class="text-right"><?= number_format($target_qty_avg, 0);?></td>
                                    <td class="text-right"><?= number_format($target_val_avg, 2);?></td>
                                    <td class="text-right"><?= number_format($idx_qty_avg, 0);?>%</td>
                                    <td class="text-right"><?= number_format($idx_val_avg, 0);?>%</td>
                                </tr>
                                
                                <!-- sub qty -->
                                <?php $KP_qty_jan += $row['qty_jan']; ?>
                                <?php $KP_qty_feb += $row['qty_feb']; ?>
                                <?php $KP_qty_mar += $row['qty_mar']; ?>
                                <?php $KP_qty_q1 += $row['qty_q1']; ?>

                                <?php $KP_qty_apr += $row['qty_apr']; ?>
                                <?php $KP_qty_mei += $row['qty_mei']; ?>
                                <?php $KP_qty_jun += $row['qty_jun']; ?>
                                <?php $KP_qty_q2 += $row['qty_q2']; ?>

                                <?php $KP_qty_jul += $row['qty_jul']; ?>
                                <?php $KP_qty_agu += $row['qty_agu']; ?>
                                <?php $KP_qty_sep += $row['qty_sep']; ?>
                                <?php $KP_qty_q3 += $row['qty_q3']; ?>

                                <?php $KP_qty_okt += $row['qty_okt']; ?>
                                <?php $KP_qty_nop += $row['qty_nop']; ?>
                                <?php $KP_qty_des += $row['qty_des']; ?>
                                <?php $KP_qty_q4 += $row['qty_q4']; ?>
                                
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

                                <?php $KP_target_qty_jan += $row['target_qty_jan']; ?>
                                <?php $KP_target_qty_feb += $row['target_qty_feb']; ?>
                                <?php $KP_target_qty_mar += $row['target_qty_mar']; ?>
                                <?php $KP_target_qty_q1 += $row['target_qty_q1']; ?>

                                <?php $KP_target_qty_apr += $row['target_qty_apr']; ?>
                                <?php $KP_target_qty_mei += $row['target_qty_mei']; ?>
                                <?php $KP_target_qty_jun += $row['target_qty_jun']; ?>
                                <?php $KP_target_qty_q2 += $row['target_qty_q2']; ?>

                                <?php $KP_target_qty_jul += $row['target_qty_jul']; ?>
                                <?php $KP_target_qty_agu += $row['target_qty_agu']; ?>
                                <?php $KP_target_qty_sep += $row['target_qty_sep']; ?>
                                <?php $KP_target_qty_q3 += $row['target_qty_q3']; ?>

                                <?php $KP_target_qty_okt += $row['target_qty_okt']; ?>
                                <?php $KP_target_qty_nop += $row['target_qty_nop']; ?>
                                <?php $KP_target_qty_des += $row['target_qty_des']; ?>
                                <?php $KP_target_qty_q4 += $row['target_qty_q4']; ?>
                                
                                <!-- sub val -->
                                <?php $KP_target_val_jan += $row['target_val_jan']; ?>
                                <?php $KP_target_val_feb += $row['target_val_feb']; ?>
                                <?php $KP_target_val_mar += $row['target_val_mar']; ?>
                                <?php $KP_target_val_q1 += $row['target_value_q1']; ?>

                                <?php $KP_target_val_apr += $row['target_val_apr']; ?>
                                <?php $KP_target_val_mei += $row['target_val_mei']; ?>
                                <?php $KP_target_val_jun += $row['target_val_jun']; ?>
                                <?php $KP_target_val_q2 += $row['target_value_q2']; ?>

                                <?php $KP_target_val_jul += $row['target_val_jul']; ?>
                                <?php $KP_target_val_agu += $row['target_val_agu']; ?>
                                <?php $KP_target_val_sep += $row['target_val_sep']; ?>
                                <?php $KP_target_val_q3 += $row['target_value_q3']; ?>

                                <?php $KP_target_val_okt += $row['target_val_okt']; ?>
                                <?php $KP_target_val_nop += $row['target_val_nop']; ?>
                                <?php $KP_target_val_des += $row['target_val_des']; ?>
                                <?php $KP_target_val_q4 += $row['target_value_q4']; ?>

                                <?php $KP_idx_qty_jan = ($KP_qty_jan/($KP_target_qty_jan ?: 1))*100; ?>
                                <?php $KP_idx_qty_feb = ($KP_qty_feb/($KP_target_qty_feb ?: 1))*100; ?>
                                <?php $KP_idx_qty_mar = ($KP_qty_mar/($KP_target_qty_mar ?: 1))*100; ?>
                                <?php $KP_idx_qty_q1 = ($KP_qty_q1/($KP_target_qty_q1 ?: 1))*100; ?>

                                <?php $KP_idx_qty_apr = ($KP_qty_apr/($KP_target_qty_apr ?: 1))*100; ?>
                                <?php $KP_idx_qty_mei = ($KP_qty_mei/($KP_target_qty_mei ?: 1))*100; ?>
                                <?php $KP_idx_qty_jun = ($KP_qty_jun/($KP_target_qty_jun ?: 1))*100; ?>
                                <?php $KP_idx_qty_q2 = ($KP_qty_q2/($KP_target_qty_q2 ?: 1))*100; ?>

                                <?php $KP_idx_qty_jul = ($KP_qty_jul/($KP_target_qty_jul ?: 1))*100; ?>
                                <?php $KP_idx_qty_agu = ($KP_qty_agu/($KP_target_qty_agu ?: 1))*100; ?>
                                <?php $KP_idx_qty_sep = ($KP_qty_sep/($KP_target_qty_sep ?: 1))*100; ?>
                                <?php $KP_idx_qty_q3 = ($KP_qty_q3/($KP_target_qty_q3 ?: 1))*100; ?>

                                <?php $KP_idx_qty_okt = ($KP_qty_okt/($KP_target_qty_okt ?: 1))*100; ?>
                                <?php $KP_idx_qty_nop = ($KP_qty_nop/($KP_target_qty_nop ?: 1))*100; ?>
                                <?php $KP_idx_qty_des = ($KP_qty_des/($KP_target_qty_des ?: 1))*100; ?>
                                <?php $KP_idx_qty_q4 = ($KP_qty_q4/($KP_target_qty_q4 ?: 1))*100; ?>
                                
                                <!-- sub val -->
                                <?php $KP_idx_val_jan = ($KP_val_jan/($KP_target_val_jan ?: 1))*100; ?>
                                <?php $KP_idx_val_feb = ($KP_val_feb/($KP_target_val_feb ?: 1))*100; ?>
                                <?php $KP_idx_val_mar = ($KP_val_mar/($KP_target_val_mar ?: 1))*100; ?>
                                <?php $KP_idx_val_q1 = ($KP_val_q1/($KP_target_val_q1 ?: 1))*100; ?>

                                <?php $KP_idx_val_apr = ($KP_val_apr/($KP_target_val_apr ?: 1))*100; ?>
                                <?php $KP_idx_val_mei = ($KP_val_mei/($KP_target_val_mei ?: 1))*100; ?>
                                <?php $KP_idx_val_jun = ($KP_val_jun/($KP_target_val_jun ?: 1))*100; ?>
                                <?php $KP_idx_val_q2 = ($KP_val_q2/($KP_target_val_q2 ?: 1))*100; ?>

                                <?php $KP_idx_val_jul = ($KP_val_jul/($KP_target_val_jul ?: 1))*100; ?>
                                <?php $KP_idx_val_agu = ($KP_val_agu/($KP_target_val_agu ?: 1))*100; ?>
                                <?php $KP_idx_val_sep = ($KP_val_sep/($KP_target_val_sep ?: 1))*100; ?>
                                <?php $KP_idx_val_q3 = ($KP_val_q3/($KP_target_val_q3 ?: 1))*100; ?>

                                <?php $KP_idx_val_okt = ($KP_val_okt/($KP_target_val_okt ?: 1))*100; ?>
                                <?php $KP_idx_val_nop = ($KP_val_nop/($KP_target_val_nop ?: 1))*100; ?>
                                <?php $KP_idx_val_des = ($KP_val_des/($KP_target_val_des ?: 1))*100; ?>
                                <?php $KP_idx_val_q4 = ($KP_val_q4/($KP_target_val_q4 ?: 1))*100; ?>
                                
                                <?php $principal = $row['principal']; ?>
                                <?php $group_sku = $row['item_group']; ?>
                                <?php $no++; endforeach; ?>

                                <?php $KP_qty_year = $KP_qty_jan + $KP_qty_feb + $KP_qty_mar + $KP_qty_apr + $KP_qty_mei + $KP_qty_jun + $KP_qty_jul + $KP_qty_agu + $KP_qty_sep + $KP_qty_okt + $KP_qty_nop + $KP_qty_des;?>
                                <?php $KP_val_year = $KP_val_jan + $KP_val_feb + $KP_val_mar + $KP_val_apr + $KP_val_mei + $KP_val_jun + $KP_val_jul + $KP_val_agu + $KP_val_sep + $KP_val_okt + $KP_val_nop + $KP_val_des;?>
                                <?php $KP_target_qty_year = $KP_target_qty_jan + $KP_target_qty_feb + $KP_target_qty_mar + $KP_target_qty_apr + $KP_target_qty_mei + $KP_target_qty_jun + $KP_target_qty_jul + $KP_target_qty_agu + $KP_target_qty_sep + $KP_target_qty_okt + $KP_target_qty_nop + $KP_target_qty_des;?> 
                                <?php $KP_target_val_year = $KP_target_val_jan + $KP_target_val_feb + $KP_target_val_mar + $KP_target_val_apr + $KP_target_val_mei + $KP_target_val_jun + $KP_target_val_jul + $KP_target_val_agu + $KP_target_val_sep + $KP_target_val_okt + $KP_target_val_nop + $KP_target_val_des;?>
                                <?php $KP_idx_qty_year = ($KP_qty_year/($KP_target_qty_year ?: 1))*100;?> 
                                <?php $KP_idx_val_year = ($KP_val_year/($KP_target_val_year ?: 1))*100;?> 
                                <?php $KP_qty_avg = $KP_qty_year/12;?>
                                <?php $KP_val_avg = $KP_val_year/12;?>
                                <?php $KP_target_qty_avg = $KP_target_qty_year/12;?>
                                <?php $KP_target_val_avg = $KP_target_val_year/12;?>
                                <?php $KP_idx_qty_avg = ($KP_qty_avg/($KP_target_qty_avg ?: 1))*100;?>
                                <?php $KP_idx_val_avg = ($KP_val_avg/($KP_target_val_avg ?: 1))*100;?>
                                
                                <tr class="table-warning" style="font-weight:bold">
                                    <td></td>
                                    <td><?= $principal;?></td>
                                    <td><?= $group_sku;?></td>
                                    <td></td>
                                    <td class="text-center">Sub Total <?= $group_sku;?></td>
                                    <td></td>
                                    <td class="text-right"><?= number_format($KP_qty_jan, 0);?></td>
                                    <td class="text-right"><?= number_format($KP_val_jan, 2);?></td>
                                    <td class="text-right"><?= number_format($KP_target_qty_jan, 0);?></td>
                                    <td class="text-right"><?= number_format($KP_target_val_jan, 2);?></td>
                                    <td class="text-right"><?= number_format($KP_idx_qty_jan, 0);?>%</td>
                                    <td class="text-right"><?= number_format($KP_idx_val_jan, 0);?>%</td>
                                    <td class="text-right"><?= number_format($KP_qty_feb, 0);?></td>
                                    <td class="text-right"><?= number_format($KP_val_feb, 2);?></td>
                                    <td class="text-right"><?= number_format($KP_target_qty_feb, 0);?></td>
                                    <td class="text-right"><?= number_format($KP_target_val_feb, 2);?></td>
                                    <td class="text-right"><?= number_format($KP_idx_qty_feb, 0);?>%</td>
                                    <td class="text-right"><?= number_format($KP_idx_val_feb, 0);?>%</td>
                                    <td class="text-right"><?= number_format($KP_qty_mar, 0);?></td>
                                    <td class="text-right"><?= number_format($KP_val_mar, 2);?></td>
                                    <td class="text-right"><?= number_format($KP_target_qty_mar, 0);?></td>
                                    <td class="text-right"><?= number_format($KP_target_val_mar, 2);?></td>
                                    <td class="text-right"><?= number_format($KP_idx_qty_mar, 0);?>%</td>
                                    <td class="text-right"><?= number_format($KP_idx_val_mar, 0);?>%</td>
                                    <td class="text-right"><?= number_format($KP_qty_q1, 0);?></td>
                                    <td class="text-right"><?= number_format($KP_val_q1, 2);?></td>
                                    <td class="text-right"><?= number_format($KP_target_qty_q1, 0);?></td>
                                    <td class="text-right"><?= number_format($KP_target_val_q1, 2);?></td>
                                    <td class="text-right"><?= number_format($KP_idx_qty_q1, 0);?>%</td>
                                    <td class="text-right"><?= number_format($KP_idx_val_q1, 0);?>%</td>

                                    <td class="text-right"><?= number_format($KP_qty_apr, 0);?></td>
                                    <td class="text-right"><?= number_format($KP_val_apr, 2);?></td>
                                    <td class="text-right"><?= number_format($KP_target_qty_apr, 0);?></td>
                                    <td class="text-right"><?= number_format($KP_target_val_apr, 2);?></td>
                                    <td class="text-right"><?= number_format($KP_idx_qty_apr, 0);?>%</td>
                                    <td class="text-right"><?= number_format($KP_idx_val_apr, 0);?>%</td>
                                    <td class="text-right"><?= number_format($KP_qty_mei, 0);?></td>
                                    <td class="text-right"><?= number_format($KP_val_mei, 2);?></td>
                                    <td class="text-right"><?= number_format($KP_target_qty_mei, 0);?></td>
                                    <td class="text-right"><?= number_format($KP_target_val_mei, 2);?></td>
                                    <td class="text-right"><?= number_format($KP_idx_qty_mei, 0);?>%</td>
                                    <td class="text-right"><?= number_format($KP_idx_val_mei, 0);?>%</td>
                                    <td class="text-right"><?= number_format($KP_qty_jun, 0);?></td>
                                    <td class="text-right"><?= number_format($KP_val_jun, 2);?></td>
                                    <td class="text-right"><?= number_format($KP_target_qty_jun, 0);?></td>
                                    <td class="text-right"><?= number_format($KP_target_val_jun, 2);?></td>
                                    <td class="text-right"><?= number_format($KP_idx_qty_jun, 0);?>%</td>
                                    <td class="text-right"><?= number_format($KP_idx_val_jun, 0);?>%</td>
                                    <td class="text-right"><?= number_format($KP_qty_q2, 0);?></td>
                                    <td class="text-right"><?= number_format($KP_val_q2, 2);?></td>
                                    <td class="text-right"><?= number_format($KP_target_qty_q2, 0);?></td>
                                    <td class="text-right"><?= number_format($KP_target_val_q2, 2);?></td>
                                    <td class="text-right"><?= number_format($KP_idx_qty_q2, 0);?>%</td>
                                    <td class="text-right"><?= number_format($KP_idx_val_q2, 0);?>%</td>

                                    <td class="text-right"><?= number_format($KP_qty_jul, 0);?></td>
                                    <td class="text-right"><?= number_format($KP_val_jul, 2);?></td>
                                    <td class="text-right"><?= number_format($KP_target_qty_jul, 0);?></td>
                                    <td class="text-right"><?= number_format($KP_target_val_jul, 2);?></td>
                                    <td class="text-right"><?= number_format($KP_idx_qty_jul, 0);?>%</td>
                                    <td class="text-right"><?= number_format($KP_idx_val_jul, 0);?>%</td>
                                    <td class="text-right"><?= number_format($KP_qty_agu, 0);?></td>
                                    <td class="text-right"><?= number_format($KP_val_agu, 2);?></td>
                                    <td class="text-right"><?= number_format($KP_target_qty_agu, 0);?></td>
                                    <td class="text-right"><?= number_format($KP_target_val_agu, 2);?></td>
                                    <td class="text-right"><?= number_format($KP_idx_qty_agu, 0);?>%</td>
                                    <td class="text-right"><?= number_format($KP_idx_val_agu, 0);?>%</td>
                                    <td class="text-right"><?= number_format($KP_qty_sep, 0);?></td>
                                    <td class="text-right"><?= number_format($KP_val_sep, 2);?></td>
                                    <td class="text-right"><?= number_format($KP_target_qty_sep, 0);?></td>
                                    <td class="text-right"><?= number_format($KP_target_val_sep, 2);?></td>
                                    <td class="text-right"><?= number_format($KP_idx_qty_sep, 0);?>%</td>
                                    <td class="text-right"><?= number_format($KP_idx_val_sep, 0);?>%</td>
                                    <td class="text-right"><?= number_format($KP_qty_q3, 0);?></td>
                                    <td class="text-right"><?= number_format($KP_val_q3, 2);?></td>
                                    <td class="text-right"><?= number_format($KP_target_qty_q3, 0);?></td>
                                    <td class="text-right"><?= number_format($KP_target_val_q3, 2);?></td>
                                    <td class="text-right"><?= number_format($KP_idx_qty_q3, 0);?>%</td>
                                    <td class="text-right"><?= number_format($KP_idx_val_q3, 0);?>%</td>

                                    <td class="text-right"><?= number_format($KP_qty_okt, 0);?></td>
                                    <td class="text-right"><?= number_format($KP_val_okt, 2);?></td>
                                    <td class="text-right"><?= number_format($KP_target_qty_okt, 0);?></td>
                                    <td class="text-right"><?= number_format($KP_target_val_okt, 2);?></td>
                                    <td class="text-right"><?= number_format($KP_idx_qty_okt, 0);?>%</td>
                                    <td class="text-right"><?= number_format($KP_idx_val_okt, 0);?>%</td>
                                    <td class="text-right"><?= number_format($KP_qty_nop, 0);?></td>
                                    <td class="text-right"><?= number_format($KP_val_nop, 2);?></td>
                                    <td class="text-right"><?= number_format($KP_target_qty_nop, 0);?></td>
                                    <td class="text-right"><?= number_format($KP_target_val_nop, 2);?></td>
                                    <td class="text-right"><?= number_format($KP_idx_qty_nop, 0);?>%</td>
                                    <td class="text-right"><?= number_format($KP_idx_val_nop, 0);?>%</td>
                                    <td class="text-right"><?= number_format($KP_qty_des, 0);?></td>
                                    <td class="text-right"><?= number_format($KP_val_des, 2);?></td>
                                    <td class="text-right"><?= number_format($KP_target_qty_des, 0);?></td>
                                    <td class="text-right"><?= number_format($KP_target_val_des, 2);?></td>
                                    <td class="text-right"><?= number_format($KP_idx_qty_des, 0);?>%</td>
                                    <td class="text-right"><?= number_format($KP_idx_val_des, 0);?>%</td>
                                    <td class="text-right"><?= number_format($KP_qty_q4, 0);?></td>
                                    <td class="text-right"><?= number_format($KP_val_q4, 2);?></td>
                                    <td class="text-right"><?= number_format($KP_target_qty_q4, 0);?></td>
                                    <td class="text-right"><?= number_format($KP_target_val_q4, 2);?></td>
                                    <td class="text-right"><?= number_format($KP_idx_qty_q4, 0);?>%</td>
                                    <td class="text-right"><?= number_format($KP_idx_val_q4, 0);?>%</td>

                                    <td class="text-right"><?= number_format($KP_qty_year, 0);?></td>
                                    <td class="text-right"><?= number_format($KP_val_year, 2);?></td>
                                    <td class="text-right"><?= number_format($KP_target_qty_year, 0);?></td>
                                    <td class="text-right"><?= number_format($KP_target_val_year, 2);?></td>
                                    <td class="text-right"><?= number_format($KP_idx_qty_year, 0);?>%</td>
                                    <td class="text-right"><?= number_format($KP_idx_val_year, 0);?>%</td>
                                    <td class="text-right"><?= number_format($KP_qty_avg, 0);?></td>
                                    <td class="text-right"><?= number_format($KP_val_avg, 2);?></td>
                                    <td class="text-right"><?= number_format($KP_target_qty_avg, 0);?></td>
                                    <td class="text-right"><?= number_format($KP_target_val_avg, 2);?></td>
                                    <td class="text-right"><?= number_format($KP_idx_qty_avg, 0);?>%</td>
                                    <td class="text-right"><?= number_format($KP_idx_val_avg, 0);?>%</td>
                                </tr>


                                <!-- TOTAL JORDAN -->
                                <?php
                                    $JORDAN_qty_jan = $AT_qty_jan + $KT_qty_jan + $DF_qty_jan + $ID_qty_jan + $KP_qty_jan;
                                    $JORDAN_qty_feb = $AT_qty_feb + $KT_qty_feb + $DF_qty_feb + $ID_qty_feb + $KP_qty_feb;
                                    $JORDAN_qty_mar = $AT_qty_mar + $KT_qty_mar + $DF_qty_mar + $ID_qty_mar + $KP_qty_mar;
                                    $JORDAN_qty_q1 = $AT_qty_q1 + $KT_qty_q1 + $DF_qty_q1 + $ID_qty_q1 + $KP_qty_q1;
                                    $JORDAN_qty_apr = $AT_qty_apr + $KT_qty_apr + $DF_qty_apr + $ID_qty_apr + $KP_qty_apr;
                                    $JORDAN_qty_mei = $AT_qty_mei + $KT_qty_mei + $DF_qty_mei + $ID_qty_mei + $KP_qty_mei;
                                    $JORDAN_qty_jun = $AT_qty_jun + $KT_qty_jun + $DF_qty_jun + $ID_qty_jun + $KP_qty_jun;
                                    $JORDAN_qty_q2 = $AT_qty_q2 + $KT_qty_q2 + $DF_qty_q2 + $ID_qty_q2 + $KP_qty_q2;
                                    $JORDAN_qty_jul = $AT_qty_jul + $KT_qty_jul + $DF_qty_jul + $ID_qty_jul + $KP_qty_jul;
                                    $JORDAN_qty_agu = $AT_qty_agu + $KT_qty_agu + $DF_qty_agu + $ID_qty_agu + $KP_qty_agu;
                                    $JORDAN_qty_sep = $AT_qty_sep + $KT_qty_sep + $DF_qty_sep + $ID_qty_sep + $KP_qty_sep;
                                    $JORDAN_qty_q3 = $AT_qty_q3 + $KT_qty_q3 + $DF_qty_q3 + $ID_qty_q3 + $KP_qty_q3;
                                    $JORDAN_qty_okt = $AT_qty_okt + $KT_qty_okt + $DF_qty_okt + $ID_qty_okt + $KP_qty_okt;
                                    $JORDAN_qty_nop = $AT_qty_nop + $KT_qty_nop + $DF_qty_nop + $ID_qty_nop + $KP_qty_nop;
                                    $JORDAN_qty_des = $AT_qty_des + $KT_qty_des + $DF_qty_des + $ID_qty_des + $KP_qty_des;
                                    $JORDAN_qty_q4 = $AT_qty_q4 + $KT_qty_q4 + $DF_qty_q4 + $ID_qty_q4 + $KP_qty_q4;

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

                                    $JORDAN_target_qty_jan = $AT_target_qty_jan + $KT_target_qty_jan + $DF_target_qty_jan + $ID_target_qty_jan + $KP_target_qty_jan;
                                    $JORDAN_target_qty_feb = $AT_target_qty_feb + $KT_target_qty_feb + $DF_target_qty_feb + $ID_target_qty_feb + $KP_target_qty_feb;
                                    $JORDAN_target_qty_mar = $AT_target_qty_mar + $KT_target_qty_mar + $DF_target_qty_mar + $ID_target_qty_mar + $KP_target_qty_mar;
                                    $JORDAN_target_qty_q1 = $AT_target_qty_q1 + $KT_target_qty_q1 + $DF_target_qty_q1 + $ID_target_qty_q1 + $KP_target_qty_q1;
                                    $JORDAN_target_qty_apr = $AT_target_qty_apr + $KT_target_qty_apr + $DF_target_qty_apr + $ID_target_qty_apr + $KP_target_qty_apr;
                                    $JORDAN_target_qty_mei = $AT_target_qty_mei + $KT_target_qty_mei + $DF_target_qty_mei + $ID_target_qty_mei + $KP_target_qty_mei;
                                    $JORDAN_target_qty_jun = $AT_target_qty_jun + $KT_target_qty_jun + $DF_target_qty_jun + $ID_target_qty_jun + $KP_target_qty_jun;
                                    $JORDAN_target_qty_q2 = $AT_target_qty_q2 + $KT_target_qty_q2 + $DF_target_qty_q2 + $ID_target_qty_q2 + $KP_target_qty_q2;
                                    $JORDAN_target_qty_jul = $AT_target_qty_jul + $KT_target_qty_jul + $DF_target_qty_jul + $ID_target_qty_jul + $KP_target_qty_jul;
                                    $JORDAN_target_qty_agu = $AT_target_qty_agu + $KT_target_qty_agu + $DF_target_qty_agu + $ID_target_qty_agu + $KP_target_qty_agu;
                                    $JORDAN_target_qty_sep = $AT_target_qty_sep + $KT_target_qty_sep + $DF_target_qty_sep + $ID_target_qty_sep + $KP_target_qty_sep;
                                    $JORDAN_target_qty_q3 = $AT_target_qty_q3 + $KT_target_qty_q3 + $DF_target_qty_q3 + $ID_target_qty_q3 + $KP_target_qty_q3;
                                    $JORDAN_target_qty_okt = $AT_target_qty_okt + $KT_target_qty_okt + $DF_target_qty_okt + $ID_target_qty_okt + $KP_target_qty_okt;
                                    $JORDAN_target_qty_nop = $AT_target_qty_nop + $KT_target_qty_nop + $DF_target_qty_nop + $ID_target_qty_nop + $KP_target_qty_nop;
                                    $JORDAN_target_qty_des = $AT_target_qty_des + $KT_target_qty_des + $DF_target_qty_des + $ID_target_qty_des + $KP_target_qty_des;
                                    $JORDAN_target_qty_q4 = $AT_target_qty_q4 + $KT_target_qty_q4 + $DF_target_qty_q4 + $ID_target_qty_q4 + $KP_target_qty_q4;

                                    $JORDAN_target_val_jan = $AT_target_val_jan + $KT_target_val_jan + $DF_target_val_jan + $ID_target_val_jan + $KP_target_val_jan;
                                    $JORDAN_target_val_feb = $AT_target_val_feb + $KT_target_val_feb + $DF_target_val_feb + $ID_target_val_feb + $KP_target_val_feb;
                                    $JORDAN_target_val_mar = $AT_target_val_mar + $KT_target_val_mar + $DF_target_val_mar + $ID_target_val_mar + $KP_target_val_mar;
                                    $JORDAN_target_val_q1 = $AT_target_val_q1 + $KT_target_val_q1 + $DF_target_val_q1 + $ID_target_val_q1 + $KP_target_val_q1;
                                    $JORDAN_target_val_apr = $AT_target_val_apr + $KT_target_val_apr + $DF_target_val_apr + $ID_target_val_apr + $KP_target_val_apr;
                                    $JORDAN_target_val_mei = $AT_target_val_mei + $KT_target_val_mei + $DF_target_val_mei + $ID_target_val_mei + $KP_target_val_mei;
                                    $JORDAN_target_val_jun = $AT_target_val_jun + $KT_target_val_jun + $DF_target_val_jun + $ID_target_val_jun + $KP_target_val_jun;
                                    $JORDAN_target_val_q2 = $AT_target_val_q2 + $KT_target_val_q2 + $DF_target_val_q2 + $ID_target_val_q2 + $KP_target_val_q2;
                                    $JORDAN_target_val_jul = $AT_target_val_jul + $KT_target_val_jul + $DF_target_val_jul + $ID_target_val_jul + $KP_target_val_jul;
                                    $JORDAN_target_val_agu = $AT_target_val_agu + $KT_target_val_agu + $DF_target_val_agu + $ID_target_val_agu + $KP_target_val_agu;
                                    $JORDAN_target_val_sep = $AT_target_val_sep + $KT_target_val_sep + $DF_target_val_sep + $ID_target_val_sep + $KP_target_val_sep;
                                    $JORDAN_target_val_q3 = $AT_target_val_q3 + $KT_target_val_q3 + $DF_target_val_q3 + $ID_target_val_q3 + $KP_target_val_q3;
                                    $JORDAN_target_val_okt = $AT_target_val_okt + $KT_target_val_okt + $DF_target_val_okt + $ID_target_val_okt + $KP_target_val_okt;
                                    $JORDAN_target_val_nop = $AT_target_val_nop + $KT_target_val_nop + $DF_target_val_nop + $ID_target_val_nop + $KP_target_val_nop;
                                    $JORDAN_target_val_des = $AT_target_val_des + $KT_target_val_des + $DF_target_val_des + $ID_target_val_des + $KP_target_val_des;
                                    $JORDAN_target_val_q4 = $AT_target_val_q4 + $KT_target_val_q4 + $DF_target_val_q4 + $ID_target_val_q4 + $KP_target_val_q4;

                                    $JORDAN_idx_qty_jan = ($JORDAN_qty_jan/($JORDAN_target_qty_jan ?: 1))*100;
                                    $JORDAN_idx_qty_feb = ($JORDAN_qty_feb/($JORDAN_target_qty_feb ?: 1))*100;
                                    $JORDAN_idx_qty_mar = ($JORDAN_qty_mar/($JORDAN_target_qty_mar ?: 1))*100;
                                    $JORDAN_idx_qty_q1 = ($JORDAN_qty_q1/($JORDAN_target_qty_q1 ?: 1))*100;
                                    $JORDAN_idx_qty_apr = ($JORDAN_qty_apr/($JORDAN_target_qty_apr ?: 1))*100;
                                    $JORDAN_idx_qty_mei = ($JORDAN_qty_mei/($JORDAN_target_qty_mei ?: 1))*100;
                                    $JORDAN_idx_qty_jun = ($JORDAN_qty_jun/($JORDAN_target_qty_jun ?: 1))*100;
                                    $JORDAN_idx_qty_q2 = ($JORDAN_qty_q2/($JORDAN_target_qty_q2 ?: 1))*100;
                                    $JORDAN_idx_qty_jul = ($JORDAN_qty_jul/($JORDAN_target_qty_jul ?: 1))*100;
                                    $JORDAN_idx_qty_agu = ($JORDAN_qty_agu/($JORDAN_target_qty_agu ?: 1))*100;
                                    $JORDAN_idx_qty_sep = ($JORDAN_qty_sep/($JORDAN_target_qty_sep ?: 1))*100;
                                    $JORDAN_idx_qty_q3 = ($JORDAN_qty_q3/($JORDAN_target_qty_q3 ?: 1))*100;
                                    $JORDAN_idx_qty_okt = ($JORDAN_qty_okt/($JORDAN_target_qty_okt ?: 1))*100;
                                    $JORDAN_idx_qty_nop = ($JORDAN_qty_nop/($JORDAN_target_qty_nop ?: 1))*100;
                                    $JORDAN_idx_qty_des = ($JORDAN_qty_des/($JORDAN_target_qty_des ?: 1))*100;
                                    $JORDAN_idx_qty_q4 = ($JORDAN_qty_q4/($JORDAN_target_qty_q4 ?: 1))*100;

                                    $JORDAN_idx_val_jan = ($JORDAN_val_jan/($JORDAN_target_val_jan ?: 1))*100;
                                    $JORDAN_idx_val_feb = ($JORDAN_val_feb/($JORDAN_target_val_feb ?: 1))*100;
                                    $JORDAN_idx_val_mar = ($JORDAN_val_mar/($JORDAN_target_val_mar ?: 1))*100;
                                    $JORDAN_idx_val_q1 = ($JORDAN_val_q1/($JORDAN_target_val_q1 ?: 1))*100;
                                    $JORDAN_idx_val_apr = ($JORDAN_val_apr/($JORDAN_target_val_apr ?: 1))*100;
                                    $JORDAN_idx_val_mei = ($JORDAN_val_mei/($JORDAN_target_val_mei ?: 1))*100;
                                    $JORDAN_idx_val_jun = ($JORDAN_val_jun/($JORDAN_target_val_jun ?: 1))*100;
                                    $JORDAN_idx_val_q2 = ($JORDAN_val_q2/($JORDAN_target_val_q2 ?: 1))*100;
                                    $JORDAN_idx_val_jul = ($JORDAN_val_jul/($JORDAN_target_val_jul ?: 1))*100;
                                    $JORDAN_idx_val_agu = ($JORDAN_val_agu/($JORDAN_target_val_agu ?: 1))*100;
                                    $JORDAN_idx_val_sep = ($JORDAN_val_sep/($JORDAN_target_val_sep ?: 1))*100;
                                    $JORDAN_idx_val_q3 = ($JORDAN_val_q3/($JORDAN_target_val_q3 ?: 1))*100;
                                    $JORDAN_idx_val_okt = ($JORDAN_val_okt/($JORDAN_target_val_okt ?: 1))*100;
                                    $JORDAN_idx_val_nop = ($JORDAN_val_nop/($JORDAN_target_val_nop ?: 1))*100;
                                    $JORDAN_idx_val_des = ($JORDAN_val_des/($JORDAN_target_val_des ?: 1))*100;
                                    $JORDAN_idx_val_q4 = ($JORDAN_val_q4/($JORDAN_target_val_q4 ?: 1))*100;

                                    $JORDAN_qty_year = $JORDAN_qty_jan + $JORDAN_qty_feb + $JORDAN_qty_mar + $JORDAN_qty_apr + $JORDAN_qty_mei + $JORDAN_qty_jun + $JORDAN_qty_jul + $JORDAN_qty_agu + $JORDAN_qty_sep + $JORDAN_qty_okt + $JORDAN_qty_nop + $JORDAN_qty_des;
                                    $JORDAN_val_year = $JORDAN_val_jan + $JORDAN_val_feb + $JORDAN_val_mar + $JORDAN_val_apr + $JORDAN_val_mei + $JORDAN_val_jun + $JORDAN_val_jul + $JORDAN_val_agu + $JORDAN_val_sep + $JORDAN_val_okt + $JORDAN_val_nop + $JORDAN_val_des;
                                    $JORDAN_qty_avg = $JORDAN_qty_year / 12;
                                    $JORDAN_val_avg = $JORDAN_val_year / 12;

                                    $JORDAN_target_qty_year = $JORDAN_target_qty_jan + $JORDAN_target_qty_feb + $JORDAN_target_qty_mar + $JORDAN_target_qty_apr + $JORDAN_target_qty_mei + $JORDAN_target_qty_jun + $JORDAN_target_qty_jul + $JORDAN_target_qty_agu + $JORDAN_target_qty_sep + $JORDAN_target_qty_okt + $JORDAN_target_qty_nop + $JORDAN_target_qty_des;
                                    $JORDAN_target_val_year = $JORDAN_target_val_jan + $JORDAN_target_val_feb + $JORDAN_target_val_mar + $JORDAN_target_val_apr + $JORDAN_target_val_mei + $JORDAN_target_val_jun + $JORDAN_target_val_jul + $JORDAN_target_val_agu + $JORDAN_target_val_sep + $JORDAN_target_val_okt + $JORDAN_target_val_nop + $JORDAN_target_val_des;
                                    $JORDAN_target_qty_avg = $JORDAN_target_qty_year / 12;
                                    $JORDAN_target_val_avg = $JORDAN_target_val_year / 12;

                                    $JORDAN_idx_qty_year = ($JORDAN_qty_year/($JORDAN_target_qty_year ?: 1))*100;
                                    $JORDAN_idx_val_year = ($JORDAN_val_year/($JORDAN_target_val_year ?: 1))*100;
                                    $JORDAN_idx_qty_avg = ($JORDAN_qty_avg/($JORDAN_target_qty_avg ?: 1))*100;
                                    $JORDAN_idx_val_avg = ($JORDAN_val_avg/($JORDAN_target_val_avg ?: 1))*100;

                                ?>

                                <tr class="table-danger" style="font-weight:bold">
                                    <td></td>
                                    <td>JORDAN</td>
                                    <td></td>
                                    <td></td>
                                    <td class="text-center">TOTAL JORDAN</td>
                                    <td></td>
                                    <td class="text-right"><?= number_format($JORDAN_qty_jan, 0);?></td>
                                    <td class="text-right"><?= number_format($JORDAN_val_jan, 2);?></td>
                                    <td class="text-right"><?= number_format($JORDAN_target_qty_jan, 0);?></td>
                                    <td class="text-right"><?= number_format($JORDAN_target_val_jan, 2);?></td>
                                    <td class="text-right"><?= number_format($JORDAN_idx_qty_jan, 0);?>%</td>
                                    <td class="text-right"><?= number_format($JORDAN_idx_val_jan, 0);?>%</td>
                                    <td class="text-right"><?= number_format($JORDAN_qty_feb, 0);?></td>
                                    <td class="text-right"><?= number_format($JORDAN_val_feb, 2);?></td>
                                    <td class="text-right"><?= number_format($JORDAN_target_qty_feb, 0);?></td>
                                    <td class="text-right"><?= number_format($JORDAN_target_val_feb, 2);?></td>
                                    <td class="text-right"><?= number_format($JORDAN_idx_qty_feb, 0);?>%</td>
                                    <td class="text-right"><?= number_format($JORDAN_idx_val_feb, 0);?>%</td>
                                    <td class="text-right"><?= number_format($JORDAN_qty_mar, 0);?></td>
                                    <td class="text-right"><?= number_format($JORDAN_val_mar, 2);?></td>
                                    <td class="text-right"><?= number_format($JORDAN_target_qty_mar, 0);?></td>
                                    <td class="text-right"><?= number_format($JORDAN_target_val_mar, 2);?></td>
                                    <td class="text-right"><?= number_format($JORDAN_idx_qty_mar, 0);?>%</td>
                                    <td class="text-right"><?= number_format($JORDAN_idx_val_mar, 0);?>%</td>
                                    <td class="text-right"><?= number_format($JORDAN_qty_q1, 0);?></td>
                                    <td class="text-right"><?= number_format($JORDAN_val_q1, 2);?></td>
                                    <td class="text-right"><?= number_format($JORDAN_target_qty_q1, 0);?></td>
                                    <td class="text-right"><?= number_format($JORDAN_target_val_q1, 2);?></td>
                                    <td class="text-right"><?= number_format($JORDAN_idx_qty_q1, 0);?>%</td>
                                    <td class="text-right"><?= number_format($JORDAN_idx_val_q1, 0);?>%</td>

                                    <td class="text-right"><?= number_format($JORDAN_qty_apr, 0);?></td>
                                    <td class="text-right"><?= number_format($JORDAN_val_apr, 2);?></td>
                                    <td class="text-right"><?= number_format($JORDAN_target_qty_apr, 0);?></td>
                                    <td class="text-right"><?= number_format($JORDAN_target_val_apr, 2);?></td>
                                    <td class="text-right"><?= number_format($JORDAN_idx_qty_apr, 0);?>%</td>
                                    <td class="text-right"><?= number_format($JORDAN_idx_val_apr, 0);?>%</td>
                                    <td class="text-right"><?= number_format($JORDAN_qty_mei, 0);?></td>
                                    <td class="text-right"><?= number_format($JORDAN_val_mei, 2);?></td>
                                    <td class="text-right"><?= number_format($JORDAN_target_qty_mei, 0);?></td>
                                    <td class="text-right"><?= number_format($JORDAN_target_val_mei, 2);?></td>
                                    <td class="text-right"><?= number_format($JORDAN_idx_qty_mei, 0);?>%</td>
                                    <td class="text-right"><?= number_format($JORDAN_idx_val_mei, 0);?>%</td>
                                    <td class="text-right"><?= number_format($JORDAN_qty_jun, 0);?></td>
                                    <td class="text-right"><?= number_format($JORDAN_val_jun, 2);?></td>
                                    <td class="text-right"><?= number_format($JORDAN_target_qty_jun, 0);?></td>
                                    <td class="text-right"><?= number_format($JORDAN_target_val_jun, 2);?></td>
                                    <td class="text-right"><?= number_format($JORDAN_idx_qty_jun, 0);?>%</td>
                                    <td class="text-right"><?= number_format($JORDAN_idx_val_jun, 0);?>%</td>
                                    <td class="text-right"><?= number_format($JORDAN_qty_q2, 0);?></td>
                                    <td class="text-right"><?= number_format($JORDAN_val_q2, 2);?></td>
                                    <td class="text-right"><?= number_format($JORDAN_target_qty_q2, 0);?></td>
                                    <td class="text-right"><?= number_format($JORDAN_target_val_q2, 2);?></td>
                                    <td class="text-right"><?= number_format($JORDAN_idx_qty_q2, 0);?>%</td>
                                    <td class="text-right"><?= number_format($JORDAN_idx_val_q2, 0);?>%</td>

                                    <td class="text-right"><?= number_format($JORDAN_qty_jul, 0);?></td>
                                    <td class="text-right"><?= number_format($JORDAN_val_jul, 2);?></td>
                                    <td class="text-right"><?= number_format($JORDAN_target_qty_jul, 0);?></td>
                                    <td class="text-right"><?= number_format($JORDAN_target_val_jul, 2);?></td>
                                    <td class="text-right"><?= number_format($JORDAN_idx_qty_jul, 0);?>%</td>
                                    <td class="text-right"><?= number_format($JORDAN_idx_val_jul, 0);?>%</td>
                                    <td class="text-right"><?= number_format($JORDAN_qty_agu, 0);?></td>
                                    <td class="text-right"><?= number_format($JORDAN_val_agu, 2);?></td>
                                    <td class="text-right"><?= number_format($JORDAN_target_qty_agu, 0);?></td>
                                    <td class="text-right"><?= number_format($JORDAN_target_val_agu, 2);?></td>
                                    <td class="text-right"><?= number_format($JORDAN_idx_qty_agu, 0);?>%</td>
                                    <td class="text-right"><?= number_format($JORDAN_idx_val_agu, 0);?>%</td>
                                    <td class="text-right"><?= number_format($JORDAN_qty_sep, 0);?></td>
                                    <td class="text-right"><?= number_format($JORDAN_val_sep, 2);?></td>
                                    <td class="text-right"><?= number_format($JORDAN_target_qty_sep, 0);?></td>
                                    <td class="text-right"><?= number_format($JORDAN_target_val_sep, 2);?></td>
                                    <td class="text-right"><?= number_format($JORDAN_idx_qty_sep, 0);?>%</td>
                                    <td class="text-right"><?= number_format($JORDAN_idx_val_sep, 0);?>%</td>
                                    <td class="text-right"><?= number_format($JORDAN_qty_q3, 0);?></td>
                                    <td class="text-right"><?= number_format($JORDAN_val_q3, 2);?></td>
                                    <td class="text-right"><?= number_format($JORDAN_target_qty_q3, 0);?></td>
                                    <td class="text-right"><?= number_format($JORDAN_target_val_q3, 2);?></td>
                                    <td class="text-right"><?= number_format($JORDAN_idx_qty_q3, 0);?>%</td>
                                    <td class="text-right"><?= number_format($JORDAN_idx_val_q3, 0);?>%</td>

                                    <td class="text-right"><?= number_format($JORDAN_qty_okt, 0);?></td>
                                    <td class="text-right"><?= number_format($JORDAN_val_okt, 2);?></td>
                                    <td class="text-right"><?= number_format($JORDAN_target_qty_okt, 0);?></td>
                                    <td class="text-right"><?= number_format($JORDAN_target_val_okt, 2);?></td>
                                    <td class="text-right"><?= number_format($JORDAN_idx_qty_okt, 0);?>%</td>
                                    <td class="text-right"><?= number_format($JORDAN_idx_val_okt, 0);?>%</td>
                                    <td class="text-right"><?= number_format($JORDAN_qty_nop, 0);?></td>
                                    <td class="text-right"><?= number_format($JORDAN_val_nop, 2);?></td>
                                    <td class="text-right"><?= number_format($JORDAN_target_qty_nop, 0);?></td>
                                    <td class="text-right"><?= number_format($JORDAN_target_val_nop, 2);?></td>
                                    <td class="text-right"><?= number_format($JORDAN_idx_qty_nop, 0);?>%</td>
                                    <td class="text-right"><?= number_format($JORDAN_idx_val_nop, 0);?>%</td>
                                    <td class="text-right"><?= number_format($JORDAN_qty_des, 0);?></td>
                                    <td class="text-right"><?= number_format($JORDAN_val_des, 2);?></td>
                                    <td class="text-right"><?= number_format($JORDAN_target_qty_des, 0);?></td>
                                    <td class="text-right"><?= number_format($JORDAN_target_val_des, 2);?></td>
                                    <td class="text-right"><?= number_format($JORDAN_idx_qty_des, 0);?>%</td>
                                    <td class="text-right"><?= number_format($JORDAN_idx_val_des, 0);?>%</td>
                                    <td class="text-right"><?= number_format($JORDAN_qty_q4, 0);?></td>
                                    <td class="text-right"><?= number_format($JORDAN_val_q4, 2);?></td>
                                    <td class="text-right"><?= number_format($JORDAN_target_qty_q4, 0);?></td>
                                    <td class="text-right"><?= number_format($JORDAN_target_val_q4, 2);?></td>
                                    <td class="text-right"><?= number_format($JORDAN_idx_qty_q4, 0);?>%</td>
                                    <td class="text-right"><?= number_format($JORDAN_idx_val_q4, 0);?>%</td>

                                    <td class="text-right"><?= number_format($JORDAN_qty_year, 0);?></td>
                                    <td class="text-right"><?= number_format($JORDAN_val_year, 2);?></td>
                                    <td class="text-right"><?= number_format($JORDAN_target_qty_year, 0);?></td>
                                    <td class="text-right"><?= number_format($JORDAN_target_val_year, 2);?></td>
                                    <td class="text-right"><?= number_format($JORDAN_idx_qty_year, 0);?>%</td>
                                    <td class="text-right"><?= number_format($JORDAN_idx_val_year, 0);?>%</td>
                                    <td class="text-right"><?= number_format($JORDAN_qty_avg, 0);?></td>
                                    <td class="text-right"><?= number_format($JORDAN_val_avg, 2);?></td>
                                    <td class="text-right"><?= number_format($JORDAN_target_qty_avg, 0);?></td>
                                    <td class="text-right"><?= number_format($JORDAN_target_val_avg, 2);?></td>
                                    <td class="text-right"><?= number_format($JORDAN_idx_qty_avg, 0);?>%</td>
                                    <td class="text-right"><?= number_format($JORDAN_idx_val_avg, 0);?>%</td>
                                </tr>



                                <!-- GRAND TOTAL -->
                                <?php
                                    $GRANDTOTAL_qty_jan = $LORD_qty_jan + $JORDAN_qty_jan;
                                    $GRANDTOTAL_qty_feb = $LORD_qty_feb + $JORDAN_qty_feb;
                                    $GRANDTOTAL_qty_mar = $LORD_qty_mar + $JORDAN_qty_mar;
                                    $GRANDTOTAL_qty_q1 = $LORD_qty_q1 + $JORDAN_qty_q1;
                                    $GRANDTOTAL_qty_apr = $LORD_qty_apr + $JORDAN_qty_apr;
                                    $GRANDTOTAL_qty_mei = $LORD_qty_mei + $JORDAN_qty_mei;
                                    $GRANDTOTAL_qty_jun = $LORD_qty_jun + $JORDAN_qty_jun;
                                    $GRANDTOTAL_qty_q2 = $LORD_qty_q2 + $JORDAN_qty_q2;
                                    $GRANDTOTAL_qty_jul = $LORD_qty_jul + $JORDAN_qty_jul;
                                    $GRANDTOTAL_qty_agu = $LORD_qty_agu + $JORDAN_qty_agu;
                                    $GRANDTOTAL_qty_sep = $LORD_qty_sep + $JORDAN_qty_sep;
                                    $GRANDTOTAL_qty_q3 = $LORD_qty_q3 + $JORDAN_qty_q3;
                                    $GRANDTOTAL_qty_okt = $LORD_qty_okt + $JORDAN_qty_okt;
                                    $GRANDTOTAL_qty_nop = $LORD_qty_nop + $JORDAN_qty_nop;
                                    $GRANDTOTAL_qty_des = $LORD_qty_des + $JORDAN_qty_des;
                                    $GRANDTOTAL_qty_q4 = $LORD_qty_q4 + $JORDAN_qty_q4;

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

                                    $GRANDTOTAL_target_qty_jan = $LORD_target_qty_jan + $JORDAN_target_qty_jan;
                                    $GRANDTOTAL_target_qty_feb = $LORD_target_qty_feb + $JORDAN_target_qty_feb;
                                    $GRANDTOTAL_target_qty_mar = $LORD_target_qty_mar + $JORDAN_target_qty_mar;
                                    $GRANDTOTAL_target_qty_q1 = $LORD_target_qty_q1 + $JORDAN_target_qty_q1;
                                    $GRANDTOTAL_target_qty_apr = $LORD_target_qty_apr + $JORDAN_target_qty_apr;
                                    $GRANDTOTAL_target_qty_mei = $LORD_target_qty_mei + $JORDAN_target_qty_mei;
                                    $GRANDTOTAL_target_qty_jun = $LORD_target_qty_jun + $JORDAN_target_qty_jun;
                                    $GRANDTOTAL_target_qty_q2 = $LORD_target_qty_q2 + $JORDAN_target_qty_q2;
                                    $GRANDTOTAL_target_qty_jul = $LORD_target_qty_jul + $JORDAN_target_qty_jul;
                                    $GRANDTOTAL_target_qty_agu = $LORD_target_qty_agu + $JORDAN_target_qty_agu;
                                    $GRANDTOTAL_target_qty_sep = $LORD_target_qty_sep + $JORDAN_target_qty_sep;
                                    $GRANDTOTAL_target_qty_q3 = $LORD_target_qty_q3 + $JORDAN_target_qty_q3;
                                    $GRANDTOTAL_target_qty_okt = $LORD_target_qty_okt + $JORDAN_target_qty_okt;
                                    $GRANDTOTAL_target_qty_nop = $LORD_target_qty_nop + $JORDAN_target_qty_nop;
                                    $GRANDTOTAL_target_qty_des = $LORD_target_qty_des + $JORDAN_target_qty_des;
                                    $GRANDTOTAL_target_qty_q4 = $LORD_target_qty_q4 + $JORDAN_target_qty_q4;

                                    $GRANDTOTAL_target_val_jan = $LORD_target_val_jan + $JORDAN_target_val_jan;
                                    $GRANDTOTAL_target_val_feb = $LORD_target_val_feb + $JORDAN_target_val_feb;
                                    $GRANDTOTAL_target_val_mar = $LORD_target_val_mar + $JORDAN_target_val_mar;
                                    $GRANDTOTAL_target_val_q1 = $LORD_target_val_q1 + $JORDAN_target_val_q1;
                                    $GRANDTOTAL_target_val_apr = $LORD_target_val_apr + $JORDAN_target_val_apr;
                                    $GRANDTOTAL_target_val_mei = $LORD_target_val_mei + $JORDAN_target_val_mei;
                                    $GRANDTOTAL_target_val_jun = $LORD_target_val_jun + $JORDAN_target_val_jun;
                                    $GRANDTOTAL_target_val_q2 = $LORD_target_val_q2 + $JORDAN_target_val_q2;
                                    $GRANDTOTAL_target_val_jul = $LORD_target_val_jul + $JORDAN_target_val_jul;
                                    $GRANDTOTAL_target_val_agu = $LORD_target_val_agu + $JORDAN_target_val_agu;
                                    $GRANDTOTAL_target_val_sep = $LORD_target_val_sep + $JORDAN_target_val_sep;
                                    $GRANDTOTAL_target_val_q3 = $LORD_target_val_q3 + $JORDAN_target_val_q3;
                                    $GRANDTOTAL_target_val_okt = $LORD_target_val_okt + $JORDAN_target_val_okt;
                                    $GRANDTOTAL_target_val_nop = $LORD_target_val_nop + $JORDAN_target_val_nop;
                                    $GRANDTOTAL_target_val_des = $LORD_target_val_des + $JORDAN_target_val_des;
                                    $GRANDTOTAL_target_val_q4 = $LORD_target_val_q4 + $JORDAN_target_val_q4;

                                    $GRANDTOTAL_idx_qty_jan = ($GRANDTOTAL_qty_jan/($GRANDTOTAL_target_qty_jan ?: 1))*100;
                                    $GRANDTOTAL_idx_qty_feb = ($GRANDTOTAL_qty_feb/($GRANDTOTAL_target_qty_feb ?: 1))*100;
                                    $GRANDTOTAL_idx_qty_mar = ($GRANDTOTAL_qty_mar/($GRANDTOTAL_target_qty_mar ?: 1))*100;
                                    $GRANDTOTAL_idx_qty_q1 = ($GRANDTOTAL_qty_q1/($GRANDTOTAL_target_qty_q1 ?: 1))*100;
                                    $GRANDTOTAL_idx_qty_apr = ($GRANDTOTAL_qty_apr/($GRANDTOTAL_target_qty_apr ?: 1))*100;
                                    $GRANDTOTAL_idx_qty_mei = ($GRANDTOTAL_qty_mei/($GRANDTOTAL_target_qty_mei ?: 1))*100;
                                    $GRANDTOTAL_idx_qty_jun = ($GRANDTOTAL_qty_jun/($GRANDTOTAL_target_qty_jun ?: 1))*100;
                                    $GRANDTOTAL_idx_qty_q2 = ($GRANDTOTAL_qty_q2/($GRANDTOTAL_target_qty_q2 ?: 1))*100;
                                    $GRANDTOTAL_idx_qty_jul = ($GRANDTOTAL_qty_jul/($GRANDTOTAL_target_qty_jul ?: 1))*100;
                                    $GRANDTOTAL_idx_qty_agu = ($GRANDTOTAL_qty_agu/($GRANDTOTAL_target_qty_agu ?: 1))*100;
                                    $GRANDTOTAL_idx_qty_sep = ($GRANDTOTAL_qty_sep/($GRANDTOTAL_target_qty_sep ?: 1))*100;
                                    $GRANDTOTAL_idx_qty_q3 = ($GRANDTOTAL_qty_q3/($GRANDTOTAL_target_qty_q3 ?: 1))*100;
                                    $GRANDTOTAL_idx_qty_okt = ($GRANDTOTAL_qty_okt/($GRANDTOTAL_target_qty_okt ?: 1))*100;
                                    $GRANDTOTAL_idx_qty_nop = ($GRANDTOTAL_qty_nop/($GRANDTOTAL_target_qty_nop ?: 1))*100;
                                    $GRANDTOTAL_idx_qty_des = ($GRANDTOTAL_qty_des/($GRANDTOTAL_target_qty_des ?: 1))*100;
                                    $GRANDTOTAL_idx_qty_q4 = ($GRANDTOTAL_qty_q4/($GRANDTOTAL_target_qty_q4 ?: 1))*100;

                                    $GRANDTOTAL_idx_val_jan = ($GRANDTOTAL_val_jan/($GRANDTOTAL_target_val_jan ?: 1))*100;
                                    $GRANDTOTAL_idx_val_feb = ($GRANDTOTAL_val_feb/($GRANDTOTAL_target_val_feb ?: 1))*100;
                                    $GRANDTOTAL_idx_val_mar = ($GRANDTOTAL_val_mar/($GRANDTOTAL_target_val_mar ?: 1))*100;
                                    $GRANDTOTAL_idx_val_q1 = ($GRANDTOTAL_val_q1/($GRANDTOTAL_target_val_q1 ?: 1))*100;
                                    $GRANDTOTAL_idx_val_apr = ($GRANDTOTAL_val_apr/($GRANDTOTAL_target_val_apr ?: 1))*100;
                                    $GRANDTOTAL_idx_val_mei = ($GRANDTOTAL_val_mei/($GRANDTOTAL_target_val_mei ?: 1))*100;
                                    $GRANDTOTAL_idx_val_jun = ($GRANDTOTAL_val_jun/($GRANDTOTAL_target_val_jun ?: 1))*100;
                                    $GRANDTOTAL_idx_val_q2 = ($GRANDTOTAL_val_q2/($GRANDTOTAL_target_val_q2 ?: 1))*100;
                                    $GRANDTOTAL_idx_val_jul = ($GRANDTOTAL_val_jul/($GRANDTOTAL_target_val_jul ?: 1))*100;
                                    $GRANDTOTAL_idx_val_agu = ($GRANDTOTAL_val_agu/($GRANDTOTAL_target_val_agu ?: 1))*100;
                                    $GRANDTOTAL_idx_val_sep = ($GRANDTOTAL_val_sep/($GRANDTOTAL_target_val_sep ?: 1))*100;
                                    $GRANDTOTAL_idx_val_q3 = ($GRANDTOTAL_val_q3/($GRANDTOTAL_target_val_q3 ?: 1))*100;
                                    $GRANDTOTAL_idx_val_okt = ($GRANDTOTAL_val_okt/($GRANDTOTAL_target_val_okt ?: 1))*100;
                                    $GRANDTOTAL_idx_val_nop = ($GRANDTOTAL_val_nop/($GRANDTOTAL_target_val_nop ?: 1))*100;
                                    $GRANDTOTAL_idx_val_des = ($GRANDTOTAL_val_des/($GRANDTOTAL_target_val_des ?: 1))*100;
                                    $GRANDTOTAL_idx_val_q4 = ($GRANDTOTAL_val_q4/($GRANDTOTAL_target_val_q4 ?: 1))*100;

                                    $GRANDTOTAL_qty_year = $LORD_qty_year + $JORDAN_qty_year;
                                    $GRANDTOTAL_val_year = $LORD_val_year + $JORDAN_val_year;
                                    $GRANDTOTAL_qty_avg = $LORD_qty_avg + $JORDAN_qty_avg;
                                    $GRANDTOTAL_val_avg = $LORD_val_avg + $JORDAN_val_avg;

                                    $GRANDTOTAL_target_qty_year = $LORD_target_qty_year + $JORDAN_target_qty_year;
                                    $GRANDTOTAL_target_val_year = $LORD_target_val_year + $JORDAN_target_val_year;
                                    $GRANDTOTAL_target_qty_avg = $LORD_target_qty_avg + $JORDAN_target_qty_avg;
                                    $GRANDTOTAL_target_val_avg = $LORD_target_val_avg + $JORDAN_target_val_avg;

                                    $GRANDTOTAL_idx_qty_year = ($GRANDTOTAL_qty_year/($GRANDTOTAL_target_qty_year ?: 1))*100;
                                    $GRANDTOTAL_idx_val_year = ($GRANDTOTAL_val_year/($GRANDTOTAL_target_val_year ?: 1))*100;
                                    $GRANDTOTAL_idx_qty_avg = ($GRANDTOTAL_qty_avg/($GRANDTOTAL_target_qty_avg ?: 1))*100;
                                    $GRANDTOTAL_idx_val_avg = ($GRANDTOTAL_val_avg/($GRANDTOTAL_target_val_avg ?: 1))*100;
                                ?>

                                <tr class="table-danger" style="font-weight:bold">
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td class="text-center">Grand Total LORD + JORDAN</td>
                                    <td></td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_qty_jan, 0);?></td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_val_jan, 2);?></td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_target_qty_jan, 0);?></td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_target_val_jan, 2);?></td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_idx_qty_jan, 0);?>%</td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_idx_val_jan, 0);?>%</td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_qty_feb, 0);?></td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_val_feb, 2);?></td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_target_qty_feb, 0);?></td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_target_val_feb, 2);?></td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_idx_qty_feb, 0);?>%</td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_idx_val_feb, 0);?>%</td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_qty_mar, 0);?></td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_val_mar, 2);?></td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_target_qty_mar, 0);?></td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_target_val_mar, 2);?></td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_idx_qty_mar, 0);?>%</td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_idx_val_mar, 0);?>%</td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_qty_q1, 0);?></td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_val_q1, 2);?></td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_target_qty_q1, 0);?></td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_target_val_q1, 2);?></td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_idx_qty_q1, 0);?>%</td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_idx_val_q1, 0);?>%</td>

                                    <td class="text-right"><?= number_format($GRANDTOTAL_qty_apr, 0);?></td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_val_apr, 2);?></td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_target_qty_apr, 0);?></td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_target_val_apr, 2);?></td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_idx_qty_apr, 0);?>%</td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_idx_val_apr, 0);?>%</td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_qty_mei, 0);?></td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_val_mei, 2);?></td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_target_qty_mei, 0);?></td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_target_val_mei, 2);?></td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_idx_qty_mei, 0);?>%</td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_idx_val_mei, 0);?>%</td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_qty_jun, 0);?></td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_val_jun, 2);?></td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_target_qty_jun, 0);?></td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_target_val_jun, 2);?></td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_idx_qty_jun, 0);?>%</td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_idx_val_jun, 0);?>%</td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_qty_q2, 0);?></td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_val_q2, 2);?></td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_target_qty_q2, 0);?></td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_target_val_q2, 2);?></td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_idx_qty_q2, 0);?>%</td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_idx_val_q2, 0);?>%</td>

                                    <td class="text-right"><?= number_format($GRANDTOTAL_qty_jul, 0);?></td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_val_jul, 2);?></td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_target_qty_jul, 0);?></td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_target_val_jul, 2);?></td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_idx_qty_jul, 0);?>%</td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_idx_val_jul, 0);?>%</td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_qty_agu, 0);?></td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_val_agu, 2);?></td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_target_qty_agu, 0);?></td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_target_val_agu, 2);?></td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_idx_qty_agu, 0);?>%</td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_idx_val_agu, 0);?>%</td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_qty_sep, 0);?></td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_val_sep, 2);?></td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_target_qty_sep, 0);?></td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_target_val_sep, 2);?></td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_idx_qty_sep, 0);?>%</td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_idx_val_sep, 0);?>%</td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_qty_q3, 0);?></td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_val_q3, 2);?></td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_target_qty_q3, 0);?></td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_target_val_q3, 2);?></td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_idx_qty_q3, 0);?>%</td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_idx_val_q3, 0);?>%</td>

                                    <td class="text-right"><?= number_format($GRANDTOTAL_qty_okt, 0);?></td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_val_okt, 2);?></td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_target_qty_okt, 0);?></td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_target_val_okt, 2);?></td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_idx_qty_okt, 0);?>%</td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_idx_val_okt, 0);?>%</td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_qty_nop, 0);?></td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_val_nop, 2);?></td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_target_qty_nop, 0);?></td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_target_val_nop, 2);?></td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_idx_qty_nop, 0);?>%</td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_idx_val_nop, 0);?>%</td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_qty_des, 0);?></td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_val_des, 2);?></td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_target_qty_des, 0);?></td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_target_val_des, 2);?></td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_idx_qty_des, 0);?>%</td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_idx_val_des, 0);?>%</td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_qty_q4, 0);?></td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_val_q4, 2);?></td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_target_qty_q4, 0);?></td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_target_val_q4, 2);?></td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_idx_qty_q4, 0);?>%</td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_idx_val_q4, 0);?>%</td>

                                    <td class="text-right"><?= number_format($GRANDTOTAL_qty_year, 0);?></td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_val_year, 2);?></td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_target_qty_year, 0);?></td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_target_val_year, 2);?></td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_idx_qty_year, 0);?>%</td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_idx_val_year, 0);?>%</td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_qty_avg, 0);?></td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_val_avg, 2);?></td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_target_qty_avg, 0);?></td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_target_val_avg, 2);?></td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_idx_qty_avg, 0);?>%</td>
                                    <td class="text-right"><?= number_format($GRANDTOTAL_idx_val_avg, 0);?>%</td>
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