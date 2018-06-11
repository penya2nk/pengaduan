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

<body style="background-color: #e7e7e7">

  <div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0; background-color: #00004d">
      <div class="container">

        <ul class="nav navbar-top-links navbar-left">
          <!-- /.dropdown -->
          <li class="dropdown">
            <a href="<?php echo base_url('user')?>" style="color: #ffffff"><i class="fa fa-send"></i> Form
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
      <!-- <h2 class="page-header"><img src="<?php //echo base_url('img/ugm.gif') ?>" style="width: auto; height: 60px; margin-right: 10px"> SISTEM INFORMASI PENGADUAN</h2> -->
      <div class="row">
        <div class="col-lg-12">

          <?php if($this->session->flashdata('message')): ?>
            <div class="alert alert-<?php echo $this->session->flashdata('style'); ?>" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <strong><?php echo $this->session->flashdata('alert'); ?></strong>&nbsp;<br>
              <?php echo $this->session->flashdata('message'); ?>
            </div>
          <?php endif; ?>

          <div class="alert alert-info" style="margin-top: 20px">
            <strong>Perhatian!</strong> Informasi <b>data diri Anda tidak akan terlihat</b> pada laporan pengaduan. Mohon berikan informasi sejelas-jelasnya untuk tindak lanjut yang lebih baik. Terimakasih.</a>.
          </div>

          <div class="panel panel-default">
            <div class="panel-heading">
              <center><h3><strong>FORM PENGADUAN</strong></h3></center>
            </div>
            <div class="panel-body">
              <!-- Tab Pane Draft -->
              <div class="tab-content">
                <div class="active tab-pane fade in" id="halaman_1">
                 <div class="box-body">

                  <form action="<?php echo base_url('user/insert_data') ?>" method="POST" role="form" enctype="multipart/form-data">

                    <div class="form-group" style="margin-left: 15px">
                      <label>Silahkan isikan tanggal kejadian :</label>
                      <div class="input-group col-sm-6">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="date" name="waktu" class="form-control" datapicker required="required">
                      </div>
                    </div>

                    <div class="form-group" style="margin-left: 15px; margin-right:15px">
                      <label>Silahkan isikan subjek pengaduan :</label>
                      <div class="input-group col-sm-12">
                        <div class="input-group-addon">
                          <i class="fa fa-edit"></i>
                        </div>
                        <input type="text" name="subjek" class="form-control" required="required">
                      </div>
                    </div>

                    <!-- ruang dan tempat -->
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
                        <select class="form-control ruang" name="ruang" id="ruang" required>
                          <option>----------------------------------------- pilih ruang ------------------------------------------</option>
                        </select>
                      </div>
                    </div>

                    <div class="form-group" style="width: 100%">
                      <div class="col-md-6" style="margin-bottom: 20px; margin-top: 10px">
                        <label><b>Pilih kategori kejadian:</b></label>
                        <select class="form-control" name="kategori"  id="kategori" required="Wajib diisi">
                          <option value="0">----------------------------------------- pilih tempat ------------------------------------------</option>
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
                        <label><b>Pilih jenis kejadian</b></label>
                        <select class="form-control jenis" name="jenis" id="jenis" required>
                          <option>----------------------------------------- pilih jenis ------------------------------------------</option>
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

                  <div class="footer" style="margin-left:92%;">
                    <div class="box-footer with-border">
                      <a href="#halaman_2" class="btn btn-primary" data-toggle="tab" style="margin-top: 5px">lanjut <i class="fa fa-chevron-right"></i></a>
                    </div>
                  </div>


                </div>
                <!-- /.tab-pane -->


                <div class="tab-pane fade in" id="halaman_2">

                  <!-- kategori dan jenis -->
                  <div class="form-group" style="margin-left: 15px">
                    <label>Seberapa sering terjadi:</label>
                    <select class="form-control" name="kejadian" style="width: 50%;">
                      <option value="0">
                        ------------------------------------------ pilih frekuensi ------------------------------------------
                      </option>
                      <option value="pertama">Pertama kali</option>
                      <option value="beberapa">Beberapa kali</option>
                      <option value="tidak tau">Tidak tahu</option>
                    </select>
                  </div>

                  <div class="form-group" style="margin-left: 15px; margin-right:15px">
                    <label>Efek kejadian:</label>
                    <input type="text" class="form-control" name="efek" id="efek" placeholder="Silahkan isi efek">
                  </div>

                  <div class="form-group" style="margin-left: 15px; margin-right:15px">
                    <label>Penyebab</label>
                    <input type="text" class="form-control" name="penyebab" id="penyebab" placeholder="Silahkan isi penyebab">
                  </div>

                  <div style="margin-left: 83%">
                    <a href="#halaman_1" class="btn btn-warning" data-toggle="tab" style="margin-top: 50px"><i class="fa fa-chevron-left"></i> kembali</a>&nbsp;
                    <a href="#halaman_3" class="btn btn-primary" data-toggle="tab" style="margin-top: 50px">lanjut <i class="fa fa-chevron-right"></i></a>
                  </div>

                </div>
                <!-- /.tab-pane -->

                <div class="tab-pane fade in" id="halaman_3">

                    <!-- <div class="field_wrapper" style="margin-left: 15px; margin-right:15px">
                      <label>Tindak Lanjut</label><br>
                        <div class="input-group" style="width: 50%; margin-bottom: 5px">
                            <input type="text" name="field_name[]" value="" class="form-control">
                            <div class="input-group-btn">
                            <a href="javascript:void(0);" class="btn btn-success add_button" title="Add field"><i class="fa fa-plus"></i></a>
                          </div>
                        </div>
                      </div> -->

                      <div class="form-group" style="margin-left: 15px; margin-right:15px">
                        <label>Deskripsi</label>
                        <textarea class="form-control" name="deskripsi" rows="3" placeholder="Enter ..." required="required"></textarea>
                      </div>

                      <div class="form-group" style="margin-left: 15px; margin-right:15px">
                        <label>Saran:</label>
                        <input type="text" class="form-control" name="saran" id="saran" placeholder="Silahkan berikan saran">
                      </div>

                      <div class="form-group" style="margin-left: 15px; margin-right:15px">
                        <label>Tambahkan gambar pendukung (maksimal 2 Mb):</label>
                        <input type="file" name="gambar" required>
                        <input type="hidden" name="nama_pengguna" value="<?php echo $this->session->userdata('nama_pengguna') ?>">
                      </div>

                      <div style="margin-left: 83%">
                        <a href="#halaman_2" class="btn btn-warning" data-toggle="tab" style="margin-top: 20px"><i class="fa fa-chevron-left"></i> kembali</a>&nbsp;
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
  $(document).ready(function(){
    var maxField = 5; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = '<div style="width:100%; margin-bottom:5px"><input type="text" name="field_name[]" value=""/><a href="javascript:void(0);" class="remove_button" title="Remove field"><i style="color:red" class="fa fa-remove"><i/></a></div>';

    //New input field html 
    var x = 1; //Initial field counter is 1
    $(addButton).click(function(){ //Once add button is clicked
        if(x < maxField){ //Check maximum number of input fields
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); // Add field html
          }
        });
    $(wrapper).on('click', '.remove_button', function(e){ //Once remove button is clicked
      e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
      });
  });
</script>

<script type="text/javascript">
  $(document).ready (function(){
    // $("#success-alert").hide();
    // $("#myWish").click(function showAlert() {
    //   $("#success-alert").alert();

    window.setTimeout(function() {
      $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
      });
    }, 4000);       
  </script>

</body>

</html>
