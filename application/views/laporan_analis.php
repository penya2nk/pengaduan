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

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="background-color: #005580">
            <div class="navbar-header">
                <a class="navbar-brand" style="color: #ffffff" >SI PENGADUAN</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">

                <!-- /.dropdown 
                <li class="dropdown">
                    <a style="color: #ffffff" href=<?php //echo base_url("login")?> ><i class="fa fa-fw fa-sign-out"></i>Isnaini Barochatun</a>
                </li> -->
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
                    <!-- <div class="pull-center image">
                        <img src='<?php //echo base_url("img/user2.png")?>' class="img-circle" alt="User Image"  style="margin-left: 24%; margin-right: 24%; margin-top: 10%; width:50%">
                    </div> -->
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
                <h1 class="page-header">Dashboard</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>

        <!-- /.row -->
        <div class="row">
            
            
        </div>

        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Rekap Pengaduan
                        <div class="pull-right">
                        </div>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="example1">
                            <thead>
                                <tr>
                                    <th>Bulan</th>
                                    <!-- <th>Kategori</th>
                                    <th style="width: 40%">Ruang</th> -->
                                    <th>Jumlah Pengaduan</th>
                                </tr>
                            </thead>
                                <tbody>
                                    <?php 
                                        foreach ($bulan as $data)
                                        {
                                    ?>
                                    <tr>
                                        <td><?php echo date("F", strtotime($data->bulan)) ?></td>
                                        <!-- <td><?php// echo $data->kategori ?></td>
                                        <td><?php //echo $data->nama_ruang ?></td> -->
                                        <td><?php echo $data->jumlah ?></td>
                                    </tr>
                                    <?php
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
                                    <th>Ruang</th>
                                    <!-- <th>Kategori</th>
                                    <th style="width: 40%">Ruang</th> -->
                                    <th>Jumlah Pengaduan</th>
                                </tr>
                            </thead>
                                <tbody>
                                    <?php 
                                        foreach ($ruang as $data)
                                        {
                                    ?>
                                    <tr>
                                        <td><?php echo $data->nama_ruang ?></td>
                                        <!-- <td><?php// echo $data->kategori ?></td>
                                        <td><?php //echo $data->nama_ruang ?></td> -->
                                        <td><?php echo $data->jumlah ?></td>
                                    </tr>
                                    <?php
                                        }
                                    ?>
                                </tbody>
                        </table>
                    </div>
                    <!-- /.panel-body -->
                </div>
            </div>

        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-bar-chart-o fa-fw"></i> Area Chart Example
                        <div class="pull-right">
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
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
                                </ul>
                            </div>
                        </div>
                    </div>


                    <!-- /.panel-heading -->
                    <div class="panel-body">

                        <div id="morris-area-chart2">

                        </div>
                    </div>
                    <!-- /.panel-body -->
                </div>

                <!-- /.panel -->
                
                <!-- /.panel -->
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

    Morris.Area({
        element: 'morris-area-chart2',

        data: [
        <?php foreach ($pengaduan as $data) 
        {
        ?>
        {
            bulan: '<?php echo $data->tahun ?> <?php echo $data->kategori ?>',
            jumlah: <?php echo $data->jumlah ?>
        },
        <?php
        }
        ?> 
        ],
        xkey: 'bulan',
        ykeys: ['jumlah'],
        labels: ['Jumlah'],
        pointSize: 1,
        hideHover: 'auto',
        resize: true
    });

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
        console.log("--> "+row.label, series, type);
        if(row.label == "sarpras") return "#AD1D28";
        else if(row.label == "dosen") return "#DEBB27";
        else if(row.label == "mata kuliah") return "#fec04c";
        else if(row.label == "layanan informasi") return "#1AB244";
        else if(row.label == "lingkungan") return "#3385ff";
        }
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

</body>

</html>
