 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Report Selling Out</h1> 
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

            <form action="<?= base_url; ?>/report/sellingout2" method="post">
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
                          <select class="mdb-select md-form form-control" title="By Principal" name="by_principal" >
                              <option value="">By Principal</option>
                                  <?php $no=1; ?>
                                  <?php foreach ($data['principal'] as $row) :?>
                                      <option <?php if( $principal==$row['principal']){echo "selected"; } ?> value="<?= $row['principal'];?>"><b><?= $row['principal'];?></b></option>
                                  <?php $no++; endforeach; ?>
                          </select>
                          <select class="mdb-select md-form form-control" title="By SKU" name="by_sku" style="margin-left : 10px;">
                              <option value="">By SKU</option>
                                  <?php $no=1; ?>
                                  <?php foreach ($data['item_name'] as $row) :?>
                                        <option <?php if( $sku==$row['item_name']){echo "selected"; } ?> value="<?= $row['item_name'];?>"><b><?= $row['item_name'];?></b></option>
                                  <?php $no++; endforeach; ?>
                          </select>
                          <select class="mdb-select md-form form-control" title="By Group SKU" name="by_group_sku" style="margin-left : 10px;">
                              <option value="">By Group SKU</option>
                                  <?php $no=1; ?>
                                  <?php foreach ($data['item_group'] as $row) :?>
                                        <option <?php if( $groupsku==$row['item_group']){echo "selected"; } ?> value="<?= $row['item_group'];?>"><b><?= $row['item_group'];?></b></option>
                                  <?php $no++; endforeach; ?>
                          </select>
                          <select class="mdb-select md-form form-control" title="By Distributor" name="by_distributor" style="margin-left : 10px;">
                              <option value="">By Distributor</option>
                                  <?php $no=1; ?>
                                  <?php foreach ($data['nama_dist'] as $row) :?>
                                        <option <?php if( $distributor==$row['nama_dist']){echo "selected"; } ?> value="<?= $row['nama_dist'];?>"><b><?= $row['nama_dist'];?></b></option>
                                  <?php $no++; endforeach; ?>
                          </select>
                          <select class="mdb-select md-form form-control" title="By Area" name="by_area" style="margin-left : 10px;">
                              <option value="">By Area</option>
                                  <?php $no=1; ?>
                                  <?php foreach ($data['area'] as $row) :?>
                                        <option <?php if( $area==$row['area']){echo "selected"; } ?> value="<?= $row['area'];?>"><b><?= $row['area'];?></b></option>
                                  <?php $no++; endforeach; ?>
                            </select>
                            <select class="mdb-select md-form form-control" title="By Island" name="by_island" style="margin-left : 10px;">
                              <option value="">By Island</option>
                                  <?php $no=1; ?>
                                  <?php foreach ($data['island'] as $row) :?>
                                        <option <?php if( $island==$row['island']){echo "selected"; } ?> value="<?= $row['island'];?>"><b><?= $row['island'];?></b></option>
                                  <?php $no++; endforeach; ?>
                            </select>
                            <button class="btn btn-outline-primary" type="submit" style="margin-left : 10px;">Go!</button>
                                <a class="btn btn-outline-secondary" href="<?= base_url; ?>/report/sellingout2">Reset</a>
                      </div>
                      <div>
                        <br>
                      </div>

                        <!-- <div id="hasil_sale_out"></div> -->
                        <div class="row">
                          <table id="rpt_sale_out2" class="table table-bordered table-sm" width="750px" align="left" style="font-size:85%">
                          <thead class="thead-light">
                              <tr>
                                <th rowspan="2" class="text-center" style="width: 5px; vertical-align: middle;">#</th>
                                <th rowspan="2" class="text-center" style="width: 100px; vertical-align: middle;">Channel</th>
                                <th rowspan="2" class="text-center" style="width: 250px; vertical-align: middle;">Outlet Type</th>
                                <th rowspan="2" class="text-center" style="width: 65px; vertical-align: middle;">Kode</th>
                                <th rowspan="2" class="text-center" style="width: 65px; vertical-align: middle;">Qty</th>
                                <th colspan="2" class="text-center">Contribution %</th>
                              </tr>                  
                              <tr>
                                <th class="text-center" style="width: 60px">Channel</th>
                                <th class="text-center" style="width: 60px">Type</th>
                              </tr>
                            </thead>
                            <tbody>

                              <?php 

                                $qty_ol = 0;
                                $qty_mtka = 0;
                                $qty_mti = 0;
                                $qty_mt = 0;
                                $qty_gt_w = 0;
                                $qty_gt_pv = 0;
                                $qty_gt_bb = 0;
                                $qty_gt_bs = 0;
                                $qty_gt_ph = 0;
                                $qty_gt = 0;
                                $qty_total = 0;

                                foreach ($data['sellingout_qty_ol'] as $row) :
                                  $qty_ol = $row['qty_OL'];
                                endforeach;

                                foreach ($data['sellingout_qty_mtka'] as $row) :
                                  $qty_mtka = $row['qty_MTKA'];
                                endforeach;

                                foreach ($data['sellingout_qty_mti'] as $row) :
                                  $qty_mti = $row['qty_MTI'];
                                endforeach;

                                foreach ($data['sellingout_qty_gt_w'] as $row) :
                                  $qty_gt_w = $row['qty_GT_W'];
                                endforeach;

                                foreach ($data['sellingout_qty_gt_pv'] as $row) :
                                  $qty_gt_pv = $row['qty_GT_PV'];
                                endforeach;

                                foreach ($data['sellingout_qty_gt_bb'] as $row) :
                                  $qty_gt_bb = $row['qty_GT_BB'];
                                endforeach;

                                foreach ($data['sellingout_qty_gt_bs'] as $row) :
                                  $qty_gt_bs = $row['qty_GT_BS'];
                                endforeach;

                                foreach ($data['sellingout_qty_gt_ph'] as $row) :
                                  $qty_gt_ph = $row['qty_GT_PH'];
                                endforeach;
                                
                                $qty_mt = $qty_mtka + $qty_mti;
                                $qty_gt = $qty_gt_w + $qty_gt_pv + $qty_gt_bb + $qty_gt_bs + $qty_gt_ph;
                                $qty_total = $qty_ol + $qty_mt + $qty_gt;
                              ?>

                              <!-- ONLINE -->
                              <?php $total_ol=0; ?> 
                              <?php foreach ($data['sellingout_online'] as $row) :?>
                                <tr>
                                  <td class="text-center"><?= $row['id']; ?></td>
                                  <td class="text-center"><?= $row['channel'];?></td>
                                  <td><?= $row['desc_type'];?></td>
                                  <td><?= $row['outlet_type'];?></td>
                                  <td class="text-right"><?= number_format($row['qty'], 0);?></td>
                                  <td class="text-right"><?= number_format($row['qty']/($qty_ol ?: 1)*100,2);?> %</td>
                                  <td class="text-right"><?= number_format($row['qty']/($qty_total ?: 1)*100,2);?> %</td>
                                </tr>
                              <?php $total_ol += $row['qty']; ?>
                              <?php $no++; endforeach; ?>
                              <?php $cont_ol = $total_ol/($qty_total ?: 1)*100; ?>
                                <tr>
                                  <td></td>
                                  <td style="font-weight:bold" class="text-center">Total Online</td>
                                  <td></td>
                                  <td></td>
                                  <td style="font-weight:bold" class="text-right"><?= number_format($total_ol);?></td>
                                  <td style="font-weight:bold" class="text-right"><?= number_format($cont_ol,2);?> %</td>
                                  <td style="font-weight:bold" class="text-right"><?= number_format($cont_ol,2);?> %</td>
                                </tr>  

                              <!-- MTKA -->
                              <?php $total_mtka=0; ?> 
                              <?php foreach ($data['sellingout_mtka'] as $row) :?>
                                <tr>
                                  <td class="text-center"><?= $row['id']; ?></td>
                                  <td class="text-center"><?= $row['channel'];?></td>
                                  <td><?= $row['desc_type'];?></td>
                                  <td><?= $row['outlet_type'];?></td>
                                  <td class="text-right"><?= number_format($row['qty'], 0);?></td>
                                  <td class="text-right"><?= number_format($row['qty']/($qty_mtka ?: 1)*100,2);?> %</td>
                                  <td class="text-right"><?= number_format($row['qty']/($qty_total ?: 1)*100,2);?> %</td>
                                </tr>
                              <?php $total_mtka += $row['qty']; ?>
                              <?php $no++; endforeach; ?>
                              <?php $cont_mtka = $total_mtka/($qty_total ?: 1)*100; ?>
                                <tr>
                                  <td></td>
                                  <td style="font-weight:bold" class="text-center">Total MTKA</td>
                                  <td></td>
                                  <td></td>
                                  <td style="font-weight:bold" class="text-right"><?= number_format($total_mtka);?></td>
                                  <td style="font-weight:bold" class="text-right"><?= number_format($cont_mtka,2);?> %</td>
                                  <td style="font-weight:bold" class="text-right"><?= number_format($cont_mtka,2);?> %</td>
                                </tr>
                              
                              <!-- MTI -->
                              <?php $total_mti=0; ?> 
                              <?php foreach ($data['sellingout_mti'] as $row) :?>
                                <tr>
                                  <td class="text-center"><?= $row['id']; ?></td>
                                  <td class="text-center"><?= $row['channel'];?></td>
                                  <td><?= $row['desc_type'];?></td>
                                  <td><?= $row['outlet_type'];?></td>
                                  <td class="text-right"><?= number_format($row['qty'], 0);?></td>
                                  <td class="text-right"><?= number_format($row['qty']/($qty_mti ?: 1)*100,2);?> %</td>
                                  <td class="text-right"><?= number_format($row['qty']/($qty_total ?: 1)*100,2);?> %</td>
                                </tr>
                              <?php $total_mti += $row['qty']; ?>
                              <?php $no++; endforeach; ?>
                              <?php $cont_mti = $total_mti/($qty_total ?: 1)*100; ?>
                                <tr>
                                  <td></td>
                                  <td style="font-weight:bold" class="text-center">Total MTI</td>
                                  <td></td>
                                  <td></td>
                                  <td style="font-weight:bold" class="text-right"><?= number_format($total_mti);?></td>
                                  <td style="font-weight:bold" class="text-right"><?= number_format($cont_mti,2);?> %</td>
                                  <td style="font-weight:bold" class="text-right"><?= number_format($cont_mti,2);?> %</td>
                                </tr>

                              <!-- MT -->
                              <?php $total_mt = $total_mtka + $total_mti; ?>
                              <?php $cont_mt = $total_mt/($qty_total ?: 1)*100; ?>
                                <tr>
                                  <td></td>
                                  <td style="font-weight:bold" class="text-center">Total MT</td>
                                  <td></td>
                                  <td></td>
                                  <td style="font-weight:bold" class="text-right"><?= number_format($total_mt);?></td>
                                  <td style="font-weight:bold" class="text-right"><?= number_format($cont_mt,2);?> %</td>
                                  <td style="font-weight:bold" class="text-right"><?= number_format($cont_mt,2);?> %</td>
                                </tr>

                              <!-- GT_W -->
                              <?php $total_gt_w=0; ?> 
                              <?php foreach ($data['sellingout_gt_w'] as $row) :?>
                                <tr>
                                  <td class="text-center"><?= $row['id']; ?></td>
                                  <td class="text-center"><?= $row['channel'];?></td>
                                  <td><?= $row['desc_type'];?></td>
                                  <td><?= $row['outlet_type'];?></td>
                                  <td class="text-right"><?= number_format($row['qty'], 0);?></td> 
                                  <td class="text-right"><?= number_format($row['qty']/($qty_gt_w ?: 1)*100,2);?> %</td>
                                  <td class="text-right"><?= number_format($row['qty']/($qty_total ?: 1)*100,2);?> %</td>
                                </tr>
                              <?php $total_gt_w += $row['qty']; ?>
                              <?php $no++; endforeach; ?>
                              <?php $cont_gt_w = $total_gt_w/($qty_total ?: 1)*100; ?>
                                <tr>
                                  <td></td>
                                  <td><?= $row['channel'];?></td>
                                  <td style="font-weight:bold" class="text-center">TOTAL WHOLESALER</td>
                                  <td></td>
                                  <td style="font-weight:bold" class="text-right"><?= number_format($total_gt_w);?></td>
                                  <td style="font-weight:bold" class="text-right"><?= number_format($cont_gt_w,2);?> %</td>
                                  <td style="font-weight:bold" class="text-right"><?= number_format($cont_gt_w,2);?> %</td>
                                </tr>
                              
                              <!-- GT_PV -->
                              <?php $total_gt_pv=0; ?> 
                              <?php foreach ($data['sellingout_gt_pv'] as $row) :?>
                                <tr>
                                  <td class="text-center"><?= $row['id']; ?></td>
                                  <td class="text-center"><?= $row['channel'];?></td>
                                  <td><?= $row['desc_type'];?></td>
                                  <td><?= $row['outlet_type'];?></td>
                                  <td class="text-right"><?= number_format($row['qty'], 0);?></td>
                                  <td class="text-right"><?= number_format($row['qty']/($qty_gt_pv ?: 1)*100,2);?> %</td>
                                  <td class="text-right"><?= number_format($row['qty']/($qty_total ?: 1)*100,2);?> %</td>
                                </tr>
                              <?php $total_gt_pv += $row['qty']; ?>
                              <?php $no++; endforeach; ?>
                              <?php $cont_gt_pv = $total_gt_pv/($qty_total ?: 1)*100; ?>
                                <tr>
                                  <td></td>
                                  <td><?= $row['channel'];?></td>
                                  <td style="font-weight:bold" class="text-center">TOTAL PROVISION</td>
                                  <td></td>
                                  <td style="font-weight:bold" class="text-right"><?= number_format($total_gt_pv);?></td>
                                  <td style="font-weight:bold" class="text-right"><?= number_format($cont_gt_pv,2);?> %</td>
                                  <td style="font-weight:bold" class="text-right"><?= number_format($cont_gt_pv,2);?> %</td>
                                </tr>

                                <!-- GT_BB -->
                              <?php $total_gt_bb=0; ?> 
                              <?php foreach ($data['sellingout_gt_bb'] as $row) :?>
                                <tr>
                                  <td class="text-center"><?= $row['id']; ?></td>
                                  <td class="text-center"><?= $row['channel'];?></td>
                                  <td><?= $row['desc_type'];?></td>
                                  <td><?= $row['outlet_type'];?></td>
                                  <td class="text-right"><?= number_format($row['qty'], 0);?></td>
                                  <td class="text-right"><?= number_format($row['qty']/($qty_gt_bb ?: 1)*100,2);?> %</td>
                                  <td class="text-right"><?= number_format($row['qty']/($qty_total ?: 1)*100,2);?> %</td>
                                </tr>
                              <?php $total_gt_bb += $row['qty']; ?>
                              <?php $no++; endforeach; ?>
                              <?php $cont_gt_bb = $total_gt_bb/($qty_total ?: 1)*100; ?>
                                <tr>
                                  <td></td>
                                  <td><?= $row['channel'];?></td>
                                  <td style="font-weight:bold" class="text-center">TOTAL BABY SHOP</td>
                                  <td></td>
                                  <td style="font-weight:bold" class="text-right"><?= number_format($total_gt_bb);?></td>
                                  <td style="font-weight:bold" class="text-right"><?= number_format($cont_gt_bb,2);?> %</td>
                                  <td style="font-weight:bold" class="text-right"><?= number_format($cont_gt_bb,2);?> %</td>
                                </tr>

                                <!-- GT_BS -->
                              <?php $total_gt_bs=0; ?> 
                              <?php foreach ($data['sellingout_gt_bs'] as $row) :?>
                                <tr>
                                  <td class="text-center"><?= $row['id']; ?></td>
                                  <td class="text-center"><?= $row['channel'];?></td>
                                  <td><?= $row['desc_type'];?></td>
                                  <td><?= $row['outlet_type'];?></td>
                                  <td class="text-right"><?= number_format($row['qty'], 0);?></td>
                                  <td class="text-right"><?= number_format($row['qty']/($qty_gt_bs ?: 1)*100,2);?> %</td>
                                  <td class="text-right"><?= number_format($row['qty']/($qty_total ?: 1)*100,2);?> %</td>
                                </tr>
                              <?php $total_gt_bs += $row['qty']; ?>
                              <?php $no++; endforeach; ?>
                              <?php $cont_gt_bs = $total_gt_bs/($qty_total ?: 1)*100; ?>
                                <tr>
                                  <td></td>
                                  <td><?= $row['channel'];?></td>
                                  <td style="font-weight:bold" class="text-center">TOTAL BARBER SHOP</td>
                                  <td></td>
                                  <td style="font-weight:bold" class="text-right"><?= number_format($total_gt_bs);?></td>
                                  <td style="font-weight:bold" class="text-right"><?= number_format($cont_gt_bs,2);?> %</td>
                                  <td style="font-weight:bold" class="text-right"><?= number_format($cont_gt_bs,2);?> %</td>
                                </tr>

                                <!-- GT_PH -->
                              <?php $total_gt_ph=0; ?> 
                              <?php foreach ($data['sellingout_gt_ph'] as $row) :?>
                                <tr>
                                  <td class="text-center"><?= $row['id']; ?></td>
                                  <td class="text-center"><?= $row['channel'];?></td>
                                  <td><?= $row['desc_type'];?></td>
                                  <td><?= $row['outlet_type'];?></td>
                                  <td class="text-right"><?= number_format($row['qty'], 0);?></td>
                                  <td class="text-right"><?= number_format($row['qty']/($qty_gt_ph ?: 1)*100,2);?> %</td>
                                  <td class="text-right"><?= number_format($row['qty']/($qty_total ?: 1)*100,2);?> %</td>
                                </tr>
                              <?php $total_gt_ph += $row['qty']; ?>
                              <?php $no++; endforeach; ?>
                              <?php $cont_gt_ph = $total_gt_ph/($qty_total ?: 1)*100; ?>
                                <tr>
                                  <td></td>
                                  <td><?= $row['channel'];?></td>
                                  <td style="font-weight:bold" class="text-center">TOTAL PHARMACY</td>
                                  <td></td>
                                  <td style="font-weight:bold" class="text-right"><?= number_format($total_gt_ph);?></td>
                                  <td style="font-weight:bold" class="text-right"><?= number_format($cont_gt_ph,2);?> %</td>
                                  <td style="font-weight:bold" class="text-right"><?= number_format($cont_gt_ph,2);?> %</td>
                                </tr>

                                <!-- GT -->
                                <?php $total_gt = $total_gt_w + $total_gt_pv + $total_gt_bb + $total_gt_bs + $total_gt_ph; ?>
                                <?php $cont_gt = $total_gt/($qty_total ?: 1)*100; ?> 
                                <tr>
                                  <td></td>
                                  <td style="font-weight:bold" class="text-center">Total GT</td>
                                  <td></td>
                                  <td></td>
                                  <td style="font-weight:bold" class="text-right"><?= number_format($total_gt);?></td>
                                  <td style="font-weight:bold" class="text-right"><?= number_format($cont_gt,2);?> %</td>
                                  <td style="font-weight:bold" class="text-right"><?= number_format($cont_gt,2);?> %</td>
                                </tr>

                                <!-- TOTAL -->
                                <?php $total_grand = $total_ol + $total_mt + $total_gt ?>
                                <?php $cont_total = $cont_ol + $cont_mtka + $cont_mti + $cont_gt ?> 
                                <tr>
                                  <td></td>
                                  <td style="font-weight:bold" class="text-center">Grand Total</td>
                                  <td></td>
                                  <td></td>
                                  <td style="font-weight:bold" class="text-right"><?= number_format($total_grand);?></td>
                                  <td style="font-weight:bold" class="text-right"><?= number_format($cont_total,2);?> %</td>
                                  <td style="font-weight:bold" class="text-right"><?= number_format($cont_total,2);?> %</td>
                                </tr>

                            </tbody>
                          </table>
                        <!-- </div> -->

                        <!-- <div class="row"> -->
                          <div class="clearfix" style="margin-left: 50px;">
                            <table class="table table-sm" align="right" style="font-size:75%; width: 375px">
                              <thead>
                                <tr>
                                  <th>FILTER BY </th>
                                  <th colspan="2" style="width: 350px"></th>
                                </tr>
                              </thead>
                              <tr>
                                <td style="width: 100px">Principal</td>
                                <td style="width: 20px">:</td>
                                <td><b><?php echo $principal; ?></b></td>
                              </tr>
                              <tr>
                                <td>SKU</td>
                                <td>:</td>
                                <td><b><?php echo $sku; ?></b></td>
                              </tr>
                              <tr>
                                <td>Group SKU</td>
                                <td>:</td>
                                <td><b><?php echo $groupsku; ?></b></td>
                              </tr>
                              <tr>
                                <td>Distributor</td>
                                <td>:</td>
                                <td><b><?php echo $distributor; ?></b></td>
                              </tr>
                              <tr>
                              <td>Area</td>
                                <td>:</td>
                                <td><b><?php echo $area; ?></b></td>
                              </tr>
                              <tr>
                                <td>Island</td>
                                <td>:</td>
                                <td><b><?php echo $island; ?></b></td>
                              </tr>
                              <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                              </tr>
                            </table>

                            <div style="width: 100%;height: 100%; margin-top: 150px;">
                                <canvas id="myBarChart"></canvas>
                            </div>

                          <style>
                            .table tr { line-height: 14px; }
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

  <script>  

var randomColorGenerator = function () { 
    return '#' + (Math.random().toString(16) + '0000000').slice(2, 8); 
};

var ctx = document.getElementById("myBarChart");
ctx.height = 200;
var myChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: ['OL', 'MT', 'GT'],
        datasets: [{
                label: '# OL',
                data: [<?php echo $qty_ol . ', ' . $qty_mt . ', ' . $qty_gt; ?>],

                backgroundColor: [
                    'rgba(0, 11, 255, 1.0)',
                    'rgba(47, 244, 79, 1.0)',
                    'rgba(255, 248, 0, 1.0)',
                ],
            }]
    },
    options: {
      legend: {
            display: true,
            position: 'top',
            labels: {
                boxWidth: 20,
                fontColor: '#111',
                padding: 15
            }
      }, 
      plugins: {
            datalabels: {
                color: '#111',
                textAlign: 'center',
                font: {
                    lineHeight: 1.6
                },
                formatter: function(value, ctx) {
                    return ctx.chart.data.labels[ctx.dataIndex] + '\n' + value + '%';
                }
            }
      }
    }
});
</script>