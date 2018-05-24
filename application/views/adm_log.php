<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Data Pengaduan</title>

    <link href=<?php echo base_url("assets/vendor/bootstrap/css/bootstrap.min.css")?> rel="stylesheet">
    <link href=<?php echo base_url("assets/vendor/metisMenu/metisMenu.min.css")?>  rel="stylesheet">
    <link href=<?php echo base_url("assets/vendor/datatables-plugins/dataTables.bootstrap.css")?>  rel="stylesheet">
    <link href=<?php echo base_url("assets/vendor/datatables-responsive/dataTables.responsive.css")?>  rel="stylesheet">
    <link href=<?php echo base_url("assets/dist/css/sb-admin-2.css")?> rel="stylesheet">
    <link href=<?php echo base_url("assets/vendor/font-awesome/css/font-awesome.min.css")?>  rel="stylesheet" type="text/css">

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0; background-color: #005580">
            <div class="navbar-header">

                <a class="navbar-brand" style="color: #ffffff" >SI PENGADUAN</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">

                <!-- /.dropdown -->
                <li class="dropdown">
                    <a style="color: #ffffff" href=<?php echo base_url("login/index")?> ><i class="fa fa-fw fa-sign-out"></i>Logout</a>
                </li>
            </ul>
            <!-- /.navbar-top-links -->

            <!--- user panel -->
            <section class="sidebar">
                <div class="pull-center image">
                    <img src='<?php echo base_url("img/user2.png")?>' class="img-circle" alt="User Image"  style="margin-left: 24%; margin-right: 24%; margin-top: 10%; width: 50%">
                </div>
            </section>

            <!-- MENU -->
            <div class="navbar-default sidebar" role="navigation" style="margin-top: 15%;">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">

                        <li class="sidebar-search" >
                            <div class="input-group custom-search-form" style="margin-left: 20%">
                                <p>Isnaini Barochatun</p>
                            </div>
                            <!-- /input-group -->
                        </li>
                        
                        <li>
                            <a href=<?php echo base_url('admin')?>><i class="fa fa-home"></i>&nbsp; Data Pengaduan</a>
                        </li>
                        <li class="active">
                            <a href=<?php echo base_url('admin/log_penanganan')?> style="color: #000000"><i class="fa fa-archive"></i><b>&nbsp; Log Penanganan</b></a>
                        </li>
                        <li class="active">
                            <a href="#"><i class="fa fa-users"></i>&nbsp; Data User<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href=<?php echo base_url('admin/data_user')?>>Panels and Wells</a>
                                </li>
                            </ul>
                        </li>
                        
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
                    <h1 class="page-header">Data Pengaduan</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Basic Form Elements
                        </div>
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>ID Pengaduan</th>
                                        <th>Pengelola</th>
                                        <th>Level</th>
                                        <th>Status</th>
                                        <th>Waktu</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Isnaini Barochatun</td>
                                        <td>Analis</td>
                                        <td><a href="#"><span class="badge badge-success">diterima</span></a></td>
                                        <td>12:30:30 22/05/2018</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Muhammad Fakhurrifqi</td>
                                        <td>Koordinator</td>
                                        <td><a href="#"><span class="badge badge-warning">diproses</span></a></td>
                                        <td>15:35:35 25/05/2018</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Isnaini Barochatun</td>
                                        <td>Koordinator</td>
                                        <td><a href="#"><span class="badge badge-warning">selesai</span></a></td>
                                        <td>15:35:35 25/05/2018</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Isnaini Barochatun</td>
                                        <td>analis</td>
                                        <td><a href="#"><span class="badge badge-warning">diterima</span></a></td>
                                        <td>15:35:35 25/05/2018</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Isnaini Barochatun</td>
                                        <td>Koordinator</td>
                                        <td><a href="#"><span class="badge badge-warning">selesai</span></a></td>
                                        <td>15:35:35 25/05/2018</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Isnaini Barochatun</td>
                                        <td>analis</td>
                                        <td><a href="#"><span class="badge badge-warning">diterima</span></a></td>
                                        <td>15:35:35 25/05/2018</td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
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
    <script src=<?php echo base_url("assets/dist/js/sb-admin-2.js")?> ></script>

    <script>
        $(document).ready(function() {
            $('#dataTables-example').DataTable({
                responsive: true
            });
        });
    </script>

</body>

</html>
