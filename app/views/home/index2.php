<?php

  $qty_si_ld = [];
  $target_si_ld = [];
  $qty_si_jd = [];
  $target_si_jd = [];
  $qty_so_ld = [];
  $target_so_ld = [];
  $qty_so_jd = [];
  $target_so_jd = [];

  foreach ($data['chart_si'] as $row1) :
    if($row1['principal'] === 'LORD')
    {
      // $qty_si_ld[] = ((int) $row1['value']/(int)($row1['value_target'] ?:1))*100;
      // $target_si_ld[] = ((int) $row1['value_target']/(int)($row1['value_target'] ?:1))*100;
      $qty_si_ld[] = (int) $row1['value'];
      $target_si_ld[] = (int) $row1['value_target'];
      $all_si_ld[] = $row1['v_t'];
    }elseif($row1['principal'] === 'JORDAN')
    {
      // $qty_si_jd[] = ((int) $row1['value']/(int)($row1['value_target'] ?:1))*100;
      // $target_si_jd[] = ((int) $row1['value_target']/(int)($row1['value_target'] ?:1))*100;
      $qty_si_jd[] = (int) $row1['value'];
      $target_si_jd[] = (int) $row1['value_target'];
      $all_si_jd[] = $row1['v_t'];
    }elseif($row1['principal'] === 'TOTAL')
    {
      // $qty_si_jd[] = ((int) $row1['value']/(int)($row1['value_target'] ?:1))*100;
      // $target_si_jd[] = ((int) $row1['value_target']/(int)($row1['value_target'] ?:1))*100;
      $qty_si_ttl[] = (int) $row1['value'];
      $target_si_ttl[] = (int) $row1['value_target'];
      $all_si_ttl[] = $row1['v_t'];
    }
    
  endforeach;

  foreach ($data['chart_so'] as $row2) :
    if($row2['principal'] === 'LORD')
    {
      // $qty_so_ld[] = ((int) $row2['value']/(int)($row2['value_target'] ?:1))*100;
      // $target_so_ld[] = ((int) $row2['value_target']/(int)($row2['value_target'] ?:1))*100;
      $qty_so_ld[] = (int) $row2['value'];
      $target_so_ld[] = (int) $row2['value_target'];
    }elseif($row2['principal'] === 'JORDAN')
    {
      // $qty_so_jd[] = ((int) $row2['value']/(int)($row2['value_target'] ?:1))*100;
      // $target_so_jd[] = ((int) $row2['value_target']/(int)($row2['value_target'] ?:1))*100;
      $qty_so_jd[] = (int) $row2['value'];
      $target_so_jd[] = (int) $row2['value_target'];
    }
    elseif($row2['principal'] === 'TOTAL')
    {
      $qty_so_ttl[] = (int) $row2['value'];
      $target_so_ttl[] = (int) $row2['value_target'];
    }
  endforeach;

  $qty_ar_si = [];
  foreach ($data['si_channel'] as $row3) :
    $qty_ar_si[] = (int)$row3['val'];
  endforeach;

  foreach ($data['si_dist'] as $row4) :
    $qty_dist = (int)$row4['value_exc'];
  endforeach;

  $qty_ar_so = [];
  foreach ($data['so_channel'] as $row5) :
    $qty_ar_so[] = (int)$row5['value'];
  endforeach;

  
  
?>

