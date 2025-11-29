  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Report Selling In - Summary (Value)</h1> 
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
            <form action="<?= base_url; ?>/report/sellingin_summary_val" method="post">
                <div class="row">
                    <div class="col-md-12">
                      <div class="input-group mb-3">

                        <?php

                        if(isset($data))
                        {
                          $principal = $data['by_principal'];
                          $sku = $data['by_sku'];
                          $groupsku = $data['by_group_sku'];
                          $distributor = $data['by_distributor'];
                          $area = $data['by_area'];
                          $island = $data['by_island'];
                          $month1 = $data['by_month1'];
                          $month2 = $data['by_month2'];
                          $year = $data['by_year'];

                        }else
                        {
                          $principal = "By Principal";
                          $sku = "By SKU";
                          $groupsku = "By Group SKU";
                          $distributor = "By Distributor";
                          $area = "By Area";
                          $island = "By Island";
                        }

                        ?>
                          <div style="width : 140px;">
                            <select class="mdb-select md-form form-control" title="By Principal" id="principal" name="by_principal">
                                <option value="">By Principal</option>
                                    <?php $no=1; ?>
                                    <?php foreach ($data['principal'] as $row) :?>
                                        <option <?php if( $principal==$row['principal']){echo "selected"; } ?> value="<?= $row['principal'];?>"><b><?= $row['principal'];?></b></option>
                                    <?php $no++; endforeach; ?>
                            </select>
                          </div>
                          <div style="margin-left : 5px; width : 160px;">
                            <select class="mdb-select md-form form-control" title="By Group SKU" name="by_group_sku" style="margin-left : 10px;">
                                <option value="">By Group SKU</option>
                                    <?php $no=1; ?>
                                    <?php foreach ($data['item_group'] as $row) :?>
                                            <option <?php if( $groupsku==$row['item_group']){echo "selected"; } ?> value="<?= $row['item_group'];?>"><b><?= $row['item_group'];?></b></option>
                                    <?php $no++; endforeach; ?>
                            </select>
                          </div>
                          <div style="margin-left : 5px; width : 300px;">
                            <select class="mdb-select md-form form-control" title="By SKU" name="by_sku" style="margin-left : 10px;">
                                <option value="">By SKU</option>
                                    <?php $no=1; ?>
                                    <?php foreach ($data['item_name'] as $row) :?>
                                            <option <?php if( $sku==$row['item_name']){echo "selected"; } ?> value="<?= $row['item_name'];?>"><b><?= $row['item_name'];?></b></option>
                                    <?php $no++; endforeach; ?>
                            </select>
                          </div>
                          <div class="row" style="margin-left : 20px; width:150px;">
                              <div></div>
                              <select name="by_month1" title="MONTH" class="mdb-select md-form form-control" style="margin-left : 10px; width:135px;">
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
                              <div style="margin-left : 5px;margin-right : 10px; margin-top: 5px;">
                                <label>To</label>
                              </div>
                              <select name="by_month2" title="MONTH" class="mdb-select md-form form-control" style="margin-left : 10px; width:135px;">
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
                          <button class="btn btn-outline-primary" type="submit" style="margin-left : 10px;">Go!</button>
                          <a class="btn btn-outline-secondary" href="<?= base_url; ?>/report/sellingin_summary_val">Reset</a>
                      </div>
                      <div>
                        <a class="btn btn-outline-secondary" href="<?= base_url; ?>/report/sellingin_summary_qty"><i class = "fas fa-chart-line"> Qty</i></a>
                        <a class="btn btn-info" href="#"><i class = "fas fa-chart-line"> Value</i></a>
                      </div>

                        <!-- <div id="hasil_sale_out"></div> -->
                        <div class="row">
                          <table id="rpt_sale_in" class="table table-bordered table-sm" width="750px" align="left" style="font-size:85%">
                          <thead class="thead-light">
                              <tr>
                                <th rowspan="2" class="text-center" style="width: 5px; vertical-align: middle;">#</th>
                                <th rowspan="2" class="text-center" style="width: 100px; vertical-align: middle;">Channel</th>
                                <th rowspan="2" class="text-center" style="width: 250px; vertical-align: middle;">Outlet Type</th>
                                <th rowspan="2" class="text-center" style="width: 65px; vertical-align: middle;">Kode</th>
                                <th rowspan="2" class="text-center" style="width: 65px; vertical-align: middle;">Value</th>
                                <th colspan="2" class="text-center">Contribution %</th>
                              </tr>                  
                              <tr>
                                <th class="text-center" style="width: 60px">Channel</th>
                                <th class="text-center" style="width: 60px">Type</th>
                              </tr>
                            </thead>
                            <tbody>

                              <?php 

                                $sub_val_channel = 0;
                                $sub_val_oc = 0;
                                $grand_total = 0;

                                $i = 0;
                                $rowcount = 0;
                                $channel_ar = [];
                                $val_ar = [];
                                $val = 0;
                                foreach ($data['val_channel'] as $row) :
                                  $channel_ar[$i] = $row['channel'];
                                  $val_ar[$i] = $row['val'];
                                  $rowcount = $row['nomor'];
                                  $val += $row['val'];
                                  $i++;
                                endforeach;

                                $channel = '';
                                $outlet_category = '';
                                $ii = 0;

                                foreach ($data['sellingin_dist'] as $row) :
                                  $channel_dist = $row['channel'];
                                  $outlet_dist = $row['outlet_type'];
                                  $desc_dist = $row['desc_type'];
                                  $val_dist = $row['val'];
                                endforeach;

                                $val_total = $val + $val_dist;


                              ?>

                              <!-- ONLINE -->
                              <?php foreach ($data['sellingin'] as $row) :?>

                                <?php

                                        if ($outlet_category != $row['outlet_category'] and $outlet_category != '' and $outlet_category != $channel )
                                        {

                                            echo '<tr class="table text-center" style="font-weight:bold;">';
                                                echo '<td></td>';
                                                echo '<td>' .$channel. '</td>';
                                                echo '<td>TOTAL ' .$outlet_category. '</td>';
                                                echo '<td></td>';
                                                echo '<td class="text-right">' .number_format($sub_val_oc, 0). '</td>';
                                                echo '<td class="text-right">' .number_format($sub_val_oc/($val_total ?: 1)*100,1). ' %</td>';
                                                echo '<td class="text-right">' .number_format($sub_val_oc/($val_total ?: 1)*100,1). ' %</td>';
                                            echo '</tr>';
                                            $sub_val_oc = 0;
                                        }

                                        if ($channel != $row['channel'] and $channel != '')
                                        {

                                          if($channel === 'MTKA' and $outlet_category === 'MTKA')
                                            {
                                              $sub_val_mtka = $sub_val_channel;
                                            }

                                            if($channel === 'MTI' and $outlet_category === 'MTI')
                                            {
                                              $sub_val_mti = $sub_val_channel;
                                            }

                                            echo '<tr class="table text-center" style="font-weight:bold;">';
                                                echo '<td></td>';
                                                echo '<td>TOTAL ' .$channel. '</td>';
                                                echo '<td></td>';
                                                echo '<td></td>';
                                                echo '<td class="text-right">' .number_format($sub_val_channel, 0). '</td>';
                                                echo '<td class="text-right">' .number_format($sub_val_channel/($val_total ?: 1)*100,1). ' %</td>';
                                                echo '<td class="text-right">' .number_format($sub_val_channel/($val_total ?: 1)*100,1). ' %</td>';
                                            echo '</tr>';

                                            $sub_val_channel = 0;
                                            

                                            if($channel === 'MTI' and $outlet_category === 'MTI')
                                            {
                                              $sub_val_MT = $sub_val_mtka + $sub_val_mti;
                                              echo '<tr class="table text-center" style="font-weight:bold;">';
                                                  echo '<td></td>';
                                                  echo '<td>TOTAL MT</td>';
                                                  echo '<td></td>';
                                                  echo '<td></td>';
                                                  echo '<td class="text-right">' .number_format($sub_val_MT, 0). '</td>';
                                                  echo '<td class="text-right">' .number_format($sub_val_MT/($val_total ?: 1)*100,1). ' %</td>';
                                                  echo '<td class="text-right">' .number_format($sub_val_MT/($val_total ?: 1)*100,1). ' %</td>';
                                              echo '</tr>';
                                              $sub_val_channel = 0;
                                              $sub_val_oc = 0;
                                            }

                                            
                                        }

                                    ?>

                                <tr>
                                  <td class="text-center"><?= $row['id']; ?></td>
                                  <td class="text-center"><?= $row['channel'];?></td>
                                  <?php if($channel != $row['channel']){$channel = $row['channel']; $ii++;} ?>
                                  <?php
                                    $data1 = array(
                                      'id' => $row['id'],
                                      'year' => $year
                                    );
                                  ?>
                                  <!-- <td><a href="<?= base_url; ?>/report/getSellinginOT/<?= $row['id']; ?>" target="_blank"><?= $row['desc_type'];?></a></td> -->
                                  <td><a href="<?= base_url; ?>/report/getSellinginOT/<?= implode(", ", $data1); ?>" target="_blank"><?= $row['desc_type'];?></a></td>
                                  <td><?= $row['outlet_type'];?></td>
                                  <td class="text-right"><?= number_format($row['val'], 0);?></td>
                                  <td class="text-right"><?= number_format($row['val']/($val_ar[$ii-1] ?: 1)*100,1);?> %</td>
                                  <td class="text-right"><?= number_format($row['val']/($val ?: 1)*100,1);?> %</td>
                                </tr>

                              <?php $sub_val_channel += $row['val'];?>
                              <?php $sub_val_oc += $row['val'];?>
                              <?php $grand_total += $row['val'];?>
                              <?php $channel = $row['channel']; ?>
                              <?php $outlet_category = $row['outlet_category']; ?>

                              <?php $no++; endforeach; ?>

                              <tr class="table text-center" style="font-weight:bold;">
                                  <td></td>
                                  <td></td>
                                  <td>TOTAL <?= $outlet_category ;?> </td>
                                  <td></td>
                                  <td class="text-right"><?= number_format($sub_val_oc, 0) ;?></td>
                                  <td class="text-right"><?= number_format($sub_val_oc/($val_total ?: 1)*100,1);?> %</td>
                                  <td class="text-right"><?= number_format($sub_val_oc/($val_total ?: 1)*100,1);?> %</td>
                              </tr>

                              <tr class="table text-center" style="font-weight:bold;">
                                  <td></td>
                                  <td>TOTAL GT</td>
                                  <td></td>
                                  <td></td>
                                  <td class="text-right"><?= number_format($sub_val_channel, 0) ;?></td>
                                  <td class="text-right"><?= number_format($sub_val_channel/($val_total ?: 1)*100,1);?> %</td>
                                  <td class="text-right"><?= number_format($sub_val_channel/($val_total ?: 1)*100,1);?> %</td>
                              </tr>

                              <!-- TOTAL JKT MT -->
                              <tr>
                                <td></td>
                                <td style="font-weight:bold" class="text-center">TOTAL JKT MT</td>
                                <td></td>
                                <td></td>
                                <td style="font-weight:bold" class="text-right"><?= number_format($grand_total, 0);?></td>
                                <td style="font-weight:bold" class="text-right"><?= number_format(($grand_total)/($val_total ?: 1)*100,1);?> %</td>
                                <td style="font-weight:bold" class="text-right"><?= number_format(($grand_total)/($val_total ?: 1)*100,1);?> %</td>
                              </tr>

                              <!-- Distributor -->
                              <tr>
                                <td></td>
                                <td class="text-center"><?= $channel_dist ;?></td>
                                <td><a href="<?= base_url; ?>/report/Sellingin_Dist" target="_blank"><?= $desc_dist ;?></a></td>
                                <td><?= $outlet_dist ;?></td>
                                <td style="font-weight:bold" class="text-right"><?= number_format($val_dist, 0);?></td>
                                <td style="font-weight:bold" class="text-right"><?= number_format($val_dist/($val_total ?: 1)*100,1);?> %</td>
                                <td style="font-weight:bold" class="text-right"><?= number_format($val_dist/($val_total ?: 1)*100,1);?> %</td>
                              </tr>

                              <!-- TOTAL -->
                              <tr>
                                <td></td>
                                <td style="font-weight:bold" class="text-center">GRAND TOTAL</td>
                                <td></td>
                                <td></td>
                                <td style="font-weight:bold" class="text-right"><?= number_format($grand_total + $val_dist, 0);?></td>
                                <td style="font-weight:bold" class="text-right"><?= number_format(($grand_total + $val_dist)/($val_total ?: 1)*100,1);?> %</td>
                                <td style="font-weight:bold" class="text-right"><?= number_format(($grand_total + $val_dist)/($val_total ?: 1)*100,1);?> %</td>
                              </tr>

                            </tbody>
                          </table>
                        </div>

                        <!-- <div class="row"> -->
                          <div class="clearfix" style="margin-left: 20px; ">

                            <div class="col" style="width: 400px;height: 400px; margin-top: 0px;margin-left: 20px;">
                                <canvas id="myChart1" style="width: 400px;height: 400px; margin-bottom: 0px;"></canvas>
                                <canvas id="myChart2" style="width: 400px;height: 400px; margin-bottom: 0px;"></canvas>
                            </div>
                          </div>
                          <style>
                            .table tr { line-height: 14px; }
                            .select2-selection {
                              height: 40px !important;
                            }
                            .select2-selection__arrow {
                              margin: 5px;
                            }
                          </style>
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

