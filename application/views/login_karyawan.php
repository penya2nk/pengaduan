<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Employeer</title>

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
                <div class="panel-heading" style="align-items: center;">
                  <img src=<?php echo base_url("img/ugm.gif")?> style="width: auto; height: 100px; margin-bottom: 30px">
                  <h3 class="panel-title"><b>LOGIN SISTEM INFORMASI PENGADUAN</b></h3>
                </div>
              </center>

              <div class="panel-body">
                <form role="form" action=<?php echo base_url("login/loginMe")?> method="POST">
                  <fieldset>

                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-user"></i>
                        </div>
                        <select name="username" class="form-control">
                          <option value="0">-------------- Masuk sebagai -------------</option>
                          <option value="admin">admin</option>
                          <option value="analis">analis</option>
                          <option value="koordinator">koordinator</option>
                        </select>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-key"></i>
                        </div>
                        <input name="password" class="form-control" placeholder="Password" type="password" required="required">
                      </div>
                    </div>
                    <div class="checkbox">
                      <center>
                        <input class="btn btn-sm btn-primary" type="submit" value="MASUK">
                      </center>
                    </div>

                  </fieldset>
                </form>
                <center style="margin-top: 10px">
                  <a class="d-block small" href=<?php echo base_url("forget")?> >Lupa Password?</a>
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
