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
    <script src=<?php echo base_url("assets/vendor/jquery/jquery.min.js")?> ></script>
    <script src=<?php echo base_url("assets/vendor/bootstrap/js/bootstrap.min.js")?> ></script>
</head>

<style type="text/css">
    @media print
{    
    .btn-print, .btn-print *
    {
        display: none !important;
    }
}
</style>
<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="background-color: #204060; margin-bottom: 0">
            <div class="navbar-header">
                <a class="navbar-brand" style="color: #ffffff" >SI PENGADUAN</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color: #ffffff">
                        <i class="fa fa-user fa-fw"></i> <?php echo $this->session->userdata('nama_pengguna'); ?></i>
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

                    <li>
                        <a href=<?php echo base_url('manajemen')?> ><i class="fa fa-dashboard"></i>&nbsp; Dashboard</a>
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

                <center>
                      <?php if($this->session->flashdata('message')): ?>
                          <div style="margin-top: 10px; width: 50%" id="hilang" class="alert alert-<?php echo $this->session->flashdata('style') ?> alert-dismissable fade-in">
                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                              <strong><?php echo $this->session->flashdata('alert') ?></strong>&nbsp;<br>
                              <?php echo $this->session->flashdata('message') ?>
                        </div>
                    <?php endif; ?>
                    </center>

                <h1 class="page-header" style="margin-bottom:">Laporan Pengaduan</h1>
            </div>
            <!-- /.col-lg-12 -->
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
                                <th style="text-align: center;">No.</th>
                                <th style="text-align: center;">Bulan</th>
                                <th style="text-align: center;">Jumlah Pengaduan</th>
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
                    Rekap Pengaduan Berdasarkan Kategori
                    <div class="pull-right">
                    </div>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="example2">
                        <thead>
                            <tr>
                                <th style="text-align: center;">No.</th>
                                <th style="text-align: center;">Kategori</th>
                                <th style="text-align: center;">Jumlah pengaduan</th>
                            </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $x = 1;
                                    foreach ($kategori as $data)
                                    {
                                        ?>
                                        <tr>
                                            <td><?php echo $x; ?></td>
                                            <td><?php echo $data->kategori ?></td>
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

                <!-- modal setting -->
        <div class="modal modal-primary fade" id="settingModal" style="margin-top: 5%">
            <div class="modal-dialog">
                <div class="modal-content" style="width: 75%; margin-left: 15%">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        <center>
                        <h4 class="modal-title">GANTI PASSWORD</h4>
                        </center>
                    </div>
                    
                    <form method="POST" action="<?php echo base_url('analis/ubah_password_l') ?>">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">

                                    <div class="form-group row">
                                      <label class="col-sm-4 col-form-label">Password lama :</label>
                                      <div class="col-sm-8">
                                        <input type="password" class="form-control" name="old" required>
                                      </div>
                                    </div>
                                    <div class="form-group row">
                                      <label class="col-sm-4 col-form-label">Password baru :</label>
                                      <div class="col-sm-8">
                                        <input type="password" class="form-control" name="new" required>
                                      </div>
                                    </div>
                                    <div class="form-group row">
                                      <label class="col-sm-4 col-form-label">Konfirmasi :</label>
                                      <div class="col-sm-8">
                                        <input type="password" class="form-control" name="re_new" required>
                                      </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-warning pull-left" data-dismiss="modal">Batal</button>
                            <input type="submit" class="btn btn-primary" value="Simpan">
                        </div>
                    </form>
                </div>
            </div>
        </div>
<!-- modal setting -->


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

        <script type="text/javascript">
            $("#hilang").show().delay(2000).slideUp(400);
        </script>

        <script>
          $(function () {
            $('#example1').DataTable({
            //$('#example2').DataTable({
            'paging'      : false,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : false,
            'autoWidth'   : false
 })
        })
    </script>

    <script>
      $(function () {
        $('#example2').DataTable({
    //$('#example2').DataTable({
        'paging'      : false,
        'lengthChange': false,
        'searching'   : false,
        'ordering'    : true,
        'info'        : false,
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
