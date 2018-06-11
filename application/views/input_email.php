<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Reset Password</title>

  <link href=<?php echo base_url("assets/vendor/bootstrap/css/bootstrap.min.css")?> rel="stylesheet">
  <link href=<?php echo base_url("assets/vendor/metisMenu/metisMenu.min.css")?> rel="stylesheet">
  <link href=<?php echo base_url("assets/dist/css/sb-admin-2.css")?> rel="stylesheet">
  <link href=<?php echo base_url("assets/vendor/font-awesome/css/font-awesome.min.css")?> rel="stylesheet" type="text/css">
  <link rel="stylesheet" type="text/css" href=<?php echo base_url("assets/badge.css")?> >

</head>

<body style="background-color: #4d4d4d">
  <div class="container">

    <div class="card">
      <div class="card-body">

        <div class="col-md-4 col-md-offset-4">
          <div class="login-panel panel panel-default">

            <center>

              <!-- Alert -->
               <?php if($this->session->flashdata('message')): ?>
                    <div class="alert alert-<?php $this->session->flashdata('style'); ?> alert-dismissable fade-in">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong><?php echo $this->session->flashdata('alert'); ?></strong>&nbsp;<br>
                        <?php echo $this->session->flashdata('message'); ?>
                  </div>
                <?php endif; ?>
               <!-- End Alert -->
     
              <div class="panel-heading" style="align-items: center;">
                <img src=<?php echo base_url("img/ugm.gif")?> style="width: auto; height: 100px; margin-bottom: 30px">
                <h3 class="panel-title"><b>MASUKKAN EMAIL UGM ANDA</b></h3>
            </div>
        </center>

        <div class="panel-body">
            <form role="form" action=<?php echo base_url("forgot/kirim_email")?> method="POST">
             <fieldset>

          <div class="form-group">
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-envelope"></i>
              </div>
              <input class="form-control" type="email" name="email" placeholder="Isi email ugm Anda">
          </div>
      </div>

  <center>
    <button class="btn btn-sm btn-primary" type="submit">VALIDASI</button>
</center>


</fieldset>
</form>

</div>
</div>
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

</body>

</html>
