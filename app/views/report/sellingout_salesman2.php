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
                          <div style="margin-left : 5px;">
                            <button class="btn btn-outline-primary" type="submit" style="margin-left : 10px;">Go!</button>
                            <a class="btn btn-outline-secondary" href="<?= base_url; ?>/Report/sellingout_salesman">Reset</a>
                        </div>
                      </div>

                        <!-- <div id="hasil_sale_out"></div> -->
                        <div class="table-responsive-sm text-small">
                          <table id="sale_out_salesman2" class="table table-bordered table-sm" align="left" style="font-size:85%; border: 1px solid black;">
                          <thead class="table-warning">
                              <tr>
                                <th rowspan="2" class="text-center" style="width: 5px; vertical-align: middle;">#</th>
                                <th rowspan="2" class="text-center" style="width: 300px; vertical-align: middle;">Salesman</th>
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
                                <th colspan="2" class="text-center" style="background-color: #FF6D6D">Total</th>
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
                                <th class="text-center" style="width: 10px;background-color: #FF6D6D">Qty</th>
                                <th class="text-center" style="width: 30px;background-color: #FF6D6D">Value</th>
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
                                    $qtytotal = 0;

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
                                    $valtotal = 0;

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
                                    <td class="text-right"><?= number_format($row['qty_1'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_exc_1'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['qty_2'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_exc_2'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['qty_3'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_exc_3'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['qty_4'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_exc_4'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['qty_5'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_exc_5'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['qty_6'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_exc_6'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['qty_7'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_exc_7'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['qty_8'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_exc_8'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['qty_9'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_exc_9'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['qty_10'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_exc_10'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['qty_11'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_exc_11'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['qty_12'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_exc_12'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['qty_total'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['value_exc_total'], 2);?></td>
                                </tr>

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
                                <?php $qtytotal += $row['qty_total']; ?>

                                <?php $val1 += $row['value_exc_1']; ?>
                                <?php $val2 += $row['value_exc_2']; ?>
                                <?php $val3 += $row['value_exc_3']; ?>
                                <?php $val4 += $row['value_exc_4']; ?>
                                <?php $val5 += $row['value_exc_5']; ?>
                                <?php $val6 += $row['value_exc_6']; ?>
                                <?php $val7 += $row['value_exc_7']; ?>
                                <?php $val8 += $row['value_exc_8']; ?>
                                <?php $val9 += $row['value_exc_9']; ?>
                                <?php $val10 += $row['value_exc_10']; ?>
                                <?php $val11 += $row['value_exc_11']; ?>
                                <?php $val12 += $row['value_exc_12']; ?>
                                <?php $valtotal += $row['value_exc_total']; ?>

                                <?php $no++; endforeach; ?>

                                <tr class="table-danger" style="font-weight:bold">
                                  <td class="text-center"></td>
                                  <td class="text-center">TOTAL</td>
                                  <td class="text-right"><?= number_format($qty1, 0);?></td>
                                  <td class="text-right"><?= number_format($val1, 2);?></td>
                                  <td class="text-right"><?= number_format($qty2, 0);?></td>
                                  <td class="text-right"><?= number_format($val2, 2);?></td>
                                  <td class="text-right"><?= number_format($qty3, 0);?></td>
                                  <td class="text-right"><?= number_format($val3, 2);?></td>
                                  <td class="text-right"><?= number_format($qty4, 0);?></td>
                                  <td class="text-right"><?= number_format($val4, 2);?></td>
                                  <td class="text-right"><?= number_format($qty5, 0);?></td>
                                  <td class="text-right"><?= number_format($val5, 2);?></td>
                                  <td class="text-right"><?= number_format($qty6, 0);?></td>
                                  <td class="text-right"><?= number_format($val6, 2);?></td>
                                  <td class="text-right"><?= number_format($qty7, 0);?></td>
                                  <td class="text-right"><?= number_format($val7, 2);?></td>
                                  <td class="text-right"><?= number_format($qty8, 0);?></td>
                                  <td class="text-right"><?= number_format($val8, 2);?></td>
                                  <td class="text-right"><?= number_format($qty9, 0);?></td>
                                  <td class="text-right"><?= number_format($val9, 2);?></td>
                                  <td class="text-right"><?= number_format($qty10, 0);?></td>
                                  <td class="text-right"><?= number_format($val10, 2);?></td>
                                  <td class="text-right"><?= number_format($qty11, 0);?></td>
                                  <td class="text-right"><?= number_format($val11, 2);?></td>
                                  <td class="text-right"><?= number_format($qty12, 0);?></td>
                                  <td class="text-right"><?= number_format($val12, 2);?></td>
                                  <td class="text-right"><?= number_format($qtytotal, 0);?></td>
                                  <td class="text-right"><?= number_format($valtotal, 2);?></td>
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