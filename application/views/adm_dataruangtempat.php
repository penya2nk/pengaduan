<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin</title>

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
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0; background-color: #005580">
            <div class="navbar-header">

                <a class="navbar-brand" style="color: #ffffff" >SI PENGADUAN</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">

                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color: #ffffff">
                        <i class="fa fa-user fa-fw"></i> Isnaini barochatun</i>
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
                            <a href=<?php echo base_url('admin')?> ><i class="fa fa-archive"></i>&nbsp; Log Penanganan</a>
                        </li>
                        <li class="active">
                            <a href=<?php echo base_url('admin/data_lokasi')?> style="color: #000000"><i class="fa fa-home"></i><b>&nbsp; Data Lokasi</b></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-users"></i>&nbsp; Data Pengguna<span class="fa arrow"></span></a>
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
                    <h1 class="page-header">Data Ruang dan Tempat</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row data ruang -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <strong>RUANG</strong>
                            <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#ruang" style="margin-left: 70%"><i class="fa fa-plus"></i> tambah</button>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" style="overflow-y: scroll;">
                                    <thead>
                                        <tr>
                                            <th style="width: 20px">No</th>
                                            <th>Nama Ruang</th>
                                            <th style="width: 50px">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($ruang as $data) 
                                        {
                                            ?>
                                            <tr>
                                                <td><?php echo $data->id_ruang ?></td>
                                                <td><?php echo $data->nama_ruang ?></td>
                                                <td>
                                                    <span><i class="fa fa-edit" style="color: blue" data-toggle="modal" data-target="#editRuang<?php echo $data->id_ruang; ?>"></i></span>&nbsp;
                                                    <a href="<?php echo base_url('admin/hapus_ruang/'.$data->id_ruang) ?>"><i class="fa fa-trash-o" style="color: red"></i></a>
                                                </td>
                                            </tr>

                                            <!-- modal edit -->
                                            <div>
                                                <div class="modal modal-primary fade" id="editRuang<?php echo $data->id_ruang; ?>" style="margin-top: 5%">
                                                  <div class="modal-dialog">
                                                    <div class="modal-content">
                                                      <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                          <span aria-hidden="true">&times;</span></button>
                                                          <h4 class="modal-title">EDIT RUANG</h4>
                                                      </div>

                                                      <form method="POST" action="<?php echo base_url('admin/edit_ruang') ?>">
                                                          <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-12">

                                                                    <div class="form-group">
                                                                        <label>Edit ruang</label>
                                                                        <input class="form-control" type="text" name="nama_ruang" value="<?php echo $data->nama_ruang ?>">
                                                                        <input class="form-control" type="hidden" name="id_ruang" value="<?php echo $data->id_ruang ?>">
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Batal</button>
                                                            <input type="submit" class="btn btn-primary" value="simpan">
                                                        </div>
                                                    </form>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                        </div>

                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-6 -->
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <strong>TEMPAT</strong>
                        <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#tempat" style="margin-left: 70%"><i class="fa fa-plus"></i> tambah</button>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th style="width: 20px">No</th>
                                        <th>Nama Tempat</th>
                                        <th style="width: 50px">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($tempat as $data) 
                                    {
                                        ?>
                                        <tr>
                                            <td><?php echo $data->id_tempat ?></td>
                                            <td><?php echo $data->nama_tempat ?></td>
                                            <td>
                                                <span><i class="fa fa-edit" style="color: blue" data-toggle="modal" data-target="#editTempat<?php echo $data->id_tempat; ?>"></i></span>&nbsp;
                                                <a href="<?php echo base_url('admin/hapus_tempat/'.$data->id_tempat) ?>"><i class="fa fa-trash-o" style="color: red"></i></a>
                                            </td>
                                        </tr>

                                        <!-- modal edit -->
                                            <div>
                                                <div class="modal modal-primary fade" id="editTempat<?php echo $data->id_tempat; ?>" style="margin-top: 5%">
                                                  <div class="modal-dialog">
                                                    <div class="modal-content">
                                                      <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                          <span aria-hidden="true">&times;</span></button>
                                                          <h4 class="modal-title">EDIT TEMPAT</h4>
                                                      </div>

                                                      <form method="POST" action="<?php echo base_url('admin/edit_tempat') ?>">
                                                          <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-12">

                                                                    <div class="form-group">
                                                                        <label>Edit Tempat</label>
                                                                        <input class="form-control" type="text" name="nama_tempat" value="<?php echo $data->nama_tempat ?>">
                                                                        <input class="form-control" type="hidden" name="id_tempat" value="<?php echo $data->id_tempat ?>">
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Batal</button>
                                                            <input type="submit" class="btn btn-primary" value="simpan">
                                                        </div>
                                                    </form>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-6 -->
        </div>
    </div>
    <!-- /#page-wrapper -->

    <!-- modal tambah ruang -->
    <div>
        <div class="modal modal-primary fade" id="ruang" style="margin-top: 5%">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">TAMBAH RUANG</h4>
              </div>

              <form method="POST" action="<?php echo base_url('admin/tambah_ruang') ?>">
                  <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-info alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <b>Perhatian!</b> Jika Anda ingin menambahkan ruang di tempat baru, Anda harus menambahkan tempat baru terlebih dahulu. Terimakasih.</a>.
                            </div>

                            <div class="form-group">
                                <label>Pilih Tempat untuk ruang baru:</label>
                                <select class="form-control" name="id_tempat">
                                    <option value="0">-------------------------------- pilih tempat ----------------------------------</option>
                                    <?php
                                    foreach ($tempat as $data) 
                                    {
                                        ?>
                                        <option value="<?php echo $data->id_tempat ?>"><?php echo $data->nama_tempat ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Tambah ruang</label>
                                <input class="form-control" type="text" name="nama_ruang">

                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Batal</button>
                    <input type="submit" class="btn btn-primary" value="simpan">
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
</div>

<!-- modal tambah ruang -->
<div>
    <div class="modal modal-primary fade" id="tempat" style="margin-top: 5%">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">TAMBAH TEMPAT</h4>
          </div>

          <form method="POST" action="<?php echo base_url('admin/tambah_tempat') ?>">
              <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">

                        <div class="form-group">
                            <label>Tambah tempat</label>
                            <input class="form-control" type="text" name="nama_tempat">
                        </div>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Batal</button>
                <input type="submit" class="btn btn-primary" value="simpan">
            </div>
        </form>
    </div>
    <!-- /.modal-content -->
</div>
</div>






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

      <form method="POST" action="<?php echo base_url('#') ?>">
          <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    KONTEN MODAL
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

</body>

</html>
