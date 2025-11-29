  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Report Selling Out - ASM</h1> 
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
                <form action="<?= base_url; ?>/Report/Sellingout_ASM" method="post">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="input-group mb-3">

                                <?php

                                    if(isset($data))
                                    {
                                        $principal = $data['by_principal'];
                                        $year = $data['by_year'];
                                        $month = $data['by_month'];

                                    }else
                                    {
                                        $principal = "By Principal";
                                    }

                                ?>
                                    <div style="width : 175px;">
                                        <select class="mdb-select md-form form-control" title="By Area" name="by_principal" style="margin-left : 5px;">
                                            <option value="">By Principal</option>
                                                <?php $no=1; ?>
                                                <?php foreach ($data['principal'] as $row) :?>
                                                    <option <?php if( $principal==$row['principal']){echo "selected"; } ?> value="<?= $row['principal'];?>"><b><?= $row['principal'];?></b></option>
                                                <?php $no++; endforeach; ?>
                                        </select>
                                    </div>
                                    <div style="margin-left : 10px; width : 80px;">
                                        <input name="by_year" class="mdb-select md-form form-control" type="number" min="1900" max="2099" step="1" value="<?= $year ;?>" />
                                    </div>
                                    <div style="margin-left : 5px;width : 150px;">
                                        <select name="by_month" class="mdb-select2 md-form form-control" style="margin-left : 5px;">
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
                                    <div>
                                        <button class="btn btn-outline-primary" type="submit" style="margin-left : 10px;">Go!</button>
                                        <a class="btn btn-outline-secondary" href="<?= base_url; ?>/Report/Sellingout_ASM">Reset</a>
                                        <button class="btn float-right btn btn-outline-success" type="submit" style="margin-left : 20px;" formaction="<?= base_url; ?>/Report/export_sellingout_asm"><i class = "fa fa-download"> Excel</i></button>
                                    </div>
                            </div>

                            <!-- <div id="hasil_sale_out"></div> -->
                            <div class="table-responsive-sm text-small">
                                <table id="sale_in_asm" class="table table-bordered table-sm nowrap" align="left" style="font-size:85%; border: 1px solid black;table-layout:fixed;">
                                    <thead class="table-warning">
                                        <tr>
                                            <th rowspan="2" class="text-center" style="width: 5px; vertical-align: middle;">#</th>
                                            <th rowspan="2" class="text-center" style="vertical-align: middle;">ASM</th>
                                            <th rowspan="2" class="text-center" style="width: 200px; vertical-align: middle;">Distributor</th>
                                            <th rowspan="2" class="text-center" style="width: 60px; vertical-align: middle;">Area</th>
                                            <th colspan="3" class="text-center" style="vertical-align: middle;"><?= date('F', mktime(0, 0, 0, $month, 10));?></th>
                                        </tr>
                                        <tr>
                                            <th class="text-center" style="width: 75px">Actual</th>
                                            <th class="text-center" style="width: 75px">Target</th>
                                            <th class="text-center" style="width: 75px">%</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php

                                            $asm = '';
                                            $area = '';

                                            $actual = 0;
                                            $target = 0;
                                            $p = 0;

                                            $sub_actual = 0;
                                            $sub_target = 0;
                                            $sub_p = 0;

                                            $total_actual = 0;
                                            $total_target = 0;
                                            $total_p = 0;

                                            

                                        ?>

                                        <?php $no=1; ?>

                                        <?php foreach ($data['sellingout_asm'] as $row) :?>

                                            <?php

                                                if ($asm != $row['asm'] and $asm != '' )
                                                {

                                                    echo '<tr class="table-warning" style="font-weight:bold;">';
                                                        echo '<td></td>';
                                                        echo '<td>' . $asm . '</td>';
                                                        echo '<td></td>';
                                                        echo '<td></td>';
                                                        echo '<td class="text-right">' .number_format($sub_actual, 2). '</td>';
                                                        echo '<td class="text-right">' .number_format($sub_target, 2). '</td>';
                                                        echo '<td class="text-right">' .number_format($sub_p, 2). '</td>';    
                                                    echo '</tr>';
                                                    
                                                    $sub_actual = 0;
                                                    $sub_target = 0;
                                                    $sub_p = 0;

                                                    //$total_actual = 0;
                                                    //$total_target = 0;
                                                    //$total_p = 0;
                                                }

                                            ?>

                                        <tr>
                                            <td class="text-center"><?= $no; ?></td>
                                            <td><?= $row['asm'];?></td>
                                            <td><?= $row['distributor'];?></td>
                                            <td><?= $row['area'];?></td>
                                            <td class="text-right"><?= number_format($row['value'], 2);?></td>
                                            <td class="text-right"><?= number_format($row['value_target'], 2);?></td>
                                            <td class="text-right"><?= number_format($row['p'], 2);?></td>
                                        </tr>

                                        <?php $asm = $row['asm']; ?>
                                        
                                        <?php 
                                            
                                            $sub_actual += $row['value'];

                                            if($area != $row['area'])
                                            {
                                                $sub_target += $row['value_target'];
                                                $total_target += $row['value_target'];
                                            }

                                            $sub_p = ($sub_actual/($sub_target ?: 1))*100;
                                            $total_actual += $row['value'];
                                            $total_p = ($total_actual/($total_target ?: 1))*100;
                                            
                                        ?>

                                        <?php $area = $row['area']; ?>

                                        <?php $no++; endforeach; ?>

                                        <tr class="table-warning" style="font-weight:bold;">
                                            <td></td>
                                            <td><?= $asm;?></td>
                                            <td></td>
                                            <td></td>
                                            <td class="text-right"><?=number_format($sub_actual, 2);?></td>
                                            <td class="text-right"><?=number_format($sub_target, 2);?></td>
                                            <td class="text-right"><?=number_format($sub_p, 2);?></td>           
                                        </tr>
                                    
                                        <tr class="table-danger" style="font-weight:bold;">
                                            <td></td>
                                            <td></td>
                                            <td class="text-center">GRAND TOTAL</td>
                                            <td></td>
                                            <td class="text-right"><?=number_format($total_actual, 2);?></td>
                                            <td class="text-right"><?=number_format($total_target, 2);?></td>
                                            <td class="text-right"><?=number_format($total_p, 2);?></td>           
                                        </tr>
                                        
                                        
                                    </tbody>
                                </table>
                                
                                <div>
                                    <br>
                                </div>
                                

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
