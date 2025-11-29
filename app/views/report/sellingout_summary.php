  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Report Selling Out - Summary</h1> 
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
        <div class="card-header">
          <h3 class="card-title">
            <i class="fas fa-chart-pie mr-1"></i>
            Report
          </h3>
          <div class="card-tools">
            <ul class="nav nav-pills ml-auto">
              <li class="nav-item">
                <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Quantity</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#sales-chart" data-toggle="tab">Value</a>
              </li>
            </ul>
          </div>
        </div><!-- /.card-header -->
        <div class="card-body">
          <div class="tab-content p-0">
            <!-- Morris chart - Sales -->
            <div class="chart tab-pane fade show active" id="revenue-chart" style="position: relative;">
              <form action="<?= base_url; ?>/Report/sellingout_summary" method="post">
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

                  $no=1;
                ?>
                <div class="row" style="margin-left: 5px;margin-right: 5px;">
                  <div style="width : 125px;">
                    <select class="mdb-select md-form form-control" title="By Principal" id="dt_principal" name="by_principal">
                        <option value="">By Principal</option>
                            <?php $no=1; ?>
                            <?php foreach ($data['principal'] as $row) :?>
                                <option <?php if( $principal==$row['principal']){echo "selected"; } ?> value="<?= $row['principal'];?>"><b><?= $row['principal'];?></b></option>
                            <?php $no++; endforeach; ?>
                    </select>
                  </div>
                  <div style="margin-left : 5px; width : 135px;">
                    <select class="mdb-select md-form form-control" title="By Group SKU" id="dt_groupsku" name="by_group_sku" style="margin-left : 10px;">
                        <option value="">By Group SKU</option>
                            <?php $no=1; ?>
                            <?php foreach ($data['item_group'] as $row) :?>
                                    <option <?php if( $groupsku==$row['item_group']){echo "selected"; } ?> value="<?= $row['item_group'];?>"><b><?= $row['item_group'];?></b></option>
                            <?php $no++; endforeach; ?>
                    </select>
                  </div>
                  <div style="margin-left : 5px; width : 230px;">
                    <select class="mdb-select md-form form-control" title="By SKU" id="dt_sku" name="by_sku" style="margin-left : 5px;">
                        <option value="">By SKU</option>
                            <?php $no=1; ?>
                            <?php foreach ($data['item_name'] as $row) :?>
                                    <option <?php if( $sku==$row['item_name']){echo "selected"; } ?> value="<?= $row['item_name'];?>"><b><?= $row['item_name'];?></b></option>
                            <?php $no++; endforeach; ?>
                    </select>
                  </div>
                  <div class="row" style="margin-left : 5px; width:120px;">
                    <select name="by_month1" title="MONTH" class="mdb-select md-form form-control" style="margin-left : 5px; width:120px;">
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
                    <div style="margin-left : 5px;margin-right : 5px; margin-top: 5px;">
                      <label>To</label>
                    </div>
                    <select name="by_month2" title="MONTH" class="mdb-select md-form form-control" style="margin-left : 5px; width:120px;">
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
                  <div style="margin-left : 10px; width : 80px;">
                    <input name="by_year" class="mdb-select md-form form-control" type="number" min="1900" max="2099" step="1" value="<?= $year ;?>" />
                  </div>
                  <div>
                    <button class="btn btn-outline-primary" type="submit" style="margin-left : 5px;">Go!</button>
                    <a class="btn btn-outline-secondary" href="<?= base_url; ?>/Report/sellingout_summary">Reset</a>
                  </div>
                </div>

                <div class="row">
                  <section class="col-sm-8 connectedSortable">
                    <!-- <div class="card-deck" style="margin-left:5px;margin-right:5px;"> -->
                      <div class="table-responsive-sm text-small">
                        <table id="rpt_sale_out_qty" class="table table-bordered table-sm nowrap" align="left" style="font-size:85%">
                          <thead class="thead-light">
                              <tr>
                                <th rowspan="2" class="text-center" style="vertical-align: middle;">#</th>
                                <th rowspan="2" class="text-center" style="vertical-align: middle;">Channel</th>
                                <th rowspan="2" class="text-center" style="vertical-align: middle;">Outlet Type</th>
                                <th rowspan="2" class="text-center" style="vertical-align: middle;">Kode</th>
                                <th rowspan="2" class="text-center" style="vertical-align: middle;">Qty</th>
                                <th colspan="2" class="text-center">Contribution %</th>
                              </tr>                  
                              <tr>
                                <th class="text-center">Channel</th>
                                <th class="text-center">Type</th>
                              </tr>
                          </thead>
                          <tbody>

                            <?php 

                              $sub_qty_channel = 0;
                              $sub_qty_oc = 0;
                              $grand_total = 0;

                              $i = 0;
                              $rowcount = 0;
                              $channel_ar = [];
                              $qty_ar = [];
                              $qty = 0;
                              foreach ($data['qty_channel'] as $row) :
                                $channel_ar[$i] = $row['channel'];
                                $qty_ar[$i] = $row['qty'];
                                $rowcount = $i+1;
                                $qty += $row['qty'];
                                $i++;
                              endforeach;

                              $channel = '';
                              $outlet_category = '';
                              $ii = 0;

                              /* foreach ($data['sellingin_dist'] as $row) :
                                $channel_dist = $row['channel'];
                                $outlet_dist = $row['outlet_type'];
                                $desc_dist = $row['desc_type'];
                                $qty_dist = $row['qty'];
                              endforeach;

                              $qty_total = $qty + $qty_dist; */


                            ?>

                            <!-- ONLINE -->
                            <?php foreach ($data['sellingout'] as $row) :?>

                              <?php

                                      if ($outlet_category != $row['outlet_category'] and $outlet_category != '' and $outlet_category != $channel )
                                      {

                                          echo '<tr class="table text-center" style="font-weight:bold;">';
                                              echo '<td></td>';
                                              echo '<td>' .$channel. '</td>';
                                              echo '<td>TOTAL ' .$outlet_category. '</td>';
                                              echo '<td></td>';
                                              echo '<td class="text-right">' .number_format($sub_qty_oc, 0). '</td>';
                                              echo '<td class="text-right">' .number_format($sub_qty_oc/($qty ?: 1)*100,2). ' %</td>';
                                              echo '<td class="text-right">' .number_format($sub_qty_oc/($qty ?: 1)*100,2). ' %</td>';
                                          echo '</tr>';
                                          $sub_qty_oc = 0;
                                      }

                                      if ($channel != $row['channel'] and $channel != '')
                                      {

                                          echo '<tr class="table text-center" style="font-weight:bold;">';
                                              echo '<td></td>';
                                              echo '<td>TOTAL ' .$channel. '</td>';
                                              echo '<td></td>';
                                              echo '<td></td>';
                                              echo '<td class="text-right">' .number_format($sub_qty_channel, 0). '</td>';
                                              echo '<td class="text-right">' .number_format($sub_qty_channel/($qty ?: 1)*100,2). ' %</td>';
                                              echo '<td class="text-right">' .number_format($sub_qty_channel/($qty ?: 1)*100,2). ' %</td>';
                                          echo '</tr>';

                                          $sub_qty_channel = 0;
                                          $sub_qty_oc = 0;
                                          
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
                                <td><a href="<?= base_url; ?>/Report/getSellingoutOT/<?= implode(",", $data1); ?>" target="_blank"><?= $row['desc_type'];?></a></td>
                                <td><?= $row['outlet_type'];?></td>
                                <td class="text-right"><?= number_format($row['qty'], 0);?></td>
                                <td class="text-right"><?= number_format($row['qty']/($qty_ar[$ii-1] ?: 1)*100,2);?> %</td>
                                <td class="text-right"><?= number_format($row['qty']/($qty ?: 1)*100,2);?> %</td>
                              </tr>

                            <?php $sub_qty_channel += $row['qty'];?>
                            <?php $sub_qty_oc += $row['qty'];?>
                            <?php $grand_total += $row['qty'];?>
                            <?php $channel = $row['channel']; ?>
                            <?php $outlet_category = $row['outlet_category']; ?>

                            <?php $no++; endforeach; ?>

                            <?php
                                if ($outlet_category != $channel )
                                {

                                    echo '<tr class="table text-center" style="font-weight:bold;">';
                                        echo '<td></td>';
                                        echo '<td>' .$channel. '</td>';
                                        echo '<td>TOTAL ' .$outlet_category. '</td>';
                                        echo '<td></td>';
                                        echo '<td class="text-right">' .number_format($sub_qty_oc, 0). '</td>';
                                        echo '<td class="text-right">' .number_format($sub_qty_oc/($qty_total ?: 1)*100,2). ' %</td>';
                                        echo '<td class="text-right">' .number_format($sub_qty_oc/($qty_total ?: 1)*100,2). ' %</td>';
                                    echo '</tr>';
                                    $sub_qty_oc = 0;
                                }
                                else
                                {

                                    echo '<tr class="table text-center" style="font-weight:bold;">';
                                        echo '<td></td>';
                                        echo '<td>TOTAL ' .$channel. '</td>';
                                        echo '<td></td>';
                                        echo '<td></td>';
                                        echo '<td class="text-right">' .number_format($sub_qty_channel, 0). '</td>';
                                        echo '<td class="text-right">' .number_format($sub_qty_channel/($qty_total ?: 1)*100,2). ' %</td>';
                                        echo '<td class="text-right">' .number_format($sub_qty_channel/($qty_total ?: 1)*100,2). ' %</td>';
                                    echo '</tr>';

                                    $sub_qty_channel = 0;
                                    $sub_qty_oc = 0;  
                                }
                              ;?>

                            <!-- TOTAL -->
                            <tr>
                              <td></td>
                              <td style="font-weight:bold" class="text-center">GRAND TOTAL</td>
                              <td></td>
                              <td></td>
                              <td style="font-weight:bold" class="text-right"><?= number_format($grand_total, 0);?></td>
                              <td style="font-weight:bold" class="text-right"><?= number_format(($grand_total)/($qty ?: 1)*100,2);?> %</td>
                              <td style="font-weight:bold" class="text-right"><?= number_format(($grand_total)/($qty ?: 1)*100,2);?> %</td>
                            </tr>

                          </tbody>
                        </table>
                      </div>
                    <!-- </div> -->
                  </section>

                  <section class="col-sm-4 connectedSortable">
                    <div class="card-deck" style="margin-left:5px;margin-right:5px;">
                      <div class="col" style="margin-top: 0px;margin-left: 5px;">
                          <canvas id="myChart1" style="width: 200px;height: 200px; margin-bottom: 0px;"></canvas>
                          <canvas id="myChart2" style="width: 200px;height: 200px; margin-bottom: 0px;"></canvas>
                      </div>
                    </div>
                  </section>
                </div>

              </form>
            </div>
            <div class="chart tab-pane fade show" id="sales-chart" style="position: relative;">
              <form action="<?= base_url; ?>/Report/sellingout_summary" method="post">
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

                  $no=1;
                ?>
                <div class="row" style="margin-left: 5px;margin-right: 5px;">
                  <div style="width : 125px;">
                    <select class="mdb-select2 md-form form-control" title="By Principal" id="principal" name="by_principal">
                        <option value="">By Principal</option>
                            <?php $no=1; ?>
                            <?php foreach ($data['principal'] as $row) :?>
                                <option <?php if( $principal==$row['principal']){echo "selected"; } ?> value="<?= $row['principal'];?>"><b><?= $row['principal'];?></b></option>
                            <?php $no++; endforeach; ?>
                    </select>
                  </div>
                  <div style="margin-left : 5px; width : 135px;">
                    <select class="mdb-select2 md-form form-control" title="By Group SKU" id="dt_groupsku2" name="by_group_sku" style="margin-left : 10px;">
                        <option value="">By Group SKU</option>
                            <?php $no=1; ?>
                            <?php foreach ($data['item_group'] as $row) :?>
                                    <option <?php if( $groupsku==$row['item_group']){echo "selected"; } ?> value="<?= $row['item_group'];?>"><b><?= $row['item_group'];?></b></option>
                            <?php $no++; endforeach; ?>
                    </select>
                  </div>
                  <div style="margin-left : 5px; width : 230px;">
                    <select class="mdb-select2 md-form form-control" title="By SKU" id="dt_sku2" name="by_sku" style="margin-left : 10px;">
                        <option value="">By SKU</option>
                            <?php $no=1; ?>
                            <?php foreach ($data['item_name'] as $row) :?>
                                    <option <?php if( $sku==$row['item_name']){echo "selected"; } ?> value="<?= $row['item_name'];?>"><b><?= $row['item_name'];?></b></option>
                            <?php $no++; endforeach; ?>
                    </select>
                  </div>
                  <div class="row" style="margin-left : 5px; width:120px;">
                    <div></div>
                    <select name="by_month1" title="MONTH" class="mdb-select2 md-form form-control" style="margin-left : 5px; width:120px;">
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
                    <div style="margin-left : 5px;margin-right : 5px; margin-top: 5px;">
                      <label>To</label>
                    </div>
                    <select name="by_month2" title="MONTH" class="mdb-select2 md-form form-control" style="margin-left : 5px; width:120px;">
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
                  <div style="margin-left : 10px; width : 80px;">
                    <input name="by_year" class="mdb-select2 md-form form-control" type="number" min="1900" max="2099" step="1" value="<?= $year ;?>" />
                  </div>
                  <div>
                    <button class="btn btn-outline-primary" type="submit" style="margin-left : 5px;">Go!</button>
                    <a class="btn btn-outline-secondary" href="<?= base_url; ?>/Report/sellingout_summary">Reset</a>
                  </div>
                </div>

                <div class="row">
                  <section class="col-sm-8 connectedSortable">
                    <!-- <div class="card-deck" style="margin-left:5px;margin-right:5px;"> -->
                      <div class="table-responsive-sm text-small">
                        <table id="rpt_sale_out_val" class="display table-bordered table-sm nowrap" align="left" style="font-size:85%">
                          <thead class="thead-light">
                              <tr>
                                <th rowspan="2" class="text-center" style="vertical-align: middle;">#</th>
                                <th rowspan="2" class="text-center" style="vertical-align: middle;">Channel</th>
                                <th rowspan="2" class="text-center" style="vertical-align: middle;">Outlet Type</th>
                                <th rowspan="2" class="text-center" style="vertical-align: middle;">Kode</th>
                                <th rowspan="2" class="text-center" style="vertical-align: middle;">Value</th>
                                <th colspan="2" class="text-center">Contribution %</th>
                              </tr>                  
                              <tr>
                                <th class="text-center">Channel</th>
                                <th class="text-center">Type</th>
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
                              $rowcount = $i+1;
                              $val += $row['val'];
                              $i++;
                            endforeach;

                            $channel = '';
                            $outlet_category = '';
                            $ii = 0;

                            ?>

                            <!-- ONLINE -->
                            <?php foreach ($data['sellingout'] as $row) :?>

                              <?php

                                      if ($outlet_category != $row['outlet_category'] and $outlet_category != '' and $outlet_category != $channel )
                                      {

                                          echo '<tr class="table text-center" style="font-weight:bold;">';
                                              echo '<td></td>';
                                              echo '<td>' .$channel. '</td>';
                                              echo '<td>TOTAL ' .$outlet_category. '</td>';
                                              echo '<td></td>';
                                              echo '<td class="text-right">' .number_format($sub_val_oc, 0). '</td>';
                                              echo '<td class="text-right">' .number_format($sub_val_oc/($val ?: 1)*100,2). ' %</td>';
                                              echo '<td class="text-right">' .number_format($sub_val_oc/($val ?: 1)*100,2). ' %</td>';
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
                                              echo '<td class="text-right">' .number_format($sub_val_channel/($val ?: 1)*100,2). ' %</td>';
                                              echo '<td class="text-right">' .number_format($sub_val_channel/($val ?: 1)*100,2). ' %</td>';
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
                                                echo '<td class="text-right">' .number_format($sub_val_MT/($val ?: 1)*100,2). ' %</td>';
                                                echo '<td class="text-right">' .number_format($sub_val_MT/($val ?: 1)*100,2). ' %</td>';
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
                                <!-- <td><a href="<?= base_url; ?>/Report/getSellinginOT/<?= $row['id']; ?>" target="_blank"><?= $row['desc_type'];?></a></td> -->
                                <td><a href="<?= base_url; ?>/Report/getSellingoutOT/<?= implode(", ", $data1); ?>" target="_blank"><?= $row['desc_type'];?></a></td>
                                <td><?= $row['outlet_type'];?></td>
                                <td class="text-right"><?= number_format($row['val'], 0);?></td>
                                <td class="text-right"><?= number_format($row['val']/($val_ar[$ii-1] ?: 1)*100,2);?> %</td>
                                <td class="text-right"><?= number_format($row['val']/($val ?: 1)*100,2);?> %</td>
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
                              <td class="text-right"><?= number_format($sub_val_oc/($val ?: 1)*100,2);?> %</td>
                              <td class="text-right"><?= number_format($sub_val_oc/($val ?: 1)*100,2);?> %</td>
                          </tr>

                          <tr class="table text-center" style="font-weight:bold;">
                              <td></td>
                              <td>TOTAL GT</td>
                              <td></td>
                              <td></td>
                              <td class="text-right"><?= number_format($sub_val_channel, 0) ;?></td>
                              <td class="text-right"><?= number_format($sub_val_channel/($val ?: 1)*100,2);?> %</td>
                              <td class="text-right"><?= number_format($sub_val_channel/($val ?: 1)*100,2);?> %</td>
                          </tr>

                          <!-- TOTAL -->
                          <tr>
                            <td></td>
                            <td style="font-weight:bold" class="text-center">GRAND TOTAL</td>
                            <td></td>
                            <td></td>
                            <td style="font-weight:bold" class="text-right"><?= number_format($grand_total, 0);?></td>
                            <td style="font-weight:bold" class="text-right"><?= number_format(($grand_total)/($val ?: 1)*100,2);?> %</td>
                            <td style="font-weight:bold" class="text-right"><?= number_format(($grand_total)/($val ?: 1)*100,2);?> %</td>
                          </tr>

                          </tbody>
                        </table>
                      </div>
                    <!-- </div> -->
                  </section> 

                  <section class="col-sm-4 connectedSortable">
                    <div class="clearfix" style="margin-left: 10px; ">
                      <div class="col" style="margin-top: 0px;margin-left: 10px;">
                          <canvas id="myChart3" style="width: 200px;height: 200px; margin-bottom: 0px;"></canvas>
                          <canvas id="myChart4" style="width: 200px;height: 200px; margin-bottom: 0px;"></canvas>
                      </div>
                    </div>
                  </section>
                </div> 
              </form>                       
            </div>
            
          </div><!-- /tab-content -->
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
  <style>
    .table tr { line-height: 14px; }
    .select2-selection {
      height: 40px !important;
    }
    .select2-selection__arrow {
      margin: 5px;
    }
  </style>

<script>
  $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
    $($.fn.dataTable.tables(true)).DataTable()
      .columns.adjust();
  });
