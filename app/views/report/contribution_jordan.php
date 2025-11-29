  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <?php
              $dateObj1   = DateTime::createFromFormat('!m', $data['by_month1']);
              $dateObj2   = DateTime::createFromFormat('!m', $data['by_month2']);
              $monthName1 = $dateObj1->format('M');
              $monthName2 = $dateObj2->format('M');
            ?>
            <h1>Contribution Summary - JORDAN (<?php echo $monthName1. ' To ' .$monthName2;?>)</h1> 
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
            <form action="<?= base_url; ?>/Report/contribution_jordan" method="post">
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
                            <div class="row" style="margin-left : 10px; width:110px;">
                              <div></div>
                              <select name="by_month1" title="MONTH" class="mdb-select md-form form-control" style="margin-left : 10px;  width:110px;">
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
                            <div class="row" style="margin-left : 5px;">
                              <div style="margin-left : 8px;margin-right : 10px; margin-top: 5px;">
                                <label>To</label>
                              </div>
                              <select name="by_month2" title="MONTH" class="mdb-select md-form form-control" style="margin-left : 10px;  width:110px;">
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
                            <div style="margin-left : 10px; width : 75px;">
                              <input name="by_year" class="mdb-select md-form form-control" type="number" min="1900" max="2099" step="1" value="<?= $year ;?>" />
                            </div>
                            <div style="margin-left : 5px;">
                              <button class="btn btn-outline-primary" type="submit">Go!</button>
                              <a class="btn btn-outline-secondary" href="<?= base_url; ?>/Report/contribution_jordan">Reset</a>
                            </div>
                            <div style="margin-left : 5px;">
                              <button class="btn float-right btn btn-outline-success" type="submit" formaction="<?= base_url; ?>/Report/export_contribution_jordan"><i class = "fa fa-download"> Excel</i></button> 
                            </div>
                        </div>

                        <div class="table-responsive-sm text-small">
                          <table id="contr2" class="table table-bordered table-sm" align="left" style="font-size:85%; border: 1px solid black;table-layout: fixed;">
                            <thead class="table-warning">

                            <?php
                                // foreach ($data['sku_count'] as $row) :
                                //     $count += $row['item_row'];
                                // endforeach
                                $count = $data['sku_count']['item_row'];
                            ?>

                              <tr>
                                <th rowspan="3" class="text-center" style="width: 5px; vertical-align: middle;">#</th>
                                <th rowspan="3" class="text-center" style="width: 200px !important; vertical-align: middle;">TYPE OF OUTLET</th>
                                <th rowspan="3" class="text-center" style="width: 50px; vertical-align: middle;">Code</th>
                                <th rowspan="3" class="text-center" style="width: 40px; vertical-align: middle;">RO</th>
                                <?php foreach ($data['sku_group'] as $row) :?>
                                <th colspan="<?= $row['count_name']*4;?>" class="text-center"><?= $row['item_group'];?></th>
                                <?php endforeach ?>
                                <th rowspan="2" colspan="2" class="text-center" style="vertical-align: middle; background-color: #FF6D6D;">TOTAL</th>
                              </tr>
                              <tr style="line-height: 12px; vertical-align: middle;">
                                <?php foreach ($data['sku_name'] as $row) :?>
                                <th colspan="4" class="text-center" style="vertical-align: middle;"><?= $row['item_name'];?></th>
                                <?php endforeach ?>  
                              </tr>                  
                              <tr style="line-height: 10px; vertical-align: middle;">
                                <?php for($i=1;$i<=$count;$i++){
                                    echo '<th class="text-center" style="width: 70px; vertical-align: middle;">Qty</th>';
                                    echo '<th class="text-center" style="width: 70px; vertical-align: middle;">Cont %</th>';
                                    echo '<th class="text-center" style="width: 70px; vertical-align: middle;">Value</th>';
                                    echo '<th class="text-center" style="width: 70px; vertical-align: middle;">Cont %</th>';
                                } 
                                echo '<th class="text-center" style="width: 70px; background-color: #FF6D6D; vertical-align: middle;">Qty</th>';
                                echo '<th class="text-center" style="width: 70px; background-color: #FF6D6D; vertical-align: middle;">Value</th>';
                                ?> 
                              </tr>
                            </thead>
                            <tbody>

                            <?php

                              
                              $sub_RO = 0;
                              $x=1;
                              foreach($data['sku_code'] as $sku):
                                $sub_qty[$x] = 0;
                                $sub_qty_p[$x] = 0;
                                $sub_val[$x] = 0;
                                $sub_val_p[$x] = 0;
                                $total_qty[$x] = 0;
                                $total_qty_p[$x] = 0;
                                $total_val[$x] = 0;
                                $total_val_p[$x] = 0;
                                $x++;
                              endforeach;
                      
                              $sub_total_qty = 0;
                              $sub_total_val = 0;

                              $total_RO = 0;
                              $total_total_qty = 0;
                              $total_total_val = 0;

                            ?>

                            <?php $no=1; ?>
                            <?php $channel=''; ?>
                            
                                <!-- Online -->
                                <?php foreach ($data['cont_jordan'] as $row) :?>

                                    <?php
                                        if ($channel != $row['channel'] and $channel != '')
                                        {

                                            echo '<tr class="table-warning text-center" style="font-weight:bold;">';
                                                echo '<td></td>';
                                                echo '<td>' .$channel. '</td>';
                                                echo '<td>TOTAL</td>';
                                                echo '<td class="text-right">' .number_format($sub_RO, 0). '</td>';
                                                $x = 1;
                                                foreach($data['sku_code'] as $sku):
                                                  echo '<td class="text-right">' .number_format($sub_qty[$x], 0). '</td>';
                                                  echo '<td class="text-right">' .number_format($sub_qty_p[$x], 2). '</td>';
                                                  echo '<td class="text-right">' .number_format($sub_val[$x], 0). '</td>';
                                                  echo '<td class="text-right">' .number_format($sub_val_p[$x], 2). '</td>';
                                                  $sub_RO = 0;
                                                  $sub_qty[$x] = 0;
                                                  $sub_qty_p[$x] = 0;
                                                  $sub_val[$x] = 0;
                                                  $sub_val_p[$x] = 0;
                                                  $x++;
                                                endforeach;                                                
                                                echo '<td class="text-right">' .number_format($sub_total_qty, 0). '</td>';
                                                echo '<td class="text-right">' .number_format($sub_total_val, 0). '</td>';
                                            echo '</tr>';

                                            $sub_RO = 0;
                                            $sub_total_qty = 0;
                                            $sub_total_val = 0;

                                        }
                                    ?>

                                <tr>
                                    <td class="text-center"><?= $no; ?></td>
                                    <td><?= $row['desc_type'];?></td>
                                    <td><?= $row['outlet_type'];?></td>
                                    <td class="text-right"><?= number_format($row['RO'], 0);?></td>
                                    <?php $a=1; ?>
                                    <?php foreach($data['sku_code'] as $sku): ?>
                                      <td class="text-right"><?= number_format($row['qty'.$a], 0);?></td>
                                      <td class="text-right"><?= number_format($row['%qty'.$a], 2);?></td>
                                      <td class="text-right"><?= number_format($row['val'.$a], 0);?></td>
                                      <td class="text-right"><?= number_format($row['%val'.$a], 2);?></td>
                                    <?php $a++; ?>
                                    <?php endforeach; ?>                                   
                                    <td class="text-right"><?= number_format($row['total_qty'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['total_val'], 0);?></td>
                                
                                </tr>

                                <?php $channel = $row['channel'] ?>
                                <?php $sub_RO += $row['RO']; ?>

                                <?php $x = 1; ?>
                                <?php foreach($data['sku_code'] as $sku): ?>
                                  <?php $sub_qty[$x] += $row['qty'.$x]; ?>
                                  <?php $sub_qty_p[$x] += $row['%qty'.$x]; ?>
                                  <?php $sub_val[$x] += $row['val'.$x]; ?>
                                  <?php $sub_val_p[$x] += $row['%val'.$x]; ?>
                                  <?php $total_qty[$x] += $row['qty'.$x]; ?>
                                  <?php $total_qty_p[$x] += $row['%qty'.$x]; ?>
                                  <?php $total_val[$x] += $row['val'.$x]; ?>
                                  <?php $total_val_p[$x] += $row['%val'.$x]; ?>
                                  <?php $x++; ?>
                                <?php endforeach; ?>

                                <?php $sub_total_qty += ($row['total_qty']); ?>
                                <?php $sub_total_val += ($row['total_val']); ?>

                                <?php $total_RO += $row['RO']; ?>
                                <?php $total_total_qty += ($row['total_qty']);?>
                                <?php $total_total_val += ($row['total_val']); ?>

                                <?php $no++; endforeach; ?>

                                <tr class="table-warning" style="font-weight:bold;">
                                    <td></td>
                                    <td class="text-center"><?= $channel;?></td>
                                    <td class="text-center">TOTAL</td>
                                    <td class="text-right"><?= number_format($sub_RO, 0);?></td>
                                    <?php $a=1; ?>
                                    <?php foreach($data['sku_code'] as $sku): ?>
                                      <td class="text-right"><?= number_format($sub_qty[$a], 0);?></td>
                                      <td class="text-right"><?= number_format($sub_qty_p[$a], 2);?></td>
                                      <td class="text-right"><?= number_format($sub_val[$a], 0);?></td>
                                      <td class="text-right"><?= number_format($sub_val_p[$a], 2);?></td>
                                    <?php $a++; ?>
                                    <?php endforeach; ?>
                                    <td class="text-right"><?= number_format($sub_total_qty, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_total_val, 0);?></td>
                                </tr>

                                <tr class="table-danger" style="font-weight:bold;">
                                    <td></td>
                                    <td class="text-center">TOTAL</td>
                                    <td></td>
                                    <td class="text-right"><?= number_format($total_RO, 0);?></td>
                                    <?php $a=1; ?>
                                    <?php foreach($data['sku_code'] as $sku): ?>
                                      <td class="text-right"><?= number_format($total_qty[$a], 0);?></td>
                                      <td class="text-right"><?= number_format($total_qty_p[$a], 2);?></td>
                                      <td class="text-right"><?= number_format($total_val[$a], 0);?></td>
                                      <td class="text-right"><?= number_format($total_val_p[$a], 2);?></td>
                                    <?php $a++; ?>
                                    <?php endforeach; ?>
                                    <td class="text-right"><?= number_format($total_total_qty, 0);?></td>
                                    <td class="text-right"><?= number_format($total_total_val, 0);?></td>
                                </tr>

                                <?php

                                  $a = 1;
                                  foreach($data['sku_code'] as $sku):
                                    if ($total_total_qty == 0)
                                    {
                                      $national_qty_p[$a] = 0;
                                      $national_val_p[$a] = 0;
                                    }
                                    else
                                    {
                                      $national_qty_p[$a] = ($total_qty[$a]/$total_total_qty)*100;
                                      $national_val_p[$a] = ($total_val[$a]/$total_total_qty)*100;
                                    }
                                    
                                    //$national_qty_p[$a] = ($total_qty[$a]/(($total_total_qty ? :1) ? :1))*100;
                                    //$national_val_p[$a] = ($total_val[$a]/(($total_total_qty ? :1) ? :1))*100;
                                    $a++;
                                  endforeach;

                                  $national_qty_ptotal = (($total_total_qty ? :1)/($total_total_qty ? :1))*100;
                                  $national_val_ptotal = (($total_total_val ? :1)/($total_total_val ? :1))*100;

                                ?>

                                <tr class="table-danger" style="font-weight:bold;">
                                  <td></td>
                                  <td class="text-center">TOTAL NASIONAL</td>
                                  <td></td>
                                  <td class="text-right"><?= number_format($total_RO, 0);?></td>
                                  <?php $a=1; ?>
                                  <?php foreach($data['sku_code'] as $sku): ?>
                                    <td class="text-right"><?= number_format($total_qty[$a], 0);?></td>
                                    <td class="text-right"><?= number_format($national_qty_p[$a], 2);?></td>
                                    <td class="text-right"><?= number_format($total_val[$a], 0);?></td>
                                    <td class="text-right"><?= number_format($national_val_p[$a], 2);?></td>
                                    <?php $a++; ?>
                                  <?php endforeach; ?>
                                  <td class="text-right"><?= number_format($total_total_qty, 0);?></td>
                                  <td class="text-right"><?= number_format($total_total_val, 0);?></td>
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