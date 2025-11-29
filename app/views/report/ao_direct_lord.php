  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Direct Active Outlet - LORD</h1> 
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
            <form action="<?= base_url; ?>/Report/ao_direct_lord" method="post">
                <div class="row">
                    <div class="col-md-12">
                      <div class="input-group mb-3">

                        <?php

                        if(isset($data))
                        {
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
                        
                          <div class="row" style="margin-left : 10px; width:120px;">
                            <div></div>
                            <select name="by_month1" title="MONTH" class="mdb-select md-form form-control" style="margin-left : 10px;  width:120px;">
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
                            <select name="by_month2" title="MONTH" class="mdb-select md-form form-control" style="margin-left : 10px;  width:120px;">
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
                          <div style="margin-left : 5px;">
                            <button class="btn btn-outline-primary" type="submit">Go!</button>
                            <a class="btn btn-outline-secondary" href="<?= base_url; ?>/Report/ao_direct_lord">Reset</a>
                          </div>
                          <div style="margin-left : 5px;">
                            <button class="btn float-right btn btn-outline-success" type="submit" formaction="<?= base_url; ?>/Report/export_ao_direct_lord"><i class = "fa fa-download"> Excel</i></button>
                          </div>
                      </div>

                        <!-- <div id="hasil_sale_out"></div> -->
                        <div class="table-responsive-sm text-small">
                          <table id="distr" class="table table-bordered table-sm" align="left" style="font-size:85%; border: 1px solid black;">
                            <thead class="table-warning">
                              
                              <?php
                                  foreach ($data['sku_count'] as $row) :
                                      $count = $row['item_row'];
                                  endforeach
                              ?>

                                <tr>
                                  <th rowspan="3" class="text-center" style="width: 5px; vertical-align: middle;">#</th>
                                  <th rowspan="3" class="text-center" style="width: 170px; vertical-align: middle;">TYPE OF OUTLET</th>
                                  <th rowspan="3" class="text-center" style="width: 40px; vertical-align: middle;">Code</th>
                                  <th rowspan="3" class="text-center" style="width: 15px; vertical-align: middle;">RO</th>
                                  <?php foreach ($data['sku_group'] as $row) :?>
                                  <th colspan="<?= $row['count_name']*2;?>" class="text-center"><?= $row['item_group'];?></th>
                                  <?php endforeach ?>
                                  <th colspan="2" rowspan="2" class="text-center" style="vertical-align: middle; background-color: #FF6D6D;">TOTAL</th>
                                </tr>
                                <tr style="line-height: 12px; vertical-align: middle;">
                                  <?php foreach ($data['sku_name'] as $row) :?>
                                  <th colspan="2" class="text-center" style="vertical-align: middle;"><?= $row['item_name'];?></th>
                                  <?php endforeach ?>  
                                </tr>                  
                                <tr style="line-height: 10px; vertical-align: middle;">
                                  <?php for($i=1;$i<=$count;$i++){
                                      echo '<th class="text-center" style="width: 20px; vertical-align: middle;">AO</th>';
                                      echo '<th class="text-center" style="width: 15px; vertical-align: middle;">%</th>';
                                  } 
                                  ?> 
                                  <th class="text-center" style="width: 20px; vertical-align: middle; background-color: #FF6D6D;">AO</th>
                                  <th class="text-center" style="width: 15px; vertical-align: middle; background-color: #FF6D6D;">%</th>
                                </tr>
                            </thead>
                            <tbody>

                            <?php

                              $total_RO = 0;
                              $x=1;
                              foreach($data['sku_code'] as $sku):
                                $total_d[$x] = 0;
                                $total_p[$x] = 0;
                                $x++;
                              endforeach;

                              $total_dAll = 0;
                              $total_pAll = 0;

                            ?>

                            <?php $no=1; ?>
                            <?php $channel=''; ?>
                                <!-- Online -->
                                <?php foreach ($data['distr_lord'] as $row) :?>
                                <?php
                                  if ($channel != $row['channel'])
                                  {
                                    $channel = $row['channel'];
                                    echo '<tr style="background-color: rgb(217, 225, 242); font-weight:bold;">';
                                    echo '<td></td>';
                                    echo '<td class="text-center">' .$row['channel']. '</td>';
                                    echo '<td></td>';
                                    echo '<td></td>';
                                    $x = 1;
                                    foreach($data['sku_code'] as $sku):
                                      echo '<td></td>';
                                      echo '<td></td>';
                                      $x++;
                                    endforeach;
                                    echo '<td></td>';
                                    echo '<td></td>';
                                    echo '</tr>';
                                  }
                                ?>
                                <tr>
                                    <td class="text-center"><?= $no; ?></td>
                                    <td><?= $row['desc_type'];?></td>
                                    <td><?= $row['outlet_type'];?></td>
                                    <td class="text-right"><?= number_format($row['RO'], 0);?></td>
                                    <?php $a=1; ?>
                                      <?php foreach($data['sku_code'] as $sku): ?>
                                        <td class="text-right"><?= number_format($row['d'.$a], 0);?></td>
                                        <td class="text-right"><?= number_format($row['%'.$a], 2);?></td>
                                      <?php $a++; ?>
                                      <?php endforeach; ?> 
                                      <?php
                                        $data1 = array(
                                          'principal' => "LORD",
                                          'outlet_type' => str_replace(" ", "__", $row['outlet_type']),
                                          'year' => $year
                                        );
                                      ?> 
                                      <td class="text-right"><b><a href="<?= base_url; ?>/Report/AO_Direct_OT2/<?= implode(",", $data1); ?>" target="_blank"><?= number_format($row['dtotal'], 0);?></a></b></td>
                                      <td class="text-right"><?= number_format($row['%total'], 2);?></td>
                        

                                    <?php $total_RO += $row['RO']; ?>
                                    <?php $x = 1; ?>
                                    <?php foreach($data['sku_code'] as $sku): ?>
                                      <?php $total_d[$x] += $row['d'.$x]; ?>
                                      <?php 
                                        if($total_RO==0)
                                        {
                                          $total_p[$x] = 0;
                                        }
                                        else
                                        {
                                          $total_p[$x] = ($total_d[$x]/$total_RO)*100;
                                        } 
                                      ?>
                                      <?php $x++; ?>
                                    <?php endforeach; ?>

                                    <?php $total_dAll += $row['dtotal']; ?>

                                    <?php $no++; endforeach; ?>

                                </tr>

                                <?php 
                                  if($total_RO==0)
                                  {
                                    $total_pAll = 0;
                                  }
                                  else
                                  {
                                    $total_pAll = ($total_dAll/$total_RO)*100;
                                  } 
                                ?>

                                <tr class="table-danger" style="font-weight:bold;">
                                  <td></td>
                                  <td>TOTAL</td>
                                  <td></td>
                                  <td class="text-right"><?= number_format($total_RO, 0);?></td>
                                  <?php $a=1; ?>
                                  <?php foreach($data['sku_code'] as $sku): ?>
                                    <td class="text-right"><?= number_format($total_d[$a], 0);?></td>
                                    <td class="text-right"><?= number_format($total_p[$a], 2);?></td>
                                  <?php $a++; ?>
                                  <?php endforeach; ?>
                                  <td class="text-right"><?= number_format($total_dAll, 0);?></td>
                                  <td class="text-right"><?= number_format($total_pAll, 2);?></td>
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