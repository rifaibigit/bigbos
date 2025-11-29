  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Distribution SUMMARY</h1> 
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
            <form action="<?= base_url; ?>/Report/distribution_summary" method="post">
                <div class="row">
                    <div class="col-md-12">
                      <div class="input-group mb-3">

                        <?php

                        if(isset($data))
                        {
                            $principal = $data['by_principal'];
                            $area = $data['by_area'];
                            $year = $data['by_year'];
                            $old_year = (int)$year - 1;
                            $month_so = $data['month_so'];

                        }else
                        {
                            $principal = "By Principal";
                            $area = "By Area";
                        }

                        ?>

                          <div style="width : 130px; margin-bottom: 5px;">
                              <select class="mdb-select md-form form-control" title="By Principal" id="by_principal" name="by_principal">
                                  <option value="">By Principal</option>
                                      <?php $no=1; ?>
                                      <?php foreach ($data['principal'] as $row) :?>
                                          <option <?php if( $principal==$row['principal']){echo "selected"; } ?> value="<?= $row['principal'];?>"><b><?= $row['principal'];?></b></option>
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
                          <div style="margin-left : 5px; width : 80px;">
                              <input name="by_year" class="mdb-select md-form form-control" type="number" min="1900" max="2099" step="1" value="<?= $year ;?>" />
                          </div>
                          <div style="margin-left : 5px;">
                            <button class="btn btn-outline-primary" type="submit" onclick="openLoader()">Go!</button>
                            <a class="btn btn-outline-secondary" href="<?= base_url; ?>/Report/distribution_summary" onclick="openLoader()">Reset</a>
                          </div>
                          <div style="margin-left : 5px;">
                            <button class="btn float-right btn btn-outline-success" type="submit" formaction="<?= base_url; ?>/Report/export_distribution_summary"><i class = "fa fa-download"> Excel</i></button>
                          </div>
                      </div>

                        <!-- <div id="hasil_sale_out"></div> -->
                      <div class="table-responsive-sm text-small">
                        <table id="distr_summary" class="table table-bordered table-sm" align="left" style="font-size:85%;border: 1px solid black;table-layout: fixed;">
                          <thead class="table-warning">
                            <tr>
                              <th rowspan="2" class="text-center" style="width: 5px; vertical-align: middle;">#</th>
                              <th rowspan="2" class="text-center" style="width: 170px; vertical-align: middle;">TYPE OF OUTLET</th>
                              <th rowspan="2" class="text-center" style="width: 50px; vertical-align: middle;">CODE</th>
                              <th colspan="5" class="text-center">JANUARI</th>
                              <th colspan="5" class="text-center">FEBRUARI</th>
                              <th colspan="5" class="text-center">MARET</th>
                              <th colspan="5" class="text-center">APRIL</th>
                              <th colspan="5" class="text-center">MEI</th>
                              <th colspan="5" class="text-center">JUNI</th>
                              <th colspan="5" class="text-center">JULI</th>
                              <th colspan="5" class="text-center">AGUSTUS</th>
                              <th colspan="5" class="text-center">SEPTEMBER</th>
                              <th colspan="5" class="text-center">OKTOBER</th>
                              <th colspan="5" class="text-center">NOPEMBER</th>
                              <th colspan="5" class="text-center">DESEMBER</th>
                              <th style="border: 0px;background-color:white;"></th>
                              <th colspan="14" style="border: 0px;background-color:white;">PROGRESS REGISTRASI OUTLET (RO)</th>
                              <th style="border: 0px;background-color:white;"></th>
                              <th colspan="14" style="border: 0px;background-color:white;">PROGRESS DISTRIBUTION (DIST)</th>
                              <th style="border: 0px;background-color:white;"></th>
                              <th colspan="14" style="border: 0px;background-color:white;">PROGRESS ACTIVE OUTLET (AO)</th>
                            </tr>                
                            <tr style="line-height: 14px !important; vertical-align: middle;">
                              <?php for($i=1;$i<=12;$i++){
                                  echo '<th class="text-center" style="width: 25px; vertical-align: middle;">RO</th>';
                                  echo '<th class="text-center" style="width: 30px; vertical-align: middle;">DIST</th>';
                                  echo '<th class="text-center" style="width: 25px; vertical-align: middle;">DIST VS RO</th>';
                                  echo '<th class="text-center" style="width: 40px; vertical-align: middle;">AO</th>';
                                  echo '<th class="text-center" style="width: 40px; vertical-align: middle;">AO VS DIST</th>';
                              } 
                              ?> 
                              <th style="border: 0px; border-color: white;background-color:white;"></th>
                              <th class="text-center" style="width: 25px; vertical-align: middle;">JAN</th>
                              <th class="text-center" style="width: 25px; vertical-align: middle;">FEB</th>
                              <th class="text-center" style="width: 25px; vertical-align: middle;">MAR</th>
                              <th class="text-center" style="width: 25px; vertical-align: middle;">APR</th>
                              <th class="text-center" style="width: 25px; vertical-align: middle;">MEI</th>
                              <th class="text-center" style="width: 25px; vertical-align: middle;">JUN</th>
                              <th class="text-center" style="width: 25px; vertical-align: middle;">JUL</th>
                              <th class="text-center" style="width: 25px; vertical-align: middle;">AGU</th>
                              <th class="text-center" style="width: 25px; vertical-align: middle;">SEP</th>
                              <th class="text-center" style="width: 25px; vertical-align: middle;">OKT</th>
                              <th class="text-center" style="width: 25px; vertical-align: middle;">NOP</th>
                              <th class="text-center" style="width: 25px; vertical-align: middle;">DES</th>
                              <th class="text-center" style="width: 60px; vertical-align: middle;" nowrap><?= $old_year ;?></th>
                              <th class="text-center" style="width: 100px !important; vertical-align: middle;" nowrap>%Growth</th>

                              <th style="border: 0px; border-color: white;background-color:white;"></th>
                              <th class="text-center" style="width: 25px; vertical-align: middle;">JAN</th>
                              <th class="text-center" style="width: 25px; vertical-align: middle;">FEB</th>
                              <th class="text-center" style="width: 25px; vertical-align: middle;">MAR</th>
                              <th class="text-center" style="width: 25px; vertical-align: middle;">APR</th>
                              <th class="text-center" style="width: 25px; vertical-align: middle;">MEI</th>
                              <th class="text-center" style="width: 25px; vertical-align: middle;">JUN</th>
                              <th class="text-center" style="width: 25px; vertical-align: middle;">JUL</th>
                              <th class="text-center" style="width: 25px; vertical-align: middle;">AGU</th>
                              <th class="text-center" style="width: 25px; vertical-align: middle;">SEP</th>
                              <th class="text-center" style="width: 25px; vertical-align: middle;">OKT</th>
                              <th class="text-center" style="width: 25px; vertical-align: middle;">NOP</th>
                              <th class="text-center" style="width: 25px; vertical-align: middle;">DES</th>
                              <th class="text-center" style="width: 60px; vertical-align: middle;" nowrap><?= $old_year ;?></th>
                              <th class="text-center" style="width: 100px !important; vertical-align: middle;" nowrap>%Growth</th>

                              <th style="border: 0px; border-color: white;background-color:white;"></th>
                              <th class="text-center" style="width: 25px; vertical-align: middle;">JAN</th>
                              <th class="text-center" style="width: 25px; vertical-align: middle;">FEB</th>
                              <th class="text-center" style="width: 25px; vertical-align: middle;">MAR</th>
                              <th class="text-center" style="width: 25px; vertical-align: middle;">APR</th>
                              <th class="text-center" style="width: 25px; vertical-align: middle;">MEI</th>
                              <th class="text-center" style="width: 25px; vertical-align: middle;">JUN</th>
                              <th class="text-center" style="width: 25px; vertical-align: middle;">JUL</th>
                              <th class="text-center" style="width: 25px; vertical-align: middle;">AGU</th>
                              <th class="text-center" style="width: 25px; vertical-align: middle;">SEP</th>
                              <th class="text-center" style="width: 25px; vertical-align: middle;">OKT</th>
                              <th class="text-center" style="width: 25px; vertical-align: middle;">NOP</th>
                              <th class="text-center" style="width: 25px; vertical-align: middle;">DES</th>
                              <th class="text-center" style="width: 60px; vertical-align: middle;" nowrap><?= $old_year ;?></th>
                              <th class="text-center" style="width: 100px !important; vertical-align: middle;" nowrap>%Growth</th>
                            </tr>
                          </thead>
                          <tbody>

                          <?php

                            $sub_ro = [];
                            $sub_dist = [];
                            $sub_ao = [];
                            $total_ro = [];
                            $total_dist = [];
                            $total_ao = [];

                            $sub_ro_old = 0;
                            $sub_dist_old = 0;
                            $sub_ao_old = 0;
                            $total_ro_old = 0;
                            $total_dist_old = 0;
                            $total_ao_old = 0;

                          ?>

                          <?php $no=1; ?>
                          <?php $channel=''; ?>

                              <?php foreach ($data['distr_summary'] as $row) :?>
                                <?php
                                  if ($channel != $row['channel'] and $channel != '')
                                  {
                                    echo '<tr style="background-color: rgb(217, 225, 242); font-weight:bold;">';
                                    echo '<td></td>';
                                    echo '<td class="text-center">' .$channel. '</td>';
                                    echo '<td></td>';
                                    for($i = 1; $i <= 12; $i++)
                                    {

                                      echo '<td class="text-right">'.number_format($sub_ro[$i], 0).'</td>';
                                      echo '<td class="text-right">'.number_format($sub_dist[$i], 0).'</td>';

                                      if($sub_ro[$i] == null or $sub_ro[$i] == "0")
                                      {
                                        $sub_dist_ro = 0;
                                      }
                                      else
                                      {
                                        $sub_dist_ro = ($sub_dist[$i]/$sub_ro[$i])*100;
                                      }

                                      echo '<td class="text-right">'.number_format($sub_dist_ro, 0).'%</td>';
                                      echo '<td class="text-right">'.number_format($sub_ao[$i], 0).'</td>';

                                      if($sub_dist[$i] == null or $sub_dist[$i] == "0")
                                      {
                                        $sub_ao_dist = 0;
                                      }
                                      else
                                      {
                                        $sub_ao_dist = ($sub_ao[$i]/$sub_dist[$i])*100;
                                      }

                                      echo '<td class="text-right">'.number_format($sub_ao_dist, 0).'%</td>';

                                    }
                                    echo '<td style="border: 0px;background-color:white;"></td>';

                                    for($i = 1; $i <= 12; $i++)
                                    {

                                      echo '<td class="text-right">'.number_format($sub_ro[$i], 0).'</td>';
                                      
                                    }

                                    echo '<td class="text-right">'.number_format($sub_ro_old, 0).'</td>';

                                    if($sub_ro[$month_so] == 0 or $sub_ro_old == 0)
                                    {
                                      echo '<td class="text-right">0</td>';
                                    }
                                    else
                                    {
                                      echo '<td class="text-right">'.number_format(($sub_ro[$month_so]/$sub_ro_old-1)*100, 0).'%</td>';
                                    }

                                    echo '<td style="border: 0px;background-color:white;"></td>';

                                    for($i = 1; $i <= 12; $i++)
                                    {

                                      echo '<td class="text-right">'.number_format($sub_dist[$i], 0).'</td>';
                                      
                                    }

                                    echo '<td class="text-right">'.number_format($sub_dist_old, 0).'</td>';

                                    if($sub_dist[$month_so] == 0 or $sub_dist_old == 0)
                                    {
                                      echo '<td class="text-right">0%</td>';
                                    }
                                    else
                                    {
                                      echo '<td class="text-right">'.number_format(($sub_dist[$month_so]/$sub_dist_old-1)*100, 0).'%</td>';
                                    }

                                    echo '<td style="border: 0px;background-color:white;"></td>';

                                    for($i = 1; $i <= 12; $i++)
                                    {

                                      echo '<td class="text-right">'.number_format($sub_ao[$i], 0).'</td>';
                                      
                                    }

                                    echo '<td class="text-right">'.number_format($sub_ao_old, 0).'</td>';

                                    if($sub_ao[$month_so] == 0 or $sub_ao_old == 0)
                                    {
                                      echo '<td class="text-right">0%</td>';
                                    }
                                    else
                                    {
                                      echo '<td class="text-right">'.number_format(($sub_ao[$month_so]/$sub_ao_old-1)*100, 0).'%</td>';
                                    }
                                    
                                    for($i = 1; $i <= 12; $i++)
                                    {
                                      $sub_ro[$i] = 0;
                                      $sub_dist[$i] = 0;
                                      $sub_ao[$i] = 0;
                                    }

                                    $sub_ro_old = 0;
                                    $sub_dist_old = 0;
                                    $sub_ao_old = 0;

                                    echo '</tr>';
                                  }
                                ?>
                                <tr>
                                    <td class="text-center"><?= $no; ?></td>
                                    <td><?= $row['desc_type'];?></td>
                                    <td><?= $row['outlet_type'];?></td>
                                    <?php
                                      for($i = 1; $i <= 12; $i++)
                                      {

                                        echo '<td class="text-right">'.number_format($row['RO_'.$i], 0).'</td>';
                                        echo '<td class="text-right">'.number_format($row['DIST_'.$i], 0).'</td>';

                                        if($row['RO_'.$i] == null or $row['RO_'.$i] == "0")
                                        {
                                          $dist_ro = 0;
                                        }
                                        else
                                        {
                                          $dist_ro = ($row['DIST_'.$i]/$row['RO_'.$i])*100;
                                        }

                                        echo '<td class="text-right">'.number_format($dist_ro, 0).'%</td>';
                                        echo '<td class="text-right">'.number_format($row['AO_'.$i], 0).'</td>';

                                        if($row['DIST_'.$i] == null or $row['DIST_'.$i] == "0")
                                        {
                                          $ao_dist = 0;
                                        }
                                        else
                                        {
                                          $ao_dist = ($row['AO_'.$i]/$row['DIST_'.$i])*100;
                                        }

                                        echo '<td class="text-right">'.number_format($ao_dist, 0).'%</td>';

                                        $sub_ro[$i] += $row['RO_'.$i];
                                        $sub_dist[$i] += $row['DIST_'.$i];
                                        $sub_ao[$i] += $row['AO_'.$i];
                                        $total_ro[$i] += $row['RO_'.$i];
                                        $total_dist[$i] += $row['DIST_'.$i];
                                        $total_ao[$i] += $row['AO_'.$i];

                                      }

                                      $sub_ro_old += $row['RO_12_old'];
                                      $sub_dist_old += $row['DIST_12_old'];
                                      $sub_ao_old += $row['AO_12_old'];
                                      $total_ro_old += $row['RO_12_old'];
                                      $total_dist_old += $row['DIST_12_old'];
                                      $total_ao_old += $row['AO_12_old'];

                                    ;?>
                                    

                                  <?php $channel = $row['channel'] ?>

                                  <td style="border: 0px;background-color:white;"></td>

                                  <?php
                                    for($i = 1; $i <= 12; $i++)
                                    {

                                      echo '<td class="text-right">'.number_format($row['RO_'.$i], 0).'</td>';
                                      
                                    }
                                  ;?>

                                  <td class="text-right"><?= number_format($row['RO_12_old'], 0) ;?></td>
                                  <?php
                                    if($row['RO_'.$month_so] == 0 or $row['RO_12_old'] == 0)
                                    {
                                      echo '<td class="text-right">0%</td>';
                                    }
                                    else
                                    {
                                      echo '<td class="text-right">'.number_format(($row['RO_'.$month_so]/$row['RO_12_old']-1)*100, 0).'%</td>';
                                    }
                                  ;?>

                                  <td style="border: 0px;background-color:white;"></td>

                                  <?php
                                    for($i = 1; $i <= 12; $i++)
                                    {

                                      echo '<td class="text-right">'.number_format($row['DIST_'.$i], 0).'</td>';
                                      
                                    }
                                  ;?>

                                  <td class="text-right"><?= number_format($row['DIST_12_old'], 0) ;?></td>
                                  <?php
                                    if($row['DIST_'.$month_so] == 0 or $row['DIST_12_old'] == 0)
                                    {
                                      echo '<td class="text-right">0%</td>';
                                    }
                                    else
                                    {
                                      echo '<td class="text-right">'.number_format(($row['DIST_'.$month_so]/$row['DIST_12_old']-1)*100, 0).'%</td>';
                                    }
                                  ;?>

                                  <td style="border: 0px;background-color:white;"></td>

                                  <?php
                                    for($i = 1; $i <= 12; $i++)
                                    {

                                      echo '<td class="text-right">'.number_format($row['AO_'.$i], 0).'</td>';
                                      
                                    }
                                  ;?>

                                  <td class="text-right"><?= number_format($row['AO_12_old'], 0) ;?></td>
                                  <?php
                                    if($row['AO_'.$month_so] == 0 or $row['AO_12_old'] == 0)
                                    {
                                      echo '<td class="text-right">0%</td>';
                                    }
                                    else
                                    {
                                      echo '<td class="text-right">'.number_format(($row['AO_'.$month_so]/$row['AO_12_old']-1)*100, 0).'%</td>';
                                    }
                                  ;?>
                                  
                                  
                                </tr>
                              <?php $no++; endforeach; ?>

                              <tr style="background-color: rgb(217, 225, 242); font-weight:bold;">
                                  <td></td>
                                  <td class="text-center"><?= $channel ;?></td>
                                  <td></td>
                                  <?php
                                    for($i = 1; $i <= 12; $i++)
                                    {

                                      echo '<td class="text-right">'.number_format($sub_ro[$i], 0).'</td>';
                                      echo '<td class="text-right">'.number_format($sub_dist[$i], 0).'</td>';

                                      if($sub_ro[$i] == null or $sub_ro[$i] == "0")
                                      {
                                        $sub_dist_ro = 0;
                                      }
                                      else
                                      {
                                        $sub_dist_ro = ($sub_dist[$i]/$sub_ro[$i])*100;
                                      }

                                      echo '<td class="text-right">'.number_format($sub_dist_ro, 0).'%</td>';
                                      echo '<td class="text-right">'.number_format($sub_ao[$i], 0).'</td>';

                                      if($sub_dist[$i] == null or $sub_dist[$i] == "0")
                                      {
                                        $sub_ao_dist = 0;
                                      }
                                      else
                                      {
                                        $sub_ao_dist = ($sub_ao[$i]/$sub_dist[$i])*100;
                                      }

                                      echo '<td class="text-right">'.number_format($sub_ao_dist, 0).'%</td>';

                                    }

                                    echo '<td style="border: 0px;background-color:white;"></td>';

                                    for($i = 1; $i <= 12; $i++)
                                    {

                                      echo '<td class="text-right">'.number_format($sub_ro[$i], 0).'</td>';
                                      
                                    }

                                    echo '<td class="text-right">'.number_format($sub_ro_old, 0).'</td>';

                                    if($sub_ro[$month_so] == 0 or $sub_ro_old == 0)
                                    {
                                      echo '<td class="text-right">0%</td>';
                                    }
                                    else
                                    {
                                      echo '<td class="text-right">'.number_format(($sub_ro[$month_so]/$sub_ro_old-1)*100, 0).'%</td>';
                                    }

                                    echo '<td style="border: 0px;background-color:white;"></td>';

                                    for($i = 1; $i <= 12; $i++)
                                    {

                                      echo '<td class="text-right">'.number_format($sub_dist[$i], 0).'</td>';
                                      
                                    }

                                    echo '<td class="text-right">'.number_format($sub_dist_old, 0).'</td>';

                                    if($sub_dist[$month_so] == 0 or $sub_dist_old == 0)
                                    {
                                      echo '<td class="text-right">0%</td>';
                                    }
                                    else
                                    {
                                      echo '<td class="text-right">'.number_format(($sub_dist[$month_so]/$sub_dist_old-1)*100, 0).'%</td>';
                                    }

                                    echo '<td style="border: 0px;background-color:white;"></td>';

                                    for($i = 1; $i <= 12; $i++)
                                    {

                                      echo '<td class="text-right">'.number_format($sub_ao[$i], 0).'</td>';
                                      
                                    }

                                    echo '<td class="text-right">'.number_format($sub_ao_old, 0).'</td>';

                                    if($sub_ao[$month_so] == 0 or $sub_ao_old == 0)
                                    {
                                      echo '<td class="text-right">0%</td>';
                                    }
                                    else
                                    {
                                      echo '<td class="text-right">'.number_format(($sub_ao[$month_so]/$sub_ao_old-1)*100, 0).'%</td>';
                                    }
                                    

                                  ;?>

                                </tr>

                                <tr class="table-danger" style="font-weight:bold;">
                                  <td></td>
                                  <td class="text-center">TOTAL</td>
                                  <td></td>
                                  <?php
                                    for($i = 1; $i <= 12; $i++)
                                    {

                                      echo '<td class="text-right">'.number_format($total_ro[$i], 0).'</td>';
                                      echo '<td class="text-right">'.number_format($total_dist[$i], 0).'</td>';

                                      if($total_ro[$i] == null or $total_ro[$i] == "0")
                                      {
                                        $total_dist_ro = 0;
                                      }
                                      else
                                      {
                                        $total_dist_ro = ($total_dist[$i]/$total_ro[$i])*100;
                                      }

                                      echo '<td class="text-right">'.number_format($total_dist_ro, 0).'%</td>';
                                      echo '<td class="text-right">'.number_format($total_ao[$i], 0).'</td>';

                                      if($total_dist[$i] == null or $total_dist[$i] == "0")
                                      {
                                        $total_ao_dist = 0;
                                      }
                                      else
                                      {
                                        $total_ao_dist = ($total_ao[$i]/$total_dist[$i])*100;
                                      }

                                      echo '<td class="text-right">'.number_format($total_ao_dist, 0).'%</td>';

                                    }

                                    echo '<td style="border: 0px;background-color:white;"></td>';

                                    for($i = 1; $i <= 12; $i++)
                                    {

                                      echo '<td class="text-right">'.number_format($total_ro[$i], 0).'</td>';
                                      
                                    }

                                    echo '<td class="text-right">'.number_format($total_ro_old, 0).'</td>';

                                    if($total_ro[$month_so] == 0 or $total_ro_old == 0)
                                    {
                                      echo '<td class="text-right">0%</td>';
                                    }
                                    else
                                    {
                                      echo '<td class="text-right">'.number_format(($total_ro[$month_so]/$total_ro_old-1)*100, 0).'%</td>';
                                    }
                                    
                                    echo '<td style="border: 0px;background-color:white;"></td>';

                                    for($i = 1; $i <= 12; $i++)
                                    {

                                      echo '<td class="text-right">'.number_format($total_dist[$i], 0).'</td>';
                                      
                                    }

                                    echo '<td class="text-right">'.number_format($total_dist_old, 0).'</td>';

                                    if($total_dist[$month_so] == 0 or $total_dist_old == 0)
                                    {
                                      echo '<td class="text-right">0%</td>';
                                    }
                                    else
                                    {
                                      echo '<td class="text-right">'.number_format(($total_dist[$month_so]/$total_dist_old-1)*100, 0).'%</td>';
                                    }

                                    echo '<td style="border: 0px;background-color:white;"></td>';

                                    for($i = 1; $i <= 12; $i++)
                                    {

                                      echo '<td class="text-right">'.number_format($total_ao[$i], 0).'</td>';
                                      
                                    }

                                    echo '<td class="text-right">'.number_format($total_ao_old, 0).'</td>';

                                    if($total_ao[$month_so] == 0 or $total_ao_old == 0)
                                    {
                                      echo '<td class="text-right">0%</td>';
                                    }
                                    else
                                    {
                                      echo '<td class="text-right">'.number_format(($total_ao[$month_so]/$total_ao_old-1)*100, 0).'%</td>';
                                    }
                                    
                                  ;?>

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

<script>
  $('#distr_summary').DataTable({
      "scrollY": 700,
      "scrollX": true,
      "autoWidth": true,
      "responsive": true,
      "paging":   false,
      "ordering": false,
      "searching": false,
      "info":     false,
      "fixedColumns":   {
            "leftColumns": 3
      },
      /* "dom": 'Bfrtip',
      "buttons": [
            'excel',
        ] */
    });
</script>