<script>  
var ctx = document.getElementById("myChart1");
/* ctx.height = 200;
ctx.width = 200; */
var myChart = new Chart(ctx, {
    type: 'pie',
    data: {
        // labels: [<?php echo $channel_ar[0] . ', ' . $channel_ar[1] . ', ' . $channel_ar[2] . ', ' . $channel_ar[3] . ', ' . $val_dist; ?>],
        labels: ['ONLINE', 'MTKA', 'MTI', 'GENERAL TRADE', 'DISTRIBUTOR'],
        datasets: [{
                data: [<?php echo $val_ar[0] . ', ' . $val_ar[1] . ', ' . $val_ar[2] . ', ' . $val_ar[3] . ', ' . $val_dist; ?>],
                backgroundColor: [
                    'rgba(0, 15, 255, 0.5)',
                    'rgba(47, 244, 79, 0.6)',
                    'rgba(255, 248, 0, 0.6)',
                    'rgba(190, 144, 212, 0.6)',
                    'rgba(210, 38, 30, 0.6)'
                ],
            }]
    },
    options: {
      layout: {
        padding: {
                left: 20,
                right: 20,
                top: 50,
                bottom: 50
        }
      },
      legend: {
        display: true,
        position: 'bottom',
        labels: {
            boxWidth: 20,
            fontColor: '#111',
            padding: 10
        }
      },
      plugins: {
        outlabels: {
            zoomOutPercentage: 35,
            text: '%p',
            color: 'black',
            stretch: 20,
            font: {
                resizable: true,
                minSize: 14,
                maxSize: 18,
                family: 'Helvetica',
                style: 'bold'
            }
        },
        /* labels: {
            render: 'percentage',
            fontSize: 20,
            fontFamily: 'Helvetica',
            fontStyle: 'bold',
            fontColor: ['black', 'black', 'black', 'black', 'black'],
            textShadow: true,
            shadowOffsetX: -5,
            shadowOffsetY: 5,
        }, */
      },
      tooltips: {
        enabled: false
      }, 
    }
});
</script>

