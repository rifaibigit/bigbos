  
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
            <?php
              $dateObj1   = DateTime::createFromFormat('!m', $data['by_month1']);
              $dateObj2   = DateTime::createFromFormat('!m', $data['by_month2']);
              $monthName1 = $dateObj1->format('M');
              $monthName2 = $dateObj2->format('M');
            ?>
            <h3>Contribution Summary - LORD (<?php echo $monthName1. ' To ' .$monthName2;?>)</h3> 
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

            <form action="<?= base_url; ?>/Report/contribution_lord" method="post">
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
                            <div class="row" style="margin-left : 250px; width:150px;">
                              <div></div>
                              <select name="by_month1" title="MONTH" class="mdb-select md-form form-control" style="margin-left : 10px;">
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
                              <select name="by_month2" title="MONTH" class="mdb-select md-form form-control" style="margin-left : 10px;">
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
                            <div style="margin-left : 10px;">
                              <button class="btn btn-outline-primary" type="submit" style="margin-left : 10px;">Go!</button>
                              <a class="btn btn-outline-secondary" href="<?= base_url; ?>/Report/contribution_lord">Reset</a>
                            </div>
                            
                      </div>

                        <!-- <div id="hasil_sale_out"></div> -->
                        <div class="table-responsive-sm text-small">
                          <table id="distr" class="table table-bordered table-sm" align="left" style="font-size:70%; border: 1px solid black;">
                          <thead class="table-warning">

                            <?php
                                foreach ($data['sku_count'] as $row) :
                                    $count = $row['item_row'];
                                endforeach
                            ?>

                              <tr>
                                <th rowspan="3" class="text-center" style="width: 5px; vertical-align: middle;">#</th>
                                <th rowspan="3" class="text-center" style="width: 150px; vertical-align: middle;">TYPE OF OUTLET</th>
                                <th rowspan="3" class="text-center" style="width: 30px; vertical-align: middle;">Code</th>
                                <th rowspan="3" class="text-center" style="width: 15px; vertical-align: middle;">RO</th>
                                <?php foreach ($data['sku_group'] as $row) :?>
                                <th colspan="<?= $row['count_name']*4;?>" class="text-center"><?= $row['item_group'];?></th>
                                <?php endforeach ?>
                              </tr>
                              <tr style="line-height: 12px; vertical-align: middle;">
                                <?php foreach ($data['sku_name'] as $row) :?>
                                <th colspan="4" class="text-center"><?= $row['item_name'];?></th>
                                <?php endforeach ?>  
                              </tr>                  
                              <tr style="line-height: 10px; vertical-align: middle;">
                                <?php for($i=1;$i<=$count;$i++){
                                    echo '<th class="text-center" style="width: 15px">Qty</th>';
                                    echo '<th class="text-center" style="width: 15px">Cont %</th>';
                                    echo '<th class="text-center" style="width: 20px">Value</th>';
                                    echo '<th class="text-center" style="width: 15px">Cont %</th>';
                                } 
                                ?> 
                              </tr>
                            </thead>
                            <tbody>

                            <?php

                              
                              $sub_RO = 0;
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
                              $sub_qty13 = 0;
                              $sub_qty14 = 0;
                              $sub_qty15 = 0;
                              $sub_qty16 = 0;
                              $sub_qty17 = 0;
                              $sub_qty18 = 0;
                            
                              $sub_qty_p1 = 0;
                              $sub_qty_p2 = 0;
                              $sub_qty_p3 = 0;
                              $sub_qty_p4 = 0;
                              $sub_qty_p5 = 0;
                              $sub_qty_p6 = 0;
                              $sub_qty_p7 = 0;
                              $sub_qty_p8 = 0;
                              $sub_qty_p9 = 0;
                              $sub_qty_p10 = 0;
                              $sub_qty_p11 = 0;
                              $sub_qty_p12 = 0;
                              $sub_qty_p13 = 0;
                              $sub_qty_p14 = 0;
                              $sub_qty_p15 = 0;
                              $sub_qty_p16 = 0;
                              $sub_qty_p17 = 0;
                              $sub_qty_p18 = 0;


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
                              $sub_val13 = 0;
                              $sub_val14 = 0;
                              $sub_val15 = 0;
                              $sub_val16 = 0;
                              $sub_val17 = 0;
                              $sub_val18 = 0;
                            
                              $sub_val_p1 = 0;
                              $sub_val_p2 = 0;
                              $sub_val_p3 = 0;
                              $sub_val_p4 = 0;
                              $sub_val_p5 = 0;
                              $sub_val_p6 = 0;
                              $sub_val_p7 = 0;
                              $sub_val_p8 = 0;
                              $sub_val_p9 = 0;
                              $sub_val_p10 = 0;
                              $sub_val_p11 = 0;
                              $sub_val_p12 = 0;
                              $sub_val_p13 = 0;
                              $sub_val_p14 = 0;
                              $sub_val_p15 = 0;
                              $sub_val_p16 = 0;
                              $sub_val_p17 = 0;
                              $sub_val_p18 = 0;


                              $total_RO = 0;
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
                              $total_qty13 = 0;
                              $total_qty14 = 0;
                              $total_qty15 = 0;
                              $total_qty16 = 0;
                              $total_qty17 = 0;
                              $total_qty18 = 0;
                            
                              $total_qty_p1 = 0;
                              $total_qty_p2 = 0;
                              $total_qty_p3 = 0;
                              $total_qty_p4 = 0;
                              $total_qty_p5 = 0;
                              $total_qty_p6 = 0;
                              $total_qty_p7 = 0;
                              $total_qty_p8 = 0;
                              $total_qty_p9 = 0;
                              $total_qty_p10 = 0;
                              $total_qty_p11 = 0;
                              $total_qty_p12 = 0;
                              $total_qty_p13 = 0;
                              $total_qty_p14 = 0;
                              $total_qty_p15 = 0;
                              $total_qty_p16 = 0;
                              $total_qty_p17 = 0;
                              $total_qty_p18 = 0;


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
                              $total_val13 = 0;
                              $total_val14 = 0;
                              $total_val15 = 0;
                              $total_val16 = 0;
                              $total_val17 = 0;
                              $total_val18 = 0;
                            
                              $total_val_p1 = 0;
                              $total_val_p2 = 0;
                              $total_val_p3 = 0;
                              $total_val_p4 = 0;
                              $total_val_p5 = 0;
                              $total_val_p6 = 0;
                              $total_val_p7 = 0;
                              $total_val_p8 = 0;
                              $total_val_p9 = 0;
                              $total_val_p10 = 0;
                              $total_val_p11 = 0;
                              $total_val_p12 = 0;
                              $total_val_p13 = 0;
                              $total_val_p14 = 0;
                              $total_val_p15 = 0;
                              $total_val_p16 = 0;
                              $total_val_p17 = 0;
                              $total_val_p18 = 0;

                            ?>

                            <?php $no=1; ?>
                            <?php $channel=''; ?>
                            
                                <!-- Online -->
                                <?php foreach ($data['cont_lord'] as $row) :?>

                                    <?php
                                        if ($channel != $row['channel'] and $channel != '')
                                        {

                                            echo '<tr class="table-warning text-center" style="font-weight:bold;">';
                                                echo '<td></td>';
                                                echo '<td>' .$channel. '</td>';
                                                echo '<td>TOTAL</td>';
                                                echo '<td class="text-right">' .number_format($sub_RO, 0). '</td>';
                                                echo '<td class="text-right">' .number_format($sub_qty1, 0). '</td>';
                                                echo '<td class="text-right">' .number_format($sub_qty_p1, 2). '</td>';
                                                echo '<td class="text-right">' .number_format($sub_val1, 0). '</td>';
                                                echo '<td class="text-right">' .number_format($sub_val_p1, 2). '</td>';
                                                echo '<td class="text-right">' .number_format($sub_qty2, 0). '</td>';
                                                echo '<td class="text-right">' .number_format($sub_qty_p2, 2). '</td>';
                                                echo '<td class="text-right">' .number_format($sub_val2, 0). '</td>';
                                                echo '<td class="text-right">' .number_format($sub_val_p2, 2). '</td>';
                                                echo '<td class="text-right">' .number_format($sub_qty3, 0). '</td>';
                                                echo '<td class="text-right">' .number_format($sub_qty_p3, 2). '</td>';
                                                echo '<td class="text-right">' .number_format($sub_val3, 0). '</td>';
                                                echo '<td class="text-right">' .number_format($sub_val_p3, 2). '</td>';
                                                echo '<td class="text-right">' .number_format($sub_qty4, 0). '</td>';
                                                echo '<td class="text-right">' .number_format($sub_qty_p4, 2). '</td>';
                                                echo '<td class="text-right">' .number_format($sub_val4, 0). '</td>';
                                                echo '<td class="text-right">' .number_format($sub_val_p4, 2). '</td>';
                                                echo '<td class="text-right">' .number_format($sub_qty5, 0). '</td>';
                                                echo '<td class="text-right">' .number_format($sub_qty_p5, 2). '</td>';
                                                echo '<td class="text-right">' .number_format($sub_val5, 0). '</td>';
                                                echo '<td class="text-right">' .number_format($sub_val_p5, 2). '</td>';
                                                echo '<td class="text-right">' .number_format($sub_qty6, 0). '</td>';
                                                echo '<td class="text-right">' .number_format($sub_qty_p6, 2). '</td>';
                                                echo '<td class="text-right">' .number_format($sub_val6, 0). '</td>';
                                                echo '<td class="text-right">' .number_format($sub_val_p6, 2). '</td>';
                                                echo '<td class="text-right">' .number_format($sub_qty7, 0). '</td>';
                                                echo '<td class="text-right">' .number_format($sub_qty_p7, 2). '</td>';
                                                echo '<td class="text-right">' .number_format($sub_val7, 0). '</td>';
                                                echo '<td class="text-right">' .number_format($sub_val_p7, 2). '</td>';
                                                echo '<td class="text-right">' .number_format($sub_qty8, 0). '</td>';
                                                echo '<td class="text-right">' .number_format($sub_qty_p8, 2). '</td>';
                                                echo '<td class="text-right">' .number_format($sub_val8, 0). '</td>';
                                                echo '<td class="text-right">' .number_format($sub_val_p8, 2). '</td>';
                                                echo '<td class="text-right">' .number_format($sub_qty9, 0). '</td>';
                                                echo '<td class="text-right">' .number_format($sub_qty_p9, 2). '</td>';
                                                echo '<td class="text-right">' .number_format($sub_val9, 0). '</td>';
                                                echo '<td class="text-right">' .number_format($sub_val_p9, 2). '</td>';
                                                echo '<td class="text-right">' .number_format($sub_qty10, 0). '</td>';
                                                echo '<td class="text-right">' .number_format($sub_qty_p10, 2). '</td>';
                                                echo '<td class="text-right">' .number_format($sub_val10, 0). '</td>';
                                                echo '<td class="text-right">' .number_format($sub_val_p10, 2). '</td>';
                                                echo '<td class="text-right">' .number_format($sub_qty11, 0). '</td>';
                                                echo '<td class="text-right">' .number_format($sub_qty_p11, 2). '</td>';
                                                echo '<td class="text-right">' .number_format($sub_val11, 0). '</td>';
                                                echo '<td class="text-right">' .number_format($sub_val_p11, 2). '</td>';
                                                echo '<td class="text-right">' .number_format($sub_qty12, 0). '</td>';
                                                echo '<td class="text-right">' .number_format($sub_qty_p12, 2). '</td>';
                                                echo '<td class="text-right">' .number_format($sub_val12, 0). '</td>';
                                                echo '<td class="text-right">' .number_format($sub_val_p12, 2). '</td>';
                                                echo '<td class="text-right">' .number_format($sub_qty13, 0). '</td>';
                                                echo '<td class="text-right">' .number_format($sub_qty_p13, 2). '</td>';
                                                echo '<td class="text-right">' .number_format($sub_val13, 0). '</td>';
                                                echo '<td class="text-right">' .number_format($sub_val_p13, 2). '</td>';
                                                echo '<td class="text-right">' .number_format($sub_qty14, 0). '</td>';
                                                echo '<td class="text-right">' .number_format($sub_qty_p14, 2). '</td>';
                                                echo '<td class="text-right">' .number_format($sub_val14, 0). '</td>';
                                                echo '<td class="text-right">' .number_format($sub_val_p14, 2). '</td>';
                                                echo '<td class="text-right">' .number_format($sub_qty15, 0). '</td>';
                                                echo '<td class="text-right">' .number_format($sub_qty_p15, 2). '</td>';
                                                echo '<td class="text-right">' .number_format($sub_val15, 0). '</td>';
                                                echo '<td class="text-right">' .number_format($sub_val_p15, 2). '</td>';
                                                echo '<td class="text-right">' .number_format($sub_qty16, 0). '</td>';
                                                echo '<td class="text-right">' .number_format($sub_qty_p16, 2). '</td>';
                                                echo '<td class="text-right">' .number_format($sub_val16, 0). '</td>';
                                                echo '<td class="text-right">' .number_format($sub_val_p16, 2). '</td>';
                                                echo '<td class="text-right">' .number_format($sub_qty17, 0). '</td>';
                                                echo '<td class="text-right">' .number_format($sub_qty_p17, 2). '</td>';
                                                echo '<td class="text-right">' .number_format($sub_val17, 0). '</td>';
                                                echo '<td class="text-right">' .number_format($sub_val_p17, 2). '</td>';
                                                echo '<td class="text-right">' .number_format($sub_qty18, 0). '</td>';
                                                echo '<td class="text-right">' .number_format($sub_qty_p18, 2). '</td>';
                                                echo '<td class="text-right">' .number_format($sub_val18, 0). '</td>';
                                                echo '<td class="text-right">' .number_format($sub_val_p18, 2). '</td>';
                                            echo '</tr>';

                                            $sub_RO = 0;
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
                                            $sub_qty13 = 0;
                                            $sub_qty14 = 0;
                                            $sub_qty15 = 0;
                                            $sub_qty16 = 0;
                                            $sub_qty17 = 0;
                                            $sub_qty18 = 0;
                                            
                                            $sub_qty_p1 = 0;
                                            $sub_qty_p2 = 0;
                                            $sub_qty_p3 = 0;
                                            $sub_qty_p4 = 0;
                                            $sub_qty_p5 = 0;
                                            $sub_qty_p6 = 0;
                                            $sub_qty_p7 = 0;
                                            $sub_qty_p8 = 0;
                                            $sub_qty_p9 = 0;
                                            $sub_qty_p10 = 0;
                                            $sub_qty_p11 = 0;
                                            $sub_qty_p12 = 0;
                                            $sub_qty_p13 = 0;
                                            $sub_qty_p14 = 0;
                                            $sub_qty_p15 = 0;
                                            $sub_qty_p16 = 0;
                                            $sub_qty_p17 = 0;
                                            $sub_qty_p18 = 0;


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
                                            $sub_val13 = 0;
                                            $sub_val14 = 0;
                                            $sub_val15 = 0;
                                            $sub_val16 = 0;
                                            $sub_val17 = 0;
                                            $sub_val18 = 0;
                                            
                                            $sub_val_p1 = 0;
                                            $sub_val_p2 = 0;
                                            $sub_val_p3 = 0;
                                            $sub_val_p4 = 0;
                                            $sub_val_p5 = 0;
                                            $sub_val_p6 = 0;
                                            $sub_val_p7 = 0;
                                            $sub_val_p8 = 0;
                                            $sub_val_p9 = 0;
                                            $sub_val_p10 = 0;
                                            $sub_val_p11 = 0;
                                            $sub_val_p12 = 0;
                                            $sub_val_p13 = 0;
                                            $sub_val_p14 = 0;
                                            $sub_val_p15 = 0;
                                            $sub_val_p16 = 0;
                                            $sub_val_p17 = 0;
                                            $sub_val_p18 = 0;

                                        }
                                    ?>

                                <tr>
                                    <td class="text-center"><?= $no; ?></td>
                                    <td><?= $row['desc_type'];?></td>
                                    <td><?= $row['outlet_type'];?></td>
                                    <td class="text-right"><?= number_format($row['RO'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['qty1'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['%qty1'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['val1'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['%val1'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['qty2'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['%qty2'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['val2'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['%val2'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['qty3'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['%qty3'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['val3'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['%val3'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['qty4'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['%qty4'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['val4'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['%val4'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['qty5'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['%qty5'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['val5'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['%val5'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['qty6'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['%qty6'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['val6'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['%val6'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['qty7'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['%qty7'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['val7'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['%val7'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['qty8'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['%qty8'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['val8'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['%val8'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['qty9'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['%qty9'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['val9'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['%val9'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['qty10'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['%qty10'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['val10'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['%val10'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['qty11'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['%qty11'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['val11'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['%val11'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['qty12'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['%qty12'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['val12'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['%val12'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['qty13'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['%qty13'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['val13'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['%val13'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['qty14'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['%qty14'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['val14'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['%val14'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['qty15'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['%qty15'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['val15'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['%val15'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['qty16'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['%qty16'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['val16'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['%val16'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['qty17'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['%qty17'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['val17'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['%val17'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['qty18'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['%qty18'], 2);?></td>
                                    <td class="text-right"><?= number_format($row['val18'], 0);?></td>
                                    <td class="text-right"><?= number_format($row['%val18'], 2);?></td>
                                
                                </tr>

                                <?php $channel = $row['channel']; ?>

                                <?php $sub_RO += $row['RO']; ?>
                                <?php $sub_qty1 += $row['qty1']; ?>
                                <?php $sub_qty2 += $row['qty2']; ?>
                                <?php $sub_qty3 += $row['qty3']; ?>
                                <?php $sub_qty4 += $row['qty4']; ?>
                                <?php $sub_qty5 += $row['qty5']; ?>
                                <?php $sub_qty6 += $row['qty6']; ?>
                                <?php $sub_qty7 += $row['qty7']; ?>
                                <?php $sub_qty8 += $row['qty8']; ?>
                                <?php $sub_qty9 += $row['qty9']; ?>
                                <?php $sub_qty10 += $row['qty10']; ?>
                                <?php $sub_qty11 += $row['qty11']; ?>
                                <?php $sub_qty12 += $row['qty12']; ?>
                                <?php $sub_qty13 += $row['qty13']; ?>
                                <?php $sub_qty14 += $row['qty14']; ?>
                                <?php $sub_qty15 += $row['qty15']; ?>
                                <?php $sub_qty16 += $row['qty16']; ?>
                                <?php $sub_qty17 += $row['qty17']; ?>
                                <?php $sub_qty18 += $row['qty18']; ?>

                                <?php $sub_qty_p1 += $row['%qty1']; ?>
                                <?php $sub_qty_p2 += $row['%qty2']; ?>
                                <?php $sub_qty_p3 += $row['%qty3']; ?>
                                <?php $sub_qty_p4 += $row['%qty4']; ?>
                                <?php $sub_qty_p5 += $row['%qty5']; ?>
                                <?php $sub_qty_p6 += $row['%qty6']; ?>
                                <?php $sub_qty_p7 += $row['%qty7']; ?>
                                <?php $sub_qty_p8 += $row['%qty8']; ?>
                                <?php $sub_qty_p9 += $row['%qty9']; ?>
                                <?php $sub_qty_p10 += $row['%qty10']; ?>
                                <?php $sub_qty_p11 += $row['%qty11']; ?>
                                <?php $sub_qty_p12 += $row['%qty12']; ?>
                                <?php $sub_qty_p13 += $row['%qty13']; ?>
                                <?php $sub_qty_p14 += $row['%qty14']; ?>
                                <?php $sub_qty_p15 += $row['%qty15']; ?>
                                <?php $sub_qty_p16 += $row['%qty16']; ?>
                                <?php $sub_qty_p17 += $row['%qty17']; ?>
                                <?php $sub_qty_p18 += $row['%qty18']; ?>

                                <?php $sub_val1 += $row['val1']; ?>
                                <?php $sub_val2 += $row['val2']; ?>
                                <?php $sub_val3 += $row['val3']; ?>
                                <?php $sub_val4 += $row['val4']; ?>
                                <?php $sub_val5 += $row['val5']; ?>
                                <?php $sub_val6 += $row['val6']; ?>
                                <?php $sub_val7 += $row['val7']; ?>
                                <?php $sub_val8 += $row['val8']; ?>
                                <?php $sub_val9 += $row['val9']; ?>
                                <?php $sub_val10 += $row['val10']; ?>
                                <?php $sub_val11 += $row['val11']; ?>
                                <?php $sub_val12 += $row['val12']; ?>
                                <?php $sub_val13 += $row['val13']; ?>
                                <?php $sub_val14 += $row['val14']; ?>
                                <?php $sub_val15 += $row['val15']; ?>
                                <?php $sub_val16 += $row['val16']; ?>
                                <?php $sub_val17 += $row['val17']; ?>
                                <?php $sub_val18 += $row['val18']; ?>

                                <?php $sub_val_p1 += $row['%val1']; ?>
                                <?php $sub_val_p2 += $row['%val2']; ?>
                                <?php $sub_val_p3 += $row['%val3']; ?>
                                <?php $sub_val_p4 += $row['%val4']; ?>
                                <?php $sub_val_p5 += $row['%val5']; ?>
                                <?php $sub_val_p6 += $row['%val6']; ?>
                                <?php $sub_val_p7 += $row['%val7']; ?>
                                <?php $sub_val_p8 += $row['%val8']; ?>
                                <?php $sub_val_p9 += $row['%val9']; ?>
                                <?php $sub_val_p10 += $row['%val10']; ?>
                                <?php $sub_val_p11 += $row['%val11']; ?>
                                <?php $sub_val_p12 += $row['%val12']; ?>
                                <?php $sub_val_p13 += $row['%val13']; ?>
                                <?php $sub_val_p14 += $row['%val14']; ?>
                                <?php $sub_val_p15 += $row['%val15']; ?>
                                <?php $sub_val_p16 += $row['%val16']; ?>
                                <?php $sub_val_p17 += $row['%val17']; ?>
                                <?php $sub_val_p18 += $row['%val18']; ?>

                                <?php $total_RO += $row['RO']; ?>
                                <?php $total_qty1 += $row['qty1']; ?>
                                <?php $total_qty2 += $row['qty2']; ?>
                                <?php $total_qty3 += $row['qty3']; ?>
                                <?php $total_qty4 += $row['qty4']; ?>
                                <?php $total_qty5 += $row['qty5']; ?>
                                <?php $total_qty6 += $row['qty6']; ?>
                                <?php $total_qty7 += $row['qty7']; ?>
                                <?php $total_qty8 += $row['qty8']; ?>
                                <?php $total_qty9 += $row['qty9']; ?>
                                <?php $total_qty10 += $row['qty10']; ?>
                                <?php $total_qty11 += $row['qty11']; ?>
                                <?php $total_qty12 += $row['qty12']; ?>
                                <?php $total_qty13 += $row['qty13']; ?>
                                <?php $total_qty14 += $row['qty14']; ?>
                                <?php $total_qty15 += $row['qty15']; ?>
                                <?php $total_qty16 += $row['qty16']; ?>
                                <?php $total_qty17 += $row['qty17']; ?>
                                <?php $total_qty18 += $row['qty18']; ?>

                                <?php $total_qty_p1 += $row['%qty1']; ?>
                                <?php $total_qty_p2 += $row['%qty2']; ?>
                                <?php $total_qty_p3 += $row['%qty3']; ?>
                                <?php $total_qty_p4 += $row['%qty4']; ?>
                                <?php $total_qty_p5 += $row['%qty5']; ?>
                                <?php $total_qty_p6 += $row['%qty6']; ?>
                                <?php $total_qty_p7 += $row['%qty7']; ?>
                                <?php $total_qty_p8 += $row['%qty8']; ?>
                                <?php $total_qty_p9 += $row['%qty9']; ?>
                                <?php $total_qty_p10 += $row['%qty10']; ?>
                                <?php $total_qty_p11 += $row['%qty11']; ?>
                                <?php $total_qty_p12 += $row['%qty12']; ?>
                                <?php $total_qty_p13 += $row['%qty13']; ?>
                                <?php $total_qty_p14 += $row['%qty14']; ?>
                                <?php $total_qty_p15 += $row['%qty15']; ?>
                                <?php $total_qty_p16 += $row['%qty16']; ?>
                                <?php $total_qty_p17 += $row['%qty17']; ?>
                                <?php $total_qty_p18 += $row['%qty18']; ?>

                                <?php $total_val1 += $row['val1']; ?>
                                <?php $total_val2 += $row['val2']; ?>
                                <?php $total_val3 += $row['val3']; ?>
                                <?php $total_val4 += $row['val4']; ?>
                                <?php $total_val5 += $row['val5']; ?>
                                <?php $total_val6 += $row['val6']; ?>
                                <?php $total_val7 += $row['val7']; ?>
                                <?php $total_val8 += $row['val8']; ?>
                                <?php $total_val9 += $row['val9']; ?>
                                <?php $total_val10 += $row['val10']; ?>
                                <?php $total_val11 += $row['val11']; ?>
                                <?php $total_val12 += $row['val12']; ?>
                                <?php $total_val13 += $row['val13']; ?>
                                <?php $total_val14 += $row['val14']; ?>
                                <?php $total_val15 += $row['val15']; ?>
                                <?php $total_val16 += $row['val16']; ?>
                                <?php $total_val17 += $row['val17']; ?>
                                <?php $total_val18 += $row['val18']; ?>

                                <?php $total_val_p1 += $row['%val1']; ?>
                                <?php $total_val_p2 += $row['%val2']; ?>
                                <?php $total_val_p3 += $row['%val3']; ?>
                                <?php $total_val_p4 += $row['%val4']; ?>
                                <?php $total_val_p5 += $row['%val5']; ?>
                                <?php $total_val_p6 += $row['%val6']; ?>
                                <?php $total_val_p7 += $row['%val7']; ?>
                                <?php $total_val_p8 += $row['%val8']; ?>
                                <?php $total_val_p9 += $row['%val9']; ?>
                                <?php $total_val_p10 += $row['%val10']; ?>
                                <?php $total_val_p11 += $row['%val11']; ?>
                                <?php $total_val_p12 += $row['%val12']; ?>
                                <?php $total_val_p13 += $row['%val13']; ?>
                                <?php $total_val_p14 += $row['%val14']; ?>
                                <?php $total_val_p15 += $row['%val15']; ?>
                                <?php $total_val_p16 += $row['%val16']; ?>
                                <?php $total_val_p17 += $row['%val17']; ?>
                                <?php $total_val_p18 += $row['%val18']; ?>


                                <?php $no++; endforeach; ?>

                                <tr class="table-warning" style="font-weight:bold;">
                                    <td></td>
                                    <td class="text-center"><?= $channel;?></td>
                                    <td class="text-center">TOTAL</td>
                                    <td class="text-right"><?= number_format($sub_RO, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_qty1, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_qty_p1, 2);?></td>
                                    <td class="text-right"><?= number_format($sub_val1, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_val_p1, 2);?></td>
                                    <td class="text-right"><?= number_format($sub_qty2, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_qty_p2, 2);?></td>
                                    <td class="text-right"><?= number_format($sub_val2, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_val_p2, 2);?></td>
                                    <td class="text-right"><?= number_format($sub_qty3, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_qty_p3, 2);?></td>
                                    <td class="text-right"><?= number_format($sub_val3, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_val_p3, 2);?></td>
                                    <td class="text-right"><?= number_format($sub_qty4, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_qty_p4, 2);?></td>
                                    <td class="text-right"><?= number_format($sub_val4, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_val_p4, 2);?></td>
                                    <td class="text-right"><?= number_format($sub_qty5, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_qty_p5, 2);?></td>
                                    <td class="text-right"><?= number_format($sub_val5, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_val_p5, 2);?></td>
                                    <td class="text-right"><?= number_format($sub_qty6, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_qty_p6, 2);?></td>
                                    <td class="text-right"><?= number_format($sub_val6, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_val_p6, 2);?></td>
                                    <td class="text-right"><?= number_format($sub_qty7, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_qty_p7, 2);?></td>
                                    <td class="text-right"><?= number_format($sub_val7, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_val_p7, 2);?></td>
                                    <td class="text-right"><?= number_format($sub_qty8, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_qty_p8, 2);?></td>
                                    <td class="text-right"><?= number_format($sub_val8, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_val_p8, 2);?></td>
                                    <td class="text-right"><?= number_format($sub_qty9, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_qty_p9, 2);?></td>
                                    <td class="text-right"><?= number_format($sub_val9, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_val_p9, 2);?></td>
                                    <td class="text-right"><?= number_format($sub_qty10, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_qty_p10, 2);?></td>
                                    <td class="text-right"><?= number_format($sub_val10, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_val_p10, 2);?></td>
                                    <td class="text-right"><?= number_format($sub_qty11, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_qty_p11, 2);?></td>
                                    <td class="text-right"><?= number_format($sub_val11, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_val_p11, 2);?></td>
                                    <td class="text-right"><?= number_format($sub_qty12, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_qty_p12, 2);?></td>
                                    <td class="text-right"><?= number_format($sub_val12, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_val_p12, 2);?></td>
                                    <td class="text-right"><?= number_format($sub_qty13, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_qty_p13, 2);?></td>
                                    <td class="text-right"><?= number_format($sub_val13, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_val_p13, 2);?></td>
                                    <td class="text-right"><?= number_format($sub_qty14, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_qty_p14, 2);?></td>
                                    <td class="text-right"><?= number_format($sub_val14, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_val_p14, 2);?></td>
                                    <td class="text-right"><?= number_format($sub_qty15, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_qty_p15, 2);?></td>
                                    <td class="text-right"><?= number_format($sub_val15, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_val_p15, 2);?></td>
                                    <td class="text-right"><?= number_format($sub_qty16, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_qty_p16, 2);?></td>
                                    <td class="text-right"><?= number_format($sub_val16, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_val_p16, 2);?></td>
                                    <td class="text-right"><?= number_format($sub_qty17, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_qty_p17, 2);?></td>
                                    <td class="text-right"><?= number_format($sub_val17, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_val_p17, 2);?></td>
                                    <td class="text-right"><?= number_format($sub_qty18, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_qty_p18, 2);?></td>
                                    <td class="text-right"><?= number_format($sub_val18, 0);?></td>
                                    <td class="text-right"><?= number_format($sub_val_p18, 2);?></td>
                                </tr>

                                <tr class="table-danger" style="font-weight:bold;">
                                    <td></td>
                                    <td class="text-center">TOTAL</td>
                                    <td></td>
                                    <td class="text-right"><?= number_format($total_RO, 0);?></td>
                                    <td class="text-right"><?= number_format($total_qty1, 0);?></td>
                                    <td class="text-right"><?= number_format($total_qty_p1, 2);?></td>
                                    <td class="text-right"><?= number_format($total_val1, 0);?></td>
                                    <td class="text-right"><?= number_format($total_val_p1, 2);?></td>
                                    <td class="text-right"><?= number_format($total_qty2, 0);?></td>
                                    <td class="text-right"><?= number_format($total_qty_p2, 2);?></td>
                                    <td class="text-right"><?= number_format($total_val2, 0);?></td>
                                    <td class="text-right"><?= number_format($total_val_p2, 2);?></td>
                                    <td class="text-right"><?= number_format($total_qty3, 0);?></td>
                                    <td class="text-right"><?= number_format($total_qty_p3, 2);?></td>
                                    <td class="text-right"><?= number_format($total_val3, 0);?></td>
                                    <td class="text-right"><?= number_format($total_val_p3, 2);?></td>
                                    <td class="text-right"><?= number_format($total_qty4, 0);?></td>
                                    <td class="text-right"><?= number_format($total_qty_p4, 2);?></td>
                                    <td class="text-right"><?= number_format($total_val4, 0);?></td>
                                    <td class="text-right"><?= number_format($total_val_p4, 2);?></td>
                                    <td class="text-right"><?= number_format($total_qty5, 0);?></td>
                                    <td class="text-right"><?= number_format($total_qty_p5, 2);?></td>
                                    <td class="text-right"><?= number_format($total_val5, 0);?></td>
                                    <td class="text-right"><?= number_format($total_val_p5, 2);?></td>
                                    <td class="text-right"><?= number_format($total_qty6, 0);?></td>
                                    <td class="text-right"><?= number_format($total_qty_p6, 2);?></td>
                                    <td class="text-right"><?= number_format($total_val6, 0);?></td>
                                    <td class="text-right"><?= number_format($total_val_p6, 2);?></td>
                                    <td class="text-right"><?= number_format($total_qty7, 0);?></td>
                                    <td class="text-right"><?= number_format($total_qty_p7, 2);?></td>
                                    <td class="text-right"><?= number_format($total_val7, 0);?></td>
                                    <td class="text-right"><?= number_format($total_val_p7, 2);?></td>
                                    <td class="text-right"><?= number_format($total_qty8, 0);?></td>
                                    <td class="text-right"><?= number_format($total_qty_p8, 2);?></td>
                                    <td class="text-right"><?= number_format($total_val8, 0);?></td>
                                    <td class="text-right"><?= number_format($total_val_p8, 2);?></td>
                                    <td class="text-right"><?= number_format($total_qty9, 0);?></td>
                                    <td class="text-right"><?= number_format($total_qty_p9, 2);?></td>
                                    <td class="text-right"><?= number_format($total_val9, 0);?></td>
                                    <td class="text-right"><?= number_format($total_val_p9, 2);?></td>
                                    <td class="text-right"><?= number_format($total_qty10, 0);?></td>
                                    <td class="text-right"><?= number_format($total_qty_p10, 2);?></td>
                                    <td class="text-right"><?= number_format($total_val10, 0);?></td>
                                    <td class="text-right"><?= number_format($total_val_p10, 2);?></td>
                                    <td class="text-right"><?= number_format($total_qty11, 0);?></td>
                                    <td class="text-right"><?= number_format($total_qty_p11, 2);?></td>
                                    <td class="text-right"><?= number_format($total_val11, 0);?></td>
                                    <td class="text-right"><?= number_format($total_val_p11, 2);?></td>
                                    <td class="text-right"><?= number_format($total_qty12, 0);?></td>
                                    <td class="text-right"><?= number_format($total_qty_p12, 2);?></td>
                                    <td class="text-right"><?= number_format($total_val12, 0);?></td>
                                    <td class="text-right"><?= number_format($total_val_p12, 2);?></td>
                                    <td class="text-right"><?= number_format($total_qty13, 0);?></td>
                                    <td class="text-right"><?= number_format($total_qty_p13, 2);?></td>
                                    <td class="text-right"><?= number_format($total_val13, 0);?></td>
                                    <td class="text-right"><?= number_format($total_val_p13, 2);?></td>
                                    <td class="text-right"><?= number_format($total_qty14, 0);?></td>
                                    <td class="text-right"><?= number_format($total_qty_p14, 2);?></td>
                                    <td class="text-right"><?= number_format($total_val14, 0);?></td>
                                    <td class="text-right"><?= number_format($total_val_p14, 2);?></td>
                                    <td class="text-right"><?= number_format($total_qty15, 0);?></td>
                                    <td class="text-right"><?= number_format($total_qty_p15, 2);?></td>
                                    <td class="text-right"><?= number_format($total_val15, 0);?></td>
                                    <td class="text-right"><?= number_format($total_val_p15, 2);?></td>
                                    <td class="text-right"><?= number_format($total_qty16, 0);?></td>
                                    <td class="text-right"><?= number_format($total_qty_p16, 2);?></td>
                                    <td class="text-right"><?= number_format($total_val16, 0);?></td>
                                    <td class="text-right"><?= number_format($total_val_p16, 2);?></td>
                                    <td class="text-right"><?= number_format($total_qty17, 0);?></td>
                                    <td class="text-right"><?= number_format($total_qty_p17, 2);?></td>
                                    <td class="text-right"><?= number_format($total_val17, 0);?></td>
                                    <td class="text-right"><?= number_format($total_val_p17, 2);?></td>
                                    <td class="text-right"><?= number_format($total_qty18, 0);?></td>
                                    <td class="text-right"><?= number_format($total_qty_p18, 2);?></td>
                                    <td class="text-right"><?= number_format($total_val18, 0);?></td>
                                    <td class="text-right"><?= number_format($total_val_p18, 2);?></td>
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