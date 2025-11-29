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
        <div class="card-body"> 
            <form action="<?= base_url; ?>/Report/sellingout_salesman" method="post">
                <div class="row">
                    <div class="col-md-12">
                      <div class="input-group mb-3">

                        <?php

                        if(isset($data))
                        {
                            $region = $data['by_region'];
                            $area = $data['by_area'];
                            $island = $data['by_island'];
                            $principal = $data['by_principal'];
                            $year = $data['by_year'];

                        }else
                        {
                            $region = "By Region";
                            $area = "By Area";
                            $island = "By Island";
                            $principal = "By Principal";
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
                            <select class="mdb-select md-form form-control" title="By Principal" name="by_principal" id="dt_principal" style="margin-left : 10px;">
                              <!-- <?php
                                if ($_SESSION['principal'] == 'ALL')
                                {
                                  echo '<option value="">By Principal</option>';
                                }else 
                              ?> -->
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
                          <div style="margin-left : 5px;">
                            <button class="btn btn-outline-primary" type="submit" style="margin-left : 10px;">Go!</button>
                            <a class="btn btn-outline-secondary" href="<?= base_url; ?>/Report/sellingout_salesman">Reset</a>
                        </div>
                        <div style="margin-left : 10px;">
                          <button class="btn float-right btn btn-outline-success" type="submit" formaction="<?= base_url; ?>/Report/export_sellingout_salesman"><i class = "fa fa-download"> Excel</i></button>
                        </div>
                      </div>

                        <!-- <div id="hasil_sale_out"></div> -->
                        <div class="table-responsive-sm text-small">
                          <table id="sale_out_salesman2" class="table table-bordered table-sm" align="left" style="font-size:85%; border: 1px solid black;">
                          <thead class="table-warning">
                              <tr>
                                <th rowspan="3" class="text-center" style="width: 5px; vertical-align: middle;">#</th>
                                <th rowspan="3" class="text-center" style="width: 300px; vertical-align: middle;">Salesman</th>
                                <th colspan="6" class="text-center">January</th>
                                <th colspan="6" class="text-center">February</th>
                                <th colspan="6" class="text-center">March</th>
                                <th colspan="6" class="text-center">April</th>
                                <th colspan="6" class="text-center">May</th>
                                <th colspan="6" class="text-center">June</th>
                                <th colspan="6" class="text-center">July</th>
                                <th colspan="6" class="text-center">August</th>
                                <th colspan="6" class="text-center">September</th>
                                <th colspan="6" class="text-center">October</th>
                                <th colspan="6" class="text-center">November</th>
                                <th colspan="6" class="text-center">December</th>
                                <th colspan="6" class="text-center" style="background-color: #FF6D6D">Total</th>
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
                                <th colspan="2" class="text-center">Actual</th>
                                <th colspan="2" class="text-center">Target</th>
                                <th colspan="2" class="text-center">Index(%)</th>
                                <th colspan="2" class="text-center">Actual</th>
                                <th colspan="2" class="text-center">Target</th>
                                <th colspan="2" class="text-center">Index(%)</th>
                                <th colspan="2" class="text-center">Actual</th>
                                <th colspan="2" class="text-center">Target</th>
                                <th colspan="2" class="text-center">Index(%)</th>
                                <th colspan="2" class="text-center">Actual</th>
                                <th colspan="2" class="text-center">Target</th>
                                <th colspan="2" class="text-center">Index(%)</th>
                                <th colspan="2" class="text-center">Actual</th>
                                <th colspan="2" class="text-center">Target</th>
                                <th colspan="2" class="text-center">Index(%)</th>
                                <th colspan="2" class="text-center">Actual</th>
                                <th colspan="2" class="text-center">Target</th>
                                <th colspan="2" class="text-center">Index(%)</th>
                                <th colspan="2" class="text-center">Actual</th>
                                <th colspan="2" class="text-center">Target</th>
                                <th colspan="2" class="text-center">Index(%)</th>
                                <th colspan="2" class="text-center">Actual</th>
                                <th colspan="2" class="text-center">Target</th>
                                <th colspan="2" class="text-center">Index(%)</th>
                                <th colspan="2" class="text-center">Actual</th>
                                <th colspan="2" class="text-center">Target</th>
                                <th colspan="2" class="text-center">Index(%)</th>
                                <th colspan="2" class="text-center" style="background-color: #FF6D6D">Actual</th>
                                <th colspan="2" class="text-center" style="background-color: #FF6D6D">Target</th>
                                <th colspan="2" class="text-center" style="background-color: #FF6D6D">Index(%)</th>
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
                                <th class="text-center" style="width: 10px;background-color: #FF6D6D">Qty</th>
                                <th class="text-center" style="width: 30px;background-color: #FF6D6D">Value</th>
                                <th class="text-center" style="width: 10px;background-color: #FF6D6D">Qty</th>
                                <th class="text-center" style="width: 30px;background-color: #FF6D6D">Value</th>
                                <th class="text-center" style="width: 10px;background-color: #FF6D6D">Qty</th>
                                <th class="text-center" style="width: 30px;background-color: #FF6D6D">Value</th>
                              </tr>
                            </thead>
                            <tbody>
                                <?php 
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

                                    $target_qty_jan = 0;
                                    $target_qty_feb = 0;
                                    $target_qty_mar = 0;
                                    $target_qty_apr = 0;
                                    $target_qty_mei = 0;
                                    $target_qty_jun = 0;
                                    $target_qty_jul = 0;
                                    $target_qty_agu = 0;
                                    $target_qty_sep = 0;
                                    $target_qty_okt = 0;
                                    $target_qty_nop = 0;
                                    $target_qty_des = 0;
                                    $target_qty_year = 0;

                                    $target_val_jan = 0;
                                    $target_val_feb = 0;
                                    $target_val_mar = 0;
                                    $target_val_apr = 0;
                                    $target_val_mei = 0;
                                    $target_val_jun = 0;
                                    $target_val_jul = 0;
                                    $target_val_agu = 0;
                                    $target_val_sep = 0;
                                    $target_val_okt = 0;
                                    $target_val_nop = 0;
                                    $target_val_des = 0;
                                    $target_val_year = 0;

                                    $idx_qty_jan = 0;
                                    $idx_qty_feb = 0;
                                    $idx_qty_mar = 0;
                                    $idx_qty_apr = 0;
                                    $idx_qty_mei = 0;
                                    $idx_qty_jun = 0;
                                    $idx_qty_jul = 0;
                                    $idx_qty_agu = 0;
                                    $idx_qty_sep = 0;
                                    $idx_qty_okt = 0;
                                    $idx_qty_nop = 0;
                                    $idx_qty_des = 0;
                                    $idx_qty_year = 0;

                                    $idx_val_jan = 0;
                                    $idx_val_feb = 0;
                                    $idx_val_mar = 0;
                                    $idx_val_apr = 0;
                                    $idx_val_mei = 0;
                                    $idx_val_jun = 0;
                                    $idx_val_jul = 0;
                                    $idx_val_agu = 0;
                                    $idx_val_sep = 0;
                                    $idx_val_okt = 0;
                                    $idx_val_nop = 0;
                                    $idx_val_des = 0;
                                    $idx_val_year = 0;

                                ?>
                                <?php $no=1; ?>
                                <?php $cust_name=''; ?>
                                <?php $salesman=''; ?>
                                <!-- D/E -->
                                <?php foreach ($data['so_salesman_year'] as $row) :?>
                                    <?php
                                        
                                    ?>

                                <tr>
                                    <td class="text-center"><?= $no;?></td>
                                    <td><?= $row['salesman'];?></td>
                                    
                                    <td class="text-right"><?= number_format($row['qty_jan'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_jan'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_jan'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_value_jan'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_jan'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['idx_value_jan'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['qty_feb'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_feb'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_feb'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_value_feb'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_feb'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['idx_value_feb'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['qty_mar'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_mar'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_mar'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_value_mar'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_mar'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['idx_value_mar'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['qty_apr'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_apr'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_apr'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_value_apr'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_apr'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['idx_value_apr'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['qty_mei'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_mei'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_mei'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_value_mei'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_mei'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['idx_value_mei'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['qty_jun'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_jun'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_jun'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_value_jun'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_jun'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['idx_value_jun'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['qty_jul'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_jul'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_jul'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_value_jul'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_jul'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['idx_value_jul'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['qty_agu'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_agu'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_agu'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_value_agu'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_agu'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['idx_value_agu'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['qty_sep'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_sep'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_sep'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_value_sep'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_sep'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['idx_value_sep'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['qty_okt'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_okt'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_okt'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_value_okt'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_okt'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['idx_value_okt'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['qty_nop'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_nop'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_nop'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_value_nop'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_nop'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['idx_value_nop'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['qty_des'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_des'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_des'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_value_des'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_des'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['idx_value_des'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['qty_total'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_exc_total'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['target_qty_total'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['target_valuel_total'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['idx_qty_total'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['idx_value_total'], 0);?></td>
                                </tr>

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
                                <?php $qty_total += $row['qty_total']; ?>

                                <?php $value_jan += $row['value_jan']; ?>
                                <?php $value_feb += $row['value_feb']; ?>
                                <?php $value_mar += $row['value_mar']; ?>
                                <?php $value_apr += $row['value_apr']; ?>
                                <?php $value_mei += $row['value_mei']; ?>
                                <?php $value_jun += $row['value_jun']; ?>
                                <?php $value_jul += $row['value_jul']; ?>
                                <?php $value_agu += $row['value_agu']; ?>
                                <?php $value_sep += $row['value_sep']; ?>
                                <?php $value_okt += $row['value_okt']; ?>
                                <?php $value_nop += $row['value_nop']; ?>
                                <?php $value_des += $row['value_des']; ?>
                                <?php $value_total += $row['value_exc_total']; ?>

                                <?php $target_qty_jan += $row['target_qty_jan']; ?>
                                <?php $target_qty_feb += $row['target_qty_feb']; ?>
                                <?php $target_qty_mar += $row['target_qty_mar']; ?>
                                <?php $target_qty_apr += $row['target_qty_apr']; ?>
                                <?php $target_qty_mei += $row['target_qty_mei']; ?>
                                <?php $target_qty_jun += $row['target_qty_jun']; ?>
                                <?php $target_qty_jul += $row['target_qty_jul']; ?>
                                <?php $target_qty_agu += $row['target_qty_agu']; ?>
                                <?php $target_qty_sep += $row['target_qty_sep']; ?>
                                <?php $target_qty_okt += $row['target_qty_okt']; ?>
                                <?php $target_qty_nop += $row['target_qty_nop']; ?>
                                <?php $target_qty_des += $row['target_qty_des']; ?>
                                <?php $target_qty_total += $row['target_qty_total']; ?>

                                <?php $target_value_jan += $row['target_value_jan']; ?>
                                <?php $target_value_feb += $row['target_value_feb']; ?>
                                <?php $target_value_mar += $row['target_value_mar']; ?>
                                <?php $target_value_apr += $row['target_value_apr']; ?>
                                <?php $target_value_mei += $row['target_value_mei']; ?>
                                <?php $target_value_jun += $row['target_value_jun']; ?>
                                <?php $target_value_jul += $row['target_value_jul']; ?>
                                <?php $target_value_agu += $row['target_value_agu']; ?>
                                <?php $target_value_sep += $row['target_value_sep']; ?>
                                <?php $target_value_okt += $row['target_value_okt']; ?>
                                <?php $target_value_nop += $row['target_value_nop']; ?>
                                <?php $target_value_des += $row['target_value_des']; ?>
                                <?php $target_value_total += $row['target_value_total']; ?>

                                <?php $idx_qty_jan += $row['idx_qty_jan']; ?>
                                <?php $idx_qty_feb += $row['idx_qty_feb']; ?>
                                <?php $idx_qty_mar += $row['idx_qty_mar']; ?>
                                <?php $idx_qty_apr += $row['idx_qty_apr']; ?>
                                <?php $idx_qty_mei += $row['idx_qty_mei']; ?>
                                <?php $idx_qty_jun += $row['idx_qty_jun']; ?>
                                <?php $idx_qty_jul += $row['idx_qty_jul']; ?>
                                <?php $idx_qty_agu += $row['idx_qty_agu']; ?>
                                <?php $idx_qty_sep += $row['idx_qty_sep']; ?>
                                <?php $idx_qty_okt += $row['idx_qty_okt']; ?>
                                <?php $idx_qty_nop += $row['idx_qty_nop']; ?>
                                <?php $idx_qty_des += $row['idx_qty_des']; ?>
                                <?php $idx_qty_total += $row['idx_qty_total']; ?>

                                <?php $idx_value_jan += $row['idx_value_jan']; ?>
                                <?php $idx_value_feb += $row['idx_value_feb']; ?>
                                <?php $idx_value_mar += $row['idx_value_mar']; ?>
                                <?php $idx_value_apr += $row['idx_value_apr']; ?>
                                <?php $idx_value_mei += $row['idx_value_mei']; ?>
                                <?php $idx_value_jun += $row['idx_value_jun']; ?>
                                <?php $idx_value_jul += $row['idx_value_jul']; ?>
                                <?php $idx_value_agu += $row['idx_value_agu']; ?>
                                <?php $idx_value_sep += $row['idx_value_sep']; ?>
                                <?php $idx_value_okt += $row['idx_value_okt']; ?>
                                <?php $idx_value_nop += $row['idx_value_nop']; ?>
                                <?php $idx_value_des += $row['idx_value_des']; ?>
                                <?php $idx_value_total += $row['idx_value_total']; ?>

                                <?php $no++; endforeach; ?>

                                <tr class="table-danger" style="font-weight:bold">
                                  <td class="text-center"></td>
                                  <td class="text-center">TOTAL</td>
                                  <td class="text-right"><?= number_format($qty_jan, 0);?></td>
                                  <td class="text-right"><?= number_format($value_jan, 2);?></td>
                                  <td class="text-right"><?= number_format($target_qty_jan, 0);?></td>
                                  <td class="text-right"><?= number_format($target_value_jan, 2);?></td>
                                  <td class="text-right"><?= number_format($idx_qty_jan, 0);?></td>
                                  <td class="text-right"><?= number_format($idx_value_jan, 0);?></td>
                                  <td class="text-right"><?= number_format($qty_feb, 0);?></td>
                                  <td class="text-right"><?= number_format($value_feb, 2);?></td>
                                  <td class="text-right"><?= number_format($target_qty_feb, 0);?></td>
                                  <td class="text-right"><?= number_format($target_value_feb, 2);?></td>
                                  <td class="text-right"><?= number_format($idx_qty_feb, 0);?></td>
                                  <td class="text-right"><?= number_format($idx_value_feb, 0);?></td>
                                  <td class="text-right"><?= number_format($qty_mar, 0);?></td>
                                  <td class="text-right"><?= number_format($value_mar, 2);?></td>
                                  <td class="text-right"><?= number_format($target_qty_mar, 0);?></td>
                                  <td class="text-right"><?= number_format($target_value_mar, 2);?></td>
                                  <td class="text-right"><?= number_format($idx_qty_mar, 0);?></td>
                                  <td class="text-right"><?= number_format($idx_value_mar, 0);?></td>
                                  <td class="text-right"><?= number_format($qty_apr, 0);?></td>
                                  <td class="text-right"><?= number_format($value_apr, 2);?></td>
                                  <td class="text-right"><?= number_format($target_qty_apr, 0);?></td>
                                  <td class="text-right"><?= number_format($target_value_apr, 2);?></td>
                                  <td class="text-right"><?= number_format($idx_qty_apr, 0);?></td>
                                  <td class="text-right"><?= number_format($idx_value_apr, 0);?></td>
                                  <td class="text-right"><?= number_format($qty_mei, 0);?></td>
                                  <td class="text-right"><?= number_format($value_mei, 2);?></td>
                                  <td class="text-right"><?= number_format($target_qty_mei, 0);?></td>
                                  <td class="text-right"><?= number_format($target_value_mei, 2);?></td>
                                  <td class="text-right"><?= number_format($idx_qty_mei, 0);?></td>
                                  <td class="text-right"><?= number_format($idx_value_mei, 0);?></td>
                                  <td class="text-right"><?= number_format($qty_jun, 0);?></td>
                                  <td class="text-right"><?= number_format($value_jun, 2);?></td>
                                  <td class="text-right"><?= number_format($target_qty_jun, 0);?></td>
                                  <td class="text-right"><?= number_format($target_value_jun, 2);?></td>
                                  <td class="text-right"><?= number_format($idx_qty_jun, 0);?></td>
                                  <td class="text-right"><?= number_format($idx_value_jun, 0);?></td>
                                  <td class="text-right"><?= number_format($qty_jul, 0);?></td>
                                  <td class="text-right"><?= number_format($value_jul, 2);?></td>
                                  <td class="text-right"><?= number_format($target_qty_jul, 0);?></td>
                                  <td class="text-right"><?= number_format($target_value_jul, 2);?></td>
                                  <td class="text-right"><?= number_format($idx_qty_jul, 0);?></td>
                                  <td class="text-right"><?= number_format($idx_value_jul, 0);?></td>
                                  <td class="text-right"><?= number_format($qty_agu, 0);?></td>
                                  <td class="text-right"><?= number_format($value_agu, 2);?></td>
                                  <td class="text-right"><?= number_format($target_qty_agu, 0);?></td>
                                  <td class="text-right"><?= number_format($target_value_agu, 2);?></td>
                                  <td class="text-right"><?= number_format($idx_qty_agu, 0);?></td>
                                  <td class="text-right"><?= number_format($idx_value_agu, 0);?></td>
                                  <td class="text-right"><?= number_format($qty_sep, 0);?></td>
                                  <td class="text-right"><?= number_format($value_sep, 2);?></td>
                                  <td class="text-right"><?= number_format($target_qty_sep, 0);?></td>
                                  <td class="text-right"><?= number_format($target_value_sep, 2);?></td>
                                  <td class="text-right"><?= number_format($idx_qty_sep, 0);?></td>
                                  <td class="text-right"><?= number_format($idx_value_sep, 0);?></td>
                                  <td class="text-right"><?= number_format($qty_okt, 0);?></td>
                                  <td class="text-right"><?= number_format($value_okt, 2);?></td>
                                  <td class="text-right"><?= number_format($target_qty_okt, 0);?></td>
                                  <td class="text-right"><?= number_format($target_value_okt, 2);?></td>
                                  <td class="text-right"><?= number_format($idx_qty_okt, 0);?></td>
                                  <td class="text-right"><?= number_format($idx_value_okt, 0);?></td>
                                  <td class="text-right"><?= number_format($qty_nop, 0);?></td>
                                  <td class="text-right"><?= number_format($value_nop, 2);?></td>
                                  <td class="text-right"><?= number_format($target_qty_nop, 0);?></td>
                                  <td class="text-right"><?= number_format($target_value_nop, 2);?></td>
                                  <td class="text-right"><?= number_format($idx_qty_nop, 0);?></td>
                                  <td class="text-right"><?= number_format($idx_value_nop, 0);?></td>
                                  <td class="text-right"><?= number_format($qty_des, 0);?></td>
                                  <td class="text-right"><?= number_format($value_des, 2);?></td>
                                  <td class="text-right"><?= number_format($target_qty_des, 0);?></td>
                                  <td class="text-right"><?= number_format($target_value_des, 2);?></td>
                                  <td class="text-right"><?= number_format($idx_qty_des, 0);?></td>
                                  <td class="text-right"><?= number_format($idx_value_des, 0);?></td>
                                  <td class="text-right"><?= number_format($qty_total, 0);?></td>
                                  <td class="text-right"><?= number_format($value_total, 2);?></td>
                                  <td class="text-right"><?= number_format($target_qty_total, 0);?></td>
                                  <td class="text-right"><?= number_format($target_value_total, 2);?></td>
                                  <td class="text-right"><?= number_format($idx_qty_total, 0);?></td>
                                  <td class="text-right"><?= number_format($idx_value_total, 0);?></td>
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