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

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">

      <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
        </ul>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active dropdown">
            <a class="nav-link" href="#">
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

    <div class="card" style="background-color: #e5e5e5">
      <div class="card-body">
        <h5 class="card-title"></h5>
        <div class="card-text">

          <form>

            <div class="form-group row">
              <label class="col-sm-2 col-form-label"><b>Waktu Kejadian</b></label>
              <div class="col-sm-10">

                
              </div>
            </div>
          </form>
          
        </div>

        <a href="#" class="btn btn-primary right">Go somewhere</a>
      </div>
    </div>
  </div>
  <!-- /.container -->

  <!-- Bootstrap core JavaScript -->
  <script src=<?php echo base_url("assets/logo/vendor/jquery/jquery.min.js")?>></script>
  <script src=<?php echo base_url("assets/logo/vendor/bootstrap/js/bootstrap.bundle.min.js")?>></script>

<script type="text/javascript">
  $(".input-group.date").datepicker({autoclose: true, todayHighlight: true});
</script>
</body>

</html>
