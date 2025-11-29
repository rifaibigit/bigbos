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
        <div class="card-header">
          <!-- <div class="input-group mb-3">
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
                <button onclick="saleOut()" class="btn btn-outline-primary">Go!</button>
                    <a class="btn btn-outline-secondary" href="<?= base_url; ?>/report/sellingout" >Reset</a>
            </div> -->
        </div>

        <div class="card-body"> 
            <form action="<?= base_url; ?>/report/sellingout2" method="post">
                <div class="row">
                    <div class="col-md-12">

                        <div class="input-group mb-3">


                        <?php

                        $principal = "";

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
                          <select class="mdb-select md-form form-control" title="By Principal" name="by_principal">
                              <option value="">By Principal</option>
                                  <?php $no=1; ?>
                                  <?php foreach ($data['principal'] as $row) :?>
                                      <option <?php if( $principal==$row['principal']){echo "selected"; } ?> value="<?= $row['principal'];?>"><b><?= $row['principal'];?></b></option>
                                  <?php $no++; endforeach; ?>
                          </select>
                          <select class="mdb-select md-form form-control" title="By SKU" name="by_sku">
                              <option value="">By SKU</option>
                                  <?php $no=1; ?>
                                  <?php foreach ($data['item_name'] as $row) :?>
                                        <option <?php if( $sku==$row['item_name']){echo "selected"; } ?> value="<?= $row['item_name'];?>"><b><?= $row['item_name'];?></b></option>
                                  <?php $no++; endforeach; ?>
                          </select>
                          <select class="mdb-select md-form form-control" title="By Group SKU" name="by_group_sku" value="<?php echo $groupsku ?>">
                              <option value="">By Group SKU</option>
                                  <?php $no=1; ?>
                                  <?php foreach ($data['item_group'] as $row) :?>
                                        <option <?php if( $groupsku==$row['item_group']){echo "selected"; } ?> value="<?= $row['item_group'];?>"><b><?= $row['item_group'];?></b></option>
                                  <?php $no++; endforeach; ?>
                          </select>
                          <select class="mdb-select md-form form-control" title="By Distributor" name="by_distributor" value="<?php echo $distributor ?>">
                              <option value="">By Distributor</option>
                                  <?php $no=1; ?>
                                  <?php foreach ($data['nama_dist'] as $row) :?>
                                        <option <?php if( $distributor==$row['nama_dist']){echo "selected"; } ?> value="<?= $row['nama_dist'];?>"><b><?= $row['nama_dist'];?></b></option>
                                  <?php $no++; endforeach; ?>
                          </select>
                          <select class="mdb-select md-form form-control" title="By Area" name="by_area" value="<?php echo $area ?>">
                              <option value="">By Area</option>
                                  <?php $no=1; ?>
                                  <?php foreach ($data['area'] as $row) :?>
                                        <option <?php if( $area==$row['area']){echo "selected"; } ?> value="<?= $row['area'];?>"><b><?= $row['area'];?></b></option>
                                  <?php $no++; endforeach; ?>
                            </select>
                            <select class="mdb-select md-form form-control" title="By Island" name="by_island" value="<?php echo $island ?>">
                              <option value="">By Island</option>
                                  <?php $no=1; ?>
                                  <?php foreach ($data['island'] as $row) :?>
                                        <option <?php if( $island==$row['island']){echo "selected"; } ?> value="<?= $row['island'];?>"><b><?= $row['island'];?></b></option>
                                  <?php $no++; endforeach; ?>
                            </select>
                            <button class="btn btn-outline-primary" type="submit">Go!</button>
                                <a class="btn btn-outline-secondary" href="<?= base_url; ?>/report/sellingout2" >Reset</a>
                        </div>

                        <!-- <div id="hasil_sale_out"></div> -->
                        <div class="row">
                          <table id="rpt_sale_out2" class="table table-bordered table-sm">
                          <thead>
                              <tr>
                                <th colspan="5" class="text-center"></th>
                                <th colspan="2" class="text-center">Cont %</th>
                              </tr>                  
                              <tr>
                                <th class="text-center" style="width: 5%">#</th>
                                <th class="text-center" style="width: 15%">Channel</th>
                                <th class="text-center" style="width: 23%">Outlet Type</th>
                                <th class="text-center" style="width: 10%">Kode</th>
                                <th class="text-center" style="width: 12%">Qty</th>
                                <th class="text-center" style="width: 13%">Channel</th>
                                <th class="text-center" style="width: 12%">Type</th>
                              </tr>
                            </thead>
                            <tbody>

                              <?php 

                                foreach ($data['sellingout'] as $row) :
                                  if($channel != $row['channel'] and $row['channel'] > 1)
                                  {
                                    $channel1 = $channel; 
                                  }
                                  $channel = $row['channel'];
                                  $qty_total += $row['qty'];
                                  
                                endforeach;

                                /* foreach ($data['sellingout_qty_ol'] as $row) :
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
                                $qty_total = $qty_ol + $qty_mt + $qty_gt; */
                              ?>

                              <?php $total_ol=0; ?> 
                              <?php foreach ($data['sellingout'] as $row) :?>
                                <tr>
                                  <td class="text-center"><?= $row['id']; ?></td>
                                  <td class="text-center"><?= $row['channel'];?></td>
                                  <td><?= $row['desc_type'];?></td>
                                  <td><?= $row['outlet_type'];?></td>
                                  <td class="text-right"><?= number_format($row['qty'], 0);?></td>
                                  <td class="text-right"><?= number_format($row['qty']/$qty_ol*100,2);?> %</td>
                                  <td class="text-right"><?= number_format($row['qty']/$qty_total*100,2);?> %</td>
                                </tr>
                              <?php $total_ol += $row['qty']; ?>
                              <?php $no++; endforeach; ?>
                              <?php $cont_ol = $total_ol/$qty_total*100; ?>
                                <tr>
                                  <td></td>
                                  <td style="font-weight:bold" class="text-center">Total Online</td>
                                  <td></td>
                                  <td></td>
                                  <td style="font-weight:bold" class="text-right"><?= number_format($total_ol);?></td>
                                  <td style="font-weight:bold" class="text-right"><?= number_format($cont_ol,2);?> %</td>
                                  <td style="font-weight:bold" class="text-right"><?= number_format($cont_ol,2);?> %</td>
                                </tr>  

                              
                              
                            </tbody>
                          </table>
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

