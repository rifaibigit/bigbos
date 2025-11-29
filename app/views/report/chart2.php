  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Chart Selling Out</h1> 
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
            <form action="<?= base_url; ?>/report/chart2" method="post" id="chart_week">
                <div class="row">
                    <div class="col-md-12">
                        <?php 

                            foreach ($data['chart_out_week_OL'] as $row) :
                                $week_ol[] = $row['no_week'];
                                $qty_ol[] = (int) $row['qty'];
                                $channel_ol = $row['channel'];
                                $no_month = $row['no_month'];
                            endforeach;

                            foreach ($data['chart_out_week_MT'] as $row) :
                                $week_mt[] = $row['no_week'];
                                $qty_mt[] = (int) $row['qty'];
                                $channel_mt = $row['channel'];
                                $no_month = $row['no_month'];
                            endforeach;

                            foreach ($data['chart_out_week_GT'] as $row) :
                                $week_gt[] = $row['no_week'];
                                $qty_gt[] = (int) $row['qty'];
                                $channel_gt = $row['channel'];
                                $no_month = $row['no_month'];
                            endforeach;

                            foreach ($data['chart_out_week_TOTAL'] as $row) :
                                $week_total[] = $row['no_week'];
                                $qty_total[] = (int) $row['qty'];
                                $channel_total = $row['channel'];
                                $no_month = $row['no_month'];
                            endforeach;

                            
                        ?> 

                        <div class="row">
                            <div class="col">
                                <div style="width: 80%;height: 80%">
                                    <canvas id="BarChartWeek"></canvas>
                                    
                                </div>
                                <br>
                                <div style="width: 80%;height: 80%">
                                    <canvas id="LineChartWeek"></canvas>
                                </div>
                            </div>

                            <div class="clearfix">

                                <?php

                                    $month = '';

                                    if(isset($data['chart_out_week_OL']))
                                    {
                                        foreach ($data['chart_out_week_OL'] as $row) :
                                            $month = $row['no_month'];
                                        endforeach;
                                        if($month == '')
                                        {
                                            $month = $_POST['bulan'];
                                        }
                                    }else
                                    {
                                        $month = $_POST['bulan'];
                                    }
                                    
                                    //Flasher::setMessage('Bulan',$month,'success');

                                ?>

                                <select name="bulan" class="form-control" onChange="document.getElementById('chart_week').submit();">
                                    <!-- <option value=""><?php echo $month; ?></option> -->
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
                        </div>
                        <!-- <div class="col md-2">
                            
                            <a class="btn btn-primary" href="<?= base_url; ?>/report/sellingout2">Back</a>
                        </div> -->
                        
                    </div>
                </div>
            </form>

            <div>
                <br>
                <br>
            </div>
            <script>  

                /* var randomColorGenerator = function () { 
                    return '#' + (Math.random().toString(16) + '0000000').slice(2, 8); 
                }; */

                var ctx = document.getElementById("BarChartWeek");
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4', 'Week 5', 'Week 6'],
                        datasets: [{
                                label: '#  <?php echo $channel_ol; ?>',
                                data: <?php echo json_encode($qty_ol); ?>,
                                backgroundColor: [
                                    'rgba(0, 15, 255, 0.5)',
                                    'rgba(0, 15, 255, 0.5)',
                                    'rgba(0, 15, 255, 0.5)',
                                    'rgba(0, 15, 255, 0.5)',
                                    'rgba(0, 15, 255, 0.5)',
                                    'rgba(0, 15, 255, 0.5)',
                                ],
                                borderColor: [
                                    'rgba(0, 11, 255, 1.0)',
                                    'rgba(0, 11, 255, 1.0)',
                                    'rgba(0, 11, 255, 1.0)',
                                    'rgba(0, 11, 255, 1.0)', //blue
                                    'rgba(0, 11, 255, 1.0)',
                                    'rgba(0, 11, 255, 1.0)',
                                ],
                                borderWidth: 1
                            },
                            {
                                label: '#  <?php echo $channel_mt; ?>',
                                data: <?php echo json_encode($qty_mt); ?>,
                                backgroundColor: [
                                    'rgba(127, 255, 212, 0.5)',
                                    'rgba(127, 255, 212, 0.5)',
                                    'rgba(127, 255, 212, 0.5)',
                                    'rgba(127, 255, 212, 0.5)',
                                    'rgba(127, 255, 212, 0.5)',
                                    'rgba(127, 255, 212, 0.5)',
                                ],
                                borderColor: [
                                    'rgba(47, 244, 79, 1.0)', //green
                                    'rgba(47, 244, 79, 1.0)',
                                    'rgba(47, 244, 79, 1.0)',
                                    'rgba(47, 244, 79, 1.0)',
                                    'rgba(47, 244, 79, 1.0)',
                                    'rgba(47, 244, 79, 1.0)',
                                ],
                                borderWidth: 1
                            },
                            {
                                label: '#  <?php echo $channel_gt; ?>',
                                data: <?php echo json_encode($qty_gt); ?>,
                                backgroundColor: [
                                    'rgba(222, 235, 135, 0.5)',
                                    'rgba(222, 235, 135, 0.5)',
                                    'rgba(222, 235, 135, 0.5)',
                                    'rgba(222, 235, 135, 0.5)',
                                    'rgba(222, 235, 135, 0.5)',
                                    'rgba(222, 235, 135, 0.5)',
                                ],
                                borderColor: [
                                    'rgba(255, 248, 0, 1.0)', //yellow
                                    'rgba(255, 248, 0, 1.0)',
                                    'rgba(255, 248, 0, 1.0)',
                                    'rgba(255, 248, 0, 1.0)',
                                    'rgba(255, 248, 0, 1.0)',
                                    'rgba(255, 248, 0, 1.0)',
                                    
                                ],
                                borderWidth: 1
                            },
                            {
                                label: '#  <?php echo $channel_total; ?>',
                                data: <?php echo json_encode($qty_total); ?>,
                                backgroundColor: [
                                    'rgba(242, 32, 130, 0.5)',
                                    'rgba(242, 32, 130, 0.5)',
                                    'rgba(242, 32, 130, 0.5)',
                                    'rgba(242, 32, 130, 0.5)',
                                    'rgba(242, 32, 130, 0.5)',
                                    'rgba(242, 32, 130, 0.5)',
                                ],
                                borderColor: [
                                    'rgba(210, 36, 68, 1.0)', //red
                                    'rgba(210, 36, 68, 1.0)',
                                    'rgba(210, 36, 68, 1.0)',
                                    'rgba(210, 36, 68, 1.0)',
                                    'rgba(210, 36, 68, 1.0)',
                                    'rgba(210, 36, 68, 1.0)',
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
                        },
                        title: {
                            display: true,
                            position: "top",
                            text: "Chart Selling Out - By Channel",
                            fontSize: 16,
                            fontColor: "#111"
                        },
                    }
                });

                
            </script>

            <!-- <script>  

            /* var randomColorGenerator = function () { 
                return '#' + (Math.random().toString(16) + '0000000').slice(2, 8); 
            }; */

            var ctx = document.getElementById("LineChartWeek");
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: <?php echo json_encode($week_ol); ?>,
                    datasets: [{
                            label: '#  <?php echo $channel_ol; ?>',
                            data: <?php echo json_encode($qty_ol); ?>,
                            backgroundColor: [
                                    'rgba(0, 15, 255, 0.5)',
                                    'rgba(0, 15, 255, 0.5)',
                                    'rgba(0, 15, 255, 0.5)',
                                    'rgba(0, 15, 255, 0.5)',
                                    'rgba(0, 15, 255, 0.5)',
                                    'rgba(0, 15, 255, 0.5)',
                                ],
                                borderColor: [
                                    'rgba(0, 11, 255, 1.0)',
                                    'rgba(0, 11, 255, 1.0)',
                                    'rgba(0, 11, 255, 1.0)',
                                    'rgba(0, 11, 255, 1.0)', //blue
                                    'rgba(0, 11, 255, 1.0)',
                                    'rgba(0, 11, 255, 1.0)',
                                ],
                                borderWidth: 1
                            },
                            {
                                label: '#  <?php echo $channel_mt; ?>',
                                data: <?php echo json_encode($qty_mt); ?>,
                                backgroundColor: [
                                    'rgba(127, 255, 212, 0.5)',
                                    'rgba(127, 255, 212, 0.5)',
                                    'rgba(127, 255, 212, 0.5)',
                                    'rgba(127, 255, 212, 0.5)',
                                    'rgba(127, 255, 212, 0.5)',
                                    'rgba(127, 255, 212, 0.5)',
                                ],
                                borderColor: [
                                    'rgba(47, 244, 79, 1.0)', //green
                                    'rgba(47, 244, 79, 1.0)',
                                    'rgba(47, 244, 79, 1.0)',
                                    'rgba(47, 244, 79, 1.0)',
                                    'rgba(47, 244, 79, 1.0)',
                                    'rgba(47, 244, 79, 1.0)',
                                ],
                                borderWidth: 1
                            },
                            {
                                label: '#  <?php echo $channel_gt; ?>',
                                data: <?php echo json_encode($qty_gt); ?>,
                                backgroundColor: [
                                    'rgba(222, 235, 135, 0.5)',
                                    'rgba(222, 235, 135, 0.5)',
                                    'rgba(222, 235, 135, 0.5)',
                                    'rgba(222, 235, 135, 0.5)',
                                    'rgba(222, 235, 135, 0.5)',
                                    'rgba(222, 235, 135, 0.5)',
                                ],
                                borderColor: [
                                    'rgba(255, 248, 0, 1.0)', //yellow
                                    'rgba(255, 248, 0, 1.0)',
                                    'rgba(255, 248, 0, 1.0)',
                                    'rgba(255, 248, 0, 1.0)',
                                    'rgba(255, 248, 0, 1.0)',
                                    'rgba(255, 248, 0, 1.0)',
                                    
                                ],
                                borderWidth: 1
                            },
                            {
                                label: '#  <?php echo $channel_total; ?>',
                                data: <?php echo json_encode($qty_total); ?>,
                                backgroundColor: [
                                    'rgba(242, 32, 130, 0.5)',
                                    'rgba(242, 32, 130, 0.5)',
                                    'rgba(242, 32, 130, 0.5)',
                                    'rgba(242, 32, 130, 0.5)',
                                    'rgba(242, 32, 130, 0.5)',
                                    'rgba(242, 32, 130, 0.5)',
                                ],
                                borderColor: [
                                    'rgba(210, 36, 68, 1.0)', //red
                                    'rgba(210, 36, 68, 1.0)',
                                    'rgba(210, 36, 68, 1.0)',
                                    'rgba(210, 36, 68, 1.0)',
                                    'rgba(210, 36, 68, 1.0)',
                                    'rgba(210, 36, 68, 1.0)',
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
                    },
                    title: {
                        display: true,
                        position: "top",
                        text: "Chart Selling Out - By Channel",
                        fontSize: 16,
                        fontColor: "#111"
                    },
                }
            });


            </script> -->
            
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

