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

<body style="background-color: #e6e6e6">

  <div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0; background-color: #00004d">
      <div class="container">
        <div class="navbar-header" style="margin-left: 15px">
          <span>
            <a class="navbar-brand" href="<?php echo base_url('user')?>" style="background-color: #000080; color: #ffffff; margin-right: 10px">Form Pengaduan</a>&nbsp;
          </span>
          <span>
            <a class="navbar-brand" href="<?php echo base_url('user/riwayat_pengaduan')?>" style=" color: #ffffff">Riwayat Pengaduan</a>
          </span>
        </div>
        <!-- /.navbar-header -->

        <ul class="nav navbar-top-links navbar-right">

          <!-- /.dropdown -->
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color: #ffffff">
              <i class="fa fa-user fa-fw"></i> Isnaini barochatun</i>
            </a>
            <ul class="dropdown-menu dropdown-user">
              <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
              </li>
              <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
              </li>
              <li class="divider"></li>
              <li><a href="<?php echo base_url('logout') ?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
              </li>
            </ul>
            <!-- /.dropdown-user -->
          </li>
          <!-- /.dropdown -->
        </ul>
        <!-- /.navbar-top-links -->

        <div class="navbar-default sidebar" role="navigation">

          <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
      </nav>

      <!-- Page Content -->
      <div class="container">

        <h1 class="page-header"></h1>

        <div class="row">
          <div class="col-lg-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                <center><h3><strong>FORM PENGADUAN</strong></h3></center>
              </div>
              <div class="panel-body">
                <!-- Tab Pane Draft -->
                <div class="tab-content">
                  <div class="active tab-pane fade in" id="edit_profil">
                   <div class="box-body">

                    <form action="" method="POST" role="form">

                      <div class="form-group" style="margin-left: 15px">
                        <label>Silahkan isikan tanggal kejadian :</label>
                        <div class="input-group col-sm-6">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="date" class="form-control" datapicker required="Wajib diisi">
                        </div>
                      </div>

                      <div class="form-group" style="margin-left: 15px">
                        <label>Silahkan isikan subjek pengaduan :</label>
                        <div class="input-group col-sm-12">
                          <div class="input-group-addon">
                            <i class="fa fa-edit"></i>
                          </div>
                          <input type="text" name="subjek" class="form-control" required="required">
                        </div>
                      </div>

                      <div class="form-group" style="width: 100%; margin-bottom: 10px">
                        <div class="col-md-6">
                          <label><b>Pilih tempat kejadian:</b></label>
                          <select class="form-control" name="tempat"  id="tempat" required="Wajib diisi">
                            <option value="0">----------------------------------------- pilih tempat ------------------------------------------</option>
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
                      </div>

                      <div class="form-group">
                        <div class="col-md-6">
                          <label><b>Pilih ruang kejadian</b></label>
                          <select class="form-control ruang" name="ruang" id="ruang required">
                            <option>----------------------------------------- pilih ruang ------------------------------------------</option>
                          </select>
                        </div>
                      </div>

                    </div>

                    <div class="footer">
                      <div class="box-footer with-border" style="margin-left:90%; margin-top: 30px">
                        <a href="#edit" class="btn btn-primary" data-toggle="tab">Edit Profil</a>
                      </div>
                    </div>
                  </div>
                  <!-- /.tab-pane -->
                  
                  <div class="tab-pane fade in" id="edit">
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
                      <input id="idf" value="1" type="hidden">
                      <button class="btn btn-success" onclick="add(); return false;">Tambah</button>
                      <div id="divAdd"></div>
                    </div>

                    <div>
                    <a href="#edit_profil" class="btn btn-primary" data-toggle="tab" >Batal</a>
                  </div></div>
                  <!-- /.tab-pane -->
                  
                </div>
                <!-- /.tab-content -->
              </div>
            </div>
          </div>

        </div>

      </div>
      <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

</div>
</div>
<!-- /#wrapper -->

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
                    url : "<?php echo base_url('user/Cform/ruang');?>", //ngarahin ke function ruang di cform
                    method : "POST",
                    data : {id:id},
                    dataType : 'json',
                    success : function(data){
                      var html = '';
                      var i;

                      html += '<option>----------------------------------------- pilih ruang ------------------------------------------</option>';

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
  
</script>

</body>

</html>
