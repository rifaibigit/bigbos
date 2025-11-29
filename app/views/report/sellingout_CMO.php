  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>CONFORM MONTHLY ORDER - CMO</h1> 
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
            <form action="<?= base_url; ?>/Report/sellingout_CMO" method="post">
                <div class="row">
                    <div class="col-md-12">
                      <div class="input-group mb-3">

                        <?php

                        if(isset($data))
                        {
                            $region = $data['by_region'];
                            $area = $data['by_area'];
                            $island = $data['by_island'];
                            $kode_dist = $data['by_dist'];
                            $year = $data['by_year'];
                            $month = $data['by_month'];

                        }else
                        {
                            $region = "By Region";
                            $area = "By Area";
                            $island = "By Island";
                            $kode_dist = "By Distributor";
                        }

                        ?>
                          
                          <div style="margin-left : 5px; width : 350px; margin-bottom: 5px;">
                              <select class="mdb-select md-form form-control" title="By Outlet" id="dt_dist" name="by_dist" style="margin-left : 5px;">
                                  <option value="">By Distributor</option>
                                      <?php $no=1; ?>
                                      <?php foreach ($data['dist'] as $row) :?>
                                              <option <?php if( $kode_dist==$row['cust_code']){echo "selected"; } ?> value="<?= $row['cust_code'];?>"><b><?= $row['distributor'];?></b></option>
                                      <?php $no++; endforeach; ?>
                              </select>
                          </div>
                          <div style="margin-left : 10px; width : 125px;">
                            <select name="by_month" class="mdb-select xs-form form-control">
                              <option <?php if( $month=='all' or $month=='All' ){echo 'selected'; } ?> value="all">All</option>
                              <option <?php if( $month=='1' or $month=='1' ){echo 'selected'; } ?> value="1">Januari</option>
                              <option <?php if( $month=='2' or $month=='2' ){echo 'selected'; } ?> value="2">Februari</option>
                              <option <?php if( $month=='3' or $month=='3' ){echo 'selected'; } ?> value="3">Maret</option>
                              <option <?php if( $month=='4' or $month=='4' ){echo 'selected'; } ?> value="4">April</option>
                              <option <?php if( $month=='5' or $month=='5' ){echo 'selected'; } ?> value="5">Mei</option>
                              <option <?php if( $month=='6' or $month=='6' ){echo 'selected'; } ?> value="6">Juni</option>
                              <option <?php if( $month=='7' or $month=='7' ){echo 'selected'; } ?> value="7">Juli</option>
                              <option <?php if( $month=='8' or $month=='8' ){echo 'selected'; } ?> value="8">Agustus</option>
                              <option <?php if( $month=='9' or $month=='9' ){echo 'selected'; } ?> value="9">September</option>
                              <option <?php if( $month=='10' or $month=='10'){echo 'selected'; } ?> value="10">Oktober</option>
                              <option <?php if( $month=='11' or $month=='11'){echo 'selected'; } ?> value="11">Nopember</option>
                              <option <?php if( $month=='12' or $month=='12'){echo 'selected'; } ?> value="12">Desember</option>
                            </select>
                          </div>
                          <div style="margin-left : 5px; width : 80px;">
                              <input name="by_year" class="mdb-select md-form form-control" type="number" min="1900" max="2099" step="1" value="<?= $year ;?>" />
                          </div>
                          <div style="margin-left : 10px;">
                            <button class="btn btn-outline-primary" type="submit">Go!</button>
                            <a class="btn btn-outline-secondary" href="<?= base_url; ?>/Report/sellingout_performance_weekly">Reset</a>
                          </div>
                          <div style="margin-left : 10px;">
                            <button class="btn float-right btn btn-outline-success" type="submit" formaction="<?= base_url; ?>/Report/export_sellingout_CMO"><i class = "fa fa-download"> Excel</i></button>
                          </div>
                        </div>

                        <?php
                          if($kode_dist != 'By Distributor')
                          { 
                            $buffer = $data['buffer_dist']['buffer_stock'];
                            $lead_time = $data['buffer_dist']['lead_time'];
                          }
                        ;?>

                        <!-- <div id="hasil_sale_out"></div> -->
                        <div class="table-responsive-sm text-small">
                          <table id="sale_out_performance" class="table table-bordered table-sm order-column" align="left" style="font-size:85%; border: 1px solid black;">
                          <thead class="table-warning">
                              <tr>
                                <th rowspan="3" class="text-center" style="width: 5px; vertical-align: middle;">#</th>
                                <th rowspan="3" class="text-center" style="width: 15px; vertical-align: middle;">ITEM CODE</th>
                                <th rowspan="3" class="text-center" style="width: 250px; vertical-align: middle;">DESCRIPTION</th>
                                <th rowspan="3" class="text-center" style="width: 15px; vertical-align: middle;">UNIT</th>
                                <th rowspan="3" class="text-center" style="width: 15px; vertical-align: middle;">DBP (000)</th>
                                <th rowspan="3" class="text-center" style="width: 15px; vertical-align: middle;">Stock on Hand</th>
                                <th rowspan="3" class="text-center" style="width: 15px; vertical-align: middle;">Order in Transit</th>
                                <th rowspan="3" class="text-center" style="width: 15px; vertical-align: middle;">Total Stock </th>
                                <th rowspan="3" class="text-center" style="width: 15px; vertical-align: middle;">Value Stock</th>
                                <th colspan="2" class="text-center" style="vertical-align: middle;">Avg. Sales</th>
                                <th rowspan="3" class="text-center" style="width: 15px; vertical-align: middle;">Stock Cover Days</th>
                                <th colspan="2" class="text-center" style="vertical-align: middle;">Estimate (Sell Out)</th>
                                <th rowspan="2" class="text-center" style="width: 15px; vertical-align: middle;">Buffer Stock (days)</th>
                                <th rowspan="2" class="text-center" style="width: 15px; vertical-align: middle;">Lead Time Delivery (days)</th>
                                <th rowspan="3" class="text-center" style="width: 15px; vertical-align: middle;">Total Plan Order</th>
                                <th colspan="2" class="text-center" style="vertical-align: middle;">Additional Order</th>
                                <th colspan="2" class="text-center" style="vertical-align: middle;">TOTAL - CMO (PCS)</th>
                                <th colspan="1" class="text-center" style="width: 20px; vertical-align: middle;">TOTAL - CMO (KARTON)</th>
                                <th colspan="5" class="text-center" style="vertical-align: middle;">CMO Break Down per Week = PO (KARTON)</th>
                                <th colspan="3" class="text-center" style="vertical-align: middle;">This Month Target</th>
                              </tr>
                              <tr>
                                <th rowspan="2" class="text-center" style="vertical-align: middle;">Volume</th>
                                <th rowspan="2" class="text-center" style="vertical-align: middle;">Rupiah</th>
                                <th rowspan="2" class="text-center" style="vertical-align: middle;">Volume</th>
                                <th rowspan="2" class="text-center" style="vertical-align: middle;">Rupiah</th>
                                <th rowspan="2" class="text-center" style="vertical-align: middle;">Promo Plan</th>
                                <th rowspan="2" class="text-center" style="vertical-align: middle;">Pembulatan</th>
                                <th rowspan="2" class="text-center" style="vertical-align: middle;">Volume</th>
                                <th rowspan="2" class="text-center" style="vertical-align: middle;">Rupiah</th>
                                <th rowspan="2" class="text-center" style="vertical-align: middle;">Volume</th>
                                <th rowspan="2" class="text-center" style="vertical-align: middle;">Week 1</th>
                                <th rowspan="2" class="text-center" style="vertical-align: middle;">Week 2</th>
                                <th rowspan="2" class="text-center" style="vertical-align: middle;">Week 3</th>
                                <th rowspan="2" class="text-center" style="vertical-align: middle;">Week 4</th>
                                <th rowspan="2" class="text-center" style="vertical-align: middle;">CWO VS PO</th>
                                <th rowspan="2" class="text-center" style="vertical-align: middle;">Volume</th>
                                <th rowspan="2" class="text-center" style="vertical-align: middle;">Rupiah</th>
                                <th rowspan="2" class="text-center" style="vertical-align: middle;">Idx (%)</th>
                              </tr> 
                              <tr>
                                <th rowspan="1" class="text-center"><?= $buffer ;?></th>
                                <th rowspan="1" class="text-center"><?= $lead_time ;?></th>
                              </tr>
                            </thead>
                            <tbody>
                                
                              <?php 

                                  $item_group = '';
                                  $principal = '';

                                  $sub_ending_qty = 0;
                                  $sub_transit_qty = 0;
                                  $sub_total_ending_qty = 0;
                                  $sub_total_ending_val = 0;
                                  $sub_qty_avg_sales = 0;
                                  $sub_value_avg_sales = 0;
                                  $sub_stock_cover_days = 0;
                                  $sub_buffer_stock_days = 0;
                                  $sub_lead_time_delivery = 0;
                                  $sub_plan_order = 0;
                                  $sub_cmo_pcs_qty = 0;
                                  $sub_cmo_pcs_val = 0;
                                  $sub_cmo_carton_qty = 0;
                                  $sub_target_qty = 0;
                                  $sub_target_val = 0;
                                  $sub_target_idx = 0;

                                  $total_ending_qty = 0;
                                  $total_transit_qty = 0;
                                  $total_total_ending_qty = 0;
                                  $total_total_ending_val = 0;
                                  $total_qty_avg_sales = 0;
                                  $total_value_avg_sales = 0;
                                  $total_stock_cover_days = 0;
                                  $total_buffer_stock_days = 0;
                                  $total_lead_time_delivery = 0;
                                  $total_plan_order = 0;
                                  $total_cmo_pcs_qty = 0;
                                  $total_cmo_pcs_val = 0;
                                  $total_cmo_carton_qty = 0;
                                  $total_target_qty = 0;
                                  $total_target_val = 0;
                                  $total_target_idx = 0;

                                  $grand_ending_qty = 0;
                                  $grand_transit_qty = 0;
                                  $grand_total_ending_qty = 0;
                                  $grand_total_ending_val = 0;
                                  $grand_qty_avg_sales = 0;
                                  $grand_value_avg_sales = 0;
                                  $grand_stock_cover_days = 0;
                                  $grand_buffer_stock_days = 0;
                                  $grand_lead_time_delivery = 0;
                                  $grand_plan_order = 0;
                                  $grand_cmo_pcs_qty = 0;
                                  $grand_cmo_pcs_val = 0;
                                  $grand_cmo_carton_qty = 0;
                                  $grand_target_qty = 0;
                                  $grand_target_val = 0;
                                  $grand_target_idx = 0;

                                  ?>
                                  <?php $no=1; ?>

                                  <?php foreach ($data['cmo'] as $row) :?>

                                  <?php

                                      if ($item_group != $row['item_group'] and $item_group != '' )
                                      {

                                          echo '<tr class="table-warning" style="font-weight:bold;">';
                                              echo '<td class="text-center"></td>';
                                              echo '<td></td>';
                                              echo '<td class="text-center">Sub Total ' . $item_group. '</td>';
                                              echo '<td></td>';
                                              echo '<td class="text-center"></td>';
                                              echo '<td class="text-right">' . number_format($sub_ending_qty, 0). '</td>';
                                              echo '<td class="text-right">' . number_format($sub_transit_qty, 0). '</td>';
                                              echo '<td class="text-right">' . number_format($sub_total_ending_qty, 0). '</td>';
                                              echo '<td class="text-right">' . number_format($sub_total_ending_val, 0). '</td>';
                                              echo '<td class="text-right">' . number_format($sub_qty_avg_sales, 0). '</td>';
                                              echo '<td class="text-right">' . number_format($sub_value_avg_sales, 0). '</td>';
                                              echo '<td class="text-right">' . number_format($sub_stock_cover_days, 0). '</td>';
                                              echo '<td class="text-right">' . number_format($sub_qty_avg_sales, 0). '</td>';
                                              echo '<td class="text-right">' . number_format($sub_value_avg_sales, 0). '</td>';
                                              echo '<td class="text-right">' . number_format($sub_buffer_stock_days, 0). '</td>';
                                              echo '<td class="text-right">' . number_format($sub_lead_time_delivery, 0). '</td>';
                                              echo '<td class="text-right">' . number_format($sub_plan_order, 0). '</td>';
                                              echo '<td class="text-right"></td>';
                                              echo '<td class="text-right"></td>';
                                              echo '<td class="text-right">' . number_format($sub_cmo_pcs_qty, 0). '</td>';
                                              echo '<td class="text-right">' . number_format($sub_cmo_pcs_val, 0). '</td>';
                                              echo '<td class="text-right">' . number_format($sub_cmo_carton_qty, 2). '</td>';
                                              echo '<td class="text-right"></td>';
                                              echo '<td class="text-right"></td>';
                                              echo '<td class="text-right"></td>';
                                              echo '<td class="text-right"></td>';                                 
                                              echo '<td class="text-right"></td>';
                                              echo '<td class="text-right">' . number_format($sub_target_qty, 0). '</td>';
                                              echo '<td class="text-right">' . number_format($sub_target_val, 0). '</td>';
                                              echo '<td class="text-right">' . number_format($sub_target_idx, 2). '</td>';
                                              
                                          echo '</tr>';

                                          $sub_ending_qty = 0;
                                          $sub_transit_qty = 0;
                                          $sub_total_ending_qty = 0;
                                          $sub_total_ending_val = 0;
                                          $sub_qty_avg_sales = 0;
                                          $sub_value_avg_sales = 0;
                                          $sub_stock_cover_days = 0;
                                          $sub_buffer_stock_days = 0;
                                          $sub_lead_time_delivery = 0;
                                          $sub_plan_order = 0;
                                          $sub_cmo_pcs_qty = 0;
                                          $sub_cmo_pcs_val = 0;
                                          $sub_cmo_carton_qty = 0;
                                          $sub_target_qty = 0;
                                          $sub_target_val = 0;
                                          $sub_target_idx = 0;
                                      }


                                      if ($principal != $row['principal'] and $principal != '' )
                                      {

                                          echo '<tr class="table-danger" style="font-weight:bold;">';
                                              echo '<td class="text-center"></td>';
                                              echo '<td></td>';
                                              echo '<td class="text-center">TOTAL ' . $principal. '</td>';
                                              echo '<td class="text-center"></td>';
                                              echo '<td class="text-center"></td>';
                                              echo '<td class="text-right">' . number_format($total_ending_qty, 0). '</td>';
                                              echo '<td class="text-right">' . number_format($total_transit_qty, 0). '</td>';
                                              echo '<td class="text-right">' . number_format($total_total_ending_qty, 0). '</td>';
                                              echo '<td class="text-right">' . number_format($total_total_ending_val, 0). '</td>';
                                              echo '<td class="text-right">' . number_format($total_qty_avg_sales, 0). '</td>';
                                              echo '<td class="text-right">' . number_format($total_value_avg_sales, 0). '</td>';
                                              echo '<td class="text-right">' . number_format($total_stock_cover_days, 0). '</td>';
                                              echo '<td class="text-right">' . number_format($total_qty_avg_sales, 0). '</td>';
                                              echo '<td class="text-right">' . number_format($total_value_avg_sales, 0). '</td>';
                                              echo '<td class="text-right">' . number_format($total_buffer_stock_days, 0). '</td>';
                                              echo '<td class="text-right">' . number_format($total_lead_time_delivery, 0). '</td>';
                                              echo '<td class="text-right">' . number_format($total_plan_order, 0). '</td>';
                                              echo '<td class="text-right"></td>';
                                              echo '<td class="text-right"></td>';
                                              echo '<td class="text-right">' . number_format($total_cmo_pcs_qty, 0). '</td>';
                                              echo '<td class="text-right">' . number_format($total_cmo_pcs_val, 0). '</td>';
                                              echo '<td class="text-right">' . number_format($total_cmo_carton_qty, 2). '</td>';
                                              echo '<td class="text-right"></td>';
                                              echo '<td class="text-right"></td>';
                                              echo '<td class="text-right"></td>';
                                              echo '<td class="text-right"></td>';                                 
                                              echo '<td class="text-right"></td>';
                                              echo '<td class="text-right">' . number_format($total_target_qty, 0). '</td>';
                                              echo '<td class="text-right">' . number_format($total_target_val, 0). '</td>';
                                              echo '<td class="text-right">' . number_format($total_target_idx, 2). '</td>';

                                              
                                          echo '</tr>';

                                          $total_ending_qty = 0;
                                          $total_transit_qty = 0;
                                          $total_total_ending_qty = 0;
                                          $total_total_ending_val = 0;
                                          $total_qty_avg_sales = 0;
                                          $total_value_avg_sales = 0;
                                          $total_stock_cover_days = 0;
                                          $total_buffer_stock_days = 0;
                                          $total_lead_time_delivery = 0;
                                          $total_plan_order = 0;
                                          $total_cmo_pcs_qty = 0;
                                          $total_cmo_pcs_val = 0;
                                          $total_cmo_carton_qty = 0;
                                          $total_target_qty = 0;
                                          $total_target_val = 0;
                                          $total_target_idx = 0;
                                      }

                                      

                                  ?>

                                <tr>
                                  <td class="text-center"><?= $no; ?></td>
                                  <td><?= $row['item_code'];?></td>
                                  <td><?= $row['item_name'];?></td>
                                  <td class="text-center"><?= $row['unit'];?></td>
                                  <td class="text-right"><?= number_format($row['dist_exc'], 2);?></td>
                                  <td class="text-right"><?= number_format($row['ending_qty'], 0);?></td>
                                  <td class="text-right"><?= number_format($row['transit_qty'], 0);?></td>
                                  <?php $ttl_ending_qty = $row['ending_qty'] + $row['transit_qty'] ;?>
                                  <?php $ttl_ending_val = $ttl_ending_qty * $row['dist_exc'] ;?>
                                  <td class="text-right"><?= number_format($ttl_ending_qty, 0);?></td>
                                  <td class="text-right"><?= number_format($ttl_ending_val, 0);?></td>
                                  <td class="text-right"><?= number_format($row['qty_avg_sales'], 0);?></td>
                                  <td class="text-right"><?= number_format($row['value_avg_sales'], 0);?></td>
                                  <?php 
                                    if($row['qty_avg_sales'] == 0 or $ttl_ending_qty == 0)
                                    {
                                      $stock_cover_days = 0;
                                    }
                                    else
                                    {
                                      $stock_cover_days = ($ttl_ending_qty/$row['qty_avg_sales'])*30;
                                    } 
                                  ;?>
                                  <td class="text-right"><?= number_format($stock_cover_days, 0);?></td>
                                  <td class="text-right"><?= number_format($row['qty_avg_sales'], 0);?></td>
                                  <td class="text-right"><?= number_format($row['value_avg_sales'], 0);?></td>
                                  <td class="text-right"><?= number_format($row['buffer_stock_days'], 0);?></td>
                                  <td class="text-right"><?= number_format($row['lead_time_delivery'], 0);?></td>
                                  <?php $plan_order = ($row['qty_avg_sales'] + $row['buffer_stock_days'] + $row['lead_time_delivery']) - $ttl_ending_qty ;?>
                                  <td class="text-right"><?= number_format($plan_order, 0);?></td>
                                  <td></td>
                                  <td></td>
                                  <?php $cmo_pcs_qty = $plan_order ;?>
                                  <?php $cmo_pcs_val = $cmo_pcs_qty * $row['dist_exc'] ;?>
                                  <td class="text-right"><?= number_format($cmo_pcs_qty, 0);?></td>
                                  <td class="text-right"><?= number_format($cmo_pcs_val, 0);?></td>
                                  <?php $cmo_carton_qty = $cmo_pcs_qty * $row['unit_conversion'] ;?>
                                  <td class="text-right"><?= number_format($cmo_carton_qty, 2);?></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <?php $target_qty = $row['target_qty'] ;?>
                                  <?php $target_val = $target_qty * $row['dist_exc'] ;?>
                                  <?php 
                                    if($target_val == 0 or $cmo_pcs_val == 0)
                                    {
                                      $target_idx = 0;
                                    }
                                    else
                                    {
                                      $target_idx = ($cmo_pcs_val/$target_val)*100;
                                    } 
                                  ;?>
                                  <td class="text-right"><?= number_format($target_qty, 0);?></td>
                                  <td class="text-right"><?= number_format($target_val, 0);?></td>
                                  <td class="text-right"><?= number_format($target_idx, 2);?></td>

                                </tr>

                                  <?php $item_group = $row['item_group']; ?>
                                  <?php $principal = $row['principal']; ?>

                                  <?php $sub_ending_qty += $row['ending_qty']; ?>
                                  <?php $sub_transit_qty += $row['transit_qty']; ?>
                                  <?php $sub_total_ending_qty += $ttl_ending_qty; ?>
                                  <?php $sub_total_ending_val += $ttl_ending_val; ?>
                                  <?php $sub_qty_avg_sales += $row['qty_avg_sales']; ?>
                                  <?php $sub_value_avg_sales += $row['value_avg_sales']; ?>
                                  <?php $sub_stock_cover_days += $stock_cover_days; ?>
                                  <?php $sub_buffer_stock_days += $row['buffer_stock_days']; ?>
                                  <?php $sub_lead_time_delivery += $row['lead_time_delivery']; ?>
                                  <?php $sub_plan_order += $plan_order; ?>
                                  <?php $sub_cmo_pcs_qty += $cmo_pcs_qty; ?>
                                  <?php $sub_cmo_pcs_val += $cmo_pcs_val; ?>
                                  <?php $sub_cmo_carton_qty += $cmo_carton_qty; ?>
                                  <?php $sub_target_qty += $target_qty; ?>
                                  <?php $sub_target_val += $target_val; ?>
                                  <?php $sub_target_idx += $target_idx; ?>

                                  <?php $total_ending_qty += $row['ending_qty']; ?>
                                  <?php $total_transit_qty += $row['transit_qty']; ?>
                                  <?php $total_total_ending_qty += $ttl_ending_qty; ?>
                                  <?php $total_total_ending_val += $ttl_ending_val; ?>
                                  <?php $total_qty_avg_sales += $row['qty_avg_sales']; ?>
                                  <?php $total_value_avg_sales += $row['value_avg_sales']; ?>
                                  <?php $total_stock_cover_days += $stock_cover_days; ?>
                                  <?php $total_buffer_stock_days += $row['buffer_stock_days']; ?>
                                  <?php $total_lead_time_delivery += $row['lead_time_delivery']; ?>
                                  <?php $total_plan_order += $plan_order; ?>
                                  <?php $total_cmo_pcs_qty += $cmo_pcs_qty; ?>
                                  <?php $total_cmo_pcs_val += $cmo_pcs_val; ?>
                                  <?php $total_cmo_carton_qty += $cmo_carton_qty; ?>
                                  <?php $total_target_qty += $target_qty; ?>
                                  <?php $total_target_val += $target_val; ?>
                                  <?php $total_target_idx += $target_idx; ?>

                                  <?php $grand_ending_qty += $row['ending_qty']; ?>
                                  <?php $grand_transit_qty += $row['transit_qty']; ?>
                                  <?php $grand_total_ending_qty += $ttl_ending_qty; ?>
                                  <?php $grand_total_ending_val += $ttl_ending_val; ?>
                                  <?php $grand_qty_avg_sales += $row['qty_avg_sales']; ?>
                                  <?php $grand_value_avg_sales += $row['value_avg_sales']; ?>
                                  <?php $grand_stock_cover_days += $stock_cover_days; ?>
                                  <?php $grand_buffer_stock_days += $row['buffer_stock_days']; ?>
                                  <?php $grand_lead_time_delivery += $row['lead_time_delivery']; ?>
                                  <?php $grand_plan_order += $plan_order; ?>
                                  <?php $grand_cmo_pcs_qty += $cmo_pcs_qty; ?>
                                  <?php $grand_cmo_pcs_val += $cmo_pcs_val; ?>
                                  <?php $grand_cmo_carton_qty += $cmo_carton_qty; ?>
                                  <?php $grand_target_qty += $target_qty; ?>
                                  <?php $grand_target_val += $target_val; ?>
                                  <?php $grand_target_idx += $target_idx; ?>

                                  <?php $no++; endforeach; ?>

                                <tr class="table-warning" style="font-weight:bold">
                                  <td></td>
                                  <td></td>
                                  <td class="text-center">Sub Total <?= $item_group;?></td>
                                  <td></td>
                                  <td></td>
                                  <td class="text-right"><?= number_format($sub_ending_qty, 0);?></td>
                                  <td class="text-right"><?= number_format($sub_transit_qty, 0);?></td>
                                  <td class="text-right"><?= number_format($sub_total_ending_qty, 0);?></td>
                                  <td class="text-right"><?= number_format($sub_total_ending_val, 0);?></td>
                                  <td class="text-right"><?= number_format($sub_qty_avg_sales, 0);?></td>
                                  <td class="text-right"><?= number_format($sub_value_avg_sales, 0);?></td>
                                  <td class="text-right"><?= number_format($sub_stock_cover_days, 0);?></td>
                                  <td class="text-right"><?= number_format($sub_qty_avg_sales, 0);?></td>
                                  <td class="text-right"><?= number_format($sub_value_avg_sales, 0);?></td>
                                  <td class="text-right"><?= number_format($sub_buffer_stock_days, 0);?></td>
                                  <td class="text-right"><?= number_format($sub_lead_time_delivery, 0);?></td>
                                  <td class="text-right"><?= number_format($sub_plan_order, 0);?></td>
                                  <td></td>
                                  <td></td>
                                  <td class="text-right"><?= number_format($sub_cmo_pcs_qty, 0);?></td>
                                  <td class="text-right"><?= number_format($sub_cmo_pcs_val, 0);?></td>
                                  <td class="text-right"><?= number_format($sub_cmo_carton_qty, 2);?></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td class="text-right"><?= number_format($sub_target_qty, 0);?></td>
                                  <td class="text-right"><?= number_format($sub_target_val, 0);?></td>
                                  <td class="text-right"><?= number_format($sub_target_idx, 2);?></td>

                                </tr>

                                <tr class="table-danger" style="font-weight:bold">

                                  <td></td>
                                  <td></td>
                                  <td class="text-center">TOTAL <?= $principal;?></td>
                                  <td></td>
                                  <td></td>
                                  <td class="text-right"><?= number_format($total_ending_qty, 0);?></td>
                                  <td class="text-right"><?= number_format($total_transit_qty, 0);?></td>
                                  <td class="text-right"><?= number_format($total_total_ending_qty, 0);?></td>
                                  <td class="text-right"><?= number_format($total_total_ending_val, 0);?></td>
                                  <td class="text-right"><?= number_format($total_qty_avg_sales, 0);?></td>
                                  <td class="text-right"><?= number_format($total_value_avg_sales, 0);?></td>
                                  <td class="text-right"><?= number_format($total_stock_cover_days, 0);?></td>
                                  <td class="text-right"><?= number_format($total_qty_avg_sales, 0);?></td>
                                  <td class="text-right"><?= number_format($total_value_avg_sales, 0);?></td>
                                  <td class="text-right"><?= number_format($total_buffer_stock_days, 0);?></td>
                                  <td class="text-right"><?= number_format($total_lead_time_delivery, 0);?></td>
                                  <td class="text-right"><?= number_format($total_plan_order, 0);?></td>
                                  <td></td>
                                  <td></td>
                                  <td class="text-right"><?= number_format($total_cmo_pcs_qty, 0);?></td>
                                  <td class="text-right"><?= number_format($total_cmo_pcs_val, 0);?></td>
                                  <td class="text-right"><?= number_format($total_cmo_carton_qty, 2);?></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td class="text-right"><?= number_format($total_target_qty, 0);?></td>
                                  <td class="text-right"><?= number_format($total_target_val, 0);?></td>
                                  <td class="text-right"><?= number_format($total_target_idx, 2);?></td>

                                </tr>

                                <tr class="table-danger" style="font-weight:bold">
                                  <td></td>
                                  <td></td>
                                  <td class="text-center">GRAND TOTAL</td>
                                  <td></td>
                                  <td></td>
                                  <td class="text-right"><?= number_format($grand_ending_qty, 0);?></td>
                                  <td class="text-right"><?= number_format($grand_transit_qty, 0);?></td>
                                  <td class="text-right"><?= number_format($grand_total_ending_qty, 0);?></td>
                                  <td class="text-right"><?= number_format($grand_total_ending_val, 0);?></td>
                                  <td class="text-right"><?= number_format($grand_qty_avg_sales, 0);?></td>
                                  <td class="text-right"><?= number_format($grand_value_avg_sales, 0);?></td>
                                  <td class="text-right"><?= number_format($grand_stock_cover_days, 0);?></td>
                                  <td class="text-right"><?= number_format($grand_qty_avg_sales, 0);?></td>
                                  <td class="text-right"><?= number_format($grand_value_avg_sales, 0);?></td>
                                  <td class="text-right"><?= number_format($grand_buffer_stock_days, 0);?></td>
                                  <td class="text-right"><?= number_format($grand_lead_time_delivery, 0);?></td>
                                  <td class="text-right"><?= number_format($grand_plan_order, 0);?></td>
                                  <td></td>
                                  <td></td>
                                  <td class="text-right"><?= number_format($grand_cmo_pcs_qty, 0);?></td>
                                  <td class="text-right"><?= number_format($grand_cmo_pcs_val, 0);?></td>
                                  <td class="text-right"><?= number_format($grand_cmo_carton_qty, 2);?></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td class="text-right"><?= number_format($grand_target_qty, 0);?></td>
                                  <td class="text-right"><?= number_format($grand_target_val, 0);?></td>
                                  <td class="text-right"><?= number_format($grand_target_idx, 2);?></td>

                                </tr>

                            </tbody>
                          </table>

                          <style>
                            .table thead tr { line-height: 15px; }
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