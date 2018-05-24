<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Form Pengaduan Pengguna</title>

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
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color: #ffffff">
                        <i class="fa fa-user fa-fw"></i>&nbsp; Isnaini barochatun</i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                        <li><a data-toggle="modal" data-target="#settingModal"><i class="fa fa-gear fa-fw"></i> Settings</a>
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
                            <a href="user" style="color: #000000"><i class="fa fa-edit fa-fw"></i> Form Pengaduan</a>
                        </li>
                        <li>
                            <a href="#" style="color: #000000" class="a"><i class="fa fa-table fa-fw"></i> Riwayat Pengaduan</a>
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
                    <h1 class="page-header">Halaman Pengaduan</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">

                <form role="form" action="POST">

                    <div class="col-lg-10">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Form Pengaduan
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-10">

                                        <div class="box-body">

                                            <div class="form-group">
                                                <label>Tanggal</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                    </div>
                                                    <input type="date" class="form-control" datepicker="'alias': 'dd/mm/yyyy'" datapicker required="Wajib diisi">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                          <label>Subjek</label>
                                          <div class="input-group">
                                              <div class="input-group-addon">
                                                <i class="fa fa-pencil"></i>
                                            </div>
                                            <input type="text" class="form-control" id="subjek" placeholder="Silahkan isi subjek" style="width: 100%;">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                      <label>Tempat</label>
                                      <select class="form-control" name="tempat"  id="tempat" style="width: 50%; font-color:black" required="Wajib diisi">
                                        <option value="0">---------------------------- pilih -----------------------------</option>
                                        <?php
                                        foreach ($tempat as $data){
                                            ?>
                                            <option value="<?php echo $data->id_tempat ?>" >
                                                <?php echo $data->nama_tempat ?>
                                            </option>
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
                              <select class="form-control"  name="satuan" style="width: 50%; font-color:black">
                                <option value="0">---------------------------- pilih -----------------------------</option>
                                <?php
                                    foreach ($kategori as $data) { //yg ada di contr as bebas
                                        ?>
                                        <option value="<?php echo $data->id_kategori ?>">
                                            <?php echo $data->kategori ?>
                                        </option>
                                        <?php 
                                    } 
                                    ?>
                                </select> 
                            </div>

                            <div class="form-group">
                                <label>Jenis Insiden</label>
                                <select class="form-control" name="jenis"  id="jenis" style="width: 50%; font-color:black" required="Wajib diisi">
                                    <option value="0">---------------------------- pilih -----------------------------</option>
                                    <?php
                                    foreach ($jenis as $data) 
                                    {
                                        ?>
                                        <option value="<?php echo $data->id_jenis ?>"><?php echo $data->nama_jenis ?>
                                        </option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Seberapa sering terjadi</label>
                                <select class="form-control" name="kejadian" style="width: 50%; font-color:black">
                                    <option value="0">
                                        ---------------------------- pilih -----------------------------
                                    </option>
                                    <option value="pertama">Pertama kali</option>
                                    <option value="beberapa_kali">Beberapa kali</option>
                                    <option value="tidak_tahu">Tidak tahu</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Penyebab</label>
                                <input type="text" class="form-control" id="subjek" placeholder="Silahkan isi penyebab">
                            </div>

                            <div class="form-group">
                                <label>Tindak Lanjut</label><br>
                                <div class="input_fields_wrap">
                                    <div>
                                        <input type="text" class="" name="mytext[]">
                                        <a class="add_field_button"><i class="fa fa-plus"></i></a>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Deskripsi</label>
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

<!-- modal setting -->
<div class="modal fade" id="settingModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
      </button>
  </div>
  <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
  <div class="modal-footer">
    <button class="btn btn-secondary" type="button" data-dismiss="modal">batal</button>
    <a class="btn btn-primary" href="#">simpan</a>
</div>
</div>
</div>
</div>

<!-- jQuery -->
<script src=<?php echo base_url("assets/vendor/jquery/jquery.min.js")?> ></script>

<!-- Bootstrap Core JavaScript -->
<script src=<?php echo base_url("assets/vendor/bootstrap/js/bootstrap.min.js")?> ></script>

<!-- Metis Menu Plugin JavaScript -->
<script src=<?php echo base_url("assets/vendor/metisMenu/metisMenu.min.js")?> ></script>

<!-- Custom Theme JavaScript -->
<script src=<?php echo base_url("assets/dist/js/sb-admin-2.js")?> ></script>

<script type="text/javascript">
    $(document).ready(function(){
        $('#tempat').change(function(){
            var id=$(this).val();
            $.ajax({
                    url : "<?php echo base_url('user/Cform/ruang');?>", //ngarahin ke index ruang di contrll
                    method : "POST",
                    data : {id:id},
                    async : false,
                    dataType : 'json',
                    success : function(data){
                        var html = '';
                        var i;

                        html += '<option value="">---------------------------- pilih -----------------------------</option>'

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

<script type="text/javascript">
    $(function(){
        $('#datepicker').datepicker('99/99/9999', { 'placeholder': 'dd/mm/yyyy' })
    })    
</script>

<script type="text/javascript">
    $(document).ready(function() {
    var max_fields      = 5; //maksimal field yg boleh nambah
    var wrapper         = $(".input_fields_wrap"); //pembungkus fieldnya
    var add      = $(".add_field_button"); //tambah button id
    
    var x = 1; //inisial di textbox count
    $(add).click(function(e){ //tambahin ketika di klik
        e.preventDefault();
        if(x < max_fields){
            x++; 
            $(wrapper).append('<div><input type="text" name="mytext[]"/><a href="#" class="remove">Remove</a></div>'); //add input box
    });
    
    $(wrapper).on("click",".remove", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});
</script>

</body>

</html>