<script>  
var ctx = document.getElementById("myChart2");
/* ctx.height = 450;
ctx.width = 200; */
var myChart = new Chart(ctx, {
    type: 'pie',
    data: {
        // labels: [<?php echo $channel_ar[0] . ', ' . $channel_ar[1] . ', ' . $channel_ar[2] . ', ' . $channel_ar[3] . ', ' . $val_dist; ?>],
        labels: ['ONLINE', 'MTKA', 'MTI', 'GENERAL TRADE', 'DISTRIBUTOR'],
        datasets: [{
                label: '# OL',
                data: [<?php echo round($val_ar[0],2) . ', ' . round($val_ar[1],2) . ', ' . round($val_ar[2],2) . ', ' . round($val_ar[3],2) . ', ' . round($val_dist,2); ?>],
                backgroundColor: [
                    'rgba(0, 15, 255, 0.5)',
                    'rgba(47, 244, 79, 0.6)',
                    'rgba(255, 248, 0, 0.6)',
                    'rgba(190, 144, 212, 0.6)',
                    'rgba(210, 38, 30, 0.6)'
                ],
            }]
    },
    options: {
      layout: {
        padding: {
                left: 20,
                right: 20,
                top: 50,
                bottom: 50
        }
      },
      legend: {
            display: true,
            position: 'bottom',
            labels: {
                boxWidth: 20,
                fontColor: '#111',
                padding: 10
            },
            padding: {
              top: 50
            }
      },
      plugins: {
        outlabels: {
            zoomOutPercentage: 35,
            text: '%v',
            color: 'black',
            stretch: 20,
            Precision: 2,
            font: {
                resizable: false,
                minSize: 14,
                maxSize: 18,
                family: 'Helvetica',
                style: 'bold',
            }
        }
      },
      tooltips: {
        enabled: false,
      }, 
    }
});
</script>

<script>
  $(document).ready(function() {
    $("#principal").select2();
  });
</script>