</script>

<script>
  $(document).ready(function() {
    $("#dt_principal").select2({
      dropdownParent: $("#sales-chart")
    });
  });
</script>

<script>  
var ctx = document.getElementById("myChart1");
/* ctx.height = 200;
ctx.width = 200; */
var myChart = new Chart(ctx, {
    type: 'pie',
    data: {
        // labels: [<?php echo $channel_ar[0] . ', ' . $channel_ar[1] . ', ' . $channel_ar[2] . ', ' . $channel_ar[3]; ?>],
        labels: ['ONLINE', 'MTKA', 'MTI', 'GENERAL TRADE'],
        datasets: [{
                
                data: [<?php echo $qty_ar[0] . ', ' . $qty_ar[1] . ', ' . $qty_ar[2] . ', ' . $qty_ar[3]; ?>],
                backgroundColor: [
                    'rgba(0, 15, 255, 0.5)',
                    'rgba(47, 244, 79, 0.6)',
                    'rgba(255, 248, 0, 0.6)',
                    'rgba(190, 144, 212, 0.6)',
                    //'rgba(210, 38, 30, 0.6)'
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
        labels: false,
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
        /* datalabels: {
          color: '#111',
          textAlign: 'center',
          font: {
            lineHeight: 1
          },
          formatter: function(value, ctx) {
            return ctx.chart.data.labels[ctx.dataIndex] + '\n' + value + '%';
          }
        }, */
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
        // labels: [<?php echo $channel_ar[0] . ', ' . $channel_ar[1] . ', ' . $channel_ar[2] . ', ' . $channel_ar[3]; ?>],
        labels: ['ONLINE', 'MTKA', 'MTI', 'GENERAL TRADE'],
        datasets: [{
                label: '# OL',
                data: [<?php echo $qty_ar[0] . ', ' . $qty_ar[1] . ', ' . $qty_ar[2] . ', ' . $qty_ar[3]; ?>],
                backgroundColor: [
                    'rgba(0, 15, 255, 0.5)',
                    'rgba(47, 244, 79, 0.6)',
                    'rgba(255, 248, 0, 0.6)',
                    'rgba(190, 144, 212, 0.6)',
                    //'rgba(210, 38, 30, 0.6)'
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
        labels: false,
        outlabels: {
            zoomOutPercentage: 35,
            text: '%v',
            color: 'black',
            stretch: 20,
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
        enabled: false
      }, 
    }
});
</script>

<script>  
var ctx = document.getElementById("myChart3");
/* ctx.height = 200;
ctx.width = 200; */
var myChart = new Chart(ctx, {
    type: 'pie',
    data: {
        // labels: [<?php echo $channel_ar[0] . ', ' . $channel_ar[1] . ', ' . $channel_ar[2] . ', ' . $channel_ar[3]; ?>],
        labels: ['ONLINE', 'MTKA', 'MTI', 'GENERAL TRADE'],
        datasets: [{
                data: [<?php echo $val_ar[0] . ', ' . $val_ar[1] . ', ' . $val_ar[2] . ', ' . $val_ar[3]; ?>],
                backgroundColor: [
                    'rgba(0, 15, 255, 0.5)',
                    'rgba(47, 244, 79, 0.6)',
                    'rgba(255, 248, 0, 0.6)',
                    'rgba(190, 144, 212, 0.6)',
                    //'rgba(210, 38, 30, 0.6)'
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
        labels: false,
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
var ctx = document.getElementById("myChart4");
/* ctx.height = 450;
ctx.width = 200; */
var myChart = new Chart(ctx, {
    type: 'pie',
    data: {
        // labels: [<?php echo $channel_ar[0] . ', ' . $channel_ar[1] . ', ' . $channel_ar[2] . ', ' . $channel_ar[3]; ?>],
        labels: ['ONLINE', 'MTKA', 'MTI', 'GENERAL TRADE'],
        datasets: [{
                label: '# OL',
                data: [<?php echo round($val_ar[0],2) . ', ' . round($val_ar[1],2) . ', ' . round($val_ar[2],2) . ', ' . round($val_ar[3],2); ?>],
                backgroundColor: [
                    'rgba(0, 15, 255, 0.5)',
                    'rgba(47, 244, 79, 0.6)',
                    'rgba(255, 248, 0, 0.6)',
                    'rgba(190, 144, 212, 0.6)',
                    //'rgba(210, 38, 30, 0.6)'
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
        labels: false,
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

<script type="text/javascript">
    $(document).ready(function(){
      
        $('#dt_groupsku').change(function(){ 
            var id=$('#dt_groupsku').val();
            $.ajax({
                    url : "<?= base_url; ?>/Report/showSKU_ByGroup",
                    method : "POST",
                    data : {id: id},
                    async : true,
                    success: function(data){
                        $('#dt_sku').html(data);
                    }
                }
            );
            return false;
        });

        $('#dt_groupsku2').change(function(){ 
            var id=$('#dt_groupsku2').val();
            $.ajax({
                    url : "<?= base_url; ?>/Report/showSKU_ByGroup",
                    method : "POST",
                    data : {id: id},
                    async : true,
                    success: function(data){
                        $('#dt_sku2').html(data);
                    }
                }
            );
            return false;
        });
        
    });
</script>

