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
            <form action="<?= base_url; ?>/report/chart3" method="post" id="chart_month">
                <div class="row">
                    <div class="col-md-12">
                        <?php 

                            foreach ($data['chart_out_quart_OL'] as $row) :
                                $quartal_ol[] = "Quartal " . $row['quartal'];
                                $qty_ol[] = (int) $row['qty'];
                                $channel_ol = $row['channel'];
                                $on_year = $row['on_year'];
                            endforeach;

                            foreach ($data['chart_out_quart_MT'] as $row) :
                                $quartal_mt[] = "Quartal " . $row['quartal'];
                                $qty_mt[] = (int) $row['qty'];
                                $channel_mt = $row['channel'];
                                $on_year = $row['on_year'];
                            endforeach;

                            foreach ($data['chart_out_quart_GT'] as $row) :
                                $quartal_gt[] = "Quartal " . $row['quartal'];
                                $qty_gt[] = (int) $row['qty'];
                                $channel_gt = $row['channel'];
                                $on_year = $row['on_year'];
                            endforeach;

                            foreach ($data['chart_out_quart_TOTAL'] as $row) :
                                $quartal_total[] = "Quartal " . $row['quartal']; 
                                $qty_total[] = (int) $row['qty'];
                                $channel_total = $row['channel'];
                                $on_year = $row['on_year'];
                            endforeach;

                            
                        ?> 

                        <div class="row">
                            <div class="col">
                                <div style="width: 95%;height: 95%">
                                    <canvas id="BarChartQuart"></canvas>
                                    
                                </div>
                                <div style="width: 60%;height: 60%">
                                    <canvas id="LineChartMonth"></canvas>
                                </div>
                            </div>

                            <div class="clearfix">

                                <?php

                                    $year = '';

                                    if(isset($data['chart_out_quart_OL']))
                                    {
                                        foreach ($data['chart_out_quart_OL'] as $row) :
                                            $year = $row['on_year'];
                                        endforeach;
                                        if($year == '')
                                        {
                                            $year = $_POST['tahun'];
                                        }
                                    }else
                                    {
                                        $year = $_POST['tahun'];
                                    }
                                    
                                    //Flasher::setMessage('Bulan',$month,'success');

                                ?>
                                <label>Year</label>
                                <!-- <input type="text" id="yearpicker" class="form-control datetimepicker-input" data-toggle="datetimepicker" data-target="#yearpicker" autocomplete="off" /> -->
                                <input type="text" id="yearpicker" class="form-control datetimepicker-input" data-toggle="datetimepicker" data-target="#yearpicker" autocomplete="off" value="<?php Echo $year; ?>"/>
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

            <!-- <script>
                function setYearPicker(input){
                $(input).datetimepicker({
                    format: "YYYY",
                    useCurrent: false,
                    viewMode: "years"
                })
            }
            </script>


            <script>
                $(document).ready(function(){
                    setYearPicker("#yearpicker")
                })
            </script> -->

            <script>  

                /* var randomColorGenerator = function () { 
                    return '#' + (Math.random().toString(16) + '0000000').slice(2, 8); 
                }; */

                var ctx = document.getElementById("BarChartQuart");
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['Quartal 1', 'Quartal 2', 'Quartal 3', 'Quartal 4'],
                        datasets: [{
                                label: '#  <?php echo $channel_ol; ?>',
                                data: <?php echo json_encode($qty_ol); ?>,
                                backgroundColor: [
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
                                ],
                                borderColor: [
                                    'rgba(47, 244, 79, 1.0)', //green
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
                                ],
                                borderColor: [
                                    'rgba(255, 248, 0, 1.0)', //yellow
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
                                ],
                                borderColor: [
                                    'rgba(210, 36, 68, 1.0)', //red
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

