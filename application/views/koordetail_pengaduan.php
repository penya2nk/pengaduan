<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Detail Pengaduan</title>

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
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0; background-color: #204060">
            <div class="navbar-header">

                <a class="navbar-brand" style="color: #ffffff" >SI PENGADUAN</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">

                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color: #ffffff">
                        <i class="fa fa-user fa-fw"></i> <?php echo $this->session->userdata['nama_pengguna'] ?></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
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
                            <a href=<?php echo base_url('koordinator/riwayat')?> class="a"><i class="fa fa-table"></i> Riwayat Pengaduan</a>
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
                    <h1 class="page-header">Detail Pengaduan Pengguna</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div>
                                <!-- <a href="<?php //echo base_url('koordinator/konfirmasi/'.$detail_pengaduan[0]->id_pengaduan); ?>" class="btn btn-success btn-md"><span class="fa fa-check-square-o"></span> Konfirmasi </a> -->

                                <a href="#" class="btn btn-success" data-toggle="modal" data-target="#modalKonfirmasi"><span class="fa fa-check"></span> Konfirmasi </a>

                                <a style="margin-left: 20px" href="#" class="btn btn-warning btn-md" data-toggle="modal" data-target="#modalKirim"><span class="fa fa-send"></span> Kirim </a>
                            </div>

                        </div>
                        <div class="panel-body">
                            <table class="table no border" cellpadding="0" cellspacing="0"" >
                                <?php
                                foreach ($detail_pengaduan as $data) 
                                {
                                    ?>
                                    <tr>
                                        <td><b>Gambar Pendukung:</b></td>
                                        <td>:</td>
                                        <td style="width: 80%"><img src="<?php echo base_url('assets/gambar/'.$data->gambar) ?>" style="width: 20%; height: auto"></td>
                                    </tr>
                                    <tr>
                                        <td><b>Tanggal Kejadian</b></td>
                                        <td>:</td>
                                        <td><?php echo $data->tgl_kejadian ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>ID User</b></td>
                                        <td>:</td>
                                        <td><?php echo $data->id_user ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Tempat</b></td>
                                        <td>:</td>
                                        <td><?php echo $data->nama_tempat ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Ruang</b></td>
                                        <td>:</td>
                                        <td><?php echo $data->nama_ruang ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Jumlah kejadian</b></td>
                                        <td>:</td>
                                        <td><?php echo $data->kejadian ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Penyebab</b></td>
                                        <td>:</td>
                                        <td><?php echo $data->penyebab ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Efek kejadian</b></td>
                                        <td>:</td>
                                        <td><?php echo $data->efek ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Deskripsi</b></td>
                                        <td>:</td>
                                        <td style="width: 80%"><?php echo $data->deskripsi ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Tindakan Pelapor</b></td>
                                        <td>:</td>
                                        <td style="width: 80%"><?php echo $data->tindaklanjut ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Kategori</b></td>
                                        <td>:</td>
                                        <td><?php echo $data->kategori ?>
                                            <span></span>
                                        </td>
                                    </tr>

                                    <!-- modal konfirm -->
                                    <div class="modal modal-primary fade" id="modalKonfirmasi" style="margin-top: 5%; margin-left: 25%">
                                        <div class="modal-dialog">
                                            <div class="modal-content" style="width: 50%">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span></button>
                                                    <center>
                                                        <h4 class="modal-title">Anda yakin akan konfirmasi pengaduan?</h4>
                                                    </center>
                                                </div>
                                                
                                                <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <center>
                                                                    <button class="btn btn-danger btn-md" data-dismiss="modal">BATAL</button>

                                                                    <a style="margin-left: 40px;" href="<?php echo base_url('koordinator/konfirmasi/'.$detail_pengaduan[0]->id_pengaduan); ?>" class="btn btn-success btn-md">&nbsp;&nbsp;&nbsp;YA&nbsp;&nbsp;&nbsp;</a>
                                                                </center>
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- modal setting -->

                                    <!-- modal kirim -->
                                    <div class="modal modal-primary fade" id="modalKirim" style="margin-top: 5%">
                                      <div class="modal-dialog">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span></button>
                                              <h4 class="modal-title">KIRIM PENGADUAN</h4>
                                          </div>

                                          <form method="POST" action="<?php echo base_url('koordinator/kirim_pengaduan') ?>">
                                              <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div >
                                                            <label>Laporan :</label>
                                                            <textarea class="form-control" type="text" name="keterangan"></textarea>
                                                            <input type="hidden" name="id_pengaduan" value="<?php echo $data->id_pengaduan ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
                                                <input type="submit" class="btn btn-primary" value="kirim">
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->

                                <?php
                            }
                            ?>
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

<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->

</div>

<!-- /#wrapper -->


<script src=<?php echo base_url("assets/vendor/jquery/jquery.min.js")?> ></script>
<script src=<?php echo base_url("assets/vendor/bootstrap/js/bootstrap.min.js")?> ></script>
<script src=<?php echo base_url("assets/vendor/metisMenu/metisMenu.min.js")?> ></script>
<script src=<?php echo base_url("assets/vendor/datatables/js/jquery.dataTables.min.js")?> ></script>
<script src=<?php echo base_url("assets/vendor/datatables-plugins/dataTables.bootstrap.min.js")?> ></script>
<script src=<?php echo base_url("assets/vendor/datatables-responsive/dataTables.responsive.js")?> ></script>
<script src=<?php echo base_url("assets/dist/js/sb-admin-2.js")?> ></script>
<script src=<?php echo base_url("assets/dist/jquery.min.js")?> ></script>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
</script>

<script type="text/javascript">
        $(document).ready(function(){ //Make script DOM ready
        $('#myselect').change(function() { //jQuery Change Function
        var opval = $(this).val(); //Get value from select element
        if(opval=="secondoption"){ //Compare it and if true
            $('#myModal').modal("show"); //Open Modal
        }
    });
    });
</script>

<script type="text/javascript">
    $(function(){

$.ajaxSetup({
type:"post",
cache:false,
dataType: "json"
});


$(document).on("click","td",function(){
$(this).find("span[class~='caption']").hide();
$(this).find("input[class~='editor']").fadeIn().focus();
});
});
</script>

<script>
$(function(){

  $('img').mouseenter(function(){
  $('img').css('width','70%');
 });
 $('img').mouseleave(function(){
  $('img').css('width','150');
});});
</script>

</body>

</html>
