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

            <div class="navbar-default sidebar" role="navigation"> <!--style="margin-top: 15%;"-->
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">

                        <li class="sidebar-search" >
                            <!-- <div class="input-group custom-search-form" style="margin-left: 20%">
                                <p>Isnaini Barochatun</p>
                            </div> -->
                            <div class="input-group custom-search-form" >
                                <b>Menu Sistem</b>
                            </div>
                            <!--  input-group -->
                        </li>
                        
                        <li>
                            <a href=<?php echo base_url('analis')?>><i class="fa fa-envelope"></i>&nbsp; Pengaduan Masuk</a>
                        </li>
                        <li class="active">
                            <a href=<?php echo base_url('analis/riwayat_pengaduan')?> style="color: #000000"><i class="fa fa-table"></i><b>&nbsp; Riwayat Pengaduan</b></a>
                        </li>
                        <li>
                            <a href=<?php echo base_url('analis/kelola')?>><i class="fa fa-gears"></i>&nbsp; Kategori dan Jenis</a>
                        </li>
                        <li>
                            <a href=<?php echo base_url('analis/laporan')?>><i class="fa fa-dashboard"></i>&nbsp; Laporan Pengaduan</a>
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
                    <h1 class="page-header">Riwayat Pengaduan</h1>
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
                                            <th>No</th>
                                            <th>Kategori</th>
                                            <th>Tempat</th>
                                            <th>Jam kelola</th>
                                            <th>Tanggal kelola</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $this->load->model('Manalis_riwayatpeng');
                                        $i = 1;
                                            foreach ($proses as $data)
                                            {
                                                
                                        ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $data->kategori ?></td>
                                            <td><?php echo $data->nama_ruang ?></td>
                                            <td><?php echo date('H:i:s', strtotime($data->timestamp)) ?></td>
                                            <td><?php echo date('d-F-Y', strtotime($data->timestamp)) ?></td>
                                            <td>
                                            <?php
                                                if($data->status == "diproses"){
                                            ?>
                                                <span class="badge warning"><?php echo $data->status ?></span>
                                            <?php }else{ ?>
                                                <span class="badge success">Selesai</span>
                                            <?php }?>
                                            </td>
                                        </tr>
                                        <?php
                                            $i++;
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
                  <h4 class="modal-title">UBAH PASSWORD</h4>
              </div>

              <form method="POST" action="<?php echo base_url('analis/ubah_password') ?>">
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
    </script>

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
