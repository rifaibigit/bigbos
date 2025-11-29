  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <?php
              $dateObj1   = DateTime::createFromFormat('!m', $data['by_month1']);
              $dateObj2   = DateTime::createFromFormat('!m', $data['by_month2']);
              $monthName1 = $dateObj1->format('M');
              $monthName2 = $dateObj2->format('M');
            ?>
            <!-- <h3>Contribution Summary - LORD (<?php echo $monthName1. ' To ' .$monthName2;?>)</h3>  -->
            <h3><?= $data['title']; ?></h3>
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

            <form action="<?= base_url; ?>/Report/sellingout_contribution" method="post">
                <div class="row">
                    <div class="col-md-12">
                      <div class="input-group mb-3">

                        <?php

                        if(isset($data))
                        {
                            $region = $data['by_region'];
                            $area = $data['by_area'];
                            $island = $data['by_island'];
                            $month1 = $data['by_month1'];
                            $month2 = $data['by_month2'];
                            $year = $data['by_year'];

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
                            <div class="row" style="margin-left : 20px; width:150px;">
                              <div></div>
                              <select name="by_month1" title="MONTH" class="mdb-select md-form form-control" style="margin-left : 10px;  width:135px;">
                                <option <?php if( $month1=='1' or $month1=='1' ){echo 'selected'; } ?> value="1">Januari</option>
                                <option <?php if( $month1=='2' or $month1=='2' ){echo 'selected'; } ?> value="2">Februari</option>
                                <option <?php if( $month1=='3' or $month1=='3' ){echo 'selected'; } ?> value="3">Maret</option>
                                <option <?php if( $month1=='4' or $month1=='4' ){echo 'selected'; } ?> value="4">April</option>
                                <option <?php if( $month1=='5' or $month1=='5' ){echo 'selected'; } ?> value="5">Mei</option>
                                <option <?php if( $month1=='6' or $month1=='6' ){echo 'selected'; } ?> value="6">Juni</option>
                                <option <?php if( $month1=='7' or $month1=='7' ){echo 'selected'; } ?> value="7">Juli</option>
                                <option <?php if( $month1=='8' or $month1=='8' ){echo 'selected'; } ?> value="8">Agustus</option>
                                <option <?php if( $month1=='9' or $month1=='9' ){echo 'selected'; } ?> value="9">September</option>
                                <option <?php if( $month1=='10' or $month1=='10'){echo 'selected'; } ?> value="10">Oktober</option>
                                <option <?php if( $month1=='11' or $month1=='11'){echo 'selected'; } ?> value="11">Nopember</option>
                                <option <?php if( $month1=='12' or $month1=='12'){echo 'selected'; } ?> value="12">Desember</option>
                              </select>
                            </div>
                            <div class="row" style="margin-left : 0px;">
                              <div style="margin-left : 8px;margin-right : 10px; margin-top: 5px;">
                                <label>To</label>
                              </div>
                              <select name="by_month2" title="MONTH" class="mdb-select md-form form-control" style="margin-left : 10px;  width:135px;">
                                <option <?php if( $month2=='1' or $month2=='1' ){echo 'selected'; } ?> value="1">Januari</option>
                                <option <?php if( $month2=='2' or $month2=='2' ){echo 'selected'; } ?> value="2">Februari</option>
                                <option <?php if( $month2=='3' or $month2=='3' ){echo 'selected'; } ?> value="3">Maret</option>
                                <option <?php if( $month2=='4' or $month2=='4' ){echo 'selected'; } ?> value="4">April</option>
                                <option <?php if( $month2=='5' or $month2=='5' ){echo 'selected'; } ?> value="5">Mei</option>
                                <option <?php if( $month2=='6' or $month2=='6' ){echo 'selected'; } ?> value="6">Juni</option>
                                <option <?php if( $month2=='7' or $month2=='7' ){echo 'selected'; } ?> value="7">Juli</option>
                                <option <?php if( $month2=='8' or $month2=='8' ){echo 'selected'; } ?> value="8">Agustus</option>
                                <option <?php if( $month2=='9' or $month2=='9' ){echo 'selected'; } ?> value="9">September</option>
                                <option <?php if( $month2=='10' or $month2=='10'){echo 'selected'; } ?> value="10">Oktober</option>
                                <option <?php if( $month2=='11' or $month2=='11'){echo 'selected'; } ?> value="11">Nopember</option>
                                <option <?php if( $month2=='12' or $month2=='12'){echo 'selected'; } ?> value="12">Desember</option>
                              </select>
                            </div>
                            <div style="margin-left : 20px; width : 80px;">
                              <input name="by_year" class="mdb-select md-form form-control" type="number" min="1900" max="2099" step="1" value="<?= $year ;?>" />
                            </div>
                            <div style="margin-left : 10px;">
                              <button class="btn btn-outline-primary" type="submit" style="margin-left : 10px;">Go!</button>
                              <a class="btn btn-outline-secondary" href="<?= base_url; ?>/Report/contribution_lord">Reset</a>
                            </div>
                            
                      </div>

                        <!-- <div id="hasil_sale_out"></div> -->
                        <div class="table-responsive-sm text-small">
                          <table id="contr" class="table table-bordered table-sm" align="left" style="font-size:70%; border: 1px solid black;">
                          <thead class="table-warning">

                            <?php
                                foreach ($data['sku_count'] as $row) :
                                    $count = $row['item_row'];
                                endforeach
                            ?>

                              <tr>
                                <th rowspan="3" class="text-center" style="width: 5px; vertical-align: middle;">#</th>
                                <th rowspan="3" class="text-center" style="width: 80px; vertical-align: middle;">CHANNEL</th>
                                <th rowspan="3" class="text-center" style="width: 150px; vertical-align: middle;">TYPE OF OUTLET</th>
                                <th rowspan="3" class="text-center" style="width: 30px; vertical-align: middle;">Code</th>
                                <th rowspan="3" class="text-center" style="width: 15px; vertical-align: middle;">RO</th>
                                <?php foreach ($data['sku_group'] as $row) :?>
                                <th colspan="<?= $row['count_name']*2;?>" class="text-center"><?= $row['item_group'];?></th>
                                <?php endforeach ?>
                                <th rowspan="2" colspan="2" class="text-center" style="vertical-align: middle; background-color: #FF6D6D;">TOTAL</th>
                              </tr>
                              <tr style="line-height: 12px; vertical-align: middle;">
                                <?php foreach ($data['sku_name'] as $row) :?>
                                <th colspan="2" class="text-center" style="vertical-align: middle;"><?= $row['item_name'];?></th>
                                <?php endforeach ?>  
                              </tr>                  
                              <tr style="line-height: 10px; vertical-align: middle;">
                                <?php 
                                    for($i=1;$i<=$count;$i++){
                                        echo '<th class="text-center" style="width: 30px">Qty</th>';
                                        echo '<th class="text-center" style="width: 50px">Value</th>';
                                    } 
                                    echo '<th class="text-center" style="width: 30px; background-color: #FF6D6D;">Qty</th>';
                                    echo '<th class="text-center" style="width: 50px; background-color: #FF6D6D;">Value</th>';
                                ?> 
                              </tr>
                            </thead>
                            <tbody>

                                <?php $no=1; ?>
                                <?php $channel=''; ?>

                                <!-- <?php// echo '<pre>'; print_r($data['so_contr']); echo '</pre>';?> -->

                                <?php
                                  
                                ?>

                                <!-- Online -->
                                <!-- <?php foreach ($data['so_contr'] as $row) :?>

                                    <?php
                                      if ($channel != $row['channel'] and $channel != '')
                                      {

                                        

                                      }
                                    ?>

                                    <tr>
                                        <td class="text-center"><?= $no; ?></td>
                                        <td><?= $row['channel'];?></td>
                                        <td><?= $row['desc_type'];?></td>
                                        <td><?= $row['outlet_type'];?></td>
                                        <td class="text-right">0</td>
                                        <?php
                                            $total_qty = 0;
                                            $total_val = 0;
                                            $ttl_qty = 0;
                                            $ttl_val = 0;
                                            $i = 0;
                                            $j = 0;
                                            $subqty = [];
                                            $subval = [];
                                            $sub_qty = 0;
                                            $count_qty = 0;
                                            $count_val = 0;
                                        ?>
                                        
                                        <?php foreach ($data['sku_code'] as $row2) :?>
                                            <?php 
                                                //$qty = [];
                                                $col = [];
                                                $col2 = '';
                                                $array_col = array();
                                                $qty = 'qty_' . str_replace('.', '',$row2['item_code']);
                                                $val = 'val_' . str_replace('.', '',$row2['item_code']);
                                                //$col2 = $col2 . str_replace('.', '',$row2['item_code']) . ',';
                                                //array_push($col, $qty, $val);
                                                
                                            ?>
                                            <td class="text-right"><?= number_format($row[$qty], 0);?></td>
                                            <td class="text-right"><?= number_format($row[$val], 2);?></td>

                                            <?php
                                                $total_qty = $total_qty + $row[$qty];
                                                $total_val = $total_val + $row[$val];
                                                $sub_qty += $row[$qty];
                                                $i++;
                                            ?>
                                            
                                        <?php endforeach; ?>
                                        <?php 
                                          //echo($col);
                                        ?>

                                        <td class="text-right"><?= number_format($total_qty, 0);?></td>
                                        <td class="text-right"><?= number_format($total_val, 2);?></td>
                                    </tr>

                                    <?php $channel = $row['channel']; ?>
                                    
                                <?php $no++; endforeach; ?> -->

                                <?php

                                foreach($data['so_contr'] as $v){
                                    echo "<tr>";
                                    foreach($v as $vv){
                                        echo "<td>{$vv}</td>";
                                    }
                                    echo "<tr>";
                                }

                                ?>

                                <?php
                                    //print_r($col);
                                    //echo $col2;
                                ?>

                                <tr class="table-danger" style="font-weight:bold;">
                                    <td></td>
                                    <td></td>
                                    <td class="text-center">TOTAL</td>
                                    <td></td>
                                    <td class="text-right">0</td>

                                    <?php foreach ($data['total_item'] as $row3) :?>
                                        <td class="text-right"><?= number_format($row3['qty'], 0);?></td>
                                        <td class="text-right"><?= number_format($row3['val'], 2);?></td>
                                        <?php
                                            $ttl_qty = $ttl_qty + $row3['qty'];
                                            $ttl_val = $ttl_val + $row3['val'];
                                        ?>
                                    <?php endforeach; ?>

                                    <td class="text-right"><?= number_format($ttl_qty, 0);?></td>
                                    <td class="text-right"><?= number_format($ttl_val, 2);?></td>

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