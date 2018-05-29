<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>form</title>

  <!-- Bootstrap core CSS -->
  <link href=<?php echo base_url("assets/logo/vendor/bootstrap/css/bootstrap.min.css")?> rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href=<?php echo base_url("assets/logo/css/logo-nav.css")?> rel="stylesheet">
  <link href=<?php echo base_url("assets/vendor/font-awesome/css/font-awesome.min.css")?>  rel="stylesheet" type="text/css">
  <link rel="stylesheet" type="text/css" href=<?php echo base_url("assets/badge.css")?> >


</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">

      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">Form Pengaduan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Riwayat Pengaduan</a>
        </li>
      </ul>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active dropdown">

            <a class="nav-link" href="">
              <span class="fa fa-user"></span>&nbsp;Isnaini Barochatun
              <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                <button class="dropdown-item" type="button">Action</button>
                <button class="dropdown-item" type="button">Another action</button>
                <button class="dropdown-item" type="button">Something else here</button>
              </div>
            </a>
            
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">
    <h1 class="mt-5">Sistem Informasi Pengaduan</h1>

    <div class="card" style="border:none;">
      <div class="card-body">
        <h5 class="card-title"></h5>
        <div class="card-text">

          <form class="form-horizontal" action="#">

            <div class="form-group">
              <label class="control-label col-sm"><b>Silahkan isikan waktu kejadian :</b></label>
              <div class="col-sm-6">
                <input type="date" class="form-control" placeholder="mm/dd/yyyy">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm"><b>Silahkan isikan subjek pengaduan:</b></label>
              <div class="col-sm-12">
                <input type="text" class="form-control">
              </div>
            </div>

            <div class="form-row" style="margin-left: 10px; margin-right: 10px">
              <div class="form-group col-md-6">
                <label><b>Pilih tempat kejadian:</b></label>
                <select class="form-control">
                  <option>--------- pilih tempat -----------</option>
                </select>
              </div>
              <div class="form-group col-md-6">
                <label><b>Pilih ruang kejadian</b></label>
                <select class="form-control">
                  <option>--------- pilih ruang -----------</option>
                </select>
              </div>
            </div>
          </div>

        </form>

      </div>
    </div>

    <!-- /.container -->

    <!-- Bootstrap core JavaScript -->
    <script src=<?php echo base_url("assets/logo/vendor/jquery/jquery.min.js")?>></script>
    <script src=<?php echo base_url("assets/logo/vendor/bootstrap/js/bootstrap.bundle.min.js")?>></script>
    
</body>

</html>
