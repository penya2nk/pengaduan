<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Koordinator</title>

    <link href=<?php echo base_url("assets/vendor/bootstrap/css/bootstrap.min.css")?> rel="stylesheet">
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
                        <i class="fa fa-user fa-fw"></i> <?php echo $this->session->userdata('nama_pengguna') ?></i>
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
                        
                        <li>
                            <a href=<?php echo base_url('koordinator')?> style="color: #000000"><i class="fa fa-envelope"></i><b>&nbsp; Pengaduan Masuk</b></a>
                        </li>
                        <li>
                            <a href=<?php echo base_url('koordinator/riwayat')?> ><i class="fa fa-table"></i> &nbsp;Riwayat Pengaduan</a>
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

                <center>
                  <?php if($this->session->flashdata('message')): ?>
                      <div style="margin-top: 10px;" id="hilang" class="alert alert-<?php echo $this->session->flashdata('style') ?> alert-dismissable fade-in">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <strong><?php echo $this->session->flashdata('alert') ?></strong>&nbsp;<br>
                          <?php echo $this->session->flashdata('message') ?>
                    </div>
                  <?php endif; ?>
                </center>

                <div class="col-lg-12">
                    <h1 class="page-header">Pengaduan Masuk Koordinator</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Data Pengaduan Masuk
                        </div>
                            <div class="panel-body">
                                <table width="100%" class="table table-striped table-hover" id="dataTables-example" class="text-center">
                                    <thead>
                                        <tr class="text-center">
                                            <th>Kategori</th>
                                            <th>Tempat</th>
                                            <th>Jam</th>
                                            <th>Tanggal</th>
                                            <th>Detail</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            
                                            foreach ($masuk as $data) {
                                                
                                        ?>
                                        <tr>
                                            <td><?php echo $data->kategori ?></td>
                                            <td><?php echo $data->nama_ruang ?></td>
                                            <td><?php echo date('H:i:s', strtotime($data->wkt_pengaduan)) ?></td>
                                            <td><?php echo date('d-F-Y', strtotime($data->wkt_pengaduan)) ?></td>
                                            <td>
                                                
                                                <a href="<?php echo base_url('koordinator/detail_pengaduan_koor/'.$data->id_pengaduan) ?>" class="btn btn-primary" style="margin-left: 10px"><span class="fa fa-eye"></span> Detail </a>
                                            </td>
                                        </tr>
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
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">RESET PASSWORD</h4>
                    </div>
                    
                    <form method="POST" action="<?php echo base_url('koordinator/ubah_password_masuk') ?>">
                        <div class="modal-body">
                            <div class="row">
                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Password lama :</label>
                                        <input type="password" name="old" class="form-control" placeholder="Password Lama" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Password baru :</label>
                                        <input type="password" name="new" class="form-control" placeholder="Password Baru" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Ulangi password baru :</label>
                                        <input type="password" name="re_new" class="form-control" placeholder="Ulangi Password Baru" required>
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

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });

    $("#hilang").show().delay(2000).slideUp(400);
    </script>

</body>

</html>