<?php
  $si_from = DateTime::createFromFormat('!m', $data['period_si']['from_month']);
  $si_to = DateTime::createFromFormat('!m', $data['period_si']['to_month']);
  if($si_from != "" and $si_to != "")
  {
    $si_from_Name = $si_from->format('M');
    $si_to_Name = $si_to->format('M');
  }
  else
  {
    $si_from_Name = "";//$si_from->format('M');
    $si_to_Name = "";//$si_to->format('M');
  }
  

  $so_from = DateTime::createFromFormat('!m', $data['period_so']['from_month']);
  $so_to = DateTime::createFromFormat('!m', $data['period_so']['to_month']);
  if($so_from != "" and $so_to != "")
  {
    $so_from_Name = $so_from->format('M');
    $so_to_Name = $so_to->format('M');
  }
  else
  {
    $so_from_Name = "";//$si_from->format('M');
    $so_to_Name = "";//$si_to->format('M');
  }
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Dashboard</h1>
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
  </section>

  <!-- Main row -->
  <div class="row">
    
    <!-- Left col -->
    <section class="col-lg-8 connectedSortable">
      <!-- Performance Card (Charts with tabs)-->
      <div class="card" style="margin-left:5px;margin-right:5px;">
        <div class="card-header">
          <h3 class="card-title">
            <i class="fas fa-chart-line mr-1"></i>
            Performance
          </h3>
          <div class="card-tools">
            <ul class="nav nav-pills ml-auto">
              <li class="nav-item">
                <a class="nav-link active" href="#sellingin" data-toggle="tab">Selling In</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#sellingout" data-toggle="tab">Selling Out</a>
              </li>
            </ul>
          </div>
        </div><!-- /.card-header -->
        <div class="card-body">
          <div class="tab-content p-0">
            <!-- Morris chart - Sales -->
            <div class="chart tab-pane fade show active" id="sellingin" style="position: relative;">
              <!-- ============================================================================ -->
              <div id="si_chart" class="card" style="margin-top:0px;height:900px;">  
                <canvas id="myChart11" width="100%" height="70%"></canvas>
              </div>
              <center><a class="btn btn-outline-info btn-sm" style="margin-top:10px;" href="<?= base_url; ?>/Report/sellingin_performance" target="_blank"> Show Report</a></center>                         
            </div><!-- /.selling_in-->
            <div class="chart tab-pane fade show" id="sellingout" style="position: relative;">
              <!-- ============================================================================ -->
              <div id="so_chart" class="card" style="margin-left:0px;height:900px;">
                <canvas id="myChart21" width="100%" height="70%"></canvas>
              </div>
              <center><a class="btn btn-outline-info btn-sm" style="margin-top:10px;" href="<?= base_url; ?>/Report/sellingout_performance" target="_blank"> Show Report</a></center>                        
            </div><!-- /.selling_out -->  
          </div>
        </div><!-- /.card-body -->
      </div>

      <!-- channel -->
      <div class="card" style="margin-left:5px;margin-right:5px;">
        <div class="card-header">
          <h3 class="card-title">
            <i class="fas fa-chart-pie mr-1"></i>
            Channel
          </h3>
          <div class="card-tools">
            <ul class="nav nav-pills ml-auto">
              <li class="nav-item">
                <a class="nav-link active" href="#sellingin_chnl" data-toggle="tab">Selling In</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#sellingout_chnl" data-toggle="tab">Selling Out</a>
              </li>
            </ul>
          </div>
        </div><!-- /.card-header -->
        <div class="card-body">
          <div class="tab-content p-0">
            <!-- Morris chart - Sales -->
            <div class="chart tab-pane fade show active" id="sellingin_chnl" style="position: relative;">
              <canvas id="myChart3" width="50%" height="30%"></canvas>
              <center><a class="btn btn-outline-info btn-sm" style="margin-top:10px;" href="<?= base_url; ?>/Report/sellingin_summary" target="_blank"> Show Report</a></center>                         
            </div>
            <div class="chart tab-pane fade show" id="sellingout_chnl" style="position: relative;">
              <canvas id="myChart4" width="50%" height="30%"></canvas>
              <center><a class="btn btn-outline-info btn-sm" style="margin-top:10px;" href="<?= base_url; ?>/Report/sellingout_summary" target="_blank"> Show Report</a></center>                        
            </div>  
          </div>
        </div><!-- /.card-body -->
      </div>

      <?php
        $dateObj1   = DateTime::createFromFormat('!m', date('m'));
        $dateObj2   = DateTime::createFromFormat('!m', $data['period_so']['to_month']);
        $monthNow = $dateObj1->format('F');
        //$monthLast = $dateObj2->format('F');
        $yearLast = $data['period_so']['year'];
        $monthLast = $data['period_so']['to_month'];
      ?>

      <!-- AO Card (Charts with tabs)-->
      <div class="card" style="margin-left:5px;margin-right:5px;">
        <div class="card-header">
          <h3 class="card-title">
            <i class="fa fa-table mr-1"></i>
            AO Progress
          </h3>
          <div class="card-tools">
            <ul class="nav nav-pills ml-auto">
              <li class="nav-item">
                <a class="nav-link active" href="#AO_lord" data-toggle="tab">LORD</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#AO_jordan" data-toggle="tab">JORDAN</a>
              </li>
            </ul>
          </div>
        </div><!-- /.card-header -->
        <div class="card-body">
          <div class="tab-content p-0">
            <!-- Morris chart - Sales -->
            <div class="chart tab-pane fade show active" id="AO_lord" style="position: relative;">
              <!-- ============================================================================ -->
              <div class="card" style="margin-top:0px;">
                <div class="card-body">
                  <div>
                    <center><b>LORD - <?= $monthLast ;?> - <?= $yearLast ;?></b></center>
                  </div>
                  <div class="table-responsive-sm text-small">
                    <table id="ao_dash" class="table table-striped table-sm nowrap" align="left" style="font-size:80%; border: 0px;">
                      <thead class="table-info">
                        <tr>
                          <th class="text-center" style="width: 10px; vertical-align: middle;">#</th>
                          <th class="text-center" style="width: 150px; vertical-align: middle;">TYPE OF OUTLET</th>
                          <th class="text-center" style="width: 30px; vertical-align: middle;">Code</th>
                          <th class="text-center" style="width: 15px; vertical-align: middle;">RO</th>
                          <th class="text-center">DISTR.</th>
                          <th class="text-center">%</th>
                          <th class="text-center">AO</th>
                          <th class="text-center">%</th>
                        </tr>
                        
                      </thead>
                      <tbody>

                      <?php
                        $sub_RO = 0;
                        $sub_d = 0;
                        $sub_d_p = 0;
                        $sub_ao = 0;
                        $sub_ao_p = 0;

                        $total_RO = 0;
                        $total_d = 0;
                        $total_d_p = 0;
                        $total_ao = 0;
                        $total_ao_p = 0;

                      ?>

                        <?php $no=1; ?>
                        <?php $channel=''; ?>

                        <?php foreach ($data['ao_lord_last'] as $row) :?>
                          <?php
                            if ($channel != $row['channel'] and $channel != '')
                            {
                              
                              echo '<tr class="table-info text-center" style="font-weight:bold;">';
                                echo '<td></td>';
                                echo '<td class="text-center">TOTAL ' .$channel. '</td>';
                                echo '<td></td>';
                                echo '<td class="text-right">' .number_format($sub_RO, 0). '</td>';
                                echo '<td class="text-right">' .number_format($sub_d, 0). '</td>';
                                echo '<td class="text-right">' .number_format($sub_d_p, 0). '</td>';
                                echo '<td class="text-right">' .number_format($sub_ao, 0). '</td>';
                                echo '<td class="text-right">' .number_format($sub_ao_p, 0). '</td>';
                              echo '</tr>';

                              $sub_RO = 0;
                              $sub_d = 0;
                              $sub_d_p = 0;
                              $sub_ao = 0;
                              $sub_ao_p = 0;

                            }
                          ?>

                          <tr>
                            <td class="text-center"><?= $no; ?></td>
                            <td><?= $row['desc_type'];?></td>
                            <td><?= $row['outlet_type'];?></td>
                            <td class="text-right"><?= number_format($row['RO'], 0);?></td>
                            <td class="text-right"><?= number_format($row['DISTR'], 0);?></td>
                            <td class="text-right"><?= number_format($row['%'], 0);?></td>
                            <td class="text-right"><?= number_format($row['AO'], 0);?></td>
                            <td class="text-right"><?= number_format($row['%AO'], 0);?></td>
                          </tr>

                          <?php $channel = $row['channel']; ?>
                          <?php $sub_RO += $row['RO']; ?>
                          <?php $sub_d += $row['DISTR']; ?>
                          <?php
                            if($sub_RO==0)
                            {
                              $sub_d_p = 0;
                            }
                            else
                            {
                              $sub_d_p = ($sub_d/$sub_RO)*100;
                            } 
                          ?>
                          <?php $sub_ao += $row['AO']; ?>
                          <?php
                            if($sub_d==0)
                            {
                              $sub_ao_p = 0;
                            }
                            else
                            {
                              $sub_ao_p = ($sub_ao/$sub_d)*100;
                            } 
                          ?>

                          <?php $total_RO += $row['RO']; ?>
                          <?php $total_d += $row['DISTR']; ?>
                          <?php
                            if($total_RO==0)
                            {
                              $total_d_p = 0;
                            }
                            else
                            {
                              $total_d_p = ($total_d/$total_RO)*100;
                            } 
                          ?>
                          <?php $total_ao += $row['AO']; ?>
                          <?php
                            if($total_d==0)
                            {
                              $total_ao_p = 0;
                            }
                            else
                            {
                              $total_ao_p = ($total_ao/$total_d)*100;
                            } 
                          ?>


                        <?php $no++; endforeach; ?>

                        <tr class="table-info" style="font-weight:bold;">
                          <td></td>
                          <td class="text-center">TOTAL <?= $channel;?></td>
                          <td></td>
                          <td class="text-right"><?= number_format($sub_RO, 0);?></td>
                          <td class="text-right"><?= number_format($sub_d, 0);?></td>
                          <td class="text-right"><?= number_format($sub_d_p, 0);?></td>
                          <td class="text-right"><?= number_format($sub_ao, 0);?></td>
                          <td class="text-right"><?= number_format($sub_ao_p, 0);?></td>
                        </tr>

                        <tr class="table-danger" style="font-weight:bold;">
                          <td></td>
                          <td class="text-center">T O T A L</td>
                          <td></td>
                          <td class="text-right"><?= number_format($total_RO, 0);?></td>
                          <td class="text-right"><?= number_format($total_d, 0);?></td>
                          <td class="text-right"><?= number_format($total_d_p, 0);?></td>
                          <td class="text-right"><?= number_format($total_ao, 0);?></td>
                          <td class="text-right"><?= number_format($total_ao_p, 0);?></td>
                        </tr>

                      </tbody>
                    </table>
                  </div> 
                </div><!-- /.card-body -->
              </div>
              <!-- ============================================================================= -->
              <center>
                <a class="btn btn-outline-info btn-sm" style="margin-top:10px;" href="<?= base_url; ?>/Report/distribution_lord" target="_blank"> DISTR</a>
                <a class="btn btn-outline-info btn-sm" style="margin-top:10px;" href="<?= base_url; ?>/Report/activeoutlet_lord" target="_blank"> AO</a>
              </center>
              <!-- <center><a class="btn btn-outline-info btn-sm" style="margin-top:10px;" href="<?= base_url; ?>/report/activeoutlet_lord" target="_blank"> Show Report</a></center>                          -->
            </div><!-- /.selling_in-->
            <div class="chart tab-pane fade show" id="AO_jordan" style="position: relative;">
              <!-- ============================================================================ -->
              <div class="card" style="margin-left:0px;">
                <div class="card-body">
                  <div>
                    <center><b>JORDAN - <?= $monthLast ;?> - <?= $yearLast ;?></b></center>
                  </div>
                  <div class="table-responsive-sm text-small">
                    <table id="ao_dash3" class="table table-striped table-sm nowrap" align="left" style="font-size:80%; border: 0px;">
                      <thead class="table-info">
                        <tr>
                          <th class="text-center" style="width: 10px; vertical-align: middle;">#</th>
                          <th class="text-center" style="width: 150px; vertical-align: middle;">TYPE OF OUTLET</th>
                          <th class="text-center" style="width: 30px; vertical-align: middle;">Code</th>
                          <th class="text-center" style="width: 15px; vertical-align: middle;">RO</th>
                          <th class="text-center">DISTR.</th>
                          <th class="text-center">%</th>
                          <th class="text-center">AO</th>
                          <th class="text-center">%</th>
                        </tr>
                        
                      </thead>
                      <tbody>

                      <?php
                        $sub_RO = 0;
                        $sub_d = 0;
                        $sub_d_p = 0;
                        $sub_ao = 0;
                        $sub_ao_p = 0;

                        $total_RO = 0;
                        $total_d = 0;
                        $total_d_p = 0;
                        $total_ao = 0;
                        $total_ao_p = 0;

                      ?>

                        <?php $no=1; ?>
                        <?php $channel=''; ?>

                        <?php foreach ($data['ao_jordan_last'] as $row) :?>
                          <?php
                            if ($channel != $row['channel'] and $channel != '')
                            {
                              
                              echo '<tr class="table-info text-center" style="font-weight:bold;">';
                                echo '<td></td>';
                                echo '<td class="text-center">TOTAL ' .$channel. '</td>';
                                echo '<td></td>';
                                echo '<td class="text-right">' .number_format($sub_RO, 0). '</td>';
                                echo '<td class="text-right">' .number_format($sub_d, 0). '</td>';
                                echo '<td class="text-right">' .number_format($sub_d_p, 0). '</td>';
                                echo '<td class="text-right">' .number_format($sub_ao, 0). '</td>';
                                echo '<td class="text-right">' .number_format($sub_ao_p, 0). '</td>';
                              echo '</tr>';

                              $sub_RO = 0;
                              $sub_d = 0;
                              $sub_d_p = 0;
                              $sub_ao = 0;
                              $sub_ao_p = 0;

                            }
                          ?>

                          <tr>
                            <td class="text-center"><?= $no; ?></td>
                            <td><?= $row['desc_type'];?></td>
                            <td><?= $row['outlet_type'];?></td>
                            <td class="text-right"><?= number_format($row['RO'], 0);?></td>
                            <td class="text-right"><?= number_format($row['DISTR'], 0);?></td>
                            <td class="text-right"><?= number_format($row['%'], 0);?></td>
                            <td class="text-right"><?= number_format($row['AO'], 0);?></td>
                            <td class="text-right"><?= number_format($row['%AO'], 0);?></td>
                          </tr>

                          <?php $channel = $row['channel']; ?>
                          <?php $sub_RO += $row['RO']; ?>
                          <?php $sub_d += $row['DISTR']; ?>
                          <?php
                            if($sub_RO==0)
                            {
                              $sub_d_p = 0;
                            }
                            else
                            {
                              $sub_d_p = ($sub_d/$sub_RO)*100;
                            } 
                          ?>
                          <?php $sub_ao += $row['AO']; ?>
                          <?php
                            if($sub_d==0)
                            {
                              $sub_ao_p = 0;
                            }
                            else
                            {
                              $sub_ao_p = ($sub_ao/$sub_d)*100;
                            } 
                          ?>

                          <?php $total_RO += $row['RO']; ?>
                          <?php $total_d += $row['DISTR']; ?>
                          <?php
                            if($total_RO==0)
                            {
                              $total_d_p = 0;
                            }
                            else
                            {
                              $total_d_p = ($total_d/$total_RO)*100;
                            } 
                          ?>
                          <?php $total_ao += $row['AO']; ?>
                          <?php
                            if($total_d==0)
                            {
                              $total_ao_p = 0;
                            }
                            else
                            {
                              $total_ao_p = ($total_ao/$total_d)*100;
                            } 
                          ?>

                        <?php $no++; endforeach; ?>

                        <tr class="table-info" style="font-weight:bold;">
                          <td></td>
                          <td class="text-center">TOTAL <?= $channel;?></td>
                          <td></td>
                          <td class="text-right"><?= number_format($sub_RO, 0);?></td>
                          <td class="text-right"><?= number_format($sub_d, 0);?></td>
                          <td class="text-right"><?= number_format($sub_d_p, 0);?></td>
                          <td class="text-right"><?= number_format($sub_ao, 0);?></td>
                          <td class="text-right"><?= number_format($sub_ao_p, 0);?></td>
                        </tr>

                        <tr class="table-danger" style="font-weight:bold;">
                          <td></td>
                          <td class="text-center">T O T A L</td>
                          <td></td>
                          <td class="text-right"><?= number_format($total_RO, 0);?></td>
                          <td class="text-right"><?= number_format($total_d, 0);?></td>
                          <td class="text-right"><?= number_format($total_d_p, 0);?></td>
                          <td class="text-right"><?= number_format($total_ao, 0);?></td>
                          <td class="text-right"><?= number_format($total_ao_p, 0);?></td>
                        </tr>

                      </tbody>
                    </table>
                  </div>                      
                </div><!-- /.card-body -->
              </div>
              <!-- ============================================================================= -->
              <!-- <canvas id="myChart2" style="height: 400vh;width: 400vw"></canvas> -->
              <center>
                <a class="btn btn-outline-info btn-sm" style="margin-top:10px;" href="<?= base_url; ?>/Report/distribution_jordan" target="_blank"> DISTR</a>
                <a class="btn btn-outline-info btn-sm" style="margin-top:10px;" href="<?= base_url; ?>/Report/activeoutlet_jordan" target="_blank"> AO</a>
              </center>
              <!-- <center><a class="btn btn-outline-info btn-sm" style="margin-top:10px;" href="<?= base_url; ?>/report/activeoutlet_jordan" target="_blank"> Show Report</a></center>                         -->
            </div><!-- /.selling_out -->  
          </div>
        </div><!-- /.card-body -->
      </div>
    </section>
    <!-- /.Left col -->
    <!-- right col (We are only adding the ID to make the widgets sortable)-->
    <section class="col-lg-4 connectedSortable">

      <!-- Region Card (Charts with tabs)-->
      <div class="card" style="margin-left:5px;margin-right:5px;">
        <div class="card-header">
          <h3 class="card-title">
            <i class="fas fa-warehouse mr-1"></i>
            Distributor
          </h3>
          <div class="card-tools">
            <ul class="nav nav-pills ml-auto">
              <li class="nav-item">
                <a class="nav-link active" href="#si_dist" data-toggle="tab">Selling In</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#so_dist" data-toggle="tab">Selling Out</a>
              </li>
            </ul>
          </div>
        </div><!-- /.card-header -->
        <div class="card-body">
          <div class="tab-content p-0">
            <!-- Morris chart - Sales -->
            <div class="chart tab-pane fade show active" id="si_dist" style="position: relative;">
            <center><h6><b><?= $si_from_Name; ?> to <?= $si_to_Name; ?> - <?= $data['period_si']['year']; ?></b></h6></center>
            <br>
              <?php foreach ($data['si_region'] as $rows1) : ?>
                <div class="progress-group">
                    <?= $rows1['area'] ;?>
                    <span class="float-right"><b><?= number_format($rows1['value_actual']) ;?></b>/<?= number_format($rows1['value_target']) ;?></span>
                    <div class="progress">
                      <div class="progress-bar bg-primary" style="width: <?= ($rows1['value_actual']/$rows1['value_target'])*100 ;?>%"><b><?= number_format($rows1['value_actual']/$rows1['value_target']*100) ;?>%</b></div>
                    </div>
                  </div><!-- /.progress-group -->
              <?php endforeach ; ?>
              <center><a class="btn btn-outline-info btn-sm" style="margin-top:10px;" href="<?= base_url; ?>/Report/Sellingin_Dist" target="_blank"> Show Report</a></center>                         
            </div>
            <div class="chart tab-pane fade show" id="so_dist" style="position: relative;">
            <center><h6><b><?= $so_from_Name; ?> to <?= $so_to_Name; ?> - <?= $data['period_so']['year']; ?></b></h6></center>
              <?php foreach ($data['so_region'] as $rows1) : ?>
                <div class="progress-group">
                    <?= $rows1['area'] ;?>
                    <span class="float-right"><b><?= number_format($rows1['value_actual']) ;?></b>/<?= number_format($rows1['value_target']) ;?></span>
                    <div class="progress">
                      <div class="progress-bar bg-primary" style="width: <?= ($rows1['value_actual']/$rows1['value_target'])*100 ;?>%"><b><?= number_format($rows1['value_actual']/$rows1['value_target']*100) ;?>%</b></div>
                    </div>
                  </div><!-- /.progress-group -->
              <?php endforeach ; ?>
              <center><a class="btn btn-outline-info btn-sm" style="margin-top:10px;" href="<?= base_url; ?>/Report/sellingout_distributor" target="_blank"> Show Report</a></center>                        
            </div>  
          </div>
        </div><!-- /.card-body -->
      </div>

      <!-- ASM Card (Charts with tabs)-->
      <div class="card" style="margin-left:5px;margin-right:5px;">
        <div class="card-header">
          <h3 class="card-title">
            <i class="fas fa-user-tie mr-1"></i>
            ASM
          </h3>
          <div class="card-tools">
            <ul class="nav nav-pills ml-auto">
              <li class="nav-item">
                <a class="nav-link active" href="#si_asm" data-toggle="tab">Selling In</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#so_asm" data-toggle="tab">Selling Out</a>
              </li>
            </ul>
          </div>
        </div><!-- /.card-header -->
        <div class="card-body">
          <div class="tab-content p-0">
            <!-- Morris chart - Sales -->
            <div class="chart tab-pane fade show active" id="si_asm" style="position: relative;margin_right: 0px;">
            <center><h6><b><?= $si_from_Name; ?> to <?= $si_to_Name; ?> - <?= $data['period_si']['year']; ?></b></h6></center>
              <?php foreach ($data['si_asm'] as $rows1) : ?>
                <div class="progress-group">
                  <?= $rows1['asm'] ;?>
                  <span class="float-right"><b><?= number_format($rows1['value_actual']) ;?></b>/<?= number_format($rows1['value_target']) ;?></span>
                  <div class="progress">
                    <div class="progress-bar bg-primary" style="width: <?= ($rows1['value_actual']/$rows1['value_target'])*100 ;?>%"><b><?= number_format($rows1['value_actual']/$rows1['value_target']*100) ;?>%</b></div>
                  </div>
                </div><!-- /.progress-group -->
              <?php endforeach ; ?>
              <center><a class="btn btn-outline-info btn-sm" style="margin-top:10px;" href="<?= base_url; ?>/Report/sellingin_asm" target="_blank"> Show Report</a></center>                         
            </div>
            <div class="chart tab-pane fade show" id="so_asm" style="position: relative;margin_right: 0px;">
            <center><h6><b><?= $so_from_Name; ?> to <?= $so_to_Name; ?> - <?= $data['period_so']['year']; ?></b></h6></center>
              <?php foreach ($data['so_asm'] as $rows1) : ?>
                <div class="progress-group">
                    <?= $rows1['asm'] ;?>
                    <span class="float-right"><b><?= number_format($rows1['value_actual']) ;?></b>/<?= number_format($rows1['value_target']) ;?></span>
                    <div class="progress">
                      <div class="progress-bar bg-primary" style="width: <?= ($rows1['value_actual']/$rows1['value_target'])*100 ;?>%"><b><?= number_format($rows1['value_actual']/$rows1['value_target']*100) ;?>%</b></div>
                    </div>
                  </div><!-- /.progress-group -->
              <?php endforeach ; ?>
              <center><a class="btn btn-outline-info btn-sm" style="margin-top:10px;" href="<?= base_url; ?>/Report/sellingout_asm" target="_blank"> Show Report</a></center>                        
            </div>  
          </div>
        </div><!-- /.card-body -->
      </div>

      <!-- /.card -->
    </section>
    <!-- right col -->
  </div>
      <!-- /.row (main row) -->
