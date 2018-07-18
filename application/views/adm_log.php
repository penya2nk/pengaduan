<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin</title>

    <link href=<?php echo base_url("assets/vendor/bootstrap/css/bootstrap.css")?> rel="stylesheet">
    <link href=<?php echo base_url("assets/vendor/metisMenu/metisMenu.min.css")?>  rel="stylesheet">
    <link href=<?php echo base_url("assets/vendor/datatables-plugins/dataTables.bootstrap.css")?>  rel="stylesheet">
    <link href=<?php echo base_url("assets/vendor/datatables-responsive/dataTables.responsive.css")?>  rel="stylesheet">
    <link href=<?php echo base_url("assets/dist/css/sb-admin-2.css")?> rel="stylesheet">
    <link href=<?php echo base_url("assets/vendor/font-awesome/css/font-awesome.min.css")?>  rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href=<?php echo base_url("assets/badge.css")?> >

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0; background-color: #204060">
            <div class="navbar-header">

                <a class="navbar-brand" style="color: #ffffff" >SI PENGADUAN</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">

                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color: #ffffff">
                        <i class="fa fa-user fa-fw"></i> <?php echo $this->session->userdata('nama_pengguna'); ?></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a data-toggle="modal" data-target="#settingModal"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li><a href="<?php echo base_url('logout_karyawan')?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
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
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">

                        <li class="sidebar-search" >
                            <div class="input-group custom-search-form" >
                                <b>Menu Sistem</b>
                            </div>
                            <!-- /input-group -->
                        </li>
                        
                        <li class="active">
                            <a href=<?php echo base_url('admin')?> style="color: #000000"><i class="fa fa-archive"></i><b>&nbsp; Log Penanganan</b></a>
                        </li>
                        <li>
                            <a href=<?php echo base_url('admin/data_lokasi')?>><i class="fa fa-home"></i>&nbsp; Data Lokasi</a>
                        </li>
                        <li>
                            <a href=<?php echo base_url('admin/data_user')?> ><i class="fa fa-users"></i>&nbsp; Data Pengguna</a>
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
                    <h1 class="page-header">Log Penanganan</h1>
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
                            <table width="100%" class="table table-striped table-bordered table-hover" id="example2">
                                <thead>
                                    <tr>
                                        <th style="text-align: center; width: 100px">ID Pengaduan</th>
                                        <th style="text-align: center;">Ruang</th>
                                        <th style="text-align: center;">Status</th>
                                        <th style="text-align: center;">Waktu</th>
                                        <th style="text-align: center; width: 50px">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    foreach ($log_activity as $data)
                                    {
                                        ?>
                                        <tr>
                                            <td style="text-align: center;"><?php echo $data->id_pengaduan ?></td>
                                            <td><?php echo $data->nama_ruang ?></td>
                                            <td style="text-align: center;">
                                                <?php
                                                if ($data->status == 'masuk') {
                                                    ?>
                                                    <span class="badge badge primary"><?php echo $data->status ?></span>
                                                    <?php
                                                }elseif($data->status == 'diproses'){
                                                    ?>
                                                    <span class="badge badge warning"><?php echo $data->status ?></span>
                                                    <?php
                                                }else{
                                                    ?>
                                                    <span class="badge badge success"><?php echo $data->status ?></span>
                                                    <?php
                                                }
                                                ?>
                                            </td>
                                            <!-- <td><?php //echo date('H:i:s', strtotime($data->timestamp)) ?></td>
                                                <td><?php //echo date('d-F-Y', strtotime($data->timestamp)) ?></td> -->
                                                <td><?= $data->timestamp ?></td>
                                                <td>
                                                    <i class="btn btn-primary fa fa-eye" data-toggle="modal" data-target="#detail<?php echo $data->id_pengaduan ?>">&nbsp;Detail</i>
                                                </td>


                                            </tr>
                                            <!-- modal edit user -->
                                            <div class="modal modal-primary fade" id="detail<?php echo $data->id_pengaduan ?>" style="margin-top: 5%;">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content" style="width:110%;">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span></button>
                                                                <h4 class="modal-title">DETAIL LOG PENGADUAN</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row text-center">

                                                                    <div class="col-md-1">
                                                                        <label>No.</label>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <label>Tanggal</label>
                                                                    </div>
                                                                    <div class="col-md-1">
                                                                        <label>Jam</label>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <label>Bagian</label>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <label>Nama</label>
                                                                    </div>
                                                                    <div class="col-md-1">
                                                                        <label>Status</label>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <label>Laporan</label>
                                                                    </div>
                                                                </div>
                                                                <?php 
                                                                $this->load->model('Madm_log');
                                                                $log_activity = $this->Madm_log->detail_log($data->id_pengaduan);
                                                                $j = 1;
                                                                foreach ($log_activity as $log) { 
                                                                    ?> 
                                                                    <div class="row text-center">
                                                                        <div class="col-md-1">
                                                                            <p><?php echo $j ?></p>
                                                                        </div>
                                                                        <div class="col-md-2">
                                                                            <p><?php echo date("d F Y", strtotime($log->timestamp)) ?></p>
                                                                        </div>
                                                                        <div class="col-md-1">
                                                                            <p><?php echo date("H:i:s", strtotime($log->timestamp)) ?></p>
                                                                        </div>
                                                                        <div class="col-md-2">
                                                                            <p><?= $log->nama_level." ".$log->posisi; ?>
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-md-2">
                                                                            <p><?php echo $log->nama_pengguna ?></p>
                                                                        </div>
                                                                        <div class="col-md-1">
                                                                            <p>
                                                                                <?php
                                                                                if($log->status == 'masuk') {
                                                                                    ?>
                                                                                    <span class="badge primary"><?php echo $log->status ?></span><br>
                                                                                    <?php }elseif($log->status == 'diproses'){
                                                                                        ?>
                                                                                        <span class="badge warning"><?php echo $log->status ?></span><br>
                                                                                        <?php }else{ ?>
                                                                                        <span class="badge success"><?php echo $log->status ?></span><br>
                                                                                        <?php } ?>
                                                                                    </p>
                                                                                </div>
                                                                        <div class="col-md-3">
                                                                            <p><?php echo $log->keterangan ?></p>
                                                                        </div>
                                                                            </div>
                                                                            <?php $j++;} ?>
                                                                        </div>

                                                                        <div class="modal-footer">
                                                                            <button style="margin-left: 45%" type="button" class="btn btn-warning pull-left" data-dismiss="modal">selesai
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- modal edit user -->
                                                            <?php
                                                        }
                                                        ?>
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
                    
                                <form method="POST" action="<?php echo base_url('admin/ubah_password') ?>">
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

                    <script src=<?php echo base_url("assets/vendor/jquery/jquery.min.js")?> ></script>
                    <script src=<?php echo base_url("assets/vendor/bootstrap/js/bootstrap.min.js")?> ></script>
                    <script src=<?php echo base_url("assets/vendor/metisMenu/metisMenu.min.js")?> ></script>
                    <script src=<?php echo base_url("assets/vendor/datatables/js/jquery.dataTables.min.js")?> ></script>
                    <script src=<?php echo base_url("assets/vendor/datatables-plugins/dataTables.bootstrap.min.js")?> ></script>
                    <script src=<?php echo base_url("assets/vendor/datatables-responsive/dataTables.responsive.js")?> ></script>
                    <script src=<?php echo base_url("assets/dist/js/sb-admin-2.js")?> ></script>

                    <script type="text/javascript">
                        $(function () {
                            $('#example1').DataTable()
                            $('#example2').DataTable({
                              'paging'      : true,
                              'lengthChange': false,
                              'ordering'    : false,
                              'info'        : true,
                              'autoWidth'   : false
                          })
                        })
                    </script>
                </body>

                </html>
