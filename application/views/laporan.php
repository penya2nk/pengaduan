<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Laporan Data Pengaduan</title>

    <link href=<?php echo base_url("assets/vendor/bootstrap/css/bootstrap.min.css")?> rel="stylesheet">
    <link href=<?php echo base_url("assets/vendor/metisMenu/metisMenu.min.css")?> rel="stylesheet">
    <link href=<?php echo base_url("assets/dist/css/sb-admin-2.css")?> rel="stylesheet">
    <link href=<?php echo base_url("assets/vendor/font-awesome/css/font-awesome.min.css")?> rel="stylesheet" type="text/css">

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
                    <a style="color: #ffffff" href="index.html"><i class="fa fa-fw fa-sign-out"></i>Logout</a>
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

                        <li class="nav-item">
                          <a class="nav-link" href=<?php echo base_url('admin')?> style="color: #000000">
                            <i class="fa fa-fw fa-home"></i>
                            <span class="nav-link-text" >Dashboard</span>
                          </a>
                        </li>
                        <!--
                        <li>
                            <a href=<?php //echo base_url('admin/laporan')?> style="color: #000000" class="a"><i class="fa fa-area-chart"></i> Laporan</a>
                        </li>
                        <li>
                            <a href=<?php //echo base_url('admin/data_user')?> style="color: #000000" class="a"><i class="fa fa-users"></i> Data User</a>
                        </li>
-->
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
                    <h1 class="page-header">Laporan Data Pengaduan</h1>
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
                                
                                <div class="card mb-3">
                                    <div class="card-header">
                                      <i class="fa fa-area-chart"></i> Area Chart Example</div>
                                    <div class="card-body">
                                      <canvas id="myAreaChart" width="100%" height="30"></canvas>
                                    </div>
                                    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                                  </div>
                                  <div class="row">
                                    <div class="col-lg-8">
                                      <!-- Example Bar Chart Card-->
                                      <div class="card mb-3">
                                        <div class="card-header">
                                          <i class="fa fa-bar-chart"></i> Bar Chart Example</div>
                                        <div class="card-body">
                                          <canvas id="myBarChart" width="100" height="50"></canvas>
                                        </div>
                                        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                                      </div>
                                    </div>
                                    <div class="col-lg-4">
                                      <!-- Example Pie Chart Card-->
                                      <div class="card mb-3">
                                        <div class="card-header">
                                          <i class="fa fa-pie-chart"></i> Pie Chart Example</div>
                                        <div class="card-body">
                                          <canvas id="myPieChart" width="100%" height="100"></canvas>
                                        </div>
                                        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                
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

    <!-- jQuery -->
    <script src=<?php echo base_url("assets/vendor/jquery/jquery.min.js")?>  ></script>
    <script src=<?php echo base_url("assets/vendor/bootstrap/js/bootstrap.bundle.min.js")?> ></script>
    <script src=<?php echo base_url("assets/vendor/jquery-easing/jquery.easing.min.js")?> ></script>
    <script src=<?php echo base_url("assets/vendor/chart.js/Chart.min.js")?> ></script>
    <script src=<?php echo base_url("assets/js/sb-admin.min.js")?> ></script>
    <script src=<?php echo base_url("assets/js/sb-admin-charts.min.js")?> ></script>
  </div>

</body>

</html>
