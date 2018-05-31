<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Login SI Pengaduan</title>

  <link href=<?php echo base_url("assets/vendor/bootstrap/css/bootstrap.min.css")?> rel="stylesheet">
  <link href=<?php echo base_url("assets/vendor/metisMenu/metisMenu.min.css")?> rel="stylesheet">
  <link href=<?php echo base_url("assets/dist/css/sb-admin-2.css")?> rel="stylesheet">
  <link href=<?php echo base_url("assets/vendor/font-awesome/css/font-awesome.min.css")?> rel="stylesheet" type="text/css">

</head>

<!--<body style="background-image: url('<?php //echo base_url("img/dn.jpg")?>'); width: auto; height: 100%" > -->
  <body style="background-color: #404040">
    <div class="container">

      <div class="card">
        <div class="card-body">

          <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">

              <center>

                <?php if($this->session->flashdata('message')): ?>
                    <div class="alert alert <?php echo $this->session->flashdata['style']; ?> alert-dismissable fade-in">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong><?php echo $this->session->flashdata('alert'); ?></strong>&nbsp;<br>
                        <?php echo $this->session->flashdata('message'); ?>
                  </div>
                <?php endif; ?>

                <div class="panel-heading" style="align-items: center; margin-top: none">
                  <img src=<?php echo base_url("img/ugm.gif")?> style="width: auto; height: 100px; margin-bottom: 30px">
                  <h3 class="panel-title"><b>LOGIN SISTEM INFORMASI PENGADUAN</b></h3>
                </div>
              </center>

              <div class="panel-body">
                <form role="form" action=<?php echo base_url("Login_pengadu/loginMe")?> method="POST">
                  <fieldset>

                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-user"></i>
                        </div>
                        <input type="text" name="username" class="form-control"  placeholder="NIP/NIM">
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-key"></i>
                        </div>
                        <input class="form-control" placeholder="Password" name="password" type="password" required="required">
                      </div>
                    </div>
                    <div class="checkbox">
                      <center>
                        <button class="btn btn-sm btn-primary" type="submit">MASUK</button>
                      </center>
                    </div>

                  </fieldset>
                </form>
                <center style="margin-top: 10px">
                  <a class="d-block small" href=<?php echo base_url("forgot")?> >Lupa Password?</a>
                </center>

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
