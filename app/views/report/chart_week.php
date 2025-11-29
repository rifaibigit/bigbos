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
                    <ul class="nav nav-tabs" id="myTab">
                        <li class="active"><a data-target="#chart-1" data-toggle="tab">Chart-1</a></li>
                        <li><a data-target="#chart-2" data-toggle="tab">Chart-2</a></li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane active" id="chart-1">
                            <canvas id="bar-chart-1" width="600" height="350"></canvas>
                        </div>
                        <div class="tab-pane" id="chart-2">
                            <canvas id="bar-chart-2" width="600" height="350"></canvas>
                        </div>
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

                
            </script>

            <script>  

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


            </script>

            <script>
                var numberWithCommas = function(x) {
                return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                };

                var dataPack1 = [21000, 22000, 26000, 35000, 55000, 55000, 56000, 59000, 60000, 61000, 60100, 62000];
                var dataPack2 = [1000, 1200, 1300, 1400, 1060, 2030, 2070, 4000, 4100, 4020, 4030, 4050];
                var dates = ["Mon, May 1", "Tue, May 2", "Wed, May 3", "Thu, May 4", "Fri, May 5", "Sat, May 6",
                "Sun, May 7", "Mon, May 8", "Tue, May 9", "Wed, May 10", "Thu, May 11", "Fri, May 12"
                ];

                // Chart.defaults.global.elements.rectangle.backgroundColor = '#FF0000';

                var bar_ctx_1 = document.getElementById('bar-chart-1');
                var bar_ctx_2 = document.getElementById('bar-chart-2');

                var bar_chart_1 = new Chart(bar_ctx_1, {
                type: 'bar',
                data: {
                    labels: dates,
                    datasets: [{
                    label: 'Bowser',
                    data: dataPack1,
                    backgroundColor: "red",
                    hoverBackgroundColor: "red",
                    hoverBorderWidth: 2,
                    hoverBorderColor: 'lightgrey'
                    }, {
                    label: 'Mario',
                    data: dataPack2,
                    backgroundColor: "darkred",
                    hoverBackgroundColor: "darkred",
                    hoverBorderWidth: 2,
                    hoverBorderColor: 'lightgrey'
                    }, ]
                },
                options: {
                    tooltips: {
                    mode: 'label',
                    callbacks: {
                        title: function(tooltipItems, data) {
                        return data.labels[tooltipItems.index] + ' ';
                        },
                        label: function(tooltipItem, data) {
                        return data.datasets[tooltipItem.datasetIndex].label + ": " + numberWithCommas(tooltipItem.yLabel);
                        },
                    }
                    },
                    scales: {
                    xAxes: [{
                        stacked: true,
                        ticks: {
                        callback: function(value) {
                            return value.substring(5, value.length);
                        },
                        },
                        gridLines: {
                        display: false
                        },
                    }],
                    yAxes: [{
                        stacked: true,
                        ticks: {
                        callback: function(value) {
                            return numberWithCommas(value);
                        },
                        },
                    }],
                    }, // scales
                    legend: {
                    display: true
                    }
                } // options
                });



                var bar_chart_2 = new Chart(bar_ctx_2, {
                type: 'bar',
                data: {
                    labels: dates,
                    datasets: [{
                    label: 'Bowser',
                    data: dataPack1,
                    backgroundColor: "green",
                    hoverBackgroundColor: "green",
                    hoverBorderWidth: 2,
                    hoverBorderColor: 'lightgrey'
                    }, {
                    label: 'Mario',
                    data: dataPack2,
                    backgroundColor: "darkgreen",
                    hoverBackgroundColor: "darkgreen",
                    hoverBorderWidth: 2,
                    hoverBorderColor: 'lightgrey'
                    }, ]
                },
                options: {
                    tooltips: {
                    mode: 'label',
                    callbacks: {
                        title: function(tooltipItems, data) {
                        return data.labels[tooltipItems.index] + ' ';
                        },
                        label: function(tooltipItem, data) {
                        return data.datasets[tooltipItem.datasetIndex].label + ": " + numberWithCommas(tooltipItem.yLabel);
                        },
                    }
                    },
                    scales: {
                    xAxes: [{
                        stacked: true,
                        ticks: {
                        callback: function(value) {
                            return value.substring(5, value.length);
                        },
                        },
                        gridLines: {
                        display: false
                        },
                    }],
                    yAxes: [{
                        stacked: true,
                        ticks: {
                        callback: function(value) {
                            return numberWithCommas(value);
                        },
                        },
                    }],
                    }, // scales
                    legend: {
                    display: true
                    }
                } // options
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

