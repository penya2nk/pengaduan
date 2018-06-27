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
  <link href=<?php echo base_url("assets/vendor/datatables-plugins/dataTables.bootstrap.css")?> rel="stylesheet">
  <link href=<?php echo base_url("assets/vendor/datatables-responsive/dataTables.responsive.css")?>  rel="stylesheet">
  <link rel="stylesheet" type="text/css" href=<?php echo base_url("assets/badge.css")?> >

</head>

<body style="background-color: #e6e6e6">

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

        <h1 class="page-header"></h1>

        <div class="row">
          <div class="col-lg-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                <center><h3><strong>RIWAYAT PENGADUAN</strong></h3></center>
              </div>
              <div class="panel-body">

                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Kategori</th>
                      <th>Status</th>
                      <th>Waktu</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $i = 1;
                        foreach ($pengaduan as $data)
                        {
                      ?>
                    <tr>
                      <td><?php echo $i; ?></td>
                      <td><?php echo $data->kategori?></td>
                      <td>
                        <?php
                          if($data->status == "masuk"){
                        ?>
                        <span class="badge primary"><?php echo $data->status ?></span>
                        <?php
                          }elseif($data->status == "diproses"){
                        ?>
                        <span class="badge warning"><?php echo $data->status ?></span>
                        <?php
                          }else{
                        ?>
                        <span class="badge success"><?php echo $data->status ?></span>
                        <?php
                      }
                      ?>
                      </td>
                      <td><?php echo $data->wkt_pengaduan?></td>
                    </tr>
                    <?php
                      $i++;
                      }
                    ?>
                  </tbody>
                </table>

              </div>
              <div class="panel-footer">
                Panel Footer
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

<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>

<script type="text/javascript">
  $(document).ready(function(){
    $('#tempat').change(function(){
      var id=$(this).val();
      $.ajax({
                    url : "<?php echo base_url('user/Cform/ruang');?>", //ngarahin ke function ruang di contrll
                    method : "POST",
                    data : {id:id},
                    async : false,
                    dataType : 'json',
                    success : function(data){
                      var html = '';
                      var i;

                      html += '<option value="">---------------------------------- pilih ruang -----------------------------------</option>'

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
          }
        });
    
    $(wrapper).on("click",".remove", function(e){ //user click on remove text
      e.preventDefault(); $(this).parent('div').remove(); x--;
    })
  });
</script>

</body>

</html>
