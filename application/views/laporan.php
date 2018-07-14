<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Laporan</title>

    <link href=<?php echo base_url("assets/vendor/bootstrap/css/bootstrap.min.css")?> rel="stylesheet">
    <link href=<?php echo base_url("assets/vendor/metisMenu/metisMenu.min.css")?>  rel="stylesheet">
    <link href=<?php echo base_url("assets/vendor/datatables-plugins/dataTables.bootstrap.css")?>  rel="stylesheet">
    <link href=<?php echo base_url("assets/vendor/datatables-responsive/dataTables.responsive.css")?>  rel="stylesheet">
    <link href=<?php echo base_url("assets/dist/css/sb-admin-2.css")?> rel="stylesheet">
    <link href=<?php echo base_url("assets/vendor/morrisjs/morris.css")?> rel="stylesheet">
    <link href=<?php echo base_url("assets/vendor/font-awesome/css/font-awesome.min.css")?>  rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href=<?php echo base_url("assets/badge.css")?> >
    <script src=<?php echo base_url("assets/chartjs/Chart.bundle.min.js")?> ></script>

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="background-color: #204060">
            <div class="navbar-header">

                <a class="navbar-brand" style="color: #ffffff" >SI PENGADUAN</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">

                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color: #ffffff">
                        <i class="fa fa-user fa-fw"></i> <?php echo $this->session->userdata('nama_pengguna') ?></i>
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
                            <!-- <div class="input-group custom-search-form" style="margin-left: 20%">
                                <p>Isnaini Barochatun</p>
                            </div> -->
                            <div class="input-group custom-search-form">
                                <b>Menu Sistem</b>
                            </div>
                            <!-- /input-group -->
                        </li>

                    <!-- menu -->
                    <li>
                        <a href=<?php echo base_url('manajemen/laporan')?> ><i class="fa fa-dashboard"></i>&nbsp; Dashboard</a>
                    </li>
                    <li>
                        <a href=<?php echo base_url('manajemen/rekap')?> ><i class="fa fa-table"></i>&nbsp; Rekap Data</a>
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
                <h1 class="page-header">Dashboard</h1>
                <?php
                // var_dump($pengaduan);
                             foreach ($pengaduan as $data) {
                                //echo $data->tahun.' '.$data->kategori.' : '.$data->jumlah.'<br>';
                                // echo "dhsjsjs";
                                $kategori[] = $data->kategori;
                                $jumlah[] = (float) $data->jumlah;
                             }
                            ?>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-inbox fa-5x"></i>
                            </div>
                            <div class="col-xs-7 text-right">
                                <div class="huge" style="font-size: 55px">
                                    <?php
                                    echo sizeof($masuk);
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="#">
                        <div class="panel-footer">
                            <span class="pull-left">Pengaduan Masuk</span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-yellow">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-gear fa-5x"></i>
                            </div>
                            <div class="col-xs-7 text-right">
                                <div class="huge">
                                    <div class="huge" style="font-size: 55px">
                                    <?php
                                    echo sizeof($diproses);
                                    ?>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="#">
                        <div class="panel-footer">
                            <span class="pull-left">Pengaduan diproses</span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-green">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-check fa-5x"></i>
                            </div>
                            <div class="col-xs-7 text-right">
                                <div class="huge" style="font-size: 55px">
                                    <?php
                                    echo sizeof($selesai);
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="#">
                        <div class="panel-footer">
                            <span class="pull-left">Selesai ditangani</span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            
        </div>
        <!-- /.row -->
        <div class="row">

            <div class="col-lg-12">

                <!-- /.panel -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-bar-chart-o fa-fw"></i> Grafik Pengaduan Berdasarkan Kategori
                        <div class="pull-right">
                            <div class="btn-group">
                                <!-- <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                    Actions
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu pull-right" role="menu">
                                    <li><a href="#">Action</a>
                                    </li>
                                    <li><a href="#">Another action</a>
                                    </li>
                                    <li><a href="#">Something else here</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li><a href="#">Separated link</a>
                                    </li>
                                </ul> -->
                            </div>
                        </div>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="row">
                            
                            <!-- /.col-lg-4 (nested) -->
                            <div class="col-lg-10">
                                <div id="morris-bar-chart"></div>
                            </div>
                            <!-- /.col-lg-8 (nested) -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->

                <!-- punyanya bulan -->
                <div class="col-lg-12" style="width: 100%">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Grafik jumlah pengaduan berdasarkan ruang
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
                  <!-- </div>
                </div> -->



                    <!-- /.panel-heading -->
                    <!-- <div class="panel-body">

                        <div id="morris-area-chart2">

                        </div>
                    </div> -->
                    <!-- /.panel-body -->
                </div>
                
            </div>
            
        </div>
        <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<script src=<?php echo base_url("assets/vendor/jquery/jquery.min.js")?> ></script>
<script src=<?php echo base_url("assets/vendor/bootstrap/js/bootstrap.min.js")?> ></script>
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

<script type="text/javascript">
    $(function() {

    // Morris.Area({
    //     element: 'morris-area-chart2',

    //     data: [
    //     <?php //foreach ($pengaduan as $data) 
    //     {
    //     ?>
    //     {
    //         bulan: '<?php// echo $data->tahun ?> <?php// echo $data->kategori ?>',
    //         jumlah: <?php// echo $data->jumlah ?>
    //     },
    //     <?php
    //     }
    //     ?> 
    //     ],
    //     xkey: 'bulan',
    //     ykeys: ['jumlah'],
    //     labels: ['Jumlah'],
    //     pointSize: 1,
    //     hideHover: 'auto',
    //     resize: true
    // });

    Morris.Bar({
        element: 'morris-bar-chart',
        data: [
        <?php
            foreach ($pengaduan as $data) 
            {
        ?>
        {
            y: '<?php echo $data->kategori ?>',
            a: <?php echo $data->jumlah ?>,
        },
        <?php
            }
        ?>
        ],
        xkey: 'y',
        ykeys: ['a'],
        labels: ['Jumlah'],
        hideHover: 'auto',
        resize: true,
        barColors: function (row, series, type) {
        return "#3385ff";
        }
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

</body>

</html>
