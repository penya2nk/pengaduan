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
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0; background-color: #204060">
      <div class="container">

        <ul class="nav navbar-top-links navbar-left">
          <!-- /.dropdown -->
          <li class="dropdown">
            <a href="<?php echo base_url('user/home')?>" style="color: #ffffff"><i class="fa fa-send"></i> Form
            </a>
          </li>
          <li>
            <a href="<?php echo base_url('user/riwayat_pengaduan')?>" style="color: #ffffff"><i class="fa fa-history"></i> Riwayat
            </a>
          </li>

        </ul>
        <!-- /.navbar-top-links -->

        <ul class="nav navbar-top-links navbar-right">

         <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color: #ffffff">
            <i class="fa fa-user fa-fw"></i> <?php echo $this->session->userdata('nama_pengguna'); ?></i>
          </a>
          <ul class="dropdown-menu dropdown-user">
            <li>
              <a data-toggle="modal" data-target="#settingModal">
                <i class="fa fa-gear fa-fw"></i> Settings
              </a>
              <li class="divider">
              </li>

              <li>
                <a href="<?php echo base_url('logout') ?>">
                  <i class="fa fa-sign-out fa-fw"></i> Logout
                </a>
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
        <!-- <h2 class="page-header"><img src="<?php //echo base_url('img/ugm.gif') ?>" style="width: auto; height: 60px; margin-right: 10px"> SISTEM INFORMASI PENGADUAN</h2> -->
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
            </center>

            <div class="alert alert-warning alert-dismissable" style="margin-top: 10px">
              <strong>Perhatian!</strong> Informasi <b>data diri Anda tidak akan terlihat</b> pada laporan pengaduan. Mohon berikan informasi sejelas-jelasnya untuk tindak lanjut yang lebih baik. Terimakasih.</a>.
              keterangan :<b style="color: red"> * = wajib diisi </b>
            </div>

            <div class="panel panel-default">
              <div class="panel-heading">
                <center><h3><strong>FORM PENGADUAN</strong></h3></center>
              </div>
              <div class="panel-body">
                <!-- Tab Pane Draft -->
              <div class="tab-content"><!-- 
                <div class="active tab-pane fade in" id="halaman_1"> -->
                 <div class="box-body">

                  <form action="<?php echo base_url('user/insert_data') ?>" method="POST" role="form" enctype="multipart/form-data">

                    <div class="form-group" style="margin-left: 15px">
                      <label>Silahkan isikan tanggal kejadian (Anda dapat mengubahnya) <b style="color: red">*</b></label>
                      <div class="input-group col-sm-6" style="width: 10%">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="date" name="waktu" class="form-control" datapicker value="<?php echo date('Y-m-d') ?>" required>
                      </div>
                    </div>

                    <!-- ruang dan tempat -->
                    <div class="form-group" style="width: 100%; margin-bottom: 10px">
                      <div class="col-md-6">
                        <label><b>Tempat <b style="color: red">*</b></b></label>
                        <select  class="form-control" name="tempat"  id="tempat" required>
                          <option value="">pilih tempat kejadian</option>
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
                        <label><b>Ruang <b style="color: red">*</b></b></label>
                        <select class="form-control ruang" name="ruang" id="ruang" required>
                          <option value="">pilih ruang kejadian</option>
                        </select>
                      </div>
                    </div>

                    <div class="form-group" style="width: 100%">
                      <div class="col-md-6" style="margin-bottom: 20px; margin-top: 10px">
                        <label><b>Kategori <b style="color: red">*</b></b></label>
                        <select class="form-control" name="kategori"  id="kategori" required>
                          <option value="">pilih kategori pengaduan</option>
                          <?php
                          foreach ($kategori as $data)
                          {
                            ?>
                            <option value="<?php echo $data->id_kategori ?>"><?php echo $data->kategori ?></option>
                            <?php
                          }
                          ?>
                        </select> 
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-md-6" style="margin-bottom: 20px; margin-top: 10px">
                        <label><b>Jenis <b style="color: red">*</b></b></label>
                        <select class="form-control jenis" name="jenis" id="jenis" required>
                          <option value="">pilih jenis pengaduan</option>
                          <?php
                          foreach ($jenis as $data)
                          {
                            ?>
                            <option value="<?php echo $data->id_jenis ?>"><?php echo $data->nama_jenis ?></option>
                            <?php
                          }
                          ?>
                        </select>
                      </div>
                    </div>

                  </div>

                  <!-- kategori dan jenis -->
                  <div class="form-group" style="margin-left: 15px">
                    <label>Seberapa sering terjadi</label>
                    <select class="form-control" name="kejadian" style="width: 48%;">
                      <option value="">
                        -------------------------------------- frekuensi -------------------------------------------
                      </option>
                      <option value="pertama">Pertama kali</option>
                      <option value="beberapa kali">Beberapa kali</option>
                    </select>
                  </div>

                  <!-- <div class="form-check" style="margin-left: 15px; margin-bottom: 20px">
                    <label>Tahukah Anda seberapa sering terjadi?</label><br>
                      <input class="form-check-input" type="checkbox" value="pertama" name="kejadian">
                      <label class="form-check-label">
                        Pertama kali
                      </label><br>
                      <input class="form-check-input" type="checkbox" value="beberapa kali" name="kejadian">
                      <label class="form-check-label">
                        Beberapa kali
                      </label>
                  </div> -->

                  <div class="form-group" style="margin-left: 15px; margin-right:15px">
                    <label>Penyebab</label>
                    <input type="text" class="form-control" name="penyebab" id="penyebab" placeholder="Silahkan isi penyebab">
                  </div>

                  <div class="form-group" style="margin-left: 15px; margin-right:15px">
                    <label>Efek kejadian <b style="color: red">*</b></label>
                    <input type="text" class="form-control" name="efek" id="efek" placeholder="Silahkan isi efek" required>
                  </div>

                  <div class="form-group" style="margin-left: 15px; margin-right:15px">
                    <label>Silahkan deskripsikan kejadian <b style="color: red">*</b></label>
                    <textarea class="form-control" name="deskripsi" rows="3" placeholder="text..." required></textarea>
                  </div>

                  <div class="form-group" style="margin-left: 15px; margin-right:15px">
                    <label>Silahkan deskripsikan tindaklanjut yang telah Anda lakukan sendiri</label>
                    <textarea class="form-control" name="tindaklanjut" rows="3" placeholder="text ..."></textarea>
                  </div>

                  <div class="form-group" style="margin-left: 15px; margin-right:15px">
                    <label>Anda boleh menambahkan gambar pendukung (maksimal 2 Mb):</label>
                    <input type="file" name="gambar">
                    <input type="hidden" name="nama_pengguna" value="<?php echo $this->session->userdata('nama_pengguna') ?>">
                  </div>

                  <div style="margin-left: 90%">
                    <button class="btn btn-success" name="simpan" value="simpan" style="margin-top: 20px; width:80px">simpan</button>
                  </div>
                </div>
                <!-- /.tab-pane -->
              </form>
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
        
        <form method="POST" action="<?php echo base_url('user/ubah_password') ?>">
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

  <footer class="footer">
    <div class="container">
      <strong>Copyright &copy; 2018 <a href="#">Tugas Akhir</a></strong>
    </div>
  </footer>

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

                      html += '<option value="">pilih ruang kejadian</option>';

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
  $("#hilang").show().delay(1500).slideUp(400);
</script>

<script type="text/javascript">
  
</script>

</body>

</html>
