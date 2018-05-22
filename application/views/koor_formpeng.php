<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Form Pengaduan Koordinator</title>

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
                        
                        <li>
                            <a href=<?php echo base_url('koordinator')?> style="color: #000000"><i class="fa fa-envelope"></i> Pengaduan Masuk</a>
                        </li>
                        <li>
                            <a href=<?php echo base_url('koordinator/form')?> style="color: #000000" class="a"><i class="fa fa-edit"></i> Form Pengaduan</a>
                        </li>
                        <li>
                            <a href="#" style="color: #000000" class="a"><i class="fa fa-bar-chart"></i> Laporan</a>
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
                    <h1 class="page-header">Form Pengaduan</h1>
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
                                <div class="row">
                                    <div class="col-lg-9">

                                        <form role="form">
                                          <div class="box-body">

                                            <div class="form-group">
                                              <label>Subjek</label>

                                                <div class="input-group">
                                                  <div class="input-group-addon">
                                                    <i class="fa fa-pencil"></i>
                                                  </div>
                                                  <input type="text" class="form-control" id="subjek" placeholder="Silahkan isi subjek" style="width: 100%;">
                                            </div><br>

                                            <div class="form-group">
                                                      <label>Tempat</label>
                                                        <select class="form-control" name="tempat"  id="tempat" style="width: 50%; font-color:black">
                                                            <option value="0">---------------------------- pilih -----------------------------</option>
                                                            <?php
                                                                foreach ($tempat as $data){
                                                            ?>
                                                            <option value="<?php echo $data->id_tempat ?>" ><?php echo $data->nama_tempat ?></option>
                                                            <?php
                                                                }
                                                            ?>
                                                        </select> 

                                                    </div>

                                                    <div class="form-group">
                                                      <label>Ruang</label>
                                                        <select class="ruang form-control" style="width: 50%; font-color:black">
                                                            <option value="0">---------------------------- pilih -----------------------------</option>
                                                        </select>
                                                    </div>

                                            <div class="form-group">
                                              <label>Kategori</label>
                                                <select class="form-control" style="length:50%; font-color:black" id="myselect" >
                                                    <?php 
                                                    foreach ($kategori as $data) {
                                                    ?>
                                                    <option value="<?php echo $data->id_kategori ?>"><?php echo $data->kategori ?></option>
                                                    <?php } ?>
                                                    <option value="secondoption" style="color:#009933"> Buat Kategori Baru</option>
                                                </select> 
                                            </div>

                                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin-top: 10%">
                                                  <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                      <div class="modal-header">
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                          <span aria-hidden="true">×</span>
                                                        </button>
                                                        <h3 class="modal-title">
                                                            Silahkan buat kategori baru
                                                        </h3>
                                                      </div>
                                                      <div class="modal-body">
                                                          
                                                          <div class="form-group">
                                                              <label>Kategori</label>

                                                                <div class="input-group">
                                                                  <div class="input-group-addon">
                                                                    <i class="fa fa-pencil"></i>
                                                                  </div>
                                                                  <input type="text" class="form-control" id="subjek" placeholder="Silahkan isi kategori" style="width: 100%;">
                                                            </div>
                                                        </div>
                                                      </div>
                                                      <div class="modal-footer">
                                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                                        <a class="btn btn-primary" href="#">simpan</a>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>

                                            <div class="form-group">
                                              <label>Pengaduan</label>
                                                <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
                                            </div>

                                            <div class="box-footer">
                                                <a href="#" class="btn btn-warning btn-md"><span class="glyphicon glyphicon-send"></span> Kirim </a>
                                            </div>
                                            
                                        </form>

                                </div>
                                <!-- /.col-lg-6 (nested) -->
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
    <script src=<?php echo base_url("assets/vendor/jquery/jquery.min.js")?> ></script>
    <script src=<?php echo base_url("assets/vendor/bootstrap/js/bootstrap.min.js")?> ></script>
    <script src=<?php echo base_url("assets/vendor/metisMenu/metisMenu.min.js")?> ></script>
    <script src=<?php echo base_url("assets/dist/js/sb-admin-2.js")?> ></script>

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
<!--- menampilkan tempat dan ruang -->
    <script type="text/javascript">
        $(document).ready(function(){
            $('#tempat').change(function(){
                var id = $(this).val();
                $.ajax({
                    url : "<?php echo base_url('koor/Ckoor_pengaduan/ruang');?>", //ngarahin ke index ruang di contrll
                    method : "POST",
                    data : {id:id},
                    async : false,
                    dataType : 'json',
                    success : function(data){
                        var html = '';
                        var i;

                        if(data.length == 0)
                        {
                            html += '<option value = ""> Maaf, data tidak ditemukan!</option>';
                        }
                        else
                        {
                        for(i=0; i<data.length; i++)
                        {   //jika ada, maka akan tampilkan data dari tabel ruang
                            html += '<option value = "'+ data[i].id_ruang +'">' + data[i].nama_ruang +'</option>';
                        }
                    }
                        $('.ruang').html(html);
                    }
                });
            });
        });
    </script>

</body>

</html>
