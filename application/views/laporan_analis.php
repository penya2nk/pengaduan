
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.bundle.min.js" ></script>
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="background-color: #005580; margin-bottom: 0">
            <div class="navbar-header">
                <a class="navbar-brand" style="color: #ffffff" >SI PENGADUAN</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color: #ffffff">
                        <i class="fa fa-user fa-fw"></i> Isnaini barochatun</i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a data-toggle="modal" data-target="#settingModal"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li><a href="<?php echo base_url('logout_karyawan')?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </li>
                </ul>
                <!-- /.dropdown-user -->
            </li>

        </ul>
        <!-- /.navbar-top-links -->

        <!--- user panel -->
        <section class="sidebar">
                    
                </section>

                <!-- MENU -->
                <div class="navbar-default sidebar" role="navigation"> <!-- style="margin-top: 15%;" -->
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">

                            <li class="sidebar-search" >

                            <div class="input-group custom-search-form">
                                <b>Menu Sistem</b>
                            </div>
                            <!-- /input-group -->
                        </li>

                        <!-- menu -->

                        <li class="active">
                            <a href=<?php echo base_url('analis')?>><i class="fa fa-envelope"></i>&nbsp; Pengaduan Masuk</a>
                        </li>
                        <li>
                            <a href=<?php echo base_url('analis/riwayat_pengaduan')?> ><i class="fa fa-table"></i>&nbsp; Riwayat Pengaduan</a>
                        </li>
                        <li>
                            <a href=<?php echo base_url('analis/kelola')?>><i class="fa fa-gears"></i>&nbsp; Kategori dan Jenis</a>
                        </li>
                        <li>
                            <a href=<?php echo base_url('analis/laporan')?> style="color: #000000"><i class="fa fa-dashboard"></i><b>&nbsp; Rekap Data</b></a>
                        </li>
                        <!-- menu -->

                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" style="margin-bottom:">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <!-- /.row -->
            
            <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12" style="margin-bottom: 10px; margin-left: 90%">
                        <a class="btn btn-success" onclick="window.print(<?php echo base_url('analis/cetak') ?>);"><i class="fa fa-print"></i> cetak</a>
                    </div>

                    <div class="col-lg-12" style="width: 100%">
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

            <div class="row">

                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Rekap Pengaduan Perbulan
                            <div class="pull-right">
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="example1">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Bulan</th>
                                        <th>Jumlah Pengaduan</th>
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
                                </tbody>
                            </table>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                </div>


                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Rekap Pengaduan Berdasarkan Ruang
                            <div class="pull-right">
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="example2">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Ruang</th>
                                    <!-- <th>Kategori</th>
                                        <th style="width: 40%">Ruang</th> -->
                                        <th>Jumlah Pengaduan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $x = 1;
                                    foreach ($ruang as $data)
                                    {
                                        ?>
                                        <tr>
                                            <td><?php echo $x; ?></td>
                                            <td><?php echo $data->nama_ruang ?></td>
                                            <td><?php echo $data->jumlah ?></td>
                                        </tr>
                                       <?php
                                        $x++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                </div>

                
          </div>
          <!-- /#page-wrapper -->

      </div>
      <!-- /#wrapper -->

      
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
                responsive: true
            });
        });
    </script>

    <script>
      $(function () {
        $('#example1').DataTable({
    //$('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
     // 'searching'   : false,
     'ordering'    : true,
     'info'        : true,
     'autoWidth'   : false
 })
    })
</script>

<script>
  $(function () {
    $('#example2').DataTable({
    //$('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
     // 'searching'   : false,
     'ordering'    : true,
     'info'        : true,
     'autoWidth'   : false
 })
})
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
</body>

</html>
