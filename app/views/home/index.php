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
              <div id="si_chart" class="chart-container" style="margin-top:0px;" height="350vh">
                <div class="row align-items-center h-100">
                    <div class="col-6 mx-auto">
                      <center><img id="img_si_chart" src="<?= base_url; ?>/dist/img/BIG Rotate.gif" style="width:50px;"/></center>
                    </div>
                </div> 
                
              </div>
              <center><a class="btn btn-outline-info btn-sm" style="margin-top:10px;" href="<?= base_url; ?>/Report/sellingin_performance" target="_blank"> Show Report</a></center>                         
            </div><!-- /.selling_in-->
            <div class="chart tab-pane fade show" id="sellingout" style="position: relative;">
              <!-- ============================================================================ -->
              <div id="so_chart" class="chart-container" style="margin-left:0px;" height="350vh">
                <div class="row align-items-center h-100">
                    <div class="col-6 mx-auto">
                      <center><img id="img_so_chart" src="<?= base_url; ?>/dist/img/BIG Rotate.gif" style="width:50px;"/></center>
                    </div>
                </div>
                
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
              <div id="si_channel" class="chart-container" style="margin-left:0px;" height="150vh">
                <div class="row align-items-center h-100">
                    <div class="col-6 mx-auto">
                      <center><img id="img_si_channel" src="<?= base_url; ?>/dist/img/BIG Rotate.gif" style="width:50px;"/></center>
                    </div>
                </div>
                
              </div>
              <!-- <canvas id="myChart3" width="50%" height="30%"></canvas> -->
              <center><a class="btn btn-outline-info btn-sm" style="margin-top:10px;" href="<?= base_url; ?>/Report/sellingin_summary" target="_blank"> Show Report</a></center>                         
            </div>
            <div class="chart tab-pane fade show" id="sellingout_chnl" style="position: relative;">
              <div id="so_channel" class="chart-container" style="margin-left:0px;" height="150vh">
                <div class="row align-items-center h-100">
                    <div class="col-6 mx-auto">
                      <center><img id="img_so_channel" src="<?= base_url; ?>/dist/img/BIG Rotate.gif" style="width:50px;"/></center>
                    </div>
                </div>
              </div>
              <!-- <canvas id="myChart4" width="50%" height="30%"></canvas> -->
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
              <!-- <br> -->
              <center><img id="img_si_region" src="<?= base_url; ?>/dist/img/BIG Rotate.gif" style="width:50px;"/></center>

              <center><a class="btn btn-outline-info btn-sm" style="margin-top:10px;" href="<?= base_url; ?>/Report/Sellingin_Dist" target="_blank"> Show Report</a></center>                         
            </div>
            <div class="chart tab-pane fade show" id="so_dist" style="position: relative;">
              <center><h6><b><?= $so_from_Name; ?> to <?= $so_to_Name; ?> - <?= $data['period_so']['year']; ?></b></h6></center>
              <!-- <br> -->
              <center><img id="img_so_region" src="<?= base_url; ?>/dist/img/BIG Rotate.gif" style="width:50px;"/></center>

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
            <div class="chart tab-pane fade show active" id="si_asm" style="position: relative;margin-right: 0px;">
              <center><h6><b><?= $si_from_Name; ?> to <?= $si_to_Name; ?> - <?= $data['period_si']['year']; ?></b></h6></center>
              <center><img id="img_si_asm" src="<?= base_url; ?>/dist/img/BIG Rotate.gif" style="width:50px;"/></center>
              <center><a class="btn btn-outline-info btn-sm" style="margin-top:10px;" href="<?= base_url; ?>/Report/sellingin_asm" target="_blank"> Show Report</a></center>                         
            </div>
            <div class="chart tab-pane fade show" id="so_asm" style="position: relative;margin-right: 0px;">
              <center><h6><b><?= $so_from_Name; ?> to <?= $so_to_Name; ?> - <?= $data['period_so']['year']; ?></b></h6></center>
              <center><img id="img_so_asm" src="<?= base_url; ?>/dist/img/BIG Rotate.gif" style="width:50px;"/></center>
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

  #myChart3{
    height: auto;
  }

  canvas { 
    display: block; 
    max-width: 100%; 
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

  $(document).ready(function(){
    year = <?= $data['report_year']['year'];?>

    $.ajax({
          url : "<?= base_url; ?>/Home/chart_si_show",
          method : "POST",
          data : {year: year},
          async : true,
          success: function(data){
            var result= $.parseJSON(data);
            var qty_si_ld = [];
            var target_si_ld = [];
            var all_si_ld = [];
            var qty_si_jd = [];
            var target_si_jd = [];
            var all_si_jd = [];
            var qty_si_ttl = [];
            var target_si_ttl = [];
            var all_si_ttl = [];

            $.each( result.chart_si, function( key, value ) {
              if(value.principal === 'LORD')
              {
                qty_si_ld.push(value.value);
                target_si_ld.push(value.value_target);
                all_si_ld.push(value.v_t);
              }else if(value.principal === 'JORDAN')
              {
                qty_si_jd.push(value.value);
                target_si_jd.push(value.value_target);
                all_si_jd.push(value.v_t);
              }else if(value.principal === 'TOTAL')
              {
                qty_si_ttl.push(value.value);
                target_si_ttl.push(value.value_target);
                all_si_ttl.push(value.v_t);
              }
            });

            // console.log(qty_si_ld);
            document.getElementById('img_si_chart').style.visibility = 'hidden';
            document.getElementById("si_chart").innerHTML = '<canvas id="myChart11" height="350vh"></canvas>';
            var ctx11 = document.getElementById("myChart11");
            var myChart = new Chart(ctx11, {
                type: 'horizontalBar',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    datasets: [{
                            label: '#  LORD',
                            data: qty_si_ld,
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
                            // stack: 'Stack 0',
                        },
                        {
                            label: '#  TARGET LORD',
                            data: target_si_ld,
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
                            // stack: 'Stack 0',
                        },
                        {
                            label: '#  JORDAN',
                            data: qty_si_jd,
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
                            // stack: 'Stack 1',
                        },
                        {
                            label: '#  TARGET JORDAN',
                            data: target_si_jd,
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
                            // stack: 'Stack 1',
                        },
                        {
                            label: '#  TOTAL',
                            data: qty_si_ttl,
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
                            // stack: 'Stack 2',
                        },
                        {
                            label: '#  TARGET TOTAL',
                            data: target_si_ttl,
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
                            // stack: 'Stack 2',
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
                          var data = Number(dataset.data[index]).toFixed(0);
                          var data2 = data.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                          ctx.fillText(data2, bar._model.x + 5, bar._model.y - 5);
                        });
                      });
                    }
                  },
                  // maintainAspectRatio: false,
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
                      text: "Selling In - "+year,
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
          }
    });

    $.ajax({
          url : "<?= base_url; ?>/Home/chart_so_show",
          method : "POST",
          data : {year: year},
          async : true,
          success: function(data){
            var result= $.parseJSON(data);
            var qty_so_ld = [];
            var target_so_ld = [];
            var all_so_ld = [];
            var qty_so_jd = [];
            var target_so_jd = [];
            var all_so_jd = [];
            var qty_so_ttl = [];
            var target_so_ttl = [];
            var all_so_ttl = [];

            $.each( result.chart_so, function( key, value ) {
              if(value.principal === 'LORD')
              {
                qty_so_ld.push(value.value);
                target_so_ld.push(value.value_target);
                all_so_ld.push(value.v_t);
              }else if(value.principal === 'JORDAN')
              {
                qty_so_jd.push(value.value);
                target_so_jd.push(value.value_target);
                all_so_jd.push(value.v_t);
              }else if(value.principal === 'TOTAL')
              {
                qty_so_ttl.push(value.value);
                target_so_ttl.push(value.value_target);
                all_so_ttl.push(value.v_t);
              }
            });

            document.getElementById('img_so_chart').style.visibility = 'hidden';
            document.getElementById("so_chart").innerHTML = '<canvas id="myChart21"  height="350vh"></canvas>';
            var ctx21 = document.getElementById("myChart21");
            // ctx21.height = 355;
            var myChart = new Chart(ctx21, {
                type: 'horizontalBar',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    datasets: [{
                            label: '#  LORD',
                            data: qty_so_ld,
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
                            // stack: 'Stack 0',
                        },
                        {
                            label: '#  TARGET LORD',
                            data: target_so_ld,
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
                            // stack: 'Stack 0',
                        },
                        {
                            label: '#  JORDAN',
                            data: qty_so_jd,
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
                            // stack: 'Stack 1',
                        },
                        {
                            label: '#  TARGET JORDAN',
                            data: target_so_jd,
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
                            // stack: 'Stack 1',
                        },
                        {
                            label: '#  TOTAL',
                            data: qty_so_ttl,
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
                            // stack: 'Stack 2',
                        },
                        {
                            label: '#  TARGET TOTAL',
                            data: target_so_ttl,
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
                            // stack: 'Stack 2',
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
                          var data = Number(dataset.data[index]).toFixed(0);
                          var data2 = data.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                          ctx.fillText(data2, bar._model.x + 5, bar._model.y - 5);
                        });
                      });
                    }
                  },
                  // maintainAspectRatio: false,
                  scales: {
                      xAxes: [{
                          stacked: false,
                          ticks: {
                            max: 8000000,
                          }
                        }
                      ]
                  },
                  title: {
                      display: true,
                      position: "top",
                      text: "Selling Out - "+year,
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
          }
    });

    $.ajax({
          url : "<?= base_url; ?>/Home/chart_si_channel_show",
          method : "POST",
          data : {year: year},
          async : true,
          success: function(data){
            var result= $.parseJSON(data);
            var channel = [];
            var val_ar_si = [];

            $.each( result.si_channel, function( key, value ) {
              channel.push(value.channel);
              val_ar_si.push(value.val);
            });

            // console.log(val_ar_si);
            document.getElementById('img_si_channel').style.visibility = 'hidden';
            document.getElementById("si_channel").innerHTML = '<center><canvas id="myChart3" height="150vh"></canvas></center>';
            var ctx3 = document.getElementById("myChart3");
            // ctx3.height = ctx3.width;
            var myChart = new Chart(ctx3, {
                type: 'pie',
                data: {
                    labels: channel,
                    datasets: [{
                            
                            data: val_ar_si,
                            backgroundColor: [
                                'rgba(0, 15, 255, 0.5)',
                                'rgba(47, 244, 79, 0.6)',
                                'rgba(255, 248, 0, 0.6)',
                                'rgba(255, 0, 200, 0.6)',
                                'rgba(190, 144, 212, 0.6)',
                                'rgba(210, 38, 30, 0.6)',
                                
                            ],
                        }]
                },
                options: {
                  responsive: true,
                  maintainAspectRatio: true,
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
                    text: "Selling in - <?= $si_from_Name; ?> to <?= $si_to_Name; ?> - "+year,
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
            
          }
    });

    $.ajax({
          url : "<?= base_url; ?>/Home/chart_so_channel_show",
          method : "POST",
          data : {year: year},
          async : true,
          success: function(data){
            var result= $.parseJSON(data);
            var channel = [];
            var val_ar_so = [];

            $.each( result.so_channel, function( key, value ) {
              channel.push(value.channel);
              val_ar_so.push(value.value);
            });

            // console.log(val_ar_si);
            document.getElementById('img_so_channel').style.visibility = 'hidden';
            document.getElementById("so_channel").innerHTML = '<center><canvas id="myChart4" height="150vh"></canvas></center>';
            var ctx4 = document.getElementById("myChart4");
            var myChart = new Chart(ctx4, {
                type: 'pie',
                data: {
                    labels: channel,
                    datasets: [{
                            
                            data: val_ar_so,
                            backgroundColor: [
                                'rgba(0, 15, 255, 0.5)',
                                'rgba(47, 244, 79, 0.6)',
                                'rgba(255, 248, 0, 0.6)',
                                'rgba(210, 38, 30, 0.6)',
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
                    text: "Selling Out - <?= $so_from_Name; ?> to <?= $so_to_Name; ?> - "+year,
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
            
          }
    });

    $.ajax({
          url : "<?= base_url; ?>/Home/si_region_show",
          method : "POST",
          data : {year: year},
          async : true,
          success: function(data){
            var result= $.parseJSON(data);
            var html = '';
            var progress_val = 0;
            var area = '';
            var bg_color = '';

            // console.log(result.si_region);

            $.each( result.si_region, function( key, value ) {

              html += '<div class="progress-group">';
                if(value.area == 'TOTAL')
                {
                  area = '<b>'+value.area+'</b>';
                  bg_color = 'bg-danger';
                }
                else
                {
                  area = value.area;
                  bg_color = 'bg-primary';
                }
                html += area;
                html += '<span class="float-right"><b>'+Number(value.value_actual).toFixed(0).replace(/\B(?=(\d{3})+(?!\d))/g, ",")+'</b>/'+Number(value.value_target).toFixed(0).replace(/\B(?=(\d{3})+(?!\d))/g, ",")+'</span>';
                html += '<div class="progress">';
                  if(value.value_target == 0)
                  {
                    progress_val = 100;
                  }
                  else if(value.value_actual == 0)
                  {
                    progress_val = 0;
                  }
                  else
                  {
                    progress_val = (value.value_actual/value.value_target)*100;
                  }
                  html += '<div class="progress-bar '+bg_color+'" style="width:'+progress_val+'%"><b>'+Number(progress_val).toFixed(0).replace(/\B(?=(\d{3})+(?!\d))/g, ",")+'%</b></div>';
                html += '</div>';
              html += '</div>';

            });

            document.getElementById('img_si_region').style.visibility = 'hidden';
            document.getElementById("si_dist").innerHTML = html;

          }
    });

    $.ajax({
          url : "<?= base_url; ?>/Home/so_region_show",
          method : "POST",
          data : {year: year},
          async : true,
          success: function(data){
            var result= $.parseJSON(data);
            var html = '';
            var progress_val = 0;
            var area = '';
            var bg_color = '';

            // console.log(result.so_region);

            $.each( result.so_region, function( key, value ) {

              html += '<div class="progress-group">';
                if(value.area == 'TOTAL')
                {
                  area = '<b>'+value.area+'</b>';
                  bg_color = 'bg-danger';
                }
                else
                {
                  area = value.area;
                  bg_color = 'bg-primary';
                }
                html += area;
                html += '<span class="float-right"><b>'+Number(value.value_actual).toFixed(0).replace(/\B(?=(\d{3})+(?!\d))/g, ",")+'</b>/'+Number(value.value_target).toFixed(0).replace(/\B(?=(\d{3})+(?!\d))/g, ",")+'</span>';
                html += '<div class="progress">';
                  if(value.value_target == 0)
                  {
                    progress_val = 100;
                  }
                  else if(value.value_actual == 0)
                  {
                    progress_val = 0;
                  }
                  else
                  {
                    progress_val = (value.value_actual/value.value_target)*100;
                  }
                  html += '<div class="progress-bar '+bg_color+'" style="width:'+progress_val+'%"><b>'+Number(progress_val).toFixed(0).replace(/\B(?=(\d{3})+(?!\d))/g, ",")+'%</b></div>';
                html += '</div>';
              html += '</div>';

            });

            document.getElementById('img_so_region').style.visibility = 'hidden';
            document.getElementById("so_dist").innerHTML = html;

          }
    });

    $.ajax({
          url : "<?= base_url; ?>/Home/si_asm_show",
          method : "POST",
          data : {year: year},
          async : true,
          success: function(data){
            var result= $.parseJSON(data);
            var html = '';
            var progress_val = 0;
            var asm = '';
            var bg_color = '';

            // console.log(result.so_region);

            $.each( result.si_asm, function( key, value ) {

              html += '<div class="progress-group">';
                if(value.asm == 'TOTAL')
                {
                  asm = '<b>'+value.asm+'</b>';
                  bg_color = 'bg-danger';
                }
                else
                {
                  asm = value.asm;
                  bg_color = 'bg-primary';
                }
                html += asm;
                html += '<span class="float-right"><b>'+Number(value.value_actual).toFixed(0).replace(/\B(?=(\d{3})+(?!\d))/g, ",")+'</b>/'+Number(value.value_target).toFixed(0).replace(/\B(?=(\d{3})+(?!\d))/g, ",")+'</span>';
                html += '<div class="progress">';
                  if(value.value_target == 0)
                  {
                    progress_val = 100;
                  }
                  else if(value.value_actual == 0)
                  {
                    progress_val = 0;
                  }
                  else
                  {
                    progress_val = (value.value_actual/value.value_target)*100;
                  }
                  html += '<div class="progress-bar '+bg_color+'" style="width:'+progress_val+'%"><b>'+Number(progress_val).toFixed(0).replace(/\B(?=(\d{3})+(?!\d))/g, ",")+'%</b></div>';
                html += '</div>';
              html += '</div>';

            });

            document.getElementById('img_si_asm').style.visibility = 'hidden';
            document.getElementById("si_asm").innerHTML = html;

          }
    });

    $.ajax({
          url : "<?= base_url; ?>/Home/so_asm_show",
          method : "POST",
          data : {year: year},
          async : true,
          success: function(data){
            var result= $.parseJSON(data);
            var html = '';
            var progress_val = 0;
            var asm = '';
            var bg_color = '';

            // console.log(result.so_region);

            $.each( result.so_asm, function( key, value ) {

              html += '<div class="progress-group">';
                if(value.asm == 'TOTAL')
                {
                  asm = '<b>'+value.asm+'</b>';
                  bg_color = 'bg-danger';
                }
                else
                {
                  asm = value.asm;
                  bg_color = 'bg-primary';
                }
                html += asm;
                html += '<span class="float-right"><b>'+Number(value.value_actual).toFixed(0).replace(/\B(?=(\d{3})+(?!\d))/g, ",")+'</b>/'+Number(value.value_target).toFixed(0).replace(/\B(?=(\d{3})+(?!\d))/g, ",")+'</span>';
                html += '<div class="progress">';
                  if(value.value_target == 0)
                  {
                    progress_val = 100;
                  }
                  else if(value.value_actual == 0)
                  {
                    progress_val = 0;
                  }
                  else
                  {
                    progress_val = (value.value_actual/value.value_target)*100;
                  }
                  html += '<div class="progress-bar '+bg_color+'" style="width:'+progress_val+'%"><b>'+Number(progress_val).toFixed(0).replace(/\B(?=(\d{3})+(?!\d))/g, ",")+'%</b></div>';
                html += '</div>';
              html += '</div>';

            });

            document.getElementById('img_so_asm').style.visibility = 'hidden';
            document.getElementById("so_asm").innerHTML = html;

          }
    });

  });
  
</script>

