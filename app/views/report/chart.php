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
        <div class="card-body"> 
            <form action="<?= base_url; ?>/report/sellingoutgo" method="post">
                <div class="row">
                    <div class="col-md-12">
                        <div class="input-group mb-3">
                            <select class="mdb-select md-form form-control" data-live-search="true" name="by_principal" >
                                <option value="">By Principal</option>
                                    <?php $no=1; ?>
                                    <?php foreach ($data['principal'] as $row) :?>
                                        <option value=$no><?= $row['principal'];?></option>
                                    <?php $no++; endforeach; ?>
                            </select>
                            <select class="mdb-select md-form form-control" data-live-search="true" name="by_sku">
                                <option value="">By SKU</option>
                                    <?php $no=1; ?>
                                    <?php foreach ($data['item_name'] as $row) :?>
                                        <option value=$no><?= $row['item_name'];?></option>
                                    <?php $no++; endforeach; ?>
                            </select>
                            <select class="mdb-select md-form form-control" data-live-search="true" name="by_group_sku">
                                <option value="">By Group SKU</option>
                                    <?php $no=1; ?>
                                    <?php foreach ($data['item_group'] as $row) :?>
                                        <option value=$no><?= $row['item_group'];?></option>
                                    <?php $no++; endforeach; ?>
                            </select>
                            <select class="mdb-select md-form form-control" data-live-search="true" name="by_distributor">
                                <option value="">By Distributor</option>
                                <?php $no=1; ?>
                                    <?php foreach ($data['nama_dist'] as $row) :?>
                                        <option value=$no><?= $row['nama_dist'];?></option>
                                    <?php $no++; endforeach; ?>
                            </select>
                            <select class="mdb-select md-form form-control" data-live-search="true" name="by_area">
                                <option value="">By Area</option>
                                    <?php $no=1; ?>
                                    <?php foreach ($data['area'] as $row) :?>
                                        <option value=$no><?= $row['area'];?></option>
                                    <?php $no++; endforeach; ?>
                            </select>
                            <select class="mdb-select md-form form-control" data-live-search="true" name="by_island">
                                <option value="">By Island</option>
                                <?php $no=1; ?>
                                    <?php foreach ($data['island'] as $row) :?>
                                        <option value=$no><?= $row['island'];?></option>
                                    <?php $no++; endforeach; ?>
                            </select>
                            <button type="submit" class="btn btn-outline-primary">Go!</button>
                            <a class="btn btn-outline-secondary" href="<?= base_url; ?>/report/sellingout" >Reset</a>
                        </div>

                        <?php 
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

                        <div class="row">
                            <div style="width: 45%;height: 45%">
                                <canvas id="myBarChart"></canvas>
                            </div>
                            <div style="width: 45%;height: 45%">
                                <canvas id="myLineChart"></canvas>
                            </div>
                        </div>
                        <div class="col md-2">
                            <a class="btn btn-primary" href="<?= base_url; ?>/report/sellingout">Back</a>
                        </div>
                        
                    </div>
                </div>
            </form>

            <script>  

                var randomColorGenerator = function () { 
                    return '#' + (Math.random().toString(16) + '0000000').slice(2, 8); 
                };

                //var qty = [$qty_ol, $qty_mtka, $qty_mti, $qty_mt, $qty_gt_w, $qty_gt_pv, $qty_gt_bb, $qty_gt_bs, $qty_gt_ph, $qty_gt, $qty_total];
                var ctx = document.getElementById("myBarChart");
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ["Online", "MTKA", "MTI", "MT", "WHOLESALER", "PROVISION", "BABY SHOP", "BARBER SHOP", "PHARMACY", "General Trade", "Total"],
                        datasets: [{
                                label: '# Selling Out Chart',
                                data: [<?php echo $qty_ol . ", " . $qty_mtka . ", " . $qty_mti . ", " . $qty_mt . ", " . $qty_gt_w . ", " . $qty_gt_pv . ", " . $qty_gt_bb . ", " . $qty_gt_bs . ", " . $qty_gt_ph . ", " . $qty_gt . ", " . $qty_total; ?>],
                                //data: qty,
                                //data: [114228, 89245, 102216122, 102305367, 1046110, 114410271, 45439468, 385330, 814645, 162095824, 264515419],
                                backgroundColor: [
                                    randomColorGenerator(),
                                    randomColorGenerator(),
                                    randomColorGenerator(),
                                    randomColorGenerator(),
                                    randomColorGenerator(),
                                    randomColorGenerator(),
                                    randomColorGenerator(),
                                    randomColorGenerator(),
                                    randomColorGenerator(),
                                    randomColorGenerator()
                                ],
                                borderColor: [
                                    randomColorGenerator(),
                                    randomColorGenerator(),
                                    randomColorGenerator(),
                                    randomColorGenerator(),
                                    randomColorGenerator(),
                                    randomColorGenerator(),
                                    randomColorGenerator(),
                                    randomColorGenerator(),
                                    randomColorGenerator(),
                                    randomColorGenerator()
                                ],
                                borderWidth: 1
                            }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }]
                        }
                    }
                });
            </script>

            <script>  
                var randomColorGenerator = function () { 
                    return '#' + (Math.random().toString(16) + '0000000').slice(2, 8); 
                };

                var ctx = document.getElementById("myLineChart");
                var myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: ["Online", "MTKA", "MTI", "MT", "WHOLESALER", "PROVISION", "BABY SHOP", "BARBER SHOP", "PHARMACY", "General Trade", "Total"],
                        datasets: [{
                                label: '# Selling Out Chart',
                                data: [<?php echo $qty_ol . ", " . $qty_mtka . ", " . $qty_mti . ", " . $qty_mt . ", " . $qty_gt_w . ", " . $qty_gt_pv . ", " . $qty_gt_bb . ", " . $qty_gt_bs . ", " . $qty_gt_ph . ", " . $qty_gt . ", " . $qty_total; ?>],
                                //data: [$qty_ol, $qty_mtka, $qty_mti, $qty_mt, $qty_gt_w, $qty_gt_pv, $qty_gt_bb, $qty_gt_bs, $qty_gt_ph, $qty_gt, $qty_total],
                                //data: [114228, 89245, 102216122, 102305367, 1046110, 114410271, 45439468, 385330, 814645, 162095824, 264515419],
                                backgroundColor: [
                                    randomColorGenerator(),
                                    randomColorGenerator(),
                                    randomColorGenerator(),
                                    randomColorGenerator(),
                                    randomColorGenerator(),
                                    randomColorGenerator(),
                                    randomColorGenerator(),
                                    randomColorGenerator(),
                                    randomColorGenerator(),
                                    randomColorGenerator()
                                ],
                                borderColor: [
                                    randomColorGenerator(),
                                    randomColorGenerator(),
                                    randomColorGenerator(),
                                    randomColorGenerator(),
                                    randomColorGenerator(),
                                    randomColorGenerator(),
                                    randomColorGenerator(),
                                    randomColorGenerator(),
                                    randomColorGenerator(),
                                    randomColorGenerator()
                                ],
                                borderWidth: 1
                            }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }]
                        }
                    }
                });
            </script>


            
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

