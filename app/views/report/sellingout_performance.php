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
        <div class="card-body"> 
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
                            $year = $data['by_year'];

                        }else
                        {
                            $region = "By Region";
                            $area = "By Area";
                            $island = "By Island";
                        }

                        ?>
                          
                          <div>
                            <select class="mdb-select md-form form-control" title="By Island" name="by_island" id="dt_island" style="margin-left : 10px;width : 125px;" <?php if( $_SESSION['area'] != 'ALL'){echo "disabled"; } ?>>
                              <option value="">By Island</option>
                                  <?php $no=1; ?>
                                  <?php foreach ($data['island'] as $row) :?>
                                        <option <?php if( $island==$row['island']){echo "selected"; } ?> value="<?= $row['island'];?>"><b><?= $row['island'];?></b></option>
                                  <?php $no++; endforeach; ?>
                            </select>
                          </div>
                          <div style="margin-left : 5px;width : 135px;">
                            <select class="mdb-select md-form form-control" title="By Region" name="by_region" id="dt_region" style="margin-left : 10px;" <?php if( $_SESSION['area'] != 'ALL'){echo "disabled"; } ?>>
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
                          <div style="margin-left : 5px; width : 80px;">
                              <input name="by_year" class="mdb-select md-form form-control" type="number" min="1900" max="2099" step="1" value="<?= $year ;?>" />
                          </div>
                          <div style="margin-left : 10px;">
                            <button class="btn btn-outline-primary" type="submit" onclick="openLoader()">Go!</button>
                            <a class="btn btn-outline-secondary" href="<?= base_url; ?>/Report/sellingout_performance" onclick="openLoader()">Reset</a>
                          </div>
                          <div style="margin-left : 10px;">
                            <button class="btn float-right btn btn-outline-success" type="submit" formaction="<?= base_url; ?>/Report/export_sellingout_performance"><i class = "fa fa-download"> Excel</i></button>
                          </div>
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
                                <th colspan="8" class="text-center">January</th>
                                <th colspan="8" class="text-center">February</th>
                                <th colspan="8" class="text-center">March</th>
                                <th colspan="6" class="text-center" style="background-color: yellow">Quarter 1</th>
                                <th colspan="8" class="text-center">April</th>
                                <th colspan="8" class="text-center">May</th>
                                <th colspan="8" class="text-center">June</th>
                                <th colspan="6" class="text-center" style="background-color: yellow">Quarter 2</th>
                                <th colspan="8" class="text-center">July</th>
                                <th colspan="8" class="text-center">August</th>
                                <th colspan="8" class="text-center">September</th>
                                <th colspan="6" class="text-center" style="background-color: yellow">Quarter 3</th>
                                <th colspan="8" class="text-center">October</th>
                                <th colspan="8" class="text-center">November</th>
                                <th colspan="8" class="text-center">December</th>
                                <th colspan="6" class="text-center" style="background-color: yellow">Quarter 4</th>
                                <th colspan="6" class="text-center" style="background-color: #FF6D6D">Total</th>
                                <th colspan="6" class="text-center" style="background-color: #7BFF6D">Average</th>
                              </tr>
                              <tr>
                                <th colspan="2" class="text-center">Actual</th>
                                <th colspan="2" class="text-center">Target</th>
                                <th colspan="2" class="text-center">Index(%)</th>
                                <th colspan="2" class="text-center">STOCK</th>
                                <th colspan="2" class="text-center">Actual</th>
                                <th colspan="2" class="text-center">Target</th>
                                <th colspan="2" class="text-center">Index(%)</th>
                                <th colspan="2" class="text-center">STOCK</th>
                                <th colspan="2" class="text-center">Actual</th>
                                <th colspan="2" class="text-center">Target</th>
                                <th colspan="2" class="text-center">Index(%)</th>
                                <th colspan="2" class="text-center">STOCK</th>
                                <th colspan="2" class="text-center" style="background-color: yellow">Actual</th>
                                <th colspan="2" class="text-center" style="background-color: yellow">Target</th>
                                <th colspan="2" class="text-center" style="background-color: yellow">Index(%)</th>
                                <th colspan="2" class="text-center">Actual</th>
                                <th colspan="2" class="text-center">Target</th>
                                <th colspan="2" class="text-center">Index(%)</th>
                                <th colspan="2" class="text-center">STOCK</th>
                                <th colspan="2" class="text-center">Actual</th>
                                <th colspan="2" class="text-center">Target</th>
                                <th colspan="2" class="text-center">Index(%)</th>
                                <th colspan="2" class="text-center">STOCK</th>
                                <th colspan="2" class="text-center">Actual</th>
                                <th colspan="2" class="text-center">Target</th>
                                <th colspan="2" class="text-center">Index(%)</th>
                                <th colspan="2" class="text-center">STOCK</th>
                                <th colspan="2" class="text-center" style="background-color: yellow">Actual</th>
                                <th colspan="2" class="text-center" style="background-color: yellow">Target</th>
                                <th colspan="2" class="text-center" style="background-color: yellow">Index(%)</th>
                                <th colspan="2" class="text-center">Actual</th>
                                <th colspan="2" class="text-center">Target</th>
                                <th colspan="2" class="text-center">Index(%)</th>
                                <th colspan="2" class="text-center">STOCK</th>
                                <th colspan="2" class="text-center">Actual</th>
                                <th colspan="2" class="text-center">Target</th>
                                <th colspan="2" class="text-center">Index(%)</th>
                                <th colspan="2" class="text-center">STOCK</th>
                                <th colspan="2" class="text-center">Actual</th>
                                <th colspan="2" class="text-center">Target</th>
                                <th colspan="2" class="text-center">Index(%)</th>
                                <th colspan="2" class="text-center">STOCK</th>
                                <th colspan="2" class="text-center" style="background-color: yellow">Actual</th>
                                <th colspan="2" class="text-center" style="background-color: yellow">Target</th>
                                <th colspan="2" class="text-center" style="background-color: yellow">Index(%)</th>
                                <th colspan="2" class="text-center">Actual</th>
                                <th colspan="2" class="text-center">Target</th>
                                <th colspan="2" class="text-center">Index(%)</th>
                                <th colspan="2" class="text-center">STOCK</th>
                                <th colspan="2" class="text-center">Actual</th>
                                <th colspan="2" class="text-center">Target</th>
                                <th colspan="2" class="text-center">Index(%)</th>
                                <th colspan="2" class="text-center">STOCK</th>
                                <th colspan="2" class="text-center">Actual</th>
                                <th colspan="2" class="text-center">Target</th>
                                <th colspan="2" class="text-center">Index(%)</th>
                                <th colspan="2" class="text-center">STOCK</th>
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

                                    $val_jan = 0;
                                    $val_feb = 0;
                                    $val_mar = 0;
                                    $val_q1 = 0;
                                    $val_apr = 0;
                                    $val_mei = 0;
                                    $val_jun = 0;
                                    $val_q2 = 0;
                                    $val_jul = 0;
                                    $val_agu = 0;
                                    $val_sep = 0;
                                    $val_q3 = 0;
                                    $val_okt = 0;
                                    $val_nop = 0;
                                    $val_des = 0;
                                    $val_q4 = 0;
                                    $val_year = 0;
                                    $val_avg = 0;

                                    $target_qty_jan = 0;
                                    $target_qty_feb = 0;
                                    $target_qty_mar = 0;
                                    $target_qty_q1 = 0;
                                    $target_qty_apr = 0;
                                    $target_qty_mei = 0;
                                    $target_qty_jun = 0;
                                    $target_qty_q2 = 0;
                                    $target_qty_jul = 0;
                                    $target_qty_agu = 0;
                                    $target_qty_sep = 0;
                                    $target_qty_q3 = 0;
                                    $target_qty_okt = 0;
                                    $target_qty_nop = 0;
                                    $target_qty_des = 0;
                                    $target_qty_q4 = 0;
                                    $target_qty_year = 0;
                                    $target_qty_avg = 0;

                                    $target_val_jan = 0;
                                    $target_val_feb = 0;
                                    $target_val_mar = 0;
                                    $target_val_q1 = 0;
                                    $target_val_apr = 0;
                                    $target_val_mei = 0;
                                    $target_val_jun = 0;
                                    $target_val_q2 = 0;
                                    $target_val_jul = 0;
                                    $target_val_agu = 0;
                                    $target_val_sep = 0;
                                    $target_val_q3 = 0;
                                    $target_val_okt = 0;
                                    $target_val_nop = 0;
                                    $target_val_des = 0;
                                    $target_val_q4 = 0;
                                    $target_val_year = 0;
                                    $target_val_avg = 0;

                                    $idx_qty_jan = 0;
                                    $idx_qty_feb = 0;
                                    $idx_qty_mar = 0;
                                    $idx_qty_q1 = 0;
                                    $idx_qty_apr = 0;
                                    $idx_qty_mei = 0;
                                    $idx_qty_jun = 0;
                                    $idx_qty_q2 = 0;
                                    $idx_qty_jul = 0;
                                    $idx_qty_agu = 0;
                                    $idx_qty_sep = 0;
                                    $idx_qty_q3 = 0;
                                    $idx_qty_okt = 0;
                                    $idx_qty_nop = 0;
                                    $idx_qty_des = 0;
                                    $idx_qty_q4 = 0;
                                    $idx_qty_year = 0;
                                    $idx_qty_avg = 0;

                                    $idx_val_jan = 0;
                                    $idx_val_feb = 0;
                                    $idx_val_mar = 0;
                                    $idx_val_q1 = 0;
                                    $idx_val_apr = 0;
                                    $idx_val_mei = 0;
                                    $idx_val_jun = 0;
                                    $idx_val_q2 = 0;
                                    $idx_val_jul = 0;
                                    $idx_val_agu = 0;
                                    $idx_val_sep = 0;
                                    $idx_val_q3 = 0;
                                    $idx_val_okt = 0;
                                    $idx_val_nop = 0;
                                    $idx_val_des = 0;
                                    $idx_val_q4 = 0;
                                    $idx_val_year = 0;
                                    $idx_val_avg = 0;

                                    $stok_qty_jan = 0;
                                    $stok_qty_feb = 0;
                                    $stok_qty_mar = 0;
                                    $stok_qty_q1 = 0;
                                    $stok_qty_apr = 0;
                                    $stok_qty_mei = 0;
                                    $stok_qty_jun = 0;
                                    $stok_qty_q2 = 0;
                                    $stok_qty_jul = 0;
                                    $stok_qty_agu = 0;
                                    $stok_qty_sep = 0;
                                    $stok_qty_q3 = 0;
                                    $stok_qty_okt = 0;
                                    $stok_qty_nop = 0;
                                    $stok_qty_des = 0;
                                    $stok_qty_q4 = 0;
                                    $stok_qty_year = 0;
                                    $stok_qty_avg = 0;

                                    $stok_val_jan = 0;
                                    $stok_val_feb = 0;
                                    $stok_val_mar = 0;
                                    $stok_val_q1 = 0;
                                    $stok_val_apr = 0;
                                    $stok_val_mei = 0;
                                    $stok_val_jun = 0;
                                    $stok_val_q2 = 0;
                                    $stok_val_jul = 0;
                                    $stok_val_agu = 0;
                                    $stok_val_sep = 0;
                                    $stok_val_q3 = 0;
                                    $stok_val_okt = 0;
                                    $stok_val_nop = 0;
                                    $stok_val_des = 0;
                                    $stok_val_q4 = 0;
                                    $stok_val_year = 0;
                                    $stok_val_avg = 0;

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

                                    $sub_val_jan = 0;
                                    $sub_val_feb = 0;
                                    $sub_val_mar = 0;
                                    $sub_val_q1 = 0;
                                    $sub_val_apr = 0;
                                    $sub_val_mei = 0;
                                    $sub_val_jun = 0;
                                    $sub_val_q2 = 0;
                                    $sub_val_jul = 0;
                                    $sub_val_agu = 0;
                                    $sub_val_sep = 0;
                                    $sub_val_q3 = 0;
                                    $sub_val_okt = 0;
                                    $sub_val_nop = 0;
                                    $sub_val_des = 0;
                                    $sub_val_q4 = 0;
                                    $sub_val_year = 0;
                                    $sub_val_avg = 0;

                                    $sub_target_qty_jan = 0;
                                    $sub_target_qty_feb = 0;
                                    $sub_target_qty_mar = 0;
                                    $sub_target_qty_q1 = 0;
                                    $sub_target_qty_apr = 0;
                                    $sub_target_qty_mei = 0;
                                    $sub_target_qty_jun = 0;
                                    $sub_target_qty_q2 = 0;
                                    $sub_target_qty_jul = 0;
                                    $sub_target_qty_agu = 0;
                                    $sub_target_qty_sep = 0;
                                    $sub_target_qty_q3 = 0;
                                    $sub_target_qty_okt = 0;
                                    $sub_target_qty_nop = 0;
                                    $sub_target_qty_des = 0;
                                    $sub_target_qty_q4 = 0;
                                    $sub_target_qty_year = 0;
                                    $sub_target_qty_avg = 0;

                                    $sub_target_val_jan = 0;
                                    $sub_target_val_feb = 0;
                                    $sub_target_val_mar = 0;
                                    $sub_target_val_q1 = 0;
                                    $sub_target_val_apr = 0;
                                    $sub_target_val_mei = 0;
                                    $sub_target_val_jun = 0;
                                    $sub_target_val_q2 = 0;
                                    $sub_target_val_jul = 0;
                                    $sub_target_val_agu = 0;
                                    $sub_target_val_sep = 0;
                                    $sub_target_val_q3 = 0;
                                    $sub_target_val_okt = 0;
                                    $sub_target_val_nop = 0;
                                    $sub_target_val_des = 0;
                                    $sub_target_val_q4 = 0;
                                    $sub_target_val_year = 0;
                                    $sub_target_val_avg = 0;

                                    $sub_idx_qty_jan = 0;
                                    $sub_idx_qty_feb = 0;
                                    $sub_idx_qty_mar = 0;
                                    $sub_idx_qty_q1 = 0;
                                    $sub_idx_qty_apr = 0;
                                    $sub_idx_qty_mei = 0;
                                    $sub_idx_qty_jun = 0;
                                    $sub_idx_qty_q2 = 0;
                                    $sub_idx_qty_jul = 0;
                                    $sub_idx_qty_agu = 0;
                                    $sub_idx_qty_sep = 0;
                                    $sub_idx_qty_q3 = 0;
                                    $sub_idx_qty_okt = 0;
                                    $sub_idx_qty_nop = 0;
                                    $sub_idx_qty_des = 0;
                                    $sub_idx_qty_q4 = 0;
                                    $sub_idx_qty_year = 0;
                                    $sub_idx_qty_avg = 0;

                                    $sub_idx_val_jan = 0;
                                    $sub_idx_val_feb = 0;
                                    $sub_idx_val_mar = 0;
                                    $sub_idx_val_q1 = 0;
                                    $sub_idx_val_apr = 0;
                                    $sub_idx_val_mei = 0;
                                    $sub_idx_val_jun = 0;
                                    $sub_idx_val_q2 = 0;
                                    $sub_idx_val_jul = 0;
                                    $sub_idx_val_agu = 0;
                                    $sub_idx_val_sep = 0;
                                    $sub_idx_val_q3 = 0;
                                    $sub_idx_val_okt = 0;
                                    $sub_idx_val_nop = 0;
                                    $sub_idx_val_des = 0;
                                    $sub_idx_val_q4 = 0;
                                    $sub_idx_val_year = 0;
                                    $sub_idx_val_avg = 0;

                                    $sub_stok_qty_jan = 0;
                                    $sub_stok_qty_feb = 0;
                                    $sub_stok_qty_mar = 0;
                                    $sub_stok_qty_q1 = 0;
                                    $sub_stok_qty_apr = 0;
                                    $sub_stok_qty_mei = 0;
                                    $sub_stok_qty_jun = 0;
                                    $sub_stok_qty_q2 = 0;
                                    $sub_stok_qty_jul = 0;
                                    $sub_stok_qty_agu = 0;
                                    $sub_stok_qty_sep = 0;
                                    $sub_stok_qty_q3 = 0;
                                    $sub_stok_qty_okt = 0;
                                    $sub_stok_qty_nop = 0;
                                    $sub_stok_qty_des = 0;
                                    $sub_stok_qty_q4 = 0;
                                    $sub_stok_qty_year = 0;
                                    $sub_stok_qty_avg = 0;

                                    $sub_stok_val_jan = 0;
                                    $sub_stok_val_feb = 0;
                                    $sub_stok_val_mar = 0;
                                    $sub_stok_val_q1 = 0;
                                    $sub_stok_val_apr = 0;
                                    $sub_stok_val_mei = 0;
                                    $sub_stok_val_jun = 0;
                                    $sub_stok_val_q2 = 0;
                                    $sub_stok_val_jul = 0;
                                    $sub_stok_val_agu = 0;
                                    $sub_stok_val_sep = 0;
                                    $sub_stok_val_q3 = 0;
                                    $sub_stok_val_okt = 0;
                                    $sub_stok_val_nop = 0;
                                    $sub_stok_val_des = 0;
                                    $sub_stok_val_q4 = 0;
                                    $sub_stok_val_year = 0;
                                    $sub_stok_val_avg = 0;

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

                                    $total_val_jan = 0;
                                    $total_val_feb = 0;
                                    $total_val_mar = 0;
                                    $total_val_q1 = 0;
                                    $total_val_apr = 0;
                                    $total_val_mei = 0;
                                    $total_val_jun = 0;
                                    $total_val_q2 = 0;
                                    $total_val_jul = 0;
                                    $total_val_agu = 0;
                                    $total_val_sep = 0;
                                    $total_val_q3 = 0;
                                    $total_val_okt = 0;
                                    $total_val_nop = 0;
                                    $total_val_des = 0;
                                    $total_val_q4 = 0;
                                    $total_val_year = 0;
                                    $total_val_avg = 0;

                                    $total_target_qty_jan = 0;
                                    $total_target_qty_feb = 0;
                                    $total_target_qty_mar = 0;
                                    $total_target_qty_q1 = 0;
                                    $total_target_qty_apr = 0;
                                    $total_target_qty_mei = 0;
                                    $total_target_qty_jun = 0;
                                    $total_target_qty_q2 = 0;
                                    $total_target_qty_jul = 0;
                                    $total_target_qty_agu = 0;
                                    $total_target_qty_sep = 0;
                                    $total_target_qty_q3 = 0;
                                    $total_target_qty_okt = 0;
                                    $total_target_qty_nop = 0;
                                    $total_target_qty_des = 0;
                                    $total_target_qty_q4 = 0;
                                    $total_target_qty_year = 0;
                                    $total_target_qty_avg = 0;

                                    $total_target_val_jan = 0;
                                    $total_target_val_feb = 0;
                                    $total_target_val_mar = 0;
                                    $total_target_val_q1 = 0;
                                    $total_target_val_apr = 0;
                                    $total_target_val_mei = 0;
                                    $total_target_val_jun = 0;
                                    $total_target_val_q2 = 0;
                                    $total_target_val_jul = 0;
                                    $total_target_val_agu = 0;
                                    $total_target_val_sep = 0;
                                    $total_target_val_q3 = 0;
                                    $total_target_val_okt = 0;
                                    $total_target_val_nop = 0;
                                    $total_target_val_des = 0;
                                    $total_target_val_q4 = 0;
                                    $total_target_val_year = 0;
                                    $total_target_val_avg = 0;

                                    $total_idx_qty_jan = 0;
                                    $total_idx_qty_feb = 0;
                                    $total_idx_qty_mar = 0;
                                    $total_idx_qty_q1 = 0;
                                    $total_idx_qty_apr = 0;
                                    $total_idx_qty_mei = 0;
                                    $total_idx_qty_jun = 0;
                                    $total_idx_qty_q2 = 0;
                                    $total_idx_qty_jul = 0;
                                    $total_idx_qty_agu = 0;
                                    $total_idx_qty_sep = 0;
                                    $total_idx_qty_q3 = 0;
                                    $total_idx_qty_okt = 0;
                                    $total_idx_qty_nop = 0;
                                    $total_idx_qty_des = 0;
                                    $total_idx_qty_q4 = 0;
                                    $total_idx_qty_year = 0;
                                    $total_idx_qty_avg = 0;

                                    $total_idx_val_jan = 0;
                                    $total_idx_val_feb = 0;
                                    $total_idx_val_mar = 0;
                                    $total_idx_val_q1 = 0;
                                    $total_idx_val_apr = 0;
                                    $total_idx_val_mei = 0;
                                    $total_idx_val_jun = 0;
                                    $total_idx_val_q2 = 0;
                                    $total_idx_val_jul = 0;
                                    $total_idx_val_agu = 0;
                                    $total_idx_val_sep = 0;
                                    $total_idx_val_q3 = 0;
                                    $total_idx_val_okt = 0;
                                    $total_idx_val_nop = 0;
                                    $total_idx_val_des = 0;
                                    $total_idx_val_q4 = 0;
                                    $total_idx_val_year = 0;
                                    $total_idx_val_avg = 0;

                                    $total_stok_qty_jan = 0;
                                    $total_stok_qty_feb = 0;
                                    $total_stok_qty_mar = 0;
                                    $total_stok_qty_q1 = 0;
                                    $total_stok_qty_apr = 0;
                                    $total_stok_qty_mei = 0;
                                    $total_stok_qty_jun = 0;
                                    $total_stok_qty_q2 = 0;
                                    $total_stok_qty_jul = 0;
                                    $total_stok_qty_agu = 0;
                                    $total_stok_qty_sep = 0;
                                    $total_stok_qty_q3 = 0;
                                    $total_stok_qty_okt = 0;
                                    $total_stok_qty_nop = 0;
                                    $total_stok_qty_des = 0;
                                    $total_stok_qty_q4 = 0;
                                    $total_stok_qty_year = 0;
                                    $total_stok_qty_avg = 0;

                                    $total_stok_val_jan = 0;
                                    $total_stok_val_feb = 0;
                                    $total_stok_val_mar = 0;
                                    $total_stok_val_q1 = 0;
                                    $total_stok_val_apr = 0;
                                    $total_stok_val_mei = 0;
                                    $total_stok_val_jun = 0;
                                    $total_stok_val_q2 = 0;
                                    $total_stok_val_jul = 0;
                                    $total_stok_val_agu = 0;
                                    $total_stok_val_sep = 0;
                                    $total_stok_val_q3 = 0;
                                    $total_stok_val_okt = 0;
                                    $total_stok_val_nop = 0;
                                    $total_stok_val_des = 0;
                                    $total_stok_val_q4 = 0;
                                    $total_stok_val_year = 0;
                                    $total_stok_val_avg = 0;

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
                                                echo '<td class="text-right">' . number_format($qty_jan, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($val_jan, 2). '</td>';
                                                echo '<td class="text-right">' . number_format($target_qty_jan, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($target_val_jan, 2). '</td>';
                                                echo '<td class="text-right">' . number_format($idx_qty_jan, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($idx_val_jan, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($stok_qty_jan, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($stok_val_jan, 2). '</td>';
                                                echo '<td class="text-right">' . number_format($qty_feb, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($val_feb, 2). '</td>';
                                                echo '<td class="text-right">' . number_format($target_qty_feb, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($target_val_feb, 2). '</td>';
                                                echo '<td class="text-right">' . number_format($idx_qty_feb, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($idx_val_feb, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($stok_qty_feb, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($stok_val_feb, 2). '</td>';
                                                echo '<td class="text-right">' . number_format($qty_mar, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($val_mar, 2). '</td>';
                                                echo '<td class="text-right">' . number_format($target_qty_mar, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($target_val_mar, 2). '</td>';
                                                echo '<td class="text-right">' . number_format($idx_qty_mar, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($idx_val_mar, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($stok_qty_mar, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($stok_val_mar, 2). '</td>';
                                                echo '<td class="text-right">' . number_format($qty_q1, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($val_q1, 2). '</td>';
                                                echo '<td class="text-right">' . number_format($target_qty_q1, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($target_val_q1, 2). '</td>';
                                                echo '<td class="text-right">' . number_format($idx_qty_q1, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($idx_val_q1, 0). '</td>';

                                                echo '<td class="text-right">' . number_format($qty_apr, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($val_apr, 2). '</td>';
                                                echo '<td class="text-right">' . number_format($target_qty_apr, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($target_val_apr, 2). '</td>';
                                                echo '<td class="text-right">' . number_format($idx_qty_apr, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($idx_val_apr, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($stok_qty_apr, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($stok_val_apr, 2). '</td>';
                                                echo '<td class="text-right">' . number_format($qty_mei, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($val_mei, 2). '</td>';
                                                echo '<td class="text-right">' . number_format($target_qty_mei, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($target_val_mei, 2). '</td>';
                                                echo '<td class="text-right">' . number_format($idx_qty_mei, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($idx_val_mei, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($stok_qty_mei, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($stok_val_mei, 2). '</td>';
                                                echo '<td class="text-right">' . number_format($qty_jun, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($val_jun, 2). '</td>';
                                                echo '<td class="text-right">' . number_format($target_qty_jun, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($target_val_jun, 2). '</td>';
                                                echo '<td class="text-right">' . number_format($idx_qty_jun, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($idx_val_jun, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($stok_qty_jun, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($stok_val_jun, 2). '</td>';
                                                echo '<td class="text-right">' . number_format($qty_q2, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($val_q2, 2). '</td>';
                                                echo '<td class="text-right">' . number_format($target_qty_q2, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($target_val_q2, 2). '</td>';
                                                echo '<td class="text-right">' . number_format($idx_qty_q2, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($idx_val_q2, 0). '</td>';

                                                echo '<td class="text-right">' . number_format($qty_jul, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($val_jul, 2). '</td>';
                                                echo '<td class="text-right">' . number_format($target_qty_jul, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($target_val_jul, 2). '</td>';
                                                echo '<td class="text-right">' . number_format($idx_qty_jul, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($idx_val_jul, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($stok_qty_jul, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($stok_val_jul, 2). '</td>';
                                                echo '<td class="text-right">' . number_format($qty_agu, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($val_agu, 2). '</td>';
                                                echo '<td class="text-right">' . number_format($target_qty_agu, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($target_val_agu, 2). '</td>';
                                                echo '<td class="text-right">' . number_format($idx_qty_agu, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($idx_val_agu, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($stok_qty_agu, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($stok_val_agu, 2). '</td>';
                                                echo '<td class="text-right">' . number_format($qty_sep, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($val_sep, 2). '</td>';
                                                echo '<td class="text-right">' . number_format($target_qty_sep, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($target_val_sep, 2). '</td>';
                                                echo '<td class="text-right">' . number_format($idx_qty_sep, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($idx_val_sep, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($stok_qty_sep, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($stok_val_sep, 2). '</td>';
                                                echo '<td class="text-right">' . number_format($qty_q3, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($val_q3, 2). '</td>';
                                                echo '<td class="text-right">' . number_format($target_qty_q3, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($target_val_q3, 2). '</td>';
                                                echo '<td class="text-right">' . number_format($idx_qty_q3, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($idx_val_q3, 0). '</td>';

                                                echo '<td class="text-right">' . number_format($qty_okt, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($val_okt, 2). '</td>';
                                                echo '<td class="text-right">' . number_format($target_qty_okt, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($target_val_okt, 2). '</td>';
                                                echo '<td class="text-right">' . number_format($idx_qty_okt, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($idx_val_okt, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($stok_qty_okt, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($stok_val_okt, 2). '</td>';
                                                echo '<td class="text-right">' . number_format($qty_nop, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($val_nop, 2). '</td>';
                                                echo '<td class="text-right">' . number_format($target_qty_nop, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($target_val_nop, 2). '</td>';
                                                echo '<td class="text-right">' . number_format($idx_qty_nop, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($idx_val_nop, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($stok_qty_nop, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($stok_val_nop, 2). '</td>';
                                                echo '<td class="text-right">' . number_format($qty_des, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($val_des, 2). '</td>';
                                                echo '<td class="text-right">' . number_format($target_qty_des, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($target_val_des, 2). '</td>';
                                                echo '<td class="text-right">' . number_format($idx_qty_des, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($idx_val_des, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($stok_qty_des, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($stok_val_des, 2). '</td>';
                                                echo '<td class="text-right">' . number_format($qty_q4, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($val_q4, 2). '</td>';
                                                echo '<td class="text-right">' . number_format($target_qty_q4, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($target_val_q4, 2). '</td>';
                                                echo '<td class="text-right">' . number_format($idx_qty_q4, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($idx_val_q4, 0). '</td>';

                                                $qty_year = $qty_jan + $qty_feb + $qty_mar + $qty_apr + $qty_mei + $qty_jun + $qty_jul + $qty_agu + $qty_sep + $qty_okt + $qty_nop + $qty_des;
                                                $target_qty_year = $target_qty_jan + $target_qty_feb + $target_qty_mar + $target_qty_apr + $target_qty_mei + $target_qty_jun + $target_qty_jul + $target_qty_agu + $target_qty_sep + $target_qty_okt + $target_qty_nop + $target_qty_des;
                                                $idx_qty_year = ($qty_year/($target_qty_year ?: 1))*100;
                                                $val_year = $val_jan + $val_feb + $val_mar + $val_apr + $val_mei + $val_jun + $val_jul + $val_agu + $val_sep + $val_okt + $val_nop + $val_des;
                                                $target_val_year = $target_val_jan + $target_val_feb + $target_val_mar + $target_val_apr + $target_val_mei + $target_val_jun + $target_val_jul + $target_val_agu + $target_val_sep + $target_val_okt + $target_val_nop + $target_val_des;
                                                $idx_val_year = ($val_year/($target_val_year ?: 1))*100;
                                                $qty_avg = $qty_year / 12;
                                                $target_qty_avg = $target_qty_year / 12;
                                                $idx_qty_avg = ($qty_avg/($target_qty_avg ?: 1))*100;
                                                $val_avg = $val_year / 12;
                                                $target_val_avg = $target_val_year / 12;
                                                $idx_val_avg = ($val_avg/($target_val_avg ?: 1))*100;

                                                echo '<td class="text-right">' . number_format($qty_year, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($val_year, 2). '</td>';
                                                echo '<td class="text-right">' . number_format($target_qty_year, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($target_val_year, 2). '</td>';
                                                echo '<td class="text-right">' . number_format($idx_qty_year, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($idx_val_year, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($qty_avg, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($val_avg, 2). '</td>';
                                                echo '<td class="text-right">' . number_format($target_qty_avg, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($target_val_avg, 2). '</td>';
                                                echo '<td class="text-right">' . number_format($idx_qty_avg, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($idx_val_avg, 0). '</td>';
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

                                            $val_jan = 0;
                                            $val_feb = 0;
                                            $val_mar = 0;
                                            $val_q1 = 0;
                                            $val_apr = 0;
                                            $val_mei = 0;
                                            $val_jun = 0;
                                            $val_q2 = 0;
                                            $val_jul = 0;
                                            $val_agu = 0;
                                            $val_sep = 0;
                                            $val_q3 = 0;
                                            $val_okt = 0;
                                            $val_nop = 0;
                                            $val_des = 0;
                                            $val_q4 = 0;
                                            $val_year = 0;
                                            $val_avg = 0;

                                            $target_qty_jan = 0;
                                            $target_qty_feb = 0;
                                            $target_qty_mar = 0;
                                            $target_qty_q1 = 0;
                                            $target_qty_apr = 0;
                                            $target_qty_mei = 0;
                                            $target_qty_jun = 0;
                                            $target_qty_q2 = 0;
                                            $target_qty_jul = 0;
                                            $target_qty_agu = 0;
                                            $target_qty_sep = 0;
                                            $target_qty_q3 = 0;
                                            $target_qty_okt = 0;
                                            $target_qty_nop = 0;
                                            $target_qty_des = 0;
                                            $target_qty_q4 = 0;
                                            $target_qty_year = 0;
                                            $target_qty_avg = 0;

                                            $target_val_jan = 0;
                                            $target_val_feb = 0;
                                            $target_val_mar = 0;
                                            $target_val_q1 = 0;
                                            $target_val_apr = 0;
                                            $target_val_mei = 0;
                                            $target_val_jun = 0;
                                            $target_val_q2 = 0;
                                            $target_val_jul = 0;
                                            $target_val_agu = 0;
                                            $target_val_sep = 0;
                                            $target_val_q3 = 0;
                                            $target_val_okt = 0;
                                            $target_val_nop = 0;
                                            $target_val_des = 0;
                                            $target_val_q4 = 0;
                                            $target_val_year = 0;
                                            $target_val_avg = 0;

                                            $idx_qty_jan = 0;
                                            $idx_qty_feb = 0;
                                            $idx_qty_mar = 0;
                                            $idx_qty_q1 = 0;
                                            $idx_qty_apr = 0;
                                            $idx_qty_mei = 0;
                                            $idx_qty_jun = 0;
                                            $idx_qty_q2 = 0;
                                            $idx_qty_jul = 0;
                                            $idx_qty_agu = 0;
                                            $idx_qty_sep = 0;
                                            $idx_qty_q3 = 0;
                                            $idx_qty_okt = 0;
                                            $idx_qty_nop = 0;
                                            $idx_qty_des = 0;
                                            $idx_qty_q4 = 0;
                                            $idx_qty_year = 0;
                                            $idx_qty_avg = 0;

                                            $idx_val_jan = 0;
                                            $idx_val_feb = 0;
                                            $idx_val_mar = 0;
                                            $idx_val_q1 = 0;
                                            $idx_val_apr = 0;
                                            $idx_val_mei = 0;
                                            $idx_val_jun = 0;
                                            $idx_val_q2 = 0;
                                            $idx_val_jul = 0;
                                            $idx_val_agu = 0;
                                            $idx_val_sep = 0;
                                            $idx_val_q3 = 0;
                                            $idx_val_okt = 0;
                                            $idx_val_nop = 0;
                                            $idx_val_des = 0;
                                            $idx_val_q4 = 0;
                                            $idx_val_year = 0;
                                            $idx_val_avg = 0;

                                            $stok_qty_jan = 0;
                                            $stok_qty_feb = 0;
                                            $stok_qty_mar = 0;
                                            $stok_qty_q1 = 0;
                                            $stok_qty_apr = 0;
                                            $stok_qty_mei = 0;
                                            $stok_qty_jun = 0;
                                            $stok_qty_q2 = 0;
                                            $stok_qty_jul = 0;
                                            $stok_qty_agu = 0;
                                            $stok_qty_sep = 0;
                                            $stok_qty_q3 = 0;
                                            $stok_qty_okt = 0;
                                            $stok_qty_nop = 0;
                                            $stok_qty_des = 0;
                                            $stok_qty_q4 = 0;
                                            $stok_qty_year = 0;
                                            $stok_qty_avg = 0;

                                            $stok_val_jan = 0;
                                            $stok_val_feb = 0;
                                            $stok_val_mar = 0;
                                            $stok_val_q1 = 0;
                                            $stok_val_apr = 0;
                                            $stok_val_mei = 0;
                                            $stok_val_jun = 0;
                                            $stok_val_q2 = 0;
                                            $stok_val_jul = 0;
                                            $stok_val_agu = 0;
                                            $stok_val_sep = 0;
                                            $stok_val_q3 = 0;
                                            $stok_val_okt = 0;
                                            $stok_val_nop = 0;
                                            $stok_val_des = 0;
                                            $stok_val_q4 = 0;
                                            $stok_val_year = 0;
                                            $stok_val_avg = 0;
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
                                                echo '<td class="text-right">' . number_format($sub_val_jan, 2). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_target_qty_jan, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_target_val_jan, 2). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_idx_qty_jan, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_idx_val_jan, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_stok_qty_jan, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_stok_val_jan, 2). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_qty_feb, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_val_feb, 2). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_target_qty_feb, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_target_val_feb, 2). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_idx_qty_feb, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_idx_val_feb, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_stok_qty_feb, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_stok_val_feb, 2). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_qty_mar, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_val_mar, 2). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_target_qty_mar, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_target_val_mar, 2). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_idx_qty_mar, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_idx_val_mar, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_stok_qty_mar, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_stok_val_mar, 2). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_qty_q1, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_val_q1, 2). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_target_qty_q1, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_target_val_q1, 2). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_idx_qty_q1, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_idx_val_q1, 0). '</td>';

                                                echo '<td class="text-right">' . number_format($sub_qty_apr, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_val_apr, 2). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_target_qty_apr, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_target_val_apr, 2). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_idx_qty_apr, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_idx_val_apr, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_stok_qty_apr, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_stok_val_apr, 2). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_qty_mei, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_val_mei, 2). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_target_qty_mei, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_target_val_mei, 2). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_idx_qty_mei, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_idx_val_mei, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_stok_qty_mei, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_stok_val_mei, 2). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_qty_jun, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_val_jun, 2). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_target_qty_jun, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_target_val_jun, 2). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_idx_qty_jun, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_idx_val_jun, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_stok_qty_jun, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_stok_val_jun, 2). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_qty_q2, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_val_q2, 2). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_target_qty_q2, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_target_val_q2, 2). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_idx_qty_q2, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_idx_val_q2, 0). '</td>';

                                                echo '<td class="text-right">' . number_format($sub_qty_jul, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_val_jul, 2). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_target_qty_jul, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_target_val_jul, 2). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_idx_qty_jul, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_idx_val_jul, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_stok_qty_jul, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_stok_val_jul, 2). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_qty_agu, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_val_agu, 2). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_target_qty_agu, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_target_val_agu, 2). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_idx_qty_agu, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_idx_val_agu, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_stok_qty_agu, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_stok_val_agu, 2). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_qty_sep, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_val_sep, 2). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_target_qty_sep, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_target_val_sep, 2). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_idx_qty_sep, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_idx_val_sep, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_stok_qty_sep, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_stok_val_sep, 2). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_qty_q3, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_val_q3, 2). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_target_qty_q3, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_target_val_q3, 2). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_idx_qty_q3, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_idx_val_q3, 0). '</td>';

                                                echo '<td class="text-right">' . number_format($sub_qty_okt, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_val_okt, 2). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_target_qty_okt, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_target_val_okt, 2). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_idx_qty_okt, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_idx_val_okt, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_stok_qty_okt, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_stok_val_okt, 2). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_qty_nop, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_val_nop, 2). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_target_qty_nop, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_target_val_nop, 2). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_idx_qty_nop, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_idx_val_nop, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_stok_qty_nop, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_stok_val_nop, 2). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_qty_des, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_val_des, 2). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_target_qty_des, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_target_val_des, 2). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_idx_qty_des, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_idx_val_des, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_stok_qty_des, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_stok_val_des, 2). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_qty_q4, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_val_q4, 2). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_target_qty_q4, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_target_val_q4, 2). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_idx_qty_q4, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_idx_val_q4, 0). '</td>';

                                                $sub_qty_year = $sub_qty_jan + $sub_qty_feb + $sub_qty_mar + $sub_qty_apr + $sub_qty_mei + $sub_qty_jun + $sub_qty_jul + $sub_qty_agu + $sub_qty_sep + $sub_qty_okt + $sub_qty_nop + $sub_qty_des;
                                                $sub_target_qty_year = $sub_target_qty_jan + $sub_target_qty_feb + $sub_target_qty_mar + $sub_target_qty_apr + $sub_target_qty_mei + $sub_target_qty_jun + $sub_target_qty_jul + $sub_target_qty_agu + $sub_target_qty_sep + $sub_target_qty_okt + $sub_target_qty_nop + $sub_target_qty_des;
                                                $sub_idx_qty_year = ($sub_qty_year/($sub_target_qty_year ?: 1))*100;
                                                $sub_val_year = $sub_val_jan + $sub_val_feb + $sub_val_mar + $sub_val_apr + $sub_val_mei + $sub_val_jun + $sub_val_jul + $sub_val_agu + $sub_val_sep + $sub_val_okt + $sub_val_nop + $sub_val_des;
                                                $sub_target_val_year = $sub_target_val_jan + $sub_target_val_feb + $sub_target_val_mar + $sub_target_val_apr + $sub_target_val_mei + $sub_target_val_jun + $sub_target_val_jul + $sub_target_val_agu + $sub_target_val_sep + $sub_target_val_okt + $sub_target_val_nop + $sub_target_val_des;
                                                $sub_idx_val_year = ($sub_val_year/($sub_target_val_year ?: 1))*100;
                                                $sub_qty_avg = $sub_qty_year / 12;
                                                $sub_target_qty_avg = $sub_target_qty_year / 12;
                                                $sub_idx_qty_avg = ($sub_qty_avg/($sub_target_qty_avg ?: 1))*100;
                                                $sub_val_avg = $sub_val_year / 12;
                                                $sub_target_val_avg = $sub_target_val_year / 12;
                                                $sub_idx_val_avg = ($sub_val_avg/($sub_target_val_avg ?: 1))*100;

                                                echo '<td class="text-right">' . number_format($sub_qty_year, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_val_year, 2). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_target_qty_year, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_target_val_year, 2). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_idx_qty_year, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_idx_val_year, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_qty_avg, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_val_avg, 2). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_target_qty_avg, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_target_val_avg, 2). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_idx_qty_avg, 0). '</td>';
                                                echo '<td class="text-right">' . number_format($sub_idx_val_avg, 0). '</td>';
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
        
                                            $sub_val_jan = 0;
                                            $sub_val_feb = 0;
                                            $sub_val_mar = 0;
                                            $sub_val_q1 = 0;
                                            $sub_val_apr = 0;
                                            $sub_val_mei = 0;
                                            $sub_val_jun = 0;
                                            $sub_val_q2 = 0;
                                            $sub_val_jul = 0;
                                            $sub_val_agu = 0;
                                            $sub_val_sep = 0;
                                            $sub_val_q3 = 0;
                                            $sub_val_okt = 0;
                                            $sub_val_nop = 0;
                                            $sub_val_des = 0;
                                            $sub_val_q4 = 0;
                                            $sub_val_year = 0;
                                            $sub_val_avg = 0;
        
                                            $sub_target_qty_jan = 0;
                                            $sub_target_qty_feb = 0;
                                            $sub_target_qty_mar = 0;
                                            $sub_target_qty_q1 = 0;
                                            $sub_target_qty_apr = 0;
                                            $sub_target_qty_mei = 0;
                                            $sub_target_qty_jun = 0;
                                            $sub_target_qty_q2 = 0;
                                            $sub_target_qty_jul = 0;
                                            $sub_target_qty_agu = 0;
                                            $sub_target_qty_sep = 0;
                                            $sub_target_qty_q3 = 0;
                                            $sub_target_qty_okt = 0;
                                            $sub_target_qty_nop = 0;
                                            $sub_target_qty_des = 0;
                                            $sub_target_qty_q4 = 0;
                                            $sub_target_qty_year = 0;
                                            $sub_target_qty_avg = 0;
        
                                            $sub_target_val_jan = 0;
                                            $sub_target_val_feb = 0;
                                            $sub_target_val_mar = 0;
                                            $sub_target_val_q1 = 0;
                                            $sub_target_val_apr = 0;
                                            $sub_target_val_mei = 0;
                                            $sub_target_val_jun = 0;
                                            $sub_target_val_q2 = 0;
                                            $sub_target_val_jul = 0;
                                            $sub_target_val_agu = 0;
                                            $sub_target_val_sep = 0;
                                            $sub_target_val_q3 = 0;
                                            $sub_target_val_okt = 0;
                                            $sub_target_val_nop = 0;
                                            $sub_target_val_des = 0;
                                            $sub_target_val_q4 = 0;
                                            $sub_target_val_year = 0;
                                            $sub_target_val_avg = 0;
        
                                            $sub_idx_qty_jan = 0;
                                            $sub_idx_qty_feb = 0;
                                            $sub_idx_qty_mar = 0;
                                            $sub_idx_qty_q1 = 0;
                                            $sub_idx_qty_apr = 0;
                                            $sub_idx_qty_mei = 0;
                                            $sub_idx_qty_jun = 0;
                                            $sub_idx_qty_q2 = 0;
                                            $sub_idx_qty_jul = 0;
                                            $sub_idx_qty_agu = 0;
                                            $sub_idx_qty_sep = 0;
                                            $sub_idx_qty_q3 = 0;
                                            $sub_idx_qty_okt = 0;
                                            $sub_idx_qty_nop = 0;
                                            $sub_idx_qty_des = 0;
                                            $sub_idx_qty_q4 = 0;
                                            $sub_idx_qty_year = 0;
                                            $sub_idx_qty_avg = 0;
        
                                            $sub_idx_val_jan = 0;
                                            $sub_idx_val_feb = 0;
                                            $sub_idx_val_mar = 0;
                                            $sub_idx_val_q1 = 0;
                                            $sub_idx_val_apr = 0;
                                            $sub_idx_val_mei = 0;
                                            $sub_idx_val_jun = 0;
                                            $sub_idx_val_q2 = 0;
                                            $sub_idx_val_jul = 0;
                                            $sub_idx_val_agu = 0;
                                            $sub_idx_val_sep = 0;
                                            $sub_idx_val_q3 = 0;
                                            $sub_idx_val_okt = 0;
                                            $sub_idx_val_nop = 0;
                                            $sub_idx_val_des = 0;
                                            $sub_idx_val_q4 = 0;
                                            $sub_idx_val_year = 0;
                                            $sub_idx_val_avg = 0;

                                            $sub_stok_qty_jan = 0;
                                            $sub_stok_qty_feb = 0;
                                            $sub_stok_qty_mar = 0;
                                            $sub_stok_qty_q1 = 0;
                                            $sub_stok_qty_apr = 0;
                                            $sub_stok_qty_mei = 0;
                                            $sub_stok_qty_jun = 0;
                                            $sub_stok_qty_q2 = 0;
                                            $sub_stok_qty_jul = 0;
                                            $sub_stok_qty_agu = 0;
                                            $sub_stok_qty_sep = 0;
                                            $sub_stok_qty_q3 = 0;
                                            $sub_stok_qty_okt = 0;
                                            $sub_stok_qty_nop = 0;
                                            $sub_stok_qty_des = 0;
                                            $sub_stok_qty_q4 = 0;
                                            $sub_stok_qty_year = 0;
                                            $sub_stok_qty_avg = 0;

                                            $sub_stok_val_jan = 0;
                                            $sub_stok_val_feb = 0;
                                            $sub_stok_val_mar = 0;
                                            $sub_stok_val_q1 = 0;
                                            $sub_stok_val_apr = 0;
                                            $sub_stok_val_mei = 0;
                                            $sub_stok_val_jun = 0;
                                            $sub_stok_val_q2 = 0;
                                            $sub_stok_val_jul = 0;
                                            $sub_stok_val_agu = 0;
                                            $sub_stok_val_sep = 0;
                                            $sub_stok_val_q3 = 0;
                                            $sub_stok_val_okt = 0;
                                            $sub_stok_val_nop = 0;
                                            $sub_stok_val_des = 0;
                                            $sub_stok_val_q4 = 0;
                                            $sub_stok_val_year = 0;
                                            $sub_stok_val_avg = 0;
                                        }

                                        

                                    ?>

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
                                    <td class="text-right"><?= number_format($row['idx_qty_jan'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['idx_val_jan'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['stok_qty_jan'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['stok_val_jan'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['qty_feb'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_feb'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_feb'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_feb'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_feb'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['idx_val_feb'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['stok_qty_feb'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['stok_val_feb'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['qty_mar'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_mar'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_mar'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_mar'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_mar'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['idx_val_mar'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['stok_qty_mar'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['stok_val_mar'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['qty_q1'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_q1'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_q1'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_value_q1'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_q1'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['idx_val_q1'], 0);?></td>

                                    <td class="text-right"><?= number_format($row['qty_apr'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_apr'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_apr'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_apr'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_apr'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['idx_val_apr'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['stok_qty_apr'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['stok_val_apr'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['qty_mei'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_mei'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_mei'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_mei'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_mei'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['idx_val_mei'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['stok_qty_mei'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['stok_val_mei'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['qty_jun'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_jun'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_jun'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_jun'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_jun'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['idx_val_jun'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['stok_qty_jun'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['stok_val_jun'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['qty_q2'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_q2'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_q2'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_value_q2'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_q2'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['idx_val_q2'], 0);?></td>

                                    <td class="text-right"><?= number_format($row['qty_jul'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_jul'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_jul'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_jul'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_jul'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['idx_val_jul'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['stok_qty_jul'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['stok_val_jul'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['qty_agu'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_agu'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_agu'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_agu'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_agu'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['idx_val_agu'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['stok_qty_agu'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['stok_val_agu'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['qty_sep'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_sep'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_sep'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_sep'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_sep'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['idx_val_sep'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['stok_qty_sep'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['stok_val_sep'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['qty_q3'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_q3'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_q3'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_value_q3'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_q3'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['idx_val_q3'], 0);?></td>

                                    <td class="text-right"><?= number_format($row['qty_okt'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_okt'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_okt'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_okt'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_okt'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['idx_val_okt'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['stok_qty_okt'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['stok_val_okt'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['qty_nop'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_nop'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_nop'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_nop'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_nop'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['idx_val_nop'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['stok_qty_nop'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['stok_val_nop'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['qty_des'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_des'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_des'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_val_des'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_des'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['idx_val_des'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['stok_qty_des'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['stok_val_des'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['qty_q4'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_q4'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_q4'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_value_q4'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_q4'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['idx_val_q4'], 0);?></td>

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
                                    <td class="text-right"><?= number_format($idx_qty_year, 0);?></td>
                                    <td class="text-right"><?= number_format($idx_val_year, 0);?></td>
                                    <td class="text-right"><?= number_format($qty_avg, 0);?></td>
                                    <td class="text-right"><?= number_format($val_avg, 2);?></td>
                                    <td class="text-right"><?= number_format($target_qty_avg, 0);?></td>
                                    <td class="text-right"><?= number_format($target_val_avg, 2);?></td>
                                    <td class="text-right"><?= number_format($idx_qty_avg, 0);?></td>
                                    <td class="text-right"><?= number_format($idx_val_avg, 0);?></td>
                                </tr>

                                <?php $item_group = $row['item_group'] ?>
                                <?php $principal = $row['principal'] ?>

                                <?php $qty_jan += $row['qty_jan']; ?>
                                <?php $qty_feb += $row['qty_feb']; ?>
                                <?php $qty_mar += $row['qty_mar']; ?>
                                <?php $qty_q1 += $row['qty_q1']; ?>

                                <?php $qty_apr += $row['qty_apr']; ?>
                                <?php $qty_mei += $row['qty_mei']; ?>
                                <?php $qty_jun += $row['qty_jun']; ?>
                                <?php $qty_q2 += $row['qty_q2']; ?>

                                <?php $qty_jul += $row['qty_jul']; ?>
                                <?php $qty_agu += $row['qty_agu']; ?>
                                <?php $qty_sep += $row['qty_sep']; ?>
                                <?php $qty_q3 += $row['qty_q3']; ?>

                                <?php $qty_okt += $row['qty_okt']; ?>
                                <?php $qty_nop += $row['qty_nop']; ?>
                                <?php $qty_des += $row['qty_des']; ?>
                                <?php $qty_q4 += $row['qty_q4']; ?>
                                
                                <?php $val_jan += $row['value_jan']; ?>
                                <?php $val_feb += $row['value_feb']; ?>
                                <?php $val_mar += $row['value_mar']; ?>
                                <?php $val_q1 += $row['value_q1']; ?>

                                <?php $val_apr += $row['value_apr']; ?>
                                <?php $val_mei += $row['value_mei']; ?>
                                <?php $val_jun += $row['value_jun']; ?>
                                <?php $val_q2 += $row['value_q2']; ?>

                                <?php $val_jul += $row['value_jul']; ?>
                                <?php $val_agu += $row['value_agu']; ?>
                                <?php $val_sep += $row['value_sep']; ?>
                                <?php $val_q3 += $row['value_q3']; ?>

                                <?php $val_okt += $row['value_okt']; ?>
                                <?php $val_nop += $row['value_nop']; ?>
                                <?php $val_des += $row['value_des']; ?>
                                <?php $val_q4 += $row['value_q4']; ?>

                                <?php $target_qty_jan += $row['target_qty_jan']; ?>
                                <?php $target_qty_feb += $row['target_qty_feb']; ?>
                                <?php $target_qty_mar += $row['target_qty_mar']; ?>
                                <?php $target_qty_q1 += $row['target_qty_q1']; ?>

                                <?php $target_qty_apr += $row['target_qty_apr']; ?>
                                <?php $target_qty_mei += $row['target_qty_mei']; ?>
                                <?php $target_qty_jun += $row['target_qty_jun']; ?>
                                <?php $target_qty_q2 += $row['target_qty_q2']; ?>

                                <?php $target_qty_jul += $row['target_qty_jul']; ?>
                                <?php $target_qty_agu += $row['target_qty_agu']; ?>
                                <?php $target_qty_sep += $row['target_qty_sep']; ?>
                                <?php $target_qty_q3 += $row['target_qty_q3']; ?>

                                <?php $target_qty_okt += $row['target_qty_okt']; ?>
                                <?php $target_qty_nop += $row['target_qty_nop']; ?>
                                <?php $target_qty_des += $row['target_qty_des']; ?>
                                <?php $target_qty_q4 += $row['target_qty_q4']; ?>
                                
                                <?php $target_val_jan += $row['target_val_jan']; ?>
                                <?php $target_val_feb += $row['target_val_feb']; ?>
                                <?php $target_val_mar += $row['target_val_mar']; ?>
                                <?php $target_val_q1 += $row['target_value_q1']; ?>

                                <?php $target_val_apr += $row['target_val_apr']; ?>
                                <?php $target_val_mei += $row['target_val_mei']; ?>
                                <?php $target_val_jun += $row['target_val_jun']; ?>
                                <?php $target_val_q2 += $row['target_value_q2']; ?>

                                <?php $target_val_jul += $row['target_val_jul']; ?>
                                <?php $target_val_agu += $row['target_val_agu']; ?>
                                <?php $target_val_sep += $row['target_val_sep']; ?>
                                <?php $target_val_q3 += $row['target_value_q3']; ?>

                                <?php $target_val_okt += $row['target_val_okt']; ?>
                                <?php $target_val_nop += $row['target_val_nop']; ?>
                                <?php $target_val_des += $row['target_val_des']; ?>
                                <?php $target_val_q4 += $row['target_value_q4']; ?>

                                <?php $idx_qty_jan = ($qty_jan/($target_qty_jan ?: 1))*100; ?>
                                <?php $idx_qty_feb = ($qty_feb/($target_qty_feb ?: 1))*100; ?>
                                <?php $idx_qty_mar = ($qty_mar/($target_qty_mar ?: 1))*100; ?>
                                <?php $idx_qty_q1 = ($qty_q1/($target_qty_q1 ?: 1))*100; ?>

                                <?php $idx_qty_apr = ($qty_apr/($target_qty_apr ?: 1))*100; ?>
                                <?php $idx_qty_mei = ($qty_mei/($target_qty_mei ?: 1))*100; ?>
                                <?php $idx_qty_jun = ($qty_jun/($target_qty_jun ?: 1))*100; ?>
                                <?php $idx_qty_q2 = ($qty_q2/($target_qty_q2 ?: 1))*100; ?>

                                <?php $idx_qty_jul = ($qty_jul/($target_qty_jul ?: 1))*100; ?>
                                <?php $idx_qty_agu = ($qty_agu/($target_qty_agu ?: 1))*100; ?>
                                <?php $idx_qty_sep = ($qty_sep/($target_qty_sep ?: 1))*100; ?>
                                <?php $idx_qty_q3 = ($qty_q3/($target_qty_q3 ?: 1))*100; ?>

                                <?php $idx_qty_okt = ($qty_okt/($target_qty_okt ?: 1))*100; ?>
                                <?php $idx_qty_nop = ($qty_nop/($target_qty_nop ?: 1))*100; ?>
                                <?php $idx_qty_des = ($qty_des/($target_qty_des ?: 1))*100; ?>
                                <?php $idx_qty_q4 = ($qty_q4/($target_qty_q4 ?: 1))*100; ?>
                                
                                <?php $idx_val_jan = ($val_jan/($target_val_jan ?: 1))*100; ?>
                                <?php $idx_val_feb = ($val_feb/($target_val_feb ?: 1))*100; ?>
                                <?php $idx_val_mar = ($val_mar/($target_val_mar ?: 1))*100; ?>
                                <?php $idx_val_q1 = ($val_q1/($target_val_q1 ?: 1))*100; ?>

                                <?php $idx_val_apr = ($val_apr/($target_val_apr ?: 1))*100; ?>
                                <?php $idx_val_mei = ($val_mei/($target_val_mei ?: 1))*100; ?>
                                <?php $idx_val_jun = ($val_jun/($target_val_jun ?: 1))*100; ?>
                                <?php $idx_val_q2 = ($val_q2/($target_val_q2 ?: 1))*100; ?>

                                <?php $idx_val_jul = ($val_jul/($target_val_jul ?: 1))*100; ?>
                                <?php $idx_val_agu = ($val_agu/($target_val_agu ?: 1))*100; ?>
                                <?php $idx_val_sep = ($val_sep/($target_val_sep ?: 1))*100; ?>
                                <?php $idx_val_q3 = ($val_q3/($target_val_q3 ?: 1))*100; ?>

                                <?php $idx_val_okt = ($val_okt/($target_val_okt ?: 1))*100; ?>
                                <?php $idx_val_nop = ($val_nop/($target_val_nop ?: 1))*100; ?>
                                <?php $idx_val_des = ($val_des/($target_val_des ?: 1))*100; ?>
                                <?php $idx_val_q4 = ($val_q4/($target_val_q4 ?: 1))*100; ?>

                                <?php $stok_qty_jan += $row['stok_qty_jan']; ?>
                                <?php $stok_qty_feb += $row['stok_qty_feb']; ?>
                                <?php $stok_qty_mar += $row['stok_qty_mar']; ?>
                                
                                <?php $stok_qty_apr += $row['stok_qty_apr']; ?>
                                <?php $stok_qty_mei += $row['stok_qty_mei']; ?>
                                <?php $stok_qty_jun += $row['stok_qty_jun']; ?>
                                
                                <?php $stok_qty_jul += $row['stok_qty_jul']; ?>
                                <?php $stok_qty_agu += $row['stok_qty_agu']; ?>
                                <?php $stok_qty_sep += $row['stok_qty_sep']; ?>
                                
                                <?php $stok_qty_okt += $row['stok_qty_okt']; ?>
                                <?php $stok_qty_nop += $row['stok_qty_nop']; ?>
                                <?php $stok_qty_des += $row['stok_qty_des']; ?>
                                
                                <?php $stok_val_jan += $row['stok_val_jan']; ?>
                                <?php $stok_val_feb += $row['stok_val_feb']; ?>
                                <?php $stok_val_mar += $row['stok_val_mar']; ?>
                                
                                <?php $stok_val_apr += $row['stok_val_apr']; ?>
                                <?php $stok_val_mei += $row['stok_val_mei']; ?>
                                <?php $stok_val_jun += $row['stok_val_jun']; ?>
                                
                                <?php $stok_val_jul += $row['stok_val_jul']; ?>
                                <?php $stok_val_agu += $row['stok_val_agu']; ?>
                                <?php $stok_val_sep += $row['stok_val_sep']; ?>
                                
                                <?php $stok_val_okt += $row['stok_val_okt']; ?>
                                <?php $stok_val_nop += $row['stok_val_nop']; ?>
                                <?php $stok_val_des += $row['stok_val_des']; ?>
                                

                                
                                <?php $sub_qty_jan += $row['qty_jan']; ?>
                                <?php $sub_qty_feb += $row['qty_feb']; ?>
                                <?php $sub_qty_mar += $row['qty_mar']; ?>
                                <?php $sub_qty_q1 += $row['qty_q1']; ?>

                                <?php $sub_qty_apr += $row['qty_apr']; ?>
                                <?php $sub_qty_mei += $row['qty_mei']; ?>
                                <?php $sub_qty_jun += $row['qty_jun']; ?>
                                <?php $sub_qty_q2 += $row['qty_q2']; ?>

                                <?php $sub_qty_jul += $row['qty_jul']; ?>
                                <?php $sub_qty_agu += $row['qty_agu']; ?>
                                <?php $sub_qty_sep += $row['qty_sep']; ?>
                                <?php $sub_qty_q3 += $row['qty_q3']; ?>

                                <?php $sub_qty_okt += $row['qty_okt']; ?>
                                <?php $sub_qty_nop += $row['qty_nop']; ?>
                                <?php $sub_qty_des += $row['qty_des']; ?>
                                <?php $sub_qty_q4 += $row['qty_q4']; ?>
                                
                                <?php $sub_val_jan += $row['value_jan']; ?>
                                <?php $sub_val_feb += $row['value_feb']; ?>
                                <?php $sub_val_mar += $row['value_mar']; ?>
                                <?php $sub_val_q1 += $row['value_q1']; ?>

                                <?php $sub_val_apr += $row['value_apr']; ?>
                                <?php $sub_val_mei += $row['value_mei']; ?>
                                <?php $sub_val_jun += $row['value_jun']; ?>
                                <?php $sub_val_q2 += $row['value_q2']; ?>

                                <?php $sub_val_jul += $row['value_jul']; ?>
                                <?php $sub_val_agu += $row['value_agu']; ?>
                                <?php $sub_val_sep += $row['value_sep']; ?>
                                <?php $sub_val_q3 += $row['value_q3']; ?>

                                <?php $sub_val_okt += $row['value_okt']; ?>
                                <?php $sub_val_nop += $row['value_nop']; ?>
                                <?php $sub_val_des += $row['value_des']; ?>
                                <?php $sub_val_q4 += $row['value_q4']; ?>

                                <?php $sub_target_qty_jan += $row['target_qty_jan']; ?>
                                <?php $sub_target_qty_feb += $row['target_qty_feb']; ?>
                                <?php $sub_target_qty_mar += $row['target_qty_mar']; ?>
                                <?php $sub_target_qty_q1 += $row['target_qty_q1']; ?>

                                <?php $sub_target_qty_apr += $row['target_qty_apr']; ?>
                                <?php $sub_target_qty_mei += $row['target_qty_mei']; ?>
                                <?php $sub_target_qty_jun += $row['target_qty_jun']; ?>
                                <?php $sub_target_qty_q2 += $row['target_qty_q2']; ?>

                                <?php $sub_target_qty_jul += $row['target_qty_jul']; ?>
                                <?php $sub_target_qty_agu += $row['target_qty_agu']; ?>
                                <?php $sub_target_qty_sep += $row['target_qty_sep']; ?>
                                <?php $sub_target_qty_q3 += $row['target_qty_q3']; ?>

                                <?php $sub_target_qty_okt += $row['target_qty_okt']; ?>
                                <?php $sub_target_qty_nop += $row['target_qty_nop']; ?>
                                <?php $sub_target_qty_des += $row['target_qty_des']; ?>
                                <?php $sub_target_qty_q4 += $row['target_qty_q4']; ?>
                                
                                <?php $sub_target_val_jan += $row['target_val_jan']; ?>
                                <?php $sub_target_val_feb += $row['target_val_feb']; ?>
                                <?php $sub_target_val_mar += $row['target_val_mar']; ?>
                                <?php $sub_target_val_q1 += $row['target_value_q1']; ?>

                                <?php $sub_target_val_apr += $row['target_val_apr']; ?>
                                <?php $sub_target_val_mei += $row['target_val_mei']; ?>
                                <?php $sub_target_val_jun += $row['target_val_jun']; ?>
                                <?php $sub_target_val_q2 += $row['target_value_q2']; ?>

                                <?php $sub_target_val_jul += $row['target_val_jul']; ?>
                                <?php $sub_target_val_agu += $row['target_val_agu']; ?>
                                <?php $sub_target_val_sep += $row['target_val_sep']; ?>
                                <?php $sub_target_val_q3 += $row['target_value_q3']; ?>

                                <?php $sub_target_val_okt += $row['target_val_okt']; ?>
                                <?php $sub_target_val_nop += $row['target_val_nop']; ?>
                                <?php $sub_target_val_des += $row['target_val_des']; ?>
                                <?php $sub_target_val_q4 += $row['target_value_q4']; ?>

                                <?php $sub_idx_qty_jan = ($sub_qty_jan/($sub_target_qty_jan ?: 1))*100; ?>
                                <?php $sub_idx_qty_feb = ($sub_qty_feb/($sub_target_qty_feb ?: 1))*100; ?>
                                <?php $sub_idx_qty_mar = ($sub_qty_mar/($sub_target_qty_mar ?: 1))*100; ?>
                                <?php $sub_idx_qty_q1 = ($sub_qty_q1/($sub_target_qty_q1 ?: 1))*100; ?>

                                <?php $sub_idx_qty_apr = ($sub_qty_apr/($sub_target_qty_apr ?: 1))*100; ?>
                                <?php $sub_idx_qty_mei = ($sub_qty_mei/($sub_target_qty_mei ?: 1))*100; ?>
                                <?php $sub_idx_qty_jun = ($sub_qty_jun/($sub_target_qty_jun ?: 1))*100; ?>
                                <?php $sub_idx_qty_q2 = ($sub_qty_q2/($sub_target_qty_q2 ?: 1))*100; ?>

                                <?php $sub_idx_qty_jul = ($sub_qty_jul/($sub_target_qty_jul ?: 1))*100; ?>
                                <?php $sub_idx_qty_agu = ($sub_qty_agu/($sub_target_qty_agu ?: 1))*100; ?>
                                <?php $sub_idx_qty_sep = ($sub_qty_sep/($sub_target_qty_sep ?: 1))*100; ?>
                                <?php $sub_idx_qty_q3 = ($sub_qty_q3/($sub_target_qty_q3 ?: 1))*100; ?>

                                <?php $sub_idx_qty_okt = ($sub_qty_okt/($sub_target_qty_okt ?: 1))*100; ?>
                                <?php $sub_idx_qty_nop = ($sub_qty_nop/($sub_target_qty_nop ?: 1))*100; ?>
                                <?php $sub_idx_qty_des = ($sub_qty_des/($sub_target_qty_des ?: 1))*100; ?>
                                <?php $sub_idx_qty_q4 = ($sub_qty_q4/($sub_target_qty_q4 ?: 1))*100; ?>
                                
                                <?php $sub_idx_val_jan = ($sub_val_jan/($sub_target_val_jan ?: 1))*100; ?>
                                <?php $sub_idx_val_feb = ($sub_val_feb/($sub_target_val_feb ?: 1))*100; ?>
                                <?php $sub_idx_val_mar = ($sub_val_mar/($sub_target_val_mar ?: 1))*100; ?>
                                <?php $sub_idx_val_q1 = ($sub_val_q1/($sub_target_val_q1 ?: 1))*100; ?>

                                <?php $sub_idx_val_apr = ($sub_val_apr/($sub_target_val_apr ?: 1))*100; ?>
                                <?php $sub_idx_val_mei = ($sub_val_mei/($sub_target_val_mei ?: 1))*100; ?>
                                <?php $sub_idx_val_jun = ($sub_val_jun/($sub_target_val_jun ?: 1))*100; ?>
                                <?php $sub_idx_val_q2 = ($sub_val_q2/($sub_target_val_q2 ?: 1))*100; ?>

                                <?php $sub_idx_val_jul = ($sub_val_jul/($sub_target_val_jul ?: 1))*100; ?>
                                <?php $sub_idx_val_agu = ($sub_val_agu/($sub_target_val_agu ?: 1))*100; ?>
                                <?php $sub_idx_val_sep = ($sub_val_sep/($sub_target_val_sep ?: 1))*100; ?>
                                <?php $sub_idx_val_q3 = ($sub_val_q3/($sub_target_val_q3 ?: 1))*100; ?>

                                <?php $sub_idx_val_okt = ($sub_val_okt/($sub_target_val_okt ?: 1))*100; ?>
                                <?php $sub_idx_val_nop = ($sub_val_nop/($sub_target_val_nop ?: 1))*100; ?>
                                <?php $sub_idx_val_des = ($sub_val_des/($sub_target_val_des ?: 1))*100; ?>
                                <?php $sub_idx_val_q4 = ($sub_val_q4/($sub_target_val_q4 ?: 1))*100; ?>

                                <?php $sub_stok_qty_jan += $row['stok_qty_jan']; ?>
                                <?php $sub_stok_qty_feb += $row['stok_qty_feb']; ?>
                                <?php $sub_stok_qty_mar += $row['stok_qty_mar']; ?>

                                <?php $sub_stok_qty_apr += $row['stok_qty_apr']; ?>
                                <?php $sub_stok_qty_mei += $row['stok_qty_mei']; ?>
                                <?php $sub_stok_qty_jun += $row['stok_qty_jun']; ?>

                                <?php $sub_stok_qty_jul += $row['stok_qty_jul']; ?>
                                <?php $sub_stok_qty_agu += $row['stok_qty_agu']; ?>
                                <?php $sub_stok_qty_sep += $row['stok_qty_sep']; ?>

                                <?php $sub_stok_qty_okt += $row['stok_qty_okt']; ?>
                                <?php $sub_stok_qty_nop += $row['stok_qty_nop']; ?>
                                <?php $sub_stok_qty_des += $row['stok_qty_des']; ?>
                                
                                <?php $sub_stok_val_jan += $row['stok_val_jan']; ?>
                                <?php $sub_stok_val_feb += $row['stok_val_feb']; ?>
                                <?php $sub_stok_val_mar += $row['stok_val_mar']; ?>

                                <?php $sub_stok_val_apr += $row['stok_val_apr']; ?>
                                <?php $sub_stok_val_mei += $row['stok_val_mei']; ?>
                                <?php $sub_stok_val_jun += $row['stok_val_jun']; ?>

                                <?php $sub_stok_val_jul += $row['stok_val_jul']; ?>
                                <?php $sub_stok_val_agu += $row['stok_val_agu']; ?>
                                <?php $sub_stok_val_sep += $row['stok_val_sep']; ?>

                                <?php $sub_stok_val_okt += $row['stok_val_okt']; ?>
                                <?php $sub_stok_val_nop += $row['stok_val_nop']; ?>
                                <?php $sub_stok_val_des += $row['stok_val_des']; ?>

                                <?php $total_qty_jan += $row['qty_jan']; ?>
                                <?php $total_qty_feb += $row['qty_feb']; ?>
                                <?php $total_qty_mar += $row['qty_mar']; ?>
                                <?php $total_qty_q1 += $row['qty_q1']; ?>

                                <?php $total_qty_apr += $row['qty_apr']; ?>
                                <?php $total_qty_mei += $row['qty_mei']; ?>
                                <?php $total_qty_jun += $row['qty_jun']; ?>
                                <?php $total_qty_q2 += $row['qty_q2']; ?>

                                <?php $total_qty_jul += $row['qty_jul']; ?>
                                <?php $total_qty_agu += $row['qty_agu']; ?>
                                <?php $total_qty_sep += $row['qty_sep']; ?>
                                <?php $total_qty_q3 += $row['qty_q3']; ?>

                                <?php $total_qty_okt += $row['qty_okt']; ?>
                                <?php $total_qty_nop += $row['qty_nop']; ?>
                                <?php $total_qty_des += $row['qty_des']; ?>
                                <?php $total_qty_q4 += $row['qty_q4']; ?>
                                
                                <?php $total_val_jan += $row['value_jan']; ?>
                                <?php $total_val_feb += $row['value_feb']; ?>
                                <?php $total_val_mar += $row['value_mar']; ?>
                                <?php $total_val_q1 += $row['value_q1']; ?>

                                <?php $total_val_apr += $row['value_apr']; ?>
                                <?php $total_val_mei += $row['value_mei']; ?>
                                <?php $total_val_jun += $row['value_jun']; ?>
                                <?php $total_val_q2 += $row['value_q2']; ?>

                                <?php $total_val_jul += $row['value_jul']; ?>
                                <?php $total_val_agu += $row['value_agu']; ?>
                                <?php $total_val_sep += $row['value_sep']; ?>
                                <?php $total_val_q3 += $row['value_q3']; ?>

                                <?php $total_val_okt += $row['value_okt']; ?>
                                <?php $total_val_nop += $row['value_nop']; ?>
                                <?php $total_val_des += $row['value_des']; ?>
                                <?php $total_val_q4 += $row['value_q4']; ?>

                                <?php $total_target_qty_jan += $row['target_qty_jan']; ?>
                                <?php $total_target_qty_feb += $row['target_qty_feb']; ?>
                                <?php $total_target_qty_mar += $row['target_qty_mar']; ?>
                                <?php $total_target_qty_q1 += $row['target_qty_q1']; ?>

                                <?php $total_target_qty_apr += $row['target_qty_apr']; ?>
                                <?php $total_target_qty_mei += $row['target_qty_mei']; ?>
                                <?php $total_target_qty_jun += $row['target_qty_jun']; ?>
                                <?php $total_target_qty_q2 += $row['target_qty_q2']; ?>

                                <?php $total_target_qty_jul += $row['target_qty_jul']; ?>
                                <?php $total_target_qty_agu += $row['target_qty_agu']; ?>
                                <?php $total_target_qty_sep += $row['target_qty_sep']; ?>
                                <?php $total_target_qty_q3 += $row['target_qty_q3']; ?>

                                <?php $total_target_qty_okt += $row['target_qty_okt']; ?>
                                <?php $total_target_qty_nop += $row['target_qty_nop']; ?>
                                <?php $total_target_qty_des += $row['target_qty_des']; ?>
                                <?php $total_target_qty_q4 += $row['target_qty_q4']; ?>
                                
                                <?php $total_target_val_jan += $row['target_val_jan']; ?>
                                <?php $total_target_val_feb += $row['target_val_feb']; ?>
                                <?php $total_target_val_mar += $row['target_val_mar']; ?>
                                <?php $total_target_val_q1 += $row['target_value_q1']; ?>

                                <?php $total_target_val_apr += $row['target_val_apr']; ?>
                                <?php $total_target_val_mei += $row['target_val_mei']; ?>
                                <?php $total_target_val_jun += $row['target_val_jun']; ?>
                                <?php $total_target_val_q2 += $row['target_value_q2']; ?>

                                <?php $total_target_val_jul += $row['target_val_jul']; ?>
                                <?php $total_target_val_agu += $row['target_val_agu']; ?>
                                <?php $total_target_val_sep += $row['target_val_sep']; ?>
                                <?php $total_target_val_q3 += $row['target_value_q3']; ?>

                                <?php $total_target_val_okt += $row['target_val_okt']; ?>
                                <?php $total_target_val_nop += $row['target_val_nop']; ?>
                                <?php $total_target_val_des += $row['target_val_des']; ?>
                                <?php $total_target_val_q4 += $row['target_value_q4']; ?>

                                <?php $total_idx_qty_jan = ($total_qty_jan/($total_target_qty_jan ?: 1))*100; ?>
                                <?php $total_idx_qty_feb = ($total_qty_feb/($total_target_qty_feb ?: 1))*100; ?>
                                <?php $total_idx_qty_mar = ($total_qty_mar/($total_target_qty_mar ?: 1))*100; ?>
                                <?php $total_idx_qty_q1 = ($total_qty_q1/($total_target_qty_q1 ?: 1))*100; ?>

                                <?php $total_idx_qty_apr = ($total_qty_apr/($total_target_qty_apr ?: 1))*100; ?>
                                <?php $total_idx_qty_mei = ($total_qty_mei/($total_target_qty_mei ?: 1))*100; ?>
                                <?php $total_idx_qty_jun = ($total_qty_jun/($total_target_qty_jun ?: 1))*100; ?>
                                <?php $total_idx_qty_q2 = ($total_qty_q2/($total_target_qty_q2 ?: 1))*100; ?>

                                <?php $total_idx_qty_jul = ($total_qty_jul/($total_target_qty_jul ?: 1))*100; ?>
                                <?php $total_idx_qty_agu = ($total_qty_agu/($total_target_qty_agu ?: 1))*100; ?>
                                <?php $total_idx_qty_sep = ($total_qty_sep/($total_target_qty_sep ?: 1))*100; ?>
                                <?php $total_idx_qty_q3 = ($total_qty_q3/($total_target_qty_q3 ?: 1))*100; ?>

                                <?php $total_idx_qty_okt = ($total_qty_okt/($total_target_qty_okt ?: 1))*100; ?>
                                <?php $total_idx_qty_nop = ($total_qty_nop/($total_target_qty_nop ?: 1))*100; ?>
                                <?php $total_idx_qty_des = ($total_qty_des/($total_target_qty_des ?: 1))*100; ?>
                                <?php $total_idx_qty_q4 = ($total_qty_q4/($total_target_qty_q4 ?: 1))*100; ?>
                                
                                <?php $total_idx_val_jan = ($total_val_jan/($total_target_val_jan ?: 1))*100; ?>
                                <?php $total_idx_val_feb = ($total_val_feb/($total_target_val_feb ?: 1))*100; ?>
                                <?php $total_idx_val_mar = ($total_val_mar/($total_target_val_mar ?: 1))*100; ?>
                                <?php $total_idx_val_q1 = ($total_val_q1/($total_target_val_q1 ?: 1))*100; ?>

                                <?php $total_idx_val_apr = ($total_val_apr/($total_target_val_apr ?: 1))*100; ?>
                                <?php $total_idx_val_mei = ($total_val_mei/($total_target_val_mei ?: 1))*100; ?>
                                <?php $total_idx_val_jun = ($total_val_jun/($total_target_val_jun ?: 1))*100; ?>
                                <?php $total_idx_val_q2 = ($total_val_q2/($total_target_val_q2 ?: 1))*100; ?>

                                <?php $total_idx_val_jul = ($total_val_jul/($total_target_val_jul ?: 1))*100; ?>
                                <?php $total_idx_val_agu = ($total_val_agu/($total_target_val_agu ?: 1))*100; ?>
                                <?php $total_idx_val_sep = ($total_val_sep/($total_target_val_sep ?: 1))*100; ?>
                                <?php $total_idx_val_q3 = ($total_val_q3/($total_target_val_q3 ?: 1))*100; ?>

                                <?php $total_idx_val_okt = ($total_val_okt/($total_target_val_okt ?: 1))*100; ?>
                                <?php $total_idx_val_nop = ($total_val_nop/($total_target_val_nop ?: 1))*100; ?>
                                <?php $total_idx_val_des = ($total_val_des/($total_target_val_des ?: 1))*100; ?>
                                <?php $total_idx_val_q4 = ($total_val_q4/($total_target_val_q4 ?: 1))*100; ?>

                                <?php $total_stok_qty_jan += $row['stok_qty_jan']; ?>
                                <?php $total_stok_qty_feb += $row['stok_qty_feb']; ?>
                                <?php $total_stok_qty_mar += $row['stok_qty_mar']; ?>

                                <?php $total_stok_qty_apr += $row['stok_qty_apr']; ?>
                                <?php $total_stok_qty_mei += $row['stok_qty_mei']; ?>
                                <?php $total_stok_qty_jun += $row['stok_qty_jun']; ?>

                                <?php $total_stok_qty_jul += $row['stok_qty_jul']; ?>
                                <?php $total_stok_qty_agu += $row['stok_qty_agu']; ?>
                                <?php $total_stok_qty_sep += $row['stok_qty_sep']; ?>

                                <?php $total_stok_qty_okt += $row['stok_qty_okt']; ?>
                                <?php $total_stok_qty_nop += $row['stok_qty_nop']; ?>
                                <?php $total_stok_qty_des += $row['stok_qty_des']; ?>
                                
                                <?php $total_stok_val_jan += $row['stok_val_jan']; ?>
                                <?php $total_stok_val_feb += $row['stok_val_feb']; ?>
                                <?php $total_stok_val_mar += $row['stok_val_mar']; ?>

                                <?php $total_stok_val_apr += $row['stok_val_apr']; ?>
                                <?php $total_stok_val_mei += $row['stok_val_mei']; ?>
                                <?php $total_stok_val_jun += $row['stok_val_jun']; ?>

                                <?php $total_stok_val_jul += $row['stok_val_jul']; ?>
                                <?php $total_stok_val_agu += $row['stok_val_agu']; ?>
                                <?php $total_stok_val_sep += $row['stok_val_sep']; ?>

                                <?php $total_stok_val_okt += $row['stok_val_okt']; ?>
                                <?php $total_stok_val_nop += $row['stok_val_nop']; ?>
                                <?php $total_stok_val_des += $row['stok_val_des']; ?>

                                <?php $no++; endforeach; ?>

                                <?php $qty_year = $qty_jan + $qty_feb + $qty_mar + $qty_apr + $qty_mei + $qty_jun + $qty_jul + $qty_agu + $qty_sep + $qty_okt + $qty_nop + $qty_des;?>
                                <?php $val_year = $val_jan + $val_feb + $val_mar + $val_apr + $val_mei + $val_jun + $val_jul + $val_agu + $val_sep + $val_okt + $val_nop + $val_des;?>
                                <?php $target_qty_year = $target_qty_jan + $target_qty_feb + $target_qty_mar + $target_qty_apr + $target_qty_mei + $target_qty_jun + $target_qty_jul + $target_qty_agu + $target_qty_sep + $target_qty_okt + $target_qty_nop + $target_qty_des;?> 
                                <?php $target_val_year = $target_val_jan + $target_val_feb + $target_val_mar + $target_val_apr + $target_val_mei + $target_val_jun + $target_val_jul + $target_val_agu + $target_val_sep + $target_val_okt + $target_val_nop + $target_val_des;?>
                                <?php $idx_qty_year = ($qty_year/($target_qty_year ?: 1))*100;?> 
                                <?php $idx_val_year = ($val_year/($target_val_year ?: 1))*100;?> 
                                <?php $qty_avg = $qty_year/12;?>
                                <?php $val_avg = $val_year/12;?>
                                <?php $target_qty_avg = $target_qty_year/12;?>
                                <?php $target_val_avg = $target_val_year/12;?>
                                <?php $idx_qty_avg = ($qty_avg/($target_qty_avg ?: 1))*100;?>
                                <?php $idx_val_avg = ($val_avg/($target_val_avg ?: 1))*100;?>

                                <?php $sub_qty_year = $sub_qty_jan + $sub_qty_feb + $sub_qty_mar + $sub_qty_apr + $sub_qty_mei + $sub_qty_jun + $sub_qty_jul + $sub_qty_agu + $sub_qty_sep + $sub_qty_okt + $sub_qty_nop + $sub_qty_des;?>
                                <?php $sub_val_year = $sub_val_jan + $sub_val_feb + $sub_val_mar + $sub_val_apr + $sub_val_mei + $sub_val_jun + $sub_val_jul + $sub_val_agu + $sub_val_sep + $sub_val_okt + $sub_val_nop + $sub_val_des;?>
                                <?php $sub_target_qty_year = $sub_target_qty_jan + $sub_target_qty_feb + $sub_target_qty_mar + $sub_target_qty_apr + $sub_target_qty_mei + $sub_target_qty_jun + $sub_target_qty_jul + $sub_target_qty_agu + $sub_target_qty_sep + $sub_target_qty_okt + $sub_target_qty_nop + $sub_target_qty_des;?> 
                                <?php $sub_target_val_year = $sub_target_val_jan + $sub_target_val_feb + $sub_target_val_mar + $sub_target_val_apr + $sub_target_val_mei + $sub_target_val_jun + $sub_target_val_jul + $sub_target_val_agu + $sub_target_val_sep + $sub_target_val_okt + $sub_target_val_nop + $sub_target_val_des;?>
                                <?php $sub_idx_qty_year = ($sub_qty_year/($sub_target_qty_year ?: 1))*100;?> 
                                <?php $sub_idx_val_year = ($sub_val_year/($sub_target_val_year ?: 1))*100;?> 
                                <?php $sub_qty_avg = $sub_qty_year/12;?>
                                <?php $sub_val_avg = $sub_val_year/12;?>
                                <?php $sub_target_qty_avg = $sub_target_qty_year/12;?>
                                <?php $sub_target_val_avg = $sub_target_val_year/12;?>
                                <?php $sub_idx_qty_avg = ($sub_qty_avg/($sub_target_qty_avg ?: 1))*100;?>
                                <?php $sub_idx_val_avg = ($sub_val_avg/($sub_target_val_avg ?: 1))*100;?>
                                
                                <tr class="table-warning" style="font-weight:bold">
                                    <td></td>
                                    <td><?= $principal;?></td>
                                    <td><?= $item_group;?></td>
                                    <td></td>
                                    <td class="text-center">Sub Total <?= $item_group;?></td>
                                    <td></td>
                                    <td class="text-right"><?= number_format($qty_jan, 0);?></td>
                                    <td class="text-right"><?= number_format($val_jan, 2);?></td>
                                    <td class="text-right"><?= number_format($target_qty_jan, 0);?></td>
                                    <td class="text-right"><?= number_format($target_val_jan, 2);?></td>
                                    <td class="text-right"><?= number_format($idx_qty_jan, 0);?></td>
                                    <td class="text-right"><?= number_format($idx_val_jan, 0);?></td>
                                    <td class="text-right"><?= number_format($stok_qty_jan, 0);?></td>
                                    <td class="text-right"><?= number_format($stok_val_jan, 2);?></td>
                                    <td class="text-right"><?= number_format($qty_feb, 0);?></td>
                                    <td class="text-right"><?= number_format($val_feb, 2);?></td>
                                    <td class="text-right"><?= number_format($target_qty_feb, 0);?></td>
                                    <td class="text-right"><?= number_format($target_val_feb, 2);?></td>
                                    <td class="text-right"><?= number_format($idx_qty_feb, 0);?></td>
                                    <td class="text-right"><?= number_format($idx_val_feb, 0);?></td>
                                    <td class="text-right"><?= number_format($stok_qty_feb, 0);?></td>
                                    <td class="text-right"><?= number_format($stok_val_feb, 2);?></td>
                                    <td class="text-right"><?= number_format($qty_mar, 0);?></td>
                                    <td class="text-right"><?= number_format($val_mar, 2);?></td>
                                    <td class="text-right"><?= number_format($target_qty_mar, 0);?></td>
                                    <td class="text-right"><?= number_format($target_val_mar, 2);?></td>
                                    <td class="text-right"><?= number_format($idx_qty_mar, 0);?></td>
                                    <td class="text-right"><?= number_format($idx_val_mar, 0);?></td>
                                    <td class="text-right"><?= number_format($stok_qty_mar, 0);?></td>
                                    <td class="text-right"><?= number_format($stok_val_mar, 2);?></td>
                                    <td class="text-right"><?= number_format($qty_q1, 0);?></td>
                                    <td class="text-right"><?= number_format($val_q1, 2);?></td>
                                    <td class="text-right"><?= number_format($target_qty_q1, 0);?></td>
                                    <td class="text-right"><?= number_format($target_val_q1, 2);?></td>
                                    <td class="text-right"><?= number_format($idx_qty_q1, 0);?></td>
                                    <td class="text-right"><?= number_format($idx_val_q1, 0);?></td>

                                    <td class="text-right"><?= number_format($qty_apr, 0);?></td>
                                    <td class="text-right"><?= number_format($val_apr, 2);?></td>
                                    <td class="text-right"><?= number_format($target_qty_apr, 0);?></td>
                                    <td class="text-right"><?= number_format($target_val_apr, 2);?></td>
                                    <td class="text-right"><?= number_format($idx_qty_apr, 0);?></td>
                                    <td class="text-right"><?= number_format($idx_val_apr, 0);?></td>
                                    <td class="text-right"><?= number_format($stok_qty_apr, 0);?></td>
                                    <td class="text-right"><?= number_format($stok_val_apr, 2);?></td>
                                    <td class="text-right"><?= number_format($qty_mei, 0);?></td>
                                    <td class="text-right"><?= number_format($val_mei, 2);?></td>
                                    <td class="text-right"><?= number_format($target_qty_mei, 0);?></td>
                                    <td class="text-right"><?= number_format($target_val_mei, 2);?></td>
                                    <td class="text-right"><?= number_format($idx_qty_mei, 0);?></td>
                                    <td class="text-right"><?= number_format($idx_val_mei, 0);?></td>
                                    <td class="text-right"><?= number_format($stok_qty_mei, 0);?></td>
                                    <td class="text-right"><?= number_format($stok_val_mei, 2);?></td>
                                    <td class="text-right"><?= number_format($qty_jun, 0);?></td>
                                    <td class="text-right"><?= number_format($val_jun, 2);?></td>
                                    <td class="text-right"><?= number_format($target_qty_jun, 0);?></td>
                                    <td class="text-right"><?= number_format($target_val_jun, 2);?></td>
                                    <td class="text-right"><?= number_format($idx_qty_jun, 0);?></td>
                                    <td class="text-right"><?= number_format($idx_val_jun, 0);?></td>
                                    <td class="text-right"><?= number_format($stok_qty_jun, 0);?></td>
                                    <td class="text-right"><?= number_format($stok_val_jun, 2);?></td>
                                    <td class="text-right"><?= number_format($qty_q2, 0);?></td>
                                    <td class="text-right"><?= number_format($val_q2, 2);?></td>
                                    <td class="text-right"><?= number_format($target_qty_q2, 0);?></td>
                                    <td class="text-right"><?= number_format($target_val_q2, 2);?></td>
                                    <td class="text-right"><?= number_format($idx_qty_q2, 0);?></td>
                                    <td class="text-right"><?= number_format($idx_val_q2, 0);?></td>

                                    <td class="text-right"><?= number_format($qty_jul, 0);?></td>
                                    <td class="text-right"><?= number_format($val_jul, 2);?></td>
                                    <td class="text-right"><?= number_format($target_qty_jul, 0);?></td>
                                    <td class="text-right"><?= number_format($target_val_jul, 2);?></td>
                                    <td class="text-right"><?= number_format($idx_qty_jul, 0);?></td>
                                    <td class="text-right"><?= number_format($idx_val_jul, 0);?></td>
                                    <td class="text-right"><?= number_format($stok_qty_jul, 0);?></td>
                                    <td class="text-right"><?= number_format($stok_val_jul, 2);?></td>
                                    <td class="text-right"><?= number_format($qty_agu, 0);?></td>
                                    <td class="text-right"><?= number_format($val_agu, 2);?></td>
                                    <td class="text-right"><?= number_format($target_qty_agu, 0);?></td>
                                    <td class="text-right"><?= number_format($target_val_agu, 2);?></td>
                                    <td class="text-right"><?= number_format($idx_qty_agu, 0);?></td>
                                    <td class="text-right"><?= number_format($idx_val_agu, 0);?></td>
                                    <td class="text-right"><?= number_format($stok_qty_agu, 0);?></td>
                                    <td class="text-right"><?= number_format($stok_val_agu, 2);?></td>
                                    <td class="text-right"><?= number_format($qty_sep, 0);?></td>
                                    <td class="text-right"><?= number_format($val_sep, 2);?></td>
                                    <td class="text-right"><?= number_format($target_qty_sep, 0);?></td>
                                    <td class="text-right"><?= number_format($target_val_sep, 2);?></td>
                                    <td class="text-right"><?= number_format($idx_qty_sep, 0);?></td>
                                    <td class="text-right"><?= number_format($idx_val_sep, 0);?></td>
                                    <td class="text-right"><?= number_format($stok_qty_sep, 0);?></td>
                                    <td class="text-right"><?= number_format($stok_val_sep, 2);?></td>
                                    <td class="text-right"><?= number_format($qty_q3, 0);?></td>
                                    <td class="text-right"><?= number_format($val_q3, 2);?></td>
                                    <td class="text-right"><?= number_format($target_qty_q3, 0);?></td>
                                    <td class="text-right"><?= number_format($target_val_q3, 2);?></td>
                                    <td class="text-right"><?= number_format($idx_qty_q3, 0);?></td>
                                    <td class="text-right"><?= number_format($idx_val_q3, 0);?></td>

                                    <td class="text-right"><?= number_format($qty_okt, 0);?></td>
                                    <td class="text-right"><?= number_format($val_okt, 2);?></td>
                                    <td class="text-right"><?= number_format($target_qty_okt, 0);?></td>
                                    <td class="text-right"><?= number_format($target_val_okt, 2);?></td>
                                    <td class="text-right"><?= number_format($idx_qty_okt, 0);?></td>
                                    <td class="text-right"><?= number_format($idx_val_okt, 0);?></td>
                                    <td class="text-right"><?= number_format($stok_qty_okt, 0);?></td>
                                    <td class="text-right"><?= number_format($stok_val_okt, 2);?></td>
                                    <td class="text-right"><?= number_format($qty_nop, 0);?></td>
                                    <td class="text-right"><?= number_format($val_nop, 2);?></td>
                                    <td class="text-right"><?= number_format($target_qty_nop, 0);?></td>
                                    <td class="text-right"><?= number_format($target_val_nop, 2);?></td>
                                    <td class="text-right"><?= number_format($idx_qty_nop, 0);?></td>
                                    <td class="text-right"><?= number_format($idx_val_nop, 0);?></td>
                                    <td class="text-right"><?= number_format($stok_qty_nop, 0);?></td>
                                    <td class="text-right"><?= number_format($stok_val_nop, 2);?></td>
                                    <td class="text-right"><?= number_format($qty_des, 0);?></td>
                                    <td class="text-right"><?= number_format($val_des, 2);?></td>
                                    <td class="text-right"><?= number_format($target_qty_des, 0);?></td>
                                    <td class="text-right"><?= number_format($target_val_des, 2);?></td>
                                    <td class="text-right"><?= number_format($idx_qty_des, 0);?></td>
                                    <td class="text-right"><?= number_format($idx_val_des, 0);?></td>
                                    <td class="text-right"><?= number_format($stok_qty_des, 0);?></td>
                                    <td class="text-right"><?= number_format($stok_val_des, 2);?></td>
                                    <td class="text-right"><?= number_format($qty_q4, 0);?></td>
                                    <td class="text-right"><?= number_format($val_q4, 2);?></td>
                                    <td class="text-right"><?= number_format($target_qty_q4, 0);?></td>
                                    <td class="text-right"><?= number_format($target_val_q4, 2);?></td>
                                    <td class="text-right"><?= number_format($idx_qty_q4, 0);?></td>
                                    <td class="text-right"><?= number_format($idx_val_q4, 0);?></td>

                                    <td class="text-right"><?= number_format($qty_year, 0);?></td>
                                    <td class="text-right"><?= number_format($val_year, 2);?></td>
                                    <td class="text-right"><?= number_format($target_qty_year, 0);?></td>
                                    <td class="text-right"><?= number_format($target_val_year, 2);?></td>
                                    <td class="text-right"><?= number_format($idx_qty_year, 0);?></td>
                                    <td class="text-right"><?= number_format($idx_val_year, 0);?></td>
                                    <td class="text-right"><?= number_format($qty_avg, 0);?></td>
                                    <td class="text-right"><?= number_format($val_avg, 2);?></td>
                                    <td class="text-right"><?= number_format($target_qty_avg, 0);?></td>
                                    <td class="text-right"><?= number_format($target_val_avg, 2);?></td>
                                    <td class="text-right"><?= number_format($idx_qty_avg, 0);?></td>
                                    <td class="text-right"><?= number_format($idx_val_avg, 0);?></td>
                                </tr>

                                <tr class="table-danger" style="font-weight:bold">
                                    <td></td>
                                    <td><?= $principal;?></td>
                                    <td></td>
                                    <td></td>
                                    <td class="text-center">TOTAL <?= $principal;?></td>
                                    <td></td>
                                    <td class="text-right"><?= number_format($sub_qty_jan, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_val_jan, 2);?></td>
                                    <td class="text-right"><?= number_format($sub_target_qty_jan, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_target_val_jan, 2);?></td>
                                    <td class="text-right"><?= number_format($sub_idx_qty_jan, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_idx_val_jan, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_stok_qty_jan, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_stok_val_jan, 2);?></td>
                                    <td class="text-right"><?= number_format($sub_qty_feb, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_val_feb, 2);?></td>
                                    <td class="text-right"><?= number_format($sub_target_qty_feb, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_target_val_feb, 2);?></td>
                                    <td class="text-right"><?= number_format($sub_idx_qty_feb, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_idx_val_feb, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_stok_qty_feb, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_stok_val_feb, 2);?></td>
                                    <td class="text-right"><?= number_format($sub_qty_mar, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_val_mar, 2);?></td>
                                    <td class="text-right"><?= number_format($sub_target_qty_mar, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_target_val_mar, 2);?></td>
                                    <td class="text-right"><?= number_format($sub_idx_qty_mar, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_idx_val_mar, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_stok_qty_mar, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_stok_val_mar, 2);?></td>
                                    <td class="text-right"><?= number_format($sub_qty_q1, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_val_q1, 2);?></td>
                                    <td class="text-right"><?= number_format($sub_target_qty_q1, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_target_val_q1, 2);?></td>
                                    <td class="text-right"><?= number_format($sub_idx_qty_q1, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_idx_val_q1, 0);?></td>

                                    <td class="text-right"><?= number_format($sub_qty_apr, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_val_apr, 2);?></td>
                                    <td class="text-right"><?= number_format($sub_target_qty_apr, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_target_val_apr, 2);?></td>
                                    <td class="text-right"><?= number_format($sub_idx_qty_apr, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_idx_val_apr, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_stok_qty_apr, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_stok_val_apr, 2);?></td>
                                    <td class="text-right"><?= number_format($sub_qty_mei, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_val_mei, 2);?></td>
                                    <td class="text-right"><?= number_format($sub_target_qty_mei, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_target_val_mei, 2);?></td>
                                    <td class="text-right"><?= number_format($sub_idx_qty_mei, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_idx_val_mei, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_stok_qty_mei, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_stok_val_mei, 2);?></td>
                                    <td class="text-right"><?= number_format($sub_qty_jun, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_val_jun, 2);?></td>
                                    <td class="text-right"><?= number_format($sub_target_qty_jun, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_target_val_jun, 2);?></td>
                                    <td class="text-right"><?= number_format($sub_idx_qty_jun, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_idx_val_jun, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_stok_qty_jun, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_stok_val_jun, 2);?></td>
                                    <td class="text-right"><?= number_format($sub_qty_q2, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_val_q2, 2);?></td>
                                    <td class="text-right"><?= number_format($sub_target_qty_q2, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_target_val_q2, 2);?></td>
                                    <td class="text-right"><?= number_format($sub_idx_qty_q2, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_idx_val_q2, 0);?></td>

                                    <td class="text-right"><?= number_format($sub_qty_jul, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_val_jul, 2);?></td>
                                    <td class="text-right"><?= number_format($sub_target_qty_jul, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_target_val_jul, 2);?></td>
                                    <td class="text-right"><?= number_format($sub_idx_qty_jul, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_idx_val_jul, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_stok_qty_jul, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_stok_val_jul, 2);?></td>
                                    <td class="text-right"><?= number_format($sub_qty_agu, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_val_agu, 2);?></td>
                                    <td class="text-right"><?= number_format($sub_target_qty_agu, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_target_val_agu, 2);?></td>
                                    <td class="text-right"><?= number_format($sub_idx_qty_agu, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_idx_val_agu, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_stok_qty_agu, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_stok_val_agu, 2);?></td>
                                    <td class="text-right"><?= number_format($sub_qty_sep, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_val_sep, 2);?></td>
                                    <td class="text-right"><?= number_format($sub_target_qty_sep, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_target_val_sep, 2);?></td>
                                    <td class="text-right"><?= number_format($sub_idx_qty_sep, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_idx_val_sep, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_stok_qty_sep, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_stok_val_sep, 2);?></td>
                                    <td class="text-right"><?= number_format($sub_qty_q3, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_val_q3, 2);?></td>
                                    <td class="text-right"><?= number_format($sub_target_qty_q3, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_target_val_q3, 2);?></td>
                                    <td class="text-right"><?= number_format($sub_idx_qty_q3, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_idx_val_q3, 0);?></td>

                                    <td class="text-right"><?= number_format($sub_qty_okt, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_val_okt, 2);?></td>
                                    <td class="text-right"><?= number_format($sub_target_qty_okt, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_target_val_okt, 2);?></td>
                                    <td class="text-right"><?= number_format($sub_idx_qty_okt, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_idx_val_okt, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_stok_qty_okt, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_stok_val_okt, 2);?></td>
                                    <td class="text-right"><?= number_format($sub_qty_nop, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_val_nop, 2);?></td>
                                    <td class="text-right"><?= number_format($sub_target_qty_nop, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_target_val_nop, 2);?></td>
                                    <td class="text-right"><?= number_format($sub_idx_qty_nop, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_idx_val_nop, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_stok_qty_nop, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_stok_val_nop, 2);?></td>
                                    <td class="text-right"><?= number_format($sub_qty_des, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_val_des, 2);?></td>
                                    <td class="text-right"><?= number_format($sub_target_qty_des, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_target_val_des, 2);?></td>
                                    <td class="text-right"><?= number_format($sub_idx_qty_des, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_idx_val_des, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_stok_qty_des, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_stok_val_des, 2);?></td>
                                    <td class="text-right"><?= number_format($sub_qty_q4, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_val_q4, 2);?></td>
                                    <td class="text-right"><?= number_format($sub_target_qty_q4, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_target_val_q4, 2);?></td>
                                    <td class="text-right"><?= number_format($sub_idx_qty_q4, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_idx_val_q4, 0);?></td>

                                    <td class="text-right"><?= number_format($sub_qty_year, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_val_year, 2);?></td>
                                    <td class="text-right"><?= number_format($sub_target_qty_year, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_target_val_year, 2);?></td>
                                    <td class="text-right"><?= number_format($sub_idx_qty_year, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_idx_val_year, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_qty_avg, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_val_avg, 2);?></td>
                                    <td class="text-right"><?= number_format($sub_target_qty_avg, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_target_val_avg, 2);?></td>
                                    <td class="text-right"><?= number_format($sub_idx_qty_avg, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_idx_val_avg, 0);?></td>
                                </tr>

                                <?php $total_qty_year = $total_qty_jan + $total_qty_feb + $total_qty_mar + $total_qty_apr + $total_qty_mei + $total_qty_jun + $total_qty_jul + $total_qty_agu + $total_qty_sep + $total_qty_okt + $total_qty_nop + $total_qty_des;?>
                                <?php $total_val_year = $total_val_jan + $total_val_feb + $total_val_mar + $total_val_apr + $total_val_mei + $total_val_jun + $total_val_jul + $total_val_agu + $total_val_sep + $total_val_okt + $total_val_nop + $total_val_des;?>
                                <?php $total_target_qty_year = $total_target_qty_jan + $total_target_qty_feb + $total_target_qty_mar + $total_target_qty_apr + $total_target_qty_mei + $total_target_qty_jun + $total_target_qty_jul + $total_target_qty_agu + $total_target_qty_sep + $total_target_qty_okt + $total_target_qty_nop + $total_target_qty_des;?> 
                                <?php $total_target_val_year = $total_target_val_jan + $total_target_val_feb + $total_target_val_mar + $total_target_val_apr + $total_target_val_mei + $total_target_val_jun + $total_target_val_jul + $total_target_val_agu + $total_target_val_sep + $total_target_val_okt + $total_target_val_nop + $total_target_val_des;?>
                                <?php $total_idx_qty_year = ($total_qty_year/($total_target_qty_year ?: 1))*100;?> 
                                <?php $total_idx_val_year = ($total_val_year/($total_target_val_year ?: 1))*100;?> 
                                <?php $total_qty_avg = $total_qty_year/12;?>
                                <?php $total_val_avg = $total_val_year/12;?>
                                <?php $total_target_qty_avg = $total_target_qty_year/12;?>
                                <?php $total_target_val_avg = $total_target_val_year/12;?>
                                <?php $total_idx_qty_avg = ($total_qty_avg/($total_target_qty_avg ?: 1))*100;?>
                                <?php $total_idx_val_avg = ($total_val_avg/($total_target_val_avg ?: 1))*100;?>

                                <tr class="table-danger" style="font-weight:bold">
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td class="text-center">GRAND TOTAL</td>
                                    <td></td>
                                    <td class="text-right"><?= number_format($total_qty_jan, 0);?></td>
                                    <td class="text-right"><?= number_format($total_val_jan, 2);?></td>
                                    <td class="text-right"><?= number_format($total_target_qty_jan, 0);?></td>
                                    <td class="text-right"><?= number_format($total_target_val_jan, 2);?></td>
                                    <td class="text-right"><?= number_format($total_idx_qty_jan, 0);?></td>
                                    <td class="text-right"><?= number_format($total_idx_val_jan, 0);?></td>
                                    <td class="text-right"><?= number_format($total_stok_qty_jan, 0);?></td>
                                    <td class="text-right"><?= number_format($total_stok_val_jan, 2);?></td>
                                    <td class="text-right"><?= number_format($total_qty_feb, 0);?></td>
                                    <td class="text-right"><?= number_format($total_val_feb, 2);?></td>
                                    <td class="text-right"><?= number_format($total_target_qty_feb, 0);?></td>
                                    <td class="text-right"><?= number_format($total_target_val_feb, 2);?></td>
                                    <td class="text-right"><?= number_format($total_idx_qty_feb, 0);?></td>
                                    <td class="text-right"><?= number_format($total_idx_val_feb, 0);?></td>
                                    <td class="text-right"><?= number_format($total_stok_qty_feb, 0);?></td>
                                    <td class="text-right"><?= number_format($total_stok_val_feb, 2);?></td>
                                    <td class="text-right"><?= number_format($total_qty_mar, 0);?></td>
                                    <td class="text-right"><?= number_format($total_val_mar, 2);?></td>
                                    <td class="text-right"><?= number_format($total_target_qty_mar, 0);?></td>
                                    <td class="text-right"><?= number_format($total_target_val_mar, 2);?></td>
                                    <td class="text-right"><?= number_format($total_idx_qty_mar, 0);?></td>
                                    <td class="text-right"><?= number_format($total_idx_val_mar, 0);?></td>
                                    <td class="text-right"><?= number_format($total_stok_qty_mar, 0);?></td>
                                    <td class="text-right"><?= number_format($total_stok_val_mar, 2);?></td>
                                    <td class="text-right"><?= number_format($total_qty_q1, 0);?></td>
                                    <td class="text-right"><?= number_format($total_val_q1, 2);?></td>
                                    <td class="text-right"><?= number_format($total_target_qty_q1, 0);?></td>
                                    <td class="text-right"><?= number_format($total_target_val_q1, 2);?></td>
                                    <td class="text-right"><?= number_format($total_idx_qty_q1, 0);?></td>
                                    <td class="text-right"><?= number_format($total_idx_val_q1, 0);?></td>

                                    <td class="text-right"><?= number_format($total_qty_apr, 0);?></td>
                                    <td class="text-right"><?= number_format($total_val_apr, 2);?></td>
                                    <td class="text-right"><?= number_format($total_target_qty_apr, 0);?></td>
                                    <td class="text-right"><?= number_format($total_target_val_apr, 2);?></td>
                                    <td class="text-right"><?= number_format($total_idx_qty_apr, 0);?></td>
                                    <td class="text-right"><?= number_format($total_idx_val_apr, 0);?></td>
                                    <td class="text-right"><?= number_format($total_stok_qty_apr, 0);?></td>
                                    <td class="text-right"><?= number_format($total_stok_val_apr, 2);?></td>
                                    <td class="text-right"><?= number_format($total_qty_mei, 0);?></td>
                                    <td class="text-right"><?= number_format($total_val_mei, 2);?></td>
                                    <td class="text-right"><?= number_format($total_target_qty_mei, 0);?></td>
                                    <td class="text-right"><?= number_format($total_target_val_mei, 2);?></td>
                                    <td class="text-right"><?= number_format($total_idx_qty_mei, 0);?></td>
                                    <td class="text-right"><?= number_format($total_idx_val_mei, 0);?></td>
                                    <td class="text-right"><?= number_format($total_stok_qty_mei, 0);?></td>
                                    <td class="text-right"><?= number_format($total_stok_val_mei, 2);?></td>
                                    <td class="text-right"><?= number_format($total_qty_jun, 0);?></td>
                                    <td class="text-right"><?= number_format($total_val_jun, 2);?></td>
                                    <td class="text-right"><?= number_format($total_target_qty_jun, 0);?></td>
                                    <td class="text-right"><?= number_format($total_target_val_jun, 2);?></td>
                                    <td class="text-right"><?= number_format($total_idx_qty_jun, 0);?></td>
                                    <td class="text-right"><?= number_format($total_idx_val_jun, 0);?></td>
                                    <td class="text-right"><?= number_format($total_stok_qty_jun, 0);?></td>
                                    <td class="text-right"><?= number_format($total_stok_val_jun, 2);?></td>
                                    <td class="text-right"><?= number_format($total_qty_q2, 0);?></td>
                                    <td class="text-right"><?= number_format($total_val_q2, 2);?></td>
                                    <td class="text-right"><?= number_format($total_target_qty_q2, 0);?></td>
                                    <td class="text-right"><?= number_format($total_target_val_q2, 2);?></td>
                                    <td class="text-right"><?= number_format($total_idx_qty_q2, 0);?></td>
                                    <td class="text-right"><?= number_format($total_idx_val_q2, 0);?></td>

                                    <td class="text-right"><?= number_format($total_qty_jul, 0);?></td>
                                    <td class="text-right"><?= number_format($total_val_jul, 2);?></td>
                                    <td class="text-right"><?= number_format($total_target_qty_jul, 0);?></td>
                                    <td class="text-right"><?= number_format($total_target_val_jul, 2);?></td>
                                    <td class="text-right"><?= number_format($total_idx_qty_jul, 0);?></td>
                                    <td class="text-right"><?= number_format($total_idx_val_jul, 0);?></td>
                                    <td class="text-right"><?= number_format($total_stok_qty_jul, 0);?></td>
                                    <td class="text-right"><?= number_format($total_stok_val_jul, 2);?></td>
                                    <td class="text-right"><?= number_format($total_qty_agu, 0);?></td>
                                    <td class="text-right"><?= number_format($total_val_agu, 2);?></td>
                                    <td class="text-right"><?= number_format($total_target_qty_agu, 0);?></td>
                                    <td class="text-right"><?= number_format($total_target_val_agu, 2);?></td>
                                    <td class="text-right"><?= number_format($total_idx_qty_agu, 0);?></td>
                                    <td class="text-right"><?= number_format($total_idx_val_agu, 0);?></td>
                                    <td class="text-right"><?= number_format($total_stok_qty_agu, 0);?></td>
                                    <td class="text-right"><?= number_format($total_stok_val_agu, 2);?></td>
                                    <td class="text-right"><?= number_format($total_qty_sep, 0);?></td>
                                    <td class="text-right"><?= number_format($total_val_sep, 2);?></td>
                                    <td class="text-right"><?= number_format($total_target_qty_sep, 0);?></td>
                                    <td class="text-right"><?= number_format($total_target_val_sep, 2);?></td>
                                    <td class="text-right"><?= number_format($total_idx_qty_sep, 0);?></td>
                                    <td class="text-right"><?= number_format($total_idx_val_sep, 0);?></td>
                                    <td class="text-right"><?= number_format($total_stok_qty_sep, 0);?></td>
                                    <td class="text-right"><?= number_format($total_stok_val_sep, 2);?></td>
                                    <td class="text-right"><?= number_format($total_qty_q3, 0);?></td>
                                    <td class="text-right"><?= number_format($total_val_q3, 2);?></td>
                                    <td class="text-right"><?= number_format($total_target_qty_q3, 0);?></td>
                                    <td class="text-right"><?= number_format($total_target_val_q3, 2);?></td>
                                    <td class="text-right"><?= number_format($total_idx_qty_q3, 0);?></td>
                                    <td class="text-right"><?= number_format($total_idx_val_q3, 0);?></td>

                                    <td class="text-right"><?= number_format($total_qty_okt, 0);?></td>
                                    <td class="text-right"><?= number_format($total_val_okt, 2);?></td>
                                    <td class="text-right"><?= number_format($total_target_qty_okt, 0);?></td>
                                    <td class="text-right"><?= number_format($total_target_val_okt, 2);?></td>
                                    <td class="text-right"><?= number_format($total_idx_qty_okt, 0);?></td>
                                    <td class="text-right"><?= number_format($total_idx_val_okt, 0);?></td>
                                    <td class="text-right"><?= number_format($total_stok_qty_okt, 0);?></td>
                                    <td class="text-right"><?= number_format($total_stok_val_okt, 2);?></td>
                                    <td class="text-right"><?= number_format($total_qty_nop, 0);?></td>
                                    <td class="text-right"><?= number_format($total_val_nop, 2);?></td>
                                    <td class="text-right"><?= number_format($total_target_qty_nop, 0);?></td>
                                    <td class="text-right"><?= number_format($total_target_val_nop, 2);?></td>
                                    <td class="text-right"><?= number_format($total_idx_qty_nop, 0);?></td>
                                    <td class="text-right"><?= number_format($total_idx_val_nop, 0);?></td>
                                    <td class="text-right"><?= number_format($total_stok_qty_nop, 0);?></td>
                                    <td class="text-right"><?= number_format($total_stok_val_nop, 2);?></td>
                                    <td class="text-right"><?= number_format($total_qty_des, 0);?></td>
                                    <td class="text-right"><?= number_format($total_val_des, 2);?></td>
                                    <td class="text-right"><?= number_format($total_target_qty_des, 0);?></td>
                                    <td class="text-right"><?= number_format($total_target_val_des, 2);?></td>
                                    <td class="text-right"><?= number_format($total_idx_qty_des, 0);?></td>
                                    <td class="text-right"><?= number_format($total_idx_val_des, 0);?></td>
                                    <td class="text-right"><?= number_format($total_stok_qty_des, 0);?></td>
                                    <td class="text-right"><?= number_format($total_stok_val_des, 2);?></td>
                                    <td class="text-right"><?= number_format($total_qty_q4, 0);?></td>
                                    <td class="text-right"><?= number_format($total_val_q4, 2);?></td>
                                    <td class="text-right"><?= number_format($total_target_qty_q4, 0);?></td>
                                    <td class="text-right"><?= number_format($total_target_val_q4, 2);?></td>
                                    <td class="text-right"><?= number_format($total_idx_qty_q4, 0);?></td>
                                    <td class="text-right"><?= number_format($total_idx_val_q4, 0);?></td>

                                    <td class="text-right"><?= number_format($total_qty_year, 0);?></td>
                                    <td class="text-right"><?= number_format($total_val_year, 2);?></td>
                                    <td class="text-right"><?= number_format($total_target_qty_year, 0);?></td>
                                    <td class="text-right"><?= number_format($total_target_val_year, 2);?></td>
                                    <td class="text-right"><?= number_format($total_idx_qty_year, 0);?></td>
                                    <td class="text-right"><?= number_format($total_idx_val_year, 0);?></td>
                                    <td class="text-right"><?= number_format($total_qty_avg, 0);?></td>
                                    <td class="text-right"><?= number_format($total_val_avg, 2);?></td>
                                    <td class="text-right"><?= number_format($total_target_qty_avg, 0);?></td>
                                    <td class="text-right"><?= number_format($total_target_val_avg, 2);?></td>
                                    <td class="text-right"><?= number_format($total_idx_qty_avg, 0);?></td>
                                    <td class="text-right"><?= number_format($total_idx_val_avg, 0);?></td>
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