</div>  
<!-- /.content-wrapper -->

<style>
  .table tr { line-height: 4px; }
  /* .DTFC_LeftBodyLiner { overflow-x: hidden; } */
</style>

<style>
  /* Disabled Horizontal Scroll */
  html, body {
  max-width: 100%;
  overflow-x: hidden;
  }
  /* End Disabled Horizontal Scroll */
</style>

<script>
  $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
    $($.fn.dataTable.tables(true)).DataTable()
      .columns.adjust();
  });
</script>

<script>  
  /* var randomColorGenerator = function () { 
      return '#' + (Math.random().toString(16) + '0000000').slice(2, 8); 
  }; */

  var ctx11 = document.getElementById("myChart11");
  //ctx1.height = 250;
  ctx11.height = $("#si_chart").css('height');
  var myChart = new Chart(ctx11, {
      type: 'horizontalBar',
      data: {
          labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
          datasets: [{
                  label: '# LORD',
                  data: <?php echo json_encode($qty_si_ld); ?>,
                  backgroundColor: [
                      'rgba(0, 56, 255, 1.0)', //darkblue
                      'rgba(0, 56, 255, 1.0)',
                      'rgba(0, 56, 255, 1.0)',
                      'rgba(0, 56, 255, 1.0)',
                      'rgba(0, 56, 255, 1.0)',
                      'rgba(0, 56, 255, 1.0)',
                      'rgba(0, 56, 255, 1.0)',
                      'rgba(0, 56, 255, 1.0)',
                      'rgba(0, 56, 255, 1.0)',
                      'rgba(0, 56, 255, 1.0)',
                      'rgba(0, 56, 255, 1.0)',
                  ],
                  borderColor: [
                      'rgba(0, 56, 255, 1.0)', //darkblue
                      'rgba(0, 56, 255, 1.0)',
                      'rgba(0, 56, 255, 1.0)',
                      'rgba(0, 56, 255, 1.0)',
                      'rgba(0, 56, 255, 1.0)',
                      'rgba(0, 56, 255, 1.0)',
                      'rgba(0, 56, 255, 1.0)',
                      'rgba(0, 56, 255, 1.0)',
                      'rgba(0, 56, 255, 1.0)',
                      'rgba(0, 56, 255, 1.0)',
                      'rgba(0, 56, 255, 1.0)',
                  ],
                  borderWidth: 1,
                  stack: 'Stack 0',
              },
              {
                  label: '# TARGET LORD',
                  data: <?php echo json_encode($target_si_ld); ?>,
                  // type: 'horizontalBar',
                  backgroundColor: [
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)', //grey
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)',
                  ],
                  borderColor: [
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)', //grey
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)',
                  ],
                  borderWidth: 1,
                  stack: 'Stack 0',
              },
              {
                  label: '# JORDAN',
                  data: <?php echo json_encode($qty_si_jd); ?>,
                  backgroundColor: [
                      'rgba(79, 176, 255, 1)', //lightblue
                      'rgba(79, 176, 255, 1)',
                      'rgba(79, 176, 255, 1)',
                      'rgba(79, 176, 255, 1)',
                      'rgba(79, 176, 255, 1)',
                      'rgba(79, 176, 255, 1)',
                      'rgba(79, 176, 255, 1)',
                      'rgba(79, 176, 255, 1)',
                      'rgba(79, 176, 255, 1)',
                      'rgba(79, 176, 255, 1)',
                      'rgba(79, 176, 255, 1)',
                      'rgba(79, 176, 255, 1)',
                  ],
                  borderColor: [
                      'rgba(79, 176, 255, 1)', //lightblue
                      'rgba(79, 176, 255, 1)',
                      'rgba(79, 176, 255, 1)',
                      'rgba(79, 176, 255, 1)',
                      'rgba(79, 176, 255, 1)',
                      'rgba(79, 176, 255, 1)',
                      'rgba(79, 176, 255, 1)',
                      'rgba(79, 176, 255, 1)',
                      'rgba(79, 176, 255, 1)',
                      'rgba(79, 176, 255, 1)',
                      'rgba(79, 176, 255, 1)',
                      'rgba(79, 176, 255, 1)',
                  ],
                  borderWidth: 1,
                  stack: 'Stack 1',
              },
              {
                  label: '# TARGET JORDAN',
                  data: <?php echo json_encode($target_si_jd); ?>,
                  backgroundColor: [
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)', //grey
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)',
                  ],
                  borderColor: [
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)', //grey
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)',
                  ],
                  borderWidth: 1,
                  stack: 'Stack 1',
              },
              {
                  label: '# TOTAL',
                  data: <?php echo json_encode($qty_si_ttl); ?>,
                  backgroundColor: [
                      'rgba(201, 0, 0, 1)', //red
                      'rgba(201, 0, 0, 1)',
                      'rgba(201, 0, 0, 1)',
                      'rgba(201, 0, 0, 1)',
                      'rgba(201, 0, 0, 1)',
                      'rgba(201, 0, 0, 1)',
                      'rgba(201, 0, 0, 1)',
                      'rgba(201, 0, 0, 1)',
                      'rgba(201, 0, 0, 1)',
                      'rgba(201, 0, 0, 1)',
                      'rgba(201, 0, 0, 1)',
                      'rgba(201, 0, 0, 1)',
                  ],
                  borderColor: [
                      'rgba(201, 0, 0, 1)', //red
                      'rgba(201, 0, 0, 1)',
                      'rgba(201, 0, 0, 1)',
                      'rgba(201, 0, 0, 1)',
                      'rgba(201, 0, 0, 1)',
                      'rgba(201, 0, 0, 1)',
                      'rgba(201, 0, 0, 1)',
                      'rgba(201, 0, 0, 1)',
                      'rgba(201, 0, 0, 1)',
                      'rgba(201, 0, 0, 1)',
                      'rgba(201, 0, 0, 1)',
                      'rgba(201, 0, 0, 1)',
                  ],
                  borderWidth: 1,
                  stack: 'Stack 2',
              },
              {
                  label: '# TARGET TOTAL',
                  data: <?php echo json_encode($target_si_ttl); ?>,
                  backgroundColor: [
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)', //grey
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)',
                  ],
                  borderColor: [
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)', //grey
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)',
                  ],
                  borderWidth: 1,
                  stack: 'Stack 2',
              },
            ]
      },
      options: {
        "animation": {
            "duration": 1,
            "onComplete": function() {
            var chartInstance = this.chart,
            ctx = chartInstance.ctx;

            ctx.font = "bold 9pt Arial";
            // ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontSize, Chart.defaults.global.defaultFontStyle, Chart.defaults.global.defaultFontFamily);
            ctx.textAlign = 'left';
            ctx.textBaseline = 'top';
            ctx.fillStyle = "#000";

            this.data.datasets.forEach(function(dataset, i) {
              var meta = chartInstance.controller.getDatasetMeta(i);
              meta.data.forEach(function(bar, index) {
                var data = dataset.data[index].toFixed(0);
                var data2 = data.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                
                ctx.fillText(data2, bar._model.x + 5, bar._model.y - 5);
              });
            });
          }
        },
        scales: {
            xAxes: [{
                stacked: false,
                ticks: {
                  max: 25000000,
                }
              }
            ]
        },
        title: {
            display: true,
            position: "top",
            text: "Selling In - <?= $data['report_year']['year']; ?>",
            fontSize: 16,
            fontColor: "#111"
        },
        legend: {
          display: true,
          position: 'top',
          labels: {
              boxWidth: 20,
              fontColor: '#111',
              padding: 10,
              filter: function(item, chart) {
                // Logic to remove a particular legend item goes here
                return !item.text.includes("TARGET");
              }
          },
          
        },
        tooltips: {
          enabled: true,
        }, 
      },
  });


  //=======================================================================================================================

  var ctx21 = document.getElementById("myChart21");
  //ctx2.height = 157;
  ctx21.height = $("#so_chart").css('height');
  var myChart = new Chart(ctx21, {
      type: 'horizontalBar',
      data: {
          labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
          datasets: [{
                  label: '#  LORD',
                  data: <?php echo json_encode($qty_so_ld); ?>,
                  type: 'horizontalBar',
                  backgroundColor: [
                      'rgba(0, 56, 255, 1.0)', //darkblue
                      'rgba(0, 56, 255, 1.0)',
                      'rgba(0, 56, 255, 1.0)',
                      'rgba(0, 56, 255, 1.0)',
                      'rgba(0, 56, 255, 1.0)',
                      'rgba(0, 56, 255, 1.0)',
                      'rgba(0, 56, 255, 1.0)',
                      'rgba(0, 56, 255, 1.0)',
                      'rgba(0, 56, 255, 1.0)',
                      'rgba(0, 56, 255, 1.0)',
                      'rgba(0, 56, 255, 1.0)',
                  ],
                  borderColor: [
                      'rgba(0, 56, 255, 1.0)', //darkblue
                      'rgba(0, 56, 255, 1.0)',
                      'rgba(0, 56, 255, 1.0)',
                      'rgba(0, 56, 255, 1.0)',
                      'rgba(0, 56, 255, 1.0)',
                      'rgba(0, 56, 255, 1.0)',
                      'rgba(0, 56, 255, 1.0)',
                      'rgba(0, 56, 255, 1.0)',
                      'rgba(0, 56, 255, 1.0)',
                      'rgba(0, 56, 255, 1.0)',
                      'rgba(0, 56, 255, 1.0)',
                  ],
                  borderWidth: 1,
                  stack: 'Stack 0',
              },
              {
                  label: '#  TARGET LORD',
                  data: <?php echo json_encode($target_so_ld); ?>,
                  type: 'horizontalBar',
                  backgroundColor: [
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)', //grey
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)',
                  ],
                  borderColor: [
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)', //grey
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)',
                  ],
                  borderWidth: 1,
                  stack: 'Stack 0',
              },
              {
                  label: '#  JORDAN',
                  data: <?php echo json_encode($qty_so_jd); ?>,
                  type: 'horizontalBar',
                  backgroundColor: [
                      'rgba(79, 176, 255, 1)', //lightblue
                      'rgba(79, 176, 255, 1)',
                      'rgba(79, 176, 255, 1)',
                      'rgba(79, 176, 255, 1)',
                      'rgba(79, 176, 255, 1)',
                      'rgba(79, 176, 255, 1)',
                      'rgba(79, 176, 255, 1)',
                      'rgba(79, 176, 255, 1)',
                      'rgba(79, 176, 255, 1)',
                      'rgba(79, 176, 255, 1)',
                      'rgba(79, 176, 255, 1)',
                      'rgba(79, 176, 255, 1)',
                  ],
                  borderColor: [
                      'rgba(79, 176, 255, 1)', //lightblue
                      'rgba(79, 176, 255, 1)',
                      'rgba(79, 176, 255, 1)',
                      'rgba(79, 176, 255, 1)',
                      'rgba(79, 176, 255, 1)',
                      'rgba(79, 176, 255, 1)',
                      'rgba(79, 176, 255, 1)',
                      'rgba(79, 176, 255, 1)',
                      'rgba(79, 176, 255, 1)',
                      'rgba(79, 176, 255, 1)',
                      'rgba(79, 176, 255, 1)',
                      'rgba(79, 176, 255, 1)',
                  ],
                  borderWidth: 1,
                  stack: 'Stack 1',
              },
              {
                  label: '#  TARGET JORDAN',
                  data: <?php echo json_encode($target_so_jd); ?>,
                  type: 'horizontalBar',
                  backgroundColor: [
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)', //grey
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)',
                  ],
                  borderColor: [
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)', //grey
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)',
                  ],
                  borderWidth: 1,
                  stack: 'Stack 1',
              },
              {
                  label: '#  TOTAL',
                  data: <?php echo json_encode($qty_so_ttl); ?>,
                  type: 'horizontalBar',
                  backgroundColor: [
                      'rgba(201, 0, 0, 1)', //red
                      'rgba(201, 0, 0, 1)',
                      'rgba(201, 0, 0, 1)',
                      'rgba(201, 0, 0, 1)',
                      'rgba(201, 0, 0, 1)',
                      'rgba(201, 0, 0, 1)',
                      'rgba(201, 0, 0, 1)',
                      'rgba(201, 0, 0, 1)',
                      'rgba(201, 0, 0, 1)',
                      'rgba(201, 0, 0, 1)',
                      'rgba(201, 0, 0, 1)',
                      'rgba(201, 0, 0, 1)',
                  ],
                  borderColor: [
                      'rgba(201, 0, 0, 1)', //red
                      'rgba(201, 0, 0, 1)',
                      'rgba(201, 0, 0, 1)',
                      'rgba(201, 0, 0, 1)',
                      'rgba(201, 0, 0, 1)',
                      'rgba(201, 0, 0, 1)',
                      'rgba(201, 0, 0, 1)',
                      'rgba(201, 0, 0, 1)',
                      'rgba(201, 0, 0, 1)',
                      'rgba(201, 0, 0, 1)',
                      'rgba(201, 0, 0, 1)',
                      'rgba(201, 0, 0, 1)',
                  ],
                  borderWidth: 1,
                  stack: 'Stack 2',
              },
              {
                  label: '#  TARGET TOTAL',
                  data: <?php echo json_encode($target_so_ttl); ?>,
                  type: 'horizontalBar',
                  backgroundColor: [
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)', //grey
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)',
                  ],
                  borderColor: [
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)', //grey
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)',
                      'rgba(107, 107, 107, 0.3)',
                  ],
                  borderWidth: 1,
                  stack: 'Stack 2',
              },
            ]
      },
      options: {
          "animation": {
              "duration": 1,
              "onComplete": function() {
              var chartInstance = this.chart,
              ctx = chartInstance.ctx;

              ctx.font = "bold 9pt Arial";
              // ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontSize, Chart.defaults.global.defaultFontStyle, Chart.defaults.global.defaultFontFamily);
              ctx.textAlign = 'left';
              ctx.textBaseline = 'top';
              ctx.fillStyle = "#000";

              this.data.datasets.forEach(function(dataset, i) {
                var meta = chartInstance.controller.getDatasetMeta(i);
                meta.data.forEach(function(bar, index) {
                  var data = dataset.data[index].toFixed(0);
                  var data2 = data.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                  ctx.fillText(data2, bar._model.x + 5, bar._model.y - 5);
                });
              });
            }
          },
          scales: {
              xAxes: [{
                  stacked: false,
                  ticks: {
                    max: 7000000,
                  }
                }
              ]
          },
          title: {
              display: true,
              position: "top",
              text: "Selling Out - <?= $data['report_year']['year']; ?>",
              fontSize: 16,
              fontColor: "#111"
          },
          legend: {
            display: true,
            position: 'top',
            labels: {
                boxWidth: 20,
                fontColor: '#111',
                padding: 10,
                filter: function(item, chart) {
                // Logic to remove a particular legend item goes here
                return !item.text.includes("TARGET");
              }
            }
          },
          tooltips: {
            enabled: true,
          },
      }
  });

  //=======================================================================================================================================

