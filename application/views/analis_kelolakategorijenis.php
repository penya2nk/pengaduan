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

            <!-- MENU -->
            <div class="navbar-default sidebar" role="navigation" >
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">

                        <li class="sidebar-search" >
                            <div class="input-group custom-search-form" >
                                <b>Menu Sistem</b>
                            </div>
                            <!-- /input-group -->
                        </li>
                        
                        
                        <li>
                            <a href=<?php echo base_url('analis')?>><i class="fa fa-envelope"></i>&nbsp; Pengaduan Masuk</a>
                        </li>
                        <li>
                            <a href=<?php echo base_url('analis/riwayat_pengaduan')?> ><i class="fa fa-table"></i>&nbsp; Riwayat Pengaduan</a>
                        </li>
                        <li class="active">
                            <a href=<?php echo base_url('analis/kelola')?> style="color: #000000"><i class="fa fa-gears"></i><b>&nbsp; Kategori dan Jenis</b></a>
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

                    <center>
                      <?php if($this->session->flashdata('message')): ?>
                          <div style="margin-top: 10px; width: 50%" id="hilang" class="alert alert-<?php echo $this->session->flashdata('style') ?> alert-dismissable fade-in">
                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                              <strong><?php echo $this->session->flashdata('alert') ?></strong>&nbsp;<br>
                              <?php echo $this->session->flashdata('message') ?>
                        </div>
                    <?php endif; ?>
                    

                    <?php if($this->session->flashdata('kategori_msg')): ?>
                        <div style="margin-top: 10px; width: 50%" id="hilang" class="alert alert-<?php echo $this->session->flashdata('style') ?> alert-dismissable fade-in">
                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                              <strong><?php echo $this->session->flashdata('alert') ?></strong>&nbsp;<br>
                              <?php echo $this->session->flashdata('kategori_msg') ?>
                        </div>
                      <?php elseif($this->session->flashdata('jenis_msg')): ?>
                        <div style="margin-top: 10px; width: 50%" id="hilang" class="alert alert-<?php echo $this->session->flashdata('style') ?> alert-dismissable fade-in">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <strong><?php echo $this->session->flashdata('alert') ?></strong>&nbsp;<br>
                          <?php echo $this->session->flashdata('jenis_msg') ?>
                        </div>
                      <?php endif; ?>
                    </center>


                    <h1 class="page-header">Kategori dan Jenis</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row data ruang -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        <strong>KATEGORI</strong>
                        <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#kategori" style="margin-left: 80%"><i class="fa fa-plus"></i> tambah</button>
                    </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- search -->
                            <div class="form-group" style="margin-bottom: 10px; width: 50%">
                              <div class="input-group">
                                
                              </div>
                            </div>
                            <!-- end search -->

                            <div class="table-responsive">
                                <table class="table table-bordered table-hover"" id="example1">
                                    <thead>
                                        <tr>
                                            <th style="width: 40px">No</th>
                                            <th>Nama Kategori</th>
                                            <th style="width: 50px">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        foreach ($kategori as $data) 
                                        {
                                            ?>
                                            <tr>
                                                <td style="text-align: center;"><?php echo $i; ?></td>
                                                <td><?php echo $data->kategori ?></td>
                                                <td style="text-align: center;">
                                                    <span><i class="fa fa-edit" style="color: blue" data-toggle="modal" data-target="#editKategori<?php echo $data->id_kategori; ?>"></i></span>&nbsp;
                                                    
                                                    <a onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?');" href="<?php echo base_url('analis/hapus_kategori/'.$data->id_kategori) ?>"><i class="fa fa-trash-o" style="color: red"></i></a>
                                                </td>
                                            </tr>

                                            <!-- modal edit -->
                                            <div>
                                                <div class="modal modal-primary fade" id="editKategori<?php echo $data->id_kategori; ?>" style="margin-top: 5%">
                                                  <div class="modal-dialog">
                                                    <div class="modal-content" style="width: 70%; margin-left: 15%">
                                                      <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                          <span aria-hidden="true">&times;</span></button>
                                                          <h4 class="modal-title">EDIT KATEGORI</h4>
                                                      </div>

                                                      <form method="POST" action="<?php echo base_url('analis/edit_kategori') ?>">
                                                          <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-12">

                                                                    <div class="form-group">
                                                                        <label>Edit Kategori</label>
                                                                        <input class="form-control" type="text" name="kategori" value="<?php echo $data->kategori ?>">
                                                                        <input class="form-control" type="hidden" name="id_kategori" value="<?php echo $data->id_kategori ?>">
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-warning pull-left" data-dismiss="modal">Batal</button>
                                                            <input type="submit" class="btn btn-primary" value="simpan">
                                                        </div>
                                                    </form>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                        </div>

                                        <?php
                                        $i++;
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
                        <strong>JENIS</strong>
                        <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#jenis" style="margin-left: 70%"><i class="fa fa-plus"></i> tambah</button>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <!-- search -->
                            <div class="form-group" style="margin-bottom: 10px; width: 50%">
                              
                            </div>
                            <!-- end search -->
                        <div class="table-responsive" id="navbar">
                            <table class="table table-striped table-bordered table-hover" id="example2">
                                <thead>
                                    <tr>
                                        <th style="width: 40px">No</th>
                                        <th>Nama Jenis</th>
                                        <th style="width: 50px">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $x = 1;
                                    foreach ($jenis as $data) 
                                    {
                                        ?>
                                        <tr>
                                            <td style="text-align: center;"><?php echo $x; ?></td>
                                            <td><?php echo $data->nama_jenis ?></td>
                                            <td style="text-align: center;">
                                                <span><i class="fa fa-edit" style="color: blue" data-toggle="modal" data-target="#editJenis<?php echo $data->id_jenis; ?>"></i></span>&nbsp;
                                                
                                                <a onclick="return confirm('Apakah Anda yakin ingin menghapus jenis ini?');" href="<?php echo base_url('analis/hapus_jenis/'.$data->id_jenis) ?>"><i class="fa fa-trash-o" style="color: red"></i></a>
                                            </td>
                                        </tr>

                                        <!-- modal edit tempat -->
                                            <div>
                                                <div class="modal modal-primary fade" id="editJenis<?php echo $data->id_jenis; ?>" style="margin-top: 5%">
                                                  <div class="modal-dialog">
                                                    <div class="modal-content" style="width: 70%; margin-left: 15%">
                                                      <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                          <span aria-hidden="true">&times;</span></button>
                                                          <h4 class="modal-title">EDIT JENIS</h4>
                                                      </div>

                                                      <form method="POST" action="<?php echo base_url('analis/edit_jenis') ?>">
                                                          <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-12">

                                                                    <div class="form-group">
                                                                        <label>Edit Jenis</label>
                                                                        <input class="form-control" type="text" name="nama_jenis" value="<?php echo $data->nama_jenis ?>">
                                                                        <input class="form-control" type="hidden" name="id_jenis" value="<?php echo $data->id_jenis ?>">
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-warning pull-left" data-dismiss="modal">Batal</button>
                                                            <input type="submit" class="btn btn-primary" value="simpan">
                                                        </div>
                                                    </form>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                        </div>
                                        <?php
                                        $x++;
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
        <div class="modal modal-primary fade" id="kategori" style="margin-top: 5%">
          <div class="modal-dialog">
            <div class="modal-content" style="width: 70%; margin-left: 15%">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">TAMBAH KATEGORI</h4>
              </div>

              <form method="POST" action="<?php echo base_url('analis/tambah_kategori') ?>">
                  <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">

                            <div class="form-group">
                                <label>Kategori Baru :</label>
                                <input type="text" name="kategori" class="form-control" required>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning pull-left" data-dismiss="modal">Batal</button>
                    <input type="submit" class="btn btn-primary" value="simpan">
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
</div>

<!-- modal tambah ruang -->
<div>
    <div class="modal modal-primary fade" id="jenis" style="margin-top: 5%">
      <div class="modal-dialog">
        <div class="modal-content"  style="width: 70%; margin-left: 15%">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">TAMBAH JENIS</h4>
          </div>

          <form method="POST" action="<?php echo base_url('analis/tambah_jenis') ?>">
              <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">

                        <div class="form-group">
                            <label>Jenis baru</label>
                            <input class="form-control" type="text" name="nama_jenis" required>
                        </div>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning pull-left" data-dismiss="modal">Batal</button>
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
                    
                    <form method="POST" action="<?php echo base_url('analis/ubah_password_k') ?>">
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
    function myFunction2() {
    //deklarasi variabelnya
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInputPlace");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTablePlace");
  tr = table.getElementsByTagName("tr");

  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>

<script type="text/javascript">
    var colNumber=3 //number of table columns


for (var i=0; i<colNumber; i++)
  {
      var thWidth=$("#scroll").find("th:eq("+i+")").width();
      var tdWidth=$("#scroll").find("td:eq("+i+")").width();      
      if (thWidth<tdWidth)                    
          $("#scroll").find("th:eq("+i+")").width(tdWidth);
      else
          $("#scroll").find("td:eq("+i+")").width(thWidth);           
  }  
</script>

<script type="text/javascript">
    $("#hilang").show().delay(1500).slideUp(400);
</script>

<script type="text/javascript">
    $(function () {
    $('#example1').DataTable({
    //$('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>

<script type="text/javascript">
    $(function () {
    //$('#example1').DataTable({
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>

</body>

</html>
