<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Forgot Password</title>

    <link href=<?php echo base_url("assets/vendor/bootstrap/css/bootstrap.min.css")?> rel="stylesheet">
    <link href=<?php echo base_url("assetsvendor/metisMenu/metisMenu.min.css")?> rel="stylesheet">
    <link href=<?php echo base_url("assetsdist/css/sb-admin-2.css")?> rel="stylesheet">
    <link href=<?php echo base_url("assetsvendor/font-awesome/css/font-awesome.min.css")?> rel="stylesheet" type="text/css">

</head>

<body style="background: #666666">

    <div class="container" style="margin-top: 10%;>
        <div class="row">
            <div class="col-md-4 col-md-offset-5" style="width: 40%">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <center>
                          <h3>FORM RESET PASSWORD</h3>
                        </center>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="POST" action="login/index">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Silahkan isikan password baru" name="password" type="password" value="">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Konfirmasi password baru" name="password" type="password" value="">
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <a href="index.html" class="btn btn-lg btn-success btn-block">Simpan</a>
                            </fieldset>
                        </form>
                        <div style="margin-top: 20px">

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
