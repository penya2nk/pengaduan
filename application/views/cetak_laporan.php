<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Analis</title>

    <link href=<?php echo base_url("assets/vendor/bootstrap/css/bootstrap.min.css")?> rel="stylesheet">
    <link href=<?php echo base_url("assets/vendor/metisMenu/metisMenu.min.css")?>  rel="stylesheet">
    <link href=<?php echo base_url("assets/vendor/datatables-plugins/dataTables.bootstrap.css")?>  rel="stylesheet">
    <link href=<?php echo base_url("assets/vendor/datatables-responsive/dataTables.responsive.css")?>  rel="stylesheet">
    <link href=<?php echo base_url("assets/dist/css/sb-admin-2.css")?> rel="stylesheet">
    <link href=<?php echo base_url("assets/vendor/morrisjs/morris.css")?> rel="stylesheet">
    <link href=<?php echo base_url("assets/vendor/font-awesome/css/font-awesome.min.css")?>  rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href=<?php echo base_url("assets/badge.css")?> >
    <script src=<?php echo base_url("assets/vendor/jquery/jquery.min.js")?> ></script>
    <script src=<?php echo base_url("assets/vendor/bootstrap/js/bootstrap.min.js")?> ></script>
    <script src=<?php echo base_url("assets/chartjs/Chart.bundle.min.js")?> ></script>
    
</head>

<body onload="window.print()">
<div class="container" id="printsekarang" style="margin-top: 50px">

    <div class="row">
                    <div class="col-lg-12" style="width: 97%; margin-left: 18px">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <i class="fa fa-bar-chart-o fa-fw"></i> Area Chart Example
                                <div class="pull-right">
                                    <div class="btn-group">
                                        
                                    </div>
                                </div>
                            </div>


                            <!-- /.panel-heading -->
                            <div class="panel-body">

                                <div class="box box-info">
                                    <div class="box-body chart-responsive">
                                      <canvas id="myChart" width="300" height="100"></canvas>
                                  </div>
                                  <!-- /.box-body -->
                              </div>

                          </div>
                          <!-- /.panel-body -->
                      </div>
                      <!-- /.panel -->

                      <!-- /.panel -->
                  </div>

              </div>
              <!-- /.row -->

    <div class="col-lg-6">
        <div class="panel panel-default" style="border:0;">
            <div class="panel-heading" style="border:0; border-color: #ffffff;  background-color: #ffffff">
                Rekap Pengaduan Perbulan
                <div class="pull-right">
                </div>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="example1">
                    <thead>
                        <tr>
                            <th style="width: 20px">No.</th>
                            <th style="width: 50px">Bulan</th>
                            <th style="width: 30px">Jumlah Pengaduan</th>
                        </tr>
                    </thead>
                    <tbody>
                                    <?php 
                                    $i = 1;
                                    foreach ($bulan as $data)
                                    {
                                        ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo date("F", strtotime($data->bulan)) ?></td>
                                            <td><?php echo $data->jumlah ?></td>
                                        </tr>
                                        <?php
                                       $i++;
                                    }
                                    ?>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                </div>

    <div class="col-lg-6">
        <div class="panel panel-default" style="border:0;">
            <div class="panel-heading" style="border:0; border-color: #ffffff;  background-color: #ffffff">
                Rekap Pengaduan Ruangan
                <div class="pull-right">
                </div>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="example2">
                    <thead>
                        <tr>
                            <th style="width: 20px">No.</th>
                            <th style="width: 50px">Ruang</th>
                            <th style="width: 30px">Jumlah Pengaduan</th>
                        </tr>
                    </thead>
                    <tbody>
                                    <?php 
                                    $i = 1;
                                    foreach ($ruang as $data)
                                    {
                                        ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $data->nama_ruang ?></td>
                                            <td><?php echo $data->jumlah ?></td>
                                        </tr>
                                        <?php
                                        $i++;
                                    }
                                    ?>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                </div>

</div>

    <script src=<?php echo base_url("assets/vendor/metisMenu/metisMenu.min.js")?> ></script>
    <script src=<?php echo base_url("assets/vendor/datatables/js/jquery.dataTables.min.js")?> ></script>
    <script src=<?php echo base_url("assets/vendor/datatables-plugins/dataTables.bootstrap.min.js")?> ></script>
    <script src=<?php echo base_url("assets/vendor/datatables-responsive/dataTables.responsive.js")?> ></script>
    <script src=<?php echo base_url("assets/vendor/raphael/raphael.min.js")?> ></script>
    <script src=<?php echo base_url("assets/vendor/morrisjs/morris.min.js")?> ></script>
    <script src=<?php echo base_url("assets/data/morris-data.js")?> ></script>
    <script src=<?php echo base_url("assets/dist/js/sb-admin-2.js")?> ></script>

      <!-- Page-Level Demo Scripts - Tables - Use for reference -->
      <script>
        $(document).ready(function() {
            $('#dataTables-example').DataTable({
                responsive: false
            });
        });
    </script>

<script type="text/javascript">
var ctx = document.getElementById("myChart");
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        
        labels: [
        <?php for ($i=0; $i < count($ruang) ; $i++) 
        { 
            if (!empty($ruang[$i]->nama_ruang)) 
                {
                    echo '"'.$ruang[$i]->nama_ruang.'",';
                } 
            } 
        ?>
        ],
        datasets: [{
            label: '# nama ruang',
            data: [
            <?php for ($i=0; $i < count($ruang) ; $i++) 
            { 
                if (!empty($ruang[$i]->jumlah)) 
                    { 
                        echo ''.$ruang[$i]->jumlah.',';
                    }
                } 
            ?>
            ],
            backgroundColor: [
                'rgba(54, 162, 235, 0)',
            ],
            borderColor: [
                'rgba(54, 162, 235, 2)',
            ],
            borderWidth: 0
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});   

</script>

<script type="text/javascript">
        function loadPrint() {
        //window.print();
            setTimeout(function () { window.print(); }, 6000);
    }
    </script>

</body>
</html>