var ctx3 = document.getElementById("myChart3");
//ctx3.height = 200;
//ctx.width = 200;
var myChart = new Chart(ctx3, {
    type: 'pie',
    data: {
        labels: ['ONLINE', 'MTKA', 'MTI', 'GT', 'DISTRIBUTOR'],
        datasets: [{
                
                data: [<?php echo $qty_ar_si[0] . ', ' . $qty_ar_si[1] . ', ' . $qty_ar_si[2] . ', ' . $qty_ar_si[3] . ', ' . $qty_dist; ?>],
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
          bottom: 10
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
      title: {
        display: true,
        position: "bottom",
        text: "Selling in - <?= $si_from_Name; ?> to <?= $si_to_Name; ?> - <?= $data['period_si']['year']; ?>",
        fontSize: 16,
        fontColor: "#111",
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
      },
      tooltips: {
        enabled: true
      }, 
    }
});

//================================================================================================================

var ctx4 = document.getElementById("myChart4");
//ctx4.height = 200;
var myChart = new Chart(ctx4, {
    type: 'pie',
    data: {
        labels: ['ONLINE', 'MTKA', 'MTI', 'GT'],
        datasets: [{
                label: '# OL',
                data: [<?php echo $qty_ar_so[0] . ', ' . $qty_ar_so[1] . ', ' . $qty_ar_so[2] . ', ' . $qty_ar_so[3]; ?>],
                backgroundColor: [
                    'rgba(0, 11, 255, 0.5)',
                    'rgba(47, 244, 79, 0.6)',
                    'rgba(255, 248, 0, 0.6)',
                    'rgba(190, 144, 212, 0.6)',
                ],
            }]
    },
    options: {
      layout: {
        padding: {
          left: 20,
          right: 20,
          top: 50,
          bottom: 10
        }
      },
      title: {
        display: true,
        position: "bottom",
        text: "Selling Out - <?= $so_from_Name; ?> to <?= $so_to_Name; ?> - <?= $data['period_so']['year']; ?>",
        fontSize: 16,
        fontColor: "#111"
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
                resizable: false,
                minSize: 14,
                maxSize: 18,
                family: 'Helvetica',
                style: 'bold'
            }
        },
      },
      tooltips: {
        enabled: true
      },
    }
});
//==================================================================================================================================
</script>

